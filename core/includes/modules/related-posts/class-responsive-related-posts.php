<?php

/**
 * Related Posts for Responsive theme.
 *
 * @package     Responsive WordPress theme
 */

if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly.
}
if (!class_exists('Responsive_Single_Blog_Related_Posts')) :
	/**
	 * Related Posts Initial Setup
	 */
	class Responsive_Single_Blog_Related_Posts
	{

		/**
		 *  Constructor
		 */
		public function __construct()
		{
			add_action('responsive_single_blog_related_posts_entry', array($this, 'responsive_single_blog_related_posts_markup'), 10);
		}

		/**
		 * Enable/Disable Single Post -> Related Posts section.
		 *
		 * @return void
		 */
		public function responsive_single_blog_related_posts_markup()
		{
			if (responsive_target_rules_for_related_posts()) {
				$this->responsive_single_blog_get_related_posts();
			}
		}

		/**
		 * Related Posts markup.
		 */
		public function responsive_single_blog_get_related_posts()
		{
			global $post;
			$post_id = $post->ID;
			$single_blog_related_posts_title = get_theme_mod('responsive_single_blog_related_posts_title', 'Related Posts');
			$exclude_ids = apply_filters('responsive_single_blog_related_posts_exclude_post_ids', array($post_id), $post_id);
			$related_single_posts_total_count = absint(get_theme_mod('responsive_single_blog_related_posts_count', 2));

			// Get related posts by WP_Query.
			$query_posts = $this->responsive_single_blog_get_related_posts_by_query($post_id);
			
			if ($query_posts) {

				$related_single_posts_section_loaded = false;

				do_action('responsive_before_related_single_posts_loop');

				$post_counter      = 1;
				$total_posts_count = $related_single_posts_total_count + 1;
				
				while ($query_posts->have_posts() && $post_counter < $total_posts_count ) {
					$query_posts->the_post();
					$post_id = get_the_ID();
					if (is_array($exclude_ids) && !in_array($post_id, $exclude_ids)) {
?>
						<?php
						if (false === $related_single_posts_section_loaded) {
							echo '<div class="responsive-single-related-posts-container">';

							if ('' !== $single_blog_related_posts_title) {
								echo apply_filters( // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
									'responsive_single_blog_related_posts_title',
									sprintf(
										'<div class="responsive-related-single-posts-title-section"> <%1$s class="responsive-related-single-posts-title entry-title"> %2$s </%1$s> </div>',
										'h2',
										$single_blog_related_posts_title
									)
								);
							}
							echo '<div class="responsive-related-single-posts-wrapper">';
							$related_single_posts_section_loaded = true;
						}
						?>
						<article <?php post_class('responsive-related-single-post'); ?>>
							<div class="responsive-related-single-posts-inner-section">
								<div class="responsive-related-single-post-content">
									<?php
									$this->responsive_get_related_single_post_structure($post_id);
									?>
								</div>
							</div>
						</article>
			<?php
					$post_counter++;
					}
					wp_reset_postdata();
				}

				if (true === $related_single_posts_section_loaded) {
					echo '</div> </div>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
				}

				do_action('responsive_after_related_single_posts_loop');
			}
		}

		/**
		 * Get related posts based on configurations.
		 *
		 * @param int $post_id Current Post ID.
		 *
		 * @return WP_Query|bool
		 */
		public function responsive_single_blog_get_related_posts_by_query($post_id)
		{
			$term_ids                         = array();
			$current_post_type                = get_post_type($post_id);
			$related_single_posts_total_count = absint(get_theme_mod('responsive_single_blog_related_posts_count', 2));
			$updated_related_single_posts_total_count = $related_single_posts_total_count + 1;
			$related_single_posts_order_by    = 'date';
			$related_single_posts_order       = 'desc';
			$related_single_posts_based_on    = get_theme_mod('responsive_single_blog_related_posts_taxonomy', 'category');

			$query_args = array(
				'update_post_meta_cache' => false,
				'posts_per_page'         => $updated_related_single_posts_total_count,
				'no_found_rows'          => true,
				'post_status'            => 'publish',
				'post_type'              => $current_post_type,
				'orderby'                => $related_single_posts_order_by,
				'order'                  => $related_single_posts_order,
				'fields'                 => 'ids',
			);

			if ('tag' === $related_single_posts_based_on) {
				$terms = get_the_tags($post_id);

				if (!empty($terms) && !is_wp_error($terms)) {
					$term_ids = wp_list_pluck($terms, 'term_id');
				}

				$query_args['tag__in'] = $term_ids;
			} else {
				$terms = get_the_category($post_id);

				if (!empty($terms) && !is_wp_error($terms)) {
					$term_ids = wp_list_pluck($terms, 'term_id');
				}

				$query_args['category__in'] = $term_ids;
			}

			$query_args = apply_filters('responsive_related_single_posts_query_args', $query_args);

			if (empty($term_ids)) {
				$query_args = apply_filters( 'responsive_single_blog_no_posts_matching_taxonomy', null);
				return null;
			}

			return new WP_Query($query_args);
		}

		/**
		 * Render Featured Image HTML.
		 *
		 * @param int     $current_post_id current post ID.
		 * 
		 * @return string|null
		 */
		public function responsive_single_blog_get_related_post_featured_image($current_post_id)
		{

			$appended_class = has_post_thumbnail($current_post_id) ? 'post-has-thumb' : 'responsive-no-thumb';
			$featured_img_markup = '<div class="responsive-related-single-post-featured-section ' . $appended_class . '">';

			// Check if the post has a featured image
			if (has_post_thumbnail($current_post_id)) {
				// Get the related post's permalink
				$post_permalink = get_permalink($current_post_id);

				// Get the featured image HTML
				$featured_image = get_the_post_thumbnail($current_post_id, 'large'); // 'large' is the image size; you can change it to your desired size

				// You can customize the HTML output here if needed
				$featured_img_markup .= '<div class="post-thumb-img-content post-thumb">';
				$featured_img_markup .= '<a href="' . esc_url($post_permalink) . '" class="related-single-post-featured-image">' . $featured_image . '</a>';
				$featured_img_markup .= '</a></div></div>';
				echo $featured_img_markup;
			} else {
				echo $featured_img_markup;
			}
		}

		/**
		 * Render Post Title HTML.
		 *
		 * @param int $current_post_id current post ID.
		 *
		 */
		public function responsive_get_related_single_post_title($current_post_id)
		{
			$target    = apply_filters('responsive_related_single_post_title_opening_target', '_self');
			$title_tag = apply_filters('responsive_related_single_post_title_tag', 'h3');

			do_action('responsive_related_post_before_title', $current_post_id);
			?>
			<<?php echo esc_html($title_tag); ?> class="responsive-related-single-post-title entry-title">
				<a href="<?php echo esc_url(apply_filters('responsive_related_single_post_link', get_the_permalink(), $current_post_id)); ?>" target="<?php echo esc_attr($target); ?>" rel="bookmark noopener noreferrer"><?php the_title(); ?></a>
			</<?php echo esc_html($title_tag); ?>>
		<?php
			do_action('responsive_related_single_post_after_title', $current_post_id);
		}

		/**
		 * Render Related Single Posts Structure
		 * 
		 * @package Responsive WordPress theme
		 * 
		 * @param int $current_post_id current post ID.
		 */
		public function responsive_get_related_single_post_structure($current_post_id)
		{

			// Get meta sections.
			$sections = responsive_single_blog_related_post_structure();

			// Return if sections are empty.
			if (
				empty($sections)
				|| 'post' !== get_post_type()
			) {
				return;
			}

			do_action('responsive_before_related_single_post_structure');

			foreach ($sections as $section) {
				if ('title' == $section) {
					$this->responsive_get_related_single_post_title($current_post_id);
				}
				if ('featured-image' == $section) {
					$this->responsive_single_blog_get_related_post_featured_image($current_post_id);
				}
				if ('meta' == $section) {
					$this->responsive_get_related_single_post_meta_data($current_post_id);
				}
				if ('excerpt' == $section) {
					$this->responsive_get_related_single_post_excerpt($current_post_id);
				}
			}

			do_action('responsive_after_related_single_post_structure');
		}
		/**
		 * Render Related Single Post Meta Data HTML
		 * 
		 * @package Responsive WordPress theme
		 * 
		 * @param int $current_post_id current post ID.
		 */
		public function responsive_get_related_single_post_meta_data($current_post_id)
		{

			// Get meta sections.
			$sections = responsive_single_blog_related_post_meta_elements();

			// Return if sections are empty.
			if (
				empty($sections)
				|| 'post' !== get_post_type()
			) {
				return;
			}

			do_action('responsive_before_related_single_post_meta');

		?>

			<div class="post-meta">
				<?php
				// Loop through meta sections.
				foreach ($sections as $section) {

					if ('author' === $section) {
				?>
						<span class="entry-author" <?php responsive_schema_markup('entry-author'); ?>>
							<?php
							echo sprintf(
								'<span class="author vcard">
							<a class="url fn n" href="%1$s" aria-label="%2$s" title="%2$s" itemprop="url">
								<i class="icon-user"></i>
								<span itemprop="name">%3$s</span>
							</a>
						</span>',
								esc_url(get_author_posts_url(get_the_author_meta('ID'))),
								/* translators: %s view posts by */
								esc_attr( sprintf( __( 'View all posts by %s', 'responsive' ), get_the_author() ) ),
								esc_attr( wp_kses_post( get_the_author() ) )
							);
							?>
						</span>
					<?php
					}

					if ('date' === $section) {
					?>
						<span class="entry-date">
							<?php
							printf(
								/* translators: 1: class, 2: date */
								'<i class="icon-calendar" aria-hidden="true"></i><span>' . esc_html_e('Posted on ', 'responsive') . '</span><span class="%1$s" itemprop="datePublished">%2$s</span>',
								'meta-prep meta-prep-author posted',
								sprintf(
									'<a href="%1$s" aria-label="%2$s" title="%2$s" rel="bookmark"><time class="timestamp updated" datetime="%3$s" itemprop="dateModified">%4$s</time></a>',
									esc_url(get_permalink()),
									esc_attr(get_the_title()),
									esc_html(get_the_date('c')),
									esc_html(get_the_date())
								)
							);
							?>
						</span>
					<?php
					}

					if ('comments' === $section && comments_open() && !post_password_required()) {
					?>
						<span class="entry-comment">
							<?php if (comments_open()) : ?>
								<span class="comments-link">
									<span class="mdash"><i class="icon-comments-o" aria-hidden="true"></i></span>
									<?php comments_popup_link(__('No Comments', 'responsive'), __('1 Comment', 'responsive'), __('% Comments', 'responsive')); ?>
								</span>
							<?php endif; ?>
						</span>
					<?php
					}
					if ('categories' === $section) {
					?>
						<span class="entry-category">
							<span class='posted-in'><i class="icon-folder-open" aria-hidden="true"></i>
								<?php
								/* translators: %s: category list */
								printf(esc_html__('Posted in %s', 'responsive'), wp_kses_post(get_the_category_list(__(', ', 'responsive'))));
								?>
							</span>
						</span>
					<?php
					}
					if ('tag' === $section) {
					?>
						<?php if (has_tag()) { ?>
							<span class="entry-tag">
								<span class="post-data">
									<?php
									/* translators: %s: tag list */
									printf(esc_html__('Tagged with %s', 'responsive'), wp_kses_post(get_the_tag_list('', __(', ', 'responsive'))));
									?>
								</span><!-- end of .post-data -->
							<?php
						}
							?>
							</span>
					<?php
					}
				}
					?>


			</div><!-- end of .post-meta -->
			<?php do_action('responsive_after_related_single_post_meta'); ?>
		<?php

		}

		/**
		 * Render Related Single Post Excerpt HTML
		 * 
		 * @package Responsive WordPress theme
		 * 
		 * @param int $current_post_id current post ID.
		 */
		public function responsive_get_related_single_post_excerpt($current_post_id)
		{

			$related_single_posts_content_type = apply_filters('responsive_related_single_posts_content_type', 'excerpt');

			if ('full-content' === $related_single_posts_content_type) {
				return the_content();
			}
			$excerpt_length = apply_filters('responsive_related_single_posts_excerpt_count', 25);
			$excerpt_length = absint($excerpt_length);

			$excerpt = wp_trim_words(get_the_excerpt(), $excerpt_length);

			if (!$excerpt) {
				$excerpt = null;
			}

			$excerpt = apply_filters('responsive_related_single_post_excerpt', $excerpt, $current_post_id);

			do_action('responsive_related_single_post_before_excerpt', $current_post_id);

		?>
			<p class="responsive-related-single-post-excerpt entry-content clear">
				<?php echo wp_kses_post($excerpt); ?>
			</p>
<?php

			do_action('responsive_related_single_post_after_excerpt', $current_post_id);
		}
	}

endif;
/**
 *  Kicking this off by creating NEW instance.
 */
return new Responsive_Single_Blog_Related_Posts();
