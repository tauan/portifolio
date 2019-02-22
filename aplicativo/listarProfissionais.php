<?php 
	header('Access-Control-Allow-Origin: *');
	require 'config.php';

	if(isset($_GET['opc']) and $_GET['opc'] == 1) {
		$sql = $pdo->query("SELECT * FROM profissionais WHERE ativo = 1");
		$cont=0;
		while($ln=$sql->fetch(PDO::FETCH_OBJ)){
			$retorno[$cont]['nome'] = $ln->nome;
			$retorno[$cont]['foto'] = $ln->foto;
			$retorno[$cont]['id'] = $ln->id;
			$cont++;
			
		}
		echo(json_encode($retorno));
	}
	if(isset($_POST['id'])) {
		$id = $_POST['id'];
		$sql = $pdo->prepare("SELECT * FROM profissionais WHERE id = :id");
		$sql->bindValue(":id", $id);
		$sql->execute();
		$ln=$sql->fetch(PDO::FETCH_OBJ);
		$retorno['nome'] = $ln->nome; 
		$retorno['id'] = $ln->id;
		echo(json_encode($retorno));
	}


?>