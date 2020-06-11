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
$pdf->SetXY(66, 22);
$texto = "CENTRO COMUNITÁRIO DA IGREJA BATISTA FILADÉLFIA";
$pdf->Cell(0,0.5,$texto, 4, 'J');

$pdf->SetFont('Arial', 'B', 6);
$pdf->SetXY(70, 25);
$texto = "Rua Saldanha Marinho, 109, Caixa D'agua, CEP 40.323-010 Salvador-Ba";
$pdf->Cell(0,0.5,$texto, 4, 'J');

$pdf->SetFont('Arial', 'B', 8);
$pdf->SetXY(80, 38);
$texto = "FICHA DE REGISTRO DO FUNCIONÁRIO";
$pdf->Cell(0,0.5,$texto, 4, 'J');


// 1. Retangulo
$pdf->Rect(18, 64, 180, 25 , "D");

// 2. Retangulo
$pdf->Rect(18, 96, 180, 25 , "D");

// 3. Retangulo
$pdf->Rect(18, 128, 180, 20 , "D");

// 4. Retangulo
$pdf->Rect(18, 155, 180, 60 , "D");

$pdf->SetFont('Arial', '', 6);
$pdf->SetXY(18, 62);
$texto = "DADOS CIVÍS";
$pdf->Cell(0,0.5,$texto, 4, 'J');

$pdf->SetFont('Arial', '', 6);
$pdf->SetXY(18, 94);
$texto = "DADOS DO PROFISSIONAIS";
$pdf->Cell(0,0.5,$texto, 4, 'J');

$pdf->SetFont('Arial', '', 6);
$pdf->SetXY(18, 126);
$texto = "DADOS DE ENDEREÇO";
$pdf->Cell(0,0.5,$texto, 4, 'J');

$pdf->SetFont('Arial', '', 6);
$pdf->SetXY(18, 153);
$texto = "OBSERVAÇÕES";
$pdf->Cell(0,0.5,$texto, 4, 'J');


$id_funcionario = $_SESSION['id_funcionario'];

$sql = mysql_query("SELECT * FROM funcionarios,cargos, estado_civil WHERE funcionarios.id_estado_civil = estado_civil.id_estado_civil AND funcionarios.id_cargo = cargos.id_cargo AND id_funcionario = ".$id_funcionario."");

$row = mysql_num_rows($sql);
	for($i=0; $i<$row; $i++) {
	$nm_funcionario = mysql_result($sql, $i, "nm_funcionario");
	$nm_natural = mysql_result($sql, $i, "nm_natural");
	$id_sexo = mysql_result($sql, $i, "id_sexo");
	$id_sexo == 1 ? $id_sexo = "M" : $id_sexo = "F";
	$nu_telefone = mysql_result($sql, $i, "nu_telefone");
	$nm_estado_civil = mysql_result($sql, $i, "nm_estado_civil");
	$nm_conjugue = mysql_result($sql, $i, "nm_conjugue");
	$nu_rg = mysql_result($sql, $i, "nu_rg");
	$nm_orgao = mysql_result($sql, $i, "nm_orgao");
	$nu_cpf = mysql_result($sql, $i, "nu_cpf");
	$nu_carteira = mysql_result($sql, $i, "nu_carteira");
	$nu_serie = mysql_result($sql, $i, "nu_serie");
	$nm_cargo = mysql_result($sql, $i, "nm_cargo");
	$nm_experiencia = mysql_result($sql, $i, "nm_experiencia");
	$dt_admissao = mysql_result($sql, $i, "dt_admissao");
	$dt_admissao = substr($dt_admissao,8,2)."/".substr($dt_admissao,5,2)."/".substr($dt_admissao,0,4);
	$dt_nascimento = mysql_result($sql, $i, "dt_nascimento");
	$dt_nascimento = substr($dt_nascimento,8,2)."/".substr($dt_nascimento,5,2)."/".substr($dt_nascimento,0,4);
	$nm_conjugue = mysql_result($sql, $i, "nm_conjugue");
	$nm_logra = mysql_result($sql, $i, "nm_logra");
	$nu_logra = mysql_result($sql, $i, "nu_logra");
	$nm_bairro = mysql_result($sql, $i, "nm_bairro");
	$nu_cep = mysql_result($sql, $i, "nu_cep");
	$nm_compl = mysql_result($sql, $i, "nm_compl");
	$nm_cidade = mysql_result($sql, $i, "nm_cidade");
	$nm_uf = mysql_result($sql, $i, "nm_uf");
	$te_obs = mysql_result($sql, $i, "te_obs");
	
}


