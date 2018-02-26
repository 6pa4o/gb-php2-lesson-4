<?php
require_once "../vendor/autoload.php";
require_once "../app/components/Database.php";
$startFrom = $_POST['startFrom'];
$db = Database::getInstance();
$mysqli = $db->getConnection();
$sql_query = "SELECT * FROM goods ORDER BY 'id_good' DESC LIMIT {$startFrom}, 9";
$result = $mysqli->query($sql_query);
$array_result = [];
while ($row = mysqli_fetch_assoc($result)) {
    $array_result += [
        "good$row[id_good]" => $row
    ];
};

$loader = new Twig_Loader_Filesystem('../app/templates');
$twig = new Twig_Environment($loader);
$template = $twig->load('new-product.tmpl');
echo $template->render([
    'data' => $array_result
]);