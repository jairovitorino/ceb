<?php 
session_start();
require_once("class/persistence.php");
$persistence = new Persistence();

	
if ( isset($_GET['abrirAlunoTermo']) ) {
				
		unset($_SESSION['msg_sucesso']);
		unset($_SESSION['msg_excessao']);
		unset($_SESSION['nu_matricula']);
		unset($_SESSION['id_aluno']);
		unset($_SESSION['nm_aluno']);
		 unset($_SESSION['dt_nascimento']);
		 unset($_SESSION['dt_cadastro']);
		unset($_SESSION['nu_termo']);
		unset($_SESSION['id_religiao']);
		unset($_SESSION['nm_religiao']);
		unset($_SESSION['nm_pai']);
		unset($_SESSION['te_profissao_pai']);
		unset($_SESSION['te_profissao_mae']);
		unset($_SESSION['nm_profissao']);
		unset($_SESSION['nu_telefone_pai']);
		unset($_SESSION['nm_trabalho_pai']);		
		unset($_SESSION['nm_mae']);
		unset($_SESSION['nu_telefone_mae']);
		unset($_SESSION['nm_trabalho_mae']);
		 unset($_SESSION['id_analgesico']);
		  unset($_SESSION['nm_analgesico']);
		unset($_SESSION['nm_emergencia']);
		unset($_SESSION['in_emergencia']);
		 unset($_SESSION['in_antigo']);
		unset($_SESSION['nm_alergia']);
		
		unset($_SESSION['nm_restricao']);
		unset($_SESSION['in_doenca']);
		unset($_SESSION['nm_doenca']);
		unset($_SESSION['']);
		unset($_SESSION['nm_plano']);
		unset($_SESSION['nm_acidente']);
				
		
		unset($_SESSION['nm_logra']);
		unset($_SESSION['nu_logra']);				
		unset($_SESSION['te_email']);
		unset($_SESSION['nm_compl']);
		unset($_SESSION['nm_bairro']);
		unset($_SESSION['nu_cep']);
		unset($_SESSION['nm_cidade']);
		unset($_SESSION['nm_uf']);
		unset($_SESSION['opcao']);
		unset($_SESSION['te_obs']);
		
			
		header ("location: aluno_termo.php");
	}

if ( isset($_POST['lookupAluno']) ) {
				
		unset($_SESSION['msg_sucesso']);
		unset($_SESSION['msg_excessao']);
		
		$nu_termo = addslashes($_POST['nu_termo']);
		$nu_cep = addslashes($_POST['nu_cep']);
		$nu_termo = intval($nu_termo);
		
		if ( $nu_termo == "" ){
		$msg_excessao = "Termo: Preenchimento obrigatório";
		$_SESSION['msg_excessao'] = $msg_excessao;
		$_SESSION['nu_termo'] = $nu_termo;
		$_SESSION['nu_cep'] = $nu_cep;
		header ("location: aluno_termo.php");
		
		} else if ( $nu_termo != "" && !is_numeric($nu_termo) ){
		$msg_excessao = "Termo: Somente números";
		$_SESSION['msg_excessao'] = $msg_excessao;
		$_SESSION['nu_termo'] = $nu_termo;
		$_SESSION['nu_cep'] = $nu_cep;
		
		header ("location: aluno_termo.php");
		
		} else if ( $persistence->lookupAluno($nu_termo) ){
		$msg_excessao = "Aluno já cadastrado";
		$_SESSION['msg_excessao'] = $msg_excessao;
		$_SESSION['nu_termo'] = $nu_termo;
		$_SESSION['nu_cep'] = $nu_cep;
		
		header ("location: aluno_termo.php");
		
		} else if ( $nu_cep == ""){
		$msg_excessao = "CEP: Preenchimento obrigatório";
		$_SESSION['msg_excessao'] = $msg_excessao;
		$_SESSION['nu_termo'] = $nu_termo;
		$_SESSION['nu_cep'] = $nu_cep;
		header ("location: aluno_termo.php");
		
		} else if ( strlen($nu_cep) < 8){
		$msg_excessao = "CEP: tamanho inválido";
		$_SESSION['msg_excessao'] = $msg_excessao;
		$_SESSION['nu_termo'] = $nu_termo;
		$_SESSION['nu_cep'] = $nu_cep;
		header ("location: aluno_termo.php");		
				
		} else if (($nu_cep != "") && (!is_numeric($nu_cep))){
		$msg_excessao = "CEP: caracteres não aceito";
		$_SESSION['msg_excessao'] = $msg_excessao;
		$_SESSION['nu_termo'] = $nu_termo;
		$_SESSION['nu_cep'] = $nu_cep;
		header ("location: aluno_termo.php");
		
		} else {
		
		$_SESSION['nu_termo'] = $nu_termo;
		$_SESSION['nu_cep'] = $nu_cep;
		header ("location: aluno.php");
	}
	}
	
if ( isset($_GET['abrirAluno']) ) {
				
		unset($_SESSION['msg_sucesso']);
		unset($_SESSION['msg_excessao']);
		
			
		header ("location: aluno.php");
	}
	


