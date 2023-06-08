<?php

function image_handler( $source_image = "", $destination = "", $tn_w = 100, $tn_h = 100, $quality = 80 ) 
{
    // The getimagesize functions provides an "imagetype" string contstant, which can be passed to the image_type_to_mime_type function for the corresponding mime type
    $info    = getimagesize($source_image);
    $imgtype = image_type_to_mime_type($info[2]);
    // Then the mime type can be used to call the correct function to generate an image resource from the provided image
    switch ($imgtype) {
        case "image/jpeg":
            $source = imagecreatefromjpeg($source_image);
            break;
        case "image/gif":
            $source = imagecreatefromgif($source_image);
            break;
        case "image/png":
            $source = @imagecreatefrompng($source_image);
            break;
        default:
            die("Invalid image type.");
    }
    // Now, we can determine the dimensions of the provided image, and calculate the width/height ratio
    $src_w = imagesx($source);
    $src_h = imagesy($source);
    $src_ratio = $src_w / $src_h;
    // Now we can use the power of math to determine whether the image needs to be cropped to fit the new dimensions, and if so then whether it should be cropped vertically or horizontally. We're just going to crop from the center to keep this simple.
    if ($tn_w / $tn_h > $src_ratio) {
        $new_h = $tn_w / $src_ratio;
        $new_w = $tn_w;
    } else {
        $new_w = $tn_h * $src_ratio;
        $new_h = $tn_h;
    }
    $x_mid = round($new_w / 2);
    $y_mid = round($new_h / 2);
    // Now actually apply the crop and resize!
    $newpic = imagecreatetruecolor(round($new_w), round($new_h));
    imagecopyresampled( $newpic, $source, 0,  0,  0, 0, (int) $new_w, (int) $new_h, (int) $src_w, (int) $src_h);
    $final = imagecreatetruecolor((int) $tn_w, (int) $tn_h);
    imagecopyresampled( $final, $newpic, 0, 0, $x_mid - $tn_w / 2, $y_mid - $tn_h / 2, $tn_w, $tn_h, $tn_w, $tn_h );
    // Ok, save the output as a jpeg, to the specified destination path at the desired quality.
    // You could use imagepng or imagegif here if you wanted to output those file types instead.
    if (Imagejpeg($final, $destination, $quality)) {
        return true;
    }
    return false;
}



?>