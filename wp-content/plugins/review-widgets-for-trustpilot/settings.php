<?php

defined( 'ABSPATH' ) or die( 'No script kiddies please!' );
if (!current_user_can('manage_options'))
{
die('The account you\'re logged in to doesn\'t have permission to access this page.');
}
if(isset($_GET['rate_us']))
{
switch(sanitize_text_field($_GET['rate_us']))
{
case 'open':
update_option($trustindex_pm_trustpilot->get_option_name('rate-us') , 'hide', false);
$url = 'https://wordpress.org/support/plugin/'. $trustindex_pm_trustpilot->get_plugin_slug() . '/reviews/?rate=5#new-post';
header('Location: '. $url);
die;
case 'later':
$time = time() + (30 * 86400);
update_option($trustindex_pm_trustpilot->get_option_name('rate-us') , $time, false);
break;
case 'hide':
update_option($trustindex_pm_trustpilot->get_option_name('rate-us') , 'hide', false);
break;
}
echo "<script type='text/javascript'>self.close();</script>";
die;
}
$tabs = [];
if($trustindex_pm_trustpilot->is_trustindex_connected())
{
$default_tab = 'setup_trustindex_join';
$tabs[ 'Trustindex admin' ] = "setup_trustindex_join";
$tabs[ TrustindexPlugin::___("Free Widget Configurator") ] = "setup_no_reg";
}
else
{
$default_tab = 'setup_no_reg';
$tabs[ TrustindexPlugin::___("Free Widget Configurator") ] = "setup_no_reg";
}
if($trustindex_pm_trustpilot->is_noreg_linked())
{
$tabs[ TrustindexPlugin::___("My Reviews") ] = "my_reviews";
}
$tabs[ TrustindexPlugin::___('Rate Us') ] = "rate";
if(!$trustindex_pm_trustpilot->is_trustindex_connected())
{
$tabs[ TrustindexPlugin::___('Get more Features') ] = "setup_trustindex";
$tabs[ TrustindexPlugin::___('Log In') ] = "setup_trustindex_join";
}
$tabs[ TrustindexPlugin::___('Troubleshooting') ] = "troubleshooting";
$selected_tab = isset($_GET['tab']) ? sanitize_text_field($_GET['tab']) : null; 
$subtabs = null;
$found = false;
foreach($tabs as $tab)
{
if(is_array($tab))
{
if(array_search($selected_tab, $tab) !== FALSE)
{
$found = true;
break;
}
}
else
{
if($selected_tab == $tab)
{
$found = true;
break;
}
}
}
if(!$found)
{
$selected_tab = $default_tab;
}
wp_enqueue_script( "trustindex_settings_script_common_trustpilot");
wp_enqueue_style( "trustindex_settings_style_trustpilot" );
if(wp_script_is( "trustindex_settings_script_trustpilot", 'registered' ))
{
wp_enqueue_script( "trustindex_settings_script_trustpilot");
}
?>
<div id="trustindex-plugin-settings-page">
<h1><a href="https://www.trustindex.io" target="_blank" title="Trustindex">
<img src="<?php  echo $trustindex_pm_trustpilot->get_plugin_file_url('static/img/trustindex.svg'); ?>" /></a>
</h1>
<div class="container_wrapper">
<div class="container_cell" id="container-main">
<div class="nav-tab-wrapper">
				<?php foreach($tabs as $tab_name => $tab): ?>

					<?php

$is_active = $selected_tab == $tab;
$action = $tab;
if(is_array($tab))
{
$is_active = array_search($selected_tab, $tab) !== FALSE;
$action = array_shift(array_values($tab));
if($is_active)
{
$subtabs = $tab;
}
}
?>
<a
id="link-tab-<?php  echo $action; ?>"
class="nav-tab<?php  if($is_active): ?> nav-tab-active<?php  endif; ?><?php  if($tab == 'troubleshooting'): ?> float-right<?php  endif; ?>"
href="<?php  echo admin_url('admin.php?page='.$trustindex_pm_trustpilot->get_plugin_slug().'/settings.php&tab='.$action); ?>"
><?php  echo $tab_name; ?></a>
				<?php endforeach; ?>

</div>
			<?php if($subtabs): ?>

<div class="nav-tab-wrapper sub-nav">
				<?php foreach($subtabs as $tab_name => $tab): ?>

<a
id="link-tab-<?php  echo $tab; ?>"
class="nav-tab<?php  if($selected_tab == $tab): ?> nav-tab-active<?php  endif; ?>"
href="<?php  echo admin_url('admin.php?page='.$trustindex_pm_trustpilot->get_plugin_slug().'/settings.php&tab='.$tab); ?>"
><?php  echo $tab_name; ?></a>
				<?php endforeach; ?>

</div>
			<?php endif; ?>

<div id="tab-<?php  echo $selected_tab; ?>">
				<?php if($trustindex_pm_trustpilot->is_trustindex_connected() && in_array($selected_tab, [ 'setup_no_reg', 'my_reviews' ])): ?>

<div class="notice notice-warning" style="margin: 0 0 15px 0">
<p>
						<?php echo TrustindexPlugin::___("You have connected your Trustindex account, so you can find premium functionality under the \"%s\" tab. You no longer need this tab unless you choose the limited but forever free mode.", ["Trustindex admin"]); ?>

</p>
</div>
				<?php endif; ?>

				<?php include( plugin_dir_path(__FILE__ ) . "tabs/".$selected_tab.".php" ); ?>

</div>
</div>
		<?php /*

<div class="container_cell" id="container-sidebar">
<div class="box">
<div class="box-header">
<h4><?php  echo TrustindexPlugin::___('Pro package'); ?></h4>
</div>
<div class="box-content">
<p>
+ <?php  echo TrustindexPlugin::___('No ads'); ?><br />
+ <?php  echo TrustindexPlugin::___('No banner'); ?><br />
</p>
<hr />
<a href="https://www.trustindex.io" target="_blank" class="btn btn-primary">Check www.trustindex.io!</a>
</div>
</div>
</div>
*/ ?>
</div>
</div>