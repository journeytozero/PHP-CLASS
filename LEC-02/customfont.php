<?php
    function customFont($font,$size = 1.5)
    {
        echo "<p style=\"font-family:$font; font-size:{$size}em;\">Welcome Text!</p>";
    }


    customFont("Arial",2);
    customFont("Times",3);
    customFont("Courier");

?>
