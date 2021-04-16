<?php include_once("lib/header.php");
if (isset($_SESSION['loggedIn'])  && !empty($_SESSION['loggedIn'])) {  
    //redirect to dashboard
    header("Location: dashboard.php");
}  
    
?>
    
    <p>
        <?php
            if (isset($_SESSION['error'])  && !empty($_SESSION['error'])) {
                echo "<span style='color:red'>" . $_SESSION['error'] . "<span>";

                session_destroy();
            }
        ?>
    </p>
    <form method="POST" action="processlogin.php">
    <p>
        <?php
            if (isset($_SESSION['error'])  && !empty($_SESSION['error'])) {
              echo "<span style='color:red'>" . $_SESSION['error'] . "<span>";

             # session_destroy();
            }
        ?>
    </p>

    <p>
            <label for="">Email Address</label><br>
            <input
            <?php
                if (isset($_SESSION['email'])){
                    echo "value=" . $_SESSION['email'];
                }
            ?>
             name="email" type="email" placeholder="Email Address">
    </p>
    <p>
            <label for="">Password</label><br>
            <input name="password" type="password" placeholder="Password">
    </p>
    </p>
            <button type="submit">Login</button> 
    <p>
            
<?php include_once("lib/footer.php"); ?>