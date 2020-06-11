<?php
@session_start();

$titulo = @$_SESSION['titulo'];
$titulo == "" ? $titulo = "Centro Educacional Batista Filadélfia" : $titulo = $titulo;
$icon = @$_SESSION['icon'];
$icon == "" ? $icon = "img/mansion.png" : $icon = $icon;
// strtoupper();

if (isset($_SESSION['login_centro'])){
$login_centro = $_SESSION['login_centro'];
}
if (isset($_SESSION['acesso'])){
$acesso = $_SESSION['acesso'];
}
if (isset($_SESSION['id_status'])){
$id_status = $_SESSION['id_status'];
}
if (isset($_SESSION['msg'])){
$msg = $_SESSION['msg'];
}

?>
<html>
<head>
<title><?php echo $titulo;?></title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<script language="JavaScript">
function imprimir(detUrl){
document.location = detUrl;
}
</script>
</head>
<link rel="stylesheet" href="css/textos.css" type="text/css">
<link rel="stylesheet" href="css/estilo.css" type="text/css">
<link rel="stylesheet" href="css/filadelfia.css" type="text/css">
<link rel="SHORTCUT ICON" href="<?php echo $icon;?>"/>
<body bgcolor="#F5F5F5" onLoad="javascript:caixas()">
<form name="form1" action="usuario_controller.php" method="post">

