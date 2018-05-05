<?php
/**
 * Created by PhpStorm.
 * User: aubreykodar
 * Date: 2018/05/05
 * Time: 1:23 PM
 */

require 'vendor/autoload.php';
use AubreyKodar\Pixame\Pixame;

$px = new Pixame('8742650-e8c751eacf5113912547d9aa9');
echo "<pre>";
var_dump($px->Search('yellow flowers',false));
echo "</pre>";