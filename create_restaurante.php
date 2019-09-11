<?php
    $sexo = "Indefinido";
    include("cabecalho.php");
    include("crudEstado.php");



?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="assets/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="assets/css/index.css">
  <title>Avalie Aqui</title>
</head>


<br>
<br>
<body style="background-image: url(img/rest_fundo.jpg); background-size: 130%; background-repeat: no-repeat; 
background-attachment:  fixed;">

    <div class="container" style="width: 50%; opacity: 0.92">
        <div clas="span10 offset1">
          <div class="card">
            <div class="card-header">
                <h3 class="well"> Cadastre-se Aqui </h3>
            </div>
         </div>

         <br>
         <br>
         <div class="card">   
            <div class="card-body">
            <form class="form-horizontal" action="create_restaurante.php" method="post">
<!--
                <div class="control-group <?php //echo !empty($id_restErro)?'error ': '';?>">
                    <label class="control-label">Id</label>
                    <div class="controls">

                        <input size="80" class="form-control" name="id_rest" type="text" placeholder="id_rest" required="" value="<?php// echo !empty($id_rest)?$id_rest: '';?>">
                        <?php //if(!empty($id_restErro)): ?>
                            <span class="help-inline"><?php// echo $id_restErro;?></span>
                        <?php// endif;?>

                    </div>
                </div>
-->
                <div class="control-group <?php echo !empty($nomeErro)?'error ' : '';?>">
                    <label class="control-label">Nome</label>
                    <div class="controls">
                        <input size="50" class="form-control" name="nome" type="text" placeholder="Nome" required="" value="<?php echo !empty($nome)?$nome: '';?>">
                        <p></p>
                        <?php if(!empty($nomeErro)): ?>
                            <span class="help-inline"><?php echo $nomeErro;?></span>
                        <?php endif;?>
                    </div>
                </div>

                <div class="control-group <?php echo !empty($descricaoErro)?'error ' : '';?>">
                    <label class="control-label">Descricao</label>
                    <div class="controls">
                        <input size="50" class="form-control" name="descricao" type="text" placeholder="Bastante variedade de pratos, estacionamento..." required="" value="<?php echo !empty($descricao)?$descricao: '';?>">
                        <p></p>
                        <?php if(!empty($descricaoErro)): ?>
                            <span class="help-inline"><?php echo $descricaoErro;?></span>
                        <?php endif;?>
                    </div>
                </div>


  

    <div class="control-group col-md-15" >
      <label for="control-label" >Categoria</label>
        <select  id="inputState" class="form-control">

         <?php  
              $sql = 'select categoria from tipo_comida;';
                $resultado = $mysqli->query($sql) OR trigger_error($mysqli->error, E_USER_ERROR);
                while($consulta = $resultado->fetch_object()){
        ?>
          <option>
        <?php
           echo $consulta->categoria;
        ?>
          </option>

        <?php
           }
        ?>

        </select>
    </div>

<br>



                <div class="control-group <?php echo !empty($telefoneErro)?'error ': '';?>">
                    <label class="control-label">Telefone</label>
                    <div class="controls">
                        <input size="40" class="form-control" name="telefone" type="text" placeholder="3400-0000" required="" value="<?php echo !empty($telefone)?$telefone: '';?>">
                        <p></p>
                        <?php if(!empty($telefoneErro)): ?>
                            <span class="help-inline"><?php echo $telefoneErro;?></span>
                            <?php endif;?>
                    </div>
                </div>

                <div class="control-group <?php echo !empty($horario_funcionamentoErro)?'error ': '';?>">
                    <label class="control-label">Horário de Funcionamento</label>
                    <div class="controls">
                        <input size="40" class="form-control" name="horario_funcionamento" type="text" placeholder="De segunda à sexta das 11:30 às 14:30" required="" value="<?php echo !empty($horario_funcionamento)?$horario_funcionamento: '';?>">
                        <p></p>
                        <?php if(!empty($horario_funcionamentoErro)): ?>
                            <span class="help-inline"><?php echo $horario_funcionamentoErro;?></span>
                            <?php endif;?>
                    </div>
                </div>

               <div class="control-group col-md-15" >
      <label for="control-label" >Estado</label>
        <select  id="inputState" class="form-control">

         <?php  
              $sql = 'select nome from estado;';
                $resultado = $mysqli->query($sql) OR trigger_error($mysqli->error, E_USER_ERROR);
                while($consulta = $resultado->fetch_object()){
        ?>
          <option>
        <?php
           echo $consulta->nome;
        ?>
          </option>

        <?php
           }
        ?>

        </select>
    </div>

<br>
<div class="control-group col-md-15" >
      <label for="control-label" >Cidade</label>
        <select  id="inputState" class="form-control">

         <?php  
              $sql = 'select nome from cidade;';
                $resultado = $mysqli->query($sql) OR trigger_error($mysqli->error, E_USER_ERROR);
                while($consulta = $resultado->fetch_object()){
        ?>
          <option>
        <?php
           echo $consulta->nome;
        ?>
          </option>

        <?php
           }
        ?>

        </select>
    </div>

