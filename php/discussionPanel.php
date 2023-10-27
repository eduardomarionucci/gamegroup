<?php
include("connection.php");

if (isset($_GET) && !empty($_GET)) {
$_SESSION['discussionID'] = $_GET["discussionID"];
}

$_SESSION['requirement'] = "discussionPanel"; include("queryDiscussion.php"); include("queryMediate.php");

$_SESSION['requirement'] = "discussionPanelComment"; include("queryDiscussion.php");


$con->close();
