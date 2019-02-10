<?php
/* 
Work 100% for no life people  
Unix only
mazterin.com
*/
	function colorz($opt = 'cyan', $text){
		$green  = "\e[1;92m";
		$cyan   = "\e[1;36m";
		$normal = "\e[0m";
		$blue   = "\e[34m";
		$yellow = "\e[93m";
		$red    = "\e[1;91m";
		switch($opt){
			case 'merah':
				return $red.$text.$normal;
				break;
			case 'hijau':
				return $green.$text.$normal;
				break;
			case 'biru':
				return $blue.$text.$normal;
				break;
			case 'cyan':
				return $cyan.$text.$normal;
				break;
			case 'kuning':
				return $yellow.$text.$normal;
				break;
			case 'normal':
				return $normal.$text.$normal;
				break;
			default:
				return $cyan.$text.$normal;
				break;
		}
	}
	function CheckOS(){
        if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') {
            echo exec("not supported for windows user.");
        } else {
            echo exec("clear");
        }
    }
	function curl($url, $header = 0, $httpheader = 0, $cookieStr = 0, $cookieFile = 0, $uagent = 0, $proxy = 0){
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		if($httpheader){
			curl_setopt($ch, CURLOPT_HTTPHEADER, $httpheader);
		}
		if($cookieStr){
			curl_setopt($ch, CURLOPT_COOKIE, $cookie);
		}
		if($cookieFile){
			curl_setopt($ch, CURLOPT_COOKIEFILE, $cookieFile);
			curl_setopt($ch, CURLOPT_COOKIEJAR, $cookieFile);
		}
		if($header){
			curl_setopt($ch, CURLOPT_HEADER, $header);
		}
		if($uagent){
			curl_setopt($ch, CURLOPT_USERAGENT, $uagent);
		}else{
			curl_setopt($ch, CURLOPT_USERAGENT, $uagent);
		}
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
		curl_setopt($ch, CURLOPT_TIMEOUT, 23);
		curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 23);
		$cx = curl_exec($ch);
		if(!$cx){
		    return json_encode(array("result" => curl_error($ch)));
		}else{
		    return $cx;
		}
		curl_close($ch);
	}
CheckOS();
echo colorz("cyan","[#] Your name $ "); $name = trim(fgets(STDIN));
echo colorz("kuning", "[!] Try connect to server"); sleep(1); echo colorz("kuning", "."); sleep(1); echo  colorz("kuning", "."); sleep(1); echo  colorz("kuning", ".\n");
$try = curl("https://rest.zeldin.link/1.0/simi.php?lang=id&text=test");
if(preg_match("/failed/i", $try)){
	die(colorz("merah", "[!] Sorry, Failed to connect to server..\n"));
}
echo colorz("hijau", "[!] Chat started.., please wait.\n");
sleep(1);
echo colorz("cyan", "[ ".$name." ] $ "); $text = urlencode(trim(fgets(STDIN)));
while(!preg_match("/exit/i", $text)){
	$curl = json_decode(curl("https://rest.zeldin.link/1.0/simi.php?lang=id&text=".$text), true);
	if($curl['error'] == true){
		echo colorz("hijau", "[ BOT ] $").colorz("kuning", " Saya tidak mengerti bahasa kamu :(\n");
	}else{
		echo colorz("hijau", "[ BOT ] $ ").colorz("kuning", $curl['result']['reply']."\n");
	}
	echo colorz("cyan", "[ $name ] $ "); $text = urlencode(trim(fgets(STDIN)));
}
echo colorz("red", "[!] Exiting..\n");
sleep(2);
?>
