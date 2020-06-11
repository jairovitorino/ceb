<?php
session_start();

 include "cabecalho/cabecalho.php";
 $msg_sucesso = @$_SESSION['msg_sucesso'];
 $msg_excessao = @$_SESSION['msg_excessao'];
 
   $id_acao = @$_SESSION['id_acao'];
   
 	require_once("class/conexao.php");
 //CONECTA AO MYSQL              
	$mysql = new Mysql();
	$mysql->conectar(); 
	
	@$p = $_GET["p"];
	if(isset($p)) {
	$p = $p;
	} else {
	$p = 1;
	}
	$qnt = 150;
	$inicio = ($p*$qnt) - $qnt;
	
if ($id_acao){
	$sql = mysql_query("SELECT * FROM logs, acoes, usuarios WHERE logs.id_usuario = usuarios.id_usuario AND logs.id_acao = acoes.id_acao AND logs.id_acao = ".$id_acao." ORDER BY dt_log, hr_log DESC LIMIT $inicio, $qnt");
	} else {
	$sql = mysql_query("SELECT * FROM logs, acoes, usuarios WHERE logs.id_usuario = usuarios.id_usuario AND logs.id_acao = acoes.id_acao ORDER BY dt_log DESC LIMIT $inicio, $qnt");
	}
	@$row = mysql_num_rows($sql);
 
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
	document.formulario.nm_filho.focus();
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
function move_i(what) { what.style.background='#CCCCCC'; }
function move_o(what) { what.style.background='#F5F5F5'; }
</script>
</head>
<link rel="stylesheet" href="css/filadelfia.css" type="text/css">
<link rel="SHORTCUT ICON" href="<?php echo $icon;?>"/>
<body bgcolor="#F5F5F5" onLoad="javascript:caixas()">
<form name="formulario" id="campo" method="post" action="controller.php" onSubmit="valida_dados(this)">
<?php if ( $row ) {?>
  <table width="39%" border="0" cellspacing="0" cellpadding="0" align="center">
    <tr> 
      <td colspan="30" class="labelCentro">&nbsp;</td>
    </tr>
    <tr> 
      <td colspan="30" class="labelCentro">&nbsp;</td>
    </tr>
    <tr> 
      <td colspan="30" class="labelCentro">&nbsp;</td>
    </tr>
    <tr> 
      <td colspan="30" class="labelCentro">&nbsp;</td>
    </tr>
    <tr> 
      <td colspan="30" class="labelEsquerda"> 
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
      <td colspan="30" class="labelEsquerda"> </td>
    </tr>
    <tr> 
      <td colspan="30" class="labelCentro"><hr></td>
    </tr>
    <tr> 
      <td colspan="30" class="labelEsquerda"> </td>
    </tr>
    <tr> 
      <td colspan="30" class="labelCentro"><strong>Consulta - Log</strong></td>
    </tr>
    <tr> 
      <td colspan="30" class="labelDireita">&nbsp; </td>
    </tr>
    <tr bgcolor="#999999"> 
      <td width="12%" class="labelEsquerda"><font color="#FFFFFF"><strong>A&ccedil;&atilde;o</strong></font></td>
      <td width="11%" class="labelEsquerda"><font color="#FFFFFF"><strong>Objeto</strong></font></td>
      <td width="11%" class="labelEsquerda"><font color="#FFFFFF"><strong>Data</strong></font></td>
      <td width="9%" class="labelEsquerda"><font color="#FFFFFF"><strong>Hora</strong></font></td>
      <td width="15%" class="labelEsquerda"><font color="#FFFFFF"><strong>IP</strong></font></td>
      <td width="23%" class="labelEsquerda"><font color="#FFFFFF"><strong>Usu&aacute;rio</strong></font></td>
      <td width="19%" class="labelEsquerda"><font color="#FFFFFF"><strong>Dispositivo</strong></font></td>
    </tr>
    <?php
	
	for ($i=0;$i < $row ; $i++){
	$id_log = mysql_result($sql, $i, "id_log");
	$nm_acao = mysql_result($sql, $i, "nm_acao");
	$nm_objeto = mysql_result($sql, $i, "nm_objeto");
	$dt_log = mysql_result($sql, $i, "dt_log");
	$dt_log = substr($dt_log,8,2)."/".substr($dt_log,5,2)."/".substr($dt_log,0,4);
	$hr_log = mysql_result($sql, $i, "hr_log");
	$nu_ip = mysql_result($sql, $i, "nu_ip");
	$nm_usuario = mysql_result($sql, $i, "nm_usuario");
	$nm_dispositivo = mysql_result($sql, $i, "nm_dispositivo");
	
	?>
    <tr onMouseOver="move_i(this)" onMouseOut="move_o(this)" title=""> 
      <td class="labelEsquerda"><?php echo $nm_acao;?></td>
      <td class="labelEsquerda"><?php echo $nm_objeto;?></td>
      <td class="labelEsquerda"><?php echo $dt_log;?></td>
      <td class="labelEsquerda"><?php echo $hr_log;?></td>
      <td class="labelEsquerda"><?php echo $nu_ip;?></td>
      <td class="labelEsquerda"><?php echo $nm_usuario;?></td>
      <td class="labelEsquerda"><?php echo $nm_dispositivo;?></td>
    </tr>
    <?php }?>
    <tr> 
      <td colspan="30" class="labelEsquerda"><hr></td>
    </tr>
    <tr> 
      <td colspan="10" class="labelEsquerda">Itens:<?php echo $i;?></td>
    </tr>
    <tr> 
      <td colspan="30" class="labelCentro"><input name="imprime" type="button" id="imprime" value="Imprimir" onClick="javascript:executar('usuario_controller.php?imprimirLogLista=imprimirLogLista')" /> 
        <input name="volta" type="button" id="volta" value="Cancelar" onClick="javascript:executar('cancela_controller.php?cancelarOperacao=cancelarOperacao')" /> 
      </td>
      <?php } else {?>
    <tr> 
      <td colspan="30"><div align="center"><font size="2" face="Arial, Helvetica, sans-serif">Relatório 
          vazio!!!</font></div></td>
    </tr>
    <?php }?>
    <tr> 
      <td colspan="30">&nbsp;</tr>
  </table>
</form> 
<p align="center" class="labelCentro">
  <?php // include("paginacao_alunos.php");?>
</p>
</body>

<?php

} else {
 
 }
 ?>
</html>
