<?php

	if ( $nm_objeto ){
	$sql_select_all = "SELECT * FROM alunos, usuarios WHERE alunos.id_usuario = usuarios.id_usuario AND nm_aluno LIKE '%$nm_objeto%' ";
	/*} else if ($st_controle){
	$sql_select_all = "SELECT * FROM alunos, usuarios WHERE alunos.id_usuario = usuarios.id_usuario AND st_controle = ".$st_controle." ";*/
	} else {
	$sql_select_all = "SELECT * FROM alunos, usuarios WHERE alunos.id_usuario = usuarios.id_usuario ";	
	}
	$sql_query_all = mysql_query($sql_select_all);
	$total_registros = mysql_num_rows($sql_query_all);
	$pags = ceil($total_registros/$qnt);
	$max_links = 3;
	echo "<a href='aluno_lista.php?p=1' target='_self'><font size='2' face='Arial, Helvetica, sans-serif'>In�cio</font></a> ";
	for($i = $p-$max_links; $i <= $p-1; $i++) {
	// Se o n�mero da p�gina for menor ou igual a zero, n�o faz nada
	// (afinal, n�o existe p�gina 0, -1, -2..)
	if($i <=0) {
	//faz nada
	// Se estiver tudo OK, cria o link para outra p�gina
	} else {
	echo "<a href='aluno_lista.php?p=".$i."' target='_self'>".$i."</a> ";
	}
	}
	// Exibe a p�gina atual, sem link, apenas o n�mero
	echo $p." ";
	// Cria outro for(), desta vez para exibir 3 links ap�s a p�gina atual
	for($i = $p+1; $i <= $p+$max_links; $i++) {
	// Verifica se a p�gina atual � maior do que a �ltima p�gina. Se for, n�o faz nada.
	if($i > $pags)
	{
	//faz nada
	}
	// Se tiver tudo Ok gera os links.
	else
	{
	echo "<a href='aluno_lista.php?p=".$i."' target='_self'>".$i."</a> ";
	}
	}
	// Exibe o link "�ltima p�gina"
	echo "<a href='aluno_lista.php?p=".$pags."' target='_self'><font size='2' face='Arial, Helvetica, sans-serif'>Fim</font></a> ";
	
	?>