<?php

defined( 'ABSPATH' ) or die( 'No script kiddies please!' );
if(isset($_COOKIE['ti-success']))
{
$ti_success = sanitize_text_field($_COOKIE['ti-success']);
setcookie('ti-success', '', time() - 60, "/");
}
$reviews = [];
if($trustindex_pm_trustpilot->is_noreg_linked() && $trustindex_pm_trustpilot->is_noreg_table_exists())
{
$reviews = $wpdb->get_results('SELECT * FROM '. $trustindex_pm_trustpilot->get_noreg_tablename() .' ORDER BY date DESC');
}
function trustindex_write_rating_stars($score)
{
global $trustindex_pm_trustpilot;
if($trustindex_pm_trustpilot->is_ten_scale_rating_platform())
{
return '<div class="ti-rating-box">'. $trustindex_pm_trustpilot->formatTenRating($score) .'</div>';
}
$text = "";
$link = "https://cdn.trustindex.io/assets/platform/Trustpilot/star/";
if(!is_numeric($score))
{
return $text;
}
for ($si = 1; $si <= $score; $si++)
{
$text .= '<img src="'. $link .'f.svg" class="ti-star" />';
}
$fractional = $score - floor($score);
if( 0.25 <= $fractional )
{
if ( $fractional < 0.75 )
{
$text .= '<img src="'. $link .'h.svg" class="ti-star" />';
}
else
{
$text .= '<img src="'. $link .'f.svg" class="ti-star" />';
}
$si++;
}
for (; $si <= 5; $si++)
{
$text .= '<img src="'. $link .'e.svg" class="ti-star" />';
}
return $text;
}
wp_enqueue_script('trustindex-js', 'https://cdn.trustindex.io/www-assets/trustindex-review.js', [], false, true);
wp_enqueue_style('trustindex-widget-css', 'https://cdn.trustindex.io/assets/widget-presetted-css/4-light-background.css');
wp_add_inline_script('trustindex-js', '
jQuery(".ti-review-content").TI_shorten({
"showChars": 250,
"lessText": "'. TrustindexPlugin::___("Show less") .'",
"moreText": "'. TrustindexPlugin::___("Show more") .'",
});
jQuery(".ti-review-content").TI_format();
');
?>
<h1><?php  echo TrustindexPlugin::___("My Reviews"); ?></h1>
<?php if(!$trustindex_pm_trustpilot->is_noreg_linked()): ?>

<div class="notice notice-warning" style="margin-left: 0">
<p><?php  echo TrustindexPlugin::___("Connect your %s platform to download reviews.", ["Trustpilot"]); ?></p>
</div>
<?php else: ?>

<div class="tablenav top" style="margin-bottom: 15px">
<div class="alignleft actions">
<a href="?page=<?php  echo $_GET['page']; ?>&tab=setup_no_reg&refresh&my_reviews" class="btn-text btn-refresh btn-download-reviews" style="margin-left: 0" data-loading-text="<?php  echo TrustindexPlugin::___("Loading") ;?>" data-delay=10><?php  echo TrustindexPlugin::___("Download new reviews") ;?></a>
</div>
</div>
	<?php if($ti_success == "reviews-loaded"): ?>

<div class="notice notice-success is-dismissible" style="margin: 0 0 15px 0">
<p><?php  echo TrustindexPlugin::___("New reviews loaded!"); ?></p>
</div>
	<?php endif; ?>

	<?php if(!$trustindex_pm_trustpilot->is_trustindex_connected()): ?>

<div class="notice notice-warning" style="margin: 0 0 15px 0">
<p>
			<?php echo TrustindexPlugin::___("Don't want to waste your time constantly updating? Trustindex paid packages solve this for you from $3.75* per month"); ?><br />

<small><?php  echo TrustindexPlugin::___("(* with onboarding discount)"); ?></small>
</p>
</div>
	<?php endif; ?>

	<?php if(!count($reviews)): ?>

<div class="notice notice-warning" style="margin-left: 0">
<p><?php  echo TrustindexPlugin::___("You had no reviews at the time of last review downloading."); ?></p>
</div>
	<?php else: ?>

<table class="wp-list-table widefat fixed striped table-view-list ti-my-reviews ti-widget">
<thead>
<tr>
<th class="text-center"><?php  echo TrustindexPlugin::___("Reviewer"); ?></th>
<th class="text-center" style="width: 90px;"><?php  echo TrustindexPlugin::___("Rating"); ?></th>
<th class="text-center"><?php  echo TrustindexPlugin::___("Date"); ?></th>
<th style="width: 70%"><?php  echo TrustindexPlugin::___("Text"); ?></th>
</tr>
</thead>
<tbody>
				<?php foreach ($reviews as $review): ?>

<tr>
<td class="text-center">
<img src="<?php  echo $review->user_photo; ?>" class="ti-user-avatar" /><br />
							<?php echo $review->user; ?>

</td>
<td class="text-center source-Trustpilot"><?php  echo trustindex_write_rating_stars($review->rating); ?></td>
<td class="text-center"><?php  echo $review->date; ?></td>
<td class="ti-review-content"><?php  echo $review->text; ?></td>
</tr>
				<?php endforeach; ?>

</tbody>
</table>
	<?php endif; ?>

<?php endif; ?>