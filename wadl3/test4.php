<?php
$lines=array();
$handle = fopen("text.txt", "r");
if ($handle) {
    while (($line = fgets($handle)) !== false) {
        $line=trim($line);
        // process the line read.
        $word_arr = explode(" ", $line); //return word array
        foreach($word_arr as $word){
            $arrx= $word . "<br>";
            $arrx=  stristr(htmlspecialchars($line), " ") . "<br />\n";
            // required output
        }
        $lines[]=$arrx;


    }

    echo "<pre>";
print_r($lines);
echo "</pre>";

    fclose($handle);
} else {
    // error while opening file.
    echo "error";
}
?>

<?php 

echo "<br>";
$lines = array();

$fp=fopen('text1.txt', 'r');
while (!feof($fp))
{
    $line=fgets($fp);


    //process line however you like
    $line=trim($line);
    $ex = explode("\n", $line);
    foreach($ex as $e){
        $arrx=  stristr(htmlspecialchars($line), " ") . "<br />\n";
        $word_line = preg_replace("/^([0-9]\))/Ui", "", $arrx);
        $words = explode(" ", $word_line); 
        $lines[] =   $words;
       
    }

    

}
$length = count($lines); 
 for ($i = 0; $i < $length; $i++) { echo " . " ;
    echo "<pre>";
     print_r(array_filter($lines[$i]));
   echo "</pre>";}


    // for ($row = 0; $row < count($lines); $row++) {
           
    //     for ($col = 0; $col < count($lines); $col++) {
    //       echo $lines[$row][$col] . " ";
    //     }
    
    //   }



?>

<?php


echo "<br>";
$lines = array();

$fp=fopen('text.txt', 'r');
while (!feof($fp))
{
    $line=fgets($fp);


    //process line however you like
    $line=trim($line);
    $ex = explode("\n", $line);
    foreach($ex as $e){
        $arrx=  stristr(htmlspecialchars($line), " ") . "<br />\n";
        $word_line = preg_replace("/^([0-9]\))/Ui", "", $arrx);
        $words = explode(" ", $word_line); 
        $lines[] =   $words;
       
    }

    

}




$length = count($lines); ?>

<?php for ($row = 0; $row < count($lines); $row++) { ?>
        
      <?php  for ($col = 0; $col < count($lines); $col++) { ?>
          
        

    <ul>
        <li>
            <a href="#"><?php   echo $lines[$row][$col] . " "; ?></a>
            <ul>

           <?php $tags = array();
                                    $fp = fopen('tags.txt', 'r');
                                    while (!feof($fp)) {
                                        $line = fgets($fp);

                                        //process line however you like
                                        $line = trim($line);

                                        //add to array
                                        $tags[] = $line;
                                    }

                                    $lengthx = count($tags);

                                    for ($x = 0; $x < $length; $x++) {
                                    
                                    ?>

                <li> <a href="#"><?php print_r($tags[$x] ); } ?></a></li>
                

                
              
                 


            </ul>
        </li>
    </ul>
    



<?php }}  ?>




