<?php 
session_start();
require_once("class/persistence.php");
$persistence = new Persistence();

if ( isset($_GET['abrirResponsavel']) )  {
	unset($_SESSION['msg_sucesso']);
	unset($_SESSION['msg_excessao']);
	 unset($_SESSION['in_responsavel']);
	  unset($_SESSION['id_responsavel']);
	   unset($_SESSION['nm_responsavel']);
	    unset($_SESSION['id_parentesco']);
		 unset($_SESSION['nm_parentesco']);
	 unset($_SESSION['te_profissao']);
	unset($_SESSION['id_matricula']);
	unset($_SESSION['id_funcionario']);
	unset($_SESSION['nm_funcionario']);
	unset($_SESSION['dt_nascimento']);
	unset($_SESSION['nu_rg']);
	unset($_SESSION['nu_carteira']);
	unset($_SESSION['nu_serie']);

	header ("location: responsavel.php");
}

if ( isset($_POST['inserirResponsavel']) )  {
	unset($_SESSION['msg_sucesso']);
	unset($_SESSION['msg_excessao']);

	$id_matricula = addslashes($_POST['id_matricula']);
	$id_aluno = addslashes($_POST['id_aluno']);
	$nm_responsavel = addslashes($_POST['nm_responsavel']);
	$nm_responsavel = ucwords($nm_responsavel);
	$id_parentesco = addslashes($_POST['id_parentesco']);
	$nm_parentesco = addslashes($_POST['nm_parentesco']);
	$nu_telefone = addslashes($_POST['nu_telefone']);
	$nm_trabalho = addslashes($_POST['nm_trabalho']);
	$te_profissao = addslashes($_POST['te_profissao']);
	$te_profissao = ucwords($te_profissao);
	$te_email = addslashes($_POST['te_email']);
	$nm_logra = addslashes($_POST['nm_logra']);
	$nm_logra = ucwords($nm_logra);
	$nu_logra = addslashes($_POST['nu_logra']);
	$nm_compl = addslashes($_POST['nm_compl']);
	$nu_cep = addslashes($_POST['nu_cep']);
	$nm_bairro = addslashes($_POST['nm_bairro']);
	$nm_bairro = ucwords($nm_bairro);
	$nm_cidade = addslashes($_POST['nm_cidade']);
	$nm_cidade = ucwords($nm_cidade);
	$nm_uf = addslashes($_POST['nm_uf']);
	
	if ( $nm_responsavel == "" ) {
		$msg_excessao = "Nome: Preenchimento obrigatório";
		$_SESSION['msg_excessao'] = $msg_excessao;
		$_SESSION['id_matricula'] = $id_matricula;
		$_SESSION['id_aluno'] = $id_aluno;
		$_SESSION['nm_responsavel'] = $nm_responsavel;
		$_SESSION['id_parentesco'] = $id_parentesco;
		$_SESSION['nm_parentesco'] = $nm_parentesco;
		$_SESSION['nu_telefone'] = $nu_telefone;
		$_SESSION['nm_trabalho'] = $nm_trabalho;
		$_SESSION['te_profissao'] = $te_profissao;
		$_SESSION['te_email'] = $te_email;
		$_SESSION['nm_logra'] = $nm_logra;
		$_SESSION['nu_logra'] = $nu_logra;
		$_SESSION['nm_compl'] = $nm_compl;
		$_SESSION['nu_cep'] = $nu_cep;
		$_SESSION['nm_bairro'] = $nm_bairro;
		$_SESSION['nm_cidade'] = $nm_cidade;
		$_SESSION['nm_uf'] = $nm_uf;
		header ("location: responsavel.php");
		
		} else if ( $id_parentesco == 0 ) {
		$msg_excessao = "Parentesco: Preenchimento obrigatório";
		$_SESSION['msg_excessao'] = $msg_excessao;
		$_SESSION['id_matricula'] = $id_matricula;
		$_SESSION['id_aluno'] = $id_aluno;
		$_SESSION['nm_responsavel'] = $nm_responsavel;
		$_SESSION['id_parentesco'] = $id_parentesco;
		$_SESSION['nm_parentesco'] = $nm_parentesco;
		$_SESSION['nu_telefone'] = $nu_telefone;
		$_SESSION['nm_trabalho'] = $nm_trabalho;
		$_SESSION['te_profissao'] = $te_profissao;
		$_SESSION['te_email'] = $te_email;
		$_SESSION['nm_logra'] = $nm_logra;
		$_SESSION['nu_logra'] = $nu_logra;
		$_SESSION['nm_compl'] = $nm_compl;
		$_SESSION['nu_cep'] = $nu_cep;
		$_SESSION['nm_bairro'] = $nm_bairro;
		$_SESSION['nm_cidade'] = $nm_cidade;
		$_SESSION['nm_uf'] = $nm_uf;
		header ("location: responsavel.php");
		
		} else if ( $nu_telefone == "" ) {
		$msg_excessao = "Telefone: Preenchimento obrigatório";
		$_SESSION['msg_excessao'] = $msg_excessao;
		$_SESSION['id_matricula'] = $id_matricula;
		$_SESSION['id_aluno'] = $id_aluno;
		$_SESSION['nm_responsavel'] = $nm_responsavel;
		$_SESSION['id_parentesco'] = $id_parentesco;
		$_SESSION['nm_parentesco'] = $nm_parentesco;
		$_SESSION['nu_telefone'] = $nu_telefone;
		$_SESSION['nm_trabalho'] = $nm_trabalho;
		$_SESSION['te_profissao'] = $te_profissao;
		$_SESSION['te_email'] = $te_email;
		$_SESSION['nm_logra'] = $nm_logra;
		$_SESSION['nu_logra'] = $nu_logra;
		$_SESSION['nm_compl'] = $nm_compl;
		$_SESSION['nu_cep'] = $nu_cep;
		$_SESSION['nm_bairro'] = $nm_bairro;
		$_SESSION['nm_cidade'] = $nm_cidade;
		$_SESSION['nm_uf'] = $nm_uf;
		header ("location: responsavel.php");
		
		} else if ( $nm_logra == "" ) {
		$msg_excessao = "Rua/Av: Preenchimento obrigatório";
		$_SESSION['msg_excessao'] = $msg_excessao;
		$_SESSION['id_matricula'] = $id_matricula;
		$_SESSION['id_aluno'] = $id_aluno;
		$_SESSION['nm_responsavel'] = $nm_responsavel;
		$_SESSION['id_parentesco'] = $id_parentesco;
		$_SESSION['nm_parentesco'] = $nm_parentesco;
		$_SESSION['nu_telefone'] = $nu_telefone;
		$_SESSION['nm_trabalho'] = $nm_trabalho;
		$_SESSION['te_profissao'] = $te_profissao;
		$_SESSION['te_email'] = $te_email;
		$_SESSION['nm_logra'] = $nm_logra;
		$_SESSION['nu_logra'] = $nu_logra;
		$_SESSION['nm_compl'] = $nm_compl;
		$_SESSION['nu_cep'] = $nu_cep;
		$_SESSION['nm_bairro'] = $nm_bairro;
		$_SESSION['nm_cidade'] = $nm_cidade;
		$_SESSION['nm_uf'] = $nm_uf;
		header ("location: responsavel.php");
		
		} else if ( $nu_logra == "" ) {
		$msg_excessao = "Número: Preenchimento obrigatório";
		$_SESSION['msg_excessao'] = $msg_excessao;
		$_SESSION['id_matricula'] = $id_matricula;
		$_SESSION['id_aluno'] = $id_aluno;
		$_SESSION['nm_responsavel'] = $nm_responsavel;
		$_SESSION['id_parentesco'] = $id_parentesco;
		$_SESSION['nm_parentesco'] = $nm_parentesco;
		$_SESSION['nu_telefone'] = $nu_telefone;
		$_SESSION['nm_trabalho'] = $nm_trabalho;
		$_SESSION['te_profissao'] = $te_profissao;
		$_SESSION['te_email'] = $te_email;
		$_SESSION['nm_logra'] = $nm_logra;
		$_SESSION['nu_logra'] = $nu_logra;
		$_SESSION['nm_compl'] = $nm_compl;
		$_SESSION['nu_cep'] = $nu_cep;
		$_SESSION['nm_bairro'] = $nm_bairro;
		$_SESSION['nm_cidade'] = $nm_cidade;
		$_SESSION['nm_uf'] = $nm_uf;
		header ("location: responsavel.php");
		
		} else if ( $nu_logra == "" ) {
		$msg_excessao = "Número: Preenchimento obrigatório";
		$_SESSION['msg_excessao'] = $msg_excessao;
		$_SESSION['id_matricula'] = $id_matricula;
		$_SESSION['id_aluno'] = $id_aluno;
		$_SESSION['nm_responsavel'] = $nm_responsavel;
		$_SESSION['id_parentesco'] = $id_parentesco;
		$_SESSION['nm_parentesco'] = $nm_parentesco;
		$_SESSION['nu_telefone'] = $nu_telefone;
		$_SESSION['nm_trabalho'] = $nm_trabalho;
		$_SESSION['te_profissao'] = $te_profissao;
		$_SESSION['te_email'] = $te_email;
		$_SESSION['nm_logra'] = $nm_logra;
		$_SESSION['nu_logra'] = $nu_logra;
		$_SESSION['nm_compl'] = $nm_compl;
		$_SESSION['nu_cep'] = $nu_cep;
		$_SESSION['nm_bairro'] = $nm_bairro;
		$_SESSION['nm_cidade'] = $nm_cidade;
		$_SESSION['nm_uf'] = $nm_uf;
		header ("location: responsavel.php");
		
		} else if ( $nm_bairro == "" ) {
		$msg_excessao = "Bairro: Preenchimento obrigatório";
		$_SESSION['msg_excessao'] = $msg_excessao;
		$_SESSION['id_matricula'] = $id_matricula;
		$_SESSION['id_aluno'] = $id_aluno;
		$_SESSION['nm_responsavel'] = $nm_responsavel;
		$_SESSION['id_parentesco'] = $id_parentesco;
		$_SESSION['nm_parentesco'] = $nm_parentesco;
		$_SESSION['nu_telefone'] = $nu_telefone;
		$_SESSION['nm_trabalho'] = $nm_trabalho;
		$_SESSION['te_profissao'] = $te_profissao;
		$_SESSION['te_email'] = $te_email;
		$_SESSION['nm_logra'] = $nm_logra;
		$_SESSION['nu_logra'] = $nu_logra;
		$_SESSION['nm_compl'] = $nm_compl;
		$_SESSION['nu_cep'] = $nu_cep;
		$_SESSION['nm_bairro'] = $nm_bairro;
		$_SESSION['nm_cidade'] = $nm_cidade;
		$_SESSION['nm_uf'] = $nm_uf;
		header ("location: responsavel.php");
		
		} else if ( $nu_cep == "" ) {
		$msg_excessao = "CEP: Preenchimento obrigatório";
		$_SESSION['msg_excessao'] = $msg_excessao;
		$_SESSION['id_matricula'] = $id_matricula;
		$_SESSION['id_aluno'] = $id_aluno;
		$_SESSION['nm_responsavel'] = $nm_responsavel;
		$_SESSION['id_parentesco'] = $id_parentesco;
		$_SESSION['nm_parentesco'] = $nm_parentesco;
		$_SESSION['nu_telefone'] = $nu_telefone;
		$_SESSION['nm_trabalho'] = $nm_trabalho;
		$_SESSION['te_profissao'] = $te_profissao;
		$_SESSION['te_email'] = $te_email;
		$_SESSION['nm_logra'] = $nm_logra;
		$_SESSION['nu_logra'] = $nu_logra;
		$_SESSION['nm_compl'] = $nm_compl;
		$_SESSION['nu_cep'] = $nu_cep;
		$_SESSION['nm_bairro'] = $nm_bairro;
		$_SESSION['nm_cidade'] = $nm_cidade;
		$_SESSION['nm_uf'] = $nm_uf;
		header ("location: responsavel.php");
		
		} else if ( ($nu_cep != "") && (strlen( $nu_cep ) != 8) || (!is_numeric( $nu_cep )) ) {
		$msg_excessao = "CEP Residencial: Preenchimento inválido";
		$_SESSION['msg_excessao'] = $msg_excessao;
		$_SESSION['id_matricula'] = $id_matricula;
		$_SESSION['id_aluno'] = $id_aluno;
		$_SESSION['nm_responsavel'] = $nm_responsavel;
		$_SESSION['id_parentesco'] = $id_parentesco;
		$_SESSION['nm_parentesco'] = $nm_parentesco;
		$_SESSION['nu_telefone'] = $nu_telefone;
		$_SESSION['nm_trabalho'] = $nm_trabalho;
		$_SESSION['te_profissao'] = $te_profissao;
		$_SESSION['te_email'] = $te_email;
		$_SESSION['nm_logra'] = $nm_logra;
		$_SESSION['nu_logra'] = $nu_logra;
		$_SESSION['nm_compl'] = $nm_compl;
		$_SESSION['nu_cep'] = $nu_cep;
		$_SESSION['nm_bairro'] = $nm_bairro;
		$_SESSION['nm_cidade'] = $nm_cidade;
		$_SESSION['nm_uf'] = $nm_uf;
		header ("location: responsavel.php");
		
		} else if ( $nm_cidade == "" ) {
		$msg_excessao = "Cidade: Preenchimento obrigatório";
		$_SESSION['msg_excessao'] = $msg_excessao;
		$_SESSION['id_matricula'] = $id_matricula;
		$_SESSION['id_aluno'] = $id_aluno;
		$_SESSION['nm_responsavel'] = $nm_responsavel;
		$_SESSION['id_parentesco'] = $id_parentesco;
		$_SESSION['nm_parentesco'] = $nm_parentesco;
		$_SESSION['nu_telefone'] = $nu_telefone;
		$_SESSION['nm_trabalho'] = $nm_trabalho;
		$_SESSION['te_profissao'] = $te_profissao;
		$_SESSION['te_email'] = $te_email;
		$_SESSION['nm_logra'] = $nm_logra;
		$_SESSION['nu_logra'] = $nu_logra;
		$_SESSION['nm_compl'] = $nm_compl;
		$_SESSION['nu_cep'] = $nu_cep;
		$_SESSION['nm_bairro'] = $nm_bairro;
		$_SESSION['nm_cidade'] = $nm_cidade;
		$_SESSION['nm_uf'] = $nm_uf;
		header ("location: responsavel.php");
		
		} else if ( $nm_uf == "" ) {
		$msg_excessao = "UF: Preenchimento obrigatório";
		$_SESSION['msg_excessao'] = $msg_excessao;
		$_SESSION['id_matricula'] = $id_matricula;
		$_SESSION['id_aluno'] = $id_aluno;
		$_SESSION['nm_responsavel'] = $nm_responsavel;
		$_SESSION['id_parentesco'] = $id_parentesco;
		$_SESSION['nm_parentesco'] = $nm_parentesco;
		$_SESSION['nu_telefone'] = $nu_telefone;
		$_SESSION['nm_trabalho'] = $nm_trabalho;
		$_SESSION['te_profissao'] = $te_profissao;
		$_SESSION['te_email'] = $te_email;
		$_SESSION['nm_logra'] = $nm_logra;
		$_SESSION['nu_logra'] = $nu_logra;
		$_SESSION['nm_compl'] = $nm_compl;
		$_SESSION['nu_cep'] = $nu_cep;
		$_SESSION['nm_bairro'] = $nm_bairro;
		$_SESSION['nm_cidade'] = $nm_cidade;
		$_SESSION['nm_uf'] = $nm_uf;
		header ("location: responsavel.php");
		
		} else if ( $te_profissao == "" ) {
		$msg_excessao = "Profissão: Preenchimento obrigatório";
		$_SESSION['msg_excessao'] = $msg_excessao;
		$_SESSION['id_matricula'] = $id_matricula;
		$_SESSION['id_aluno'] = $id_aluno;
		$_SESSION['nm_responsavel'] = $nm_responsavel;
		$_SESSION['id_parentesco'] = $id_parentesco;
		$_SESSION['nm_parentesco'] = $nm_parentesco;
		$_SESSION['nu_telefone'] = $nu_telefone;
		$_SESSION['nm_trabalho'] = $nm_trabalho;
		$_SESSION['te_profissao'] = $te_profissao;
		$_SESSION['te_email'] = $te_email;
		$_SESSION['nm_logra'] = $nm_logra;
		$_SESSION['nu_logra'] = $nu_logra;
		$_SESSION['nm_compl'] = $nm_compl;
		$_SESSION['nu_cep'] = $nu_cep;
		$_SESSION['nm_bairro'] = $nm_bairro;
		$_SESSION['nm_cidade'] = $nm_cidade;
		$_SESSION['nm_uf'] = $nm_uf;
		header ("location: responsavel.php");
		
		} else {
		unset($_SESSION['msg_excessao']);
		unset($_SESSION['id_matricula']);
		unset($_SESSION['id_aluno']);
		unset($_SESSION['nm_responsavel']);
		unset($_SESSION['id_parentesco']);
		unset($_SESSION['nm_parentesco']);
		unset($_SESSION['nu_telefone']);
		unset($_SESSION['nm_trabalho']);
		unset($_SESSION['te_profissao']);
		unset($_SESSION['te_email']);
		unset($_SESSION['nm_logra']);
		unset($_SESSION['nu_logra']);
		unset($_SESSION['nm_compl']);
		unset($_SESSION['nu_cep']);
		unset($_SESSION['nm_bairro']);
		unset($_SESSION['nm_cidade']);
		unset($_SESSION['nm_uf']);
	
	$persistence->inserirResponsavel($id_matricula,$id_aluno,$nm_responsavel,$id_parentesco,$nu_telefone,$nm_trabalho,$te_profissao,$te_email,$nm_logra,$nu_logra,$nm_compl,$nu_cep,$nm_bairro,$nm_cidade,$nm_uf);
	}
	}

