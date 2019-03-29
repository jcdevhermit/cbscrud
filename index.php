<!DOCTYPE html>
<html>
<head>
	<title>cbscrud</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css">
	
	
</head>
<body>

<?php require_once 'process.php'; ?>

<!-- Add Modal -->
<div class="modal fade" id="customer-addmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Customer Data</h5>

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <!-- Form -->
      <form action="process.php" method="POST">
      <div class="modal-body">
      		
				  <div class="form-group">
				    <label>First Name</label>
				    <input type="text" name="fname" class="form-control"  placeholder="Enter First Name">
				  </div>
				  <div class="form-group">
				    <label>Last Name</label>
				    <input type="text" name="lname" class="form-control"  placeholder="Enter Last Name">
				  </div>
				  <div class="form-group">
				    <label>E-Mail</label>
				    <input type="email" name="email" name="" class="form-control"  placeholder="Enter E-Mail">
				  </div>
				  <div class="form-group">
				    <label>Username</label>
				    <input type="text" name="username" class="form-control"  placeholder="Enter Username">
				  </div>
				  <div class="form-group">
				    <label>Password</label>
				    <input type="password" name="password" class="form-control"  placeholder="Enter Password">
				  </div>
				  <div class="form-group">
				    <label>Contact</label>
				    <input type="number" name="contact" class="form-control"  placeholder="Enter Phone Number">
				  </div>
     
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" name="insertdata" class="btn btn-success">Save Data</button>
      </div>
      </form>
    </div>
  </div>
</div>

<!--------------------------------------------------------------------------------------->
<!-- Edit Modal -->
<div class="modal fade" id="editmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Customer Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <!-- form -->
      <form action="process.php" method="POST">
      <div class="modal-body">
      			<input type="hidden" name="update_id" id="update_id">
				  <div class="form-group">
				    <label>First Name</label>
				    <input type="text" name="fname" id="fname" class="form-control"  placeholder="Edit First Name">
				  </div>
				  <div class="form-group">
				    <label>Last Name</label>
				    <input type="text" name="lname" id="lname" class="form-control"  placeholder="Edit Last Name">
				  </div>
				  <div class="form-group">
				    <label>E-Mail</label>
				    <input type="email" name="email" id="email" class="form-control"  placeholder="Edit E-Mail">
				  </div>
				  <div class="form-group">
				    <label>Username</label>
				    <input type="text" name="username" id="username" class="form-control"  placeholder="Edit Username">
				  </div>
				  <div class="form-group">
				    <label>Password</label>
				    <input type="password" name="password" id="password" class="form-control"  placeholder="Edit Password">
				  </div>
				  <div class="form-group">
				    <label>Contact</label>
				    <input type="text" name="contact" id="contact" class="form-control"  placeholder="Edit Phone Number">
				  </div>
     
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" name="updatedata" class="btn btn-warning">Update Data</button>
      </div>
      </form>
    </div>
  </div>
</div>
<!--------------------------------------------------------------------------------------->
<!-- Delete Modal -->
<div class="modal fade" id="deletemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Delete Customer Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <!-- form -->
      <form action="process.php" method="POST">
      <div class="modal-body">
      			<input type="hidden" name="delete_id" id="delete_id">
				<h4>Do you want to Delete this Data?</h4>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">NO</button>
        <button type="submit" name="deletedata" class="btn btn-danger">Yes, <strong>DELETE</strong> it.</button>
      </div>
      </form>
    </div>
  </div>
</div>
<!--------------------------------------------------------------------------------------->

<!-- Main -->
	<div class="container-fluid">
		<div class="jumbotron" style="border-radius: 0;">
			<div class="card" style="background-color: black; border-radius: 0;">
				<h2 style="color:white; text-align: center;">Admin</h2>
			</div>
			<div class="card" style="border-radius: 0;">
				<div class="card-body">
					<!-- Button trigger modal -->
					<button type="button" class="btn btn-outline-dark" style="float: right;"data-toggle="modal" data-target="#customer-addmodal">
					  Add Data
					</button>
				</div>
			</div>
			
<!-- Session -->
	<?php
	 if(isset($_SESSION['message'])): ?>
	
	<div class="alert alert-<?=$_SESSION['msg_type']?>">
	<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>

		<?php
		echo $_SESSION['message'];
		unset($_SESSION['message']); 
		?>
	</div>
	<?php endif ?>
<!-- /Session-->

			<div class="card" style="border-radius: 0;>
				<div class="card-body">

				

				<?php 
					$connection = mysqli_connect("localhost","root","");
					$db = mysqli_select_db($connection, 'cbscrud');
						
					$query = "SELECT * FROM customer";
					$query_run = mysqli_query($connection, $query);
				?>
					<table class="table" id="datatableid">
						  <thead>
						    <tr>
						      <th scope="col">ID</th>
						      <th scope="col">First Name</th>
						      <th scope="col">Last Name</th>
						      <th scope="col">E-Mail</th>
						      <th scope="col">Username</th>
						      <th scope="col">Password</th>
						      <th scope="col">Contact</th>
						      <th scope="col">EDIT</th>
						      <th scope="col">DELETE</th>
						    </tr>
						</thead>
				<?php
					if($query_run){
						foreach($query_run as $row){
				?>
						  <tbody>
						    <tr>
						 	  <td><?php echo $row['id']; ?></td>
						      <td><?php echo $row['fname']; ?></td>
						      <td><?php echo $row['lname']; ?></td>
						      <td><?php echo $row['email']; ?></td>
						      <td><?php echo $row['username']; ?></td>
						      <td><?php echo $row['password']; ?></td>
						      <td><?php echo $row['contact']; ?></td>
						      <td>
						      	<button type="button" class="btn btn-info editbtn">EDIT</button>
						      </td>
						      <td>
						      	<button type="button" class="btn btn-danger deletebtn">DELETE</button>
						      </td>
						    </tr>
						  </tbody>
				<?php
						}
					}
					else{
						echo "No Record Found";
					}
				?>
					</table>
				</div>
			</div>
		</div>
	</div>





<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>

<script>
	//$(document).ready(function() {
    //var dataTable=$('#datatableid').DataTable({
    	//"processing": true,
    	//"serverSide": true,
    	//"ajax": {
    		//url:"fetch.php",
    		//type:"post"
    	//}
   // });
//} );
</script>
<script>
	$(document).ready(function(){
		$('.deletebtn').on('click',function(){

			$('#deletemodal').modal('show');

				$tr = $(this).closest('tr');

				var data = $tr.children("td").map(function(){
					return $(this).text();
				}).get();

				console.log(data);

				$('#delete_id').val(data[0]);
		});
	});
</script>
<script>
	$(document).ready(function(){
		$('.editbtn').on('click',function(){

			$('#editmodal').modal('show');

				$tr = $(this).closest('tr');

				var data = $tr.children("td").map(function(){
					return $(this).text();
				}).get();

				console.log(data);

				$('#update_id').val(data[0]);
				$('#fname').val(data[1]);
				$('#lname').val(data[2]);
				$('#email').val(data[3]);
				$('#username').val(data[4]);
				$('#password').val(data[5]);
				$('#contact').val(data[6]);
		});
	});
</script>
</body>
</html>