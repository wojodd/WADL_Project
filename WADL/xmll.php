<?php


$songs = simplexml_load_file('songs.xml');

echo "<select id='SELsongs'>";

foreach($songs as $song)
{
echo "<option value='".$song->id."'>".$song->name."</option>";
}
echo "</select>";

?>