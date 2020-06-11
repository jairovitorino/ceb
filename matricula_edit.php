<?php
session_start();

 include "cabecalho/cabecalho.php";
 $msg_sucesso = @$_SESSION['msg_sucesso'];
 $msg_excessao = @$_SESSION['msg_excessao'];	
	
	$id_matricula = @$_SESSION['id_matricula'];
	$opcao = @$_SESSION['opcao'];
	
	//CONECTA AO MYSQL              
require_once("class/conexao.php");
$mysql = new Mysql();
$mysql->conectar(); 

		   
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
	document.formulario.nm_aluno.focus();
}
function executar(delUrl) { 
    document.location = delUrl; 
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
function barra(objeto){
if (objeto.value.length == 2 || objeto.value.length == 5 ){
objeto.value = objeto.value+"/";
}
}
function combo_ser(){
var i = document.getElementById("id_serie").options[document.getElementById("id_serie").selectedIndex].text;
   document.getElementById("nm_serie").value = i;
}
function moeda(z) {
v = z.value; 
v=v.replace(/\D/g,"") //permite digitar apenas números 
v=v.replace(/[0-9]{12}/,"inválido") //limita pra máximo 999.999.999,99 
v=v.replace(/(\d{1})(\d{8})$/,"$1$2") //coloca ponto antes dos últimos 8 digitos 
v=v.replace(/(\d{1})(\d{5})$/,"$1$2") //coloca ponto antes dos últimos 5 digitos 
v=v.replace(/(\d{1})(\d{1,2})$/,"$1,$2") //coloca virgula antes dos últimos 2 digitos 
z.value = v; 
}

</script>
</head>
<link rel="stylesheet" href="css/filadelfia.css" type="text/css">
<link rel="SHORTCUT ICON" href="<?php echo $icon;?>"/>
<body bgcolor="#F5F5F5" onLoad="javascript:caixas()">

<?php if ( empty($id_funcionario) ){?>
<form name="formulario" id="formulario" method="post" action="matricula_controller.php" >
  <table width="41%" border="0" cellspacing="0" cellpadding="0" align="center">
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
      <td colspan="2" class="labelEsquerda"><strong>Matr&iacute;cula</strong></td>
    </tr>
    <tr> 
      <td colspan="2" class="labelEsquerda">&nbsp;</td>
    </tr>
    <tr> 
      <td colspan="2" class="labelEsquerda">&nbsp;</td>
    </tr>
    <?php 
	$sql = mysql_query("SELECT * FROM matriculas, alunos, series
WHERE matriculas.id_aluno = alunos.id_aluno
AND matriculas.id_serie = series.id_serie
AND matriculas.id_matricula = ".$id_matricula."");

$row = mysql_num_rows($sql);
	for($i=0; $i<$row; $i++) {
	$id_aluno = mysql_result($sql, $i, "id_aluno");
	$nm_aluno = mysql_result($sql, $i, "nm_aluno");
	$nu_termo = mysql_result($sql, $i, "nu_termo");
	$in_almoco = mysql_result($sql, $i, "in_almoco");
	$in_responsavel = mysql_result($sql, $i, "in_responsavel");
	$nu_ano = mysql_result($sql, $i, "nu_ano");
	$id_serie = mysql_result($sql, $i, "id_serie");
	$id_turno = mysql_result($sql, $i, "id_turno");
	$nm_serie = mysql_result($sql, $i, "nm_serie");
	$nu_cpf = mysql_result($sql, $i, "nu_cpf");
	$nu_rg = mysql_result($sql, $i, "nu_rg");
	$vl_matricula = mysql_result($sql, $i, "vl_matricula");
	$te_obs = mysql_result($sql, $i, "te_obs");
	$in_imagem = mysql_result($sql, $i, "in_imagem");
	
}

	?>
    <tr> 
      <td width="27%" class="labelDireita">Termo:</td>
      <td width="73%" class="labelEsquerda"><?php echo $nu_termo;?> </td>
    </tr>
    <tr> 
      <td class="labelDireita">Nome<font color="#FF0000">*</font>:</td>
      <td class="labelEsquerda"><?php echo $nm_aluno;?></td>
    </tr>
    
    <tr> 
      <td class="labelDireita">Turno<font color="#FF0000">*</font>:</td>
      <td class="labelEsquerda"><?php echo $id_turno == 1 ? "<input type='radio' name='id_turno' value='1'  checked>" :
	   "<input type='radio' name='id_turno' value='1'>";?> Matutino <?php echo $id_turno == 2 ? "<input type='radio' name='id_turno' value='2' checked> " :
	   "<input type='radio' name='id_turno' value='2'>";?> Vespertino <?php echo $id_turno == 3 ? "<input type='radio' name='id_turno' value='3' checked> " :
	   "<input type='radio' name='id_turno' value='3'>";?> Integral</td>
    </tr>
	 <tr>
      <td class="labelDireita"><?php echo $in_imagem == 1 ? "<input type='checkbox' name='in_imagem' value='checkbox' checked>" : "<input type='checkbox' name='in_imagem' value='checkbox'>";?></td>
      <td class="labelEsquerda">Autoriza a publica&ccedil;&atilde;o de fotos e 
        v&iacute;deos de filho/filha?</td>
    </tr>
	<tr> 
      <td class="labelDireita">Ano<font color="#FF0000">*</font>:</td>
      <td class="labelEsquerda"><select name="nu_ano">
	  <option value="<?php echo $nu_ano ? $nu_ano : "0";?>"><?php echo $nu_ano ? $nu_ano : "-- Selecione -- >>";?></option>
          <option value="2019">2019</option>
          <option value="2020">2020</option>
          <option value="2021">2021</option>
          <option value="2022">2022</option>
        </select></td>
    </tr>
    <?
	
		$sql_ser = "SELECT * FROM series ORDER BY nm_serie"; 
		$sql_ser = mysql_query($sql_ser);       
		$row_ser = mysql_num_rows($sql_ser);
	?>
    <tr> 
      <td class="labelDireita">Serie<font color="#FF0000">*</font>:</td>
      <td class="labelEsquerda"><select name="id_serie" id="id_serie" onChange="combo_ser()" >
          <option value="<?php echo $id_serie ? $id_serie : "0";?>"><?php echo $nm_serie ? $nm_serie : "-- Selecione -- >>";?></option>
          <?php for($c=0; $c<$row_ser; $c++) { ?>
          <option value="<?php echo mysql_result($sql_ser, $c, "id_serie"); ?>"> 
          <?php echo mysql_result($sql_ser, $c, "nm_serie"); ?></option>
          <?php } ?>
        </select></td>
    </tr>
    <tr> 
      <td class="labelDireita">Valor R$<font color="#FF0000">*</font>:</td>
      <td class="labelEsquerda"><input name="vl_matricula" type="text" value="<?php echo $vl_matricula;?>" onKeyUp="moeda(this)" size="11" maxlength="11"></td>
    </tr>
   
    <tr> 
      <td class="labelDireita">RG<font color="#FF0000">*</font>:</td>
      <td class="labelEsquerda"><input name="nu_rg" type="text" value="<?php echo $nu_rg;?>" size="11" maxlength="11"></td>
    </tr>
    <tr> 
      <td class="labelDireita">CPF<font color="#FF0000">*</font>:</td>
      <td class="labelEsquerda"><input name="nu_cpf" type="text" value="<?php echo $nu_cpf;?>" size="11" maxlength="11"></td>
    </tr>
    <tr> 
      <td class="labelDireita">Observa&ccedil;&otilde;es:</td>
      <td class="labelEsquerda"><input name="te_obs" type="text" value="<?php echo $te_obs;?>" size="40" maxlength="50"></td>
    </tr>
    <tr> 
      <td colspan="2" class="labelDireita">(<font color="#FF0000">*</font>) Preenchimento 
        obrigat&oacute;rio</td>
    </tr>
    <tr> 
      <td colspan="2" class="labelEsquerda"><input type="hidden" name="id_matricula" id="id_matricula" value="<?php echo $id_matricula;?>"> 
        <input type="hidden" name="opcao" id="opcao" value="<?php echo $opcao;?>"> 
      </td>
    </tr>
    <tr> 
      <td colspan="6" class="labelCentro"><hr></td>
    </tr>
    <tr> 
      <td colspan="6" class="labelCentro"><input name="editarMatricula" type="submit" value="Editar" /> 
        <input name="volta" type="button" id="volta" value="Cancelar" onClick="javascript:executar('cancela_controller.php?cancelarOperacao=cancelarOperacao')" /> 
      </td>
    </tr>
  </table>
</form> 
 

<?php }?>

</body>
<?php

} else {
 
 }
 ?>
</html>
