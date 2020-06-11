<?php
session_start();

 include "cabecalho/cabecalho.php";
 $msg_sucesso = @$_SESSION['msg_sucesso'];
 $msg_excessao = @$_SESSION['msg_excessao'];

	$id_aluno = @$_SESSION['id_aluno'];
	$nu_termo = @$_SESSION['nu_termo'];
	$nu_cep = @$_SESSION['nu_cep'];
	

   
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

</script>
</head>
<link rel="stylesheet" href="css/filadelfia.css" type="text/css">
<link rel="SHORTCUT ICON" href="<?php echo $icon;?>"/>
<body bgcolor="#F5F5F5" onLoad="javascript:caixas()">
<form name="formulario" id="formulario" method="post" action="aluno_controller.php" >
  <table width="43%" border="0" cellspacing="0" cellpadding="0" align="center">
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
      <td colspan="4" class="labelEsquerda"><strong>Aluno</strong></td>
    </tr>
    <tr> 
      <td colspan="4" class="labelEsquerda">&nbsp;</td>
    </tr>
    <tr> 
      <td colspan="4" class="labelEsquerda">&nbsp;</td>
    </tr>
    <tr> 
      <td width="28%" class="labelDireita">Termo:</td>
      <td width="27%" class="labelEsquerda"><input type="text" name="nu_termo" id="nu_termo" value="<?php echo $nu_termo;?>" size="15" maxlength="11"></td>
      <td width="8%" class="labelDireita">CEP:</td>
      <td width="37%" class="labelEsquerda"><input name="nu_cep" type="text" value="<?php echo $nu_cep;?>" size="9" maxlength="8"></td>
    </tr>
    <tr> 
      <td class="labelDireita">&nbsp;</td>
      <td colspan="3" class="labelEsquerda">&nbsp;</td>
    </tr>
    <tr> 
      <td colspan="4" class="labelEsquerda"><hr></td>
    </tr>
    <tr> 
      <td colspan="4" class="labelEsquerda"><input type="hidden" name="id_aluno" value="<?php echo $id_aluno;?>"> 
      </td>
    </tr>
    <tr> 
      <td colspan="8" class="labelCentro"><input name="lookupAluno" type="submit" value="Pesquisar" /> 
        <input name="volta" type="button" id="volta" value="Cancelar" onClick="javascript:executar('cancela_controller.php?cancelarOperacao=cancelarOperacao')" /> 
      </td>
    </tr>
  </table>
</form> 
<?php if ( $id_aluno ){?>
<table width="43%" border="0" cellspacing="0" cellpadding="0" align="center">
  <tr bgcolor="#999999"> 
    <td width="15%" class="labelEsquerda"><font color="#FFFFFF"><strong>Termo</strong>&nbsp;&nbsp;</font></td>
    <td width="37%" class="labelEsquerda"><font color="#FFFFFF"><strong>Aluno</strong></font><font color="#FFFFFF">&nbsp;</font></td>
    <td width="8%" class="labelCentro"><font color="#FFFFFF"><strong>Foto</strong></font></td>
    <td width="9%" class="labelCentro"><font color="#FFFFFF"><strong>Ficha</strong></font></td>
    <td width="10%" class="labelCentro"><font color="#FFFFFF"><strong>Matricular</strong></font></td>
    <td width="9%" class="labelCentro"><font color="#FFFFFF"><strong>Editar</strong></font></td>
    <td width="12%" class="labelCentro"><strong><font color="#FFFFFF">Excluir</font></strong><strong><font color="#FFFFFF">&nbsp;</font></strong></td>
  </tr>
  <?php
 	 require_once("class/conexao.php");
		$mysql = new Mysql();
		$mysql->conectar(); 
	 $sql = mysql_query("SELECT * FROM alunos WHERE id_aluno = ".$id_aluno." ");
    $row = mysql_num_rows($sql);
	for ( $i=0; $i < $row; $i++ ){
	$nu_termo = mysql_result($sql, $i, "nu_termo");
	$id_usuario = mysql_result($sql, $i, "id_usuario");
 	$nm_aluno = mysql_result($sql, $i, "nm_aluno");
	$id_sexo = mysql_result($sql, $i, "id_sexo");
	$te_imagem = mysql_result($sql, $i, "te_imagem");
	$te_imagem = substr($te_imagem,14);
	//$te_imagem != "" ? $image = "<a href='img/$te_arquivo'><img src='img/file.png' width='10' height='10'></a>" : $image = "--";  
	if ( $te_imagem == "" && $id_sexo == 1 ){
	$te_imagem = "img_masc.jpg";
	} else if ( $te_imagem == "" && $id_sexo == 2) {
	$te_imagem = "img_fem.jpg";
	} else {
	$te_imagem = $te_imagem;
	}		
	
  ?>
  <tr> 
    <td class="labelEsquerda"><?php echo $nu_termo;?></td>
    <td class="labelEsquerda"><?php echo $nm_aluno;?></td>
    <td class="labelCentro"><img src="fotos/<?php echo $te_imagem;?>" width="10" height="10"></td>
    <td class="labelCentro"><a href="aluno_controller.php?exibirAlunoFicha=exibirAlunoFicha&id_aluno=<?php echo $id_aluno;?>"><img src="img/lupa.gif" width="10" height="10"></a></td>
    <td class="labelCentro"><a href="matricula_controller.php?inserirMatriculaTermo=inserirMatriculaTermo&nu_termo=<?php echo $nu_termo;?>&id_aluno=<?php echo $id_aluno;?>&nm_aluno=<?php echo $nm_aluno;?>"><img src="img/insert.gif" width="10" height="10"></a></td>
    <td class="labelCentro"><a href="aluno_controller.php?abrirAlunoEdit=abrirAlunoEdit&id_aluno=<?php echo $id_aluno;?>&id_usuario=<?php echo $id_usuario;?>&opcao=3&te_imagem=<?php echo $te_imagem;?>"><img src="img/insert.gif" width="10" height="10"></a></td>
    <td class="labelCentro"><a href="javascript:del('aluno_controller.php?excluirAluno=excluirAluno&id_aluno=<?php echo $id_aluno;?>&id_usuario=<?php echo $id_usuario;?>&opcao=3')"><img src="img/excluir2.gif" width="10" height="10"></a></td>
  </tr>
  <?php }?>
  <tr> 
    <td colspan="7" class="labelEsquerda"><hr></td>
  </tr>
  <tr> 
    <td colspan="7" class="labelEsquerda">Itens:<?php echo $i;?></td>
  </tr>
</table>
  <?php }?>

</body>

<?php
} else {
 include "rodape/rodape.php";
 }
 ?>
</html>
