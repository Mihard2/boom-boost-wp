<?php

defined( 'ABSPATH' ) or die( 'No script kiddies please!' );
$reviews = [];
if($trustindex_pm_trustpilot->is_noreg_linked() && $trustindex_pm_trustpilot->is_noreg_table_exists())
{
$reviews = $wpdb->get_results('SELECT * FROM '. $trustindex_pm_trustpilot->get_noreg_tablename() .' ORDER BY date DESC');
}
?>
<div class="maxwidth">
<h1><?php  echo TrustindexPlugin::___("Troubleshooting"); ?></h1>
<p><?php  echo TrustindexPlugin::___('If you have any questions or problem, please send an email to support@trustindex.io included the information below and our colleagues will answer you in 48 hours!'); ?></p>
	<?php 

$dir = __DIR__ . '/../review-widgets-for-trustpilot.php';
$plugin_data = get_plugin_data( $dir );
?>
	<?php

$memory_limit = "N/A";
if(ini_get('memory_limit'))
{
$memory_limit = filter_var(ini_get('memory_limit'), FILTER_SANITIZE_STRING);
}
$upload_max = "N/A";
if (ini_get('upload_max_filesize'))
{
$upload_max = filter_var(ini_get('upload_max_filesize'), FILTER_SANITIZE_STRING);
}
$post_max = "N/A";
if (ini_get('post_max_size'))
{
$post_max = filter_var(ini_get('post_max_size'), FILTER_SANITIZE_STRING);
}
$max_execute = "N/A";
if (ini_get('max_execution_time'))
{
$max_execute = filter_var(ini_get('max_execution_time'));
}
?>
<textarea class="ti-troubleshooting-info" readonly>
URL: <?php  echo esc_url(get_option('siteurl')) ."\n"; ?>
MySQL Version: <?php  echo esc_html($wpdb->db_version()) ."\n"; ?>
WP Table Prefix: <?php  echo esc_html($wpdb->prefix) ."\n"; ?>
WP Version: <?php  echo esc_html($wp_version) ."\n"; ?>
Server Name: <?php  echo esc_html($_SERVER['SERVER_NAME']) ."\n"; ?>
Cookie Domain: <?php  $cookieDomain = parse_url(strtolower(get_bloginfo('wpurl'))); echo esc_html($cookieDomain['host']) ."\n"; ?>
CURL Library Present: <?php  echo (function_exists('curl_init') ? "Yes" : "No") ."\n\n"; ?>
PHP Info: <?php  echo "\n\t"; ?>
Version: <?php  echo esc_html(phpversion()) ."\n\t"; ?>
Memory Usage: <?php  echo round(memory_get_usage() / 1024 / 1024, 2) . "MB\n\t"; ?>
Memory Limit : <?php  echo $memory_limit . "\n\t"; ?>
Max Upload Size : <?php  echo $upload_max . "\n\t"; ?>
Max Post Size : <?php  echo $post_max . "\n\t"; ?>
Allow URL fopen : <?php  echo (ini_get('allow_url_fopen') ? "On" : "Off") . "\n\t"; ?>
Allow URL Include : <?php  echo (ini_get('allow_url_include') ? "On" : "Off") . "\n\t"; ?>
Display Errors : <?php  echo (ini_get('display_errors') ? "On" : "Off") . "\n\t"; ?>
Max Script Execution Time : <?php  echo $max_execute . " seconds\n\n"; ?>
Plugin: <?php  echo $plugin_data['Name'] ."\n"; ?>
Plugin Version: <?php  echo $plugin_data['Version'] ."\n"; ?>
Options: <?php  foreach ($trustindex_pm_trustpilot->get_option_names() as $opt_name) {
$option = get_option($trustindex_pm_trustpilot->get_option_name( $opt_name ));
echo "\n\t$opt_name: ";
if($opt_name == "page-details")
{
if(isset($option['reviews']))
{
unset($option['reviews']);
}
echo str_replace("\n", "\n\t\t", print_r($option, true));
}
else
{
echo $option;
}
}
echo "\n\n"; ?>
Reviews: <?php  echo str_replace("\n", "\n\t", print_r($reviews, true)) ."\n\n"; ?>
Active Theme: <?php 
if (!function_exists('wp_get_theme'))
{
$theme = get_theme(get_current_theme());
echo esc_html($theme['Name'] . ' ' . $theme['Version']);
}
else
{
$theme = wp_get_theme();
echo esc_html($theme->Name . ' ' . $theme->Version);
}
echo "\n"; ?>
Plugins: <?php  foreach (get_plugins() as $key => $plugin) {
echo "\n\t". esc_html($plugin['Name'].' ('.$plugin['Version'] . (is_plugin_active($key) ? ' - active' : '') . ')');
} ?>
</textarea>
<a href=".ti-troubleshooting-info" class="btn-text btn-copy2clipboard" style="margin-left: 0"><?php  echo TrustindexPlugin::___("Copy to clipboard"); ?></a>
<h1><?php  echo TrustindexPlugin::___("Re-create plugin"); ?></h1>
<p><?php  echo TrustindexPlugin::___('Re-create the database tables of the plugin.<br />Please note: this removes all settings and reviews.'); ?></p>
<a href="?page=<?php  echo $_GET['page']; ?>&tab=setup_no_reg&recreate" class="btn-text btn-refresh" data-loading-text="<?php  echo TrustindexPlugin::___("Loading") ;?>" style="margin-left: 0"><?php  echo TrustindexPlugin::___("Re-create plugin"); ?></a>
<h1><?php  echo TrustindexPlugin::___("Translation"); ?></h1>
<p>
		<?php echo TrustindexPlugin::___('If you notice an incorrect translation in the plugin text, please report it here:'); ?>

<a href="mailto:support@trustindex.io">support@trustindex.io</a>
</p>
</div>