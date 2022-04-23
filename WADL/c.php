<?php

session_start();

 $path=("C:\xampp\htdocs\WADL__\WADL\posts/bsm/لقطة الشاشة 2022-02-01 220822.png625e081189ca43.23830033.png");
 $repl= str_replace("\\","/", $path);
$parts= explode("/", $repl);
$last = array_pop($parts);
 //

$folders = array_slice($parts, -2);

 echo $im=implode("/",$folders);

 