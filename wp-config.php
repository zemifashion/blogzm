<?php
/**
 * Cấu hình cơ bản cho WordPress
 *
 * Trong quá trình cài đặt, file "wp-config.php" sẽ được tạo dựa trên nội dung 
 * mẫu của file này. Bạn không bắt buộc phải sử dụng giao diện web để cài đặt, 
 * chỉ cần lưu file này lại với tên "wp-config.php" và điền các thông tin cần thiết.
 *
 * File này chứa các thiết lập sau:
 *
 * * Thiết lập MySQL
 * * Các khóa bí mật
 * * Tiền tố cho các bảng database
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** Thiết lập MySQL - Bạn có thể lấy các thông tin này từ host/server ** //
/** Tên database MySQL */
define( 'DB_NAME', 'newspaper' );

/** Username của database */
define( 'DB_USER', 'root' );

/** Mật khẩu của database */
define( 'DB_PASSWORD', '' );

/** Hostname của database */
define( 'DB_HOST', 'localhost' );

/** Database charset sử dụng để tạo bảng database. */
define( 'DB_CHARSET', 'utf8mb4' );

/** Kiểu database collate. Đừng thay đổi nếu không hiểu rõ. */
define('DB_COLLATE', '');

/**#@+
 * Khóa xác thực và salt.
 *
 * Thay đổi các giá trị dưới đây thành các khóa không trùng nhau!
 * Bạn có thể tạo ra các khóa này bằng công cụ
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * Bạn có thể thay đổi chúng bất cứ lúc nào để vô hiệu hóa tất cả
 * các cookie hiện có. Điều này sẽ buộc tất cả người dùng phải đăng nhập lại.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '(/o^LgYOi!T(3TFnLy<<HhvRd1I~eoijO%Q}.eZrOYBb|q>6`xpeO@3V[lzLrr&&' );
define( 'SECURE_AUTH_KEY',  ' ?N))fodgzdh;,{6z3LvQo-H,;Rr_A?T,`~O.6bJF4efX`UiG``NLkxqc`Z<K&Y(' );
define( 'LOGGED_IN_KEY',    'Es@Wb+4uA;_|kKG[:Xk$x1c}d xZ_/CJbc6w86[+N@;1&(vtCM-IKu0pEGN?htlx' );
define( 'NONCE_KEY',        '@v/nv{]Z~qL1m?R<ib rISHgP$<S78:}gR9na6.F>S]$!reMA8dCjtQ&_fLUZ=ss' );
define( 'AUTH_SALT',        'ivOlSYO>(&J&vQV1s- |`%O&QC%3c4P8}hv4,U,%7fL+u*_GL]eD9jL1z~D00:E ' );
define( 'SECURE_AUTH_SALT', 'hY,dHG2o=UH?duh7Z0`VeHhMef15*yb%utV+|RcLvU7pB{K<}_t)NqQmwRYt;A{V' );
define( 'LOGGED_IN_SALT',   'oWRv.T%:juWKcs(Pfcg6@0+d.^wP#G~*n{maaA#Ur5WRbsP6G{_fH9dx[=)2eX/i' );
define( 'NONCE_SALT',       ')LTTF1`x)LaT/f`=@x;^QhgXQ.-ehqn}Grk`O?Cw}Z5Yeg *s!KfM.z@k`A^%Dii' );

/**#@-*/

/**
 * Tiền tố cho bảng database.
 *
 * Đặt tiền tố cho bảng giúp bạn có thể cài nhiều site WordPress vào cùng một database.
 * Chỉ sử dụng số, ký tự và dấu gạch dưới!
 */
$table_prefix = 'wp_';

/**
 * Dành cho developer: Chế độ debug.
 *
 * Thay đổi hằng số này thành true sẽ làm hiện lên các thông báo trong quá trình phát triển.
 * Chúng tôi khuyến cáo các developer sử dụng WP_DEBUG trong quá trình phát triển plugin và theme.
 *
 * Để có thông tin về các hằng số khác có thể sử dụng khi debug, hãy xem tại Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* Đó là tất cả thiết lập, ngưng sửa từ phần này trở xuống. Chúc bạn viết blog vui vẻ. */

/** Đường dẫn tuyệt đối đến thư mục cài đặt WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Thiết lập biến và include file. */
require_once(ABSPATH . 'wp-settings.php');
