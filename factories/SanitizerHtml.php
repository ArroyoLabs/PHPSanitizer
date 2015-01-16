<?php
/**
 * Created by PhpStorm.
 * User: leodaido
 * Date: 1/16/15
 * Time: 2:19 PM
 */

require_once(dirname(__FILE__).'/AbstractSanitizer.php');
require_once(dirname(__FILE__).'/ISanitizer.php');

class SanitizerHtml extends AbstractSanitizer implements ISanitizer{
    private $pattern = array('/\&/', '/</', "/>/", '/\n/', '/"/', "/'/", "/%/", '/\(/', '/\)/', '/\+/', '/-/');
    private $replacement = array('&amp;', '&lt;', '&gt;', '<br>', '&quot;', '&#39;', '&#37;', '&#40;', '&#41;', '&#43;', '&#45;');

    public function validate($string){
        return (preg_match_all($this->pattern, $string)===0);
    }

    public function cleanup($string){
        return preg_replace($this->pattern, $this->replacement, $string);
    }
}