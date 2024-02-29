<?php
// Corrigindo o caminho do arquivo User.php
require_once __DIR__ . "/../models/User.php";

class LoginController
{
    private $users;

    public function __construct()
    {
        $this->users = [];
        $this->users[] = new User(1, 'Braio', 'Mernick', 'braio@gmail.com', '123456', 1, true);
        $this->users[] = new User(2, 'Jão', 'Lazinhõn', 'Jao@gmail.com', '123456', 2, true);
        $this->users[] = new User(3, 'Riucardo', 'tratch', 'riucardo@gmail.com', '123456', 3, true);
    }

    public function authenticate($email, $password)
    {
        $email = strtolower($email);
        $password = strtolower($password);

        foreach ($this->users as $user) {
            if (strcasecmp($user->email, $email) === 0 && password_verify($password, $user->password)) {
                session_start();
                $_SESSION['authentication'] = 'YES';
                $_SESSION['id'] = $user->id;
                $_SESSION['name'] = $user->first_name . ' ' . $user->last_name;
                $_SESSION['profile_id'] = $user->profile_id;
                $_SESSION['email'] = $user->email;

                header('Location: /chamado-real/src/views/home.php');
                exit;
            }
        }

        session_start();
        $_SESSION['authentication'] = 'NO';
        header('Location: index.php?login=erro');
        exit;
    }
}
?>