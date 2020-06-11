<?php
session_start();

$ano = date("Y");
$mes = date("m");

switch($mes){
case 1;
$nm_mes = "Janeiro";
$nu_mes = 31;
break;
case 2;
$nm_mes = "Fevereiro";
$bissexto= date('L', mktime(0, 0, 0, 1, 1, $ano));
$bissexto ? $nu_mes = 29 : $nu_mes = 28;
break;
case 3;
$nm_mes = "Março";
$nu_mes = 31;
break;
case 4;
$nm_mes = "Abril";
$nu_mes = 30;
break;
case 5;
$nm_mes = "Maio";
$nu_mes = 31;
break;
case 6;
$nm_mes = "Junho";
$nu_mes = 30;
break;
case 7;
$nm_mes = "Julho";
$nu_mes = 31;
break;
case 8;
$nm_mes = "Agosto";
$nu_mes = 31;
break;
case 9;
$nm_mes = "Setembro";
$nu_mes = 30;
break;
case 10;
$nm_mes = "Outubro";
$nu_mes = 31;
break;
case 11;
$nm_mes = "Novembro";
$nu_mes = 30;
break;
case 12;
$nm_mes = "Dezembro";
$nu_mes = 31;
break;
}

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
$pdf->SetXY(91, 45);
$texto = "FOLHA DE PONTO";
$pdf->Cell(0,0.5,$texto, 4, 'J');

$pdf->SetXY(30, 54);
$texto = "Mes: ".$nm_mes."/".$ano;
$pdf->Cell(0,0.5,$texto, 4, 'J');

$pdf->SetXY(140, 54);
$texto = "Nome: ".$_SESSION['nm_usuario'];
$pdf->Cell(0,0.5,$texto, 4, 'J');

// largura padrão das colunas
$largura = 12;
// largura padrão das colunas
$largura1 = 50;
// largura padrão das colunas
$largura2 = 21;
// altura padrão das linhas das colunas
$altura = 6;

$pdf->SetXY(20, 58);
$pdf->Cell($largura2, $altura, 'Dia', 1, 0, 'C');
$pdf->SetXY(41, 58);
$pdf->Cell($largura2, $altura, 'Entr', 1, 0, 'C');
$pdf->SetXY(62, 58);
$pdf->Cell($largura2, $altura, 'Saída', 1, 0, 'C');
$pdf->SetXY(83, 58);
$pdf->Cell($largura2, $altura, 'Entr', 1, 0, 'C');
$pdf->SetXY(104, 58);
$pdf->Cell($largura2, $altura, 'Saída', 1, 0, 'C');
$pdf->SetXY(125, 58);
$pdf->Cell($largura2, $altura, 'Rubrica', 1, 0, 'C');
$pdf->SetXY(146, 58);
$pdf->Cell($largura1, $altura, 'Observações', 1, 0, 'C');

/* example 1 */

 $diasemana = array('Domingo', 'Segunda', 'Terça', 'Quarta', 'Quinta', 'Sexta', 'Sabado');

 // Aqui podemos usar a data atual ou qualquer outra data no formato Ano-mês-dia (2014-02-28)
 $data = date('Y-m-d');

 // Varivel que recebe o dia da semana (0 = Domingo, 1 = Segunda ...)
 $diasemana_numero = date('w', strtotime($data));

//( date( 'w' ) % 6 ) == 0 
$i = 1;
$pdf->SetFont('Arial', '', 7);

while ($i <= $nu_mes) {

	$diasemana = array('Domingo', 'Segunda', 'Terça', 'Quarta', 'Quinta', 'Sexta', 'Sabado');

 	// Aqui podemos usar a data atual ou qualquer outra data no formato Ano-mês-dia (2014-02-28)
 	$data = date('Y-m-'.$i);

 	// Varivel que recebe o dia da semana (0 = Domingo, 1 = Segunda ...)
 	$diasemana_numero = date('w', strtotime($data));
 	// $diasemana_numero == 0 ? $diasemana_numero = "domingo" : $diasemana_numero = $diasemana_numero;
 
 	$mes = date("m");
 
 	if ( ($mes == 1) && ($i == 1) ){
 	$diasemana_numero = "feriado";
 
 	} else if ( ($mes == 4) && ($i == 21) ){
 	$diasemana_numero = "feriado"; 
 
 	} else if ( ($mes == 5) && ($i == 1) ){
 	$diasemana_numero = "feriado"; 
 
 	} else if ( ($mes == 6) && ($i == 24) ){
 	$diasemana_numero = "feriado"; 
 
 	} else if ( ($mes == 7) && ($i == 2) ){
 	$diasemana_numero = "feriado"; 
 
 	} else if ( ($mes == 9) && ($i == 7) ){
 	$diasemana_numero = "feriado"; 
 
 	} else if ( ($mes == 10) && ($i == 12) ){
 	$diasemana_numero = "feriado"; 
 
 	} else if ( ($mes == 11) && ($i == 2) ){
 	$diasemana_numero = "feriado"; 
 
 	} else if ( ($mes == 12) && ($i == 8) ){
 	$diasemana_numero = "feriado";  
  
 	} else if ( ($mes == 12) && ($i == 25) ){
 	$diasemana_numero = "feriado";  
      
 	} else if ( $diasemana_numero == 0 ){
 	$diasemana_numero = "domingo";
 
 	} else if ( $diasemana_numero == 6 ){
 	$diasemana_numero = "sabado";
 
 	} else if ( ($mes == 2) && ($i == 25) ){
 	$diasemana_numero = "feriado"; 
 
 	} else {
 	$diasemana_numero = $i;
 }
 
$pdf->Ln($altura);
$pdf->SetX(20);
$pdf->Cell($largura2, $altura, $diasemana_numero, 1, 0, 'C');
$pdf->SetX(41);
$pdf->Cell($largura2, $altura, '', 1, 0, 'C');
$pdf->SetX(62);
$pdf->Cell($largura2, $altura, '', 1, 0, 'C');
$pdf->SetX(83);
$pdf->Cell($largura2, $altura, '', 1, 0, 'C');
$pdf->SetX(104);
$pdf->Cell($largura2, $altura, '', 1, 0, 'C');
$pdf->SetX(125);
$pdf->Cell($largura2, $altura, '', 1, 0, 'C');
$pdf->SetX(146);
$pdf->Cell($largura1, $altura, '', 1, 0, 'C');


$i++;

}

$pdf->SetXY(39, 260);
$texto = "----------------------------------------------------------------";
$pdf->Cell(0,0.5,$texto, 4, 'J');

$pdf->SetXY(49, 263);
$texto = $_SESSION['nm_usuario'];
$pdf->Cell(0,0.5,$texto, 4, 'J');

$pdf->SetXY(140, 260);
$texto = "----------------------------------------------------------------";
$pdf->Cell(0,0.5,$texto, 4, 'J');

$pdf->SetXY(163, 263);
$texto = "CHEFE";
$pdf->Cell(0,0.5,$texto, 4, 'J');

$pdf->Output();
?>