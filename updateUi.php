<?php
include('header.php');
include('dbcon.php');
?>

<?php 

if(isset($_GET['id'])){
    $id=$_GET['id'];

    $query = "SELECT * FROM employee where id=$id";
    $result = mysqli_query($connection, $query);
    if (!$result) {
      die("Query failed: " . mysqli_error($connection));
    } else {
        $row=mysqli_fetch_assoc($result);
    }
}
?>

<?php 
if(isset($_POST['update'])){

    if(isset($_GET['id_new'])){
        $idnew=$_GET["id_new"];
    }

    $name=$_POST['nam'];
    $age=$_POST['umar'];
    $mobile=$_POST['mobile'];


    $query="UPDATE `employee` SET `name` = '$name', `age` = '$age', `mobile` = '$mobile' WHERE `employee`.`id` = $idnew";

    $result=mysqli_query($connection,$query);
    if (!$result) {
        die("Query failed: " . mysqli_error($connection));
      } else {
          header("location:index.php");
          exit();
      }
}

?>



<div class="container">
<form action="updateUi.php?id_new=<?php echo $id; ?>" method="post">
      <div class="modal-body"> 
          <div class="form-group">
            <label for="employeeName">Name</label>
            <input type="text" class="form-control" name="nam" id="employeeName" placeholder="Enter name" value="<?php echo $row['name'] ?>" >
          </div> 
          <div class="form-group">
            <label for="employeeAge">Age</label>
            <input type="text" class="form-control" name="umar" id="employeeAge" placeholder="Enter age"
            value="<?php echo $row['age']?>"  >
            <label for="employeeMobile">Mobile</label>
            <input type="text" class="form-control" name="mobile" id="employeeMobile" placeholder="Enter mobile number"
            value="<?php echo $row['mobile']?>" >
          </div>
          </div>
          <div class="form-group">
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary" name="update">Update</button>
      </div>
      </form>
      </div>
      <?php 
      include('footer.php');
      ?>