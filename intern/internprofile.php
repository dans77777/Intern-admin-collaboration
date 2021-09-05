<?php
    session_start();
    if(!isset($_SESSION['legitEmail'])|| ($_SESSION['legitCDE'] != 'Intern')) {
        echo '<h1>You are not an authorised user</h1>';
        header("Location:../intlog.php");
        //maybe redirect to login page
        die();
    }
    $_SESSION['legitUser'];
    $e =$_SESSION['legitEmail'];
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
                            <h4 class="m-0"><?php echo $_SESSION['legitUser']?></h4>
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
                        <a class="nav-link active" href="internprofile.php"> <i
                                class="fa fa-briefcase mr-3 text-primary"></i> User Profile</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="dailyreports.php"> <i class="fa fa-trophy  mr-3 text-primary"></i>
                            Daily Reports</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="mysalary.php"> <i class="fa fa-trophy  mr-3 text-primary"></i>
                        Salary Details</a>
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
                        <a class="nav-link" href="applyleave.php"> <i class="fa fa-trophy  mr-3 text-primary"></i>
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


                        <!-- Topbar Search -->
                        <form class="d-none d-sm-inline-block form-inline navbar-search">
                            <div class="input-group">
                                <input type="text" class="form-control bg-light " placeholder="Search for..."
                                    autocomplete="on" aria-label="Search">
                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="button">
                                        <i class="fas fa-search fa-sm"></i>
                                    </button>
                                </div>
                            </div>
                        </form>

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
                                    <h1 class="h3 mb-0 text-gray-800 text-uppercase">
                                        <?php echo $_SESSION['legitUser']; ?>'s Profile </h1>
                                </div>
                            </div>
                            <!-- column -->
                            <div class="col-md-12 mt-4">
                                <div class="row text-center">
                                    <div class="col-md-6 col-sm-12 col-lg-4">
                                        <div class="card">
                                            <div class="card-body">
                                            <?php
  // Include the database configuration file
  include ('conn.php');
  // Get images from the database
  $query = $conn->query("SELECT `dp` from `employee` where email='".$e."'");
  if($query->num_rows > 0){
      while($row = $query->fetch_assoc()){
          $imageURL = 'changeDP/'.$row["dp"];
          
  ?>
      <img src="<?= $imageURL; ?>"  class="card-img-top" alt="" style="height:28em;" />
  <?php }} ?>
                                            
                                            </div>
                                            
<form method="post" action="changeDP.php" enctype='multipart/form-data'>
  <input type='file' name='file' />
  
  <input type='submit' value='Save profile' name='but_upload'>
