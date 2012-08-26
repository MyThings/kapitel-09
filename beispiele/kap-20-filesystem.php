<?php
/**
 * 20-filesystem.php
 * @package  Kapitel.Snippets
 * @author   WebMechanic.biz
 * @version  0.1.0
 * @license  CC-BY-NC 3.0/de
 */

// bei "JArchive" versagt der AutoLoader ;-)
jimport('joomla.filesystem.archive');

// die Daten sind immer top-aktuell
$jetzt = time();
// Dateiliste mit Arrays zu den Dateiangaben und Daten
$dateien   = array();
$dateien[] = array(
	'name'=>'hallo.txt', 'data'=>'Hallo!', 'time'=>$jetzt
);
$dateien[] = array(
	'name'=>'welt.ini', 'data'=>'world="Welt"', 'time'=>$jetzt
);

$archiv  = JFactory::getApplication()->getCfg('tmp_path');
$archiv .= '/hallowelt.zip';

$ok = JArchive::getAdapter('zip')->create($archiv, $dateien);
echo "{$archiv}", ($ok) ? ' erstellt.' : ' nicht erstellt.';
