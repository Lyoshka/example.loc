<?php

	require_once dirname(__FILE__) . '/lib/sql.php';

try {  

	  $DBH = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);  

		//*********************************************
		// Подсчет кол-ва строк в таблице
		
	   $nRows = $DBH->query('select count(*) from Tovar')->fetchColumn(); 
	   print $nRows;
	   
	   //*********************************************


	  //*********************************************
	  // DELETE данных
		/*
	  $DBH->exec('DELETE FROM System WHERE value = 9'); 
	  */
	  //*********************************************
		

	  //*********************************************
	  // INSERT данных
	  /*
	  $data = array('version', '9');  
	  
	  $STH = $DBH->prepare("INSERT INTO System (name, value) values (?, ?)");  
	  $STH->execute($data);
	  */
	  //*********************************************
	  
	  
	  //*********************************************
	  // Выборка в класс
	  /*
	  class tovar {  

		public $id;  
		public $name;  
		public $brand;  
		public $price;  
	  
		function __construct($discount = 10) {  //Задаем наценку в конструкторе класса
			$this->price *= $discount;  
		}  
	  }


	  $STH = $DBH->query('SELECT id, name, brand, price from Tovar LIMIT 10');  
	  $STH->setFetchMode(PDO::FETCH_CLASS , 'tovar');  
	  
	  while($obj = $STH->fetch()) {  
		print $obj->id . ". " . $obj->name . " Price: " . $obj->price .  " руб.<br>";  
	  }
	  */
	  //*********************************************


	  //*********************************************
	  // Простая выборка
	  /*
	  
	  $STH = $DBH->query('SELECT name, id_cat from Catalog');  

	  # устанавливаем режим выборки
	  $STH->setFetchMode(PDO::FETCH_ASSOC);  
	  
	  while($row = $STH->fetch()) {  
		print $row['id_cat'] . ". " . $row['name'] . "<br>"; 
		
	  }
	*/	  
	//*********************************************



  
 
}  
catch(PDOException $e) {  
    print $e->getMessage();  
}




# закрывает подключение  
$DBH = null;

?>
