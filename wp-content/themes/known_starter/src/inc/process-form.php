<?php

$response = "";

function my_contact_form_generate_response($type, $message){
  global $response;
  if($type == "success") $response = "<div class='success'>{$message}</div>";
  else $response = "<div class='error'>{$message}</div>";

}

//response messages
$not_human       = "Human verification incorrect.";
$missing_content = "Please supply all information.";
$email_invalid   = "Email Address Invalid.";
$message_unsent  = "Message was not sent. Try Again.";
$message_sent    = "Thanks! Your message has been sent.";

//user posted variables
$name = $_POST['full_name'];
$email = $_POST['email'];
$company = $_POST['company'];
$message = $_POST['message'];
$not_human = $_POST['not_human'];

//php mailer variables
$to = get_option('admin_email');
$subject = "Someone sent a message from ".get_bloginfo('name');
$headers = 'From: '. $email . "\r\n" . 'Reply-To: ' . $email . "\r\n";


//validate presence of name and message
if(empty($name) || empty($message)){

  my_contact_form_generate_response("error", $missing_content);

} else {

  $sent = wp_mail($to, $subject, strip_tags($message), $headers);

  if($sent) {
    my_contact_form_generate_response("success", $message_sent);
  } else {
    my_contact_form_generate_response("error", $message_unsent);
  }

}
?>
