<?php
session_start();

 include "cabecalho/cabecalho.php";
 $msg_sucesso = @$_SESSION['msg_sucesso'];
 $msg_excessao = @$_SESSION['msg_excessao'];
 $nm_objeto = @$_SESSION['nm_objeto'];
  $nu_ano = date("Y");
   $dt_inicio = @$_SESSION['dt_inicio'];
 	$dt_fim = @$_SESSION['dt_fim'];
    
 	require_once("class/conexao.php");
 	//CONECTA AO MYSQL              
	$mysql = new Mysql();
	$mysql->conectar(); 

	if ( $dt_inicio && $dt_fim ){
	 $dt_inicio = substr($dt_inicio,6,4)."-".substr($dt_inicio,3,2)."-".substr($dt_inicio,0,2);
	  $dt_fim = substr($dt_fim,6,4)."-".substr($dt_fim,3,2)."-".substr($dt_fim,0,2);
	$sql = mysql_query("SELECT * FROM responsaveis, parentescos, matriculas, usuarios 
	WHERE responsaveis.id_usuario = usuarios.id_usuario 
	AND dt_matricula BETWEEN '".$dt_inicio."' AND '".$dt_fim."' 
	AND responsaveis.id_matricula = matriculas.id_matricula 
	AND responsaveis.id_parentesco = parentescos.id_parentesco 
	AND nm_responsavel LIKE '%$nm_objeto%' 
	AND responsaveis.id_ente = ".$_SESSION['id_ente']." 
	ORDER BY nm_responsavel ");
	
	} else if ($nm_objeto){
	$sql = mysql_query("SELECT * FROM responsaveis, parentescos, matriculas, usuarios 
	WHERE responsaveis.id_usuario = usuarios.id_usuario 
	AND responsaveis.id_matricula = matriculas.id_matricula 
	AND responsaveis.id_parentesco = parentescos.id_parentesco 
	AND nm_responsavel LIKE '%$nm_objeto%' 
	AND responsaveis.id_ente = ".$_SESSION['id_ente']." 
	ORDER BY nm_responsavel ");
	
	} else {
	$sql = mysql_query("SELECT * FROM responsaveis, parentescos, matriculas, usuarios 
	WHERE responsaveis.id_usuario = usuarios.id_usuario 
	AND responsaveis.id_matricula = matriculas.id_matricula 
	AND responsaveis.id_parentesco = parentescos.id_parentesco 
	AND nu_ano = ".$nu_ano." 
	AND responsaveis.id_ente = ".$_SESSION['id_ente']." 
	ORDER BY nm_responsavel ");
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
  <table width="64%" border="0" cellspacing="0" cellpadding="0" align="center">
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
      <td colspan="30" class="labelCentro"><strong>Consulta - Respons&aacute;veis</strong></td>
    </tr>
    <tr> 
      <td colspan="30" class="labelDireita">&nbsp;</td>
    </tr>
    <tr bgcolor="#999999"> 
      <td width="30%" class="labelEsquerda"><font color="#FFFFFF"><strong>Nome</strong></font></td>
      <td width="8%" class="labelEsquerda"><font color="#FFFFFF"><strong>Data</strong></font></td>
      <td width="12%" class="labelEsquerda"><font color="#FFFFFF"><strong>Telefone</strong></font></td>
      <td width="5%" class="labelEsquerda"><font color="#FFFFFF"><strong>Ano</strong></font></td>
      <td width="18%" class="labelEsquerda"><font color="#FFFFFF"><strong>Trabalho</strong></font></td>
      <td width="9%" class="labelEsquerda"><font color="#FFFFFF"><strong>Parentesco</strong></font></td>
      <td width="6%" class="labelCentro"><font color="#FFFFFF"><strong>Form</strong></font></td>
      <td width="6%" class="labelCentro"><font color="#FFFFFF"><strong>Editar</strong></font></td>
      <td width="6%" class="labelCentro"><font color="#FFFFFF"><strong>Excluir</strong></font></td>
    </tr>
    <?php
	
	for ($i=0;$i < $row ; $i++){
	$id_matricula = mysql_result($sql, $i, "id_matricula");
	$dt_matricula = mysql_result($sql, $i, "dt_matricula");
	$dt_matricula = substr($dt_matricula,8,2)."/".substr($dt_matricula,5,2)."/".substr($dt_matricula,0,4);
	$id_responsavel = mysql_result($sql, $i, "id_responsavel");
	$id_usuario = mysql_result($sql, $i, "id_usuario");
	$nm_usuario = mysql_result($sql, $i, "nm_usuario");
	$nm_responsavel = mysql_result($sql, $i, "nm_responsavel");
	$nu_telefone = mysql_result($sql, $i, "nu_telefone");
	$nu_ano = mysql_result($sql, $i, "nu_ano");
	$nm_trabalho = mysql_result($sql, $i, "nm_trabalho");
	$nm_parentesco = mysql_result($sql, $i, "nm_parentesco");
		
	?>
    <tr onMouseOver="move_i(this)" onMouseOut="move_o(this)" title="<?php echo $nm_usuario;?>"> 
      <td class="labelEsquerda"><?php echo $nm_responsavel;?></td>
      <td class="labelEsquerda"><?php echo $dt_matricula;?></td>
      <td class="labelEsquerda"><?php echo $nu_telefone;?></td>
      <td class="labelEsquerda"><?php echo $nu_ano;?></td>
      <td class="labelEsquerda"><?php echo $nm_trabalho;?></td>
      <td class="labelEsquerda"><?php echo $nm_parentesco;?></td>
      <td class="labelCentro"><a href="matricula_controller.php?exibirDadosResponsavel=exibirDadosResponsavel&id_matricula=<?php echo $id_matricula;?>"><img src="img/lupa.gif" width="10" height="10"></a></td>
      <td class="labelCentro"><a href="responsavel_controller.php?abrirResponsavelEdit=abrirResponsavelEdit&id_responsavel=<?php echo $id_responsavel;?>&opcao=2&id_usuario=<?php echo $id_usuario;?>"><img src="img/insert.gif" width="10" height="10"></a></td>
      <td class="labelCentro"><a href="javascript:del('responsavel_controller.php?excluirResponsavel=excluirResponsavel&id_responsavel=<?php echo $id_responsavel;?>&id_usuario=<?php echo $id_usuario;?>&opcao=2')"><img src="img/excluir2.gif" width="10" height="10"></a></td>
    </tr>
    <?php }?>
    <tr> 
      <td colspan="30" class="labelEsquerda"><hr></td>
    </tr>
    <tr> 
      <td colspan="10" class="labelEsquerda">Itens:<?php echo $i;?></td>
    </tr>
    <tr> 
      <td colspan="30" class="labelCentro"><input name="imprime" type="button" id="imprime" value="Imprimir" onClick="javascript:executar('responsavel_controller.php?imprimirResponsavelLista=imprimirResponsavelLista')" /> 
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
</body>

<?php

} else {
 
 }
 ?>
</html>
