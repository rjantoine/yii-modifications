<?php

	class LessClientScript extends CClientScript {

		public function registerLessFile($url, $media='') {
			$cache_path = Yii::app()->runtimePath.'/less.php/cache/';
			if(!file_exists($cache_path)) mkdir($cache_path, 0777, true);
			Less_Cache::$cache_dir = $cache_path;

			$files = array();
			$files[$url] = $url;

			$css_file_name = Less_Cache::Get( $files, array( 'compress'=>true ) );

			return parent::registerCssFile(CHtml::asset($cache_path.$css_file_name));
		}
	}