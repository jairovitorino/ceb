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
	
	/*SELECT * FROM tbl_autores
	LEFT JOIN tbl_Livro
		ON tbl_Livro.ID_Autor = tbl_autores.ID_Autor;*/
	
	$sql = mysql_query("SELECT alunos.id_aluno,alunos.nm_aluno, matriculas.nu_cpf 
	FROM alunos
	LEFT JOIN matriculas 
	ON matriculas.id_aluno = alunos.id_aluno 
	ORDER BY nm_aluno");

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
  <table width="50%" border="0" cellspacing="0" cellpadding="0" align="center">
    <tr> 
      <td colspan="24" class="labelCentro">&nbsp;</td>
    </tr>
    <tr> 
      <td colspan="24" class="labelCentro">&nbsp;</td>
    </tr>
    <tr> 
      <td colspan="24" class="labelCentro">&nbsp;</td>
    </tr>
    <tr> 
      <td colspan="24" class="labelCentro">&nbsp;</td>
    </tr>
    <tr> 
      <td colspan="24" class="labelEsquerda"> 
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
      <td colspan="24" class="labelEsquerda"> </td>
    </tr>
    <tr> 
      <td colspan="24" class="labelCentro"><hr></td>
    </tr>
    <tr> 
      <td colspan="24" class="labelEsquerda"> </td>
    </tr>
    <tr> 
      <td colspan="24" class="labelCentro"><strong>Consulta - Outros</strong></td>
    </tr>
    <tr> 
      <td colspan="24" class="labelDireita">&nbsp;</td>
    </tr>
    <tr bgcolor="#999999"> 
      <td width="45%" class="labelEsquerda"><font color="#FFFFFF"><strong>Nome</strong></font></td>
      <td width="46%" class="labelEsquerda"><font color="#FFFFFF"><strong>CPF</strong></font></td>
      <td width="9%" class="labelCentro"><font color="#FFFFFF"><strong>Excluir</strong></font></td>
    </tr>
    <?php
	
	for ($i=0;$i < $row ; $i++){
	$id_aluno = mysql_result($sql, $i, "id_aluno");
	$nm_aluno = mysql_result($sql, $i, "nm_aluno");
	$nu_cpf = mysql_result($sql, $i, "nu_cpf");
	$nu_cpf == "" ? $nu_cpf = '<font color="#FF0000">Não matriculado</font>' : $nu_cpf = $nu_cpf;			
	
	?>
    <tr onMouseOver="move_i(this)" onMouseOut="move_o(this)" title=""> 
      <td class="labelEsquerda"><?php echo $nm_aluno;?></td>
      <td class="labelEsquerda"><?php echo $nu_cpf;?></td>
      <td class="labelCentro"><a href="javascript:del('aluno_controller.php?excluirAluno=excluirAluno&id_aluno=<?php echo $id_aluno;?>&id_usuario=<?php echo $id_usuario;?>&opcao=4')"><img src="img/excluir2.gif" width="10" height="10"></a></td>
    </tr>
    <?php }?>
    <tr> 
      <td colspan="24" class="labelEsquerda"><hr></td>
    </tr>
    <tr> 
      <td colspan="4" class="labelEsquerda">Itens:<?php echo $i;?></td>
    </tr>
    <tr> 
      <td colspan="24" class="labelCentro"><input name="imprime" type="button" id="imprime" value="Imprimir" onClick="javascript:executar('aluno_controller.php?imprimirAlunoLista=imprimirAlunoLista')" /> 
        <input name="volta" type="button" id="volta" value="Cancelar" onClick="javascript:executar('cancela_controller.php?cancelarOperacao=cancelarOperacao')" /> 
      </td>
      <?php } else {?>
    <tr> 
      <td colspan="24"><div align="center"><font size="2" face="Arial, Helvetica, sans-serif">Relatório 
          vazio!!!</font></div></td>
    </tr>
    <?php }?>
    <tr> 
      <td colspan="24">&nbsp;</tr>
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
