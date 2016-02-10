<?php

	//*****************************************************************************************************
	// ������ �������� �� MySQL � CSV ����
	//
	//*****************************************************************************************************


	require_once dirname(__FILE__) . '/lib/sql.php';


	$csvFile = 'TestCSV.csv';
        $csvData = "name;brand;price;img_big\n";// � ����� ��� \r\n ������ ������ \n


	$link = mysqli_connect($host, $user, $password, $database) or die("������ " . mysqli_error($link));
	
	$query = 'select name, brand, price, img_big from bitrixshop.Tovar LIMIT 1000'; //�� ������ ������ �����

	$result = mysqli_query($link, $query);
	$i=0;
			
	while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
			
		$i = $i + 1;	
		
		$s1 =  html_entity_decode(iconv( "utf-8", "windows-1251", $row['name'] )); //html_entity_decode() ������������ &quot; � ���������� �������

		$csvData = $csvData . "{$s1};{$row['brand']};{$row['price']};{$row['img_big']}\n";// � ����� ��� \r\n ������ ������ \n
				
	}

	//��������� ���������� � �� 
	mysqli_close($link);
		

	echo "Save " . $i ;


	
	file_put_contents( $csvFile, $csvData, FILE_APPEND );


?>
