<?php setlocale(LC_ALL,'ko_KR.UTF-8');?>
<?php 
    $file_name = $_GET['file_name'];
    echo $file_name;
    
    $out = array();  
    foreach (glob($_SERVER["DOCUMENT_ROOT"]."/main/{$file_namee}/first/*.png") as $filename) {
        $p = pathinfo(urldecode($filename));
        $out[] = $p['filename'];
    } 
    echo json_encode($out);
?>