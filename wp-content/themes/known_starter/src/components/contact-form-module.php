<?php

$contactTitle = get_sub_field('contact_title');

?>

<div id='contact-module'>
  <form class="contact-form">
    <div class='inner'>

      <?php

      if($contactTitle){
        echo '<p class="header">'. $contactTitle .'</p>';
      }

      ?>

      <div class="fields">

        <div class="field half">
          <label>Full Name*</label>
          <input type="text" name="fullName"/>
        </div><!-- full-name -->

        <div class="field half">
          <label>Email*</label>
          <input type="text" name="email"/>
        </div><!-- email -->

        <div class="field full">
          <label>Company Name*</label>
          <input type="text" name="companyName"/>
        </div><!-- company-name -->

        <div class="field full text-area">
          <label>Message*</label>
          <input type="text" name="message"/>
        </div><!-- message -->

      </div><!-- .fields -->

      <button type="submit" name="request-info" id="contact-button">
        <span>Request Info</span>
      </button>

    </div><!-- inner -->
  </form> <!-- contact-form -->

</div> <!-- #contact-module -->
