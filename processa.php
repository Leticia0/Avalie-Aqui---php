<?php
session_start();
include_once("conexao1.php");



if(!empty($_POST['estrela'])){
	$estrela = $_POST['estrela'];
	$rest_id = $_POST['rest_id'];
	$user_id = $_SESSION['id_user'];

	
	//Salvar no banco de dados
	$result_avaliacos = "INSERT INTO avaliacos (qnt_estrela, created, id_rest_id, id_user_id) VALUES ('$estrela', NOW(), '$rest_id', '$user_id')";
	$resultado_avaliacos = mysqli_query($conn, $result_avaliacos);
	
	if(mysqli_insert_id($conn)){
		$_SESSION['msg'] = "Avaliação cadastrada com sucesso";
		header("Location: index.php");
	}else{
		$_SESSION['msg'] = "Erro ao cadastrar a avaliação";
		header("Location: index.php");
	}
	
}else{
	$_SESSION['msg'] = "Necessário selecionar pelo menos 1 estrela";
	header("Location: index.php");
}