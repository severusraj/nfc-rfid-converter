<?php

session_start(); // Start the session

function uidToDecimalId(string $uid): int
{
    $uid = strtoupper(str_replace(':', '', trim($uid)));

    if (strlen($uid) % 2 !== 0) {
        throw new Exception("Invalid UID length.");
    }

    $bytes = str_split($uid, 2);
    $reversedHex = implode('', array_reverse($bytes));

    return hexdec($reversedHex);
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['submit']) && isset($_POST['hex_uid'])) {
        $hex_uid = $_POST['hex_uid'];

        // Validate the input (important for security)
        if (!preg_match('/^[0-9a-fA-F:]+$/', $hex_uid)) {
            $_SESSION['result'] = "<div class='error'>Invalid UID format.  Please use hexadecimal characters and colons only.</div>";
            header("Location: index.php"); // Redirect back to the form
            exit();
        }

        try {
            $decimal_id = uidToDecimalId($hex_uid);
            $_SESSION['result'] = "Decimal ID: " . $decimal_id;
        } catch (Exception $e) {
            $_SESSION['result'] = "<div class='error'>Error during conversion: " . $e->getMessage() . "</div>";
        }

        header("Location: index.php"); // Redirect back to the form
        exit();
    } else {
        $_SESSION['result'] = "<div class='error'>Missing UID value.</div>";
        header("Location: index.php");
        exit();
    }
} else {
    // Handle cases where the script is accessed directly without a POST request
    header("Location: index.php"); // Redirect to the form
    exit();
}

?>
