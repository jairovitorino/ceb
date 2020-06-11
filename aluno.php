<?php
session_start();

 include "cabecalho/cabecalho.php";
 $msg_sucesso = @$_SESSION['msg_sucesso'];
 $msg_excessao = @$_SESSION['msg_excessao'];
	
	$id_aluno = @$_SESSION['id_aluno'];
	$nm_aluno = @$_SESSION['nm_aluno'];
	$nu_termo = @$_SESSION['nu_termo'];
	$id_religiao = @$_SESSION['id_religiao'];
	$id_analgesico = @$_SESSION['id_analgesico'];
	$nm_analgesico = @$_SESSION['nm_analgesico'];
	$nm_religiao = @$_SESSION['nm_religiao'];
	$nm_aluno = @$_SESSION['nm_aluno'];
	$id_sexo = @$_SESSION['id_sexo'];
	$nm_sexo = @$_SESSION['nm_sexo'];
	$dia = @$_SESSION['dia'];
	$mes = @$_SESSION['mes'];
	$id_ano = @$_SESSION['id_ano'];
	$nu_ano = @$_SESSION['nu_ano'];
	$nm_mae = @$_SESSION['nm_mae'];
	$te_profissao_mae = @$_SESSION['te_profissao_mae'];
	$te_profissao_pai = @$_SESSION['te_profissao_pai'];
	$nu_telefone_mae = @$_SESSION['nu_telefone_mae'];
   $nm_trabalho_mae = @$_SESSION['nm_trabalho_mae'];   
   $nm_pai = @$_SESSION['nm_pai'];
	$id_profissao_pai = @$_SESSION['id_profissao_pai'];
	$nm_profissao_pai = @$_SESSION['nm_profissao_pai'];		
	$nu_telefone_pai = @$_SESSION['nu_telefone_pai'];
   $nm_trabalho_pai = @$_SESSION['nm_trabalho_pai']; 
   $te_email = @$_SESSION['te_email'];
   $nm_emergencia = @$_SESSION['nm_emergencia'];   
   $in_emergencia = @$_SESSION['in_emergencia'];   
   $in_emergencia == "" ? $in_emergencia = 1 : $in_emergencia = $in_emergencia; 
   $nm_acidente = @$_SESSION['nm_acidente'];
	$in_antigo = @$_SESSION['in_antigo'];
	 $in_antigo == "" ? $in_antigo = 1 : $in_antigo = $in_antigo; 
	$nm_alergia = @$_SESSION['nm_alergia'];
	$nm_restricao = @$_SESSION['nm_restricao'];
	$nm_doenca = @$_SESSION['nm_doenca'];
	$nm_plano = @$_SESSION['nm_plano'];
	$nm_logra = @$_SESSION['nm_logra'];
   $nm_compl = @$_SESSION['nm_compl'];
   $nu_logra = @$_SESSION['nu_logra'];
   $nm_bairro = @$_SESSION['nm_bairro'];
   $nu_cep = @$_SESSION['nu_cep'];
   $nm_cidade = @$_SESSION['nm_cidade'];
   $nm_uf = @$_SESSION['nm_uf'];
   $te_obs = @$_SESSION['te_obs'];   
	$dt_cadastro = @$_SESSION['dt_cadastro']; 
	$dt_cadastro == "" ? $dt_cadastro = @date("d/m/Y") : $dt_cadastro = $dt_cadastro;
   
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
	document.formulario.nu_cep.focus();
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

function combo_analg(){
var i = document.getElementById("id_analgesico").options[document.getElementById("id_analgesico").selectedIndex].text;
   document.getElementById("nm_analgesico").value = i;
}
function combo_ano(){
var i = document.getElementById("id_ano").options[document.getElementById("id_ano").selectedIndex].text;
   document.getElementById("nu_ano").value = i;
}
</script>

<!-- Adicionando JQuery -->
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"
            integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
            crossorigin="anonymous"></script>
