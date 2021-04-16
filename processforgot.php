<?php  session_start();

$errorCount = 0;

$email = $_POST['email'] != "" ?  $_POST['email'] : $errorCount++;
$_SESSION['email'] = $email;

if ($errorCount > 0){
        
    $session_error = "You have " . $errorCount . " error";

    if ($errorCount > 1){
        $session_error .= "s";
    }

        $session_error .=  " in your form submission";
        $_SESSION['error'] = $session_error;

            header("Location: forgot.php");

}else{

    $allUsers = scandir ("db/users/");
    $countAllUsers = count($allUsers);


        for ($counter = 0; $counter < $countAllUsers; $counter++) {
            $currentUser = $allUsers[$counter];

            if($currentUser == $email . ".json"){
                
                $subject = "Password Reset Link";
                $message = "A Password reset has been initiated from your account, if you did not initiate the reset please ignore this message, otherwise, visit: localhost/zuriAuth/reset.php";
                $headers = "From: no_reply@logixx.org" . "\r\n" .
                    "CC: johndoe@logixx.org";


                $try = mail($email,$subject,$message,$headers);

                if($try){
                    
                        $_SESSION['message'] = "Password reset has been sent to your email " . $email ;
                        header("Location: login.php");

                    }else {
                        $_SESSION['error'] = "Something went wrong we could not send password reset to " . $email ;
                        header("Location: forgot.php");

                    } 
            
           die();
        }
    
    }
    
    $_SESSION['error'] = "Email not registered with us ERR: " . $email ;
    header("Location: forgot.php");
}