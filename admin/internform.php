<?php
session_start();
if(!isset($_SESSION['legitEmail'])|| ($_SESSION['legitCDE'] != 'Admin')) {
    echo '<h1>You are not an authorised user</h1>';
    header("Location:../adminlog.php");
    //maybe redirect to login page
    die();
}
$email= $_SESSION['legitEmail'];

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "intern";
error_reporting(0);
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$e=($_SESSION['legitEmail']);
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@700;800;900&display=swap" rel="stylesheet">
    <title>Admin Panel</title>

    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;800&family=Roboto:wght@300;400;500;700;900&display=swap"
        rel="stylesheet">
    <!--fontawesome-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
        integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

    <link rel="stylesheet" href="css/style.css">
</head>

<body>


    <div id="wrapper">
        <div class="overlay"></div>

        <!-- Sidebar -->
        <nav class="fixed-top align-top" id="sidebar-wrapper" role="navigation">
            <div class="simplebar-content" style="padding: 0px;">
                <div class="py-3 px-3 mb-4 bg-light">
                    <div class="media d-flex align-items-center">
                    <?php
  // Include the database configuration file
  include ('conn.php');
  // Get images from the database
  $query = $conn->query("SELECT `dp` from `alogin` where email='".$e."'");
  if($query->num_rows > 0){
      while($row = $query->fetch_assoc()){
          $imageURL = 'changeDP2/'.$row["dp"];
          
  ?>
      <img src="<?= $imageURL; ?>"  class="card-img-top mr-3 rounded-circle img-thumbnail shadow-sm" alt="" style="height:7em; width:7em;" />
  <?php }} ?>
                        <div class="media-body">
                        <h4 class="m-0">
                            <?php echo $_SESSION['legitUser']; ?>    
                            </h4>
                            <p class="font-weight-normal text-muted mb-0">CDE</p>
                        </div>
                    </div>
                </div>
                <p class="sidebar-header font-weight-bold text-uppercase px-3 small pb-4 mb-0">Dashboard</p>

                <ul class="navbar-nav align-self-stretch">
                    <li class="nav-item">
                        <a class="nav-link " href="dash.php"> <i class="fa fa-home mr-3 text-primary"></i> Home</a>
                    </li>
                    <?php if($_SESSION['legitType']=='superadmin'){?>
                        <li class="nav-item">
                            <a class="nav-link" href="createsubadmin.php"> <i class="fa fa-home mr-3 text-primary"></i> Create Sub Admin</a>
                        </li>
                    <?php } ?>
                    <li class="nav-item">
                        <a class="nav-link" href="adminprofile.php"> <i class="fa fa-user mr-3 text-primary"></i>
                            Admin Profile</a>
                    </li>
                    <li class="has-sub nav-item">
                        <a class="nav-link collapsed active" href="#collapseIntern" role="button"
                            data-toggle="collapse">
                            <i class="fa fa-user text-primary mr-3"></i>Intern Details
                        </a>
                        <div class="collapse menu mega-dropdown" id="collapseIntern">
                            <div class="dropmenu" aria-labelledby="navbarDropdown">
                                <div class="container-fluid ">
                                    <div class="row">
                                        <div class="col-lg-12 px-2">
                                            <div class="submenu-box">
                                            <ul class="list-unstyled m-0">
                                                    <li><a href="internform.php">Add Intern Form</a></li>
                                                    <li><a href="viewinterns.php">View Intern Details</a></li>
                                                    <li><a href="attendance2.php">Intern Attendance</a></li>
                                                    <li><a href="approveinternleave.php">Approve Intern Leave</a></li>        
                                                    <li><a href="internleave.php">Intern Leave Details</a></li>
                                                    <li><a href="viewcurricular.php">View Intern Curricular Details</a>
                                                    </li>
                                                    <li><a href="viewinternextend.php">Intern Internship Extend
                                                            Details</a></li>
                                                </ul>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="has-sub nav-item">
                        <a class="nav-link collapsed" href="#collapseSalary" role="button"
                            data-toggle="collapse">
                            <i class="fa fa-user text-primary mr-3"></i>Salary Details
                        </a>
                        <div class="collapse menu mega-dropdown" id="collapseSalary">
                            <div class="dropmenu" aria-labelledby="navbarDropdown">
                                <div class="container-fluid ">
                                    <div class="row">
                                        <div class="col-lg-12 px-2">
                                            <div class="submenu-box">
                                                <ul class="list-unstyled m-0">
                                                    <li><a href="addsalary.php">Add Salary Details</a></li>
                                                    <li><a href="salary.php">View Salary Details</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="createtask.php"> <i class="fa fa-briefcase mr-3 text-primary"></i> Work Updates</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="createcertificate.php"> <i class="fa fa-trophy  mr-3 text-primary"></i>
                            Certificates</a>
                    </li>
                    <li class="has-sub nav-item">
                        <a class="nav-link collapsed" href="#collapseEvent" role="button"
                            data-toggle="collapse">
                            <i class="fa fa-user text-primary mr-3"></i>Event Details
                        </a>
                        <div class="collapse menu mega-dropdown" id="collapseEvent">
                            <div class="dropmenu" aria-labelledby="navbarDropdown">
                                <div class="container-fluid ">
                                    <div class="row">
                                        <div class="col-lg-12 px-2">
                                            <div class="submenu-box">
                                                <ul class="list-unstyled m-0">
                                                    <li><a href="createevent.php">Create Event</a></li>
                                                    <li><a href="eventdetails.php">Event Details</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <div id="content">

                <div class="container-fluid p-0 px-lg-0 px-md-0">
                    <!-- Topbar -->
                    <nav class="navbar navbar-expand navbar-light my-navbar sticky-top">

                        <!-- Sidebar Toggle (Topbar) -->
                        <div type="button" id="bar" class="nav-icon1 hamburger animated fadeInLeft is-closed"
                            data-toggle="offcanvas">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>

                        <!-- Topbar Navbar -->
                        <ul class="navbar-nav ml-auto">

                            <!-- Nav Item - User Information -->
                            <li class="nav-item" style="padding: 8px;">
                                <a href="logout.php" class="btn btn-warning" >LogOut</a>
                            </li>

                        </ul>

                    </nav>
                    <!-- End of Topbar -->

                    <!-- Begin Page Content -->
                    <div class="container-fluid px-lg-4">
                        <div class="row">
                            <div class="col-md-12 mt-lg-4 mt-4">
                                <!-- Page Heading -->
                                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                                    <h1 class="h3 mb-0 text-gray-800">Add Intern Details</h1>
                                    <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                            class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <form class="needs-validation" action="insertintern.php" novalidate method="POST">
                                    <div class="form-row">
                                      <div class="col-md-6 mb-3">
                                        <label for="validationCustom01">Name</label>
                                        <input type="text" class="form-control" id="validationCustom01" name="name"  required>
                                        <div class="valid-feedback">
                                          Looks good!
                                        </div>
                                      </div>
                                      <div class="col-md-3 mb-3">
                                        <label for="validationCustom02">Email Address</label>
                                        <input type="email" class="form-control" id="validationCustom02" name="email" placeholder="name.cde@gmail.com" required>
                                        <div class="valid-feedback">
                                          Looks good!
                                        </div>
                                      </div>
                                      <div class="col-md-3 mb-3">
                                        <label for="validatePassword">Password</label>
                                        <input type="password" class="form-control" id="validatePassword" name="password" required>
                                        <div class="valid-feedback">
                                          Looks good!
                                        </div>
                                      </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-md-3 mb-3">
                                            <label for="validateBirthday">Birthday</label>
                                            <input type="date" class="form-control" id="validateBirthday" name="birth"  required>
                                            <div class="valid-feedback">
                                                Looks good!
                                            </div>
                                        </div>
                                        <div class="col-md-3 mb-3">
                                          <label for="validateJoiningdate">Joining date</label>
                                          <input type="date" class="form-control" id="validateJoiningdate" name="joindate"  required>
                                          <div class="valid-feedback">
                                            Looks good!
                                          </div>
                                        </div>
                                        <div class="col-md-3 mb-3">
                                          <label for="validateEndingdate">Ending date</label>
                                          <input type="date" class="form-control" id="validateEndingdate" name="enddate"  required>
                                          <div class="valid-feedback">
                                            Looks good!
                                          </div>
                                        </div>
                                        <div class="col-md-3 mb-3">
                                          <label for="validateGender">Gender</label>
                                          <select class="custom-select" id="validateGender" name="gender" required>
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                            <option value="Other">Other</option>
                                          </select>
                                          <div class="valid-feedback">
                                            Looks good!
                                          </div>
                                        </div>
                                      </div>
                                    <div class="form-row">
                                        <div class="col-md-6 mb-3">
                                            <label for="validationCustom02">Contact No.</label>
                                            <input type="number" class="form-control" id="validationCustom02" name="contact"  required>
                                            <div class="valid-feedback">
                                              Looks good!
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="validationCustom02">WhatsApp No.</label>
                                            <input type="number" class="form-control" id="validationCustom02" name="whatsapp" required>
                                            <div class="valid-feedback">
                                              Looks good!
                                            </div>
                                        </div>   
                                    </div>
                                    <div class="form-row">
                                        <div class="col-md-6 mb-3">
                                            <label for="validationCustom02">College Name</label>
                                            <input type="text" class="form-control" id="validationCustom02" name="college"  required>
                                            <div class="valid-feedback">
                                              Looks good!
                                            </div>
                                        </div>
                                        <div class="col-md-3 mb-3">
                                            <label for="validationCustom02">Refrence</label>
                                            <input type="text" class="form-control" id="validationCustom02" name="refrence"  required>
                                            <div class="valid-feedback">
                                              Looks good!
                                            </div>
                                        </div>
                                        <div class="col-md-3 mb-3">
                                            <label for="validateHead">Head</label>
                                            <select class="custom-select" id="validateHead" name="leader" required>
                                                <option value="True" >True</option>
                                                <option value="False" >False</option>
                                            </select>
                                            <div class="valid-feedback">
                                              Looks good!
                                            </div>
                                        </div>      
                                    </div>
                                    <div class="form-row">
                                        <div class="col-md-6 mb-3">
                                            <label for="validationCustom02">Highest Qualification</label>
                                            <input type="text" class="form-control" id="validationCustom02" name="degree"  required>
                                            <div class="valid-feedback">
                                              Looks good!
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="validationCustom04">Intern Department</label>
                                            <select class="custom-select" id="validationCustom04" name="department" required>
                                                <option value="Web Development" >Web Development</option>
                                                <option value="HR" >HR</option>
                                                <option value="Finance">Finance</option>
                                                <option value="Marketing">Marketing</option>
                                            </select>
                                            <div class="invalid-feedback">
                                                Please select a valid department.
                                            </div>
                                        </div>   
                                    </div>
                                    <div class="form-row">
                                        <div class="col-md-6 mb-3">
                                            <label for="validateCity">City</label>
                                            <input type="text" class="form-control" id="validateCity" name="city"  required>
                                            <div class="valid-feedback">
                                              Looks good!
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="validateState">State</label>
                                            <input type="text" class="form-control" id="validateState" name="state" required>
                                            <div class="valid-feedback">
                                              Looks good!
                                            </div>
                                        </div>   
                                    </div>
                                    <button class="btn btn-primary" type="submit">Add Intern</button>
                                  </form>
                            </div>
                        </div>

                    </div>
                    <!-- /.container-fluid -->

                </div>
            </div>
        </div>
        <!-- /#page-content-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
        integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
        crossorigin="anonymous"></script>

    <script src="https://code.jquery.com/jquery-3.5.1.js"
        integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>


    <script>
        $('#bar').click(function () {
            $(this).toggleClass('open');
            $('#page-content-wrapper ,#sidebar-wrapper').toggleClass('toggled');
        });
    </script>

    <script>
        // Example starter JavaScript for disabling form submissions if there are invalid fields
        (function() {
        'use strict';
        window.addEventListener('load', function() {
            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.getElementsByClassName('needs-validation');
            // Loop over them and prevent submission
            var validation = Array.prototype.filter.call(forms, function(form) {
            form.addEventListener('submit', function(event) {
                if (form.checkValidity() === false) {
                event.preventDefault();
                event.stopPropagation();
                }
                form.classList.add('was-validated');
            }, false);
            });
        }, false);
        })();
    </script>
</body>

</html>