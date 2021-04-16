<?php include_once("lib/header.php");
if (isset($_SESSION['loggedIn'])  && !empty($_SESSION['loggedIn'])) {  
    //redirect to dashboard
    header("Location: dashboard.php");
}
include_once("lib/header.php");
?>



    <form method="POST" action="processregister.php">
    <p>
        <?php
            if (isset($_SESSION['error'])  && !empty($_SESSION['error'])) {
              echo "<span style='color:red'>" . $_SESSION['error'] . "<span>";

             session_destroy();
            }
        ?>
    </p>
        <p>
            <label for="">First Name</label><br>
            <input
            <?php
                if (isset($_SESSION['firstname'])){
                    echo "value=" . $_SESSION['firstname'];
                }
            ?>
             name="firstname" type="text" placeholder="First Name">
        </p>
        <p>
            <label for="">Last Name</label><br>
            <input
            <?php
                if (isset($_SESSION['lastname'])){
                    echo "value=" . $_SESSION['lastname'];
                }
            ?>
             name="lastname" type="text" placeholder="Last Name">
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
        <p>
            <label>Gender</label><br>
            <select name="gender">
            <?php
                if (isset($_SESSION['gender'])){
                    echo "value=" . $_SESSION['gender'];
                }
            ?>
                <option>Select One</option>
                <option
                <?php
                if (isset($_SESSION['gender']) && $_SESSION['gender'] == 'Male'){
                    echo "selected";
                }
                ?>
                >Male</option>
                <option
                <?php
                if (isset($_SESSION['gender']) && $_SESSION['gender'] == 'Female'){
                    echo "selected";
                }
                ?>
                >Female</option>
            </select>
        </p>    
        <p>
            <label for="">Designation</label><br>
            <select name="designation">
            <?php
                if (isset($_SESSION['designation'])){
                    echo "value=" . $_SESSION['designation'];
                }
            ?>
                <option>Select One</option>
                <option
                <?php
                if (isset($_SESSION['designation']) && $_SESSION['designation'] == 'Mentor'){
                    echo "selected";
                }
                ?>
                >Mentor</option>
                <option
                <?php
                if (isset($_SESSION['designation']) && $_SESSION['designation'] == 'Intern'){
                    echo "selected";
                }
                ?>
                >Intern</option>
            </select>
        </p>
        <p>
            <label>Stack</label><br>
            <input
            <?php
                if (isset($_SESSION['stack'])){
                    echo "value=" . $_SESSION['stack'];
                }
            ?>
             name="stack" type="text" placeholder="Stack">
        </p>
        <p>
            <button type="submit">Register</button> 
        </p>             
    </body>
</html>