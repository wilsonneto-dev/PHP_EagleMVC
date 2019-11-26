<?php
use \RedBeanPHP\R as R;


class DB {
    public static function R()
    {
        $configs = Config::get();
        var_dump($configs);

        $db_host = $configs["database"]["db_host"];
        $db_name = $configs["database"]["db_name"];
        $db_user = $configs["database"]["db_user"];
        $db_password = $configs["database"]["db_password"];

        R::setup( 
            "mysql:host={$db_host};dbname={$db_name}",
            $db_user, 
            $db_password
        );
    }
}

?>