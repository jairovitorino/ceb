<?php
session_start();

 include "cabecalho/cabecalho.php";
 $msg_sucesso = @$_SESSION['msg_sucesso'];
 $msg_excessao = @$_SESSION['msg_excessao'];	
	
	$id_funcionario = @$_SESSION['id_funcionario'];
	$nm_funcionario = @$_SESSION['nm_funcionario'];
	$nm_natural = @$_SESSION['nm_natural'];
	$dt_nascimento = @$_SESSION['dt_nascimento'];
	$nu_rg = @$_SESSION['nu_rg'];
	$nm_orgao = @$_SESSION['nm_orgao'];
	$nu_carteira = @$_SESSION['nu_carteira'];
	$nu_serie = @$_SESSION['nu_serie'];
	$id_graduacao = @$_SESSION['id_graduacao'];
	$nm_graduacao = @$_SESSION['nm_graduacao'];
	$nm_experiencia = @$_SESSION['nm_experiencia'];
	$id_estado_civil = @$_SESSION['id_estado_civil'];
	$nm_estado_civil = @$_SESSION['nm_estado_civil'];
	$nm_conjugue = @$_SESSION['nm_conjugue'];
	$id_cargo = @$_SESSION['id_cargo'];
	$nm_cargo = @$_SESSION['nm_cargo'];	
	$nu_cpf = @$_SESSION['nu_cpf'];
	$id_sexo = @$_SESSION['id_sexo'];
	$nm_sexo = @$_SESSION['nm_sexo'];
	$nu_telefone = @$_SESSION['nu_telefone'];
	$dt_admissao = @$_SESSION['dt_admissao'];
	$nm_logra = @$_SESSION['nm_logra'];
	$nu_logra = @$_SESSION['nu_logra'];
	$nm_compl = @$_SESSION['nm_compl'];
	$nu_cep = @$_SESSION['nu_cep'];
	$nm_bairro = @$_SESSION['nm_bairro'];
	$nm_cidade = @$_SESSION['nm_cidade'];
	$nm_uf = @$_SESSION['nm_uf'];
	$te_obs = @$_SESSION['te_obs'];
		   
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
	document.formulario.nm_funcionario.focus();
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
function cargo(){
var i = document.getElementById("id_cargo").options[document.getElementById("id_cargo").selectedIndex].text;
   document.getElementById("nm_cargo").value = i;
}
function combo_sexo(){
var i = document.getElementById("id_sexo").options[document.getElementById("id_sexo").selectedIndex].text;
   document.getElementById("nm_sexo").value = i;
}
function estado(){
var i = document.getElementById("id_estado_civil").options[document.getElementById("id_estado_civil").selectedIndex].text;
   document.getElementById("nm_estado_civil").value = i;
}
function graduacao(){
var i = document.getElementById("id_graduacao").options[document.getElementById("id_graduacao").selectedIndex].text;
   document.getElementById("nm_graduacao").value = i;
}

</script>
</head>
<link rel="stylesheet" href="css/filadelfia.css" type="text/css">
<link rel="SHORTCUT ICON" href="<?php echo $icon;?>"/>
<body bgcolor="#F5F5F5" onLoad="javascript:caixas()">

