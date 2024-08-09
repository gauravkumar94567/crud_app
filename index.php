<?php
include('header.php');
include('dbcon.php');
include('insert_emp.php');
include('delete.php');
?>



<div class="container mt-4">
  <div class="box1">
    <h4>All Employees <button class="btn bg-primary text-white" style="float:right;" data-toggle="modal" data-target="#exampleModal">Add Employee</button></h4>
  </div>
  <table class="table table-hover table-bordered table-striped mt-4">
    <thead>
      <tr>
        <th scope="col">No.</th>
        <th scope="col">Name</th>
        <th scope="col">Age</th>
        <th scope="col">Mobile</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
      <?php 
      $query = "SELECT * FROM employee";
      $result = mysqli_query($connection, $query);
      if (!$result) {
        die("Query failed: " . mysqli_error($connection));
      } else {
        while ($row = mysqli_fetch_assoc($result)) {
      ?>
      <tr>
        <td><?php echo $row['id']; ?></td>
        <td><?php echo $row['name']; ?></td>
        <td><?php echo $row['age']; ?></td>
        <td><?php echo $row['mobile']; ?></td>
        <td>
          <a href="updateUi.php?id=<?php echo $row['id']; ?>" class="btn text-white bg-success rounded">Update</a>
          <a href="delete.php?id=<?php echo $row['id']; ?>" class="btn text-white bg-danger rounded">Delete</a>
          </td>
      </tr>
      <?php
        }
      }
      ?>
    </tbody>
  </table>
</div>

<!-- Modal -->
<form action="insert_emp.php" method="post">
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add New Employee</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body"> 
          <div class="form-group">
            <label for="employeeName">Name</label>
            <input type="text" class="form-control" name="nam" id="employeeName" placeholder="Enter name" required>
          </div> 
          <div class="form-group">
            <label for="employeeAge">Age</label>
            <input type="text" class="form-control" name="umar" id="employeeAge" placeholder="Enter age" required>
          </div>
          <div class="form-group">
            <label for="employeeMobile">Mobile</label>
            <input type="text" class="form-control" name="mobile" id="employeeMobile" placeholder="Enter mobile number" required>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" name="addEmp">Add Employee</button>
      </div>
    </div>
  </div>
</div>
</form>

<?php 
include('footer.php');
?>
