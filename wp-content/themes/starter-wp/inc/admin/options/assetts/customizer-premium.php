<?php
/*****************************************************************
* PREMIUM
******************************************************************/
    if ( apply_filters( 'igthemes_customizer_more', true ) ) {
        
        $wp_customize->add_section( 'upgrade_premium' , array(
            'title'      		=> __( 'More Options', 'starter-wp' ),
            'panel'             => 'igtheme_options',
            'priority'   		=> 1,
        ) );

        $wp_customize->add_setting( 'upgrade_premium', array(
            'default'    		=> null,
            'sanitize_callback' => 'igthemes_sanitize_text',
        ) );

        $wp_customize->add_control( new IGthemes_More_Control( $wp_customize, 'upgrade_premium', array(
            'label'    			=> __( 'Looking for more options?', 'starter-wp' ),
            'section'  			=> 'upgrade_premium',
            'settings' 			=> 'upgrade_premium',
            'priority' 			=> 1,
        ) ) );
    //end
  }