<?php
session_start();

 include "cabecalho/cabecalho.php";
 $msg_sucesso = @$_SESSION['msg_sucesso'];
 $msg_excessao = @$_SESSION['msg_excessao'];
   
   $opcao = $_SESSION['opcao'];
   $nm_profissao_pai = @$_SESSION['nm_profissao_pai'];
   
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
	document.formulario.nm_aluno.focus();
}
function executar(delUrl) { 
    document.location = delUrl; 
}

function foto(){
var saida = document.getElementById('te_imagem');
saida.value =  document.getElementById('upload').value;
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
function barra(objeto){
if (objeto.value.length == 2 || objeto.value.length == 5 ){
objeto.value = objeto.value+"/";
}
}
function combo_sex(){
var i = document.getElementById("id_sexo").options[document.getElementById("id_sexo").selectedIndex].text;
   document.getElementById("nm_sexo").value = i;
}
function combo_relig(){
var i = document.getElementById("id_religiao").options[document.getElementById("id_religiao").selectedIndex].text;
   document.getElementById("nm_religiao").value = i;
}
function combo_ser(){
var i = document.getElementById("id_serie").options[document.getElementById("id_serie").selectedIndex].text;
   document.getElementById("nm_serie").value = i;
}
function combo_prof_mae(){
var i = document.getElementById("id_profissao").options[document.getElementById("id_profissao").selectedIndex].text;
   document.getElementById("nm_profissao").value = i;
}
function combo_profissao_pai(){
var i = document.getElementById("id_profissao_pai").options[document.getElementById("id_profissao_pai").selectedIndex].text;
   document.getElementById("nm_profissao_pai").value = i;
}

</script>
</head>
<link rel="stylesheet" href="css/filadelfia.css" type="text/css">
<link rel="SHORTCUT ICON" href="<?php echo $icon;?>"/>
<body bgcolor="#F5F5F5" onLoad="javascript:caixas()">
<form name="formulario" id="formulario" method="post" action="aluno_controller.php" enctype="multipart/form-data" >
  <table width="70%" border="0" cellspacing="0" cellpadding="0" align="center">
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
    <?php
	//CONECTA AO MYSQL              
	    require_once("class/conexao.php");
		$mysql = new Mysql();
		$mysql->conectar(); 
	$id_aluno = $_SESSION['id_aluno'];

	$sql = mysql_query("SELECT * FROM alunos, religioes, analgesicos
	WHERE alunos.id_religiao = religioes.id_religiao
	AND alunos.id_analgesico = analgesicos.id_analgesico
	AND id_aluno = ".$id_aluno."");

	$row = mysql_num_rows($sql);
	for($i=0; $i<$row; $i++) {
	$nm_aluno = mysql_result($sql, $i, "nm_aluno");
	$id_sexo = mysql_result($sql, $i, "id_sexo");
	
	$id_sexo == 1 ? $nm_sexo = "M" : $nm_sexo = "F";
	$nu_termo = mysql_result($sql, $i, "nu_termo");
	$st_controle = mysql_result($sql, $i, "st_controle");
	$in_antigo = mysql_result($sql, $i, "in_antigo");
	$nm_mae = mysql_result($sql, $i, "nm_mae");
	$nu_telefone_mae = mysql_result($sql, $i, "nu_telefone_mae");
	$nm_trabalho_mae = mysql_result($sql, $i, "nm_trabalho_mae");
	$te_profissao_pai = mysql_result($sql, $i, "te_profissao_pai");
	$te_profissao_mae = mysql_result($sql, $i, "te_profissao_mae");
	$id_analgesico = mysql_result($sql, $i, "id_analgesico");
	$nm_analgesico = mysql_result($sql, $i, "nm_analgesico");
	$id_religiao = mysql_result($sql, $i, "id_religiao");
	$nm_religiao = mysql_result($sql, $i, "nm_religiao");
	$nm_pai = mysql_result($sql, $i, "nm_pai");
	$nu_telefone_pai = mysql_result($sql, $i, "nu_telefone_pai");
	$nm_trabalho_pai = mysql_result($sql, $i, "nm_trabalho_pai");
	$dt_nascimento = mysql_result($sql, $i, "dt_nascimento");
	$dt_nascimento = substr($dt_nascimento,8,2)."/".substr($dt_nascimento,5,2)."/".substr($dt_nascimento,0,4);
	$dt_cadastro = mysql_result($sql, $i, "dt_cadastro");
	$dt_cadastro = substr($dt_cadastro,8,2)."/".substr($dt_cadastro,5,2)."/".substr($dt_cadastro,0,4);
	$te_email = mysql_result($sql, $i, "te_email");
	$nm_religiao = mysql_result($sql, $i, "nm_religiao");
	$nm_logra = mysql_result($sql, $i, "nm_logra");
	$nu_logra = mysql_result($sql, $i, "nu_logra");
	$nm_bairro = mysql_result($sql, $i, "nm_bairro");
	$nu_cep = mysql_result($sql, $i, "nu_cep");
	$nm_compl = mysql_result($sql, $i, "nm_compl");
	$nm_cidade = mysql_result($sql, $i, "nm_cidade");
	$nm_uf = mysql_result($sql, $i, "nm_uf");
	$nm_emergencia = mysql_result($sql, $i, "nm_emergencia");
	$in_emergencia = mysql_result($sql, $i, "in_emergencia");
	$nm_plano = mysql_result($sql, $i, "nm_plano");
	$nm_alergia = mysql_result($sql, $i, "nm_alergia");
	$nm_doenca = mysql_result($sql, $i, "nm_doenca");
	$nm_restricao = mysql_result($sql, $i, "nm_restricao");
	$nm_acidente = mysql_result($sql, $i, "nm_acidente");
	$te_obs = mysql_result($sql, $i, "te_obs");
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
	}
	
	?>
    <tr> 
      <td colspan="4" class="labelCentro"><img src="fotos/<?php echo $te_imagem;?>" width="20" height="20"></td>
    </tr>
    <tr> 
      <td colspan="4" class="labelCentro"><?php echo $st_controle == 0 ? "<input type='radio' name='st_controle' value='0' checked>" : "<input type='radio' name='st_controle' value='0'>";?> 
        Cadastrado <?php echo $st_controle == 1 ? "<input type='radio' name='st_controle' value='1' checked>" : "<input type='radio' name='st_controle' value='1'>";?> 
        Matriculado <?php echo $st_controle == 2 ? "<input type='radio' name='st_controle' value='2' checked>" : "<input type='radio' name='st_controle' value='2'>";?> 
        Transferido <?php echo $st_controle == 3 ? "<input type='radio' name='st_controle' value='3' checked>" : "<input type='radio' name='st_controle' value='3'>";?> 
        Outro</td>
    </tr>
    <?php if ( $nu_termo == "" ){?>
    <tr> 
      <td class="labelDireita">Termo<font color="#FF0000">*</font>:</td>
      <td width="37%" class="labelEsquerda"><input type="text" name="nu_termo" id="nu_termo" value="<?php echo $nu_termo;?>" size="11" maxlength="11"> 
      </td>
      <td width="12%" class="labelDireita">&nbsp;</td>
      <td width="38%" class="labelEsquerda">&nbsp;</td>
    </tr>
    <?php } else {?>
    <tr> 
      <td class="labelDireita">Termo<font color="#FF0000">*</font>:</td>
      <td class="labelEsquerda"><input type="text" name="nu_termo" value="<?php echo $nu_termo;?>" size="11" maxlength="11" readonly=""> 
        <?php echo $in_antigo == 1 ? "<input type='radio' name='in_antigo' value='1' checked>" : "<input type='radio' name='in_antigo' value='1'>";?> 
        Novato <?php echo $in_antigo == 2 ? "<input type='radio' name='in_antigo' value='2' checked>" : "<input type='radio' name='in_antigo' value='2'>";?> 
        Veterano </td>
      <?php
		
		$sql_analg = "SELECT * FROM analgesicos ORDER BY nm_analgesico"; 
		$sql_analg = mysql_query($sql_analg);       
		$row_analg = mysql_num_rows($sql_analg);
	?>
      <td class="labelDireita">Febre/Dor<font color="#FF0000">*</font>:</td>
      <td class="labelEsquerda"><select name="id_analgesico" id="id_analgesico" onChange="combo_analg()" >
          <option value="<?php echo $id_analgesico ? $id_analgesico : 0;?>"><?php echo $nm_analgesico ? $nm_analgesico : "-- Selecione -- >>";?></option>
          <?php for($z=0; $z<$row_analg; $z++) { ?>
          <option value="<?php echo mysql_result($sql_analg, $z, "id_analgesico"); ?>"> 
          <?php echo mysql_result($sql_analg, $z, "nm_analgesico"); ?></option>
          <?php } ?>
        </select> </td>
    </tr>
    <?php }?>
    <?
	
		$sql_relig = "SELECT * FROM religioes ORDER BY nm_religiao"; 
		$sql_relig = mysql_query($sql_relig);       
		$row_relig = mysql_num_rows($sql_relig);
	?>
    <tr> 
      <td height="24" class="labelDireita">Religi&atilde;o<font color="#FF0000">*:</font></td>
      <td class="labelEsquerda"><select name="id_religiao" id="id_religiao" onChange="combo_relig()" >
          <option value="<?php echo $id_religiao ? $id_religiao : "0";?>"><?php echo $nm_religiao ? $nm_religiao : "-- Selecione -- >>";?></option>
          <?php for($a=0; $a<$row_relig; $a++) { ?>
          <option value="<?php echo mysql_result($sql_relig, $a, "id_religiao"); ?>"> 
          <?php echo mysql_result($sql_relig, $a, "nm_religiao"); ?></option>
          <?php } ?>
        </select></td>
      <td class="labelDireita">Alergia:</td>
      <td class="labelEsquerda"> <input type="text" name="nm_alergia"  value="<?php echo $nm_alergia;?>" size="30" maxlength="30"></td>
    </tr>
    <tr> 
      <td class="labelDireita">Nome<font color="#FF0000">*</font>:</td>
      <td class="labelEsquerda"><input type="text" name="nm_aluno"  value="<?php echo $nm_aluno;?>" size="50" maxlength="40"></td>
      <td class="labelDireita">Rest. Alimentares:</td>
      <td class="labelEsquerda"> <input type="text" name="nm_restricao"  value="<?php echo $nm_restricao;?>" size="30" maxlength="30"></td>
    </tr>
    <tr> 
      <td class="labelDireita">Sexo<font color="#FF0000">*</font>:</td>
      <td class="labelEsquerda"><select name="id_sexo" id="id_sexo" onChange="combo_sex()">
          <option value="<?php echo $id_sexo ? $id_sexo : "";?>"><?php echo $nm_sexo ? $nm_sexo : "-- Selecione -- >>";?></option>
          <option value="1">M</option>
          <option value="2">F</option>
        </select></td>
      <td class="labelDireita">Doen&ccedil;a Neuro:</td>
      <td class="labelEsquerda"> <input type="text" name="nm_doenca"  value="<?php echo $nm_doenca;?>" size="30" maxlength="30"></td>
    </tr>
    <tr> 
      <td class="labelDireita">Nascimento<font color="#FF0000">*</font>:</td>
      <td class="labelEsquerda">
        <?php
		require 'classes/calendario.php';	
		$calendario_campo = new calendario;
		$calendario_campo->nome_campo="dt_nascimento";
		$calendario_campo->value_campo=@$dt_nascimento;
		$calendario_campo->criar_campo();
		 ?>
      </td>
      <td class="labelDireita">Plano de Sa&uacute;de:</td>
      <td class="labelEsquerda"> <input type="text" name="nm_plano"  value="<?php echo $nm_plano;?>" size="30" maxlength="30"></td>
    </tr>
    <tr> 
      <td width="13%" class="labelDireita">M&atilde;e<font color="#FF0000">*</font>:</td>
      <td class="labelEsquerda"><input type="text" name="nm_mae"  value="<?php echo $nm_mae;?>" size="50" maxlength="35"></td>
      <td class="labelDireita">Em caso Acidente</td>
      <td class="labelEsquerda"><input type="text" name="nm_acidente" value="<?php echo $nm_acidente;?>" size="30" maxlength="40"></td>
    </tr>
    <tr> 
      <td class="labelDireita">Profiss&atilde;o<font color="#FF0000">*</font>:</td>
      <td class="labelEsquerda"><input type="text" name="te_profissao_mae" value="<?php echo $te_profissao_mae;?>" size="30" maxlength="30"></td>
      <td class="labelDireita">Logradouro<font color="#FF0000">*</font>:</td>
      <td class="labelEsquerda"><input type="text" name="nm_logra"  value="<?php echo $nm_logra;?>" size="50" maxlength="60"></td>
    </tr>
    <tr> 
      <td class="labelDireita">Telefone:</td>
      <td class="labelEsquerda"><input type="text" name="nu_telefone_mae"  value="<?php echo $nu_telefone_mae;?>" size="30" maxlength="26"></td>
      <td class="labelDireita">Complemento:</td>
      <td class="labelEsquerda"><input type="text" name="nm_compl" value="<?php echo $nm_compl;?>" size="30" maxlength="30"></td>
    </tr>
    <tr> 
      <td class="labelDireita">Local de Trabalho:</td>
      <td class="labelEsquerda"><input type="text" name="nm_trabalho_mae"  value="<?php echo $nm_trabalho_mae;?>" size="30" maxlength="20" ></td>
      <td class="labelDireita">N&uacute;mero<font color="#FF0000">*</font>:</td>
      <td class="labelEsquerda"><input type="text" name="nu_logra"  value="<?php echo $nu_logra;?>" size="6" maxlength="8"></td>
    </tr>
    <tr> 
      <td class="labelDireita">Pai<font color="#FF0000">*</font>:</td>
      <td class="labelEsquerda"><input type="text" name="nm_pai" value="<?php echo $nm_pai;?>" size="50" maxlength="35"></td>
      <td class="labelDireita">Bairro<font color="#FF0000">*</font>:</td>
      <td class="labelEsquerda"><input type="text" name="nm_bairro" value="<?php echo $nm_bairro;?>" size="30" maxlength="30"></td>
    </tr>
    <tr> 
      <td class="labelDireita">Profiss&atilde;o<font color="#FF0000">*</font>:</td>
      <td class="labelEsquerda"><input type="text" name="te_profissao_pai" value="<?php echo $te_profissao_pai;?>" size="30" maxlength="30"></td>
      <td class="labelDireita">CEP:</td>
      <td class="labelEsquerda"><input type="text" name="nu_cep" value="<?php echo $nu_cep;?>" size="12" maxlength="8"></td>
    </tr>
    <tr> 
      <td class="labelDireita">Telefone:</td>
      <td class="labelEsquerda"><input type="text" name="nu_telefone_pai"  value="<?php echo $nu_telefone_pai;?>" size="30" maxlength="26"></td>
      <td class="labelDireita">Cidade<font color="#FF0000">*</font>:</td>
      <td class="labelEsquerda"><input type="text" name="nm_cidade" value="<?php echo $nm_cidade;?>" size="30" maxlength="40"></td>
    </tr>
    <tr> 
      <td class="labelDireita">Local de Trabalho(m&atilde;e)<font color="#FF0000">&nbsp;</font>:</td>
      <td class="labelEsquerda"><input type="text" name="nm_trabalho_pai"  value="<?php echo $nm_trabalho_pai;?>" size="30" maxlength="20" ></td>
      <td class="labelDireita">UF<font color="#FF0000">*</font>:</td>
      <td class="labelEsquerda"><select name="nm_uf" id="select2">
          <option value="<?php echo $nm_uf != "" ? $nm_uf : "";?>"><?php echo $nm_uf != "" ? $nm_uf : "Selecione -- >>";?></option>
          <option value="AC">AC</option>
          <option value="AL">AL</option>
          <option value="AM">AM</option>
          <option value="AP">AP</option>
          <option value="BA">BA</option>
          <option value="CE">CE</option>
          <option value="DF">DF</option>
          <option value="ES">ES</option>
          <option value="GO">GO</option>
          <option value="MA">MA</option>
          <option value="MG">MG</option>
          <option value="MS">MS</option>
          <option value="MT">MT</option>
          <option value="PA">PA</option>
          <option value="PB">PB</option>
          <option value="PE">PE</option>
          <option value="PI">PI</option>
          <option value="PR">PR</option>
          <option value="RJ">RJ</option>
          <option value="RN">RN</option>
          <option value="RO">RO</option>
          <option value="RR">RR</option>
          <option value="RS">RS</option>
          <option value="SC">SC</option>
          <option value="SE">SE</option>
          <option value="SP">SP</option>
          <option value="TO">TO</option>
        </select></td>
    </tr>
    <tr> 
      <td class="labelDireita">E-mail:</td>
      <td class="labelEsquerda"><input type="text" name="te_email"  value="<?php echo $te_email;?>" size="30" maxlength="30"></td>
      <td class="labelDireita">Cadastro:</td>
      <td class="labelEsquerda"><input type="text" name="dt_cadastro"  value="<?php echo $dt_cadastro;?>" size="12" maxlength="10" onKeyUp="barra(this)"></td>
    </tr>
    <tr> 
      <td class="labelDireita">Emerg&ecirc;ncia:</td>
      <td class="labelEsquerda"><input type="text" name="nm_emergencia"  value="<?php echo $nm_emergencia;?>" size="30" maxlength="30"> 
      </td>
      <td class="labelDireita">Observa&ccedil;&atilde;o:</td>
      <td class="labelEsquerda"><input type="text" name="te_obs"  value="<?php echo $te_obs;?>" size="50" maxlength="80"></td>
    </tr>
    <tr> 
      <td class="labelDireita">Conv&ecirc;nio:</td>
      <td class="labelEsquerda"> <?php echo $in_emergencia == 1 ? "<input type='radio' name='in_emergencia' value='1' checked>" : "<input type='radio' name='in_emergencia' value='1'>";?> 
        P&uacute;blico <?php echo $in_emergencia == 2 ? "<input type='radio' name='in_emergencia' value='2' checked>" : "<input type='radio' name='in_emergencia' value='2'>";?> 
        Particular</td>
      <td class="labelDireita"> Foto:</td>
      <td class="labelEsquerda"><input type="file" name="upload" id="upload" onChange="javascript:foto()">
        <input type="checkbox" name="checkbox" value="checkbox">
        Atualizar </td>
    </tr>
    <tr> 
      <td class="labelDireita">&nbsp;</td>
      <td class="labelEsquerda">&nbsp;</td>
      <td class="labelDireita">&nbsp;</td>
      <td class="labelEsquerda">&nbsp;</td>
    </tr>
    <tr> 
      <td colspan="4" class="labelDireita">(<font color="#FF0000">*</font>) Preenchimento 
        obrigat&oacute;rio</td>
    </tr>
    <tr> 
      <td colspan="4" class="labelEsquerda"><hr></td>
    </tr>
    <tr> 
      <td colspan="4" class="labelEsquerda"><input type="hidden" name="id_aluno" value="<?php echo $id_aluno;?>"> 
        <input type="hidden" name="upload" id="upload"> <input type="hidden" name="te_imagem" id="te_imagem" value="<?php echo $te_imagem;?>"> 
        <input type="hidden" name="opcao" value="<?php echo $opcao;?>"> <input type="hidden" name="nm_profissao_pai" id="nm_profissao_pai" value="<?php echo $nm_profissao_pai;?>"> 
      </td>
    </tr>
    <tr> 
      <td colspan="8" class="labelCentro"><input name="editarAluno" type="submit" value="Editar" /> 
        <input name="volta" type="button" id="volta" value="Cancelar" onClick="javascript:executar('cancela_controller.php?cancelarOperacao=cancelarOperacao')" /> 
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
