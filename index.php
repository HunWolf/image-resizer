<?php
    include_once 'control.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple Image Resizer</title>
    <link href="bootstrap-5.2.1/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <style>
            input::-webkit-outer-spin-button,
            input::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
            }

            /* Firefox */
            input[type=number] {
            -moz-appearance: textfield;
            }
    </style>
        
</head>
<body>
<a href="" class="text-decoration-none text-reset"><h1 class="text-center mb-5 mt-3">Simple Image resizer</h1></a>
            <div class="text-center">
                    <form method="post" enctype="multipart/form-data">
                        <input type="number" name="width" placeholder="Width">
                        <span class="d-block d-xl-inline">x</span>
                        <input type="number" name="height" placeholder="Height">
                        <label class="d-block mx-auto mt-3" for="ratio">Keep ratio</label>
                        <input id="ratio" class="d-block mx-auto" type="checkbox" name="ratio">
                        <input class="d-block mx-auto mt-3 mb-5" type="file" class="image-for-input" name="pic" id="pic" accept="image/jpg, image/jpeg">
                        <input type="hidden" name="event" value="imageupload">
                        <input class="btn btn-danger mx-auto mt-3 me-3" type="submit" name="imageUploadButton" value="Upload">
<?php                   if(isset($_SESSION['imagename'])) { 
?>
                        <a class="btn btn-danger mx-auto mt-3" href="img/r-<?php echo $_SESSION['imagename']?>.jpg" target="_blank">Download</a>
<?php                                               }
?>
                    </form>
                    <span id="message" style="font-size: 15px;" class="text-danger d-block mt-3"><?php echo $message;?></span>
                </div>
            </div>
        </div>
</body>
</html>