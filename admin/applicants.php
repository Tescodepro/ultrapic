<?php
include 'islogin.php';
?>
<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg"
    data-sidebar-image="none" data-preloader="disable">
<head>
    <meta charset="utf-8" />
    <title>Students - Ultrapic</title>
    <?php include 'includes/head.php'; ?>
</head>

<body>

    <!-- Begin page -->
    <div id="layout-wrapper">
        <?php include 'includes/header.php'; ?>

        <!-- ========== App Menu ========== -->
        <?php include 'includes/menu.php'; ?>
        <!-- Left Sidebar End -->
        <!-- Vertical Overlay-->
        <div class="vertical-overlay"></div>

        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">

            <div class="page-content">
                <div class="container-fluid">

                    <!-- start page title -->
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                <h4 class="mb-sm-0">Applicant Student</h4>

                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboards</a></li>
                                        <li class="breadcrumb-item active">Applicant</li>
                                    </ol>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- end page title -->

                    <div class="row">
                        <div class="col-xxl-12">
                            <div class="d-flex flex-column h-100">
                                <div class="col-lg-12">
                                    <div class="card">
                                        <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                                            <h5 class="card-title mb-0">Applied Students</h5>
                                            <a href="download_student.php" class="btn btn-sm btn-success">Download Students</a>
                                        </div>
                                        <div class="card-body table-responsive  export-table">
                                            <table id="file-datatable" class="table table-bordered data-responsive key-buttons"
                                                style="width:100%">
                                                <thead>
                                                    <tr>
                                                        <th data-ordering="false">S/N</th>
                                                        <th data-ordering="false">Application Number</th>
                                                        <th data-ordering="false">Matric No</th>
                                                        <th data-ordering="false">Fullname</th>
                                                        <th data-ordering="false">Email</th>
                                                        <th data-ordering="false">Phone</th>
                                                        <th data-ordering="false">Level</th>
                                                        <th data-ordering="false">Course</th>
                                                        <th data-ordering="false">Department</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $count = 1;
                                                    $get_students = "SELECT * FROM students INNER JOIN courses ON courses.course_id = students.register_courses_id INNER JOIN departments ON departments.department_id = students.department_id";
                                                    $result_row = mysqli_query($dbconnect, $get_students);
                                                    while ($fetch = mysqli_fetch_array($result_row)) {
                                                        $application_id = $fetch['application_id'];
                                                        $matric_no = $fetch['matric_no'];
                                                        $email = $fetch['email'];
                                                        $phone = $fetch['phone'];
                                                        $level = $fetch['level'];
                                                        $course = $fetch['course_name'];
                                                        $department = $fetch['department_name'];
                                                        $name = $fetch['first_name'] . ' ' . $fetch['middle_name'] . ' ' . $fetch['last_name'];
                                                        ?>
                                                        <tr>
                                                            <td>
                                                                <?php echo $count++; ?>
                                                            </td>
                                                            <td>
                                                                <?php echo $application_id ?>
                                                            </td>
                                                            <td>
                                                                <?php echo $matric_no ?>
                                                            </td>
                                                            <td>
                                                                <?php echo $name; ?>
                                                            </td>
                                                            <td>
                                                                <?php echo $email; ?>
                                                            </td>
                                                            <td>
                                                                <?php echo $phone; ?>
                                                            </td>
                                                            <td>
                                                                <?php echo $level; ?>
                                                            </td>
                                                            <td>
                                                                <?php echo $course; ?>
                                                            </td>
                                                            <td>
                                                                <?php echo $department; ?>
                                                            </td>
                                                        </tr>
                                                        <div class="modal fade" id="studentModal<?php echo $count; ?>" tabindex="-1"
                                                                role="dialog" aria-labelledby="exampleModalScrollableTitle"
                                                                aria-hidden="true">
                                                                <div class="modal-dialog modal-dialog-scrollable">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title"
                                                                                id="exampleModalScrollableTitle">Applicant
                                                                                Details</h5>
                                                                            <button type="button" class="btn-close"
                                                                                data-bs-dismiss="modal" aria-label="Close">
                                                                            </button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <p style="color:red"> You are viewing student
                                                                                information with: <br> Application ID: <b>
                                                                                    <?php echo $student_id; ?>
                                                                                </b> <br> Name: <b>
                                                                                    <?php echo $name; ?>
                                                                                </b> </p>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btn-light"
                                                                                data-bs-dismiss="modal">Close</button>
                                                                            <button type="button"
                                                                                class="btn btn-success">Save
                                                                                changes</button>
                                                                        </div>
                                                                    </div><!-- /.modal-content -->
                                                                </div><!-- /.modal-dialog -->
                                                            </div><!-- /.modal -->
                                                    <?php } ?>

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div> <!-- end col-->


                    </div> <!-- end row-->

                </div>
                <!-- container-fluid -->
            </div>
            <!-- End Page-content -->

            <footer class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-6">
                            <script>document.write(new Date().getFullYear())</script> © Velzon.
                        </div>
                        <div class="col-sm-6">
                            <div class="text-sm-end d-none d-sm-block">
                                Design & Develop by Themesbrand
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
        <!-- end main content-->

    </div>
    <!-- END layout-wrapper -->






    <!-- JAVASCRIPT -->
    <script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/libs/simplebar/simplebar.min.js"></script>
    <script src="assets/libs/node-waves/waves.min.js"></script>
    <script src="assets/libs/feather-icons/feather.min.js"></script>
    <script src="assets/js/pages/plugins/lord-icon-2.1.0.js"></script>
    <script src="assets/js/plugins.js"></script>

    <!-- apexcharts -->
    <script src="assets/libs/apexcharts/apexcharts.min.js"></script>

    <!-- Vector map-->
    <script src="assets/libs/jsvectormap/js/jsvectormap.min.js"></script>
    <script src="assets/libs/jsvectormap/maps/world-merc.js"></script>
    <script src="assets/js/lordicon-0.2.0.js"></script>
    <script src="assets/js/jquery-3.6.0.min.js"></script>

    <!-- Dashboard init -->
    <script src="assets/js/pages/dashboard-analytics.init.js"></script>

    	      <!-- Internal Data tables -->
		<script src="assets/plugins/datatable/js/jquery.dataTables.min.js"></script>
		<script src="assets/plugins/datatable/js/dataTables.bootstrap5.js"></script>
		<script src="assets/plugins/datatable/js/dataTables.buttons.min.js"></script>
		<script src="assets/plugins/datatable/js/buttons.bootstrap5.min.js"></script>
		<script src="assets/plugins/datatable/js/jszip.min.js"></script>
		<script src="assets/plugins/datatable/pdfmake/pdfmake.min.js"></script>
		<script src="assets/plugins/datatable/pdfmake/vfs_fonts.js"></script>
		<script src="assets/plugins/datatable/js/buttons.html5.min.js"></script>
		<script src="assets/plugins/datatable/js/buttons.print.min.js"></script>
		<script src="assets/plugins/datatable/js/buttons.colVis.min.js"></script>
		<script src="assets/plugins/datatable/dataTables.responsive.min.js"></script>
		<script src="assets/plugins/datatable/responsive.bootstrap5.min.js"></script>
		<script src="assets/js/table-data.js"></script>

    <!-- App js -->
    <script src="assets/js/app.js"></script>
</body>

</html>