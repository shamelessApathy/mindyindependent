<?php
?>

<div class="rr_shortcode_container">
	<div class="rr_shortcode_name">[RICH_REVIEWS_SNIPPET]</div>
	<div class="rr_shortcode_description">
		<?php echo __('This shortcode will insert an aggregate (average) score based on all approved reviews. By default, this aggregate score is based on the global reviews (as you might guess, the shortcode with its one option and corresponding default is [RICH_REVIEWS_SNIPPET category="none"]). More importantly for webmasters and those concerned with SEO is that this shortcode tags the aggregate score with Rich Snippet markup so that Google (and other search engines) will see the average score on that page, and display stars next to that page when it shows up in search results.', 'rich-reviews'); ?><br /><br />
		<?php echo __('This is given as a seperate shortcode, rather than integrated into the "show" shortcode, so that you may place this in, say, your footer and be able to have Rich Snippets on every page and post, without also having reviews taking up space.', 'rich-reviews'); ?><br /><br />
		<?php echo __('You can test your page', 'rich-reviews') . ' <a href="http://www.google.com/webmasters/tools/richsnippets" target=_blank>here</a>.' . __(' Note that Google is vague with exactly how exactly they give search results. It might take some time for the stars to show up next to your page, and it might only show up with specific search terms. The best thing you can do is make sure that the Rich Snippets tool, above, recognizes the star rating on your page, and be patient. We are constantly working to make sure we keep up with Google to ensure these ratings are displayed.', 'rich-reviews'); ?>
	</div>
	<div class="rr_shortcode_option_container">
		<div class="rr_shortcode_option_name">[RICH_REVIEWS_SNIPPET category="foo"]</div>
		<div class="rr_shortcode_option_text">
			<?php echo __('This will display the aggregate (average) score, along with the Rich Snippet markup, for all approved reviews with the category "foo".', 'rich-reviews'); ?>
		</div>
	</div>
	<div class="rr_shortcode_option_container">
		<div class="rr_shortcode_option_name">[RICH_REVIEWS_SNIPPET category="page"]</div>
		<div class="rr_shortcode_option_text">
			<?php echo __('This will display the aggregate (average) score, along with the Rich Snippet markup, for all approved reviews for the current page/post (again, you may equivalently use category="post").', 'rich-reviews'); ?>
		</div>
	</div>
	<div class="rr_shortcode_option_container">
		<div class="rr_shortcode_option_name">[RICH_REVIEWS_SNIPPET category="all"]</div>
		<div class="rr_shortcode_option_text">
			<?php echo __('This will display the aggregate (average) score, along with the Rich Snippet markup, for all approved reviews regardless of category. All categorized and uncategorized reviews will be factored into this aggregate rating.', 'rich-reviews'); ?>
		</div>
	</div>
	<div class="rr_shortcode_option_container">
		<div class="rr_shortcode_option_name">[RICH_REVIEWS_SNIPPET id="136"]</div>
		<div class="rr_shortcode_option_text">
			<?php echo __('You can now pass an id parameter with the id of a post. This will display the aggregate rating of all reviews submited on the page who\'s id you have passed. This allows you display aggregate ratings by post ID, in other locations than on the page which you collected the reviews. All other snippet shortcode parameters can be used in combination with this id parameter.', 'rich-reviews'); ?>
		</div>
	</div>
	<div class="rr_shortcode_option_container">
		<div class="rr_shortcode_option_name">[RICH_REVIEWS_SNIPPET stars_only="true"]</div>
		<div class="rr_shortcode_option_text">
			<?php echo __('You can now pass a stars_only parameter with a value of "true" in order to display a snippet without the associated text. This will only display the stars. This parameter is only effective, however, if the option to use star snippets is selected in the Rich Reviews options dashboard. All other snippet shortcode parameters can be used in combination with this parameter.', 'rich-reviews'); ?>
		</div>
	</div>
</div>
