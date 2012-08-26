<?php
/**
 * 12-registry.php
 * @package  Kapitel.Snippets
 * @author   WebMechanic.biz
 * @version  0.1.0
 * @license  CC-BY-NC 3.0/de
 */

// 1. Struktur: ein Array
$j25 = array(
	'title'       => 'Joomla! 2.5',
	'description' => 'Web Content Management System'
);

// 2. Struktur: ein Objekt
$jp11 = new JObject;
$jp11->title       = 'Joomla! Platform 11.4';
$jp11->description = 'PHP Framework';

// beides in die Registry
$jstuff = new JRegistry;
$jstuff->set('joomla.cms', $j25);
$jstuff->set('joomla.platform', $jp11);


// intern immer noch Array, scheint 'cms' keinen Titel zu haben
echo $jstuff->get('joomla.cms.title'), PHP_EOL;
// das echte Objekt 'platform' hat eine Eigenschaft 'title'
echo $jstuff->get('joomla.platform.title'), PHP_EOL;

echo '<xmp>', print_r( $jstuff->get('joomla') ), '</xmp>';
