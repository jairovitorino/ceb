<?php
session_start();

 include "cabecalho/cabecalho.php";
 $msg_sucesso = @$_SESSION['msg_sucesso'];
 $msg_excessao = @$_SESSION['msg_excessao'];
 $nm_objeto = @$_SESSION['nm_objeto'];
 $nu_ano = @date("Y");
  $dt_inicio = @$_SESSION['dt_inicio'];
 $dt_fim = @$_SESSION['dt_fim'];
 
  	require_once("class/conexao.php");
 //CONECTA AO MYSQL              
	$mysql = new Mysql();
	$mysql->conectar(); 
	
	if ( $dt_inicio && $dt_fim ){
	 $dt_inicio = substr($dt_inicio,6,4)."-".substr($dt_inicio,3,2)."-".substr($dt_inicio,0,2);
	  $dt_fim = substr($dt_fim,6,4)."-".substr($dt_fim,3,2)."-".substr($dt_fim,0,2);
	$sql = mysql_query("SELECT * FROM matriculas, alunos, usuarios 
	WHERE matriculas.id_usuario = usuarios.id_usuario 
	AND dt_matricula 
	BETWEEN '".$dt_inicio."' 
	AND '".$dt_fim."' 
	AND matriculas.id_aluno = alunos.id_aluno 
	AND matriculas.id_ente = ".$_SESSION['id_ente']." 
	ORDER BY nm_aluno ");
	} else if ($nm_objeto){
	$sql = mysql_query("SELECT * FROM matriculas, alunos, usuarios 
	WHERE matriculas.id_usuario = usuarios.id_usuario 
	AND nm_aluno LIKE '%$nm_objeto%' 
	AND matriculas.id_aluno = alunos.id_aluno 
	AND matriculas.id_ente = ".$_SESSION['id_ente']." 
	ORDER BY nm_aluno ");
	} else {
	$sql = mysql_query("SELECT * FROM matriculas, alunos, usuarios 
	WHERE matriculas.id_usuario = usuarios.id_usuario 
	AND matriculas.id_aluno = alunos.id_aluno 
	AND nu_ano = ".$nu_ano." 
	AND matriculas.id_ente = ".$_SESSION['id_ente']." ORDER BY nm_aluno ");
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
function ticar(delUrl) {
  if (confirm("Deseja mudar status?")) {
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
  <table width="59%" border="0" cellspacing="0" cellpadding="0" align="center">
    <tr> 
      <td colspan="33" class="labelCentro">&nbsp;</td>
    </tr>
    <tr> 
      <td colspan="33" class="labelCentro">&nbsp;</td>
    </tr>
    <tr> 
      <td colspan="33" class="labelCentro">&nbsp;</td>
    </tr>
    <tr> 
      <td colspan="33" class="labelCentro">&nbsp;</td>
    </tr>
    <tr> 
      <td colspan="33" class="labelEsquerda"> 
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
      <td colspan="33" class="labelEsquerda"> </td>
    </tr>
    <tr> 
      <td colspan="33" class="labelCentro"><hr></td>
    </tr>
    <tr> 
      <td colspan="33" class="labelEsquerda"> </td>
    </tr>
    <tr> 
      <td colspan="33" class="labelCentro"><strong>Consulta - Matr&iacute;cula</strong></td>
    </tr>
    <tr> 
      <td colspan="33" class="labelDireita">&nbsp;</td>
    </tr>
    <tr bgcolor="#999999"> 
      <td width="28%" class="labelEsquerda"><font color="#FFFFFF"><strong>Nome</strong></font></td>
      <td width="6%" class="labelEsquerda"><font color="#FFFFFF"><strong>Termo</strong></font></td>
      <td width="7%" class="labelEsquerda"><font color="#FFFFFF"><strong>Data</strong></font></td>
      <td width="10%" class="labelEsquerda"><font color="#FFFFFF"><strong>CPF</strong></font></td>
      <td width="6%" class="labelEsquerda"><font color="#FFFFFF"><strong>Turno</strong></font></td>
      <td width="6%" class="labelEsquerda"><font color="#FFFFFF"><strong>Almo&ccedil;o</strong></font></td>
      <td width="5%" class="labelEsquerda"><font color="#FFFFFF"><strong>Ano</strong></font></td>
      <td width="7%" class="labelCentro"><font color="#FFFFFF"><strong>Financ</strong></font></td>
      <td width="6%" class="labelCentro"><font color="#FFFFFF"><strong>Form</strong></font></td>
      <td width="7%" class="labelCentro"><font color="#FFFFFF"><strong>Contrato</strong></font></td>
      <td width="6%" class="labelCentro"><font color="#FFFFFF"><strong>Editar</strong></font></td>
      <td width="6%" class="labelCentro"><font color="#FFFFFF"><strong>Excluir</strong></font></td>
    </tr>
    <?php
	
	for ($i=0;$i < $row ; $i++){
	$id_matricula = mysql_result($sql, $i, "id_matricula");
	$dt_matricula = mysql_result($sql, $i, "dt_matricula");
	$dt_matricula = substr($dt_matricula,8,2)."/".substr($dt_matricula,5,2)."/".substr($dt_matricula,0,4);
	$id_usuario = mysql_result($sql, $i, "id_usuario");
	$nm_usuario = mysql_result($sql, $i, "nm_usuario");
	$id_aluno = mysql_result($sql, $i, "id_aluno");
	$nm_aluno = mysql_result($sql, $i, "nm_aluno");
	$nu_termo = mysql_result($sql, $i, "nu_termo");
	$nu_termo = mysql_result($sql, $i, "nu_termo");
	$st_boleto = mysql_result($sql, $i, "st_boleto");
	$st_boleto == 0 ? $st_boleto = "<img src='img/ticar.jpg' width='10' height='10'>" : $st_boleto = "<img src='img/sifao.ico' width='10' height='10'>";
	// <img src='img/ticar.jpg' width='10' height='10'>
	$nu_cpf = mysql_result($sql, $i, "nu_cpf");
	$nu_ano = mysql_result($sql, $i, "nu_ano");
	$in_responsavel = mysql_result($sql, $i, "in_responsavel");
	$in_responsavel == 3 ? $in_responsavel = "<a href='exibirResponsavelBoleto=exibirResponsavelBoleto&id_matricula=<?php echo $id_matricula;?>
    '>Boleto</a>" : $in_responsavel = "-"; $in_almoco = mysql_result($sql, $i, 
    "in_almoco"); $in_almoco == 1 ? $in_almoco = "Sim" : $in_almoco = "Não"; $id_turno 
    = mysql_result($sql, $i, "id_turno"); switch($id_turno){ case 1; $id_turno 
    = "Matutino"; break; case 2; $id_turno = "Vespertino"; break; case 3; $id_turno 
    = "Integral"; break; } ?> 
    <tr onMouseOver="move_i(this)" onMouseOut="move_o(this)" title="<?php echo $nm_usuario;?>"> 
      <td class="labelEsquerda"><?php echo $nm_aluno;?></td>
      <td class="labelEsquerda"><?php echo $nu_termo;?></td>
      <td class="labelEsquerda"><?php echo $dt_matricula;?></td>
      <td class="labelEsquerda"><?php echo $nu_cpf;?></td>
      <td class="labelEsquerda"><?php echo $id_turno;?></td>
      <td class="labelEsquerda"><?php echo $in_almoco;?></td>
      <td class="labelEsquerda"><?php echo $nu_ano;?></td>
      <td class="labelCentro"><a href="javascript:ticar('financeiro_controller.php?ticarMatricula=ticarMatricula&id_matricula=<?php echo $id_matricula;?>&opcao=2&id_aluno=<?php echo $id_aluno;?>&id_usuario=<?php echo $id_usuario;?>')"><?php echo $st_boleto;?></a></td>
      <td class="labelCentro"><a href="matricula_controller.php?exibirDadosResponsavel=exibirDadosResponsavel&id_matricula=<?php echo $id_matricula;?>"><img src="img/lupa.gif" width="10" height="10"></a></td>
      <td class="labelCentro"><a href="matricula_controller.php?exibirMatriculaContrato=exibirMatriculaContrato&id_matricula=<?php echo $id_matricula;?>"><img src="img/lupa.gif" width="10" height="10"></a></td>
      <td class="labelCentro"><a href="matricula_controller.php?abrirMatriculaEdit=abrirMatriculaEdit&id_matricula=<?php echo $id_matricula;?>&opcao=2&id_usuario=<?php echo $id_usuario;?>"><img src="img/insert.gif" width="10" height="10"></a></td>
      <td class="labelCentro"><a href="javascript:del('matricula_controller.php?excluirMatricula=excluirMatricula&id_matricula=<?php echo $id_matricula;?>&opcao=2&id_aluno=<?php echo $id_aluno;?>&id_usuario=<?php echo $id_usuario;?>')"><img src="img/excluir2.gif" width="10" height="10"></a></td>
    </tr>
    <?php }?>
    <tr> 
      <td colspan="13" class="labelEsquerda"><hr></td>
    </tr>
    <tr> 
      <td colspan="13" class="labelEsquerda">Itens:<?php echo $i;?></td>
    </tr>
    <tr> 
      <td colspan="33" class="labelCentro"><input name="imprime" type="button" id="imprime" value="Imprimir" onClick="javascript:executar('matricula_controller.php?imprimirMatriculaLista=imprimirMatriculaLista')" /> 
        <input name="volta" type="button" id="volta" value="Cancelar" onClick="javascript:executar('cancela_controller.php?cancelarOperacao=cancelarOperacao')" /> 
      </td>
      <?php } else {?>
    <tr> 
      <td colspan="33"><div align="center"><font size="2" face="Arial, Helvetica, sans-serif">Relatório 
          vazio!!!</font></div></td>
    </tr>
    <?php }?>
    <tr> 
      <td colspan="33">&nbsp;</tr>
  </table>
</form> 
</body>

<?php
 
} else {

 }
 ?>
</html>
