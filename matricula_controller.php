<?php
session_start();
require_once("class/persistence.php");
$persistence = new Persistence();

if ( isset($_GET['abrirMatriculaTermo']) )  {
	unset($_SESSION['msg_sucesso']);
	unset($_SESSION['msg_excessao']);
	 unset($_SESSION['in_responsavel']);
	  unset($_SESSION['in_almoco']);
	unset($_SESSION['id_matricula']);
	unset($_SESSION['id_funcionario']);
	unset($_SESSION['nm_funcionario']);
	unset($_SESSION['dt_nascimento']);
	unset($_SESSION['nu_rg']);
	unset($_SESSION['nu_carteira']);
	unset($_SESSION['nu_serie']);
	unset($_SESSION['id_turno']);
	unset($_SESSION['id_serie']);
	unset($_SESSION['nm_serie']);
	unset($_SESSION['id_graduacao']);
	unset($_SESSION['nm_graduacao']);
	unset($_SESSION['nm_experiencia']);
	unset($_SESSION['id_estado_civil']);
	unset($_SESSION['nm_estado_civil']);	
	unset($_SESSION['nm_conjugue']);
	unset($_SESSION['id_cargo']);
	unset($_SESSION['nm_cargo']);
	unset($_SESSION['nm_natural']);
	unset($_SESSION['nu_termo']);
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
	
	$nu_termo = addslashes($_GET['nu_termo']);
	$_SESSION['nu_termo'] = $nu_termo;
	$persistence->limparMatriculas();
	
	header ("location: matricula_termo.php");
	}

if ( isset($_POST['lookupMatricula']) ) {
				
		unset($_SESSION['msg_sucesso']);
		unset($_SESSION['msg_excessao']);
		
		$nu_termo = addslashes($_POST['nu_termo']);
		$persistence->limparMatriculas();
		
		if ( $nu_termo == "" ){
		$msg_excessao = "Termo: Preenchimento obrigatório";
		$_SESSION['msg_excessao'] = $msg_excessao;
		header ("location: matricula_termo.php");
		
		} else if ( $nu_termo != "" && !is_numeric($nu_termo) ){
		$msg_excessao = "Termo: Somente números";
		$_SESSION['msg_excessao'] = $msg_excessao;
		$_SESSION['nu_termo'] = $nu_termo;
		
		header ("location: matricula_termo.php");
		
				
		} else if ( $persistence->lookupTermo($nu_termo) ){
		$msg_excessao = "Aluno não cadastrado";
		$_SESSION['msg_excessao'] = $msg_excessao;
		$_SESSION['nu_termo'] = $nu_termo;
		header ("location: matricula_termo.php");
		
		} else if ( $persistence->lookupMatricula($_SESSION['id_aluno']) ){
		$msg_excessao = "Matrícula já cadastrada";
		$_SESSION['msg_excessao'] = $msg_excessao;
		$_SESSION['nu_termo'] = $nu_termo;
		header ("location: matricula_termo.php");		
				
		
		} else {
		
		$_SESSION['nu_termo'] = $nu_termo;
		header ("location: matricula.php");
	}
	}

if ( isset($_GET['inserirMatriculaTermo']) ) {
				
		unset($_SESSION['msg_sucesso']);
		unset($_SESSION['msg_excessao']);
		unset($_SESSION['id_serie']);
		unset($_SESSION['nm_serie']);
		unset($_SESSION['vl_matricula']);
		
		$id_aluno = addslashes($_GET['id_aluno']);
		$nu_termo = addslashes($_GET['nu_termo']);
		$nm_aluno = addslashes($_GET['nm_aluno']);
		$persistence->limparMatriculas();		
		
		
		$_SESSION['nu_termo'] = $nu_termo;
		$_SESSION['id_aluno'] = $id_aluno;
		$_SESSION['nm_aluno'] = $nm_aluno;
		header ("location: matricula.php");
	}
	

