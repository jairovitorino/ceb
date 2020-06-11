<?php
session_start();

 include "cabecalho/cabecalho.php";
 $msg_sucesso = @$_SESSION['msg_sucesso'];
 $msg_excessao = @$_SESSION['msg_excessao'];

	$id_boleto = @$_SESSION['id_boleto'];
	$nm_cedente = @$_SESSION['nm_cedente'];	
	$id_banco = @$_SESSION['id_banco'];
	$nm_banco = @$_SESSION['nm_banco'];
	$nu_agencia = @$_SESSION['nu_agencia'];
	$nu_conta = @$_SESSION['nu_conta'];
	$nu_cpf = @$_SESSION['nu_cpf'];
	$nu_nosso = @$_SESSION['nu_nosso'];
	$dt_vencto = @$_SESSION['dt_vencto'];
	$vl_docto = @$_SESSION['vl_docto'];
	$nm_sacado = @$_SESSION['nm_sacado'];
	$te_email = @$_SESSION['te_email'];
	$nm_logra = @$_SESSION['nm_logra'];
	$nu_logra = @$_SESSION['nu_logra'];
	$nu_cep = @$_SESSION['nu_cep'];
	$nm_bairro = @$_SESSION['nm_bairro'];
	$nm_cidade = @$_SESSION['nm_cidade'];
	$nm_uf = @$_SESSION['nm_uf'];
   
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
	document.formulario.nm_cedente.focus();
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
function barra(objeto){
if (objeto.value.length == 2 || objeto.value.length == 5 ){
objeto.value = objeto.value+"/";
}
}
function combo_banco(){
var i = document.getElementById("id_banco").options[document.getElementById("id_banco").selectedIndex].text;
   document.getElementById("nm_banco").value = i;
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
<?php if ( empty($id_boleto) ){?>
<form name="formulario" id="formulario" method="post" action="boleto_controller.php" >
  <table width="43%" border="0" cellspacing="0" cellpadding="0" align="center">
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
      <td colspan="2" class="labelEsquerda"><strong>Boleto</strong></td>
    </tr>
    <tr> 
      <td colspan="2" class="labelEsquerda">&nbsp;</td>
    </tr>
    <tr> 
      <td width="28%" class="labelDireita">Cedente<font color="#FF0000">*</font>:</td>
      <td class="labelEsquerda"><input type="text" name="nm_cedente" id="nm_cedente" value="<?php echo $nm_cedente;?>" size="30" maxlength="30"></td>
    </tr>
    <?
		 require_once("class/conexao.php");
		$mysql = new Mysql();
		$mysql->conectar(); 			
		$sql_banco = "SELECT * FROM bancos ORDER BY nm_banco"; 
		$sql_banco = mysql_query($sql_banco);       
		$row_banco = mysql_num_rows($sql_banco);
	?>
    <tr> 
      <td class="labelDireita">Banco<font color="#FF0000">*</font>:</td>
      <td class="labelEsquerda"><select name="id_banco" id="id_banco" onChange="combo_banco()" >
          <option value="<?php echo $id_banco ? $id_banco : "0";?>"><?php echo $nm_banco ? $nm_banco : "-- Selecione -- >>";?></option>
          <?php for($c=0; $c<$row_banco; $c++) { ?>
          <option value="<?php echo mysql_result($sql_banco, $c, "id_banco"); ?>"> 
          <?php echo mysql_result($sql_banco, $c, "nm_banco"); ?></option>
          <?php } ?>
        </select></td>
    </tr>
    <tr> 
      <td width="28%" class="labelDireita">Agencia<font color="#FF0000">*</font>:</td>
      <td class="labelEsquerda"><input type="text" name="nu_agencia" value="<?php echo $nu_agencia;?>" size="5" maxlength="4"></td>
    </tr>
    <tr> 
      <td width="28%" class="labelDireita">Conta<font color="#FF0000">*</font>:</td>
      <td class="labelEsquerda"><input type="text" name="nu_conta" value="<?php echo $nu_conta;?>" size="10" maxlength="12"></td>
    </tr>
    <tr> 
      <td width="28%" class="labelDireita">CPF:</td>
      <td class="labelEsquerda"><?php echo $nu_cpf;?></td>
    </tr>
    <tr> 
      <td width="28%" class="labelDireita">Nosso Numero<font color="#FF0000">*</font>:</td>
      <td class="labelEsquerda"><input type="text" name="nu_nosso" value="<?php echo $nu_nosso;?>" size="14" maxlength="20"></td>
    </tr>
    <tr> 
      <td width="28%" class="labelDireita">Valor R$<font color="#FF0000">*</font>:</td>
      <td class="labelEsquerda"><input name="vl_docto" type="text" value="<?php echo $vl_docto;?>" onKeyUp="moeda(this)" size="11" maxlength="11"></td>
    </tr>
    <tr> 
      <td width="28%" class="labelDireita">Vencto<font color="#FF0000">*</font>:</td>
      <td class="labelEsquerda"><input type="text" name="dt_vencto"  value="<?php echo $dt_vencto;?>" size="12" maxlength="10" onKeyUp="barra(this)"></td>
    </tr>
    <tr> 
      <td width="28%" class="labelDireita">Sacado<font color="#FF0000">*</font>:</td>
      <td class="labelEsquerda"><input type="text" name="nm_sacado" value="<?php echo $nm_sacado;?>" size="30" maxlength="30"></td>
    </tr>
    <tr> 
      <td width="28%" class="labelDireita">E-mail:</td>
      <td class="labelEsquerda"><input type="text" name="te_email" value="<?php echo $te_email;?>" size="40" maxlength="50"></td>
    </tr>
    <tr> 
      <td width="28%" class="labelDireita">Rua/Av<font color="#FF0000">*</font>:</td>
      <td class="labelEsquerda"><input type="text" name="nm_logra" value="<?php echo $nm_logra;?>" size="40" maxlength="40"></td>
    </tr>
    <tr> 
      <td width="28%" class="labelDireita">Numero<font color="#FF0000">*</font>:</td>
      <td class="labelEsquerda"><input type="text" name="nu_logra" value="<?php echo $nu_logra;?>" size="4" maxlength="6"></td>
    </tr>
    <tr> 
      <td width="28%" class="labelDireita">CEP<font color="#FF0000">*</font>:</td>
      <td class="labelEsquerda"><input type="text" name="nu_cep" value="<?php echo $nu_cep;?>" size="8" maxlength="8"></td>
    </tr>
    <tr> 
      <td width="28%" class="labelDireita">Bairro<font color="#FF0000">*</font>:</td>
      <td class="labelEsquerda"><input type="text" name="nm_bairro" value="<?php echo $nm_bairro;?>" size="30" maxlength="20"></td>
    </tr>
    <tr> 
      <td width="28%" class="labelDireita">Cidade<font color="#FF0000">*</font>:</td>
      <td class="labelEsquerda"><input type="text" name="nm_cidade" value="<?php echo $nm_cidade;?>" size="30" maxlength="30"></td>
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
      <td colspan="2" class="labelDireita">(<font color="#FF0000">*</font>) Preenchimento 
        obrigat&oacute;rio</td>
    </tr>
    <tr> 
      <td colspan="2" class="labelEsquerda"><hr></td>
    </tr>
    <tr> 
      <td colspan="2" class="labelEsquerda"><input type="hidden" name="nm_banco" id="nm_banco" value="<?php echo $nm_banco;?>"> 
        <input type="hidden" name="nu_cpf" id="nu_cpf" value="<?php echo $nu_cpf;?>"> 
      </td>
    </tr>
    <tr> 
      <td colspan="6" class="labelCentro"><input name="inserirBoleto" type="submit" value="Gravar" /> 
        <input name="volta" type="button" id="volta" value="Cancelar" onClick="javascript:executar('cancela_controller.php?cancelarOperacao=cancelarOperacao')" /> 
      </td>
    </tr>
  </table>
</form> 
<?php } else {?>
<form name="formulario" id="formulario" method="post" action="funcionario_controller.php" >
  <table width="37%" border="0" cellspacing="0" cellpadding="0" align="center">
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
      
    <td colspan="2" class="labelEsquerda">&nbsp; </td>
    </tr>
    <tr> 
      <td colspan="2" class="labelEsquerda"> </td>
    </tr>
    <tr> 
      
    <td colspan="2" class="labelCentro">&nbsp;</td>
    </tr>
    <tr> 
      <td colspan="2" class="labelEsquerda"> </td>
    </tr>
    <tr> 
      
    <td colspan="2" class="labelEsquerda">&nbsp;</td>
    </tr><tr> 
      <td colspan="2" class="labelEsquerda">&nbsp;</td>
    </tr>
   
  <table width="44%" border="0" cellspacing="0" cellpadding="0" align="center">
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
      <td colspan="7" class="labelEsquerda"><hr></td>
    </tr>
    <tr> 
      <td colspan="7" class="labelEsquerda"><strong>Boleto</strong></td>
    </tr>
    <tr bgcolor="#999999"> 
      <td width="35%" class="labelEsquerda"><font color="#FFFFFF"><strong>Cedente</strong>&nbsp;&nbsp;</font></td>
      <td width="15%" class="labelEsquerda"><font color="#FFFFFF"><strong>Banco</strong></font></td>
      <td width="12%" class="labelEsquerda"><font color="#FFFFFF"><strong>Agencia</strong></font></td>
      <td width="12%" class="labelEsquerda"><font color="#FFFFFF"><strong>Conta</strong>&nbsp;</font></td>
      <td width="11%" class="labelEsquerda"><font color="#FFFFFF">&nbsp;<strong>Valor 
        R$ </strong></font></td>
      <td width="6%" class="labelCentro"><font color="#FFFFFF"><strong>Exibir</strong></font></td>
      <td width="9%" class="labelCentro"><font color="#FFFFFF">&nbsp;</font><strong><font color="#FFFFFF">Excluir</font></strong><strong><font color="#FFFFFF">&nbsp;</font></strong></td>
    </tr>
    <?php
  require_once("class/conexao.php");
		$mysql = new Mysql();
		$mysql->conectar(); 	
	 $sql = mysql_query("SELECT * FROM boletos, bancos
	 WHERE boletos.id_banco = bancos.id_banco AND id_boleto = ".$id_boleto." ");
    $row = mysql_num_rows($sql);
	for ( $i=0; $i < $row; $i++ ){
	$nm_cedente = mysql_result($sql, $i, "nm_cedente");
	$nm_banco = mysql_result($sql, $i, "nm_banco");
	$nu_agencia = mysql_result($sql, $i, "nu_agencia");
	$nu_conta = mysql_result($sql, $i, "nu_conta");
	$vl_docto = mysql_result($sql, $i, "vl_docto");
	
  ?>
    <tr> 
      <td class="labelEsquerda"><?php echo $nm_cedente;?></td>
      <td class="labelEsquerda"><?php echo $nm_banco;?></td>
      <td class="labelEsquerda"><?php echo $nu_agencia;?></td>
      <td class="labelEsquerda"><?php echo $nu_conta;?></td>
      <td class="labelEsquerda"><?php echo $vl_docto;?></td>
      <td class="labelCentro"><a href="boleto_controller.php?exibirBoleto=exibirBoleto&id_boleto=<?php echo $id_boleto;?>"><img src="img/lupa.gif" width="10" height="10"></a></td>
      <td class="labelCentro"><a href="javascript:del('boleto_controller.php?excluirBoleto=excluirBoleto&id_boleto=<?php echo $id_boleto;?>&opcao=1')"><img src="img/excluir2.gif" width="10" height="10"></a></td>
    </tr>
    <?php }?>
    <tr> 
      <td colspan="7" class="labelEsquerda"><hr></td>
    </tr>
    <tr> 
      <td colspan="7" class="labelEsquerda">Itens:<?php echo $i;?></td>
    </tr>
    <tr> 
      <td colspan="7" class="labelCentro"><input type="hidden" name="id_boleto" value="<?php echo $id_boleto;?>"> 
        <input name="volta22" type="button" id="volta22" value="Novo" onClick="javascript:executar('boleto_controller.php?abrirBoletoCpf=abrirBoletoCpf')" /> 
        <input name="volta2" type="button" id="volta2" value="Cancelar" onClick="javascript:executar('cancela_controller.php?cancelarOperacao=cancelarOperacao')" /></td>
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
