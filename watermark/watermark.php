<?php
//**************************************************************************
// —крипт промстановки вод€ного знака на картинки "на лету"
//**************************************************************************

header('content-type: image/jpeg'); 

// получаем им€ изображени€ через GET
$image = $_GET['image']; 
//
//$image = 'original.jpg'; 

// создаЄм вод€ной знак
$watermark = imagecreatefrompng('watermark.png');   

// получаем значени€ высоты и ширины вод€ного знака
$watermark_width = imagesx($watermark);
$watermark_height = imagesy($watermark);  

// создаЄм jpg из оригинального изображени€
$image_path = $image;
$image = imagecreatefromjpeg($image_path);
//если что-то пойдЄт не так
if ($image === false) {
    return false;
}
$size = getimagesize($image_path);
// помещаем вод€ной знак на изображение
$dest_x = $size[0] - $watermark_width - 5;
$dest_y = $size[1] - $watermark_height - 5;

imagealphablending($image, true);
imagealphablending($watermark, true);
// создаЄм новое изображение
imagecopy($image, $watermark, $dest_x, $dest_y, 0, 0, $watermark_width, $watermark_height);
imagejpeg($image);

// освобождаем пам€ть
imagedestroy($image);
imagedestroy($watermark);  

?>
