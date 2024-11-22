<?php
	require_once 'core/models.php';
	require_once 'core/handleForms.php';

	if (!isset($_SESSION['username'])) {
		header("Location: login.php");
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Homepage</title>
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
		.greeting {
			text-align: center;
			margin-bottom: 20px;
		}
		h1 {
			text-align: center;
			color: #333;
		}
		form {
			text-align: center;
			margin-bottom: 20px;
		}
		input[type="text"] {
			font-size: 1.1em;
			padding: 8px;
			width: 200px;
			border: 1px solid #ccc;
			border-radius: 4px;
			margin-right: 10px;
		}
		input[type="submit"] {
			padding: 10px 20px;
			font-size: 1.1em;
			background-color: #4CAF50;
			color: white;
			border: none;
			border-radius: 4px;
			cursor: pointer;
			transition: background-color 0.3s ease;
		}
		input[type="submit"]:hover {
			background-color: #45a049;
		}
		h1 {
			text-align: center;
			padding: 10px;
			border-radius: 4px;
		}
		.success-message {
			color: green;
			background-color: ghostwhite;
			border: 2px solid green;
		}
		.error-message {
			color: red;
		}
		table {
			width: 100%;
			margin-top: 20px;
			border-collapse: collapse;
		}
		th, td {
			padding: 12px;
			text-align: left;
			border: 1px solid #ccc;
		}
		th {
			background-color: #659287;
			color: white;
		}
		tr:nth-child(even) {
			background-color: #f2f2f2;
		}
		tr:hover {
			background-color: #f1f1f1;
		}
		a {
			text-decoration: none;
			color: #B1C29E;
			font-weight: bold;
			margin-right: 10px;
		}
		a:hover {
			color: #DEAA79;
		}
		.pagination {
			text-align: center;
			margin-top: 20px;
		}
		p a {
			text-decoration: none;
			color: #E07B39;
		}
		p a:hover {
			color: #DEAA79;
		}
	</style>
</head>
<body>
	<?php if (isset($_SESSION['message'])) { ?>
		<h1 style="color: green; text-align: center; background-color: ghostwhite; border-style: solid;">	
			<?php echo $_SESSION['message']; ?>
		</h1>
	<?php } unset($_SESSION['message']); ?>
	<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="GET">
		<input type="text" name="searchInput" placeholder="Search here">
		<input type="submit" name="searchBtn">
	</form>
	<?php if (isset($_SESSION['message'])) { ?>
		<h1 style="color: red;"><?php echo $_SESSION['message']; ?></h1>
	<?php } unset($_SESSION['message']); ?>
	<div class="greeting" style="text-align: center;">
		<h1 style="text-align: center;">Welcome! <?php echo $_SESSION['username']; ?></h1>
		<h1><a href="core/handleForms.php?logoutUserBtn=1">Logout</a></h1>	
	</div>
	<p><a href="index.php">Clear Search Query</a></p>
	<p><a href="insert.php">Insert New Manager</a></p>
	<table style="width:100%; margin-top: 20px;">
		<tr>
			<th>First Name</th>
			<th>Last Name</th>
			<th>Email</th>
			<th>Gender</th>
			<th>Address</th>
			<th>Education</th>
            <th>Date Added</th>
			<th>Action</th>
		</tr>
		<?php if (!isset($_GET['searchBtn'])) { ?>
			<?php $getAllManager = getAllManager($pdo); ?>
				<?php foreach ($getAllManager as $row) { ?>
					<tr>
						<td><?php echo $row['first_name']; ?></td>
						<td><?php echo $row['last_name']; ?></td>
						<td><?php echo $row['email']; ?></td>
						<td><?php echo $row['gender']; ?></td>
                        <td><?php echo $row['address']; ?></td>
						<td><?php echo $row['education']; ?></td>
						<td><?php echo $row['date_added']; ?></td>
						<td>
							<a href="edit.php?id=<?php echo $row['id']; ?>">Edit</a>
							<a href="delete.php?id=<?php echo $row['id']; ?>">Delete</a>
						</td>
					</tr>
			<?php } ?>
		<?php } else { ?>
			<?php $searchForAManager =  searchForAManager($pdo, $_GET['searchInput']); ?>
				<?php foreach ($searchForAManager as $row) { ?>
					<tr>
						<td><?php echo $row['first_name']; ?></td>
						<td><?php echo $row['last_name']; ?></td>
						<td><?php echo $row['email']; ?></td>
						<td><?php echo $row['gender']; ?></td>
                        <td><?php echo $row['address']; ?></td>
						<td><?php echo $row['education']; ?></td>
						<td><?php echo $row['date_added']; ?></td>
						<td>
							<a href="edit.php?id=<?php echo $row['id']; ?>">Edit</a>
							<a href="delete.php?id=<?php echo $row['id']; ?>">Delete</a>
						</td>
					</tr>
				<?php } ?>
		<?php } ?>	
	</table>
</body>
</html>