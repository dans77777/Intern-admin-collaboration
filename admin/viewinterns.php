<?php
session_start();
if(!isset($_SESSION['legitEmail'])|| ($_SESSION['legitCDE'] != 'Admin')) {
    echo '<h1>You are not an authorised user</h1>';
    header("Location:../adminlog.php");
    //maybe redirect to login page
    die();
}
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
if(isset($_POST['activate'])){

    $Status="Active";
    $id=$_POST['statusid'];

    $sql="UPDATE `employee` SET `status`='$Status' WHERE `id`='$id'";
    if(!mysqli_query($conn,$sql))
        {
            echo'<script language="javascript">';  
            echo'alert("Account Status Not Updated!")'; 
            echo'</script>';
        }else{
            echo'<script language="javascript">';  
            echo'alert("Account Status Updated!")'; 
            echo'</script>';
        }
}

if(isset($_POST['deactivate'])){

    $Status="Deactive";
    $id=$_POST['statusid'];

    $sql="UPDATE `employee` SET `status`='$Status' WHERE `id`='$id'";
    if(!mysqli_query($conn,$sql))
        {
            echo'<script language="javascript">';  
            echo'alert("Account Status Not Updated!")'; 
            echo'</script>';
        }else{
            echo'<script language="javascript">';  
            echo'alert("Account Status Updated!")'; 
            echo'</script>';
        }
}    

