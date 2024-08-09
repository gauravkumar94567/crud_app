<?php
include('dbcon.php');
?>
<?php 
if(isset($_POST['addEmp'])){
    $name=$_POST['nam'];
    $age=$_POST['umar'];
    $mno=$_POST['mobile'];
    $query= "INSERT INTO `employee` (`id`, `name`, `age`, `mobile`) VALUES (NULL, '$name', '$age', '$mno')";
   $result=mysqli_query($connection,$query);
   if(!$result){
    die("Data not inserted".mysqli_error($connection));
   }
   else{
    header("location:index.php");
    exit();
   }
}

?>