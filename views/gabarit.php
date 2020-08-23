<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title><?= $title ?></title>
</head>

<?php
require_once('views/nav.php');
?>

<body>
<div class="container mt-1 mb-5">
    <?= $content ?>
</div>
</body>
<?php require_once('views/footer.html') ?>
</html>

<?php $page = "http://" . $_SERVER['SERVER_NAME'] . $_SERVER["REQUEST_URI"];
/*On n'affiche pas la barre nav de pagination sur certaine page*/
function strposa($haystack, $needles = array(), $offset = 0)
{
    $chr = array();
    foreach ($needles as $needle) {
        $res = strpos($haystack, $needle, $offset);
        if ($res !== false) $chr[$needle] = $res;
    }
    if (empty($chr)) return false;
    return min($chr);
}

$string = $page;
$array = array('save', 'update', 'email');

if (!strposa($string, $array, 1)) {
    require_once('views/pagination.php');
}
?>


