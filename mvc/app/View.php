<?php 

namespace app;

/**
* Root View
*/
class View
{
	public static function render($view,$params=array())
	{
		ob_start();
		if (!empty($params)) {
			foreach ($params as $key => $value) {
				$$key = $value;
			}
		}
		include_once 'view/'.$view.'.php';
		$content = ob_get_clean();
		include_once 'template/content.php';
	}
}