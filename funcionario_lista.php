<?php
session_start();

 include "cabecalho/cabecalho.php";
 $msg_sucesso = @$_SESSION['msg_sucesso'];
 $msg_excessao = @$_SESSION['msg_excessao'];
 $nm_objeto = @$_SESSION['nm_objeto'];
 
  	require_once("class/conexao.php");
 //CONECTA AO MYSQL              
	$mysql = new Mysql();
	$mysql->conectar(); 
	
	//$sql = mysql_query("SELECT * FROM funcionarios 	ORDER BY nm_funcionario ");
	
	if ($nm_objeto){
	$sql = mysql_query("SELECT * FROM funcionarios, cargos, usuarios WHERE funcionarios.id_usuario = usuarios.id_usuario AND nm_funcionario LIKE '%$nm_objeto%' AND funcionarios.id_cargo = cargos.id_cargo AND funcionarios.id_ente = ".$_SESSION['id_ente']." ORDER BY nm_funcionario ");
	} else {
	$sql = mysql_query("SELECT * FROM funcionarios,cargos, usuarios WHERE funcionarios.id_usuario = usuarios.id_usuario AND funcionarios.id_cargo = cargos.id_cargo AND funcionarios.id_ente = ".$_SESSION['id_ente']." ORDER BY nm_funcionario ");
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
  <table width="54%" border="0" cellspacing="0" cellpadding="0" align="center">
    <tr> 
      <td colspan="28" class="labelCentro">&nbsp;</td>
    </tr>
    <tr> 
      <td colspan="28" class="labelCentro">&nbsp;</td>
    </tr>
    <tr> 
      <td colspan="28" class="labelCentro">&nbsp;</td>
    </tr>
    <tr> 
      <td colspan="28" class="labelCentro">&nbsp;</td>
    </tr>
    <tr> 
      <td colspan="28" class="labelEsquerda"> 
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
      <td colspan="28" class="labelEsquerda"> </td>
    </tr>
    <tr> 
      <td colspan="28" class="labelCentro"><hr></td>
    </tr>
    <tr> 
      <td colspan="28" class="labelEsquerda"> </td>
    </tr>
    <tr> 
      <td colspan="28" class="labelCentro"><strong>Consulta - Funcion&aacute;rio</strong></td>
    </tr>
    <tr> 
      <td colspan="28" class="labelDireita">&nbsp;</td>
    </tr>
    <tr bgcolor="#999999"> 
      <td width="30%" class="labelEsquerda"><font color="#FFFFFF"><strong>Nome</strong></font></td>
      <td width="20%" class="labelEsquerda"><font color="#FFFFFF"><strong>Cargo</strong></font></td>
      <td width="10%" class="labelEsquerda"><font color="#FFFFFF"><strong>CPF</strong></font></td>
      <td width="14%" class="labelEsquerda"><font color="#FFFFFF"><strong>Telefone</strong></font></td>
      <td width="10%" class="labelCentro"><font color="#FFFFFF"><strong>Ficha</strong></font></td>
      <td width="8%" class="labelCentro"><font color="#FFFFFF"><strong>Editar</strong></font></td>
      <td width="8%" class="labelCentro"><font color="#FFFFFF"><strong>Excluir</strong></font></td>
    </tr>
    <?php
	
	for ($i=0;$i < $row ; $i++){
	$id_funcionario = mysql_result($sql, $i, "id_funcionario");
	$id_usuario = mysql_result($sql, $i, "id_usuario");
	$nm_usuario = mysql_result($sql, $i, "nm_usuario");
	$nm_funcionario = mysql_result($sql, $i, "nm_funcionario");
	$nu_cpf = mysql_result($sql, $i, "nu_cpf");
	$nm_cargo = mysql_result($sql, $i, "nm_cargo");
	$nu_telefone = mysql_result($sql, $i, "nu_telefone");
		
	?>
    <tr onMouseOver="move_i(this)" onMouseOut="move_o(this)" title="<?php echo $nm_usuario;?>"> 
      <td class="labelEsquerda"><?php echo $nm_funcionario;?></td>
      <td class="labelEsquerda"><?php echo $nm_cargo;?></td>
      <td class="labelEsquerda"><?php echo $nu_cpf;?></td>
      <td class="labelEsquerda"><?php echo $nu_telefone;?></td>
      <td class="labelCentro"><a href="funcionario_controller.php?exibirFuncionarioFicha=exibirFuncionarioFicha&id_funcionario=<?php echo $id_funcionario;?>"><img src="img/lupa.gif" width="10" height="10"></a></td>
      <td class="labelCentro"><a href="funcionario_controller.php?abrirFuncionarioEdit=abrirFuncionarioEdit&id_funcionario=<?php echo $id_funcionario;?>&opcao=2&id_usuario=<?php echo $id_usuario;?>"><img src="img/insert.gif" width="10" height="10"></a></td>
      <td class="labelCentro"><a href="javascript:del('funcionario_controller.php?excluirFuncionario=excluirFuncionario&id_funcionario=<?php echo $id_funcionario;?>&opcao=2&id_usuario=<?php echo $id_usuario;?>')"><img src="img/excluir2.gif" width="10" height="10"></a></td>
    </tr>
    <?php }?>
    <tr> 
      <td colspan="8" class="labelEsquerda"><hr></td>
    </tr>
    <tr> 
      <td colspan="8" class="labelEsquerda">Itens:<?php echo $i;?></td>
    </tr>
    <tr> 
      <td colspan="28" class="labelCentro"><input name="imprime" type="button" id="imprime" value="Imprimir" onClick="javascript:executar('funcionario_controller.php?imprimirFuncionarioLista=imprimirFuncionarioLista')" /> 
        <input name="volta" type="button" id="volta" value="Cancelar" onClick="javascript:executar('cancela_controller.php?cancelarOperacao=cancelarOperacao')" /> 
      </td>
      <?php } else {?>
    <tr> 
      <td colspan="28"><div align="center"><font size="2" face="Arial, Helvetica, sans-serif">Relatório 
          vazio!!!</font></div></td>
    </tr>
    <?php }?>
    <tr> 
      <td colspan="28">&nbsp;</tr>
  </table>
</form> 
</body>

<?php
 
} else {

 }
 ?>
</html>
