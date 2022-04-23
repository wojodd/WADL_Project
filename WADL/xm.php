<?php
  $dom = new DOMDocument('1.0','UTF-8');
  $dom->formatOutput = true;

  $root = $dom->createElement('root');
  $dom->appendChild($root);


  $document2 = $dom->createElement('documents');
  $root->appendChild($document2);


  
  $document = $dom->createElement('document');
  $document2->appendChild($document);
  $document->setAttribute('id', 1);


 





  $Post2 = $dom->createElement('Post');
  $document->appendChild($Post2);

  $Post = $dom->createElement('Post');

  $Post2->appendChild($Post); 

  $Post->setAttribute('id', 2);


  

  
  
  $paragraph2 = $dom->createElement('paragraph');
  $Post->appendChild($paragraph2);

  $paragraph = $dom->createElement('paragraph');
  $paragraph2->appendChild($paragraph);
  $paragraph ->setAttribute('id', 3);





  $sentence2 = $dom->createElement('sentence');
  $paragraph->appendChild($sentence2);

  $sentence = $dom->createElement('sentence');
  $sentence2->appendChild($sentence);
  $sentence->setAttribute('id', 4);



  $Token2 = $dom->createElement('Token');
  $sentence->appendChild($Token2);


  $Token = $dom->createElement('Token');
  $Token2->appendChild($Token);
  $Token->setAttribute('id', 5);

  $Token->appendChild( $dom->createElement('Word1', 'Opal Kole') );
  $Token->appendChild( $dom->createElement('Task', '000') );
  $Token->appendChild( $dom->createElement('UserId', '999') );


 






  echo '<xmp>'. $dom->saveXML() .'</xmp>';
  $dom->save('xxx.xml') or die('XML Create Error');
?>