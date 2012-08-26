<?php
/**
 * 14-user.php
 * @package  Kapitel.Snippets
 * @author   WebMechanic.biz
 * @version  0.1.0
 * @license  CC-BY-NC 3.0/de
 */

// eine fast beliebige Benutzer-ID
$ident = 42;
// ein fast vollständiges Benutzer-Objekt
$user = JUser::getInstance($ident);
// und nun mit seinen Einstellungen (Sprache, Editor, Profil)
$user->load($user->id);
print_r($user);


// eine fast beliebige Benutzer-ID
$ident = 'Gucky';
// ein fast vollständiges Benutzer-Objekt
$user = JUser::getInstance($ident);
// und nun mit seinen Einstellungen (Sprache, Editor, Profil)
if ($user) {
	$user->load($user->id);
	print_r($user);
}
