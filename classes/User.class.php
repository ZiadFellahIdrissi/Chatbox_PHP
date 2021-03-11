<?php
class User
{
    private $_db,
        $_data,
        $_sessionName,
        $_isLoggedIn;

    public function __construct($user = null)
    {
        $this->_db = DB::getInstance();
        $this->_sessionName = Config::get('session/session_name');
        if (!$user) {
            if (Session::exists(($this->_sessionName))) {
                $user = Session::get($this->_sessionName);
                if ($this->find($user)) {
                    $this->_isLoggedIn = true;
                } else {
                    // process logout
                }
            }
        } else {
            $this->find($user);
        }
    }


    public function find($username = null)
    {
        if ($username) {
            $sql = "SELECT *
            FROM Utilisateur WHERE Utilisateur.username = ?";
            $resultat = $this->_db->query($sql, [$username]);
            if ($resultat->count()) {
                $this->_data = $resultat->first();
                return true;
            }
        }
        return false;
    }

    public function login($username = null, $password = null)
    {
        $user = $this->find($username);
        if ($user) {
            if (password_verify($password , $this->data()->password)) {
                Session::put($this->_sessionName, $this->data()->username);
                return true;
            }
        }
        return false;
    }
    
    public function data()
    {
        return $this->_data;
    }

    public function logout()
    {
        Session::delete($this->_sessionName);
    }

    public function isLoggedIn()
    {
        return $this->_isLoggedIn;
    }
    public static function checkEmail($cin, $email)
    {
        if ($cin && $email) {
            $sql = "SELECT cin
                    FROM Utilisateur
                    WHERE cin != ?
                    AND email = ?";
            $dataPas = DB::getInstance()->query($sql, [$cin, $email]);
            return $dataPas->count() ? true : false;
        }
        return false;
    }
    public static function checkUserName($cin, $username)
    {
        if ($cin && $username) {
            $sql = "SELECT cin
                    FROM Utilisateur
                    WHERE cin != ?
                    AND username = ?";
            $dataPas = DB::getInstance()->query($sql, [$cin, $username]);
            return $dataPas->count() ? true : false;
        }
        return false;
    }
    public static function isAlreadySignedUp($cin)
    {
        if ($cin) {
            $sql = "SELECT cin
                    FROM Utilisateur
                    WHERE cin = ?
                    AND `password` is not null";
            $dataPas = DB::getInstance()->query($sql, [$cin]);
            return $dataPas->count() ? true : false;
        }
        return false;
    }
    public static function signup($cin,$nom,$prenom,$datenaiss,$tele, $email, $username, $password)
    {
        $hashed_password=password_hash($password,PASSWORD_DEFAULT);
        if ($cin && $email && $username && $password) {
            $data = DB::getInstance()->query("INSERT INTO `utilisateur` (`cin`, `nom`, `prenom`,
                                                   `date_naissance`,`password`, `telephone`, 
                                                   `email`, `username`, `imagepath`) 
                                        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)
                                       ",array($cin, $nom, $prenom, $datenaiss, $hashed_password, $tele, $email, $username, 'avatar.jpg' ));

            return ($data->error());
        }
    }

}