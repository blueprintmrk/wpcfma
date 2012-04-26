<?php /* newsletter email class */
    function clean_style($style)
	{
		$style = trim($style);
		$style = str_replace("\t",'',$style);
		$style = str_replace("\n",'',$style);
		$style = str_replace("\r",'',$style);
		if (strlen($style)) if ($style[strlen($style) -1] != ';') $style .=';';
		return $style;
	}
    function newslwtterclasses($classes,$_classesemail, $echo = true)
	{
		$count = 1;
		while ($count) $classes = str_replace('  ', ' ', $classes, $count);
		$a_classes = explode(' ', trim($classes));
		$style = '';
		foreach($a_classes as $class){
		      if (isset($_classesemail[$class])) $style .= clean_style($_classesemail[$class]);
          }
		if ($style != ''){
			if ($echo) 	{	echo   'style="' . $style . '"';
            }else return 'style="' . $style . '"';
        }

	}
?>