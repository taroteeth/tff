<?php

function contact_form_submit() {

  global $wpdb;
  $table = 'custom_form_entries';
  $userID = (get_current_user_id() !== 0) ? get_current_user_id() : null;

  //user posted variables
  $name = $_POST['full_name'];
  $email = $_POST['email'];
  $company = $_POST['company_name'];
  $message = $_POST['message'];

  $data = array(
    'user_id' => $userID,
    'name' => $name,
    'email' => $email,
    'message' => $message,
    'company' => $company
  );

  $format = ['%d', '%s', '%s', '%s', '%s'];

  // Filter Mail
  function set_html_mail_content_type() {
    return 'text/html';
  }
  add_filter( 'wp_mail_content_type', 'set_html_mail_content_type' );

  //php mailer variables
  $to = ['dev@knowncreative.co', 'zarah@knowncreative.co'];
  $subject = 'Test contact form';
  $headers = 'From: '. $email . "\r\n" . 'Reply-To: ' . $email . "\r\n";

  $sent = wp_mail($to, $subject, $message, $headers);

  $wpdb->insert( $table, $data, $format );
  
  if($sent) {
    echo 'success';
  } else {
    echo $message;
  }

  // Reset filter to avoid conflicts
  remove_filter( 'wp_mail_content_type', 'set_html_mail_content_type' );

  exit();
}

add_action('wp_ajax_nopriv_contact_form_submit', 'contact_form_submit');
add_action('wp_ajax_contact_form_submit', 'contact_form_submit');

?>
