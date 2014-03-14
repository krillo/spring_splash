<?php
$order = new stdClass;
!empty($_REQUEST['firstname']) ? $order->fname = $_REQUEST['firstname'] : $order->fname = '';
!empty($_REQUEST['lastname']) ? $order->lname = $_REQUEST['lastname'] : $order->lname = '';
!empty($_REQUEST['name']) ? $order->name = $_REQUEST['name'] : $order->name = '';
!empty($_REQUEST['email']) ? $order->email = $_REQUEST['email'] : $order->email = '';
!empty($_REQUEST['phone']) ? $order->phone = $_REQUEST['phone'] : $order->phone = '';
!empty($_REQUEST['mobile']) ? $order->mobile = $_REQUEST['mobile'] : $order->mobile = '';
!empty($_REQUEST['street1']) ? $order->street = $_REQUEST['street1'] : $order->street = '';
!empty($_REQUEST['street2']) ? $order->street = $order->street . ' ;; ' . $_REQUEST['street2'] : null;
!empty($_REQUEST['zip']) ? $order->zip = $_REQUEST['zip'] : $order->zip = '';
!empty($_REQUEST['city']) ? $order->city = $_REQUEST['city'] : $order->city = '';
!empty($_REQUEST['offer']) ? $order->offer = $_REQUEST['offer'] : $order->offer = '';
!empty($_REQUEST['three']) ? $order->three = $_REQUEST['three'] : $order->three = '';
!empty($_REQUEST['eight']) ? $order->eight = $_REQUEST['eight'] : $order->eight = '';


$to_email = "kristian@reptilo.se";
//$to = "malin.gelberg@mediavanner.se";
$to_name = "Malin Gelberg";
$from_email = "info@magasinspring.se";
$from_name = "Pren";
$title = "Prenumeration på Spring";
$date = date("Y-m-d H:i:s");
$pren = 0;
if ($order->three != 0) {
  $pren = 3;
}
if ($order->eight != 0) {
  $pren = 8;
}


$message = <<<MSG
$pren nummer prenumeration på Spring
$date
        
$order->name
$order->street1
$order->zip  $order->city
Email: $order->email
        
Fler erbjudanden: $order->offer       
MSG;


/*
  $message = "$pren nymmer prenumeration på Spring<br/>";
  $message .= date("Y-m-d H:i:s") . "<br/><br/>";
  $message .= "$order->name<br/>";
  $message .= "$order->street1<br/>";
  $message .= "$order->zip<br/>";
  $message .= "$order->city<br/>";
  $message .= "Email: $order->email<br/><br/>";
  $message .= "Fler erbjudanden: $order->offer<br/><br/>";
 */


//rep_saveToLogFile(rep_getLogFileName(), "Order: \r\n" . $message, 'INFO');
//rep_sendMail($title, $message, $to, $to_name, $from, $from_name);

require_once(__DIR__ . '/../wp-config.php');
$success = wp_mail($to_email, $title, $message);

echo 'tjo';

$response = json_encode(array('success' => $success));
header('Cache-Control: no-cache, must-revalidate');
header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
header('Content-type: application/json');
echo $response;
die();




/**
 * Send email, in utf8, check for valid email. Writes to log file 
 */
function rep_sendMail($title, $message, $to, $to_name, $from, $from_name) {
  $errMsg = '';
  if (filter_var($to, FILTER_VALIDATE_EMAIL)) {
    rep_saveToLogFile(rep_getLogFileName(), "Sending email: " . $title . ", to: $to ", 'INFO');

    $headers = 'To: ' . $to_name . ' <' . $to . '>' . "\r\n";
    $headers .= 'From: ' . $from_name . ' <' . $from . '>' . "\r\n";
    $headers .= 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
    $success = mail($to, $title, $message, $headers);
  } else {
    $success = false;
    $errMsg = "Invalid email, doesn't pass filter";
  }
  if (!$success) {
    rep_saveToLogFile(rep_getLogFileName(), "Failed to send email: " . $title . ", to: $to \r\nError message: " . $errMsg, 'ERROR');
  }
}

/**
 * Writes to log file. Adds datetime end serverity. INFO is the default severity
 * If the file does not exist then it will be created first 
 */
function rep_saveToLogFile($filename, $data, $type = 'INFO') {
  if (!file_exists($filename)) {
    touch($filename);
  }
  $fh = fopen($filename, 'a') or die("can't open file");
  fwrite($fh, "\n" . date('Y-m-d H:m:s') . ' [' . $type . '] ');
  fwrite($fh, $data);
  fclose($fh);
}

/**
 * Get the logfile name. a new file every month 
 * @return string 
 */
function rep_getLogFileName() {
  $logFile = dirname(__FILE__) . '/log/reptilo' . "." . date("y-m") . ".log";
  return $logFile;
}