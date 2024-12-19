<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; 

class Widget_WPBITS_AFE_Image_Compare extends Widget_Base {

	public function get_name() {
		return 'wpb-image_compare';
	}

	public function get_title() {
		return "[WPBits] " . esc_html__( 'Image Compare', 'wpbits-addons-for-elementor' );
	}

	public function get_categories() {
		return [ 'wpbits-elementor-addons' ];
	}

	public function get_script_depends() {
		return [ 'wpb-image_compare', 'wpb-afe-imagesloaded' ];
	}

	public function get_icon() {
		return 'eicon-image-before-after';
	}
    
    public function get_widget_image_sizes() {
        $output_sizes = array();
        $img_sizes = get_intermediate_image_sizes();
        $output_sizes['full'] = esc_html__( 'Full', 'wpbits-addons-for-elementor' );
        foreach ($img_sizes as $size_name) {
            $output_sizes[$size_name] = $size_name;
        }
        return $output_sizes;
    }
    
	protected function register_controls() {

        // section start
		$this->start_controls_section(
			'images_section',
			[
				'label' => esc_html__( 'Images', 'wpbits-addons-for-elementor' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);
        
        $this->start_controls_tabs( 'tabs_thumbnail_style' );
        
        $this->start_controls_tab(
			'tab_before',
			[
				'label' => esc_html__( 'Before', 'wpbits-addons-for-elementor' ),
			]
        );      
        
        $this->add_control(
			'before_image',
			[
				'label' => esc_html__( 'Image', 'wpbits-addons-for-elementor' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
                'show_label' => false,
                'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
        );
        
        $this->add_control(
			'before_label', [
				'label' => esc_html__( 'Label', 'wpbits-addons-for-elementor' ),
				'type' => \Elementor\Controls_Manager::TEXT,
                'dynamic' => [
					'active' => true,
				],
			]
		);
        
        $this->end_controls_tab();

		$this->start_controls_tab(
			'tab_after',
			[
				'label' => esc_html__( 'After', 'wpbits-addons-for-elementor' ),
			]
        );
        
        $this->add_control(
			'after_image',
			[
				'label' => esc_html__( 'Image', 'wpbits-addons-for-elementor' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
                'show_label' => false,
                'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
        );
        
        $this->add_control(
			'after_label', [
				'label' => esc_html__( 'Label', 'wpbits-addons-for-elementor' ),
				'type' => \Elementor\Controls_Manager::TEXT,
                'dynamic' => [
					'active' => true,
				],
			]
		);

        $this->end_controls_tab();
        $this->end_controls_tabs();

        $this->add_control(
			'hr_img_size',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		);
        
        $this->add_control(
			'img_size',
			[
				'label' => esc_html__( 'Image Size', 'wpbits-addons-for-elementor' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'full',
				'options' => $this->get_widget_image_sizes(),
			]
		);
        
        $this->end_controls_section();
        
        // section start
		$this->start_controls_section(
			'settings_section',
			[
				'label' => esc_html__( 'Settings', 'wpbits-addons-for-elementor' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
        );

        $this->add_control(
			'orientation',
			[
				'label' => esc_html__( 'Orientation', 'wpbits-addons-for-elementor' ),
				'type' => \Elementor\Controls_Manager::CHOOSE,
				'options' => [
					'horizontal' => [
						'title' => esc_html__( 'Horizontal', 'wpbits-addons-for-elementor' ),
						'icon' => 'fas fa-arrows-alt-h',
					],
					'vertical' => [
						'title' => esc_html__( 'Vertical', 'wpbits-addons-for-elementor' ),
						'icon' => 'fas fa-arrows-alt-v',
					],
				],
				'default' => 'horizontal',
				'toggle' => false,
			]
		);

        $this->add_control(
			'offset',
			[
                'label' => esc_html__( 'Default Offset', 'wpbits-addons-for-elementor' ),
                'description' => esc_html__( 'How much of the before image is visible when the page loads.', 'wpbits-addons-for-elementor' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'min' => 0,
				'max' => 1,
				'step' => 0.1,
				'default' => 0.5
			]
        );
        
        $this->add_control(
			'overlay',
			[
				'label' => esc_html__( 'Hide Overlay', 'wpbits-addons-for-elementor' ),
				'type' => \Elementor\Controls_Manager::CHOOSE,
				'options' => [
					'true' => [
						'title' => esc_html__( 'Yes', 'wpbits-addons-for-elementor' ),
						'icon' => 'fas fa-check',
					],
					'false' => [
						'title' => esc_html__( 'No', 'wpbits-addons-for-elementor' ),
						'icon' => 'fas fa-times',
					],
				],
				'default' => 'false',
				'description' => esc_html__( 'Do not show the overlay with before and after.', 'wpbits-addons-for-elementor' ),
				'toggle' => false,
			]
        );
        
        $this->add_control(
			'move_overlay',
			[
				'label' => esc_html__( 'Move Slider on Hover', 'wpbits-addons-for-elementor' ),
				'type' => \Elementor\Controls_Manager::CHOOSE,
				'options' => [
					'true' => [
						'title' => esc_html__( 'Yes', 'wpbits-addons-for-elementor' ),
						'icon' => 'fas fa-check',
					],
					'false' => [
						'title' => esc_html__( 'No', 'wpbits-addons-for-elementor' ),
						'icon' => 'fas fa-times',
					],
				],
                'default' => 'false',
                'description' => esc_html__( 'Slider works only on front-end.', 'wpbits-addons-for-elementor' ),
				'toggle' => false,
			]
		);
        
        $this->end_controls_section();
  
        // section start
		$this->start_controls_section(
			'handle_bar_section',
			[
				'label' => esc_html__( 'Handle Bar', 'wpbits-addons-for-elementor' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
        );

        $this->add_control(
			'handle_bar_color',
			[
				'label' => esc_html__( 'Bar Color', 'wpbits-addons-for-elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
                    '{{WRAPPER}} .twentytwenty-horizontal .twentytwenty-handle:before,{{WRAPPER}} .twentytwenty-horizontal .twentytwenty-handle:after,{{WRAPPER}} .twentytwenty-vertical .twentytwenty-handle:after ,{{WRAPPER}} .twentytwenty-vertical .twentytwenty-handle:before' => 'background: {{VALUE}};',
                    '{{WRAPPER}} .twentytwenty-handle' => 'border-color: {{VALUE}};',
                    '{{WRAPPER}} .twentytwenty-right-arrow' => 'border-right-color: {{VALUE}};',
                    '{{WRAPPER}} .twentytwenty-up-arrow' => 'border-top-color: {{VALUE}};',
                    '{{WRAPPER}} .twentytwenty-down-arrow' => 'border-bottom-color: {{VALUE}};'  
				]
			]
        );

        $this->add_responsive_control(
			'handle_bar_size',
			[
				'label' => esc_html__( 'Bar Size (px)', 'wpbits-addons-for-elementor' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
						'step' => 1,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 3,
				],
				'selectors' => [
                    '{{WRAPPER}} .twentytwenty-horizontal .twentytwenty-handle:before,{{WRAPPER}} .twentytwenty-horizontal .twentytwenty-handle:after' => 'width: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .twentytwenty-vertical .twentytwenty-handle:before,{{WRAPPER}} .twentytwenty-vertical .twentytwenty-handle:after' => 'height: {{SIZE}}{{UNIT}};'
				],
			]
        );

        $this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'handle_bar_shadow',
				'label' => esc_html__( 'Box Shadow', 'wpbits-addons-for-elementor' ),
				'selector' => '{{WRAPPER}} .twentytwenty-handle:before, {{WRAPPER}} .twentytwenty-handle:after'
			]
		);

        $this->end_controls_section();

        $this->start_controls_section(
			'handle_btn_section',
			[
				'label' => esc_html__( 'Handle Button', 'wpbits-addons-for-elementor' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
        );
        
        $this->add_control(
			'handle_arrow_color',
			[
				'label' => esc_html__( 'Arrow Color', 'wpbits-addons-for-elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
                    '{{WRAPPER}} .twentytwenty-left-arrow' => 'border-left-color: {{VALUE}};',
                    '{{WRAPPER}} .twentytwenty-right-arrow' => 'border-right-color: {{VALUE}};',
                    '{{WRAPPER}} .twentytwenty-up-arrow' => 'border-top-color: {{VALUE}};',
                    '{{WRAPPER}} .twentytwenty-down-arrow' => 'border-bottom-color: {{VALUE}};',
				]
			]
        );

        $this->add_responsive_control(
			'handle_arrow_size',
			[
				'label' => esc_html__( 'Arrow Size (px)', 'wpbits-addons-for-elementor' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 40,
						'step' => 1,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 6,
				],
				'selectors' => [
                    '{{WRAPPER}} .twentytwenty-left-arrow,{{WRAPPER}} .twentytwenty-right-arrow,{{WRAPPER}} .twentytwenty-up-arrow,{{WRAPPER}} .twentytwenty-down-arrow' => 'border-width: {{SIZE}}{{UNIT}};'
				],
			]
        );

        $this->add_control(
			'handle_bg_color',
			[
				'label' => esc_html__( 'Background Color', 'wpbits-addons-for-elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
                    '{{WRAPPER}} .twentytwenty-handle' => 'background: {{VALUE}};'
				]
			]
        );

        $this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'handle_btn_shadow',
				'label' => esc_html__( 'Box Shadow', 'wpbits-addons-for-elementor' ),
				'selector' => '{{WRAPPER}} .twentytwenty-handle'
			]
		);
        
        $this->add_responsive_control(
			'handle_btn_width',
			[
				'label' => esc_html__( 'Width (px)', 'wpbits-addons-for-elementor' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'min' => 30,
						'max' => 200,
						'step' => 1,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 38,
				],
				'selectors' => [
                    '{{WRAPPER}} .twentytwenty-handle' => 'width: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .twentytwenty-vertical .twentytwenty-handle:before' => 'margin-left: calc({{SIZE}}{{UNIT}} / 2);',
                    '{{WRAPPER}} .twentytwenty-vertical .twentytwenty-handle:after' => 'margin-right: calc({{SIZE}}{{UNIT}} / 2);'
				],
			]
        );
        
        $this->add_responsive_control(
			'handle_btn_height',
			[
				'label' => esc_html__( 'Height (px)', 'wpbits-addons-for-elementor' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'min' => 30,
						'max' => 200,
						'step' => 1,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 38,
				],
				'selectors' => [
                    '{{WRAPPER}} .twentytwenty-handle' => 'height: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .twentytwenty-horizontal .twentytwenty-handle:before' => 'margin-bottom: calc({{SIZE}}{{UNIT}} / 2);',
                    '{{WRAPPER}} .twentytwenty-horizontal .twentytwenty-handle:after' => 'margin-top: calc({{SIZE}}{{UNIT}} / 2);'
				],
			]
		);
        
        $this->add_responsive_control(
			'handle_btn_border_size',
			[
				'label' => esc_html__( 'Border Size (px)', 'wpbits-addons-for-elementor' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
						'step' => 1,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 3,
				],
				'selectors' => [
                    '{{WRAPPER}} .twentytwenty-handle' => 'border-width: {{SIZE}}{{UNIT}};'
				],
			]
		);

        $this->end_controls_section();

        // section start
		$this->start_controls_section(
			'overlay_section',
			[
				'label' => esc_html__( 'Overlay', 'wpbits-addons-for-elementor' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
        );

        $this->add_control(
			'overlay_bg_color',
			[
				'label' => esc_html__( 'Background Color', 'wpbits-addons-for-elementor' ),
                'type' => Controls_Manager::COLOR,
				'selectors' => [
                    '{{WRAPPER}} .twentytwenty-overlay:hover' => 'background: {{VALUE}};'
				]
			]
        );

        $this->add_control(
			'labels_heading',
			[
				'label' => esc_html__( 'Labels', 'wpbits-addons-for-elementor' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
        );

        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'label_typography',
				'selector' => '{{WRAPPER}} .twentytwenty-before-label:before,{{WRAPPER}} .twentytwenty-after-label:before',
			]
        );

        $this->add_responsive_control(
			'label_spacing',
			[
				'label' => esc_html__( 'Spacing(px)', 'wpbits-addons-for-elementor' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
						'step' => 1,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 10,
				],
				'selectors' => [
                    '{{WRAPPER}} .twentytwenty-horizontal .twentytwenty-before-label:before' => 'left: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .twentytwenty-horizontal .twentytwenty-after-label:before' => 'right: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .twentytwenty-vertical .twentytwenty-before-label:before' => 'top: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .twentytwenty-vertical .twentytwenty-after-label:before' => 'bottom: {{SIZE}}{{UNIT}};',
				],
			]
        );
        
        $this->add_responsive_control(
			'label_padding',
			[
				'label' => esc_html__( 'Padding', 'wpbits-addons-for-elementor' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'rem' ],
				'selectors' => [
                    '{{WRAPPER}} .twentytwenty-before-label:before' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .twentytwenty-after-label:before' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
				],
			]
		);

        $this->add_responsive_control(
			'label_border_radius',
			[
				'label' => esc_html__( 'Border Radius', 'wpbits-addons-for-elementor' ),
				'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'rem' ],
				'selectors' => [
					'{{WRAPPER}} .twentytwenty-before-label:before' => 'border-top-left-radius: {{TOP}}{{UNIT}};border-top-right-radius: {{RIGHT}}{{UNIT}};border-bottom-right-radius: {{BOTTOM}}{{UNIT}};border-bottom-left-radius: {{LEFT}}{{UNIT}};',

                    '{{WRAPPER}} .twentytwenty-after-label:before' => 'border-top-left-radius: {{TOP}}{{UNIT}};border-top-right-radius: {{RIGHT}}{{UNIT}};border-bottom-right-radius: {{BOTTOM}}{{UNIT}};border-bottom-left-radius: {{LEFT}}{{UNIT}};',                    ]
			]
        );
        
        $this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'label_shadow',
				'label' => esc_html__( 'Box Shadow', 'wpbits-addons-for-elementor' ),
				'selector' => '{{WRAPPER}} .twentytwenty-after-label:before,{{WRAPPER}} .twentytwenty-before-label:before'
			]
		);

        $this->add_control(
			'before_label_heading',
			[
				'label' => esc_html__( 'Before Label', 'wpbits-addons-for-elementor' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
        );
        
        $this->add_control(
			'before_label_color',
			[
				'label' => esc_html__( 'Color', 'wpbits-addons-for-elementor' ),
                'type' => Controls_Manager::COLOR,
				'selectors' => [
                    '{{WRAPPER}} .twentytwenty-before-label:before' => 'color: {{VALUE}};'
				]
			]
        );

        $this->add_control(
			'before_label_bg_color',
			[
				'label' => esc_html__( 'Background Color', 'wpbits-addons-for-elementor' ),
                'type' => Controls_Manager::COLOR,
				'selectors' => [
                    '{{WRAPPER}} .twentytwenty-before-label:before' => 'background: {{VALUE}};'
				]
			]
        );

        $this->add_control(
			'after_label_heading',
			[
				'label' => esc_html__( 'After Label', 'wpbits-addons-for-elementor' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
        );

        $this->add_control(
			'after_label_color',
			[
				'label' => esc_html__( 'Color', 'wpbits-addons-for-elementor' ),
                'type' => Controls_Manager::COLOR,
				'selectors' => [
                    '{{WRAPPER}} .twentytwenty-after-label:before' => 'color: {{VALUE}};'
				]
			]
        );

        $this->add_control(
			'after_label_bg_color',
			[
				'label' => esc_html__( 'Background Color', 'wpbits-addons-for-elementor' ),
                'type' => Controls_Manager::COLOR,
				'selectors' => [
                    '{{WRAPPER}} .twentytwenty-after-label:before' => 'background: {{VALUE}};'
				]
			]
        );

        $this->end_controls_section();
	}

	/**
	 * Render 
	 */
	protected function render( ) {
        $settings = $this->get_settings_for_display();
        $before_img_url = \Elementor\Utils::get_placeholder_image_src();
        $after_img_url = \Elementor\Utils::get_placeholder_image_src();
        $before_label = $settings['before_label'];
        $after_label = $settings['after_label'];
		if ($settings['before_image']['url'] != $before_img_url) {
            $before_img_array = wp_get_attachment_image_src($settings['before_image']['id'], $settings['img_size'], true);
            $before_img_url = $before_img_array[0];
        }
        if ($settings['after_image']['url'] != $after_img_url) {
            $after_img_array = wp_get_attachment_image_src($settings['after_image']['id'], $settings['img_size'], true);
            $after_img_url = $after_img_array[0];
        }
        if (empty($before_label)) {
            $before_label = esc_html__( 'Before', 'wpbits-addons-for-elementor' );
        }
        if (empty($after_label)) {
            $after_label = esc_html__( 'After', 'wpbits-addons-for-elementor' );
        }
        ?>
        <div class="wpb-image-compare">
            <div class="twentytwenty-container" data-orientation="<?php echo esc_attr($settings['orientation']); ?>" data-moveover="<?php echo esc_attr($settings['move_overlay']); ?>" data-overlay="<?php echo esc_attr($settings['overlay']); ?>" data-offset="<?php echo esc_attr($settings['offset']); ?>" data-afterlabel="<?php echo esc_attr($after_label); ?>" data-beforelabel="<?php echo esc_attr($before_label); ?>">
                <img src="<?php echo esc_url($before_img_url); ?>" alt="<?php echo esc_attr($before_label); ?>">
                <img src="<?php echo esc_url($after_img_url); ?>" alt="<?php echo esc_attr($after_label); ?>">
            </div>
        </div>
    <?php } 

}
Plugin::instance()->widgets_manager->register_widget_type( new Widget_WPBITS_AFE_Image_Compare() );