if ( isset($_POST['inserirMatricula']) )  {
	unset($_SESSION['msg_sucesso']);
	unset($_SESSION['msg_excessao']);
	
	$id_aluno = addslashes($_POST['id_aluno']);
	$nu_termo = addslashes($_POST['nu_termo']);
	$nu_cpf = addslashes($_POST['nu_cpf']);
	$nu_rg = addslashes($_POST['nu_rg']);
	$id_turno = addslashes($_POST['id_turno']);
	$nu_ano = addslashes($_POST['nu_ano']);
	$id_serie = addslashes($_POST['id_serie']);
	$nm_serie = addslashes($_POST['nm_serie']);
	//$nm_funcionario = strtoupper($nm_funcionario);
	$vl_matricula = addslashes($_POST['vl_matricula']);
	$in_responsavel = addslashes($_POST['in_responsavel']);
	$in_imagem = addslashes($_POST['in_imagem']);
	$in_imagem == "" ? $in_imagem = 0 : $in_imagem = 1;
	$te_obs = addslashes($_POST['te_obs']);
		
	if ($id_turno == ""){
	$msg_excessao = "Turno: Preenchimento obrigatório";
	$_SESSION['msg_excessao'] = $msg_excessao;
	$_SESSION['id_turno'] = $id_turno;
	$_SESSION['nu_ano'] = $nu_ano;
	$_SESSION['id_serie'] = $id_serie;
	$_SESSION['nm_serie'] = $nm_serie;
	$_SESSION['nu_cpf'] = $nu_cpf;
	$_SESSION['nu_rg'] = $nu_rg;
	$_SESSION['vl_matricula'] = $vl_matricula;
	$_SESSION['in_responsavel'] = $in_responsavel;
	$_SESSION['in_imagem'] = $in_imagem;
	header ("location: matricula.php");
	
	} else if ($nu_ano == 0){
	$msg_excessao = "Ano: Preenchimento obrigatório";
	$_SESSION['msg_excessao'] = $msg_excessao;
	$_SESSION['id_turno'] = $id_turno;
	$_SESSION['nu_ano'] = $nu_ano;
	$_SESSION['id_serie'] = $id_serie;
	$_SESSION['nm_serie'] = $nm_serie;
	$_SESSION['nu_cpf'] = $nu_cpf;
	$_SESSION['nu_rg'] = $nu_rg;
	$_SESSION['vl_matricula'] = $vl_matricula;
	$_SESSION['in_responsavel'] = $in_responsavel;
	$_SESSION['in_imagem'] = $in_imagem;
	header ("location: matricula.php");
	
	} else if ($id_serie == 0){
	$msg_excessao = "Série: Preenchimento obrigatório";
	$_SESSION['msg_excessao'] = $msg_excessao;
	$_SESSION['id_turno'] = $id_turno;
	$_SESSION['nu_ano'] = $nu_ano;
	$_SESSION['id_serie'] = $id_serie;
	$_SESSION['nm_serie'] = $nm_serie;
	$_SESSION['nu_cpf'] = $nu_cpf;
	$_SESSION['nu_rg'] = $nu_rg;
	$_SESSION['vl_matricula'] = $vl_matricula;
	$_SESSION['in_responsavel'] = $in_responsavel;
	$_SESSION['in_imagem'] = $in_imagem;
	header ("location: matricula.php");
	
	} else if ($vl_matricula == ""){
	$msg_excessao = "Valor R$: Preenchimento obrigatório";
	$_SESSION['msg_excessao'] = $msg_excessao;
	$_SESSION['id_turno'] = $id_turno;
	$_SESSION['nu_ano'] = $nu_ano;
	$_SESSION['id_serie'] = $id_serie;
	$_SESSION['nm_serie'] = $nm_serie;
	$_SESSION['nu_cpf'] = $nu_cpf;
	$_SESSION['nu_rg'] = $nu_rg;
	$_SESSION['vl_matricula'] = $vl_matricula;
	$_SESSION['in_responsavel'] = $in_responsavel;
	$_SESSION['in_imagem'] = $in_imagem;
	header ("location: matricula.php");
	
	} else if ($in_responsavel == ""){
	$msg_excessao = "Responsável: Preenchimento obrigatório";
	$_SESSION['msg_excessao'] = $msg_excessao;
	$_SESSION['id_turno'] = $id_turno;
	$_SESSION['nu_ano'] = $nu_ano;
	$_SESSION['id_serie'] = $id_serie;
	$_SESSION['nm_serie'] = $nm_serie;
	$_SESSION['nu_cpf'] = $nu_cpf;
	$_SESSION['nu_rg'] = $nu_rg;
	$_SESSION['vl_matricula'] = $vl_matricula;
	$_SESSION['in_responsavel'] = $in_responsavel;
	$_SESSION['in_imagem'] = $in_imagem;
	header ("location: matricula.php");
	
	} else if ($nu_rg == ""){
	$msg_excessao = "RG: Preenchimento obrigatório";
	$_SESSION['msg_excessao'] = $msg_excessao;
	$_SESSION['id_turno'] = $id_turno;
	$_SESSION['nu_ano'] = $nu_ano;
	$_SESSION['id_serie'] = $id_serie;
	$_SESSION['nm_serie'] = $nm_serie;
	$_SESSION['nu_cpf'] = $nu_cpf;
	$_SESSION['nu_rg'] = $nu_rg;
	$_SESSION['vl_matricula'] = $vl_matricula;
	$_SESSION['in_responsavel'] = $in_responsavel;
	$_SESSION['in_imagem'] = $in_imagem;
	header ("location: matricula.php");
	
	} else if ($nu_cpf == ""){
	$msg_excessao = "CPF: Preenchimento obrigatório";
	$_SESSION['msg_excessao'] = $msg_excessao;
	$_SESSION['id_turno'] = $id_turno;
	$_SESSION['nu_ano'] = $nu_ano;
	$_SESSION['id_serie'] = $id_serie;
	$_SESSION['nm_serie'] = $nm_serie;
	$_SESSION['nu_cpf'] = $nu_cpf;
	$_SESSION['nu_rg'] = $nu_rg;
	$_SESSION['vl_matricula'] = $vl_matricula;
	$_SESSION['in_responsavel'] = $in_responsavel;
	$_SESSION['in_imagem'] = $in_imagem;
	header ("location: matricula.php");
	
	} else if ( ($nu_cpf != "" ) && (strlen( $nu_cpf ) != 11)) {
	$msg_excessao = "CPF: Preenchimento inválido";
	$_SESSION['msg_excessao'] = $msg_excessao;
	$_SESSION['id_turno'] = $id_turno;
	$_SESSION['nu_ano'] = $nu_ano;
	$_SESSION['id_serie'] = $id_serie;
	$_SESSION['nm_serie'] = $nm_serie;
	$_SESSION['nu_cpf'] = $nu_cpf;
	$_SESSION['nu_rg'] = $nu_rg;
	$_SESSION['vl_matricula'] = $vl_matricula;
	$_SESSION['in_responsavel'] = $in_responsavel;
	$_SESSION['in_imagem'] = $in_imagem;
	header ("location: matricula.php");
	
	} else if (($nu_cpf != "") && (!is_numeric($nu_cpf))){
	$msg_excessao = "CPF: caracteres não aceito";
	$_SESSION['msg_excessao'] = $msg_excessao;
	$_SESSION['id_turno'] = $id_turno;
	$_SESSION['nu_ano'] = $nu_ano;
	$_SESSION['id_serie'] = $id_serie;
	$_SESSION['nm_serie'] = $nm_serie;
	$_SESSION['nu_cpf'] = $nu_cpf;
	$_SESSION['nu_rg'] = $nu_rg;
	$_SESSION['vl_matricula'] = $vl_matricula;
	$_SESSION['in_responsavel'] = $in_responsavel;
	$_SESSION['in_imagem'] = $in_imagem;
	header ("location: matricula.php");
	
	} else if ( ($nu_cpf != "") && (!$persistence->validCPF($nu_cpf)) ){
	$msg_excessao = "CPF: dígito inválido";
	$_SESSION['msg_excessao'] = $msg_excessao;
	$_SESSION['id_turno'] = $id_turno;
	$_SESSION['nu_ano'] = $nu_ano;
	$_SESSION['id_serie'] = $id_serie;
	$_SESSION['nm_serie'] = $nm_serie;
	$_SESSION['nu_cpf'] = $nu_cpf;
	$_SESSION['nu_rg'] = $nu_rg;
	$_SESSION['vl_matricula'] = $vl_matricula;
	$_SESSION['in_responsavel'] = $in_responsavel;
	$_SESSION['in_imagem'] = $in_imagem;
	header ("location: matricula.php");
	
	} else if ( $persistence->validarInclusaoMatricula($nu_ano,$id_aluno) ){
	$msg_excessao = "Matricula já cadastrada para ".$nu_ano;
	$_SESSION['msg_excessao'] = $msg_excessao;
	$_SESSION['id_turno'] = $id_turno;
	$_SESSION['nu_ano'] = $nu_ano;
	$_SESSION['id_serie'] = $id_serie;
	$_SESSION['nm_serie'] = $nm_serie;
	$_SESSION['nu_cpf'] = $nu_cpf;
	$_SESSION['nu_rg'] = $nu_rg;
	$_SESSION['vl_matricula'] = $vl_matricula;
	$_SESSION['in_responsavel'] = $in_responsavel;
	$_SESSION['in_imagem'] = $in_imagem;
	header ("location: matricula.php");		
		
	} else {
	unset($_SESSION['nu_cpf']);
	unset($_SESSION['nu_rg']);
	unset($_SESSION['in_responsavel']);
	unset($_SESSION['id_turno']);
	unset($_SESSION['nu_ano']);
	unset($_SESSION['id_serie']);
	unset($_SESSION['vl_matricula']);
	unset($_SESSION['te_obs']);
	unset($_SESSION['in_imagem']);

	$persistence->inserirMatricula($nu_termo,$nu_cpf,$nu_rg,$id_turno,$nu_ano,$id_serie,$vl_matricula,$in_responsavel,$in_imagem,$te_obs);
}
}
if ( isset($_POST['editarMatricula']) )  {
	unset($_SESSION['msg_sucesso']);
	unset($_SESSION['msg_excessao']);

	$id_matricula = addslashes($_POST['id_matricula']);
	$opcao = addslashes($_POST['opcao']);
	$nu_termo = addslashes($_POST['nu_termo']);
	$nu_cpf = addslashes($_POST['nu_cpf']);
	$id_turno = addslashes($_POST['id_turno']);
	$nu_ano = addslashes($_POST['nu_ano']);
	$id_serie = addslashes($_POST['id_serie']);
	$nm_serie = addslashes($_POST['nm_serie']);
	//$nm_funcionario = strtoupper($nm_funcionario);
	$vl_matricula = addslashes($_POST['vl_matricula']);
	$in_imagem = addslashes($_POST['in_imagem']);
	$in_imagem == "" ? $in_imagem = 0 : $in_imagem = 1;
	$te_obs = addslashes($_POST['te_obs']);

	$persistence->editarMatricula($id_matricula,$opcao,$nu_termo,$nu_cpf,$id_turno,$nu_ano,$id_serie,$vl_matricula,$in_imagem,$te_obs);
}