if ( isset($_POST['inserirAluno']) ) {
				
		unset($_SESSION['msg_sucesso']);
		unset($_SESSION['msg_excessao']);
		
		$nu_termo = addslashes($_POST['nu_termo']);
		$id_religiao = addslashes($_POST['id_religiao']);
		$nm_religiao = addslashes($_POST['nm_religiao']);
		$nm_aluno = trim(addslashes($_POST['nm_aluno']));
		$nm_aluno = strtoupper($nm_aluno);
		$id_sexo = addslashes($_POST['id_sexo']);
		$nm_sexo = addslashes($_POST['nm_sexo']);
		$dia = addslashes($_POST['dia']);
		$mes = addslashes($_POST['mes']);
		$id_ano = addslashes($_POST['id_ano']);
		$nu_ano = addslashes($_POST['nu_ano']);
		$dt_nascimento = $dia."/".$mes."/".$id_ano ;
		$dt_cadastro = addslashes($_POST['dt_cadastro']);
		$nm_mae = addslashes($_POST['nm_mae']);
		$nm_mae = strtoupper($nm_mae);
		$te_profissao_mae = addslashes($_POST['te_profissao_mae']);
		$te_profissao_pai = addslashes($_POST['te_profissao_pai']);
		$id_analgesico = addslashes($_POST['id_analgesico']);
		$nm_analgesico = addslashes($_POST['nm_analgesico']);		
		$nu_telefone_mae = addslashes($_POST['nu_telefone_mae']);
		$nm_trabalho_mae = addslashes($_POST['nm_trabalho_mae']);		
		$nm_pai = addslashes($_POST['nm_pai']);
		$nm_pai = strtoupper($nm_pai);
		$nu_telefone_pai = addslashes($_POST['nu_telefone_pai']);
		$nm_trabalho_pai = addslashes($_POST['nm_trabalho_pai']);		
		$nm_logra = addslashes($_POST['nm_logra']);
		$nm_logra = strtoupper($nm_logra);
		$nm_compl = addslashes($_POST['nm_compl']);
		$nu_logra = addslashes($_POST['nu_logra']);		
		$te_email = addslashes($_POST['te_email']);
		$nm_acidente = addslashes($_POST['nm_acidente']);		
		$nm_alergia = addslashes($_POST['nm_alergia']);		
		$nm_restricao = addslashes($_POST['nm_restricao']);		
		$nm_doenca = addslashes($_POST['nm_doenca']);		
		$nm_plano = addslashes($_POST['nm_plano']);		
		$in_emergencia = addslashes($_POST['in_emergencia']);
		$in_emergencia == "" ? $in_emergencia = 0 : $in_emergencia = 1;
		$nm_emergencia = addslashes($_POST['nm_emergencia']);		
		$in_antigo = addslashes($_POST['in_antigo']);
		$nm_bairro = addslashes($_POST['nm_bairro']);
		$nm_bairro = strtoupper($nm_bairro);
		$nu_cep = addslashes($_POST['nu_cep']);
		$nm_cidade = addslashes($_POST['nm_cidade']);
		$nm_cidade = strtoupper($nm_cidade);
		$nm_uf = addslashes($_POST['nm_uf']);
		$te_obs = addslashes($_POST['te_obs']);
		$upload  = $_FILES['upload'];
		$te_imagem = addslashes($_POST['te_imagem']);
		//$te_imagem == "" ? $te_imagem = "img_masc.jpg" : $te_imagem = $te_imagem;
		/*if ( ($te_imagem == "") && ($id_sexo == "M") ){
		$te_imagem = "img_fem.jpg";
		} else {
		$te_imagem = "img_fem.jpg";
		}*/
	
		$upextensao['extensoes'] = array('pdf','jpg');
		$extensao = strtolower(end(explode('.', $_FILES['upload']['name'])));
		$uptamanho['tamanho'] = 2097152; // 2Mb
		
		$imagem = $_FILES["upload"]["name"]; //pega o nome do arquivo
   		$temp_imagem = $_FILES["upload"]["tmp_name"]; //pega o "temp" do arquivo
   		$tipo = $_FILES["upload"]["type"]; //pega o tipo do arquivo
   		$tamanho = $_FILES["upload"]["size"]; //pega o tamanho do arquivo
   		$t_maximo = 2000000; //tamanho máximo do arquivo - em bytes
   		$uploaddir = 'fotos/';
		$uploadfile = $uploaddir . $_FILES['upload']['name'];
		
		$imagem = isset($_FILES['upload']) ? $_FILES['upload'] : FALSE;
		
		if ($imagem == ""){
		$msg_excessao = "Escolha um arquivo á ser enviado";
		$_SESSION['msg_excessao'] = $msg_excessao;
		$_SESSION['nu_termo'] = $nu_termo;
		$_SESSION['in_antigo'] = $in_antigo;
		$_SESSION['in_emergencia'] = $in_emergencia;
		$_SESSION['id_religiao'] = $id_religiao;
		$_SESSION['nm_religiao'] = $nm_religiao;
		$_SESSION['nm_aluno'] = $nm_aluno;
		$_SESSION['id_sexo'] = $id_sexo;
		$_SESSION['nm_sexo'] = $nm_sexo;
		$_SESSION['dia'] = $dia;
		$_SESSION['mes'] = $mes;
		$_SESSION['id_ano'] = $id_ano;
		$_SESSION['nu_ano'] = $nu_ano;
		$_SESSION['dt_cadastro'] = $dt_cadastro;
		$_SESSION['nm_mae'] = $nm_mae;
		$_SESSION['te_profissao_pai'] = $te_profissao_pai;
		$_SESSION['te_profissao_mae'] = $te_profissao_mae;
		$_SESSION['id_analgesico'] = $id_analgesico;
		$_SESSION['nm_analgesico'] = $nm_analgesico;
		$_SESSION['nu_telefone_mae'] = $nu_telefone_mae;
		$_SESSION['nm_trabalho_mae'] = $nm_trabalho_mae;
		$_SESSION['nm_pai'] = $nm_pai;
		$_SESSION['nu_telefone_pai'] = $nu_telefone_pai;
		$_SESSION['nm_trabalho_pai'] = $nm_trabalho_pai;		
		$_SESSION['nm_emergencia'] = $nm_emergencia;
		$_SESSION['nm_acidente'] = $nm_acidente;
		$_SESSION['nm_alergia'] = $nm_alergia;
		$_SESSION['nm_restricao'] = $nm_restricao;
		$_SESSION['nm_doenca'] = $nm_doenca;
		$_SESSION['nm_plano'] = $nm_plano;				
		$_SESSION['nm_logra'] = $nm_logra;
		$_SESSION['nm_compl'] = $nm_compl;
		$_SESSION['nu_logra'] = $nu_logra;
		$_SESSION['nu_tel'] = $nu_tel;
		$_SESSION['te_email'] = $te_email;
		$_SESSION['nm_bairro'] = $nm_bairro;
		$_SESSION['nu_cep'] = $nu_cep;
		$_SESSION['nm_cidade'] = $nm_cidade;
		$_SESSION['nm_uf'] = $nm_uf;
		header ("location: aluno.php");
		
		} else if ( ereg("[][><}{)(:;,!?*%&#@]", $imagem) ){
		$msg_excessao = "O nome do arquivo contém caracteres inválidos";
		$_SESSION['msg_excessao'] = $msg_excessao;
		$_SESSION['nu_termo'] = $nu_termo;
		$_SESSION['in_antigo'] = $in_antigo;
		$_SESSION['in_emergencia'] = $in_emergencia;
		$_SESSION['id_religiao'] = $id_religiao;
		$_SESSION['nm_religiao'] = $nm_religiao;		
		$_SESSION['nm_aluno'] = $nm_aluno;
		$_SESSION['id_sexo'] = $id_sexo;
		$_SESSION['nm_sexo'] = $nm_sexo;
		$_SESSION['dia'] = $dia;
		$_SESSION['mes'] = $mes;
		$_SESSION['id_ano'] = $id_ano;
		$_SESSION['nu_ano'] = $nu_ano;
		$_SESSION['dt_cadastro'] = $dt_cadastro;
		$_SESSION['nm_mae'] = $nm_mae;
		$_SESSION['te_profissao_pai'] = $te_profissao_pai;
		$_SESSION['te_profissao_mae'] = $te_profissao_mae;
		$_SESSION['id_analgesico'] = $id_analgesico;
		$_SESSION['nm_analgesico'] = $nm_analgesico;
		$_SESSION['nu_telefone_mae'] = $nu_telefone_mae;
		$_SESSION['nm_trabalho_mae'] = $nm_trabalho_mae;
		$_SESSION['nm_pai'] = $nm_pai;
		$_SESSION['nu_telefone_pai'] = $nu_telefone_pai;
		$_SESSION['nm_trabalho_pai'] = $nm_trabalho_pai;		
		$_SESSION['nm_emergencia'] = $nm_emergencia;
		$_SESSION['nm_acidente'] = $nm_acidente;
		$_SESSION['nm_alergia'] = $nm_alergia;
		$_SESSION['nm_restricao'] = $nm_restricao;
		$_SESSION['nm_doenca'] = $nm_doenca;
		$_SESSION['nm_plano'] = $nm_plano;				
		$_SESSION['nm_logra'] = $nm_logra;
		$_SESSION['nm_compl'] = $nm_compl;
		$_SESSION['nu_logra'] = $nu_logra;
		$_SESSION['nu_tel'] = $nu_tel;
		$_SESSION['te_email'] = $te_email;
		$_SESSION['nm_bairro'] = $nm_bairro;
		$_SESSION['nu_cep'] = $nu_cep;
		$_SESSION['nm_cidade'] = $nm_cidade;
		$_SESSION['nm_uf'] = $nm_uf;
		header ("location: aluno.php");
		
		} else if ( $tamanho > $t_maximo ){
		$msg_excessao = "O tamanho máximo permitido é de 2MB";
		$_SESSION['msg_excessao'] = $msg_excessao;
		$_SESSION['nu_termo'] = $nu_termo;
		$_SESSION['in_antigo'] = $in_antigo;
		$_SESSION['in_emergencia'] = $in_emergencia;
		$_SESSION['id_religiao'] = $id_religiao;
		$_SESSION['nm_religiao'] = $nm_religiao;
		$_SESSION['nm_aluno'] = $nm_aluno;
		$_SESSION['id_sexo'] = $id_sexo;
		$_SESSION['nm_sexo'] = $nm_sexo;
		$_SESSION['dia'] = $dia;
		$_SESSION['mes'] = $mes;
		$_SESSION['id_ano'] = $id_ano;
		$_SESSION['nu_ano'] = $nu_ano;
		$_SESSION['dt_cadastro'] = $dt_cadastro;
		$_SESSION['nm_mae'] = $nm_mae;
		$_SESSION['te_profissao_pai'] = $te_profissao_pai;
		$_SESSION['te_profissao_mae'] = $te_profissao_mae;
		$_SESSION['id_analgesico'] = $id_analgesico;
		$_SESSION['nm_analgesico'] = $nm_analgesico;
		$_SESSION['nu_telefone_mae'] = $nu_telefone_mae;
		$_SESSION['nm_trabalho_mae'] = $nm_trabalho_mae;
		$_SESSION['nm_pai'] = $nm_pai;
		$_SESSION['nu_telefone_pai'] = $nu_telefone_pai;
		$_SESSION['nm_trabalho_pai'] = $nm_trabalho_pai;		
		$_SESSION['nm_emergencia'] = $nm_emergencia;
		$_SESSION['nm_acidente'] = $nm_acidente;
		$_SESSION['nm_alergia'] = $nm_alergia;
		$_SESSION['nm_restricao'] = $nm_restricao;
		$_SESSION['nm_doenca'] = $nm_doenca;
		$_SESSION['nm_plano'] = $nm_plano;				
		$_SESSION['nm_logra'] = $nm_logra;
		$_SESSION['nm_compl'] = $nm_compl;
		$_SESSION['nu_logra'] = $nu_logra;
		$_SESSION['nu_tel'] = $nu_tel;
		$_SESSION['te_email'] = $te_email;
		$_SESSION['nm_bairro'] = $nm_bairro;
		$_SESSION['nu_cep'] = $nu_cep;
		$_SESSION['nm_cidade'] = $nm_cidade;
		$_SESSION['nm_uf'] = $nm_uf;
		header ("location: aluno.php");
		
		} else if ( $tamanho > $t_maximo ){
		$msg_excessao = "O tamanho máximo permitido é de 2MB";
		$_SESSION['msg_excessao'] = $msg_excessao;
		$_SESSION['nu_termo'] = $nu_termo;
		$_SESSION['in_antigo'] = $in_antigo;
		$_SESSION['in_emergencia'] = $in_emergencia;
		$_SESSION['id_religiao'] = $id_religiao;
		$_SESSION['nm_religiao'] = $nm_religiao;
		$_SESSION['nm_aluno'] = $nm_aluno;
		$_SESSION['id_sexo'] = $id_sexo;
		$_SESSION['nm_sexo'] = $nm_sexo;
		$_SESSION['dia'] = $dia;
		$_SESSION['mes'] = $mes;
		$_SESSION['id_ano'] = $id_ano;
		$_SESSION['nu_ano'] = $nu_ano;
		$_SESSION['dt_cadastro'] = $dt_cadastro;
		$_SESSION['nm_mae'] = $nm_mae;
		$_SESSION['te_profissao_pai'] = $te_profissao_pai;
		$_SESSION['te_profissao_mae'] = $te_profissao_mae;
		$_SESSION['id_analgesico'] = $id_analgesico;
		$_SESSION['nm_analgesico'] = $nm_analgesico;
		$_SESSION['nu_telefone_mae'] = $nu_telefone_mae;
		$_SESSION['nm_trabalho_mae'] = $nm_trabalho_mae;
		$_SESSION['nm_pai'] = $nm_pai;
		$_SESSION['nu_telefone_pai'] = $nu_telefone_pai;
		$_SESSION['nm_trabalho_pai'] = $nm_trabalho_pai;		
		$_SESSION['nm_emergencia'] = $nm_emergencia;
		$_SESSION['nm_acidente'] = $nm_acidente;
		$_SESSION['nm_alergia'] = $nm_alergia;
		$_SESSION['nm_restricao'] = $nm_restricao;
		$_SESSION['nm_doenca'] = $nm_doenca;
		$_SESSION['nm_plano'] = $nm_plano;				
		$_SESSION['nm_logra'] = $nm_logra;
		$_SESSION['nm_compl'] = $nm_compl;
		$_SESSION['nu_logra'] = $nu_logra;
		$_SESSION['nu_tel'] = $nu_tel;
		$_SESSION['te_email'] = $te_email;
		$_SESSION['nm_bairro'] = $nm_bairro;
		$_SESSION['nu_cep'] = $nu_cep;
		$_SESSION['nm_cidade'] = $nm_cidade;
		$_SESSION['nm_uf'] = $nm_uf;
		header ("location: aluno.php");
		
		} else if ( ($te_imagem != "") && (!eregi("[gif|jpeg|jpg]", $tipo)) ){
		$msg_excessao = "Tipo de arquivo inválido";
		$_SESSION['msg_excessao'] = $msg_excessao;
		$_SESSION['nu_termo'] = $nu_termo;
		$_SESSION['in_antigo'] = $in_antigo;
		$_SESSION['in_emergencia'] = $in_emergencia;
		$_SESSION['id_religiao'] = $id_religiao;
		$_SESSION['nm_religiao'] = $nm_religiao;
		$_SESSION['nm_aluno'] = $nm_aluno;
		$_SESSION['id_sexo'] = $id_sexo;
		$_SESSION['nm_sexo'] = $nm_sexo;
		$_SESSION['dia'] = $dia;
		$_SESSION['mes'] = $mes;
		$_SESSION['id_ano'] = $id_ano;
		$_SESSION['nu_ano'] = $nu_ano;
		$_SESSION['dt_cadastro'] = $dt_cadastro;
		$_SESSION['nm_mae'] = $nm_mae;
		$_SESSION['te_profissao_pai'] = $te_profissao_pai;
		$_SESSION['te_profissao_mae'] = $te_profissao_mae;
		$_SESSION['id_analgesico'] = $id_analgesico;
		$_SESSION['nm_analgesico'] = $nm_analgesico;
		$_SESSION['nu_telefone_mae'] = $nu_telefone_mae;
		$_SESSION['nm_trabalho_mae'] = $nm_trabalho_mae;
		$_SESSION['nm_pai'] = $nm_pai;
		$_SESSION['nu_telefone_pai'] = $nu_telefone_pai;
		$_SESSION['nm_trabalho_pai'] = $nm_trabalho_pai;		
		$_SESSION['nm_emergencia'] = $nm_emergencia;
		$_SESSION['nm_acidente'] = $nm_acidente;
		$_SESSION['nm_alergia'] = $nm_alergia;
		$_SESSION['nm_restricao'] = $nm_restricao;
		$_SESSION['nm_doenca'] = $nm_doenca;
		$_SESSION['nm_plano'] = $nm_plano;				
		$_SESSION['nm_logra'] = $nm_logra;
		$_SESSION['nm_compl'] = $nm_compl;
		$_SESSION['nu_logra'] = $nu_logra;
		$_SESSION['nu_tel'] = $nu_tel;
		$_SESSION['te_email'] = $te_email;
		$_SESSION['nm_bairro'] = $nm_bairro;
		$_SESSION['nu_cep'] = $nu_cep;
		$_SESSION['nm_cidade'] = $nm_cidade;
		$_SESSION['nm_uf'] = $nm_uf;
		header ("location: aluno.php");
		
		} else if ( is_dir($imagem) ){
		$msg_excessao = "Selecione um <u>arquivo</u> á ser enviado";
		$_SESSION['msg_excessao'] = $msg_excessao;
		$_SESSION['nu_termo'] = $nu_termo;
		$_SESSION['in_antigo'] = $in_antigo;
		$_SESSION['in_emergencia'] = $in_emergencia;
		$_SESSION['id_religiao'] = $id_religiao;
		$_SESSION['nm_religiao'] = $nm_religiao;
		$_SESSION['nm_aluno'] = $nm_aluno;
		$_SESSION['id_sexo'] = $id_sexo;
		$_SESSION['nm_sexo'] = $nm_sexo;
		$_SESSION['dia'] = $dia;
		$_SESSION['mes'] = $mes;
		$_SESSION['id_ano'] = $id_ano;
		$_SESSION['nu_ano'] = $nu_ano;
		$_SESSION['dt_cadastro'] = $dt_cadastro;
		$_SESSION['nm_mae'] = $nm_mae;
		$_SESSION['te_profissao_pai'] = $te_profissao_pai;
		$_SESSION['te_profissao_mae'] = $te_profissao_mae;
		$_SESSION['id_analgesico'] = $id_analgesico;
		$_SESSION['nm_analgesico'] = $nm_analgesico;
		$_SESSION['nu_telefone_mae'] = $nu_telefone_mae;
		$_SESSION['nm_trabalho_mae'] = $nm_trabalho_mae;
		$_SESSION['nm_pai'] = $nm_pai;
		$_SESSION['nu_telefone_pai'] = $nu_telefone_pai;
		$_SESSION['nm_trabalho_pai'] = $nm_trabalho_pai;		
		$_SESSION['nm_emergencia'] = $nm_emergencia;
		$_SESSION['nm_acidente'] = $nm_acidente;
		$_SESSION['nm_alergia'] = $nm_alergia;
		$_SESSION['nm_restricao'] = $nm_restricao;
		$_SESSION['nm_doenca'] = $nm_doenca;
		$_SESSION['nm_plano'] = $nm_plano;				
		$_SESSION['nm_logra'] = $nm_logra;
		$_SESSION['nm_compl'] = $nm_compl;
		$_SESSION['nu_logra'] = $nu_logra;
		$_SESSION['nu_tel'] = $nu_tel;
		$_SESSION['te_email'] = $te_email;
		$_SESSION['nm_bairro'] = $nm_bairro;
		$_SESSION['nu_cep'] = $nu_cep;
		$_SESSION['nm_cidade'] = $nm_cidade;
		$_SESSION['nm_uf'] = $nm_uf;
		header ("location: aluno.php");
		
		} else if ( file_exists("$uploaddir"."$imagem") ){
		$msg_excessao = "Já existe um arquivo com este nome $imagem, por favor, renomeie-o";
		$_SESSION['msg_excessao'] = $msg_excessao;
		$_SESSION['nu_termo'] = $nu_termo;
		$_SESSION['in_antigo'] = $in_antigo;
		$_SESSION['in_emergencia'] = $in_emergencia;
		$_SESSION['id_religiao'] = $id_religiao;
		$_SESSION['nm_religiao'] = $nm_religiao;
		$_SESSION['nm_aluno'] = $nm_aluno;
		$_SESSION['id_sexo'] = $id_sexo;
		$_SESSION['nm_sexo'] = $nm_sexo;
		$_SESSION['dia'] = $dia;
		$_SESSION['mes'] = $mes;
		$_SESSION['id_ano'] = $id_ano;
		$_SESSION['nu_ano'] = $nu_ano;
		$_SESSION['dt_cadastro'] = $dt_cadastro;
		$_SESSION['nm_mae'] = $nm_mae;
		$_SESSION['te_profissao_pai'] = $te_profissao_pai;
		$_SESSION['te_profissao_mae'] = $te_profissao_mae;
		$_SESSION['id_analgesico'] = $id_analgesico;
		$_SESSION['nm_analgesico'] = $nm_analgesico;
		$_SESSION['nu_telefone_mae'] = $nu_telefone_mae;
		$_SESSION['nm_trabalho_mae'] = $nm_trabalho_mae;
		$_SESSION['nm_pai'] = $nm_pai;
		$_SESSION['nu_telefone_pai'] = $nu_telefone_pai;
		$_SESSION['nm_trabalho_pai'] = $nm_trabalho_pai;		
		$_SESSION['nm_emergencia'] = $nm_emergencia;
		$_SESSION['nm_acidente'] = $nm_acidente;
		$_SESSION['nm_alergia'] = $nm_alergia;
		$_SESSION['nm_restricao'] = $nm_restricao;
		$_SESSION['nm_doenca'] = $nm_doenca;
		$_SESSION['nm_plano'] = $nm_plano;				
		$_SESSION['nm_logra'] = $nm_logra;
		$_SESSION['nm_compl'] = $nm_compl;
		$_SESSION['nu_logra'] = $nu_logra;
		$_SESSION['nu_tel'] = $nu_tel;
		$_SESSION['te_email'] = $te_email;
		$_SESSION['nm_bairro'] = $nm_bairro;
		$_SESSION['nu_cep'] = $nu_cep;
		$_SESSION['nm_cidade'] = $nm_cidade;
		$_SESSION['nm_uf'] = $nm_uf;
		header ("location: aluno.php");												
				
		} else if ( $id_religiao == 0 ){
		$msg_excessao = "Religião: Preenchimento obrigatório";
		$_SESSION['msg_excessao'] = $msg_excessao;
		$_SESSION['nu_termo'] = $nu_termo;
		$_SESSION['in_antigo'] = $in_antigo;
		$_SESSION['in_emergencia'] = $in_emergencia;
		$_SESSION['id_religiao'] = $id_religiao;
		$_SESSION['nm_religiao'] = $nm_religiao;
		$_SESSION['nm_aluno'] = $nm_aluno;
		$_SESSION['id_sexo'] = $id_sexo;
		$_SESSION['nm_sexo'] = $nm_sexo;
		$_SESSION['dia'] = $dia;
		$_SESSION['mes'] = $mes;
		$_SESSION['id_ano'] = $id_ano;
		$_SESSION['nu_ano'] = $nu_ano;
		$_SESSION['dt_cadastro'] = $dt_cadastro;
		$_SESSION['nm_mae'] = $nm_mae;
		$_SESSION['te_profissao_pai'] = $te_profissao_pai;
		$_SESSION['te_profissao_mae'] = $te_profissao_mae;
		$_SESSION['id_analgesico'] = $id_analgesico;
		$_SESSION['nm_analgesico'] = $nm_analgesico;
		$_SESSION['nu_telefone_mae'] = $nu_telefone_mae;
		$_SESSION['nm_trabalho_mae'] = $nm_trabalho_mae;
		$_SESSION['nm_pai'] = $nm_pai;
		$_SESSION['nu_telefone_pai'] = $nu_telefone_pai;
		$_SESSION['nm_trabalho_pai'] = $nm_trabalho_pai;		
		$_SESSION['nm_emergencia'] = $nm_emergencia;
		$_SESSION['nm_acidente'] = $nm_acidente;
		$_SESSION['nm_alergia'] = $nm_alergia;
		$_SESSION['nm_restricao'] = $nm_restricao;
		$_SESSION['nm_doenca'] = $nm_doenca;
		$_SESSION['nm_plano'] = $nm_plano;				
		$_SESSION['nm_logra'] = $nm_logra;
		$_SESSION['nm_compl'] = $nm_compl;
		$_SESSION['nu_logra'] = $nu_logra;
		$_SESSION['nu_tel'] = $nu_tel;
		$_SESSION['te_email'] = $te_email;
		$_SESSION['nm_bairro'] = $nm_bairro;
		$_SESSION['nu_cep'] = $nu_cep;
		$_SESSION['nm_cidade'] = $nm_cidade;
		$_SESSION['nm_uf'] = $nm_uf;
		header ("location: aluno.php");
		
		} else if ( $nm_aluno == "" ){
		$msg_excessao = "Nome: Preenchimento obrigatório";
		$_SESSION['msg_excessao'] = $msg_excessao;
		$_SESSION['nu_termo'] = $nu_termo;
		$_SESSION['in_antigo'] = $in_antigo;
		$_SESSION['in_emergencia'] = $in_emergencia;
		$_SESSION['id_religiao'] = $id_religiao;
		$_SESSION['nm_religiao'] = $nm_religiao;
		$_SESSION['nm_aluno'] = $nm_aluno;
		$_SESSION['id_sexo'] = $id_sexo;
		$_SESSION['nm_sexo'] = $nm_sexo;
		$_SESSION['dia'] = $dia;
		$_SESSION['mes'] = $mes;
		$_SESSION['id_ano'] = $id_ano;
		$_SESSION['nu_ano'] = $nu_ano;
		$_SESSION['dt_cadastro'] = $dt_cadastro;
		$_SESSION['nm_mae'] = $nm_mae;
		$_SESSION['te_profissao_pai'] = $te_profissao_pai;
		$_SESSION['te_profissao_mae'] = $te_profissao_mae;
		$_SESSION['id_analgesico'] = $id_analgesico;
		$_SESSION['nm_analgesico'] = $nm_analgesico;
		$_SESSION['nu_telefone_mae'] = $nu_telefone_mae;
		$_SESSION['nm_trabalho_mae'] = $nm_trabalho_mae;
		$_SESSION['nm_pai'] = $nm_pai;
		$_SESSION['nu_telefone_pai'] = $nu_telefone_pai;
		$_SESSION['nm_trabalho_pai'] = $nm_trabalho_pai;		
		$_SESSION['nm_emergencia'] = $nm_emergencia;
		$_SESSION['nm_acidente'] = $nm_acidente;
		$_SESSION['nm_alergia'] = $nm_alergia;
		$_SESSION['nm_restricao'] = $nm_restricao;
		$_SESSION['nm_doenca'] = $nm_doenca;
		$_SESSION['nm_plano'] = $nm_plano;				
		$_SESSION['nm_logra'] = $nm_logra;
		$_SESSION['nm_compl'] = $nm_compl;
		$_SESSION['nu_logra'] = $nu_logra;
		$_SESSION['nu_tel'] = $nu_tel;
		$_SESSION['te_email'] = $te_email;
		$_SESSION['nm_bairro'] = $nm_bairro;
		$_SESSION['nu_cep'] = $nu_cep;
		$_SESSION['nm_cidade'] = $nm_cidade;
		$_SESSION['nm_uf'] = $nm_uf;
		header ("location: aluno.php");
						
		} else if ( $id_sexo == "" ){
		$msg_excessao = "Sexo: Preenchimento obrigatório";
		$_SESSION['msg_excessao'] = $msg_excessao;
		$_SESSION['nu_termo'] = $nu_termo;
		$_SESSION['in_antigo'] = $in_antigo;
		$_SESSION['in_emergencia'] = $in_emergencia;
		$_SESSION['id_religiao'] = $id_religiao;
		$_SESSION['nm_religiao'] = $nm_religiao;
		$_SESSION['nm_aluno'] = $nm_aluno;
		$_SESSION['id_sexo'] = $id_sexo;
		$_SESSION['nm_sexo'] = $nm_sexo;
		$_SESSION['dia'] = $dia;
		$_SESSION['mes'] = $mes;
		$_SESSION['id_ano'] = $id_ano;
		$_SESSION['nu_ano'] = $nu_ano;
		$_SESSION['dt_cadastro'] = $dt_cadastro;
		$_SESSION['nm_mae'] = $nm_mae;
		$_SESSION['te_profissao_pai'] = $te_profissao_pai;
		$_SESSION['te_profissao_mae'] = $te_profissao_mae;
		$_SESSION['id_analgesico'] = $id_analgesico;
		$_SESSION['nm_analgesico'] = $nm_analgesico;
		$_SESSION['nu_telefone_mae'] = $nu_telefone_mae;
		$_SESSION['nm_trabalho_mae'] = $nm_trabalho_mae;
		$_SESSION['nm_pai'] = $nm_pai;
		$_SESSION['id_profissao_pai'] = $id_profissao_pai;
		$_SESSION['nm_profissao_pai'] = $nm_profissao_pai;
		$_SESSION['nu_telefone_pai'] = $nu_telefone_pai;
		$_SESSION['nm_trabalho_pai'] = $nm_trabalho_pai;		
		$_SESSION['nm_emergencia'] = $nm_emergencia;
		$_SESSION['nm_acidente'] = $nm_acidente;
		$_SESSION['nm_alergia'] = $nm_alergia;
		$_SESSION['nm_restricao'] = $nm_restricao;
		$_SESSION['nm_doenca'] = $nm_doenca;
		$_SESSION['nm_plano'] = $nm_plano;				
		$_SESSION['nm_logra'] = $nm_logra;
		$_SESSION['nm_compl'] = $nm_compl;
		$_SESSION['nu_logra'] = $nu_logra;
		$_SESSION['nu_tel'] = $nu_tel;
		$_SESSION['te_email'] = $te_email;
		$_SESSION['nm_bairro'] = $nm_bairro;
		$_SESSION['nu_cep'] = $nu_cep;
		$_SESSION['nm_cidade'] = $nm_cidade;
		$_SESSION['nm_uf'] = $nm_uf;
		header ("location: aluno.php");
		
		} else if ( ($dia == "") || ($mes == "") || ($id_ano == "") ){
		$msg_excessao = "Nascimento: Preenchimento obrigatório";
		$_SESSION['msg_excessao'] = $msg_excessao;
		$_SESSION['nu_termo'] = $nu_termo;
		$_SESSION['in_antigo'] = $in_antigo;
		$_SESSION['in_emergencia'] = $in_emergencia;
		$_SESSION['id_religiao'] = $id_religiao;
		$_SESSION['nm_religiao'] = $nm_religiao;
		$_SESSION['nm_aluno'] = $nm_aluno;
		$_SESSION['id_sexo'] = $id_sexo;
		$_SESSION['nm_sexo'] = $nm_sexo;
		$_SESSION['dia'] = $dia;
		$_SESSION['mes'] = $mes;
		$_SESSION['id_ano'] = $id_ano;
		$_SESSION['nu_ano'] = $nu_ano;
		$_SESSION['dt_cadastro'] = $dt_cadastro;
		$_SESSION['nm_mae'] = $nm_mae;
		$_SESSION['te_profissao_pai'] = $te_profissao_pai;
		$_SESSION['te_profissao_mae'] = $te_profissao_mae;
		$_SESSION['id_analgesico'] = $id_analgesico;
		$_SESSION['nm_analgesico'] = $nm_analgesico;
		$_SESSION['nu_telefone_mae'] = $nu_telefone_mae;
		$_SESSION['nm_trabalho_mae'] = $nm_trabalho_mae;
		$_SESSION['nm_pai'] = $nm_pai;
		$_SESSION['nu_telefone_pai'] = $nu_telefone_pai;
		$_SESSION['nm_trabalho_pai'] = $nm_trabalho_pai;		
		$_SESSION['nm_emergencia'] = $nm_emergencia;
		$_SESSION['nm_acidente'] = $nm_acidente;
		$_SESSION['nm_alergia'] = $nm_alergia;
		$_SESSION['nm_restricao'] = $nm_restricao;
		$_SESSION['nm_doenca'] = $nm_doenca;
		$_SESSION['nm_plano'] = $nm_plano;				
		$_SESSION['nm_logra'] = $nm_logra;
		$_SESSION['nm_compl'] = $nm_compl;
		$_SESSION['nu_logra'] = $nu_logra;
		$_SESSION['nu_tel'] = $nu_tel;
		$_SESSION['te_email'] = $te_email;
		$_SESSION['nm_bairro'] = $nm_bairro;
		$_SESSION['nu_cep'] = $nu_cep;
		$_SESSION['nm_cidade'] = $nm_cidade;
		$_SESSION['nm_uf'] = $nm_uf;
		header ("location: aluno.php");
		
		} else if ( ($id_ano%4!=0) && ($dia == "29")  ){
		$msg_excessao = "Nascimento: Preenchimento inválido";
		$_SESSION['msg_excessao'] = $msg_excessao;
		$_SESSION['nu_termo'] = $nu_termo;
		$_SESSION['in_antigo'] = $in_antigo;
		$_SESSION['in_emergencia'] = $in_emergencia;
		$_SESSION['id_religiao'] = $id_religiao;
		$_SESSION['nm_religiao'] = $nm_religiao;
		$_SESSION['nm_aluno'] = $nm_aluno;
		$_SESSION['id_sexo'] = $id_sexo;
		$_SESSION['nm_sexo'] = $nm_sexo;
		$_SESSION['dia'] = $dia;
		$_SESSION['mes'] = $mes;
		$_SESSION['id_ano'] = $id_ano;
		$_SESSION['nu_ano'] = $nu_ano;
		$_SESSION['dt_cadastro'] = $dt_cadastro;
		$_SESSION['nm_mae'] = $nm_mae;
		$_SESSION['te_profissao_pai'] = $te_profissao_pai;
		$_SESSION['te_profissao_mae'] = $te_profissao_mae;
		$_SESSION['id_analgesico'] = $id_analgesico;
		$_SESSION['nm_analgesico'] = $nm_analgesico;
		$_SESSION['nu_telefone_mae'] = $nu_telefone_mae;
		$_SESSION['nm_trabalho_mae'] = $nm_trabalho_mae;
		$_SESSION['nm_pai'] = $nm_pai;
		$_SESSION['nu_telefone_pai'] = $nu_telefone_pai;
		$_SESSION['nm_trabalho_pai'] = $nm_trabalho_pai;		
		$_SESSION['nm_emergencia'] = $nm_emergencia;
		$_SESSION['nm_acidente'] = $nm_acidente;
		$_SESSION['nm_alergia'] = $nm_alergia;
		$_SESSION['nm_restricao'] = $nm_restricao;
		$_SESSION['nm_doenca'] = $nm_doenca;
		$_SESSION['nm_plano'] = $nm_plano;				
		$_SESSION['nm_logra'] = $nm_logra;
		$_SESSION['nm_compl'] = $nm_compl;
		$_SESSION['nu_logra'] = $nu_logra;
		$_SESSION['nu_tel'] = $nu_tel;
		$_SESSION['te_email'] = $te_email;
		$_SESSION['nm_bairro'] = $nm_bairro;
		$_SESSION['nu_cep'] = $nu_cep;
		$_SESSION['nm_cidade'] = $nm_cidade;
		$_SESSION['nm_uf'] = $nm_uf;
		header ("location: aluno.php");
		
		} else if ( ($mes == "02") && ($dia == 30) ){
		$msg_excessao = "Nascimento: Preenchimento inválido";
		$_SESSION['msg_excessao'] = $msg_excessao;
		$_SESSION['nu_termo'] = $nu_termo;
		$_SESSION['in_antigo'] = $in_antigo;
		$_SESSION['in_emergencia'] = $in_emergencia;
		$_SESSION['id_religiao'] = $id_religiao;
		$_SESSION['nm_religiao'] = $nm_religiao;
		$_SESSION['nm_aluno'] = $nm_aluno;
		$_SESSION['id_sexo'] = $id_sexo;
		$_SESSION['nm_sexo'] = $nm_sexo;
		$_SESSION['dia'] = $dia;
		$_SESSION['mes'] = $mes;
		$_SESSION['id_ano'] = $id_ano;
		$_SESSION['nu_ano'] = $nu_ano;
		$_SESSION['dt_cadastro'] = $dt_cadastro;
		$_SESSION['nm_mae'] = $nm_mae;
		$_SESSION['te_profissao_pai'] = $te_profissao_pai;
		$_SESSION['te_profissao_mae'] = $te_profissao_mae;
		$_SESSION['id_analgesico'] = $id_analgesico;
		$_SESSION['nm_analgesico'] = $nm_analgesico;
		$_SESSION['nu_telefone_mae'] = $nu_telefone_mae;
		$_SESSION['nm_trabalho_mae'] = $nm_trabalho_mae;
		$_SESSION['nm_pai'] = $nm_pai;
		$_SESSION['nu_telefone_pai'] = $nu_telefone_pai;
		$_SESSION['nm_trabalho_pai'] = $nm_trabalho_pai;		
		$_SESSION['nm_emergencia'] = $nm_emergencia;
		$_SESSION['nm_acidente'] = $nm_acidente;
		$_SESSION['nm_alergia'] = $nm_alergia;
		$_SESSION['nm_restricao'] = $nm_restricao;
		$_SESSION['nm_doenca'] = $nm_doenca;
		$_SESSION['nm_plano'] = $nm_plano;				
		$_SESSION['nm_logra'] = $nm_logra;
		$_SESSION['nm_compl'] = $nm_compl;
		$_SESSION['nu_logra'] = $nu_logra;
		$_SESSION['nu_tel'] = $nu_tel;
		$_SESSION['te_email'] = $te_email;
		$_SESSION['nm_bairro'] = $nm_bairro;
		$_SESSION['nu_cep'] = $nu_cep;
		$_SESSION['nm_cidade'] = $nm_cidade;
		$_SESSION['nm_uf'] = $nm_uf;
		header ("location: aluno.php");
		
		} else if ( ($mes == "02") && ($dia == 31) ){
		$msg_excessao = "Nascimento: Preenchimento inválido";
		$_SESSION['msg_excessao'] = $msg_excessao;
		$_SESSION['nu_termo'] = $nu_termo;
		$_SESSION['in_antigo'] = $in_antigo;
		$_SESSION['in_emergencia'] = $in_emergencia;
		$_SESSION['id_religiao'] = $id_religiao;
		$_SESSION['nm_religiao'] = $nm_religiao;
		$_SESSION['nm_aluno'] = $nm_aluno;
		$_SESSION['id_sexo'] = $id_sexo;
		$_SESSION['nm_sexo'] = $nm_sexo;
		$_SESSION['dia'] = $dia;
		$_SESSION['mes'] = $mes;
		$_SESSION['id_ano'] = $id_ano;
		$_SESSION['nu_ano'] = $nu_ano;
		$_SESSION['dt_cadastro'] = $dt_cadastro;
		$_SESSION['nm_mae'] = $nm_mae;
		$_SESSION['te_profissao_pai'] = $te_profissao_pai;
		$_SESSION['te_profissao_mae'] = $te_profissao_mae;
		$_SESSION['id_analgesico'] = $id_analgesico;
		$_SESSION['nm_analgesico'] = $nm_analgesico;
		$_SESSION['nu_telefone_mae'] = $nu_telefone_mae;
		$_SESSION['nm_trabalho_mae'] = $nm_trabalho_mae;
		$_SESSION['nm_pai'] = $nm_pai;
		$_SESSION['nu_telefone_pai'] = $nu_telefone_pai;
		$_SESSION['nm_trabalho_pai'] = $nm_trabalho_pai;		
		$_SESSION['nm_emergencia'] = $nm_emergencia;
		$_SESSION['nm_acidente'] = $nm_acidente;
		$_SESSION['nm_alergia'] = $nm_alergia;
		$_SESSION['nm_restricao'] = $nm_restricao;
		$_SESSION['nm_doenca'] = $nm_doenca;
		$_SESSION['nm_plano'] = $nm_plano;				
		$_SESSION['nm_logra'] = $nm_logra;
		$_SESSION['nm_compl'] = $nm_compl;
		$_SESSION['nu_logra'] = $nu_logra;
		$_SESSION['nu_tel'] = $nu_tel;
		$_SESSION['te_email'] = $te_email;
		$_SESSION['nm_bairro'] = $nm_bairro;
		$_SESSION['nu_cep'] = $nu_cep;
		$_SESSION['nm_cidade'] = $nm_cidade;
		$_SESSION['nm_uf'] = $nm_uf;
		header ("location: aluno.php");
		
		} else if ( ($mes == "04") && ($dia == 31) ){
		$msg_excessao = "Nascimento: Preenchimento inválido";
		$_SESSION['msg_excessao'] = $msg_excessao;
		$_SESSION['nu_termo'] = $nu_termo;
		$_SESSION['in_antigo'] = $in_antigo;
		$_SESSION['in_emergencia'] = $in_emergencia;
		$_SESSION['id_religiao'] = $id_religiao;
		$_SESSION['nm_religiao'] = $nm_religiao;
		$_SESSION['nm_aluno'] = $nm_aluno;
		$_SESSION['id_sexo'] = $id_sexo;
		$_SESSION['nm_sexo'] = $nm_sexo;
		$_SESSION['dia'] = $dia;
		$_SESSION['mes'] = $mes;
		$_SESSION['id_ano'] = $id_ano;
		$_SESSION['nu_ano'] = $nu_ano;
		$_SESSION['dt_cadastro'] = $dt_cadastro;
		$_SESSION['nm_mae'] = $nm_mae;
		$_SESSION['te_profissao_pai'] = $te_profissao_pai;
		$_SESSION['te_profissao_mae'] = $te_profissao_mae;
		$_SESSION['id_analgesico'] = $id_analgesico;
		$_SESSION['nm_analgesico'] = $nm_analgesico;
		$_SESSION['nu_telefone_mae'] = $nu_telefone_mae;
		$_SESSION['nm_trabalho_mae'] = $nm_trabalho_mae;
		$_SESSION['nm_pai'] = $nm_pai;
		$_SESSION['nu_telefone_pai'] = $nu_telefone_pai;
		$_SESSION['nm_trabalho_pai'] = $nm_trabalho_pai;		
		$_SESSION['nm_emergencia'] = $nm_emergencia;
		$_SESSION['nm_acidente'] = $nm_acidente;
		$_SESSION['nm_alergia'] = $nm_alergia;
		$_SESSION['nm_restricao'] = $nm_restricao;
		$_SESSION['nm_doenca'] = $nm_doenca;
		$_SESSION['nm_plano'] = $nm_plano;				
		$_SESSION['nm_logra'] = $nm_logra;
		$_SESSION['nm_compl'] = $nm_compl;
		$_SESSION['nu_logra'] = $nu_logra;
		$_SESSION['nu_tel'] = $nu_tel;
		$_SESSION['te_email'] = $te_email;
		$_SESSION['nm_bairro'] = $nm_bairro;
		$_SESSION['nu_cep'] = $nu_cep;
		$_SESSION['nm_cidade'] = $nm_cidade;
		$_SESSION['nm_uf'] = $nm_uf;
		header ("location: aluno.php");
		
		} else if ( ($mes == "06") && ($dia == 31) ){
		$msg_excessao = "Nascimento: Preenchimento inválido";
		$_SESSION['msg_excessao'] = $msg_excessao;
		$_SESSION['nu_termo'] = $nu_termo;
		$_SESSION['in_antigo'] = $in_antigo;
		$_SESSION['in_emergencia'] = $in_emergencia;
		$_SESSION['id_religiao'] = $id_religiao;
		$_SESSION['nm_religiao'] = $nm_religiao;
		$_SESSION['nm_aluno'] = $nm_aluno;
		$_SESSION['id_sexo'] = $id_sexo;
		$_SESSION['nm_sexo'] = $nm_sexo;
		$_SESSION['dia'] = $dia;
		$_SESSION['mes'] = $mes;
		$_SESSION['id_ano'] = $id_ano;
		$_SESSION['nu_ano'] = $nu_ano;
		$_SESSION['dt_cadastro'] = $dt_cadastro;
		$_SESSION['nm_mae'] = $nm_mae;
		$_SESSION['te_profissao_pai'] = $te_profissao_pai;
		$_SESSION['te_profissao_mae'] = $te_profissao_mae;
		$_SESSION['id_analgesico'] = $id_analgesico;
		$_SESSION['nm_analgesico'] = $nm_analgesico;
		$_SESSION['nu_telefone_mae'] = $nu_telefone_mae;
		$_SESSION['nm_trabalho_mae'] = $nm_trabalho_mae;
		$_SESSION['nm_pai'] = $nm_pai;
		$_SESSION['nu_telefone_pai'] = $nu_telefone_pai;
		$_SESSION['nm_trabalho_pai'] = $nm_trabalho_pai;		
		$_SESSION['nm_emergencia'] = $nm_emergencia;
		$_SESSION['nm_acidente'] = $nm_acidente;
		$_SESSION['nm_alergia'] = $nm_alergia;
		$_SESSION['nm_restricao'] = $nm_restricao;
		$_SESSION['nm_doenca'] = $nm_doenca;
		$_SESSION['nm_plano'] = $nm_plano;				
		$_SESSION['nm_logra'] = $nm_logra;
		$_SESSION['nm_compl'] = $nm_compl;
		$_SESSION['nu_logra'] = $nu_logra;
		$_SESSION['nu_tel'] = $nu_tel;
		$_SESSION['te_email'] = $te_email;
		$_SESSION['nm_bairro'] = $nm_bairro;
		$_SESSION['nu_cep'] = $nu_cep;
		$_SESSION['nm_cidade'] = $nm_cidade;
		$_SESSION['nm_uf'] = $nm_uf;
		header ("location: aluno.php");
		
		} else if ( ($mes == "09") && ($dia == 31) ){
		$msg_excessao = "Nascimento: Preenchimento inválido";
		$_SESSION['msg_excessao'] = $msg_excessao;
		$_SESSION['nu_termo'] = $nu_termo;
		$_SESSION['in_antigo'] = $in_antigo;
		$_SESSION['in_emergencia'] = $in_emergencia;
		$_SESSION['id_religiao'] = $id_religiao;
		$_SESSION['nm_religiao'] = $nm_religiao;
		$_SESSION['nm_aluno'] = $nm_aluno;
		$_SESSION['id_sexo'] = $id_sexo;
		$_SESSION['nm_sexo'] = $nm_sexo;
		$_SESSION['dia'] = $dia;
		$_SESSION['mes'] = $mes;
		$_SESSION['id_ano'] = $id_ano;
		$_SESSION['nu_ano'] = $nu_ano;
		$_SESSION['dt_cadastro'] = $dt_cadastro;
		$_SESSION['nm_mae'] = $nm_mae;
		$_SESSION['te_profissao_pai'] = $te_profissao_pai;
		$_SESSION['te_profissao_mae'] = $te_profissao_mae;
		$_SESSION['id_analgesico'] = $id_analgesico;
		$_SESSION['nm_analgesico'] = $nm_analgesico;
		$_SESSION['nu_telefone_mae'] = $nu_telefone_mae;
		$_SESSION['nm_trabalho_mae'] = $nm_trabalho_mae;
		$_SESSION['nm_pai'] = $nm_pai;
		$_SESSION['nu_telefone_pai'] = $nu_telefone_pai;
		$_SESSION['nm_trabalho_pai'] = $nm_trabalho_pai;		
		$_SESSION['nm_emergencia'] = $nm_emergencia;
		$_SESSION['nm_acidente'] = $nm_acidente;
		$_SESSION['nm_alergia'] = $nm_alergia;
		$_SESSION['nm_restricao'] = $nm_restricao;
		$_SESSION['nm_doenca'] = $nm_doenca;
		$_SESSION['nm_plano'] = $nm_plano;				
		$_SESSION['nm_logra'] = $nm_logra;
		$_SESSION['nm_compl'] = $nm_compl;
		$_SESSION['nu_logra'] = $nu_logra;
		$_SESSION['nu_tel'] = $nu_tel;
		$_SESSION['te_email'] = $te_email;
		$_SESSION['nm_bairro'] = $nm_bairro;
		$_SESSION['nu_cep'] = $nu_cep;
		$_SESSION['nm_cidade'] = $nm_cidade;
		$_SESSION['nm_uf'] = $nm_uf;
		header ("location: aluno.php");
		
		} else if ( ($mes == "11") && ($dia == 31) ){
		$msg_excessao = "Nascimento: Preenchimento inválido";
		$_SESSION['msg_excessao'] = $msg_excessao;
		$_SESSION['nu_termo'] = $nu_termo;
		$_SESSION['in_antigo'] = $in_antigo;
		$_SESSION['in_emergencia'] = $in_emergencia;
		$_SESSION['id_religiao'] = $id_religiao;
		$_SESSION['nm_religiao'] = $nm_religiao;
		$_SESSION['nm_aluno'] = $nm_aluno;
		$_SESSION['id_sexo'] = $id_sexo;
		$_SESSION['nm_sexo'] = $nm_sexo;
		$_SESSION['dia'] = $dia;
		$_SESSION['mes'] = $mes;
		$_SESSION['id_ano'] = $id_ano;
		$_SESSION['nu_ano'] = $nu_ano;
		$_SESSION['dt_cadastro'] = $dt_cadastro;
		$_SESSION['nm_mae'] = $nm_mae;
		$_SESSION['te_profissao_pai'] = $te_profissao_pai;
		$_SESSION['te_profissao_mae'] = $te_profissao_mae;
		$_SESSION['id_analgesico'] = $id_analgesico;
		$_SESSION['nm_analgesico'] = $nm_analgesico;
		$_SESSION['nu_telefone_mae'] = $nu_telefone_mae;
		$_SESSION['nm_trabalho_mae'] = $nm_trabalho_mae;
		$_SESSION['nm_pai'] = $nm_pai;
		$_SESSION['nu_telefone_pai'] = $nu_telefone_pai;
		$_SESSION['nm_trabalho_pai'] = $nm_trabalho_pai;		
		$_SESSION['nm_emergencia'] = $nm_emergencia;
		$_SESSION['nm_acidente'] = $nm_acidente;
		$_SESSION['nm_alergia'] = $nm_alergia;
		$_SESSION['nm_restricao'] = $nm_restricao;
		$_SESSION['nm_doenca'] = $nm_doenca;
		$_SESSION['nm_plano'] = $nm_plano;				
		$_SESSION['nm_logra'] = $nm_logra;
		$_SESSION['nm_compl'] = $nm_compl;
		$_SESSION['nu_logra'] = $nu_logra;
		$_SESSION['nu_tel'] = $nu_tel;
		$_SESSION['te_email'] = $te_email;
		$_SESSION['nm_bairro'] = $nm_bairro;
		$_SESSION['nu_cep'] = $nu_cep;
		$_SESSION['nm_cidade'] = $nm_cidade;
		$_SESSION['nm_uf'] = $nm_uf;
		header ("location: aluno.php");
				
		} else if ( $nm_mae == "" ) {
		$msg_excessao = "Mae: Preenchimento obrigatório";
		$_SESSION['msg_excessao'] = $msg_excessao;
		$_SESSION['nu_termo'] = $nu_termo;
		$_SESSION['in_antigo'] = $in_antigo;
		$_SESSION['in_emergencia'] = $in_emergencia;
		$_SESSION['id_religiao'] = $id_religiao;
		$_SESSION['nm_religiao'] = $nm_religiao;
		$_SESSION['nm_aluno'] = $nm_aluno;
		$_SESSION['id_sexo'] = $id_sexo;
		$_SESSION['nm_sexo'] = $nm_sexo;
		$_SESSION['dia'] = $dia;
		$_SESSION['mes'] = $mes;
		$_SESSION['id_ano'] = $id_ano;
		$_SESSION['nu_ano'] = $nu_ano;
		$_SESSION['dt_cadastro'] = $dt_cadastro;
		$_SESSION['nm_mae'] = $nm_mae;
		$_SESSION['te_profissao_pai'] = $te_profissao_pai;
		$_SESSION['te_profissao_mae'] = $te_profissao_mae;
		$_SESSION['id_analgesico'] = $id_analgesico;
		$_SESSION['nm_analgesico'] = $nm_analgesico;
		$_SESSION['nu_telefone_mae'] = $nu_telefone_mae;
		$_SESSION['nm_trabalho_mae'] = $nm_trabalho_mae;
		$_SESSION['nm_pai'] = $nm_pai;
		$_SESSION['nu_telefone_pai'] = $nu_telefone_pai;
		$_SESSION['nm_trabalho_pai'] = $nm_trabalho_pai;		
		$_SESSION['nm_emergencia'] = $nm_emergencia;
		$_SESSION['nm_acidente'] = $nm_acidente;
		$_SESSION['nm_alergia'] = $nm_alergia;
		$_SESSION['nm_restricao'] = $nm_restricao;
		$_SESSION['nm_doenca'] = $nm_doenca;
		$_SESSION['nm_plano'] = $nm_plano;				
		$_SESSION['nm_logra'] = $nm_logra;
		$_SESSION['nm_compl'] = $nm_compl;
		$_SESSION['nu_logra'] = $nu_logra;
		$_SESSION['nu_tel'] = $nu_tel;
		$_SESSION['te_email'] = $te_email;
		$_SESSION['nm_bairro'] = $nm_bairro;
		$_SESSION['nu_cep'] = $nu_cep;
		$_SESSION['nm_cidade'] = $nm_cidade;
		$_SESSION['nm_uf'] = $nm_uf;
		header ("location: aluno.php");
		
		} else if ( $te_profissao_mae == "" ){
		$msg_excessao = "Profissão Mãe: Preenchimento obrigatório";
		$_SESSION['msg_excessao'] = $msg_excessao;
		$_SESSION['nu_termo'] = $nu_termo;
		$_SESSION['in_antigo'] = $in_antigo;
		$_SESSION['in_emergencia'] = $in_emergencia;
		$_SESSION['id_religiao'] = $id_religiao;
		$_SESSION['nm_religiao'] = $nm_religiao;
		$_SESSION['nm_aluno'] = $nm_aluno;
		$_SESSION['id_sexo'] = $id_sexo;
		$_SESSION['nm_sexo'] = $nm_sexo;
		$_SESSION['dia'] = $dia;
		$_SESSION['mes'] = $mes;
		$_SESSION['id_ano'] = $id_ano;
		$_SESSION['nu_ano'] = $nu_ano;
		$_SESSION['dt_cadastro'] = $dt_cadastro;
		$_SESSION['nm_mae'] = $nm_mae;
		$_SESSION['te_profissao_pai'] = $te_profissao_pai;
		$_SESSION['te_profissao_mae'] = $te_profissao_mae;
		$_SESSION['id_analgesico'] = $id_analgesico;
		$_SESSION['nm_analgesico'] = $nm_analgesico;
		$_SESSION['nu_telefone_mae'] = $nu_telefone_mae;
		$_SESSION['nm_trabalho_mae'] = $nm_trabalho_mae;
		$_SESSION['nm_pai'] = $nm_pai;
		$_SESSION['nu_telefone_pai'] = $nu_telefone_pai;
		$_SESSION['nm_trabalho_pai'] = $nm_trabalho_pai;		
		$_SESSION['nm_emergencia'] = $nm_emergencia;
		$_SESSION['nm_acidente'] = $nm_acidente;
		$_SESSION['nm_alergia'] = $nm_alergia;
		$_SESSION['nm_restricao'] = $nm_restricao;
		$_SESSION['nm_doenca'] = $nm_doenca;
		$_SESSION['nm_plano'] = $nm_plano;				
		$_SESSION['nm_logra'] = $nm_logra;
		$_SESSION['nm_compl'] = $nm_compl;
		$_SESSION['nu_logra'] = $nu_logra;
		$_SESSION['nu_tel'] = $nu_tel;
		$_SESSION['te_email'] = $te_email;
		$_SESSION['nm_bairro'] = $nm_bairro;
		$_SESSION['nu_cep'] = $nu_cep;
		$_SESSION['nm_cidade'] = $nm_cidade;
		$_SESSION['nm_uf'] = $nm_uf;
		header ("location: aluno.php");
		
		} else if ( $nu_telefone_mae == "" ) {
		$msg_excessao = "Telefone(mãe): Preenchimento obrigatório";
		$_SESSION['msg_excessao'] = $msg_excessao;
		$_SESSION['nu_termo'] = $nu_termo;
		$_SESSION['in_antigo'] = $in_antigo;
		$_SESSION['in_emergencia'] = $in_emergencia;
		$_SESSION['id_religiao'] = $id_religiao;
		$_SESSION['nm_religiao'] = $nm_religiao;
		$_SESSION['nm_aluno'] = $nm_aluno;
		$_SESSION['id_sexo'] = $id_sexo;
		$_SESSION['nm_sexo'] = $nm_sexo;
		$_SESSION['dia'] = $dia;
		$_SESSION['mes'] = $mes;
		$_SESSION['id_ano'] = $id_ano;
		$_SESSION['nu_ano'] = $nu_ano;
		$_SESSION['dt_cadastro'] = $dt_cadastro;
		$_SESSION['nm_mae'] = $nm_mae;
		$_SESSION['te_profissao_pai'] = $te_profissao_pai;
		$_SESSION['te_profissao_mae'] = $te_profissao_mae;
		$_SESSION['id_analgesico'] = $id_analgesico;
		$_SESSION['nm_analgesico'] = $nm_analgesico;
		$_SESSION['nu_telefone_mae'] = $nu_telefone_mae;
		$_SESSION['nm_trabalho_mae'] = $nm_trabalho_mae;
		$_SESSION['nm_pai'] = $nm_pai;
		$_SESSION['nu_telefone_pai'] = $nu_telefone_pai;
		$_SESSION['nm_trabalho_pai'] = $nm_trabalho_pai;		
		$_SESSION['nm_emergencia'] = $nm_emergencia;
		$_SESSION['nm_acidente'] = $nm_acidente;
		$_SESSION['nm_alergia'] = $nm_alergia;
		$_SESSION['nm_restricao'] = $nm_restricao;
		$_SESSION['nm_doenca'] = $nm_doenca;
		$_SESSION['nm_plano'] = $nm_plano;				
		$_SESSION['nm_logra'] = $nm_logra;
		$_SESSION['nm_compl'] = $nm_compl;
		$_SESSION['nu_logra'] = $nu_logra;
		$_SESSION['nu_tel'] = $nu_tel;
		$_SESSION['te_email'] = $te_email;
		$_SESSION['nm_bairro'] = $nm_bairro;
		$_SESSION['nu_cep'] = $nu_cep;
		$_SESSION['nm_cidade'] = $nm_cidade;
		$_SESSION['nm_uf'] = $nm_uf;
		header ("location: aluno.php");
				
		} else if ( $nm_pai == "" ) {
		$msg_excessao = "Pai: Preenchimento obrigatório";
		$_SESSION['msg_excessao'] = $msg_excessao;
		$_SESSION['nu_termo'] = $nu_termo;
		$_SESSION['in_antigo'] = $in_antigo;
		$_SESSION['in_emergencia'] = $in_emergencia;
		$_SESSION['id_religiao'] = $id_religiao;
		$_SESSION['nm_religiao'] = $nm_religiao;
		$_SESSION['nm_aluno'] = $nm_aluno;
		$_SESSION['id_sexo'] = $id_sexo;
		$_SESSION['nm_sexo'] = $nm_sexo;
		$_SESSION['dia'] = $dia;
		$_SESSION['mes'] = $mes;
		$_SESSION['id_ano'] = $id_ano;
		$_SESSION['nu_ano'] = $nu_ano;
		$_SESSION['dt_cadastro'] = $dt_cadastro;
		$_SESSION['nm_mae'] = $nm_mae;
		$_SESSION['te_profissao_pai'] = $te_profissao_pai;
		$_SESSION['te_profissao_mae'] = $te_profissao_mae;
		$_SESSION['id_analgesico'] = $id_analgesico;
		$_SESSION['nm_analgesico'] = $nm_analgesico;
		$_SESSION['nu_telefone_mae'] = $nu_telefone_mae;
		$_SESSION['nm_trabalho_mae'] = $nm_trabalho_mae;
		$_SESSION['nm_pai'] = $nm_pai;
		$_SESSION['nu_telefone_pai'] = $nu_telefone_pai;
		$_SESSION['nm_trabalho_pai'] = $nm_trabalho_pai;		
		$_SESSION['nm_emergencia'] = $nm_emergencia;
		$_SESSION['nm_acidente'] = $nm_acidente;
		$_SESSION['nm_alergia'] = $nm_alergia;
		$_SESSION['nm_restricao'] = $nm_restricao;
		$_SESSION['nm_doenca'] = $nm_doenca;
		$_SESSION['nm_plano'] = $nm_plano;				
		$_SESSION['nm_logra'] = $nm_logra;
		$_SESSION['nm_compl'] = $nm_compl;
		$_SESSION['nu_logra'] = $nu_logra;
		$_SESSION['nu_tel'] = $nu_tel;
		$_SESSION['te_email'] = $te_email;
		$_SESSION['nm_bairro'] = $nm_bairro;
		$_SESSION['nu_cep'] = $nu_cep;
		$_SESSION['nm_cidade'] = $nm_cidade;
		$_SESSION['nm_uf'] = $nm_uf;
		header ("location: aluno.php");
		
		} else if ( $te_profissao_pai == "" ){
		$msg_excessao = "Profissão Pai: Preenchimento obrigatório";
		$_SESSION['msg_excessao'] = $msg_excessao;
		$_SESSION['nu_termo'] = $nu_termo;
		$_SESSION['in_antigo'] = $in_antigo;
		$_SESSION['in_emergencia'] = $in_emergencia;
		$_SESSION['id_religiao'] = $id_religiao;
		$_SESSION['nm_religiao'] = $nm_religiao;
		$_SESSION['nm_aluno'] = $nm_aluno;
		$_SESSION['id_sexo'] = $id_sexo;
		$_SESSION['nm_sexo'] = $nm_sexo;
		$_SESSION['dia'] = $dia;
		$_SESSION['mes'] = $mes;
		$_SESSION['id_ano'] = $id_ano;
		$_SESSION['nu_ano'] = $nu_ano;
		$_SESSION['dt_cadastro'] = $dt_cadastro;
		$_SESSION['nm_mae'] = $nm_mae;
		$_SESSION['te_profissao_pai'] = $te_profissao_pai;
		$_SESSION['te_profissao_mae'] = $te_profissao_mae;
		$_SESSION['id_analgesico'] = $id_analgesico;
		$_SESSION['nm_analgesico'] = $nm_analgesico;
		$_SESSION['nu_telefone_mae'] = $nu_telefone_mae;
		$_SESSION['nm_trabalho_mae'] = $nm_trabalho_mae;
		$_SESSION['nm_pai'] = $nm_pai;
		$_SESSION['nu_telefone_pai'] = $nu_telefone_pai;
		$_SESSION['nm_trabalho_pai'] = $nm_trabalho_pai;		
		$_SESSION['nm_emergencia'] = $nm_emergencia;
		$_SESSION['nm_acidente'] = $nm_acidente;
		$_SESSION['nm_alergia'] = $nm_alergia;
		$_SESSION['nm_restricao'] = $nm_restricao;
		$_SESSION['nm_doenca'] = $nm_doenca;
		$_SESSION['nm_plano'] = $nm_plano;				
		$_SESSION['nm_logra'] = $nm_logra;
		$_SESSION['nm_compl'] = $nm_compl;
		$_SESSION['nu_logra'] = $nu_logra;
		$_SESSION['nu_tel'] = $nu_tel;
		$_SESSION['te_email'] = $te_email;
		$_SESSION['nm_bairro'] = $nm_bairro;
		$_SESSION['nu_cep'] = $nu_cep;
		$_SESSION['nm_cidade'] = $nm_cidade;
		$_SESSION['nm_uf'] = $nm_uf;
		header ("location: aluno.php");
		
		} else if ( $nu_telefone_pai == "" ) {
		$msg_excessao = "Telefone(pai): Preenchimento obrigatório";
		$_SESSION['msg_excessao'] = $msg_excessao;
		$_SESSION['nu_termo'] = $nu_termo;
		$_SESSION['in_antigo'] = $in_antigo;
		$_SESSION['in_emergencia'] = $in_emergencia;
		$_SESSION['id_religiao'] = $id_religiao;
		$_SESSION['nm_religiao'] = $nm_religiao;
		$_SESSION['nm_aluno'] = $nm_aluno;
		$_SESSION['id_sexo'] = $id_sexo;
		$_SESSION['nm_sexo'] = $nm_sexo;
		$_SESSION['dia'] = $dia;
		$_SESSION['mes'] = $mes;
		$_SESSION['id_ano'] = $id_ano;
		$_SESSION['nu_ano'] = $nu_ano;
		$_SESSION['dt_cadastro'] = $dt_cadastro;
		$_SESSION['nm_mae'] = $nm_mae;
		$_SESSION['te_profissao_pai'] = $te_profissao_pai;
		$_SESSION['te_profissao_mae'] = $te_profissao_mae;
		$_SESSION['id_analgesico'] = $id_analgesico;
		$_SESSION['nm_analgesico'] = $nm_analgesico;
		$_SESSION['nu_telefone_mae'] = $nu_telefone_mae;
		$_SESSION['nm_trabalho_mae'] = $nm_trabalho_mae;
		$_SESSION['nm_pai'] = $nm_pai;
		$_SESSION['nu_telefone_pai'] = $nu_telefone_pai;
		$_SESSION['nm_trabalho_pai'] = $nm_trabalho_pai;		
		$_SESSION['nm_emergencia'] = $nm_emergencia;
		$_SESSION['nm_acidente'] = $nm_acidente;
		$_SESSION['nm_alergia'] = $nm_alergia;
		$_SESSION['nm_restricao'] = $nm_restricao;
		$_SESSION['nm_doenca'] = $nm_doenca;
		$_SESSION['nm_plano'] = $nm_plano;				
		$_SESSION['nm_logra'] = $nm_logra;
		$_SESSION['nm_compl'] = $nm_compl;
		$_SESSION['nu_logra'] = $nu_logra;
		$_SESSION['nu_tel'] = $nu_tel;
		$_SESSION['te_email'] = $te_email;
		$_SESSION['nm_bairro'] = $nm_bairro;
		$_SESSION['nu_cep'] = $nu_cep;
		$_SESSION['nm_cidade'] = $nm_cidade;
		$_SESSION['nm_uf'] = $nm_uf;
		header ("location: aluno.php");
				
		} else if ( $id_analgesico == 0 ){
		$msg_excessao = "Febre/Dor: Preenchimento obrigatório";
		$_SESSION['msg_excessao'] = $msg_excessao;
		$_SESSION['nu_termo'] = $nu_termo;
		$_SESSION['in_antigo'] = $in_antigo;
		$_SESSION['in_emergencia'] = $in_emergencia;
		$_SESSION['id_religiao'] = $id_religiao;
		$_SESSION['nm_religiao'] = $nm_religiao;
		$_SESSION['nm_aluno'] = $nm_aluno;
		$_SESSION['id_sexo'] = $id_sexo;
		$_SESSION['nm_sexo'] = $nm_sexo;
		$_SESSION['dia'] = $dia;
		$_SESSION['mes'] = $mes;
		$_SESSION['id_ano'] = $id_ano;
		$_SESSION['nu_ano'] = $nu_ano;
		$_SESSION['dt_cadastro'] = $dt_cadastro;
		$_SESSION['nm_mae'] = $nm_mae;
		$_SESSION['te_profissao_pai'] = $te_profissao_pai;
		$_SESSION['te_profissao_mae'] = $te_profissao_mae;
		$_SESSION['id_analgesico'] = $id_analgesico;
		$_SESSION['nm_analgesico'] = $nm_analgesico;
		$_SESSION['nu_telefone_mae'] = $nu_telefone_mae;
		$_SESSION['nm_trabalho_mae'] = $nm_trabalho_mae;
		$_SESSION['nm_pai'] = $nm_pai;
		$_SESSION['nu_telefone_pai'] = $nu_telefone_pai;
		$_SESSION['nm_trabalho_pai'] = $nm_trabalho_pai;		
		$_SESSION['nm_emergencia'] = $nm_emergencia;
		$_SESSION['nm_acidente'] = $nm_acidente;
		$_SESSION['nm_alergia'] = $nm_alergia;
		$_SESSION['nm_restricao'] = $nm_restricao;
		$_SESSION['nm_doenca'] = $nm_doenca;
		$_SESSION['nm_plano'] = $nm_plano;				
		$_SESSION['nm_logra'] = $nm_logra;
		$_SESSION['nm_compl'] = $nm_compl;
		$_SESSION['nu_logra'] = $nu_logra;
		$_SESSION['nu_tel'] = $nu_tel;
		$_SESSION['te_email'] = $te_email;
		$_SESSION['nm_bairro'] = $nm_bairro;
		$_SESSION['nu_cep'] = $nu_cep;
		$_SESSION['nm_cidade'] = $nm_cidade;
		$_SESSION['nm_uf'] = $nm_uf;
		header ("location: aluno.php");			
				
		} else if ( $nm_logra == "" ) {
		$msg_excessao = "Logradouro: Preenchimento obrigatório";
		$_SESSION['msg_excessao'] = $msg_excessao;
		$_SESSION['nu_termo'] = $nu_termo;
		$_SESSION['in_antigo'] = $in_antigo;
		$_SESSION['in_emergencia'] = $in_emergencia;
		$_SESSION['id_religiao'] = $id_religiao;
		$_SESSION['nm_religiao'] = $nm_religiao;
		$_SESSION['nm_aluno'] = $nm_aluno;
		$_SESSION['id_sexo'] = $id_sexo;
		$_SESSION['nm_sexo'] = $nm_sexo;
		$_SESSION['dia'] = $dia;
		$_SESSION['mes'] = $mes;
		$_SESSION['id_ano'] = $id_ano;
		$_SESSION['nu_ano'] = $nu_ano;
		$_SESSION['dt_cadastro'] = $dt_cadastro;
		$_SESSION['nm_mae'] = $nm_mae;
		$_SESSION['te_profissao_pai'] = $te_profissao_pai;
		$_SESSION['te_profissao_mae'] = $te_profissao_mae;
		$_SESSION['id_analgesico'] = $id_analgesico;
		$_SESSION['nm_analgesico'] = $nm_analgesico;
		$_SESSION['nu_telefone_mae'] = $nu_telefone_mae;
		$_SESSION['nm_trabalho_mae'] = $nm_trabalho_mae;
		$_SESSION['nm_pai'] = $nm_pai;
		$_SESSION['nu_telefone_pai'] = $nu_telefone_pai;
		$_SESSION['nm_trabalho_pai'] = $nm_trabalho_pai;		
		$_SESSION['nm_emergencia'] = $nm_emergencia;
		$_SESSION['nm_acidente'] = $nm_acidente;
		$_SESSION['nm_alergia'] = $nm_alergia;
		$_SESSION['nm_restricao'] = $nm_restricao;
		$_SESSION['nm_doenca'] = $nm_doenca;
		$_SESSION['nm_plano'] = $nm_plano;				
		$_SESSION['nm_logra'] = $nm_logra;
		$_SESSION['nm_compl'] = $nm_compl;
		$_SESSION['nu_logra'] = $nu_logra;
		$_SESSION['nu_tel'] = $nu_tel;
		$_SESSION['te_email'] = $te_email;
		$_SESSION['nm_bairro'] = $nm_bairro;
		$_SESSION['nu_cep'] = $nu_cep;
		$_SESSION['nm_cidade'] = $nm_cidade;
		$_SESSION['nm_uf'] = $nm_uf;
		header ("location: aluno.php");
		
		} else if ( $nu_logra == "" ) {
		$msg_excessao = "Número: Preenchimento obrigatório";
		$_SESSION['msg_excessao'] = $msg_excessao;
		$_SESSION['nu_termo'] = $nu_termo;
		$_SESSION['in_antigo'] = $in_antigo;
		$_SESSION['in_emergencia'] = $in_emergencia;
		$_SESSION['id_religiao'] = $id_religiao;
		$_SESSION['nm_religiao'] = $nm_religiao;
		$_SESSION['nm_aluno'] = $nm_aluno;
		$_SESSION['id_sexo'] = $id_sexo;
		$_SESSION['nm_sexo'] = $nm_sexo;
		$_SESSION['dia'] = $dia;
		$_SESSION['mes'] = $mes;
		$_SESSION['id_ano'] = $id_ano;
		$_SESSION['nu_ano'] = $nu_ano;
		$_SESSION['dt_cadastro'] = $dt_cadastro;
		$_SESSION['nm_mae'] = $nm_mae;
		$_SESSION['te_profissao_pai'] = $te_profissao_pai;
		$_SESSION['te_profissao_mae'] = $te_profissao_mae;
		$_SESSION['id_analgesico'] = $id_analgesico;
		$_SESSION['nm_analgesico'] = $nm_analgesico;
		$_SESSION['nu_telefone_mae'] = $nu_telefone_mae;
		$_SESSION['nm_trabalho_mae'] = $nm_trabalho_mae;
		$_SESSION['nm_pai'] = $nm_pai;
		$_SESSION['nu_telefone_pai'] = $nu_telefone_pai;
		$_SESSION['nm_trabalho_pai'] = $nm_trabalho_pai;		
		$_SESSION['nm_emergencia'] = $nm_emergencia;
		$_SESSION['nm_acidente'] = $nm_acidente;
		$_SESSION['nm_alergia'] = $nm_alergia;
		$_SESSION['nm_restricao'] = $nm_restricao;
		$_SESSION['nm_doenca'] = $nm_doenca;
		$_SESSION['nm_plano'] = $nm_plano;				
		$_SESSION['nm_logra'] = $nm_logra;
		$_SESSION['nm_compl'] = $nm_compl;
		$_SESSION['nu_logra'] = $nu_logra;
		$_SESSION['nu_tel'] = $nu_tel;
		$_SESSION['te_email'] = $te_email;
		$_SESSION['nm_bairro'] = $nm_bairro;
		$_SESSION['nu_cep'] = $nu_cep;
		$_SESSION['nm_cidade'] = $nm_cidade;
		$_SESSION['nm_uf'] = $nm_uf;
		header ("location: aluno.php");
		
		} else if ( $nm_bairro == "" ) {
		$msg_excessao = "Bairro: Preenchimento obrigatório";
		$_SESSION['msg_excessao'] = $msg_excessao;
		$_SESSION['nu_termo'] = $nu_termo;
		$_SESSION['in_antigo'] = $in_antigo;
		$_SESSION['in_emergencia'] = $in_emergencia;
		$_SESSION['id_religiao'] = $id_religiao;
		$_SESSION['nm_religiao'] = $nm_religiao;
		$_SESSION['nm_aluno'] = $nm_aluno;
		$_SESSION['id_sexo'] = $id_sexo;
		$_SESSION['nm_sexo'] = $nm_sexo;
		$_SESSION['dia'] = $dia;
		$_SESSION['mes'] = $mes;
		$_SESSION['id_ano'] = $id_ano;
		$_SESSION['nu_ano'] = $nu_ano;
		$_SESSION['dt_cadastro'] = $dt_cadastro;
		$_SESSION['nm_mae'] = $nm_mae;
		$_SESSION['te_profissao_pai'] = $te_profissao_pai;
		$_SESSION['te_profissao_mae'] = $te_profissao_mae;
		$_SESSION['id_analgesico'] = $id_analgesico;
		$_SESSION['nm_analgesico'] = $nm_analgesico;
		$_SESSION['nu_telefone_mae'] = $nu_telefone_mae;
		$_SESSION['nm_trabalho_mae'] = $nm_trabalho_mae;
		$_SESSION['nm_pai'] = $nm_pai;
		$_SESSION['nu_telefone_pai'] = $nu_telefone_pai;
		$_SESSION['nm_trabalho_pai'] = $nm_trabalho_pai;		
		$_SESSION['nm_emergencia'] = $nm_emergencia;
		$_SESSION['nm_acidente'] = $nm_acidente;
		$_SESSION['nm_alergia'] = $nm_alergia;
		$_SESSION['nm_restricao'] = $nm_restricao;
		$_SESSION['nm_doenca'] = $nm_doenca;
		$_SESSION['nm_plano'] = $nm_plano;				
		$_SESSION['nm_logra'] = $nm_logra;
		$_SESSION['nm_compl'] = $nm_compl;
		$_SESSION['nu_logra'] = $nu_logra;
		$_SESSION['nu_tel'] = $nu_tel;
		$_SESSION['te_email'] = $te_email;
		$_SESSION['nm_bairro'] = $nm_bairro;
		$_SESSION['nu_cep'] = $nu_cep;
		$_SESSION['nm_cidade'] = $nm_cidade;
		$_SESSION['nm_uf'] = $nm_uf;
		header ("location: aluno.php");
		
		} else if ( $nu_cep == "") {
		$msg_excessao = "CEP: Preenchimento obrigatório";
		$_SESSION['msg_excessao'] = $msg_excessao;
		$_SESSION['nu_termo'] = $nu_termo;
		$_SESSION['in_antigo'] = $in_antigo;
		$_SESSION['in_emergencia'] = $in_emergencia;
		$_SESSION['id_religiao'] = $id_religiao;
		$_SESSION['nm_religiao'] = $nm_religiao;
		$_SESSION['nm_aluno'] = $nm_aluno;
		$_SESSION['id_sexo'] = $id_sexo;
		$_SESSION['nm_sexo'] = $nm_sexo;
		$_SESSION['dia'] = $dia;
		$_SESSION['mes'] = $mes;
		$_SESSION['id_ano'] = $id_ano;
		$_SESSION['nu_ano'] = $nu_ano;
		$_SESSION['dt_cadastro'] = $dt_cadastro;
		$_SESSION['nm_mae'] = $nm_mae;
		$_SESSION['te_profissao_pai'] = $te_profissao_pai;
		$_SESSION['te_profissao_mae'] = $te_profissao_mae;
		$_SESSION['id_analgesico'] = $id_analgesico;
		$_SESSION['nm_analgesico'] = $nm_analgesico;
		$_SESSION['nu_telefone_mae'] = $nu_telefone_mae;
		$_SESSION['nm_trabalho_mae'] = $nm_trabalho_mae;
		$_SESSION['nm_pai'] = $nm_pai;
		$_SESSION['nu_telefone_pai'] = $nu_telefone_pai;
		$_SESSION['nm_trabalho_pai'] = $nm_trabalho_pai;		
		$_SESSION['nm_emergencia'] = $nm_emergencia;
		$_SESSION['nm_acidente'] = $nm_acidente;
		$_SESSION['nm_alergia'] = $nm_alergia;
		$_SESSION['nm_restricao'] = $nm_restricao;
		$_SESSION['nm_doenca'] = $nm_doenca;
		$_SESSION['nm_plano'] = $nm_plano;				
		$_SESSION['nm_logra'] = $nm_logra;
		$_SESSION['nm_compl'] = $nm_compl;
		$_SESSION['nu_logra'] = $nu_logra;
		$_SESSION['nu_tel'] = $nu_tel;
		$_SESSION['te_email'] = $te_email;
		$_SESSION['nm_bairro'] = $nm_bairro;
		$_SESSION['nu_cep'] = $nu_cep;
		$_SESSION['nm_cidade'] = $nm_cidade;
		$_SESSION['nm_uf'] = $nm_uf;
		header ("location: aluno.php");
				
		} else if ( ($nu_cep != "") && strlen( $nu_cep ) != 8  ) {
		$msg_excessao = "CEP inválido";
		$_SESSION['msg_excessao'] = $msg_excessao;
		$_SESSION['nu_termo'] = $nu_termo;
		$_SESSION['in_antigo'] = $in_antigo;
		$_SESSION['in_emergencia'] = $in_emergencia;
		$_SESSION['id_religiao'] = $id_religiao;
		$_SESSION['nm_religiao'] = $nm_religiao;
		$_SESSION['nm_aluno'] = $nm_aluno;
		$_SESSION['id_sexo'] = $id_sexo;
		$_SESSION['nm_sexo'] = $nm_sexo;
		$_SESSION['dia'] = $dia;
		$_SESSION['mes'] = $mes;
		$_SESSION['id_ano'] = $id_ano;
		$_SESSION['nu_ano'] = $nu_ano;
		$_SESSION['dt_cadastro'] = $dt_cadastro;
		$_SESSION['nm_mae'] = $nm_mae;
		$_SESSION['te_profissao_pai'] = $te_profissao_pai;
		$_SESSION['te_profissao_mae'] = $te_profissao_mae;
		$_SESSION['id_analgesico'] = $id_analgesico;
		$_SESSION['nm_analgesico'] = $nm_analgesico;
		$_SESSION['nu_telefone_mae'] = $nu_telefone_mae;
		$_SESSION['nm_trabalho_mae'] = $nm_trabalho_mae;
		$_SESSION['nm_pai'] = $nm_pai;
		$_SESSION['nu_telefone_pai'] = $nu_telefone_pai;
		$_SESSION['nm_trabalho_pai'] = $nm_trabalho_pai;		
		$_SESSION['nm_emergencia'] = $nm_emergencia;
		$_SESSION['nm_acidente'] = $nm_acidente;
		$_SESSION['nm_alergia'] = $nm_alergia;
		$_SESSION['nm_restricao'] = $nm_restricao;
		$_SESSION['nm_doenca'] = $nm_doenca;
		$_SESSION['nm_plano'] = $nm_plano;				
		$_SESSION['nm_logra'] = $nm_logra;
		$_SESSION['nm_compl'] = $nm_compl;
		$_SESSION['nu_logra'] = $nu_logra;
		$_SESSION['nu_tel'] = $nu_tel;
		$_SESSION['te_email'] = $te_email;
		$_SESSION['nm_bairro'] = $nm_bairro;
		$_SESSION['nu_cep'] = $nu_cep;
		$_SESSION['nm_cidade'] = $nm_cidade;
		$_SESSION['nm_uf'] = $nm_uf;
		header ("location: aluno.php");
		
		} else if ( ($nu_cep != "") && !is_numeric( $nu_cep ) ) {
		$msg_excessao = "CEP inválido";
		$_SESSION['msg_excessao'] = $msg_excessao;
		$_SESSION['nu_termo'] = $nu_termo;
		$_SESSION['in_antigo'] = $in_antigo;
		$_SESSION['in_emergencia'] = $in_emergencia;
		$_SESSION['id_religiao'] = $id_religiao;
		$_SESSION['nm_religiao'] = $nm_religiao;
		$_SESSION['nm_aluno'] = $nm_aluno;
		$_SESSION['id_sexo'] = $id_sexo;
		$_SESSION['nm_sexo'] = $nm_sexo;
		$_SESSION['dia'] = $dia;
		$_SESSION['mes'] = $mes;
		$_SESSION['id_ano'] = $id_ano;
		$_SESSION['nu_ano'] = $nu_ano;
		$_SESSION['dt_cadastro'] = $dt_cadastro;
		$_SESSION['nm_mae'] = $nm_mae;
		$_SESSION['te_profissao_pai'] = $te_profissao_pai;
		$_SESSION['te_profissao_mae'] = $te_profissao_mae;
		$_SESSION['id_analgesico'] = $id_analgesico;
		$_SESSION['nm_analgesico'] = $nm_analgesico;
		$_SESSION['nu_telefone_mae'] = $nu_telefone_mae;
		$_SESSION['nm_trabalho_mae'] = $nm_trabalho_mae;
		$_SESSION['nm_pai'] = $nm_pai;
		$_SESSION['nu_telefone_pai'] = $nu_telefone_pai;
		$_SESSION['nm_trabalho_pai'] = $nm_trabalho_pai;		
		$_SESSION['nm_emergencia'] = $nm_emergencia;
		$_SESSION['nm_acidente'] = $nm_acidente;
		$_SESSION['nm_alergia'] = $nm_alergia;
		$_SESSION['nm_restricao'] = $nm_restricao;
		$_SESSION['nm_doenca'] = $nm_doenca;
		$_SESSION['nm_plano'] = $nm_plano;				
		$_SESSION['nm_logra'] = $nm_logra;
		$_SESSION['nm_compl'] = $nm_compl;
		$_SESSION['nu_logra'] = $nu_logra;
		$_SESSION['nu_tel'] = $nu_tel;
		$_SESSION['te_email'] = $te_email;
		$_SESSION['nm_bairro'] = $nm_bairro;
		$_SESSION['nu_cep'] = $nu_cep;
		$_SESSION['nm_cidade'] = $nm_cidade;
		$_SESSION['nm_uf'] = $nm_uf;
		header ("location: aluno.php");
				
		} else if ( $nm_cidade == "" ) {
		$msg_excessao = "Cidade: Preenchimento obrigatório";
		$_SESSION['msg_excessao'] = $msg_excessao;
		$_SESSION['nu_termo'] = $nu_termo;
		$_SESSION['in_antigo'] = $in_antigo;
		$_SESSION['in_emergencia'] = $in_emergencia;
		$_SESSION['id_religiao'] = $id_religiao;
		$_SESSION['nm_religiao'] = $nm_religiao;
		$_SESSION['nm_aluno'] = $nm_aluno;
		$_SESSION['id_sexo'] = $id_sexo;
		$_SESSION['nm_sexo'] = $nm_sexo;
		$_SESSION['dia'] = $dia;
		$_SESSION['mes'] = $mes;
		$_SESSION['id_ano'] = $id_ano;
		$_SESSION['nu_ano'] = $nu_ano;
		$_SESSION['dt_cadastro'] = $dt_cadastro;
		$_SESSION['nm_mae'] = $nm_mae;
		$_SESSION['te_profissao_pai'] = $te_profissao_pai;
		$_SESSION['te_profissao_mae'] = $te_profissao_mae;
		$_SESSION['id_analgesico'] = $id_analgesico;
		$_SESSION['nm_analgesico'] = $nm_analgesico;
		$_SESSION['nu_telefone_mae'] = $nu_telefone_mae;
		$_SESSION['nm_trabalho_mae'] = $nm_trabalho_mae;
		$_SESSION['nm_pai'] = $nm_pai;
		$_SESSION['nu_telefone_pai'] = $nu_telefone_pai;
		$_SESSION['nm_trabalho_pai'] = $nm_trabalho_pai;		
		$_SESSION['nm_emergencia'] = $nm_emergencia;
		$_SESSION['nm_acidente'] = $nm_acidente;
		$_SESSION['nm_alergia'] = $nm_alergia;
		$_SESSION['nm_restricao'] = $nm_restricao;
		$_SESSION['nm_doenca'] = $nm_doenca;
		$_SESSION['nm_plano'] = $nm_plano;				
		$_SESSION['nm_logra'] = $nm_logra;
		$_SESSION['nm_compl'] = $nm_compl;
		$_SESSION['nu_logra'] = $nu_logra;
		$_SESSION['nu_tel'] = $nu_tel;
		$_SESSION['te_email'] = $te_email;
		$_SESSION['nm_bairro'] = $nm_bairro;
		$_SESSION['nu_cep'] = $nu_cep;
		$_SESSION['nm_cidade'] = $nm_cidade;
		$_SESSION['nm_uf'] = $nm_uf;
		header ("location: aluno.php");
		
		} else if ( $nm_uf == "" ) {
		$msg_excessao = "UF: Preenchimento obrigatório";
		$_SESSION['msg_excessao'] = $msg_excessao;
		$_SESSION['nu_termo'] = $nu_termo;
		$_SESSION['in_antigo'] = $in_antigo;
		$_SESSION['in_emergencia'] = $in_emergencia;
		$_SESSION['id_religiao'] = $id_religiao;
		$_SESSION['nm_religiao'] = $nm_religiao;
		$_SESSION['nm_aluno'] = $nm_aluno;
		$_SESSION['id_sexo'] = $id_sexo;
		$_SESSION['nm_sexo'] = $nm_sexo;
		$_SESSION['dia'] = $dia;
		$_SESSION['mes'] = $mes;
		$_SESSION['id_ano'] = $id_ano;
		$_SESSION['nu_ano'] = $nu_ano;
		$_SESSION['dt_cadastro'] = $dt_cadastro;
		$_SESSION['nm_mae'] = $nm_mae;
		$_SESSION['te_profissao_pai'] = $te_profissao_pai;
		$_SESSION['te_profissao_mae'] = $te_profissao_mae;
		$_SESSION['id_analgesico'] = $id_analgesico;
		$_SESSION['nm_analgesico'] = $nm_analgesico;
		$_SESSION['nu_telefone_mae'] = $nu_telefone_mae;
		$_SESSION['nm_trabalho_mae'] = $nm_trabalho_mae;
		$_SESSION['nm_pai'] = $nm_pai;
		$_SESSION['nu_telefone_pai'] = $nu_telefone_pai;
		$_SESSION['nm_trabalho_pai'] = $nm_trabalho_pai;		
		$_SESSION['nm_emergencia'] = $nm_emergencia;
		$_SESSION['nm_acidente'] = $nm_acidente;
		$_SESSION['nm_alergia'] = $nm_alergia;
		$_SESSION['nm_restricao'] = $nm_restricao;
		$_SESSION['nm_doenca'] = $nm_doenca;
		$_SESSION['nm_plano'] = $nm_plano;				
		$_SESSION['nm_logra'] = $nm_logra;
		$_SESSION['nm_compl'] = $nm_compl;
		$_SESSION['nu_logra'] = $nu_logra;
		$_SESSION['nu_tel'] = $nu_tel;
		$_SESSION['te_email'] = $te_email;
		$_SESSION['nm_bairro'] = $nm_bairro;
		$_SESSION['nu_cep'] = $nu_cep;
		$_SESSION['nm_cidade'] = $nm_cidade;
		$_SESSION['nm_uf'] = $nm_uf;
		header ("location: aluno.php");
		
		} else if ( $dt_cadastro == "" ) {
		$msg_excessao = "Cadastro: Preenchimento obrigatório";
		$_SESSION['msg_excessao'] = $msg_excessao;
		$_SESSION['nu_termo'] = $nu_termo;
		$_SESSION['in_antigo'] = $in_antigo;
		$_SESSION['in_emergencia'] = $in_emergencia;
		$_SESSION['id_religiao'] = $id_religiao;
		$_SESSION['nm_religiao'] = $nm_religiao;
		$_SESSION['nm_aluno'] = $nm_aluno;
		$_SESSION['id_sexo'] = $id_sexo;
		$_SESSION['nm_sexo'] = $nm_sexo;
		$_SESSION['dia'] = $dia;
		$_SESSION['mes'] = $mes;
		$_SESSION['id_ano'] = $id_ano;
		$_SESSION['nu_ano'] = $nu_ano;
		$_SESSION['dt_cadastro'] = $dt_cadastro;
		$_SESSION['nm_mae'] = $nm_mae;
		$_SESSION['te_profissao_pai'] = $te_profissao_pai;
		$_SESSION['te_profissao_mae'] = $te_profissao_mae;
		$_SESSION['id_analgesico'] = $id_analgesico;
		$_SESSION['nm_analgesico'] = $nm_analgesico;
		$_SESSION['nu_telefone_mae'] = $nu_telefone_mae;
		$_SESSION['nm_trabalho_mae'] = $nm_trabalho_mae;
		$_SESSION['nm_pai'] = $nm_pai;
		$_SESSION['nu_telefone_pai'] = $nu_telefone_pai;
		$_SESSION['nm_trabalho_pai'] = $nm_trabalho_pai;		
		$_SESSION['nm_emergencia'] = $nm_emergencia;
		$_SESSION['nm_acidente'] = $nm_acidente;
		$_SESSION['nm_alergia'] = $nm_alergia;
		$_SESSION['nm_restricao'] = $nm_restricao;
		$_SESSION['nm_doenca'] = $nm_doenca;
		$_SESSION['nm_plano'] = $nm_plano;				
		$_SESSION['nm_logra'] = $nm_logra;
		$_SESSION['nm_compl'] = $nm_compl;
		$_SESSION['nu_logra'] = $nu_logra;
		$_SESSION['nu_tel'] = $nu_tel;
		$_SESSION['te_email'] = $te_email;
		$_SESSION['nm_bairro'] = $nm_bairro;
		$_SESSION['nu_cep'] = $nu_cep;
		$_SESSION['nm_cidade'] = $nm_cidade;
		$_SESSION['nm_uf'] = $nm_uf;
		header ("location: aluno.php");
				
		} else {
		unset($_SESSION['msg_excessao']);
		unset($_SESSION['nu_termo']);
		unset($_SESSION['in_antigo']);
		unset($_SESSION['in_emergencia']);
		unset($_SESSION['nm_aluno']);
		unset($_SESSION['id_religiao']);
		unset($_SESSION['nm_religiao']);
		unset($_SESSION['id_sexo']);
		unset($_SESSION['id_sexo']);
		unset($_SESSION['nm_sexo']);
		unset($_SESSION['dia']);
		unset($_SESSION['mes']);
		unset($_SESSION['id_ano']);
		unset($_SESSION['nu_ano']);
		unset($_SESSION['dt_cadastro']);
		unset($_SESSION['nm_mae']);
		unset($_SESSION['te_profissao_pai']);
		unset($_SESSION['te_profissao_mae']);
		unset($_SESSION['id_analgesico']);
		unset($_SESSION['nm_analgesico']);
		unset($_SESSION['nu_telefone_mae']);
		unset($_SESSION['nm_trabalho_mae']);
		unset($_SESSION['nm_pai']);
		unset($_SESSION['nm_trabalho_pai']);
		unset($_SESSION['nm_emergencia']);
		 unset($_SESSION['in_antigo']);
		unset($_SESSION['nm_acidente']);
		unset($_SESSION['nm_alergia']);
		unset($_SESSION['nm_restricao']);
		unset($_SESSION['nm_doenca']);
		unset($_SESSION['nm_plano']);
		unset($_SESSION['nm_logra']);
		unset($_SESSION['nm_compl']);
		unset($_SESSION['nu_logra']);
		unset($_SESSION['nm_bairro']);
		unset($_SESSION['nu_cep']);
		unset($_SESSION['nm_cidade']);
		unset($_SESSION['nm_uf']);
		unset($_SESSION['nu_tel']);
		unset($_SESSION['te_email']);		
				
		move_uploaded_file($_FILES['upload']['tmp_name'], $uploadfile) ;
	
		$persistence->inserirAluno($nu_termo,$in_antigo,$id_religiao,$nm_aluno,$id_sexo,$dt_nascimento,
		$dt_cadastro,$nm_mae,$te_profissao_pai,$te_profissao_mae,$id_analgesico,$nu_telefone_mae,$nm_trabalho_mae,
		$nm_pai,$nu_telefone_pai,$nm_trabalho_pai,
		$te_email,$nm_emergencia,$in_emergencia,$nm_alergia,
		$nm_restricao,$nm_doenca,$nm_plano,
		$nm_acidente,$nm_logra,$nu_logra,$nm_compl,$nm_bairro,$nm_cidade,$nu_cep,
		$nm_uf,$te_obs,$te_imagem);
	}	
}

