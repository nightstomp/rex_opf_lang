<?php

function rex_b1_opf_lang($params)
{
    global $REX;

    $content = $params['subject'];

    $clang = (isset($params['clang']) && (int)$params['clang'] >= 0) ? (int)$params['clang'] : $REX['CUR_CLANG'];
    
    $sql = rex_sql::factory();
    $sql->setQuery('SELECT replacement, wildcard FROM '. TBL_B1_OPF_LANG .' WHERE clang = "' . $clang . '"');
    
    $srch = array();
    $rplc = array();
    $rows = $sql->getRows();
    
    for ($i = 0; $i < $rows; $i++, $sql->next()) {

        $srch[] = $REX['ADDON']['opf_lang']['open_tag'] . $sql->getValue('wildcard') . $REX['ADDON']['opf_lang']['close_tag'];
        $rplc[] = nl2br($sql->getValue('replacement'));

    }
    
    return str_replace($srch, $rplc, $content);
    
}
?>
