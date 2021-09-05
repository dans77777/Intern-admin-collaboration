<?php
session_start();
if(!isset($_SESSION['legitEmail'])|| ($_SESSION['legitCDE'] != 'Admin')) {
    echo '<h1>You are not an authorised user</h1>';
    header("Location:../adminlog.php");
    die();
}
$email= $_SESSION['legitEmail'];
$e= $_SESSION['legitEmail'];
$admindepartment=$_SESSION['legitDepartment'];

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "intern";
error_reporting(0);
$conn = new mysqli($servername, $username, $password, $dbname);
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
                        <a class="nav-link " href="dash.php"> <i class="fa fa-home mr-3 text-primary"></i>
                            Home</a>
                    </li>
                    <?php if($_SESSION['legitType']=='superadmin'){?>
                    <li class="nav-item">
                        <a class="nav-link" href="createsubadmin.php"> <i class="fa fa-home mr-3 text-primary"></i>
                            Create Sub Admin</a>
                    </li>
                    <?php } ?>
                    <li class="nav-item">
                        <a class="nav-link" href="adminprofile.php"> <i class="fa fa-user mr-3 text-primary"></i>
                            Admin Profile</a>
                    </li>
                    <li class="has-sub nav-item">
                        <a class="nav-link collapsed active" href="#collapseIntern" role="button" data-toggle="collapse">
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
                        <a class="nav-link collapsed" href="#collapseSalary" role="button" data-toggle="collapse">
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
                        <a class="nav-link" href="createtask.php"> <i class="fa fa-briefcase mr-3 text-primary"></i>
                            Work Updates</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="createcertificate.php"> <i
                                class="fa fa-trophy  mr-3 text-primary"></i>
                            Certificates</a>
                    </li>
                    <li class="has-sub nav-item">
                        <a class="nav-link collapsed" href="#collapseEvent" role="button" data-toggle="collapse">
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
                                <a href="logout.php" class="btn btn-warning">LogOut</a>
                            </li>

                        </ul>

                    </nav>
                    <!-- End of Topbar -->

                    <!-- Begin Page Content -->
                    <div class="container-fluid px-lg-4">
                        <div class="row">
                            <!-- column -->
                            <div class="col-md-12 mt-4">
                                <div class="card">
                                    <div class="card-body">
                                        <!-- title -->
                                        <div class="d-md-flex align-items-center">
                                            <div>
                                                <h4 class="card-title">Department Attendance</h4>
                                                <h5 class="card-subtitle">Overview of Department Attendance</h5>
                                            </div>
                                            <form class="d-sm-inline-block form-inline navbar-search ml-auto"
                                                method="POST" action="">
                                                <div class="input-group">
                                                    <input type="search" class="form-control bg-light "
                                                        placeholder="Search for..." autocomplete="on"
                                                        aria-label="Search" name="q">
                                                    <div class="input-group-append">
                                                        <button class="btn btn-primary" type="submit" name="search">
                                                            <i class="fas fa-search fa-sm"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <!-- title -->
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table table-striped bg-light small">
                                            <tr class="table-dark">
                                                <th> ID </th>
                                                <th> Name </th>
                                                <th> Totaldays </th>
                                                <th> present Days</th>
                                                <th> Absent days</th>
                                                <th> email</th>
                                                <th> Department</th>
                                                <th> Attendance</th>
                                            </tr>
                                            <?php
                                            include('conn.php');
                                                if($_SESSION['legitDepartment']=='ALL'){
                                                    if(isset($_POST['search'])){
                                                        $q=$_POST['q'];
                                                        $query="SELECT * FROM `attendance` where (`id` like '%$q%' OR `name` like '%$q%' OR `email` like '%$q%' OR `dept` like '%$q%') 
                                                        AND  (`status`='Active') limit $page1,5";
                                                    }
                                                    else{
                                                      $query="SELECT * FROM `attendance` where  `status`='Active' limit $page1,5";    
                                                    }
                                                  }
                                                else{
                                                    if(isset($_POST['search'])){
                                                      $q=$_POST['q'];
                                                      $query="SELECT * FROM `attendance` where (`id` like '%$q%' OR `name` like '%$q%' OR `email` like '%$q%' OR `dept` like '%$q%') AND
                                                        (`status`='Active') AND
                                                  (`dept`= '".$admindepartment."') limit $page1,5 ";
                                                    }
                                                    else{
                                                      $query="SELECT * FROM `attendance` where  `status`='Active' AND
                                                  `dept`= '".$admindepartment."' limit $page1,5 ";
                                                    }
                                                  
                                                }
                                                $query_run= mysqli_query($con,$query);
                                                while($res = mysqli_fetch_array($query_run)){ 
                                            ?>
                                            <tr class="text-center">
                                                <td> <?php echo $res['id'];  ?> </td>
                                                <td> <?php echo $res['name'];  ?> </td>
                                                <td> <?php echo $res['totaldays'];  ?> </td>
                                                <td> <?php echo $res['present'];  ?> </td>
                                                <td> <?php echo $res['absent'];  ?> </td>
                                                <td> <?php echo $res['email'];  ?> </td>
                                                <td> <?php echo $res['dept'];  ?> </td>
                                                <td> <button class="btn-success btn text-danger"><a
                                                            href="./markpresent.php? id=<?php echo $res['id']; ?>"
                                                            class="text-white"> Y</a></button>
                                                    <button class="btn-danger btn text-primary"><a
                                                            href="./markabsent.php? id=<?php echo $res['id']; ?>"
                                                            class="text-white"> N </a></button>
                                                </td>
                                            </tr>
                                            <?php
                                                }
                                            ?>
                                        </table>
                                        <nav aria-label="Page navigation example">
                                            <ul class="pagination justify-content-center">
                                                <?php 
                                                if($_SESSION['legitDepartment']=='ALL'){
                                                    if(isset($_POST['search'])){
                                                        $q=$_POST['q'];
                                                        $sql="SELECT * FROM `attendance` where `id` like '%$q%' OR `name` like '%$q%' OR `email` like '%$q%' OR `dept` like '%$q%' AND  `status`='Active'";
                                                    }
                                                    else{
                                                      $sql="SELECT * FROM `attendance` where  `status`='Active'";    
                                                    }
                                                  }
                                                else{
                                                    if(isset($_POST['search'])){
                                                      $q=$_POST['q'];
                                                      $sql="SELECT * FROM `attendance` where `id` like '%$q%' OR `name` like '%$q%' OR `email` like '%$q%' OR `dept` like '%$q%' AND  `status`='Active' AND
                                                  `dept`= '".$admindepartment."' ";
                                                    }
                                                    else{
                                                      $sql="SELECT * FROM `attendance` where  `status`='Active' AND
                                                  `dept`= '".$admindepartment."' ";
                                                    }
                                                  
                                                }
                                                $data = mysqli_query($conn,$sql);
                                                if($data){
                                                   
                                                    $row=mysqli_num_rows($data);
                                                    $a=$row/5;
                                                    $a=ceil($a);

                                                    for($b=1;$b<=$a;$b++){
                                                        echo '<li class="page-item"><a class="page-link" href="attendance2.php?page='.$b.'">'.$b.'</a></li>';        
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
    $('#bar').click(function() {
        $(this).toggleClass('open');
        $('#page-content-wrapper ,#sidebar-wrapper').toggleClass('toggled');
    });
    </script>
</body>

</html>