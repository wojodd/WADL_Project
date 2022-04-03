<?php
// Get a file into an array.  In this example we'll go through HTTP to get
// the HTML source of a URL.
$lines = file('text.txt');


// Loop through our array, show HTML source as HTML source; and line numbers too.
foreach ($lines as $line_num => $line) {
    print_r($line_num . htmlspecialchars($line) . "<br />\n") ;


    
}


// Using the optional flags parameter
$trimmed = file('text.txt', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);



echo "<br>";
$contents = file_get_contents("text.txt");
$lines = explode("\n", $contents);
foreach ($lines as  $line) {

       
    $arrx[0] =  stristr(htmlspecialchars($line), " ") . "<br />\n";
     
    echo "<pre>";
    print_r($arrx) ;
    echo "</pre>";
}


echo "<br>";
// Create a stream
$opts = array(
  'http'=>array(
    'method'=>"GET",
    'header'=>"Accept-language: en\r\n" .
              "Cookie: foo=bar\r\n"
  )
);

$context = stream_context_create($opts);

// Open the file using the HTTP headers set above
$file = file_get_contents('text.txt', false, $context);

print_r($opts);


echo "<br>";

$arr[] =  file_get_contents("text.txt");
print_r($arr);


#tags....................................................
echo "<br>";
$tags=array();
$fp=fopen('tags.txt', 'r');
while (!feof($fp))
{
    $line=fgets($fp);

    //process line however you like
    $line=trim($line);

    //add to array
    $tags[]=$line;

}
echo "<pre>";
print_r($tags);
echo "</pre>";
fclose($fp);


#dataset.................................................
echo "<br>";
$lines=array();
$fp=fopen('text.txt', 'r');
while (!feof($fp))
{
    $line=fgets($fp);


    //process line however you like
    $line=trim($line);
    $ex = explode("\n", $line);
    foreach($ex as $e){
        $arrx=  stristr(htmlspecialchars($line), " ") . "<br />\n";

    }

    //add to array
    $lines[]=$arrx;

}
echo "<pre>";
print_r($lines);
echo "</pre>";
fclose($fp);
?>
