<?php
header('Content-Type: application/json');
header('Cache-Control: no-cache, must-revalidate');

// Path to the codesend binary (current directory is the default)
$codeSendPath = '/var/www/rfoutlet/codesend';

// This PIN is not the first PIN on the Raspberry Pi GPIO header!
// Consult https://projects.drogon.net/raspberry-pi/wiringpi/pins/
// for more information.
$codeSendPIN = "17";

// Pulse length depends on the RF outlets you are using. Use RFSniffer to see what pulse length your device uses.
$codeSendPulseLength = "189";

if (!file_exists($codeSendPath)) {
    error_log("$codeSendPath is missing, please edit the script", 0);
    die(json_encode(array('success' => false)));
}

$codeToSend = $_POST['outletId'];

shell_exec($codeSendPath . ' ' . $codeToSend . ' -p ' . $codeSendPIN . ' -l ' . $codeSendPulseLength);


die(json_encode(array('success' => true)));
?>
