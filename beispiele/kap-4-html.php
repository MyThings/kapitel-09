<?php
/**
 * 4-html.php
 * @package  Kapitel.Snippets
 * @author   WebMechanic.biz
 * @version  0.1.0
 * @license  CC-BY-NC 3.0/de
 */

echo KapitelHelper::meldung('access.actions');
// echo JHtml::_('access.actions', 'actions', '', 'com_banners', 'category');

echo KapitelHelper::meldung('access.level');
echo JHtml::_('access.level', 'access_level', '');

echo KapitelHelper::meldung('access.assetgroups');
print_r( JHtml::_('access.assetgroups') );

echo KapitelHelper::meldung('access.assetgrouplist');
echo JHtml::_('access.assetgrouplist', 'assetgrouplist', '');

echo KapitelHelper::meldung('access.usergroup');
echo JHtml::_('access.usergroup', 'usergroup', '');

echo KapitelHelper::meldung('access.usergroups');
echo JHtml::_('access.usergroups', 'usergroups', '');

/* mehr HTML Paketkram */
echo '<h2>JToolbar</h2>';
JLoader::import('joomla.html.toolbar');
$tbar = JToolBar::getInstance('werkzeugleiste');

// beknacktes, nicht-intuitives Interface:
// Label, action, alt-Attribut, task,
$tbar->appendButton('Standard', 'new', 'Neu', 'add', false);
$tbar->appendButton('Standard', 'assign', 'Speichern', 'save', true);
$tbar->appendButton('Confirm' , 'Wirklich löschen?', 'delete', 'Löschen', 'delete', true);

echo '<xmp>', $tbar->render(), '</xmp>';
