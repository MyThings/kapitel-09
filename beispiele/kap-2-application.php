<?php
/**
 * 2-application.php
 * @package  Kapitel.Snippets
 * @author   WebMechanic.biz
 * @version  0.1.0
 * @license  CC-BY-NC 3.0/de
 */

$cmps = array('content', 'schnrzl', 'contact');

echo '<ul>';
// isEnabled nur brauchbar mit $strict = true
foreach ($cmps as $base) {
	echo '<li>', ucfirst($base), ': ', 
		(JComponentHelper::isEnabled('com_'.$base) ? 'Ja' : 'Nein'),
		' &bull; ',
		(JComponentHelper::isEnabled('com_'.$base, true) ? 'Ja' : 'Nein');
}
echo '</ul>';

// Params-Schnuffler
echo '<dl>';
foreach ($cmps as $base) {
	$cp = JComponentHelper::getComponent('com_'.$base);
	echo '<dt>', ucfirst($base), '</dt>';
	echo '<dd><pre>', print_r($cp, 1), '</pre></dd>';
}
echo '</dd>';
