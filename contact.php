<!DOCTYPE html>
<html lang="en">

<?php
$title = "Ultrapic - Training | Embedded System and Robotic Limited";
include 'layout/head.php';
?>

<body>
	<!-- start Header -->
	<?php include 'layout/menu.php' ?>
	<!-- end Header -->
	<main id="mainContent">
		<div class="section--bg-wrapper-02">
			<!-- start section -->
			<section class="section--no-padding section">
				<div class="subpage-header">
					<div class="subpage-header__bg" data-bg="images/subpage-title-img/subpage-title-img07.jpg">
						<div class="container">
							<div class="subpage-header__block">
								<div class="subpage-header__caption">Ultrapic.</div>
								<h1 class="subpage-header__title">Contact Us</h1>
								<div class="subpage-header__line"></div>
							</div>
						</div>
					</div>
				</div>
			</section>
			<!-- end section -->
			<!-- start section -->
			<section class="section section__indent-15">
				<div class="container">
					<div class="section-heading section-heading_indentg02">
						<div class="description"><i></i>Contact Form</div>
						<h2 class="title">Please use the Form</h2>
					</div>
					<form class="contact-form form-default" id="contactform" method="post" novalidate="novalidate" action="#">
						<div class="row">
							<div class="col-md-5 col-lg-4">
								<div class="notes d-md-none d-lg-none d-xl-none">
									* – fields are required
								</div>
								<div class="form-group">
									<label class="placeholder-label">First name *</label>
									<input type="text" name="name" class="form-control" id="inputName">
								</div>
								<div class="form-group">
									<label class="placeholder-label">Last name *</label>
									<input type="text" name="name2" class="form-control" id="inputLast">
								</div>
								<div class="form-group">
									<label class="placeholder-label">Email</label>
									<input type="text" name="email" class="form-control" id="cf-inputEmail">
								</div>
								<div class="form-group">
									<div class="wrapper-select-for-title">
										<label class="placeholder-label">Industry *</label>
										<select name="industry" class="js-init-select select-custom-02">
											<option>Please select</option>
											<option>Agriculture</option>
											<option>Delivery</option>
											<option>MasMedia</option>
											<option>Entertaiment</option>
										</select>
									</div>
								</div>
								<div class="notes d-none d-md-block d-lg-block d-xl-block">
									* – fields are required
								</div>
							</div>
							<div class="divider divider__md notes d-md-none d-lg-none d-xl-none"></div>
							<div class="col-md-7 col-lg-8">
								<div class="form-group">
									<label class="placeholder-label">Message</label>
									<textarea name="message" class="form-control" id="textareaMessage"></textarea>
								</div>
								<button type="submit" class="btn">SEND MESSAGE</button>
							</div>
						</div>
					</form>
				</div>
			</section>
			<!-- end section -->
			<!-- start section -->
			<section class="section section-default-top">
				<div class="contact-info">
					<div class="contact-info__item">
						<div class="contact-info__img">
							<div class="googlemap" data-api-key="AIzaSyD5ES8GFHrarPhIVpDhFDea6fPtga0Wy4Y" data-marker="images/map-marker.png" data-longitude="-117.2697074" data-latitude="34.0887252"></div>
						</div>
						<div class="contact-info__description">
							<address>
								<p>
									<strong>Address</strong>
									Innovation Center <br>
							The Federal Polytechnic <br>
							Ilaro, Oja Odan Road Ilaro Ogun Sate Nigeria.
								</p>
								<p>
									<strong>Phone number</strong>
									+2348086613836
								</p>
								<p>
									<strong>Email</strong>
									<a href="mailto:abiodun@ultrapic.tech">abiodun@ultrapic.tech</a>
								</p>
							</address>
						</div>
					</div>
				</div>
			</section>
			<!-- end section -->
		</div>
	</main>
	<?php
	include 'layout/footer.php';
	include 'layout/sidemenu.php';
	include 'layout/js.php';
	?>
</body>

</html>