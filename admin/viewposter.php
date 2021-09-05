<?php
include('conn.php');
if(isset($_GET['id']))
{
    mysqli_error($con);	
$id=$_GET['id'];
mysqli_error($con);	
$query = $con->query("SELECT `posterimg` from `event` where id='".$id."'");
if($query->num_rows > 0){
    while($row = $query->fetch_assoc()){
        
      // echo $id;
        $imageURL = 'uploadposters/'.$row["posterimg"];
?>
    <img src="<?= $imageURL; ?>"  class="card-img-center" alt="" style="height:28em; margin-top:100px; margin-left:100px;" alt="Image not found" />
<?php }}} ?>

 





