<?php

include("connection.php");

$_SESSION['requirement'] = 'mainPanel'; include("queryMediate.php"); include("queryDiscussion.php");

$con->close();