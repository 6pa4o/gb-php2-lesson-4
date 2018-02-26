<?php
require_once "../vendor/autoload.php";
require_once "../app/components/Database.php";
use twig\twig;

$db = Database::getInstance();
$mysqli = $db->getConnection();
$sql_query = "SELECT * FROM goods";
$result = $mysqli->query($sql_query);
$array_result = [];
while ($row = mysqli_fetch_assoc($result)) {
    $array_result += [
        "good$row[id_good]" => $row
    ];
};
//echo "<pre>";
//print_r($array_result);
//echo "</pre>";

$loader = new Twig_Loader_Filesystem('../app/templates');
$twig = new Twig_Environment($loader);
$template = $twig->load('bases.tmpl');
echo $template->render([
    'data' => $array_result
]);