	<div class="navbar-fixed">
		<nav role="navigation">
			<div class="nav-wrapper container">
				<a href="index.php" class="brand-logo">CG</a>
				<!-- activate side-bav in mobile view -->
				<a href="#" data-activates="mobile" class="button-collapse"><i class="mdi mdi-menu"></i></a>
				<ul class="right hide-on-med-and-down">
					<li class="<?php echo ($page_title == 'home') ? 'active' : '' ?>"><a href="index.php">Home</a></li>
					<li class="<?php echo ($page_title == 'about') ? 'active' : '' ?>"><a href="about.php">About</a></li>
					<li class="<?php echo ($page_title == 'student') ? 'active' : '' ?>"><a href="student_login.php">Student</a></li>
					<li class="<?php echo ($page_title == 'counsellor') ? 'active' : '' ?>"><a href="counsellor_login.php">Counsellor</a></li>
					<li class="<?php echo ($page_title == 'contact') ? 'active' : '' ?>"><a href="contact.php">Contact</a></li>
				</ul>
				<!-- navbar for mobile -->
				<ul class="side-nav" id="mobile">
					<li class="<?php echo ($page_title == 'home') ? 'active' : '' ?>"><a href="index.php">Home</a></li>
					<li class="<?php echo ($page_title == 'about') ? 'active' : '' ?>"><a href="about.php">About</a></li>
					<li class="<?php echo ($page_title == 'student') ? 'active' : '' ?>"><a href="student_login.php">Student</a></li>
					<li class="<?php echo ($page_title == 'counsellor') ? 'active' : '' ?>"><a href="counsellor_login.php">Counsellor</a></li>
					<li class="<?php echo ($page_title == 'contact') ? 'active' : '' ?>"><a href="contact.php">Contact</a></li>
				</ul>
			</div>
		</nav>
	</div>