<?php include_once("lib/header.php"); ?>

<h1>Forgot Password</h1>
<p>Provide the email address associated with your account</p>

<form action="processforgot.php" method="POST">
<p>
    <?php
        if (isset($_SESSION['error'])  && !empty($_SESSION['error'])) {
            echo "<span style='color:red'>" . $_SESSION['error'] . "<span>";

            session_destroy();
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
        <button type="submit">Forgot Password</button> 
    </p> 
</form>

<?php include_once("lib/footer.php"); ?>