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
$pdf->SetXY(70, 32);
$texto = "Escola ".$_SESSION['nm_ente'];
$pdf->Cell(0,0.5,$texto, 4, 'J');

$pdf->SetFont('Arial', 'B', 6);
$pdf->SetXY(70, 35);
$texto = "Rua Saldanha Marinho, 109, Caixa D'agua, CEP 40.323-010 Salvador-Ba";
$pdf->Cell(0,0.5,$texto, 4, 'J');

$pdf->SetXY(77, 38);
$texto = "Aut. NRE 26-821/16 - Port. n.52617-3/2015 D.O. 29/03/2016";
$pdf->Cell(0,0.5,$texto, 4, 'J');

// 1A LINHA HORIZONTAL
$pdf->SetXY(20,45);
$pdf->Cell(0,0,'',1,1,'L');

$dt_inicio = @$_SESSION['dt_inicio'];
 $dt_fim = @$_SESSION['dt_fim'];
$nu_ano = date("Y");
$nm_objeto = @$_SESSION['nm_objeto'];

	if ( $dt_inicio && $dt_fim ){
	 $dt_inicio = substr($dt_inicio,6,4)."-".substr($dt_inicio,3,2)."-".substr($dt_inicio,0,2);
	  $dt_fim = substr($dt_fim,6,4)."-".substr($dt_fim,3,2)."-".substr($dt_fim,0,2);
	$sql = mysql_query("SELECT * FROM matriculas, alunos, series WHERE dt_matricula BETWEEN '".$dt_inicio."' AND '".$dt_fim."' AND matriculas.id_serie = series.id_serie AND matriculas.id_aluno = alunos.id_aluno AND nu_ano = ".$nu_ano." AND matriculas.id_ente = ".$_SESSION['id_ente']." ORDER BY nm_aluno ");
	} else if ($nm_objeto){
	$sql = mysql_query("SELECT * FROM matriculasx, alunos, series WHERE nm_aluno LIKE '%$nm_objeto%' AND matriculas.id_aluno = alunos.id_aluno AND matriculas.id_serie = series.id_serie AND matriculas.id_ente = ".$_SESSION['id_ente']." ORDER BY nm_aluno ");
	} else {
	$sql = mysql_query("SELECT * FROM matriculas, alunos, series WHERE matriculas.id_aluno = alunos.id_aluno AND nu_ano = ".$nu_ano." AND matriculas.id_serie = series.id_serie AND matriculas.id_ente = ".$_SESSION['id_ente']." ORDER BY nm_aluno ");
	}
	@$row = mysql_num_rows($sql);

$row = mysql_num_rows($sql);
$pdf->SetFont('Arial', 'B', 7);
$pdf->SetXY(20, 40);
$pdf->Cell(40,5,'OR');
$pdf->SetXY(27, 40);
$pdf->Cell(40,5,'NOME');
$pdf->SetXY(93, 40);
$pdf->Cell(40,5,'TERMO');
$pdf->SetXY(107, 40);
$pdf->Cell(40,5,'CPF');
$pdf->SetXY(124, 40);
$pdf->Cell(40,5,'TURNO');
$pdf->SetXY(144, 40);
$pdf->Cell(40,5,'SERIE');
$pdf->SetXY(164, 40);
$pdf->Cell(40,5,'ALMOÇO');
$pdf->SetXY(181, 40);
$pdf->Cell(40,5,'ANO');
$pdf->SetXY(191, 40);
$pdf->Cell(40,5,'SEXO');

$j = 1;
while ( $vetor = mysql_fetch_array($sql) ){
$vetor['id_sexo'] == 1 ? $id_sexo = "M" : $id_sexo = "F";
$vetor['in_almoco'] == 1 ? $in_almoco = "Sim" : $in_almoco = "Não";
switch($vetor['id_turno']){
	case 1;
	$id_turno = "Matutino";
	break;
	case 2;
	$id_turno = "Vespertino";
	break;
	case 3;
	$id_turno = "Integral";
	break;
	}
$pdf->Ln();
$pdf->SetX(20);
$pdf->Cell(0,5,$j);
$pdf->SetX(27);
$pdf->Cell(0,5,$vetor['nm_aluno']);
$pdf->SetX(93);
$pdf->Cell(0,5,$vetor['nu_termo']);
$pdf->SetX(107);
$pdf->Cell(0,5,$vetor['nu_cpf']);
$pdf->SetX(126);
$pdf->Cell(0,5,$id_turno);
$pdf->SetX(144);
$pdf->Cell(0,5,$vetor['nm_serie']);
$pdf->SetX(164);
$pdf->Cell(0,5,$in_almoco);
$pdf->SetX(181);
$pdf->Cell(0,5,$vetor['nu_ano']);
$pdf->SetX(191);
$pdf->Cell(0,5,$id_sexo);
$j = $j + 1;
}



$pdf->Output();
?>