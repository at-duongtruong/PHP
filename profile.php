
<?php
	session_start();
	if(!isset($_SESSION['username'])){
		header('Location:login.php');
	}
	require_once('db.php');
	$user = $_SESSION['username'];
	$sql = "SELECT * FROM user where username = '$user'";
	$stmt = $conn->prepare($sql);
	$stmt->execute();
	$result = $stmt->fetch();
	if(isset($_POST['submit'])){
		$target_dir = "uploads/";
		$target_file = $target_dir . basename($_FILES["picture"]["name"]);
		$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
		$username = $_POST['username'];
		$password = $_POST['password'];
		$email = $_POST['email'];
		$fullname = $_POST['fullname'];

		if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
		&& $imageFileType != "gif" ) {
		    $eroo = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
  		  	
}else{		
		move_uploaded_file($_FILES["picture"]["tmp_name"], $target_file);

		$sqlup = "UPDATE user set username='$username',password='$password',email='$email',fullname='$fullname',picture='$target_file' WHERE username='$user'";
		$query = $conn->prepare($sqlup);

		if($query->execute()){
			$msg = 1;
			header('Location:index.php');
		}else{
			echo "eroo";
		}
	}
}
 ?>
 <a href="logout.php">Logout</a>
	<form action="" method="POST" enctype="multipart/form-data">

		<span><?php echo $eroo; ?></span>
		Username:<br>
		<input type="text" name="username" value="<?php echo $result['username']; ?>"><br>
		Password:<br>
		<input type="password" name="password" value="<?php echo $result['password']; ?>"><br>
		Email:<br>
		<input type="text" name="email" value="<?php echo $result['email']; ?>"><br>
		FullName:<br>
		<input type="text" name="fullname" value="<?php echo $result['fullname']; ?>"><br>
		Picture:<br>
		<input type="file" name="picture" value="<?php echo $result['picture']; ?>"><br><br>
		<input type="submit" name="submit" value="submit">
		<a href="index.php">Back</a>
	</form>
