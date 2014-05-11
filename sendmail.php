<?php
//print_r($_REQUEST);
//error_reporting(E_ALL);

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
!empty($_REQUEST['spam']) ? $order->spam = $_REQUEST['spam'] : $order->spam = 'NEJ';
!empty($_REQUEST['pren']) ? $order->pren = $_REQUEST['pren'] : $order->pren = '0';


//$to_email = "kristian@reptilo.se";
//$to_name = "Kristian Reptilo";
$to_email = "malin.gelberg@mediavanner.se";
$to_name = "Malin Gelberg";
$from_email = "info@magasinspring.se";
$from_name = "Pren";
$title = "Prenumeration på Spring, $order->pren nr";
$date = date("Y-m-d H:i:s");


// This is the WP-version 
$message = <<<MSG
Prenumeration på $order->pren nummer av Spring 
$date    
$order->name
$order->street
$order->zip  $order->city
Email: $order->email
Fler erbjudanden: $order->spam       
MSG;

rep_saveToLogFile(rep_getLogFileName(), "\r\n". $message ."\r\n\r\n", 'INFO');
include __DIR__ . '/../wp-config.php';
$success = wp_mail($to_email, $title, $message);
$response = json_encode(array('success' => $success));
$response = 1;



//send a email to prenumeranten as well
$to_email = $order->email;
$to_name = $order->name;
$from_email = "info@magasinspring.se";
$from_name = "Info";
$title = "Prenumeration på Spring, $order->pren nr";
$date = date("Y-m-d H:i:s");
$message = <<<MSG
Tack för din beställning. Ditt första nummer kommer den 15 september, då kommer även fakturan. Fram till dess håll koll på vår FB sida där du löpande får information om vad som händer i projektet: www.facebook.com/magasinspring

Ha en härlig sommar med förhoppningsvis många underbara löpupplevlser

BG Nilensjö
Chefredaktör magasinet Spring
MSG;
rep_saveToLogFile(rep_getLogFileName(), "\r\n". $to_name . "  " . $from_email ."\r\n". $message ."\r\n\r\n", 'INFO');
include __DIR__ . '/../wp-config.php';
$success = wp_mail($to_email, $title, $message);
//$response = json_encode(array('success' => $success));
//$response = 1;




// This is the non-WP version 
/*
$message = "Prenumeration på $order->pren nummer av Spring" . "<br>";  
$message .= "$date" . "<br>";  
$message .= "$order->name" . "<br>";
$message .= "$order->street" . "<br>";
$message .= "$order->zip  $order->city" . "<br>";
$message .= "Email: $order->email" . "<br>";
$message .= "Fler erbjudanden: $order->spam" . "<br><br>"; 
 * 
rep_saveToLogFile(rep_getLogFileName(), "Prenumerations-email: \r\n" . $message, 'INFO');
$success = rep_sendMail($title, $message, $to_email, $to_name, $from_email, $from_name);
$response = json_encode($success ? '1' : '0');
*/

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
    rep_saveToLogFile(rep_getLogFileName(), "Misslyckades att skicka email: " . $title . ", to: $to \r\nError message: " . $errMsg, 'ERROR');
  }
  return $success;
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
  $logFile = dirname(__FILE__) . '/log/spring_email' . "." . date("y-m") . ".log";
  return $logFile;
}