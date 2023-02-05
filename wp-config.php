<?php
/**
 * Основные параметры WordPress.
 *
 * Скрипт для создания wp-config.php использует этот файл в процессе
 * установки. Необязательно использовать веб-интерфейс, можно
 * скопировать файл в "wp-config.php" и заполнить значения вручную.
 *
 * Этот файл содержит следующие параметры:
 *
 * * Настройки MySQL
 * * Секретные ключи
 * * Префикс таблиц базы данных
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** Параметры MySQL: Эту информацию можно получить у вашего хостинг-провайдера ** //
/** Имя базы данных для WordPress */
define( 'DB_NAME', 'c15site' );

/** Имя пользователя MySQL */
define( 'DB_USER', 'c15mysql' );

/** Пароль к базе данных MySQL */
define( 'DB_PASSWORD', '20Deneme!' );

/** Имя сервера MySQL */
define( 'DB_HOST', 'localhost' );

/** Кодировка базы данных для создания таблиц. */
define( 'DB_CHARSET', 'utf8mb4' );

/** Схема сопоставления. Не меняйте, если не уверены. */
define( 'DB_COLLATE', '' );

/**#@+
 * Уникальные ключи и соли для аутентификации.
 *
 * Смените значение каждой константы на уникальную фразу.
 * Можно сгенерировать их с помощью {@link https://api.wordpress.org/secret-key/1.1/salt/ сервиса ключей на WordPress.org}
 * Можно изменить их, чтобы сделать существующие файлы cookies недействительными. Пользователям потребуется авторизоваться снова.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '}mh-qD/%Moz*Mj_<+:y<SX:$=v<ox%;gmh$XOy]bvrwUw(S8  0~:9z*b8Rp/`q~' );
define( 'SECURE_AUTH_KEY',  '9cBtZMk07-=9C%?5_5^c0AA/ ya<%@Z*KDLQ%Ab{=)~N[w<Se`J2SthGFOP_ju4s' );
define( 'LOGGED_IN_KEY',    'VSi^)toH7]<`j(x>>no<X{pu*bVJE5HU*#y[oMcu~#:/N)#wQtdkx8sn`r+)bL7a' );
define( 'NONCE_KEY',        'f[tCZWHjun=F?E+3#-I=h:iuVW` 1X>#J^t$|Og}DStme]G/#rGXfn<,=v,//(0%' );
define( 'AUTH_SALT',        'ESO5}mm//8<<2lI1Ijl~VmfC2PE0n66c{f:XHAhEfb:UnaN ti_ ^(9LzMBZrl[4' );
define( 'SECURE_AUTH_SALT', 'tuR{xh<GNu:5f7XF!!`6;=76lAsN:Y,:bC9%EfmS{Ea?7+_:w2M{8(@k-Kd14rFI' );
define( 'LOGGED_IN_SALT',   'sS-^.wo I-J-QNy<^^dF^B`Zc+7?N.U3~H9`OVq|+me-{5XAq5v/bR?UM!4^#:HT' );
define( 'NONCE_SALT',       'DU5s5f&%/S1vHO}aM}|UDRv&cZ)1`7fkcGfIP$5^D0~ns;MTN;Cz6OiC^z:gu3lb' );

/**#@-*/

/**
 * Префикс таблиц в базе данных WordPress.
 *
 * Можно установить несколько сайтов в одну базу данных, если использовать
 * разные префиксы. Пожалуйста, указывайте только цифры, буквы и знак подчеркивания.
 */
$table_prefix = 'wp_';

/**
 * Для разработчиков: Режим отладки WordPress.
 *
 * Измените это значение на true, чтобы включить отображение уведомлений при разработке.
 * Разработчикам плагинов и тем настоятельно рекомендуется использовать WP_DEBUG
 * в своём рабочем окружении.
 *
 * Информацию о других отладочных константах можно найти в Кодексе.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define( 'WP_DEBUG', false );

/* Это всё, дальше не редактируем. Успехов! */

/** Абсолютный путь к директории WordPress. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Инициализирует переменные WordPress и подключает файлы. */
require_once( ABSPATH . 'wp-settings.php' );
