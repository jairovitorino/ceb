<?php
session_start();
require_once("class/persistence.php");
$persistence = new Persistence();

if ( isset($_GET['abrirPesquisaData']) ) {
				
		unset($_SESSION['msg_sucesso']);
		unset($_SESSION['msg_excessao']);
		unset($_SESSION['id_produto']);
		unset($_SESSION['nm_produto']);
		unset($_SESSION['dt_inicio']);
		unset($_SESSION['dt_fim']);
		unset($_SESSION['nu_ano']);
		unset($_SESSION['id_tipo']);
		unset($_SESSION['opcao']);
		unset($_SESSION['nm_objeto']);
		unset($_SESSION['nu_termo']);
		unset($_SESSION['numero_termo']);
		
		$opcao = addslashes($_GET['opcao']);
		$_SESSION['opcao'] = $opcao;
							
		header ("location: pesquisa_data.php");
}
if ( isset($_POST['pesquisarData']) ) {
				
		unset($_SESSION['msg_sucesso']);
		unset($_SESSION['msg_excessao']);
		unset($_SESSION['id_produto']);
		unset($_SESSION['nm_produto']);
		unset($_SESSION['opcao']);
		
		$dt_inicio = addslashes($_POST['dt_inicio']);
		$dt_fim = addslashes($_POST['dt_fim']);
		$opcao = addslashes($_POST['opcao']);
		
		if ( ($dt_inicio == "") || ($dt_fim == "") ){
		$msg_excessao = "Data: Preenchimento obrigatório";
		$_SESSION['msg_excessao'] = $msg_excessao;
		$_SESSION['dt_inicio'] = $dt_inicio;
		$_SESSION['dt_fim'] = $dt_fim;
		$_SESSION['opcao'] = $opcao;	
				
		header ("location: pesquisa_data.php");
		
		} else if ( $opcao == "resp" ){
		$_SESSION['dt_inicio'] = $dt_inicio;
		$_SESSION['dt_fim'] = $dt_fim;
				
		header ("location:  responsavel_lista.php");
		
		} else if ( $opcao == "matr" ){
		$_SESSION['dt_inicio'] = $dt_inicio;
		$_SESSION['dt_fim'] = $dt_fim;
				
		header ("location:  matricula_lista.php");
		
		} else if ( $opcao == "analitica" ){
		$_SESSION['dt_inicio'] = $dt_inicio;
		$_SESSION['dt_fim'] = $dt_fim;
				
		header ("location:  lava_lista_analitica.php");
		
		} else if ( $opcao == "reserva" ){
		$_SESSION['dt_inicio'] = $dt_inicio;
		$_SESSION['dt_fim'] = $dt_fim;
				
		header ("location:  reserva_lista.php");
				
		} else {
		$_SESSION['opcao'] = $opcao;					
		header ("location: pesquisa_data.php");
		}
}
if ( isset($_GET['abrirPesquisaObjeto']) ) {
				
		unset($_SESSION['msg_sucesso']);
		unset($_SESSION['msg_excessao']);
		unset($_SESSION['id_produto']);
		unset($_SESSION['nm_produto']);
		unset($_SESSION['dt_inicio']);
		unset($_SESSION['dt_fim']);
		unset($_SESSION['id_tipo']);
		unset($_SESSION['opcao']);
		unset($_SESSION['nu_ano']);
		unset($_SESSION['nm_objeto']);
		unset($_SESSION['nu_termo']);
		unset($_SESSION['numero_termo']);
		
		$opcao = addslashes($_GET['opcao']);
		$_SESSION['opcao'] = $opcao;
							
		header ("location: pesquisa_objeto.php");
}

if ( isset($_POST['pesquisarObjeto']) ) {
				
		unset($_SESSION['msg_sucesso']);
		unset($_SESSION['msg_excessao']);
		unset($_SESSION['id_produto']);
		unset($_SESSION['nm_produto']);
		unset($_SESSION['opcao']);
	
				
		$nm_objeto = trim(addslashes($_POST['nm_objeto']));
		$opcao = addslashes($_POST['opcao']);
		
		if ( $nm_objeto == ""){
		$msg_excessao = "Pesquisa: Preenchimento obrigatório";
		$_SESSION['msg_excessao'] = $msg_excessao;
		$_SESSION['opcao'] = $opcao;	
				
		header ("location: pesquisa_objeto.php");
		
		} else if ( $opcao == "matricula"){
		$_SESSION['nm_objeto'] = $nm_objeto;
				
		header ("location: aluno_lista.php");
		
		} else if ( $opcao == "aluno"){
		$_SESSION['nm_objeto'] = $nm_objeto;
				
		header ("location: aluno_lista.php");
		
		} else if ( $opcao == "flutuante"){
		$_SESSION['nm_objeto'] = $nm_objeto;
				
		header ("location: flutuante_lista.php");
				
		} else if ( $opcao == "escala"){
		$_SESSION['nm_objeto'] = $nm_objeto;
				
		header ("location: escala_lista.php");
		
		} else if ( $opcao == "aluno_matr"){
		$_SESSION['nm_objeto'] = $nm_objeto;
				
		header ("location: matricula_lista.php");		
						
		} else if ( $opcao == "funcionario"){
		$_SESSION['nm_objeto'] = $nm_objeto;
				
		header ("location: funcionario_lista.php");
		
		} else if ( $opcao == "proprietario" ){
		$_SESSION['nm_objeto'] = $nm_objeto;
				
		header ("location:  proprietario_lista.php");
		
		} else if ( $opcao == "matricula" ){
		$_SESSION['nm_objeto'] = $nm_objeto;
				
		header ("location:  matricula_lista.php");
				
		
		} else {
		
		header ("location: pesquisa_objeto.php");
		}
	}
?>