<?php
/**
 * 99-router.php
 * @package  Kapitel.Snippets
 * @author   WebMechanic.biz
 * @version  0.1.0
 * @license  CC-BY-NC 3.0/de
 *
 * @var string $pax Paketname der an sandbox() übergeben wurde
 */

// DER Router
$router = clone JFactory::getApplication()->getRouter();

$router->attachBuildRule('kapBuildRoute');
$router->attachParseRule('kapParseRoute');

function kapBuildRoute(&$router, &$uri)
{
	$query = $uri->getQuery(true);
}

function kapParseRoute(&$router, &$uri)
{
	$query = $uri->getQuery(true);
}

$links = array(
	'index.php?pax=',
	'index.php?option=com_content&pax=',
	'index.php?option=com_mythings&pax=',
	'index.php/component/mythings?pax=',
	'index.php/component/mythings/1?pax=',
	'index.php/component/mythings/mything/2?pax=',
);
?>
<table class="mythings data router">
	<thead>
		<tr><th>08/15 URL</th><th>JRoute::_()</th></tr>
	</thead>
	<tbody class="xmpl">
<?php
	foreach ($links as $link) {
		$link .= $pax;
		$route = $router->build($link);
?>
	<tr>
		<td><?php printf('<a href="%s">%s</a>', $link, $link); ?></td>
		<td><?php printf('<a href="%s">%s</a>', $route, $route); ?></td>
	</tr>
<?php
	}
?>
	</tbody>
</table>

<xmp><?= print_r($router, 1) ?></xmp>
