<?php
include_once "const.php";

function resize($ratio, $folder, $filename, $maxW, $maxH, $prefix) {
          list($originalW, $originalH) = getimagesize($folder . '/' . $filename);
                if($originalW < $originalH) { // vertical orientation
                    $newH = $maxH;
                    $newW = $originalW * $newH / $originalH;
                } else {
                    $newW = $maxW;
                    $newH = $newW * $originalH / $originalW;
                }
            if(empty($ratio)) {
                $newH = $maxH;
                $newW = $maxW;
            }
            //load the original pic into memory
            $originalPic = imagecreatefromjpeg($folder . '/' . $filename);
            //reserving memory for the new picture
            $newPic = imagecreatetruecolor($newW, $newH);
            //copying picture with resize
            imagecopyresized($newPic, $originalPic, 0, 0, 0, 0, $newW, $newH, $originalW, $originalH);
            //saving picture
            imagejpeg($newPic, $folder . '/' . $prefix . $filename, 100);
        }


    function imgUpload($ratio, $folder, $filename, $width, $height) {
        if ($_FILES['pic']['error'] !== 0 && $_FILES['pic']['error'] !== 4) {
            return 'Error during upload!<br>';
        } else
        if ($_FILES['pic']['error'] === 4) {
            return 'Please select a picture!<br>';
        } else // error === 0
        if ($_FILES['pic']['type'] !== 'image/jpeg') {
            return 'Error! Only JPG files allowed!<br>';
        } else
        if ($_FILES['pic']['size'] > MAXFILESIZE) {
            return 'Error! Max size of the picture is ' . (MAXFILESIZE / 1048576) . ' MB!<br>';
        } else
        if (!is_uploaded_file($_FILES['pic']['tmp_name'])) {
            return 'Error during upload!';
        } else
        if (!move_uploaded_file($_FILES['pic']['tmp_name'], $folder . '/' . $filename)) {
            return 'Error during upload!';
        } else
        if ($width === '' || $height === '') {
            return 'Please provide size!';
        } else {
            resize($ratio, $folder, $filename, $width, $height, 'r-');
            unlink($folder . '/' . $filename); // delete original pic
        }
    }

    function idGen($length) {
        $text = '';
        for ($i = 1; $i <= $length; $i++) {
            $text .= CHARACTERS[rand(0, strlen(CHARACTERS)-1)];
        }
        return $text;
    }