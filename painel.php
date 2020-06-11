<?php
session_start();

 include "cabecalho/cabecalho.php";
$nu_ano = @date("Y");
$nu_mes = @date("m");

 $login_centro = @$_SESSION['login_centro'];
   
 if ($login_centro){
//CONECTA AO MYSQL              
 	require_once("class/conexao.php");
	$mysql = new Mysql();
	$mysql->conectar(); 
	
	$nu_ano = @date("Y");
	
	$alunos = mysql_query("SELECT matriculas.nu_ano,alunos.id_aluno, COUNT(alunos.id_aluno) AS qt_aluno
	FROM alunos, matriculas	
	WHERE alunos.id_status != 3
	AND matriculas.id_aluno = alunos.id_aluno
	AND nu_ano = ".$nu_ano."	");
	$row_aluno = mysql_num_rows($alunos);
	
	$series = mysql_query("SELECT nm_serie, COUNT(matriculas.id_serie) AS qt 
	FROM matriculas, series
	WHERE matriculas.id_serie = series.id_serie
	AND nu_ano = ".$nu_ano."
	GROUP BY series.id_serie
	ORDER BY series.id_serie ");
	$row_serie = mysql_num_rows($series);
	
	$almocos = mysql_query("SELECT matriculas.in_almoco,COUNT(matriculas.in_almoco) AS qt 
	FROM matriculas, alunos
	WHERE matriculas.id_aluno = alunos.id_aluno
	AND nu_ano = ".$nu_ano."
	GROUP BY matriculas.in_almoco ");
	$row_almoco = mysql_num_rows($almocos);
	
	$turnos = mysql_query("SELECT COUNT(matriculas.id_turno) AS qt, id_turno 
	FROM matriculas, alunos
	WHERE matriculas.id_aluno = alunos.id_aluno
	AND nu_ano = ".$nu_ano."
	GROUP BY matriculas.id_turno ");
	$row_turno = mysql_num_rows($turnos);
	
	$sexos = mysql_query("SELECT COUNT(alunos.id_sexo) AS qt, id_sexo 
	FROM matriculas, alunos
	WHERE matriculas.id_aluno = alunos.id_aluno
	AND nu_ano = ".$nu_ano."
	GROUP BY alunos.id_sexo ");
	$row_sexo = mysql_num_rows($sexos);
	
	$idades = mysql_query("SELECT COUNT(matriculas.id_matricula) AS qt, alunos.dt_nascimento,(YEAR(CURDATE())-YEAR(alunos.dt_nascimento)) AS nu_idade
	FROM matriculas, alunos
	WHERE matriculas.id_aluno = alunos.id_aluno
	AND nu_ano = ".$nu_ano."
	GROUP BY nu_idade ");
	$row_idade = mysql_num_rows($idades);  
	
	$acessos = mysql_query("SELECT logs.id_acao,COUNT(logs.id_acao) AS qt, nm_acao 
	FROM logs, acoes
	WHERE logs.id_acao = acoes.id_acao
	GROUP BY logs.id_acao ");
	$row_acesso = mysql_num_rows($acessos);			
	
?>
<html>
<head>
<title><?php echo $titulo;?></title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<script language="JavaScript">

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
<form name="formulario" id="formulario" method="post" action="">
<?php // if ( ($row_produtos) || ($row_recebimento) || ($row_estoque) ) {?>
  <table width="98%" border="0" cellspacing="0" cellpadding="0" align="center">
    <tr> 
      <td colspan="2" class="labelCentro">&nbsp;</td>
    </tr>
    <tr> 
      <td colspan="2" class="labelCentro">&nbsp;</td>
    </tr>
    <tr> 
      <td colspan="2" class="labelCentro">&nbsp;</td>
    </tr>
	<?php if ( $row_serie ){?>
    <tr> 
      <td colspan="2" class="labelCentro"><strong>Painel</strong></td>
    </tr>
    <tr> 
      <td colspan="2" class="labelEsquerda">&nbsp; </td>
    </tr>
    <tr> 
      <td colspan="2" class="labelEsquerda">&nbsp; </td>
    </tr>
    <tr> 
      <td colspan="2" class="labelCentro">&nbsp;</td>
    </tr>
    <tr> 
      <td colspan="2" class="labelEsquerda">&nbsp; </td>
    </tr>
    <tr> 
      <td colspan="2" class="labelEsquerda">&nbsp;</td>
    </tr>   
	
	<tr> 
      <td colspan="2" class="labelEsquerda">&nbsp;</td>
    </tr>   
	<?php if ( $row_aluno ) {?>
	<tr> 
      <td colspan="2" class="labelEsquerda"><strong>Almo&ccedil;o</strong></td>
    </tr>
    <?php 	
	for ( $a=0; $a < $row_almoco; $a++ ){
	$in_almoco = mysql_result($almocos, $a, "in_almoco");
	$in_almoco == 1 ? $nm_almoco = "Sim" : $nm_almoco = "Não";
	$qt = mysql_result($almocos, $a, "qt");
	
	?>
    <tr onMouseOver="move_i(this)" onMouseOut="move_o(this)" title=""> 
      <td width="7%" class="labelEsquerda"><?php echo $nm_almoco;?></td>
      <td width="93%" class="labelEsquerda"><img src="img/quadro_blue.jpg" width="<?php echo $qt;?>" height="10"><?php echo $qt;?></td>
    </tr>
    <?php } ?>
	<tr> 
      <td colspan="2" class="labelEsquerda">&nbsp;</td>
    </tr>
    <tr> 
      <td colspan="2" class="labelEsquerda"><strong>Turno</strong></td>
    </tr>
    <?php 	
	for ( $b=0; $b < $row_turno; $b++ ){
	$id_turno = mysql_result($turnos, $b, "id_turno");
	$qt = mysql_result($turnos, $b, "qt");
	switch($id_turno){
	case 1;
	$nm_turno = "Matutino";
	break;
	case 2;
	$nm_turno = "Vespertino";
	break;	
	case 3;
	$nm_turno = "Integral";
	break;
	
	}
	?>
    <tr onMouseOver="move_i(this)" onMouseOut="move_o(this)" title=""> 
      <td width="7%" class="labelEsquerda"><?php echo $nm_turno;?></td>
      <td width="93%" class="labelEsquerda"><img src="img/quadro_blue.jpg" width="<?php echo $qt;?>" height="10"><?php echo $qt;?></td>
    </tr>
    <?php } ?>
	<tr> 
      <td colspan="2" class="labelEsquerda">&nbsp;</td>
    </tr>
    <tr> 
      <td colspan="2" class="labelEsquerda"><strong>Sexo</strong></td>
    </tr>
    <?php 	
	for ( $c=0; $c < $row_sexo; $c++ ){
	$id_sexo = mysql_result($sexos, $c, "id_sexo");
	$qt = mysql_result($sexos, $c, "qt");
	switch($id_sexo){
	case 1;
	$nm_sexo = "Masculino";
	break;
	case 2;
	$nm_sexo = "Feminino";
	break;	
	
	
	}
	?>
    <tr onMouseOver="move_i(this)" onMouseOut="move_o(this)" title=""> 
      <td width="7%" class="labelEsquerda"><?php echo $nm_sexo;?></td>
      <td width="93%" class="labelEsquerda"><img src="img/quadro_blue.jpg" width="<?php echo $qt;?>" height="10"><?php echo $qt;?></td>
    </tr>
    <?php } ?>
	
	<tr> 
      <td colspan="2" class="labelEsquerda">&nbsp;</td>
    </tr>
    
	<tr> 
      <td colspan="2" class="labelEsquerda"><strong>S&eacute;rie</strong></td>
    </tr>
    <?php 	
	for ( $d=0; $d < $row_serie; $d++ ){
	$nm_serie = mysql_result($series, $d, "nm_serie");
	$qt = mysql_result($series, $d, "qt");
	
	?>
    <tr onMouseOver="move_i(this)" onMouseOut="move_o(this)" title=""> 
      <td width="7%" class="labelEsquerda"><?php echo $nm_serie;?></td>
      <td width="93%" class="labelEsquerda"><img src="img/quadro_blue.jpg" width="<?php echo $qt;?>" height="10"><?php echo $qt;?></td>
    </tr>
    <?php } ?>
	<tr>
      <td colspan="2" class="labelEsquerda">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="2" class="labelEsquerda"><strong>Idades</strong></td>
    </tr>
    <?php  
	for ( $c=0; $c < $row_idade; $c++ ){
	$nu_idade = mysql_result($idades, $c, "nu_idade");
	$qt = mysql_result($idades, $c, "qt");

	?>
    <tr onMouseOver="move_i(this)" onMouseOut="move_o(this)" title="">
      <td width="7%" class="labelEsquerda"><?php echo $nu_idade;?></td>
      <td width="93%" class="labelEsquerda"><img src="img/quadro_blue.jpg" width="<?php echo $qt;?>" height="10"><?php echo $qt;?></td>
    </tr>
    <?php } ?>
	<tr>
      <td colspan="2" class="labelEsquerda">&nbsp;</td>
    </tr>
	<?php if ( $_SESSION['login_centro'] == 'jairo.vitorino@gmail.com' ){?>
    <tr>
      <td colspan="2" class="labelEsquerda"><strong>Acessos</strong></td>
    </tr>
    <?php  
	for ( $c=0; $c < $row_acesso; $c++ ){
	$id_acao = mysql_result($acessos, $c, "id_acao");
	$nm_acao = mysql_result($acessos, $c, "nm_acao");
	$qt = mysql_result($acessos, $c, "qt");

	?>
    <tr onMouseOver="move_i(this)" onMouseOut="move_o(this)" title="">
      <td width="7%" class="labelEsquerda"><?php echo $nm_acao;?></td>
      <td width="91%" class="labelEsquerda"><a href="painel_controller.php?abrirLogLista=abrirLogLista&id_acao=<?php echo $id_acao;?>"><img src="img/quadro_blue.jpg" width="<?php echo $qt;?>" height="10"></a><?php echo $qt;?></td>
    </tr>
    <?php } ?>
	 <?php } ?>
    <tr> 
      <td colspan="2" class="labelEsquerda">&nbsp;</td>
    </tr>
	
	<tr>
      <td colspan="2" class="labelEsquerda"><hr></td>
    </tr>
    <tr> 
      <td class="labelEsquerda">Ano&nbsp;<?php echo $nu_ano;?></td>
      <td class="labelEsquerda">&nbsp;</td>
    </tr>
    <tr> 
      <td colspan="6" class="labelCentro"> <input name="volta" type="button" id="volta" value="Cancelar" onClick="javascript:executar('cancela_controller.php?cancelarOperacao=cancelarOperacao')" /> 
      </td>
    </tr>
	 <?php } else {?>
    <tr> 
      <td colspan="6"><div align="center"><font size="2" face="Arial, Helvetica, sans-serif">Relatório 
          vazio!!!</font></div></td>
    </tr>
    <?php }?>
  </table>
</form> 
</body>

<?php

} else {
 
 }
 }
 ?>
</html>
