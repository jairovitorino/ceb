<?php
session_start();

 include "cabecalho/cabecalho.php";
 $msg_sucesso = @$_SESSION['msg_sucesso'];
 $msg_excessao = @$_SESSION['msg_excessao'];
 $nm_usuario = @$_SESSION['nm_usuario'];
 $nm_login = @$_SESSION['nm_login'];
 $nm_senha = @$_SESSION['nm_senha'];
 $re_senha = @$_SESSION['re_senha'];
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
<link rel="stylesheet" href="css/textos.css" type="text/css">
<link rel="stylesheet" href="css/estilo.css" type="text/css">
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
    <tr> 
      <td class="labelDireita">&nbsp;</td>
      <td class="labelEsquerda">&nbsp;</td>
    </tr>
    <tr> 
      <td width="39%" class="labelDireita">Nome</td>
      <td width="61%" class="labelEsquerda"><input name="nm_usuario" value="<?php echo $nm_usuario;?>" type="text" size="50" maxlength="50"></td>
    </tr>
    <tr> 
      <td width="39%" class="labelDireita">E-mail</td>
      <td width="61%" class="labelEsquerda"><input name="nm_login" value="<?php echo $nm_login;?>" type="text" size="40" maxlength="50"></td>
    </tr>
    <tr> 
      <td colspan="2" class="labelDireita">Lí e concordo com os <a href="termo_condicoes_uso.php" target="_blank">Termos 
        e cond&ccedil;&otilde;es de uso</a>&nbsp; <input type="checkbox" name="termo" value="checkbox"></td>
    </tr>
    <tr> 
      <td colspan="2" class="labelEsquerda"><hr></td>
    </tr>
    <tr> 
      <td colspan="2" class="labelEsquerda"><input type="hidden" name="inserirUsuario"></td>
    </tr>
    <tr> 
      <td colspan="6" class="labelCentro"><input name="grava" type="submit" id="grava" value="Gravar"> 
        <input name="volta" type="button" id="volta" value="Cancelar" onClick="javascript:cancelar('cancela_controller.php?cancelarOperacao=cancelarOperacao')" /> 
      </td>
    </tr>
  </table>
</form> 
</body>

<?php

 include "rodape/rodape.php";
 
 ?>
</html>
