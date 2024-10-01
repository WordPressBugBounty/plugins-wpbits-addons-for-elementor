<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit;

class Widget_WPBITS_AFE_Tabs extends Widget_Base {

	public function get_name() {
		return 'wpb-tabs';
	}

	public function get_title() {
		return "[WPBits] " . esc_html__( 'Tabs', 'wpbits-addons-for-elementor' );
	}

	public function get_categories() {
		return [ 'wpbits-elementor-addons' ];
	}

    public function get_script_depends() {
		return [ 'wpb-lib-tabs', 'wpb-tabs' ];
	}
    
    public function get_icon() {
		return 'eicon-tabs';
	}

	protected function register_controls() {
		$this->start_controls_section(
			'content_section',
			[
				'label' => esc_html__( 'Content', 'wpbits-addons-for-elementor' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);
        
        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
			'title_icon',
			[
				'label' => esc_html__( 'Icon', 'wpbits-addons-for-elementor' ),
				'type' => \Elementor\Controls_Manager::ICONS
			]
		);
        
        $repeater->add_control(
			'title', [
				'label' => esc_html__( 'Title', 'wpbits-addons-for-elementor' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => '',
				'label_block' => true,
			]
		);

		$repeater->add_control(
			'image',
			[
				'label' => esc_html__( 'Image', 'wpbits-addons-for-elementor' ),
                'type' => \Elementor\Controls_Manager::MEDIA
			]
		);
        
        $repeater->add_control(
			'text', [
				'label' => esc_html__( 'Content', 'wpbits-addons-for-elementor' ),
				'type' => \Elementor\Controls_Manager::WYSIWYG,
				'default' => '',
				'show_label' => false,
			]
		);
        
        $this->add_control(
			'list',
			[
				'label' => esc_html__( 'Tabs', 'wpbits-addons-for-elementor' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
                'show_label' => false,
				'default' => [
					[
						'title_icon' => '',
						'title' => esc_html__( 'Title #1', 'wpbits-addons-for-elementor' ),
						'image' => '',
						'text' => esc_html__( 'Item content...', 'wpbits-addons-for-elementor' )
					],
					[
                        'title_icon' => '',
						'title' => esc_html__( 'Title #2', 'wpbits-addons-for-elementor' ),
						'image' => '',
						'text' => esc_html__( 'Item content...', 'wpbits-addons-for-elementor' )
					],
				],
				'title_field' => '{{{ title }}}',
			]
		);
        
        $this->add_control(
			'hash', [
				'label' => esc_html__( 'Url Sharing', 'wpbits-addons-for-elementor' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'On', 'wpbits-addons-for-elementor' ),
				'label_off' => esc_html__( 'Off', 'wpbits-addons-for-elementor' ),
				'return_value' => 'on',
				'default' => '',
				'show_label' => true,
			]
		);

		$this->end_controls_section();
        
        $this->start_controls_section(
			'section_title_style',
			[
				'label' => esc_html__( 'Title', 'wpbits-addons-for-elementor' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
        
        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'title_typography',
				'scheme' => Core\Schemes\Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .wpb_tab_head li,{{WRAPPER}} .wpbaccordion-mobile-title',
			]
		);
        
        $this->start_controls_tabs( 'tabs_title_style' );
        
        $this->start_controls_tab(
			'tab_title_normal',
			[
				'label' => esc_html__( 'Normal', 'wpbits-addons-for-elementor' ),
			]
		);
        
        $this->add_responsive_control(
			'title_color',
			[
				'label' => esc_html__( 'Color', 'wpbits-addons-for-elementor' ),
				'type' => Controls_Manager::COLOR,
                'default' => '#000000',
				'selectors' => [
					'{{WRAPPER}} .wpb_tab_head li,{{WRAPPER}} .wpbaccordion-mobile-title' => 'color: {{VALUE}};'
				]
			]
		);
        
        $this->add_responsive_control(
			'title_border_color',
			[
				'label' => esc_html__( 'Border Color', 'wpbits-addons-for-elementor' ),
				'type' => Controls_Manager::COLOR,
                'default' => '',
				'selectors' => [
					'{{WRAPPER}} .wpb_tab_head li,{{WRAPPER}} .wpbaccordion-mobile-title' => 'border-color: {{VALUE}};'
				]
			]
		);
        
        $this->add_responsive_control(
			'title_bg_color',
			[
				'label' => esc_html__( 'Background Color', 'wpbits-addons-for-elementor' ),
				'type' => Controls_Manager::COLOR,
                'default' => '',
				'selectors' => [
					'{{WRAPPER}} .wpb_tab_head li,{{WRAPPER}} .wpbaccordion-mobile-title' => 'background: {{VALUE}};'
				]
			]
		);
        
        $this->end_controls_tab();

		$this->start_controls_tab(
			'tab_title_active',
			[
				'label' => esc_html__( 'Active', 'wpbits-addons-for-elementor' ),
			]
		);
        
        $this->add_responsive_control(
			'title_active_color',
			[
				'label' => esc_html__( 'Color', 'wpbits-addons-for-elementor' ),
				'type' => Controls_Manager::COLOR, 
                'default' => '#000000',
				'selectors' => [
					'{{WRAPPER}} .wpb_tab_head li.is-open,{{WRAPPER}} .wpbaccordion-mobile-title.is-open' => 'color: {{VALUE}};'
				]
			]
		);
        
        $this->add_responsive_control(
			'title_active_border_color',
			[
				'label' => esc_html__( 'Border Color', 'wpbits-addons-for-elementor' ),
				'type' => Controls_Manager::COLOR,
                'default' => '#eeeeee',
				'selectors' => [
					'{{WRAPPER}} .wpb_tab_head li.is-open,{{WRAPPER}} .wpbaccordion-mobile-title.is-open' => 'border-color: {{VALUE}};'
				]
			]
		);
        
        $this->add_responsive_control(
			'title_active_bg_color',
			[
				'label' => esc_html__( 'Background Color', 'wpbits-addons-for-elementor' ),
				'type' => Controls_Manager::COLOR,
                'default' => '#ffffff',
				'selectors' => [
					'{{WRAPPER}} .wpb_tab_head li.is-open,{{WRAPPER}} .wpbaccordion-mobile-title.is-open' => 'background: {{VALUE}};'
				]
			]
		);
        
		
        $this->end_controls_tab();
        $this->end_controls_tabs();
        
        $this->add_control(
			'title_hr_1',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		);
        
        $this->add_responsive_control(
			'title_width',
			[
				'label' => esc_html__( 'Width', 'wpbits-addons-for-elementor' ),
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
					'{{WRAPPER}} .wpb_tab_head' => '--tab-width: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .wpb_tab_head li,{{WRAPPER}} .wpbaccordion-mobile-title' => 'width: {{SIZE}}{{UNIT}};'
				],
			]
		);

		$this->add_responsive_control(
			'border_width',
			[
				'label' => esc_html__( 'Border Width', 'wpbits-addons-for-elementor' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px'  ],
				'range' => [
                    'px' => [
						'min' => 0,
						'max' => 1000,
					],
				],
				'selectors' => [
                    '{{WRAPPER}} .wpb-tabs li' => '--border-width: {{SIZE}}{{UNIT}};'
				],
			]
		);		

		$this->add_responsive_control(
			'tabs_position',
			[
				'label' => esc_html__( 'Tabs Position', 'wpbits-addons-for-elementor' ),
				'type' => Controls_Manager::CHOOSE,
				'options' => [
					'top' => [
						'title' => esc_html__( 'Top', 'wpbits-addons-for-elementor' ),
						'icon' => 'eicon-v-align-top',
					],
					'bottom' => [
						'title' => esc_html__( 'Bottom', 'wpbits-addons-for-elementor' ),
						'icon' => 'eicon-v-align-bottom',
					],					
					'left' => [
						'title' => esc_html__( 'Left', 'wpbits-addons-for-elementor' ),
						'icon' => 'eicon-h-align-left',
					],
					'right' => [
						'title' => esc_html__( 'Right', 'wpbits-addons-for-elementor' ),
						'icon' => 'eicon-h-align-right',
					],
				],
				'default' => 'top',
				'frontend_available' => true,
				'prefix_class'       => 'wpb-tabs-',
                'toggle' => false
			]
		);

		$this->add_control(
			'title_v_align',
			[
				'label' => esc_html__( 'Tabs Vertical Align', 'wpbits-addons-for-elementor' ),
				'type' => Controls_Manager::CHOOSE,
				'options' => [
					'flex-start' => [
						'title' => esc_html__( 'Start', 'wpbits-addons-for-elementor' ),
						'icon' => 'eicon-v-align-top',
					],
					'center' => [
						'title' => esc_html__( 'Center', 'wpbits-addons-for-elementor' ),
						'icon' => 'eicon-v-align-middle',
					],
					'flex-end' => [
						'title' => esc_html__( 'End', 'wpbits-addons-for-elementor' ),
						'icon' => 'eicon-v-align-bottom',
					],
				],
				'default' => 'flex-start',
				'selectors' => [
					'{{WRAPPER}} .wpb_tab_head' => 'align-content: {{VALUE}};',
				],
				'toggle' => false,
				'condition' => [
					'tabs_position' => [ "left", "right" ],
				],  				
			]
		);

		$this->add_control(
			'title_h_align',
			[
				'label' => esc_html__( 'Tabs Horizontal Align', 'wpbits-addons-for-elementor' ),
				'type' => Controls_Manager::CHOOSE,
				'options' => [
					'flex-start' => [
						'title' => esc_html__( 'Start', 'wpbits-addons-for-elementor' ),
						'icon' => 'eicon-h-align-left',
					],
					'center' => [
						'title' => esc_html__( 'Center', 'wpbits-addons-for-elementor' ),
						'icon' => 'eicon-h-align-center',
					],
					'flex-end' => [
						'title' => esc_html__( 'End', 'wpbits-addons-for-elementor' ),
						'icon' => 'eicon-h-align-right',
					],
				],
				'default' => 'flex-start',
				'selectors' => [
					'{{WRAPPER}} .wpb_tab_head' => 'justify-content: {{VALUE}};',
				],
				'toggle' => false,
				'condition' => [
					'tabs_position' => [ "top", "bottom" ],
				],  								
			]
		);
        
        $this->add_responsive_control(
			'title_align',
			[
				'label' => esc_html__( 'Text Alignment', 'wpbits-addons-for-elementor' ),
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
					'{{WRAPPER}} .wpb_tab_head li,{{WRAPPER}} .wpbaccordion-mobile-title' => 'text-align: {{VALUE}};'
				],
				'toggle' => true,
			]
		);

        $this->add_control(
			'title_hr_2',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		);
        
        $this->add_responsive_control(
			'title_border_radius',
			[
				'label' => esc_html__( 'Border Radius', 'wpbits-addons-for-elementor' ),
				'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'rem' ],
				'selectors' => [
					'{{WRAPPER}} .wpb_tab_head li,{{WRAPPER}} .wpbaccordion-mobile-title' => 'border-top-left-radius: {{TOP}}{{UNIT}};border-top-right-radius: {{RIGHT}}{{UNIT}};border-bottom-right-radius: {{BOTTOM}}{{UNIT}};border-bottom-left-radius: {{LEFT}}{{UNIT}};'
				]
			]
		);
        
        $this->add_responsive_control(
			'title_padding',
			[
				'label' => esc_html__( 'Padding', 'wpbits-addons-for-elementor' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'rem' ],
				'selectors' => [
                    '{{WRAPPER}} .wpb_tab_head li,{{WRAPPER}} .wpbaccordion-mobile-title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
				],
			]
		);
        
        $this->add_responsive_control(
			'title_margin',
			[
				'label' => esc_html__( 'Margin', 'wpbits-addons-for-elementor' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'rem' ],
				'selectors' => [
                    '{{WRAPPER}} .wpb_tab_head li,{{WRAPPER}} .wpbaccordion-mobile-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
				],
			]
		);
           
        $this->end_controls_section();
        
        $this->start_controls_section(
			'section_icon_style',
			[
				'label' => esc_html__( 'Icon', 'wpbits-addons-for-elementor' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
        
        $this->add_control(
			'icon_color',
			[
				'label' => esc_html__( 'Color', 'wpbits-addons-for-elementor' ),
				'type' => Controls_Manager::COLOR,
                'default' => '#000000',
				'selectors' => [
					'{{WRAPPER}} .wpb_tab_head li i' => 'color: {{VALUE}};',
					'{{WRAPPER}} .wpb_tab_head li svg' => 'fill: {{VALUE}}',
					'{{WRAPPER}} .wpbaccordion-mobile-title i' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .wpbaccordion-mobile-title svg' => 'fill: {{VALUE}}',
				]
			]
		);
        
        $this->add_control(
			'icon_active_color',
			[
				'label' => esc_html__( 'Active Color', 'wpbits-addons-for-elementor' ),
				'type' => Controls_Manager::COLOR, 
                'default' => '#000000',
				'selectors' => [
					'{{WRAPPER}} .wpb_tab_head li.is-open i' => 'color: {{VALUE}};',
					'{{WRAPPER}} .wpbaccordion-mobile-title.is-open i' => 'color: {{VALUE}};'
				]
			]
		);
        
        $this->add_responsive_control(
			'icon_size',
			[
				'label' => esc_html__( 'Size', 'wpbits-addons-for-elementor' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px','rem' ],
                'selectors' => [
					'{{WRAPPER}} .wpb_tab_head li i' => 'font-size: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .wpbaccordion-mobile-title i' => 'font-size: {{SIZE}}{{UNIT}};'
				],
			]
		);
        
        $this->add_control(
			'icon_block',
			[
				'label' => esc_html__( 'Block', 'wpbits-addons-for-elementor' ),
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
				'toggle' => false,
			]
		);
        
        $this->add_responsive_control(
			'icon_padding',
			[
				'label' => esc_html__( 'Padding', 'wpbits-addons-for-elementor' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'rem' ],
				'selectors' => [
                    '{{WRAPPER}} .wpb_tab_head li i, {{WRAPPER}} .wpb_tab_head li svg,{{WRAPPER}} .wpbaccordion-mobile-title i' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
				],
			]
		);
        
        $this->end_controls_section();
			
		// section start
		$this->start_controls_section(
			'section_indicator',
			[
				'label' => esc_html__( 'Indicator', 'wpbits-addons-for-elementor' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);        		

		$this->add_responsive_control(
			'indicator_size',
			[
				'label' => esc_html__( 'Indicator Size', 'wpbits-addons-for-elementor' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'min' => 1,
						'max' => 100,
						'step' => 1,
					],
				],
				'selectors' => [
					'{{WRAPPER}}' => '--indicator-size: {{SIZE}}{{UNIT}};'
				],
			]
		);				

		$this->add_responsive_control(
			'indicator_position',
			[
				'label' => esc_html__( 'Indicator Position', 'wpbits-addons-for-elementor' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'min' => -50,
						'max' => 50,
						'step' => 1,
					],
				],
				'selectors' => [
					'{{WRAPPER}}' => '--indicator-position: {{SIZE}}{{UNIT}};'
				],
			]
		);							
	
		$this->add_control(
			'indicator_color',
			[
				'label' => esc_html__( 'Indicator Color', 'wpbits-addons-for-elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}}' => '--indicator-color: {{VALUE}};' 
				]
			]
		);		
		
		$this->end_controls_section();		
		
		
        $this->start_controls_section(
			'section_content_style',
			[
				'label' => esc_html__( 'Content', 'wpbits-addons-for-elementor' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
        
        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'content_typography',
				'scheme' => Core\Schemes\Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .wpbaccordion__body,{{WRAPPER}} .wpbaccordion__body p',
			]
		);

		$this->add_responsive_control(
			'v_align',
			[
				'label' => esc_html__( 'Vertical Align', 'wpbits-addons-for-elementor' ),
				'type' => Controls_Manager::CHOOSE,
				'options' => [
					'flex-start' => [
						'title' => esc_html__( 'Start', 'wpbits-addons-for-elementor' ),
						'icon' => 'eicon-v-align-top',
					],
					'center' => [
						'title' => esc_html__( 'Center', 'wpbits-addons-for-elementor' ),
						'icon' => 'eicon-v-align-middle',
					],
					'flex-end' => [
						'title' => esc_html__( 'End', 'wpbits-addons-for-elementor' ),
						'icon' => 'eicon-v-align-bottom',
					],
				],
				'default' => 'flex-start',
				'selectors' => [
					'{{WRAPPER}} .wpbaccordion-inner' => 'align-items: {{VALUE}};',
				],
                'toggle' => false
			]
		);
        
        $this->add_responsive_control(
			'content_color',
			[
				'label' => esc_html__( 'Color', 'wpbits-addons-for-elementor' ),
				'type' => Controls_Manager::COLOR, 
                'default' => '#000000',
				'selectors' => [
					'{{WRAPPER}} .wpbaccordion__body,{{WRAPPER}} .wpbaccordion__body p' => 'color: {{VALUE}};'
				]
			]
		);
        
        $this->add_responsive_control(
			'content_border_color',
			[
				'label' => esc_html__( 'Border Color', 'wpbits-addons-for-elementor' ),
				'type' => Controls_Manager::COLOR, 
                'default' => '#eeeeee',
				'selectors' => [
					'{{WRAPPER}} .wpb_tab_item.wpbaccordion' => 'border-color: {{VALUE}};'
				]
			]
		);
        
        $this->add_responsive_control(
			'content_bg_color',
			[
				'label' => esc_html__( 'Background Color', 'wpbits-addons-for-elementor' ),
				'type' => Controls_Manager::COLOR, 
                'default' => '#ffffff',
				'selectors' => [
					'{{WRAPPER}} .wpb_tab_item.wpbaccordion' => 'background-color: {{VALUE}};'
				]
			]
		);

        $this->add_responsive_control(
			'content_border_radius',
			[
				'label' => esc_html__( 'Border Radius', 'wpbits-addons-for-elementor' ),
				'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'rem' ],
				'selectors' => [
					'{{WRAPPER}} .wpb_tab_item.wpbaccordion' => 'border-top-left-radius: {{TOP}}{{UNIT}};border-top-right-radius: {{RIGHT}}{{UNIT}};border-bottom-right-radius: {{BOTTOM}}{{UNIT}};border-bottom-left-radius: {{LEFT}}{{UNIT}};'
				]
			]
		);

		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'content_shadow',
				'label' => esc_html__( 'Box Shadow', 'wpbits-addons-for-elementor' ),
				'selector' => '{{WRAPPER}} .wpb_tab_item.wpbaccordion,{{WRAPPER}} .wpbaccordion-mobile-title',
			]
        );
        
        $this->add_responsive_control(
			'content_padding',
			[
				'label' => esc_html__( 'Padding', 'wpbits-addons-for-elementor' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'rem' ],
				'selectors' => [
                    '{{WRAPPER}} .wpb_tab_item.wpbaccordion' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
				],
			]
		);
        
		$this->end_controls_section();
		
		$this->start_controls_section(
			'section_image_style',
			[
				'label' => esc_html__( 'Image', 'wpbits-addons-for-elementor' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_responsive_control(
			'content_img_width',
			[
				'label' => esc_html__( 'Maximum Container Width', 'wpbits-addons-for-elementor' ),
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
				'default' => [
					'unit' => '%',
					'size' => 30,
				],
				'selectors' => [
                    '{{WRAPPER}} .wpbaccordion-img' => 'width: {{SIZE}}{{UNIT}};'
				],
			]
		);

		$this->add_responsive_control(
			'content_img_max_width',
			[
				'label' => esc_html__( 'Maximum Image Width', 'wpbits-addons-for-elementor' ),
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
                    '{{WRAPPER}} .wpbaccordion-img img' => 'max-width: {{SIZE}}{{UNIT}};'
				],
			]
		);

		$this->add_responsive_control(
			'content_img_h_align',
			[
				'label' => esc_html__( 'Horizontal Align', 'wpbits-addons-for-elementor' ),
				'type' => Controls_Manager::CHOOSE,
				'options' => [
					'row' => [
						'title' => esc_html__( 'Start', 'wpbits-addons-for-elementor' ),
						'icon' => 'eicon-h-align-left',
					],
					'row-reverse' => [
						'title' => esc_html__( 'End', 'wpbits-addons-for-elementor' ),
						'icon' => 'eicon-h-align-right',
					],
				],
				'default' => 'row',
				'selectors' => [
					'{{WRAPPER}} .wpbaccordion-inner' => 'flex-direction: {{VALUE}};',
				],
                'toggle' => false
			]
		);

		$this->add_control(
			'content_img_border_radius',
			[
				'label' => esc_html__( 'Border Radius', 'wpbits-addons-for-elementor' ),
				'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'rem' ],
				'selectors' => [
					'{{WRAPPER}} .wpbaccordion-img img' => 'border-top-left-radius: {{TOP}}{{UNIT}};border-top-right-radius: {{RIGHT}}{{UNIT}};border-bottom-right-radius: {{BOTTOM}}{{UNIT}};border-bottom-left-radius: {{LEFT}}{{UNIT}};'
				]
			]
		);

		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'content_img_shadow',
				'label' => esc_html__( 'Box Shadow', 'wpbits-addons-for-elementor' ),
				'selector' => '{{WRAPPER}} .wpbaccordion-img img',
			]
        );
		
		$this->add_responsive_control(
			'content_img_padding',
			[
				'label' => esc_html__( 'Padding', 'wpbits-addons-for-elementor' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'rem' ],
				'selectors' => [
                    '{{WRAPPER}} .wpbaccordion-img' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
				],
			]
		);

		$this->end_controls_section();

	}
    
    protected function render() {
		$settings = $this->get_settings_for_display();
		$rand = '-' . rand();
        if ( $settings['list'] ) { ?>
            <div class="wpb-tabs">
                <ul class="wpb_tab_head<?php echo ($settings['icon_block'] == 'true') ? " wpb-tabs-block-icon" : "";?>">
					
					<?php 
						$menu_count = 0;
						$tab_count = 0; 
					?>

                    <?php foreach ( $settings['list'] as $item ) : ?> 
						<li <?php if ($menu_count == 0) { ?>class="is-open"<?php } ?> data-opentab="wpb-<?php echo esc_attr($item['_id']) . $rand; ?>">
							<?php \Elementor\Icons_Manager::render_icon( $item['title_icon'], [ 'aria-hidden' => 'true' ] ); ?><?php echo $this->parse_text_editor($item['title']); ?>
						</li>
						<?php $menu_count++; ?>
					<?php endforeach; ?>

                </ul>
				<div class="wpb-tabs-content-wrapper">
					
					<?php foreach ( $settings['list'] as $item ) : ?>	
						<div class="wpbaccordion-mobile-title <?php if ($tab_count == 0) { ?>is-open<?php } ?>" data-opentab="wpb-<?php echo esc_attr($item['_id']) . $rand; ?>">
							<?php \Elementor\Icons_Manager::render_icon( $item['title_icon'], [ 'aria-hidden' => 'true' ] ); ?><?php echo $this->parse_text_editor($item['title']); ?>
						</div>	
						
						<div class="wpbaccordion wpb_tab_item <?php if ($tab_count == 0) { ?>is-open<?php } ?>" id="wpb-<?php echo esc_attr($item['_id']) . $rand; ?>" <?php if ($settings['hash']) { ?>data-hash="#wpb-<?php echo esc_attr($item['_id']) . $rand; ?>"<?php } ?>>
							<div class="wpbaccordion__body">
								<div class="wpbaccordion-inner">
									<?php if ($item['image']['url']) { ?>
									<div class="wpbaccordion-img">
										<img src="<?php echo esc_url($item['image']['url']); ?>" alt="<?php echo esc_attr($item['title']); ?>" />
									</div>
									<?php } ?>
									<div class="wpbaccordion-text"><?php echo $this->parse_text_editor($item['text']); ?></div>
								</div>
							</div>
						</div>
						<?php $tab_count++; ?>
					<?php endforeach; ?>

				</div>
			</div>
			<?php 
			$breakpoint = get_option('elementor_viewport_md');
			if (empty($breakpoint)) { $breakpoint = '768'; }
			?>
			<style>
				@media screen and (max-width: <?php echo esc_attr($breakpoint); ?>px) {
					.wpbaccordion-mobile-title {display:block !important;}
					ul.wpb_tab_head {display:none !important;}
					.wpb_tab_item.wpbaccordion {margin-bottom:-1px !important;}
				}
			</style>
            <?php
		}
	}
}
Plugin::instance()->widgets_manager->register_widget_type( new Widget_WPBITS_AFE_Tabs() );