if ( isset($_POST['editarAluno']) ) {
				
		unset($_SESSION['msg_sucesso']);
		unset($_SESSION['msg_excessao']);
		
		$opcao = addslashes($_POST['opcao']);
		$st_controle = addslashes($_POST['st_controle']);
		$id_aluno = addslashes($_POST['id_aluno']);
		$nu_termo = addslashes($_POST['nu_termo']);
		$id_religiao = addslashes($_POST['id_religiao']);
		$nm_aluno = trim(addslashes($_POST['nm_aluno']));
		$nm_aluno = strtoupper($nm_aluno);
		$id_sexo = addslashes($_POST['id_sexo']);
		$dt_nascimento = addslashes($_POST['dt_nascimento']);
		$dt_cadastro = addslashes($_POST['dt_cadastro']);
		$nm_mae = addslashes($_POST['nm_mae']);
		$nm_mae = strtoupper($nm_mae);
		$nu_telefone_mae = addslashes($_POST['nu_telefone_mae']);
		$nm_trabalho_mae = addslashes($_POST['nm_trabalho_mae']);		
		$nm_pai = addslashes($_POST['nm_pai']);
		$nm_pai = strtoupper($nm_pai);
		$te_profissao_mae = addslashes($_POST['te_profissao_mae']);
		$te_profissao_mae = strtoupper($te_profissao_mae);
		$te_profissao_pai = addslashes($_POST['te_profissao_pai']);
		$te_profissao_pai = strtoupper($te_profissao_pai);
		$nu_telefone_pai = addslashes($_POST['nu_telefone_pai']);
		$nm_trabalho_pai = addslashes($_POST['nm_trabalho_pai']);
		$nm_trabalho_pai = strtoupper($nm_trabalho_pai);		
		$nm_logra = addslashes($_POST['nm_logra']);
		$nm_logra = strtoupper($nm_logra);
		$nm_compl = addslashes($_POST['nm_compl']);
		$nu_logra = addslashes($_POST['nu_logra']);		
		$te_email = addslashes($_POST['te_email']);
		$nm_acidente = addslashes($_POST['nm_acidente']);		
		$nm_alergia = addslashes($_POST['nm_alergia']);		
		$nm_restricao = addslashes($_POST['nm_restricao']);		
		$nm_doenca = addslashes($_POST['nm_doenca']);		
		$nm_plano = addslashes($_POST['nm_plano']);		
		$in_emergencia = addslashes($_POST['in_emergencia']);
		$nm_emergencia = addslashes($_POST['nm_emergencia']);
		$id_analgesico = addslashes($_POST['id_analgesico']);		
		$nm_bairro = addslashes($_POST['nm_bairro']);
		$nm_bairro = strtoupper($nm_bairro);
		$nu_cep = addslashes($_POST['nu_cep']);
		$nm_cidade = addslashes($_POST['nm_cidade']);
		$nm_cidade = strtoupper($nm_cidade);
		$nm_uf = addslashes($_POST['nm_uf']);
		$checkbox = addslashes($_POST['checkbox']);
		$te_obs = addslashes($_POST['te_obs']);
		$upload  = $_FILES['upload'];
		$te_imagem_car = addslashes($_POST['te_imagem']);	
		$te_imagem = addslashes($_POST['te_imagem']);
						
		$upextensao['extensoes'] = array('pdf','jpg');
		$extensao = strtolower(end(explode('.', $_FILES['upload']['name'])));
		$uptamanho['tamanho'] = 2097152; // 2Mb
		
		$imagem = $_FILES["upload"]["name"]; //pega o nome do arquivo
   		$temp_imagem = $_FILES["upload"]["tmp_name"]; //pega o "temp" do arquivo
   		$tipo = $_FILES["upload"]["type"]; //pega o tipo do arquivo
   		$tamanho = $_FILES["upload"]["size"]; //pega o tamanho do arquivo
   		$t_maximo = 2000000; //tamanho máximo do arquivo - em bytes
   		$uploaddir = 'fotos/';
		$uploadfile = $uploaddir . $_FILES['upload']['name'];
		
		$imagem = isset($_FILES['upload']) ? $_FILES['upload'] : FALSE;
		
		if ( $dt_nascimento == '00/00/0000' ){
		$msg_excessao = "Nascimento: Preenchimento obrigatorio";
		$_SESSION['msg_excessao'] = $msg_excessao;
		
		header ("location: aluno_edit.php");
		} else {
		move_uploaded_file($_FILES['upload']['tmp_name'], $uploadfile) ;
					
		$persistence->editarAluno($st_controle,$te_profissao_pai,$te_profissao_mae,$opcao,$id_aluno,$checkbox,$nu_termo,$id_religiao,$nm_aluno,$id_sexo,$dt_nascimento,
		$dt_cadastro,$nm_mae,$nu_telefone_mae,$nm_trabalho_mae,
		$nm_pai,$nu_telefone_pai,$nm_trabalho_pai,
		$te_email,$nm_emergencia,$in_emergencia,$id_analgesico,$nm_alergia,
		$nm_restricao,$nm_doenca,$nm_plano,
		$nm_acidente,$nm_logra,$nu_logra,$nm_compl,$nm_bairro,$nm_cidade,$nu_cep,
		$nm_uf,$te_obs,$te_imagem_car,$te_imagem);
		}
}
if ( isset($_GET['abrirAlunoLista']) ) {
				
		unset($_SESSION['msg_sucesso']);
		unset($_SESSION['msg_excessao']);
		unset($_SESSION['nm_aluno']);
		unset($_SESSION['nm_objeto']);
		unset($_SESSION['st_controle']);
		
		$st_controle = addslashes($_GET['st_controle']);
		$_SESSION['st_controle'] = $st_controle;
					
		header ("location: aluno_lista.php");
}

