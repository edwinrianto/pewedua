<?php 


spl_autoload_register(function($class) {
    include str_replace('\\', DIRECTORY_SEPARATOR, $class) . '.php';
});

$hasil  = parse_url($_SERVER['REQUEST_URI']);



$x = explode('/', $hasil['path']);
if ($x[1]==='cupumvc') {
	$x = null;
	$controller = 'site';
} else {
	$controller = $x[count($x)-2];
}

$action = (isset($x)) ? 'action'.$x[count($x)-1] : 'actionIndex';
$classname = (isset($controller)) ? '\controller\\'.ucfirst($controller).'Controller' : '\controller\SiteController';


$run = new $classname();

