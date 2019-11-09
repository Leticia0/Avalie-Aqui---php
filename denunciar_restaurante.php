<?php
$sexo = "Indefinido";
require 'banco.php';
include("cabecalho.php");
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="Palavras chave separadas por virgulas" />
    <meta name="description" content="Texto resumido aparecera nos resultados de busca atalhos" />
    <meta name="author" content="Nome do autor">
    <link rel="icon" href="favicon.ico" type="image/x-icon" />

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <meta charset="utf-8">

    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/index.css">
    <title>Avalie Aqui</title>
</head>

<body style="background-image: url(img/rest_fundo.jpg); background-size: 130%; background-repeat: no-repeat; 
background-attachment:  fixed;">
<br> <br>
<div class="container" style="width: 50%; opacity: 0.92">
    <div clas="span10 offset1">
        <div class="card">
            <div class="card-header">
                <nav class="nav justify-content-center"> 
                    <a class="nav-link" style="color: black; font-size: 30px; font-family:all;">Cadastre sua denúncia</a>
                </nav>
                <br>
                <div id="linha" style="width: 70%; border-bottom: 1.2px solid #000000; position: center; margin-left: 15%;
            }"> 
        </div>
        <br>
    </div>
</div>

<br>
<br>
<div class="card">   
    <div class="card-body">
        <form class="form-horizontal" action="create_restaurante.php" enctype="multipart/form-data" method="post">

            <div class="control-group <?php echo !empty($nomeErro)?'error ' : '';?>">
                <label class="control-label">Título</label>
                <div class="controls">
                    <input size="50" class="form-control" name="nome" type="text" placeholder="Titulo da sua denúncia"  value="<?php echo !empty($nome)?$nome: '';?>">
                    <p></p>
                    <?php if(!empty($nomeErro)): ?>
                        <span class="help-inline"><?php echo $nomeErro;?></span>
                    <?php endif;?>
                </div>
            </div>

            <div class="control-group <?php echo !empty($descricaoErro)?'error ' : '';?>">
                <label class="control-label">Descrição</label>
                <div class="controls">
                    <input size="50" class="form-control" name="descricao" type="text" placeholder="Detalhe seu problema encontrado com relação aos DADOS do restaurante" required="" value="<?php echo !empty($descricao)?$descricao: '';?>">
                    <p></p>
                    <?php if(!empty($descricaoErro)): ?>
                        <span class="help-inline"><?php echo $descricaoErro;?></span>
                    <?php endif;?>
                </div>
            </div>

            <div class="control-group col-md-15" >
                <label for="control-label">Categoria</label>
                <select multiple id="inputState" name="categorias[]" class="form-control">
                    <?php  
                    $sql = 'select id_comida, categoria from tipo_comida;';
                    $resultado = $mysqli->query($sql) OR trigger_error($mysqli->error, E_USER_ERROR);
                    while($consulta = $resultado->fetch_object()){
                        echo '<option value='.$consulta->id_comida.'>';
                        echo $consulta->categoria;
                        echo '</option>';
                    }
                    ?>

                </select>
            </div>
            <br>

          

                <label>Adicione imagens que possam confirmar sua denúncia</label>







<div class="input-group mb-3">
 
<div class="input-group">
  <div class="custom-file">

    <input type="file" class="custom-file-input" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04"  id="imagens" name="imagens[]" multiple="multiple">
    <label class="custom-file-label" for="inputGroupFile04">Escolher Arquivo...</label>
  </div>
  <div class="input-group-append">
  </div>
</div>


                <br>
                <br>
                <a href="index.php" type="btn" class="btn btn-light">Voltar</a>
                <button type="submit" class="btn btn-success">Cadastrar</button>

            </div>
        </form>
    </div>
</div>
</div>
</div>
<footer>
    <?php 
    include('rodape.php');
    ?>
    <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <!-- Latest compiled and minified JavaScript -->
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Cidades e Estados JS - ultima versao google -->
    <script src="cidades-estados-1.2-utf8.js"></script>


    <script type="text/javascript">
        //CIDADES E ESTADOS
        new dgCidadesEstados({
            cidade: document.getElementById('cidade'),
            estado: document.getElementById('estado'),
            change: true
        });
      </script>
    </footer>

</body>
</html>

<?php
  //require 'banco.php';

if(!empty($_POST))
{
    $sexo="Indefinido";
    //Acompanha os erros de validação
    $id_restErro = null;
    $nomeErro = null;
    $descricaoErro = null;
    $categoriaErro = null;
    $id_rest = null;

        //      $id_rest = $_POST['id_rest'];
    $nome = $_POST['nome'];
    $descricao = $_POST['descricao'];
    $categoria = $_POST['categorias'];
    $imagens = $_FILES['imagens'];

    //Validaçao dos campos:
    $validacao = true;
    if(empty($nome))
    {
        $nomeErro = 'Por favor digite o nome do restaurante!';
        $validacao = false;
    }

    if(empty($descricao))
    {
        $descricaoErro = 'Por favor faça uma breve descrição do problema';
        $validacao = false;
    }

    if(empty($categoria))
    {
        $categoriaErro = 'Por favor selecione uma categoria';
        $validacao = false;
    }


    if($validacao)
    {
        $pdo = Banco::conectar();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "INSERT INTO restaurante (nome, descricao) VALUES(?,?,?,?,?,?,?,?)";
        $q = $pdo->prepare($sql);
        $q->execute(array($nome, $descricao));
        $last_id = $pdo->lastInsertId();

        $target_dir = "imagens/";
        $count_img = 0;
        $uploaddir = $target_dir . "restaurantes/". $last_id . "/";
        

        foreach ($imagens['name'] as $imagem) {
        if (!is_dir($uploaddir) && strlen($imagem) > 0) {
            mkdir($uploaddir);
        }

            $target_file = $uploaddir . $count_img."-".basename($imagem);

            move_uploaded_file($imagens["tmp_name"][$count_img], $target_file);
            $count_img = $count_img + 1;
        }


        foreach ($_POST['categorias'] as $categoria) {
            $sql = "INSERT INTO restaurante_categoria (id_restaurante, id_tipo_comida) VALUES(?,?)";
            $q = $pdo->prepare($sql);
            $q->execute(array($last_id, $categoria));
        }
        exit;
            Banco::desconectar();
            exit;
            header("Location: index.php");

    }
}
?>