<?php
session_start();

 include "cabecalho/cabecalho.php";
 $msg_sucesso = @$_SESSION['msg_sucesso'];
 $msg_excessao = @$_SESSION['msg_excessao'];

	$nu_cpf = @$_SESSION['nu_cpf'];
	
		   
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
	document.formulario.nu_cpf.focus();
}
function executar(delUrl) { 
    document.location = delUrl; 
}

/*function alteraMaiusculo(){
	var valor = document.getElementById("campo").nm_macom;
	var novoTexto = valor.value.toUpperCase();
	valor.value = novoTexto;
	}*/

</script>
</head>
<link rel="stylesheet" href="css/filadelfia.css" type="text/css">
<link rel="SHORTCUT ICON" href="<?php echo $icon;?>"/>
<body bgcolor="#F5F5F5" onLoad="javascript:caixas()">
<form name="formulario" id="formulario" method="post" action="boleto_controller.php" >
  <table width="41%" border="0" cellspacing="0" cellpadding="0" align="center">
    <tr> 
      <td colspan="7" class="labelCentro">&nbsp;</td>
    </tr>
    <tr> 
      <td colspan="7" class="labelCentro">&nbsp;</td>
    </tr>
    <tr> 
      <td colspan="7" class="labelCentro">&nbsp;</td>
    </tr>
    <tr> 
      <td colspan="7" class="labelCentro">&nbsp;</td>
    </tr>
    <tr> 
      <td colspan="7" class="labelEsquerda"> 
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
      <td colspan="7" class="labelEsquerda"> </td>
    </tr>
    <tr> 
      <td colspan="7" class="labelCentro"><hr></td>
    </tr>
    <tr> 
      <td colspan="7" class="labelEsquerda"> </td>
    </tr>
    <tr> 
      <td colspan="7" class="labelEsquerda"><strong>Boleto</strong></td>
    </tr>
    <tr> 
      <td colspan="7" class="labelEsquerda">&nbsp;</td>
    </tr>
    <tr> 
      <td colspan="7" class="labelEsquerda">&nbsp;</td>
    </tr>
    <tr> 
      <td width="27%" class="labelDireita">CPF<font color="#FF0000">*</font>:</td>
      <td width="73%" class="labelEsquerda"><input name="nu_cpf" type="text" value="<?php echo $nu_cpf;?>" size="11" maxlength="11"></td>
    </tr>
    <tr> 
      <td class="labelDireita">&nbsp;</td>
      <td class="labelEsquerda">&nbsp;</td>
    </tr>
    <tr> 
      <td colspan="7" class="labelDireita">(<font color="#FF0000">*</font>) Preenchimento 
        obrigat&oacute;rio</td>
    </tr>
    <tr> 
      <td colspan="7" class="labelCentro"><hr></td>
    </tr>
	  <tr> 
      <td colspan="7" class="labelCentro"><input name="pesquisarBoletoCpf" type="submit" value="Pesquisar" /> 
        <input name="volta" type="button" id="volta" value="Cancelar" onClick="javascript:executar('cancela_controller.php?cancelarOperacao=cancelarOperacao')" /> 
      </td>
    </tr>	
  </table>
</form> 
</body>

<?php

} else {

 }
 ?>
</html>
