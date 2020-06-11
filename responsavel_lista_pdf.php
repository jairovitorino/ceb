<?php
session_start();

//CONECTA AO MYSQL              
require_once("class/conexao.php");
$mysql = new Mysql();
$mysql->conectar(); 
$nu_ano = date("Y");

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
$texto = "RESPONSÁVEIS";
$pdf->Cell(0,0.5,$texto, 4, 'J');

// 1A LINHA HORIZONTAL
$pdf->SetXY(20,45);
$pdf->Cell(0,0,'',1,1,'L');

$nm_objeto = @$_SESSION['nm_objeto'];

if ($nm_objeto){
	$sql = mysql_query("SELECT * FROM responsaveis, parentescos, alunos, matriculas WHERE responsaveis.id_aluno = alunos.id_aluno AND responsaveis.id_matricula = matriculas.id_matricula AND responsaveis.id_parentesco = parentescos.id_parentesco AND nm_responsavel LIKE '%$nm_objeto%' AND responsaveis.id_ente = ".$_SESSION['id_ente']." ORDER BY nm_responsavel");
	} else {
	$sql = mysql_query("SELECT * FROM responsaveis, parentescos, alunos, matriculas WHERE responsaveis.id_aluno = alunos.id_aluno AND responsaveis.id_matricula = matriculas.id_matricula AND responsaveis.id_parentesco = parentescos.id_parentesco AND nu_ano = ".$nu_ano." AND responsaveis.id_ente = ".$_SESSION['id_ente']." ORDER BY nm_responsavel ");
	}
	@$row = mysql_num_rows($sql);

$row = mysql_num_rows($sql);
$pdf->SetFont('Arial', 'B', 7);
$pdf->SetXY(20, 40);
$pdf->Cell(40,5,'OR');
$pdf->SetXY(27, 40);
$pdf->Cell(40,5,'NOME');
$pdf->SetXY(94, 40);
$pdf->Cell(40,5,'ANO');
$pdf->SetXY(102, 40);
$pdf->Cell(40,5,'TRABALHO');
$pdf->SetXY(125, 40);
$pdf->Cell(40,5,'ALUNO');
$pdf->SetXY(180, 40);
$pdf->Cell(40,5,'PARENTESCO');

$j = 1;
while ( $vetor = mysql_fetch_array($sql) ){
$pdf->Ln();
$pdf->SetX(20);
$pdf->Cell(0,5,$j);
$pdf->SetX(27);

$pdf->Cell(0,5,$vetor['nm_responsavel']);
$pdf->SetX(94);
$pdf->Cell(0,5,$vetor['nu_ano']);
$pdf->SetX(102);
$pdf->Cell(0,5,$vetor['nm_trabalho']);
$pdf->SetX(125);
$pdf->Cell(0,5,$vetor['nm_aluno']);
$pdf->SetX(180);
$pdf->Cell(0,5,$vetor['nm_parentesco']);

$j = $j + 1;
}


$pdf->Output();
?>