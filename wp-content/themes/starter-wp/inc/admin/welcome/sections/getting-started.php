<?php
/**
 * Welcome screen getting started template
 */
?>
<?php $theme_data = wp_get_theme('starter-wp'); ?>

<div id="getting_started" class="panel">
    <div class="theme_link evidence">
        <?php if ( is_plugin_active( 'starter-wp-premium/'. $theme_data->get( 'TextDomain' ) .'-premium.php' ) )  { ?>
           <h3><?php printf(esc_html__('%s Premium', 'starter-wp'), $theme_data->Name); ?></h3>
           <p>
               <?php esc_html_e( 'Remember to activate your license key to get sproduct support and updates.', 'starter-wp'); ?>
           </p>
           <p><a href="<?php echo esc_url( admin_url() . 'themes.php?page=starter-wp-premium-license' ); ?>" class="button-upgrade">
               <?php esc_html_e('view license key', 'starter-wp'); ?>
          </a></p>
           <p>
           <strong><?php esc_html__('Having troubles?', 'starter-wp'); ?></strong></br>

            <?php printf(__('<a href="%s" target="_blank">Contact us</a> and talk with our support team, we will glad to help you.', 'starter-wp'), esc_url( 'http://www.iograficathemes.com/premium-support/' )); ?>

           </p>
        <?php } else { ?>
        <h3><?php printf(esc_html__('%s Premium', 'starter-wp'), $theme_data->Name); ?></h3>
        <p class="about">
            <?php printf(__('%s Premium expands the already powerful free version of this theme and gives access to our priority support service.', 'starter-wp'), $theme_data->Name); ?>
        </p>    
        <p> 
            <a href="<?php echo esc_url( 'http://www.iograficathemes.com/downloads/'. $theme_data->get( 'TextDomain' ) ); ?>" target="_blank" class="button-upgrade"><?php esc_html_e('upgrade to premium', 'starter-wp'); ?></a>
        </p>
        <?php } ?>
    </div>
     <div class="theme_link">
        <h3><?php esc_html_e( 'Enjoying the theme?', 'starter-wp' ); ?></h3>
        <p class="about"><?php esc_html_e( 'If you like this theme why not leave us a review on WordPress.org?  We\'d really appreciate it!', 'starter-wp' ); ?></p>
        <p>
            <a href="<?php echo esc_url( 'https://wordpress.org/support/theme/'. $theme_data->get( 'TextDomain' ) .'/reviews/#new-post' ); ?>" target="_blank" class="button button-secondary"><?php esc_html_e('Add Your Review', 'starter-wp'); ?></a>
        </p>
    </div>
    <div class="theme_link">
        <h3><?php esc_html_e( 'Theme Documentation', 'starter-wp' ); ?></h3>
        <p class="about"><?php printf(esc_html__('Need any help to setup and configure %s? Please have a look at our documentations instructions.', 'starter-wp'), $theme_data->Name); ?></p>
        <p>
            <a href="<?php echo esc_url( 'http://www.iograficathemes.com/documentation/'. $theme_data->get( 'TextDomain' ) .'-premium/' ); ?>" target="_blank" class="button button-secondary"><?php esc_html_e('View Documentation', 'starter-wp'); ?></a>
        </p>
    </div>
    <div class="theme_link">
        <h3><?php esc_html_e( 'Theme Customizer', 'starter-wp' ); ?></h3>
        <p class="about"><?php printf(esc_html__('%s supports the Theme Customizer for all theme settings. Click "Customize" to start customize your site.', 'starter-wp'), $theme_data->Name); ?></p>
        <p>
            <a href="<?php echo admin_url('customize.php'); ?>" class="button button-secondary"><?php esc_html_e('Start Customize', 'starter-wp'); ?></a>
        </p>
    </div>

</div><!-- end ig-started -->
