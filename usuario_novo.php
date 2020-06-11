<?php
session_start();

 include "cabecalho/cabecalho.php";
 $msg_sucesso = @$_SESSION['msg_sucesso'];
 $msg_excessao = @$_SESSION['msg_excessao'];
 $login_mansao = @$_SESSION['login_mansao'];
   
 if ($login_mansao){
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
function cancelar(delUrl) { 
    document.location = delUrl; 
}
function move_i(what) { what.style.background='#CCCCCC'; }
function move_o(what) { what.style.background='#F5F5F5'; }
function del(delUrl) {
  if (confirm("Deseja excluir?")) {
    document.location = delUrl;
  }
}
</script>
</head>
<link rel="stylesheet" href="css/textos.css" type="text/css">
<link rel="stylesheet" href="css/estilo.css" type="text/css">
<link rel="stylesheet" href="css/filadelfia.css" type="text/css">
<link rel="SHORTCUT ICON" href="<?php echo $icon;?>"/>
<body bgcolor="#F5F5F5" onLoad="javascript:caixas()">
<form name="formulario" id="campo" method="post" action="usuario_controller.php" onSubmit="valida_dados(this)">
  <table width="64%" border="0" cellspacing="0" cellpadding="0" align="center">
    <tr> 
      <td colspan="5" class="labelCentro">&nbsp;</td>
    </tr>
    <tr> 
      <td colspan="5" class="labelCentro">&nbsp;</td>
    </tr>
    <tr> 
      <td colspan="5" class="labelCentro">USU&Aacute;RIO(S) NOVO(S)</td>
    </tr>
    <tr> 
      <td colspan="5" class="labelEsquerda"> 
        <?php
  if ($msg_sucesso){
   echo "<div align='left'>
   <img src='img/msg_azul.png' width='20' height='20'><font color='#0099CC' size='2' face='Arial, Helvetica, sans-serif'> $msg_sucesso </font></div>";
     } else if ($msg_excessao){
	   echo "<div align='left'>
   <img src='img/msg_vermelha.gif' width='20' height='20'><font color='#FF0000' size='2' face='Arial, Helvetica, sans-serif'> $msg_excessao </font></div>";
	 }	
	 require_once("class/conexao.php");
	$mysql = new Mysql();
	$mysql->conectar();
	$sql = mysql_query("SELECT * FROM usuarios
	WHERE usuarios.id_status = 2 	");
	$row = mysql_num_rows($sql);
   ?>
      </td>
    </tr>
    <tr> 
      <td colspan="5" class="labelEsquerda"> </td>
    </tr>
    <tr> 
      <td colspan="5" class="labelCentro"><hr></td>
    </tr>
    <?php 
	if ( $row == 0 ){
	?>
    <tr> 
      <td colspan="11" class="labelCentro"><font color="FF0000">Usu&aacute;rio(s) novo(s) não lançado(s)!!!</font></td>
    </tr>
    <?php } else {?>
    <tr bgcolor="#666666"> 
      <td width="25%" class="labelEsquerda"><strong><font color="#FFFFFF">E-mail</font></strong></td>
      <td width="58%" class="labelEsquerda"><strong><font color="#FFFFFF">Nome</font></strong><strong></strong><strong></strong><strong></strong><strong></strong></td>
      <td width="8%" class="labelCentro"><strong><font color="#FFFFFF">Gerar</font></strong></td>
      <td width="9%" class="labelCentro"><strong><font color="#FFFFFF">Excluir</font></strong></td>
    </tr>
    <?php	
	for ( $i=0; $i < $row; $i++ ){
	$id_usuario = mysql_result($sql, $i, "id_usuario");
	$nm_usuario= mysql_result($sql, $i, "nm_usuario");
	$nm_login= mysql_result($sql, $i, "nm_login");	
	?>
    <tr onMouseOver="move_i(this)" onMouseOut="move_o(this)"> 
      <td width="25%" class="labelEsquerda"><?php echo $nm_login;?></td>
      <td class="labelEsquerda"><?php echo $nm_usuario;?></td>
      <td width="8%" class="labelCentro"><a href="controller.php?gerarConta=gerarConta&email=<?php echo $nm_login;?>&nome=<?php echo $nm_usuario;?>"><img src="img/insert.gif" width="10" height="10"></a></td>
      <td width="9%" class="labelCentro"><a href="javascript:del('controller.php?excluirResponsavel=excluirResponsavel&id_responsavel=<?php echo $id_responsavel;?>&opcao=1&id_usuario=<?php echo $id_usuario;?>')"><img src="img/excluir2.gif" width="10" height="10"></a></td>
    </tr>
    <?php }?>
	 <?php }?>
    <tr> 
      <td colspan="5" class="labelEsquerda"><hr></td>
    </tr>
    <tr> 
      <td colspan="5" class="labelEsquerda"><input type="hidden" name="abrirResponsavel"></td>
    </tr>
    <tr> 
      <td colspan="9" class="labelCentro"> <input name="volta" type="button" id="volta" value="Cancelar" onClick="javascript:cancelar('cancela_controller.php?cancelarOperacao=cancelarOperacao')" /> 
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
