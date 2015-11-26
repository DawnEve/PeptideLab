<?php
include 'header.php';
//reg_new

echo '<div class=wrap>';


echo '<pre>';
echo "<br><br>post<hr>";
print_r($_POST);

echo "<br><br>get<hr>";
print_r($_GET);

echo "<br><br>session<hr>";
print_r($_SESSION);


echo '</div>';


include 'footer.php';
?>
