<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class Caminhos
{
	/**
	 * Authenticates a user.
	 * The example implementation makes sure if the username and password
	 * are both 'demo'.
	 * In practical applications, this should be changed to authenticate
	 * against some persistent user identity storage (e.g. database).
	 * @return boolean whether authentication succeeds.
	 */

	public static function ROOT()
	{
		return Yii::app()->request->baseUrl;
	}

	public static function Theme()
	{
		//var_dump( Yii::app()->theme);die("ok");
		return Yii::app()->theme->baseUrl;
	}
	
	public static function Index()
	{
		//$return = Yii::app()->createAbsoluteUrl('/');
		//$return = explode(Yii::app()->request->baseUrl,$return);
		return Yii::app()->request->baseUrl.'/index.php';
	}
	
	public static function Img()
	{
		return Yii::app()->request->baseUrl.'/images';
	}

	public static function Avatar()
	{
		return Yii::app()->request->baseUrl.'/images/avatar/';
	}

	public static function encodeSEOString($string)
	{
		$string = preg_replace("`\[.*\]`U","",$string);
		$string = preg_replace('`&(amp;)?#?[a-z0-9]+;`i','-',$string);
		$string = htmlentities($string, ENT_COMPAT, 'utf-8');
		$string = preg_replace( "`&([a-z])(acute|uml|circ|grave|ring|cedil|slash|tilde|caron|lig|quot|rsquo);`i","\\1", $string );
		$string = preg_replace( array("`[^a-z0-9]`i","`[-]+`") , "-", $string);
		return strtolower(trim($string, '-'));
	 
	}
}