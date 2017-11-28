
<?php 
require_once('db.php');
 ?>
<?php
	if(isset($_POST['submit'])){
		$username = $_POST['username'];
		$password = $_POST['password'];
		if($_POST['username']==''){
			$erroname = "ten khong duoc bo trong";
		}
		if($_POST['password']==''){
			$erropass = "password khong duoc bo trong";
		}
		else{
			$sql = "SELECT * FROM user where username= '$username' and password = '$password'";
			$stmt = $conn->prepare($sql);
			$stmt->setFetchMode(PDO::FETCH_ASSOC);
			$stmt->execute();
			if($stmt->rowCount()==0){
				$errouandp = "sai username hoac password";
			}else{
				session_start();
				$_SESSION['username']=$username;
				header('Location:profile.php');
			}
		}
	} 
 ?>


	<form action="" method="POST" >
		<span><?php echo $errouandp; ?></span>
		Username:<br>
		<input type="text" name="username"><span><?php echo $erroname; ?></span><br>
		Password:<br>
		<input type="passsword" name="password"><span><?php echo $erropass; ?></span><br><br>
		<input type="submit" name="submit" value="submit">
		<a href="adduser.php"><input type="button" name="" value="register"></a>



	</form>