if ( isset($_GET['abrirMatriculaEdit']) )  {
	unset($_SESSION['msg_sucesso']);
	unset($_SESSION['msg_excessao']);
	unset($_SESSION['nm_objeto']);
	unset($_SESSION['opcao']);
	
	$id_matricula = addslashes($_GET['id_matricula']);
	$id_usuario = addslashes($_GET['id_usuario']);		
	$opcao = addslashes($_GET['opcao']);
	
	if ( $_SESSION['id_id'] == 2 && $opcao == 2 ){
		$msg_excessao = "Usuário não autorizado";
		$_SESSION['msg_excessao'] = $msg_excessao;
		
		header ("location: matricula_lista.php");
		
		} else if ( $id_usuario != $_SESSION['id'] ){ 
		$msg_excessao = "Edição não permitida";
		$_SESSION['msg_excessao'] = $msg_excessao;
		
		header ("location: matricula_lista.php");
		
		
		} else {
	
	$_SESSION['id_matricula'] = $id_matricula;
	$_SESSION['opcao'] = $opcao;	
		
	header ("location: matricula_edit.php");
	}
}


if ( isset($_GET['abrirMatriculaLista']) ) {
				
		unset($_SESSION['msg_sucesso']);
		unset($_SESSION['msg_excessao']);
		unset($_SESSION['nm_aluno']);
		unset($_SESSION['nm_objeto']);
		unset($_SESSION['dt_inicio']);
		unset($_SESSION['dt_fim']);
		
		$persistence->limparMatriculas();
		header ("location: matricula_lista.php");
}

