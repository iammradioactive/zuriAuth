<?php session_start();

$errorCount = 0;

$email = $_POST['email'] != "" ?  $_POST['email'] : $errorCount++;
$password = $_POST['password'] != "" ? $_POST['password'] : $errorCount++;

$_SESSION['email'] = $email;

if ($errorCount > 0){
        
    $session_error = "You have " . $errorCount . " error";

    if ($errorCount > 1){
        $session_error .= "s";
}

        $session_error .=  " in your form submission";
        $_SESSION['error'] = $session_error;

            header("Location: reset.php");
    }else{

            $allUsers = scandir ("db/users/");
            $countAllUsers = count($allUsers);

            for ($counter = 0; $counter <= $countAllUsers; $counter++) {
                $currentUser = $allUsers[$counter];

                if($currentUser == $email . ".json"){
                    $userString = file_get_contents("db/users/".$currentUser);
                    $userObject = json_decode($userString);

                    $userObject->password = password_hash($password, PASSWORD_DEFAULT);

                    unlink("db/users/".$currentUser);

                    file_put_contents("db/users/".$email . ".json", json_encode($userObject));
                    $_SESSION['message'] = "Password Reset Succesful, You can now login ";
                    header("Location: login.php");

                    die();
            
                }  
            }
        }
    

    $_SESSION['error'] = "Password Reset failed, invalid email";
    header("Location: login.php");
?>