<?php
session_start();

 include "cabecalho/cabecalho.php";
 $msg_sucesso = @$_SESSION['msg_sucesso'];
 $msg_excessao = @$_SESSION['msg_excessao'];

	$id_matricula = @$_SESSION['id_matricula'];
	$id_aluno = @$_SESSION['id_aluno'];
	$id_responsavel = @$_SESSION['id_responsavel'];
	$id_aluno = @$_SESSION['id_aluno'];
	$id_parentesco = @$_SESSION['id_parentesco'];
	$nm_parentesco = @$_SESSION['nm_parentesco'];
	$nm_responsavel = @$_SESSION['nm_responsavel'];
	$nm_logra = @$_SESSION['nm_logra'];
	$nu_logra = @$_SESSION['nu_logra'];
	$nm_compl = @$_SESSION['nm_compl'];
	$nm_bairro = @$_SESSION['nm_bairro'];
	$nm_cidade = @$_SESSION['nm_cidade'];
	$nm_uf = @$_SESSION['nm_uf'];
	$nu_telefone = @$_SESSION['nu_telefone'];
	$nu_cep = @$_SESSION['nu_cep'];
	$te_email = @$_SESSION['te_email'];
	$nm_trabalho = @$_SESSION['nm_trabalho'];
	$te_profissao = @$_SESSION['te_profissao'];
	$nm_profissao = @$_SESSION['nm_profissao'];
   
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
<?php if ( empty($id_responsavel) ){?>
<form name="formulario" id="formulario" method="post" action="responsavel_controller.php" >
  <table width="48%" border="0" cellspacing="0" cellpadding="0" align="center">
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
    <tr> 
      <td width="28%" class="labelDireita">Nome<font color="#FF0000">*</font>:</td>
      <td class="labelEsquerda"><input type="text" name="nm_responsavel" id="nm_responsavel" value="<?php echo $nm_responsavel;?>" size="50" maxlength="50"></td>
    </tr>
    <?
		 require_once("class/conexao.php");
		$mysql = new Mysql();
		$mysql->conectar(); 			
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
      <td width="28%" class="labelDireita">Numero<font color="#FF0000">*</font>:</td>
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
      <td class="labelEsquerda"><input type="text" name="te_profissao" value="<?php echo $te_profissao;?>" size="20" maxlength="20"></td>
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
      <td colspan="2" class="labelEsquerda"><input type="hidden" name="nm_parentesco" id="nm_parentesco" value="<?php echo $nm_parentesco;?>"> 
        <input type="hidden" name="id_matricula" value="<?php echo $id_matricula;?>"> 
		<input type="hidden" name="id_aluno" value="<?php echo $id_aluno;?>">
        <input type="hidden" name="nm_profissao" id="nm_profissao" value="<?php echo $nm_profissao;?>"> </td>
    </tr>
    <tr> 
      <td colspan="6" class="labelCentro"><input name="inserirResponsavel" type="submit" value="Gravar" /> 
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
   
  <table width="49%" border="0" cellspacing="0" cellpadding="0" align="center">
    <tr> 
      <td colspan="8" class="labelEsquerda">&nbsp;</td>
    </tr>
    <tr> 
      <td colspan="8" class="labelEsquerda"> 
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
      <td colspan="8" class="labelEsquerda"><hr></td>
    </tr>
    <tr> 
      <td colspan="8" class="labelEsquerda"><strong>Respons&aacute;vel</strong></td>
    </tr>
    <tr> 
      <td colspan="8" class="labelEsquerda">&nbsp;</td>
    </tr>
    <tr bgcolor="#999999"> 
      <td width="31%" class="labelEsquerda"><font color="#FFFFFF"><strong>Nome</strong>&nbsp;&nbsp;</font></td>
      <td width="8%" class="labelEsquerda"><font color="#FFFFFF"><strong>V&iacute;nculo</strong>&nbsp;</font></td>
      <td width="25%" class="labelEsquerda"><font color="#FFFFFF">&nbsp;<strong>Aluno</strong></font></td>
      <td width="6%" class="labelCentro"><font color="#FFFFFF"><strong>Foto</strong></font></td>
      <td width="6%" class="labelCentro"><font color="#FFFFFF"><strong>Form</strong></font></td>
      <td width="9%" class="labelCentro"><font color="#FFFFFF"><strong>Contrato</strong></font></td>
      <td width="7%" class="labelCentro"><font color="#FFFFFF">&nbsp;<strong>Editar&nbsp;</strong></font></td>
      <td width="8%" class="labelCentro"><strong><font color="#FFFFFF">Excluir</font></strong></td>
    </tr>
    <?php
  require_once("class/conexao.php");
		$mysql = new Mysql();
		$mysql->conectar(); 	
	 $sql = mysql_query("SELECT * FROM responsaveis, alunos, parentescos, matriculas
	 WHERE responsaveis.id_aluno = alunos.id_aluno 
	 AND responsaveis.id_parentesco = parentescos.id_parentesco
	 AND responsaveis.id_matricula = matriculas.id_matricula
	 AND id_responsavel = ".$id_responsavel." ");
    $row = mysql_num_rows($sql);
	for ( $i=0; $i < $row; $i++ ){
	$id_aluno = mysql_result($sql, $i, "id_aluno");
	$id_matricula = mysql_result($sql, $i, "id_matricula");
	$id_responsavel = mysql_result($sql, $i, "id_responsavel");
	$id_usuario = mysql_result($sql, $i, "id_usuario");
	$nm_responsavel = mysql_result($sql, $i, "nm_responsavel");
 	$nm_aluno = mysql_result($sql, $i, "nm_aluno");
	$nm_parentesco = mysql_result($sql, $i, "nm_parentesco");
	$te_imagem = mysql_result($sql, $i, "te_imagem");
	/*if ( $te_imagem == "" && $id_sexo == 1 ){
	$te_imagem = "img_masc.jpg";
	} else {
	$te_imagem = "img_fem.jpg";
	}*/
	$te_imagem == "" ? $te_imagem = "img_masc.jpg" : $te_imagem = $te_imagem; 
	
  ?>
    <tr> 
      <td class="labelEsquerda"><?php echo $nm_responsavel;?></td>
      <td class="labelEsquerda"><?php echo $nm_parentesco;?></td>
      <td class="labelEsquerda"><a href="aluno_controller.php?abrirAlunoTermo=abrirAlunoTermo"><?php echo $nm_aluno;?></a></td>
      <td class="labelCentro"><img src="fotos/<?php echo $te_imagem;?>" width="10" height="10"></td>
      <td class="labelCentro"><a href="matricula_controller.php?exibirDadosResponsavel=exibirDadosResponsavel&id_matricula=<?php echo $id_matricula;?>"><img src="img/lupa.gif" width="10" height="10"></a></td>
      <td class="labelCentro"><a href="matricula_controller.php?exibirMatriculaContrato=exibirMatriculaContrato&id_matricula=<?php echo $id_matricula;?>"><img src="img/lupa.gif" width="10" height="10"></a></td>
      <td class="labelCentro"><a href="responsavel_controller.php?abrirResponsavelEdit=abrirResponsavelEdit&id_responsavel=<?php echo $id_responsavel;?>&opcao=3&id_usuario=<?php echo $id_usuario;?>"><img src="img/insert.gif" width="10" height="10"></a></td>
      <td class="labelCentro"><a href="javascript:del('responsavel_controller.php?excluirResponsavel=id_matricula&id_matricula=<?php echo $id_matricula;?>&id_aluno=<?php echo $id_aluno;?>&opcao=1')"><img src="img/excluir2.gif" width="10" height="10"></a></td>
    </tr>
    <?php }?>
    <tr> 
      <td colspan="8" class="labelEsquerda"><hr></td>
    </tr>
    <tr> 
      <td colspan="8" class="labelEsquerda">Itens:<?php echo $i;?></td>
    </tr>
    <tr> 
      <td colspan="8" class="labelCentro"><input type="hidden" name="id_responsavel" value="<?php echo $id_responsavel;?>"> 
        <input name="volta2" type="button" id="volta2" value="Cancelar" onClick="javascript:executar('cancela_controller.php?cancelarOperacao=cancelarOperacao')" /></td>
    </tr>
  </table>
</form> 

  <?php }?>

</body>

<?php
} else {
 include "rodape/rodape.php";
 }
 ?>
</html>
