<?php 
require_once('db.php');
 
	if(isset($_POST['submit'])){
		$username = $_POST['username'];
		$password = $_POST['password'];
		$email = $_POST['email'];
		$fullname = $_POST['fullname'];
		if(strlen($username)<6){
			$erroname = "username khong duoc duoi 6 ky tu";
		}
		if(strlen($password)<6){
			$erropass = "password khong duoc duoi 6 ky tu";
		}
		if($_POST['email']==''){
			$erroemail = "email khong duoc bo trong";
		}
		if($_POST['fullname']==''){
			$errofullname = "fullname khong duoc bo trong";
		}else{

			$sql = "SELECT * FROM user WHERE username = '$username'";
			$query = $conn->prepare($sql);
			$query->execute();
			if($query->rowCount()){
				echo "username da ton tai";
			}else{

			$sql = "INSERT INTO user (username,password,fullname,email) VALUES ('$username','$password','$fullname','$email')";
			$stmt = $conn->prepare($sql);
			
			if($stmt->execute()){
				header('Location:index.php');
			}else{
				echo "them that bai";
			}
		}
			
		}
	} 
 ?>




	<form action="" method="POST">
		Username:<br>
		<input type="text" name="username"><span><?php echo $erroname ?></span><br>
		Password:<br>
		<input type="password" name="password"><span><?php echo $erropass ?></span><br>
		Email:<br>
		<input type="text" name="email"><span><?php echo $erroemail ?></span><br>
		Fullname:<br>
		<input type="text" name="fullname"><span><?php echo $errofullname ?></span><br><br>
		<input type="submit" name="submit" value="submit">
		<a href="login.php"><input type="button" name="" value="Back"></a>
	</form>
