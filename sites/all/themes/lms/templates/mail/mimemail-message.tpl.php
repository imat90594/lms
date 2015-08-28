<?php

/**
 * @file
 * Default theme implementation to format an HTML mail.
 *
 * Copy this file in your default theme folder to create a custom themed mail.
 * Rename it to mimemail-message--[module]--[key].tpl.php to override it for a
 * specific mail.
 *
 * Available variables:
 * - $recipient: The recipient of the message
 * - $subject: The message subject
 * - $body: The message body
 * - $css: Internal style sheets
 * - $module: The sending module
 * - $key: The message identifier
 *
 * @see template_preprocess_mimemail_message()
 */
?>


<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <?php if ($css): ?>
    <style type="text/css">
      <!--
      <?php print $css ?>
      -->
    </style>
    <?php endif; ?>
  </head>
  <?php $domain = (!empty($_SERVER['HTTPS'])) ? "https://".$_SERVER['SERVER_NAME'] : "http://".$_SERVER['SERVER_NAME']; ?>
  <body id="mimemail-body" <?php if ($module && $key): print 'class="email '. $module .'-'. $key .'"'; endif; ?>>
  	<div class="content">
  	  	<div id="header">
  	  		<div class="section-1">
				<a class="mobile-logo" href="<?php echo $domain?>"><img class="main-logo" src="<?php print theme_get_setting('logo');?>" alt="logo"/></a>
			</div>
	  	</div>
	  	
	    <div id="center" class="section-2">
	      <div id="main">
	        <?php print $body ?>
	      </div>
	    </div>
	    
	   <div id="footer">
			<div class="footer-section">
				<div class="left">
					<div>
						<h4>LMS</h4>
						<ul>
							<li><a href="<?php echo $domain?>/">Home</a></li>
							<li><a href="<?php echo $domain?>/user">Account</a></li>
							<li><a href="<?php echo $domain?>/user">Purchases</a></li>
							<li><a href="<?php echo $domain?>/courses">Courses</a></li>
							<li><a href="<?php echo $domain?>/about-careertastic">About Us</a></li>
							<li><a href="<?php echo $domain?>/contact-us">Contact Us</a></li>
						</ul>
					</div>
				</div>
				<div class="right">
					<div>
						<h4>Opportunities</h4>
						<ul>
							<li><a href="<?php echo $domain?>/careertastic-promise">Careertastic Promise</a></li>
							<li><a href="<?php echo $domain?>/environment-contact-form">Environment</a></li>
							<li><a href="<?php echo $domain?>/partners-contact-form">Partnership</a></li>
						</ul>
					</div>
				</div>
			</div>
			
			<div class="footer-section">
				<div class="left">
					<div>
						<h4>More Info</h4>
						<ul>
							<li><a href="<?php echo $domain?>/careertastic-faqs">Careertastic FAQs</a></li>
							<li><a href="<?php echo $domain?>/merchant-faqs">Merchant FAQs</a></li>
							<li><a href="<?php echo $domain?>/privacy-cookies-policy">Privacy Policy</a></li>
							<li><a href="<?php echo $domain?>/terms-use">Terms and Conditions</a></li>
							<li><a href="<?php echo $domain?>/e-commerce-terms">E-Commerce Terms</a></li>
						</ul>
					</div>
				</div>
			</div>
			
			<div class="footer-section">
				<center>
					<p> © 2015 LMS. All right reserved</p>
				</center>
			</div>
		</div>
		
		
  	</div>
  </body>
</html>