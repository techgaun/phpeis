<?php

/** 
 * @author samar
 * 
 * 
 */
class Template {
	//TODO - Insert your code here
	
	private $page;
	
	function __construct($template="template.html") {
		if (file_exists($template))
    		$this->page = join("", file($template));
  		else
    		die("Template file $template not found.");
		//TODO - Insert your code here
	}
	
	function output()
	{
		echo $this->page;
	}
	
function parse($file) {
    ob_start();
    include($file);
    $buffer = ob_get_contents();
    ob_end_clean();
    return $buffer;
  }

  function replace_tags($tags = array()) {
    if (sizeof($tags) > 0)
      foreach ($tags as $tag => $data) {
        $data = (file_exists($_SERVER['DOCUMENT_ROOT']."/".$data)) ? $this->parse($data) : $data;
        $this->page = str_replace("{$var}", $data, $this->page);//eregi_replace("{" . $tag . "}", $data,
                     // $this->page);
        }
  }
	
}

?>