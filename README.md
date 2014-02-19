opf_lang
========

Sprachersetzungen für Redaxo. Einfach installieren und Platzhalter definieren.

Original: http://www.redaxo.org/de/download/addons/?addon_id=1153&searchtxt=opf_lang&cat_id=-1

Diese Version läuft unter REX 4.2x - REX 4.5x
PHP 5, 5.3 und 5.4 ready

Beachten: Ordner in opf_lang umbenennen und ins AddOn Verzeichnis hochladen.
Neu in dieser Version: direktes Ersetzen von Strings und neue Hilfeseite.

Beispiel:

```php
$x = new opf_lang();
$wert = $x->get(MARKER, [Sprache]);

//Beispiele:
echo $x->get('%%copyright%%');
echo $x->get('%%copyright%%', 0);
echo $x->get('%%copyright%%', $REX['CUR_CLANG']);

Sprachersetzungen auf eigenen HTML-Code anwenden:
$x = new opf_lang();
echo $x->replace($my_content, $REX['CUR_CLANG']);

````
