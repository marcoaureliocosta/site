<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class Moeda
{
	/**
	 * Authenticates a user.
	 * The example implementation makes sure if the username and password
	 * are both 'demo'.
	 * In practical applications, this should be changed to authenticate
	 * against some persistent user identity storage (e.g. database).
	 * @return boolean whether authentication succeeds.
	 */

	public static function pontuar($valor){ 
	
		if(is_null($valor)){$valor = 0;}
		
		if($valor < 0){ 
			$neg_array = "$valor"; 
			$neg_tmp_array = explode("-",$neg_array); 
			$valor = $neg_tmp_array[1]; 
			$md = "neg";} 
		$limpa = str_replace(".","", $valor); 
		$limpa2 = str_replace(",","", $limpa); 
		$valor = "$limpa2"; 
		$size = strlen($limpa); 
		if($size == 2){$vt_v = $valor; $valor = "00".$vt_v;} 
		if($size == 1){$vt_v = $valor; $valor = "000".$vt_v;} 
		$size = strlen($valor); 
		if($size > 2){$str_mod = $size - 3; $param = $size -2; $m = 3; $ctrl_str = $str_mod; $mi = 1; 
		$sub_count = 1; $count = 0; 
		while($count <= $str_mod){$n_array = $valor[$ctrl_str]; 
		if($count == 0){$var_temp = $n_array;} 
		else 
		{if($sub_count == 3){ 
		if($ctrl_str == 0){$nvar_temp = $n_array.$var_temp; $var_temp = $nvar_temp; $sub_count = 0;} 
		else 
		{$nvar_temp = ".".$n_array.$var_temp; $var_temp = $nvar_temp; $sub_count = 0;}} 
		else 
		{$nvar_temp = $n_array.$var_temp; $var_temp = $nvar_temp;} 
		} 
		$count++; $sub_count++; $ctrl_str--;} 
		$moeda = "R$ "; 
		$c1 = $valor[$str_mod+1].$valor[$str_mod+2]; 
		$md ='';
		if($md == "neg"){ 
		$valor_final = $moeda."-".$var_temp.",".$c1;} else {// PARA REMOVER O R$ REMOVA A VAR ($moeda) 
		$valor_final = $moeda.$var_temp.",".$c1;}// PARA REMOVER O R$ REMOVA A VAR ($moeda) 
		$var_temp = $valor_final;}
		
		
		 
		return $valor_final;
	} 
	
	public static function valorPorExtenso($valor) {
		$singular = array("", "", "mil", "milhão", "bilhão", "trilhão", "quatrilhão");
		$plural = array("", "", "mil", "milhões", "bilhões", "trilhões","quatrilhões");
	
		$c = array("", "cem", "duzentos", "trezentos", "quatrocentos","quinhentos", "seiscentos", "setecentos", "oitocentos", "novecentos");
		$d = array("", "dez", "vinte", "trinta", "quarenta", "cinquenta","sessenta", "setenta", "oitenta", "noventa");
		$d10 = array("dez", "onze", "doze", "treze", "quatorze", "quinze","dezesseis", "dezesete", "dezoito", "dezenove");
		$u = array("", "um", "dois", "três", "quatro", "cinco", "seis","sete", "oito", "nove");
	
		$z=0;
		$rt='';
		
		$valor = number_format($valor, 2, ".", ".");
		$inteiro = explode(".", $valor);
		for($i=0;$i<count($inteiro);$i++)
			for($ii=strlen($inteiro[$i]);$ii<3;$ii++)
				$inteiro[$i] = "0".$inteiro[$i];
	
		// $fim identifica onde que deve se dar junção de centenas por "e" ou por "," ;)
		$fim = count($inteiro) - ($inteiro[count($inteiro)-1] > 0 ? 1 : 2);
		for ($i=0;$i<count($inteiro);$i++) {
			$valor = $inteiro[$i];
			$rc = (($valor > 100) && ($valor < 200)) ? "cento" : $c[$valor[0]];
			$rd = ($valor[1] < 2) ? "" : $d[$valor[1]];
			$ru = ($valor > 0) ? (($valor[1] == 1) ? $d10[$valor[2]] : $u[$valor[2]]) : "";
		
			$r = $rc.(($rc && ($rd || $ru)) ? " e " : "").$rd.(($rd && $ru) ? " e " : "").$ru;
			$t = count($inteiro)-1-$i;
			$r .= $r ? " ".($valor > 1 ? $plural[$t] : $singular[$t]) : "";
			if ($valor == "000")$z++; elseif ($z > 0) $z--;
			if (($t==1) && ($z>0) && ($inteiro[0] > 0)) $r .= (($z>1) ? " de " : "").$plural[$t]; 
			if ($r) $rt = $rt . ((($i > 0) && ($i <= $fim) && ($inteiro[0] > 0) && ($z < 1)) ? ( ($i < $fim) ? ", " : " e ") : " ") . $r;
		}
		
		//$result = array_merge($singular,);
		
		return($rt ? $rt : "zero");
	}
	
	public static function valorExtensoEmReais($valor) {
		$singular = array("centavo", "real", "mil", "milhão", "bilhão", "trilhão", "quatrilhão");
		$plural = array("centavos", "reais", "mil", "milhões", "bilhões", "trilhões","quatrilhões");
	
		$c = array("", "cem", "duzentos", "trezentos", "quatrocentos","quinhentos", "seiscentos", "setecentos", "oitocentos", "novecentos");
		$d = array("", "dez", "vinte", "trinta", "quarenta", "cinquenta","sessenta", "setenta", "oitenta", "noventa");
		$d10 = array("dez", "onze", "doze", "treze", "quatorze", "quinze","dezesseis", "dezesete", "dezoito", "dezenove");
		$u = array("", "um", "dois", "três", "quatro", "cinco", "seis","sete", "oito", "nove");
	
		$z=0;
		$rt='';
		
		$valor = number_format($valor, 2, ".", ".");
		$inteiro = explode(".", $valor);
		for($i=0;$i<count($inteiro);$i++)
			for($ii=strlen($inteiro[$i]);$ii<3;$ii++)
				$inteiro[$i] = "0".$inteiro[$i];
	
		// $fim identifica onde que deve se dar junção de centenas por "e" ou por "," ;)
		$fim = count($inteiro) - ($inteiro[count($inteiro)-1] > 0 ? 1 : 2);
		for ($i=0;$i<count($inteiro);$i++) {
			$valor = $inteiro[$i];
			$rc = (($valor > 100) && ($valor < 200)) ? "cento" : $c[$valor[0]];
			$rd = ($valor[1] < 2) ? "" : $d[$valor[1]];
			$ru = ($valor > 0) ? (($valor[1] == 1) ? $d10[$valor[2]] : $u[$valor[2]]) : "";
		
			$r = $rc.(($rc && ($rd || $ru)) ? " e " : "").$rd.(($rd && $ru) ? " e " : "").$ru;
			$t = count($inteiro)-1-$i;
			$r .= $r ? " ".($valor > 1 ? $plural[$t] : $singular[$t]) : "";
			if ($valor == "000")$z++; elseif ($z > 0) $z--;
			if (($t==1) && ($z>0) && ($inteiro[0] > 0)) $r .= (($z>1) ? " de " : "").$plural[$t]; 
			if ($r) $rt = $rt . ((($i > 0) && ($i <= $fim) && ($inteiro[0] > 0) && ($z < 1)) ? ( ($i < $fim) ? ", " : " e ") : " ") . $r;
		}
		
		//$result = array_merge($singular,);
		
		return($rt ? $rt : "zero");
	}
	
	function numeroEscrito($n) {
		$numeros[1][0] = '';
		$numeros[1][1] = 'um';
		$numeros[1][2] = 'dois';
		$numeros[1][3] = 'três';
		$numeros[1][4] = 'quatro';
		$numeros[1][5] = 'cinco';
		$numeros[1][6] = 'seis';
		$numeros[1][7] = 'sete';
		$numeros[1][8] = 'oito';
		$numeros[1][9] = 'nove';
		$numeros[2][0] = '';
		$numeros[2][10] = 'dez';
		$numeros[2][11] = 'onze';
		$numeros[2][12] = 'doze';
		$numeros[2][13] = 'treze';
		$numeros[2][14] = 'quatorze';
		$numeros[2][15] = 'quinze';
		$numeros[2][16] = 'dezesseis';
		$numeros[2][17] = 'dezesete';
		$numeros[2][18] = 'dezoito';
		$numeros[2][19] = 'dezenove';
		$numeros[2][2] = 'vinte';
		$numeros[2][3] = 'trinta';
		$numeros[2][4] = 'quarenta';
		$numeros[2][5] = 'cinquenta';
		$numeros[2][6] = 'sessenta';
		$numeros[2][7] = 'setenta';
		$numeros[2][8] = 'oitenta';
		$numeros[2][9] = 'noventa';
		$numeros[3][0] = '';
		$numeros[3][1] = 'cem';
		$numeros[3][2] = 'duzentos';
		$numeros[3][3] = 'trezentos';
		$numeros[3][4] = 'quatrocentos';
		$numeros[3][5] = 'quinhentos';
		$numeros[3][6] = 'seiscentos';
		$numeros[3][7] = 'setecentos';
		$numeros[3][8] = 'oitocentos';
		$numeros[3][9] = 'novecentos';
	 
		$n = number_format($n, 2, '', '');
		$n = substr($n, 0, strlen($n) - 2);
		$qtd = strlen($n);
		$compl[0] = ' mil ';
		$compl[1] = ' millhão ';
		$compl[2] = ' millhões ';
		$numero = "";
		$casa = $qtd;
		$pulaum = false;
		$x = 0;
		for ($y = 0; $y < $qtd; $y++) {
			if ($casa == 5) {
				if ($n[$x] == '1') {
					$indice = '1' . $n[$x + 1];
					$pulaum = true;
				} else {
					$indice = $n[$x];
				}
	 
				if ($n[$x] != '0') {
					if (isset($n[$x - 1])) {
						$numero .= ' e ';
					}
					$numero .= $numeros[2][$indice];
					if ($pulaum) {
						$numero .= ' ' . $compl[0];
					}
				}
			}
	 
			if ($casa == 4) {
				if (!$pulaum) {
					if ($n[$x] != '0') {
						if (isset($n[$x - 1])) {
							$numero .= ' e ';
						}
					}
				}
				$numero .= $numeros[1][$n[$x]] . ' ' . $compl[0];
			}
	 
			if ($casa == 3) {
				if ($n[$x] == '1' && $n[$x + 1] != '0') {
					$numero .= 'cento ';
				} else {
					if ($n[$x] != '0') {
						if (isset($n[$x - 1])) {
							$numero .= ' e ';
						}
						$numero .= $numeros[3][$n[$x]];
					}
				}
			}
	 
			if ($casa == 2) {
				if ($n[$x] == '1') {
					$indice = '1' . $n[$x + 1];
					$casa = 0;
				} else {
					$indice = $n[$x];
				}
	 
				if ($n[$x] != '0') {
					if (isset($n[$x - 1])) {
						$numero .= ' e ';
					}
					$numero .= $numeros[2][$indice];
				}
			}
	 
			if ($casa == 1) {
				if ($n[$x] != '0') {
					$numero .= ' e ' . $numeros[1][$n[$x]];
				} else {
					$numero .= '';
				}
			}
	 
			if ($pulaum) {
				$casa--;
				$x++;
				$pulaum = false;
			}
	 
			$casa--;
			$x++;
		}
		//return ucfirst($numero . ' reais e centavos acima');
		return $numero;
	}
	
	public static function removerRS($valor_parcela){ 
		// Remove o R e o $
				$vowels = array("R", "$",".");
				$x = str_replace($vowels, "", $valor_parcela );
				
				// Remove a ',' e subtitui por ponto
				$vowels2 = array(",");
				return $x2 = str_replace($vowels2, ".", $x );
	}

}