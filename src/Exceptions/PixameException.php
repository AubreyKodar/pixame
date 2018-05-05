<?php
/**
 * Created by PhpStorm.
 * User: aubreykodar
 * Date: 2018/05/05
 * Time: 2:18 PM
 */

namespace AubreyKodar\Pixame\Exceptions;


use Throwable;

class PixameException extends \Exception {

	public function __construct( $message = "", $code = 0, Throwable $previous = null ) {
		parent::__construct( $message, $code, $previous );
	}
}