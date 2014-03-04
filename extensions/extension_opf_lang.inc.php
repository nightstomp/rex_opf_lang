<?php

function rex_b1_opf_lang($params)
{
	global $REX;
	$content = $params['subject'];
	
	$sql = new rex_sql();
	// $sql->debugsql = true;
	$sql->setQuery('SELECT replacement, wildcard FROM '. TBL_B1_OPF_LANG .' WHERE clang = "'.$REX['CUR_CLANG'].'"');
	
	$srch = array();
	$rplc = array();
	$rows = $sql->getRows();
	for ($i = 0; $i < $rows; $i ++)
	{
		$srch[] = $REX['ADDON']['opf_lang']['open_tag'] . $sql->getValue('wildcard') . $REX['ADDON']['opf_lang']['close_tag'];
		$rplc[] = nl2br($sql->getValue('replacement'));
		$sql->next();
	}
	
	return str_replace($srch, $rplc, $content);
	
}
?>
