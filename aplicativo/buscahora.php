<?php 
	header('Access-Control-Allow-Origin: *');
	require 'config.php';
	$horas = $_GET['horas'];
	$horass = new DateTime($_GET['horas']);
	$id = $_GET['id'];

	$sql = $pdo->prepare("SELECT * FROM agendamentos WHERE horario = :horas and profissional_id = :id");
	$sql->bindValue(":horas", $horas);
	$sql->bindValue(":id", $id);
	$sql->execute();
	if($sql->rowCount() > 0){
		while($ln=$sql->fetch(PDO::FETCH_OBJ)){
			$d = new DateTime($ln->horario);
			$retorno['horario'] = $d->format('H:i');
			$retorno['id'] = $ln->profissional_id;		
			$retorno['status'] = 'AGENDADO';
			echo(json_encode($retorno));
		}
	}else {
		$retorno['horario'] = $horass->format('H:i');
			$retorno['id'] = $id;		
			$retorno['status'] = 'Não AGENDADO';
			echo(json_encode($retorno));
	}
	
		

	// if($sql->rowCount() == 1){
	// 	$retorno['status'] = 'indisponivel';
	// 	$retorno['retorno'] = $ln;
	// 	echo(json_encode($retorno));
	// }else{
	// 	$retorno['status'] = 'disponivel';
	// 	$retorno['retorno'] = $ln;
	// 	echo(json_encode($retorno));
	// }

?>