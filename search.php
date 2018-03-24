<?php
require_once 'ZipcodeApi.php';
$zipcode_api = new ZipcodeApi();
$url = $zipcode_api->create_url($_GET['zipcode']);
$response = $zipcode_api->search($url);
$title = "郵便番号 " . htmlspecialchars($_GET['zipcode']) . " の検索結果";
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="style.css">
        <title>PostalcodeGet<?=$title ?></title>
    </head>
    <body>
        <h1>PostalcodeGet</h1>
        <h2><?=$title ?></h2>
        <?php
        if ($response['message']){
            echo $response['message'];
        } elseif (is_null($response['results'])) {
            echo "該当する住所がありませんでした。<br>";
        } else {
            foreach ($response['results'] as $resultKey => $result) {
                echo "<strong>" . ($resultKey+1) . "件目</strong><br>\n";
                ?>住所  :  <?php
                echo $result['address1'] . $result['address2'] . $result['address3'] . "<br>";
                ?>ﾖﾐｶﾞﾅ  :  <?php
                echo $result['kana1'] . $result['kana2'] . $result['kana3'] . "<br>";
            }
        }
        ?>
    </body>
    <footer>
        <div id="footer">
            <small>&copy; Copyright 2018, Akira Hasegawa</small>
        </div>
    </footer>
</html>