</form>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-4">
                                        <div class="card bg-light">
                                            <div class="card-body">
                                                <div class="table-responsive">
                                                    <table class="table table-striped ">
                                                    <?php

                                                        $sql = "SELECT * FROM employee WHERE email='{$_SESSION['legitEmail']}'"; ?>
                                                    <?php    $data = mysqli_query($conn,$sql); ?>
                                                    <?php  //  $result = $conn->query($sql) or die($conn->error); ?>

                                                    <?php   // $row = mysqli_fetch_assoc($results); ?>
                                                            
                                                            
                                                    <?php    while($row = $data->fetch_assoc()) { ?>
                                                            <?php echo'<tr> <td> Name </td> <td class="text-uppercase">' ?>
                                                            <?php echo $row["name"]; '</td>' ?>
                                                            <?php echo'<tr> <td> Email </td> <td>' ?>
                                                            <?php echo $row["email"]; '</td>' ?>
                                                            <?php echo'<tr> <td> Birthday </td> <td>' ?>
                                                            <?php echo $row["birthday"]; '</td>' ?>
                                                            <?php echo'<tr> <td> Gender </td> <td class="text-uppercase">' ?>
                                                            <?php echo $row["gender"]; '</td>' ?>
                                                            <?php echo'<tr> <td> Contact </td> <td>' ?>
                                                            <?php echo $row["contact"]; '</td>' ?>
                                                            <?php echo'<tr> <td> Whatsapp </td> <td>' ?>
                                                            <?php echo $row["whatsapp"]; '</td>' ?>
                                                            <?php echo'<tr> <td> Refrence </td> <td class="text-uppercase">' ?>
                                                            <?php echo $row["refrence"]; '</td>' ?>
                                                            <?php echo'<tr> <td> Degree </td> <td class="text-uppercase">' ?>
                                                            <?php echo $row["degree"]; '</td>' ?>
                                                    <?php    }  ?>     
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-lg-4">
                                        <div class="card bg-light">
                                            <div class="card-header">
                                                <h3>Update Profile</h3>
                                            </div>
                                            <div class="card-body">
                                                <form method="POST" action="editUser.php">
                                                    <div class="form-group row">
                                                        <label for="inputName" class="col-sm-2 col-md-4 col-form-label">Name</label>
                                                        <div class="col-sm-10 col-md-8">
                                                            <input type="text" name="name" class="form-control" id="inputName">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="inputBirth"
                                                            class="col-sm-2 col-md-4 col-form-label">Birthday</label>
                                                        <div class="col-sm-10 col-md-8">
                                                            <input type="date" name="birth" class="form-control" id="inputBirth">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="inputGender"
                                                            class="col-sm-2 col-md-4 col-form-label">Gender</label>
                                                        <div class="col-sm-10 col-md-8">
                                                            <input type="text" name="gender" class="form-control" id="inputGender">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="inputContact"
                                                            class="col-sm-2 col-md-4 col-form-label">Contact</label>
                                                        <div class="col-sm-10 col-md-8">
                                                            <input type="number" name="contact" class="form-control" id="inputContact">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="inputWhatsapp"
                                                            class="col-sm-2 col-md-4 col-form-label">Whatsapp</label>
                                                        <div class="col-sm-10 col-md-8">
                                                            <input type="number" name="whatsapp" class="form-control" id="inputWhatsapp">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="inputDegree"
                                                            class="col-sm-2 col-md-4 col-form-label">Degree</label>
                                                        <div class="col-sm-10 col-md-8">
                                                            <input type="text" name="degree" class="form-control" id="inputDegree">
                                                        </div>
                                                    </div>
                                                    <button class="btn btn-success btn-lg btn-block mb-2" type="submit">Update</button>
                                                </form>
                                            </div>
                                        </div>
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

    <!--Add Intern Modal-->
    <div class="modal fade" id="addEmployee" tabindex="-1" aria-labelledby="addEmployee" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Employee</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="mb-2">
                            <input type="date" class="form-control form-control-sm" name="date" id="date" required>
                        </div>
                        <div class="mb-2">
                            <input type="text" class="form-control form-control-sm" name="Name" id="Name"
                                placeholder="Employee Name" required>
                        </div>
                        <div class="mb-2">
                            <input type="email" class="form-control form-control-sm" name="email" id="email"
                                placeholder="Employee Email" required>
                        </div>
                        <div class="mb-2">
                            <input type="number" class="form-control form-control-sm" name="tel" id="tel"
                                placeholder="Employee Tel. No" required>
                        </div>
                        <div class="mb-2">
                            <select name="designation" id="designation" class="form-control form-control-sm">
                                <option value="Web Developer">Web Developer</option>
                                <option value="Web Designer">Web Designer</option>
                                <option value="Software Developer">Software Developer</option>
                                <option value="Software Engineer">Software Engineer</option>
                            </select>
                        </div>
                        <div class="mb-2">
                            <button class="btn btn-success btn-block btn-sm">Add Employee</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!--Add Intern Modal-->

    <!--Detail Intern Modal-->
    <div class="modal fade" id="details" tabindex="-1" aria-labelledby="details" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Intern Details</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <table class="table table-bordered table-responsive">
                    <tr>
                        <th>ID</th>
                        <td>1</td>
                    </tr>
                    <tr>
                        <th>Date of Joining</th>
                        <td>23 July 2005</td>
                    </tr>
                    <tr>
                        <th>Name</th>
                        <td>Rohan</td>
                    </tr>
                    <tr>
                        <th>Email</th>
                        <td>rohan@yahoo.com</td>
                    </tr>
                    <tr>
                        <th>Phone</th>
                        <td>9845647856</td>
                    </tr>
                    <tr>
                        <th>Job</th>
                        <td>Web Designer</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
    <!--Detail Intern Modal-->

    <!--Edit Intern Modal-->
    <div class="modal fade" id="editEmployee" tabindex="-1" aria-labelledby="editEmployee" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Intern</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="mb-2">
                            <input value="23-July-2005" class="form-control form-control-sm" name="date" id="date"
                                required>
                        </div>
                        <div class="mb-2">
                            <input value="Rohan" class="form-control form-control-sm" name="Name" id="Name" required>
                        </div>
                        <div class="mb-2">
                            <input value="rohan@gmail.com" class="form-control form-control-sm" name="email" id="email"
                                required>
                        </div>
                        <div class="mb-2">
                            <input value="9876543247" class="form-control form-control-sm" name="tel" id="tel" required>
                        </div>
                        <div class="mb-2">
                            <input value="Web Developer" class="form-control form-control-sm" name="designation"
                                id="designation" required>
                        </div>
                        <div class="mb-2">
                            <button class="btn btn-success btn-block btn-sm">Update Intern</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!--Edit Intern Modal-->



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

    <script src="https://code.jquery.com/jquery-3.5.1.js"
        integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>


    <script>
    $('#bar').click(function() {
        $(this).toggleClass('open');
        $('#page-content-wrapper ,#sidebar-wrapper').toggleClass('toggled');
    });
    </script>
</body>

</html>