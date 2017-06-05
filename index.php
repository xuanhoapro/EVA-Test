<?php

ini_get("output_buffering");

setlocale(LC_TIME, 'ja_JP.UTF-8');

if (function_exists('date_default_timezone_set')) {
    date_default_timezone_set('Asia/Tokyo');
}

require __DIR__ . '/vendor/autoload.php';

$result1 = $result2 = $historyData = [];
$errMsg = '';
$formatDatatime = 'Y-m-d H:i:s';

try {
    // Proccess submit form
    if (isset($_POST['number'])) {
        // Check validate input
        if (!Validator::isInt($_POST['number'])) {
            throw new Exception('The input is not a numeric.');
        } elseif ($_POST['number'] < 0) {
            throw new Exception('The input is a negative.');
        } else {
            // Result 1
            $divisionObj = new Division();
            for ($i = 1; $i <= $_POST['number']; $i++) {
                $divisionObj->setNumber($i);
                if ($divisionObj->remainder(3) == 0 && $divisionObj->remainder(5) == 0) {
                    $divisionObj->setNumber('HaNoi');
                } elseif ($divisionObj->remainder(3) == 0) {
                    $divisionObj->setNumber('Ha');
                } elseif ($divisionObj->remainder(5) == 0) {
                    $divisionObj->setNumber('Noi');
                }

                $result1[] = $divisionObj->getNumber();
            }

            // Result 2
            $countValues = array_count_values($result1);
            $historyData[] = [
                'date' => date($formatDatatime),
                'param' => $_POST['number'],
                'numHaNoi' => isset($countValues['HaNoi']) ? $countValues['HaNoi'] : 0
            ];

            $historyObj = new History($historyData);
            $historyData = $historyObj->saveHistory();
        }
    } else {
        //$historyData = History::getCurrentHistory();
    }
} catch (Exception $exception) {
    $errMsg = $exception->getMessage();
} finally {
    // PHP Template Engine | Smarty
    $smarty = new Smarty;
    $smarty->setTemplateDir(dirname(__FILE__) . '/views');
    $smarty->assign('page_title', 'HoaNX - Test');

    if ($result1) {
        $smarty->assign('result1', implode(',', $result1));
    }

    if ($result2) {
        $smarty->assign('result2', $result2);
    }

    $smarty->assign('historyData', $historyData);
    $smarty->assign('errMsg', $errMsg);
    $smarty->display('index.tpl');
}
