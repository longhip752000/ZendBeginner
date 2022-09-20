<?php

/**
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2016 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Login\Controller;

use mysqli;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

session_start();
class LoginController extends AbstractActionController
{
    public function loginAction()
    {
        return new ViewModel();
    }

    public function checkAction()
    {
        $dbhost = "localhost";
        $dbuser = "root";
        $dbpass = "";
        $db = "login";

        $conn = new mysqli($dbhost, $dbuser, $dbpass, $db) or die("Connect failed: %s\n" . $conn->error);
        if (isset($_POST['username'])) {
            $username = $_POST['username'];
            $password = $_POST['password'];
            $sql = "SELECT * FROM tblusers WHERE username = '$username' AND password = '$password'";
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) == 1) {
                $fullName = $result->fetch_assoc();
                $_SESSION['msg'] = $fullName["fullName"];
                $this->redirect()->toRoute('login-succesfully');
            } else {
                $this->redirect()->toRoute('login-failed');
            }
        }
    }

    public function succesfullyAction()
    {
        return new ViewModel();
    }

    public function failedAction()
    {
        return new ViewModel();
    }
}