if ( isset($_GET['imprimirAlunoLista']) ) {
				
		unset($_SESSION['msg_sucesso']);
		unset($_SESSION['msg_excessao']);
		unset($_SESSION['st_controle']);
		
		/*$st_controle = addslashes($_GET['st_controle']);
		$_SESSION['st_controle'] = $st_controle;*/
							
		header ("location: aluno_lista_pdf.php");
}


if ( isset($_GET['abrirAlunoPesquisa']) ) {
				
		unset($_SESSION['msg_sucesso']);
		unset($_SESSION['msg_excessao']);
		unset($_SESSION['nm_aluno']);
		unset($_SESSION['opcao']);
		
		$opcao = addslashes($_GET['opcao']);
		$_SESSION['opcao'] = $opcao;
		header ("location: aluno_pesquisa.php");
}

/*if ( isset($_POST['pesquisarAlunoLista']) ) {
				
		unset($_SESSION['msg_sucesso']);
		unset($_SESSION['msg_excessao']);
		unset($_SESSION['id_compro']);
		unset($_SESSION['id_turma']);
		unset($_SESSION['id_serie']);
		
		$nm_aluno = addslashes($_POST['nm_aluno']);
		
		if ( $nm_aluno = "" ){
		$msg_excessao = "Nome: Preenchimento obrigatório";
		$_SESSION['msg_excessao'] = $msg_excessao;
		header ("location: aluno_pesquisa.php");
		
		} else {
		unset($_SESSION['msg_excessao']);
		$_SESSION['nm_aluno'] = $nm_aluno;					
	
		header ("location: aluno_lista.php");
		}
}*/

