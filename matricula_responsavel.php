<?php
session_start();

//CONECTA AO MYSQL              
require_once("class/conexao.php");
$mysql = new Mysql();
$mysql->conectar(); 


define("FPDF_FONTPATH","fpdf/font/");
require_once("fpdf/fpdf.php");
$pdf = new FPDF('P'); 
$pdf->Open(); 

$pdf->AddPage(); 

$pdf->Image('img/logo.png',94,10,30,30);

$pdf->SetFont('Arial', 'B', 8);
$pdf->SetXY(66, 31);
$texto = "CENTRO COMUNITÁRIO DA IGREJA BATISTA FILADÉLFIA";
$pdf->Cell(0,0.5,$texto, 4, 'J');

$pdf->SetFont('Arial', 'B', 6);
$pdf->SetXY(70, 34);
$texto = "Rua Saldanha Marinho, 109, Caixa D'agua, CEP 40.323-010 Salvador-Ba";
$pdf->Cell(0,0.5,$texto, 4, 'J');

$pdf->SetFont('Arial', 'B', 8);
$pdf->SetXY(75, 56);
$texto = "FORMULÁRIO DE MATRICULA DO ALUNO";
$pdf->Cell(0,0.5,$texto, 4, 'J');

// 1. Retangulo
$pdf->Rect(18, 64, 183, 18 , "D");

// 2. Retangulo
$pdf->Rect(18, 86, 183, 31 , "D");

// 3. Retangulo
$pdf->Rect(18, 121, 183, 19 , "D");

// 4. Retangulo
$pdf->Rect(18, 144, 183, 37 , "D");

// 5. Retangulo
$pdf->Rect(18, 185, 183, 38 , "D");

// 6. Retangulo
$pdf->Rect(18, 228, 183, 38 , "D");


$id_matricula = $_SESSION['id_matricula'];

