<<?php
session_start();
echo "logging out . Please wait....";


session_destroy();
header("Location: /forum/index.php");






?>