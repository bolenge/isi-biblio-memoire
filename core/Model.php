<?php
    namespace Core;

    use Ekolo\Builder\Bin\Model as ORM;

    /**
     * Model principal
     */
    class Model extends ORM {

        /**
         * Récupération de données qui existent
         * @param array $req Les contraintes sur les données à récupérer
         * @param string $table La table où récuperer (par défaut ca prend la table assigné au model)
         * @return object
         */
        public function findExists(array $req = [], string $table = null)
        {
            if (!empty($req)) {
                if ($req['cond']) {
                    $req['cond'] .= ' AND flag="true"';
                }else {
                    $req['cond'] .= 'flag="true"';
                }
            }

            return $this->find($req, $table);
        }

        /**
         * Récupération de données qui sont actives
         * @param array $req Les contraintes sur les données à récupérer
         * @param string $table La table où récuperer (par défaut ca prend la table assigné au model)
         * @return object
         */
        public function findActives(array $req = [], string $table = null)
        {
            if (!empty($req)) {
                if ($req['cond']) {
                    $req['cond'] .= ' AND state="true"';
                }else {
                    $req['cond'] .= 'state="true"';
                }
            }

            return $this->findExists($req, $table);
        }

        /**
         * Récupération du nombre de données qui sont actives
         * @param array $req Les contraintes sur les données à récupérer
         * @param string $table La table où récuperer (par défaut ca prend la table assigné au model)
         * @return object
         */
        public function countActives(array $req = [], string $table = null)
        {
            if (!empty($req)) {
                if ($req['cond']) {
                    $req['cond'] .= ' AND state="true"';
                }else {
                    $req['cond'] .= 'state="true"';
                }
            }

            return $this->countExists($req, $table);
        }

        /**
         * Récupération du nombre de données qui existent
         * @param array $req Les contraintes sur les données à récupérer
         * @param string $table La table où récuperer (par défaut ca prend la table assigné au model)
         * @return object
         */
        public function countExists(array $req = [], string $table = null)
        {
            if (!empty($req)) {
                if ($req['cond']) {
                    $req['cond'] .= ' AND flag="true"';
                }else {
                    $req['cond'] .= 'flag="true"';
                }
            }

            return $this->count($req, $table);
        }

    }