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

        $params = array('subject' => $content, 'clang' => $lang);

        return rex_b1_opf_lang($params);
        
    }
}
