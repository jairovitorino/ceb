<?php
session_start();
require_once("class/persistence.php");
$persistence = new Persistence();

if ( isset($_GET['abrirFuncionarioCpf']) )  {
	unset($_SESSION['msg_sucesso']);
	unset($_SESSION['msg_excessao']);
	unset($_SESSION['id_funcionario']);
	unset($_SESSION['nm_funcionario']);
	unset($_SESSION['dt_nascimento']);
	unset($_SESSION['nu_rg']);
	unset($_SESSION['nu_carteira']);
	unset($_SESSION['nu_serie']);
	unset($_SESSION['id_graduacao']);
	unset($_SESSION['nm_graduacao']);
	unset($_SESSION['nm_experiencia']);
	unset($_SESSION['id_estado_civil']);
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
	
	
	header ("location: funcionario_cpf.php");
	}
	
if ( isset($_POST['pesquisarFuncionarioCpf']) )  {
	unset($_SESSION['msg_sucesso']);
	unset($_SESSION['msg_excessao']);
	unset($_SESSION['nu_cpf']);
	
	$nu_cpf = addslashes($_POST['nu_cpf']);
	
	if ( $nu_cpf == "" ) {
	$msg_excessao = "CPF: Preenchimento obrigatório";
	$_SESSION['msg_excessao'] = $msg_excessao;
	$_SESSION['nu_cpf'] = $nu_cpf;
	
	header ("location: funcionario_cpf.php");
	
	} else if ( ($nu_cpf != "" ) && (strlen( $nu_cpf ) != 11)) {
	$msg_excessao = "CPF: Preenchimento inválido";
	$_SESSION['msg_excessao'] = $msg_excessao;
	$_SESSION['nu_cpf'] = $nu_cpf;
	
	header ("location: funcionario_cpf.php");
		
	} else if (($nu_cpf != "") && (!is_numeric($nu_cpf))){
	$msg_excessao = "CPF: caracteres não aceito";
	$_SESSION['msg_excessao'] = $msg_excessao;
	$_SESSION['nu_cpf'] = $nu_cpf;
	
	header ("location: funcionario_cpf.php");
	
	} else if ( ($nu_cpf != "") && (!$persistence->validCPF($nu_cpf)) ){
	$msg_excessao = "CPF: dígito inválido";
	$_SESSION['msg_excessao'] = $msg_excessao;
	$_SESSION['nu_cpf'] = $nu_cpf;
	
	header ("location: funcionario_cpf.php");
	} else {
		
	$persistence->pesquisarFuncionarioCpf($nu_cpf);
	}
}
			
if ( isset($_GET['abrirFuncionario']) )  {
	unset($_SESSION['msg_sucesso']);
	unset($_SESSION['msg_excessao']);
	unset($_SESSION['id_funcionario']);
	unset($_SESSION['nm_funcionario']);
	unset($_SESSION['id_cargo']);
	unset($_SESSION['nm_cargo']);
	unset($_SESSION['nu_rg']);
	unset($_SESSION['nu_cpf']);
	unset($_SESSION['id_sexo']);
	unset($_SESSION['nu_telefone']);
	unset($_SESSION['nu_ano']);
	unset($_SESSION['te_obs']);
		
	header ("location: funcionario.php");
	}
	
