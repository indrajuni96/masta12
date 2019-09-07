<?php

if(isset($_GET['id']) && isset($_GET['nama'])){
    require_once 'config/database.php';

    $id  = $_GET['id'];
    $nama = $_GET['nama'];
    $sql = "DELETE FROM nama WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        $_SESSION['nama'] = $nama;

        header("Location: index.php");
    }

    header("Location: index.php");
}

?>