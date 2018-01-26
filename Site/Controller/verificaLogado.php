<?php
	session_start();
	if(isset($_SESSION['email'])){//se estiver na sessao
		$email=$_SESSION['email'];
		$nome=$_SESSION['nome'];
		$imgPerfil=$_SESSION['imgPerfil'];
	}
	elseif(isset($_COOKIE['email'])){//se estiver no cookie
		$_SESSION['email']=$_COOKIE['email'];
		$_SESSION['nome']=$_COOKIE['nome'];
		$_SESSION['imgPerfil']=$_COOKIE['imgPerfil'];

		$email=$_SESSION['email'];
		$nome=$_SESSION['nome'];
		$imgPerfil=$_SESSION['imgPerfil'];
	}

?>
