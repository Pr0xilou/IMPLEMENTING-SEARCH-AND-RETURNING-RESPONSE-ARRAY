<?php
require_once 'core/handleForms.php';
require_once 'core/models.php';
$id = $_GET['id'] ?? null;
$manager = null;

if ($id) {
    $manager = getManagerByID($pdo, $id);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $id ? "Edit Manager" : "Add Manager"; ?></title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f7fc;
            color: #333;
            margin: 0;
            padding: 0;
        }
        h1 {
            text-align: center;
            color: #5d6d7e;
            margin: 20px 0;
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
        input[type="email"],
        select {
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
    <h1><?php echo $id ? "Edit Manager" : "Add Manager"; ?></h1>
    <form action="core/handleForms.php" method="POST">
        <p>
            <label for="first_name">First Name</label>
            <input type="text" id="first_name" name="first_name" value="<?php echo $manager ? htmlspecialchars($manager['first_name']) : ''; ?>" required>
        </p>
        <p>
            <label for="last_name">Last Name</label>
            <input type="text" id="last_name" name="last_name" value="<?php echo $manager ? htmlspecialchars($manager['last_name']) : ''; ?>" required>
        </p>
        <p>
            <label for="email">Email</label>
            <input type="email" id="email" name="email" value="<?php echo $manager ? htmlspecialchars($manager['email']) : ''; ?>" required>
        </p>
        <p>
            <label for="gender">Gender</label>
            <select id="gender" name="gender" required>
                <option value="">Select Gender</option>
                <option value="Male" <?php echo $manager && $manager['gender'] === 'Male' ? 'selected' : ''; ?>>Male</option>
                <option value="Female" <?php echo $manager && $manager['gender'] === 'Female' ? 'selected' : ''; ?>>Female</option>
            </select>
        </p>
        <p>
            <label for="address">Address</label>
            <input type="text" id="address" name="address" value="<?php echo $manager ? htmlspecialchars($manager['address']) : ''; ?>" required>
        </p>
        <p>
            <label for="education">Education</label>
            <input type="text" id="education" name="education" value="<?php echo $manager ? htmlspecialchars($manager['education']) : ''; ?>" required>
        </p>
        <p>
            <?php if ($id): ?>
                <input type="hidden" name="id" value="<?php echo htmlspecialchars($manager['id']); ?>">
            <?php endif; ?>
            <input type="submit" name="<?php echo $id ? 'editUserBtn' : 'insertUserBtn'; ?>" value="<?php echo $id ? "Save Changes" : "Add Manager"; ?>">
        </p>
    </form>
</body>
</html>