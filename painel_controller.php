<?php
session_start();
require_once("class/persistence.php");
$persistence = new Persistence();

			
	if ( isset($_GET['abrirPainel']) )  {
	unset($_SESSION['msg_sucesso']);
	unset($_SESSION['msg_excessao']);
		
	
	header ("location: painel.php");
	}
	
	if ( isset($_GET['abrirPonto']) )  {
	unset($_SESSION['msg_sucesso']);
	unset($_SESSION['msg_excessao']);
		
	
	header ("location: folha_ponto.php");
	}
	
if ( isset($_GET['abrirLogLista']) )  {
	unset($_SESSION['msg_sucesso']);
	unset($_SESSION['msg_excessao']);
	unset($_SESSION['id_acao']);
	
	$id_acao = addslashes($_GET['id_acao']);
	//$st_curriculo = 2;
	$_SESSION['id_acao'] = $id_acao;
	header ("location: log_lista.php");
	}

?>