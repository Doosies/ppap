<!-- setlocale(LC_ALL,'ko_KR.UTF-8'); -->
<?php
    setlocale(LC_ALL,'ko_KR.UTF-8');
?>

var files = <?php $out = array();
foreach (glob('*.png') as $filename) {
    $p = pathinfo(urldecode($filename));
    $out[] = $p['filename'];
}
echo json_encode($out); ?>;