if ( isset($_POST['pesquisarAlunoLista']) ) {
				
		unset($_SESSION['msg_sucesso']);
		unset($_SESSION['msg_excessao']);
		
		unset($_SESSION['id_turma']);
		unset($_SESSION['id_serie']);
		
		$nm_aluno = addslashes($_POST['nm_aluno']);
		$_SESSION['nm_aluno'] = $nm_aluno;					
		
		$nu_matricula = addslashes($_POST['nu_matricula']);
		$_SESSION['nu_matricula'] = $nu_matricula;					
	
		header ("location: aluno_lista.php");
	
}

if ( isset($_GET['abrirAlunoPane']) ) {
				
		unset($_SESSION['msg_sucesso']);
		unset($_SESSION['msg_excessao']);
		unset($_SESSION['id_turma']);
		unset($_SESSION['id_serie']);
		unset($_SESSION['nm_aluno']);
					
		$nm_aluno = addslashes($_POST['nm_aluno']);
		$_SESSION['nm_aluno'] = $nm_aluno;
		header ("location: aluno_lista.php");
}

if ( isset($_GET['abrirAlunoListaFiltro']) ) {
				
		unset($_SESSION['msg_sucesso']);
		unset($_SESSION['msg_excessao']);
		unset($_SESSION['id_compro']);
		
		$id_serie = addslashes($_GET['id_serie']);
		$_SESSION['id_serie'] = $id_serie;
		
		$id_turma = addslashes($_GET['id_turma']);
		$_SESSION['id_turma'] = $id_turma;
					
		header ("location: aluno_lista.php");
}