<br>

                <div class="form-actions">

                <div class="control-group <?php echo !empty($enderecoErro)?'error ': '';?>">
                    <label class="control-label">Endereço</label>
                    <div class="controls">
                        <input size="40" class="form-control" name="endereco" type="text" placeholder="Endereço" required="" value="<?php echo !empty($endereco)?$endereco: '';?>">
                        <p></p>
                        <?php if(!empty($enderecoErro)): ?>
                            <span class="help-inline"><?php echo $enderecoErro;?></span>
                            <?php endif;?>
                    </div>
                </div>

                 <div class="control-group <?php echo !empty($numeroErro)?'error ': '';?>">
                    <label class="control-label">Numero</label>
                    <div class="controls">
                        <input size="40" class="form-control" name="numero" type="number" placeholder="000" required="" value="<?php echo !empty($numero)?$numero: '';?>">
                        <p></p>
                        <?php if(!empty($numeroErro)): ?>
                            <span class="help-inline"><?php echo $numeroErro;?></span>
                        <?php endif;?>
                    </div>
                </div>
                    <br/>

                    <a href="index.php" type="btn" class="btn btn-light">Voltar</a>
                    <button type="submit" class="btn btn-success">Cadastrar</button>

                </div>
            </form>
          </div>
        </div>
        </div>
    </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <!-- Latest compiled and minified JavaScript -->
    <script src="assets/js/bootstrap.min.js"></script>
</body>

</html>

<?php
    require 'banco.php';

    if(!empty($_POST))
    {
        $sexo="Indefinido";
        //Acompanha os erros de validação
        $id_restErro = null;
        $nomeErro = null;
        $descricaoErro = null;
        $categoriaErro = null;
        $telefoneErro = null;
        $horario_funcionamentoErro = null;
        $estadoErro = null;
        $enderecoErro = null;
        $cidadeErro = null;
        $numeroErro = null;
        $id_rest = null;
        $erroNoBaguioi = null;

//      $id_rest = $_POST['id_rest'];
        $nome = $_POST['nome'];
        $descricao = $_POST['descricao'];
        $categoria = $_POST['categoria'];
        $telefone = $_POST['telefone'];
        $horario_funcionamento = $_POST['horario_funcionamento'];
        $estado = $_POST['estado'];
        $endereco = $_POST['endereco'];
        $cidade = $_POST['cidade'];
        $numero = $_POST['numero'];

        //Validaçao dos campos:
        $validacao = true;
        if(empty($nome))
        {
            $erroNoBaguioi = 'Por favor digite o nome do restaurante!';
            $validacao = false;
        }

        /*if(empty($id_rest))
        {
            $erroNoBaguioi = 'Por favor digite o seu id!';
            $validacao = false;
        } */

        if(empty($descricao))
        {
            $erroNoBaguioi = 'Por favor faça uma breve descrição';
            $validacao = false;
        }
         if(empty($categoria))
        {
            $erroNoBaguioi = 'Por favor selecione uma categoria';
            $validacao = false;
        }

        if(empty($telefone))
        {
            $erroNoBaguioi = 'Por favor insira um telefone válido';
            $validacao = false;
        }

        if(empty($horario_funcionamento))
        {
            $erroNoBaguioi = 'Por favor adicione o horário de funcionamento';
            $validacao = false;
        }

        elseif(empty($estado))
        {
            $erroNoBaguioi = 'Por favor selecione um estado';
            $validacao = false;
        }

        if(empty($endereco))
        {
            $erroNoBaguioi = 'Por favor digite o endereço do restaurante!';
            $validacao = false;
        }

          if(empty($cidade))
        {
            $erroNoBaguioi = 'Por favor digite a cidade do restaurante!';
            $validacao = false;
        }


        if(empty($numero))
        {
            $erroNoBaguioi = 'Por favor digite o numero do restaurante!';
            $validacao = false;
        

    }

    echo $erroNoBaguioi;
        //Inserindo no Banco:
    echo "huaahuasd";
    echo $validacao;
        if($validacao)
        {
        	//echo "::???";
            $pdo = Banco::conectar();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "INSERT INTO restaurante (nome, descricao, categoria, telefone, estado, endereco, cidade, numero) VALUES(?,?,?,?,?,?,?,?)";
            $q = $pdo->prepare($sql);
            $q->execute(array($nome, $descricao, $categoria,$telefone,$estado,$endereco,$cidade,$numero));
            Banco::desconectar();
            header("Location: buscar_restaurantes.php");
            exit;
        }
    }
?>

<p></p>
<br>
<br>
<br>
<?php 
    include('rodape.php');
 ?>