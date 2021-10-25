<?php

/**
 *Загрузчик картинок на сервер
 */
namespace App\models;
use \Verot\Upload\Upload;

class UploadImage
{
	public static function make($filesImage){
		$handle = new \Verot\Upload\Upload($filesImage);
		if ($handle->uploaded) {
			$handle->image_x		= 485;
			$handle->image_y 		= 730;
			$handle->file_safe_name = true;
			$handle->image_resize         = true;
			$handle->image_ratio_y        = true;
			$handle->process('uploads/');
			if ($handle->processed) {
				return $handle->clean();

			} else {
				echo 'error : ' . $handle->error;
			}
		}
	}
}