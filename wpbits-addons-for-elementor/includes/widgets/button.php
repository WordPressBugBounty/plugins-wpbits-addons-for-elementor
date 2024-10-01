<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit;

class Widget_WPBITS_AFE_Button extends Widget_Base {

	public function get_name() {
		return 'wpb-button';
	}

	public function get_title() {
		return "[WPBits] " . esc_html__( 'Button', 'wpbits-addons-for-elementor' );
	}

	public function get_categories() {
		return [ 'wpbits-elementor-addons' ];
	}
    
    public function get_icon() {
		return 'eicon-button';
	}
    
    public function get_btn_skins() {
        $output_skins = apply_filters('wpb-btn-skins', array( 
            '' => esc_html__( 'None', 'wpbits-addons-for-elementor' ),
            'wpb-btn-1' => esc_html__( 'Animation 1', 'wpbits-addons-for-elementor' ),
            'wpb-btn-2' => esc_html__( 'Animation 2', 'wpbits-addons-for-elementor' ),
            'wpb-btn-3' => esc_html__( 'Animation 3', 'wpbits-addons-for-elementor' ),
            'wpb-btn-4' => esc_html__( 'Animation 4', 'wpbits-addons-for-elementor' ),
            'wpb-btn-5' => esc_html__( 'Animation 5', 'wpbits-addons-for-elementor' ),
            'wpb-btn-6' => esc_html__( 'Animation 6', 'wpbits-addons-for-elementor' ),
            'wpb-btn-7' => esc_html__( 'Animation 7', 'wpbits-addons-for-elementor' ),
            'wpb-btn-8' => esc_html__( 'Animation 8', 'wpbits-addons-for-elementor' ),
            
        ));
        return $output_skins;
    }

