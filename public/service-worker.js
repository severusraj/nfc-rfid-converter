const CACHE_NAME = 'nfc-converter-cache-v2';

// Files to precache for offline use (excluding dynamic pages)
const ASSETS_TO_CACHE = [
  './css/style.css',
  './js/main.js',
  './manifest.json',
  './icons/favicon-16x16.png',
  './icons/favicon-32x32.png',
  './icons/apple-touch-icon.png',
  './icons/icon-192.png',
  './icons/icon-512.png',
  'https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap',
  'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css'
];

self.addEventListener('install', event => {
  event.waitUntil(
    caches.open(CACHE_NAME).then(cache => cache.addAll(ASSETS_TO_CACHE))
  );
  self.skipWaiting();
});

self.addEventListener('activate', event => {
  event.waitUntil(
    caches.keys().then(keys => Promise.all(
      keys.filter(key => key !== CACHE_NAME).map(key => caches.delete(key))
    ))
  );
  self.clients.claim();
});

self.addEventListener('fetch', event => {
  const { request } = event;

  // --- Caching Strategy ---

  // 1. Never cache POST requests
  if (request.method !== 'GET') {
    event.respondWith(fetch(request));
    return;
  }

  // 2. For other GET requests, try network first, then cache
  event.respondWith(
    fetch(request).then(response => {
      // If the network request is successful, cache it and return it
      if (response && response.status === 200) {
        const responseToCache = response.clone();
        caches.open(CACHE_NAME).then(cache => {
          cache.put(request, responseToCache);
        });
      }
      return response;
    }).catch(() => {
      // If the network request fails, try to get it from the cache
      return caches.match(request);
    })
  );
}); 