<?php


function b_languages($params)
{
	global $REX, $I18N;
	
	$return = '';
	
	$url = '';
	if (is_array($params))
	{
		foreach ($params as $key => $val)
		{
			$url .= '&amp;'.$key.'='.$val;
		}
	}
	
	$clang = rex_request('clang', 'int');
	$return .= '
		 <div id="rex-clang" class="rex-toolbar">
		 <div class="rex-toolbar-content">
			 <ul>
				 <li>'.$I18N->msg("languages").' : </li>';
	
	$i = 10;
	foreach($REX['CLANG'] as $key => $val)
	{
		$i++;
			
		if($i == 1)
			$return .= '<li class="rex-navi-first rex-navi-clang-'.$key.'">';
		else
			$return .= '<li class="rex-navi-clang-'.$key.'">';
					
		$val = rex_translate($val);
	
		$class = '';
		if ($key == $clang)
			$class = ' class="rex-active"';
			
		$return .= '<a'.$class.' href="index.php?page='.$REX['PAGE'].$url.'&amp;clang='. $key .'">'. $val .'</a>';
		
		$return .= '</li>';
	}
	
	$return .= '
			 </ul>
		 </div>
		 </div>
	';
	
	return $return;
}
?>