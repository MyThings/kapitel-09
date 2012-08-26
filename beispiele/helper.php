<?php
/**
 * helper.php
 * @package  Kapitel.Snippets
 * @author   WebMechanic.biz
 * @version  0.1.0
 * @license  CC-BY-NC 3.0/de
 */

define('BR', PHP_EOL.'<br>');

class KapitelHelper
{
	static $folder = '/kapitel09';

	static $elf = array(
		'base' => 1,
		'application' => 2,
		'document' => 0,
		'html' => 4,
		'form' => 0,
		'filter' => 0,
		'string' => 0,
		'language' => 0,
		'environment' => 0,
		'utilities' => 0,
		'session' => 0,
		'registry' => 12,
		'database' => 13,
		'user' => 14,
		'access' => 0,
		'plugin' => 0,
		'event' => 16,
		'error' => 0,
		'log' => 0,
		'mail' => 0,
		'filesystem' => 20,
		'client' => 0,
		'http' => 0,
		'github' => 0,
		'cache' => 0,
		'installer' => 0,
		'updater' => 0,
		'image' => 0,
		/* extrawuerste */
		'cms' => 0,
		'jfactory' => 0,
		'jhtml' => 0,
		'router' => 99
	);

	/**
	 * Generiert die HTML-Menüeinträge mit Paketnamen der Platform und
	 * Links auf die Beispielskripte.
	 *
	 * @param  object $menu_item  Der aktive Menüeintrag
	 * @param  null   $pax        Der Paketname aus der URL (oder nix)
	 * @return string HTML für ein Menü
	 */
	static function menu($menu_item, $pax=null) {
		$html = '';
		$href = $menu_item->link .'&Itemid='. $menu_item->id;
		foreach (self::$elf as $pack => $avail) {
			$cls  = ($avail) ? ' xmpl' : '';
			$cls .= ($pack == $pax) ? ' the-pack' : '';

			// ein ekeliges HTML-Geklebe
			$html .= '<li class="mi'. $cls .'">'
				.   ($avail ? '<a href="'. $href .'&pax='. $pack . '">' : '')
				.   '<span class="mi">'. $pack .'</span>'
				.   ($avail ? '</a>' : '')
				.   '</li>';
		}

		return $html;
	}

	/**
	 * Sandkasten zum Ausführen der Beispieldateien.
	 *
	 * @param  string $pax Paketname aus der URL ?pax=xxx
	 * @return string Beispielcode oder Fehlermeldung :)
	 */
	static function sandbox($pax) {
		if (!is_dir(JPATH_BASE . self::$folder)) {
			return self::meldung('Beispiele-Verzeichnis '. JPATH_BASE . self::$folder . ' nicht gefunden.');
		}

		if (!isset(self::$elf[$pax])) {
			return self::meldung('Beispiel '. $pax . ' nicht gefunden.');
		}

		$base_name = implode('-', array('kap', self::$elf[$pax], $pax));
		$path_name = JPATH_BASE . self::$folder .'/'. $base_name .'.php';
		try {
			include $path_name;
		} catch(ErrorException $e) {
			self::meldung($e->getMessage());
		}

	}

	static function meldung($txt, $formatted = true) {
		return ($formatted)
				? '<p>'.$txt.'</p>'
				: '<xmp>'.$txt.'</xmp>';
	}

}

