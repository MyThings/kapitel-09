<?php
/**
 * 16-event.php
 * @package  Kapitel.Snippets
 * @author   WebMechanic.biz
 * @version  0.1.0
 * @license  CC-BY-NC 3.0/de
 */

// ein pluginloser "Event handler"
function jemandRuft($jemand) {
	echo "{$jemand} hat gerufen!";
}
$dispatcher = JDispatcher::getInstance();
// sagen wir ihm was wir machen
$dispatcher->register('onYelling', 'jemandRuft');

$jemand = "Gucky";
$dispatcher->trigger('onYelling', array($jemand));
