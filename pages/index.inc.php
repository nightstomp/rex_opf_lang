<?php
/** 
 * Addon: 	by Thomas Blum
 * @author 	blumbeet - web.studio
 *					http://blumbeet.com
 */
 
include $REX['INCLUDE_PATH'].'/layout/top.php';
rex_title('Platzhalter ersetzen');

$basedir = dirname(__FILE__);

$table = TBL_B1_OPF_LANG;
$prefix_field = '';

$id = rex_request('id', 'int');
if ($id == 0)
	$id = rex_request($prefix_field.'id', 'int');
if ($id == 0)
	$id = rex_request($prefix_field.'pid', 'int');


$clang = rex_request('clang', 'int', '0');
$params = rex_request("params",'string');
$func = rex_request("func",'string');

echo b_languages($params);

//------------------------------> Liste
if ($func == '')
{
	$list = rex_list::factory('SELECT '.$prefix_field.'pid, 
																		'.$prefix_field.'id,
																		'.$prefix_field.'wildcard, 
																		'.$prefix_field.'replacement
													FROM 			'. $table .'
													WHERE			clang = "'.$clang.'"
													ORDER BY	'.$prefix_field.'wildcard 
											');
	// $list->debug = true;
	$list->addTableColumnGroup(array(40, 250, '*', 153));

	$list->addParam("clang", $clang);
	
	$imgHeader = '<a href="'. $list->getUrl(array('func' => 'add', 'clang' => $clang)) .'"><img src="media/metainfo_plus.gif" alt="'.$I18N->msg('b_504_add').'" title="'.$I18N->msg('b_504_add').'" /></a>';
	
	$list->addColumn($imgHeader, '###'.$prefix_field.'id###', 0, array('<th class="rex-icon">###VALUE###</th>','<td class="rex-small">###VALUE###</td>'));

	$list->removeColumn($prefix_field.'pid');
	$list->removeColumn($prefix_field.'id');
	
		
	$list->addColumn('function', $I18N->msg('edit'));
	$list->setColumnLabel('function', $I18N->msg('opf_lang_function'));
	$list->setColumnParams('function', array('func' => 'edit', $prefix_field.'id' => '###'.$prefix_field.'pid###', 'clang' => $clang));
	
	$list->setColumnSortable($prefix_field.'wildcard');
	$list->setColumnSortable($prefix_field.'replacement');
	
	$list->setColumnLabel($prefix_field.'wildcard', $I18N->msg('opf_lang_wildcard'));
	$list->setColumnLabel($prefix_field.'replacement', $I18N->msg('opf_lang_replacement'));
	
	$list->show();
 
}


if($func == "add" || $func == "edit")
{
	
	$legend = $I18N->msg('add');
	if ($func == 'edit')
		$legend = $I18N->msg('edit');
	
	$form = rex_form::factory($table, $I18N->msg('opf_lang_wildcard').' '.$legend, $prefix_field.'pid='.$id, 'post', false, 'rex_form_extended');
//	$form->debug = true;
	$form->addParam('clang', $clang);
	
	if($func == 'edit')
	{
		$form->addParam($prefix_field.'pid', $id);
	}
	
	// Sprachabhaengige Felder hinzufuegen
	if($func == 'add')
		$form->setLanguageDependent($prefix_field.'id', $prefix_field.'clang');
		
	
	if ($func == 'add')
		$field =& $form->addTextField($prefix_field.'wildcard');
	else
		$field =& $form->addReadOnlyField($prefix_field.'wildcard');
	$field->setLabel($I18N->msg('opf_lang_wildcard'));
	
	$field =& $form->addTextareaField($prefix_field.'replacement');
	$field->setLabel($I18N->msg('opf_lang_replacement'));
		
	$form->show();
		
		
}



include $REX['INCLUDE_PATH'].'/layout/bottom.php';
?>

