<pre><?php
/**
 * 1-base.php
 * @package  Kapitel.Snippets
 * @author   WebMechanic.biz
 * @version  0.1.0
 * @license  CC-BY-NC 3.0/de
 */

// kurz und knackig: "leere" Thingy-Klasse und eine Instanz davon.
class Thingy extends JObject {}
$item = new Thingy;

// löst eine Warnung aus, da die Eigenschaft nicht existiert
echo 'Zugriff auf die Eigenschaft $name: ';
try {
	echo $item->name;
} catch (Exception $e) {
	echo $e->getMessage();
}

// hier liefert get() den Standardwert NULL
echo BR, 'get 1: ', $item->get('name');
// hier (und nur hier!) den Ersatzwert
echo BR, 'get 2: ', $item->get('name', 'Contao');
// und hier einen anderen Ersatzwert
echo BR, 'get 3: ', $item->get('name', 'Drupal');

// setzt die Eigenschaft auf 'Joomla! 1.5' WENN sie vorher NULL war!
echo BR, 'def:  ', $item->def('product', 'Joomla! 1.5'); // liefert den alten Wert, also nichts
echo BR, 'get : ', $item->get('product');                // 'Joomla! 1.5'
echo BR, 'prop: ', $item->product;                        // 'Joomla! 1.5'

$zuerst = $item->def('product', 'Joomla! 1.7'); // ist bereits gesetzt, also bleibt es bei 'Joomla! 1.5'
$danach = $item->set('product', 'Joomla! 2.5');
$jetzt  = $item->get('product');

echo BR, "Update von {$zuerst} über {$danach} auf {$jetzt} ?!";

?></pre>
