<?php
/**
 * Recent Topics NG — traducción para español (tú).
 *
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
	'RTNG_NO_TOPICS' => 'No hay temas nuevos para mostrar.',
	'RTNG_TOPICS_COUNT' => '%d temas',
	'RTNG_TITLE' => 'Temas recientes',
	'RTNG_UNREAD_TITLE' => 'Temas sin leer',
	'RTNG_READ_SEPARATE' => 'Lectura de «%s»',
	'RTNG_READ_SIMPLE' => 'Lectura de «%s» (página simplificada)',
]);
