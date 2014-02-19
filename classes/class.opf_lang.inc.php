<?php

class opf_lang {

	public static function get($content = false, $lang = false) {

		global $REX;

		if(!$content) {
			return "[missing content to translate]";
		}

		if($lang === FALSE) {
			$lang = $REX['CUR_CLANG'];
		}
		
		$sql = new rex_sql();
		// $sql->debugsql = true;
		$sql->setQuery('SELECT replacement, wildcard FROM '. TBL_B1_OPF_LANG .' WHERE clang = "'.$lang.'"');
		
		$srch = array();
		$rplc = array();
		$rows = $sql->getRows();
		for ($i = 0; $i < $rows; $i ++)
		{
			$srch[] = $sql->getValue('wildcard');
			$rplc[] = nl2br($sql->getValue('replacement'));
			$sql->next();
		}
		
		return str_replace($srch, $rplc, $content);
		
	}
}