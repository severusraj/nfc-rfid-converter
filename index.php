<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NFC UID Converter</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>NFC UID Converter</h1>
        <form method="POST" action="convert.php">
            <label for="hex_uid">Enter NFC UID (Hexadecimal):</label>
            <input type="text" id="hex_uid" name="hex_uid" placeholder="Enter UID in Hex" required>

            <button type="submit" name="submit">Convert to Decimal</button>
        </form>

        <div id="result-container">
        <?php
            // Display conversion result if available
            if (isset($_SESSION['result'])) {
                echo "<div class='result'>" . $_SESSION['result'] . "</div>";
                unset($_SESSION['result']); // Clear the session variable after displaying
            }
        ?>
        </div>
    </div>
</body>
</html>