<?php if ( empty($id_funcionario) ){?>
<form name="formulario" id="formulario" method="post" action="funcionario_controller.php" >
  <table width="69%" border="0" cellspacing="0" cellpadding="0" align="center">
    <tr> 
      <td colspan="4" class="labelCentro">&nbsp;</td>
    </tr>
    <tr> 
      <td colspan="4" class="labelCentro">&nbsp;</td>
    </tr>
    <tr> 
      <td colspan="4" class="labelCentro">&nbsp;</td>
    </tr>
    <tr> 
      <td colspan="4" class="labelCentro">&nbsp;</td>
    </tr>
    <tr> 
      <td colspan="4" class="labelEsquerda"> 
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
      <td colspan="4" class="labelEsquerda"> </td>
    </tr>
    <tr> 
      <td colspan="4" class="labelCentro"><hr></td>
    </tr>
    <tr> 
      <td colspan="4" class="labelEsquerda"> </td>
    </tr>
    <tr> 
      <td colspan="4" class="labelEsquerda"><strong>Funcion&aacute;rio</strong></td>
    </tr>
    <tr> 
      <td colspan="4" class="labelEsquerda">&nbsp;</td>
    </tr>
    <tr> 
      <td colspan="4" class="labelEsquerda">&nbsp;</td>
    </tr>
    <tr> 
      <td width="13%" class="labelDireita">Nome<font color="#FF0000">*</font>:</td>
      <td width="36%" class="labelEsquerda"><input name="nm_funcionario" id="nm_funcionario" type="text" value="<?php echo $nm_funcionario;?>" size="40" maxlength="50"></td>
      <td width="12%" class="labelDireita">Sexo<font color="#FF0000">*</font></td>
      <td width="39%" class="labelEsquerda"><select name="id_sexo" id="select4" onChange="combo_sexo()">
          <option value="<?php echo $id_sexo ? $id_sexo : "";?>"><?php echo $id_sexo ? $id_sexo : "-- Selecione -- >>";?></option>
          <option value="M">M</option>
          <option value="F">F</option>
        </select></td>
    </tr>
    <tr> 
      <td class="labelDireita">Naturalidade:</td>
      <td class="labelEsquerda"><input name="nm_natural" type="text" value="<?php echo $nm_natural;?>" size="20" maxlength="30"></td>
	    <?php
	  	//CONECTA AO MYSQL              
	    require_once("class/conexao.php");
		$mysql = new Mysql();
		$mysql->conectar(); 
	 	  $sql_obj = "SELECT * FROM cargos ORDER BY nm_cargo";
		$sql_obj = mysql_query($sql_obj);       
		$row_obj = mysql_num_rows($sql_obj);
	  ?>
      <td class="labelDireita">Cargo<font color="#FF0000">*</font>::</td>
      <td class="labelEsquerda"><select name="id_cargo" id="id_cargo" onChange="cargo()" >
          <option value="<?php echo $id_cargo ? $id_cargo : "0";?>"><?php echo $nm_cargo ? $nm_cargo : "-- Selecione -- >>";?></option>
          <?php for($a=0; $a<$row_obj; $a++) { ?>
          <option value="<?php echo mysql_result($sql_obj, $a, "id_cargo"); ?>"> 
          <?php echo mysql_result($sql_obj, $a, "nm_cargo"); ?></option>
          <?php } ?>
        </select></td>
    </tr>
    <tr> 
      <td class="labelDireita">Data Nasc:</td>
      <td class="labelEsquerda"><input type="text" name="dt_nascimento"  value="<?php echo $dt_nascimento;?>" size="8" maxlength="10" onKeyUp="barra(this)"></td>
    
      <td class="labelDireita">Telefone:</td>
      <td class="labelEsquerda"><input name="nu_telefone" type="text" value="<?php echo $nu_telefone;?>" size="30" maxlength="40"></td>
    </tr>
    <tr> 
      <td class="labelDireita">RG:</td>
      <td class="labelEsquerda"><input type="text" name="nu_rg"  value="<?php echo $nu_rg;?>" size="14" maxlength="14"></td>
      <td class="labelDireita">Admiss&atilde;o:</td>
      <td class="labelEsquerda"><input type="text" name="dt_admissao"  value="<?php echo $dt_admissao;?>" size="8" maxlength="10" onKeyUp="barra(this)"></td>
    </tr>
    <tr> 
      <td class="labelDireita">Org&atilde;o:</td>
      <td class="labelEsquerda"><input type="text" name="nm_orgao"  value="<?php echo $nm_orgao;?>" size="7" maxlength="10"></td>
      <td class="labelDireita">Rua<font color="#FF0000">*</font>:</td>
      <td class="labelEsquerda"><input name="nm_logra" type="text" value="<?php echo $nm_logra;?>" size="40" maxlength="50"></td>
    </tr>
    <tr> 
      <td class="labelDireita">Carteira Prof:</td>
      <td class="labelEsquerda"><input type="text" name="nu_carteira"  value="<?php echo $nu_carteira;?>" size="7" maxlength="10"></td>
      <td class="labelDireita">N&uacute;mero:</td>
      <td class="labelEsquerda"><input name="nu_logra" type="text" value="<?php echo $nu_logra;?>" size="4" maxlength="6"></td>
    </tr>
    <tr> 
      <td class="labelDireita">S&eacute;rie:</td>
      <td class="labelEsquerda"><input type="text" name="nu_serie"  value="<?php echo $nu_serie;?>" size="7" maxlength="10"></td>
      <td class="labelDireita">Compl:</td>
      <td class="labelEsquerda"><input name="nm_compl" type="text" value="<?php echo $nm_compl;?>" size="10" maxlength="16"></td>
    </tr>
    <?php
	
		$sql_gra = "SELECT * FROM graduacoes ORDER BY nm_graduacao"; 
		$sql_gra = mysql_query($sql_gra);       
		$row_gra = mysql_num_rows($sql_gra);
		?>
    <tr> 
      <td class="labelDireita">Gradua&ccedil;&atilde;o<font color="#FF0000">*</font>:</td>
      <td class="labelEsquerda"><select name="id_graduacao" id="id_graduacao" onChange="graduacao()">
          <option value="<?php echo $id_graduacao ? $id_graduacao : "0";?>"><?php echo $nm_graduacao ? $nm_graduacao : "-- Selecione -- >>";?></option>
          <?php for($i=0; $i<$row_gra; $i++) { ?>
          <option value="<?php echo mysql_result($sql_gra, $i, "id_graduacao"); ?>"> 
          <?php echo mysql_result($sql_gra, $i, "nm_graduacao"); ?></option>
          <?php } ?>
        </select></td>
      <td class="labelDireita">CEP<font color="#FF0000">*</font>:</td>
      <td class="labelEsquerda"><input name="nu_cep" type="text" value="<?php echo $nu_cep;?>" size="8" maxlength="9"></td>
    </tr>
    <tr> 
      <td class="labelDireita">Experi&ecirc;ncia:</td>
      <td class="labelEsquerda"><input type="text" name="nm_experiencia"  value="<?php echo $nm_experiencia;?>" size="50" maxlength="90"></td>
      <td class="labelDireita">Bairro:</td>
      <td class="labelEsquerda"><input name="nm_bairro" type="text" value="<?php echo $nm_bairro;?>" size="20" maxlength="30"></td>
    </tr>
    <?php
		//CONECTA AO MYSQL              
	 
		$sql = "SELECT * FROM estado_civil ORDER BY nm_estado_civil"; 
		$sql = mysql_query($sql);       
		$row = mysql_num_rows($sql);
		?>
    <tr> 
      <td class="labelDireita">Estado Civil<font color="#FF0000">*</font>:</td>
      <td class="labelEsquerda"><select name="id_estado_civil" id="id_estado_civil" onChange="estado()">
          <option value="<?php echo $id_estado_civil ? $id_estado_civil : "0";?>"><?php echo $nm_estado_civil ? $nm_estado_civil : "-- Selecione -- >>";?></option>
          <?php for($i=0; $i<$row; $i++) { ?>
          <option value="<?php echo mysql_result($sql, $i, "id_estado_civil"); ?>"> 
          <?php echo mysql_result($sql, $i, "nm_estado_civil"); ?></option>
          <?php } ?>
        </select></td>
      <td class="labelDireita">Cidade:</td>
      <td class="labelEsquerda"><input name="nm_cidade" type="text" value="<?php echo $nm_cidade;?>" size="20" maxlength="30"></td>
    </tr>
    <tr> 
      <td class="labelDireita">Conjugue:</td>
      <td class="labelEsquerda"><input name="nm_conjugue" type="text" value="<?php echo $nm_conjugue;?>" size="35" maxlength="30"></td>
      <td class="labelDireita">UF<font color="#FF0000">*</font></td>
      <td class="labelEsquerda"><select name="nm_uf" id="select5">
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
      <td class="labelDireita">CPF:</td>
      <td class="labelEsquerda"><?php echo $nu_cpf;?></td>
      <td class="labelDireita">Obs:</td>
      <td class="labelEsquerda"><input name="te_obs" type="text" value="<?php echo $te_obs;?>" size="50" maxlength="100"></td>
    </tr>
    <tr> 
      <td class="labelDireita">&nbsp;</td>
      <td class="labelEsquerda">&nbsp;</td>
      <td class="labelDireita">&nbsp;</td>
      <td class="labelEsquerda">&nbsp;</td>
    </tr>
    <tr> 
      <td colspan="4" class="labelDireita">(<font color="#FF0000">*</font>) Preenchimento 
        obrigat&oacute;rio</td>
    </tr>
    <tr> 
      <td colspan="4" class="labelEsquerda"><input type="hidden" name="nm_objeto" id="nm_objeto" value="<?php echo $nm_objeto;?>"> 
        <input type="hidden" name="nu_cpf" id="nu_cpf" value="<?php echo $nu_cpf;?>"> 
        <input type="hidden" name="nm_sexo" id="nm_sexo" value="<?php echo $nm_sexo;?>"> 
        <input type="hidden" name="nm_cargo" id="nm_cargo" value="<?php echo $nm_cargo;?>"> 
        <input type="hidden" name="nm_estado_civil" id="nm_estado_civil" value="<?php echo $nm_estado_civil;?>"> 
        <input type="hidden" name="nm_graduacao" id="nm_graduacao" value="<?php echo $nm_graduacao;?>"></td>
    </tr>
    <tr> 
      <td colspan="8" class="labelCentro"><input name="inserirFuncionario" type="submit" value="Gravar" /> 
        <input name="volta" type="button" id="volta" value="Cancelar" onClick="javascript:executar('cancela_controller.php?cancelarOperacao=cancelarOperacao')" /> 
      </td>
    </tr>
  </table>
</form> 
<?php } else {?>
<form name="formulario" id="formulario" method="post" action="funcionario_controller.php" >
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
      <td colspan="2" class="labelEsquerda"><strong>Funcion&aacute;rio</strong></td>
    </tr>
    <tr> 
      <td colspan="2" class="labelEsquerda">&nbsp;</td>
    </tr>
    <tr> 
      <td colspan="2" class="labelEsquerda">&nbsp;</td>
    </tr>
  
  </table>
</form> 
<table width="41%" border="0" cellspacing="0" cellpadding="0" align="center">
  <tr bgcolor="#999999"> 
    <td width="37%" class="labelEsquerda"><font color="#FFFFFF"><strong>Nome</strong></font></td>
    <td width="12%" class="labelEsquerda"><font color="#FFFFFF"><strong>CPF</strong>&nbsp;</font></td>
    <td width="9%" class="labelEsquerda"><font color="#FFFFFF"><strong> Sexo</strong></font></td>
    <td width="16%" class="labelEsquerda"><font color="#FFFFFF"><strong>Telefone</strong></font></td>
    <td width="10%" class="labelCentro"><font color="#FFFFFF"><strong>&nbsp;</strong></font><font color="#FFFFFF"><strong>Editar</strong></font></td>
    <td width="16%" class="labelCentro"><strong><font color="#FFFFFF">Excluir</font></strong><strong><font color="#FFFFFF">&nbsp;</font></strong></td>
  </tr>
  <?php
 //CONECTA AO MYSQL              
	require_once("class/conexao.php");
	$mysql = new Mysql();
	$mysql->conectar(); 
	 $sql = mysql_query("SELECT * FROM funcionarios 
	 WHERE id_funcionario = ".$id_funcionario." ");
    $row = mysql_num_rows($sql);
	for ( $i=0; $i < $row; $i++ ){
	$nm_funcionario = mysql_result($sql, $i, "nm_funcionario");
 	$nu_cpf = mysql_result($sql, $i, "nu_cpf");
	$id_sexo = mysql_result($sql, $i, "id_sexo");
	$nu_telefone = mysql_result($sql, $i, "nu_telefone");
	$id_usuario = mysql_result($sql, $i, "id_usuario");
  ?>
  <tr> 
    <td class="labelEsquerda"><?php echo $nm_funcionario;?></td>
    <td class="labelEsquerda"><?php echo $nu_cpf;?></td>
    <td class="labelEsquerda"><?php echo $id_sexo;?></td>
    <td class="labelEsquerda"><?php echo $nu_telefone;?></td>
    <td class="labelCentro"><a href="funcionario_controller.php?abrirFuncionarioEdit=abrirFuncionarioEdit&id_funcionario=<?php echo $id_funcionario;?>&id_usuario=<?php echo $id_usuario;?>&opcao=1"><img src="img/insert.gif" width="10" height="10"></a></td>
    <td class="labelCentro"><a href="javascript:del('funcionario_controller.php?excluirFuncionario=excluirFuncionario&id_funcionario=<?php echo $id_funcionario;?>&id_usuario=<?php echo $id_usuario;?>&opcao=1')"><img src="img/excluir2.gif" width="10" height="10"></a></td>
  </tr>
  <?php }?>
  <tr> 
    <td colspan="6" class="labelEsquerda"><hr></td>
  </tr>
  <tr> 
    <td colspan="6" class="labelCentro"> <input name="volta" type="button" id="volta" value="Cancelar" onClick="javascript:executar('cancela_controller.php?cancelarOperacao=cancelarOperacao')" /> 
    </td>
  </tr>
  <tr> 
    <td colspan="6" class="labelEsquerda">Itens:<?php echo $i;?></td>
  </tr>
</table>
 

<?php }?>

</body>
<?php

} else {
 
 }
 ?>
</html>
