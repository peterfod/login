<?php
include("config.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // $email = mysqli_real_escape_string($conn, $_POST['email']);
    $email = $conn->real_escape_string($_POST['email']);
    // $pass1 = mysqli_real_escape_string($conn, $_POST['pass1']);
    $pass1 = $conn->real_escape_string($_POST['pass1']);
    // $pass2 = mysqli_real_escape_string($conn, $_POST['pass2']);
    $pass2 = $conn->real_escape_string($_POST['pass2']);
    $date = date('Y-m-d H:i:s');

    if ($email != '' && $pass1 != '' && $pass2 != '') {
        if ($pass1 == $pass2) {
            $sql = "SELECT user_id FROM users WHERE email = '$email'";
            // $result = mysqli_query($conn, $sql);
            $result = $conn->query($sql);
            // $count = mysqli_num_rows($result);
            $count = $result->num_rows;    
    
            if ($count == 0) {
                $sql = "INSERT INTO users (email, password, reg_date, last_login) VALUES
                        ('$email', md5('$pass1'), '$date', '$date')";
                // if (mysqli_query($conn, $sql)) {
                if ($conn->query($sql)) {        
                    $_SESSION['user_email'] = $email;
                    header("Location: index.php?page=profile");
                } else {
                    //$error = mysqli_error($conn);
                    $error = $conn->error;
                }
            } else {
                $error = 'Létező email cím!';
            }
        } else {
            $error = 'Nem egyezik a két jelszó!';
        }
    } else {
        $error = 'Minden mezőt kötelező kitölteni!';
    }
    // mysqli_close($conn);
    $conn -> close();
}
?>
<div class="register">
<form method="post">
    <div class="form-group">
        <label for="exampleInputEmail1">Email cím</label>
        <input type="email" name="email" class="form-control" id="exampleInputEmail1">
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Jelszó</label>
        <input type="password" name="pass1" class="form-control" id="exampleInputPassword1">
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Jelszó újra</label>
        <input type="password" name="pass2" class="form-control" id="exampleInputPassword1">
    </div>
    <button type="submit" class="btn btn-primary">Regisztráció</button>
</form>
<div style="color:#cc0000; margin-top:10px">
    <?php
    if (isset($error)) {
        echo $error;
    }
    ?>
</div>
</div>