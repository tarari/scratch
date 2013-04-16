<?php
    function __autoload($class_name)
    {
        require_once(SYS.$class_name.'.php');
}
?>