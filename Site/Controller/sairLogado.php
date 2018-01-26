<?php
	session_start();
	session_destroy();

	setcookie("email","",time()-2592000);
	setcookie("nome","",time()-2592000);
	setcookie("img","",time()-2592000);
	header("Location: ../View/index.php");//verirficar rediracionamneto depois
?>
