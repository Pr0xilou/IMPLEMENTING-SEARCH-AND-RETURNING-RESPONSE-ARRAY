<?php  
require_once 'core/models.php'; 
require_once 'core/handleForms.php'; 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: Arial, sans-serif;
            background-color: #1A3636;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            color: #333;
            padding: 20px;
        }
        h1 {
            text-align: center;
            margin-bottom: 20px;
            font-size: 2em;
        }
        .container {
            background-color: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
        }
        label {
            display: block;
            font-size: 1.1em;
            margin-bottom: 8px;
            font-weight: bold;
            color: #444;
        }

        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 12px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 1em;
            box-sizing: border-box;
        }

        input[type="submit"] {
            width: 100%;
            padding: 12px;
            border: none;
            background-color: #4CAF50;
            color: white;
            font-size: 1.1em;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        .message {
            text-align: center;
            margin-bottom: 20px;
        }

        .message.green {
            color: green;
        }

        .message.red {
            color: red;
        }

        a {
            color: #4CAF50;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }

        /* Responsive adjustments */
        @media (max-width: 600px) {
            .container {
                padding: 20px;
            }

            input[type="submit"] {
                font-size: 1em;
            }
        }
    </style>
</head>
<body>

    <?php  
    if (isset($_SESSION['message']) && isset($_SESSION['status'])) {
        $messageClass = ($_SESSION['status'] == "200") ? 'green' : 'red';
        echo "<h1 class='message {$messageClass}'>{$_SESSION['message']}</h1>";
    }
    unset($_SESSION['message']);
    unset($_SESSION['status']);
    ?>

    <div class="container">
        <h1>Login Now!</h1>
        <form action="login.php" method="POST">
            <p>
                <label for="username">Username</label>
                <input type="text" name="username" required>
            </p>
            <p>
                <label for="password">Password</label>
                <input type="password" name="password" required>
            </p>
            <p>
                <input type="submit" name="loginUserBtn" value="Login">
            </p>
        </form>
        <p>Got no account? Register <a href="register.php">here</a></p>
    </div>

</body>
</html>
