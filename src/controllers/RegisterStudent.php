<?php
require_once __DIR__ . "/../models/Student.php";

require_once('../controllers/LoginController.php');


class RegisterStudent
{
    public $listStudents;

    public function __construct()
    {
        $loginController = new LoginController();
        $this->listStudents = $loginController->students;
    }


    public function addStudent($name, $course, $registration, $password)
    {
        $studentExists = false;

        foreach ($this->listStudents as $key => $user) {
            if ($user->registration == $registration) {
                $this->listStudents[$key] = new Student($name, $registration, $course, $password);
                $studentExists = true;
                break;
            }
        }

        if (!$studentExists) {
            $newStudent = new Student($name, $registration, $course, $password);
            $listStudents[] = $newStudent;
        }

        return $listStudents;
    }



    public function updateStudent(Student $student)
    {
        foreach ($this->listStudents as $key => $user) {
            if ($user->registration == $student->registration) {
                $this->listStudents[$key] = $student;
                return true;
            }
        }
        return false;
    }

   

    public function getStudents()
    {
        return $this->listStudents;
    }

    public function setStudents(array $students)
    {
        $this->listStudents = $students;
    }
}
?>