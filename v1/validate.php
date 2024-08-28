<?php
    
    function validate ($key)
    {
        $secret = "yourApiKeyHere";
        if($key==$secret)
        {
            return 1;
        }
        return 0;
    }