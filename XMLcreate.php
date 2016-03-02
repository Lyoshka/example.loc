<?php

//Создает XML-строку и XML-документ при помощи DOM 
$dom = new DomDocument('1.0','UTF-8'); 

//добавление корня - <document> 
$document = $dom->appendChild($dom->createElement('document')); 
$document->setAttribute('creation-time',date("Y-m-d H:i:s")." GMT+3");

$company = $document->appendChild($dom->createElement('company')); 

$name = $company->appendChild($dom->createElement('name')); 

$name->appendChild($dom->createTextNode('Сеть аптек N')); 

$address = $company->appendChild($dom->createElement('address')); 

$location = $address->appendChild($dom->createElement('locations')); 
$location->appendChild($dom->createTextNode('Москва, улица Строителей, д.1, кор 1, стр. 1')); 


$pharmacies = $company->appendChild($dom->createElement('pharmacies')); 
$pharmacy   = $pharmacies->appendChild($dom->createElement('pharmacy')); 

$products   = $pharmacy->appendChild($dom->createElement('products')); 



//генерация xml 
$dom->formatOutput = true; // установка атрибута formatOutput
                           // domDocument в значение true 


// save XML as string or file 
$test1 = $dom->saveXML(); // передача строки в test1 
$dom->save('test.xml'); // сохранение файла 


?>

