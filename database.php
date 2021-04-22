<?php
	$dsn = 'mysql:host=localhost;dbname=ecommerce_website';
	$username = 'root';
	$password = '';

	try {
		$db = new PDO($dsn, $username, $password);
	} catch (PDOException $e) {
		die(json_encode(array('outcome' => false, 'message' => 'Unable to connect')));
		$error_message = $e->getMessage();
	}
	?>