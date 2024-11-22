<?php
	require_once 'dbConfig.php';
	function getAllManager($pdo) {
		$sql = "SELECT * FROM managers
				ORDER BY last_name ASC";
		$stmt = $pdo->prepare($sql);
		$executeQuery = $stmt->execute();
		if ($executeQuery) {
			return $stmt->fetchAll();
		}
	}
	function getManagerByID($pdo, $id) {
		$sql = "SELECT * FROM managers WHERE id=?";
		$stmt = $pdo->prepare($sql);
		$executeQuery = $stmt->execute([$id]);
		if ($executeQuery) {
			return $stmt->fetch();
		}
	}
	function searchForAManager($pdo, $searchQuery) {
		$sql = "SELECT * FROM managers WHERE
				CONCAT(last_name, first_name, email, gender, address, education, date_added)
				LIKE ?";
		$stmt = $pdo->prepare($sql);
		$executeQuery = $stmt->execute(["%" .$searchQuery. "%"]);
		if ($executeQuery) {
			return $stmt->fetchAll();
		}
	}
	function insertNewManager($pdo, $first_name, $last_name, $email, $gender, $address, $education) {
		$sql = "INSERT INTO managers
			(
				first_name,
				last_name,
				email,
				gender,
				address,
				education			
			)
			VALUES (?,?,?,?,?,?)";
		$stmt = $pdo->prepare($sql);
		$executeQuery = $stmt->execute([$first_name, $last_name, $email, $gender, $address, $education,]);
		if ($executeQuery) {
			return true;
		}
	}
	function editUser($pdo, $first_name, $last_name, $email, $gender, $address, $education, $id) {
		$sql = "UPDATE managers
					SET first_name = ?,
						last_name = ?,
						email = ?,
						gender = ?,
						address = ?,
						education = ?
					WHERE id = ? 
				";
		$stmt = $pdo->prepare($sql);
		$executeQuery = $stmt->execute([$first_name, $last_name, $email, $gender, $address, $education, $id]);
		if ($executeQuery) {
			return true;
		}

	}
	function deleteUser($pdo, $id) {
		$sql = "DELETE FROM managers
				WHERE id = ?";
		$stmt = $pdo->prepare($sql);
		$executeQuery = $stmt->execute([$id]);
	
		if ($executeQuery) {
			return true;
		}
	}
	function checkIfUserExists($pdo, $username) {
		$response = array();
		$sql = "SELECT * FROM user_accounts WHERE username = ?";
		$stmt = $pdo->prepare($sql);
		if ($stmt->execute([$username])) {
			$userInfoArray = $stmt->fetch();
			if ($stmt->rowCount() > 0) {
				$response = array(
					"result"=> true,
					"status" => "200",
					"userInfoArray" => $userInfoArray
				);
			}
			else {
				$response = array(
					"status" => "400",
					"message"=> "User doesn't exist from the database"
				);
			}
		}
		return $response;
	}
	function insertNewUser($pdo, $username, $first_name, $last_name, $password) {
		$response = array();
		$checkIfUserExists = checkIfUserExists($pdo, $username); 

		if (!$checkIfUserExists['result']) {
			$sql = "INSERT INTO user_accounts (username, first_name, last_name, password) 
			VALUES (?,?,?,?)";
			$stmt = $pdo->prepare($sql);
	
			if ($stmt->execute([$username, $first_name, $last_name, $password])) {
				$response = array(
					"status" => "200",
					"message" => "User successfully inserted!"
				);
			}
	
			else {
				$response = array(
					"status" => "400",
					"message" => "An error occured with the query!"
				);
			}
		}
		else {
			$response = array(
				"status" => "400",
				"message" => "User already exists!"
			);
		}
		return $response;
	}
?>