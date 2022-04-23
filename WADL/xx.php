<?php


 
include_once('simple_html_dom.php');

 
$html = file_get_contents("tags.txt");
$doc = str_get_html($html);


$select = $doc->find("select[name='Reeks']");
foreach ($select as $domElement) {
    $child = $domElement->find('option');
    foreach($child as $option) {
        echo $option->getAttribute('value')."<br>";
    }
}
?>