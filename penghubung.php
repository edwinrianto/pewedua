<?php
spl_autoload_register(function($class) {
    include str_replace('\\', DIRECTORY_SEPARATOR, $class) . '.php';
});
 use Model\Model;
 $a=new Model();
 echo "<br>"
 $b=new\Model\Mahasiswa();
 $b->munculkanNama();
?>