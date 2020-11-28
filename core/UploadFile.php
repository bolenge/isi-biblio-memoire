<?php

    namespace Core;
    
    use Core\Out;

	/**
	 * Permet de faire l'upload des fichiers
	 */
	class UploadFile
	{
		protected static $file;

		/**
		 * Permet d'uploader un fichier
		 * @package ZUpload
         * @param \File $file
         * @param string $file_type Le type du fichier à uploader
         * @return Out
		 */
		public static function upload($file, string $file_type = null)
		{
            self::$file = $file;

			$type = !empty($file_type) ? $file_type : explode('/', self::$file['type'])[1];
			$ext = explode('/', self::$file['type'])[1];
            $folder = 'public/medias/'.$type.'s';
            $file_info = pathinfo(self::$file['name']);
            $extension = $file_info['extension'];
            $out = new Out;

			if (!\in_array($extension, $types_required)) {
				if (self::$file['error'] == 0) {
	                
	                $filename = date('d-m-Y-h-i-s-t') . '.' . $extension;
	                $destination = $folder.'/'.$filename;

	                if (in_array($extension, self::types[$type])) {
	                	$array_folder = explode('/', $folder);
	                	$i = 0;
	                	$fold = '';

	                	if (!file_exists($folder)) {
	                		while (!file_exists($folder)) {
		                		$fold .= $array_folder[$i].= '/';
		                		if (!file_exists($fold)) {
		                			mkdir($fold);
		                		}

		                		$i++;
		                	}
	                	}

                        move_uploaded_file(self::$file['tmp_name'], $destination);

                        $out->state = true;
                        $out->message = 'Upload bien effectué';
                        $out->result = [
                            'size' => self::$file['size'],
                            'path' => $destination,
                            'type' => $type,
                            'filename' => $filename
                        ];

                    }else{
                        $out->message = 'Extension non prise en charge, veuillez réessayer !';
                    }
	                
	            }else {
	                $out->message = 'Fichier invalide';
	            }
	        }else {
	        	$out->message = 'Type de fichier n\'est pas supporté';
	        }

	        return $out;
		}
	}