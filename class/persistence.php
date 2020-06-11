<?php
@session_start();
require_once("conexao.php");
$mysql = new Mysql();
$mysql->conectar();

class Persistence {

public function logar($nm_login,$nm_senha){
		// $nm_senha = md5('$nm_senha');
		$sql = mysql_query("SELECT usuarios.id_usuario,usuarios.nm_usuario,usuarios.id_status,status.nm_status, usuarios.id_ente, entidades.nm_ente FROM usuarios, status, entidades
		WHERE usuarios.id_status = status.id_status AND nm_login = '".$nm_login."' AND nm_senha = password('".$nm_senha."') AND status.id_status <> 3  ") or 
		die ("<table width='100%' border='0' align='center'><tr><td><div align='center'><font color='#FF0000'>AVISO: Temporariamente fora do ar. Tente mais tarde!.</font></div></td></tr></table>");
		$row = mysql_num_rows($sql);
		for ( $i=0; $i < $row; $i++ ){
		$id_usuario  = mysql_result($sql, $i, "id_usuario"); 
		$id  = mysql_result($sql, $i, "id_usuario"); 
		$nm_usuario  = mysql_result($sql, $i, "nm_usuario"); 
		$id_id  = mysql_result($sql, $i, "id_status"); 
		$id_status  = mysql_result($sql, $i, "id_status"); 
		$nm_status  = mysql_result($sql, $i, "nm_status");
		$id_ente  = mysql_result($sql, $i, "id_ente");
		$nm_ente  = mysql_result($sql, $i, "nm_ente");
		}
		if ( $row == 0 ){
		$msg = "Usuário ou Senha inválida";
		$acesso = "2";
		$_SESSION['msg'] = $msg;
		$_SESSION['acesso'] = $acesso;
		unset($_SESSION['msg_usuario']);
		// log ******************************************* 
		$dt_log = date("Y-m-d");
		$time = mktime(date('H')-3, date('i'), date('s'));
		$hora_local = gmdate("H:i:s", $time);
		$hora = substr($hora_local,0,2).substr($hora_local,2,3);
		$hr_log = $hora;
		$id_acao = 5;
		$nm_objeto = $nm_login;
		$nu_ip = getenv("REMOTE_ADDR");
		$id_usuario = 58;
		$nm_acesso = $nm_login;
		$mobile = FALSE;
   		$user_agents = array("iPhone","iPad","Android","webOS","BlackBerry","iPod","Symbian","IsGeneric"); 
   		foreach($user_agents as $user_agent){
     	if (strpos($_SERVER['HTTP_USER_AGENT'], $user_agent) !== FALSE) {
        $mobile = TRUE;
		$modelo	= $user_agent;
		break;
     	}
   		} 
   		if ($mobile){
      		$nm_dispositivo = strtolower($modelo);
   				}else{
      			$nm_dispositivo = "Computador";
   		}
		
		$inserir = mysql_query("INSERT INTO logs (dt_log,hr_log,id_acao,nm_objeto,id_usuario,nu_ip,nm_dispositivo) 
		VALUES('".$dt_log."','".$hr_log."',".$id_acao.",'".$nm_objeto."',".$id_usuario.",'".$nu_ip."','".$nm_dispositivo."')");
	//**************************************************************************************************************************
		header ("location: index.php");
		} else {
		$acesso = "1";
		
		$_SESSION['acesso'] = $acesso;
		$_SESSION['id_usuario'] = $id_usuario;
		$_SESSION['id'] = $id;
		$_SESSION['id_id'] = $id_id;
		$_SESSION['nm_usuario'] = $nm_usuario;
		$_SESSION['id_status'] = $id_status;
		$_SESSION['id_status'] = $id_status;
		$_SESSION['nm_status'] = $nm_status;
		$_SESSION['id_ente'] = $id_ente;
		$_SESSION['nm_ente'] = $nm_ente;	
		$_SESSION['login'] = $nm_login;
		$_SESSION['login_centro'] = $nm_login;
		$_SESSION['titulo'] = $nm_ente;
		$_SESSION['icon'] = "img/logo.png";
		
		unset($_SESSION['msg_usuario']);
		// log ******************************************* 
		$dt_log = date("Y-m-d");
		$time = mktime(date('H')-3, date('i'), date('s'));
		$hora_local = gmdate("H:i:s", $time);
		$hora = substr($hora_local,0,2).substr($hora_local,2,3);
		$hr_log = $hora;
		$id_acao = 5;
		$nm_objeto = "Login";
		$nu_ip = getenv("REMOTE_ADDR");
		$id_usuario = $id_usuario;
		$mobile = FALSE;
   		$user_agents = array("iPhone","iPad","Android","webOS","BlackBerry","iPod","Symbian","IsGeneric"); 
   		foreach($user_agents as $user_agent){
     	if (strpos($_SERVER['HTTP_USER_AGENT'], $user_agent) !== FALSE) {
        $mobile = TRUE;
		$modelo	= $user_agent;
		break;
     	}
   		} 
   		if ($mobile){
      		$nm_dispositivo = strtolower($modelo);
   				}else{
      			$nm_dispositivo = "Computador";
   		}
		
		$inserir = mysql_query("INSERT INTO logs (dt_log,hr_log,id_acao,nm_objeto,id_usuario,nu_ip,nm_dispositivo) 
		VALUES('".$dt_log."','".$hr_log."',".$id_acao.",'".$nm_objeto."',".$id_usuario.",'".$nu_ip."','".$nm_dispositivo."')");
		
	//**************************************************************************************************************************
		// Indicadores
		/*$sql = mysql_query("SELECT * FROM alunos WHERE id_status = 0 AND id_usuario = ".$id_usuario." ");
		$row = mysql_num_rows($sql);
		for ( $i=0; $i < $row; $i++ ){
		$id_aluno  = mysql_result($sql, $i, "id_aluno"); 
		}
		if ( $row > 0 ){
		$_SESSION['qt_alunos'] = "Total de alunos: ".$i;
		} else {
		$_SESSION['qt_alunos'] = "";
		}
		$sql = mysql_query("SELECT * FROM alunos WHERE id_sexo = 1 AND id_status = 0 AND id_usuario = ".$id_usuario." ");
		$row = mysql_num_rows($sql);
		for ( $i=0; $i < $row; $i++ ){
		$id_aluno  = mysql_result($sql, $i, "id_aluno"); 
		}
		if ( $row > 0 ){
		$_SESSION['qt_alunos_mas'] = "Alunos: ".$i;
		} else {
		$_SESSION['qt_alunos_mas'] = "";
		}
		$sql = mysql_query("SELECT * FROM alunos WHERE id_sexo = 2 AND id_status = 0 AND id_usuario = ".$id_usuario." ");
		$row = mysql_num_rows($sql);
		for ( $i=0; $i < $row; $i++ ){
		$id_aluno  = mysql_result($sql, $i, "id_aluno"); 
		}
		if ( $row > 0 ){
		$_SESSION['qt_alunos_fem'] = "Alunas: ".$i;
		} else {
		$_SESSION['qt_alunos_fem'] = "";
		}*/
		
	
	//***************************************************************************************************************
		header ("location: index.php");
	//	header ("location: index_off.php");		
		}	
	}
public function inserirUsuario($nm_usuario,$nm_login){
	$sql = mysql_query("SELECT * FROM usuarios WHERE nm_login = '".$nm_login."' ");
	$row = mysql_num_rows($sql);
	if ($row == 1){
	$msg_erro = "Este login ja existe!!";
	$_SESSION['msg_erro'] = $msg_erro;
	unset($_SESSION['msg']);
	header ("location: usuario.php");
	} else {
	$dt_cadastro = date("Y-m-d");
	$nu_ip = getenv("REMOTE_ADDR");
	// 
	// 
	$sql = mysql_query("INSERT INTO usuarios (nm_usuario,nm_login,nm_senha,nu_ip,dt_cadastro,id_status) 
	VALUES('".$nm_usuario."','".$nm_login."',password('1144'),'".$nu_ip."','".$dt_cadastro."',3)") or die ("Erro 1");
			
	$msg_sucesso = "Seus dados de acesso foram enviados para o seu e-mail: ".$nm_login;
	unset($_SESSION['nm_usuario']);
	unset($_SESSION['nm_login']);
	unset($_SESSION['nm_senha']);
	unset($_SESSION['re_senha']);
	$_SESSION['msg_sucesso'] = $msg_sucesso;
	header ("location: usuario.php");
	}
	}
	public function alterarUsuario($id_usuario,$nm_usuario,$nm_login,$nm_senha,$id_status){
	
	$altera = mysql_query("UPDATE usuarios SET nm_usuario = '".$nm_usuario."' WHERE id_usuario = ".$id_usuario." ");
	$altera = mysql_query("UPDATE usuarios SET nm_login = '".$nm_login."' WHERE id_usuario = ".$id_usuario." ");
	$altera = mysql_query("UPDATE usuarios SET nm_senha = password('".$nm_senha."') WHERE id_usuario = ".$id_usuario." ");
	$altera = mysql_query("UPDATE usuarios SET id_status = ".$id_status." WHERE id_usuario = ".$id_usuario." ");	
	
	// log ******************************************* 
	$dt_log = date("Y-m-d");
	$time = mktime(date('H')-3, date('i'), date('s'));
	$hora_local = gmdate("H:i:s", $time);
	$hora = substr($hora_local,0,2).substr($hora_local,2,3);
	$hr_log = $hora;
	$id_acao = 2;
	$nm_objeto = "Usuário";
	$nu_ip = getenv("REMOTE_ADDR");
	$id_indice = $id_usuario;
	$inserir = mysql_query("INSERT INTO logs (dt_log,hr_log,id_usuario,id_acao,nm_objeto,id_indice,nu_ip) 
	VALUES('".$dt_log."','".$hr_log."',".$_SESSION['id_usuario'].",".$id_acao.",'".$nm_objeto."',".$id_indice.",'".$nu_ip."')");
	//**************************************************************************************************************************	
	
	$msg_sucesso = "Registros editados com sucesso";
	$_SESSION['msg_sucesso'] = $msg_sucesso;
	header ("location: usuario_edit.php");
	}
public function validarExcluirUsuario($id_usuario){
	
	$sql = mysql_query("SELECT * FROM funcionarios WHERE id_usuario = ".$id_usuario."  ") or die ("Erro 2");
	$row1 = mysql_num_rows($sql);
	
	$sql = mysql_query("SELECT * FROM alunos WHERE id_usuario = ".$id_usuario."  ") or die ("Erro 3");
	$row2 = mysql_num_rows($sql);
	
	$sql = mysql_query("SELECT * FROM matriculas WHERE id_usuario = ".$id_usuario."  ") or die ("Erro 4");
	$row3 = mysql_num_rows($sql);
	
	$sql = mysql_query("SELECT * FROM responsaveis WHERE id_usuario = ".$id_usuario."  ") or die ("Erro 5");
	$row4 = mysql_num_rows($sql);
			
	if ( ($row1 > 0) || ($row2 > 0) || ($row3 > 0) || ($row4 > 0) || ($row5 > 0) ){
	return true;
	} else {
	return false;
	}
}
public function excluirUsuario($id_usuario,$opcao){

	$sql = mysql_query("DELETE FROM usuarios  WHERE id_usuario = ".$id_usuario." ") or die ("Erro 6");
	
	$msg_sucesso = "Registro excluido com sucesso";	
	$_SESSION['msg_sucesso'] = $msg_sucesso;

	if ( $opcao == 1 ){
	$_SESSION['id_usuario'] = $id_usuario;
	header ("location: usuario.php");
	} else {
	header ("location: usuario_lista.php");
	}
}

public function editarSenha($id_usuario,$nm_senha){

	$alterar = mysql_query("UPDATE usuarios SET nm_senha = password('".$nm_senha."') WHERE id_usuario = ".$id_usuario."") or die ("Erro 7");
	
	$msg_sucesso = "Registro editado com sucesso";	
	$_SESSION['msg_sucesso'] = $msg_sucesso;	
	header ("location: senha.php");
}

public function gerarConta($email,$nome){

	$sql = mysql_query("UPDATE usuarios SET id_status = 1 WHERE nm_login = '".$email."'");
	$_SESSION['email'] = $email;
	$_SESSION['nome'] = $nome;
	header ("location: boas_vindas.php");
}
public function msg_excessao($id_usuario,$nm_senha){

	$alterar = mysql_query("UPDATE usuarios SET nm_senha = password('".$nm_senha."') WHERE id_usuario = ".$id_usuario."") or die ("Erro 5");
	
	$msg_sucesso = "Registro alterado com sucesso";	
	$_SESSION['msg_sucesso'] = $msg_sucesso;	
	header ("location: senha.php");
}
//######################################################################################################################################

public function validCPF($nu_cpf){

 $d1 = 0;   
  $d2 = 0;
 $nu_cpf = preg_replace("/[^0-9]/", "", $nu_cpf); 
 $ignore_list = array(   '00000000000', '01234567890', '11111111111', '22222222222', '33333333333', '44444444444', '55555555555', '66666666666', '77777777777', '88888888888', '99999999999'  ); 
  if(strlen($nu_cpf) != 11 || in_array($nu_cpf, $ignore_list)) {
  
  	return false;
  
  	} else {
  
   for($i = 0; $i < 9; $i++){
   
   $d1 += $nu_cpf[$i] * (10 - $i);
   
    }
	
	$r1 = $d1 % 11;	
	$d1 = ($r1 > 1) ? (11 - $r1) : 0;	
	for($i = 0; $i < 9; $i++) {
	
	$d2 += $nu_cpf[$i] * (11 - $i);
	
	}
	
	$r2 = ($d2 + ($d1 * 2)) % 11;	
	$d2 = ($r2 > 1) ? (11 - $r2) : 0;
	
	return (substr($nu_cpf, -2) == $d1.$d2) ? true : false;
	}
	}
	
public function validCnpj($nu_cpf_cnpj)
	 	{
			$nu_cpf_cnpj = preg_replace( "@[./-]@", "", $nu_cpf_cnpj );
    if( strlen( $nu_cpf_cnpj ) <> 14 or !is_numeric( $nu_cpf_cnpj ) )
    {
    return false;
    }
    $k = 6;
    $soma1 = "";
    $soma2 = "";
    for( $i = 0; $i < 13; $i++ )
    {
    $k = $k == 1 ? 9 : $k;
    $soma2 += ( $nu_cpf_cnpj{$i} * $k );
    $k--;
    if($i < 12)
    {
    if($k == 1)
    {
    $k = 9;
    $soma1 += ( $nu_cpf_cnpj{$i} * $k );
    $k = 1;
    }
    else
    {
    $soma1 += ( $nu_cpf_cnpj{$i} * $k );
    }
    }
    }
    $digito1 = $soma1 % 11 < 2 ? 0 : 11 - $soma1 % 11;
    $digito2 = $soma2 % 11 < 2 ? 0 : 11 - $soma2 % 11;
    return ( $nu_cpf_cnpj{12} == $digito1 and $nu_cpf_cnpj{13} == $digito2 );
	
	}
// ######################################################################################################

public function lookupAluno($nu_termo){

	$sql = mysql_query("SELECT * FROM alunos WHERE nu_termo = '".$nu_termo."' AND id_status != 3 ") or die ("Erro 1");
	$row = mysql_num_rows($sql);
	if ( $row > 0 ){
	return true;
	} else {
	return false;
	}

}

public function inserirAluno($nu_termo,$in_antigo,$id_religiao,$nm_aluno,$id_sexo,$dt_nascimento,
		$dt_cadastro,$nm_mae,$te_profissao_pai,$te_profissao_mae,$id_analgesico,$nu_telefone_mae,$nm_trabalho_mae,
		$nm_pai,$nu_telefone_pai,$nm_trabalho_pai,
		$te_email,$nm_emergencia,$in_emergencia,$nm_alergia,
		$nm_restricao,$nm_doenca,$nm_plano,
		$nm_acidente,$nm_logra,$nu_logra,$nm_compl,$nm_bairro,$nm_cidade,$nu_cep,
		$nm_uf,$te_obs,$te_imagem){
		
		$dt_nascimento = substr($dt_nascimento,6,4)."-".substr($dt_nascimento,3,2)."-".substr($dt_nascimento,0,2);
		$dt_cadastro = substr($dt_cadastro,6,4)."-".substr($dt_cadastro,3,2)."-".substr($dt_cadastro,0,2);
			
		$sql = mysql_query("INSERT INTO alunos (nu_termo,in_antigo,id_religiao,nm_aluno,id_sexo,dt_nascimento,
		te_profissao_pai,te_profissao_mae,dt_cadastro,nm_mae,id_analgesico,nu_telefone_mae,nm_trabalho_mae,nm_pai,
		nu_telefone_pai,nm_trabalho_pai,te_email,nm_emergencia,in_emergencia,nm_alergia,
		nm_restricao,nm_doenca,nm_plano,
		nm_acidente,nm_logra,nu_logra,nm_compl,nm_bairro,nm_cidade,nu_cep,nm_uf,te_obs,te_imagem,id_usuario,id_ente) 
	VALUES('".$nu_termo."',".$in_antigo.",".$id_religiao.",'".$nm_aluno."',".$id_sexo.",'".$dt_nascimento."',
	'".$te_profissao_pai."','".$te_profissao_mae."','".$dt_cadastro."','".$nm_mae."',".$id_analgesico.",'".$nu_telefone_mae."','".$nm_trabalho_mae."','".$nm_pai."',
	'".$nu_telefone_pai."','".$nm_trabalho_pai."','".$te_email."','".$nm_emergencia."',".$in_emergencia.",'".$nm_alergia."',
		'".$nm_restricao."','".$nm_doenca."','".$in_plano."',
		'".$nm_acidente."','".$nm_logra."','".$nu_logra."','".$nm_compl."','".$nm_bairro."','".$nm_cidade."','".$nu_cep."','".$nm_uf."','".$te_obs."',
		'".$te_imagem."',".$_SESSION['id'].",".$_SESSION['id_ente'].")") 
	or die ("Erro 8");
	
	$selec = mysql_query("SELECT MAX(id_aluno) AS id_aluno FROM alunos") 
	or die ("Erro 9");
	$row = mysql_num_rows($selec);
	for ( $i=0; $i < $row; $i++ ){
	$id_aluno = mysql_result($selec, $i, "id_aluno");
	}
	
	// log ******************************************* 
		$dt_log = date("Y-m-d");
		$time = mktime(date('H')-3, date('i'), date('s'));
		$hora_local = gmdate("H:i:s", $time);
		$hora = substr($hora_local,0,2).substr($hora_local,2,3);
		$hr_log = $hora;
		$id_acao = 1;
		$nm_objeto = "Aluno";
		$nu_ip = getenv("REMOTE_ADDR");
		$id_usuario = $id_usuario;
		$inserir = mysql_query("INSERT INTO logs (dt_log,hr_log,id_usuario,id_acao,nm_objeto,nu_ip) 
		VALUES('".$dt_log."','".$hr_log."',".$_SESSION['id'].",".$id_acao.",'".$nm_objeto."','".$nu_ip."')");
	
	
	$msg_sucesso = "Registro gravado com sucesso";
	$_SESSION['msg_sucesso'] = $msg_sucesso;
	$_SESSION['id_aluno'] = $id_aluno;
	header ("location: aluno_termo.php");
}

public function editarAluno($st_controle,$te_profissao_pai,$te_profissao_mae,$opcao,$id_aluno,$checkbox,$nu_termo,$id_religiao,$nm_aluno,$id_sexo,$dt_nascimento,
		$dt_cadastro,$nm_mae,$nu_telefone_mae,$nm_trabalho_mae,
		$nm_pai,$nu_telefone_pai,$nm_trabalho_pai,
		$te_email,$nm_emergencia,$in_emergencia,$id_analgesico,$nm_alergia,
		$nm_restricao,$nm_doenca,$nm_plano,
		$nm_acidente,$nm_logra,$nu_logra,$nm_compl,$nm_bairro,$nm_cidade,$nu_cep,
		$nm_uf,$te_obs,$te_imagem_car,$te_imagem){
		
		$dt_nascimento = substr($dt_nascimento,6,4)."-".substr($dt_nascimento,3,2)."-".substr($dt_nascimento,0,2);
		$dt_cadastro = substr($dt_cadastro,6,4)."-".substr($dt_cadastro,3,2)."-".substr($dt_cadastro,0,2);	
	
		
		if ( ($st_controle == 2) || ($st_controle == 3) )
		$alt = mysql_query("UPDATE alunos SET st_controle = ".$st_controle." WHERE id_aluno = ".$id_aluno."");
		$alt = mysql_query("UPDATE alunos SET id_religiao = ".$id_religiao." WHERE id_aluno = ".$id_aluno."");
		$alt = mysql_query("UPDATE alunos SET nm_aluno = '".$nm_aluno."' WHERE id_aluno = ".$id_aluno."");
		$alt = mysql_query("UPDATE alunos SET id_sexo = ".$id_sexo." WHERE id_aluno = ".$id_aluno."");
		$alt = mysql_query("UPDATE alunos SET te_profissao_mae = '".$te_profissao_mae."' WHERE id_aluno = ".$id_aluno."");
		$alt = mysql_query("UPDATE alunos SET te_profissao_pai = '".$te_profissao_pai."' WHERE id_aluno = ".$id_aluno."");
		$alt = mysql_query("UPDATE alunos SET dt_nascimento = '".$dt_nascimento."' WHERE id_aluno = ".$id_aluno."");
		$alt = mysql_query("UPDATE alunos SET dt_cadastro = '".$dt_cadastro."' WHERE id_aluno = ".$id_aluno."");
		$alt = mysql_query("UPDATE alunos SET nm_mae = '".$nm_mae."' WHERE id_aluno = ".$id_aluno."");
		$alt = mysql_query("UPDATE alunos SET nm_pai = '".$nm_pai."' WHERE id_aluno = ".$id_aluno."");		
		$alt = mysql_query("UPDATE alunos SET nm_profissao_pai = '".$nm_profissao_pai."' WHERE id_aluno = ".$id_aluno."");
		$alt = mysql_query("UPDATE alunos SET nu_telefone_pai = '".$nu_telefone_pai."' WHERE id_aluno = ".$id_aluno."");
		$alt = mysql_query("UPDATE alunos SET nu_telefone_mae = '".$nu_telefone_mae."' WHERE id_aluno = ".$id_aluno."");
		$alt = mysql_query("UPDATE alunos SET nm_trabalho_mae = '".$nm_trabalho_mae."' WHERE id_aluno = ".$id_aluno."");
		$alt = mysql_query("UPDATE alunos SET nm_trabalho_pai = '".$nm_trabalho_pai."' WHERE id_aluno = ".$id_aluno."");
		$alt = mysql_query("UPDATE alunos SET nm_trabalho_pai = '".$nm_trabalho_pai."' WHERE id_aluno = ".$id_aluno."");
		$alt = mysql_query("UPDATE alunos SET te_email = '".$te_email."' WHERE id_aluno = ".$id_aluno."");
		$alt = mysql_query("UPDATE alunos SET nm_emergencia = '".$nm_emergencia."' WHERE id_aluno = ".$id_aluno."");
		$alt = mysql_query("UPDATE alunos SET in_emergencia = ".$in_emergencia." WHERE id_aluno = ".$id_aluno."");
		$alt = mysql_query("UPDATE alunos SET id_analgesico = ".$id_analgesico." WHERE id_aluno = ".$id_aluno."");
		$alt = mysql_query("UPDATE alunos SET nm_alergia = '".$nm_alergia."' WHERE id_aluno = ".$id_aluno."");
		$alt = mysql_query("UPDATE alunos SET nm_restricao = '".$nm_restricao."' WHERE id_aluno = ".$id_aluno."");
		$alt = mysql_query("UPDATE alunos SET nm_doenca = '".$nm_doenca."' WHERE id_aluno = ".$id_aluno."");
		$alt = mysql_query("UPDATE alunos SET nm_plano = '".$nm_plano."' WHERE id_aluno = ".$id_aluno."");
		$alt = mysql_query("UPDATE alunos SET nm_acidente = '".$nm_acidente."' WHERE id_aluno = ".$id_aluno."");
		$alt = mysql_query("UPDATE alunos SET nm_logra = '".$nm_logra."' WHERE id_aluno = ".$id_aluno."");
		$alt = mysql_query("UPDATE alunos SET nu_logra = '".$nu_logra."' WHERE id_aluno = ".$id_aluno."");
		$alt = mysql_query("UPDATE alunos SET nm_compl = '".$nm_compl."' WHERE id_aluno = ".$id_aluno."");
		$alt = mysql_query("UPDATE alunos SET nm_bairro = '".$nm_bairro."' WHERE id_aluno = ".$id_aluno."");
		$alt = mysql_query("UPDATE alunos SET nm_cidade = '".$nm_cidade."' WHERE id_aluno = ".$id_aluno."");
		$alt = mysql_query("UPDATE alunos SET nu_cep = '".$nu_cep."' WHERE id_aluno = ".$id_aluno."");
		$alt = mysql_query("UPDATE alunos SET nm_uf = '".$nm_uf."' WHERE id_aluno = ".$id_aluno."");
		$alt = mysql_query("UPDATE alunos SET te_obs = '".$te_obs."' WHERE id_aluno = ".$id_aluno."");
			if ($checkbox)
		$alt = mysql_query("UPDATE alunos SET te_imagem = '".$te_imagem."' WHERE id_aluno = ".$id_aluno."");
		
		// log ******************************************* 
		$dt_log = date("Y-m-d");
		$time = mktime(date('H')-3, date('i'), date('s'));
		$hora_local = gmdate("H:i:s", $time);
		$hora = substr($hora_local,0,2).substr($hora_local,2,3);
		$hr_log = $hora;
		$id_acao = 2;
		$nm_objeto = "Aluno";
		$nu_ip = getenv("REMOTE_ADDR");
		$id_usuario = $id_usuario;
		$inserir = mysql_query("INSERT INTO logs (dt_log,hr_log,id_usuario,id_acao,nm_objeto,nu_ip) 
		VALUES('".$dt_log."','".$hr_log."',".$_SESSION['id'].",".$id_acao.",'".$nm_objeto."','".$nu_ip."')");	
				
		$msg_sucesso = "Registro editado com sucesso";	
		$_SESSION['msg_sucesso'] = $msg_sucesso;
		$_SESSION['opcao'] = $opcao;
		$_SESSION['nm_profissao_pai'] = $nm_profissao_pai;
		$_SESSION['id_aluno'] = $id_aluno;
		if ($opcao == 1){
		header ("location: aluno_edit.php");
		} else if ($opcao == 3){
		header ("location: aluno_termo.php");
		} else {
		header ("location: aluno_lista.php");
		}
	}
	
public function verificarExcluirAluno($id_aluno){

	$sql = mysql_query("SELECT * FROM matriculas WHERE id_aluno = ".$id_aluno." AND id_status = 0 ") or die ("Erro 10");
	$row = mysql_num_rows($sql);
	if ( $row > 0 ){
	return true;
	} else {
	return false;
	}
}

public function excluirAluno($id_aluno,$opcao){

	$excluir = mysql_query("DELETE FROM alunos WHERE id_aluno = ".$id_aluno." ") or die ("Erro 11");
	
	// log ******************************************* 
		$dt_log = date("Y-m-d");
		$time = mktime(date('H')-3, date('i'), date('s'));
		$hora_local = gmdate("H:i:s", $time);
		$hora = substr($hora_local,0,2).substr($hora_local,2,3);
		$hr_log = $hora;
		$id_acao = 3;
		$nm_objeto = "Aluno";
		$nu_ip = getenv("REMOTE_ADDR");
		$id_usuario = $id_usuario;
		$inserir = mysql_query("INSERT INTO logs (dt_log,hr_log,id_usuario,id_acao,nm_objeto,nu_ip) 
		VALUES('".$dt_log."','".$hr_log."',".$_SESSION['id'].",".$id_acao.",'".$nm_objeto."','".$nu_ip."')");
	

	$msg_sucesso = "Registro excluido com sucesso";	
		$_SESSION['msg_sucesso'] = $msg_sucesso;
		$_SESSION['opcao'] = $opcao;
		if ($opcao == 1){
		header ("location: aluno_termo.php");
		} else if ($opcao == 3){
		unset($_SESSION['id_aluno']);
		header ("location: aluno_termo.php");
		} else if ($opcao == 4){
		unset($_SESSION['id_aluno']);
		header ("location: aluno_lista_dif.php");
		} else {
		header ("location: aluno_lista.php");
		}
}

public function pesquisarFuncionarioCpf($nu_cpf,$opcao){

	$sql = mysql_query("SELECT * FROM funcionarios WHERE nu_cpf = '".$nu_cpf."' ") or die ("Erro 12");
	$row = mysql_num_rows($sql);
	
	$_SESSION['nu_cpf'] = $nu_cpf;
	$_SESSION['opcao'] = $opcao;
	
	if ( $row > 0 ){
	$msg_excessao = "CPF: Funcionario já cadastrado";
	$_SESSION['msg_excessao'] = $msg_excessao;
	
	header ("location: funcionario_cpf.php");
	} else {
	
	header ("location: funcionario.php");
	}
}

public function inserirFuncionario($nm_funcionario,$nm_natural,$dt_nascimento,$nu_rg,$nm_orgao,$nu_carteira,$nu_serie,$id_graduacao,$nm_experiencia,$id_estado_civil,$nm_conjugue,$id_cargo,$nu_cpf,$id_sexo,$nu_telefone,$dt_admissao,$nm_logra,$nu_logra,$nm_compl,$nu_cep,$nm_bairro,$nm_cidade,$nm_uf,$te_obs,$opcao){
	//  ,nu_cpf,id_cargo,id_sexo,nu_telefone,te_obs
	//  ,'".$nu_cpf."',".$id_cargo.",'".$id_sexo."','".$nu_telefone."','".$te_obs."'
	$dt_nascimento = substr($dt_nascimento,6,4)."-".substr($dt_nascimento,3,2)."-".substr($dt_nascimento,0,2);
	$dt_admissao = substr($dt_admissao,6,4)."-".substr($dt_admissao,3,2)."-".substr($dt_admissao,0,2);
	
	$sql = mysql_query("INSERT INTO funcionarios (nm_funcionario,nm_natural,dt_nascimento,nu_rg,nm_orgao,nu_carteira,nu_serie,id_graduacao,nm_experiencia,id_estado_civil,nm_conjugue,id_cargo,nu_cpf,id_sexo,nu_telefone,dt_admissao,nm_logra,nu_logra,nm_compl,nu_cep,nm_bairro,nm_cidade,nm_uf,te_obs,id_usuario,id_ente) 
	VALUES('".$nm_funcionario."','".$nm_natural."','".$dt_nascimento."','".$nu_rg."','".$nm_orgao."','".$nu_carteira."','".$nu_serie."',".$id_graduacao.",'".$nm_experiencia."',".$id_estado_civil.",'".$nm_conjugue."',".$id_cargo.",'".$nu_cpf."','".$id_sexo."','".$nu_telefone."','".$dt_admissao."','".$nm_logra."','".$nu_logra."','".$nm_compl."','".$nu_cep."','".$nm_bairro."','".$nm_cidade."','".$nm_uf."','".$te_obs."',".$_SESSION['id_usuario'].",".$_SESSION['id_ente'].")") 
	or die ("Erro 13");
	
	$sql = mysql_query("SELECT MAX(id_funcionario) AS id_funcionario FROM funcionarios") or dir ("Erro 10");
	$row = mysql_num_rows($sql);
	for ( $i=0;$i < $row; $i++ ){
	$id_funcionario = mysql_result($sql, $i, "id_funcionario");
	}
	
	// log ******************************************* 
		$dt_log = date("Y-m-d");
		$time = mktime(date('H')-3, date('i'), date('s'));
		$hora_local = gmdate("H:i:s", $time);
		$hora = substr($hora_local,0,2).substr($hora_local,2,3);
		$hr_log = $hora;
		$id_acao = 1;
		$nm_objeto = "Funcionário";
		$nu_ip = getenv("REMOTE_ADDR");
		$id_usuario = $id_usuario;
		$inserir = mysql_query("INSERT INTO logs (dt_log,hr_log,id_usuario,id_acao,nm_objeto,nu_ip) 
		VALUES('".$dt_log."','".$hr_log."',".$_SESSION['id'].",".$id_acao.",'".$nm_objeto."','".$nu_ip."')");
	

	$msg_sucesso = "Registro gravado com sucesso";	
	$_SESSION['msg_sucesso'] = $msg_sucesso;
	$_SESSION['id_funcionario'] = $id_funcionario;		
	
	if ($opcao == "funcionario"){
	header ("location: escala.php");
	} else {
	header ("location: funcionario.php");
	}
}

public function editarFuncionario($id_funcionario,$nm_funcionario,$nm_natural,$dt_nascimento,$nu_rg,$nm_orgao,$nu_carteira,$nu_serie,$id_graduacao,$nm_experiencia,$id_estado_civil,$nm_conjugue,$id_cargo,$nu_cpf,$id_sexo,$nu_telefone,
$dt_admissao,$nm_logra,$nu_logra,$nm_compl,$nu_cep,$nm_bairro,$nm_cidade,$nm_uf,$te_obs,$opcao){

	$dt_nascimento = substr($dt_nascimento,6,4)."-".substr($dt_nascimento,3,2)."-".substr($dt_nascimento,0,2);
	$dt_admissao = substr($dt_admissao,6,4)."-".substr($dt_admissao,3,2)."-".substr($dt_admissao,0,2);
	
	$edit = mysql_query("UPDATE funcionarios SET nm_funcionario = '".$nm_funcionario."' WHERE id_funcionario = ".$id_funcionario."");
	$edit = mysql_query("UPDATE funcionarios SET nm_natural = '".$nm_natural."' WHERE id_funcionario = ".$id_funcionario."");
	$edit = mysql_query("UPDATE funcionarios SET dt_nascimento = '".$dt_nascimento."' WHERE id_funcionario = ".$id_funcionario."");
	$edit = mysql_query("UPDATE funcionarios SET nu_rg = '".$nu_rg."' WHERE id_funcionario = ".$id_funcionario."");
	$edit = mysql_query("UPDATE funcionarios SET nm_orgao = '".$nm_orgao."' WHERE id_funcionario = ".$id_funcionario."");
	$edit = mysql_query("UPDATE funcionarios SET nu_carteira = '".$nu_carteira."' WHERE id_funcionario = ".$id_funcionario."");
	$edit = mysql_query("UPDATE funcionarios SET nu_serie = '".$nu_serie."' WHERE id_funcionario = ".$id_funcionario."");
	$edit = mysql_query("UPDATE funcionarios SET id_graduacao = ".$id_graduacao." WHERE id_funcionario = ".$id_funcionario."");
	$edit = mysql_query("UPDATE funcionarios SET nm_experiencia = '".$nm_experiencia."' WHERE id_funcionario = ".$id_funcionario."");
	$edit = mysql_query("UPDATE funcionarios SET id_estado_civil = ".$id_estado_civil." WHERE id_funcionario = ".$id_funcionario."");
	$edit = mysql_query("UPDATE funcionarios SET nm_conjugue = '".$nm_conjugue."' WHERE id_funcionario = ".$id_funcionario."");
	$edit = mysql_query("UPDATE funcionarios SET id_cargo = ".$id_cargo." WHERE id_funcionario = ".$id_funcionario."");
	$edit = mysql_query("UPDATE funcionarios SET id_sexo = '".$id_sexo."' WHERE id_funcionario = ".$id_funcionario."");
	$edit = mysql_query("UPDATE funcionarios SET nu_telefone = '".$nu_telefone."' WHERE id_funcionario = ".$id_funcionario."");
	$edit = mysql_query("UPDATE funcionarios SET dt_admissao = '".$dt_admissao."' WHERE id_funcionario = ".$id_funcionario."");
	$edit = mysql_query("UPDATE funcionarios SET nm_logra = '".$nm_logra."' WHERE id_funcionario = ".$id_funcionario."");
	$edit = mysql_query("UPDATE funcionarios SET nu_logra = '".$nu_logra."' WHERE id_funcionario = ".$id_funcionario."");
	$edit = mysql_query("UPDATE funcionarios SET nm_compl = '".$nm_compl."' WHERE id_funcionario = ".$id_funcionario."");
	$edit = mysql_query("UPDATE funcionarios SET nu_cep = '".$nu_cep."' WHERE id_funcionario = ".$id_funcionario."");
	$edit = mysql_query("UPDATE funcionarios SET nm_bairro = '".$nm_bairro."' WHERE id_funcionario = ".$id_funcionario."");
	$edit = mysql_query("UPDATE funcionarios SET nm_cidade = '".$nm_cidade."' WHERE id_funcionario = ".$id_funcionario."");
	$edit = mysql_query("UPDATE funcionarios SET nm_uf = '".$nm_uf."' WHERE id_funcionario = ".$id_funcionario."");
	$edit = mysql_query("UPDATE funcionarios SET te_obs = '".$te_obs."' WHERE id_funcionario = ".$id_funcionario."");
	
	// log ******************************************* 
		$dt_log = date("Y-m-d");
		$time = mktime(date('H')-3, date('i'), date('s'));
		$hora_local = gmdate("H:i:s", $time);
		$hora = substr($hora_local,0,2).substr($hora_local,2,3);
		$hr_log = $hora;
		$id_acao = 2;
		$nm_objeto = "Funcionário";
		$nu_ip = getenv("REMOTE_ADDR");
		$id_usuario = $id_usuario;
		$inserir = mysql_query("INSERT INTO logs (dt_log,hr_log,id_usuario,id_acao,nm_objeto,nu_ip) 
		VALUES('".$dt_log."','".$hr_log."',".$_SESSION['id'].",".$id_acao.",'".$nm_objeto."','".$nu_ip."')");
	

	$msg_sucesso = "Registro editado com sucesso";	
	$_SESSION['msg_sucesso'] = $msg_sucesso;
	$_SESSION['id_funcionario'] = $id_funcionario;		
	
	if ($opcao == 1){
	header ("location: funcionario_edit.php");
	} else {
	header ("location: funcionario_lista.php");
	}
}

public function excluirFuncionario($id_funcionario,$opcao){



	
	// log ******************************************* 
		$dt_log = date("Y-m-d");
		$time = mktime(date('H')-3, date('i'), date('s'));
		$hora_local = gmdate("H:i:s", $time);
		$hora = substr($hora_local,0,2).substr($hora_local,2,3);
		$hr_log = $hora;
		$id_acao = 3;
		$nm_objeto = "Funcionário";
		$nu_ip = getenv("REMOTE_ADDR");
		$id_usuario = $id_usuario;
		$inserir = mysql_query("INSERT INTO logs (dt_log,hr_log,id_usuario,id_acao,nm_objeto,nu_ip) 
		VALUES('".$dt_log."','".$hr_log."',".$_SESSION['id'].",".$id_acao.",'".$nm_objeto."','".$nu_ip."')");
	

	$msg_sucesso = "Registro excluido com sucesso";	
	$_SESSION['msg_sucesso'] = $msg_sucesso;
	$_SESSION['id_funcionario'] = $id_funcionario;		
	
	if ($opcao == 1){
	header ("location: funcionario_edit.php");
	} else {
	header ("location: funcionario_lista.php");
	}
}

public function lookupTermo($nu_termo){

	$sql = mysql_query("SELECT * FROM alunos WHERE nu_termo = '".$nu_termo."' AND id_status != 3 ") or die ("Erro 14");
	$row = mysql_num_rows($sql);
	for ( $i=0;$i < $row; $i++ ){
	$id_aluno = mysql_result($sql, $i, "id_aluno");
	$nm_aluno = mysql_result($sql, $i, "nm_aluno");
	}
	$_SESSION['id_aluno'] = $id_aluno;
	$_SESSION['nm_aluno'] = $nm_aluno;
	
	if ( $row == 0 ){
	return true;
	} else {
	return false;
	}

}

public function lookupMatricula($id_aluno){

	$nu_ano = date("Y");
	$sql = mysql_query("SELECT * FROM matriculas WHERE id_aluno = ".$id_aluno." AND nu_ano = ".$nu_ano." ") or die ("Erro 15");
	$row = mysql_num_rows($sql);
	for ( $i=0;$i < $row; $i++ ){
	$id_aluno = mysql_result($sql, $i, "id_aluno");
	}
		
	if ( $row == 0 ){
	return false;
	} else {
	return true;
	}

}

public function limparMatriculas(){

	$sql = mysql_query("SELECT * FROM matriculas WHERE st_controle = 0 ");
	$row = mysql_num_rows($sql);
	for ( $i=0;$i < $row; $i++ ){
	$id_matricula = mysql_result($sql, $i, "id_matricula");
	}
	if ($id_matricula){
	$sql = mysql_query("DELETE FROM matriculas WHERE in_responsavel = 3 AND st_controle = 0") or die ("Erro 16");
	
	}

}

public function atualizarAntiguidade($id_aluno){

	$sql = mysql_query("SELECT MIN(matriculas.nu_ano) AS nu_ano, matriculas.id_aluno, matriculas.id_ente FROM matriculas 
	WHERE matriculas.id_aluno = ".$id_aluno." 
	AND matriculas.id_ente = ".$_SESSION['id_ente']." ") 
	or die ("Erro 161");
	$row = mysql_num_rows($sql);
	for ( $i=0;$i < $row; $i++ ){
	$nu_ano = mysql_result($sql, $i, "nu_ano");
	}
	
	$nu_ano_hoje = date("Y");	
	$nu = $nu_ano_hoje - $nu_ano;
	
	if ($nu > 1){
	$sql = mysql_query("UPDATE alunos SET in_antigo = 2 WHERE id_aluno = ".$id_aluno."") or die ("Erro 161.2");	
	} else {
	$sql = mysql_query("UPDATE alunos SET in_antigo = 1 WHERE id_aluno = ".$id_aluno."") or die ("Erro 161.2");	
	}

}

public function validarInclusaoMatricula($nu_ano,$id_aluno){
	
	$sql = mysql_query("SELECT * FROM matriculas WHERE nu_ano = ".$nu_ano."  AND id_aluno = ".$id_aluno." ") or die ("Erro 16.2");
	$row = mysql_num_rows($sql);
	
			
	if ( $row > 0 ){
	return true;
	} else {
	return false;
	}
}


public function inserirMatricula($nu_termo,$nu_cpf,$nu_rg,$id_turno,$nu_ano,$id_serie,$vl_matricula,$in_responsavel,$in_imagem,$te_obs){
	
	$sql = mysql_query("SELECT * FROM alunos WHERE nu_termo = '".$nu_termo."' AND id_status != 3 ") or die ("Erro 17");
	$row = mysql_num_rows($sql);
	for ( $i=0;$i < $row; $i++ ){
	$id_aluno = mysql_result($sql, $i, "id_aluno");
	$nm_mae = mysql_result($sql, $i, "nm_mae");
	$nu_telefone_mae = mysql_result($sql, $i, "nu_telefone_mae");
	$nm_trabalho_mae = mysql_result($sql, $i, "nm_trabalho_mae");
	$te_profissao_mae = mysql_result($sql, $i, "te_profissao_mae");
	$nm_pai = mysql_result($sql, $i, "nm_pai");
	$nu_telefone_pai = mysql_result($sql, $i, "nu_telefone_pai");
	$nm_trabalho_pai = mysql_result($sql, $i, "nm_trabalho_pai");
	$te_profissao_mae = mysql_result($sql, $i, "te_profissao_mae");
	$te_profissao_pai = mysql_result($sql, $i, "te_profissao_pai");
	$te_email = mysql_result($sql, $i, "te_email");
	$nm_logra = mysql_result($sql, $i, "nm_logra");
	$nu_logra = mysql_result($sql, $i, "nu_logra");
	$nm_compl = mysql_result($sql, $i, "nm_compl");
	$nu_cep = mysql_result($sql, $i, "nu_cep");
	$nm_bairro = mysql_result($sql, $i, "nm_bairro");
	$nm_cidade = mysql_result($sql, $i, "nm_cidade");
	$nm_uf = mysql_result($sql, $i, "nm_uf");
	}
		
	//$dt_matricula = substr($dt_matricula,6,4)."-".substr($dt_matricula,3,2)."-".substr($dt_matricula,0,2);
	$dt_matricula = date("Y-m-d");
	$vl_matricula = str_replace(",",".", $vl_matricula);
	//$nu_ano = date("Y");
	$sql = mysql_query("INSERT INTO matriculas (id_aluno,nu_cpf,nu_rg,id_turno,id_serie,vl_matricula,in_responsavel,dt_matricula,nu_ano,te_obs,id_usuario,in_imagem,id_ente) 
	VALUES(".$id_aluno.",'".$nu_cpf."','".$nu_rg."',".$id_turno.",".$id_serie.",'".$vl_matricula."',".$in_responsavel.",'".$dt_matricula."',".$nu_ano.",'".$te_obs."',".$_SESSION['id'].",".$in_imagem.",".$_SESSION['id_ente'].")") 
	or die ("Erro 18");
	
	$sql = mysql_query("SELECT MAX(id_matricula) AS id_matricula FROM matriculas") or dir ("Erro 19");
	$row = mysql_num_rows($sql);
	for ( $i=0;$i < $row; $i++ ){
	$id_matricula = mysql_result($sql, $i, "id_matricula");
	}		
		
	$_SESSION['id_aluno'] = $id_aluno;
	
	$edit = mysql_query("UPDATE alunos SET st_controle = 1 WHERE id_aluno = ".$id_aluno."");	
	
	if ($in_responsavel == 2) {	
	$sql = mysql_query("INSERT INTO responsaveis (nm_responsavel,id_parentesco,id_aluno,id_matricula,nu_telefone,nm_trabalho,te_profissao,te_email,nm_logra,nu_logra,nm_compl,nu_cep,id_usuario) 
	VALUES('".$nm_mae."',7,".$id_aluno.",".$id_matricula.",'".$nu_telefone_mae."','".$nm_trabalho_mae."','".$te_profissao_mae."','".$te_email."','".$nm_logra."','".$nu_logra."','".$nm_compl."','".$nu_cep."',".$_SESSION['id'].")") 
	or die ("Erro 20");
	$msg_sucesso = "Registro gravado com sucesso";	
	$_SESSION['msg_sucesso'] = $msg_sucesso;
	$_SESSION['id_matricula'] = $id_matricula;
	header ("location: matricula_termo.php");
	
	} else if ($in_responsavel == 1) {	
	$sql = mysql_query("INSERT INTO responsaveis (nm_responsavel,id_parentesco,id_aluno,id_matricula,nu_telefone,nm_trabalho,te_profissao,te_email,nm_logra,nu_logra,nm_compl,nu_cep,id_usuario) 
	VALUES('".$nm_pai."',6,".$id_aluno.",".$id_matricula.",'".$nu_telefone_pai."','".$nm_trabalho_pai."','".$te_profissao_pai."','".$te_email."','".$nm_logra."','".$nu_logra."','".$nm_compl."','".$nu_cep."',".$_SESSION['id'].")") 
	or die ("Erro 21");
	
	// log ******************************************* 
		$dt_log = date("Y-m-d");
		$time = mktime(date('H')-3, date('i'), date('s'));
		$hora_local = gmdate("H:i:s", $time);
		$hora = substr($hora_local,0,2).substr($hora_local,2,3);
		$hr_log = $hora;
		$id_acao = 1;
		$nm_objeto = "Matrícula";
		$nu_ip = getenv("REMOTE_ADDR");
		$id_usuario = $id_usuario;
		$inserir = mysql_query("INSERT INTO logs (dt_log,hr_log,id_usuario,id_acao,nm_objeto,nu_ip) 
		VALUES('".$dt_log."','".$hr_log."',".$_SESSION['id'].",".$id_acao.",'".$nm_objeto."','".$nu_ip."')");
	
	
	$msg_sucesso = "Registro gravado com sucesso";	
	$_SESSION['msg_sucesso'] = $msg_sucesso;
	$_SESSION['id_matricula'] = $id_matricula;
	header ("location: matricula_termo.php");
	} else {
	$_SESSION['id_matricula'] = $id_matricula;
	$_SESSION['id_responsavel'] = $id_responsavel;
	header ("location: responsavel.php");
	}
}

public function editarMatricula($id_matricula,$opcao,$nu_termo,$nu_cpf,$id_turno,$nu_ano,$id_serie,$vl_matricula,$in_imagem,$te_obs){

	

	$edit = mysql_query("UPDATE matriculas SET id_turno = ".$id_turno." WHERE id_matricula = ".$id_matricula."") or die ("Erro 22");
	$edit = mysql_query("UPDATE matriculas SET nu_ano = ".$nu_ano." WHERE id_matricula = ".$id_matricula."") or die ("Erro 22");
	$edit = mysql_query("UPDATE matriculas SET in_imagem = ".$in_imagem." WHERE id_matricula = ".$id_matricula."") or die ("Erro 22");
	$edit = mysql_query("UPDATE matriculas SET id_serie = ".$id_serie." WHERE id_matricula = ".$id_matricula."") or die ("Erro 22");
	$edit = mysql_query("UPDATE matriculas SET vl_matricula = '".$vl_matricula."' WHERE id_matricula = ".$id_matricula."") or die ("Erro 22");
	$edit = mysql_query("UPDATE matriculas SET te_obs = '".$te_obs."' WHERE id_matricula = ".$id_matricula."") or die ("Erro 22");
	
	// log ******************************************* 
		$dt_log = date("Y-m-d");
		$time = mktime(date('H')-3, date('i'), date('s'));
		$hora_local = gmdate("H:i:s", $time);
		$hora = substr($hora_local,0,2).substr($hora_local,2,3);
		$hr_log = $hora;
		$id_acao = 2;
		$nm_objeto = "Matrícula";
		$nu_ip = getenv("REMOTE_ADDR");
		$id_usuario = $id_usuario;
		$inserir = mysql_query("INSERT INTO logs (dt_log,hr_log,id_usuario,id_acao,nm_objeto,nu_ip) 
		VALUES('".$dt_log."','".$hr_log."',".$_SESSION['id'].",".$id_acao.",'".$nm_objeto."','".$nu_ip."')");
	
	
	$msg_sucesso = "Registro editado com sucesso";	
	$_SESSION['msg_sucesso'] = $msg_sucesso;
	$_SESSION['id_matricula'] = $id_matricula;		
	
	if ($opcao == 1){
	header ("location: matricula.php");
	} else {
	header ("location: matricula_lista.php");
	}
}
public function excluirMatricula($id_matricula,$id_aluno,$opcao){

	
	$excluir = mysql_query("DELETE FROM matriculas WHERE id_matricula = ".$id_matricula." ") or die ("Erro 23");
	$excluir = mysql_query("DELETE FROM responsaveis WHERE id_matricula = ".$id_matricula." ") or die ("Erro 24");
	
	$sql = mysql_query("UPDATE alunos SET st_controle = 0 WHERE id_aluno = ".$id_aluno."");
	
	// log ******************************************* 
		$dt_log = date("Y-m-d");
		$time = mktime(date('H')-3, date('i'), date('s'));
		$hora_local = gmdate("H:i:s", $time);
		$hora = substr($hora_local,0,2).substr($hora_local,2,3);
		$hr_log = $hora;
		$id_acao = 3;
		$nm_objeto = "Matrícula";
		$nu_ip = getenv("REMOTE_ADDR");
		$id_usuario = $id_usuario;
		$inserir = mysql_query("INSERT INTO logs (dt_log,hr_log,id_usuario,id_acao,nm_objeto,nu_ip) 
		VALUES('".$dt_log."','".$hr_log."',".$_SESSION['id'].",".$id_acao.",'".$nm_objeto."','".$nu_ip."')");
	
	
	$msg_sucesso = "Registro excluido com sucesso";	
	$_SESSION['msg_sucesso'] = $msg_sucesso;
	$_SESSION['id_matricula'] = $id_matricula;		
	
	if ($opcao == 1){
	header ("location: matricula.php");
	} else {
	header ("location: matricula_lista.php");
	}
}

public function inserirResponsavel($id_matricula,$id_aluno,$nm_responsavel,$id_parentesco,$nu_telefone,$nm_trabalho,$te_profissao,$te_email,$nm_logra,$nu_logra,$nm_compl,$nu_cep,$nm_bairro,$nm_cidade,$nm_uf){

	$sql = mysql_query("INSERT INTO responsaveis (id_matricula,id_aluno,nm_responsavel,id_parentesco,nu_telefone,nm_trabalho,te_profissao,te_email,nm_logra,nu_logra,nu_cep,nm_bairro,nm_cidade,nm_uf,id_usuario,id_ente) 
	VALUES(".$id_matricula.",".$id_aluno.",'".$nm_responsavel."',".$id_parentesco.",'".$nu_telefone."','".$nm_trabalho."','".$te_profissao."','".$te_email."','".$nm_logra."','".$nu_logra."','".$nu_cep."','".$nm_bairro."','".$nm_cidade."','".$nm_uf."',".$_SESSION['id_usuario'].",".$_SESSION['id_ente'].")") 
	or die ("Erro 26");
	
	$sql = mysql_query("SELECT MAX(id_responsavel) AS id_responsavel FROM responsaveis") or dir ("Erro 27");
	$row = mysql_num_rows($sql);
	for ( $i=0;$i < $row; $i++ ){
	$id_responsavel = mysql_result($sql, $i, "id_responsavel");
	}
	
	$sql = mysql_query("UPDATE matriculas SET st_controle = 1 WHERE id_matricula = ".$id_matricula."") or die ("Erro 28");
	
	// log ******************************************* 
		$dt_log = date("Y-m-d");
		$time = mktime(date('H')-3, date('i'), date('s'));
		$hora_local = gmdate("H:i:s", $time);
		$hora = substr($hora_local,0,2).substr($hora_local,2,3);
		$hr_log = $hora;
		$id_acao = 1;
		$nm_objeto = "Responsável";
		$nu_ip = getenv("REMOTE_ADDR");
		$id_usuario = $id_usuario;
		$inserir = mysql_query("INSERT INTO logs (dt_log,hr_log,id_usuario,id_acao,nm_objeto,nu_ip) 
		VALUES('".$dt_log."','".$hr_log."',".$_SESSION['id'].",".$id_acao.",'".$nm_objeto."','".$nu_ip."')");
	
	
	$msg_sucesso = "Registro gravado com sucesso";	
	$_SESSION['msg_sucesso'] = $msg_sucesso;
	$_SESSION['id_responsavel'] = $id_responsavel;
		
	
	header ("location: responsavel.php");
	
}

public function excluirResponsavel($id_matricula,$id_aluno,$opcao){

	$excluir = mysql_query("DELETE FROM matriculas WHERE id_matricula = ".$id_matricula." ") or die ("Erro 29");
	$excluir = mysql_query("DELETE FROM responsaveis WHERE id_matricula = ".$id_matricula." ") or die ("Erro 30");
	
	$sql = mysql_query("UPDATE alunos SET st_controle = 0 WHERE id_aluno = ".$id_aluno."") or die ("Erro 31");
	
	// log ******************************************* 
		$dt_log = date("Y-m-d");
		$time = mktime(date('H')-3, date('i'), date('s'));
		$hora_local = gmdate("H:i:s", $time);
		$hora = substr($hora_local,0,2).substr($hora_local,2,3);
		$hr_log = $hora;
		$id_acao = 3;
		$nm_objeto = "Responsável";
		$nu_ip = getenv("REMOTE_ADDR");
		$id_usuario = $id_usuario;
		$inserir = mysql_query("INSERT INTO logs (dt_log,hr_log,id_usuario,id_acao,nm_objeto,nu_ip) 
		VALUES('".$dt_log."','".$hr_log."',".$_SESSION['id'].",".$id_acao.",'".$nm_objeto."','".$nu_ip."')");
	

	$msg_sucesso = "Registro excluido com sucesso";	
	$_SESSION['msg_sucesso'] = $msg_sucesso;
	$_SESSION['id_responsavel'] = $id_responsavel;
	header ("location: matricula_termo.php");
}

public function editarResponsavel($opcao,$id_responsavel,$nm_responsavel,$id_parentesco,$nu_telefone,$nm_trabalho,$te_profissao,$te_email,$nm_logra,$nu_logra,$nm_compl,$nu_cep,$nm_bairro,$nm_cidade,$nm_uf){

	$alt = mysql_query("UPDATE responsaveis SET nm_responsavel = '".$nm_responsavel."' WHERE id_responsavel = ".$id_responsavel."");
   $alt = mysql_query("UPDATE responsaveis SET nu_telefone = '".$nu_telefone."' WHERE id_responsavel = ".$id_responsavel."");
	$alt = mysql_query("UPDATE responsaveis SET nm_trabalho = '".$nm_trabalho."' WHERE id_responsavel = ".$id_responsavel."");
	$alt = mysql_query("UPDATE responsaveis SET id_parentesco = ".$id_parentesco." WHERE id_responsavel = ".$id_responsavel."");
	$alt = mysql_query("UPDATE responsaveis SET te_profissao = '".$te_profissao."' WHERE id_responsavel = ".$id_responsavel."");
	$alt = mysql_query("UPDATE responsaveis SET te_email = '".$te_email."' WHERE id_responsavel = ".$id_responsavel."");
	$alt = mysql_query("UPDATE responsaveis SET nm_logra = '".$nm_logra."' WHERE id_responsavel = ".$id_responsavel."");
	$alt = mysql_query("UPDATE responsaveis SET nu_logra = '".$nu_logra."' WHERE id_responsavel = ".$id_responsavel."");
	$alt = mysql_query("UPDATE responsaveis SET nm_compl = '".$nm_compl."' WHERE id_responsavel = ".$id_responsavel."");
	$alt = mysql_query("UPDATE responsaveis SET nu_cep = '".$nu_cep."' WHERE id_responsavel = ".$id_responsavel."");
	$alt = mysql_query("UPDATE responsaveis SET nm_bairro = '".$nm_bairro."' WHERE id_responsavel = ".$id_responsavel."");
	$alt = mysql_query("UPDATE responsaveis SET nm_cidade = '".$nm_cidade."' WHERE id_responsavel = ".$id_responsavel."");
	$alt = mysql_query("UPDATE responsaveis SET nm_uf = '".$nm_uf."' WHERE id_responsavel = ".$id_responsavel."");
	
	// log ******************************************* 
		$dt_log = date("Y-m-d");
		$time = mktime(date('H')-3, date('i'), date('s'));
		$hora_local = gmdate("H:i:s", $time);
		$hora = substr($hora_local,0,2).substr($hora_local,2,3);
		$hr_log = $hora;
		$id_acao = 2;
		$nm_objeto = "Responsável";
		$nu_ip = getenv("REMOTE_ADDR");
		
		$inserir = mysql_query("INSERT INTO logs (dt_log,hr_log,id_usuario,id_acao,nm_objeto,nu_ip) 
		VALUES('".$dt_log."','".$hr_log."',".$_SESSION['id'].",".$id_acao.",'".$nm_objeto."','".$nu_ip."')");
	

	$msg_sucesso = "Registro editado com sucesso";	
	$_SESSION['msg_sucesso'] = $msg_sucesso;	
	
	if ($opcao == 1){
	$_SESSION['id_responsavel'] = $id_responsavel;
	header ("location: responsavel_edit.php");
	} else if ($opcao == 3){
	$_SESSION['id_responsavel'] = $id_responsavel;
	header ("location: responsavel.php");
	} else {
	header ("location: responsavel_lista.php");
	}
}

public function pesquisarBoletoCpf($nu_cpf){

	$sql = mysql_query("SELECT * FROM boletos WHERE nu_cpf = '".$nu_cpf."' ") or die ("Erro 34");
	$row = mysql_num_rows($sql);
			
	if ( $row > 0 ){
	$msg_excessao = "CPF: Boleto já cadastrado";
	$_SESSION['msg_excessao'] = $msg_excessao;
	
	header ("location: boleto_cpf.php");
	} else {
	$_SESSION['nu_cpf'] = $nu_cpf;
	header ("location: boleto.php");
	}
}

public function inserirBoleto($nm_cedente,$id_banco,$nu_agencia,$nu_conta,$nu_cpf,$nu_nosso,$dt_vencto,
	$vl_docto,$nm_sacado,$te_email,$nm_logra,$nu_logra,$nu_cep,$nm_bairro,$nm_cidade,$nm_uf){
	
	$dt_vencto = substr($dt_vencto,6,4)."-".substr($dt_vencto,3,2)."-".substr($dt_vencto,0,2);
	
	$sql = mysql_query("INSERT INTO boletos (nm_cedente,id_banco,nu_agencia,nu_conta,nu_cpf,nu_nosso,dt_vencto,vl_docto,nm_sacado,te_email,
	nm_logra,nu_logra,nu_cep,nm_bairro,nm_cidade,nm_uf,id_usuario) 
	VALUES('".$nm_cedente."',".$id_banco.",'".$nu_agencia."','".$nu_conta."','".$nu_cpf."','".$nu_nosso."','".$dt_vencto."','".$vl_docto."','".$nm_sacado."','".$te_email."',
	'".$nm_logra."','".$nu_logra."','".$nu_cep."','".$nm_bairro."','".$nm_cidade."','".$nm_uf."',".$_SESSION['id_usuario'].")") 
	or die ("Erro 35");
	
	$sql = mysql_query("SELECT MAX(id_boleto) AS id_boleto FROM boletos") or dir ("Erro 30");
	$row = mysql_num_rows($sql);
	for ( $i=0;$i < $row; $i++ ){
	$id_boleto = mysql_result($sql, $i, "id_boleto");
	}
	
	$msg_sucesso = "Registro gravado com sucesso";	
	$_SESSION['msg_sucesso'] = $msg_sucesso;
	$_SESSION['id_boleto'] = $id_boleto;
	header ("location: boleto.php");
	}
	
public function verificarExcluirAanalgesico($id_analgesico){

	$sql = mysql_query("SELECT * FROM alunos WHERE id_analgesico = ".$id_analgesico." ") or die ("Erro 36");
	$row = mysql_num_rows($sql);
	if ( $row > 0 ){
	return true;
	} else {
	return false;
	}
}

public function excluirAnalgesico($id_analgesico,$opcao){

	$excluir = mysql_query("DELETE FROM analgesicos WHERE id_analgesico = ".$id_analgesico." ") or die ("Erro 37");
	
	// log ******************************************* 
		$dt_log = date("Y-m-d");
		$time = mktime(date('H')-3, date('i'), date('s'));
		$hora_local = gmdate("H:i:s", $time);
		$hora = substr($hora_local,0,2).substr($hora_local,2,3);
		$hr_log = $hora;
		$id_acao = 3;
		$nm_objeto = "Analgésico";
		$nu_ip = getenv("REMOTE_ADDR");
		$id_usuario = $id_usuario;
		$inserir = mysql_query("INSERT INTO logs (dt_log,hr_log,id_usuario,id_acao,nm_objeto,nu_ip) 
		VALUES('".$dt_log."','".$hr_log."',".$_SESSION['id'].",".$id_acao.",'".$nm_objeto."','".$nu_ip."')");
	
	
	$msg_sucesso = "Registro excluido com sucesso";	
	$_SESSION['msg_sucesso'] = $msg_sucesso;
		
	if ($opcao == 1){
	header ("location: analgesico.php");
	} else {
	header ("location: analgesico_lista.php");
	}	
}

public function inserirAnalgesico($nm_analgesico){

	$sql = mysql_query("INSERT INTO analgesicos (nm_analgesico,id_usuario) 
	VALUES('".$nm_analgesico."',".$_SESSION['id'].")") 
	or die ("Erro 38");
	
	$sql = mysql_query("SELECT MAX(id_analgesico) AS id_analgesico FROM analgesicos") or dir ("Erro 32");
	$row = mysql_num_rows($sql);
	for ( $i=0;$i < $row; $i++ ){
	$id_analgesico = mysql_result($sql, $i, "id_analgesico");
	}	

	
	// log ******************************************* 
	$dt_log = date("Y-m-d");
	$time = mktime(date('H')-3, date('i'), date('s'));
	$hora_local = gmdate("H:i:s", $time);
	$hora = substr($hora_local,0,2).substr($hora_local,2,3);
	$hr_log = $hora;
	$id_acao = 1;
	$nm_objeto = "Analgésico";
	$nu_ip = getenv("REMOTE_ADDR");
		
	$inserir = mysql_query("INSERT INTO logs (dt_log,hr_log,id_usuario,id_acao,nm_objeto,nu_ip) 
	VALUES('".$dt_log."','".$hr_log."',".$_SESSION['id'].",".$id_acao.",'".$nm_objeto."','".$nu_ip."')");
	
	$msg_sucesso = "Registro gravado com sucesso";	
	$_SESSION['msg_sucesso'] = $msg_sucesso;
	
	header ("location: analgesico.php");
}

public function editarAnalgesico($nm_analgesico,$id_analgesico,$opcao){
	
	$alt = mysql_query("UPDATE analgesicos SET nm_analgesico = '".$nm_analgesico."' WHERE id_analgesico = ".$id_analgesico."");
	
	// log ******************************************* 
	$dt_log = date("Y-m-d");
	$time = mktime(date('H')-3, date('i'), date('s'));
	$hora_local = gmdate("H:i:s", $time);
	$hora = substr($hora_local,0,2).substr($hora_local,2,3);
	$hr_log = $hora;
	$id_acao = 2;
	$nm_objeto = "Analgésico";
	$nu_ip = getenv("REMOTE_ADDR");
		
	$inserir = mysql_query("INSERT INTO logs (dt_log,hr_log,id_usuario,id_acao,nm_objeto,nu_ip) 
	VALUES('".$dt_log."','".$hr_log."',".$_SESSION['id'].",".$id_acao.",'".$nm_objeto."','".$nu_ip."')");
	
	$msg_sucesso = "Registro editado com sucesso";	
	$_SESSION['msg_sucesso'] = $msg_sucesso;
	
	if ($opcao == 1){
	$_SESSION['id_analgesico'] = $id_analgesico;
	header ("location: analgesico_edit.php");
	} else {
	header ("location: analgesico_lista.php");
	}	
}

public function verificarExcluirReligiao($id_religiao){

	$sql = mysql_query("SELECT * FROM alunos WHERE id_religiao = ".$id_religiao." ") or die ("Erro 36.1");
	$row = mysql_num_rows($sql);
	if ( $row > 0 ){
	return true;
	} else {
	return false;
	}
}

public function excluirReligiao($id_religiao,$opcao){

	$excluir = mysql_query("DELETE FROM religioes WHERE id_religiao = ".$id_religiao." ") or die ("Erro 36.2");
	
	// log ******************************************* 
		$dt_log = date("Y-m-d");
		$time = mktime(date('H')-3, date('i'), date('s'));
		$hora_local = gmdate("H:i:s", $time);
		$hora = substr($hora_local,0,2).substr($hora_local,2,3);
		$hr_log = $hora;
		$id_acao = 3;
		$nm_objeto = "Religião";
		$nu_ip = getenv("REMOTE_ADDR");
		$id_usuario = $id_usuario;
		$inserir = mysql_query("INSERT INTO logs (dt_log,hr_log,id_usuario,id_acao,nm_objeto,nu_ip) 
		VALUES('".$dt_log."','".$hr_log."',".$_SESSION['id'].",".$id_acao.",'".$nm_objeto."','".$nu_ip."')");
	
	
	$msg_sucesso = "Registro excluido com sucesso";	
	$_SESSION['msg_sucesso'] = $msg_sucesso;
		
	if ($opcao == 1){
	header ("location: religiao.php");
	} else {
	header ("location: religiao_lista.php");
	}	
}

public function editarReligiao($nm_religiao,$id_religiao,$opcao){
	
	$alt = mysql_query("UPDATE religioes SET nm_religiao = '".$nm_religiao."' WHERE id_religiao = ".$id_religiao."");
	
	// log ******************************************* 
	$dt_log = date("Y-m-d");
	$time = mktime(date('H')-3, date('i'), date('s'));
	$hora_local = gmdate("H:i:s", $time);
	$hora = substr($hora_local,0,2).substr($hora_local,2,3);
	$hr_log = $hora;
	$id_acao = 2;
	$nm_objeto = "Religião";
	$nu_ip = getenv("REMOTE_ADDR");
		
	$inserir = mysql_query("INSERT INTO logs (dt_log,hr_log,id_usuario,id_acao,nm_objeto,nu_ip) 
	VALUES('".$dt_log."','".$hr_log."',".$_SESSION['id'].",".$id_acao.",'".$nm_objeto."','".$nu_ip."')");
	
	$msg_sucesso = "Registro editado com sucesso";	
	$_SESSION['msg_sucesso'] = $msg_sucesso;
	
	if ($opcao == 1){
	$_SESSION['id_analgesico'] = $id_analgesico;
	header ("location: religiao_edit.php");
	} else {
	header ("location: religiao_lista.php");
	}	
}


public function inserirReligiao($nm_religiao){

	$sql = mysql_query("INSERT INTO religioes (nm_religiao,id_usuario) 
	VALUES('".$nm_religiao."',".$_SESSION['id'].")") 
	or die ("Erro 38.1");
	
	$sql = mysql_query("SELECT MAX(id_religiao) AS id_religiao FROM religioes") or dir ("Erro 38.2");
	$row = mysql_num_rows($sql);
	for ( $i=0;$i < $row; $i++ ){
	$id_religiao = mysql_result($sql, $i, "id_religiao");
	}	

	
	// log ******************************************* 
	$dt_log = date("Y-m-d");
	$time = mktime(date('H')-3, date('i'), date('s'));
	$hora_local = gmdate("H:i:s", $time);
	$hora = substr($hora_local,0,2).substr($hora_local,2,3);
	$hr_log = $hora;
	$id_acao = 1;
	$nm_objeto = "Religião";
	$nu_ip = getenv("REMOTE_ADDR");
		
	$inserir = mysql_query("INSERT INTO logs (dt_log,hr_log,id_usuario,id_acao,nm_objeto,nu_ip) 
	VALUES('".$dt_log."','".$hr_log."',".$_SESSION['id'].",".$id_acao.",'".$nm_objeto."','".$nu_ip."')");
	
	$msg_sucesso = "Registro gravado com sucesso";	
	$_SESSION['msg_sucesso'] = $msg_sucesso;
	
	header ("location: religiao.php");
}


public function ticarMatricula($id_matricula,$id_aluno,$opcao){
	
	$sql = mysql_query("SELECT * FROM matriculas WHERE id_matricula = ".$id_matricula."") or dir ("Erro 39");
	$row = mysql_num_rows($sql);
	for ( $i=0;$i < $row; $i++ ){
	$st_boleto = mysql_result($sql, $i, "st_boleto");
	}
	if ($st_boleto == 0) {
	$sql = mysql_query("UPDATE matriculas SET st_boleto = 1 WHERE id_aluno = ".$id_aluno."");
	} else {
	$sql = mysql_query("UPDATE matriculas SET st_boleto = 0 WHERE id_aluno = ".$id_aluno."");
	$sql = mysql_query("UPDATE matriculas SET dt_vencto = '0000-00-00' WHERE id_aluno = ".$id_aluno."");
	}
	// log ******************************************* 
		$dt_log = date("Y-m-d");
		$time = mktime(date('H')-3, date('i'), date('s'));
		$hora_local = gmdate("H:i:s", $time);
		$hora = substr($hora_local,0,2).substr($hora_local,2,3);
		$hr_log = $hora;
		$id_acao = 1;
		$nm_objeto = "Financeiro";
		$nu_ip = getenv("REMOTE_ADDR");
		$id_usuario = $id_usuario;
		$inserir = mysql_query("INSERT INTO logs (dt_log,hr_log,id_usuario,id_acao,nm_objeto,nu_ip) 
		VALUES('".$dt_log."','".$hr_log."',".$_SESSION['id'].",".$id_acao.",'".$nm_objeto."','".$nu_ip."')");
	
	
	$msg_sucesso = "Registro editado com sucesso";	
	$_SESSION['msg_sucesso'] = $msg_sucesso;
	$_SESSION['id_matricula'] = $id_matricula;		
	
	if ($opcao == 1){
	header ("location: matricula.php");
	} else {
	header ("location: matricula_lista.php");
	}
}
public function editarFinanceiro($id_matricula,$opcao,$dt_vencto){

	$dt_vencto = substr($dt_vencto,6,4)."-".substr($dt_vencto,3,2)."-".substr($dt_vencto,0,2);
	$edit = mysql_query("UPDATE matriculas SET dt_vencto = '".$dt_vencto."' WHERE id_matricula = ".$id_matricula."") or die ("Erro 22");
	
	// log ******************************************* 
		$dt_log = date("Y-m-d");
		$time = mktime(date('H')-3, date('i'), date('s'));
		$hora_local = gmdate("H:i:s", $time);
		$hora = substr($hora_local,0,2).substr($hora_local,2,3);
		$hr_log = $hora;
		$id_acao = 2;
		$nm_objeto = "Financeiro";
		$nu_ip = getenv("REMOTE_ADDR");
		$id_usuario = $id_usuario;
		$inserir = mysql_query("INSERT INTO logs (dt_log,hr_log,id_usuario,id_acao,nm_objeto,nu_ip) 
		VALUES('".$dt_log."','".$hr_log."',".$_SESSION['id'].",".$id_acao.",'".$nm_objeto."','".$nu_ip."')");
	
	
	$msg_sucesso = "Registro editado com sucesso";	
	$_SESSION['msg_sucesso'] = $msg_sucesso;
	$_SESSION['id_matricula'] = $id_matricula;		
		
	header ("location: financeiro_lista.php");
	
}

public function copiarDados(){

	$host = "mysql.lauraware.com.br";//host do banco
	$user = "lauraware04";//usuario do banco
	$senha = "m4r4v1";//senha do banco 
	$dia = date("Ymd");
	//$host = "localhost";//host do banco
	//$user = "root";//usuario do banco
	//$senha = "";//senha do banco 
	//$db = "cpa";
	$resp = system("mysqldump --host=$host --user=$user --password=$senha --databases lauraware04 > backup_ceb.sql") ;
	$resp = system("mysqldump --host=$host --user=$user --password=$senha --databases lauraware04 > bd/".$dia."_backup_ceb.sql") ;
	//$resp = system('mysqldump -u root -p cpa > backup.sql') ;
	//$resp = system("mysqldump --host=$host --user=$user --password=$senha --databases lauraware01 > c:\util\apls_php\bds\pessoal.sql") ;
	//$resp = system("mysqldump --host=$host --user=$user --password=$senha --databases $db > cpa.sql");
	
	//$resp = system("mysqldump --host=$host --user=$user --password=$senha --all-databases > dump.sql");
	
	$resp = "rm *.sql";
	
	unset($_SESSION['msg_backup']);
	unset($_SESSION['clique']);
	
	header ("location: index.php");
}

}
?>