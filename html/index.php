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
    $lines = file($content);
    foreach ($lines as $line) {
        echo $line.'<br>';
    }
}
?>

    </body>
</html>
