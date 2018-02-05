<?php

$contactTitle = get_sub_field('contact_title');

?>

<div class='contact-module'>
  <form class="contact-form" id="contact-form" novalidate>
    <div class='inner'>

      <?php

      if($contactTitle){
        echo '<p class="header">'. $contactTitle .'</p>';
      }

      ?>

      <div class="fields">

        <div class="field half">
          <label>Full Name*</label>
          <input type="text" name="full_name" required />
          <div class="inline-msg"></div>
        </div><!-- full-name -->

        <div class="field half">
          <label>Email*</label>
          <input type="email" name="email" required />
          <div class="inline-msg"></div>
        </div><!-- email -->

        <div class="field full">
          <label>Company Name*</label>
          <input type="text" name="company_name" required />
          <div class="inline-msg"></div>
        </div><!-- company-name -->

        <div class="field full text-area">
          <label>Message*</label>
          <textarea name="message"></textarea>
        </div>

        <div class="field full">
          <label>Are you human? 2 + 7 =</label>
          <input type="text" name="not_human" required />
          <div class="inline-msg"></div>
        </div>

      </div><!-- .fields -->

      <button type="submit" name="request-info" id="contact-button">
        <span>Request Info</span>
      </button>

    </div><!-- inner -->
  </form> <!-- contact-form -->

</div> <!-- .contact-module -->