$sql = mysql_query("SELECT responsaveis.nm_responsavel AS nm_responsavel, parentescos.nm_parentesco AS nm_parentesco, responsaveis.nu_telefone AS nu_telefone_resp, 
responsaveis.nm_logra AS nm_logra_resp, responsaveis.nu_cep AS nu_cep_resp, responsaveis.te_email AS te_email_resp, responsaveis.nm_trabalho AS nm_trabalho_resp,
alunos.nm_aluno AS nm_aluno, alunos.nu_termo AS nu_termo, alunos.id_sexo AS id_sexo, religioes.nm_religiao AS nm_religiao,responsaveis.te_profissao AS te_profissao,
alunos.te_email AS te_email, alunos.in_antigo AS in_antigo, alunos.dt_nascimento AS dt_nascimento, alunos.nm_mae AS nm_mae,alunos.te_profissao_pai AS te_profissao_pai,
alunos.te_profissao_mae AS te_profissao_mae, analgesicos.nm_analgesico AS nm_analgesico,
alunos.nu_telefone_mae AS nu_telefone_mae, alunos.nm_trabalho_mae AS nm_trabalho_mae, alunos.nm_pai AS nm_pai, 
alunos.nm_trabalho_pai AS nm_trabalho_pai, alunos.nu_telefone_pai AS nu_telefone_pai, alunos.nm_logra AS nm_logra, alunos.nu_logra AS nu_logra, alunos.nm_bairro AS nm_bairro,
alunos.nu_cep AS nu_cep, alunos.nm_compl AS nm_compl, alunos.nm_cidade AS nm_cidade, alunos.nm_uf AS nm_uf, alunos.nm_acidente AS nm_acidente, alunos.in_aas AS in_aas,
alunos.in_novalgina AS in_novalgina, alunos.in_anador AS in_anador, alunos.in_melhoral AS in_melhoral, alunos.in_tylenol AS in_tylenol, alunos.in_doril AS in_doril,
alunos.nm_emergencia AS nm_emergencia, alunos.in_plano AS in_plano, alunos.in_doenca AS in_doenca, alunos.in_alergia AS in_alergia, alunos.in_restricao AS in_restricao,
alunos.nm_plano AS nm_plano,alunos.te_obs AS te_obs, alunos.te_imagem AS te_imagem, matriculas.nu_ano AS nu_ano, 
matriculas.dt_matricula AS dt_matricula, matriculas.id_turno AS id_turno, matriculas.in_almoco AS in_almoco, series.nm_serie AS nm_serie, matriculas.in_imagem AS in_imagem


FROM responsaveis, matriculas, parentescos, alunos, religioes, series, analgesicos
WHERE responsaveis.id_matricula = matriculas.id_matricula 
AND responsaveis.id_parentesco = parentescos.id_parentesco
AND matriculas.id_aluno = alunos.id_aluno
AND matriculas.id_serie = series.id_serie
AND alunos.id_religiao = religioes.id_religiao
AND alunos.id_analgesico = analgesicos.id_analgesico
AND responsaveis.id_matricula = ".$id_matricula."");

$row = mysql_num_rows($sql);
	for($i=0; $i<$row; $i++) {
	
	$nm_aluno = mysql_result($sql, $i, "nm_aluno");
	$nu_termo = mysql_result($sql, $i, "nu_termo");
	$nu_ano = mysql_result($sql, $i, "nu_ano");
	$nm_serie = mysql_result($sql, $i, "nm_serie");
	$id_sexo = mysql_result($sql, $i, "id_sexo");
	$id_sexo_car = mysql_result($sql, $i, "id_sexo");
	$id_sexo_car == 1 ? $id_sexo_car = "M" : $id_sexo_car = "F";
	$nm_religiao = mysql_result($sql, $i, "nm_religiao");
	$te_email = mysql_result($sql, $i, "te_email");
	$id_turno = mysql_result($sql, $i, "id_turno");
	$in_imagem = mysql_result($sql, $i, "in_imagem");
	$in_imagem == 1 ? $in_imagem = "Sim" : $in_imagem = "Não";
	$in_antigo = mysql_result($sql, $i, "in_antigo");
	$in_antigo == 1 ? $in_antigo = "Novato" : $in_antigo = "Veterano";
	$dt_nascimento = mysql_result($sql, $i, "dt_nascimento");
	$dt_nascimento = substr($dt_nascimento,8,2)."/".substr($dt_nascimento,5,2)."/".substr($dt_nascimento,0,4);
	$dt_matricula = mysql_result($sql, $i, "dt_matricula");
	$dt_matricula = substr($dt_matricula,8,2)."/".substr($dt_matricula,5,2)."/".substr($dt_matricula,0,4);
	$nm_mae = mysql_result($sql, $i, "nm_mae");
	$te_profissao = mysql_result($sql, $i, "te_profissao");
	$te_profissao_pai = mysql_result($sql, $i, "te_profissao_pai");
	$te_profissao_mae = mysql_result($sql, $i, "te_profissao_mae");
	$nu_telefone_mae = mysql_result($sql, $i, "nu_telefone_mae");
	$nm_trabalho_mae = mysql_result($sql, $i, "nm_trabalho_mae");
	$nm_pai = mysql_result($sql, $i, "nm_pai");
	$nm_trabalho_pai = mysql_result($sql, $i, "nm_trabalho_pai");
	$nu_telefone_pai = mysql_result($sql, $i, "nu_telefone_pai");
	$nm_logra = mysql_result($sql, $i, "nm_logra");
	$nu_logra = mysql_result($sql, $i, "nu_logra");
	$nm_bairro = mysql_result($sql, $i, "nm_bairro");
	$nu_cep = mysql_result($sql, $i, "nu_cep");
	$nm_compl = mysql_result($sql, $i, "nm_compl");
	$nm_cidade = mysql_result($sql, $i, "nm_cidade");
	$nm_uf = mysql_result($sql, $i, "nm_uf");
	$nm_acidente = mysql_result($sql, $i, "nm_acidente");
	$nm_analgesico = mysql_result($sql, $i, "nm_analgesico");	
	$in_aas = mysql_result($sql, $i, "in_aas");
	$in_aas == 1 ? $in_aas = "AAS" : $in_aas = "";
	$in_novalgina = mysql_result($sql, $i, "in_novalgina");
	$in_novalgina == 1 ? $in_novalgina = "Novalgina," : $in_novalgina = "";
	$in_anador = mysql_result($sql, $i, "in_anador");
	$in_anador == 1 ? $in_anador = "Anador" : $in_anador = "";
	$in_melhoral = mysql_result($sql, $i, "in_melhoral");
	$in_melhoral == 1 ? $in_melhoral = "Melhoral" : $in_melhoral = "";
	$in_tylenol = mysql_result($sql, $i, "in_tylenol");
	$in_tylenol == 1 ? $in_tylenol = "Tylenol," : $in_tylenol = "";
	$in_doril = mysql_result($sql, $i, "in_doril");
	$in_doril == 1 ? $in_doril = "Doril" : $in_doril = "";
	$nm_emergencia = mysql_result($sql, $i, "nm_emergencia");
	$in_plano = mysql_result($sql, $i, "in_plano");
	$nm_plano = mysql_result($sql, $i, "nm_plano");
	$in_plano == 1 ? $nm_plano = "Sim" : "Não";
	$in_doenca = mysql_result($sql, $i, "in_doenca");
	$in_doenca == 1 ? $in_doenca = "Sim" : "Não";
	$in_alergia = mysql_result($sql, $i, "in_alergia");
	$in_alergia == 1 ? $nm_alergia = "Sim" : $nm_alergia = "Não";
	$in_restricao = mysql_result($sql, $i, "in_restricao");
	$in_restricao == 1 ? $nm_restricao = "Sim" : $nm_restricao = "Não";
	$te_obs = mysql_result($sql, $i, "te_obs");
	$nm_responsavel = mysql_result($sql, $i, "nm_responsavel");
	$nm_parentesco = mysql_result($sql, $i, "nm_parentesco");
	$nu_telefone_resp = mysql_result($sql, $i, "nu_telefone_resp");
	$nm_logra_resp = mysql_result($sql, $i, "nm_logra_resp");
	$nu_cep_resp = mysql_result($sql, $i, "nu_cep_resp");
	$te_email_resp = mysql_result($sql, $i, "te_email_resp");
	$nm_trabalho_resp = mysql_result($sql, $i, "nm_trabalho_resp");
	$te_imagem = mysql_result($sql, $i, "te_imagem");
	$te_imagem = substr($te_imagem,14);				
}
switch($id_turno){
case 1:
$id_turno = "Matutino";
break;
case 2:
$id_turno = "Vespertino";
break;
case 3:
$id_turno = "Integral";
break;
}
// Retangulo da foto
//$pdf->Rect(102, 38, 15, 15 , "D");
$pdf->Rect(97, 36, 15, 15 , "D");
if ( $te_imagem == "" && $id_sexo == 1 ){
	$te_imagem = "img_masc.jpg";
	$pdf->Image('img/'.$te_imagem,98,37,13,13);
	} else if ( $te_imagem == "" && $id_sexo == 2) {
	$te_imagem = "img_fem.jpg";
	$pdf->Image('img/'.$te_imagem,98,37,13,13);
	} else {
	$te_imagem = $te_imagem;
	$pdf->Image('fotos/'.$te_imagem,98,37,13,13);
	}		
//$pdf->Image('fotos/'.$te_imagem,103,39,13,13);

$pdf->SetFont('Arial', 'B', 6);

$pdf->SetXY(18, 62);
$texto = "DADOS DO ALUNO";
$pdf->Cell(0,0.5,$texto, 4, 'J');

$pdf->SetXY(18, 84);
$texto = "DADOS DE FILIAÇÃO";
$pdf->Cell(0,0.5,$texto, 4, 'J');

$pdf->SetXY(18, 119);
$texto = "DADOS DE ENDEREÇO";
$pdf->Cell(0,0.5,$texto, 4, 'J');

$pdf->SetXY(18, 142);
$texto = "DADOS DE SAÚDE";
$pdf->Cell(0,0.5,$texto, 4, 'J');

$pdf->SetXY(18, 183);
$texto = "DADOS DO RESPONSAVEL PELO BOLETO";
$pdf->Cell(0,0.5,$texto, 4, 'J');

$pdf->SetXY(18, 226);
$texto = "OBSERVAÇÕES";
$pdf->Cell(0,0.5,$texto, 4, 'J');

$pdf->SetFont('Arial', '', 8);
$pdf->SetTextColor(255,0,0);
$pdf->SetXY(180, 56);
$texto = "Termo: ";
$pdf->Cell(0,0.5,$texto, 4, 'J');

$pdf->SetTextColor(0,0,0);
$pdf->SetXY(190, 56);
$texto = $nu_termo;
$pdf->Cell(0,0.5,$texto, 4, 'J');

$pdf->SetXY(132, 56);
$texto = " / ".$nu_ano;
$pdf->Cell(0,0.5,$texto, 4, 'J');

$pdf->SetTextColor(255,0,0);
$pdf->SetXY(20, 70);
$texto = "Aluno: ";
$pdf->Cell(0,0.5,$texto, 4, 'J');

$pdf->SetTextColor(0,0,0);
$pdf->SetXY(30, 70);
$texto = $nm_aluno;
$pdf->Cell(0,0.5,$texto, 4, 'J');

$pdf->SetXY(20, 189);
$texto = "Nome: ";
$pdf->Cell(0,0.5,$texto, 4, 'J');

$pdf->SetXY(29, 189);
$texto = $nm_responsavel;
$pdf->Cell(0,0.5,$texto, 4, 'J');

$pdf->SetTextColor(255,0,0);
$pdf->SetXY(97, 70);
$texto = "TURNO: ";
$pdf->Cell(0,0.5,$texto, 4, 'J');

$pdf->SetTextColor(0,0,0);
$pdf->SetXY(110, 70);
$texto = $id_turno;
$pdf->Cell(0,0.5,$texto, 4, 'J');

$pdf->SetTextColor(255,0,0);
$pdf->SetXY(170, 70);
$texto = "Sexo: ";
$pdf->Cell(0,0.5,$texto, 4, 'J');

$pdf->SetTextColor(0,0,0);
$pdf->SetXY(180, 70);
$texto = $id_sexo_car;
$pdf->Cell(0,0.5,$texto, 4, 'J');

$pdf->SetTextColor(255,0,0);
$pdf->SetXY(20, 77);
$texto = "Religião: ";
$pdf->Cell(0,0.5,$texto, 4, 'J');

$pdf->SetTextColor(0,0,0);
$pdf->SetXY(34, 77);
$texto = $nm_religiao;
$pdf->Cell(0,0.5,$texto, 4, 'J');

$pdf->SetTextColor(215,0,0);
$pdf->SetXY(58, 77);
$texto = "Série: ";
$pdf->Cell(0,0.5,$texto, 4, 'J');

$pdf->SetTextColor(0,0,0);
$pdf->SetXY(70, 77);
$texto = $nm_serie;
$pdf->Cell(0,0.5,$texto, 4, 'J');

$pdf->SetTextColor(215,0,0);
$pdf->SetXY(130, 77);
$texto = "Matrícula: ";
$pdf->Cell(0,0.5,$texto, 4, 'J');

$pdf->SetTextColor(0,0,0);
$pdf->SetXY(145, 77);
$texto = $dt_matricula;
$pdf->Cell(0,0.5,$texto, 4, 'J');

$pdf->SetTextColor(215,0,0);
$pdf->SetXY(97, 77);
$texto = "Antiguidade: ";
$pdf->Cell(0,0.5,$texto, 4, 'J');

$pdf->SetTextColor(0,0,0);
$pdf->SetXY(114, 77);
$texto = $in_antigo;
$pdf->Cell(0,0.5,$texto, 4, 'J');

$pdf->SetTextColor(255,0,0);
$pdf->SetXY(130, 70);
$texto = "Nascimento.: ";
$pdf->Cell(0,0.5,$texto, 4, 'J');

$pdf->SetTextColor(0,0,0);
$pdf->SetXY(147, 70);
$texto = $dt_nascimento;
$pdf->Cell(0,0.5,$texto, 4, 'J');

$pdf->SetTextColor(215,0,0);
$pdf->SetXY(20, 91);
$texto = "Mãe: ";
$pdf->Cell(0,0.5,$texto, 4, 'J');

$pdf->SetTextColor(0,0,0);
$pdf->SetXY(29, 91);
$texto = $nm_mae;
$pdf->Cell(0,0.5,$texto, 4, 'J');

$pdf->SetTextColor(215,0,0);
$pdf->SetXY(97, 91);
$texto = "Profissão: ";
$pdf->Cell(0,0.5,$texto, 4, 'J');

$pdf->SetTextColor(0,0,0);
$pdf->SetXY(114, 91);
$texto = $te_profissao_mae;
$pdf->Cell(0,0.5,$texto, 4, 'J');

$pdf->SetTextColor(215,0,0);
$pdf->SetXY(97, 98);
$texto = "Telefone: ";
$pdf->Cell(0,0.5,$texto, 4, 'J');

$pdf->SetTextColor(0,0,0);
$pdf->SetXY(114, 98);
$texto = $nu_telefone_mae;
$pdf->Cell(0,0.5,$texto, 4, 'J');

$pdf->SetTextColor(215,0,0);
$pdf->SetXY(20, 98);
$texto = "Local de Trabalho: ";
$pdf->Cell(0,0.5,$texto, 4, 'J');

$pdf->SetTextColor(0,0,0);
$pdf->SetXY(45, 98);
$texto = $nm_trabalho_mae;
$pdf->Cell(0,0.5,$texto, 4, 'J');

$pdf->SetTextColor(215,0,0);
$pdf->SetXY(20, 105);
$texto = "Pai: ";
$pdf->Cell(0,0.5,$texto, 4, 'J');

$pdf->SetTextColor(0,0,0);
$pdf->SetXY(30, 105);
$texto = $nm_pai;
$pdf->Cell(0,0.5,$texto, 4, 'J');

$pdf->SetTextColor(255,0,0);
$pdf->SetXY(97, 105);
$texto = "Profissão: ";
$pdf->Cell(0,0.5,$texto, 4, 'J');

$pdf->SetTextColor(0,0,0);
$pdf->SetXY(113, 105);
$texto = $te_profissao_pai;
$pdf->Cell(0,0.5,$texto, 4, 'J');

$pdf->SetTextColor(255,0,0);
$pdf->SetXY(20, 112);
$texto = "Local de Trabalho: ";
$pdf->Cell(0,0.5,$texto, 4, 'J');

$pdf->SetTextColor(0,0,0);
$pdf->SetXY(44, 112);
$texto = $nm_trabalho_pai;
$pdf->Cell(0,0.5,$texto, 4, 'J');

$pdf->SetTextColor(215,0,0);
$pdf->SetXY(97, 112);
$texto = "Telefone: ";
$pdf->Cell(0,0.5,$texto, 4, 'J');

$pdf->SetTextColor(0,0,0);
$pdf->SetXY(114, 112);
$texto = $nu_telefone_pai;
$pdf->Cell(0,0.5,$texto, 4, 'J');

$pdf->SetTextColor(255,0,0);
$pdf->SetXY(142, 112);
$texto = "E-mail: ";
$pdf->Cell(0,0.5,$texto, 4, 'J');

$pdf->SetTextColor(0,0,0);
$pdf->SetXY(155, 112);
$texto = $te_email;
$pdf->Cell(0,0.5,$texto, 4, 'J');

$pdf->SetTextColor(255,0,0);
$pdf->SetXY(20, 126);
$texto = "Rua.: ";
$pdf->Cell(0,0.5,$texto, 4, 'J');

$pdf->SetTextColor(0,0,0);
$pdf->SetXY(31, 126);
$texto = $nm_logra;
$pdf->Cell(0,0.5,$texto, 4, 'J');

$pdf->SetTextColor(255,0,0);
$pdf->SetXY(100, 126);
$texto = "N.: ";
$pdf->Cell(0,0.5,$texto, 4, 'J');

$pdf->SetTextColor(0,0,0);
$pdf->SetXY(104, 126);
$texto = $nu_logra;
$pdf->Cell(0,0.5,$texto, 4, 'J');

$pdf->SetTextColor(255,0,0);
$pdf->SetXY(114, 126);
$texto = "Bairro: ";
$pdf->Cell(0,0.5,$texto, 4, 'J');

$pdf->SetTextColor(0,0,0);
$pdf->SetXY(124, 126);
$texto = $nm_bairro;
$pdf->Cell(0,0.5,$texto, 4, 'J');

$pdf->SetTextColor(255,0,0);
$pdf->SetXY(160, 126);
$texto = "CEP: ";
$pdf->Cell(0,0.5,$texto, 4, 'J');

$pdf->SetTextColor(0,0,0);
$pdf->SetXY(169, 126);
$texto = $nu_cep;
$pdf->Cell(0,0.5,$texto, 4, 'J');

$pdf->SetTextColor(255,0,0);
$pdf->SetXY(20, 133);
$texto = "Compl.: ";
$pdf->Cell(0,0.5,$texto, 4, 'J');

$pdf->SetTextColor(0,0,0);
$pdf->SetXY(32, 133);
$texto = $nm_compl;
$pdf->Cell(0,0.5,$texto, 4, 'J');

$pdf->SetTextColor(255,0,0);
$pdf->SetXY(97, 133);
$texto = "Cidade.: ";
$pdf->Cell(0,0.5,$texto, 4, 'J');

$pdf->SetTextColor(0,0,0);
$pdf->SetXY(110, 133);
$texto = $nm_cidade;
$pdf->Cell(0,0.5,$texto, 4, 'J');

$pdf->SetTextColor(255,0,0);
$pdf->SetXY(140, 133);
$texto = "UF.: ";
$pdf->Cell(0,0.5,$texto, 4, 'J');

$pdf->SetTextColor(0,0,0);
$pdf->SetXY(149, 133);
$texto = $nm_uf;
$pdf->Cell(0,0.5,$texto, 4, 'J');

$pdf->SetTextColor(255,0,0);
$pdf->SetXY(20, 148);
$texto = "Em caso de acidente: ";
$pdf->Cell(0,0.5,$texto, 4, 'J');

$pdf->SetTextColor(0,0,0);
$pdf->SetXY(46, 148);
$texto = $nm_acidente;
$pdf->Cell(0,0.5,$texto, 4, 'J');

$pdf->SetTextColor(255,0,0);
$pdf->SetXY(97, 148);
$texto = "Em caso de dor: ";
$pdf->Cell(0,0.5,$texto, 4, 'J');

$pdf->SetTextColor(0,0,0);
$pdf->SetXY(121, 148);
$texto = $nm_analgesico;
$pdf->Cell(0,0.5,$texto, 4, 'J');

$pdf->SetTextColor(255,0,0);
$pdf->SetXY(20, 154);
$texto = "Emergência.: ";
$pdf->Cell(0,0.5,$texto, 4, 'J');

$pdf->SetTextColor(0,0,0);
$pdf->SetXY(38, 154);
$texto = $nm_emergencia;
$pdf->Cell(0,0.5,$texto, 4, 'J');

$pdf->SetTextColor(255,0,0);
$pdf->SetXY(97, 154);
$texto = "Plano :";
$pdf->Cell(0,0.5,$texto, 4, 'J');

$pdf->SetTextColor(0,0,0);
$pdf->SetXY(110, 154);
$texto = $nm_plano;
$pdf->Cell(0,0.5,$texto, 4, 'J');

$pdf->SetTextColor(255,0,0);
$pdf->SetXY(20, 161);
$texto = "Doença: ";
$pdf->Cell(0,0.5,$texto, 4, 'J');

$pdf->SetTextColor(0,0,0);
$pdf->SetXY(30, 161);
$texto = $nm_doenca;
$pdf->Cell(0,0.5,$texto, 4, 'J');

$pdf->SetTextColor(255,0,0);
$pdf->SetXY(20, 168);
$texto = "Alergia: ";
$pdf->Cell(0,0.5,$texto, 4, 'J');

$pdf->SetTextColor(0,0,0);
$pdf->SetXY(33, 168);
$texto = $nm_alergia;
$pdf->Cell(0,0.5,$texto, 4, 'J');

$pdf->SetTextColor(255,0,0);
$pdf->SetXY(20, 175);
$texto = "Rest. Alimentar: ";
$pdf->Cell(0,0.5,$texto, 4, 'J');

$pdf->SetTextColor(0,0,0);
$pdf->SetXY(43, 175);
$texto = $nm_restricao;
$pdf->Cell(0,0.5,$texto, 4, 'J');

$pdf->SetXY(20, 232);
$texto = $te_obs;
$pdf->MultiCell(0,4,$texto, 4, 'J');

$pdf->SetTextColor(255,0,0);
$pdf->SetXY(20, 196);
$texto = "Grau de Parentesco: ";
$pdf->Cell(0,0.5,$texto, 4, 'J');

$pdf->SetTextColor(0,0,0);
$pdf->SetXY(47, 196);
$texto = $nm_parentesco;
$pdf->Cell(0,0.5,$texto, 4, 'J');

$pdf->SetTextColor(255,0,0);
$pdf->SetXY(97, 196);
$texto = "Telefone: ";
$pdf->Cell(0,0.5,$texto, 4, 'J');

$pdf->SetTextColor(0,0,0);
$pdf->SetXY(113, 196);
$texto = $nu_telefone_resp;
$pdf->Cell(0,0.5,$texto, 4, 'J');

$pdf->SetTextColor(255,0,0);
$pdf->SetXY(20, 203);
$texto = "Rua/Av: ";
$pdf->Cell(0,0.5,$texto, 4, 'J');

$pdf->SetTextColor(0,0,0);
$pdf->SetXY(36, 203);
$texto = $nm_logra_resp;
$pdf->Cell(0,0.5,$texto, 4, 'J');

$pdf->SetTextColor(255,0,0);
$pdf->SetXY(20, 210);
$texto = "CEP: ";
$pdf->Cell(0,0.5,$texto, 4, 'J');

$pdf->SetTextColor(0,0,0);
$pdf->SetXY(33, 210);
$texto = $nu_cep_resp;
$pdf->Cell(0,0.5,$texto, 4, 'J');

$pdf->SetTextColor(255,0,0);
$pdf->SetXY(97, 210);
$texto = "E-mail: ";
$pdf->Cell(0,0.5,$texto, 4, 'J');

$pdf->SetTextColor(0,0,0);
$pdf->SetXY(110, 210);
$texto = $te_email_resp;
$pdf->Cell(0,0.5,$texto, 4, 'J');

$pdf->SetTextColor(255,0,0);
$pdf->SetXY(20, 217);
$texto = "Empresa que trabalha: ";
$pdf->Cell(0,0.5,$texto, 4, 'J');

$pdf->SetTextColor(0,0,0);
$pdf->SetXY(47, 217);
$texto = $nm_trabalho_resp;
$pdf->Cell(0,0.5,$texto, 4, 'J');

$pdf->SetTextColor(255,0,0);
$pdf->SetXY(97, 217);
$texto = "Profissão: ";
$pdf->Cell(0,0.5,$texto, 4, 'J');

$pdf->SetTextColor(0,0,0);
$pdf->SetXY(113, 217);
$texto = $te_profissao;
$pdf->Cell(0,0.5,$texto, 4, 'J');

$pdf->SetXY(20, 270);
$texto = "Autoriza publicação de fotos e vídeos nas redes sociais, panfletos e faixas? ".$in_imagem;
$pdf->Cell(0,0.5,$texto, 4, 'J');


$pdf->Output();
?>