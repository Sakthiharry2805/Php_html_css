<?php

require 'index.php';

require 'database.php';

?>

<div class="container">
    <?php 

    if(isset($_POST['submit'])){

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
        
        $sql = "INSERT INTO customer (customer_name, customer_age, customer_email, customer_gender, customer_dob, customer_address)
      VALUES ('{$customer_name}', '{$customer_age}', '{$customer_email}','{$customer_gender}', '{$customer_dob}', '{$customer_address}')";

          if(mysqli_query($con,$sql))
          {   
            echo "<div class='alert alert-success'>Successfully Add the user</div>";
            $url="http://localhost/php_projects_training/php_html_css/customer/viewuser.php";
                echo '<script language="javascript">window.location.href ="'.$url.'"</script>';
              http_response_code(201);
          }
          else{
              http_response_code(422);
          }
      }
    }
    ?>
	<div class="row">
	<div class="col-md-6 col-md-offset-3">
		<div class="box">
			<h4>Add New User</h4> 
        <form method="POST" action="">

          <label>Name:</label>
          <input type="text" name="name" value="" placeholder="Enter your name" class = "form-control" autofocus required><br>

          <label>Age:</label>
          <input type="number" name="age" value="" placeholder="Enter your age" class = "form-control" required><br>

          <label>Email:</label>
          <input type="email" name="email" value="" placeholder="Enter your email" class = "form-control"  required><br>

          <label>Gender:</label>
          <label class="form-control">
          <input type="radio" name="gender" value="Male"  checked>
          <label>Male</label>
          <input type="radio" name="gender" value="Female" >
          <label>Female</label>
          <input type="radio" name="gender" value="Other"  >
          <label>Other</label>
          </label>
          <br>

          <label>Date Of Birth:</label>
          <input type="date" name="dob" value="" class = "form-control"  required><br>
          

          <label for="Address">Address:</label>
          <input type="textarea"  name="address" value="" placeholder="Enter your address" class = "form-control" required><br>

          <input type="submit" value="Submit" name="submit" class="btn btn-success" >
          
        </form>
		</div>
	</div>
</div>
</div>

<?php

require 'indexfooter.php'

?>
