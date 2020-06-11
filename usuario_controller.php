<?php 
session_start();
require_once("class/persistence.php");
$persistence = new Persistence();

if ( isset($_POST['logar']) ) {
	
		$nm_login = addslashes($_POST['login']);
		$nm_senha = addslashes($_POST['senha']);
	
		$persistence->logar($nm_login,$nm_senha);
	}
if ( isset($_GET['novoUsuario']) ) {		
		unset($_SESSION['nm_usuario']);
		unset($_SESSION['nm_login']);
		unset($_SESSION['nm_senha']);
		unset($_SESSION['re_senha']);
		unset($_SESSION['msg_sucesso']);
		unset($_SESSION['msg_erro']);
		header ("location: usuario.php");
	}
if ( isset($_GET['logout']) ) {
	session_destroy();
	
	header ("location: index.php");
	}
	
if ( isset($_GET['abrirBackup']) )  {
	unset($_SESSION['msg_sucesso']);
	unset($_SESSION['msg_excessao']);
		
	header ("location: backup.php");
	}

if ( isset($_GET['excluirArquivo']) ) {
				
		unset($_SESSION['msg_sucesso']);
		unset($_SESSION['msg_excessao']);
		
		$arquivo = $_GET['arquivo'];
		
		if ( !unlink($arquivo) ){
		$msg_excessao = "Erro";
		$_SESSION['msg_excessao'] = $msg_excessao;
		} else {
		$msg_sucesso = "Excluido com sucesso";
		$_SESSION['msg_sucesso'] = $msg_sucesso;
		header ("location: backup.php");
		}
	}

if ( isset($_POST['inserirUsuario']) ) {
		unset($_SESSION['msg_sucesso']);
		unset($_SESSION['msg_excessao']);
		$nm_usuario = addslashes($_POST['nm_usuario']);
		$nm_login = addslashes($_POST['nm_login']);		
		$termo = addslashes($_POST['termo']);
		
		if ($nm_usuario == ""){
		$msg_excessao = "Nome: Preenchimento obrigatório";
		$_SESSION['msg_excessao'] = $msg_excessao;
		header ("location: usuario.php");
		} else if ($nm_login == ""){
		$msg_excessao = "E-mail: Preenchimento obrigatório";
		$_SESSION['msg_excessao'] = $msg_excessao;
		header ("location: usuario.php");
		
		} else if ( !ereg('^([a-zA-Z0-9.-_])*([@])([a-z0-9]).([a-z]{2,3})',$nm_login) ){
		$msg_excessao = "E-mail: Inválido.";
		$_SESSION['msg_excessao'] = $msg_excessao;
		$_SESSION['nm_usuario'] = $nm_usuario;
		$_SESSION['nm_login'] = $nm_login;
		header ("location: usuario.php");
	
		} else if ($termo == ""){
		$msg_excessao = "Marque Termos e condições de uso";
		$_SESSION['nm_usuario'] = $nm_usuario;
		$_SESSION['nm_login'] = $nm_login;		
		$_SESSION['msg_excessao'] = $msg_excessao;
		header ("location: usuario.php");		
	} else {
	unset($_SESSION['msg_excessao']);
	$persistence->inserirUsuario($nm_usuario,$nm_login);
	}
	}
if ( isset($_POST['alterarUsuario']) ) {
		unset($_SESSION['msg_sucesso']);
		unset($_SESSION['msg_excessao']);
		$id_usuario = addslashes($_POST['id_usuario']);
		$nm_usuario = addslashes($_POST['nm_usuario']);
		$nm_login = addslashes($_POST['nm_login']);
		$nm_senha = addslashes($_POST['nm_senha']);
		$re_senha = addslashes($_POST['re_senha']);
		$id_status = addslashes($_POST['id_status']);
		
		if ($nm_senha != $re_senha){
		$msg_excessao = "Campo Senha diferente";
		$_SESSION['nm_usuario'] = $nm_usuario;
		$_SESSION['nm_login'] = $nm_login;
		$_SESSION['msg_excessao'] = $msg_excessao;
		header ("location: usuario_edit.php");
		} else {
		unset($_SESSION['nm_usuario']);
		unset($_SESSION['nm_login']);
		unset($_SESSION['msg_excessao']);
		$persistence->alterarUsuario($id_usuario,$nm_usuario,$nm_login,$nm_senha,$id_status);
		}
		}
if ( isset($_GET['abrirUsuarioLista']) ) {		
	
		unset($_SESSION['msg_sucesso']);
		unset($_SESSION['msg_excessao']);
		
		header ("location: usuario_lista.php");
	}
if ( isset($_GET['abrirUsuarioAlt']) ) {		
	   unset($_SESSION['msg_sucesso']);
		unset($_SESSION['msg_excessao']);
		unset($_SESSION['opcao']);
		unset($_SESSION['in_status']);
		$id_usuario = addslashes($_GET['id_usuario']);
		$_SESSION['id_usuario'] = $id_usuario;
		header ("location: usuario_edit.php");
	}
if ( isset($_GET['abrirBoasVindas']) ) {		
	
		unset($_SESSION['msg_sucesso']);
		unset($_SESSION['msg_excessao']);
		unset($_SESSION['id_macom']);
		unset($_SESSION['nm_macom']);
		unset($_SESSION['opcao']);
		
		$id_usuario = addslashes($_GET['id_usuario']);
		$_SESSION['id_usuario'] = $id_usuario;
		
		header ("location: boas_vindas.php");
	}	
