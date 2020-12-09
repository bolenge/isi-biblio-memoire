<?php
    namespace Models;

    use Core\Out;
    use Core\Model;
    use Ekolo\Builder\Http\Request;

    class AdminsModel extends Model {

        public function __construct()
        {
            parent::__construct();
            $this->setTable('admins');
        }

        /**
         * Création d'un admin
         * @param Request $req
         * @return Out
         */
        public function createAdmin(Request $req)
        {
            $data = [
                'name' => $req->body()->name,
                'firstName' => $req->body()->firstName,
                'email' => $req->body()->email,
                'phone' => $req->body()->phone,
                'username' => $req->body()->username,
                'password' => \bcrypt_hash_password($req->body()->password),
            ];

            if (!$this->exists('email', $data['email'])) {
                if (!$this->exists('username', $data['username'])) {
                    if (!empty($result = $this->add($data))) {
                        $this->out->state = true;
                        $this->out->message = "Admin créé avec succès";
                        $this->out->result = $result;
                    }else {
                        $this->out->message = "Une erreur est survenue lors de la création admin";
                    }
                }else {
                    $this->out->message = "Nom d'utilisateur déjà utilisé";
                }
            }else {
                $this->out->message = "Cette adresse email est déjà utilisé";
            }

            return $this->out;
        }

        /**
         * Connexion d'un utilisateur
         * @param Request $req
         * @return Out
         */
        public function loginAdmin(Request $req)
        {
            $out = new Out;
            $Admin = $this->findOne([
                'cond' => 'username="'.$req->body()->username.'"'
            ]);
            
            if (!empty($Admin)) {
                if (bcrypt_verify_password($req->body()->password, $Admin->password)) {
                    $AdminAgent = $req->server()->get('HTTP_Admin_AGENT');
                    $system = "";

                    if (preg_match_all("#\(.{1,}\)#i", $AdminAgent, $groupMatchSystem)) {
                        $system = $groupMatchSystem[0][0];
                    }

                    $logged = $this->add([
                        'id_admin' => $Admin->id,
                        'kit' => $AdminAgent,
                        'system' => $system
                    ], 'session_admins');

                    if ($logged) {
                        $out->state = true;
                        $out->message = "Vous êtes connecté avec succès";
                        $out->result = $Admin;
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
            $Admin = $this->update([
                'idAdmin' => $data['id_Admin'],
                'dateLogout' => $data['dateLogout']
            ], 'session_Admin', 'id_Admin');
            
            if ($Admin) {
                $out->state = true;
                $out->message = "Vous êtes déconnecté avec succès";
                $out->result = $Admin;
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
        public function updateAdmin(Request $req, $id)
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