if ( isset($_POST['inserirFuncionario']) )  {
	unset($_SESSION['msg_sucesso']);
	unset($_SESSION['msg_excessao']);

	$nm_funcionario = addslashes($_POST['nm_funcionario']);
	//$nm_funcionario = strtoupper($nm_funcionario);
	$nm_funcionario = ucwords($nm_funcionario);
	$nm_natural = addslashes($_POST['nm_natural']);
	$nm_natural = ucwords($nm_natural);
	$dt_nascimento = addslashes($_POST['dt_nascimento']);
	$nu_rg = addslashes($_POST['nu_rg']);
	$nm_orgao = addslashes($_POST['nm_orgao']);
	$nu_carteira = addslashes($_POST['nu_carteira']);
	$nu_serie = addslashes($_POST['nu_serie']);
	$id_graduacao = addslashes($_POST['id_graduacao']);
	$nm_graduacao = addslashes($_POST['nm_graduacao']);
	$nm_experiencia = addslashes($_POST['nm_experiencia']);
	$id_estado_civil = addslashes($_POST['id_estado_civil']);
	$nm_estado_civil = addslashes($_POST['nm_estado_civil']);
	$nm_conjugue = addslashes($_POST['nm_conjugue']);
	$nm_conjugue = ucwords($nm_conjugue);
	$nu_cpf = addslashes($_POST['nu_cpf']);
	$id_cargo = addslashes($_POST['id_cargo']);
	$nm_cargo = addslashes($_POST['nm_cargo']);
	$id_sexo = addslashes($_POST['id_sexo']);
	$nm_sexo = addslashes($_POST['nm_sexo']);
	$nu_telefone = addslashes($_POST['nu_telefone']);
	$dt_admissao = addslashes($_POST['dt_admissao']);
	$nm_logra = addslashes($_POST['nm_logra']);
	$nm_logra = ucwords($nm_logra);
	$nu_logra = addslashes($_POST['nu_logra']);
	$nm_compl = addslashes($_POST['nm_compl']);
	$nm_compl = ucwords($nm_compl);
	$nu_cep = addslashes($_POST['nu_cep']);
	$nm_bairro = addslashes($_POST['nm_bairro']);
	$nm_bairro = ucwords($nm_bairro);
	$nm_cidade = addslashes($_POST['nm_cidade']);
	$nm_cidade = ucwords($nm_cidade);
	$nm_uf = addslashes($_POST['nm_uf']);
	$te_obs = addslashes($_POST['te_obs']);	
	
	if ($nm_funcionario == ""){
	$msg_excessao = "Nome: Preenchimento obrigatório";
	$_SESSION['msg_excessao'] = $msg_excessao;
	$_SESSION['nm_funcionario'] = $nm_funcionario;
	$_SESSION['nm_natural'] = $nm_natural;
	$_SESSION['dt_nascimento'] = $dt_nascimento;
	$_SESSION['nu_rg'] = $nu_rg;
	$_SESSION['nm_orgao'] = $nm_orgao;
	$_SESSION['nu_carteira'] = $nu_carteira;
	$_SESSION['nu_serie'] = $nu_serie;
	$_SESSION['id_graduacao'] = $id_graduacao;
	$_SESSION['nm_graduacao'] = $nm_graduacao;
	$_SESSION['nm_experiencia'] = $nm_experiencia;
	$_SESSION['id_estado_civil'] = $id_estado_civil;
	$_SESSION['nm_estado_civil'] = $nm_estado_civil;	
	$_SESSION['nm_conjugue'] = $nm_conjugue;
	$_SESSION['nu_cpf'] = $nu_cpf;
	$_SESSION['id_cargo'] = $id_cargo;
	$_SESSION['nm_cargo'] = $nm_cargo;
	$_SESSION['id_sexo'] = $id_sexo;
	$_SESSION['nm_sexo'] = $nm_sexo;
	$_SESSION['nu_telefone'] = $nu_telefone;
	$_SESSION['dt_admissao'] = $dt_admissao;
	$_SESSION['nm_logra'] = $nm_logra;
	$_SESSION['nu_logra'] = $nu_logra;
	$_SESSION['nm_compl'] = $nm_compl;
	$_SESSION['nu_cep'] = $nu_cep;
	$_SESSION['nm_bairro'] = $nm_bairro;
	$_SESSION['nm_cidade'] = $nm_cidade;
	$_SESSION['nm_uf'] = $nm_uf;
	$_SESSION['te_obs'] = $te_obs;
	header ("location: funcionario.php");
	
	} else if ($id_graduacao == 0){
	$msg_excessao = "Graduação: Preenchimento obrigatório";
	$_SESSION['msg_excessao'] = $msg_excessao;
	$_SESSION['nm_funcionario'] = $nm_funcionario;
	$_SESSION['nm_natural'] = $nm_natural;
	$_SESSION['dt_nascimento'] = $dt_nascimento;
	$_SESSION['nu_rg'] = $nu_rg;
	$_SESSION['nm_orgao'] = $nm_orgao;
	$_SESSION['nu_carteira'] = $nu_carteira;
	$_SESSION['nu_serie'] = $nu_serie;
	$_SESSION['id_graduacao'] = $id_graduacao;
	$_SESSION['nm_graduacao'] = $nm_graduacao;
	$_SESSION['nm_experiencia'] = $nm_experiencia;
	$_SESSION['id_estado_civil'] = $id_estado_civil;
	$_SESSION['nm_estado_civil'] = $nm_estado_civil;
	$_SESSION['nm_conjugue'] = $nm_conjugue;
	$_SESSION['nu_cpf'] = $nu_cpf;
	$_SESSION['id_cargo'] = $id_cargo;
	$_SESSION['nm_cargo'] = $nm_cargo;
	$_SESSION['id_sexo'] = $id_sexo;
	$_SESSION['nm_sexo'] = $nm_sexo;
	$_SESSION['nu_telefone'] = $nu_telefone;
	$_SESSION['dt_admissao'] = $dt_admissao;
	$_SESSION['nm_logra'] = $nm_logra;
	$_SESSION['nu_logra'] = $nu_logra;
	$_SESSION['nm_compl'] = $nm_compl;
	$_SESSION['nu_cep'] = $nu_cep;
	$_SESSION['nm_bairro'] = $nm_bairro;
	$_SESSION['nm_cidade'] = $nm_cidade;
	$_SESSION['nm_uf'] = $nm_uf;
	$_SESSION['te_obs'] = $te_obs;
	header ("location: funcionario.php");
	
	} else if ($id_estado_civil == 0){
	$msg_excessao = "Estado Civil: Preenchimento obrigatório";
	$_SESSION['msg_excessao'] = $msg_excessao;
	$_SESSION['nm_funcionario'] = $nm_funcionario;
	$_SESSION['nm_natural'] = $nm_natural;
	$_SESSION['dt_nascimento'] = $dt_nascimento;
	$_SESSION['nu_rg'] = $nu_rg;
	$_SESSION['nm_orgao'] = $nm_orgao;
	$_SESSION['nu_carteira'] = $nu_carteira;
	$_SESSION['nu_serie'] = $nu_serie;
	$_SESSION['id_graduacao'] = $id_graduacao;
	$_SESSION['nm_graduacao'] = $nm_graduacao;
	$_SESSION['nm_experiencia'] = $nm_experiencia;
	$_SESSION['id_estado_civil'] = $id_estado_civil;
	$_SESSION['nm_estado_civil'] = $nm_estado_civil;
	$_SESSION['nm_conjugue'] = $nm_conjugue;
	$_SESSION['nu_cpf'] = $nu_cpf;
	$_SESSION['id_cargo'] = $id_cargo;
	$_SESSION['nm_cargo'] = $nm_cargo;
	$_SESSION['id_sexo'] = $id_sexo;
	$_SESSION['nm_sexo'] = $nm_sexo;
	$_SESSION['nu_telefone'] = $nu_telefone;
	$_SESSION['dt_admissao'] = $dt_admissao;
	$_SESSION['nm_logra'] = $nm_logra;
	$_SESSION['nu_logra'] = $nu_logra;
	$_SESSION['nm_compl'] = $nm_compl;
	$_SESSION['nu_cep'] = $nu_cep;
	$_SESSION['nm_bairro'] = $nm_bairro;
	$_SESSION['nm_cidade'] = $nm_cidade;
	$_SESSION['nm_uf'] = $nm_uf;
	$_SESSION['te_obs'] = $te_obs;
	header ("location: funcionario.php");		
	
	} else if ($id_sexo == ""){
	$msg_excessao = "Sexo: Preenchimento obrigatório";
	$_SESSION['msg_excessao'] = $msg_excessao;
	$_SESSION['nm_funcionario'] = $nm_funcionario;
	$_SESSION['nm_natural'] = $nm_natural;
	$_SESSION['dt_nascimento'] = $dt_nascimento;
	$_SESSION['nu_rg'] = $nu_rg;
	$_SESSION['nm_orgao'] = $nm_orgao;
	$_SESSION['nu_carteira'] = $nu_carteira;
	$_SESSION['nu_serie'] = $nu_serie;
	$_SESSION['id_graduacao'] = $id_graduacao;
	$_SESSION['nm_graduacao'] = $nm_graduacao;
	$_SESSION['nm_experiencia'] = $nm_experiencia;
	$_SESSION['id_estado_civil'] = $id_estado_civil;
	$_SESSION['nm_estado_civil'] = $nm_estado_civil;
	$_SESSION['nm_conjugue'] = $nm_conjugue;
	$_SESSION['nu_cpf'] = $nu_cpf;
	$_SESSION['id_cargo'] = $id_cargo;
	$_SESSION['nm_cargo'] = $nm_cargo;
	$_SESSION['id_sexo'] = $id_sexo;
	$_SESSION['nm_sexo'] = $nm_sexo;
	$_SESSION['nu_telefone'] = $nu_telefone;
	$_SESSION['dt_admissao'] = $dt_admissao;
	$_SESSION['nm_logra'] = $nm_logra;
	$_SESSION['nu_logra'] = $nu_logra;
	$_SESSION['nm_compl'] = $nm_compl;
	$_SESSION['nu_cep'] = $nu_cep;
	$_SESSION['nm_bairro'] = $nm_bairro;
	$_SESSION['nm_cidade'] = $nm_cidade;
	$_SESSION['nm_uf'] = $nm_uf;
	$_SESSION['te_obs'] = $te_obs;
	header ("location: funcionario.php");
	
	} else if ($id_cargo == 0){
	$msg_excessao = "Cargo: Preenchimento obrigatório";
	$_SESSION['msg_excessao'] = $msg_excessao;
	$_SESSION['nm_funcionario'] = $nm_funcionario;
	$_SESSION['nm_natural'] = $nm_natural;
	$_SESSION['dt_nascimento'] = $dt_nascimento;
	$_SESSION['nu_rg'] = $nu_rg;
	$_SESSION['nm_orgao'] = $nm_orgao;
	$_SESSION['nu_carteira'] = $nu_carteira;
	$_SESSION['nu_serie'] = $nu_serie;
	$_SESSION['id_graduacao'] = $id_graduacao;
	$_SESSION['nm_graduacao'] = $nm_graduacao;
	$_SESSION['nm_experiencia'] = $nm_experiencia;
	$_SESSION['id_estado_civil'] = $id_estado_civil;
	$_SESSION['nm_estado_civil'] = $nm_estado_civil;
	$_SESSION['nm_conjugue'] = $nm_conjugue;
	$_SESSION['nu_cpf'] = $nu_cpf;
	$_SESSION['id_cargo'] = $id_cargo;
	$_SESSION['nm_cargo'] = $nm_cargo;
	$_SESSION['id_sexo'] = $id_sexo;
	$_SESSION['nm_sexo'] = $nm_sexo;
	$_SESSION['nu_telefone'] = $nu_telefone;
	$_SESSION['dt_admissao'] = $dt_admissao;
	$_SESSION['nm_logra'] = $nm_logra;
	$_SESSION['nu_logra'] = $nu_logra;
	$_SESSION['nm_compl'] = $nm_compl;
	$_SESSION['nu_cep'] = $nu_cep;
	$_SESSION['nm_bairro'] = $nm_bairro;
	$_SESSION['nm_cidade'] = $nm_cidade;
	$_SESSION['nm_uf'] = $nm_uf;
	$_SESSION['te_obs'] = $te_obs;
	header ("location: funcionario.php");
	
	} else if ($nm_logra == ""){
	$msg_excessao = "Rua: Preenchimento obrigatório";
	$_SESSION['msg_excessao'] = $msg_excessao;
	$_SESSION['nm_funcionario'] = $nm_funcionario;
	$_SESSION['nm_natural'] = $nm_natural;
	$_SESSION['dt_nascimento'] = $dt_nascimento;
	$_SESSION['nu_rg'] = $nu_rg;
	$_SESSION['nm_orgao'] = $nm_orgao;
	$_SESSION['nu_carteira'] = $nu_carteira;
	$_SESSION['nu_serie'] = $nu_serie;
	$_SESSION['id_graduacao'] = $id_graduacao;
	$_SESSION['nm_graduacao'] = $nm_graduacao;
	$_SESSION['nm_experiencia'] = $nm_experiencia;
	$_SESSION['id_estado_civil'] = $id_estado_civil;
	$_SESSION['nm_estado_civil'] = $nm_estado_civil;
	$_SESSION['nm_conjugue'] = $nm_conjugue;
	$_SESSION['nu_cpf'] = $nu_cpf;
	$_SESSION['id_cargo'] = $id_cargo;
	$_SESSION['nm_cargo'] = $nm_cargo;
	$_SESSION['id_sexo'] = $id_sexo;
	$_SESSION['nm_sexo'] = $nm_sexo;
	$_SESSION['nu_telefone'] = $nu_telefone;
	$_SESSION['dt_admissao'] = $dt_admissao;
	$_SESSION['nm_logra'] = $nm_logra;
	$_SESSION['nu_logra'] = $nu_logra;
	$_SESSION['nm_compl'] = $nm_compl;
	$_SESSION['nu_cep'] = $nu_cep;
	$_SESSION['nm_bairro'] = $nm_bairro;
	$_SESSION['nm_cidade'] = $nm_cidade;
	$_SESSION['nm_uf'] = $nm_uf;
	$_SESSION['te_obs'] = $te_obs;
	header ("location: funcionario.php");	
	
	} else if ($nu_cep == ""){
	$msg_excessao = "CEP: Preenchimento obrigatório";
	$_SESSION['msg_excessao'] = $msg_excessao;
	$_SESSION['nm_funcionario'] = $nm_funcionario;
	$_SESSION['nm_natural'] = $nm_natural;
	$_SESSION['dt_nascimento'] = $dt_nascimento;
	$_SESSION['nu_rg'] = $nu_rg;
	$_SESSION['nm_orgao'] = $nm_orgao;
	$_SESSION['nu_carteira'] = $nu_carteira;
	$_SESSION['nu_serie'] = $nu_serie;
	$_SESSION['id_graduacao'] = $id_graduacao;
	$_SESSION['nm_graduacao'] = $nm_graduacao;
	$_SESSION['nm_experiencia'] = $nm_experiencia;
	$_SESSION['id_estado_civil'] = $id_estado_civil;
	$_SESSION['nm_estado_civil'] = $nm_estado_civil;
	$_SESSION['nm_conjugue'] = $nm_conjugue;
	$_SESSION['nu_cpf'] = $nu_cpf;
	$_SESSION['id_cargo'] = $id_cargo;
	$_SESSION['nm_cargo'] = $nm_cargo;
	$_SESSION['id_sexo'] = $id_sexo;
	$_SESSION['nm_sexo'] = $nm_sexo;
	$_SESSION['nu_telefone'] = $nu_telefone;
	$_SESSION['dt_admissao'] = $dt_admissao;
	$_SESSION['nm_logra'] = $nm_logra;
	$_SESSION['nu_logra'] = $nu_logra;
	$_SESSION['nm_compl'] = $nm_compl;
	$_SESSION['nu_cep'] = $nu_cep;
	$_SESSION['nm_bairro'] = $nm_bairro;
	$_SESSION['nm_cidade'] = $nm_cidade;
	$_SESSION['nm_uf'] = $nm_uf;
	$_SESSION['te_obs'] = $te_obs;
	header ("location: funcionario.php");	
	
	} else if ($nm_uf == ""){
	$msg_excessao = "UF: Preenchimento obrigatório";
	$_SESSION['msg_excessao'] = $msg_excessao;
	$_SESSION['nm_funcionario'] = $nm_funcionario;
	$_SESSION['nm_natural'] = $nm_natural;
	$_SESSION['dt_nascimento'] = $dt_nascimento;
	$_SESSION['nu_rg'] = $nu_rg;
	$_SESSION['nm_orgao'] = $nm_orgao;
	$_SESSION['nu_carteira'] = $nu_carteira;
	$_SESSION['nu_serie'] = $nu_serie;
	$_SESSION['id_graduacao'] = $id_graduacao;
	$_SESSION['nm_graduacao'] = $nm_graduacao;
	$_SESSION['nm_experiencia'] = $nm_experiencia;
	$_SESSION['id_estado_civil'] = $id_estado_civil;
	$_SESSION['nm_estado_civil'] = $nm_estado_civil;
	$_SESSION['nm_conjugue'] = $nm_conjugue;
	$_SESSION['nu_cpf'] = $nu_cpf;
	$_SESSION['id_cargo'] = $id_cargo;
	$_SESSION['nm_cargo'] = $nm_cargo;
	$_SESSION['id_sexo'] = $id_sexo;
	$_SESSION['nm_sexo'] = $nm_sexo;
	$_SESSION['nu_telefone'] = $nu_telefone;
	$_SESSION['dt_admissao'] = $dt_admissao;
	$_SESSION['nm_logra'] = $nm_logra;
	$_SESSION['nu_logra'] = $nu_logra;
	$_SESSION['nm_compl'] = $nm_compl;
	$_SESSION['nu_cep'] = $nu_cep;
	$_SESSION['nm_bairro'] = $nm_bairro;
	$_SESSION['nm_cidade'] = $nm_cidade;
	$_SESSION['nm_uf'] = $nm_uf;
	$_SESSION['te_obs'] = $te_obs;
	header ("location: funcionario.php");	
	
	} else {
	unset($_SESSION['msg_excessao']);
	unset($_SESSION['nm_funcionario']);
	unset($_SESSION['nm_natural']);
	unset($_SESSION['dt_nascimento']);
	unset($_SESSION['nu_rg']);
	unset($_SESSION['nm_orgao']);
	unset($_SESSION['nu_carteira']);
	unset($_SESSION['nu_serie']);
	unset($_SESSION['id_graduacao']);
	unset($_SESSION['nm_graduacao']);
	unset($_SESSION['id_estado_civil']);
	unset($_SESSION['nm_estado_civil']);
	unset($_SESSION['nm_experiencia']);
	unset($_SESSION['nm_conjugue']);
	unset($_SESSION['nu_cpf']);
	unset($_SESSION['id_cargo']);
	unset($_SESSION['id_sexo']);
	unset($_SESSION['nm_sexo']);
	unset($_SESSION['nu_telefone']);
	unset($_SESSION['dt_admissao']);
	unset($_SESSION['nm_logra']);
	unset($_SESSION['nu_logra']);
	unset($_SESSION['nm_compl']);
	unset($_SESSION['nu_cep']);
	unset($_SESSION['nm_bairro']);
	unset($_SESSION['nm_cidade']);
	unset($_SESSION['nm_uf']);
	unset($_SESSION['te_obs']);
	
	$persistence->inserirFuncionario($nm_funcionario,$nm_natural,$dt_nascimento,$nu_rg,$nm_orgao,$nu_carteira,$nu_serie,$id_graduacao,$nm_experiencia,$id_estado_civil,$nm_conjugue,$id_cargo,$nu_cpf,$id_sexo,$nu_telefone,$dt_admissao,$nm_logra,$nu_logra,$nm_compl,$nu_cep,$nm_bairro,$nm_cidade,$nm_uf,$te_obs);
	}
}

