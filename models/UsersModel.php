<?php
    namespace Models;

    use Core\Out;
    use Core\Model;
    use Ekolo\Builder\Http\Request;

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
        public function registerUser(array $user)
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

        /**
         * Connexion d'un utilisateur
         * @param Request $req
         * @return Out
         */
        public function loginUser(Request $req)
        {
            $out = new Out;
            $user = $this->findOne([
                'cond' => 'email="'.$req->body()->email.'"'
            ]);
            
            if (!empty($user)) {
                if (bcrypt_verify_password($req->body()->password, $user->password)) {
                    $userAgent = $req->server()->get('HTTP_USER_AGENT');
                    $system = "";

                    if (preg_match_all("#\(.{1,}\)#i", $userAgent, $groupMatchSystem)) {
                        $system = $groupMatchSystem[0][0];
                    }

                    $logged = $this->add([
                        'id_user' => $user->id,
                        'kit' => $userAgent,
                        'system' => $system
                    ], 'session_user');

                    if ($logged) {
                        $out->state = true;
                        $out->message = "Vous êtes connecté avec succès";
                        $out->result = $user;
                    }else {
                        $out->message = "Une erreur est survenue lors de la connexion, réessayez";
                    }
                }else {
                    $out->message = "Mot de passe saisi est incorrect !";
                }
            }else {
                $out->message = "Email ou Mot de passe incorrect !";
            }

            return $out;
        }

        /**
         * Déconnexion d'un utilisateur
         * @param array $data
         * @return Out
         */
        public function logout(array $data)
        {
            $out = new Out;
            $user = $this->update([
                'id_user' => $data['id_user'],
                'dateLogout' => $data['dateLogout']
            ], 'session_user', 'id_user');
            
            if ($user) {
                $out->state = true;
                $out->message = "Vous êtes déconnecté avec succès";
                $out->result = $user;
            }else {
                $out->message = "Une erreur est survenue lors de la déconnexion !";
            }

            return $out;
        }

        /**
         * Modification compte utilisateur
         * @param Request $req
         * @param int $id
         */
        public function updateUser(Request $req, $id)
        {
            $out = new Out;
            $data = [
                'id' => (int) $id,
                'name' => $req->body()->name,
                'firstName' => $req->body()->firstName,
                'email' => $req->body()->email,
                'phone' => $req->body()->phone,
                'id_country' => $req->body()->country,
                'town' => $req->body()->town,
                'adress' => $req->body()->adress,
                'avatar' => $req->body()->avatar,
                'about' => $req->body()->about
            ];

            $emailUsed = $this->findOne([
                'cond' => 'email = "'.$data['email'].'" AND id != '.$id.' AND flag="true"'
            ]);
            

            if (empty($emailUsed)) {
                if (!empty($result = $this->update($data))) {
                    $out->state = true;
                    $out->message = "Mise à jour réussie !";
                    $out->result = $result;
                }else {
                    $out->message = "Une erreur est survenue lors de la mise à jour";
                }
            }else {
                $out->message = "Cette adresse email est déjà utilisé";
            }

            return $out;
        }

    }