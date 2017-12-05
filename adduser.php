<?php 
require_once('db.php');
 
	if(isset($_POST['submit'])){
		$username = $_POST['username'];
		$password = $_POST['password'];
		$email = $_POST['email'];
		$fullname = $_POST['fullname'];
		if(strlen($username)<6){
			$erroname = "Username must not be less than 6 characters";
		}
		if(strlen($password)<6){
			$erropass = "Password must not be less than 6 characters";
		}
		if($_POST['email']==''){
			$erroemail = "Email must not be blank";
		}
		if($_POST['fullname']==''){
			$errofullname = "Fullname must not be blank";
		}else{

			$sql = "SELECT * FROM user WHERE username = '$username'";
			$query = $conn->prepare($sql);
			$query->execute();
			if($query->rowCount()){
				echo "Username already exists";
			}else{

			$sql = "INSERT INTO user (username,password,fullname,email) VALUES ('$username','$password','$fullname','$email')";
			$stmt = $conn->prepare($sql);
			
			if($stmt->execute()){
				header('Location:index.php');
			}else{
				echo "Add is fail";
			}
		}
			
		}
	} 
 ?>




	<form action="" method="POST">
		Username:<br>

		<input type="text" name="username" value="<?php if(isset($_POST['username'])){echo $_POST['username'];} ?>"><span><?php echo $erroname ?></span><br>
		Password:<br>
		<input type="password" name="password" value="<?php if(isset($_POST['password'])){echo $_POST['password'];} ?>"><span><?php echo $erropass ?></span><br>
		Email:<br>
		<input type="text" name="email" value="<?php if(isset($_POST['email'])){echo $_POST['email'];} ?>"><span><?php echo $erroemail ?></span><br>
		Fullname:<br>
		<input type="text" name="fullname" value="<?php if(isset($_POST['fullname'])){echo $_POST['fullname'];} ?>"><span><?php echo $errofullname ?></span><br><br>
		<input type="submit" name="submit" value="submit">
		<a href="login.php"><input type="button" name="" value="Back"></a>
	</form>
