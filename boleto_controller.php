<?php
session_start();
require_once("class/persistence.php");
$persistence = new Persistence();

if ( isset($_GET['abrirBoletoCpf']) )  {
	unset($_SESSION['msg_sucesso']);
	unset($_SESSION['msg_excessao']);
	unset($_SESSION['id_boleto']);
	unset($_SESSION['nm_cedente']);
	unset($_SESSION['id_banco']);
	unset($_SESSION['nm_banco']);
	unset($_SESSION['nu_agencia']);
	unset($_SESSION['nu_conta']);
	unset($_SESSION['nu_nosso']);
	unset($_SESSION['dt_vencto']);
	unset($_SESSION['vl_docto']);
	unset($_SESSION['nm_sacado']);
	unset($_SESSION['nm_estado_civil']);	
	unset($_SESSION['nm_conjugue']);
	unset($_SESSION['id_cargo']);
	unset($_SESSION['nm_cargo']);
	unset($_SESSION['nm_natural']);
	unset($_SESSION['nu_cpf']);
	unset($_SESSION['id_sexo']);
	unset($_SESSION['nm_sexo']);
	unset($_SESSION['nu_telefone']);
	 unset($_SESSION['dt_admissao']);
	unset($_SESSION['nu_ano']);
	unset($_SESSION['nm_logra']);
	unset($_SESSION['nu_logra']);
	unset($_SESSION['nm_compl']);
	unset($_SESSION['nu_cep']);
	unset($_SESSION['nm_bairro']);
	unset($_SESSION['nm_cidade']);
	unset($_SESSION['nm_uf']);
	unset($_SESSION['te_obs']);
	
	
	header ("location: boleto_cpf.php");
	}
	
if ( isset($_POST['pesquisarBoletoCpf']) )  {
	unset($_SESSION['msg_sucesso']);
	unset($_SESSION['msg_excessao']);
	unset($_SESSION['nu_cpf']);
	
	$nu_cpf = addslashes($_POST['nu_cpf']);
	
	if ( $nu_cpf == "" ) {
	$msg_excessao = "CPF: Preenchimento obrigatório";
	$_SESSION['msg_excessao'] = $msg_excessao;
	$_SESSION['nu_cpf'] = $nu_cpf;
	
	header ("location: boleto_cpf.php");
	
	} else if ( ($nu_cpf != "" ) && (strlen( $nu_cpf ) != 11)) {
	$msg_excessao = "CPF: Preenchimento inválido";
	$_SESSION['msg_excessao'] = $msg_excessao;
	$_SESSION['nu_cpf'] = $nu_cpf;
	
	header ("location: boleto_cpf.php");
		
	} else if (($nu_cpf != "") && (!is_numeric($nu_cpf))){
	$msg_excessao = "CPF: caracteres não aceito";
	$_SESSION['msg_excessao'] = $msg_excessao;
	$_SESSION['nu_cpf'] = $nu_cpf;
	
	header ("location: boleto_cpf.php");
	
	} else if ( ($nu_cpf != "") && (!$persistence->validCPF($nu_cpf)) ){
	$msg_excessao = "CPF: dígito inválido";
	$_SESSION['msg_excessao'] = $msg_excessao;
	$_SESSION['nu_cpf'] = $nu_cpf;
	
	header ("location: boleto_cpf.php");
	} else {
		
	$persistence->pesquisarBoletoCpf($nu_cpf);
	}
}

if ( isset($_POST['inserirBoleto']) )  {
	unset($_SESSION['msg_sucesso']);
	unset($_SESSION['msg_excessao']);

	//$nm_funcionario = strtoupper($nm_funcionario);
	$nm_cedente = addslashes($_POST['nm_cedente']);	
	$nm_cedente = ucwords($nm_cedente);
	$id_banco = addslashes($_POST['id_banco']);
	$nm_banco = addslashes($_POST['nm_banco']);
	$nu_agencia = addslashes($_POST['nu_agencia']);
	$nu_conta = addslashes($_POST['nu_conta']);
	$nu_cpf = addslashes($_POST['nu_cpf']);
	$nu_nosso = addslashes($_POST['nu_nosso']);
	$dt_vencto = addslashes($_POST['dt_vencto']);
	$vl_docto = addslashes($_POST['vl_docto']);
	$nm_sacado = addslashes($_POST['nm_sacado']);
	$nm_sacado = ucwords($nm_sacado);
	$te_email = addslashes($_POST['te_email']);
	$nm_logra = addslashes($_POST['nm_logra']);
	$nm_logra = ucwords($nm_logra);
	$nu_logra = addslashes($_POST['nu_logra']);
	$nu_cep = addslashes($_POST['nu_cep']);
	$nm_bairro = addslashes($_POST['nm_bairro']);
	$nm_bairro = ucwords($nm_bairro);
	$nm_cidade = addslashes($_POST['nm_cidade']);
	$nm_cidade = ucwords($nm_cidade);
	$nm_uf = addslashes($_POST['nm_uf']);
	
	if ($nm_cedente == ""){
	$msg_excessao = "Cedente: Preenchimento obrigatório";
	$_SESSION['msg_excessao'] = $msg_excessao;
	$_SESSION['nm_cedente'] = $nm_cedente;
	$_SESSION['id_banco'] = $id_banco;
	$_SESSION['nm_banco'] = $nm_banco;
	$_SESSION['nu_agencia'] = $nu_agencia;
	$_SESSION['nu_conta'] = $nu_conta;
	$_SESSION['nu_cpf'] = $nu_cpf;
	$_SESSION['nu_nosso'] = $nu_nosso;
	$_SESSION['dt_vencto'] = $dt_vencto;
	$_SESSION['vl_docto'] = $vl_docto;
	$_SESSION['nm_sacado'] = $nm_sacado;
	$_SESSION['te_email'] = $te_email;
	$_SESSION['nm_logra'] = $nm_logra;
	$_SESSION['nu_logra'] = $nu_logra;
	$_SESSION['nu_cep'] = $nu_cep;
	$_SESSION['nm_bairro'] = $nm_bairro;
	$_SESSION['nm_cidade'] = $nm_cidade;
	$_SESSION['nm_uf'] = $nm_uf;
	
	} else {
	unset($_SESSION['msg_excessao']);
	unset($_SESSION['nm_cedente']);
	unset($_SESSION['id_banco']);
	unset($_SESSION['nm_banco']);
	unset($_SESSION['nu_agencia']);
	unset($_SESSION['nu_conta']);
	unset($_SESSION['nu_nosso']);
	unset($_SESSION['dt_vencto']);
	unset($_SESSION['vl_docto']);
	unset($_SESSION['nm_sacado']);
	unset($_SESSION['te_email']);
	unset($_SESSION['nm_logra']);
	unset($_SESSION['nu_logra']);
	unset($_SESSION['nu_cep']);
	unset($_SESSION['nm_bairro']);
	unset($_SESSION['nm_cidade']);
	unset($_SESSION['nm_uf']);
		
	$persistence->inserirBoleto($nm_cedente,$id_banco,$nu_agencia,$nu_conta,$nu_cpf,$nu_nosso,$dt_vencto,
	$vl_docto,$nm_sacado,$te_email,$nm_logra,$nu_logra,$nu_cep,$nm_bairro,$nm_cidade,$nm_uf);
	}	
}

if ( isset($_GET['exibirBoleto']) )  {
	unset($_SESSION['msg_sucesso']);
	unset($_SESSION['msg_excessao']);
	unset($_SESSION['id_boleto']);
	
	$id_aluno = addslashes($_GET['id_aluno']);
	
	header ("location: boleto_codigo.php");
	}

?>