<?php
session_start();
if(!isset($_SESSION['legitEmail'])|| ($_SESSION['legitCDE'] != 'Admin')) {
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
                        <a class="nav-link " href="dash.php"> <i class="fa fa-home mr-3 text-primary"></i> Home</a>
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
                        <a class="nav-link collapsed" href="#collapseIntern" role="button" data-toggle="collapse">
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
                        <a class="nav-link active" href="createcertificate.php"> <i
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
                                    <h1 class="h3 mb-0 text-gray-800">Add Intern Certificate Details</h1>
                                    <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                            class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <form action="insertcertificate.php" method="POST" class="needs-validation" novalidate
                                    enctype="multipart/form-data">
                                    <div class="form-group row">
                                        <label for="inputEmail" class="col-sm-2 col-form-label">Email </label>
                                        <div class="col-sm-10">
                                            <input type="email" class="form-control" id="inputEmail" name="email"
                                                required>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="inputName" class="col-sm-2 col-form-label">Department of
                                            Intern</label>
                                        <div class="col-sm-10">
                                            <select class="custom-select" id="validationCustom04" name="dept" required>
                                                <option value="Web Development">Web Development</option>
                                                <option value="HR">HR</option>
                                                <option value="Finance">Finance</option>
                                                <option value="Marketing">Marketing</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputName" class="col-sm-2 col-form-label">Name of Intern</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="inputName" name="name" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputCertificate" class="col-sm-2 col-form-label">Certificate
                                            Name</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="inputCertificate" name="cname"
                                                required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputIssueDate" class="col-sm-2 col-form-label">Issue Date</label>
                                        <div class="col-sm-10">
                                            <input type="date" class="form-control" id="inputIssueDate" name="idate"
                                                required>
                                        </div>
                                    </div>
                                 



                                    <input type='file' name='file' style="padding-bottom:10px; margin:0 auto">


                                    <button class="btn btn-success btn-block" type="submit"
                                        name="submit">Submit</button>
                                </form>
                            </div>
                            <div class="col-md-12 mt-4">
                                <div class="card">
                                    <div class="card-body">
                                        <!-- title -->
                                        <div class="d-md-flex align-items-center">
                                            <div>
                                                <h4 class="card-title">Certificates</h4>
                                                <h5 class="card-subtitle">Overview of all certificates</h5>
                                            </div>
                                            <div class="ml-auto">
                                                <form class="form-inline my-2 my-lg-0 ml-auto" method="post" action="">
                                                    <input class="form-control mr-sm-2" type="text" name="search"
                                                        placeholder="Search Name" aria-label="Search">
                                                    <button class="btn btn-outline-success my-2 my-sm-0"
                                                        type="submit">Search</button>
                                                </form>
                                            </div>
                                        </div>
                                        <!-- title -->
                                    </div>
                            <div class="col-md-12 mt-2">
                                <div class="table-responsive">
                                    <table class="table table-striped bg-light small">
                                        <tr class="table-dark">
                                            <th>Id</th>
                                            <th>Email</th>
                                            <th>Department</th>
                                            <th>Name</th>
                                            <th>Certificate Name</th>
                                            <th>Issue Date</th>
                                            <th>File</th>
                                            <th>Edit</th>
                                            <th>Delete</th>
                                        </tr>
                                        <?php

if($_SESSION['legitDepartment']=='ALL'){
    if(isset($_POST['search'])){
        $searchKey=$_POST['search'];
        $sql = "SELECT * FROM `certificate` where (`id` like '%$searchKey%' 
        OR `name` like '%$searchKey%' OR `email` like '%$searchKey%' OR `dept` like '%$searchKey%' OR `cname` like '%$searchKey%'
        OR `idate` like '%$searchKey%')";
   
    }else{
        $sql = "SELECT * FROM `certificate` limit $page1,5";
    }
}else{
    if(isset($_POST['search'])){
        $searchKey=$_POST['search'];
        $sql = "SELECT * FROM `certificate` where (`id` like '%$searchKey%' 
        OR `name` like '%$searchKey%' OR `email` like '%$searchKey%' OR `dept` like '%$searchKey%' OR `cname` like '%$searchKey%'
        OR `idate` like '%$searchKey%')(AND `dept`='{$_SESSION['legitDepartment']}')";
    }else{
        $sql = "SELECT * FROM `certificate` WHERE `dept`='{$_SESSION['legitDepartment']}'";
    }
} 
                                                    $data = mysqli_query($conn,$sql);
                                                  
                                                        while($res = mysqli_fetch_array($data)){
                                                            $email=$res['email']; 
                                                            ?>
                                                           
                                                            
                                                             
                <?php
  
  include ('conn.php');
  
  $query = $conn->query("SELECT `image` from `certificate` where email='".$email."'");
  if($query->num_rows > 0){
      while($row = $query->fetch_assoc()){
        
          $imageURL = 'uploads/'.$row["image"];
      }
    }
          
  ?>
     
                                                           <tr class="text-dark">
                                                           <td> <?php echo $res['id'];  ?> </td>
                                                           <td> <?php echo $res['email'];  ?> </td>
                                                           
                                                           <td> <?php echo $res['dept'];  ?> </td>
                                                           <td> <?php echo $res['name'];  ?> </td>
                                                           <td> <?php echo $res['cname'];  ?> </td>

                                            <td> <?php echo $res['idate'];  ?> </td>
                                            <td><a href="<?= $imageURL; ?>" download>Download</td></a> </td>
                                            <td>
                                                <button type="button"
                                                    class="btn btn-sm btn-warning btn-block editbtn">Edit</button>
                                            </td>
                                            <td>  <button class="btn-danger btn text-primary"><a href="./deletecertificate.php? id=<?php echo $res['id']; ?>" class="text-white">Delete</a></button></td>
                                             
                                        </tr>
                                        <?php 
                                            }

                                            mysqli_error($con);
                                        ?>


                                    </table>
                                    <nav aria-label="Page navigation example">
                                        <ul class="pagination justify-content-center">
                                            <?php 
                                                    $sql = "SELECT * FROM certificate";
                                                    $data = mysqli_query($conn,$sql);
                                                    if($data){
                                                        $row=mysqli_num_rows($data);
                                                        $a=$row/5;
                                                        $a=ceil($a);

                                                        for($b=1;$b<=$a;$b++){
                                                            echo '<li class="page-item"><a class="page-link" href="createcertificate.php?page='.$b.'">'.$b.'</a></li>';        
                                                        }

                                                    }
                                                ?>
                                        </ul>
                                    </nav>
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

    <!--Edit Certificate Modal-->
    <div class="modal fade" id="editmodal" tabindex="-1" aria-labelledby="editmodal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Certificate
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="updatecertificate.php" method="POST" class="needs-validation" novalidate enctype="multipart/form-data">
                        <div class="mb-2">
                            <label for="id">Id</label>
                            <input type="text" class="form-control" id="id" name="id" required>
                        </div>
                        <div class="mb-2">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email"
                                placeholder="name.cde@gmail.com" required>
                        </div>
                        <div class="mb-2">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>
                        <div class="mb-2">
                            <label for="dept">Department</label>
                            <select class="custom-select" id="dept" name="dept" required>
                                <option value="Web Development">Web Development</option>
                                <option value="HR">HR</option>
                                <option value="Finance">Finance</option>
                                <option value="Marketing">Marketing</option>
                            </select>
                        </div>
                        <div class="mb-2">
                            <label for="cname"> Certificate</label>
                            <input type="text" class="form-control" id="cname" name="cname" required>
                        </div>
                        <div class="mb-2">
                            <label for="idate">Issued Date</label>
                            <input type="date" class="form-control" id="idate" name="idate" required>
                        </div>
                        <div class="mb-2">
                            <label for="inputUploadCertificate">Upload
                                certificate</label>
                            <input type="file" class="form-control-file" name="file" id="inputUploadCertificate">
                        </div>
                        <div class="mb-2">
                           
                        <button class="btn btn-success btn-block" type="submit"
                                        name="update">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!--Edit Certificate Modal-->

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
    $(document).ready(function() {
        $('.editbtn').on('click', function() {
            $('#editmodal').modal('show');

            $tr = $(this).closest('tr');
            var data = $tr.children("td").map(function() {
                return $(this).text();
            }).get();

            $('#id').val(data[0]);
            $('#email').val(data[1]);
            $('#name').val(data[3]);
            $('#dept').val($.trim(data[2]));
            $('#cname').val(data[4]);
            $('#idate').val($.trim(data[5]));

        });
    });
    </script>

    <script>
    $('#bar').click(function() {
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