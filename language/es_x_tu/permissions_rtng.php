<?php
/**
 * Spanish permissions for Recent Topics NG.
 * @copyright (c) 2026, Fernando Coz
 * @license GNU General Public License, version 2 (GPL-2.0-only)
 */

if (!defined('IN_PHPBB'))
{
	exit;
}
if (empty($lang) || !is_array($lang))
{
	$lang = [];
}

$lang = array_merge($lang, [
	'ACL_CAT_RTNG' => 'Temas recientes',
	'ACL_U_RTNG_VIEW' => 'Puede ver el bloque de temas recientes.',
	'ACL_U_RTNG_ENABLE' => 'Puede mostrar u ocultar los temas recientes.',
	'ACL_U_RTNG_LOCATION' => 'Puede elegir dónde mostrar los temas recientes.',
	'ACL_U_RTNG_SORT_START_TIME' => 'Puede cambiar el orden de los temas.',
	'ACL_U_RTNG_UNREAD_ONLY' => 'Puede elegir si muestra solo temas no leídos.',
	'ACL_U_RTNG_DISP_LAST_POST' => 'Puede elegir el destino del enlace del título.',
	'ACL_U_RTNG_DISP_FIRST_UNRD_POST' => 'Puede elegir si el título enlaza al primer mensaje no leído.',
	'ACL_U_RTNG_INDEX_TOPICS_QTY' => 'Puede cambiar la cantidad de temas por página en el índice.',
	'ACL_U_RTNG_INDEX_PAGE_QTY' => 'Puede cambiar la cantidad de páginas en el índice.',
	'ACL_U_RTNG_SEPARATE_TOPICS_QTY' => 'Puede cambiar la cantidad de temas por página en la vista independiente.',
	'ACL_U_RTNG_SEPARATE_PAGE_QTY' => 'Puede cambiar la cantidad de páginas en la vista independiente.',
]);
