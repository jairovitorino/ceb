<?php
session_start();

 include "cabecalho/cabecalho.php";
 $msg_sucesso = @$_SESSION['msg_sucesso'];
 $msg_excessao = @$_SESSION['msg_excessao'];
 
 $nm_objeto = @$_SESSION['nm_objeto'];
 
 $opcao = @$_SESSION['opcao'];
 
 if ($opcao == "matricula"){
 $label = "matricula";
 $sublabel = "Aluno";
 } else if ($opcao == "aluno"){
 $label = "aluno";
 $sublabel = "Nome";
 } else if ($opcao == "veiculo") {
 $label = "veiculo";
 $sublabel = "Placa";
 } else if ($opcao == "proprietario") {
 $label = "proprietario";
 $sublabel = "Nome";
  } else if ($opcao == "funcionario") {
 $label = "funcionario";
 $sublabel = "Nome";
   } else if ($opcao == "flutuante") {
 $label = "flutuante";
 $sublabel = "Nome";
  } else if ($opcao == "escala") {
 $label = "escala";
 $sublabel = "Nome";
 
  } else if ($opcao == "aluno_matr") {
 $label = "aluno";
 $sublabel = "Nome";
 
 } else if ($opcao == "matr_termo") {
 $label = "matrícula";
 $sublabel = "Termo";

  }
 
   
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
	document.formulario.nm_objeto.focus();
}
function executar(delUrl) { 
    document.location = delUrl; 
}
/*function alteraMaiusculo(){
	var valor = document.getElementById("campo").nm_macom;
	var novoTexto = valor.value.toUpperCase();
	valor.value = novoTexto;
	}*/
function barra(objeto){
if (objeto.value.length == 2 || objeto.value.length == 5 ){
objeto.value = objeto.value+"/";
}
}
function traco_placa(objeto){
if (objeto.value.length == 3 || objeto.value.length == 3 ){
objeto.value = objeto.value+":";
}
}

</script>
</head>
<link rel="stylesheet" href="css/filadelfia.css" type="text/css">
<link rel="SHORTCUT ICON" href="<?php echo $icon;?>"/>
<body bgcolor="#F5F5F5" onLoad="javascript:caixas()">

<form name="formulario" id="formulario" method="post" action="pesquisa_controller.php" >

  <table width="60%" border="0" cellspacing="0" cellpadding="0" align="center">
    <!--DWLayoutTable-->
    <tr> 
      <td colspan="2" class="labelCentro">&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr> 
      <td height="18" colspan="2" class="labelEsquerda"> 
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
      <td></td>
    </tr>
    <tr> 
      <td colspan="2" class="labelEsquerda"> </td>
      <td>&nbsp;</td>
    </tr>
    <tr> 
      <td height="21" colspan="2" class="labelCentro"><hr></td>
      <td>&nbsp;</td>
    </tr>
  
    <tr> 
      <td height="18" colspan="2" class="labelEsquerda"><strong>Pesquisa:&nbsp;<?php echo $label;?></strong></td>
      <td></td>
    </tr>
    <tr> 
      <td colspan="2" class="labelEsquerda">&nbsp;</td>  
      <td>&nbsp;</td>
    </tr>
	<?php if ($sublabel == "Placa"){?>
    <tr> 
      <td width="283" height="22" class="labelDireita"><?php echo $sublabel;?>:</td>
      <td width="850" class="labelEsquerda"><input type="text" name="nm_objeto" id="nm_objeto" value="<?php echo $nm_objeto;?>" size="8" maxlength="8" onKeyUp="traco_placa(this)"></td>
      <td>&nbsp;</td>
    </tr>
	<?php } else {?>
	<tr> 
      <td width="283" height="22" class="labelDireita"><?php echo $sublabel;?>:</td>
      <td width="850" class="labelEsquerda"><input type="text" name="nm_objeto" id="nm_objeto" value="<?php echo $nm_objeto;?>" size="30" maxlength="50" ></td>
      <td>&nbsp;</td>
    </tr>
    <?php }?>	
    <tr> 
      <td class="labelDireita">&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr> 
      <td colspan="2" class="labelEsquerda"><hr></td>
      <td>&nbsp;</td>
    </tr>
    <tr> 
      <td colspan="2" class="labelEsquerda"><input type="hidden" name="opcao" value="<?php echo $opcao;?>"></td>
      <td>&nbsp;</td>
    </tr>
    <tr> 
      <td colspan="3" class="labelCentro"><input name="pesquisarObjeto" type="submit" value="Pesquisar" /> 
        <input name="volta" type="button" id="volta" value="Cancelar" onClick="javascript:executar('cancela_controller.php?cancelarOperacao=cancelarOperacao')" /> 
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
