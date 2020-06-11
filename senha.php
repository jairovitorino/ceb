<?php
session_start();

 include "cabecalho/cabecalho.php";
 $msg_sucesso = @$_SESSION['msg_sucesso'];
 $msg_excessao = @$_SESSION['msg_excessao'];
$in_acesso = @$_SESSION['in_acesso'];
 $id_usuario = @$_SESSION['id_usuario'];
 
 $login_centro = @$_SESSION['login_centro'];
   
 if ($login_centro){
?>
<html>
<head>
<title><?php echo $titulo;?></title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<script language="JavaScript">
function caixas(){
	//document.getElementById('dt_ini').focus();
	document.formulario.dt_ini.focus();
}
function cancelar(delUrl) { 
    document.location = delUrl; 
}
</script>
</head>
<link rel="stylesheet" href="css/filadelfia.css" type="text/css">
<link rel="SHORTCUT ICON" href="<?php echo $icon;?>"/>
<body bgcolor="#F5F5F5" onLoad="javascript:caixas()">
<form name="form1" method="post" action="usuario_controller.php" onSubmit="valida_dados(this)">
  <table width="40%" border="0" cellspacing="0" cellpadding="0" align="center">
    <tr> 
      <td colspan="2" class="labelCentro">&nbsp;</td>
    </tr>
    <tr> 
      <td colspan="2" class="labelCentro">&nbsp;</td>
    </tr>
    <tr> 
      <td colspan="2" class="labelEsquerda">&nbsp;</td>
    </tr>
    <tr> 
      <td colspan="2" class="labelEsquerda"> 
        <?php
  if ($msg_sucesso){
   echo "<div align='left'>
   <img src='img/msg_azul.png' width='20' height='20'><font color='#0099CC' size='2' face='Arial, Helvetica, sans-serif'> $msg_sucesso </font></div>";
     } else if ($msg_excessao){
	   echo "<div align='left'>
   <img src='img/msg_vermelha.gif' width='20' height='20'><font color='#FF0000' size='2' face='Arial, Helvetica, sans-serif'> $msg_excessao </font></div>";
	 }	
   ?>
      </td>
    </tr>
    <tr> 
      <td colspan="2" class="labelEsquerda"> </td>
    </tr>
    <tr> 
      <td colspan="2" class="labelCentro"><hr></td>
    </tr>
    <tr> 
      <td colspan="2" class="labelEsquerda"> </td>
    </tr>
    <tr> 
      <td colspan="2" class="labelEsquerda"><strong>Dados do Usu&aacute;rio</strong></td>
    </tr>
    <?php
	 require_once("class/conexao.php");
		$mysql = new Mysql();
		$mysql->conectar();
		$sql = mysql_query("SELECT * FROM usuarios, status WHERE usuarios.id_status = status.id_status AND id_usuario = ".$id_usuario." ");
		$row = mysql_num_rows($sql);
		for ($i=0;$i<$row;$i++){
		$id_usuario = mysql_result($sql, $i, "id_usuario");
		$nm_usuario = mysql_result($sql, $i, "nm_usuario");
		$nm_login = mysql_result($sql, $i, "nm_login");
		$id_status = mysql_result($sql, $i, "id_status");
		$nm_status = mysql_result($sql, $i, "nm_status");
		}
	?>
    <tr> 
      <td width="28%" class="labelDireita">Nome</td>
      <td class="labelEsquerda"><?php echo $nm_usuario;?></td>
    </tr>
    <tr> 
      <td width="28%" class="labelDireita">Login:</td>
      <td class="labelEsquerda"><?php echo $nm_login;?></td>
  
    </tr>
    <tr>
      <td class="labelDireita">Senha:</td>
      <td class="labelEsquerda"><input type="password" name="nm_senha" size="30" maxlength="50"></td>
    </tr>
    <tr> 
      <td width="28%" class="labelDireita">Re-Senha:</td>
      <td class="labelEsquerda"><input type="password" name="re_senha" size="30" maxlength="50"></td>
    </tr>
    <tr> 
      <td colspan="2" class="labelEsquerda">&nbsp;</td>
    </tr>
    <tr> 
      <td colspan="2" class="labelEsquerda">&nbsp;</td>
    </tr>
    <tr> 
      <td colspan="2" class="labelEsquerda">&nbsp;</td>
    </tr>
    <tr> 
      <td colspan="2" class="labelEsquerda"> 
        <input type="hidden" name="id_usuario" value="<?php echo $id_usuario;?>"></td>
    </tr>
    <tr> 
      <td colspan="2" class="labelCentro"><input name="editarSenha" type="submit" value="Editar"> 
        <input type="button" name="volta" value="Cancelar" onClick="cancelar('cancela_controller.php?cancelarOperacao=cancelarOperacao')"> 
      </td>
    </tr>
  </table>
</form> 
</body>

<?php

 include "rodape/rodape.php";
 
 ?>
 <?php }?>
</html>
