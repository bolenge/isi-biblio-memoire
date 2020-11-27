<?php
    namespace Models;

    use Core\Model;
    use Core\Out;
    use Ekolo\Builder\Http\Request;

    class TypesModel extends Model {

        public function __construct()
        {
            parent::__construct();
            $this->setTable('types');
        }

        /**
         * Création d'un type de catégorie
         */
        public function create(Request $req)
        {
            $out = new Out;
            $type = $this->add([
                'intituled' => $req->body()->intituled,
                'description' => $req->body()->description
            ]);

            if ($type) {
                $out->state = true;
                $out->message = "Type de catégories créé avec succès";
                $out->result = $type;
            }else {
                $out->message = "Une erreur est survenue lors de la création du type";
            }

            return $out;
        }
    }