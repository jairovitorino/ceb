    <?php
@session_start();
$msg_sucesso = @$_SESSION['msg_sucesso'];
$msg_excessao = @$_SESSION['msg_excessao'] ;
 include "cabecalho/cabecalho.php";
 echo "<link rel='stylesheet' href='css/textos.css' type='text/css'>";
echo "<link rel='stylesheet' href='css/filadelfia.css' type='text/css'>";
echo "<link rel='stylesheet' href='css/estilo.css' type='text/css'>";

echo "<script language='JavaScript'>";
echo "function tpl(detUrl){";
echo "document.location = detUrl;";
echo "}";
echo "if ($msg_sucesso){";
   echo "<div align='left'>
   <img src='img/msg_verde.gif' width='20' height='20'><font color='#003300' size='2' face='Arial, Helvetica, sans-serif'> $msg_sucesso </font></div>";
    echo " } else if ($msg_excessao){";
	   echo "<div align='left'>
   <img src='img/msg_vermelha.gif' width='20' height='20'><font color='#FF0000' size='2' face='Arial, Helvetica, sans-serif'> $msg_excessao </font></div>";
	echo " }";	
echo "function teste(){";
echo "alert('Ok');";
echo "}";
echo "function del(detUrl){";
echo "if (confirm('Deseja excluir?')) {";
echo "document.location = detUrl;";
echo "}";
echo "}";
echo "</script>";

echo "<body bgcolor='#F5F5F5'> ";

 $path = "bd/";
 $diretorio = dir($path);

echo "<table width='67%' border='0'  align='center' >";
echo "<tr>";
echo "<td class='labelEsquerda'>";
echo "";
echo "</td>";
echo "</tr>";
echo "<td>";
echo "";
echo "</td>";
echo "</tr>";

echo "<tr>";
echo "<td class='labelEsquerda'>";
echo "";
echo "</td>";
echo "</tr>";
echo "<td>";
echo "";
echo "</td>";
echo "</tr>";

echo "<tr>";
echo "<td class='labelEsquerda'>";
echo "<strong>Backup</strong>";
echo "</td>";
echo "</tr>";
echo "<td>";
echo "<hr>";
echo "</td>";
echo "</tr>";
echo "<tr>";
echo "<td class='labelEsquerda'>";


    /* Diretorio que deve ser lido */

    $dir = 'bd/';
	
    /* Abre o diretório */

    $pasta= opendir($dir);

    /* Loop para ler os arquivos do diretorio */
	
    while ($arquivo = readdir($pasta)){
	$itens[] = $arquivo;
	}
    /* Verificacao para exibir apenas os arquivos e nao os caminhos para diretorios superiores */
	sort($itens);
	foreach ($itens as $listar) {
    if ($listar != '.' && $listar != '..'){

    /* Escreve o nome do arquivo na tela */
	
    echo "<a href='".$dir.$listar."'>".$listar."</a><a href='usuario_controller.php?excluirArquivo=excluirArquivo&arquivo=".$dir.$listar."')'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Excluir</a><br />";

    }
}
  
echo "</td>";
echo "</tr>";
echo "<tr>";
echo "<td class='labelCentro'><hr></td>";

echo "</tr>";

echo "<tr>";
echo "<td class='labelCentro'><input type='button' name='voltar' value='&lt;&lt; Voltar' onClick='javascript:history.go(-1)'></td>";

echo "</tr>";
echo "</table>";
    ?>