if ( isset($_GET['exibirAlunoFicha']) ) {
				
		unset($_SESSION['msg_sucesso']);
		unset($_SESSION['msg_excessao']);
		
		$id_aluno = addslashes($_GET['id_aluno']);
		$_SESSION['id_aluno'] = $id_aluno;
		
		$persistence->atualizarAntiguidade($id_aluno);		
							
		header ("location: aluno_ficha.php");
	}

if ( isset($_GET['abrirAlunoOutros']) ) {
				
		unset($_SESSION['msg_sucesso']);
		unset($_SESSION['msg_excessao']);
					
		header ("location: aluno_outros.php");
}

if ( isset($_GET['excluirAluno']) ) {		
		
		unset($_SESSION['msg_sucesso']);
		unset($_SESSION['msg_excessao']);
		
		$id_aluno = addslashes($_GET['id_aluno']);
		$id_usuario = addslashes($_GET['id_usuario']);
		$opcao  = addslashes($_GET['opcao']);
		
		if ( $persistence->verificarExcluirAluno($id_aluno) ){
		$msg_excessao = "Exclusão não permitida";
		$_SESSION['msg_excessao'] = $msg_excessao;
		header ("location: aluno_lista.php");
		
		} else	if ( $_SESSION['id_id'] == 2 && $opcao == 2 ){
		$msg_excessao = "Usuário não autorizado";
		$_SESSION['msg_excessao'] = $msg_excessao;
		
		header ("location: aluno_lista.php");		
				
		} else if ( $id_usuario != $_SESSION['id'] ){ 
		$msg_excessao = "Exclusão não autorizada";
		$_SESSION['msg_excessao'] = $msg_excessao;
		
		header ("location: aluno_lista.php");
		
		} else {
								
		$persistence->excluirAluno($id_aluno,$opcao);
	}
	}
