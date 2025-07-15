<?php
$filename = "readme.txt";
$content = "This is file. My task is file operation handaling.";

if(is_writeable($filename))
{
    if(!$handle = fopen($filename,'a'))
    {
        echo "Cannot open this file";
        exit;
    }

    if(fwrite($handle,$content)=== FALSE)
    {
        echo "Cannot write in the file";
        exit;
    }
    echo "wrote the content successfully ";
    fclose($handle);

}

else
{
    echo "This is file not writable";
}





?>