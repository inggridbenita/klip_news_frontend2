<?php

return [

    "driver" => env("MAIL_MAILER"),
    "host" => env("MAIL_HOST"),
    "port" => env("MAIL_PORT"),
    "from" => array(
        "address" => env("MAIL_FROM_ADDRESS"),
        "name" => "Verofin News",
    ),
    "username" => env("MAIL_USERNAME"), // get username from .env files
    "password" => env("MAIL_PASSWORD"), // get password from .env files
    "sendmail" => "/usr/sbin/sendmail -bs"

];
