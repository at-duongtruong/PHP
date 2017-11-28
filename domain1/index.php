
	<?php 
	require_once('db.php');
	session_start();
	$sql = "SELECT * from user";
	$stmt = $conn->prepare($sql);
	$stmt->setFetchMode(PDO::FETCH_ASSOC);
	$stmt->execute();
	$result = $stmt->fetchAll();
	echo $_SESSION['username'];
	 ?>


	<table >
		<tr>
			<th>Id user</th>
			<th>Username</th>
			<th>Fullname</th>
			<th>Email</th>
			<th>Picture</th>
		</tr>
		<?php foreach ($result as $key) {?>
		<tr>
			
			<td><?php echo $key['id']; ?></td>
			<td><?php echo $key['username']; ?></td>
			<td><?php echo $key['fullname']; ?></td>
			<td><?php echo $key['email']; ?></td>
			<td><img alt="" src="<?php echo $key['picture']; ?>" width="100" height="50"></td>
			
		</tr>
		<?php } ?>
	</table>
