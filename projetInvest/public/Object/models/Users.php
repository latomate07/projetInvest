<?php 
namespace Model;
session_start();
//session_destroy();

use PDO;

require_once ('Model.php');

class Users extends Model
{
    // Choisir la table 
    protected $table = "users";


    /* Système de connexion de l'utilisateur 
     * Recevoir les entrées et traiter les informations du formulaire 
     * Connecter ou non l'utilisateur
     * Enregistrer les erreurs 
     * @RETURN TRUE => Signifie que l'utilisateur est connecté 
     * @RETURN FALSE => Signifie que l'utilisateur n'est pas connecté
    */

    public function login($username, $password) 
    {	
        // Vérifier si les informations sont réelement envoyés
        if(empty($username)){
			$this->errors = 'Aucun identifiant a été soumis !';
		    $this->status = $this::USER_ISNOT_LOGGED;
			return FALSE;
		} elseif(empty($password)){
			$this->errors = 'Aucun mot de passe a été soumis !';
		    $this->status = $this::USER_ISNOT_LOGGED;
			return FALSE;
		}
        $query = $this->pdo->prepare("SELECT * FROM {$this->table} WHERE userPseudo = ?");
        $query->execute([$username]);

        $data = $query->fetchAll(PDO::FETCH_OBJ);
        
        /*
		echo "<pre>";
        foreach ($data as $test) :
        var_dump ($test->userPseudo);
        endforeach;
		echo "</pre>";
        */

    if ($data == TRUE) : // Si la requête retourne TRUE 

        // Vérifier si l'utilisateur existe 
        foreach ($data as $user) {
            if (($username === $user->userPseudo OR $username == $user->userMail) && password_verify($password, $user->userPassword)) {
                $access = true;
                
                // Youpi ! Utilisateur confirmé 
                $this->status = $this::USER_IS_LOGGED; 
                
                // Ajouter l'ID dans la session
                $user_id = $user->id;
                $_SESSION['user_id'] = $user_id;
                $_SESSION['logged'] = true;

                return $access;
            } elseif ($username !== $user->userPseudo) { 
                $this->errors = "L'utilisateur : " . $username . " n'existe pas.";
                $this->status = $this::USER_ISNOT_LOGGED;
                return FALSE;
            } elseif (password_verify($password, $user->userPassword) == false) {
                $this->errors = 'Mot de passe incorrect.';
                $this->status = $this::USER_ISNOT_LOGGED;
                return FALSE;
            }
        }
    else : // Si la requête retourne FALSE
        $this->errors = "L'utilisateur : " . $username . " n'existe pas.";
    endif;
    }

    /* Fonction inscription utilisateur 
     * Condition => Recevoir des paramètres
     * Ajouter l'utilisateurs en fonctiondes paramètre reçu et si ceux-ci sont valides
    */

    public function signin ($userfullname, $userpseudo, $usermail, $userRole, $userpassword, $userjoindate) 
    {
        if (!empty($userfullname) && !empty($userpseudo) && !empty($usermail) && !empty($userRole) && !empty($userpassword) && !empty($userjoindate)) {
            $query = $this->pdo->prepare("INSERT INTO {$this->table} (userFullName, userPseudo, userMail, userPassword, userRole, userJoinDate) VALUES (?, ?, ?, ?, ?, ?)");
            $query->execute([$userfullname, $userpseudo, $usermail, $userpassword, $userRole, $userjoindate]);
        

             // Ajouter l'ID dans la session
             $user_id = $this->pdo->lastInsertId();

             $_SESSION['user_id'] = $user_id;
             $_SESSION['logged'] = true;

        } else {
            $this->errors = "Veuillez remplir toutes les cases !";
            return false;
        }
    }

    // Fonction qui vérifie si une session est active, si oui, utilisateur est connecté, sinon c'est l'inverse 
    public function user_is_logged() 
    {
        if (!empty($this->getId) OR !empty($_SESSION['user_id'])) { // Vérifier si un ID a été trouvé
            $access = true;
            return $access;
        }      
    }       

    // Récupérer le logo de l'utilisateur 
    public function get_user_avatar(int $id) {
        if (isset($id)) {
            $data = $this->findById($id);
            $avatar = $data->userLogo;
            return $avatar;
        } else {
            return false;
        }
    }

    /*
    public function userData($id) {
        $data = $this->findById($id);
        $result = [
            'id' => $data->id,
            'name' => $data->userName,
            'email' => $data->userMail,
            'join_date' => $data->userJoinDate,
            'logo' => $data->userLogo,
            'cover_picture' => $data->userCoverPicture,
            'description' => $data->userDescription,
            'location' => $data->userLocation,
            'Adress' => $data->userAdress,
            'country' => $data->userCountry
        ];

        return json_encode($result);
    }

    public function sensibleData($id) {
        $data = $this->findById($id);
        $result = [
            'identityCard' => $data->userIdentityCard,
            'password' => $data->userPassword,
            'bank_details' => $data->userBankDetails,
        ];

        return json_encode($result);

    } 
    */

    public function checkPassword($first, $second) {
        if ($first === $second) {
            return true;
        } else {
            return false;
        }
    }

    // Default logo

    public function defaultLogo() {
        $logoPath = "/Users/kingbarry/Desktop/projetInvest/public/media/avatar.png";
        $logo = "<img class='userLogo' src='$logoPath'>";
        return $logo;
    }

    /* Recevoir le role de l'utilisateur actuel
     * Condition => Recevoir l'ID de l'utilisateur en question
     * @return => Le rôle de l'utilisateur
    */ 

    public function getUserRole($id) {
        $query = $this->pdo->prepare("SELECT * FROM {$this->table} WHERE id = ?");
        $query->execute([$id]);

        $data = $query->fetch(PDO::FETCH_OBJ);
        $userRole = $data->userRole;

        return $userRole;
    }
}
