<?php
/**
 * Spanish language pack for Recent Topics NG.
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
	'RTNG_LANG_DESC' => 'Español rioplatense',
	'RTNG_LANG_VER' => '1.2.0',
	'RTNG_LANG_AUTHOR' => 'Fernando Coz',
	'RTNG_FORUMS' => 'Mostrar en «Temas recientes»',
	'RTNG_FORUMS_EXPLAIN' => 'Activá esta opción para mostrar los temas de este foro en la lista de temas recientes.',
	'RTNG_NAME' => 'Temas recientes',
	'RTNG_CONFIG' => 'Configuración',
	'RTNG_EXPLAIN' => 'En esta página podés configurar la extensión <strong>«%s»</strong>.<br><br>Podés incluir o excluir foros editando cada foro desde el PCA.<br>También revisá los permisos de usuario, que determinan qué opciones puede cambiar cada persona.',
	'RTNG_LOAD_OPTIONS' => 'Opciones de «Temas recientes»',
	'RTNG_LOAD_FIRST_UNRD_POST' => 'Permitir el acceso al primer mensaje no leído',
	'RTNG_LOAD_FIRST_UNRD_POST_EXPLAIN' => 'Al activar esta opción se consultan los datos del primer mensaje no leído.<br>También debe estar activada la opción «<u><a href="#load_db_lastread">Marcar temas desde el servidor</a></u>».',
	'RTNG_GLOBAL_SETTINGS' => 'Configuración general',
	'RTNG_INDEX_DISPLAY_EXP' => 'Mostrar en el índice',
	'RTNG_ALL_TOPICS' => 'Mostrar todas las páginas de temas recientes',
	'RTNG_ALL_TOPICS_EXP' => 'Esta opción ignora los límites de cantidad de páginas y las muestra todas.',
	'RTNG_MIN_TOPIC_LEVEL' => 'Tipo mínimo de tema',
	'RTNG_MIN_TOPIC_LEVEL_EXP' => 'Muestra temas del tipo seleccionado y de los tipos superiores.',
	'RTNG_ANTI_TOPICS' => 'ID de temas excluidos',
	'RTNG_ANTI_TOPICS_EXP' => 'Ingresá los ID separados por comas (por ejemplo: 7,9). Usá 0 para mostrar todos los temas. El ID aparece en la URL, por ejemplo viewtopic.php?t=12345.',
	'RTNG_PARENTS' => 'Mostrar foros superiores',
	'RTNG_PARENTS_EXP' => 'Muestra los foros superiores en la fila de cada tema reciente.',
	'RTNG_SIMPLE_LINK' => 'Enlace a la página simplificada',
	'RTNG_SIMPLE_TOPICS_QTY' => 'Temas por página en la vista simplificada',
	'RTNG_SIMPLE_TOPICS_QTY_EXP' => 'Cantidad máxima de temas por página en la vista simplificada.',
	'RTNG_SIMPLE_PAGE_QTY' => 'Páginas en la vista simplificada',
	'RTNG_SIMPLE_PAGE_QTY_EXP' => 'Cantidad máxima de páginas de la lista simplificada.',
	'RTNG_OVERRIDABLE' => 'Preferencias que cada usuario puede cambiar',
	'RTNG_OVERRIDABLE_EXPLAIN' => 'Para que cada usuario pueda cambiar estas preferencias desde su panel de control, asignale el permiso correspondiente. Si no tiene ese permiso, se aplicará el valor predeterminado. Estos valores también se usan para cuentas nuevas; los invitados no pueden ver los temas recientes.<br><br>Para mostrar el título, autor y fecha del primer mensaje no leído, activá la opción correspondiente en la configuración de <u><a href="%s">carga del servidor</a></u>.',
	'RTNG_ENABLE' => 'Mostrar temas recientes',
	'RTNG_LOCATION' => 'Ubicación',
	'RTNG_LOCATION_EXP' => 'Elegí dónde mostrar el bloque de temas recientes.',
	'RTNG_TOP' => 'Arriba de la lista de foros',
	'RTNG_BOTTOM' => 'Debajo de la lista de foros',
	'RTNG_SIDE' => 'Al costado',
	'RTNG_SEPARATE' => 'Solo en la página independiente',
	'RTNG_SORT_START_TIME' => 'Ordenar por fecha de inicio del tema',
	'RTNG_SORT_START_TIME_EXP' => 'Ordena los temas por su fecha de creación en lugar de la fecha del último mensaje.',
	'RTNG_UNREAD_ONLY' => 'Mostrar solo temas no leídos',
	'RTNG_UNREAD_ONLY_EXP' => 'Muestra únicamente temas no leídos. Esta opción solo funciona para usuarios conectados; los invitados ven la lista normal.',
	'RTNG_DISP_LAST_POST' => 'Destino del enlace del título',
	'RTNG_DISP_LAST_POST_EXP' => 'Elegí si al hacer clic en el título se abre el primer o el último mensaje del tema.',
	'RTNG_FIRST_POST' => 'Ir al primer mensaje',
	'RTNG_LAST_POST' => 'Ir al último mensaje',
	'RTNG_DISP_FIRST_UNRD_POST' => 'Enlazar el título con el primer mensaje no leído',
	'RTNG_DISP_FIRST_UNRD_POST_EXP' => 'Si está activada y hay mensajes no leídos, el título lleva al primero de ellos. Si no los hay, se aplica la opción «Destino del enlace del título».',
	'RTNG_INDEX_TOPICS_QTY' => 'Temas por página en el índice',
	'RTNG_INDEX_TOPICS_QTY_EXP' => 'Cantidad máxima de temas por página en el índice del foro.',
	'RTNG_INDEX_PAGE_QTY' => 'Páginas en el índice',
	'RTNG_INDEX_PAGE_QTY_EXP' => 'Cantidad máxima de páginas de temas recientes en el índice.',
	'RTNG_SEPARATE_TOPICS_QTY' => 'Temas por página en la página independiente',
	'RTNG_SEPARATE_TOPICS_QTY_EXP' => 'Cantidad máxima de temas por página en la vista independiente.',
	'RTNG_SEPARATE_PAGE_QTY' => 'Páginas en la vista independiente',
	'RTNG_SEPARATE_PAGE_QTY_EXP' => 'Cantidad máxima de páginas de la lista independiente.',
	'RTNG_RESET_DEFAULT' => 'Reemplazar las preferencias de todos los usuarios',
	'RTNG_RESET_DEFAULT_EXP' => 'Al activarlo, se reemplazan las preferencias de todas las cuentas. Si no, solo se guardan los valores predeterminados para cuentas nuevas; los invitados no pueden ver los temas recientes.',
	'RTNG_RESET_ASK_BEFORE_EXP' => 'Esta acción reemplazará las preferencias de todas las cuentas con los valores predeterminados.<br><strong>No se puede deshacer.</strong>',
]);
