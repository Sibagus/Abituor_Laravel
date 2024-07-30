<?php
$biller_name         = 'ABITOUR';                     // UBAH VARIABEL INI
$secret_key          = 'CND7gy4Fwo6hajUznM0elsR9OukT2HYmiPx18vEf';            // UBAH VARIABEL INI
$mysql_host          = 'localhost';                        // UBAH VARIABEL INI 
$mysql_username      = '**********';                    // UBAH VARIABEL INI
$mysql_password      = '**********';                        // UBAH VARIABEL INI 
$mysql_dbname        = '**********';                    // UBAH VARIABEL INI

$allowed_collecting_agents    = array('BSM');
$allowed_channels         = array('TELLER', 'IBANK', 'ATM', 'MBANK', 'FLAGGING');
$log_directory             = './logs/'; // Direktori ini harus bisa ditulis oleh Apache / PHP user

function debugLog($o)
{
    // Fungsi ini untuk menulis seluruh log ke file
    date_default_timezone_set('Asia/Jakarta');
    $file_debug = $GLOBALS['log_directory'] . 'debug-h2h-' . date("Y-m-d") . '.log.txt';
    ob_start();
    var_dump(date("Y-m-d H:i:s"));
    var_dump($o);
    $c = ob_get_contents();
    ob_end_clean();

    $f = fopen($file_debug, "a");
    fputs($f, "$c\n");
    fflush($f);
    fclose($f);
}

debugLog('REQUEST: ');
$request = file_get_contents('php://input');
debugLog($request);
$_JSON = json_decode($request, true);
