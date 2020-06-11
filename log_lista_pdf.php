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

$pdf->Image('img/logo.png',96,9,25,20);

$pdf->SetFont('Arial', 'B', 8);
$pdf->SetXY(75, 30);
$texto = "CENTRO EDUCACIONAL BATISTA FILADษLFIA";
$pdf->Cell(0,0.5,$texto, 4, 'J');

$pdf->SetFont('Arial', 'B', 7);
$pdf->SetXY(106, 37);
$texto = "LOG";
$pdf->Cell(0,0.5,$texto, 4, 'J');

// 1A LINHA HORIZONTAL
$pdf->SetXY(20,45);
$pdf->Cell(0,0,'',1,1,'L');
 
 $nm_objeto = @$_SESSION['nm_objeto'];
 //$nm_bairro = @$_SESSION['nm_bairro'];
 //$nm_logra = @$_SESSION['nm_logra'];

	$id_acao = @$_SESSION['id_acao'];
 //$nm_bairro = @$_SESSION['nm_bairro'];
 //$nm_logra = @$_SESSION['nm_logra'];

	if ($id_acao ){
	$sql = mysql_query("SELECT * FROM logs, acoes, usuarios
	WHERE logs.id_usuario = usuarios.id_usuario AND logs.id_acao = acoes.id_acao AND logs.id_acao = ".$id_acao."
	ORDER BY dt_log, hr_log ");
	} else {
	$sql = mysql_query("SELECT * FROM logs, acoes, usuarios 
	WHERE logs.id_usuario = usuarios.id_usuario AND logs.id_acao = acoes.id_acao ORDER BY dt_log, hr_log ");
	}
	@$row = mysql_num_rows($sql);

$pdf->SetFont('Arial', 'B', 7);
$pdf->SetXY(20, 40);
$pdf->Cell(40,5,'OR');
$pdf->SetXY(27, 40);
$pdf->Cell(40,5,'AวรO');
$pdf->SetXY(45, 40);
$pdf->Cell(40,5,'OBJETO');
$pdf->SetXY(68, 40);
$pdf->Cell(40,5,'DATA');
$pdf->SetXY(85, 40);
$pdf->Cell(40,5,'HORA');
$pdf->SetXY(95, 40);
$pdf->Cell(40,5,'IP');
$pdf->SetXY(120, 40);
$pdf->Cell(40,5,'USUมRIO');
$pdf->SetXY(145, 40);
$pdf->Cell(40,5,'DISPOSITIVO');


$j = 1;
while ( $vetor = mysql_fetch_array($sql) ){
$dt_log = substr($vetor['dt_log'],8,2)."/".substr($vetor['dt_log'],5,2)."/".substr($vetor['dt_log'],0,4);
$dt_log == "00/00/0000" ? $dt_log = "" : $dt_log = $dt_log;

$pdf->Ln();
$pdf->SetX(20);
$pdf->Cell(0,5,$j);
$pdf->SetX(27);
$pdf->Cell(0,5,$vetor['nm_acao']);
$pdf->SetX(45);
$pdf->Cell(0,5,$vetor['nm_objeto']);
$pdf->SetX(68);
$pdf->Cell(0,5,$dt_log);
$pdf->SetX(85);
$pdf->Cell(0,5,$vetor['hr_log']);
$pdf->SetX(95);
$pdf->Cell(0,5,$vetor['nu_ip']);
$pdf->SetX(120);
$pdf->Cell(0,5,$vetor['nm_usuario']);
$pdf->SetX(145);
$pdf->Cell(0,5,$vetor['nm_dispositivo']);


$j = $j + 1;
}



$pdf->Output();
?>