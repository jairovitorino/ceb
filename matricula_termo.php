<?php
session_start();

 include "cabecalho/cabecalho.php";
 $msg_sucesso = @$_SESSION['msg_sucesso'];
 $msg_excessao = @$_SESSION['msg_excessao'];

	$id_matricula = @$_SESSION['id_matricula'];
	$nu_termo = @$_SESSION['nu_termo'];
	

   
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
	document.formulario.nu_termo.focus();
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

</script>
</head>
<link rel="stylesheet" href="css/filadelfia.css" type="text/css">
<link rel="SHORTCUT ICON" href="<?php echo $icon;?>"/>
<body bgcolor="#F5F5F5" onLoad="javascript:caixas()">
<?php if ( empty($id_matricula) ){?>
<form name="formulario" id="formulario" method="post" action="matricula_controller.php" >
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
    <tr> 
      <td width="28%" class="labelDireita">Termo:</td>
      <td class="labelEsquerda"><input type="text" name="nu_termo" id="nu_termo" value="<?php echo $nu_termo;?>" size="15" maxlength="11"></td>
    </tr>
   
    <tr> 
      <td class="labelDireita">&nbsp;</td>
      <td class="labelEsquerda">&nbsp;</td>
    </tr>
    <tr> 
      <td colspan="2" class="labelEsquerda"><hr></td>
    </tr>
    <tr> 
      <td colspan="2" class="labelEsquerda"><input type="hidden" name="id_aluno" value="<?php echo $id_aluno;?>"> 
      </td>
    </tr>
    <tr> 
      <td colspan="6" class="labelCentro"><input name="lookupMatricula" type="submit" value="Pesquisar" /> 
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
   
  <table width="37%" border="0" cellspacing="0" cellpadding="0" align="center">
    <tr bgcolor="#999999"> 
      <td width="10%" class="labelEsquerda"><font color="#FFFFFF"><strong>Termo</strong>&nbsp;&nbsp;</font></td>
      <td width="40%" class="labelEsquerda"><font color="#FFFFFF"><strong>Aluno</strong></font><font color="#FFFFFF">&nbsp;</font></td>
      <td width="9%" class="labelEsquerda"><font color="#FFFFFF"><strong>Sexo</strong></font></td>
      <td width="10%" class="labelCentro"><font color="#FFFFFF"><strong>Form</strong></font></td>
      <td width="11%" class="labelCentro"><font color="#FFFFFF"><strong>Contrato</strong></font></td>
      <td width="9%" class="labelCentro"><font color="#FFFFFF">&nbsp;</font><strong><font color="#FFFFFF">Editar</font></strong><strong><font color="#FFFFFF">&nbsp;</font></strong></td>
      <td width="11%" class="labelCentro"><strong><font color="#FFFFFF">Excluir</font></strong><strong><font color="#FFFFFF"></font></strong></td>
    </tr>
    <?php
 	 require_once("class/conexao.php");
		$mysql = new Mysql();
		$mysql->conectar(); 
	 $sql = mysql_query("SELECT * FROM matriculas, alunos WHERE matriculas.id_aluno = alunos.id_aluno AND matriculas.id_matricula = ".$id_matricula." ");
    $row = mysql_num_rows($sql);
	for ( $i=0; $i < $row; $i++ ){
	$id_matricula = mysql_result($sql, $i, "id_matricula");
	$id_usuario = mysql_result($sql, $i, "id_usuario");
	$nu_termo = mysql_result($sql, $i, "nu_termo");
 	$nm_aluno = mysql_result($sql, $i, "nm_aluno");
	$id_sexo = mysql_result($sql, $i, "id_sexo");
	$te_imagem = mysql_result($sql, $i, "te_imagem");
	/*if ( $te_imagem == "" && $id_sexo == 1 ){
	$te_imagem = "img_masc.jpg";
	} else {
	$te_imagem = "img_fem.jpg";
	}*/
	$te_imagem == "" ? $te_imagem = "img_masc.jpg" : $te_imagem = $te_imagem; 
	$id_sexo == 1 ? $id_sexo = "M" : $id_sexo = "F";
  ?>
    <tr> 
      <td class="labelEsquerda"><?php echo $nu_termo;?></td>
      <td class="labelEsquerda"><?php echo $nm_aluno;?></td>
      <td class="labelEsquerda"><?php echo $id_sexo;?></td>
      <td class="labelCentro"><a href="matricula_controller.php?exibirDadosResponsavel=exibirDadosResponsavel&id_matricula=<?php echo $id_matricula;?>"><img src="img/lupa.gif" width="10" height="10"></a></td>
      <td class="labelCentro"><a href="matricula_controller.php?exibirMatriculaContrato=exibirMatriculaContrato&id_matricula=<?php echo $id_matricula;?>"><img src="img/lupa.gif" width="10" height="10"></a></td>
      <td class="labelCentro"><a href="matricula_controller.php?abrirMatriculaEdit=abrirMatriculaEdit&id_matricula=<?php echo $id_matricula;?>&opcao=2&id_usuario=<?php echo $id_usuario;?>"><img src="img/insert.gif" width="10" height="10"></a></td>
      <td class="labelCentro"><a href="javascript:del('matricula_controller.php?excluirMatricula=excluirMatricula&id_matricula=<?php echo $id_matricula;?>&opcao=1&id_usuario=<?php echo $id_usuario;?>')"><img src="img/excluir2.gif" width="10" height="10"></a></td>
    </tr>
    <?php }?>
    <tr> 
      <td colspan="7" class="labelEsquerda"><hr></td>
    </tr>
    <tr> 
      <td colspan="7" class="labelEsquerda">Itens:<?php echo $i;?></td>
    </tr>
    <tr> 
      <td colspan="7" class="labelCentro"><input name="volta2" type="button" id="volta2" value="Cancelar" onClick="javascript:executar('cancela_controller.php?cancelarOperacao=cancelarOperacao')" /></td>
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
