<?php
	session_start();
    require_once('db_usuariosFisicos.php');
	
	$nome = $_POST['nome'];
	$email = $_POST['email'];
	$senha = $_POST['senha'];
	$criacao = $_POST['dataatual'];
	$situacao = $_POST['situacao'];
	$classcliente = $_POST['classcliente'];

    $objDb = new dbconsultapessoafisica();
    $link = $objDb->conecta_mysql();
	
	
    $sql = "insert into usuarios(nome, email, senha,situacoe_id,niveis_acesso_id,created,modified) values
        ('$nome','$email','$senha','$situacao','$classcliente','$criacao','$criacao')";
	
	$resultado_usuario = mysqli_query($con2, $sql);
	$resultado = mysqli_fetch_assoc($resultado_usuario);
	
    if (mysqli_query($link, $sql)){
			$_SESSION['usuarioNome'] = $resultado['nome'];
			$_SESSION['usuarioEmail'] = $resultado['email'];
			$_SESSION['usuarioSenha'] = $resultado['senha'];
			$_SESSION['usuarioNiveisAcessoId'] = $resultado['niveis_acesso_id'];
			$_SESSION['usuarioSituacao'] = $resultado['situacao'];
			$_SESSION['usuarioClasse'] = $resultado['classcliente'];
			$_SESSION['usuarioCriacao'] = $resultado['criacao'];
        header('Location: cliente.php');
    } else{
        header('Location: efetuarcadastro.php');
    }
?>