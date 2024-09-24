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
        pathinfo($content, PATHINFO_BASENAME),
        pathinfo($content, PATHINFO_FILENAME),
        $lines[0],
        $lines[1],
        $lines[2],
    ]);
    // foreach ($lines as $line) {
    //     echo $line.' | ';
    // }
    // echo '<br>';
}
?>
</table><br>

<?php
close_html();
?>