if ( isset($_GET['exibirAluno']) ) {
				
		unset($_SESSION['msg_sucesso']);
		unset($_SESSION['msg_excessao']);
		
		$id_aluno = addslashes($_GET['id_aluno']);
		$_SESSION['id_aluno'] = $id_aluno;
		//header ("location: aluno_pdf.php");
		header ("location: aluno_ficha.php");
	}

if ( isset($_GET['abrirAlunoEdit']) ) {
				
		unset($_SESSION['msg_sucesso']);
		unset($_SESSION['msg_excessao']);
		
		$id_aluno = addslashes($_GET['id_aluno']);
		$id_usuario = addslashes($_GET['id_usuario']);		
		$opcao = addslashes($_GET['opcao']);
		
		if ( $_SESSION['id_id'] == 2 && $opcao == 2 ){
		$msg_excessao = "Usuário não autorizado";
		$_SESSION['msg_excessao'] = $msg_excessao;
		
		header ("location: aluno_lista.php");
		
		} else if ( ($id_usuario != $_SESSION['id']) || ($_SESSION['id_id'] == 2) ){ 
		$msg_excessao = "Edição não permitida";
		$_SESSION['msg_excessao'] = $msg_excessao;
		
		header ("location: aluno_lista.php");		
		
		} else {
	
	$_SESSION['id_aluno'] = $id_aluno;
	$_SESSION['opcao'] = $opcao;	
		
	header ("location: aluno_edit.php");
	}
}
	
