<?php
require("html_subr.php");
$dir_data = './data';

if (!isset($_GET['page'])) {
    html_exit("ページが選択されていません"); // 新しいページを生成する，でも良いかな
}
$page_filename = $_GET['page'];
$page_filepath = "{$dir_data}/{$page_filename}";

/* POSTメソッドで呼び出された場合，ファイルを更新する． */
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $lines = $_POST['lines'];
    var_dump($lines);
    file_put_contents($page_filepath, $lines);
}

$lines = file($page_filepath); // path.join()無いのか…
if (!$lines) {
    html_exit("ページ {$page_filename} を開けませんでした。");
}
?>

<html>
    <head>
        <link rel="stylesheet" href="./css/page.css">
        <script src="./js/page.js"></script>
    </head>
    <body>
        <div id="text_area" contenteditable="true">

<?php
foreach ($lines as $line) {
    echo '<p class="line">'.$line.'</p>';
}
?>

        </div>
        <button onclick="post_content()">print</button>
    </body>
</html>
