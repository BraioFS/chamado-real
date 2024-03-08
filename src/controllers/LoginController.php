<?php
require_once __DIR__ . "/../models/Student.php";

class LoginController
{
    private $students;

    public function __construct()
    {
        if (!isset($this->students) || empty($this->students)) {
            $this->students[] = new Student('braio@gmail.com', '2024031', 'Moda', '1234');
            $this->students[] = new Student('teste@gmail.com', '20240312', 'Moda', '1234');
        }
    }
    public function authenticate($registration, $password)
    {
        $registration = strtolower($registration);
        $password = strtolower($password);

        foreach ($this->students as $student) {
            if (strcasecmp($student->getRegistration(), $registration) === 0 && password_verify($password, $student->getPassword())) {
                session_start();
                $_SESSION['authentication'] = 'YES';
                $_SESSION['name'] = $student->getName();
                $_SESSION['registration'] = $student->getRegistration();

                header('Location: /chamado-real/src/views/home.php');
                exit;
            }
        }

        session_start();
        $_SESSION['authentication'] = 'NO';
        header('Location: index.php?login=erro');
        exit;
    }

    public function getStudents()
    {
        return $this->students;
    }

    public function addStudent($name, $course, $registration, $password, $list)
    {

        $studentExists = false;

        foreach ($list as $key => $user) {
            if ($user->getRegistration() == $registration) {
                [$key] = new Student($name, $registration, $course, $password);
                $studentExists = true;
                break;
            }
        }

        if (!$studentExists) {
            $newStudent = new Student($name, $registration, $course, $password);
            $list[] = $newStudent;
        }

        return $list;
    }

    public function removeStudent($registration, $list)
    {
        foreach ($list as $key => $user) {
            if ($user->getRegistration() == $registration) {
                unset($list[$key]);
                return true;
            }
        }
        return $list;
    }
}
?>