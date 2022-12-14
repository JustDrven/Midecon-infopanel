<?php include("../classes/config.class.php");

$config = new config();

if (isset($_POST["submit"])) {
    $connecter = mysqli_connect("localhost", "root", "", "tickets-list");
    $result = mysqli_query($connected, "DELETE FROM `list` WHERE `id`=".$_POST["delete"]);
    $config->location("ticket.php?delete=true");
}