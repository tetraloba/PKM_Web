<?php
require("html_subr.php");
$dir_data = './data';

open_html('page');

if (!isset($_GET['page'])) {
    html_exit("ページが選択されていません"); // 新しいページを生成する，でも良いかな
}
$page_filename = $_GET['page'];
$page_filepath = "{$dir_data}/{$page_filename}";

/* POSTメソッドで呼び出された場合，ファイルを更新する． */
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['lines'])) {
        $lines = $_POST['lines'];
    } else {
        /* linesが設定されていない場合は新規作成 */
        $lines = [];
    }
    /* linesが要素数3未満の場合は要素数3になるまで空行を追加 */
    for ($i = count($lines); $i < 3; $i++) {
        array_push($lines, '%0A');
    }
    var_dump($lines); // debug
    $data = implode("", $lines); // 文字列配列$linesを一つの文字列に．
    $data = urldecode($data); // URLエンコードを還元する．JSのencodeURIComponent()の逆
    $data = html_entity_decode($data); // HTMLエンティティを本来の文字に還元 &amp; → &
    file_put_contents($page_filepath, $data);
}

$lines = file($page_filepath); // path.join()無いのか…
if (!$lines) {
    html_exit("ページ {$page_filename} を開けませんでした。");
}
?>


<link rel="stylesheet" href="./css/page.css">
<script src="./js/page.js"></script>

<div id="text_area" contenteditable="true">

<?php
foreach ($lines as $line) {
    if ($line == "\n") {
        $line = '<br>';
    } else {
        $line = htmlentities($line); // HTMLエンティティに変換 & → &amp;
    }
    echo '<p class="line">'.$line.'</p>'."\n";
}
?>

</div>
<button onclick="post_content()">post</button><br>
<br>

<?php
close_html();
?>
