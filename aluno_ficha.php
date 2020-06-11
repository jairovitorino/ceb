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

$pdf->Image('img/logo.png',94,9,20,20);

$pdf->SetFont('Arial', 'B', 8);
$pdf->SetXY(61, 22);
$texto = "CENTRO COMUNITÁRIO DA IGREJA BATISTA FILADÉLFIA";
$pdf->Cell(0,0.5,$texto, 4, 'J');

$pdf->SetFont('Arial', 'B', 6);
$pdf->SetXY(65, 25);
$texto = "Rua Saldanha Marinho, 109, Caixa D'agua, CEP 40.323-010 Salvador-Ba";
$pdf->Cell(0,0.5,$texto, 4, 'J');

$pdf->SetXY(72, 28);
$texto = "Aut. NRE 26-821/16 - Port. n.52617-3/2015 D.O. 29/03/2016";
$pdf->Cell(0,0.5,$texto, 4, 'J');

$pdf->SetXY(85, 31);
$texto = "Educação Infantil e Fundamental I";
$pdf->Cell(0,0.5,$texto, 4, 'J');

$pdf->SetFont('Arial', 'B', 8);
$pdf->SetXY(91, 58);
$texto = "FICHA DO ALUNO";
$pdf->Cell(0,0.5,$texto, 4, 'J');

// 1. Retangulo
$pdf->Rect(18, 64, 180, 18 , "D");

// 2. Retangulo
$pdf->Rect(18, 86, 180, 31 , "D");

// 3. Retangulo
$pdf->Rect(18, 121, 180, 19 , "D");

// 4. Retangulo
$pdf->Rect(18, 144, 180, 36 , "D");

// 5. Retangulo
$pdf->Rect(18, 184, 180, 44 , "D");

$pdf->SetFont('Arial', '', 6);
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

$pdf->SetXY(18, 182);
$texto = "OBSERVALÇOES";
$pdf->Cell(0,0.5,$texto, 4, 'J');

$id_aluno = $_SESSION['id_aluno'];