$pdf->SetFont('Arial', 'B', 8);

$pdf->SetXY(25, 70);
$texto = "Nome: ".$nm_funcionario;
$pdf->Cell(0,0.5,$texto, 4, 'J');

$pdf->SetXY(97, 70);
$texto = "Naturalidade: ".$nm_natural;
$pdf->Cell(0,0.5,$texto, 4, 'J');

$pdf->SetXY(130, 70);
$texto = "Sexo: ".$id_sexo;
$pdf->Cell(0,0.5,$texto, 4, 'J');

$pdf->SetXY(25, 77);
$texto = "Identidade: ".$nu_rg;
$pdf->Cell(0,0.5,$texto, 4, 'J');

$pdf->SetXY(25, 84);
$texto = "Est. Civil: ".$nm_estado_civil;
$pdf->Cell(0,0.5,$texto, 4, 'J');

$pdf->SetXY(97, 84);
$texto = "Conjugue: ".$nm_conjugue;
$pdf->Cell(0,0.5,$texto, 4, 'J');

$pdf->SetXY(97, 77);
$texto = "Orgão Exp: ".$nm_orgao;
$pdf->Cell(0,0.5,$texto, 4, 'J');

$pdf->SetXY(130, 77);
$texto = "CPF: ".$nu_cpf;
$pdf->Cell(0,0.5,$texto, 4, 'J');

$pdf->SetXY(145, 70);
$texto = "Data de Nasc.: ".$dt_nascimento;
$pdf->Cell(0,0.5,$texto, 4, 'J');

$pdf->SetXY(97, 102);
$texto = "Série: ".$nu_serie;
$pdf->Cell(0,0.5,$texto, 4, 'J');

$pdf->SetXY(25, 102);
$texto = "Carteira Profissional: ".$nu_carteira;
$pdf->Cell(0,0.5,$texto, 4, 'J');

$pdf->SetXY(25, 108);
$texto = "Cargo: ".$nm_cargo;
$pdf->Cell(0,0.5,$texto, 4, 'J');

$pdf->SetXY(25, 116);
$texto = "Admissão: ".$dt_admissao;
$pdf->Cell(0,0.5,$texto, 4, 'J');

$pdf->SetXY(97, 116);
$texto = "Telefone: ".$nu_telefone;
$pdf->Cell(0,0.5,$texto, 4, 'J');

$pdf->SetXY(25, 135);
$texto = "Rua.: ".$nm_logra.", ".$nu_logra;
$pdf->Cell(0,0.5,$texto, 4, 'J');

$pdf->SetXY(97, 135);
$texto = "Bairro: ".$nm_bairro;
$pdf->Cell(0,0.5,$texto, 4, 'J');

$pdf->SetXY(140, 135);
$texto = "CEP: ".$nu_cep;
$pdf->Cell(0,0.5,$texto, 4, 'J');

$pdf->SetXY(25, 142);
$texto = "Compl.: ".$nm_compl;
$pdf->Cell(0,0.5,$texto, 4, 'J');

$pdf->SetXY(97, 142);
$texto = "Cidade.: ".$nm_cidade;
$pdf->Cell(0,0.5,$texto, 4, 'J');

$pdf->SetXY(140, 142);
$texto = "UF.: ".$nm_uf;
$pdf->Cell(0,0.5,$texto, 4, 'J');

$pdf->SetXY(25, 157);
$texto = $te_obs;
$pdf->MultiCell(0,4,$texto, 4, 'J');


$pdf->Output();
?>