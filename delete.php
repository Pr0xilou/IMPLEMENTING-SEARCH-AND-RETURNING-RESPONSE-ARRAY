<?php require_once 'core/models.php'; ?>
<?php require_once 'core/dbConfig.php';?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Delete Manager</title>
	<link rel="stylesheet" href="styles.css">
    <style>
		* {
			margin: 0;
			padding: 0;
			box-sizing: border-box;
		}
		body {
			font-family: Arial, sans-serif;
			background-color: #f4f7fc;
			color: #333;
			padding: 20px;
		}
		.container {
			max-width: 600px;
			margin: 0 auto;
			padding: 20px;
			border-radius: 8px;
			background-color: #fff;
			box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
			border: 1px solid #f0c0c0;
		}
		h1 {
			text-align: center;
			color: #d9534f;
			font-size: 2em;
			margin-bottom: 20px;
		}
		h2 {
			color: #333;
			font-size: 1.2em;
			margin-bottom: 10px;
		}
		.deleteBtn {
			text-align: right;
			margin-top: 20px;
		}
		.deleteBtn input[type="submit"] {
			background-color: #f69697;
			color: white;
			border: none;
			padding: 12px 20px;
			font-size: 1.1em;
			border-radius: 5px;
			cursor: pointer;
			transition: background-color 0.3s ease;
		}
		.deleteBtn input[type="submit"]:hover {
			background-color: #d84f4f;
		}
		.container h2 {
			margin: 10px 0;
		}
		.container {
			border-style: solid;
			border-color: red;
			background-color: #ffcbd1;
			padding: 20px;
			border-radius: 8px;
		}
		.message {
			text-align: center;
			font-size: 1.1em;
			color: #d9534f;
		}
		form {
			margin-top: 20px;
		}
	</style>
</head>
<body>
	<h1>Are you sure you want to delete this Manager?</h1>
	<?php $getUserByID = getManagerByID($pdo, $_GET['id']); ?>
	<div class="container" style="border-style: solid; border-color: red; background-color: #ffcbd1;height: 500px;">
		<h2>First Name: <?php echo $getUserByID['first_name']; ?></h2>
		<h2>Last Name: <?php echo $getUserByID['last_name']; ?></h2>
		<h2>Email: <?php echo $getUserByID['email']; ?></h2>
		<h2>Gender: <?php echo $getUserByID['gender']; ?></h2>
        <h2>Address: <?php echo $getUserByID['address']; ?></h2>
        <h2>Education: <?php echo $getUserByID['education']; ?></h2>
		<div class="deleteBtn" style="float: right; margin-right: 10px;">
			<form action="core/handleForms.php?id=<?php echo $_GET['id']; ?>" method="POST">
				<input type="submit" name="deleteUserBtn" value="Delete" style="background-color: #f69697; border-style: solid;">
			</form>			
		</div>	

	</div>
</body>
</html>