if ( isset($_POST['editarResponsavel']) )  {
	unset($_SESSION['msg_sucesso']);
	unset($_SESSION['msg_excessao']);

	$opcao = addslashes($_POST['opcao']);
	$id_responsavel = addslashes($_POST['id_responsavel']);
	$nm_responsavel = addslashes($_POST['nm_responsavel']);
	$nm_responsavel = ucwords($nm_responsavel);
	$id_parentesco = addslashes($_POST['id_parentesco']);
	$nu_telefone = addslashes($_POST['nu_telefone']);
	$nm_trabalho = addslashes($_POST['nm_trabalho']);
	$te_profissao = addslashes($_POST['te_profissao']);
	$te_profissao = ucwords($te_profissao);
	$te_email = addslashes($_POST['te_email']);
	$nm_logra = addslashes($_POST['nm_logra']);
	$nu_logra = addslashes($_POST['nu_logra']);
	$nm_compl = addslashes($_POST['nm_compl']);
	$nu_cep = addslashes($_POST['nu_cep']);
	$nm_bairro = addslashes($_POST['nm_bairro']);
	$nm_cidade = addslashes($_POST['nm_cidade']);
	$nm_uf = addslashes($_POST['nm_uf']);

	$persistence->editarResponsavel($opcao,$id_responsavel,$nm_responsavel,$id_parentesco,$nu_telefone,$nm_trabalho,$te_profissao,$te_email,$nm_logra,$nu_logra,$nm_compl,$nu_cep,$nm_bairro,$nm_cidade,$nm_uf);
}
if ( isset($_GET['excluirResponsavel']) )  {
	unset($_SESSION['msg_sucesso']);
	unset($_SESSION['msg_excessao']);

	
	$id_matricula = addslashes($_GET['id_matricula']);
	$id_aluno = addslashes($_GET['id_aluno']);
	$id_usuario = addslashes($_GET['id_usuario']);
	$opcao = addslashes($_GET['opcao']);
	
	if ( $_SESSION['id_id'] == 2 && $opcao == 2 ){
		$msg_excessao = "Usuário não autorizado";
		$_SESSION['msg_excessao'] = $msg_excessao;
		
		header ("location: responsavel_lista.php");		
				
		} else if ( $id_usuario != $_SESSION['id'] ){ 
		$msg_excessao = "Exclusão não permitida";
		$_SESSION['msg_excessao'] = $msg_excessao;
		
		header ("location: responsavel_lista.php");
		
		} else {	

	$persistence->excluirResponsavel($id_matricula,$id_aluno,$opcao);
}
}

