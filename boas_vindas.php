<?php
session_start();
 include "cabecalho/cabecalho.php";
 $id_usuario = @$_SESSION['id_usuario'];
 //CONECTA AO MYSQL              
	require_once("class/conexao.php");
	$mysql = new Mysql();
	$mysql->conectar(); 
		
	 $sql = mysql_query("SELECT * FROM usuarios 
	 WHERE id_usuario = ".$id_usuario." ");
    $row = mysql_num_rows($sql);
	for ( $i=0; $i < $row; $i++ ){
	$id_usuario = mysql_result($sql, $i, "id_usuario");
	$nm_usuario = mysql_result($sql, $i, "nm_usuario");
	$nm_login = mysql_result($sql, $i, "nm_login");
	$id_status = mysql_result($sql, $i, "id_status");
	}
	if ($id_status != 1){
	$up = mysql_query("UPDATE usuarios SET id_status = 2 WHERE id_usuario = ".$id_usuario."") or die ("Erro 1");
	}
	// emails para quem será enviado o formulário
 	 $emailenviar = $nm_login;
 	 $destino = $emailenviar;
  		$assunto = "Liberação ao sistema CONDOMÍNIO PARATINGA";
 
  // É necessário indicar que o formato do e-mail é html
  $headers  = 'MIME-Version: 1.0' . "\r\n";
      $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
      $headers .= 'From: $nm_usuario <$nm_login>';
  //$headers .= "Bcc: $EmailPadrao\r\n";
	$enviaremail = mail($destino, $assunto, $arquivo, $headers);
  	if($enviaremail){
  	$mgm = "E-MAIL ENVIADO COM SUCESSO! <br> O link será enviado para o e-mail fornecido no formulário";
  	echo " <meta http-equiv='refresh' content='10;URL=contato.php'>";
 	 } else {
  	$mgm = "ERRO AO ENVIAR E-MAIL!";
  		echo "";
  }
  $login_centro = @$_SESSION['login_centro'];
   
 if ($login_centro){
?>
<html>
<head>
<title>Contr&ocirc;le Acad&ecirc;mico</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>
<link rel="stylesheet" href="css/filadelfia.css" type="text/css">
<link rel="SHORTCUT ICON" href="img/teacher.png"/>
<body bgcolor="#F5F5F5">
<p class="labelEsquerda">&nbsp;</p>
<p class="labelEsquerda">&nbsp;</p>
<p class="labelEsquerda">Ol&aacute; <?php echo $nm_usuario;?>. </p>
<p class="labelEsquerda">Seja bem vindo ao sistema do CENTRO EDUCACIONAL BATISTA 
  FILADELFIA</p>
<p class="labelEsquerda">Acesse-o com os seguintes dados:</p>
<blockquote> 
  <p class="labelEsquerda"> * E-mail: <?php echo $nm_login;?><br>
    * Link: <a href="https://www.lauraware.com.br/paratinga">www.lauraware.com.br/paratinga</a></p>
  <p class="labelEsquerda">Atenciosamente,</p>
  </blockquote>
 <p class="labelEsquerda"> Administrador do Sistema</p>
</body>
<?php

} else {
 include "rodape/rodape.php";
 }
 ?>
</html>