if ( isset($_GET['abrirMatriculaListaDif']) ) {
				
		unset($_SESSION['msg_sucesso']);
		unset($_SESSION['msg_excessao']);
		unset($_SESSION['nm_aluno']);
		unset($_SESSION['nm_objeto']);
		
		$persistence->limparMatriculas();
		header ("location: matricula_lista_dif.php");
}


if ( isset($_GET['imprimirMatriculaLista']) ) {
				
		unset($_SESSION['msg_sucesso']);
		unset($_SESSION['msg_excessao']);		
					
		header ("location: matricula_lista_pdf.php");
}

if ( isset($_GET['exibirDadosResponsavel']) ) {
				
		unset($_SESSION['msg_sucesso']);
		unset($_SESSION['msg_excessao']);
		
		$id_matricula = addslashes($_GET['id_matricula']);
		$_SESSION['id_matricula'] = $id_matricula;		
					
		header ("location: matricula_responsavel.php");
}

if ( isset($_GET['exibirMatriculaContrato']) ) {
				
		unset($_SESSION['msg_sucesso']);
		unset($_SESSION['msg_excessao']);
		
		$id_matricula = addslashes($_GET['id_matricula']);
		$_SESSION['id_matricula'] = $id_matricula;		
					
		header ("location: matricula_contrato.php");
}

if ( isset($_GET['excluirMatricula']) ) {
				
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
				
		} else if ( $id_usuario != $_SESSION['id'] ){ 
		$msg_excessao = "Exclusão não permitida";
		$_SESSION['msg_excessao'] = $msg_excessao;
		
		header ("location: matricula_lista.php");
		
		} else {
						
		$persistence->excluirMatricula($id_matricula,$id_aluno,$opcao);
	}
	}

?>
