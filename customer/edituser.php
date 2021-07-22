<?php 

require_once 'database.php';

require_once 'index.php';

?>
<div class="container">

	<?php 
	$customer_id = $_GET['customer_id'];
	if(isset($_POST['update'])){

        if( empty($_POST['name']) || empty($_POST['age']) || empty($_POST['email']) || 
            empty($_POST['gender']) || empty($_POST['dob']) || empty($_POST['address']))
            {
                echo "Please fillout all required fields"; 
            }else{		
                $customer_name = $_POST['name'];
                $customer_age = $_POST['age'];
                $customer_email = $_POST['email'];
                $customer_gender = $_POST['gender'];
                $customer_dob = $_POST['dob'];
                $customer_address = $_POST['address'];

                // $customer_id = $_GET['customer_id'];

			$sql = "UPDATE customer SET customer_name ='{$customer_name}', customer_age='{$customer_age}', customer_email='{$customer_email}', 
            customer_gender='{$customer_gender}', customer_dob='{$customer_dob}', customer_address='{$customer_address}' 
            WHERE customer_id='{$customer_id}'";

            if(mysqli_query($con,$sql))
            {
                echo "<div class='alert alert-success'>Successfully modify the user</div>";
                http_response_code(201);
                $url="http://localhost/php_projects_training/php_html_css/customer/viewuser.php";
                echo '<script language="javascript">window.location.href ="'.$url.'"</script>';
                // header('Location: viewuser.php');
		        // exit;
            }
            else{
                http_response_code(422);
            }
		}
	}
	// $id = isset($_GET['customer_id']) ? (int) $_GET['customer_id'] : 0;
    
    $sql = "SELECT * FROM customer WHERE customer_id =".$customer_id;
	$result = mysqli_query($con,$sql);

    // echo $result;

	// if($result->num_rows < 1){
	// 	header('Location: index.php');
	// 	exit;
	// }
	$row = mysqli_fetch_assoc($result);

	?>
	<div class="row">
	<div class="col-md-6 col-md-offset-3">
		<div class="box">
			<h4>Update User</h4> 
			<form name="customer-form" action="" method="POST">
				<input type="hidden" value="<?php echo $row['customer_id']; ?>" name="customer_id">

                <label>Name:</label>
                <input type="text" name="name" value="<?php echo $row['customer_name']; ?>"  class = "form-control" autofocus required><br>

                <label>Age:</label>
                <input type="number" name="age" value="<?php echo $row['customer_age']; ?>"  class = "form-control" required><br>

                <label>Email:</label>
                <input type="email" name="email" value="<?php echo $row['customer_email']; ?>" class = "form-control"  required><br>

                <label>Gender:</label>
                <label class="form-control" >
                <input type="radio" name="gender" value="Male" <?php if ($row['customer_gender']=="Male") echo "checked";?>>
                <label>Male</label>
                <input type="radio" name="gender" value="Female" <?php if ($row['customer_gender']=="Female") echo "checked";?>>
                <label>Female</label>
                <input type="radio" name="gender" value="Other" <?php if ($row['customer_gender']=="Other") echo "checked";?>>
                <label>Other</label>
                </label><br>

                <label>Date Of Birth:</label>
                <input type="date" name="dob" value="<?php echo $row['customer_dob']; ?>" class = "form-control"  required><br>

                <label for="Address">Address:</label>
                <input type="textarea"  name="address" value="<?php echo $row['customer_address']; ?>" class = "form-control" required><br>

				<input type="submit" name="update" class="btn btn-success" value="Update">
                <!-- <script>
                    function update(){
                        window.location('viewuser.php');

                    }
                </script> -->
			</form>

		</div>
	</div>
</div>
</div>

<?php 

 require_once 'indexfooter.php';
 ?>