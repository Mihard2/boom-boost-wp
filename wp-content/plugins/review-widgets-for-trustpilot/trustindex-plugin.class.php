<?php
/* GENERATED: 1605399276 */
class TrustindexPlugin
{
private $plugin_file_path;
private $plugin_name;
private $shortname;
private $version;
public function __construct($shortname, $plugin_file_path, $version, $plugin_name)
{
$this->shortname = $shortname;
$this->plugin_file_path = $plugin_file_path;
$this->version = $version;
$this->plugin_name = $plugin_name;
}
public function get_plugin_dir()
{
return plugin_dir_path($this->plugin_file_path);
}
public function get_plugin_file_url($file, $add_versioning = true)
{
$url = plugins_url($file, $this->plugin_file_path);
if ($add_versioning)
{
$append_mark = strpos($url, "?") === FALSE ? "?" : "&";
$url .= $append_mark . 'ver=' . $this->version;
}
return $url;
}
public function get_plugin_slug()
{
return basename($this->get_plugin_dir());
}
public function loadI18N()
{
load_plugin_textdomain('trustindex', false, $this->get_plugin_slug() . '/languages');
}
public static function ___($text, $params = null)
{
if (!is_array($params))
{
$params = func_get_args();
$params = array_slice($params, 1);
}
return vsprintf(__($text, 'trustindex'), $params);
}
public function output_buffer()
{
ob_start();
}
public function activate()
{
if ($this->is_need_update())
{
add_option($this->get_option_name('active'), '1');
update_option($this->get_option_name('version'), ${'trustindex_p_'.$this->shortname.'_version'});
}
}
public function deactivate()
{
foreach ($this->get_option_names() as $opt_name)
{
delete_option($this->get_option_name($opt_name));
}
global $wpdb;
$dbtable = $this->get_noreg_tablename();
$wpdb->query( "DROP TABLE IF EXISTS $dbtable" );
}
public function is_enabled()
{
$active = get_option($this->get_option_name('active'));
if (empty($active) || $active === '0')
{
return false;
}
return true;
}
public function is_need_update()
{
$version = (string)get_option($this->get_option_name('version'));
if (!$version)
{
$version = '0';
}
if (version_compare($version, $this->version, '<'))
{
return true;
}
return false;
}
public function add_setting_menu()
{
global $menu, $submenu;
$permissions = ["edit_posts"];
$settings_page_url = $this->get_plugin_slug() . "/settings.php";
$settings_page_title = str_replace([ 'Arukereso', 'Szallashu' ], [ 'Árukereső', 'Szallas.hu' ], ucfirst($this->shortname)).' '.mb_strtolower(TrustindexPlugin::___('Reviews'));
foreach ($permissions as $perm)
{
$top_menu = false;
foreach($menu as $key => $item)
{
if($item[0] == 'Trustindex.io')
{
$top_menu = $item;
break;
}
}
if($top_menu === false)
{
add_menu_page(
$settings_page_title,
'Trustindex.io',
$perm,
$settings_page_url,
'',
$this->get_plugin_file_url('static/img/trustindex-sign-logo.png')
);
}
else
{
if(!isset($submenu[$top_menu[2]]))
{
add_submenu_page(
$top_menu[2],
'Trustindex.io',
$top_menu[3],
$perm,
$top_menu[2]
);
}
add_submenu_page(
$top_menu[2],
'Trustindex.io',
$settings_page_title,
$perm,
$settings_page_url
);
}
}
}
public function add_plugin_action_links($links, $file)
{
$plugin_file = basename($this->plugin_file_path);
if (basename($file) == $plugin_file)
{
$new_item2 = '<a target="_blank" href="https://www.trustindex.io" target="_blank">by <span style="background-color: #4067af; color: white; font-weight: bold; padding: 1px 8px;">Trustindex.io</span></a>';
$new_item1 = '<a href="' . admin_url('admin.php?page=' . $this->get_plugin_slug() . '/settings.php') . '">' . TrustindexPlugin::___('Settings') . '</a>';
array_unshift($links, $new_item2, $new_item1);
}
return $links;
}
public function add_plugin_meta_links( $meta, $file )
{
$plugin_file = basename($this->plugin_file_path);
if (basename($file) == $plugin_file)
{
$meta[] = "<a href='http://wordpress.org/support/view/plugin-reviews/".$this->get_plugin_slug()."' target='_blank' rel='noopener noreferrer' title='" . TrustindexPlugin::___( 'Rate our plugin') . ': '.$this->plugin_name . "'>" . TrustindexPlugin::___('Rate our plugin') . '</a>';
}
return $meta;
}
public function init_widget()
{
if (!class_exists('TrustindexWidget_'.$this->shortname))
{
require $this->get_plugin_dir() . 'trustindex-'.$this->shortname.'-widget.class.php';
}
}
public function register_widget()
{
return register_widget('TrustindexWidget_'.$this->shortname);
}
public function get_option_name($opt_name)
{
if (!in_array($opt_name, $this->get_option_names()))
{
echo "Option not registered in plugin (Trustindex class)";
}
if ($opt_name == "subscription-id")
{
return "trustindex-".$opt_name;
}
else
{
return "trustindex-".$this->shortname."-".$opt_name;
}
}
public function get_option_names()
{
return ['active', 'version', 'page-details', 'subscription-id', 'style-id', 'review-content', 'filter', 'scss-set', 'css-content', 'lang', 'no-rating-text', 'dateformat', 'rate-us', 'verified-icon', 'enable-animation', 'show-arrows', 'content-saved-to', 'show-reviewers-photo'];
}
public function get_platforms()
{
return ["facebook", "google", "tripadvisor", "yelp", "booking", "trustpilot", "amazon", "arukereso", "airbnb", "hotels", "opentable", "foursquare", "bookatable", "capterra", "szallashu", "thumbtack", "expedia"];
}
public function get_plugin_slugs()
{
return [
"free-facebook-reviews-and-recommendations-widgets",
"wp-reviews-plugin-for-google",
"review-widgets-for-tripadvisor",
"reviews-widgets-for-yelp",
"review-widgets-for-booking-com",
"review-widgets-for-trustpilot",
"review-widgets-for-amazon",
"review-widgets-for-arukereso",
"review-widgets-for-airbnb",
"review-widgets-for-hotels-com",
"review-widgets-for-opentable",
"review-widgets-for-foursquare",
"review-widgets-for-bookatable",
"review-widgets-for-capterra",
"review-widgets-for-szallas-hu",
"widgets-for-thumbtack-reviews",
"review-widgets-for-expedia",
];
}
public static function get_noticebox($type, $message)
{
return '<div class="notice notice-'.$type.' is-dismissible"><p>'.TrustindexPlugin::___($message).'</p></div>';
}
public static function get_alertbox($type, $content, $newline_content = true)
{
$types = array(
"warning" => array(
"css" => "color: #856404; background-color: #fff3cd; border-color: #ffeeba;",
"icon" => "dashicons-warning"
),
"info" => array(
"css" => "color: #0c5460; background-color: #d1ecf1; border-color: #bee5eb;",
"icon" => "dashicons-info"
),
"error" => array(
"css" => "color: #721c24; background-color: #f8d7da; border-color: #f5c6cb;",
"icon" => "dashicons-info"
)
);
return "<div style='margin:20px 0px; padding:10px; " . $types[$type]['css'] . " border-radius: 5px;'>"
. "<span class='dashicons " . $types[$type]['icon'] . "'></span> <strong>" . strtoupper(TrustindexPlugin::___($type)) . "</strong>"
. ($newline_content ? "<br />" : "")
. $content
. "</div>";
}
public function get_trustindex_widget($ti_id)
{
wp_enqueue_script( 'trustindex-js', 'https://cdn.trustindex.io/loader.js', [], false, true);
return "<div src='https://cdn.trustindex.io/loader.js?" . $ti_id . "'></div>";
}
public function get_shortcode_name()
{
return 'trustindex';
}
public function init_shortcode()
{
if (!shortcode_exists($this->get_shortcode_name()))
{
add_shortcode( $this->get_shortcode_name(), [$this, 'shortcode_func'] );
}
}
public function shortcode_func($atts)
{
$atts = shortcode_atts(
array(
'data-widget-id' => null,
'no-registration' => null
),
$atts
);
if (isset($atts["data-widget-id"]) && $atts["data-widget-id"])
{
return $this->get_trustindex_widget($atts["data-widget-id"]);
}
else if (isset($atts["no-registration"]) && $atts["no-registration"])
{
$force_platform = $atts["no-registration"];
if (!in_array($force_platform, $this->get_platforms()))
{
$av_platforms = $this->get_platforms();
$force_platform = $av_platforms[0];
}
$chosed_platform = new TrustindexPlugin($force_platform, __FILE__, "do-not-care-4.2.3", "do-not-care-Widgets for Trustpilot Reviews");
if(!$chosed_platform->is_noreg_linked() || !$chosed_platform->is_noreg_table_exists($force_platform))
{
return $this->get_alertbox(
"error",
" in <strong>".TrustindexPlugin::___($this->plugin_name . " plugin")."</strong><br /><br />"
.TrustindexPlugin::___('You have to connect your business (%s)!', [$force_platform]),
false
);
}
else
{
return $chosed_platform->get_noreg_list_reviews($force_platform);
}
}
else
{
return $this->get_alertbox(
"error",
" in <strong>".TrustindexPlugin::___($this->plugin_name . "plugin")."</strong><br /><br />"
.TrustindexPlugin::___('Your shortcode is deficient: Trustindex Widget ID is empty! Example: ') . '<br /><code>['.$this->get_shortcode_name().' data-widget-id="478dcc2136263f2b3a3726ff"]</code>',
false
);
}
}
public function is_noreg_linked()
{
$page_details = get_option($this->get_option_name('page-details'));
return $page_details && !empty($page_details);
}
public function get_noreg_tablename($force_platform = null)
{
global $wpdb;
$force_platform = $force_platform ? $force_platform : $this->shortname;
return $wpdb->prefix ."trustindex_".$force_platform."_reviews";
}
public function is_noreg_table_exists($force_platform = null)
{
global $wpdb;
$dbtable = $this->get_noreg_tablename($force_platform);
return ($wpdb->get_var("SHOW TABLES LIKE '$dbtable'") == $dbtable);
}
public function noreg_save_css($set_change = false)
{
$style_id = (int)get_option($this->get_option_name('style-id'));
$set_id = get_option($this->get_option_name('scss-set'));
if(!$style_id)
{
$style_id = 4;
}
$args = array(
'timeout' => '20',
'redirection' => '5',
'blocking' => true
);
add_filter( 'https_ssl_verify', '__return_false' );
add_filter( 'block_local_requests', '__return_false' );
$params = [
'layout_id' => $style_id,
'overrides' => [
'nav' => get_option($this->get_option_name('show-arrows'), 1) ? true : false,
'hover-anim' => get_option($this->get_option_name('enable-animation'), 1) ? true : false,
]
];
if($set_change)
{
$params['set_id'] = $set_id;
}
$url = 'https://admin.trustindex.io/api/getLayoutScss?' . http_build_query($params);
$server_output = wp_remote_retrieve_body( wp_remote_post( $url, $args ) );
if($server_output[0] !== '[' && $server_output[0] !== '{')
{
$server_output = substr($server_output, strpos($server_output, '('));
$server_output = trim($server_output,'();');
}
$server_output = json_decode($server_output, true);
if(!$set_change)
{
update_option($this->get_option_name('scss-set'), $server_output['default'], false);
}
if($server_output['css'])
{
update_option($this->get_option_name('css-content'), $server_output['css'], false);
}
return $content;
}
public static $widget_templates = array (
8 =>
array (
'name' => 'Full sidebar I.',
'type' => 'vertical',
),
18 =>
array (
'name' => 'Full sidebar I. - without header',
'type' => 'vertical',
),
9 =>
array (
'name' => 'Full sidebar II.',
'type' => 'vertical',
),
10 =>
array (
'name' => 'Full sidebar III.',
'type' => 'vertical',
),
11 =>
array (
'name' => 'HTML badge I.',
'type' => 'badge',
),
12 =>
array (
'name' => 'HTML badge II.',
'type' => 'badge',
),
6 =>
array (
'name' => 'Sidebar slider I.',
'type' => 'vertical',
),
7 =>
array (
'name' => 'Sidebar slider II.',
'type' => 'vertical',
),
4 =>
array (
'name' => 'Slider I.',
'type' => 'horizontal',
),
15 =>
array (
'name' => 'Slider II.',
'type' => 'horizontal',
),
5 =>
array (
'name' => 'Slider III. - with badge',
'type' => 'horizontal',
),
13 =>
array (
'name' => 'Slider III. - with company header',
'type' => 'horizontal',
),
19 =>
array (
'name' => 'Slider IV.',
'type' => 'horizontal',
),
);
public static $widget_styles = array (
'blue' => 'Blue',
'light-background' => 'Light background',
'light-background-border' => 'Light background border',
'ligth-border' => 'Light border',
'light-contrast' => 'Light contrast',
'dark-background' => 'Dark background',
'dark-border' => 'Dark border',
'dark-contrast' => 'Dark contrast',
'soft' => 'Soft',
);
public static $widget_languages = [
'ar' => "العربية",
'zh' => "汉语",
'cs' => "Čeština",
'da' => "Dansk",
'nl' => "Nederlands",
'en' => "English",
'fi' => "Suomi",
'fr' => "Français",
'de' => "Deutsch",
'el' => "Ελληνικά",
'hi' => "हिन्दी",
'hu' => "Magyar",
'it' => "Italiano",
'no' => "Norsk",
'pl' => "Polski",
'pt' => "Português",
'ro' => "Română",
'ru' => "Русский",
'sk' => "Slovenčina",
'es' => "Español",
'sv' => "Svenska",
'tr' => "Türkçe"
];
public static $widget_dateformats = [ 'j. F, Y.', 'F j, Y.', 'Y.m.d.', 'Y-m-d', 'd/m/Y' ];
private static $widget_rating_texts = array (
'en' =>
array (
0 => 'poor',
1 => 'below average',
2 => 'average',
3 => 'good',
4 => 'excellent',
),
'ar' =>
array (
0 => 'فيعض',
1 => 'طسوتملا تحت',
2 => 'طسوتم',
3 => 'ديج',
4 => 'زاتمم',
),
'cs' =>
array (
0 => 'Slabý',
1 => 'Podprůměrný',
2 => 'Průměrný',
3 => 'Dobrý',
4 => 'Vynikající',
),
'da' =>
array (
0 => 'Svag',
1 => 'Under gennemsnitlig',
2 => 'Gennemsnitlig',
3 => 'God',
4 => 'Fremragende',
),
'de' =>
array (
0 => 'Schwach',
1 => 'Unterdurchschnittlich',
2 => 'Durchschnittlich',
3 => 'Gut',
4 => 'Ausgezeichnet',
),
'el' =>
array (
0 => 'Χαμηλή',
1 => 'Κάτω από τον μέσο όρο',
2 => 'Μέτρια',
3 => 'Καλή',
4 => 'Άριστη',
),
'es' =>
array (
0 => 'Flojo',
1 => 'Por debajo de lo regular',
2 => 'Regular',
3 => 'Bueno',
4 => 'Excelente',
),
'fi' =>
array (
0 => 'Heikko',
1 => 'Keskitasoa alhaisempi',
2 => 'Keskitasoinen',
3 => 'Hyvä',
4 => 'Erinomainen',
),
'fr' =>
array (
0 => 'faible',
1 => 'moyenne basse',
2 => 'moyenne',
3 => 'bien',
4 => 'excellent',
),
'hi' =>
array (
0 => 'कमज़ोर',
1 => 'औसत से कम ',
2 => 'औसत ',
3 => 'अच्छा ',
4 => 'अति उत्कृष्ट ',
),
'hu' =>
array (
0 => 'Gyenge',
1 => 'Átlag alatti',
2 => 'Átlagos',
3 => 'Jó',
4 => 'Kiváló',
),
'it' =>
array (
0 => 'Scarso',
1 => 'Sotto la media',
2 => 'Medio',
3 => 'Buono',
4 => 'Eccellente',
),
'nl' =>
array (
0 => 'Zwak',
1 => 'Onder gemiddeld',
2 => 'Gemiddeld',
3 => 'Goed',
4 => 'Uitstekend',
),
'no' =>
array (
0 => 'Dårlig',
1 => 'Utilstrekkelig',
2 => 'Gjennomsnittlig',
3 => 'Bra',
4 => 'Utmerket',
),
'pl' =>
array (
0 => 'Śłaby',
1 => 'Poniżej średniego',
2 => 'Średni',
3 => 'Dobry',
4 => 'Doskonały',
),
'pt' =>
array (
0 => 'Fraco',
1 => 'Inferior ao médio',
2 => 'Medíocre',
3 => 'Bom',
4 => 'Excelente',
),
'ro' =>
array (
0 => 'Slab',
1 => 'Sub nivel mediu',
2 => 'Mediu',
3 => 'Bun',
4 => 'Excelent',
),
'ru' =>
array (
0 => 'Слабо',
1 => 'Ниже среднего',
2 => 'Средний',
3 => 'Хорошо',
4 => 'Отлично',
),
'sk' =>
array (
0 => 'Slabé',
1 => 'Podpriemerné',
2 => 'Priemerné',
3 => 'Dobré',
4 => 'Vynikajúce',
),
'sv' =>
array (
0 => 'Svag',
1 => 'Under genomsnittet',
2 => 'Genomsnitt',
3 => 'God',
4 => 'Utmärkt',
),
'tr' =>
array (
0 => 'Zayıf',
1 => 'Ortanın altıi',
2 => 'Orta',
3 => 'İyi',
4 => 'Mükemmel',
),
'zh' =>
array (
0 => '差',
1 => '不如一般',
2 => '一般',
3 => '好',
4 => '非常好',
),
);
private static $widget_recommendation_texts = array (
'en' =>
array (
'negative' => 'NOT_RECOMMEND_ICON not recommends',
'positive' => 'RECOMMEND_ICON recommends',
),
'ar' =>
array (
'negative' => 'لا توصي NOT_RECOMMEND_ICON',
'positive' => 'توصي RECOMMEND_ICON',
),
'cs' =>
array (
'negative' => 'NOT_RECOMMEND_ICON not nedoporučuje',
'positive' => 'RECOMMEND_ICON doporučuje',
),
'da' =>
array (
'negative' => 'NOT_RECOMMEND_ICON anbefaler ikke',
'positive' => 'RECOMMEND_ICON anbefaler',
),
'de' =>
array (
'negative' => 'NOT_RECOMMEND_ICON wird nicht empfohlen',
'positive' => 'RECOMMEND_ICON empfiehlt',
),
'el' =>
array (
'negative' => 'NOT_RECOMMEND_ICON δεν συνιστά',
'positive' => 'RECOMMEND_ICON συνιστά',
),
'es' =>
array (
'negative' => 'NOT_RECOMMEND_ICON no recomienda',
'positive' => 'RECOMMEND_ICON recomienda',
),
'fi' =>
array (
'negative' => 'NOT_RECOMMEND_ICON ei suosittele',
'positive' => 'RECOMMEND_ICON suosittelee',
),
'fr' =>
array (
'negative' => 'NOT_RECOMMEND_ICON ne recommande pas',
'positive' => 'RECOMMEND_ICON recommande',
),
'hi' =>
array (
'negative' => 'NOT_RECOMMEND_ICON अनुशंसा नहीं करता है',
'positive' => 'RECOMMEND_ICON अनुशंसा करता है',
),
'hu' =>
array (
'negative' => 'NOT_RECOMMEND_ICON nem ajánlja',
'positive' => 'RECOMMEND_ICON ajánlja',
),
'it' =>
array (
'negative' => 'NOT_RECOMMEND_ICON non lo consiglia',
'positive' => 'RECOMMEND_ICON consiglia',
),
'nl' =>
array (
'negative' => 'NOT_RECOMMEND_ICON raadt niet aan',
'positive' => 'RECOMMEND_ICON raadt aan',
),
'no' =>
array (
'negative' => 'NOT_RECOMMEND_ICON anbefaler ikke',
'positive' => 'RECOMMEND_ICON anbefaler',
),
'pl' =>
array (
'negative' => 'NOT_RECOMMEND_ICON nie zaleca',
'positive' => 'RECOMMEND_ICON poleca',
),
'pt' =>
array (
'negative' => 'NOT_RECOMMEND_ICON não recomenda',
'positive' => 'RECOMMEND_ICON recomenda',
),
'ro' =>
array (
'negative' => 'NOT_RECOMMEND_ICON nu recomandă',
'positive' => 'RECOMMEND_ICON recomandă',
),
'ru' =>
array (
'negative' => 'NOT_RECOMMEND_ICON не рекомендует',
'positive' => 'RECOMMEND_ICON рекомендует',
),
'sk' =>
array (
'negative' => 'NOT_RECOMMEND_ICON neodporúča',
'positive' => 'RECOMMEND_ICON odporúča',
),
'sv' =>
array (
'negative' => 'NOT_RECOMMEND_ICON rekommenderar inte',
'positive' => 'RECOMMEND_ICON rekommenderar',
),
'tr' =>
array (
'negative' => 'NOT_RECOMMEND_ICON önerilmez',
'positive' => 'RECOMMEND_ICON önerir',
),
'zh' =>
array (
'negative' => 'NOT_RECOMMEND_ICON 不推荐',
'positive' => 'RECOMMEND_ICON 推荐',
),
);
private static $widget_verified_texts = array (
'en' => 'Verified review',
'ar' => 'مراجعة التحقق',
'cs' => 'Ověřená recenze',
'da' => 'Bekræftet anmeldelse',
'de' => 'Verifizierte Bewertung',
'el' => 'Επαληθευμένη κριτική',
'es' => 'Revisión verificada',
'fi' => 'Vahvistettu arvostelu',
'fr' => 'Avis vérifié',
'hi' => 'सत्यापित समीक्षा',
'hu' => 'Hitelesített vélemény',
'it' => 'Recensione verificata',
'nl' => 'Geverifieerde beoordeling',
'no' => 'Bekreftet anmeldelse',
'pl' => 'Zweryfikowana recenzja',
'pt' => 'Avaliação verificada',
'ro' => 'Recenzie verificată',
'ru' => 'Проверенный обзор',
'sk' => 'Overená recenzia',
'sv' => 'Verifierad recension',
'tr' => 'Doğrulanmış inceleme',
'zh' => '验证评论',
);
private static $widget_month_names = array (
'en' =>
array (
0 => 'January',
1 => 'February',
2 => 'March',
3 => 'April',
4 => 'May',
5 => 'June',
6 => 'July',
7 => 'August',
8 => 'September',
9 => 'October',
10 => 'November',
11 => 'December',
),
'ar' =>
array (
0 => 'يناير',
1 => 'فبراير',
2 => 'مارس',
3 => 'أبريل',
4 => 'مايو',
5 => 'يونيو',
6 => 'يوليه',
7 => 'أغسطس',
8 => 'سبتمبر',
9 => 'أكتوبر',
10 => 'نوفمبر',
11 => 'ديسمبر',
),
'zh' =>
array (
0 => '一月',
1 => '二月',
2 => '三月',
3 => '四月',
4 => '五月',
5 => '六月',
6 => '七月',
7 => '八月',
8 => '九月',
9 => '十月',
10 => '十一月',
11 => '十二月',
),
'cs' =>
array (
0 => 'Leden',
1 => 'Únor',
2 => 'Březen',
3 => 'Duben',
4 => 'Květen',
5 => 'Červen',
6 => 'Červenec',
7 => 'Srpen',
8 => 'Září',
9 => 'Říjen',
10 => 'Listopad',
11 => 'Prosinec',
),
'da' =>
array (
0 => 'Januar',
1 => 'Februar',
2 => 'Marts',
3 => 'April',
4 => 'Maj',
5 => 'Juni',
6 => 'Juli',
7 => 'August',
8 => 'September',
9 => 'Oktober',
10 => 'November',
11 => 'December',
),
'nl' =>
array (
0 => 'Januari',
1 => 'Februari',
2 => 'Maart',
3 => 'April',
4 => 'Mei',
5 => 'Juni',
6 => 'Juli',
7 => 'Augustus',
8 => 'September',
9 => 'Oktober',
10 => 'November',
11 => 'December',
),
'fi' =>
array (
0 => 'Tammikuu',
1 => 'Helmikuu',
2 => 'Maaliskuu',
3 => 'Huhtikuu',
4 => 'Toukokuu',
5 => 'Kesäkuu',
6 => 'Heinäkuu',
7 => 'Elokuu',
8 => 'Syyskuu',
9 => 'Lokakuu',
10 => 'Marraskuu',
11 => 'Joulukuu',
),
'fr' =>
array (
0 => 'Janvier',
1 => 'Février',
2 => 'Mars',
3 => 'Avril',
4 => 'Mai',
5 => 'Juin',
6 => 'Juillet',
7 => 'Août',
8 => 'Septembre',
9 => 'Octobre',
10 => 'Novembre',
11 => 'Décembre',
),
'de' =>
array (
0 => 'Januar',
1 => 'Februar',
2 => 'März',
3 => 'April',
4 => 'Mai',
5 => 'Juni',
6 => 'Juli',
7 => 'August',
8 => 'September',
9 => 'Oktober',
10 => 'November',
11 => 'Dezember',
),
'el' =>
array (
0 => 'Iανουάριος',
1 => 'Φεβρουάριος',
2 => 'Μάρτιος',
3 => 'Aρίλιος',
4 => 'Μάιος',
5 => 'Iούνιος',
6 => 'Iούλιος',
7 => 'Αύγουστος',
8 => 'Σεπτέμβριος',
9 => 'Oκτώβριος',
10 => 'Νοέμβριος',
11 => 'Δεκέμβριος',
),
'hi' =>
array (
0 => 'जनवरी',
1 => 'फ़रवरी',
2 => 'मार्च',
3 => 'अप्रैल',
4 => 'मई',
5 => 'जून',
6 => 'जुलाई',
7 => 'अगस्त',
8 => 'सितंबर',
9 => 'अक्टूबर',
10 => 'नवंबर',
11 => 'दिसंबर',
),
'hu' =>
array (
0 => 'Január',
1 => 'Február',
2 => 'Március',
3 => 'Április',
4 => 'Május',
5 => 'Június',
6 => 'Július',
7 => 'Augusztus',
8 => 'Szeptember',
9 => 'Október',
10 => 'November',
11 => 'December',
),
'it' =>
array (
0 => 'Gennaio',
1 => 'Febbraio',
2 => 'Marzo',
3 => 'Aprile',
4 => 'Maggio',
5 => 'Giugno',
6 => 'Luglio',
7 => 'Agosto',
8 => 'Settembre',
9 => 'Ottobre',
10 => 'Novembre',
11 => 'Dicembre',
),
'no' =>
array (
0 => 'Januar',
1 => 'Februar',
2 => 'Mars',
3 => 'April',
4 => 'Mai',
5 => 'Juni',
6 => 'Juli',
7 => 'August',
8 => 'September',
9 => 'Oktober',
10 => 'November',
11 => 'Desember',
),
'pl' =>
array (
0 => 'Styczeń',
1 => 'Luty',
2 => 'Marzec',
3 => 'Kwiecień',
4 => 'Maj',
5 => 'Czerwiec',
6 => 'Lipiec',
7 => 'Sierpień',
8 => 'Wrzesień',
9 => 'Październik',
10 => 'Listopad',
11 => 'Grudzień',
),
'pt' =>
array (
0 => 'Janeiro',
1 => 'Fevereiro',
2 => 'Março',
3 => 'Abril',
4 => 'Maio',
5 => 'Junho',
6 => 'Julho',
7 => 'Agosto',
8 => 'Setembro',
9 => 'Outubro',
10 => 'Novembro',
11 => 'Dezembro',
),
'ro' =>
array (
0 => 'Ianuarie',
1 => 'Februarie',
2 => 'Martie',
3 => 'Aprilie',
4 => 'Mai',
5 => 'Iunie',
6 => 'Iulie',
7 => 'August',
8 => 'Septembrie',
9 => 'Octombrie',
10 => 'Noiembrie',
11 => 'Decembrie',
),
'ru' =>
array (
0 => 'январь',
1 => 'февраль',
2 => 'март',
3 => 'апрель',
4 => 'май',
5 => 'июнь',
6 => 'июль',
7 => 'август',
8 => 'сентябрь',
9 => 'октябрь',
10 => 'ноябрь',
11 => 'декабрь',
),
'sk' =>
array (
0 => 'Január',
1 => 'Február',
2 => 'Marec',
3 => 'Apríl',
4 => 'Máj',
5 => 'Jún',
6 => 'Júl',
7 => 'August',
8 => 'September',
9 => 'Október',
10 => 'November',
11 => 'December',
),
'es' =>
array (
0 => 'Enero',
1 => 'Febrero',
2 => 'Marzo',
3 => 'Abril',
4 => 'Mayo',
5 => 'Junio',
6 => 'Julio',
7 => 'Agosto',
8 => 'Septiembre',
9 => 'Octubre',
10 => 'Noviembre',
11 => 'Diciembre',
),
'sv' =>
array (
0 => 'Januari',
1 => 'Februari',
2 => 'Mars',
3 => 'April',
4 => 'Maj',
5 => 'Juni',
6 => 'Juli',
7 => 'Augusti',
8 => 'September',
9 => 'Oktober',
10 => 'November',
11 => 'December',
),
'tr' =>
array (
0 => 'Ocak',
1 => 'Şubat',
2 => 'Mart',
3 => 'Nisan',
4 => 'Mayis',
5 => 'Haziran',
6 => 'Temmuz',
7 => 'Ağustos',
8 => 'Eylül',
9 => 'Ekim',
10 => 'Kasım',
11 => 'Aralık',
),
);
public function get_noreg_list_reviews($force_platform = null, $list_all = false)
{
global $wpdb;
$dbtable = $this->get_noreg_tablename($force_platform);
$page_details = get_option($this->get_option_name('page-details'));
$style_id = (int)get_option($this->get_option_name('style-id'), 4);
$content = get_option($this->get_option_name('review-content'));
$lang = get_option($this->get_option_name('lang'), 'en');
$dateformat = get_option($this->get_option_name('dateformat'), 'Y-m-d');
$no_rating_text = get_option($this->get_option_name('no-rating-text'), 1);
$verified_icon = get_option($this->get_option_name('verified-icon'), 0);
$show_reviewers_photo = get_option($this->get_option_name('show-reviewers-photo'), 1);
$set_id = get_option($this->get_option_name('scss-set'));
$sql_rating_field = 'rating';
if($this->is_ten_scale_rating_platform())
{
$sql_rating_field = 'ROUND(rating / 2, 0)';
}
$sql = "SELECT id, user, user_photo, text, date, rating as original_rating, $sql_rating_field as rating FROM $dbtable ";
$filter = get_option($this->get_option_name('filter'));
if(!$list_all && $filter)
{
if(count($filter['stars']) == 0)
{
$sql .= "WHERE 0 ";
}
else
{
$sql .= "WHERE ($sql_rating_field IN (". implode(',', $filter['stars']) .")";
if(in_array(5, $filter['stars']))
{
$sql .= ' or rating IS NULL';
}
$sql .= ') ';
if($filter['only-ratings'])
{
$sql .= "and text != '' ";
}
}
}
$sql .= "ORDER BY date DESC";
if(!$list_all && in_array($style_id, [ 8, 9, 10, 18 ]))
{
$sql .= " LIMIT 5";
}
$reviews = $wpdb->get_results($sql);
wp_enqueue_script('trustindex-js', 'https://cdn.trustindex.io/loader.js', [], false, true);
wp_add_inline_script('trustindex-js', '(function ti_init() {
if(typeof Trustindex == "undefined"){setTimeout(ti_init, 1985);return false;}
Trustindex.init_pager(document.querySelectorAll(".ti-widget"));
})();');
if($content === false || empty($content) || strpos($content, '<!-- R-LIST -->') === false)
{
add_action('http_api_curl', function( $handle ){
curl_setopt($handle, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($handle, CURLOPT_SSL_VERIFYHOST, false);
}, 10);
$response = wp_remote_get( "https://cdn.trustindex.io/widget-assets/template/$lang/$style_id.html");
$content = $response['body'];
update_option($this->get_option_name('review-content'), $content, false);
}
$content = $this->parse_noreg_list_reviews([
'content' => $content,
'reviews' => $reviews,
'page_details' => $page_details,
'style_id' => $style_id,
'set_id' => $set_id,
'no_rating_text' => $no_rating_text,
'dateformat' => $dateformat,
'language' => $lang,
'verified_icon' => $verified_icon,
'show_reviewers_photo' => $show_reviewers_photo
]);
$content = preg_replace('/data-set[_-]id=[\'"][^\'"]*[\'"]/m', 'data-set-id="'. get_option($this->get_option_name('scss-set')) .'"', $content);
$widget_css = get_option($this->get_option_name('css-content'));
if(!$widget_css)
{
wp_enqueue_style( "trustindex-widget-css-" . $this->shortname, "https://cdn.trustindex.io/widget-assets/css/". $style_id ."-blue.css");
}
else
{
$content .= '<style type="text/css">'. $widget_css .'</style>';
}
return $content;
}
public function parse_noreg_list_reviews($array = [])
{
preg_match('/<!-- R-LIST -->(.*)<!-- R-LIST -->/', $array['content'], $matches);
if(isset($matches[1]))
{
$reviewContent = "";
if($array['reviews'] && count($array['reviews'])) foreach($array['reviews'] as $r)
{
$date = "&nbsp;";
if($r->date && $r->date != '0000-00-00')
{
$date = str_replace(self::$widget_month_names['en'], self::$widget_month_names[$array['language']], date($array['dateformat'], strtotime($r->date)));
}
$rating_content = $this->get_rating_stars($r->rating);
if($this->shortname == 'facebook' && in_array($r->rating, [ 1, 5 ]))
{
if($r->rating == 1)
{
$rating_content = self::$widget_recommendation_texts[ $array['language'] ]['negative'];
}
else
{
$rating_content = self::$widget_recommendation_texts[ $array['language'] ]['positive'];
}
$r_text = trim(str_replace([ 'NOT_RECOMMEND_ICON', 'RECOMMEND_ICON' ], '', $rating_content));
$rating_content = '<span class="ti-recommendation">'. str_replace([
'NOT_RECOMMEND_ICON',
'RECOMMEND_ICON',
' ' . $r_text,
$r_text . ' '
], [
'<span class="ti-recommendation-icon negative"></span>',
'<span class="ti-recommendation-icon positive"></span>',
'<span class="ti-recommendation-title">'. $r_text .'</span>',
'<span class="ti-recommendation-title">'. $r_text .'</span>'
], $rating_content) .'</span>';
}
else if($this->is_ten_scale_rating_platform())
{
$rating_content = '<div class="ti-rating-box">'. $this->formatTenRating($r->original_rating) .'</div>';
}
if($array['verified_icon'])
{
$rating_content .= '<span class="ti-verified-review"><span class="ti-verified-tooltip">'. self::$widget_verified_texts[ $array['language'] ] .'</span></span>';
}
$platform_name = ucfirst($this->shortname);
if($platform_name == 'Szallashu')
{
$tmp = explode('/', $array['page_details']['id']);
$platform_name .= '" data-domain="' . $tmp[0];
}
if(!$array['show_reviewers_photo'])
{
$matches[1] = str_replace('<div class="ti-profile-img"> <img src="%reviewer_photo%" alt="%reviewer_name%" /> </div>', '', $matches[1]);
}
$reviewContent .= str_replace([
'%platform%',
'%reviewer_photo%',
'%reviewer_name%',
'%created_at%',
'%text%',
'<span class="ti-star f"></span><span class="ti-star f"></span><span class="ti-star f"></span><span class="ti-star f"></span><span class="ti-star f"></span>'
], [
$platform_name,
$r->user_photo,
$r->user,
$date,
$r->text,
$rating_content
], $matches[1]);
}
$array['content'] = str_replace($matches[0], $reviewContent, $array['content']);
}
$rating_count = $array['page_details']['rating_number'];
$rating_score = $array['page_details']['rating_score'];
if(substr($array['set_id'], 0, 5) == 'dark-')
{
$array['content'] = str_replace('%platform%/logo', '%platform%/logo-dark', $array['content']);
}
$array['content'] = str_replace([
'%platform%',
'%site_name%',
"RATING_STARS",
"RATING_NUMBER",
"RATING_SCORE",
"RATING_SCALE",
"RATING_TEXT",
"PLATFORM_URL_LOGO",
"PLATFORM_NAME",
'<span class="ti-star e"></span><span class="ti-star e"></span><span class="ti-star e"></span><span class="ti-star e"></span><span class="ti-star e"></span>'
], [
ucfirst($this->shortname),
$array['page_details']['name'],
$r->rating,
$rating_count,
$rating_score,
$this->is_ten_scale_rating_platform() ? 10 : 5,
$this->get_rating_text($rating_score, $array['language']),
$array['page_details']['avatar_url'],
$this->get_platform_name($this->shortname, $array['page_details']['id']),
$this->is_ten_scale_rating_platform() ? "<div class='ti-rating-box'>". $this->formatTenRating($rating_score) ."</div>" : $this->get_rating_stars($rating_score)
], $array['content']);
if($this->is_ten_scale_rating_platform() && $array['style_id'] == 11)
{
$array['content'] = str_replace('<span class="ti-rating">'. $rating_score .'</span> ', '', $array['content']);
}
if($this->shortname == 'szallashu')
{
$tmp = explode('/', $array['page_details']['id']);
$array['content'] = str_replace([ 'Szallashu/logo.svg', 'Szallashu/logo-dark.svg' ], [ 'Szallashu/logo-'. $tmp[0] .'.svg', 'Szallashu/logo-'. $tmp[0] .'-dark.svg' ], $array['content']);
}
else if($this->shortname == 'arukereso')
{
$tmp = explode('|', $array['page_details']['id']);
$array['content'] = str_replace([ 'Arukereso/logo.svg', 'Arukereso/logo-dark.svg' ], [ 'Arukereso/logo-'. $tmp[0] .'.svg', 'Arukereso/logo-'. $tmp[0] .'-dark.svg' ], $array['content']);
}
$array['content'] = preg_replace('/<a href=[\'"]%footer_link%[\'"][^>]*>(.+)<\/a>/mU', '$1', $array['content']);
if($array['no_rating_text'])
{
if(in_array($array['style_id'], [6, 7]))
{
$array['content'] = preg_replace('/<div class="ti-footer">.*<\/div>/mU', '<div class="ti-footer"></div>', $array['content']);
}
else if($array['style_id'] == 11)
{
$array['content'] = preg_replace('/<div class="ti-text">.*<\/div>/mU', '', $array['content']);
}
else
{
$array['content'] = preg_replace('/<div class="ti-rating-text">.*<\/div>/mU', '', $array['content']);
}
}
return $array['content'];
}
public function get_platform_name($type, $id = "")
{
$text = ucfirst($type);
if($text == "Szallashu")
{
$domains = [
'cz' => 'Hotely.cz',
'hu' => 'Szallas.hu',
'ro' => 'Hotelguru.ro',
'com' => 'Revngo.com',
'pl' => 'Noclegi.pl'
];
$tmp = explode('/', $id);
if(isset($domains[ $tmp[0] ]))
{
$text = $domains[ $tmp[0] ];
}
}
else if($text == "Arukereso")
{
$domains = [
'hu' => 'Árukereső.hu',
'bg' => 'Pazaruvaj.com',
'ro' => 'Compari.ro'
];
$tmp = explode('|', $id);
if(isset($domains[ $tmp[0] ]))
{
$text = $domains[ $tmp[0] ];
}
}
return $text;
}
public function get_rating_text($rating, $lang = "en")
{
$texts = self::$widget_rating_texts[$lang];
$rating = round($rating);
if($rating < 1) $rating = 1;
elseif($rating > 5) $rating = 5;
return mb_strtoupper($texts[$rating - 1]);
}
public function get_rating_stars($rating_score)
{
$text = "";
if(!is_numeric($rating_score))
{
return $text;
}
for ($si = 1; $si <= $rating_score; $si++)
{
$text .= '<span class="ti-star f"></span>';
}
$fractional = $rating_score - floor($rating_score);
if( 0.25 <= $fractional )
{
if ( $fractional < 0.75 )
{
$text .= '<span class="ti-star h"></span>';
}
else
{
$text .= '<span class="ti-star f"></span>';
}
$si++;
}
for (; $si <= 5; $si++)
{
$text .= '<span class="ti-star e"></span>';
}
return $text;
}
public function download_noreg_reviews($page_details, $force_platform = null)
{
$force_platform = $force_platform ? $force_platform : $this->shortname;
$url = "https://admin.trustindex.io/api/getPromoReviews?platform=".$force_platform."&page_id=" . $page_details['id'];
if($force_platform == 'facebook')
{
$url .= '&access_token='. $page_details['access_token'];
}
$args = array(
'timeout' => '20',
'redirection' => '5',
'blocking' => true,
);
$server_output = wp_remote_retrieve_body( wp_remote_post( $url, $args ) );
if($server_output[0] !== '[' && $server_output[0] !== '{')
{
$server_output = substr($server_output, strpos($server_output, '('));
$server_output = trim($server_output,'();');
}
$server_output = json_decode($server_output, true);
return $server_output;
}
public function download_noreg_details($page_details, $force_platform = null)
{
$force_platform = $force_platform ? $force_platform : $this->shortname;
$url = "https://admin.trustindex.io/api/getPageDetails?platform=".$force_platform."&page_id=" . $page_details['id'];
if($force_platform == "facebook")
{
$url .= "&access_token=". $page_details['access_token'];
}
$args = array(
'timeout' => '20',
'redirection' => '5',
'blocking' => true,
);
$server_output = wp_remote_retrieve_body( wp_remote_post( $url, $args ) );
if($server_output[0] !== '[' && $server_output[0] !== '{')
{
$server_output = substr($server_output, strpos($server_output, '('));
$server_output = trim($server_output,'();');
}
$server_output = json_decode($server_output, true);
return $server_output;
}
public function is_trustindex_connected()
{
return get_option($this->get_option_name("subscription-id"));
}
public function get_trustindex_widget_number()
{
$widgets = $this->get_trustindex_widgets();
$number = 0;
foreach ($widgets as $wc)
{
$number += count($wc['widgets']);
}
return $number;
}
public function get_trustindex_widgets()
{
$widgets = array();
$trustindex_subscription_id = $this->is_trustindex_connected();
if ($trustindex_subscription_id)
{
$widgets = wp_remote_get("https://admin.trustindex.io/api/getWidgets?subscription_id=".$trustindex_subscription_id);
if ($widgets)
{
$widgets = json_decode($widgets['body'], true);
}
}
return $widgets;
}
public function connect_trustindex_api($post_data, $mode = "new")
{
$url = $mode == "new" ? "https://admin.trustindex.io/api/userRegister" : "https://admin.trustindex.io/api/connectApi";
$args = array(
'body' => $post_data,
'timeout' => '5',
'redirection' => '5',
'blocking' => true,
);
$server_output = wp_remote_retrieve_body( wp_remote_post( $url, $args ) );
if($server_output[0] !== '[' && $server_output[0] !== '{')
{
$server_output = substr($server_output, strpos($server_output, '('));
$server_output = trim($server_output,'();');
}
$server_output = json_decode($server_output, true);
if ($server_output['success'])
{
update_option( $this->get_option_name("subscription-id"), $server_output["subscription_id"]);
$GLOBALS['wp_object_cache']->delete( $this->get_option_name('subscription-id'), 'options' );
}
return $server_output;
}
public function register_tinymce_features()
{
if ( ! has_filter( "mce_external_plugins", "add_tinymce_buttons" ) )
{
add_filter( "mce_external_plugins", [$this, "add_tinymce_buttons"] );
add_filter( "mce_buttons", [$this, "register_tinymce_buttons"] );
}
}
public function add_tinymce_buttons( $plugin_array )
{
$plugin_name = 'trustindex';
if (!isset($plugin_array[$plugin_name]))
{
$plugin_array[$plugin_name] = $this->get_plugin_file_url('static/js/admin-editor.js');
}
wp_localize_script( 'jquery', 'ajax_object', array(
'ajax_url' => admin_url( 'admin-ajax.php' ),
));
return $plugin_array;
}
public function register_tinymce_buttons( $buttons )
{
$button_name = 'trustindex';
if (!in_array($button_name, $buttons))
{
array_push( $buttons, $button_name );
}
return $buttons;
}
public function list_trustindex_widgets_ajax()
{
$ti_widgets = $this->get_trustindex_widgets();
if ($this->is_trustindex_connected()): ?>
			<?php if ($ti_widgets): ?>

<h2><?php  echo TrustindexPlugin::___('Your saved widgets'); ?></h2>
				<?php foreach ($ti_widgets as $wc): ?>

<p><strong><?php  echo $wc['name']; ?>:</strong></p>
<p>
						<?php foreach ($wc['widgets'] as $w): ?>

<a href="#" class="btn-copy-widget-id" data-ti-id="<?php  echo $w['id']; ?>">
<span class="dashicons dashicons-admin-post"></span>
								<?php echo $w['name']; ?>

</a><br />
						<?php endforeach; ?>

</p>
				<?php endforeach; ?>

			<?php else: ?>

				<?php echo $this->get_alertbox("warning",

TrustindexPlugin::___("You have no widget saved!") . " "
. "<a target='_blank' href='https://admin.trustindex.io/widget'>". TrustindexPlugin::___("Let's go, create amazing widgets for free!")."</a>"
); ?>
			<?php endif; ?>

		<?php else: ?>

			<?php echo $this->get_alertbox("warning",

TrustindexPlugin::___("You have not set up your Trustindex account yet!") . " "
. TrustindexPlugin::___("Go to <a href='%s'>plugin setup page</a> to complete the one-step setup guide and enjoy the full functionalization!", array(admin_url('admin.php?page='.$this->get_plugin_slug().'/settings.php&tab=setup_trustindex')))
); ?>
		<?php endif;

wp_die();
}
public function trustindex_add_scripts($hook)
{
if ($hook === 'widgets.php')
{
wp_enqueue_script('trustindex_script', $this->get_plugin_file_url('static/js/admin-widget.js'));
wp_enqueue_style('trustindex_style', $this->get_plugin_file_url('static/css/admin-widget.css'));
}
elseif ($hook === 'post.php')
{
wp_enqueue_style('trustindex_editor_style', $this->get_plugin_file_url('static/css/admin-editor.css'));
}
elseif (in_array(strstr($hook, '/', true), $this->get_plugin_slugs()))
{
wp_register_style('trustindex_settings_style_'. $this->shortname, $this->get_plugin_file_url('static/css/admin-page-settings.css') );
wp_register_script('trustindex_settings_script_common_'. $this->shortname, $this->get_plugin_file_url('static/js/admin-page-settings-common.js') );
if(file_exists($this->get_plugin_dir() . 'static/js/admin-page-settings.js'))
{
wp_register_script('trustindex_settings_script_'. $this->shortname, $this->get_plugin_file_url('static/js/admin-page-settings.js') );
}
}
wp_register_script('trustindex_admin_popup', $this->get_plugin_file_url('static/js/admin-popup.js') );
wp_enqueue_script('trustindex_admin_popup');
}
public function get_plugin_details( $plugin_slug = null )
{
if (!$plugin_slug)
{
$plugin_slug = $this->get_plugin_slug();
}
$plugin_return = false;
$wp_repo_plugins = '';
$wp_response = '';
$wp_version = get_bloginfo('version');
if ( $plugin_slug && $wp_version > 3.8 )
{
$args = array(
'author' => 'Trustindex.io',
'fields' => array(
'downloaded' => true,
'active_installs' => true,
'ratings' => true
)
);
$wp_response = wp_remote_post(
'http://api.wordpress.org/plugins/info/1.0/',
array(
'body' => array(
'action' => 'query_plugins',
'request' => serialize( (object) $args )
)
)
);
if ( ! is_wp_error( $wp_response ) )
{
$wp_repo_response = unserialize( wp_remote_retrieve_body( $wp_response ) );
$wp_repo_plugins = $wp_repo_response->plugins;
}
if ( $wp_repo_plugins )
{
foreach ( $wp_repo_plugins as $plugin_details )
{
if ( $plugin_slug == $plugin_details->slug )
{
$plugin_return = $plugin_details;
}
}
}
}
return $plugin_return;
}
public function is_ten_scale_rating_platform()
{
return in_array($this->shortname, [ 'booking', 'hotels', 'foursquare', 'szallashu' ]);
}
public function formatTenRating($rating)
{
if($rating == 10)
{
$rating = '10';
}
if($this->shortname == "booking")
{
$rating = str_replace('.', ',', $rating);
}
return $rating;
}
}