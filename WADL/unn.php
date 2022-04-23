<?php
$dom = new DOMDocument('1.0', 'utf-8');
$element = $dom->createElement('foo', 'meyou');
$dom->appendChild($element);
echo $dom->saveXML();
?>