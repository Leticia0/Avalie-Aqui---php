<?php
	//recebemos nosso par�metro vindo do form
	$parametro = isset($_POST['pesquisaCliente']) ? $_POST['pesquisaCliente'] : null;
	$msg = "";
	//come�amos a concatenar nossa tabela
	$msg .="<table class='table table-hover'>";
	$msg .="	<thead>";
	$msg .="		<tr>";
	$msg .="			<th>Nome:</th>";
	$msg .="			<meta><th>Endere�o:</th>";
	$msg .="			<th>Numero:</th>";
	$msg .="			<th>horario_funcionamento:</th>";
	$msg .="		</tr>";
	$msg .="	</thead>";
	$msg .="	<tbody>";
				//requerimos a classe de conex�o
				require_once('class/Conexao2.class.php');
					try {
						$pdo = new Conexao(); 
						$resultado = $pdo->select("SELECT * FROM restaurante WHERE nome LIKE '$parametro%' ORDER BY nome ASC");
						$pdo->desconectar();
								
						}catch (PDOException $e){
							echo $e->getMessage();
						}	
						//resgata os dados na tabela
						if(count($resultado)){
							foreach ($resultado as $res) {

	$msg .="				<tr>";
	$msg .="					<td>".$res['nome']."</td>";
	$msg .="					<td>".$res['endereco']."</td>";
	$msg .="					<td>".$res['numero']."</td>";
	$msg .="					<td>".$res['horario_funcionamento'].", ".$res['horario_funcionamento']."</td>";
	$msg .="				</tr>";
							}	
						}else{
							$msg = "";
							$msg .="Nenhum resultado foi encontrado...";
						}
	$msg .="	</tbody>";
	$msg .="</table>";
	//retorna a msg concatenada
	echo $msg;

	
?>