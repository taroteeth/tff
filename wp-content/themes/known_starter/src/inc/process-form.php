<?php

function contact_form_submit() {

  //user posted variables
  $name = $_POST['full_name'];
  $email = $_POST['email'];
  $company = $_POST['company'];
  $message = $_POST['message'];

  //php mailer variables
  $to = 'dev@knowncreative.co';
  $subject = 'Test contact form';
  $headers = 'From: '. $email . "\r\n" . 'Reply-To: ' . $email . "\r\n";

  $sent = wp_mail($to, $subject, $message, $headers);

  if($sent) {
    // TODO insert form submission as new row in database
    echo 'success';
  } else {
    echo 'error';
  }

  exit();
}

add_action('wp_ajax_nopriv_contact_form_submit', 'contact_form_submit');
add_action('wp_ajax_contact_form_submit', 'contact_form_submit');

?>
