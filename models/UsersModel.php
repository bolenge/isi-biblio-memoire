<?php
    namespace Models;

    use Ekolo\Builder\Bin\Model;

    class UsersModel extends Model {

        public function __construct()
        {
            $this->setTable('users');
        }

        /**
         * Permet de créer un utilisateur
         * @param array $user Les données de l'utilisateur à créer
         */
        public function createUser(array $user = [])
        {
            return $this->add($user);
        }

    }