<?php  
require_once 'core/models.php'; 
require_once 'core/handleForms.php'; 
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Register Page</title>
	<style>
        body {
            font-family: "Arial", sans-serif;
            background-color: #DCE4C9;
            margin: 0;
            padding: 0;
        }
        h1 {
            text-align: center;
            color: #5d6d7e;
            margin: 40px 0;
        }
        .message {
            text-align: center;
            padding: 15px;
            border-radius: 5px;
            margin: 10px auto;
            width: 90%;
            max-width: 500px;
            font-size: 1.2em;
        }
        .message.success {
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }
        .message.error {
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }
        form {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border: 1px solid #ddd;
        }
        p {
            margin-bottom: 15px;
        }
        label {
            font-size: 1.1em;
            margin-bottom: 5px;
            display: block;
            color: #333;
        }
        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            font-size: 1em;
            border-radius: 5px;
            border: 1px solid #ddd;
            margin-top: 5px;
            box-sizing: border-box;
        }
        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            font-size: 1.1em;
            border: none;
            padding: 12px 20px;
            cursor: pointer;
            border-radius: 5px;
            width: 100%;
            margin-top: 20px;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
        input[type="submit"]:focus {
            outline: none;
            box-shadow: 0 0 5px rgba(0, 128, 0, 0.7);
        }
        @media (max-width: 768px) {
            form {
                padding: 15px;
            }

            input[type="submit"] {
                width: 100%;
            }
        }
    </style>
</head>
<body>
	<h1>Register here!</h1>
	<?php  
	if (isset($_SESSION['message']) && isset($_SESSION['status'])) {

		if ($_SESSION['status'] == "200") {
			echo "<h1 style='color: green;'>{$_SESSION['message']}</h1>";
		}

		else {
			echo "<h1 style='color: red;'>{$_SESSION['message']}</h1>";	
		}

	}
	unset($_SESSION['message']);
	unset($_SESSION['status']);
	?>
	<form action="core/handleForms.php" method="POST">
		<p>
			<label for="username">Username</label>
			<input type="text" name="username">
		</p>
		<p>
			<label for="username">First Name</label>
			<input type="text" name="first_name">
		</p>
		<p>
			<label for="username">Last Name</label>
			<input type="text" name="last_name">
		</p>
		<p>
			<label for="username">Password</label>
			<input type="password" name="password">
		</p>
		<p>
			<label for="username">Confirm Password</label>
			<input type="password" name="confirm_password">
			<input type="submit" name="insertNewUserBtn">
		</p>
	</form>
</body>
</html>