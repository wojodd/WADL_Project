<?php
//new folder  you want to create
$newfolder="asas";
//get the current working directory.
$curdir= getcwd();

//append the "upload" folder which already exits in ur working directory alog with the new directory name  "$newfolder"
$dir= $curdir."\images"."/$newfolder";
//check if directory exits
if(is_dir($dir))
{
    echo " Directory exists";
}
else
{
    //create new directory recursively
    mkdir($dir,0777,true);
    echo " Directory Created";
}