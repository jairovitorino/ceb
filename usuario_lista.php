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
<body bgcolor="#F5F5F5" onLoad="javascript:caixas()">
<table width="47%" border="0" cellspacing="0" cellpadding="0" align="center">
  <tr> 
    <td colspan="6" class="labelCentro">&nbsp;</td>
  </tr>
  <tr> 
    <td colspan="6" class="labelCentro">&nbsp;</td>
  </tr>
  <tr> 
    <td colspan="6" class="labelCentro">&nbsp;</td>
  </tr>
  <tr> 
    <td colspan="6" class="labelCentro">USU&Aacute;RIOS</td>
  </tr>
  <tr> 
    <td colspan="6" class="labelCentro">&nbsp;</td>
  </tr>
  <tr> 
    <td colspan="6" class="labelEsquerda"> 
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
    <td colspan="6" class="labelCentro"><hr></td>
  </tr>
  <tr bgcolor="#999999"> 
    <td width="41%" class="labelEsquerda"><font color="#FFFFFF">Nome</font></td>
    <td width="13%" class="labelEsquerda"><font color="#FFFFFF">Status</font></td>
    <td width="8%" class="labelCentro"><font color="#FFFFFF">Senha</font></td>
    <td width="9%" class="labelCentro"><font color="#FFFFFF">Liberar</font></td>
    <td width="10%" class="labelCentro"><font color="#FFFFFF">Excluir</font></td>
    <td width="9%" class="labelCentro"><font color="#FFFFFF">Configurar</font></td>
  </tr>
  <?php
  require_once("class/conexao.php");
		$mysql = new Mysql();
		$mysql->conectar();
  if ($login_centro == 'admin'){
  $sql = mysql_query("SELECT * FROM usuarios, status WHERE usuarios.id_status = status.id_status AND nm_login != 'admin' AND id_usuario != 58 ORDER BY nm_usuario");
  $row = mysql_num_rows($sql);
  } else {
  //$sql = mysql_query("SELECT * FROM usuarios ORDER BY nm_usuario");
  $sql = mysql_query("SELECT * FROM usuarios, status WHERE usuarios.id_status = status.id_status AND id_usuario = ".$_SESSION['id_usuario']." ORDER BY nm_usuario");
  $row = mysql_num_rows($sql);
  }
    for ( $i=0; $i < $row; $i++ ){
  $id_usuario= mysql_result($sql, $i, "id_usuario");
   $nm_usuario = mysql_result($sql, $i, "nm_usuario");
   $id_status = mysql_result($sql, $i, "id_status");
   $id_status == 3 ? $libera = "<a href='controller/usuario_controller.php?abrirBoasVindas=abrirBoasVindas&id_usuario=$id_usuario&opcao=2'><img src='img/insert.gif' width='10' height='10'></a>" : $libera = "";  
   
   $nm_status = mysql_result($sql, $i, "nm_status");
   
  ?>
  <tr onMouseOver="move_i(this)" onMouseOut="move_o(this)"> 
    <td class="labelEsquerda"><?php echo $nm_usuario;?></td>
    <td class="labelEsquerda"><?php echo $nm_status;?></td>
    <td class="labelCentro"><a href="usuario_controller.php?abrirSenha=abrirSenha&id_usuario=<?php echo $id_usuario;?>"><img src="img/insert.gif" width="10" height="10"></a></td>
    <?php if ($_SESSION['login'] == 'admin'){?>
    <td class="labelCentro"><?php echo $libera; ?></a></td>
    <td class="labelCentro"><a href="javascript:del('usuario_controller.php?excluirUsuario=excluirUsuario&id_usuario=<?php echo $id_usuario;?>&opcao=2')"><img src="img/excluir2.gif" width="10" height="10"></a></td>
    <?php } else {?>
    <td class="labelCentro">--</td>
    <td width="2%" class="labelCentro">--</td>
    <?php }?>
    <td width="8%" class="labelCentro"><a href="usuario_controller.php?abrirUsuarioAlt=abrirUsuarioAlt&id_usuario=<?php echo $id_usuario;?>"> 
      <img src="img/insert.gif" width="10" height="10"></a></td>
  </tr>
  <?php } ?>
  <tr> 
    <td colspan="6" class="labelCentro"><hr></td>
  </tr>
  <tr> 
    <td class="labelEsquerda"><strong>Itens:&nbsp;<?php echo $i;?></strong></td>
    <td colspan="4" class="labelEsquerda">&nbsp;</td>
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
