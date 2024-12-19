<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; 

class Widget_WPBITS_AFE_Logo_Grid extends Widget_Base {

	public function get_name() {
		return 'wpb-logo_grid';
	}

	public function get_title() {
		return "[WPBits] " . esc_html__( 'Logo Grid', 'wpbits-addons-for-elementor' );
	}

	public function get_categories() {
		return [ 'wpbits-elementor-addons' ];
	}

	public function get_script_depends() {
		return [ 'wpb-tooltip' ];
	}

	public function get_icon() {
		return 'eicon-logo';
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
			'settings_section',
			[
				'label' => esc_html__( 'Logos', 'wpbits-addons-for-elementor' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);
        
        $repeater = new \Elementor\Repeater();
        
        $repeater->add_control(
			'image',
			[
				'label' => esc_html__( 'Logo', 'wpbits-addons-for-elementor' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
        );
        
        $repeater->add_control(
			'website_link',
			[
				'label' => esc_html__( 'Link to', 'wpbits-addons-for-elementor' ),
				'type' => \Elementor\Controls_Manager::URL,
				'placeholder' => esc_html__( 'https://wpbits.net', 'wpbits-addons-for-elementor' ),
				'show_external' => true,
				'default' => [
					'url' => '',
					'is_external' => true,
					'nofollow' => true,
				],
			]
        );
        
        $this->add_control(
			'list', [
				'label' => esc_html__( 'Logos', 'wpbits-addons-for-elementor' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
                'show_label' => false,
				'default' => [
                    [
                        'image' => \Elementor\Utils::get_placeholder_image_src()
				    ],
				    [
                        'image' => \Elementor\Utils::get_placeholder_image_src()
					],
					[
                        'image' => \Elementor\Utils::get_placeholder_image_src()
				    ],
				    [
                        'image' => \Elementor\Utils::get_placeholder_image_src()
				    ]
			     ]
            ]
		);
		
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
				'default' => 'large',
				'options' => $this->get_widget_image_sizes(),
			]
		);
        
		$this->end_controls_section();
		
		// section start
		$this->start_controls_section(
			'content_tooltip_settings',
			[
				'label' => esc_html__( 'Tooltip Settings', 'wpbits-addons-for-elementor' ),
			  	'tab' => \Elementor\Controls_Manager::TAB_CONTENT
			]
		); 

		$this->add_control(
			'enable_tooltip',
			[
				'label' => esc_html__( 'Tooltip', 'wpbits-addons-for-elementor' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'ON', 'wpbits-addons-for-elementor' ),
				'label_off' => esc_html__( 'OFF', 'wpbits-addons-for-elementor' ),
				'return_value' => 'yes',
				'default' => '',
				'description' => esc_html__( 'Display the caption of the image.', 'wpbits-addons-for-elementor' )
			]
		);
	  
		$this->add_control(
			'anim',
			[
				'label' => esc_html__( 'Animation', 'wpbits-addons-for-elementor' ),
				'type' => \Elementor\Controls_Manager::ANIMATION,
				'label_block' => true
			]
		);
		
		$this->add_control(
			'follow_mouse',
			[
				'label' => esc_html__( 'Follow Mouse', 'wpbits-addons-for-elementor' ),
				'type' => \Elementor\Controls_Manager::CHOOSE,
				'options' => [
					'true' => [
						'title' => esc_html__( 'On', 'wpbits-addons-for-elementor' ),
						'icon' => 'fas fa-check',
					],
					'false' => [
						'title' => esc_html__( 'Off', 'wpbits-addons-for-elementor' ),
						'icon' => 'fas fa-times',
					],
				],
				'default' => 'false',
				'description' => esc_html__( 'If set to enabled the tooltip will follow the users mouse cursor.', 'wpbits-addons-for-elementor' ),
				'toggle' => false,
			]
		);
		
		$this->add_control(
			'mouse_on_to_popup',
			[
				'label' => esc_html__( 'Mouse on to Popup', 'wpbits-addons-for-elementor' ),
				'type' => \Elementor\Controls_Manager::CHOOSE,
				'options' => [
					'true' => [
						'title' => esc_html__( 'On', 'wpbits-addons-for-elementor' ),
						'icon' => 'fas fa-check',
					],
					'false' => [
						'title' => esc_html__( 'Off', 'wpbits-addons-for-elementor' ),
						'icon' => 'fas fa-times',
					],
				],
				'default' => 'false',
				'description' => esc_html__( 'Allow the mouse to hover on the tooltip. This lets users interact with the content in the tooltip. Only applies if Follow Mouse is disabled.', 'wpbits-addons-for-elementor' ),
				'toggle' => false,
			]
		);
		
		$this->add_control(
			'placement',
			[
				'label' => esc_html__( 'Placement', 'wpbits-addons-for-elementor' ),
				'description' => esc_html__( 'Placement location of the tooltip relative to the element it is open for.', 'wpbits-addons-for-elementor' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'n',
				'options' => [
					'n'  => esc_html__( 'Top', 'wpbits-addons-for-elementor' ),
					'e'  => esc_html__( 'Right', 'wpbits-addons-for-elementor' ),
					'w'  => esc_html__( 'Left', 'wpbits-addons-for-elementor' ),
					's'  => esc_html__( 'Bottom', 'wpbits-addons-for-elementor' ),
					'nw'  => esc_html__( 'Top-Left', 'wpbits-addons-for-elementor' ),
					'ne'  => esc_html__( 'Top-Right', 'wpbits-addons-for-elementor' ),
					'sw'  => esc_html__( 'Bottom-Left', 'wpbits-addons-for-elementor' ),
					'se'  => esc_html__( 'Bottom-Right', 'wpbits-addons-for-elementor' ),
					'nw-alt'  => esc_html__( 'Top-Left-Alt', 'wpbits-addons-for-elementor' ),
					'ne-alt'  => esc_html__( 'Top-Right-Alt', 'wpbits-addons-for-elementor' ),
					'sw-alt'  => esc_html__( 'Bottom-Left-Alt', 'wpbits-addons-for-elementor' ),
					'se-alt'  => esc_html__( 'Bottom-Right-Alt', 'wpbits-addons-for-elementor' ),
				],
			]
		);
		
		$this->add_control(
			'smart_placement',
			[
				'label' => esc_html__( 'Smart Placement', 'wpbits-addons-for-elementor' ),
				'type' => \Elementor\Controls_Manager::CHOOSE,
				'options' => [
					'true' => [
						'title' => esc_html__( 'On', 'wpbits-addons-for-elementor' ),
						'icon' => 'fas fa-check',
					],
					'false' => [
						'title' => esc_html__( 'Off', 'wpbits-addons-for-elementor' ),
						'icon' => 'fas fa-times',
					],
				],
				'default' => 'false',
				'description' => esc_html__( 'When enabled the plugin will try to keep tips inside the browser viewport. Only applies if follow mouse is disabled.', 'wpbits-addons-for-elementor' ),
				'toggle' => false,
			]
		);
		
		$this->add_control(
			'offset',
			[
				'label' => esc_html__( 'Offset', 'wpbits-addons-for-elementor' ),
				'description' => esc_html__( 'This will be the offset from the element the tooltip is open for, or from the mouse cursor if follow mouse is enabled.', 'wpbits-addons-for-elementor' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'min' => 0,
				'max' => 100,
				'step' => 1,
				'default' => 10
			]
		);
		
		$this->end_controls_section();

        $this->start_controls_section(
			'grid_section',
			[
				'label' => esc_html__( 'Grid', 'wpbits-addons-for-elementor' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

        $this->add_responsive_control(
			'columns',
			[
				'label' => esc_html__( 'Columns', 'wpbits-addons-for-elementor' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'min' => 1,
						'max' => 12,
						'step' => 1,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 4,
				],
				'selectors' => [
                    '{{WRAPPER}} .wpb-logo-grid' => 'grid-template-columns:repeat({{SIZE}}, 1fr);'
				],
			]
		);
        
        $this->add_responsive_control(
			'gap',
			[
				'label' => esc_html__( 'Grid Gap (px)', 'wpbits-addons-for-elementor' ),
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
					'size' => 20,
				],
				'selectors' => [
                    '{{WRAPPER}} .wpb-logo-grid' => 'grid-gap: {{SIZE}}{{UNIT}};'
				],
			]
		);
        
        $this->end_controls_section();
        
        // section start
        $this->start_controls_section(
			'section_grid_item',
			[
				'label' => esc_html__( 'Grid Item', 'wpbits-addons-for-elementor' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
        );

        $this->add_control(
			'grid_item_bg_color',
			[
				'label' => esc_html__( 'Background Color', 'wpbits-addons-for-elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wpb-logo-grid-item' => 'background-color: {{VALUE}};'
				]
			]
        );
        
        $this->add_control(
			'hr_grid_item_1',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		);

        $this->add_responsive_control(
			'grid_item_min_height',
			[
				'label' => esc_html__( 'Minimum Height', 'wpbits-addons-for-elementor' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px', 'rem', 'vh' ],
				'range' => [
                    'px' => [
						'min' => 0,
						'max' => 1000,
					],
                    'vh' => [
						'min' => 0,
						'max' => 100,
					],
                    'rem' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'selectors' => [
                    '{{WRAPPER}} .wpb-logo-grid-item' => 'min-height: {{SIZE}}{{UNIT}};'
				],
			]
        );
        
        $this->add_responsive_control(
			'grid_item_padding',
			[
				'label' => esc_html__( 'Padding', 'wpbits-addons-for-elementor' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'rem' ],
				'selectors' => [
                    '{{WRAPPER}} .wpb-logo-grid-item' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
				],
			]
        );

        $this->add_control(
			'hr_grid_item_2',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		);
        
        $this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'grid_item_border',
				'label' => esc_html__( 'Border', 'wpbits-addons-for-elementor' ),
				'selector' => '{{WRAPPER}} .wpb-logo-grid-item'
			]
		);
        
        $this->add_control(
			'grid_item_border_radius',
			[
				'label' => esc_html__( 'Border Radius', 'wpbits-addons-for-elementor' ),
				'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'rem' ],
				'selectors' => [
					'{{WRAPPER}} .wpb-logo-grid-item' => 'border-top-left-radius: {{TOP}}{{UNIT}};border-top-right-radius: {{RIGHT}}{{UNIT}};border-bottom-right-radius: {{BOTTOM}}{{UNIT}};border-bottom-left-radius: {{LEFT}}{{UNIT}};'
				]
			]
		);
        
        $this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'grid_item_shadow',
				'label' => esc_html__( 'Box Shadow', 'wpbits-addons-for-elementor' ),
				'selector' => '{{WRAPPER}} .wpb-logo-grid-item'
			]
		);
        
        $this->end_controls_section();

        
        // section start
        $this->start_controls_section(
			'section_thumbnail',
			[
				'label' => esc_html__( 'Image', 'wpbits-addons-for-elementor' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
        );
        
        $this->add_control(
			'thumbnail_animation',
			[
				'label' => esc_html__( 'Hover Animation', 'wpbits-addons-for-elementor' ),
				'type' => \Elementor\Controls_Manager::HOVER_ANIMATION
			]
        );

		$this->add_responsive_control(
			'thumbnail_max_width',
			[
				'label' => esc_html__( 'Maximum Width', 'wpbits-addons-for-elementor' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%' ],
				'range' => [
                    'px' => [
						'min' => 0,
						'max' => 1000,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'selectors' => [
                    '{{WRAPPER}} .wpb-logo-grid-item img' => 'width: {{SIZE}}{{UNIT}};'
				],
			]
        );
        
        $this->add_control(
			'hr_thumbnail_1',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		);
        
        $this->start_controls_tabs( 'tabs_thumbnail_style' );
        
        $this->start_controls_tab(
			'tab_thumbnail_normal',
			[
				'label' => esc_html__( 'Normal', 'wpbits-addons-for-elementor' ),
			]
		);
        
        $this->add_responsive_control(
			'thumbnail_opacity',
			[
				'label' => esc_html__( 'Opacity', 'wpbits-addons-for-elementor' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'min' => 0,
				'max' => 1,
				'step' => 0.1,
				'default' => 1,
                'selectors' => [
					'{{WRAPPER}} .wpb-logo-grid-item img' => 'opacity: {{VALUE}};'
				],
			]
		);

        $this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'thumb_border',
				'label' => esc_html__( 'Border', 'wpbits-addons-for-elementor' ),
				'selector' => '{{WRAPPER}} .wpb-logo-grid-item img',
			]
		);
        
        $this->add_responsive_control(
			'thumb_radius',
			[
				'label' => esc_html__( 'Border Radius', 'wpbits-addons-for-elementor' ),
				'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'rem' ],
				'selectors' => [
					'{{WRAPPER}} .wpb-logo-grid-item img' => 'border-top-left-radius: {{TOP}}{{UNIT}};border-top-right-radius: {{RIGHT}}{{UNIT}};border-bottom-right-radius: {{BOTTOM}}{{UNIT}};border-bottom-left-radius: {{LEFT}}{{UNIT}};'
				],
			]
		);
        
        $this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'thumb_shadow',
				'label' => esc_html__( 'Box Shadow', 'wpbits-addons-for-elementor' ),
				'selector' => '{{WRAPPER}} .wpb-logo-grid-item img',
			]
		);
		
		$this->add_group_control(
			Group_Control_Css_Filter::get_type(),
			[
				'name' => 'thumbnail_css_filter',
				'label' => esc_html__( 'CSS Filters', 'wpbits-addons-for-elementor' ),
				'selector' => '{{WRAPPER}} .wpb-logo-grid-item img'
			]
		);
        
        $this->end_controls_tab();

		$this->start_controls_tab(
			'tab_thumbnail_hover',
			[
				'label' => esc_html__( 'Hover', 'wpbits-addons-for-elementor' ),
			]
		);
        
        $this->add_responsive_control(
			'thumbnail_opacity_hover',
			[
				'label' => esc_html__( 'Opacity', 'wpbits-addons-for-elementor' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'min' => 0,
				'max' => 1,
				'step' => 0.1,
				'default' => 1,
                'selectors' => [
					'{{WRAPPER}} .wpb-logo-grid-item:hover img' => 'opacity: {{VALUE}};'
				],
			]
		);
        
        $this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'thumb_border_hover',
				'label' => esc_html__( 'Border', 'wpbits-addons-for-elementor' ),
				'selector' => '{{WRAPPER}} .wpb-logo-grid-item:hover img',
			]
		);
        
        $this->add_responsive_control(
			'thumb_radius_hover',
			[
				'label' => esc_html__( 'Border Radius', 'wpbits-addons-for-elementor' ),
				'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'rem' ],
				'selectors' => [
					'{{WRAPPER}} .wpb-logo-grid-item:hover img' => 'border-top-left-radius: {{TOP}}{{UNIT}};border-top-right-radius: {{RIGHT}}{{UNIT}};border-bottom-right-radius: {{BOTTOM}}{{UNIT}};border-bottom-left-radius: {{LEFT}}{{UNIT}};'
				],
			]
		);
        
        $this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'thumb_shadow_hover',
				'label' => esc_html__( 'Box Shadow', 'wpbits-addons-for-elementor' ),
				'selector' => '{{WRAPPER}} .wpb-logo-grid-item:hover img',
			]
		);
		
		$this->add_group_control(
			Group_Control_Css_Filter::get_type(),
			[
				'name' => 'thumbnail_css_filter_hover',
				'label' => esc_html__( 'CSS Filters', 'wpbits-addons-for-elementor' ),
				'selector' => '{{WRAPPER}} .wpb-logo-grid-item:hover img'
			]
		);

        $this->end_controls_tab();
        $this->end_controls_tabs();
        
		$this->end_controls_section();
		
		 // section start
		$this->start_controls_section(
			'style_tooltip',
			[
				'label' => esc_html__( 'Tooltip', 'wpbits-addons-for-elementor' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
        
        $this->add_control(
			'tooltip_color',
			[
				'label' => esc_html__( 'Color', 'wpbits-addons-for-elementor' ),
				'type' => Controls_Manager::COLOR, 
                'default' => '#ffffff',
				'selectors' => [
                    '#wpb-tooltip-popup.wpb-tooltip-{{ID}}' => 'color: {{VALUE}};',
					'#wpb-tooltip-popup.wpb-tooltip-{{ID}}' . ' p' => 'color: {{VALUE}};',
                    '#wpb-tooltip-popup.wpb-tooltip-{{ID}}' . ' a' => 'color: {{VALUE}};'
				]
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
                'label' => esc_html__( 'Typography', 'wpbits-addons-for-elementor' ),
				'name' => 'tooltip_text_typography',
				'selector' => '#wpb-tooltip-popup.wpb-tooltip-{{ID}}, #wpb-tooltip-popup.wpb-tooltip-{{ID}} p'
			]
		);
        
        $this->add_control(
			'tooltip_bg_color',
			[
				'label' => esc_html__( 'Background Color', 'wpbits-addons-for-elementor' ),
				'type' => Controls_Manager::COLOR, 
                'default' => 'rgba(0, 0, 0, 0.8)',
				'selectors' => [
                    '#wpb-tooltip-popup.wpb-tooltip-{{ID}}' => 'background-color: {{VALUE}};border-color: {{VALUE}};'
				]
			]
		);
        
        $this->add_control(
			'tooltip_hr_1',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		); 
        
        $this->add_control(
			'tooltip_max_width',
			[
				'label' => esc_html__( 'Maximum Width', 'wpbits-addons-for-elementor' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'min' => 0,
				'max' => 1000,
				'step' => 10,
				'default' => 300,
                'selectors' => [
					'#wpb-tooltip-popup.wpb-tooltip-{{ID}}' => 'max-width: {{VALUE}}px;'
				],
			]
		);
        
        $this->add_responsive_control(
			'tooltip_padding',
			[
				'label' => esc_html__( 'Padding', 'wpbits-addons-for-elementor' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'rem' ],
				'selectors' => [
                    '#wpb-tooltip-popup.wpb-tooltip-{{ID}}' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
				],
			]
		);
        
        $this->add_responsive_control(
			'tooltip_border_radius',
			[
				'label' => esc_html__( 'Border Radius', 'wpbits-addons-for-elementor' ),
				'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'rem' ],
				'selectors' => [
					'#wpb-tooltip-popup.wpb-tooltip-{{ID}}' => 'border-top-left-radius: {{TOP}}{{UNIT}};border-top-right-radius: {{RIGHT}}{{UNIT}};border-bottom-right-radius: {{BOTTOM}}{{UNIT}};border-bottom-left-radius: {{LEFT}}{{UNIT}};'
				]
			]
		);
        
        $this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'tooltip_border_shadow',
				'label' => esc_html__( 'Box Shadow', 'wpbits-addons-for-elementor' ),
				'selector' => '#wpb-tooltip-popup.wpb-tooltip-{{ID}}'
			]
		);
        
        $this->end_controls_section();
  
	}

	/**
	 * Render 
	 */
	protected function render( ) {
		$settings = $this->get_settings_for_display();
		$settings_id = $this->get_id();
        if ( $settings['list'] ) { ?>
        <div class="wpb-logo-grid">
        <?php foreach ( $settings['list'] as $item ) { ?>
            <?php
            $target = $item['website_link']['is_external'] ? ' target="_blank"' : '';
			$nofollow = $item['website_link']['nofollow'] ? ' rel="nofollow"' : '';
			$img_url = \Elementor\Utils::get_placeholder_image_src();
			$img_alt = '';
			$img_caption = '';
			if ($item['image']['url'] != $img_url) {
            	$img_array = wp_get_attachment_image_src($item['image']['id'], $settings['img_size'], true);
            	$img_url = $img_array[0];
				$img_alt = get_post_meta( $item['image']['id'], '_wp_attachment_image_alt', true );
				$img_caption = wp_get_attachment_caption($item['image']['id']);
			}
            ?>
			<div id="wpb-logo-<?php echo esc_attr($item['_id']); ?>" class="wpb-logo-grid-item">
				<?php if ($settings['enable_tooltip'] && !empty($img_caption)) { ?>
					<div class="wpb-logo-grid-item-inner wpb-tooltip-wrapper elementor-animation-<?php echo esc_attr($settings['thumbnail_animation']); ?>" data-tpid="wpb-tooltip-<?php echo esc_attr($settings_id); ?> animated fast <?php echo esc_attr($settings['anim']); ?>" data-followmouse="<?php echo esc_attr($settings['follow_mouse']); ?>" data-motp="<?php echo esc_attr($settings['mouse_on_to_popup']); ?>" data-placement="<?php echo esc_attr($settings['placement']); ?>" data-smart="<?php echo esc_attr($settings['smart_placement']); ?>" data-offset="<?php echo esc_attr($settings['offset']); ?>">
					<?php if ($item['website_link']['url']) { ?>
					<a href="<?php echo esc_url($item['website_link']['url']); ?>" <?php echo esc_attr($target); ?> <?php echo esc_attr($nofollow); ?>>
					<?php } ?>
						<img src="<?php echo esc_url($img_url); ?>" class="wpb-tooltip wpb-tooltip-type-text" data-powertip="<?php echo esc_attr($img_caption); ?>" alt="<?php echo esc_attr($img_alt); ?>"/>
					<?php if ($item['website_link']['url']) { ?>
					</a>
					<?php } ?>
					</div>
				<?php } else { ?>
					<div class="wpb-logo-grid-item-inner elementor-animation-<?php echo esc_attr($settings['thumbnail_animation']); ?>">
					<?php if ($item['website_link']['url']) { ?>
					<a href="<?php echo esc_url($item['website_link']['url']); ?>" <?php echo esc_attr($target); ?> <?php echo esc_attr($nofollow); ?>>
					<?php } ?>
					<img src="<?php echo esc_url($img_url); ?>" alt="<?php echo esc_attr($img_alt); ?>" />
					<?php if ($item['website_link']['url']) { ?>
					</a>
					<?php } ?>
					</div>
				<?php } ?>
            </div>
        <?php } ?>
        </div>
    <?php } ?>
    <?php } 

}
Plugin::instance()->widgets_manager->register_widget_type( new Widget_WPBITS_AFE_Logo_Grid() );