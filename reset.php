<?php include_once("lib/header.php"); ?>

<h1>Reset Password</h1>
<p>Reset password associated with your account</p>

<form action="processreset.php" method="POST">
<p>
    <?php
        if (isset($_SESSION['error'])  && !empty($_SESSION['error'])) {
            echo "<span style='color:red'>" . $_SESSION['error'] . "<span>";
            session_destroy();
        }
    ?>
</p>

 <p>
        <label>Email Address</label><br>
        <input 

            <?php
                if (isset($_SESSION['email'])){
                    echo "value=" . $_SESSION['email'];
                }
            ?>
        name="email" type="email" placeholder="Email Address">
</p>
<p>
        <label for="">Enter New Password</label><br>
        <input name="password" type="password" placeholder="Password">
</p>
<p>
    <button type="submit">Reset Password</button> 
</p> 
</form>
<?php include_once("lib/footer.php"); ?>