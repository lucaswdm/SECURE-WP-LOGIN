<?php

    $PREPEND = file_get_contents(__DIR__ . '/prepend_wp-login.php');

    if(!$PREPEND || empty($PREPEND)) exit('PREPEND EMPTY!');

        $PATH = __DIR__ . '/';
        $SHELL = "find -maxdepth 4 -name wp-login.php";
        $LINES = explode(PHP_EOL, shell_exec($SHELL));
        foreach($LINES as $file)
        {
                $file = trim($file);
                if(is_file($file))
                {
                        #echo $file . PHP_EOL;
                        $conteudo = file_get_contents($file);

                        if(strpos($conteudo, "Data2-Security-System") === false)
                        {
                                #echo $conteudo . PHP_EOL;
                                $conteudo = $PREPEND . PHP_EOL . $conteudo;
                                #echo $conteudo; exit;
                                if(file_put_contents($file, $conteudo))
                                {
                    echo "[SECURED] :: " . $file . PHP_EOL;
                    usleep(98765);
                                        #break;
                                }
                        }
                        else
                        {
                                echo "\t[ALREADY] :: " . $file . PHP_EOL;
                        }
                }
        }
