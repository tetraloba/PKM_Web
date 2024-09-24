<?php
require("html_subr.php");
$dir_data = './data';

open_html("PKM_Web");

$contents = glob("{$dir_data}/*");
?>

<table border="1">
<?php
tbl_line(['タイトル', '日時', '本文プレビュー']);
foreach ($contents as $content) {
    // echo $content;
    $lines = file($content);
    tbl_line([
        '<a href="./page.php?page='.pathinfo($content, PATHINFO_BASENAME).'">'.$lines[0].'</a>',
        $lines[1],
        $lines[2],
        // pathinfo($content, PATHINFO_FILENAME),
    ]);
    // foreach ($lines as $line) {
    //     echo $line.' | ';
    // }
    // echo '<br>';
}
?>
</table><br>
<input type="button" onclick="create_content()" value="新規作成"><br>
<script src="./js/page.js"></script>

<?php
close_html();
?>
