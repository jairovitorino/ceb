<?  
class calendario{     
  var $nome_campo ;
  var $value_campo;	
  var $mes = array( 
                   '01' => 'JANEIRO', 
                   '02' => 'FEVEREIRO', 
                   '03' => 'MAR�O', 
                   '04' => 'ABRIL', 
                   '05' => 'MAIO', 
                   '06' => 'JUNHO', 
                   '07' => 'JULHO', 
                   '08' => 'AGOSTO', 
                   '09' => 'SETEMBRO', 
                   '10' => 'OUTUBRO', 
                   '11' => 'NOVEMBRO', 
                   '12' => 'DEZEMBRO' 
                  ); 				  
  function criar_campo()
  {
  	print ('<input onkeypress="Mascara(this,event,\'##/##/####\');" name="'.$this->nome_campo.'" id="'.$this->nome_campo.'" value="'.$this->value_campo.'" maxlength="10" size="9" style="font-size:11px;font-family:arial;" /><img src="img/ico_calendario.gif" style="cursor:pointer;" onclick="calendario(\''.$this->nome_campo.'\');" border="0" align="absmiddle"  />');	
  }
  function criar_java_campo()
  {
  	print ('<script language="javascript" type="text/javascript" src="js/mascara.js"></script>
			<script language="javascript" type="text/javascript" src="js/operacao.js"></script>');
  
  }
  function mes_anterior($dia,$mes,$ano){ 
    if($mes == 1){ 
       $man = 12; 
       $aan = $ano - 1; 
    } else { 
       $man = $mes - 1; 
       $aan = $ano; 
    } 

    $val = checkdate($man,$dia,$aan); 
    if($val == 0){ 
      $dia = 1; 
    } 
    echo '<a href="calendario.php?campo='.$this->nome_campo.'&data='.sprintf("%02.0f",$dia).'/'.sprintf("%02.0f",$man).'/'.$aan.'">�</a>'; 
  } 

  function mes_proximo($dia,$mes,$ano){ 
    if($mes == 12){ 
       $mpr = 1; 
       $apr = $ano + 1; 
    } else { 
       $mpr = $mes + 1; 
       $apr = $ano; 
    } 

    $val = checkdate($mpr,$dia,$apr); 
    if($val == 0){ 
      $dia = 1; 
    } 
    echo '<a href="calendario.php?campo='.$this->nome_campo.'&data='.sprintf("%02.0f",$dia).'/'.sprintf("%02.0f",$mpr).'/'.$apr.'">�</a>'; 
  } 

  function ano_anterior($dia,$mes,$ano){ 
    $aan = $ano - 1; 
    echo '<a href="calendario.php?campo='.$this->nome_campo.'&data='.sprintf("%02.0f",$dia).'/'.sprintf("%02.0f",$mes).'/'.$aan.'">�</a>'; 
  } 

  function ano_proximo($dia,$mes,$ano){ 
    $apr = $ano + 1; 
    echo '<a href="calendario.php?campo='.$this->nome_campo.'&data='.sprintf("%02.0f",$dia).'/'.sprintf("%02.0f",$mes).'/'.$apr.'">�</a>'; 
  } 
    
  function cria($data){ 
    $arr = explode("/",$data); 
    $dia = $arr[0]; 
    $mes = @$arr[1]; 
    $ano = @$arr[2]; 

    if(($dia == '') OR ($mes = '') OR ($ano = '')){ 
      $data = date("d/m/Y"); 
      $arr = explode("/",$data); 
      $dia = $arr[0]; 
      $mes = $arr[1]; 
      $ano = $arr[2]; 
    } 

    $arr = explode("/",$data); 
    $dia = $arr[0]; 
    $mes = $arr[1]; 
    $ano = $arr[2]; 

    $val = checkdate($mes,$dia,$ano); // Verifica se a data � v�lida 
    if($val == 1){ 
      $ver = date('d/m/Y', mktime(0,0,0,$mes,$dia,$ano)); 
    } else { 
      $ver = date('d/m/Y', mktime(0,0,0,date(m),date(d),date(Y))); 
    } 

    $arr = explode("/",$ver); 
    $dia = $arr[0]; 
    $mes = $arr[1]; 
    $ano = $arr[2]; 

    $ult = date("d", mktime(0,0,0,$mes+1,0,$ano)); 
    $dse = date("w", mktime(0,0,0,$mes,1,$ano)); 

    $tot = $ult+$dse; 
    if($tot != 0){ 
      $tot = $tot+7-($tot%7); 
    } 

    for($i=0;$i<$tot;$i++){ 
      $dat = $i-$dse+1; 
      if(($i >= $dse) AND ($i < ($dse+$ult))){ 
        $aux[$i]  = ' 
          <td '; 

        if(($dat == date(@d)) AND ($mes == date(@m)) AND ($ano == date(@Y))){ 
          $aux[$i] .= 'class="calendario_dias_hoje"'; 
        } else { 
          $aux[$i] .= 'class="calendario_dias"'; 
        } 

        if(($dat == date(@d)) AND ($mes == date(@m)) AND ($ano == date(@Y))){ 
          $aux[$i] .= 'class="calendario_links_hoje"'; 
        } else { 
          $aux[$i] .= 'class="calendario_links"'; 
        }           
		$datafinal = "";
		$datafinal = "'".sprintf("%02.0f",$dat)."/".$mes."/".$ano."'";
		$aux[$i] .= '><a href="javascript:copiar_data('.$datafinal.');">'.$dat.'</a></td> 
        '; 
      } else { 
        $aux[$i] = ' 
          <td> 
          </td> 
        '; 
    } 

    if(($i%7) == 0){ 
      $aux[$i] = '<tr align="center">'.$aux[$i]; 
    } 

    if(($i%7) == 6){ 
      $aux[$i] .= '</tr>'; 
    } 
  } 

  echo ' 
  <table cellspacing="0" cellpadding="0" class="calendario_tabela"> 
    <tr> 
      <td> 
        <table cellspacing="1" cellpadding="1"> 
          <tr class="calendario_mes_ano"> 
            <td> 
  '; 
  $this->mes_anterior($dia,$mes,$ano); 
  echo ' 
            </td> 
            <td colspan="5">'.$this->mes[$mes].'</td> 
            <td> 
  '; 
  $this->mes_proximo($dia,$mes,$ano); 
  echo ' 
</td> 
          </tr> 

          <tr class="calendario_mes_ano"> 
            <td> 
  '; 
  $this->ano_anterior($dia,$mes,$ano); 
  echo ' 
            </td> 
            <td colspan="5">'.$ano.'</td> 
            <td> 
  '; 
  $this->ano_proximo($dia,$mes,$ano); 
  echo ' 
            </td> 
          </tr> 

          <tr class="calendario_semana"> 
            <td WIDTH="30">D</td> 
            <td WIDTH="30">S</td> 
            <td WIDTH="30">T</td> 
            <td WIDTH="30">Q</td> 
            <td WIDTH="30">Q</td> 
            <td WIDTH="30">S</td> 
            <td WIDTH="30">S</td> 
          </tr> 
  '; 
  echo implode(' ',$aux); 
  if(count($aux) == 35){ 
    echo ' 
          <tr> 
            <td colspan="7">&nbsp;</td> 
          </tr> 
    '; 
  }; 
  echo ' 
          <tr> 
            <td class="calendario_mes_ano" colspan="7" align="center">[ <a href="calendario.php?campo='.$this->nome_campo.'&data='.date(@d).'/'.date(@m).'/'.date(@Y).'">Hoje</a> ]</td> 
          </tr>
          <tr> 
            <td class="calendario_mes_ano" colspan="7" align="center" height="15">
			 <a href="javascript:;" onClick="window.close();">Sair</a>
			</td> 
          </tr> 
        </table> 
      </td> 
    </tr> 
  </table> 
  '; 
  print ('
  		<script language="javascript" type="text/javascript">
			function copiar_data(_data)
			{
				window.opener.document.getElementById("'.$this->nome_campo.'").value=_data;
				window.close();
			}
		</script>
  ');  
   }  
}  
?>
