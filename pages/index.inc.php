<?php

/**
 * opf_lang Addon
 *
 * @author Thomas Blum / Hirbod Mirjavadi
 *
 *
 * @package redaxo4
 * @version svn:$Id$
 */

$Basedir = dirname(__FILE__);

$page = rex_request('page', 'string');
$subpage = rex_request('subpage', 'string');
$func = rex_request('func', 'string');

require $REX['INCLUDE_PATH'].'/layout/top.php';

$subpages = array(
  array('',$I18N->msg('opf_lang_addon_name')),
  array('help',$I18N->msg('opf_lang_help')),
);

rex_title($I18N->msg('opf_lang_addon_name'), $subpages);

switch($subpage)
{
    case 'help':
        require $Basedir .'/help.inc.php';
    break;
    default:
        require $Basedir .'/settings.inc.php';
}

require $REX['INCLUDE_PATH'].'/layout/bottom.php';

?>