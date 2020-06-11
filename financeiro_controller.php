<?php
session_start();
require_once("class/persistence.php");
$persistence = new Persistence();

if ( isset($_GET['abrirFinanceiroEdit']) )  {
	unset($_SESSION['msg_sucesso']);
	unset($_SESSION['msg_excessao']);
	unset($_SESSION['nm_objeto']);
	
	$id_matricula = addslashes($_GET['id_matricula']);
	$_SESSION['id_matricula'] = $id_matricula;
	
	header ("location: financeiro_edit.php");
	}

if ( isset($_GET['abrirFinanceiroLista']) )  {
	unset($_SESSION['msg_sucesso']);
	unset($_SESSION['msg_excessao']);
	unset($_SESSION['nm_objeto']);
		
	header ("location: financeiro_lista.php");
	}
	
if ( isset($_GET['imprimirFinanceiroLista']) )  {
	unset($_SESSION['msg_sucesso']);
	unset($_SESSION['msg_excessao']);
	unset($_SESSION['nm_objeto']);
		
	header ("location: financeiro_lista_pdf.php");
	}
	
if ( isset($_GET['ticarMatricula']) ) {
				
		unset($_SESSION['msg_sucesso']);
		unset($_SESSION['msg_excessao']);
		
		$opcao = addslashes($_GET['opcao']);
		$id_matricula = addslashes($_GET['id_matricula']);
		$id_usuario = addslashes($_GET['id_usuario']);
		$id_aluno = addslashes($_GET['id_aluno']);
			
		if ( $_SESSION['id_id'] == 2 && $opcao == 2 ){
		$msg_excessao = "Usuário não autorizado";
		$_SESSION['msg_excessao'] = $msg_excessao;
		
		header ("location: matricula_lista.php");		
	
		
		} else {
						
		$persistence->ticarMatricula($id_matricula,$id_aluno,$opcao);
	}
	}
if ( isset($_POST['editarFinanceiro']) )  {
	unset($_SESSION['msg_sucesso']);
	unset($_SESSION['msg_excessao']);

	$id_matricula = addslashes($_POST['id_matricula']);
	$opcao = addslashes($_POST['opcao']);
	$dt_vencto = addslashes($_POST['dt_vencto']);
	
	$persistence->editarFinanceiro($id_matricula,$opcao,$dt_vencto);
}
?>