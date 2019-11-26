<?php

class Config {
    public static function get()
    {
        return parse_ini_file('app.ini', true);
    }
}

?>