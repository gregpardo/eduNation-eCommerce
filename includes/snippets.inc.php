<?php

// Returns user/admin link with the username
function getUserNameLink() {
	if (isset($_SESSION['user_id'])) {
		// Is admin
		if (isset($_SESSION['user_admin'])) {
			return '<a href="admin.php">' . $_SESSION['user_id'] . '</a>';
		}
		// Is regular user
		else {
			return '<a href="client.php">' . $_SESSION['user_id'] . '</a>';
		}
	}
	else require ('login_form.inc.php'); // Show login form if not logged in
}

// Returns if a product is on sale or not currently
// case true: returns sale price
// case false: returns false
function productIsOnSale($dbc, $id) {

	$result_sale = mysqli_query ($dbc, "SELECT * FROM sales WHERE product_id=".$id);
	//AND ((NOW() BETWEEN start_date AND end_date) OR (NOW() > start_date AND end_date IS NULL) )
	$row_sale = mysqli_fetch_assoc($result_sale);
	if (!$row_sale) return false;
	if ($row_sale['price']) return $row_sale['price'];
	else return false;
}




/***********************************************
//          Image string manipulation 
//
// Format:
//          item1.png    <-- normal size
//          item1a.png   <-- small size
//          item1.jpg    <-- large size
//
***********************************************/

// Returns small occurence of image (ex image1a.png)
function imageSmall($imageFileName) {
	return str_insert_before($imageFileName, ".", "a");
}

function imageLarge($imageFileName) {
	$index = strpos($imageFileName, ".");
	return substr($imageFileName, 0, $index) . ".jpg";
}

// Simple function to insert a character before first occurence of another... For image sizes
function str_insert_before($str, $search, $insert) {
    $index = strpos($str, $search);
    if($index === false) {
        return $str;
    }
	$first_part = substr($str, 0, $index);
	$middle_part = $insert;
	$last_part = substr($str, $index);
    return $first_part . $middle_part . $last_part;
}



/***********************************************
//          Image size manipulation 
//
// Format:
//          item1.png    <-- 275 x height
//          item1a.png   <-- 196 x height
//          item1.jpg    <-- 350 x height
//
***********************************************/

function resize_image($file, $size, $delete_orig=FALSE) {
	$crop = FALSE;
    list($width, $height) = getimagesize($file);
    $r = $width / $height;
	if ($size == "small") $w = 196;
	if ($size == "med" || $size == "medium") $w = 275;
	if ($size == "large") $w = 350;
	$h = $r * $height;
    if ($crop) {
        if ($width > $height) {
            $width = ceil($width-($width*($r-$w/$h)));
        } else {
            $height = ceil($height-($height*($r-$w/$h)));
        }
        $newwidth = $w;
        $newheight = $h;
    } else {
        if ($w/$h > $r) {
            $newwidth = $h*$r;
            $newheight = $h;
        } else {
            $newheight = $w/$r;
            $newwidth = $w;
        }
    }
    $src = @imagecreatefromstring(file_get_contents($file));
    $dst = imagecreatetruecolor($newwidth, $newheight);
	
    imagecopyresampled($dst, $src, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);

	$info = pathinfo($file);
	
	if ($size == "small") {
		$file_name =  $info['dirname'].'/'.$info['filename'].'a.png';
		imagepng($dst, $file_name);
		
	}
	else if ($size == "med" || $size == "medium") {
		$file_name =  $info['dirname'].'/'.$info['filename'].'.png';
		imagepng($dst, $file_name);
	}
	else {
		$file_name =  $info['dirname'].'/'.$info['filename'].'.jpg';
		imagejpeg($dst, $file_name, 80);
	}
	
	imagedestroy($dst);
	return $file_name;
}
