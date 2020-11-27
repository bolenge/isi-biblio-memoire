<?php
    namespace Models;

    use Core\Model;
    use Core\Out;
    use Ekolo\Builder\Http\Request;

    class CategoriesModel extends Model {

        public function __construct()
        {
            parent::__construct();
            $this->setTable('categories');
        }

        /**
         * Création d'une catégorie
         */
        public function create(Request $req)
        {
            $out = new Out;

            if ($this->exists('id', (int) $req->body()->type, 'types')) {
                $category = $this->add([
                    'id_type' => (int) $req->body()->type,
                    'intituled' => $req->body()->intituled,
                    'description' => $req->body()->description
                ], 'categories');

                if ($category) {
                    $out->state = true;
                    $out->message = "Catégorie créée avec succès";
                    $out->result = $category;
                }else {
                    $out->message = "Une erreur est survenue lors de la création de la catégorie";
                }
            }else {
                $out->message = "Type invalide";
            }

            return $out;
        }

        /**
         * Récupération de catégories actives
         */
        public function allActives()
        {
            $out = new Out;
            $categories = $this->findActives();

            if (!empty($categories)) {
                $out->state = true;
                $out->message = "Catégories récupérées avec succès";
                $out->result = $categories;
            }else {
                $out->message = "Aucune catégorie trouvée";
            }

            return $out;
        }
    }