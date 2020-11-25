<?php
    namespace Models;

    use Ekolo\Builder\Bin\Model;
    use Core\Out;

    class UsersModel extends Model {

        public function __construct()
        {
            parent::__construct();
            $this->setTable('users');
        }

        /**
         * Permet de créer un utilisateur
         * @param array $user Les données de l'utilisateur à créer
         */
        public function createUser(array $user)
        {
            $user['password'] = \bcrypt_hash_password($user['password']);
            $out = new Out;

            if (!$this->exists('email', $user['email'])) {
                if (!empty($result = $this->add($user))) {
                    $out->state = true;
                    $out->message = "Votre inscription a réussi !<br> Un mail d'activation de votre compte a été envoyé à votre Email";
                    $out->result = $result;
                }else {
                    $out->message = "Une erreur est survenue lors de l'inscription";
                }
            }else {
                $out->message = "Cette adresse email est déjà utilisé";
            }

            return $out;
        }

    }