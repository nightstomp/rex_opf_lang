<?php

// CREATE/UPDATE DATABASE
$sql = new rex_sql();
// $sql->debugsql=1;


// ----- usertabelle
$sql->setQuery("
CREATE TABLE `rex_b_1_opf_lang` (
`pid` INT(11) unsigned NOT NULL auto_increment,
`id` INT(11) NOT NULL,
`clang` VARCHAR(255) NOT NULL,
`replacement` TEXT NOT NULL,
`wildcard` VARCHAR(255) NOT NULL,
PRIMARY KEY ( `pid` )
);");


$REX['ADDON']['install']['opf_lang'] = 1;

?>