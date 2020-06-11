<?php
session_start();

 include "cabecalho/cabecalho.php";
 $msg_sucesso = @$_SESSION['msg_sucesso'];
 $msg_excessao = @$_SESSION['msg_excessao'];
 
 $dt_inicio = @$_SESSION['dt_inicio'];
 $dt_inicio == "" ? $dt_inicio = @date("d/m/Y") : $dt_inicio = $dt_inicio;
 $dt_fim = @$_SESSION['dt_fim'];
 $dt_fim == "" ? $dt_fim = @date("d/m/Y") : $dt_fim = $dt_fim;
 $opcao = @$_SESSION['opcao'];
 $id_turno = @$_SESSION['id_turno'];
   
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
	document.formulario.dt_inicio.focus();
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
</script>
</head>
<link rel="stylesheet" href="css/filadelfia.css" type="text/css">
<link rel="SHORTCUT ICON" href="<?php echo $icon;?>"/>
<body bgcolor="#F5F5F5" onLoad="javascript:caixas()">

<form name="formulario" id="formulario" method="post" action="pesquisa_controller.php" >

  <table width="60%" border="0" cellspacing="0" cellpadding="0" align="center">
    <tr> 
      <td colspan="2" class="labelCentro">&nbsp;</td>
    </tr>
    <tr> 
      <td colspan="2" class="labelCentro">&nbsp;</td>
    </tr>
    <tr> 
      <td colspan="2" class="labelCentro">&nbsp;</td>
    </tr>
    <tr> 
      <td colspan="2" class="labelCentro">&nbsp;</td>
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
      <td colspan="2" class="labelEsquerda"><strong>Pesquisa:&nbsp;<?php echo $opcao;?></strong></td>
    </tr>
    <tr> 
      <td colspan="2" class="labelEsquerda">&nbsp;</td>
    </tr>
    <tr> 
      <td colspan="2" class="labelEsquerda">&nbsp;</td>
    </tr>
    <tr> 
      <td class="labelDireita">&nbsp;</td>
      <td class="labelEsquerda">&nbsp;</td>
    </tr>
    <tr> 
      <td width="25%" class="labelDireita">Data Início:</td>
      <td width="75%" class="labelEsquerda">
        <?php
		require 'classes/calendario.php';	
		$calendario_campo = new calendario;
		$calendario_campo->nome_campo="dt_inicio";
		$calendario_campo->value_campo=@$dt_inicio;
		$calendario_campo->criar_campo();
		 ?>
      </td>
    </tr>
    <tr> 
      <td width="25%" class="labelDireita">Data Fim:</td>
      <td width="75%" class="labelEsquerda">
        <?php
		$calendario_campo->nome_campo="dt_fim";
		$calendario_campo->value_campo=@$dt_fim;
		$calendario_campo->criar_campo();
		 ?>
      </td>
    </tr>
    <tr> 
      <td class="labelDireita">&nbsp;</td>
      <td class="labelEsquerda">&nbsp;</td>
    </tr>
    <tr> 
      <td colspan="2" class="labelEsquerda"><hr></td>
    </tr>
    <tr> 
      <td colspan="2" class="labelEsquerda"><input type="hidden" name="opcao" value="<?php echo $opcao;?>"> 
      </td>
    </tr>
    <tr> 
      <td colspan="6" class="labelCentro"><input name="pesquisarData" type="submit" value="Pesquisar" /> 
        <input name="volta" type="button" id="volta" value="Cancelar" onClick="javascript:executar('cancela_controller.php?cancelarOperacao=cancelarOperacao')" /> 
      </td>
    </tr>
  </table>
</form> 

</body>
<?php
 $calendario_campo->criar_java_campo();
?>

<?php
} else {
 include "rodape/rodape.php";
 }
 ?>
</html>
