<?php
/** 
 * Addon: 	by Thomas Blum / Hirbod Mirjavadi
 * @author 	blumbeet - web.studio / nightstomp web development
 *					http://blumbeet.com | http://nightstomp.com
 */


$mypage = 'opf_lang'; // only for this file

$basedir = dirname(__FILE__);

if ($REX['REDAXO'])
{
	$I18N->appendFile($REX['INCLUDE_PATH'].'/addons/'.$mypage.'/lang/');
}

$REX['ADDON']['rxid'][$mypage] = "b_1";
$REX['ADDON']['page'][$mypage] = $mypage;
$REX['ADDON']['name'][$mypage] = 'Platzhalter ersetzen';
$REX['ADDON']['perm'][$mypage] = 'opf_lang[]';
$REX['ADDON']['version'][$mypage] = '1.5.2';
$REX['ADDON']['author'][$mypage] = 'Jan Kristinus, Thomas Blum, Hirbod Mirjavadi';
$REX['ADDON']['supportpage'][$mypage] = 'forum.redaxo.de';
$REX['ADDON']['table_prefix'][$mypage] = $REX['TABLE_PREFIX'].$REX['ADDON']['rxid'][$mypage].'_';
$REX['ADDON']['path'][$mypage] = $REX['INCLUDE_PATH'].'/addons/'.$mypage;

$REX['ADDON'][$mypage]['open_tag'] = '{{ ';
$REX['ADDON'][$mypage]['close_tag'] = ' }}';

$REX['PERM'][] = 'opf_lang[]';

$prefix = $REX['ADDON']['table_prefix'][$mypage];

if (!defined('TBL_B1_OPF_LANG')) {
  define('TBL_B1_OPF_LANG', $prefix.'opf_lang');
}

// require always (front- and backend)
require_once $basedir.'/classes/class.opf_lang.inc.php';

// require only in frontend
if (!$REX['REDAXO'])
{	
  require_once $basedir.'/extensions/extension_opf_lang.inc.php';
	rex_register_extension('OUTPUT_FILTER', 'rex_b1_opf_lang');
}


// require only in backend
if ($REX['REDAXO'])
{	
  require_once $basedir.'/classes/class.rex_form_extended.inc.php';
  require_once $basedir.'/extensions/extension_clang.inc.php';
  require_once $basedir.'/functions/function_b_languages.inc.php';
	
	rex_register_extension('CLANG_ADDED', 'rex_b1_clang_added');
	rex_register_extension('CLANG_DELETED', 'rex_b1_clang_delete');
}
?>
