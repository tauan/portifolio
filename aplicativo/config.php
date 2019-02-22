<?php 
	try{
		$pdo=new PDO("mysql:host=localhost;dbname=id6397401_barbearia", "id6397401_tauan", "123456");
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}catch(PDOException $e){
		echo $e->getMessage();
	}

?>