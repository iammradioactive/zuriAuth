<?php session_start();

$errorCount = 0;

    $firstname = $_POST['firstname'] != "" ? $_POST['firstname'] : $errorCount++;
    $lastname = $_POST['lastname'] != "" ? $_POST['lastname'] : $errorCount++;
    $email = $_POST['email'] != "" ?  $_POST['email'] : $errorCount++;
    $password = $_POST['password'] != "" ? $_POST['password'] : $errorCount++;
    $gender = $_POST['gender'] != "" ? $_POST['gender'] : $errorCount++;
    $designation = $_POST['designation'] != "" ? $_POST['designation'] : $errorCount++;
    $department = $_POST['stack'] != "" ? $_POST['stack'] : $errorCount++;


    $_SESSION['firstname'] = $firstname;
    $_SESSION['lastname'] = $lastname;
    $_SESSION['email'] = $email;
    $_SESSION['gender'] = $gender;
    $_SESSION['designation'] = $designation;
    $_SESSION['stack'] = $department;
    
    if ($errorCount > 0){
        
        $session_error = "You have " . $errorCount . " error";

    if ($errorCount > 1){
        $session_error .= "s";
    }

    $session_error .=  " in your form submission";
    $_SESSION['error'] = $session_error;
    
        header("Location: register.php");
    }else {
        $allUsers = scandir ("db/users/");

        $countAllUsers = count($allUsers);

        $newUserId = ($countAllUsers-1);
        
        $userObject = [
            'Id'=> $newUserId,
            'firstname'=> $firstname,
            'lastname'=> $lastname,
            'email'=> $email,
            'password'=> password_hash($password, PASSWORD_DEFAULT) ,
            'gender'=> $gender,
            'designation'=> $designation,
            'stack'=> $stack
        ];


        for ($counter = 0; $counter <= $countAllUsers; $counter++) {
            $currentUser = $allUsers[$counter];

            if($currentUser == $email . ".json"){
                $_SESSION['error'] = "Registration failed, User already exists";
                header("Location: register.php"); 
                die();
            }
        }

        file_put_contents("db/users/".$email . ".json", json_encode($userObject));
        $_SESSION['message'] = "Registration Succesful, You can now login " . $firstname ;
        header("Location: login.php");
    }

?>