<?php
session_start();
if(!isset($_SESSION['legitEmail']) || ($_SESSION['legitCDE'] != 'Admin')) {
    echo '<h1>You are not an authorised user</h1>';
    header("Location:../adminlog.php");
    //maybe redirect to login page
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

if(isset($_POST['approved'])){

    $Status="Approved";
    $id=$_POST['statusid'];

    $sql="UPDATE `employee_leave` SET `status`='$Status' WHERE `id`='$id'";
    if(!mysqli_query($conn,$sql))
        {
            echo'<script language="javascript">';  
            echo'alert("Leave Status Not Updated!")'; 
            echo'</script>';
        }else{
            echo'<script language="javascript">';  
            echo'alert("Leave Status Updated!")'; 
            echo'</script>';
        }
}

if(isset($_POST['rejected'])){

    $Status="Rejected";
    $id=$_POST['statusid'];

    $sql="UPDATE `employee_leave` SET `status`='$Status' WHERE `id`='$id'";
    if(!mysqli_query($conn,$sql))
        {
            echo'<script language="javascript">';  
            echo'alert("Leave Status Not Updated!")'; 
            echo'</script>';
        }else{
            echo'<script language="javascript">';  
            echo'alert("Leave Status Updated!")'; 
            echo'</script>';
        }

}    

    $page=$_GET["page"];

    if($page=="" || $page=="1"){
        $page1=0;
    }else{
        $page1=($page*5)-5;
    }

?>
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
    <style>
    table {
        border-collapse: collapse;
        background-color: #fff;
        box-shadow: 0 10px 20px 0 rgba(0, 0, 0, .03);
        border-radius: 10px;
        margin: auto;
        border-collapse: collapse;
        width: 100%;

    }

    th,
    td {
        border: 1px solid #f2f2f2;
        padding: 8px 30px;
        text-align: center;
        color: grey;
        border-bottom: 1px solid #ddd;
    }

    th {
        text-transform: uppercase;
        font-weight: 500;
    }

    td {
        font-size: 13px;
    }

    .email-style {
        font-size: 14px;
        color: grey;
        display: inline-block;
        background: #f2f2f2;
        -webkit-border-radius: 2px;
        -moz-border-radius: 2px;
        border-radius: 2px;
        line-height: 30px;
        padding: 0 14px;
    }

    .post-class {
        text-transform: uppercase;
    }

    .fa {
        font-size: 18px;
    }

    .fa-edit {
        color: #63c76a;
    }

    .fa-trash {
        color: #ff0000;
    }

    a {
        text-decoration: none;
        display: flex;
        justify-content: center;
        text-transform: uppercase;
    }

    tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    tr:hover {
        background-color: #A9A5A5;
    }
    </style>

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
                            <div class="col-md-12 mt-lg-4 mt-4">
                                <!-- Page Heading -->
                                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                                    <h1 class="h3 mb-0 text-gray-800">Intern Leave Details</h1>
                                    <form class="form-inline my-2 my-lg-0" method="post" action="">
                                        <input class="form-control mr-sm-2" type="text" name="search" placeholder="Search Name" aria-label="Search">
                                        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                                    </form>
                                </div>
                            </div>
                            <div class="col-md-12 table-responsive p-2">
                                <table class="table table-striped bg-light small p-2">
                                    <tr class="table-dark">
                                        <th>id</th>
                                        <th>name</th>
                                        <th>Department</th>
                                        <th>reason</th>
                                        <th>start</th>
                                        <th>end</th>
                                        <th>Applied Date</th>
                                        <th>Status</th>
                                        <th colspan="2"> Operation</th>
                                    </tr>
                                    <?php

                                               if($_SESSION['legitDepartment']=='ALL'){
                                                if(isset($_POST['search'])){
                                                    $searchKey=$_POST['search'];
                                                    $sql = "SELECT * FROM `employee_leave` where (`id` like '%$searchKey%' 
                                                    OR `name` like '%$searchKey%' OR `email` like '%$searchKey%' OR `dept` like '%$searchKey%'  OR `reason` like '%$searchKey%'
                                                    OR `end` LIKE '%$searchKey%' OR `start` LIKE '%$searchKey%')
                                                     AND  (`status`='on progress') limit $page1,5";
                                                    
                                                   
                                                }else{
                                                    $sql = "SELECT * FROM `employee_leave` WHERE `status`='on progress' limit $page1,5";
                                                }
                                            }else{
                                                if(isset($_POST['search'])){
                                                    $searchKey=$_POST['search'];
                                                    $sql = "SELECT * FROM `employee_leave` where (`id` like '%$searchKey%' 
                                                    OR `name` like '%$searchKey%' OR `email` like '%$searchKey%' OR `dept` like '%$searchKey%'  OR `reason` like '%$searchKey%'
                                                    OR `end` LIKE '%$searchKey%' OR `start` LIKE '%$searchKey%') (AND `status`='on progress') (AND `dept`='{$_SESSION['legitDepartment']}')";
                                                }else{
                                                    $sql = "SELECT * FROM `employee_leave` WHERE `dept`='{$_SESSION['legitDepartment']}' AND `status`='on progress'";
                                                }
                                            }
                                            
                                            $data = mysqli_query($conn,$sql);
                                            
                                               
                                                    while($row = $data->fetch_assoc()) {
                                                        echo '<tr><td class="text-uppercase">' . $row["id"]. '</td><td>' . $row["name"]. '</td><td>' . $row["dept"]. '</td><td >' . $row["reason"]. "</td><td>" . $row["start"]. "</td> <td>" . $row["end"]. '</td><td>'.$row["applydate"].'</td><td>'.$row["status"].'</td> 
                                                        <td> 
                                                        <form method="post" action=""> 
                                                        <input type="hidden" name="statusid" value="'.$row["id"].'"> 
                                                        <button class="btn btn-success" name="approved">Approved</button>
                                                        <button class="btn btn-danger" name="rejected">Rejected</button> </form>
                                                        </td> 
                                                        </tr>';
                                                    }
                                                    $post_numbers = $row['column_name'];
                                        ?>

                                </table>
                                <div class="text-center col-lg-12">
                                    <nav aria-label="Page navigation example" class="text-center">
                                        <ul class="pagination justify-content-center">
                                            <?php 
                                            if(isset($_POST['search'])){
                                                $searchKey=$_POST['search'];
                                                $sql = "SELECT * FROM employee_leave WHERE status='on progress' and name LIKE '%$searchKey%' ";
                                            }else{
                                            $sql = "SELECT * FROM employee_leave WHERE status='on progress'";
                                            }
                                            $data = mysqli_query($conn,$sql);
                                            if($data){
                                                $row=mysqli_num_rows($data);
                                                $a=$row/5;
                                                $a=ceil($a);
                                                for($b=1;$b<=$a;$b++){
                                                    echo '<li class="page-item"><a class="page-link" href="approveinternleave.php?page='.$b.'">'.$b.'</a></li>';        
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