if ( isset($_GET['abrirResponsavelEdit']) )  {
	unset($_SESSION['msg_sucesso']);
	unset($_SESSION['msg_excessao']);
		
	$id_responsavel = addslashes($_GET['id_responsavel']);
	$id_usuario = addslashes($_GET['id_usuario']);
	$opcao = addslashes($_GET['opcao']);
	
	if ( $_SESSION['id_id'] == 2 && $opcao == 2 ){
	$msg_excessao = "Usuário não autorizado";
	$_SESSION['msg_excessao'] = $msg_excessao;	
	header ("location: responsavel_lista.php");
	
	} else if ( $id_usuario != $_SESSION['id'] ){ 
	 $msg_excessao = "Edição não permitida";
	$_SESSION['msg_excessao'] = $msg_excessao;
		
	header ("location: responsavel_lista.php");
	
	} else {
	$_SESSION['id_responsavel'] = $id_responsavel;
	$_SESSION['opcao'] = $opcao;
	
	header ("location: responsavel_edit.php");		
}
}
if ( isset($_GET['abrirResponsavelLista']) )  {
	unset($_SESSION['msg_sucesso']);
	unset($_SESSION['msg_excessao']);
	unset($_SESSION['nm_objeto']);
	unset($_SESSION['dt_inicio']);
	unset($_SESSION['dt_fim']);

	header ("location: responsavel_lista.php");;
}
if ( isset($_GET['imprimirResponsavelLista']) )  {
	unset($_SESSION['msg_sucesso']);
	unset($_SESSION['msg_excessao']);
			

	header ("location: responsavel_lista_pdf.php");;
}
?>