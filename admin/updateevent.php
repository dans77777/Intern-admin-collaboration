<?php

    $username ="root";
    $password ="";
    $server ="localhost";
    $database = "intern";


    $con = mysqli_connect($server, $username,$password);
    if(!$con){
        echo "Not Connected to Server";
    }

    if(!mysqli_select_db($con,$database))
    {
        echo "Database not selected";
    }
    $id = $_POST['id'];
    $Name = $_POST['name'];
    $start = $_POST['start'];
    $end = $_POST['end'];
    $status = $_POST['status'];
   // $Idate = $_POST['idate'];
    $statusMsg = '';
    $targetDir = "uploadposters/";
$fileName = basename($_FILES["file"]["name"]);
$targetFilePath = $targetDir . $fileName;
$fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);

if(isset($_POST["update"]) && !empty($_FILES["file"]["name"])){
    // Allow certain file formats
    $allowTypes = array('jpg','png','jpeg','gif','pdf');
    if(in_array($fileType, $allowTypes)){
        // Upload file to server
        if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)){
            // Insert image file name into database
            if($Name=='' ||$start==''||$end==''|| $status=='')
            {
                echo'<script language="javascript">';  
                echo'alert("Fields are mandatory")'; 
                echo'</script>';	
                header("refresh:1; url=eventdetails.php");
            }else{

                $sql=mysqli_query($con,"select * from event where id='$id'");
$row=mysqli_fetch_array($sql);

unlink("./uploadposters/$row[posterimg]");

//mysqli_query("delete `posterimg` from event where id='$id'");
                $sql="UPDATE `event` SET
                `name`='$Name',
                `start`='$start',
                `end`='$end',
                `status`='$status',
               
                `posterimg`='$fileName'
                WHERE `id`='$id'";
                echo $con->error;
                if(!mysqli_query($con,$sql))
                {
                    echo'<script language="javascript">';  
                    echo'alert("Not Inserted")'; 
                    echo'</script>';	
                }else{
                    echo'<script language="javascript">';  
                    echo'alert("Inserted Successfully!")'; 
                    echo'</script>';	
                }
        
                header("refresh:1; url=eventdetails.php");
            }	
        }
    }
}
//             if($insert){
//                 $statusMsg = "The file ".$fileName. " has been uploaded successfully.";
//             }else{
//                 $statusMsg = "File upload failed, please try again.";
//             } 
//         }else{
//             $statusMsg = "Sorry, there was an error uploading your file.";
//         }
//     }else{
//         $statusMsg = 'Sorry, only JPG, JPEG, PNG, GIF, & PDF files are allowed to upload.';
//     }
// }else{
//     $statusMsg = 'Please select a file to upload.';
// }

// // Display status message
// echo $statusMsg;

    

    
    

?>