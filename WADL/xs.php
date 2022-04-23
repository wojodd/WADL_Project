<?php
// array with the key / value pairs of the information to be added (can be an array with the data fetched from db as well)
$songs = [
    'song1.mp3' => 'Track 1 - Track Title',
    'song2.mp3' => 'Track 2 - Track Title',
    'song3.mp3' => 'Track 3 - Track Title',
    'song4.mp3' => 'Track 4 - Track Title',
    'song5.mp3' => 'Track 5 - Track Title',
    'song6.mp3' => 'Track 6 - Track Title',
    'song7.mp3' => 'Track 7 - Track Title',
    'song8.mp3' => 'Track 8 - Track Title',
];

$xml = new XMLWriter();
$xml->openURI('songs.xml');
$xml->setIndent(true);
$xml->setIndentString('    ');
$xml->startDocument('1.0', 'UTF-8');
    $xml->startElement('xml');
            foreach($songs as $song => $track){
                $xml->startElement('track');
                    $xml->writeElement('path', $song);
                    $xml->writeElement('title', $track);
                $xml->endElement();
            }
    $xml->endElement();
$xml->endDocument();
$xml->flush();
unset($xml);