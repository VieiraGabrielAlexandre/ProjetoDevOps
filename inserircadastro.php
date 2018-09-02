<?php
    require_once('db_usuariosFisicos.php');


    $objDb = new dbconsultapessoafisica();
    $link = $objDb->conecta_mysql();

    $sql = "insert into usuarios(id,nome, email, senha,situacoes_id,niveis_acesso_id,created,modified) values
        (NULL,$nome', '$email', '$senha','$situacao','$classcliente','$datacadastro','$alteracao')";

    if (mysqli_query($link, $sql)){
        header('Location: erro.php');
    } else{
        header('Location: cliente.php');
    }
	?>