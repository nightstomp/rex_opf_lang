<?php
/** 
 * Addon: 	by Thomas Blum
 * @author 	blumbeet - web.studio
 *					http://blumbeet.com
 */

function rex_b1_clang_added($params)
{
  global $I18N, $REX;

  $id = (int)$params['id'];
	
	// abgleich der replacevalue felder..
	$sql = new rex_sql();
	// $sql->debugsql = true;
	$sql->setQuery('SELECT id, clang, replacement, wildcard, count(wildcard) AS count FROM '.TBL_B1_OPF_LANG.' GROUP BY wildcard');
	
	$rows = $sql->getRows();
	for ($i = 1; $i <= $rows; $i++)
	{
		if (count($REX['CLANG']) != $sql->getValue('count'))
		{
			reset($REX['CLANG']);
			
			foreach ($REX['CLANG'] as $key => $val)
			{
				$id   = $sql->getValue('id');
				$repl = $sql->getValue('replacement');
				$wild = $sql->getValue('wildcard');
				
				$sqlCheck = new rex_sql();
				$sqlCheck->setQuery('SELECT clang FROM '.TBL_B1_OPF_LANG.' WHERE clang = "'.$key.'" AND wildcard = "'.$wild.'"');
				
				if ($sqlCheck->getRows() == 0)
				{
					// Nicht gefunden Sprache hinzufuegen	
					$sqlInsert = new rex_sql();
					$sqlInsert->setTable(TBL_B1_OPF_LANG);
					$sqlInsert->setValue('id', $id);
					$sqlInsert->setValue('clang', $key);
					$sqlInsert->setValue('wildcard', $wild);
					$sqlInsert->setValue('replacement', $repl);
					$sqlInsert->insert();
				}
			}
		}
		$sql->next();
	}

}




function rex_b1_clang_delete($params)
{
  global $I18N, $REX;

  $id = (int)$params['id'];
	
	// abgleich der replacevalue felder..
	$sql = new rex_sql();
	$sql->debugsql = true;
	$sql->setQuery('DELETE FROM '.TBL_B1_OPF_LANG.' WHERE clang = "'.$id.'"');
	
}