if ( isset($_POST['editarFuncionario']) )  {
	unset($_SESSION['msg_sucesso']);
	unset($_SESSION['msg_excessao']);

	$id_funcionario = addslashes($_POST['id_funcionario']);
	$nm_funcionario = addslashes($_POST['nm_funcionario']);
	//$nm_funcionario = strtoupper($nm_funcionario);
	$nm_funcionario = ucwords($nm_funcionario);
	$nm_natural = addslashes($_POST['nm_natural']);
	$nm_natural = ucwords($nm_natural);
	$dt_nascimento = addslashes($_POST['dt_nascimento']);
	$nu_rg = addslashes($_POST['nu_rg']);
	$nm_orgao = addslashes($_POST['nm_orgao']);
	$nu_carteira = addslashes($_POST['nu_carteira']);
	$nu_serie = addslashes($_POST['nu_serie']);
	$id_graduacao = addslashes($_POST['id_graduacao']);
	$nm_graduacao = addslashes($_POST['nm_graduacao']);
	$nm_experiencia = addslashes($_POST['nm_experiencia']);
	$id_estado_civil = addslashes($_POST['id_estado_civil']);
	$nm_estado_civil = addslashes($_POST['nm_estado_civil']);
	$nm_conjugue = addslashes($_POST['nm_conjugue']);
	$nm_conjugue = ucwords($nm_conjugue);
	$nu_cpf = addslashes($_POST['nu_cpf']);
	$id_cargo = addslashes($_POST['id_cargo']);
	$nm_cargo = addslashes($_POST['nm_cargo']);
	$id_sexo = addslashes($_POST['id_sexo']);
	$nm_sexo = addslashes($_POST['nm_sexo']);
	$nu_telefone = addslashes($_POST['nu_telefone']);
	$dt_admissao = addslashes($_POST['dt_admissao']);
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
	$te_obs = addslashes($_POST['te_obs']);	
	$opcao = addslashes($_POST['opcao']);
	
	
	$persistence->editarFuncionario($id_funcionario,$nm_funcionario,$nm_natural,$dt_nascimento,$nu_rg,$nm_orgao,$nu_carteira,$nu_serie,$id_graduacao,$nm_experiencia,$id_estado_civil,$nm_conjugue,$id_cargo,$nu_cpf,$id_sexo,$nu_telefone,$dt_admissao,$nm_logra,$nu_logra,$nm_compl,$nu_cep,$nm_bairro,$nm_cidade,$nm_uf,$te_obs,$opcao);
	
}
if ( isset($_GET['abrirFuncionarioEdit']) )  {
	unset($_SESSION['msg_sucesso']);
	unset($_SESSION['msg_excessao']);
	unset($_SESSION['nm_objeto']);
	unset($_SESSION['opcao']);
	
	$id_funcionario = addslashes($_GET['id_funcionario']);
	$id_usuario = addslashes($_GET['id_usuario']);		
	$opcao = addslashes($_GET['opcao']);
	
	if ( $_SESSION['id_id'] == 2 && $opcao == 2 ){
		$msg_excessao = "Usuário não autorizado";
		$_SESSION['msg_excessao'] = $msg_excessao;
		
		header ("location: funcionario_lista.php");
		
		} else if ( $id_usuario != $_SESSION['id'] ){ 
		$msg_excessao = "Edição não permitida";
		$_SESSION['msg_excessao'] = $msg_excessao;
		
		header ("location: funcionario_lista.php");
		
		
		} else {
	
	$_SESSION['id_funcionario'] = $id_funcionario;
	$_SESSION['opcao'] = $opcao;	
		
	header ("location: funcionario_edit.php");
	}
}


