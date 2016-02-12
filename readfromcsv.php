<?php
$row = 1;
$separator = ";";


if (($handle = fopen("125.csv", "r")) !== FALSE) {

    while (($data = fgetcsv($handle, 1000, $separator)) !== FALSE) {
        $num = count($data);
        print "<p> $num полей в строке $row: <br /></p>\n";
        $row++;
        for ($c=0; $c < $num; $c++) {
            print $data[$c] . "<br />\n";
        }
    }

    fclose($handle);

}

?>

