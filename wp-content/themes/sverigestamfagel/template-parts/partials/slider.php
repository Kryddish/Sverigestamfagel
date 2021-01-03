<div class="stf-slider">
	<ul>
		<?php
		if (have_rows('slider')) :
			while (have_rows('slider')) : the_row(); ?>

				<div class="slide">
					<img src="<?= get_sub_field('bild')['sizes']['large']; ?>" alt="Parrot image">
					<div class="overlay"></div>
					<div class="text">

						<?php
						if (get_sub_field('headline')) : ?>
							<h4><?= get_sub_field('headline'); ?></h4>
						<?php
						endif;

						if (get_sub_field('text')) : ?>
							<p><?= get_sub_field('text'); ?></p>
						<?php
						endif;

						if (get_sub_field('button')) : ?>
							<a href="<?php if (get_sub_field('link')) : the_sub_field('link');
										else : echo '#';
										endif; ?>">
								<?= get_sub_field('button'); ?>
							</a>
						<?php
						endif; ?>

					</div>
				</div>

		<?php
			endwhile;
		endif; ?>
	</ul>
	<button class="previous">
		<i class="icon-left-open" aria-hidden="true"></i>
	</button>
	<button class="next">
		<i class="icon-right-open" aria-hidden="true"></i>
	</button>
</div>
