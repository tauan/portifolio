<?php 
	header('Access-Control-Allow-Origin: *');
	require 'config.php';

	$email = strip_tags($_POST['email']);
	$senha = strip_tags($_POST['senha']);

	$sql = $pdo->prepare("SELECT * FROM usuarios WHERE email = :email AND senha = :senha");
	$sql->bindValue(":email", $email);
	$sql->bindValue(":senha", $senha);
	$sql->execute();
	$ln=$sql->fetchAll();

	if($sql->rowCount() == 1){
		$retorno['status'] = 'sim';
		$retorno['dados'] = $ln;

		echo(json_encode($retorno));
	}else{
		$retorno['status'] = 'nao';

		echo(json_encode($retorno));
	}



	
?>