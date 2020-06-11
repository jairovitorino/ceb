<?php
session_start();

 include "cabecalho/cabecalho.php";
 $msg_sucesso = @$_SESSION['msg_sucesso'];
 $msg_excessao = @$_SESSION['msg_excessao'];

 
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
	document.formulario.nm_filho.focus();
}
function cancelar(delUrl) { 
    document.location = delUrl; 
}
function formatar(src, mask){
  var i = src.value.length;
    var saida = mask.substring(0,1);
	  var texto = mask.substring(i)
	  if (texto.substring(0,1) != saida)
	    {
		    src.value += texto.substring(0,1);
			 }
			 }

/*function alteraMaiusculo(){
	var valor = document.getElementById("campo").nm_macom;
	var novoTexto = valor.value.toUpperCase();
	valor.value = novoTexto;
	}*/
function del(delUrl) {
  if (confirm("Deseja excluir?")) {
    document.location = delUrl;
  }
}
</script>
</head>
<link rel="stylesheet" href="css/filadelfia.css" type="text/css">
<link rel="SHORTCUT ICON" href="<?php echo $icon;?>"/>
<body bgcolor="#F5F5F5" onLoad="javascript:caixas()">
<form name="formulario" id="campo" method="post" action="controller.php" onSubmit="valida_dados(this)">
  <table width="40%" border="0" cellspacing="0" cellpadding="0" align="center">
    <tr> 
      <td class="labelCentro">&nbsp;</td>
    </tr>
    <tr> 
      <td class="labelCentro">&nbsp;</td>
    </tr>
    <tr> 
      <td class="labelCentro">&nbsp;</td>
    </tr>
    <tr> 
      <td class="labelCentro">&nbsp;</td>
    </tr>
    <tr> 
      <td class="labelEsquerda"> 
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
      <td class="labelEsquerda"> </td>
    </tr>
    <tr> 
      <td class="labelCentro"><hr></td>
    </tr>
    <tr> 
      <td class="labelEsquerda"> </td>
    </tr>
    <tr> 
      <td class="labelEsquerda"><strong>Informa&ccedil;&otilde;es</strong></td>
    </tr>
    <tr> 
      <td class="labelJustificado">&nbsp;</td>
    </tr>
    <tr> 
      <td class="labelJustificado"><strong>Dados t&eacute;cnicos do Sistema</strong> 
      </td>
    </tr>
    <tr> 
      <td class="labelJustificado">Cliente: Centro Educacional Batista Filad&eacute;lfia</td>
    </tr>
    <tr> 
      <td class="labelJustificado">Implanta&ccedil;&atilde;o: 07/05/2018<font color="#0000FF" size="1" face="Arial, Helvetica, sans-serif">&nbsp; 
        </font></td>
    </tr>
    <tr>
      <td class="labelJustificado">&Uacute;ltima atualiza&ccedil;&atilde;o: 18/01/2019 
        as 02:58</td>
    </tr>
    <tr> 
      <td class="labelJustificado">Multplataforma: Windows, linux, android.</td>
    </tr>
    <tr> 
      <td class="labelJustificado">Linguagem: PHP.5.0</td>
    </tr>
    <tr> 
      <td class="labelJustificado">Banco de dados: MySQL 5.0.</td>
    </tr>
	<tr> 
      <td class="labelJustificado">Gerenciador de vers&atilde;o: github.</td>
    </tr>
    <tr> 
      <td class="labelJustificado">&nbsp;</td>
    </tr>
    <tr> 
      <td class="labelJustificado"><strong>Jairo Vitorino da Silva(*)</strong></td>
    </tr>
    <tr> 
      <td class="labelJustificado">(*)Analista de Sistemas, especialista em tecnologia 
        da infoma&ccedil;&atilde;o, atuando na &aacute;rea de desenvolvimento 
        de sistemas, testes, especifica&ccedil;&atilde;o, prospec&ccedil;&atilde;o, 
        banco de dados, treinamentos, e An&aacute;lise de Pontos de Fun&ccedil;&atilde;o.</td>
    </tr>
    <tr> 
      <td class="labelEsquerda"><hr></td>
    </tr>
    <tr> 
      <td class="labelEsquerda">e-mail: jairovitorino@hotmail.com</td>
    </tr>
    <tr> 
      <td colspan="5" class="labelCentro"> <input name="volta" type="button" id="volta" value="Cancelar" onClick="javascript:cancelar('cancela_controller.php?cancelarOperacao=cancelarOperacao')" /> 
      </td>
    </tr>
  </table>
</form> 
</body>

<?php
} else {
 include "rodape/rodape.php";
 }
 ?>
</html>
