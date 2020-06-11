<?php
session_start();
require_once("class/persistence.php");
$persistence = new Persistence();

if ( isset($_GET['cancelarOperacao']) ) {		
	
		unset($_SESSION['msg_sucesso']);
		unset($_SESSION['msg_excessao']);
		unset($_SESSION['id_boleto']);
		unset($_SESSION['st_controle']);
		unset($_SESSION['nm_cedente']);
		unset($_SESSION['id_banco']);
		unset($_SESSION['id_usuario']);
		unset($_SESSION['nm_usuario']);
		unset($_SESSION['nm_banco']);
		unset($_SESSION['nu_agencia']);
		unset($_SESSION['nu_conta']);
		unset($_SESSION['nu_nosso']);
		unset($_SESSION['dt_vencto']);
		unset($_SESSION['vl_docto']);
		unset($_SESSION['nm_sacado']);
		unset($_SESSION['in_responsavel']);
		unset($_SESSION['nu_ano']);
	  unset($_SESSION['id_responsavel']);
	   unset($_SESSION['nm_responsavel']);
	    unset($_SESSION['id_parentesco']);
		 unset($_SESSION['nm_parentesco']);
		 unset($_SESSION['id_analgesico']);
		  unset($_SESSION['nm_analgesico']);
		unset($_SESSION['numero_termo']);
		unset($_SESSION['nu_termo']);
		unset($_SESSION['nm_objeto']);
		unset($_SESSION['id_funcionario']);
		unset($_SESSION['nm_funcionario']);
		unset($_SESSION['nm_natural']);
		unset($_SESSION['id_cargo']);
		unset($_SESSION['nm_cargo']);
		unset($_SESSION['id_turno']);
		unset($_SESSION['id_serie']);
		unset($_SESSION['nm_serie']);
		unset($_SESSION['vl_matricula']);
		unset($_SESSION['nm_natural']);
		unset($_SESSION['id_matricula']);
		unset($_SESSION['nu_matricula']);
		unset($_SESSION['id_aluno']);
		unset($_SESSION['nm_aluno']);
		unset($_SESSION['id_religiao']);
		unset($_SESSION['dt_nascimento']);
		 unset($_SESSION['dt_cadastro']);
		unset($_SESSION['nu_rg']);
		unset($_SESSION['nm_orgao']);
		unset($_SESSION['nu_carteira']);
		unset($_SESSION['nu_serie']);
		unset($_SESSION['id_graduacao']);
		unset($_SESSION['nm_graduacao']);
		unset($_SESSION['nm_experiencia']);
		unset($_SESSION['id_estado_civil']);
		unset($_SESSION['nm_estado_civil']);
		unset($_SESSION['nm_conjugue']);
		unset($_SESSION['nu_termo']);
		unset($_SESSION['nu_cpf']);
		unset($_SESSION['id_sexo']);
		unset($_SESSION['nm_sexo']);
		unset($_SESSION['nm_religiao']);
		unset($_SESSION['nm_pai']);
		unset($_SESSION['id_profissao_pai']);
		unset($_SESSION['nm_profissao_pai']);
		unset($_SESSION['id_profissao']);
	 	unset($_SESSION['nm_profissao']);
		unset($_SESSION['nu_telefone']);
		unset($_SESSION['dt_admissao']);
		unset($_SESSION['nu_telefone_pai']);
		unset($_SESSION['nu_telefone_pai']);
		unset($_SESSION['nm_trabalho_pai']);		
		unset($_SESSION['nm_mae']);
		unset($_SESSION['te_profissao_mae']);
		unset($_SESSION['te_profissao_pai']);
		unset($_SESSION['nu_telefone_mae']);
		unset($_SESSION['nm_trabalho_mae']);
		unset($_SESSION['dt_inicio']);
		unset($_SESSION['dt_fim']);
		
		unset($_SESSION['nm_emergencia']);
		unset($_SESSION['in_emergencia']);
		 unset($_SESSION['in_antigo']);
		unset($_SESSION['in_aas']);
		unset($_SESSION['in_novalgina']);
		unset($_SESSION['in_anador']);
		unset($_SESSION['in_melhoral']);
		unset($_SESSION['in_tylenol']);
		unset($_SESSION['in_doril']);
		unset($_SESSION['in_alergia']);
		unset($_SESSION['nm_alergia']);
		
		unset($_SESSION['in_restricao']);
		unset($_SESSION['nm_restricao']);
		unset($_SESSION['in_doenca']);
		unset($_SESSION['nm_doenca']);
		unset($_SESSION['in_plano']);
		unset($_SESSION['nm_plano']);
		unset($_SESSION['nm_acidente']);
				
		
		unset($_SESSION['nm_logra']);
		unset($_SESSION['nu_logra']);				
		unset($_SESSION['te_email']);
		unset($_SESSION['nm_compl']);
		unset($_SESSION['nm_bairro']);
		unset($_SESSION['nu_cep']);
		unset($_SESSION['nm_cidade']);
		unset($_SESSION['nm_uf']);
		unset($_SESSION['opcao']);
		unset($_SESSION['nm_logra']);
		unset($_SESSION['nu_logra']);
		unset($_SESSION['nm_compl']);
		unset($_SESSION['nu_cep']);
		unset($_SESSION['nm_bairro']);
		unset($_SESSION['nm_cidade']);
		unset($_SESSION['nm_uf']);
		unset($_SESSION['te_obs']);
		
				
		header ("location: index.php");
	}


?>