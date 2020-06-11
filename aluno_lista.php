<?php
session_start();

 include "cabecalho/cabecalho.php";
 $msg_sucesso = @$_SESSION['msg_sucesso'];
 $msg_excessao = @$_SESSION['msg_excessao'];
 $nm_objeto = @$_SESSION['nm_objeto'];
  $st_controle = @$_SESSION['st_controle'];
  
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
			
	if ($nm_objeto){
	$sql = mysql_query("SELECT alunos.dt_nascimento,(YEAR(CURDATE())-YEAR(alunos.dt_nascimento)) AS nu_idade, alunos.id_aluno,alunos.id_usuario,alunos.nm_aluno,alunos.nu_termo,
	alunos.te_imagem,alunos.nm_pai,alunos.id_sexo,alunos.dt_cadastro,alunos.in_antigo,alunos.st_controle,usuarios.nm_usuario	
	FROM alunos, usuarios 
	WHERE alunos.id_usuario = usuarios.id_usuario 
	AND nm_aluno 
	LIKE '%$nm_objeto%' 
	AND alunos.id_ente = ".$_SESSION['id_ente']." 
	ORDER BY nm_aluno 
	LIMIT $inicio, $qnt ");
	} else if ($st_controle){
	$sql = mysql_query("SELECT alunos.dt_nascimento,(YEAR(CURDATE())-YEAR(alunos.dt_nascimento)) AS nu_idade, alunos.id_aluno,alunos.id_usuario,alunos.nm_aluno,alunos.nu_termo,
	alunos.te_imagem,alunos.nm_pai,alunos.id_sexo,alunos.dt_cadastro,alunos.in_antigo,alunos.st_controle,usuarios.nm_usuario
	FROM alunos, usuarios 
	WHERE alunos.id_usuario = usuarios.id_usuario 
	AND st_controle = ".$st_controle." 
	AND alunos.id_ente = ".$_SESSION['id_ente']." 
	ORDER BY nm_aluno 
	LIMIT $inicio, $qnt");
	} else {
	$sql = mysql_query("SELECT alunos.dt_nascimento,(YEAR(CURDATE())-YEAR(alunos.dt_nascimento)) AS nu_idade, alunos.id_aluno,alunos.id_usuario,alunos.nm_aluno,alunos.nu_termo,
	alunos.te_imagem,alunos.nm_pai,alunos.id_sexo,alunos.dt_cadastro,alunos.in_antigo,alunos.st_controle,usuarios.nm_usuario
	FROM alunos, usuarios 
	WHERE alunos.id_usuario = usuarios.id_usuario 
	AND alunos.id_ente = ".$_SESSION['id_ente']." 
	ORDER BY nm_aluno 
	LIMIT $inicio, $qnt");
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
  if (confirm('Deseja excluir?')) {
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
  <table width="57%" border="0" cellspacing="0" cellpadding="0" align="center">
    <tr> 
      <td colspan="31" class="labelCentro">&nbsp;</td>
    </tr>
    <tr> 
      <td colspan="31" class="labelCentro">&nbsp;</td>
    </tr>
    <tr> 
      <td colspan="31" class="labelCentro">&nbsp;</td>
    </tr>
    <tr> 
      <td colspan="31" class="labelCentro">&nbsp;</td>
    </tr>
    <tr> 
      <td colspan="31" class="labelEsquerda"> 
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
      <td colspan="31" class="labelEsquerda"> </td>
    </tr>
    <tr> 
      <td colspan="31" class="labelCentro"><hr></td>
    </tr>
    <tr> 
      <td colspan="31" class="labelEsquerda"> </td>
    </tr>
    <tr> 
      <td colspan="31" class="labelCentro"><strong>Consulta - Alunos</strong></td>
    </tr>
    <tr> 
      <td colspan="31" class="labelDireita"><a href="aluno_controller.php?abrirAlunoLista=abrirAlunoLista&st_controle=0">Cadastrado</a> 
        <a href="aluno_controller.php?abrirAlunoLista=abrirAlunoLista&st_controle=1">Matriculado</a> 
        <a href="aluno_controller.php?abrirAlunoLista=abrirAlunoLista&st_controle=2">Transferido</a> 
        <a href="aluno_controller.php?abrirAlunoLista=abrirAlunoLista&st_controle=3">Outros</a></td>
    </tr>
    <tr bgcolor="#999999"> 
      <td width="25%" class="labelEsquerda"><font color="#FFFFFF"><strong>Nome</strong></font></td>
      <td width="6%" class="labelEsquerda"><font color="#FFFFFF"><strong>Idade</strong></font></td>
      <td width="8%" class="labelEsquerda"><font color="#FFFFFF"><strong>Termo</strong></font></td>
      <td width="8%" class="labelEsquerda"><font color="#FFFFFF"><strong>Antiguid.</strong></font></td>
      <td width="8%" class="labelEsquerda"><font color="#FFFFFF"><strong>Cadastro</strong></font></td>
      <td width="6%" class="labelCentro"><font color="#FFFFFF"><strong>Foto</strong></font></td>
      <td width="6%" class="labelCentro"><font color="#FFFFFF"><strong>Ficha</strong></font></td>
      <td width="9%" class="labelCentro"><font color="#FFFFFF"><strong>Matricular</strong></font></td>
      <td width="8%" class="labelCentro"><font color="#FFFFFF"><strong>Editar</strong></font></td>
      <td width="7%" class="labelCentro"><font color="#FFFFFF"><strong>Excluir</strong></font></td>
    </tr>
    <?php
	
	for ($i=0;$i < $row ; $i++){
	$id_aluno = mysql_result($sql, $i, "id_aluno");
	$id_usuario = mysql_result($sql, $i, "id_usuario");
	$nm_usuario = mysql_result($sql, $i, "nm_usuario");
	$nm_aluno = mysql_result($sql, $i, "nm_aluno");
	$nu_idade = mysql_result($sql, $i, "nu_idade");
	$nu_termo = mysql_result($sql, $i, "nu_termo");
	$te_imagem = mysql_result($sql, $i, "te_imagem");	
	$nm_pai = mysql_result($sql, $i, "nm_pai");
	$id_sexo = mysql_result($sql, $i, "id_sexo");
	$dt_cadastro = mysql_result($sql, $i, "dt_cadastro");
	$dt_cadastro = substr($dt_cadastro,8,2)."/".substr($dt_cadastro,5,2)."/".substr($dt_cadastro,0,4);
	$in_antigo = mysql_result($sql, $i, "in_antigo");
	$in_antigo == 2 ? $nm_antigo = "Veterano" : $nm_antigo = "Novato";
	$st_controle = mysql_result($sql, $i, "st_controle");
	$st_controle == 0 ? $iconeExcluir = "<a href='javascript:del('#')'><img src='img/excluir2.gif' width='10' height='10'></a>" : $iconeExcluir = "--";  
	$te_imagem = substr($te_imagem,14);
	//$te_imagem != "" ? $image = "<a href='img/$te_arquivo'><img src='img/file.png' width='10' height='10'></a>" : $image = "--";  
	if ( $te_imagem == "" && $id_sexo == 1 ){
	$imagem = "<img src='img/img_masc.jpg' width='10' height='10'>";
	} else if ( $te_imagem == "" && $id_sexo == 2) {
	$imagem = "<img src='img/img_fem.jpg' width='10' height='10'>";
	} else {
	$imagem = "<img src='fotos/$te_imagem' width='10' height='10'>";
	}		
	
	$nm_controle = "";
	
	switch($st_controle){
	case 0;
	$nm_controle = "Cadastrado";
	break;
	case 1;
	$nm_controle = "Matriculado";
	break;
	case 2;
	$nm_controle = "Transferido";
	break;
	case 3;
	$nm_controle = "Outros";
	break;
	}
	
	
	?>
    <tr onMouseOver="move_i(this)" onMouseOut="move_o(this)" title="<?php echo $nm_usuario;?>"> 
      <td class="labelEsquerda"><?php echo $nm_aluno;?></td>
      <td class="labelEsquerda"><?php echo $nu_idade;?></td>
      <td class="labelEsquerda"><?php echo $nu_termo;?></td>
      <td class="labelEsquerda"><?php echo $nm_antigo;?></td>
      <td class="labelEsquerda"><?php echo $dt_cadastro;?></td>
      <td class="labelCentro"><?php echo $imagem;?></td>
      <td class="labelCentro"><a href="aluno_controller.php?exibirAlunoFicha=exibirAlunoFicha&id_aluno=<?php echo $id_aluno;?>"><img src="img/lupa.gif" width="10" height="10"></a></td>
      <td class="labelCentro"><a href="matricula_controller.php?inserirMatriculaTermo=inserirMatriculaTermo&nu_termo=<?php echo $nu_termo;?>&id_aluno=<?php echo $id_aluno;?>&nm_aluno=<?php echo $nm_aluno;?>"><img src="img/insert.gif" width="10" height="10"></a></td>
      <?php if ( ($id_usuario != $_SESSION['id']) || ($_SESSION['id_id'] == 2) ){?>
      <td class="labelCentro">**</td>
      <?php } else {?>
      <td class="labelCentro"><a href="aluno_controller.php?abrirAlunoEdit=abrirAlunoEdit&id_aluno=<?php echo $id_aluno;?>&opcao=2&id_usuario=<?php echo $id_usuario;?>"><img src="img/insert.gif" width="10" height="10"></a></td>
      <?php }?>
      <?php if ( $st_controle == 1 ){?>
      <td width="2%" class="labelCentro">**</td>
      <?php } else {?>
      <td width="7%" class="labelCentro"><a href="javascript:del('aluno_controller.php?excluirAluno=excluirAluno&id_aluno=<?php echo $id_aluno;?>&id_usuario=<?php echo $id_usuario;?>&opcao=2')"><img src="img/excluir2.gif" width="10" height="10"></a></td>
      <?php }?>
    </tr>
    <?php }?>
    <tr> 
      <td colspan="31" class="labelEsquerda"><hr></td>
    </tr>
    <tr> 
      <td colspan="11" class="labelEsquerda">Itens:<?php echo $i;?></td>
    </tr>
    <tr> 
      <td colspan="31" class="labelCentro"><input name="imprime" type="button" id="imprime" value="Imprimir" onClick="javascript:executar('aluno_controller.php?imprimirAlunoLista=imprimirAlunoLista')" /> 
        <input name="volta" type="button" id="volta" value="Cancelar" onClick="javascript:executar('cancela_controller.php?cancelarOperacao=cancelarOperacao')" /> 
      </td>
      <?php } else {?>
    <tr> 
      <td colspan="31"><div align="center"><font size="2" face="Arial, Helvetica, sans-serif">Relatório 
          vazio!!!</font></div></td>
    </tr>
    <?php }?>
    <tr> 
      <td colspan="31">&nbsp;</tr>
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
