<?php
session_start();

 include "cabecalho/cabecalho.php";
 $msg_sucesso = @$_SESSION['msg_sucesso'];
 $msg_excessao = @$_SESSION['msg_excessao'];
	
	$nm_analgesico = @$_SESSION['nm_analgesico'];
		
	//$nu_cpf = "13959930500";
   
 $login_centro = @$_SESSION['login_centro'];
   
 if ($login_centro){
?>
<html>
<head>
<title>Contr&ocirc;le acad&ecirc;mico</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<script language="JavaScript">

function caixas(){
	//document.getElementById('dt_ini').focus();
	document.formulario.nm_analgesico.focus();
}
function executar(delUrl) { 
    document.location = delUrl; 
}

/*function alteraMaiusculo(){
	var valor = document.getElementById("campo").nm_macom;
	var novoTexto = valor.value.toUpperCase();
	valor.value = novoTexto;
	}*/

function foto(){
var saida = document.getElementById('te_imagem');
saida.value =  document.getElementById('upload').value;
}
function combo_sex(){
var i = document.getElementById("id_sexo").options[document.getElementById("id_sexo").selectedIndex].text;
   document.getElementById("nm_sexo").value = i;
}
function del(delUrl) {
  if (confirm("Deseja excluir?")) {
    document.location = delUrl;
  }
}
function move_i(what) { what.style.background='#CCCCCC'; }
function move_o(what) { what.style.background='#F5F5F5'; }
</script>
</head>
<link rel="stylesheet" href="css/filadelfia.css" type="text/css">
<link rel="SHORTCUT ICON" href="<?php echo $icon;?>"/>
<body bgcolor="#F5F5F5" onLoad="javascript:caixas()">
<form name="formulario" id="formulario" method="post" action="aluno_controller.php" enctype="multipart/form-data" >
  <input type="hidden" name="nu_cpf" value="<?php echo $nu_cpf;?>">
  <table width="29%" border="0" cellspacing="0" cellpadding="0" align="center">
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
      <td colspan="2" class="labelEsquerda"><strong>Analg&eacute;sico</strong></td>
    </tr>
    <tr> 
      <td colspan="2" class="labelEsquerda">&nbsp;</td>
    </tr>
    <tr> 
      <td width="28%" class="labelDireita">Nome:</td>
      <td class="labelEsquerda"><input type="text" name="nm_analgesico" value="<?php echo $nm_analgesico;?>" size="40" maxlength="30"> 
      </td>
    </tr>
    <tr> 
      <td colspan="2" class="labelEsquerda"><hr></td>
    </tr>
    <tr> 
      <td colspan="2" class="labelEsquerda">&nbsp;</td>
    </tr>
    <tr> 
      <td colspan="6" class="labelCentro"><input name="inserirAnalgesico" type="submit" value="Gravar" /> 
        <input name="volta" type="button" id="volta" value="Cancelar" onClick="javascript:executar('cancela_controller.php?cancelarOperacao=cancelarOperacao')" /> 
      </td>
    </tr>
  </table>
</form> 

<table width="29%" border="0" cellspacing="0" cellpadding="0" align="center">
  <tr bgcolor="#999999"> 
    <td width="67%" class="labelEsquerda"><font color="#FFFFFF"><strong>Nome</strong>&nbsp;</font></td>
     <td width="16%" class="labelCentro"><font color="#FFFFFF"><strong>Editar</strong></font></td>
    <td width="17%" class="labelCentro"><strong><font color="#FFFFFF">Excluir</font></strong></td>
  </tr>
  <?php
 	 require_once("class/conexao.php");
		$mysql = new Mysql();
		$mysql->conectar(); 
	 $sql = mysql_query("SELECT * FROM analgesicos ORDER BY nm_analgesico ");
    $row = mysql_num_rows($sql);
	for ( $i=0; $i < $row; $i++ ){
	$id_analgesico = mysql_result($sql, $i, "id_analgesico");
 	$nm_analgesico = mysql_result($sql, $i, "nm_analgesico");
		
	 ?>
  <tr onMouseOver="move_i(this)" onMouseOut="move_o(this)" title=""> 
     <td class="labelEsquerda"><?php echo $nm_analgesico;?></td>
     <td class="labelCentro"><a href="aluno_controller.php?abrirAnalgesicoEdit=abrirAnalgesicoEdit&id_analgesico=<?php echo $id_analgesico;?>&opcao=1"><img src="img/insert.gif" width="10" height="10"></a></td>
    <td class="labelCentro"><a href="javascript:del('aluno_controller.php?excluirAnalgesico=excluirAnalgesico&id_analgesico=<?php echo $id_analgesico;?>&opcao=1')"><img src="img/excluir2.gif" width="10" height="10"></a></td>
  </tr>
  <?php }?>
  <tr> 
    <td colspan="8" class="labelEsquerda"><hr></td>
  </tr>
  <tr> 
    <td colspan="8" class="labelEsquerda">Itens:<?php echo $i;?></td>
  </tr>
</table>
 
</body>

<?php
} else {
 include "rodape/rodape.php";
 }
 ?>
</html>
