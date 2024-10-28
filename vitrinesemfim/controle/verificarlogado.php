<?php
session_start();

if (!isset($_SESSION['logado'])) {
    // echo "não posso acessar";
    header("Location: index.php");
}
?>