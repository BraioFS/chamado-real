<?php

class Student
{
    protected $name;
    protected $registration;
    protected $course;
    protected $password;

    public function __construct($name, $registration, $course, $password)
    {
        $this->name = $name;
        $this->registration = $registration;
        $this->course = $course;
        $this->password = password_hash($password, PASSWORD_DEFAULT);
    }

    // Getters

    public function getName()
    {
        return $this->name;
    }

    public function getRegistration()
    {
        return $this->registration;
    }

    public function getCourse()
    {
        return $this->course;
    }

    public function getPassword()
    {
        return $this->password;
    }

    // Setters
    public function setName($newName)
    {
        if ($newName != $this->name) {
            $this->name = $newName;
        }
    }

    public function setRegistration($newRegistration)
    {
        if ($newRegistration != $this->registration) {
            $this->registration = $newRegistration;
        } else {
            echo "Error: Registration already exists.";
        }
    }

    public function setCourse($newCourse)
    {
        if ($newCourse != $this->course) {
            $this->course = $newCourse;
        } else {
            echo "Error: The course already exists.";
        }
    }

    public function setPassword($newPassword)
    {
        if ($newPassword != $this->password) {
            $this->password = password_hash($newPassword, PASSWORD_DEFAULT);
        } else {
            echo "Error: The new password is the same as the current password.";
        }
    }
}
?>