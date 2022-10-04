<?php
session_start();
session_regenerate_id(true);

if (isset($_SESSION['role'])) {
$userRole = $_SESSION['role'];
}
?>
