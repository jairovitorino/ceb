<?php
session_start();

require_once("class/persistence.php");
$persistence = new Persistence();

//CONECTA AO MYSQL              
require_once("class/conexao.php");
$mysql = new Mysql();
$mysql->conectar(); 


define("FPDF_FONTPATH","fpdf/font/");
require_once("fpdf/fpdf.php");
$pdf = new FPDF('P'); 
$pdf->Open(); 

$pdf->AddPage(); 

$pdf->Image('img/logo.png',93,10,30,30);

$pdf->SetFont('Arial', 'B', 8);
$pdf->SetXY(66, 27);
$texto = "CENTRO COMUNITÁRIO DA IGREJA BATISTA FILADÉLFIA";
$pdf->Cell(0,0.5,$texto, 4, 'J');

$pdf->SetFont('Arial', 'B', 6);
$pdf->SetXY(70, 30);
$texto = "Rua Saldanha Marinho, 109, Caixa D'agua, CEP 40.323-010 Salvador-Ba";
$pdf->Cell(0,0.5,$texto, 4, 'J');

$pdf->SetXY(77, 36);
$texto = "Aut. NRE 26-821/16 - Port. n.52617-3/2015 D.O. 29/03/2016";
$pdf->Cell(0,0.5,$texto, 4, 'J');

$pdf->SetXY(90, 33);
$texto = "Educação Infantil e Fundamental I";
$pdf->Cell(0,0.5,$texto, 4, 'J');

$pdf->SetFont('Arial', 'B', 8);
$pdf->SetXY(76, 41);
$texto = "CONTRATO DE PRESTAÇÃO DE SERVIÇOS";
$pdf->Cell(0,0.5,$texto, 4, 'J');


// Retangulo geral
$pdf->Rect(23, 46, 182, 240 , "D");

$id_matricula = $_SESSION['id_matricula'];

$id_aluno = 367;

