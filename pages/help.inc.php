<?php

/**
 * XOutputFilter Addon
 *
 * @author andreaseberhard[at]gmail[dot]com Andreas Eberhard
 * @author <a href="http://www.redaxo.de">www.redaxo.de</a>
 *
 * @package redaxo4
 * @version svn:$Id$
 */


?>
<div class="rex-addon-output">
	<h2 class="rex-hl2"><?php echo $I18N->msg('opf_lang_help_title'); ?></h2>
	<div class="rex-addon-content">
<?php
  include($REX['INCLUDE_PATH'].'/addons/opf_lang/help.inc.php');
?>
	</div>
</div>
