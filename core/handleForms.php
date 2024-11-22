<?php
    require_once 'dbConfig.php';
    require_once 'models.php';


    if (isset($_POST['insertUserBtn'])) {
        $insertUser = insertNewManager($pdo,$_POST['first_name'], $_POST['last_name'], $_POST['email'], $_POST['gender'], $_POST['address'], $_POST['education'],);
        if ($insertUser) {
            $_SESSION['message'] = "Successfully inserted!";
            header("Location: ../index.php");
        }
    }
    if (isset($_POST['editUserBtn'])) {
        $first_name = $_POST['first_name'] ?? '';
        $last_name = $_POST['last_name'] ?? '';
        $email = $_POST['email'] ?? '';
        $gender = $_POST['gender'] ?? '';
        $address = $_POST['address'] ?? '';
        $education = $_POST['education'];
        $id = $_POST['id'] ?? null;

        if ($id) {
            $updateSuccess = editUser($pdo, $first_name, $last_name, $email, $gender, $address, $education, $id);
            if ($updateSuccess) {
                echo "Updated Successfully!";
                header("Location: ../index.php");
                exit();
            } else {
                echo "Failed to update.";
            }
        }
        else {
            $insertSuccess = insertNewManager($pdo, $first_name, $last_name, $email, $gender, $address, $education);
            if ($insertSuccess) {
                echo "New User added successfully!";
                header("Location: ../index.php");
                exit();
            } else {
                echo "Failed to add new user.";
            }
        }
    }
    if (isset($_POST['deleteUserBtn'])) {
        $deleteUser = deleteUser($pdo, $_GET['id']);
    
        if ($deleteUser) {
            $_SESSION['message'] = "Successfully deleted!";
            header("Location: ../index.php");
        }
    }
    if (isset($_GET['searchBtn'])) {
        $searchForAManager = searchForAManager($pdo, $_GET['searchInput']);
        foreach ($searchForAManager as $row) {
            echo "<tr> 
                    <td>{$row['id']}</td>
                    <td>{$row['last_name']}</td>
                    <td>{$row['first_name']}</td>
                    <td>{$row['email']}</td>
                    <td>{$row['gender']}</td>
                    <td>{$row['address']}</td>
                    <td>{$row['education']}</td>
                  </tr>";
        }
    }
    if (isset($_POST['insertNewUserBtn'])) {
        $username = trim($_POST['username']);
        $first_name = trim($_POST['first_name']);
        $last_name = trim($_POST['last_name']);
        $password = trim($_POST['password']);
        $confirm_password = trim($_POST['confirm_password']);
    
        if (!empty($username) && !empty($first_name) && !empty($last_name) && !empty($password) && !empty($confirm_password)) {
    
            if ($password == $confirm_password) {
    
                $insertQuery = insertNewUser($pdo, $username, $first_name, $last_name, password_hash($password, PASSWORD_DEFAULT));
    
                if ($insertQuery['status'] == '200') {
                    $_SESSION['message'] = $insertQuery['message'];
                    $_SESSION['status'] = $insertQuery['status'];
                    header("Location: ../login.php");
                }
    
                else {
                    $_SESSION['message'] = $insertQuery['message'];
                    $_SESSION['status'] = $insertQuery['status'];
                    header("Location: ../register.php");
                }
    
            }
            else {
                $_SESSION['message'] = "Please make sure both passwords are equal";
                $_SESSION['status'] = "400";
                header("Location: ../register.php");
            }
    
        }
        else {
            $_SESSION['message'] = "Please make sure there are no empty input fields";
            $_SESSION['status'] = "400";
            header("Location: ../register.php");
        }
    }
    if (isset($_POST['loginUserBtn'])) {
        $username = trim($_POST['username']);
        $password = trim($_POST['password']);
    
        if (!empty($username) && !empty($password)) {
    
            $loginQuery = checkIfUserExists($pdo, $username);
    
            if ($loginQuery['status'] == '200') {
                $usernameFromDB = $loginQuery['userInfoArray']['username'];
                $passwordFromDB = $loginQuery['userInfoArray']['password'];
                if (password_verify($password, $passwordFromDB)) {
                    $_SESSION['username'] = $usernameFromDB;
                    header("Location: index.php");
                    exit();
                } else {
                    $_SESSION['message'] = "Incorrect password";
                    $_SESSION['status'] = "400";
                    header("Location: login.php");
                    exit();
                }
            } else {
                $_SESSION['message'] = $loginQuery['message'];
                $_SESSION['status'] = "400";
                header("Location: login.php");
                exit();
            }
        } else {
            $_SESSION['message'] = "Please make sure no input fields are empty";
            $_SESSION['status'] = "400";
            header("Location: login.php");
            exit();
        }
    }
    if (isset($_GET['logoutUserBtn'])) {
        unset($_SESSION['username']);
        header("Location: ../login.php");
    }
?>