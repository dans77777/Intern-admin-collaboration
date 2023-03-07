<?php
 session_start();
 if(!isset($_SESSION['legitEmail']) || ($_SESSION['legitCDE'] != 'Intern')) {
     echo '<h1>You are not an authorised user</h1>';
     header("Location:../intlog.php");
     //maybe redirect to login page
     die();
 }
 $e= ($_SESSION['legitEmail']);
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "intern";
error_reporting(0);
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection after that making sliding pages as per new design
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
                        <a class="nav-link" href="internprofile.php"> <i class="fa fa-briefcase mr-3 text-primary"></i> User Profile</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="mysalary.php"> <i class="fa fa-briefcase mr-3 text-primary"></i> Salary Details</a>
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

                        <!-- Topbar Navbar -->
                        <ul class="navbar-nav ml-auto">

                            <!-- Nav Item - User Information -->
                            <li class="nav-item" style="padding: 8px;">
                                <a href="logoutintern.php" class="btn btn-warning" >LogOut</a>
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
                            <div class="col-md-12 mt-4">
                                <div class="card">
                                    <div class="card-body">
                                        <!-- title -->
                                        <div class="d-md-flex align-items-center">
                                            <div>
                                                <h5 class="card-subtitle">Your Salary Status</h5>
                                            </div>
                                        </div>
                                        <!-- title -->
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table table-striped bg-light small">
                                            <tr class="table-dark">
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Department</th>
                                                <th>Amount</th>
                                                <th>Year</th>
                                                <th>Month</th>
                                                <th>status</th>
                                                <th>Date</th>
                                            </tr>
                                            <?php

                                                $sql = "SELECT * FROM salary WHERE email='{$_SESSION['legitEmail']}' limit $page1,5";
                                                $data = mysqli_query($conn,$sql);
                                                    while($row = $data->fetch_assoc()) {
                                                        echo '<tr>
                                                        <td class="text-uppercase">' . $row["name"]. '</td>
                                                        <td>' . $row["email"]. '</td>
                                                        <td >' . $row["dept"]. '</td>
                                                        <td >' . $row["amount"]. '</td>
                                                        <td >' . $row["year"]. '</td>
                                                        <td >' . $row["month"]. '</td> 
                                                        <td >' . $row["status"]. '</td> 
                                                        <td >' . $row["date"]. '</td>
                                                        </tr>';
                                                      }  

                                            ?>
                                        </table>
                                        <nav aria-label="Page navigation example">
                                            <ul class="pagination justify-content-center">
                                                <?php 
                                                $sql = "SELECT * FROM salary WHERE email='{$_SESSION['legitEmail']}'";
                                                $data = mysqli_query($conn,$sql);
                                                if($data){
                                                    $row=mysqli_num_rows($data);
                                                    $a=$row/5;
                                                    $a=ceil($a);

                                                    for($b=1;$b<=$a;$b++){
                                                        echo '<li class="page-item"><a class="page-link" href="dailyreports.php?page='.$b.'">'.$b.'</a></li>';        
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
</body>

</html>
