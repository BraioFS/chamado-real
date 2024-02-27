<?php
class User
{
    public $id;
    public $first_name;
    public $last_name;
    public $email;
    public $password;
    public $profile_id;
    public $active;

    public function __construct($id, $first_name, $last_name, $email, $password, $profile_id, $active)
    {
        $this->id = $id;
        $this->first_name = $first_name;
        $this->last_name = $last_name;
        $this->email = $email;
        $this->password = password_hash($password, PASSWORD_DEFAULT);
        $this->profile_id = $profile_id;
        $this->active = $active;
    }

    public function validatePassword($password)
    {
        return password_verify($password, $this->password);
    }
}
