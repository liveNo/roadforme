<?php
/**
 * The template for displaying the footer
 *
 * Contains footer content and the closing of the #main and #page div elements.
 *
 * @package Ribosome
 */
?>
	</div><!-- #main .wrapper -->
	<footer id="colophon" role="contentinfo">
		<div class="site-info">
			<div class="credits custom-credits"><?php echo wp_kses_post(get_theme_mod('ribosome_footer_text_center', __('Footer text center', 'ribosome'))); ?></div>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php
	if (get_theme_mod('ribosome_boton_ir_arriba', 1) == 1){ ?>
		<div class="ir-arriba"><i class="fa fa-arrow-up"></i></div>
	<?php } 
	
wp_footer(); ?>

</body>
</html>
