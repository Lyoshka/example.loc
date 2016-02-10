<?php

	//*****************************************************************************************************
	// Пример экспорта из MySQL в CSV файл
	//
	//*****************************************************************************************************


	require_once dirname(__FILE__) . '/lib/sql.php';


	$csvFile = 'TestCSV.csv';
        $csvData = "name;brand;price;img_big\n";// в винде это \r\n вместо просто \n


	$link = mysqli_connect($host, $user, $password, $database) or die("Ошибка " . mysqli_error($link));
	
	$query = 'select name, brand, price, img_big from bitrixshop.Tovar LIMIT 1000'; //Не забыть убрать ЛИМИТ

	$result = mysqli_query($link, $query);
	$i=0;
			
	while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
			
		$i = $i + 1;	
		
		$s1 =  html_entity_decode(iconv( "utf-8", "windows-1251", $row['name'] )); //html_entity_decode() конвертирует &quot; в нормальные кавычки

		$csvData = $csvData . "{$s1};{$row['brand']};{$row['price']};{$row['img_big']}\n";// в винде это \r\n вместо просто \n
				
	}

	//Закрываем соединение с БД 
	mysqli_close($link);
		

	echo "Save " . $i ;


	
	file_put_contents( $csvFile, $csvData, FILE_APPEND );


?>
