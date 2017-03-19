<?php
//include_once ('resize_image.php');
include_once ('../../vendor/autoload.php');
include_once ('uploadimageclass/src/class.upload.php');
use App\Post;
$images = array();
$imageso = array();
$data = $_REQUEST;
unset($data['_wysihtml5_mode']);
//array_push($data,$_FILES);

//print_r($data);exit();
$apost = new Post();
//print_r($apost->prepare($data));exit();




$foo = new Upload($_FILES['img_orgi']); 
upload_original($foo);
upload_thumb($foo);
upload_middle($foo);
function upload_original($foo)
{   
$folder = '../../../../post/'.$_REQUEST['postcategory_code'].'/';
global $images;
global $imageso;
       $images['img_orgi'] = $folder.$foo->file_src_name_body.".jpg";
       $imageso['img_orgi'] =$_REQUEST['postcategory_code'].'/'.$foo->file_src_name_body.".jpg";
if ($foo->uploaded) {
       
   // save uploaded image with no changes
   $foo->Process($folder);
   if ($foo->processed) {
//     echo 'original image copied';
   } else {
     echo 'error : ' . $foo->error;
   }
}
}


//echo $foo->file_src_name_body;exit();

 // resized to 100px wide
function upload_thumb($foo)
{
    //$foo = new Upload($_FILES['img_orgi']); 
    global $images;
    global $imageso;
   $foo->file_new_name_body = $foo->file_src_name_body.'_thumb';
   $foo->image_resize = true;
   $foo->image_convert = "jpg";
   $foo->image_x = 100;
   $foo->image_ratio_y = true;
   $folder = '../../../../post/'.$_REQUEST['postcategory_code'].'/';
   $images['img_thmb'] = $folder.$foo->file_new_name_body.".jpg";
   $imageso['img_thmb'] =$_REQUEST['postcategory_code'].'/'.$foo->file_new_name_body.".jpg";
   //echo $images['img_thmb'];exit();
   $foo->Process($folder);
   if ($foo->processed) {
//     echo 'image renamed, resized x=100
//           and converted to GIF';
     //$foo->Clean();
   } else {
     echo 'error : ' . $foo->error;
   } 
}

function upload_middle($foo)
{
    global $images;
    global $imageso;
    //$foo = new Upload($_FILES['img_orgi']); 
   $foo->file_new_name_body = $foo->file_src_name_body.'1_thumb'; 
   $foo->image_resize = true;
   $foo->image_convert = "jpg";
   $foo->image_x = 350;
   $foo->image_ratio_y = true;
   $folder = '../../../../post/'.$_REQUEST['postcategory_code'].'/';
   $images['img_mid'] = $folder.$foo->file_new_name_body.".jpg";
   $imageso['img_mid'] = $_REQUEST['postcategory_code'].'/'.$foo->file_new_name_body.".jpg";
   $foo->Process($folder);
   if ($foo->processed) {
//     echo 'image renamed, resized x=350
//           and converted to JPG';
     $foo->Clean();
   } else {
     echo 'error : ' . $foo->error;
   } 
}
//print_r($data);exit();
array_push($data,$imageso);
$apost->prepare($data)->insert();

//print_r($data);exit();