<?php

	$pdo = new PDO("...");
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	
	$field = 'name';
	$varNames = ['user1', 'user2', 'user3'];
	
	$users = [];
	
	foreach ($varNames as $varName) {
		if (!empty($_GET[$varName])) {
			$users[] = $_GET[$varName];
		}
	}
	
	if (count($users)) {
	
		try {	
			$str = implode(',', $users);
			$query = $pdo->prepare("SELECT * FROM users WHERE FIND_IN_SET (user , :arrUsers)");
			$query->bindParam('arrUsers', $str);
			$query->execute();
			
			foreach ($query->fetchAll() as $row){
				echo $row["$field"]."<br/>";
			}
			
			unset($query);

		} catch (PDOException $e ){
			echo "Error: ".$e;
		}
	} else {
		echo "Не заданы пользователи.";
	}
	
	unset($pdo);
 