<!-- Adicionando Javascript -->
    <script type="text/javascript" >

        $(document).ready(function() {

            function limpa_formulário_cep() {
                // Limpa valores do formulário de cep.
                $("#nm_logra").val("");
                $("#nm_bairro").val("");
                $("#nm_cidade").val("");
                $("#nm_uf").val("");
                
            }
            
            //Quando o campo cep perde o foco.
          //  $("#nu_cep").blur(function() {
			$("#nu_cep").focus(function() {

                //Nova variável "cep" somente com dígitos.
                var nu_cep = $(this).val().replace(/\D/g, '');

                //Verifica se campo cep possui valor informado.
                if (nu_cep != "") {

                    //Expressão regular para validar o CEP.
                    var validacep = /^[0-9]{8}$/;

                    //Valida o formato do CEP.
                    if(validacep.test(nu_cep)) {

                        //Preenche os campos com "..." enquanto consulta webservice.
                        $("#nm_logra").val("...");
                        $("#nm_bairro").val("...");
                        $("#nm_cidade").val("...");
                        $("#nm_uf").val("...");
                        

                        //Consulta o webservice viacep.com.br/
                        $.getJSON("https://viacep.com.br/ws/"+ nu_cep +"/json/?callback=?", function(dados) {

                            if (!("erro" in dados)) {
                                //Atualiza os campos com os valores da consulta.
                                $("#nm_logra").val(dados.logradouro);
                                $("#nm_bairro").val(dados.bairro);
                                $("#nm_cidade").val(dados.localidade);
                                $("#nm_uf").val(dados.uf);
                                document.formulario.nu_cep_msg.style.display = "none";
								
                            } //end if.
                            else {
                                //CEP pesquisado não foi encontrado.
                                limpa_formulário_cep();
                              //  alert("CEP não encontrado.");
							 document.formulario.nu_cep_msg.style.display = "";
							// document.formulario.nu_cep_msg;
							 //document.write("Olá, tudo bem?");
							  
                            }
                        });
                    } //end if.
                    else {
                        //cep é inválido.
                        limpa_formulário_cep();
                        alert("Formato de CEP inválido.");
                    }
                } //end if.
                else {
                    //cep sem valor, limpa formulário.
                    limpa_formulário_cep();
                }
            });
        });

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
    <tr> 
      <td colspan="4" class="labelEsquerda">&nbsp;</td>
    </tr>
    <?php if ( $nu_termo == "" ){?>
    <tr> 
      <td class="labelDireita">Termo<font color="#FF0000">*</font>:</td>
      <td width="34%" class="labelEsquerda"><input type="text" name="nu_termo" id="nu_termo" value="<?php echo $nu_termo;?>" size="11" maxlength="11"></td>
      <td width="11%" class="labelDireita">&nbsp;</td>
      <td width="43%" class="labelEsquerda">&nbsp;</td>
    </tr>
    <?php } else {?>
    <tr> 
      <td class="labelDireita">Termo<font color="#FF0000">*</font>:</td>
      <td class="labelEsquerda"><input type="text" name="nu_termo" value="<?php echo $nu_termo;?>" size="11" maxlength="11" readonly=""> 
        <?php echo $in_antigo == 1 ? "<input type='radio' name='in_antigo' value='1' checked>" : "<input type='radio' name='in_antigo' value='1'>";?> 
        Novato <?php echo $in_antigo == 2 ? "<input type='radio' name='in_antigo' value='2' checked>" : "<input type='radio' name='in_antigo' value='2'>";?> 
        Veterano </td>
      <?
	//CONECTA AO MYSQL              
	    require_once("class/conexao.php");
		$mysql = new Mysql();
		$mysql->conectar(); 
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
      <td class="labelDireita">Nascimento:</td>
      <td class="labelEsquerda"><select name="dia">
          <option value="<?php echo $dia != "" ? $dia : "";?>"><?php echo $dia != "" ? $dia : "Dia";?></option>
          <option value="01">01</option>
          <option value="02">02</option>
          <option value="03">03</option>
          <option value="04">04</option>
          <option value="05">05</option>
          <option value="06">06</option>
          <option value="07">07</option>
          <option value="08">08</option>
          <option value="09">09</option>
          <option value="10">10</option>
          <option value="11">11</option>
          <option value="12">12</option>
          <option value="13">13</option>
          <option value="14">14</option>
          <option value="15">15</option>
          <option value="16">16</option>
          <option value="17">17</option>
          <option value="18">18</option>
          <option value="19">19</option>
          <option value="20">20</option>
          <option value="21">21</option>
          <option value="22">22</option>
          <option value="23">23</option>
          <option value="24">24</option>
          <option value="25">25</option>
          <option value="26">26</option>
          <option value="27">27</option>
          <option value="28">28</option>
          <option value="29">29</option>
          <option value="30">30</option>
          <option value="31">31</option>
        </select> <select name="mes">
          <option value="<?php echo $mes != "" ? $mes : "";?>"><?php echo $mes != "" ? $mes : "Mes";?></option>
          <option value="01">01</option>
          <option value="02">02</option>
          <option value="03">03</option>
          <option value="04">04</option>
          <option value="05">05</option>
          <option value="06">06</option>
          <option value="07">07</option>
          <option value="08">08</option>
          <option value="09">09</option>
          <option value="10">10</option>
          <option value="11">11</option>
          <option value="12">12</option>
		  
		  <?php
		  $sql_ano = "SELECT * FROM anos ORDER BY nu_ano DESC"; 
			$sql_ano = mysql_query($sql_ano);       
			$row_ano = mysql_num_rows($sql_ano);
		  ?>
		  
        </select> 
		<select name="id_ano" id="id_ano" onChange="combo_ano()">
          <option value="<?php echo $id_ano ? $id_ano : 0;?>"><?php echo $nu_ano ? $nu_ano : "Ano";?></option>
          <?php for($z=0; $z<12; $z++) { ?>
          <option value="<?php echo mysql_result($sql_ano, $z, "id_ano"); ?>"> 
          <?php echo mysql_result($sql_ano, $z, "nu_ano"); ?></option>
          <?php } ?>
        </select></td>
      <td class="labelEsquerda">&nbsp;</td>
      <td class="labelEsquerda">&nbsp;</td>
    </tr>
    <td class="labelDireita">Plano de Sa&uacute;de:</td>
    <td class="labelEsquerda"> <input type="text" name="nm_plano"  value="<?php echo $nm_plano;?>" size="30" maxlength="30"></td>
    </tr>
    <tr> 
      <td width="12%" class="labelDireita">M&atilde;e<font color="#FF0000">*</font>:</td>
      <td class="labelEsquerda"><input type="text" name="nm_mae"  value="<?php echo $nm_mae;?>" size="50" maxlength="35"></td>
      <td class="labelDireita">Em caso Acidente</td>
      <td class="labelEsquerda"><input type="text" name="nm_acidente" value="<?php echo $nm_acidente;?>" size="30" maxlength="40"></td>
    </tr>
    <tr> 
      <td class="labelDireita">Profiss&atilde;o(m&atilde;e)<font color="#FF0000">*</font>:</td>
      <td class="labelEsquerda"><input type="text" name="te_profissao_mae" value="<?php echo $te_profissao_mae;?>" size="30" maxlength="40"></td>
      <td class="labelDireita">Logradouro<font color="#FF0000">*</font>:</td>
      <td class="labelEsquerda"><input type="text" name="nm_logra" id="nm_logra" value="<?php echo $nm_logra;?>" size="50" maxlength="60"></td>
    </tr>
    <tr> 
      <td class="labelDireita">Telefone(m&atilde;e)<font color="#FF0000">*</font>:</td>
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
      <td class="labelEsquerda"><input type="text" name="nm_bairro" id="nm_bairro" value="<?php echo $nm_bairro;?>" size="30" maxlength="30"></td>
    </tr>
    <tr> 
      <td class="labelDireita">Profiss&atilde;o(pai)<font color="#FF0000">*</font>:</td>
      <td class="labelEsquerda"><input type="text" name="te_profissao_pai"  value="<?php echo $te_profissao_pai;?>" size="30" maxlength="20" ></td>
      <td class="labelDireita">CEP<font color="#FF0000">*</font>:</td>
      <td class="labelEsquerda"><input type="text" name="nu_cep" id="nu_cep" value="<?php echo $nu_cep;?>" size="12" maxlength="8"> 
        <input type="text" name="nu_cep_msg" id="nu_cep_msg" value="CEP não encontrado" readonly=""> 
      </td>
    </tr>
    <tr> 
      <td class="labelDireita">Telefone(pai)<font color="#FF0000">*</font>:</td>
      <td class="labelEsquerda"><input type="text" name="nu_telefone_pai"  value="<?php echo $nu_telefone_pai;?>" size="30" maxlength="30"></td>
      <td class="labelDireita">Cidade<font color="#FF0000">*</font>:</td>
      <td class="labelEsquerda"><input type="text" name="nm_cidade" id="nm_cidade" value="<?php echo $nm_cidade;?>" size="30" maxlength="40"></td>
    </tr>
    <tr> 
      <td class="labelDireita">Local de Trabalho:</td>
      <td class="labelEsquerda"><input type="text" name="nm_trabalho_pai"  value="<?php echo $nm_trabalho_pai;?>" size="30" maxlength="20" ></td>
      <td class="labelDireita">UF<font color="#FF0000">*</font>:</td>
      <td class="labelEsquerda"><select name="nm_uf" id="nm_uf">
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
      <td class="labelDireita">Cadastro<font color="#FF0000">*</font>:</td>
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
      <td class="labelDireita">Foto:</td>
      <td class="labelEsquerda"><input type="file" name="upload" id="upload" onChange="javascript:foto()"></td>
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
        <input type="hidden" name="nm_sexo" id="nm_sexo" value="<?php echo $nm_sexo;?>"> 
        <input type="hidden" name="nm_religiao" id="nm_religiao" value="<?php echo $nm_religiao;?>"> 
        <input type="hidden" name="upload" id="upload"> <input type="hidden" name="te_imagem" id="te_imagem"> 
        <input type="hidden" name="nm_analgesico" id="nm_analgesico" value="<?php echo $nm_analgesico;?>">
        <input type="hidden" name="nu_ano" id="nu_ano" value="<?php echo $nu_ano;?>"> 
      </td>
    </tr>
    <tr> 
      <td colspan="8" class="labelCentro"><input name="inserirAluno" type="submit" value="Gravar" /> 
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
