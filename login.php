
<?php 
require_once('db.php');
 ?>

<?php
	if(isset($_POST['submit'])){
		$username = $_POST['username'];
		$password = $_POST['password'];
		if($_POST['username']==''){
			$erroname = "User must not be blank";
		}
		if($_POST['password']==''){
			$erropass = "Password must not be blank";
		}
		else{
			$sql = "SELECT * FROM user where username= '$username' and password = '$password'";
			$stmt = $conn->prepare($sql);
			$stmt->setFetchMode(PDO::FETCH_ASSOC);
			$stmt->execute();
			if($stmt->rowCount()==0){
				$errouandp = "Invalid username or password";
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
		<input type="text" name="username" value="<?php if(isset($_POST['username'])){echo $_POST['username'];} ?>"><span><?php echo $erroname; ?></span><br>
		Password:<br>
		<input type="password" name="password" value="<?php if(isset($_POST['password'])){echo $_POST['password'];} ?>"><span><?php echo $erropass; ?></span><br><br>
		<input type="submit" name="submit" value="submit">
		<a href="adduser.php"><input type="button" name="" value="register"></a>



	</form>