$sql = mysql_query("SELECT * FROM matriculas, responsaveis
WHERE responsaveis.id_matricula = matriculas.id_matricula
AND matriculas.id_matricula = ".$id_matricula."");

$row = mysql_num_rows($sql);
	for($i=0; $i<$row; $i++) {
	$nm_responsavel = mysql_result($sql, $i, "nm_responsavel");
	$nu_telefone = mysql_result($sql, $i, "nu_telefone");
	$te_profissao = mysql_result($sql, $i, "te_profissao");
	$te_email = mysql_result($sql, $i, "te_email");
	$nu_cpf = mysql_result($sql, $i, "nu_cpf");
	$nu_rg = mysql_result($sql, $i, "nu_rg");
	$nm_logra = mysql_result($sql, $i, "nm_logra");
	$nu_logra = mysql_result($sql, $i, "nu_logra");
	$nm_bairro = mysql_result($sql, $i, "nm_bairro");
	$nu_cep = mysql_result($sql, $i, "nu_cep");
	$nm_compl = mysql_result($sql, $i, "nm_compl");
	$nm_cidade = mysql_result($sql, $i, "nm_cidade");
	$nm_uf = mysql_result($sql, $i, "nm_uf");	
	$vl_matricula = mysql_result($sql, $i, "vl_matricula");
	$vl_parcela = $vl_matricula / 12;
	$te_obs = mysql_result($sql, $i, "te_obs");
	$in_imagem = mysql_result($sql, $i, "in_imagem");
	
}

$vl_parcela = number_format($vl_parcela, 2, ",", ".");
$pdf->SetFont('Arial', 'B', 8);

$pdf->SetXY(25, 50);
$texto = "Pelo presente instrumento, firmo contrato com caráter bilateral, por um lado a CENTRO EDUCACIONAL BATISTA FILADÉLFIA, CNPJ 14.696.086/0001-43, situada à rua Saldanha da Marinho, 109, Caixa D'agua, Salvador - Ba. CEP 40.323-010, tel; 3244-0324. Neste ato representado por sua diretoria.";
$pdf->MultiCell(0,5,$texto, 4, 'J');

$pdf->SetXY(25, 71);
$texto = "Por outro lado ".$nm_responsavel.", residente à ".$nm_logra.", ".$nu_logra.". Bairro ".$nm_bairro.", CEP ".$nu_cep.". Cidade ".$nm_cidade.". UF ".$nm_uf.". Profissão ".$te_profissao.". CPF ".$nu_cpf.". RG ".$nu_rg.". Telefone p/ contato ".$nu_telefone.". E-mail ".$te_email;
$pdf->MultiCell(0,5,$texto, 4, 'J');

$pdf->SetXY(25, 85);
$texto = "CLAUSULAS DA ESCOLA";
$pdf->MultiCell(0,5,$texto, 4, 'J');

$pdf->SetXY(25, 92);
$texto = "I - Prestar serviços na área de Educação Indfantil e Ensino Fundamental, abrangendo do grupo II até o 5. ano, cuidando da integridade física, formação intelectual e princípios morais do aluno.";
$pdf->MultiCell(0,5,$texto, 4, 'J');

$pdf->SetXY(25, 104);
$texto = "II - Oferecer profissionais capacitados e competentes para o desempenho de suas funções.";
$pdf->MultiCell(0,5,$texto, 4, 'J');

$pdf->SetXY(25, 111);
$texto = "III - Responsabilizar-se pelo aluno desde a sua chegada a Escola até a devolução a pessoa responsável.";
$pdf->MultiCell(0,5,$texto, 4, 'J');

$pdf->SetXY(25, 120);
$texto = "CLAUSULAS DO RESPONSÁVEL";
$pdf->MultiCell(0,5,$texto, 4, 'J');

$pdf->SetXY(25, 128);
$texto = "I - Honrar o pagamento da anuidade dentro do prazo previsto, que é até o dia 05 (cinco) de cada mês, 12 (doze) parcelas que vão de janeiro a dezembro .";
$pdf->MultiCell(0,5,$texto, 4, 'J');

$pdf->SetXY(25, 141);
$texto = "II - O não pagamento em dia, incidirá numa multa de 2% (dois por cento) ao mês mais a correção por cada dia de atraso no valor de 0.033%..";
$pdf->MultiCell(0,5,$texto, 4, 'J');

$pdf->SetXY(25, 153);
$texto = "III - Após 30 (trinta) dias de atraso, o aluno que pertencer ao período integral perderá o direito de frequentá-la, caso nã haja manifestação do responsável e concordância da escola.";
$pdf->MultiCell(0,5,$texto, 4, 'J');

$pdf->SetXY(25, 166);
$texto = "IV - O horário de início das aulas é 07:10 (matutino) e 13:00 (vespertino). O responsável deverá buscar a criança 11:10 (matutino) e 17:00 (vespertino), sendo que as sextas-feiras por conta da reunião pedagógiaca o horário passa a ser 10:30 (matutino) e 16:00 (vespertino).";
$pdf->MultiCell(0,5,$texto, 4, 'J');

$pdf->SetXY(25, 183);
$texto = "V - Caso haja desistência de matrícula será cobrada uma taxa de 30% do valor da matrícula.";
$pdf->MultiCell(0,5,$texto, 4, 'J');

function extenso($valor = 0, $maiusculas = false) {

$singular = array("centavo", "real", "mil", "milhão", "bilhão", "trilhão", "quatrilhão");
$plural = array("centavos", "reais", "mil", "milhões", "bilhões", "trilhões",
"quatrilhões");

$c = array("", "cem", "duzentos", "trezentos", "quatrocentos",
"quinhentos", "seiscentos", "setecentos", "oitocentos", "novecentos");
$d = array("", "dez", "vinte", "trinta", "quarenta", "cinquenta",
"sessenta", "setenta", "oitenta", "noventa");
$d10 = array("dez", "onze", "doze", "treze", "quatorze", "quinze",
"dezesseis", "dezesete", "dezoito", "dezenove");
$u = array("", "um", "dois", "três", "quatro", "cinco", "seis",
"sete", "oito", "nove");

$z = 0;
$rt = "";

$valor = number_format($valor, 2, ".", ".");
$inteiro = explode(".", $valor);
for($i=0;$i<count($inteiro);$i++)
for($ii=strlen($inteiro[$i]);$ii<3;$ii++)
$inteiro[$i] = "0".$inteiro[$i];

$fim = count($inteiro) - ($inteiro[count($inteiro)-1] > 0 ? 1 : 2);
for ($i=0;$i<count($inteiro);$i++) {
$valor = $inteiro[$i];
$rc = (($valor > 100) && ($valor < 200)) ? "cento" : $c[$valor[0]];
$rd = ($valor[1] < 2) ? "" : $d[$valor[1]];
$ru = ($valor > 0) ? (($valor[1] == 1) ? $d10[$valor[2]] : $u[$valor[2]]) : "";

$r = $rc.(($rc && ($rd || $ru)) ? " e " : "").$rd.(($rd &&
$ru) ? " e " : "").$ru;
$t = count($inteiro)-1-$i;
$r .= $r ? " ".($valor > 1 ? $plural[$t] : $singular[$t]) : "";
if ($valor == "000")$z++; elseif ($z > 0) $z--;
if (($t==1) && ($z>0) && ($inteiro[0] > 0)) $r .= (($z>1) ? " de " : "").$plural[$t];
if ($r) $rt = $rt . ((($i > 0) && ($i <= $fim) &&
($inteiro[0] > 0) && ($z < 1)) ? ( ($i < $fim) ? ", " : " e ") : " ") . $r;
}

if(!$maiusculas){
return($rt ? $rt : "zero");
} else {

if ($rt) $rt=ereg_replace(" E "," e ",ucwords($rt));
return (($rt) ? ($rt) : "Zero");
}
}


$pdf->SetXY(25, 190);
$texto = "VI - Fica estipulado o valor da anuidade em R$ ".$vl_matricula." (".extenso($vl_matricula).") o que corresponderá a R$ ".$vl_parcela." por mês.";
$pdf->MultiCell(0,5,$texto, 4, 'J');

$pdf->SetXY(25, 201);
$texto = "VII - Fica estipulado a Comarca de Salvador como Foro para dirimir quaisquer conflitos entre as partes.";
$pdf->MultiCell(0,5,$texto, 4, 'J');

if ( $in_imagem == 0 ){
$pdf->SetXY(25, 208);
$texto = "VIII - Não fica autorizado a publicação de fotos e vídeos de meu/minha filho/filha nas redes sociais, panfletos e faixas. ";
$pdf->MultiCell(0,5,$texto, 4, 'J');
} else {
$pdf->SetXY(25, 208);
$texto = "VIII - Fica autorizado a publicação de fotos e vídeos de meu/minha filho/filha nas redes sociais, panfletos e faixas. ";
$pdf->MultiCell(0,5,$texto, 4, 'J');
}

$pdf->SetXY(25, 218);
$texto = "Declaro estar de acordo com as normas acima e ciente que a Direção deste estabelecimento poderá expedir a transferência do aluno(a) caso este(a) não cumpra as normas disciplinares e em caso de incompatibilidade  com qualquer membro do Corpo administrativo da Escola. Ciente da minha responsabilidade solicito a matrícula objeto deste requerimento.";
$pdf->MultiCell(0,5,$texto, 4, 'J');

$pdf->SetXY(25, 238);
$texto = "Salvador, ".@date("d/m/Y").".";
$pdf->MultiCell(0,5,$texto, 4, 'J');

$pdf->SetXY(88, 248);
$texto = "_______________________________________";
$pdf->MultiCell(0,5,$texto, 4, 'J');

$pdf->SetXY(105, 252);
$texto = "Pelo aluno(a)";
$pdf->MultiCell(0,5,$texto, 4, 'J');

$pdf->SetXY(88, 262);
$texto = "_______________________________________";
$pdf->MultiCell(0,5,$texto, 4, 'J');

$pdf->SetXY(105, 267);
$texto = "Pelo responsável";
$pdf->MultiCell(0,5,$texto, 4, 'J');



$pdf->Output();
?>