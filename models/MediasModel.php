<?php
    namespace Models;

    use Core\Model;
    use Core\Out;
    use Ekolo\Builder\Http\Request;

    class MediasModel extends Model {

        public function __construct()
        {
            parent::__construct();
            $this->setTable('medias');
        }

        /**
         * Création d'un Medie
         */
        public function create(array $media)
        {
            $out = new Out;
            $result = $this->add([
                'filename' => $media['filename'],
                'size' => $media['size'],
                'path' => $media['path'],
                'type' => $media['type']
            ]);

            if ($result) {
                $out->state = true;
                $out->message = "Media créée avec succès";
                $out->result = $result;
            }else {
                $out->message = "Une erreur est survenue lors de la création du Media";
            }

            return $out;
        }
    }