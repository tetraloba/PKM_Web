<?php
require("html_subr.php");
$dir_data = './data';

if (!isset($_GET['page'])) {
    html_exit("ページが選択されていません"); // 新しいページを生成する，でも良いかな
}
$page_filename = $_GET['page'];
$lines = file("{$dir_data}/{$page_filename}"); // path.join()無いのか…
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
        <button onclick="print_content()">print</button>
    </body>
</html>
