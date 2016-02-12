<?php

function get($url,$proxy) { 


$header  = array
(
'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8',
'Accept-Language: en-US,en;q=0.5'
);



        $ch = curl_init();   
        curl_setopt($ch, CURLOPT_URL,$url); 
	curl_setopt($ch, CURLOPT_HTTPHEADER, $header); 
        curl_setopt($ch, CURLOPT_RETURNTRANSFER,1); 
        curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 6.1; rv:43.0) Gecko/20100101 Firefox/43.0'); 
	curl_setopt($ch, CURLOPT_PROXYTYPE, CURLPROXY_SOCKS5);
        curl_setopt($ch, CURLOPT_PROXY, "$proxy"); 
        $ss=curl_exec($ch); 
        curl_close($ch); 
        return $ss; 
} 

      $prox = 'localhost:9050';
      $a=get('http://yandex.ru/internet',$prox); 
      echo $a;

?>
