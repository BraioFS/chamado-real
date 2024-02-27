<?php
require_once "../chamado-real/src/models/User.php";

class LoginController
{
    private $users;

    public function __construct()
    {
        $this->users = [
            new User(1, 'Braio', 'Mernick', 'braio@gmail.com', '123456', 1, true),
            new User(2, 'Jão', 'Lazinhõn', 'Jao@gmail.com', '123456', 2, true),
            new User(3, 'Riucardo', 'tratch', 'riucardo@gmail.com', '123456', 3, true)
        ];
    }

    public function authenticate($email, $password)
    {
        foreach($this->users as $user) {
            if(($user->email === $email) && ($user->password === $password)){
                $_SESSION['autentication'] = 'YES';
                $_SESSION['id'] = $user->id;
                $_SESSION['name'] = $user->first_name + ' ' + $user->last_name;
                $_SESSION['profile_id'] = $user->profile_id;
                $_SESSION['email'] = $user->email;
                header('Location: ../chamadoReal/src/view/home.php');
                exit;
            }
        }

        $_SESSION['autentication'] = 'NO';
        header('location: index.php?login=erro');
        exit;
    }
}
