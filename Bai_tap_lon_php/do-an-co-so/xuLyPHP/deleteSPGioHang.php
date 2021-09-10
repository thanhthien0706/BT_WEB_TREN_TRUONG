<?php

session_start();

require_once "./connection.php";

if (isset($_GET['idSPThem'])){
    // sql to delete a record
    unset($_SESSION['products'][$_GET['IDsession']]);
    $sql = "DELETE FROM giohang WHERE idSPThem=".$_GET['idSPThem'];
    if (mysqli_query($conn, $sql)) {
        header("Location: ../gio-hang.php");
    } else {
      echo "Error deleting record: " . mysqli_error($conn);
    }
}

?>