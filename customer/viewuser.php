<?php 

require_once 'database.php';

require_once 'index.php';

echo "<div class='container'>";

if( isset($_POST['delete'])){
	$sql = "DELETE FROM customer WHERE customer_id=" . $_POST['customer_id'];
	if($con->query($sql) === TRUE){
		echo "<div class='alert alert-success'>Successfully delete the user</div>";
	}
}

$sql 	= "SELECT * FROM customer";
$result = mysqli_query($con,$sql);

if( $result->num_rows > 0)
{ 
	?>
	<h4>List of all Users</h4>
	<table class="table table-bordered table-striped">
		<tr>
            <th>ID</th>
			<th>Name</th>
			<th>Age</th>
            <th>Email</th>
            <th>Gender</th>
            <th>Date of Birth</th>
			<th>Address</th>
			<th width="70px">Delete</th>
			<th width="70px">EDIT</th>
		</tr>
	<?php
	while( $row = mysqli_fetch_assoc($result)){ 
		echo "<form action='' method='POST'>";	//added
		echo "<input type='hidden' value='". $row['customer_id']."' name='customer_id' />"; //added
		echo "<tr>";
        echo "<td>".$row['customer_id'] . "</td>";
		echo "<td>".$row['customer_name'] . "</td>";
		echo "<td>".$row['customer_age'] . "</td>";
		echo "<td>".$row['customer_email'] . "</td>";
		echo "<td>".$row['customer_gender'] . "</td>";
        echo "<td>".$row['customer_dob'] . "</td>";
        echo "<td>".$row['customer_address'] . "</td>";
		echo "<td><input type='submit' name='delete' value='Delete' class='btn btn-danger' /></td>";  
		echo "<td><a href='edituser.php?customer_id=".$row['customer_id']."' class='btn btn-info'>Edit</a></td>";
		echo "</tr>";
		echo "</form>"; //added 
	}
	?>
	</table>
<?php 
}
else
{
	echo "<br><br>No Record Found";
}
?> 
</div>

<?php 

 require_once 'indexfooter.php';