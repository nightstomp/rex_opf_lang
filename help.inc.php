<?php

/**
 * opf_lang Addon
 *
 * @author Thomas Blum / Hirbod Mirjavadi
 * @author <a href="http://www.nightstomp.com">www.nightstomp.com</a>
 *
 * @package redaxo4
 * @version svn:$Id$
 */

  ob_start();
?>
<strong>OPF Language <span style="font-size:10px;">(Version 1.5)</span></strong>
<p>
Mit dem Addon opf_lang hat man die Möglichkeit über den Extension-Point OUTPUT_FILTER die Ausgabe der REDAXO-Seite zu beeinflussen (aktuell nur Frontend).
Die Hauptaufgabe dieses Addons ist die Ersetzung von Markern/Konstanten in der jeweiligen Sprache und die Kennzeichnung von Abkürzungen und Akronymen.

Über eine Programmschnittstelle kann in Modulen und Addons auf die Sprachersetzungen zugegriffen werden.

</p>
<div style="background-color:#cbcbcb;height:1px;" /></div>
<p>
<strong>Verwendung der Sprachersetzungen in Modulen oder Addons:</strong>

$x = new opf_lang();
$wert = $x->get(MARKER, [Sprache]);

Beispiele:
echo $x->get('%%copyright%%');
echo $x->get('%%copyright%%', 0);
echo $x->get('%%copyright%%', $REX['CUR_CLANG']);

Sprachersetzungen auf eigenen HTML-Code anwenden:
$x = new opf_lang();
echo $x->get($my_content, $REX['CUR_CLANG']);

</p>

<?php
  $out = ob_get_contents();
  ob_end_clean();
  echo nl2br($out);
