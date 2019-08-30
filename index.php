<?php  $page_title = "home"; ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>
  <meta name="description" content="" />

	<title>Career Guidance</title>
  
  <!-- links to favicon, fonts & external css -->
	<?php require_once 'includes/external.php'; ?>

</head>
<body>
  <!-- links to navigation -->
	<?php require_once 'includes/nav.php'; ?>

	<div id="index-banner" class="parallax-container">
    <div  class="section no-pad-bot">
      <div class="container center">
        <h1 class="header center orange-text lighten-2 main">Career Guidance</h1>
        <h5 class="white-text lighten-2 para">Not sure about what to study or a course requirement? Career guidance is a platform that provide the courses aligned to a career, the tertiary institution to attend, the JAMB subject combination, the WAEC pases required to attend the course, and the job opportunities aligned to the chosen line of career.</h5>
        <div class="row center">
          <form action="search_result.php" method="get" enctype="multipart/form-data">
          	<div class="row">
			        <div class="input-field col s10 offset-s1 m10 offset-m1 l10 offset-l1 search-container">
			          <i class="mdi mdi-magnify prefix"></i>
			          <input id="icon_prefix" type="text" placeholder="Enter a profession" name="q" class="validate flow-text">
			          <button type="submit" class="btn waves-effect waves-light hoverable orange ">Search</button>
			        </div>
			      </div>
          </form>
        </div>
        <br>
      </div>
    </div>
    <div class="parallax"><img src="images/2.jpg" alt="background img" ></div>
  </div>

	<div class="container">
    <div class="section">
      <div class="row">
        <div class="col s12 m12">
          <h4 class="center-align orange-text accent-2">Your Career Matters</h4>
        </div>
      </div>
      <div class="row">
        <div class="col s12 m4">
          <div class="icon-block">
            <h2 class="center orange-text accent-2"><i class="mdi mdi-school"></i></h2>
            <div class="card-panel hoverable">
            <h5 class="orange-text center-align">Career</h5>
            	<p class="black-text justify">
            		Lorem ipsum dolor sit amet, consectetur adipisicing elit. Magni, quod, perferendis. Eligendi deleniti dolores beatae ducimus provident, facere ab asperiores ad vero inventore! Impedit quae molestias commodi fugit error esse.
            	</p>
            </div>
          </div>
        </div>

        <div class="col s12 m4">
          <div class="icon-block">
            <h2 class="center orange-text accent-2"><i class="mdi mdi-book-open-page-variant"></i></h2>
            <div class="card-panel hoverable">
            	<h5 class="orange-text center-align">Opportunities</h5>
            	<p class="black-text justify">
            		Lorem ipsum dolor sit amet, consectetur adipisicing elit. Et beatae reiciendis quae, laudantium sequi, impedit quis cumque totam suscipit autem, amet quibusdam aliquam deleniti unde. Explicabo dignissimos maxime, qui. Quas.
            	</p>
            </div>
          </div>
        </div>

        <div class="col s12 m4">
          <div class="icon-block">
            <h2 class="center orange-text accent-2t"><i class="mdi mdi-library-books"></i></h2>
            <div class="card-panel hoverable">
            <h5 class="orange-text center-align">Academics</h5>
            	<p class="black-text justify">
            		Lorem ipsum dolor sit amet, consectetur adipisicing elit. Natus dolore mollitia numquam, tempora architecto perferendis enim eligendi illum provident obcaecati rerum fugit velit ipsum eum, soluta amet assumenda adipisci. Error.
            	</p>
            </div>
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