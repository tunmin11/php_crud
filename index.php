<?php
//including the database connection file
include_once("config.php");

//fetching data in descending order (lastest entry first)
//$result = mysql_query("SELECT * FROM users ORDER BY id DESC"); // mysql_query is deprecated
$result = mysqli_query($mysqli, "SELECT * FROM user ORDER BY id DESC"); // using mysqli_query instead
$data = mysqli_fetch_all($result,MYSQLI_ASSOC);

// echo "<pre>".var_export($data,true)."</pre>";
?>

<html>
<head>	
	<title>Homepage</title>
</head>
<body>
<a href="add_form.php">Add New Data</a><br/><br/>

	<table width='80%'>

	<tr bgcolor='#CCCCCC'>
		<td>No</td>
		<td>Name</td>
		<td>Age</td>
		<td>Email</td>
		<td>Update</td>
	</tr>
	<?php 
	//while($res = mysql_fetch_array($result)) { // mysql_fetch_array is deprecated, we need to use mysqli_fetch_array 	
	foreach($data as $i => $user)
	{ ?>
		<tr>
		<td><?= ++$i ?></td>
		<td><?= $user['name'] ?></td>
		<td><?= $user['age'] ?></td>
		<td><?= $user['email'] ?></td>	
		<td><a href="edit.php?id=<?= $user['id'] ?>">Edit</a> | <a href="delete.php?id=<?= $user['id'] ?>" onClick="return confirm('Are you sure you want to delete?')">Delete</a></td>		
	<?php } ?>
	</table>
</body>
</html>
