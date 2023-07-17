<?php
include_once "function.php";

$event = filter_input(INPUT_POST, 'event', FILTER_SANITIZE_SPECIAL_CHARS);
$width = filter_input(INPUT_POST, 'width', FILTER_SANITIZE_NUMBER_INT);
$height = filter_input(INPUT_POST, 'height', FILTER_SANITIZE_NUMBER_INT);
$ratio = filter_input(INPUT_POST, 'ratio', FILTER_SANITIZE_SPECIAL_CHARS);
$message  = '';

if ($event === 'imageupload') {
    $imagename = idGen(5);
    $message .= imgUpload($ratio, 'img', $imagename . '.jpg', $width, $height);
    $message = 'Upload succsessful, please click on download!';
    $_SESSION['imagename'] = $imagename;
}