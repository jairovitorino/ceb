<?php
session_start();

$msg_excessao = @$_SESSION['msg_excessao'];
$msg_sucesso = @$_SESSION['msg_sucesso'];
 include "cabecalho/cabecalho.php";
  $login_centro = @$_SESSION['login_centro'];
   
 if ($login_centro){
 ?>
<html>
<head>
<title><?php echo $titulo;?></title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<script language="JavaScript">
function move_i(what) { what.style.background='#CCCCCC'; }
function move_o(what) { what.style.background='#F5F5F5'; }
function del(delUrl) {
  if (confirm("Excluir o registro?")) {
    document.location = delUrl;
  }
}
function cancelar(delUrl) { 
    document.location = delUrl; 
}
</script>
</head>
<link rel="stylesheet" href="css/filadelfia.css" type="text/css">
<link rel="SHORTCUT ICON" href="<?php echo $icon;?>"/>
<title>Contr&ocirc;le acad&ecirc;mico</title>
<body bgcolor="#F5F5F5" onLoad="javascript:caixas()">
<table width="47%" border="0" cellspacing="0" cellpadding="0" align="center">
    <tr> 
      <td colspan="5" class="labelCentro">&nbsp;</td>
    </tr>
    <tr> 
      <td colspan="5" class="labelCentro">&nbsp;</td>
    </tr>
    <tr> 
      <td colspan="5" class="labelCentro">&nbsp;</td>
    </tr>
    <tr> 
      <td colspan="5" class="labelCentro">&nbsp;</td>
    </tr>
    <tr> 
      <td colspan="5" class="labelEsquerda"> 
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
      <td colspan="5" class="labelEsquerda"> </td>
    </tr>
    <tr> 
      <td colspan="5" class="labelCentro"><hr></td>
    </tr>
    <tr> 
      <td colspan="5" class="labelEsquerda"> </td>
    </tr>
    <tr> 
      <td colspan="5" class="labelCentro"><strong>Senhas</strong></td>
    </tr>
    <tr> 
      <td colspan="5" class="labelEsquerda">&nbsp;</td>
    </tr>
  <tr bgcolor="#999999"> 
    <td width="31%" class="labelEsquerda"><font color="#FFFFFF">Nome</font></td>
    <td width="47%" class="labelEsquerda"><font color="#FFFFFF">Status</font></td>
    <td width="12%" class="labelCentro">&nbsp;</td>
    <td width="10%" class="labelCentro"><font color="#FFFFFF">Trocar</font></td>
  </tr>
  <?php
  require_once("class/conexao.php");
		$mysql = new Mysql();
		$mysql->conectar();
  if ($login_centro == 'admin'){
  $sql = mysql_query("SELECT * FROM usuarios, status WHERE usuarios.id_status <> 5 AND usuarios.id_status = status.id_status ORDER BY nm_usuario");
  $row = mysql_num_rows($sql);
  } else {
  //$sql = mysql_query("SELECT * FROM usuarios ORDER BY nm_usuario");
  $sql = mysql_query("SELECT * FROM usuarios, status 
  WHERE usuarios.id_status = status.id_status 
  AND nm_login <> 'admin' 
  AND id_usuario = ".$_SESSION['id_usuario']." 
  ORDER BY nm_usuario");
  $row = mysql_num_rows($sql);
  }
    for ( $i=0; $i < $row; $i++ ){
  $id_usuario= mysql_result($sql, $i, "id_usuario");
   $nm_usuario = mysql_result($sql, $i, "nm_usuario");
   $nm_status = mysql_result($sql, $i, "nm_status");
   
  ?>
  <tr onMouseOver="move_i(this)" onMouseOut="move_o(this)"> 
    <td class="labelEsquerda"><?php echo $nm_usuario;?></td>
    <td class="labelEsquerda"><?php echo $nm_status;?></td>
    <td class="labelCentro">&nbsp;</td>
    <td class="labelCentro"><a href="usuario_controller.php?abrirSenha=abrirSenha&id_usuario=<?php echo $id_usuario;?>"> 
      <img src="img/insert.gif" width="10" height="10"></a></td>
  </tr>
  <?php } ?>
  <tr> 
    <td colspan="4" class="labelCentro"><hr></td>
  </tr>
  <tr> 
    <td class="labelEsquerda"><strong>Itens:&nbsp;<?php echo $i;?></strong></td>
    <td colspan="2" class="labelEsquerda">&nbsp;</td>
    <td class="labelCentro">&nbsp;</td>
  </tr>
</table>
<p align="center">
  <input name="volta" type="button" id="volta" value="Cancelar" onClick="javascript:cancelar('cancela_controller.php?cancelarOperacao=cancelarOperacao')" />
</p>
</body>
<?php
} else {
 include "rodape/rodape.php";
 }
 ?>
</html>
