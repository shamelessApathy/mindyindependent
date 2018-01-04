<?php
	if($data["use_stars"]) {
		if (isset($stars_only) && $stars_only) {
			?>
			<div itemscope itemtype="http://schema.org/<?php if(isset($options['schema_type']) && $options['schema_type'] != '' ) { echo $options['schema_type']; } else { echo 'Product'; } ?>">
				<span itemprop="name" style="display:none">
					<?php echo $data['category']; ?>
				</span>
				<?php echo $data['url_markup'];?>
				<span itemprop="aggregateRating" itemscope itemtype="http://schema.org/AggregateRating">
					<span class="stars">
						<?php echo $data['stars']; ?>
					</span>
					<span class="rating" itemprop="ratingValue" style="display: none !important;">
						<?php echo $data['average']; ?>
					</span>
					<span class="votes" itemprop="reviewCount" style="display:none">
						<?php echo $data['reviewsCount']; ?>
					</span>
					<div style="display:none">
						<span itemprop="bestRating">5</span>
						<span itemprop="worstRating">1</span>
					</div>
				</span>
			</div>
			<?php
		} else {
			?>
			<div itemscope itemtype="http://schema.org/<?php if(isset($options['schema_type']) && $options['schema_type'] != '' ) { echo $options['schema_type']; } else { echo 'Product'; } ?>">
				<span itemprop="name" style="display:none">
					<?php echo $data['category']; ?>
				</span>
				<?php echo $data['url_markup'];
					_e('Overall rating:' , 'rich-reviews');
				?>
				<span itemprop="aggregateRating" itemscope itemtype="http://schema.org/AggregateRating">
					<span class="stars">
						<?php echo $data['stars']; ?>
					</span>
					<span class="rating" itemprop="ratingValue" style="display: none !important;">
						<?php echo $data['average']; ?>
					</span> based on
					<span class="votes" itemprop="reviewCount">
						<?php echo $data['reviewsCount']; ?>
					</span> reviews
					<div style="display:none">
						<span itemprop="bestRating">5</span>
						<span itemprop="worstRating">1</span>
					</div>
				</span>
			</div>
			<?php
		}
		render_custom_styles($data['options']);
	} else {
		?>
		<div itemscope itemtype="http://schema.org/<?php if(isset($options['schema_type']) && $options['schema_type'] != '' ) { echo $options['schema_type']; } else { echo 'Product'; } ?>">
			<span itemprop="name" style="display:none">
				<?php echo $data['category']; ?>
			</span>
			<?php echo $data['url_markup'];
				_e('Overall rating:', 'rich-reviews');
			?>
			<span itemprop="aggregateRating" itemscope itemtype="http://schema.org/AggregateRating">
				<strong><span class="value" itemprop="ratingValue">
					<?php echo $data['average']; ?>
				</span></strong> out of
				<strong><span itemprop="bestRating">5</span></strong> based on
				<span class="votes" itemprop="reviewCount">
					<?php echo $data['reviewsCount']; ?>
				</span> reviews.
			</span>
		</div>
	<?php
	}
