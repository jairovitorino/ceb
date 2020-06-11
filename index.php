<?php
 include "cabecalho/cabecalho.php";
	
?>
<html>
<head>
<title>Administra&ccedil;&atilde;o</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>
<link rel="stylesheet" href="css/filadelfia.css" type="text/css">
<script language="JavaScript">
function caixas(){
	//document.getElementById('dt_ini').focus();
	document.formulario.venda.focus();
}
function executar(delUrl) { 
    document.location = delUrl; 
}

function abrir(){
window.open("agenda_pop_up.php", "Janela", "height=300,width=900,scrollbars=Yes,location=No"); 
}
</script>
<body bgcolor="#F5F5F5" onLoad="javascript:caixas()">
<form id="formulario" name="formulario" method="post" action="">
<p>&nbsp;</p>
<p class="labelCentro"><font color="#FF0000">&nbsp;</font></p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
</form>
<body>
<?php include "rodape/rodape.php";?>
</html>
