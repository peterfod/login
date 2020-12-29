<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // $email = mysqli_real_escape_string($conn, $_POST['email']);
    $email = $conn->real_escape_string($_POST['email']);
    // $password = mysqli_real_escape_string($conn, $_POST['password']);
    $password = $conn->real_escape_string($_POST['password']);
    $password = md5($password);
    $date = date('Y-m-d H:i:s');

    $sql = "SELECT user_id FROM users WHERE email = '$email' and password = '$password'";
    // $result = mysqli_query($conn, $sql);
    $result = $conn->query($sql);
    // $count = mysqli_num_rows($result);
    $count = $result->num_rows;

    if ($count == 1) {
        // $row = mysqli_fetch_assoc($result);
        $row = $result->fetch_assoc();
        $userid = $row['user_id'];
        $sql = "UPDATE users SET last_login = '$date' WHERE user_id = '$userid'";
        // mysqli_query($conn, $sql);
        $conn->query($sql);
        $_SESSION['user_email'] = $email;
        header("Location: index.php?page=profile");
    } else {
        $error = "Hibás email cím vagy jelszó!";
    }
}
?>
<div class="login">
    <form method="post">
        <div class="form-group">
            <label for="exampleInputEmail1">Email address</label>
            <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input type="password" name="password" class="form-control" id="exampleInputPassword1">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    <div style="color:#cc0000; margin-top:10px">
        <?php
        if (isset($error)) {
            echo $error;
        }
        ?>
    </div>
</div>