if(isset($_POST['update'])){

    $Name = $_POST['name'];
    $Email = $_POST['email'];
    $Password = $_POST['password'];
    $HashPassword=password_hash($Password,PASSWORD_BCRYPT,array('cost'=>11));
    $Birthday = $_POST['birth'];
    $Joindate = $_POST['joindate'];
    $Enddate = $_POST['enddate'];
    $Gender = $_POST['gender'];
    $Contact = $_POST['contact'];
    $Whatsapp = $_POST['whatsapp'];
    $College = $_POST['college'];
    $Refrence = $_POST['refrence'];
    $Degree = $_POST['degree'];
    $Department = $_POST['department'];
    $Leader = $_POST['leader'];
    $City = $_POST['city'];
    $State = $_POST['state'];

    $earlier = new DateTime("$Enddate");
    $later = new DateTime("$Joindate");

    $Totaldays = $later->diff($earlier)->format("%a");


    $sql="UPDATE `employee` SET
    `name`='$Name',
    `password`='$HashPassword',
    `birthday`='$Birthday',
    `joindate`='$Joindate',
    `enddate`='$Enddate',
    `totaldays`='$Totaldays',
    `gender`='$Gender',
    `contact`='$Contact',
    `whatsapp`='$Whatsapp',
    `college`='$College',
    `refrence`='$Refrence',
    `dept`='$Department',
    `degree`='$Degree',
    `head`='$Leader',
    `city`='$City',
    `state`='$State' WHERE email='$Email'";

    if(!mysqli_query($conn,$sql))
        {
            echo'<script language="javascript">';  
            echo'alert("Details Not Updated! Try again...")'; 
            echo'</script>';
        }else{
            echo'<script language="javascript">';  
            echo'alert("Details Updated Successfully!")'; 
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
                        <a class="nav-link collapsed " href="#collapseSalary" role="button" data-toggle="collapse">
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
                                    <h1 class="h3 mb-0 text-gray-800">Intern Details</h1> 
                                    <form class="form-inline my-2 my-lg-0" method="post" action="">
                                        <input class="form-control mr-sm-2" type="text" name="search"
                                            placeholder="Search Name" aria-label="Search">
                                        <button class="btn btn-outline-success my-2 my-sm-0"
                                            type="submit">Search</button>
                                    </form>
                                </div>
                            </div>
                            <div class="col-md-12 table-responsive p-2">
                                <table class="table table-striped bg-light small p-2">
                                    <tr class="table-dark">
                                        <th>Id</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Mobile No.</th>
                                        <th>WhatsApp No.</th>
                                        <th>College Name</th>
                                        <th>Refrence</th>
                                        <th>Qualification</th>
                                        <th>Department</th>
                                        <th>Birthday</th>
                                        <th>Status</th>
                                        <th>Join Date</th>
                                        <th>End Date</th>
                                        <th>Total Days</th>
                                        <th>City</th>
                                        <th>State</th>
                                        <th>Edit</th>
                                        <th>Delete</th>
                                        <th>Change Status</th>
                                    </tr>
                                    <?php
  
                                        if($_SESSION['legitDepartment']=='ALL'){
                                            if(isset($_POST['search'])){
                                                $searchKey=$_POST['search'];
                                                $sql = "SELECT * FROM employee WHERE name LIKE '%$searchKey%' OR id LIKE '%$searchKey%' OR dept LIKE '%$searchKey%' OR email LIKE '%$searchKey%' OR
                                                totaldays LIKE '%$searchKey%' OR state LIKE '%$searchKey%' OR college LIKE '%$searchKey%' OR degree LIKE '%$searchKey%' OR
                                                status LIKE '%$searchKey%'";
                                            }else{
                                                $sql = "SELECT * FROM employee limit $page1,5";
                                            }
                                        }else{
                                            if(isset($_POST['search'])){
                                                $searchKey=$_POST['search'];
                                                $sql = "SELECT * FROM employee WHERE name LIKE '%$searchKey%' OR id LIKE '%$searchKey%' OR dept LIKE '%$searchKey%' OR email LIKE '%$searchKey%' OR
                                                totaldays LIKE '%$searchKey%' OR state LIKE '%$searchKey%' OR college LIKE '%$searchKey%' OR degree LIKE '%$searchKey%' OR
                                                status LIKE '%$searchKey%' AND dept='{$_SESSION['legitDepartment']}'";
                                            }else{
                                                $sql = "SELECT * FROM employee WHERE dept='{$_SESSION['legitDepartment']}'";
                                            }
                                        }
                                        
                                        $data = mysqli_query($conn,$sql);
                                            
                                            // output data of each row
                                            while($row = $data->fetch_assoc()) {
                                                echo '<tr>
                                                <td>'.$row["id"].'</td>
                                                <td class="text-uppercase">' . $row["name"]. '</td>
                                                <td>'.$row["email"]. '</td>
                                                <td >'.$row["contact"]. "</td>
                                                <td>".$row["whatsapp"]. '</td>
                                                <td class="text-uppercase">'.$row["college"]. '</td>
                                                <td class="text-uppercase">'.$row["refrence"]. '</td>
                                                <td class="text-uppercase">'.$row["degree"]. "</td>
                                                <td>".$row["dept"]. "</td>
                                                <td>".$row["birthday"]. '</td>
                                                <td>'.$row["status"]. '</td>
                                                <td>'.$row["joindate"].'</td>
                                                <td>'.$row["enddate"].'</td>
                                                <td>'.$row["totaldays"].'</td>
                                                <td class="text-uppercase">'.$row["city"].'</td>
                                                <td class="text-uppercase">'.$row["state"].'</td>
                                                <td>
                                                    <button type="button" class="btn btn-sm btn-warning btn-block editbtn" >Edit</button>
                                                </td> 
                                                <td><a href="deleteintern.php?id='.$row["id"].'" class="btn btn-sm btn-danger btn-block"><i class="fa fa-minus"></i> </a></td> 
                                                <td>
                                                <form method="post" action=""> 
                                                    <input type="hidden" name="statusid" value="'.$row["id"].'"> 
                                                    <button class="btn btn-success" name="activate">Activate</button>
                                                    <button class="btn btn-danger" name="deactivate">Deactivate</button> </form></td> 
                                                </tr>';
                                            }
                                            
                                            
                                    ?>
                                </table>
                            </div>
                            <div class="text-center col-lg-12">
                                <nav aria-label="Page navigation example" class="text-center">
                                    <ul class="pagination justify-content-center">
                                        <?php 
                                         if($_SESSION['legitDepartment']=='ALL'){
                                             if(isset($_POST['search'])){
                                                 $searchKey=$_POST['search'];
                                                 $sql = "SELECT * FROM employee WHERE name LIKE '%$searchKey%' limit $page1,5";
                                             }else{
                                             $sql = "SELECT * FROM employee";
                                             }
                                        }else{
                                            if(isset($_POST['search'])){
                                                $searchKey=$_POST['search'];
                                                $sql = "SELECT * FROM employee WHERE name LIKE '%$searchKey%' AND dept='{$_SESSION['legitDepartment']}' limit $page1,5";
                                            }else{
                                            $sql = "SELECT * FROM employee WHERE dept='{$_SESSION['legitDepartment']}'";
                                            }
                                        }
                                        $data = mysqli_query($conn,$sql);
                                        if($data){
                                            $row=mysqli_num_rows($data);
                                            $a=$row/5;
                                            $a=ceil($a);

                                            for($b=1;$b<=$a;$b++){
                                                echo '<li class="page-item"><a class="page-link" href="viewinterns.php?page='.$b.'">'.$b.'</a></li>';        
                                            }

                                        }
                                        ?>
                                    </ul>
                                </nav>
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

    <!--Edit Intern Modal-->
    <div class="modal fade" id="editmodal" tabindex="-1" aria-labelledby="editmodal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Intern
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="" method="POST" class="needs-validation" novalidate>
                        <div class="mb-2">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>
                        <div class="mb-2">
                            <!-- <label for="email">Email</label> -->
                            <input type="email" hidden class="form-control" id="email" name="email"
                                placeholder="name.cde@gmail.com" required>
                        </div>
                        <div class="mb-2">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>
                        <div class="mb-2">
                            <label for="birth">Birthday</label>
                            <input type="date" class="form-control" id="birth" name="birth" required>
                        </div>
                        <div class="mb-2">
                            <label for="joindate">Join Date</label>
                            <input type="date" class="form-control" id="joindate" name="joindate" required>
                        </div>
                        <div class="mb-2">
                            <label for="enddate">End Date</label>
                            <input type="date" class="form-control" id="enddate" name="enddate" required>
                        </div>
                        <div class="mb-2">
                            <label for="gender">Gender</label>
                            <select class="custom-select" id="gender" name="gender" required>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                                <option value="Other">Other</option>
                            </select>
                        </div>
                        <div class="mb-2">
                            <label for="contact">Contact</label>
                            <input type="number" class="form-control" id="contact" name="contact" required>
                        </div>
                        <div class="mb-2">
                        <label for="whatsapp">Whatsapp</label>
                            <input type="number" class="form-control" id="whatsapp" name="whatsapp" required>
                        </div>
                        <div class="mb-2">
                        <label for="college">College</label>
                            <input type="text" class="form-control" id="college" name="college" required>
                        </div>
                        <div class="mb-2">
                        <label for="refrence">Refrence</label>
                            <input type="text" class="form-control" id="refrence" name="refrence" required>
                        </div>
                        <div class="mb-2">
                        <label for="leader">Head</label>
                            <select class="custom-select" id="leader" name="leader" required>
                                <option value="True">True</option>
                                <option value="False">False</option>
                            </select>
                        </div>
                        <div class="mb-2">
                        <label for="degree">Degree</label>
                            <input type="text" class="form-control" id="degree" name="degree" required>
                        </div>
                        <div class="mb-2">
                        <label for="department">Department</label>
                            <select class="custom-select" id="department" name="department" required>
                                <option value="Web Development">Web Development</option>
                                <option value="HR">HR</option>
                                <option value="Finance">Finance</option>
                                <option value="Marketing">Marketing</option>
                            </select>
                        </div>
                        <div class="mb-2">
                        <label for="city">City</label>
                            <input type="text" class="form-control" id="city" name="city" required>
                        </div>
                        <div class="mb-2">
                        <label for="state">State</label>
                            <input type="text" class="form-control" id="state" name="state" required>
                        </div>
                        <div class="mb-2">
                            <button class="btn btn-success btn-block btn-sm" name="update">Update Intern</button>
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

    <!-- <script src="https://code.jquery.com/jquery-3.5.1.js"
        integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script> -->


    <script>
    $(document).ready(function() {
        $('.editbtn').on('click', function() {
            //console.log("edit clicked");
            $('#editmodal').modal('show');

            $tr = $(this).closest('tr');
            var data = $tr.children("td").map(function() {
                return $(this).text();
            }).get();

            $('#name').val(data[1]);
            $('#email').val(data[2]);
            $('#contact').val(data[3]);
            $('#whatsapp').val(data[4]);
            $('#college').val(data[5]);
            $('#refrence').val(data[6]);
            $('#degree').val(data[7]);
            $('#department').val(data[8]);
            $('#birth').val(data[9]);
            $('#joindate').val(data[11]);
            $('#enddate').val(data[12]);
            $('#city').val(data[14]);
            $('#state').val(data[15]);
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