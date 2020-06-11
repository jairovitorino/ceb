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
$pdf->SetXY(76, 31);
$texto = "Escola ".$_SESSION['nm_ente'];
$pdf->Cell(0,0.5,$texto, 4, 'J');

$pdf->SetXY(95, 37);
$texto = "FUNCIONÁRIOS";
$pdf->Cell(0,0.5,$texto, 4, 'J');

// 1A LINHA HORIZONTAL
$pdf->SetXY(20,45);
$pdf->Cell(0,0,'',1,1,'L');

$nm_objeto = @$_SESSION['nm_objeto'];

if ($nm_objeto){
	$sql = mysql_query("SELECT * FROM funcionarios, cargos WHERE nm_funcionario LIKE '%$nm_objeto%' AND funcionarios.id_cargo = cargos.id_cargo AND funcionarios.id_ente = ".$_SESSION['id_ente']." ORDER BY nm_funcionario  ");
	} else {
	$sql = mysql_query("SELECT * FROM funcionarios,cargos WHERE funcionarios.id_cargo = cargos.id_cargo AND funcionarios.id_ente = ".$_SESSION['id_ente']." ORDER BY nm_funcionario ");
	}
	@$row = mysql_num_rows($sql);

$pdf->SetFont('Arial', 'B', 7);
$pdf->SetXY(20, 40);
$pdf->Cell(40,5,'OR');
$pdf->SetXY(27, 40);
$pdf->Cell(40,5,'NOME');
$pdf->SetXY(75, 40);
$pdf->Cell(40,5,'CPF');
$pdf->SetXY(93, 40);
$pdf->Cell(40,5,'CARGO');
$pdf->SetXY(132, 40);
$pdf->Cell(40,5,'TELEFONE');
$pdf->SetXY(165, 40);
$pdf->Cell(40,5,'ADMISSÃO');
$pdf->SetXY(191, 40);
$pdf->Cell(40,5,'SEXO');

$j = 1;
while ( $vetor = mysql_fetch_array($sql) ){
$dt_admissao = substr($vetor['dt_admissao'],8,2)."/".substr($vetor['dt_admissao'],5,2)."/".substr($vetor['dt_admissao'],0,4);
$vetor['id_sexo'] == 1 ? $id_sexo = "M" : $id_sexo = "F";
$pdf->Ln();
$pdf->SetX(20);
$pdf->Cell(0,5,$j);
$pdf->SetX(27);

$pdf->Cell(0,5,$vetor['nm_funcionario']);
$pdf->SetX(75);
$pdf->Cell(0,5,$vetor['nu_cpf']);
$pdf->SetX(93);
$pdf->Cell(0,5,$vetor['nm_cargo']);
$pdf->SetX(132);
$pdf->Cell(0,5,$vetor['nu_telefone']);
$pdf->SetX(165);
$pdf->Cell(0,5,$dt_admissao);
$pdf->SetX(191);
$pdf->Cell(0,5,$id_sexo);
$j = $j + 1;
}



$pdf->Output();
?>