	protected function register_controls() {
        // section start
		$this->start_controls_section(
			'button_content',
			[
				'label' => esc_html__( 'Settings', 'wpbits-addons-for-elementor' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);
        
        $this->add_control(
			'text', [
				'label' => esc_html__( 'Text', 'wpbits-addons-for-elementor' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Click Here', 'wpbits-addons-for-elementor' ),
                'dynamic' => [
					'active' => true,
				],
			]
		);
        
        $this->add_control(
			'size',
			[
				'label' => esc_html__( 'Size', 'wpbits-addons-for-elementor' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'wpb-btn-md',
				'options' => [
					'wpb-btn-md'  => esc_html__( 'Normal', 'wpbits-addons-for-elementor' ),
					'wpb-btn-lg'  => esc_html__( 'Large', 'wpbits-addons-for-elementor' ),
                    'wpb-btn-sm'  => esc_html__( 'Small', 'wpbits-addons-for-elementor' )
				],
			]
		);
        
        $this->add_responsive_control(
			'text_align',
			[
				'label' => esc_html__( 'Alignment', 'wpbits-addons-for-elementor' ),
				'type' => \Elementor\Controls_Manager::CHOOSE,
				'options' => [
					'left' => [
						'title' => esc_html__( 'Left', 'wpbits-addons-for-elementor' ),
						'icon' => 'fa fa-align-left',
					],
					'center' => [
						'title' => esc_html__( 'Center', 'wpbits-addons-for-elementor' ),
						'icon' => 'fa fa-align-center',
					],
					'right' => [
						'title' => esc_html__( 'Right', 'wpbits-addons-for-elementor' ),
						'icon' => 'fa fa-align-right',
					]
				],
				'selectors' => [
					'{{WRAPPER}} .wpb-btn-wrapper' => 'text-align: {{VALUE}};'
				],
				'toggle' => true,
			]
		);
        
        $this->add_control(
			'icon_hr_1',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		);
        
        $this->add_control(
			'icon_switcher',
			[
				'label' => esc_html__( 'Icon', 'wpbits-addons-for-elementor' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Yes', 'wpbits-addons-for-elementor' ),
				'label_off' => esc_html__( 'No', 'wpbits-addons-for-elementor' ),
				'return_value' => 'yes',
				'default' => '',
			]
		);
        
        $this->add_control(
			'icon',
			[
				'label' => esc_html__( 'Icon', 'wpbits-addons-for-elementor' ),
				'type' => \Elementor\Controls_Manager::ICONS,
                'show_label' => false,
                'condition' => ['icon_switcher' => 'yes'],
			]
		);
        
        $this->add_control(
			'icon_position',
			[
				'label' => esc_html__( 'Icon Position', 'wpbits-addons-for-elementor' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'before',
				'options' => [
					'after'  => esc_html__( 'After', 'wpbits-addons-for-elementor' ),
					'before'  => esc_html__( 'Before', 'wpbits-addons-for-elementor' )
				],
                'condition' => ['icon_switcher' => 'yes'],
			]
		);
 
        $this->add_control(
			'btn_heading_1',
			[
				'label' => esc_html__( 'Link to', 'wpbits-addons-for-elementor' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
        
        $this->start_controls_tabs( 'tabs_btn_link_style' );
        
        $this->start_controls_tab(
			'tab_btn_link',
			[
				'label' => esc_html__( 'URL', 'wpbits-addons-for-elementor' ),
			]
		);
        
        $this->add_control(
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
                'dynamic' => [
					'active' => true,
				],
                'show_label' => false,
			]
		);
        
        $this->end_controls_tab();

		$this->start_controls_tab(
			'tab_btn_lightbox',
			[
				'label' => esc_html__( 'Image', 'wpbits-addons-for-elementor' ),
			]
		);

        $this->add_control(
			'image',
			[
				'label' => esc_html__( 'Image', 'wpbits-addons-for-elementor' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
                'show_label' => false,
			]
		);

        $this->end_controls_tab();
        $this->end_controls_tabs();
        
        $this->add_control(
			'btn_heading_3',
			[
				'label' => esc_html__( 'Button ID', 'wpbits-addons-for-elementor' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
        
        $this->add_control(
			'btn_id',
			[
				'label' => esc_html__( 'Button ID', 'wpbits-addons-for-elementor' ),
				'type' => \Elementor\Controls_Manager::TEXT,
                'description' => esc_html__( 'Please make sure the ID is unique and not used elsewhere on the page this form is displayed. This field allows A-Z 0-9  & underscore chars without spaces.', 'wpbits-addons-for-elementor' ),
                'dynamic' => [
					'active' => true,
				],
                'show_label' => false,
                'label_block' => true
			]
		);
       
		$this->end_controls_section();
        
        // section start
		$this->start_controls_section(
			'section_btn_style',
			[
				'label' => esc_html__( 'Button', 'wpbits-addons-for-elementor' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
        
        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'typography',
				'scheme' => Core\Schemes\Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .wpb-btn-wrapper a',
			]
		);
        
        $this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'text_shadow',
				'selector' => '{{WRAPPER}} .wpb-btn-wrapper a',
			]
		);

		$this->add_control(
			'skin',
			[
				'label' => esc_html__( 'Animation', 'wpbits-addons-for-elementor' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => '',
				'options' => $this->get_btn_skins(),
			]
		);
        
        $this->add_control(
			'btn_hr_1',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		);  
        
        $this->start_controls_tabs( 'tabs_button_style' );
        
        $this->start_controls_tab(
			'tab_button_normal',
			[
				'label' => esc_html__( 'Normal', 'wpbits-addons-for-elementor' ),
			]
		);
        
        $this->add_control(
			'text_color',
			[
				'label' => esc_html__( 'Text Color', 'wpbits-addons-for-elementor' ),
				'type' => Controls_Manager::COLOR, 
                'default' => '#ffffff',
				'selectors' => [
					'{{WRAPPER}} .wpb-btn-wrapper a' => 'color: {{VALUE}};',
				]
			]
		);


        $this->add_control(
			'bg_color',
			[
				'label' => esc_html__( 'Background Color', 'wpbits-addons-for-elementor' ),
				'type' => Controls_Manager::COLOR,
                'default' => '#000000',
				'selectors' => [
					'{{WRAPPER}} .wpb-btn-wrapper a' => 'background-color: {{VALUE}};',
				]
			]
		);

		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name' => 'bg_color_gradient',
				'label' => esc_html__( 'Background', 'wpbits-addons-for-elementor' ),
				'types' => [ 'gradient' ],
				'selector' => '{{WRAPPER}} .wpb-btn-wrapper a',
			]
		);
        
        $this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'border',
				'label' => esc_html__( 'Border', 'wpbits-addons-for-elementor' ),
				'selector' => '{{WRAPPER}} .wpb-btn-wrapper a'
			]
		);
        
        $this->add_responsive_control(
			'border_radius',
			[
				'label' => esc_html__( 'Border Radius', 'wpbits-addons-for-elementor' ),
				'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'rem' ],
				'selectors' => [
					'{{WRAPPER}} .wpb-btn-wrapper a,{{WRAPPER}} .wpb-btn-wrapper a:before' => 'border-top-left-radius: {{TOP}}{{UNIT}};border-top-right-radius: {{RIGHT}}{{UNIT}};border-bottom-right-radius: {{BOTTOM}}{{UNIT}};border-bottom-left-radius: {{LEFT}}{{UNIT}};'
				]
			]
		);
        
        $this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'border_shadow',
				'label' => esc_html__( 'Box Shadow', 'wpbits-addons-for-elementor' ),
				'selector' => '{{WRAPPER}} .wpb-btn-wrapper a'
			]
		);
		



		$this->add_responsive_control(
			'btn_underline_w',
			[
				'label' => esc_html__( 'Underline Width', 'wpbits-addons-for-elementor' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%', 'rem' ],
				'range' => [
					'%' => [
						'min' => 0,
						'max' => 100,
					],
                    'px' => [
						'min' => 0,
						'max' => 1000,
					],
                    'rem' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .wpb-btn-wrapper a:after' => 'width: {{SIZE}}{{UNIT}};'
				],
				'separator' => 'before',
			]
		);

        $this->add_responsive_control(
			'btn_underline_h',
			[
				'label' => esc_html__( 'Underline Height', 'wpbits-addons-for-elementor' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%', 'rem' ],
				'range' => [
					'%' => [
						'min' => 0,
						'max' => 100,
					],
                    'px' => [
						'min' => 0,
						'max' => 1000,
					],
                    'rem' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .wpb-btn-wrapper a:after' => 'height: {{SIZE}}{{UNIT}};'
				],
			]
		);

        $this->add_control(
			'underline_color',
			[
				'label' => esc_html__( 'Underline Color', 'wpbits-addons-for-elementor' ),
				'type' => Controls_Manager::COLOR, 
                'default' => '#000',
				'selectors' => [
					'{{WRAPPER}} .wpb-btn-wrapper a:after' => 'background-color: {{VALUE}};',
				]
			]
		);		

		$this->add_responsive_control(
			'underline_margin',
			[
				'label' => esc_html__( 'Underline Margin', 'wpbits-addons-for-elementor' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'rem' ],
				'selectors' => [
					'{{WRAPPER}} .wpb-btn-wrapper a:after' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
				],
				
			]
		);			
		
        $this->add_responsive_control(
			'underline_align',
			[
				'label' => esc_html__( 'Underline Position', 'wpbits-addons-for-elementor' ),
				'type' => \Elementor\Controls_Manager::CHOOSE,
				'options' => [
					'left' => [
						'title' => esc_html__( 'Left', 'wpbits-addons-for-elementor' ),
						'icon' => 'fa fa-align-left',
					],
					'center' => [
						'title' => esc_html__( 'Center', 'wpbits-addons-for-elementor' ),
						'icon' => 'fa fa-align-center',
					],
					'right' => [
						'title' => esc_html__( 'Right', 'wpbits-addons-for-elementor' ),
						'icon' => 'fa fa-align-right',
					]
				],
				'selectors' => [
					'{{WRAPPER}} .wpb-btn-wrapper a:after' => 'text-align: {{VALUE}};'
				],
				'toggle' => true,				
				'prefix_class' => 'wpb-btn-underline-',
			]
		);
		
		
        $this->end_controls_tab();

		$this->start_controls_tab(
			'tab_button_hover',
			[
				'label' => esc_html__( 'Hover', 'wpbits-addons-for-elementor' ),
			]
		);
        
        $this->add_control(
			'text_hover_color',
			[
				'label' => esc_html__( 'Text Color', 'wpbits-addons-for-elementor' ),
				'type' => Controls_Manager::COLOR, 
				'selectors' => [
					'{{WRAPPER}} .wpb-btn-wrapper a:hover' => 'color: {{VALUE}};'
				]
			]
		);


        $this->add_control(
			'bg_hover_color',
			[
				'label' => esc_html__( 'Background Color', 'wpbits-addons-for-elementor' ),
				'type' => Controls_Manager::COLOR, 
				'selectors' => [
					'{{WRAPPER}} .wpb-btn-wrapper a:hover' => 'background-color: {{VALUE}};'
				]
			]
		);

		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name' => 'bg_color_hover_gradient',
				'label' => esc_html__( 'Background', 'wpbits-addons-for-elementor' ),
				'types' => [ 'gradient' ],
				'selector' => '{{WRAPPER}} .wpb-btn-wrapper a:hover',
			]
		);
        
        $this->add_control(
			'animation_color',
			[
				'label' => esc_html__( 'Animation Color', 'wpbits-addons-for-elementor' ),
				'type' => Controls_Manager::COLOR, 
				'selectors' => [
					'{{WRAPPER}} .wpb-btn-wrapper a:before' => 'background-color: {{VALUE}};'
				]
			]
		);
        
        $this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'hover_border',
				'label' => esc_html__( 'Border', 'wpbits-addons-for-elementor' ),
				'selector' => '{{WRAPPER}} .wpb-btn-wrapper a:hover'
			]
		);
        
        $this->add_responsive_control(
			'border_hover_radius',
			[
				'label' => esc_html__( 'Border Radius', 'wpbits-addons-for-elementor' ),
				'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'rem' ],
				'selectors' => [
					'{{WRAPPER}} .wpb-btn-wrapper a:hover,{{WRAPPER}} .wpb-btn-wrapper a:hover:before' => 'border-top-left-radius: {{TOP}}{{UNIT}};border-top-right-radius: {{RIGHT}}{{UNIT}};border-bottom-right-radius: {{BOTTOM}}{{UNIT}};border-bottom-left-radius: {{LEFT}}{{UNIT}};'
				]
			]
		);
        
        $this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'border_hover_shadow',
				'label' => esc_html__( 'Box Shadow', 'wpbits-addons-for-elementor' ),
				'selector' => '{{WRAPPER}} .wpb-btn-wrapper a:hover'
			]
		);
		


		$this->add_responsive_control(
			'btn_underline_w_hover',
			[
				'label' => esc_html__( 'Underline Width', 'wpbits-addons-for-elementor' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%', 'rem' ],
				'range' => [
					'%' => [
						'min' => 0,
						'max' => 100,
					],
                    'px' => [
						'min' => 0,
						'max' => 1000,
					],
                    'rem' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .wpb-btn-wrapper:hover a:after' => 'width: {{SIZE}}{{UNIT}};'
				],
				'separator' => 'before',
			]
		);

        $this->add_responsive_control(
			'btn_underline_h_hover',
			[
				'label' => esc_html__( 'Underline Height', 'wpbits-addons-for-elementor' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%', 'rem' ],
				'range' => [
					'%' => [
						'min' => 0,
						'max' => 100,
					],
                    'px' => [
						'min' => 0,
						'max' => 1000,
					],
                    'rem' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .wpb-btn-wrapper:hover a:after' => 'height: {{SIZE}}{{UNIT}};'
				],
			]
		);

        $this->add_control(
			'underline_color_hover',
			[
				'label' => esc_html__( 'Underline Color', 'wpbits-addons-for-elementor' ),
				'type' => Controls_Manager::COLOR, 
                'default' => '#000',
				'selectors' => [
					'{{WRAPPER}} .wpb-btn-wrapper:hover a:after' => 'background-color: {{VALUE}};',
				]
			]
		);		

		$this->add_responsive_control(
			'underline_margin_hover',
			[
				'label' => esc_html__( 'Underline Margin', 'wpbits-addons-for-elementor' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'rem' ],
				'selectors' => [
					'{{WRAPPER}} .wpb-btn-wrapper:hover a:after' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
				],
				
			]
		);			

        $this->end_controls_tab();
        $this->end_controls_tabs();
        
        $this->add_control(
			'btn_hr_2',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		); 
        
        $this->add_responsive_control(
			'padding',
			[
				'label' => esc_html__( 'Padding', 'wpbits-addons-for-elementor' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'rem' ],
				'selectors' => [
                    '{{WRAPPER}} .wpb-btn-wrapper a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
				],
			]
		);
        
        $this->add_responsive_control(
			'btn_width',
			[
				'label' => esc_html__( 'Button Width', 'wpbits-addons-for-elementor' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%', 'rem' ],
				'range' => [
					'%' => [
						'min' => 0,
						'max' => 100,
					],
                    'px' => [
						'min' => 0,
						'max' => 1000,
					],
                    'rem' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .wpb-btn-wrapper a' => 'width: {{SIZE}}{{UNIT}};'
				],
			]
		);



		$this->end_controls_section();
		


		/**
		 * Icon
		 */
		$this->start_controls_section(
			'icon_section',
			[
				'label' => esc_html__( 'Icon', 'wpbits-addons-for-elementor' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
				'condition' => ['icon_switcher' => 'yes']
			]
		);
        		

			$this->add_control(
				'icon_color',
				[
					'label' => esc_html__( 'Icon Color', 'wpbits-addons-for-elementor' ),
					'type' => Controls_Manager::COLOR, 
					'default' => '',
					'selectors' => [
						'{{WRAPPER}} .wpb-btn-wrapper a svg *' => 'fill: {{VALUE}};',
						'{{WRAPPER}} .wpb-btn-wrapper a i' => 'color: {{VALUE}};',
					],

				]
			);
			
			$this->add_control(
				'icon_color_hover',
				[
					'label' => esc_html__( 'Icon Color', 'wpbits-addons-for-elementor' ),
					'type' => Controls_Manager::COLOR, 
					'default' => '',
					'separator' => 'before',
					'selectors' => [
						'{{WRAPPER}} .wpb-btn-wrapper a:hover svg *' => 'fill: {{VALUE}};',
						'{{WRAPPER}} .wpb-btn-wrapper a:hover i' => 'color: {{VALUE}};',
					]
				]
			);		
			
			$this->add_responsive_control(
				'icon_spacing',
				[
					'label' => esc_html__( 'Icon Padding', 'wpbits-addons-for-elementor' ),
					'type' => \Elementor\Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', '%', 'rem' ],
					'separator' => 'before',
					'selectors' => [
						'{{WRAPPER}} .wpb-btn-wrapper a i, {{WRAPPER}} .wpb-btn-wrapper a svg' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
					],
					
				]
			);		

			$this->add_responsive_control(
				'icon_margin',
				[
					'label' => esc_html__( 'Icon Margin', 'wpbits-addons-for-elementor' ),
					'type' => \Elementor\Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', '%', 'rem' ],
					'selectors' => [
						'{{WRAPPER}} .wpb-btn-wrapper a i, {{WRAPPER}} .wpb-btn-wrapper a svg' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
					],
					
				]
			);	

		$this->end_controls_section();	
				
	}
    
    protected function render() {
		$settings = $this->get_settings_for_display();
		$target = $settings['website_link']['is_external'] ? ' target="_blank"' : '';
        $nofollow = $settings['website_link']['nofollow'] ? ' rel="nofollow"' : '';
        $icon_position = $settings['icon_position'];
        ?>
        <?php if ($settings['image']['url']) { ?>
        <div class="wpb-btn-wrapper">
            <a id="<?php echo esc_attr($settings['btn_id']); ?>" data-elementor-open-lightbox="yes" class="<?php echo esc_attr($settings['size']); ?> <?php echo esc_attr($settings['skin']); ?>" href="<?php echo esc_url($settings['image']['url']); ?>" <?php echo $target; ?> <?php echo $nofollow; ?>>
				<?php 
				if ($settings['icon_switcher']) {
					if ($icon_position == 'before') {
						\Elementor\Icons_Manager::render_icon( $settings['icon'], [ 'aria-hidden' => 'true' ] );
						echo esc_html($settings['text']);
					} else {
						echo esc_html($settings['text']); 
						\Elementor\Icons_Manager::render_icon( $settings['icon'], [ 'aria-hidden' => 'true' ] );
					}
				} else {
					echo esc_html($settings['text']);
				} 
				?>
            </a>
        </div>
        <?php } else { ?>
        <div class="wpb-btn-wrapper">
            <a id="<?php echo esc_attr($settings['btn_id']); ?>" class="<?php echo esc_attr($settings['size']); ?> <?php echo esc_attr($settings['skin']); ?>" href="<?php echo esc_url($settings['website_link']['url']); ?>" <?php echo $target; ?> <?php echo $nofollow; ?>>
				<?php 
				if ($settings['icon_switcher']) {
					if ($icon_position == 'before') {
						\Elementor\Icons_Manager::render_icon( $settings['icon'], [ 'aria-hidden' => 'true' ] );
						echo esc_html($settings['text']);
					} else {
						echo esc_html($settings['text']); 
						\Elementor\Icons_Manager::render_icon( $settings['icon'], [ 'aria-hidden' => 'true' ] );
					}
				} else {
					echo esc_html($settings['text']);
				} 
				?>
            </a>
        </div>
        <?php } ?>
<?php
	}
}
Plugin::instance()->widgets_manager->register_widget_type( new Widget_WPBITS_AFE_Button() );