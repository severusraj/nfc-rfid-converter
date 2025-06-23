<?php

namespace NfcRfidConverter;

class Converter
{
    /**
     * Converts a hexadecimal UID to a decimal ID.
     * The conversion involves reversing the byte order.
     *
     * @param string $uid The hexadecimal UID (e.g., "04:A1:B2:C3" or "04A1B2C3").
     * @return int The converted decimal ID.
     * @throws \Exception If the UID format is invalid.
     */
    public function uidToDecimal(string $uid): int
    {
        $uid = strtoupper(str_replace(':', '', trim($uid)));

        if (strlen($uid) % 2 !== 0 || !ctype_xdigit($uid)) {
            throw new \Exception("Invalid hexadecimal UID format.");
        }

        $bytes = str_split($uid, 2);
        $reversedHex = implode('', array_reverse($bytes));

        return hexdec($reversedHex);
    }
} 