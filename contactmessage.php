<?php

  header("Content-Type: application/json");
  
  $name = $_POST['name'];
  $email= $_POST['email'];
  $mobile = $_POST['mobile'];
  $city = $_POST['city'];
  $message = $_POST['message'];

  $to = "mail@dglholidays.com";
  $from = "mail@dglholidays.com";


  $Subject = "DGL-Holidays Contact-Us Form";
  $headers = "From: " . $from . "\r\n";
  $headers .= "Reply-To: ". $from . "\r\n";
  $headers .= "MIME-Version: 1.0\r\n";
  $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
  $headers1 = "From: " . $to . "\r\n";
  $headers1 .= "Reply-To: ". $to. "\r\n";
  $headers1 .= "MIME-Version: 1.0\r\n";
  $headers1 .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
    
  // prepare email body text
  $body = "<!DOCTYPE html><html lang='en'><head><meta charset='UTF-8'><title>Express Mail</title></head><body>";
  $body .= "<table style='width: 100%;'>";
  $body .= "<thead style='text-align: center;'><tr><td style='border:none;' colspan='2'>";

  $body .= "</td></tr></thead><tbody>";
  $body .= "<tr><td style='border:none;'><strong>Name:</strong> {$name}</td></tr>";
  $body .= "<tr><td style='border:none;'><strong>E-mail ID:</strong> {$email}</td></tr>";
  $body .= "<tr><td style='border:none;'><strong>Mobile No:</strong> {$mobile}</td></tr>";

  $body .= "<tr><td style='border:none;'><strong>City:</strong> {$city}</td></tr>";
  $body .= "<tr><td></td></tr>";
  $body .= "<tr><td colspan='2' style='border:none;'><strong>Message:</strong> {$message}</td></tr>";
  $body .= "</tbody></table>";
  $body .= "</body></html>";
  // prepare reply email body text
  
  // send email
  if(mail($to, $Subject, $body, $headers)){
    echo $success;
    $data =  array("result" => "Message sended successfully!!");
    echo json_encode($data, true);
  }
  else{
    $data =  array("result" => "Mail Not send");
    echo json_encode($data, true);
  }
    
    

?>