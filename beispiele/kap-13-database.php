<?php
/**
 * 13-database.php
 * @package  Kapitel.Snippets
 * @author   WebMechanic.biz
 * @version  0.1.0
 * @license  CC-BY-NC 3.0/de
 */

// das DBO braucht man später sowieso ;)
$dbo = JFactory::getDbo();

// ein LEERES Abfrageobjekt
$qry = $dbo->getQuery(true);

// die Abfrage erstellen
$qry->select('id, title, module, published')
    ->from('#__modules')
    ->where('client_id=0')
    ->order('title');

// der Verbindung (wieder) zuordnen
$dbo->setQuery($qry);
echo $qry->dump();

$rows = $dbo->loadObjectList('id');
KapitelHelper::meldung(print_r($rows, 1), false);

// kleiner Umbau: andere Client-ID (App) abfragen
$qry->clear('where')
	->where('client_id=1');
echo $qry->dump();

// zuweisen, laden, ausgeben
$modules = $dbo->setQuery($qry)
				->loadObjectList('id');

foreach ($modules as $id => $module) { 
	// Tabellenspalten ~ Eigenschaften einer Zeile ($module)
	echo $module->title, ' (Position: ', $module->position, ')'; 
}

KapitelHelper::meldung(print_r($modules, 1), false);
