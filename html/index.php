<?php
$dir_data = './data';

$contents = glob("{$dir_data}/*");
?>
<html>
    <head>
        
    </head>
    <body>

<?php
foreach ($contents as $content) {
    echo $content;
    $f = file($content);
    echo $f;
}
?>

    </body>
</html>