if ( isset($_GET['abrirAlunoHistorico']) ) {
				
		unset($_SESSION['msg_sucesso']);
		unset($_SESSION['msg_excessao']);
		unset($_SESSION['nu_ano']);
		
		$id_aluno = addslashes($_GET['id_aluno']);
		$_SESSION['id_aluno'] = $id_aluno;
		
		header ("location: aluno_historico.php");
	}
	
if ( isset($_POST['inserirHistorico']) ) {
				
		unset($_SESSION['msg_sucesso']);
		unset($_SESSION['msg_excessao']);
		
		$id_aluno = addslashes($_POST['id_aluno']);
		$id_serie = addslashes($_POST['id_serie']);
		$nm_serie = addslashes($_POST['nm_serie']);
		$id_turma = addslashes($_POST['id_turma']);
		$nm_turma = addslashes($_POST['nm_turma']);
		$id_turno = addslashes($_POST['id_turno']);
		$nm_turno = addslashes($_POST['nm_turno']);
		$nu_ano = addslashes($_POST['nu_ano']);
		
		if ( $id_serie == 0 ){
		$msg_excessao = "Série: Preenchimento obrigatorio";
		$_SESSION['msg_excessao'] = $msg_excessao;
		$_SESSION['id_turma'] = $id_turma;
		$_SESSION['nm_turma'] = $nm_turma;
		$_SESSION['id_turno'] = $id_turno;
		$_SESSION['nm_turno'] = $nm_turno;
		$_SESSION['nu_ano'] = $nu_ano;
		header ("location: aluno_historico.php");
		
		} else if ( $id_turma == 0 ){
		$msg_excessao = "Turma: Preenchimento obrigatorio";
		$_SESSION['msg_excessao'] = $msg_excessao;
		$_SESSION['id_serie'] = $id_serie;
		$_SESSION['nm_serie'] = $nm_serie;
		$_SESSION['id_turno'] = $id_turno;
		$_SESSION['nm_turno'] = $nm_turno;
		$_SESSION['nu_ano'] = $nu_ano;
		header ("location: aluno_historico.php");
		
		} else if ( $id_turno == 0 ){
		$msg_excessao = "Turno: Preenchimento obrigatorio";
		$_SESSION['msg_excessao'] = $msg_excessao;
		$_SESSION['id_serie'] = $id_serie;
		$_SESSION['nm_serie'] = $nm_serie;
		$_SESSION['id_turma'] = $id_turma;
		$_SESSION['nm_turma'] = $nm_turma;
		$_SESSION['nu_ano'] = $nu_ano;
		header ("location: aluno_historico.php");
		
		} else if ( $nu_ano == 0 ){
		$msg_excessao = "Ano: Preenchimento obrigatorio";
		$_SESSION['msg_excessao'] = $msg_excessao;
		$_SESSION['id_serie'] = $id_serie;
		$_SESSION['nm_serie'] = $nm_serie;
		$_SESSION['id_turma'] = $id_turma;
		$_SESSION['nm_turma'] = $nm_turma;
		$_SESSION['id_turno'] = $id_turno;
		$_SESSION['nm_turno'] = $nm_turno;
		$_SESSION['nu_ano'] = $nu_ano;
		header ("location: aluno_historico.php");
		
		} else if ( $persistence->verificarHistorico($id_aluno,$nu_ano,$id_serie,$id_turma,$id_turno) ){
		$msg_excessao = "Histórico já cadastrado";
		$_SESSION['msg_excessao'] = $msg_excessao;
		$_SESSION['id_serie'] = $id_serie;
		$_SESSION['nm_serie'] = $nm_serie;
		$_SESSION['id_turma'] = $id_turma;
		$_SESSION['nm_turma'] = $nm_turma;
		$_SESSION['id_turno'] = $id_turno;
		$_SESSION['nm_turno'] = $nm_turno;
		$_SESSION['nu_ano'] = $nu_ano;
		header ("location: aluno_historico.php");
		
		} else { 
		unset($_SESSION['id_serie']);
		unset($_SESSION['nm_serie']);
		unset($_SESSION['id_turma']);
		unset($_SESSION['nm_turma']);
		unset($_SESSION['id_turno']);
		unset($_SESSION['nm_turno']);
		unset($_SESSION['nu_ano']);	
		$persistence->inserirHistorico($id_aluno,$id_serie,$id_turma,$id_turno,$nu_ano);
	}
	}
	
if ( isset($_POST['inserirHistoricoDetalhes']) ) {
				
		unset($_SESSION['msg_sucesso']);
		unset($_SESSION['msg_excessao']);
		
		$id_historico = addslashes($_POST['id_historico']);
		$id_materia = addslashes($_POST['id_materia']);
		$nu_media = addslashes($_POST['nu_media']);
		
		if ($persistence->verificarHistoricoDetalhe($id_historico,$id_materia)){
		$msg_excessao = "Matéria já cadastrada";
		$_SESSION['msg_excessao'] = $msg_excessao;
				
		header ("location: aluno_historico_detalhes.php");
		
		} else if ($id_materia == 0){
		$msg_excessao = "Matéria: Preenchimnto obrigatório";
		$_SESSION['msg_excessao'] = $msg_excessao;
		$_SESSION['id_materia'] = $id_materia;
		$_SESSION['nu_media'] = $nu_media;
		header ("location: aluno_historico_detalhes.php");
		
		} else if ($nu_media == ""){
		$msg_excessao = "Média: Preenchimnto obrigatório";
		$_SESSION['msg_excessao'] = $msg_excessao;
		$_SESSION['id_materia'] = $id_materia;
		$_SESSION['nu_media'] = $nu_media;
		header ("location: aluno_historico_detalhes.php");
		
		} else {
		unset($_SESSION['id_materia']);
		unset($_SESSION['nu_media']);
		$persistence->inserirHistoricoDetalhes($id_historico,$id_materia,$nu_media);
		}
		}
		
	if ( isset($_GET['abrirAnalgesico']) ) {
				
		unset($_SESSION['msg_sucesso']);
		unset($_SESSION['msg_excessao']);
		unset($_SESSION['nm_aluno']);
		unset($_SESSION['nm_objeto']);
		unset($_SESSION['nm_analgesico']);
		
					
		header ("location: analgesico.php");
}

	if ( isset($_GET['abrirReligiao']) ) {
				
		unset($_SESSION['msg_sucesso']);
		unset($_SESSION['msg_excessao']);
		unset($_SESSION['nm_aluno']);
		unset($_SESSION['nm_objeto']);
		unset($_SESSION['nm_analgesico']);
		
					
		header ("location: religiao.php");
}

if ( isset($_GET['abrirAnalgesicoEdit']) ) {
				
		unset($_SESSION['msg_sucesso']);
		unset($_SESSION['msg_excessao']);
		unset($_SESSION['nm_aluno']);
		unset($_SESSION['nm_objeto']);
		unset($_SESSION['nm_analgesico']);
		
		$id_analgesico = addslashes($_GET['id_analgesico']);
		$_SESSION['id_analgesico'] = $id_analgesico;
		
		$opcao = addslashes($_GET['opcao']);
		$_SESSION['opcao'] = $opcao;
					
		header ("location: analgesico_edit.php");
}

if ( isset($_POST['inserirAnalgesico']) ) {
				
		unset($_SESSION['msg_sucesso']);
		unset($_SESSION['msg_excessao']);
		unset($_SESSION['nm_aluno']);
		unset($_SESSION['nm_objeto']);
		unset($_SESSION['nm_analgesico']);
		
		$nm_analgesico = addslashes($_POST['nm_analgesico']);
		$nm_analgesico = strtoupper($nm_analgesico);
		
		if ($nm_analgesico == ""){
		$msg_excessao = "Nome: Preenchimnto obrigatório";
		$_SESSION['msg_excessao'] = $msg_excessao;
		
		header ("location: analgesico.php");
		
		} else {
							
		$persistence->inserirAnalgesico($nm_analgesico);
}
}

if ( isset($_POST['editarAnalgesico']) ) {
				
		unset($_SESSION['msg_sucesso']);
		unset($_SESSION['msg_excessao']);
		unset($_SESSION['nm_aluno']);
		unset($_SESSION['nm_objeto']);
		unset($_SESSION['nm_analgesico']);
		
		$nm_analgesico = addslashes($_POST['nm_analgesico']);
		$nm_analgesico = strtoupper($nm_analgesico);
		$id_analgesico = addslashes($_POST['id_analgesico']);
		$opcao = addslashes($_POST['opcao']);
		
		if ($nm_analgesico == ""){
		$msg_excessao = "Nome: Preenchimnto obrigatório";
		$_SESSION['msg_excessao'] = $msg_excessao;
		
		header ("location: analgesico.php");
		
		} else {
							
		$persistence->editarAnalgesico($nm_analgesico,$id_analgesico,$opcao);
}
}


if ( isset($_GET['excluirAnalgesico']) ) {		
		
		unset($_SESSION['msg_sucesso']);
		unset($_SESSION['msg_excessao']);
		
		$id_analgesico = addslashes($_GET['id_analgesico']);
		$opcao  = addslashes($_GET['opcao']);
		
		if ( $persistence->verificarExcluirAanalgesico($id_analgesico) ){
		$msg_excessao = "Exclusão não permitida";
		$_SESSION['msg_excessao'] = $msg_excessao;
		header ("location: analgesico.php");
			
		} else {
								
		$persistence->excluirAnalgesico($id_analgesico,$opcao);
	}
	}
	
if ( isset($_POST['inserirReligiao']) ) {
				
		unset($_SESSION['msg_sucesso']);
		unset($_SESSION['msg_excessao']);
		unset($_SESSION['nm_aluno']);
		unset($_SESSION['nm_objeto']);
		unset($_SESSION['nm_analgesico']);
		
		$nm_religiao = addslashes($_POST['nm_religiao']);
		$nm_religiao = strtoupper($nm_religiao);
		
		if ($nm_religiao == ""){
		$msg_excessao = "Nome: Preenchimnto obrigatório";
		$_SESSION['msg_excessao'] = $msg_excessao;
		
		header ("location: religiao.php");
		
		} else {
							
		$persistence->inserirReligiao($nm_religiao);
}
}

if ( isset($_GET['abrirReligiaoEdit']) ) {
				
		unset($_SESSION['msg_sucesso']);
		unset($_SESSION['msg_excessao']);
		unset($_SESSION['nm_aluno']);
		unset($_SESSION['nm_objeto']);
		unset($_SESSION['nm_analgesico']);
		
		$id_religiao = addslashes($_GET['id_religiao']);
		$_SESSION['id_religiao'] = $id_religiao;
		
		$opcao = addslashes($_GET['opcao']);
		$_SESSION['opcao'] = $opcao;
					
		header ("location: religiao_edit.php");
}

if ( isset($_POST['editarReligiao']) ) {
				
		unset($_SESSION['msg_sucesso']);
		unset($_SESSION['msg_excessao']);
		unset($_SESSION['nm_aluno']);
		unset($_SESSION['nm_objeto']);
		unset($_SESSION['nm_religiao']);
		
		$nm_religiao = addslashes($_POST['nm_religiao']);
		$nm_religiao = strtoupper($nm_religiao);
		$id_religiao = addslashes($_POST['id_religiao']);
		$opcao = addslashes($_POST['opcao']);
		
		if ($nm_religiao == ""){
		$msg_excessao = "Nome: Preenchimnto obrigatório";
		$_SESSION['msg_excessao'] = $msg_excessao;
		
		header ("location: religiao.php");
		
		} else {
							
		$persistence->editarReligiao($nm_religiao,$id_religiao,$opcao);
}
}

if ( isset($_GET['excluirReligiao']) ) {		
		
		unset($_SESSION['msg_sucesso']);
		unset($_SESSION['msg_excessao']);
		
		$id_religiao = addslashes($_GET['id_religiao']);
		$opcao  = addslashes($_GET['opcao']);
		
		if ( $persistence->verificarExcluirReligiao($id_religiao) ){
		$msg_excessao = "Exclusão não permitida";
		$_SESSION['msg_excessao'] = $msg_excessao;
		header ("location: religiao.php");
			
		} else {
								
		$persistence->excluirReligiao($id_religiao,$opcao);
	}
	}



?>