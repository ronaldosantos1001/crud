<?php
    require_once 'config/conexao.php';
    require_once 'config/pessoa.php';

    $con = new conexao(); 
    $con->connect(); 
    $getId = $_GET['id'];  
    if($getId){ 

        $result = $con->connect()->query("SELECT * FROM pessoa WHERE id = + $getId");
        $row = $result->fetch(PDO::FETCH_OBJ);
    }

    if(isset ($_POST['cadastrar'])){  
        $nome = $_POST['nome'];  
        $sobrenome = $_POST['sobrenome']; 
        $crud = new Pessoa(); 
        $crud->inserir("'$nome','$sobrenome'");
        header("Location: index.php"); 
    }

    if(isset ($_POST['editar'])){ 
        $nome = $_POST['nome']; 
        $sobrenome = $_POST['sobrenome']; 
        $crud = new Pessoa(); 
        $crud->atualizar("nome='$nome',sobrenome='$sobrenome'", "id='$getId'");
        header("Location: index.php"); 
    }

?>

<!DOCTYPE html>
<html lang="pt">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>CRUD genérico OO com PDO</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <form action="" method="post">

            <p>
            <label for="nome">Nome:</label>
            <input type="text" name="nome" value="<?php echo $row->nome;  ?>" required autofocus maxlength="15" placeholder="Nome">
            <span class='hint'>Somente o primeiro nome.</span>
            </p>
            <p>
            <label for="sobrenome">Sobrenome:</label>
            <input type="text" name="sobrenome" value="<?php echo $row->sobrenome;  ?>" required maxlength="15" placeholder="Sobrenome">
            <span class='hint'>Somente o segundo nome.</span>
            </p>
            <?php
                if(!$row->id){
            ?>
                <input type="submit" name="cadastrar" value="Cadastrar">
            <?php }else{  ?>
                <input type="submit" name="editar" value="Editar">
            <?php } ?>
        </form>
    </body>
</html>
<?php $con->disconnect(); ?>
