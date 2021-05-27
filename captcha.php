<?php
session_start();

function generate_string($input, $strength) {
    $input_length = strlen($input);
    $random_string = '';
    for($i = 0; $i < $strength; $i++) {
        $random_character = $input[mt_rand(0, $input_length - 1)];
        $random_string .= $random_character;
    }

    return $random_string;
}

$permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
$strength = rand(5,8);
$captcha = generate_string($permitted_chars, $strength);

$_SESSION['captcha'] = $captcha;

$image = @imagecreate(100, 40)
or die("Cannot Initialize new GD image stream");

$background_color = imagecolorallocate($image,247, 250, 255);
$text_color = imagecolorallocate($image, 1, 1, 1);

imagestring($image, 10, 10, 10, $captcha, $text_color);
header("Content-Type: image/png");
imagepng($image);
imagedestroy($image);

