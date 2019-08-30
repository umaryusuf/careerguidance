<?php  $page_title = "contact" ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>
  <meta name="description" content="" />

	<title>Contact | Career Guidance</title>

	<!-- links to favicon, fonts & external css -->
  <?php require_once 'includes/external.php'; ?>
  
</head>
<body>
	<!-- links to navigation -->
  <?php require_once 'includes/nav.php'; ?>

	<div class="container">
	  <div class="row">
	  	<div class="col s12">
	  		<h2 class="orange-text accent-2">Contact Us</h2>
	  	</div>
	  </div>
	</div>

	<div class="container">
    <div class="section">
      <div class="row">
        <div class="col s12 m4 push-m8">
          <h4>Address</h4>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing laborum.</p>
          <p><i class="mdi mdi-map-marker orange-text accent-2"></i> Barnawa, Kaduna State, Nigeria. </p>
          <p><i class="mdi mdi-phone-in-talk orange-text accent-2"></i> +234 (0) 806 **** ***</p>
          <p><i class="mdi mdi-email orange-text accent-2"></i> admin@site.com</p>
        </div>
        <div class="col s12 m8 pull-m4 ">
          <div class="row">
            <h4>Message</h4>
            <p>Send us your message, questions or recomendations.</p>
            <form class="col s12" role="form" method="POST" action="">
              <div class="input-field">
                <i class="mdi mdi-account prefix"></i>
                <input id="fullname" type="text" class="validate" name="fullname">
                <label for="fullname">Full Name:</label>
              </div>
              <div class="row">
                <div class="input-field col s12 m6">
                  <i class="mdi mdi-cellphone prefix"></i>
                  <input id="phone" type="tel" class="validate" name="phone">
                  <label for="phone">Phone:</label>
                </div>
                <div class="input-field col s12 m6">
                  <i class="mdi mdi-email-outline prefix"></i>
                  <input id="email" type="email" class="validate" name="email">
                  <label for="email">Email:</label>
                </div>
              </div>
              <div class="input-field">
                <i class="mdi mdi-message-text prefix"></i>
                <textarea id="message" class="materialize-textarea" name="message"></textarea>
                <label for="message">Message:</label>
              </div>
              <br>
              <button class="btn btn-large waves-effect hoverable waves-light block orange lighten-2" type="submit" name="submit">Send Message
              </button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- link to footer -->
  <?php require_once 'includes/footer.php'; ?>

  <!-- links to external javascript -->
  <?php require_once 'includes/js_includes.php'; ?>
</body>
</html>