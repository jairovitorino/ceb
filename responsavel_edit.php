<?php
session_start();

 include "cabecalho/cabecalho.php";
 $msg_sucesso = @$_SESSION['msg_sucesso'];
 $msg_excessao = @$_SESSION['msg_excessao'];
	
	$id_responsavel = @$_SESSION['id_responsavel'];
	$opcao = @$_SESSION['opcao'];
	
   
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
	document.formulario.nm_responsavel.focus();
}
function executar(delUrl) { 
    document.location = delUrl; 
}
function del(delUrl) {
  if (confirm("Deseja excluir?")) {
    document.location = delUrl;
  }
}

/*function alteraMaiusculo(){
	var valor = document.getElementById("campo").nm_macom;
	var novoTexto = valor.value.toUpperCase();
	valor.value = novoTexto;
	}*/
function combo_par(){
var i = document.getElementById("id_parentesco").options[document.getElementById("id_parentesco").selectedIndex].text;
   document.getElementById("nm_parentesco").value = i;
}
function combo_prof(){
var i = document.getElementById("id_profissao").options[document.getElementById("id_profissao").selectedIndex].text;
   document.getElementById("nm_profissao").value = i;
}
</script>
</head>
<link rel="stylesheet" href="css/filadelfia.css" type="text/css">
<link rel="SHORTCUT ICON" href="<?php echo $icon;?>"/>
<body bgcolor="#F5F5F5" onLoad="javascript:caixas()">

