<?php

  class Useful {


      private static function generateImageId($image){
          $prefix = "kcolrehs";
          preg_match("/\.(gif|bmp|png|jpg|jpeg){1}$/i", $image, $ext);
          $fileName = uniqid($prefix, $more_entropy = true);
          return $fileName.".".$ext[1];
      }

      public static function saveImage($image){
          $destiny = "../uploads/";
          $fileName = Useful::generateImageId($image["name"]);
          $finalDestination = $destiny.$fileName;
          if(move_uploaded_file($image["tmp_name"], $finalDestination)){
              return $fileName;
          }
      }
  }


?>
