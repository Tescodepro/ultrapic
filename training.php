<!DOCTYPE html>
<html lang="en">

<?php
include "controllers/configController.php";
$title = "Ultrapic - Training | Embedded System and Robotic Limited";
include 'layout/head.php';
?>

<body>
	<!-- start Header -->
	<?php include 'layout/menu.php' ?>
	<!-- end Header -->
	<main id="mainContent">
		<!-- start section -->
		<section class="section--no-padding section">
			<div class="subpage-header">
				<div class="subpage-header__bg" data-bg="images/subpage-title-img/subpage-title-img03.jpg">
					<div class="container">
						<div class="subpage-header__block">
							<div class="subpage-header__caption">Ultrapic.</div>
							<h1 class="subpage-header__title">Ultrapic Training</h1>
							<div class="subpage-header__line"></div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- end section -->
		<!-- start section -->
		<section class="section--no-padding section--pr">
			<div class="section--bg-wrapper-03 section__indent-left"></div>
			<div class="section__indent-05">
				<div class="container">
					<div class="row">
						<div class="col-sm-6">
							<div class="section-heading">
								<div class="description"><i></i>Training</div>
								<h4 class="title title-lg">Registration Form</h4>
							</div>
							<strong class="base-color-01">
								In an effort to improve our level of service, Ultrapic now offers life-long free
								training to its customers who procure new robotic systems from the company.

							</strong>
							<p>
								Training is conducted at our training facility and is given to 5 delegates at a time.
								The training takes place over 4 days. Additional training can also be booked at a
								competitive rate
							</p>
							<p>
								We offer:
							<ul>
								<li>Introduction to Robot Programming</li>
								<li>Basic Agricultural Drone Pilot</li>
								<li>Microcontroller Programming</li>
								<li>Advanced Robot/Embedded systems Programming Training</li>
							</ul>
							</p>
						</div>
						<div class="divider divider__lg d-block d-sm-none"></div>
						<div class="col-sm-5 offset-lg-1">
							<form class="contact-form form-default" method="post" action="controllers/registrationController.php">
								<p style="color: #2e3192; font-weight:700">Complete the form below to enroll in a
									training session </p> <br>
									<?php include 'controllers/message.php'; ?>
								<div class="row">
									<div class="col-md-12 col-lg-12">
										<div class="notes d-md-none d-lg-none d-xl-none">
											* – fields are required
										</div>
										<div class="form-group">
											<label class="placeholder-label">Matric Number *</label>
											<input type="text" name="matric_no" class="form-control" id="matric" required>
										</div>
										<div class="form-group">
											<label class="placeholder-label">First name (Your Name) *</label>
											<input type="text" name="first_name" class="form-control" id="inputName"
												required>
										</div>
										<div class="form-group">
											<label class="placeholder-label">Middle name (Other Name)</label>
											<input type="text" name="middle_name" class="form-control" id="inputName">
										</div>
										<div class="form-group">
											<label class="placeholder-label">Last name (Surname)*</label>
											<input type="text" name="last_name" class="form-control" id="inputLast"
												required>
										</div>
										<div class="form-group">
											<label class="placeholder-label">Contact Phone Number *</label>
											<input type="text" name="phone" class="form-control" id="inputName"
												required>
										</div>
										<div class="form-group">
											<label class="placeholder-label">Email (One email for a registration)</label>
											<input type="email" name="email" class="form-control" id="cf-inputEmail"
												required>
										</div>
										<div class="form-group">
											<div class="wrapper-select-for-title">
												<label class="placeholder-label">Choose You Department *</label>
												<select name="department_id" class="js-init-select select-custom-02" required>
													<option value="">Choose Department</option>
													<?php
														while ($rowDepartment = mysqli_fetch_array($getDepartmentQuery)) {
															$department_id = $rowDepartment['department_id'];
															$department_name = $rowDepartment['department_name'];
															echo '<option value="'.$department_id.'">'.$department_name.'</option>';
														}
													?>
												</select>
											</div>
										</div>
										<div class="form-group">
											<div class="wrapper-select-for-title">
												<label class="placeholder-label">Choose Course *</label>
												<select name="register_courses_id" class="js-init-select select-custom-02" required>
													<option value="">Choose Course</option>
													<?php
														while ($rowCourse = mysqli_fetch_array($getCourseQuery)) {
															$course_id = $rowCourse['course_id'];
															$course_name = $rowCourse['course_name'];
															echo '<option value="'.$course_id.'">'.$course_name.'</option>';
														}
													?>
												</select>
											</div>
										</div>
										<div class="form-group">
											<div class="wrapper-select-for-title">
												<label class="placeholder-label">Level *</label>
												<select name="level" class="js-init-select select-custom-02" required>
													<option value="">Choose Level</option>
													<option value="100">100 Level</option>
													<option value="200">200 Level</option>
													<option value="300">300 Level</option>
													<option value="400">400 Level</option>
													<option value="500">500 Level</option>
												</select>
											</div>
										</div>
										<button type="submit" name="enrol" class="btn btn-sm">Submit</button>
									</div>
								</div>
							</form>

							<div class="extra-block01"></div>
						</div>
					</div>
					<div class="divider divider__48 d-none d-lg-block d-xl-block"></div>

				</div>
			</div>
		</section>
		<!-- end section -->

		<!-- start section -->
		<section class="section section-default-top">
			<div class="container">
				<div class="section-heading section-heading_indentg04">
					<div class="description"><i></i>History</div>
					<h4 class="title">Successful Training</h4>
				</div>
				<div class="galley-masonry">
					<div class="container">
						<div class="filter-nav">
							<div class="button active" data-filter="*">ALL</div>
							<div class="button" data-filter=".sort-value-01">Training Session</div>
							<div class="button" data-filter=".sort-value-02">Training Room</div>
						</div>
					</div>
					<div class="tt-portfolio-content layout-default row no-gutters">
						<div class="element-item sort-value-01 col-sm-6 col-md-4 col-lg-3">
							<a href="images/gallery/p1.png" class="btn-zomm">
								<figure>
									<img src="images/gallery/p1.png" alt="">
									<figcaption>
										<h6 class="gallery-title">Training Session</h6>
									</figcaption>
								</figure>
							</a>
						</div>
						<div class="element-item sort-value-01 col-sm-6 col-md-4 col-lg-3">
							<a href="images/gallery/p2.png" class="btn-zomm">
								<figure>
									<img src="images/gallery/p2.png" alt="">
									<figcaption>
										<h6 class="gallery-title">Training Session</h6>
									</figcaption>
								</figure>
							</a>
						</div>
						<div class="element-item sort-value-01 col-sm-6 col-md-4 col-lg-3">
							<a href="images/gallery/p3.png" class="btn-zomm">
								<figure>
									<img src="images/gallery/p3.png" alt="">
									<figcaption>
										<h6 class="gallery-title">Training Session</h6>
									</figcaption>
								</figure>
							</a>
						</div>
						<div class="element-item sort-value-03 col-sm-6 col-md-4 col-lg-3">
							<a href="images/gallery/p4.png" class="btn-zomm">
								<figure>
									<img src="images/gallery/p4.png" alt="">
									<figcaption>
										<h6 class="gallery-title">Training Session</h6>
									</figcaption>
								</figure>
							</a>
						</div>
						<div class="element-item sort-value-02 col-sm-6 col-md-4 col-lg-3">
							<a href="images/gallery/p5.png" class="btn-zomm">
								<figure>
									<img src="images/gallery/p5.png" alt="">
									<figcaption>
										<h6 class="gallery-title">Training Room</h6>
									</figcaption>
								</figure>
							</a>
						</div>
						<div class="element-item sort-value-01 col-sm-6 col-md-4 col-lg-3">
							<!-- <a href="http://www.dailymotion.com/video/xxgmlg#.UV71MasY3wE"
								class="videolink video-popup"> -->
							<a href="images/gallery/p6.png" class="btn-zomm">
								<figure>
									<img src="images/gallery/p6.png" alt="">
									<figcaption>
										<h6 class="gallery-title">Training Session</h6>
									</figcaption>
								</figure>
								<!-- <div class="videolink__icon"></div> -->
							</a>
						</div>
						<div class="element-item sort-value-02 col-sm-6 col-md-4 col-lg-3">
							<a href="images/gallery/p7.png" class="btn-zomm">
								<figure>
									<img src="images/gallery/p7.png" alt="">
									<figcaption>
										<h6 class="gallery-title">Training Room</h6>
									</figcaption>
								</figure>
							</a>
						</div>
						<div class="element-item sort-value-01 col-sm-6 col-md-4 col-lg-3">
							<a href="images/gallery/p8.png" class="btn-zomm">
								<figure>
									<img src="images/gallery/p8.png" alt="">
									<figcaption>
										<h6 class="gallery-title">Training Session</h6>
									</figcaption>
								</figure>
							</a>
						</div>
						<div class="element-item sort-value-01 col-sm-6 col-md-4 col-lg-3">
							<a href="images/gallery/p9.png" class="btn-zomm">
								<figure>
									<img src="images/gallery/p9.png" alt="">
									<figcaption>
										<h6 class="gallery-title">Training Session</h6>
									</figcaption>
								</figure>
							</a>
						</div>
						<div class="element-item sort-value-01 col-sm-6 col-md-4 col-lg-3">
							<a href="images/gallery/p10.png" class="btn-zomm">
								<figure>
									<img src="images/gallery/p10.png" alt="">
									<figcaption>
										<h6 class="gallery-title">Training Session</h6>
									</figcaption>
								</figure>
							</a>
						</div>
						<div class="element-item sort-value-01 col-sm-6 col-md-4 col-lg-3">
							<a href="images/gallery/p11.png" class="btn-zomm">
								<figure>
									<img src="images/gallery/p11.png" alt="">
									<figcaption>
										<h6 class="gallery-title">Training Session</h6>
									</figcaption>
								</figure>
							</a>
						</div>
						<div class="element-item sort-value-01 col-sm-6 col-md-4 col-lg-3">
							<a href="images/gallery/p12.png" class="btn-zomm">
								<figure>
									<img src="images/gallery/p12.png" alt="">
									<figcaption>
										<h6 class="gallery-title">Training Session</h6>
									</figcaption>
								</figure>
							</a>
						</div>
					</div>
				</div>
			</div>
		</section><br><br>

		<!-- end section -->
	</main>

	<?php
	include 'layout/footer.php';
	include 'layout/sidemenu.php';
	include 'layout/js.php';
	?>
</body>

</html>