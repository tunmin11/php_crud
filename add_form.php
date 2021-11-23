<!DOCTYPE html>
<head>
	<title>Add Data</title>
</head>

<?php
	include_once('./config.php');

	$errors = [];
	if(isset($_POST['Submit']))
	{
		echo "pos";
		$name = $_POST['name'];
		$age = $_POST['age'];
		$email = $_POST['email'];

		if(empty($name) || empty($age) || empty($email) )
		{
			if(empty($name))
			{
				$errors['name'] = 'Name cannot be null.'; 
			}
			if(empty($age))
			{
				$errors['age'] = 'age cannot be null.'; 
			}
			if(empty($email))
			{
				$errors['email'] = 'email cannot be null.'; 
			}
			var_dump($errors); 
		}
		else{
			$result = mysqli_query($mysqli,"INSERT INTO user(name,age,email) VALUES('$name','$age','$email')");

			if($result) 
			{
				echo "user created sucessfully";
				echo "<a href='index.php'>Index</a>";
			}
			else{
				echo "something wrong";
			}
		}

	}

?>

<body>
	<a href="index.php">Home</a>
	<br/><br/>

	<form action="add_form.php" method="post" name="form1">
		<table width="25%" border="0">
			<tr> 
				<td>Name</td>
				<td>
					<input type="text" name="name" >
					<?= isset($errors['name']) ? $errors['name'] : '' ?>
				</td>
			</tr>
			<tr> 
				<td>Age</td>
				<td>
					<input type="text" name="age" >
					<?= isset($errors['age']) ? $errors['age'] : '' ?>
				</td>
			</tr>
			<tr> 
				<td>Email</td>
				<td>
					<input type="text" name="email" >
					<?= isset($errors['email']) ? $errors['email'] : '' ?>
				</td>
			</tr>
			<tr> 
				<td></td>
				<td><input type="submit" name="Submit" value="Add"></td>
			</tr>
		</table>
	</form>
</body>
</html>