<?php if ( @$acesso == 1 ){?>

<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr bgcolor="#FFFFFF"> 
    <td colspan="5"><font color="#000099" size="2" face="Arial, Helvetica, sans-serif">&nbsp;</font></td>
  </tr>
 <tr bgcolor="#333333">  
      <td colspan="5"><div align="center"><font color="#000099" size="2" face="Arial, Helvetica, sans-serif">&nbsp;<font color="#FFFFFF">CENTRO 
          EDUCACIONAL BATISTA FILAD&Eacute;LFIA</font></font></div></td>
  </tr>
   <tr bgcolor="#ffffff"> 
    <td colspan="5"><div align="center"><font color="#000099" size="2" face="Arial, Helvetica, sans-serif">&nbsp;<font color="#FFFFFF">ADMINISTRA&Ccedil;&Atilde;O</font></font></div></td>
  </tr>
  <script type="text/javascript" src="js/menu.js"></script>
  <tr> 
    <td width="18%" bordercolor="#FFFFFF" bgcolor="#FFFFFF" class="labelCentro"><font color="#FF0000" size="2" face="Courier New, Courier, mono">&nbsp; 
      </font></td>
      <td><ul class="udm" id="udm" name="udm"> <li><a href="#">Cadastros</a> 
          <ul>
            <?php if ( ($login_centro != 'admin')){?>
           	<li><a href="aluno_controller.php?abrirAlunoTermo=abrirAlunoTermo">Aluno</a> </li>
			<li><a href="funcionario_controller.php?abrirFuncionarioCpf=abrirFuncionarioCpf">Funcion&aacute;rio</a> </li>
			  <?php } else {?>
            <li><a href="#">Aluno</a> </li>
			<li><a href="#">Funcion&aacute;rio</a> </li>
           
			  <?php }?>
          </ul>
        <li><a href="#">Consultas</a> 
	     <ul>
          <li><a href="#">Alunos</a> 
            <ul>
              <li><a href="aluno_controller.php?abrirAlunoLista=abrirAlunoLista">Todos</a></li>
              <li><a href="pesquisa_controller.php?abrirPesquisaObjeto=abrirPesquisaObjeto&opcao=aluno">Nome</a></li>
              <ul>
              </ul>
            </ul>
          </li>
          <li><a href="painel_controller.php?abrirPainel=abrirPainel">Painel</a></li>
          <li><a href="#">Funcion&aacute;rios</a> 
            <ul>
              <li><a href="funcionario_controller.php?abrirFuncionarioLista=abrirFuncionarioLista">Todos</a></li>
              <li><a href="pesquisa_controller.php?abrirPesquisaObjeto=abrirPesquisaObjeto&opcao=funcionario">Nome</a></li>
            </ul>
          </li>
          <li><a href="#">Matr&iacute;culas</a> 
            <ul>
              <li><a href="matricula_controller.php?abrirMatriculaLista=abrirMatriculaLista">Todas</a></li>
              <li><a href="pesquisa_controller.php?abrirPesquisaObjeto=abrirPesquisaObjeto&opcao=aluno_matr">Nome</a></li>
              <li><a href="pesquisa_controller.php?abrirPesquisaData=abrirPesquisaData&opcao=matr">Data</a></li>
			  <li><a href="matricula_controller.php?abrirMatriculaListaDif=abrirMatriculaListaDif">CPF's</a></li>
			  </ul>
          </li>
		   <li><a href="#">Financeiro</a> 
            <ul>
              <li><a href="financeiro_controller.php?abrirFinanceiroLista=abrirFinanceiroLista">Todas</a></li>
               </ul>
          </li>
          <li><a href="#">Respons&aacute;veis</a> 
            <ul>
              <li><a href="responsavel_controller.php?abrirResponsavelLista=abrirResponsavelLista">Todos</a></li>
              <li><a href="pesquisa_controller.php?abrirPesquisaObjeto=abrirPesquisaObjeto&opcao=responsavel">Nome</a></li>
              <li><a href="pesquisa_controller.php?abrirPesquisaData=abrirPesquisaData&opcao=matr">Data</a></li>
            </ul>
          </li>
        </ul>
      		
		 <li><a href="#">Manuten&ccedil;&atilde;o</a> 
          <ul> 
				
			<li><a href="usuario_controller.php?abrirUsuarioLista=abrirUsuarioLista">Usu&aacute;rios</a></li>
				<li><a href="usuario_controller.php?abrirSenhaLista=abrirSenhaLista">Senhas</a></li>
				<li><a href="#">Backup</a>
				   <ul>
				   		<li><a href="usuario_controller.php?copiarDados=copiarDados">Executar</a></li>
		 				<li><a href="usuario_controller.php?abrirBackup=abrirBackup">Exibir</a></li>
				   	</ul>				
					</li>	
					
				<li><a href="#">Dados</a>
				   <ul>
				   		
                  <li><a href="#">Analg&eacute;sico</a> 
                    <ul>
					 	<li><a href="aluno_controller.php?abrirAnalgesico=abrirAnalgesico">Inserir/Listar</a></li>
					 </ul>
				    </li>				         
		 				
				   	</ul>				
					</li>		
								
				</ul>
		
			 <li><a href="#">Ajuda</a>
		 <ul> 
			
			<li><a href="usuario_controller.php?abrirInformacoes=abrirInformacoes">Informa&ccedil;&otilde;es</a></li>
			<li><a href="#">Contrato</a>
				<ul>
					<li><a href="usuario_controller.php?imprimirContratoOnline=imprimirContratoOnline">onLine</a></li>
					<li><a href="usuario_controller.php?imprimirContrato=imprimirContrato">Padrao</a></li>
				</ul>
			</li>
			<li><a href="#" title="28/11/2018 as 09:46">Release 1.0</a></li>
				
			  <?php if ( ($_SESSION['login_centro'] == 'jairo.vitorino@gmail.com') || ($_SESSION['login_centro'] == 'millyssousa20@gmail.com') ){?>	
			<li><a href="usuario_controller.php?abrirBoasVindas=abrirBoasVindas">Boas Vindas</a></li>
			
			 	
		<?php }?>	
		  <?php if ( ($_SESSION['login_centro'] == 'jairo.vitorino@gmail.com') ){?>	
					<li><a href="usuario_controller.php?abrirLogLista=abrirLogLista">Log</a></li>			    			 
		   </ul>		  			
		<?php }?>		
			</ul>
	  
	  </td>
      <td width="31%" bordercolor="#FFFFFF" bgcolor="#FFFFFF" class="labelCentro"> 
        Usu&aacute;rio <?php echo $_SESSION['nm_status']?>:&nbsp;<font color="#ff0000"><?php echo @$login_centro;?>:</font>&nbsp;&nbsp;(<a href="usuario_controller.php?logout=logout">Sair</a>)</td>
      <td width="13%" bordercolor="#FFFFFF" bgcolor="#FFFFFF" class="labelCentro">&nbsp;</td>
    
  </tr>
</table>
<?php } else {?>
  <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
   <tr bgcolor="#FFFFFF"> 
    <td colspan="5"><font color="#000099" size="2" face="Arial, Helvetica, sans-serif">&nbsp;</font></td>
  </tr>
   <tr bgcolor="#333333"> 
    <td colspan="5"><div align="center"><font color="#000099" size="2" face="Arial, Helvetica, sans-serif"><font color="#FFFFFF">CENTRO 
          </font><font color="#000099" size="2" face="Arial, Helvetica, sans-serif"><font color="#FFFFFF">EDUCACIONAL</font></font><font color="#FFFFFF"> 
          BATISTA FILAD&Eacute;LFIA</font></font></div></td>
  </tr>
     <tr bgcolor="#ffffff"> 
    <td colspan="5"><div align="center"><font color="#000099" size="2" face="Arial, Helvetica, sans-serif">&nbsp;&nbsp;&nbsp;<font color="#FFFFFF">ADMINISTRA&Ccedil;&Atilde;O</font></font></div></td>
  </tr>
    <tr> 
      <td width="18%" bordercolor="#FFFFFF" bgcolor="#FFFFFF" class="labelCentro">&nbsp;</td>
      <td width="38%" bordercolor="#FFFFFF" background="../calendario.php" bgcolor="#FFFFFF" class="labelCentro">&nbsp;</td>
      <td width="32%" bordercolor="#FFFFFF" bgcolor="#FFFFFF" class="labelCentro"> 
        E-mail 
        <input name="login" type="text" size="25" maxlength="50">
        Senha
        <input name="senha" type="password" size="8" maxlength="50">
        <input type="submit" value="Ok">
       
        &nbsp;<font color="#ff0000"><?php echo @$msg;?></font>
		
        <input type="hidden" name="logar"></td>
      <td width="12%" bordercolor="#FFFFFF" bgcolor="#FFFFFF" class="labelCentro"><a href="usuario_controller.php?novoUsuario=novoUsuario">Criar Conta</a></td>
    </tr>
  </table>
<?php }?>
</form>
</body>

</html>
