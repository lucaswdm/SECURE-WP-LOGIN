<?php


        $PATH = __DIR__ . '/';
        $SHELL = "find -maxdepth 4 -name xmlrpc.php";
        $LINES = explode(PHP_EOL, shell_exec($SHELL));
        foreach($LINES as $file)
        {
                $file = trim($file);
                if(is_file($file))
                {
                        if(file_put_contents($file, ""))
                        {
                          echo $file . " [BLANK NOW]" . PHP_EOL;
                        }
                        
                }
        }
