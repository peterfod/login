<?php
    require 'config.php';

    $sql = "SELECT * FROM users";
    // $result = mysqli_query($conn, $sql);
    $result = $conn->query($sql);
    if (!empty($result)) {
        // $count = mysqli_num_rows($result);
        $count = $result->num_rows;
        echo 'Sorok száma: ' . $count . '<br>';
        // while ($row = mysqli_fetch_assoc($result)) {
        while ($row = $result->fetch_assoc()) {
            echo '<pre>';
            print_r($row);
            echo '</pre>';
        }
    }    
?>