<?php
  $dom = new DOMDocument('1.0','UTF-8');
  $dom->formatOutput = true;

  $root = $dom->createElement('root');
  $dom->appendChild($root);

  $result = $dom->createElement('doccument');
  $root->appendChild($result);
  $result->setAttribute('id', 1);

  $ann = $dom->createElement('AnnotatorID');
  $result->appendChild($ann);
  $ann->setAttribute('id', 2);

  $TaskID = $dom->createElement('TaskID');
  $result->appendChild($TaskID);
  $TaskID->setAttribute('id', 2);

  $post = $dom->createElement('post');
  $result->appendChild($post);
  $post->setAttribute('id', 2);

  $sentence = $dom->createElement('sentence');
  $post->appendChild($sentence);
  $sentence->setAttribute('id', 2);

  $Token = $dom->createElement('Token');
  $sentence->appendChild($Token);



 
  for ($i = 1; $i <= 4; $i++) {

    $Token2 = $dom->createElement('Token',  'wojod');
    $Token->appendChild($Token2);
    $Token2->setAttribute('id', $i);


    $word = $dom->createElement('word');
    $Token2->appendChild($word);
 
    

    $AnnotationTag = $dom->createElement('AnnotationTag');
    $word->appendChild($AnnotationTag);
  




  
  
  
    }
  



 

  echo '<xmp>'. $dom->saveXML() .'</xmp>';
  $dom->save('result.xml') or die('XML Create Error');
?>

<?php
