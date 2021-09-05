<?php
 session_start();
 if(!isset($_SESSION['legitEmail']) || ($_SESSION['legitCDE'] != 'Intern')) {
     echo '<h1>You are not an authorised user</h1>';
     //maybe redirect to login page
     header("Location:../intlog.php");
     die();
 }
 $e=($_SESSION['legitEmail']);
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

$page=$_GET["page"];

if($page=="" || $page=="1"){
    $page1=0;
}else{
    $page1=($page*5)-5;
}

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
    <title><?php echo $_SESSION['legitUser']; ?></title>

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
  $query = $conn->query("SELECT `dp` from `employee` where email='".$e."'");
  if($query->num_rows > 0){
      while($row = $query->fetch_assoc()){
          $imageURL = 'changeDP/'.$row["dp"];
          
  ?>
      <img src="<?= $imageURL; ?>"  class="card-img-top mr-3 rounded-circle img-thumbnail shadow-sm" alt="" style="height:7em; width:7em;" />
  <?php }} ?>
                        <div class="media-body">
                            <h4 class="m-0"><?php echo $_SESSION['legitUser']; ?></h4>
                            <p class="font-weight-normal text-muted mb-0">CDE</p>
                        </div>
                    </div>
                </div>
                <p class="sidebar-header font-weight-bold text-uppercase px-3 small pb-4 mb-0">Dashboard</p>

                <ul class="navbar-nav align-self-stretch">
                    <li class="nav-item">
                        <a class="nav-link " href="dash.php"> <i class="fa fa-home mr-3 text-primary"></i> Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="internprofile.php"> <i class="fa fa-briefcase mr-3 text-primary"></i>
                            User Profile</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="mysalary.php"> <i class="fa fa-briefcase mr-3 text-primary"></i>
                            Salary Details</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="dailyreports.php"> <i class="fa fa-trophy  mr-3 text-primary"></i>
                            Daily Reports</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="curricular.php"> <i class="fa fa-trophy  mr-3 text-primary"></i>
                            Curricular Activities</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="internextend.php"> <i class="fa fa-trophy  mr-3 text-primary"></i>
                            Internship Extend Form</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="applyleave.php"> <i
                                class="fa fa-trophy  mr-3 text-primary"></i>
                            Leave Form</a>
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
                                <a href="logoutintern.php" class="btn btn-warning">LogOut</a>
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
                                    <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                                    <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                            class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
                                </div>
                            </div>
                            <!-- column -->
                            <div class="col-md-12 mt-4">
                                <div class="card">
                                    <div class="card-body">
                                        <!-- title -->
                                        <div class="d-md-flex align-items-center">
                                            <div>
                                                <h5 class="card-subtitle">Apply for Leave</h5>
                                            </div>
                                        </div>
                                        <!-- title -->
                                        <form class="needs-validation" novalidate action="applyleaveform.php"
                                            method="POST">
                                            <div class="form-group row">
                                                <label for="validateinputName"
                                                    class="col-sm-2 col-form-label">Name</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" id="validateinputName"
                                                        name="name" required>
                                                </div>
                                                <div class="valid-feedback">
                                                    Looks good!
                                                </div>


                                            </div>

                                            <div class="form-group row">
                                                <label for="inputName" class="col-sm-2 col-form-label">Department of
                                                    Intern</label>
                                                <div class="col-sm-10">
                                                    <select class="custom-select" id="validationCustom04" name="dept"
                                                        required>
                                                        <option value="Web Development">Web Development</option>
                                                        <option value="HR">HR</option>
                                                        <option value="Finance">Finance</option>
                                                        <option value="Marketing">Marketing</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="validateinputReason"
                                                    class="col-sm-2 col-form-label">Reason</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" id="validateinputReason"
                                                        name="reason" required>
                                                </div>
                                                <div class="valid-feedback">
                                                    Looks good!
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="validateinputStart" class="col-sm-2 col-form-label">Start
                                                    Date</label>
                                                <div class="col-sm-10">
                                                    <input type="date" class="form-control" id="validateinputStart"
                                                        name="start" required>
                                                </div>
                                                <div class="valid-feedback">
                                                    Looks good!
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="validateinputEnd" class="col-sm-2 col-form-label">End
                                                    Date</label>
                                                <div class="col-sm-10">
                                                    <input type="date" class="form-control" id="validateinputEnd"
                                                        name="end" required>
                                                </div>
                                                <div class="valid-feedback">
                                                    Looks good!
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-sm-10">
                                                    <button type="submit" class="btn btn-primary">Apply Leave</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 mt-4">
                                <div class="card">
                                    <div class="card-body">
                                        <!-- title -->
                                        <div class="d-md-flex align-items-center">
                                            <div>
                                                <h5 class="card-subtitle">Total Leaves</h5>
                                            </div>
                                        </div>
                                        <!-- title -->
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table table-striped bg-light small">
                                            <tr class="table-dark">
                                                <td>Name</td>
                                                <td>Email</td>
                                                <td>Department</td>
                                                <td>Reason</td>
                                                <td>Start Date</td>
                                                <td>End Date</td>
                                                <td>Status</td>
                                                <td>Apply Date</td>
                                            </tr>
                                            <?php

                                                $sql = "SELECT * FROM employee_leave WHERE email='{$_SESSION['legitEmail']}' ORDER BY applydate DESC limit $page1,5";
                                                $data = mysqli_query($conn,$sql);
                                               // $result = $conn->query($sql) or die($conn->error);

                                               // $row = mysqli_fetch_assoc($results);
                                            
                                                // output data of each row
                                                while($row = $data->fetch_assoc()) {
                                                    echo '<tr><td class="text-uppercase">' . $row["name"]. '</td><td>' . $row["email"]. '</td><td>' . $row["dept"]. '</td><td >' . $row["reason"]. "</td><td>" . $row["start"]. '</td><td>' . $row["end"]. '</td><td>' . $row["status"]. '</td> <td>' . $row["applydate"]. '</td> </tr>';
                                                }
                                            ?>
                                        </table>
                                        <nav aria-label="Page navigation example">
                                            <ul class="pagination justify-content-center">
                                                <?php 
                                                $sql = "SELECT * FROM employee_leave WHERE email='{$_SESSION['legitEmail']}'";
                                                $data = mysqli_query($conn,$sql);
                                                if($data){
                                                    $row=mysqli_num_rows($data);
                                                    $a=$row/5;
                                                    $a=ceil($a);

                                                    for($b=1;$b<=$a;$b++){
                                                        echo '<li class="page-item"><a class="page-link" href="applyleave.php?page='.$b.'">'.$b.'</a></li>';        
                                                    }
                                                }
                                                ?>
                                            </ul>
                                        </nav>
                                    </div>
                                </div>
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
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
        integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous">
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

    <script>
    $('#bar').click(function() {
        $(this).toggleClass('open');
        $('#page-content-wrapper ,#sidebar-wrapper').toggleClass('toggled');
    });
    </script>
</body>

</html>