$sql = mysql_query("SELECT alunos.nm_aluno AS nm_aluno, alunos.id_sexo AS id_sexo, alunos.nu_termo AS nu_termo, alunos.in_antigo AS in_antigo, alunos.nm_mae AS nm_mae, alunos.nu_telefone_mae AS nu_telefone_mae,
alunos.nm_trabalho_mae AS nm_trabalho_mae, alunos.te_profissao_mae AS te_profissao_mae, analgesicos.nm_analgesico AS nm_analgesico, alunos.te_profissao_pai AS te_profissao_pai, alunos.nm_pai AS nm_pai, alunos.nu_telefone_pai AS nu_telefone_pai,
alunos.nm_trabalho_pai AS nm_trabalho_pai, alunos.dt_nascimento AS dt_nascimento, alunos.te_email AS te_email, religioes.nm_religiao AS nm_religiao, alunos.nm_logra AS nm_logra, alunos.nu_logra AS nu_logra, alunos.nm_bairro AS nm_bairro,
alunos.nu_cep AS nu_cep, alunos.nm_compl AS nm_compl, alunos.nm_cidade AS nm_cidade, alunos.nm_uf AS nm_uf, alunos.nm_emergencia AS nm_emergencia, alunos.nm_plano AS nm_plano, alunos.nm_alergia AS nm_alergia,
alunos.nm_doenca AS nm_doenca, alunos.nm_restricao AS nm_restricao, alunos.nm_acidente AS nm_acidente, alunos.te_obs AS te_obs, alunos.te_imagem AS te_imagem,alunos.dt_cadastro AS dt_cadastro, alunos.st_controle AS st_controle

FROM alunos, religioes, analgesicos
WHERE alunos.id_religiao = religioes.id_religiao
AND alunos.id_analgesico = analgesicos.id_analgesico
AND id_aluno = ".$id_aluno."");

$row = mysql_num_rows($sql);
	for($i=0; $i<$row; $i++) {
	$nm_aluno = mysql_result($sql, $i, "nm_aluno");
	$id_sexo = mysql_result($sql, $i, "id_sexo");
	$id_sexo_car = mysql_result($sql, $i, "id_sexo");
	$id_sexo_car == 1 ? $id_sexo_car = "M" : $id_sexo_car = "F";
	$nu_termo = mysql_result($sql, $i, "nu_termo");
	$in_antigo = mysql_result($sql, $i, "in_antigo");
	$in_antigo == 1 ? $in_antigo = "Novato" : $in_antigo = "Veterano";
	$nm_mae = mysql_result($sql, $i, "nm_mae");
	$nu_telefone_mae = mysql_result($sql, $i, "nu_telefone_mae");
	$nm_trabalho_mae = mysql_result($sql, $i, "nm_trabalho_mae");
	
	$te_profissao_mae = mysql_result($sql, $i, "te_profissao_mae");
	$te_profissao_pai  = mysql_result($sql, $i, "te_profissao_pai");
	
	
	$nm_analgesico = mysql_result($sql, $i, "nm_analgesico");	
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
	$nm_plano = mysql_result($sql, $i, "nm_plano");
	$nm_plano  == "" ? $nm_plano = "Não" : $nm_plano = $nm_plano;
	$nm_alergia = mysql_result($sql, $i, "nm_alergia");
	$nm_alergia == "" ? $nm_alergia = "Não" : $nm_alergia = $nm_alergia;
	$nm_doenca = mysql_result($sql, $i, "nm_doenca");
	$nm_doenca == "" ? $nm_doenca = "Não" : $nm_doenca = $nm_doenca;
	$nm_restricao = mysql_result($sql, $i, "nm_restricao");
	$nm_restricao == "" ? $nm_restricao = "Não" : $nm_restricao = $nm_restricao;
	$nm_acidente = mysql_result($sql, $i, "nm_acidente");
	$te_obs = mysql_result($sql, $i, "te_obs");
	$te_imagem = mysql_result($sql, $i, "te_imagem");
	$te_imagem = substr($te_imagem,14);
	$id_sexo = mysql_result($sql, $i, "id_sexo");
	$st_controle = mysql_result($sql, $i, "st_controle");
	
	switch($st_controle){
	case 0;
	$st_controle = "Cadastrado";
	break;
	case 1;
	$st_controle = "Matriculado";
	break;
	case 2;
	$st_controle = "Transferido";
	break;
	}
}

// Retangulo da foto
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

//$te_imagem == "" ? $te_imagem = "img_masc.jpg" : $te_imagem = $te_imagem; 
//$pdf->Image('fotos/'.$te_imagem,98,37,13,13);

$pdf->SetFont('Arial', 'B', 8);

$pdf->SetXY(25, 70);
$texto = "Aluno: ";
$pdf->Cell(0,0.5,$texto, 4, 'J');

$pdf->SetFont('Arial', '', 8);
$pdf->SetXY(35, 70);
$texto = $nm_aluno;
$pdf->Cell(0,0.5,$texto, 4, 'J');

$pdf->SetFont('Arial', 'B', 8);

$pdf->SetXY(97, 70);
$texto = "Status: ";
$pdf->Cell(0,0.5,$texto, 4, 'J');

$pdf->SetFont('Arial', '', 8);
$pdf->SetXY(108, 70);
$texto = $st_controle;
$pdf->Cell(0,0.5,$texto, 4, 'J');

$pdf->SetFont('Arial', 'B', 8);
$pdf->SetXY(169, 230);
$texto = "Cadastro: ";
$pdf->Cell(0,0.5,$texto, 4, 'J');

$pdf->SetFont('Arial', '', 8);
$pdf->SetXY(183, 230);
$texto = $dt_cadastro;
$pdf->Cell(0,0.5,$texto, 4, 'J');

$pdf->SetFont('Arial', 'B', 8);

$pdf->SetXY(180, 58);
$texto = "TERMO: ".$nu_termo;
$pdf->Cell(0,0.5,$texto, 4, 'J');

$pdf->SetXY(170, 70);
$texto = "Sexo: ".$id_sexo_car;
$pdf->Cell(0,0.5,$texto, 4, 'J');

$pdf->SetXY(25, 77);
$texto = "Religião: ".$nm_religiao;
$pdf->Cell(0,0.5,$texto, 4, 'J');

$pdf->SetXY(130, 77);
$texto = "e-mail: ".$te_email;
$pdf->Cell(0,0.5,$texto, 4, 'J');

$pdf->SetXY(97, 77);
$texto = "Antiguidade: ".$in_antigo;
$pdf->Cell(0,0.5,$texto, 4, 'J');

$pdf->SetXY(130, 70);
$texto = "Nascimento.: ".$dt_nascimento;
$pdf->Cell(0,0.5,$texto, 4, 'J');

$pdf->SetXY(25, 91);
$texto = "Mãe: ".$nm_mae;
$pdf->Cell(0,0.5,$texto, 4, 'J');

$pdf->SetXY(97, 91);
$texto = "Profissão: ".$te_profissao_mae;
$pdf->Cell(0,0.5,$texto, 4, 'J');

$pdf->SetXY(97, 98);
$texto = "Telefone: ".$nu_telefone_mae;
$pdf->Cell(0,0.5,$texto, 4, 'J');

$pdf->SetXY(25, 98);
$texto = "Local de Trabalho: ".$nm_trabalho_mae;
$pdf->Cell(0,0.5,$texto, 4, 'J');

$pdf->SetXY(25, 105);
$texto = "Pai: ".$nm_pai;
$pdf->Cell(0,0.5,$texto, 4, 'J');

$pdf->SetXY(97, 105);
$texto = "Profissão: ".$te_profissao_pai;
$pdf->Cell(0,0.5,$texto, 4, 'J');

$pdf->SetXY(25, 112);
$texto = "Local de Trabalho: ".$nm_trabalho_pai;
$pdf->Cell(0,0.5,$texto, 4, 'J');

$pdf->SetXY(97, 112);
$texto = "Telefone: ".$nu_telefone_pai;
$pdf->Cell(0,0.5,$texto, 4, 'J');

$pdf->SetXY(25, 126);
$texto = "Rua.: ".$nm_logra;
$pdf->Cell(0,0.5,$texto, 4, 'J');

$pdf->SetXY(100, 126);
$texto = "N.: ".$nu_logra;
$pdf->Cell(0,0.5,$texto, 4, 'J');

$pdf->SetXY(112, 126);
$texto = "Bairro: ".$nm_bairro;
$pdf->Cell(0,0.5,$texto, 4, 'J');

$pdf->SetXY(160, 126);
$texto = "CEP: ".$nu_cep;
$pdf->Cell(0,0.5,$texto, 4, 'J');

$pdf->SetXY(25, 133);
$texto = "Compl.: ".$nm_compl;
$pdf->Cell(0,0.5,$texto, 4, 'J');

$pdf->SetXY(97, 133);
$texto = "Cidade.: ".$nm_cidade;
$pdf->Cell(0,0.5,$texto, 4, 'J');

$pdf->SetXY(140, 133);
$texto = "UF.: ".$nm_uf;
$pdf->Cell(0,0.5,$texto, 4, 'J');

$pdf->SetXY(25, 148);
$texto = "Em caso de acidente: ".$nm_acidente;
$pdf->Cell(0,0.5,$texto, 4, 'J');

$pdf->SetXY(97, 148);
$texto = "Em caso de dor: ".$nm_analgesico;
$pdf->Cell(0,0.5,$texto, 4, 'J');

$pdf->SetXY(25, 154);
$texto = "Emergência.: ".$nm_emergencia;
$pdf->Cell(0,0.5,$texto, 4, 'J');

$pdf->SetXY(97, 154);
$texto = "Plano de Saúde: ".$nm_plano;
$pdf->Cell(0,0.5,$texto, 4, 'J');

$pdf->SetXY(25, 161);
$texto = "Doença Neurológica: ".$nm_doenca;
$pdf->Cell(0,0.5,$texto, 4, 'J');

$pdf->SetXY(25, 168);
$texto = "Alergia: ".$nm_alergia;
$pdf->Cell(0,0.5,$texto, 4, 'J');

$pdf->SetXY(25, 175);
$texto = "Restrição Alimentar: ".$nm_restricao;
$pdf->Cell(0,0.5,$texto, 4, 'J');

$pdf->SetFont('Arial', '', 8);
$pdf->SetXY(20, 186);
$texto = $te_obs;
$pdf->MultiCell(0,4,$texto, 4, 'J');




$pdf->Output();
?>