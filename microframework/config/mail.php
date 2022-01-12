<?php
return [
   "server" => [
       "protocol"  => "smtp",
       "security"  => "tls",
       "host"      => "smtp.gmail.com",
       "port"      => 587,
       "username"  => "2daw.equip08@fp.insjoaquimmir.cat",
       "password"  => "9LeQr>7j",
       # See https://github.com/PHPMailer/PHPMailer/wiki/SMTP-Debugging
       "debug"     => [
        // OFF (0), CLIENT (1), SERVER (2), CONNECTION (3), LOWLEVEL (4)
        "level"     => 2,
        // "echo" (default), "html", "error_log"
        "output"    => "error_log"  
    ] 
   ],
   "from" => [
       "name"      => "2DAW-8",
       "mail"      => "2daw.equip08@fp.insjoaquimmir.cat"
   ],
   "reply" => [
       "name"      => "2DAW-8",
       "mail"      => "2daw.equip08@fp.insjoaquimmir.cat"
   ]
];
