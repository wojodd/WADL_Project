

<?php
$contents = file_get_contents ("text.txt");
$lines = explode("\n", $contents);
if (!empty($lines)) {
    foreach($lines as $line) {
        $arrx=  stristr(htmlspecialchars($line), " ") . "<br />\n";
        // Then you get rid of sequence
        $word_line = preg_replace("/^([0-9]\))/Ui", "", $arrx);
        $words = explode(" ", $word_line); 
        print_r(array_filter($words));
    }
    
}