if ( isset($_GET['excluirFuncionario']) ) {
				
		unset($_SESSION['msg_sucesso']);
		unset($_SESSION['msg_excessao']);
		
		$id_funcionario = addslashes($_GET['id_funcionario']);
		$id_usuario = addslashes($_GET['id_usuario']);
		$opcao = addslashes($_GET['opcao']);
			
		if ( $_SESSION['id_id'] == 2 && $opcao == 2 ){
		$msg_excessao = "Usuário não autorizado";
		$_SESSION['msg_excessao'] = $msg_excessao;
		
		header ("location: funcionario_lista.php");		
				
		} else if ( $id_usuario != $_SESSION['id'] ){ 
		$msg_excessao = "Exclusão não permitida";
		$_SESSION['msg_excessao'] = $msg_excessao;
		
		header ("location: funcionario_lista.php");
		
		} else {
						
		$persistence->excluirFuncionario($id_funcionario,$opcao);
	}
	}

if ( isset($_GET['abrirFuncionarioLista']) )  {
	unset($_SESSION['msg_sucesso']);
	unset($_SESSION['msg_excessao']);
	unset($_SESSION['nm_objeto']);
		
	header ("location: funcionario_lista.php");
	}
	
if ( isset($_GET['imprimirFuncionarioLista']) )  {
	unset($_SESSION['msg_sucesso']);
	unset($_SESSION['msg_excessao']);
	unset($_SESSION['nm_objeto']);
		
	header ("location: funcionario_lista_pdf.php");
	}
	
if ( isset($_GET['exibirFuncionarioFicha']) )  {
	unset($_SESSION['msg_sucesso']);
	unset($_SESSION['msg_excessao']);
	unset($_SESSION['nm_objeto']);
	
	$id_funcionario = addslashes($_GET['id_funcionario']);
	$_SESSION['id_funcionario'] = $id_funcionario;
		
	header ("location: funcionario_ficha.php");
	}
?>