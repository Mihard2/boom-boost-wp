<?php include( plugin_dir_path(__FILE__ ) . "setup_no_reg_header.php" ); ?>

<h1><?php  echo TrustindexPlugin::___('Display your <strong>%s reviews</strong> with our <strong>FREE Widgets</strong>!', [ 'Trustpilot' ]); ?></h1>
<?php if(!$trustindex_pm_trustpilot->is_noreg_linked()): ?>

<p><?php  echo TrustindexPlugin::___('See an example below:'); ?></p>
	<?php echo $trustindex_pm_trustpilot->get_trustindex_widget('57c56e83699026ab146841e4b'); ?>

<?php endif; ?>

<h2><?php  echo TrustindexPlugin::___('Follow these 3 steps to embed %s in 2 minutes:', [ 'Trustpilot reviews' ]); ?></h2>
<ul class="numbered">
<li>
<h3><?php  echo TrustindexPlugin::___("Type your business/company's name and select from the list:"); ?></h3>
		<?php if($trustindex_pm_trustpilot->is_noreg_linked()): ?>

<p>
				<?php echo TrustindexPlugin::___("Your %s is connected.", [ TrustindexPlugin::___('Trustpilot page') ]); ?><br />

				<?php $page_details = get_option($trustindex_pm_trustpilot->get_option_name('page-details')); ?>

- <?php  echo TrustindexPlugin::___("Name"); ?>: <?php  echo $page_details['name']; ?><br />
- <?php  echo TrustindexPlugin::___("Link"); ?>: <strong><a href="https://www.trustpilot.com/review/<?php  echo $page_details['id']; ?>" target="_blank">https://www.trustpilot.com/review/<?php  echo $page_details['id']; ?></a></strong><br />
</p>
<form method="post" action="">
<input type="hidden" name="command" value="delete-page" />
				<?php wp_nonce_field( 'delete-noreg_'.$trustindex_pm_trustpilot->get_plugin_slug(), '_wpnonce_delete' ); ?>

<button class="btn btn-delete" type="submit"><?php  echo TrustindexPlugin::___("Disconnect"); ?></button>
</form>
		<?php else: ?>

<form method="post" action="" data-platform="trustpilot" id="submit-form">
<input type="hidden" name="command" value="save-page" />
				<?php wp_nonce_field( 'save-noreg_'.$trustindex_pm_trustpilot->get_plugin_slug(), '_wpnonce_save' ); ?>

<input type="hidden"
name="page_details"
class="form-control"
required="required"
id="ti-noreg-page_details"
value=""
/>
<div class="autocomplete" style="width: 600px; float: left;">
<input class="form-control name"
placeholder="<?php  echo TrustindexPlugin::___("e.g.:") . ' ' . $example; ?>"
type="text" required="required"
/>
<img class="loading" src="<?php  echo admin_url('images/loading.gif'); ?>" />
<div class="results"
data-errortext="<?php  echo TrustindexPlugin::___("Something went wrong."); ?>"
data-noresultstext="<?php  echo TrustindexPlugin::___("No results. %s cannot find your business by the terms you gave. Do not panic! There is an unique business search function in Trustindex, you only need to register for free and it will help you to find your business/store. Check out the next tab, called 'More Features'!", [" Trustpilot"]); ?>"
data-tooshorttext="<?php  echo TrustindexPlugin::___("Too short! Please enter your business' name and city, if applicable"); ?>"
></div>
</div>
<button class="btn btn-primary btn-search"><?php  echo TrustindexPlugin::___("Search") ;?></button>
<div style="display: none;" class="div-selected-page-info">
<p><?php  echo TrustindexPlugin::___('Selected page:'); ?></p>
<strong id="label-noreg-page_name"></strong><br />
<span id="label-noreg-address"></span>
- <span id="label-noreg-url"></span>
<button class="btn btn-primary btn-connect" data-loading-text="<?php  echo TrustindexPlugin::___("Loading") ;?>"><?php  echo TrustindexPlugin::___("Connect") ;?></button>
</div>
</form>
		<?php endif; ?>

</li>
	<?php include( plugin_dir_path(__FILE__ ) . "setup_no_reg_widget.php" ); ?>

	<?php include( plugin_dir_path(__FILE__ ) . "setup_no_reg_footer.php" ); ?>

</ul>