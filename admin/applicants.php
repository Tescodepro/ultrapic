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
                        <?php
                        if (isset ($_GET['type'])) {
                            if ($_GET['type'] == 'success') {
                                echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                                        <strong>Well done!</strong> ' . $_GET['msg'] . '
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                      </div>';
                            } else {
                                echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        <strong>Oh snap!</strong> ' . $_GET['msg'] . '
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                      </div>';
                            }
                        }
                        ?>
                        <div class="col-xxl-12">
                            <div class="d-flex flex-column h-100">
                                <div class="col-lg-12">
                                    <div class="card">
                                        <div class="card-header"
                                            style="display: flex; justify-content: space-between; align-items: center;">
                                            <h5 class="card-title mb-0">Applied Students</h5>
                                            <a href="download_student.php" class="btn btn-sm btn-success">Download
                                                Students</a>
                                        </div>
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                <table id="buttons-datatables" class="display table table-bordered"
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
                                                            <th data-ordering="false">Action</th>
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
                                                            $id = $fetch['id'];
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
                                                                <td>
                                                                    <button type="button" class="btn btn-sm btn-soft-danger" data-bs-toggle="modal" data-bs-target="#studentModal<?php echo $count; ?>">Delete</button>
                                                                </td>
                                                            </tr>
                                                            <div class="modal fade" id="studentModal<?php echo $count; ?>" tabindex="-1" role="dialog"
                                                                aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
                                                                <div class="modal-dialog modal-dialog-scrollable">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title" id="exampleModalScrollableTitle">Delete Applicant Confirmation</h5>
                                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                        </div>
                                                                        <form action="controller/generalController.php" method="post">
                                                                            <input type="hidden" name="id" value="<?php echo $id; ?>">
                                                                            <input type="hidden" name="redirect" value="applicants.php">
                                                                            <input type="hidden" name="table" value="students">
                                                                            <div class="modal-body">
                                                                            <center>
                                                                                <span style="color:red; font-size: 18px; text-align:center;"> Are you sure you want to delete the applicant with: <br>
                                                                                Application ID: <b>
                                                                                    <?php echo $application_id; ?>
                                                                                        </b> <br>
                                                                                        Name: <b>
                                                                                            <?php echo $name; ?>
                                                                                        </b>
                                                                                    </span>
                                                                                </center>
                                                                            </div>
                                                                            <div class="modal-footer">
                                                                                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                                                                <button type="submit" name="delete" class="btn btn-danger" id="deleteApplicantBtn">Delete Applicant</button>
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        <?php } ?>

                                                    </tbody>
                                                </table>
                                            </div>
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

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <!--datatable js-->
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.html5.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>

    <script src="assets/js/pages/datatables.init.js"></script>
    <!-- App js -->
    <script src="assets/js/app.js"></script>
</body>

</html>