<form name="formulario" id="formulario" method="post" action="responsavel_controller.php" >
  <table width="43%" border="0" cellspacing="0" cellpadding="0" align="center">
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
      <td colspan="2" class="labelEsquerda"><strong>Respons&aacute;vel</strong></td>
    </tr>
    <tr> 
      <td colspan="2" class="labelEsquerda">&nbsp;</td>
    </tr>
	<?php 
	 require_once("class/conexao.php");
		$mysql = new Mysql();
		$mysql->conectar(); 	
	
	$sql = mysql_query("SELECT * FROM responsaveis, parentescos, matriculas
	WHERE responsaveis.id_matricula = matriculas.id_matricula 
	AND responsaveis.id_parentesco = parentescos.id_parentesco 
	AND id_responsavel = ".$id_responsavel."
	ORDER BY nm_responsavel ");
	
	$row = mysql_num_rows($sql);
	
	for ($i=0;$i < $row ; $i++){	
	$nm_responsavel = mysql_result($sql, $i, "nm_responsavel");
	$nu_telefone = mysql_result($sql, $i, "nu_telefone");
	$nu_ano = mysql_result($sql, $i, "nu_ano");
	$nm_trabalho = mysql_result($sql, $i, "nm_trabalho");
	$te_profissao = mysql_result($sql, $i, "te_profissao");
	$id_parentesco = mysql_result($sql, $i, "id_parentesco");
	$nm_parentesco = mysql_result($sql, $i, "nm_parentesco");
	$nm_logra = mysql_result($sql, $i, "nm_logra");
	$nu_logra = mysql_result($sql, $i, "nu_logra");
	$nm_compl = mysql_result($sql, $i, "nm_compl");
	$nm_bairro = mysql_result($sql, $i, "nm_bairro");
	$nu_cep = mysql_result($sql, $i, "nu_cep");
	$nm_cidade = mysql_result($sql, $i, "nm_cidade");
	$nm_uf = mysql_result($sql, $i, "nm_uf");
	$nm_trabalho = mysql_result($sql, $i, "nm_trabalho");
	$te_email = mysql_result($sql, $i, "te_email");
	}
	?>
    <tr> 
      <td width="28%" class="labelDireita">Nome<font color="#FF0000">*</font>:</td>
      <td class="labelEsquerda"><input type="text" name="nm_responsavel" id="nm_responsavel" value="<?php echo $nm_responsavel;?>" size="50" maxlength="50"></td>
    </tr>
    <?
				
		$sql_par = "SELECT * FROM parentescos ORDER BY nm_parentesco"; 
		$sql_par = mysql_query($sql_par);       
		$row_par = mysql_num_rows($sql_par);
	?>
    <tr> 
      <td class="labelDireita">Parentesco<font color="#FF0000">*</font>:</td>
      <td class="labelEsquerda"><select name="id_parentesco" id="id_parentesco" onChange="combo_par()" >
          <option value="<?php echo $id_parentesco ? $id_parentesco : "0";?>"><?php echo $nm_parentesco ? $nm_parentesco : "-- Selecione -- >>";?></option>
          <?php for($c=0; $c<$row_par; $c++) { ?>
          <option value="<?php echo mysql_result($sql_par, $c, "id_parentesco"); ?>"> 
          <?php echo mysql_result($sql_par, $c, "nm_parentesco"); ?></option>
          <?php } ?>
        </select></td>
    </tr>
	<tr> 
      <td width="28%" class="labelDireita">Telefone<font color="#FF0000">*</font>:</td>
      <td class="labelEsquerda"><input type="text" name="nu_telefone" value="<?php echo $nu_telefone;?>" size="30" maxlength="40"></td>
    </tr>
    <tr> 
      <td width="28%" class="labelDireita">Rua/Av<font color="#FF0000">*</font>:</td>
      <td class="labelEsquerda"><input type="text" name="nm_logra" value="<?php echo $nm_logra;?>" size="50" maxlength="50"></td>
    </tr>
	<tr> 
      <td width="28%" class="labelDireita">Compl::</td>
      <td class="labelEsquerda"><input type="text" name="nm_compl" value="<?php echo $nm_compl;?>" size="20" maxlength="20"></td>
    </tr>
    <tr> 
      <td width="28%" class="labelDireita">Numero:</td>
      <td class="labelEsquerda"><input type="text" name="nu_logra" value="<?php echo $nu_logra;?>" size="6" maxlength="6"></td>
    </tr>
	 <tr> 
      <td width="28%" class="labelDireita">Bairro<font color="#FF0000">*</font>:</td>
      <td class="labelEsquerda"><input type="text" name="nm_bairro" value="<?php echo $nm_bairro;?>" size="20" maxlength="20"></td>
    </tr>
    <tr> 
      <td width="28%" class="labelDireita">CEP<font color="#FF0000">*</font>:</td>
      <td class="labelEsquerda"><input type="text" name="nu_cep" value="<?php echo $nu_cep;?>" size="8" maxlength="8"></td>
    </tr>
	<tr> 
      <td width="28%" class="labelDireita">Cidade<font color="#FF0000">*</font>:</td>
      <td class="labelEsquerda"><input type="text" name="nm_cidade" value="<?php echo $nm_cidade;?>" size="8" maxlength="8"></td>
    </tr>
	<tr> 
      <td width="28%" class="labelDireita">UF<font color="#FF0000">*</font>:</td>
      <td class="labelEsquerda"><select name="nm_uf" id="select2">
          <option value="<?php echo $nm_uf != "" ? $nm_uf : "";?>"><?php echo $nm_uf != "" ? $nm_uf : "Selecione -- >>";?></option>
          <option value="AC">AC</option>
          <option value="AL">AL</option>
          <option value="AM">AM</option>
          <option value="AP">AP</option>
          <option value="BA">BA</option>
          <option value="CE">CE</option>
          <option value="DF">DF</option>
          <option value="ES">ES</option>
          <option value="GO">GO</option>
          <option value="MA">MA</option>
          <option value="MG">MG</option>
          <option value="MS">MS</option>
          <option value="MT">MT</option>
          <option value="PA">PA</option>
          <option value="PB">PB</option>
          <option value="PE">PE</option>
          <option value="PI">PI</option>
          <option value="PR">PR</option>
          <option value="RJ">RJ</option>
          <option value="RN">RN</option>
          <option value="RO">RO</option>
          <option value="RR">RR</option>
          <option value="RS">RS</option>
          <option value="SC">SC</option>
          <option value="SE">SE</option>
          <option value="SP">SP</option>
          <option value="TO">TO</option>
        </select></td>
    </tr>
    <tr> 
      <td width="28%" class="labelDireita">E-mail:</td>
      <td class="labelEsquerda"><input type="text" name="te_email" value="<?php echo $te_email;?>" size="40" maxlength="50"></td>
    </tr>
	   <tr> 
      <td class="labelDireita">Profiss&atilde;o<font color="#FF0000">*</font>:</td>
      <td class="labelEsquerda"><input type="text" name="te_profissao" value="<?php echo $te_profissao;?>" size="50" maxlength="50"></td>
    </tr>
   
    <tr> 
      <td width="28%" class="labelDireita">Empresa:</td>
      <td class="labelEsquerda"><input type="text" name="nm_trabalho" value="<?php echo $nm_trabalho;?>" size="50" maxlength="50"></td>
    </tr>
    <tr> 
      <td colspan="2" class="labelDireita">(<font color="#FF0000">*</font>) Preenchimento 
        obrigat&oacute;rio</td>
    </tr>
    
    <tr> 
      <td colspan="2" class="labelEsquerda"><hr></td>
    </tr>
    <tr> 
      <td colspan="2" class="labelEsquerda"><input type="hidden" name="id_responsavel" value="<?php echo $id_responsavel;?>">
        <input type="hidden" name="opcao" value="<?php echo $opcao;?>"> </td>
    </tr>
    <tr> 
      <td colspan="6" class="labelCentro"><input name="editarResponsavel" type="submit" value="Editar" /> 
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
