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

$pdf->SetXY(100, 37);
$texto = "ALUNOS";
$pdf->Cell(0,0.5,$texto, 4, 'J');

// 1A LINHA HORIZONTAL
$pdf->SetXY(20,45);
$pdf->Cell(0,0,'',1,1,'L');

$nm_objeto = @$_SESSION['nm_objeto'];
$st_controle = @$_SESSION['st_controle'];

if ($nm_objeto){
	$sql = mysql_query("SELECT alunos.dt_nascimento,(YEAR(CURDATE())-YEAR(alunos.dt_nascimento)) AS nu_idade, alunos.id_aluno,alunos.id_usuario,alunos.nm_aluno,alunos.nu_termo,
	alunos.te_imagem,alunos.nm_pai,alunos.id_sexo,alunos.dt_cadastro,alunos.in_antigo,alunos.st_controle,alunos.nm_aluno
	FROM alunos 
	WHERE nm_aluno 
	LIKE '%$nm_objeto%' 
	AND alunos.id_ente = ".$_SESSION['id_ente']." 
	ORDER BY nm_aluno ");
	} else if ($st_controle){
	$sql = mysql_query("SELECT alunos.dt_nascimento,(YEAR(CURDATE())-YEAR(alunos.dt_nascimento)) AS nu_idade, alunos.id_aluno,alunos.id_usuario,alunos.nm_aluno,alunos.nu_termo,
	alunos.te_imagem,alunos.nm_pai,alunos.id_sexo,alunos.dt_cadastro,alunos.in_antigo,alunos.st_controle,alunos.nm_aluno
	FROM alunos 
	WHERE st_controle = ".$st_controle." 
	AND alunos.id_ente = ".$_SESSION['id_ente']."  
	ORDER BY nm_aluno ");
	} else {
	$sql = mysql_query("SELECT alunos.dt_nascimento,(YEAR(CURDATE())-YEAR(alunos.dt_nascimento)) AS nu_idade, alunos.id_aluno,alunos.id_usuario,alunos.nm_aluno,alunos.nu_termo,
	alunos.te_imagem,alunos.nm_pai,alunos.id_sexo,alunos.dt_cadastro,alunos.in_antigo,alunos.st_controle,alunos.nm_aluno
	FROM alunos 
	WHERE alunos.id_ente = ".$_SESSION['id_ente']." 
	ORDER BY nm_aluno ");
	}
	@$row = mysql_num_rows($sql);

$row = mysql_num_rows($sql);
$pdf->SetFont('Arial', 'B', 7);
$pdf->SetXY(20, 40);
$pdf->Cell(40,5,'OR');
$pdf->SetXY(27, 40);
$pdf->Cell(40,5,'NOME');
$pdf->SetXY(93, 40);
$pdf->Cell(40,5,'IDADE');
$pdf->SetXY(104, 40);
$pdf->Cell(40,5,'TERMO');
$pdf->SetXY(114, 40);
$pdf->Cell(40,5,'ANTIGUIDADE');
$pdf->SetXY(134, 40);
$pdf->Cell(40,5,'STATUS');

$j = 1;
while ( $vetor = mysql_fetch_array($sql) ){
$vetor['id_sexo'] == 1 ? $id_sexo = "M" : $id_sexo = "F";
$vetor['in_antigo'] == 1 ? $nm_antigo = "Novato" : $nm_antigo = "Veterano";
$pdf->Ln();
$pdf->SetX(20);
$pdf->Cell(0,5,$j);
$pdf->SetX(27);
switch($vetor['st_controle']){
	case 0;
	$id_status = "Cadastrado";
	break;
	case 1;
	$id_status = "Matriculado";
	break;
	case 2;
	$id_status = "Transferido";
	break;
	case 3;
	$id_status = "Outros";
	break;
	}

$pdf->SetFont('Arial', 'B', 7);
//$pdf->SetTextColor(255,0,0);
$pdf->Cell(0,5,$vetor['nm_aluno']);
$pdf->SetX(93);
$pdf->Cell(0,5,$vetor['nu_idade']);
$pdf->SetX(104);
$pdf->Cell(0,5,$vetor['nu_termo']);
$pdf->SetX(114);
$pdf->Cell(0,5,$nm_antigo);
$pdf->SetX(134);
$pdf->Cell(0,5,$id_status);
//$pdf->setfillcolor( rand(0,255), rand 0,255), rand(0,255) );
$j = $j + 1;
}



$pdf->Output();
?>