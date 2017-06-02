<?php
/**
 * Created by PhpStorm.
 * User: ACV.HoaNX
 * Date: 6/2/2017
 * Time: 10:57 AM
 */

require __DIR__ . '/vendor/autoload.php';

$history = new History();

setcookie('arrData', 'cookie-hoanx');

/*if (isset($_COOKIE['arrData'])) {
    echo $_COOKIE['arrData'];
}*/
$result1 = $result2 = [];

//if (isset($_POST['number'])) die($_POST['number']);

// Proccess submit form
if (isset($_POST['number'])) {
    if ($_POST['number'] > 0) {
        for ($i = 1; $i <= $_POST['number']; $i++) {
            $number = $i;
            if ($number % 3 == 0 && $number % 5 == 0) {
                $number = 'HaNoi';
            } elseif ($number % 3 == 0) {
                $number = 'Ha';
            } elseif ($number % 5 == 0) {
                $number = 'Noi';
            }

            $result1[] = $number;
        }
    }
}

// PHP Template Engine | Smarty
$smarty = new Smarty;
$smarty->setTemplateDir(dirname(__FILE__) . '/views');
$smarty->assign("page_title", "HoaNX - Test");

if ($result1) {
    $smarty->assign("result1", implode(',', $result1));
}

if ($result2) {
    $smarty->assign("result2", $result2);;
}

$smarty->assign("page_title", "HoaNX - Test");
$smarty->display('index.tpl');

