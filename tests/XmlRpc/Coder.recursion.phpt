<?php

/**
 * Test: recursion
 *
 * @author  Miloslav Hůla
 */

use Milo\XmlRpc\Coder,
	Milo\XmlRpc\IValueConvertible;

require __DIR__ . '/../bootstrap.php';



$coder = new Milo\XmlRpc\Coder;
$doc = new DOMDocument;



Assert::exception(function() use ($coder, $doc) {
	$var = array();
	$var[0] = & $var;

	$coder->encodeValueNode($doc, $var);
}, 'InvalidArgumentException', 'Nesting level too deep or recursive dependency. Try to increase Milo\XmlRpc\Coder::$maxEncodeDepth');
