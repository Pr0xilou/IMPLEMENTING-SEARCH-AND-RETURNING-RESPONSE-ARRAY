<?php 
require_once 'core/handleForms.php'; 
require_once 'core/models.php'; 
$id = $_GET['id'] ?? null; 
if ($id) {
    $getUserByID = getManagerByID($pdo, $id);
    if (!$getUserByID) {
        echo "Data not found!";
        exit();
    }
} else {
    echo "No Manager ID provided!";
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Manager</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f7fc;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            color: #333;
            padding: 20px;
        }
        h1 {
            text-align: center;
            margin-bottom: 30px;
            font-size: 2em;
            color: #333;
        }
        form {
            background-color: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 500px;
        }
        label {
            display: block;
            font-size: 1.1em;
            margin-bottom: 8px;
            font-weight: bold;
            color: #444;
        }
        input[type="text"],
        input[type="email"],
        select,
        textarea {
            width: 100%;
            padding: 12px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 1em;
            box-sizing: border-box;
        }
        textarea {
            resize: vertical;
            height: 100px;
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
        @media (max-width: 600px) {
            body {
                padding: 15px;
            }
            
            form {
                width: 100%;
                padding: 20px;
            }

            input[type="submit"] {
                font-size: 1em;
            }
        }
    </style>
</head>
<body>
    <h1>Edit the Manager</h1>
    <form action="core/handleForms.php" method="POST">
        <input type="hidden" name="id" value="<?php echo htmlspecialchars($id); ?>">
        <p>
            <label for="firstName">First Name</label>
            <input type="text" id="firstName" name="first_name" value="<?php echo htmlspecialchars($getUserByID['first_name']); ?>" required>
        </p>
        <p>
            <label for="lastName">Last Name</label>
            <input type="text" id="lastName" name="last_name" value="<?php echo htmlspecialchars($getUserByID['last_name']); ?>" required>
        </p>
        <p>
            <label for="email">Email</label>
            <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($getUserByID['email']); ?>" required>
        </p>
        <p>
            <label for="gender">Gender</label>
            <select id="gender" name="gender" required>
                <option value="Male" <?php echo $getUserByID['gender'] == 'Male' ? 'selected' : ''; ?>>Male</option>
                <option value="Female" <?php echo $getUserByID['gender'] == 'Female' ? 'selected' : ''; ?>>Female</option>
            </select>
        </p>
        <p>
            <label for="address">Address</label>
            <textarea id="address" name="address" required><?php echo htmlspecialchars($getUserByID['address'] ?? ''); ?></textarea>
        </p>
        <p>
            <label for="education">Education</label>
            <input type="text" id="education" name="education" value="<?php echo htmlspecialchars($getUserByID['education']); ?>" required>
        </p>
        <p>
            <input type="submit" value="Save Changes" name="editUserBtn">
        </p>
    </form>
</body>
</html>