<head><meta charset="utf-8"></head>
<?php
$n = $_GET["num"];
for($i=0; $i<$n; $i++) {
    $data[$i]=rand(10, 100);
    echo("$data[$i] ");
}
sort($data);
echo("<br>sorting....<br>");
for($i=0; $i<$n; $i++) {
    echo("$data[$i] ");
}
?> 
