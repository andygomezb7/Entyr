<?php
/**
 * Smarty plugin
 * @package Smarty
 * @subpackage plugins
 */


/**
 * Smarty cat modifier plugin
 *
 * Type:     modifier
 * Name:     base4
 * Date:     Oct 14, 2010
 * Purpose:  catenate a value to a variable
 * Input:    string to catenate
 * Example:  {$var|seo}
 * @link http://smarty.php.net/manual/en/language.modifier.cat.php cat
 *          (Smarty online manual)
 * @author   Ivan Molina Pavana
 * @version 1.0
 * @param string
 * @param string
 * @return string
 */
function smarty_modifier_base4($string){
	$img_src = $string;
    $imgbinary = fread(fopen($img_src, "r"), filesize($img_src));
    $img_str = base64_encode($imgbinary);
    $strings = 'data:image/jpg;base64,'.$img_str;
	//
	return $strings;
}

/* vim: set expandtab: */

?>
