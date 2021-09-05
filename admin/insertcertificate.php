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

    $Name = $_POST['name'];
    $Email = $_POST['email'];
    $dept = $_POST['dept'];
    $Cname = $_POST['cname'];
    $Idate = $_POST['idate'];
    $statusMsg = '';
    $targetDir = "uploads/";
$fileName = basename($_FILES["file"]["name"]);
$targetFilePath = $targetDir . $fileName;
$fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);

if(isset($_POST["submit"]) && !empty($_FILES["file"]["name"])){
    // Allow certain file formats
    $allowTypes = array('jpg','png','jpeg','gif','pdf');
    if(in_array($fileType, $allowTypes)){
        // Upload file to server
        if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)){
            // Insert image file name into database
            if($Name=='' ||$Email==''||$dept==''|| $Cname==''||$Idate=='')
            {
                echo'<script language="javascript">';  
                echo'alert("Fields are mandatory")'; 
                echo'</script>';	
                header("refresh:1; url=createcertificate.php");
            }else{
                $sql="INSERT INTO certificate (email,name,dept,cname,idate,image) VALUES('$Email','$Name','$dept','$Cname','$Idate','$fileName')";
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
        
                header("refresh:1; url=createcertificate.php");
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