if ( isset($_GET['abrirUsuarioNovo']) ) {		
	
		unset($_SESSION['msg_sucesso']);
		unset($_SESSION['msg_excessao']);
		unset($_SESSION['te_email']);
		unset($_SESSION['nu_cpf']);
		unset($_SESSION['opcao']);
		unset($_SESSION['nu_telefone']);
				
		header ("location: usuario_novo.php");
	}
if ( isset($_GET['gerarConta']) ) {		
	
		unset($_SESSION['msg_sucesso']);
		unset($_SESSION['msg_excessao']);
		unset($_SESSION['te_email']);
		unset($_SESSION['nu_cpf']);
		unset($_SESSION['nu_telefone']);
		$email = addslashes($_GET['email']);
		$nome = addslashes($_GET['nome']);
		
		$persistence->gerarConta($email,$nome);
		
	}
if ( isset($_GET['abrirSenhaLista']) ) {		
	
		unset($_SESSION['msg_sucesso']);
		unset($_SESSION['msg_excessao']);
		header ("location: senha_lista.php");
	}
if ( isset($_GET['abrirSenha']) ) {		
	
		unset($_SESSION['msg_sucesso']);
		unset($_SESSION['msg_excessao']);
		$id_usuario = addslashes($_GET['id_usuario']);
		$_SESSION['id_usuario'] = $id_usuario;
		header ("location: senha.php");
	}

if ( isset($_POST['editarSenha']) ) {		
	
		unset($_SESSION['msg_sucesso']);
		unset($_SESSION['msg_excessao']);
		
		$id_usuario = addslashes($_POST['id_usuario']);
		$nm_senha = addslashes($_POST['nm_senha']);
		$re_senha = addslashes($_POST['re_senha']);
		
		if ( $nm_senha == "" ){
		$msg_excessao = "Senha: Preenchimento obrigatório";
		$_SESSION['msg_excessao'] = $msg_excessao;		
		header ("location: senha.php");
		
		} else if ( $nm_senha != $re_senha ){
		$msg_excessao = "Senhas diferentes";
		$_SESSION['msg_excessao'] = $msg_excessao;		
		header ("location: senha.php");
		} else {
		
		$persistence->editarSenha($id_usuario,$nm_senha);
		}
	}
if ( isset($_POST['editarSenha']) ) {		
	
		unset($_SESSION['msg_sucesso']);
		unset($_SESSION['msg_excessao']);
		
		$id_usuario = addslashes($_POST['id_usuario']);
		$nm_senha = addslashes($_POST['nm_senha']);
		$re_senha = addslashes($_POST['re_senha']);
		
		if ( $nm_senha == "" ){
		$msg_erro = "Senha: Preenchimento obrigatório";
		$_SESSION['msg_excessao'] = $msg_excessao;		
		header ("location: senha.php");
		
		} else if ( $nm_senha != $re_senha ){
		$msg_excessao = "Senhas diferentes";
		$_SESSION['msg_excessao'] = $msg_excessao;		
		header ("location: senha.php");
		} else {
		
		$persistence->editarSenha($id_usuario,$nm_senha);
		}
		}

if ( isset($_GET['excluirUsuario']) ) {
				
		unset($_SESSION['msg_sucesso']);
		unset($_SESSION['msg_excessao']);
		
		$opcao = addslashes($_GET['opcao']);
		$id_usuario = addslashes($_GET['id_usuario']);
		
		if ( $persistence->validarExcluirUsuario($id_usuario) ){
		$msg_excessao = "Exclusão não permitida";
		$_SESSION['msg_excessao'] = $msg_excessao;
		//$_SESSION['id_tipo'] = $id_tipo;
		//$_SESSION['nm_produto'] = $nm_produto;
		header ("location: usuario_lista.php");
		
		} else if ( $id_usuario != $_SESSION['id_usuario'] ){
		$msg_excessao = "Operação não permitida";
		$_SESSION['msg_excessao'] = $msg_excessao;
		//$_SESSION['id_tipo'] = $id_tipo;
		//$_SESSION['nm_produto'] = $nm_produto;
		header ("location: usuario_lista.php");		
		
		} else {
				
		$persistence->excluirUsuario($id_usuario,$opcao);
	}
	}


	if ( isset($_GET['copiarDados']) ) {		
	
		unset($_SESSION['msg_sucesso']);
		unset($_SESSION['msg_excessao']);
		
				
		$persistence->copiarDados();
		
		}
if ( isset($_GET['abrirInformacoes']) ) {		
		unset($_SESSION['nm_usuario']);
		unset($_SESSION['nm_login']);
		unset($_SESSION['nm_senha']);
		unset($_SESSION['re_senha']);
		unset($_SESSION['msg_sucesso']);
		unset($_SESSION['msg_erro']);
		header ("location: informacoes.php");
	}

if ( isset($_GET['abrirLogLista']) ) {		
	
		unset($_SESSION['msg_sucesso']);
		unset($_SESSION['msg_excessao']);
		
		header ("location: log_lista.php");
	}
	
if ( isset($_GET['imprimirLogLista']) ) {		
	
		unset($_SESSION['msg_sucesso']);
		unset($_SESSION['msg_excessao']);
		
		header ("location: log_lista_pdf.php");
	}
	
	if ( isset($_GET['imprimirContrato']) ) {		
	
		unset($_SESSION['msg_sucesso']);
		unset($_SESSION['msg_excessao']);
		
		header ("location: contrato_padrao.pdf");
	}

if ( isset($_GET['imprimirContratoOnline']) ) {		
	
		unset($_SESSION['msg_sucesso']);
		unset($_SESSION['msg_excessao']);
		
		header ("location: contrato_online_resumido.pdf");
	}

?>