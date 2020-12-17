<?php
    namespace Core;

    use Ekolo\Builder\Bin\Model as ORM;
    use Core\Out;

    /**
     * Model principal
     */
    class Model extends ORM {

        /**
         * @var Out
         * Objet de retour de données
         */
        protected $out;

        public function __construct()
        {
            parent::__construct();
            $this->out = new Out;
        }

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
            }else {
                $req['cond'] = 'flag="true"';
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

        /**
         * Récupération d'une entré qui est active
         * @param array $req Les contraintes sur les données à récupérer
         * @param string $table La table où récuperer (par défaut ca prend la table assigné au model)
         * @return object
         */
        public function findOneActive(array $req = [], string $table = null)
        {
            return \current($this->findActives($req, $table));
        }

        /**
         * Récupération d'une entré qui est active par son id
         * @param int $id L'ID de la ressource
         * @param string $table La table où récuperer (par défaut ca prend la table assigné au model)
         * @return object
         */
        public function findOneActiveById(int $id, string $table = null)
        {
            return $this->findOneActive([
                'cond' => 'id='.$id
            ], $table);
        }

        /**
         * Récupération d'une entrée qui existe par son id
         * @param int $id L'ID de la ressource
         * @param string $table La table où récuperer (par défaut ca prend la table assigné au model)
         * @return object
         */
        public function findOneExistsById(int $id, string $table = null)
        {
            return current($this->findExists([
                'cond' => 'id='.$id
            ], $table));
        }

        /**
		 * Permet d'enregistrer des données (update si ca existe ou crée si non)
		 * @param array $data Les données à sauvegarger
		 * @param string $table
		 * @return mixed
		 */
		public function save2(array $data, string $table = null, string $primaryKey = null)
		{
			return !empty($primaryKey) ? $this->update($data, $table, $primaryKey) : $this->add($data, $table);
		}
    }