<?php

spl_autoload_register(function ($className) {
    if (file_exists('_eagle/' . $className . '.php')) { 
        require_once '_eagle/' . $className . '.php'; 
    }
	else if (file_exists('controllers/' . $className . '.php')) { 
        require_once 'controllers/' . $className . '.php'; 
    }
	else if (file_exists('models/' . $className . '.php')) { 
        require_once 'models/' . $className . '.php'; 
    }
    else if (file_exists('libs/' . $className . '.php')) { 
        require_once 'libs/' . $className . '.php'; 
    }
    else if (file_exists($className . '.php')) { 
        require_once $className . '.php'; 
    }
});

?>