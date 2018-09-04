<?php
    require_once('db_usuariosFisicos.php');
	
	$nome = $_POST['nome'];
	$email = $_POST['email'];
	$senha = $_POST['senha'];
	$criacao = $_POST['dataatual'];
	$situacao = $_POST['situacao'];
	$classcliente = $_POST['classcliente'];

    $objDb = new dbconsultapessoafisica();
    $link = $objDb->conecta_mysql();
	
	$usuario = mysqli_real_escape_string($conn, $_POST['email']); 
    $nome = mysqli_real_escape_string($conn, $_POST['nome']);
    $senha = mysqli_real_escape_string($conn, $_POST['senha']);
	
    $sql = "insert into usuarios(nome, email, senha,situacoe_id,niveis_acesso_id,created,modified) values
        ('$nome','$email','$senha','$situacao','$classcliente','$criacao','$criacao')";
	
	$resultado_usuario = mysqli_query($con2, $sql);
	$resultado = mysqli_fetch_assoc($sql);
	
	$_SESSION['usuarioNome'] = $resultado['nome'];
    $_SESSION['usuarioEmail'] = $resultado['Email'];
    $_SESSION['usuarioNiveisAcessoId'] = $resultado['niveis_acesso_id'];
    $_SESSION['usuarioEmail'] = $resultado['email'];
	
    if (mysqli_query($link, $sql)){
		session_start();
		$_SESSION['usuarioNome'] = $resultado['nome'];
        header('Location: cliente.php');
    } else{
        header('Location: efetuarcadastro.php');
    }
	?>