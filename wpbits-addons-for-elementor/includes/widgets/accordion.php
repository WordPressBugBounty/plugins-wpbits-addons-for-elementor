<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit;

class Widget_WPBITS_AFE_Accordion extends Widget_Base {

	public function get_name() {
		return 'wpb-accordion';
	}

	public function get_title() {
		return "[WPBits] " . esc_html__( 'Accordion', 'wpbits-addons-for-elementor' );
	}

	public function get_categories() {
		return [ 'wpbits-elementor-addons' ];
	}    	 

    public function get_script_depends() {
		return [ 'wpb-lib-tabs', 'wpb-accordion' ];
	}
    
    public function get_icon() {
		return 'eicon-accordion';
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
			'icon_txt_switcher',
			[
				'label' => esc_html__( 'Prefix', 'wpbits-addons-for-elementor' ),
				'type' => \Elementor\Controls_Manager::CHOOSE,
				'options' => [
					'icon' => [
						'title' => esc_html__( 'Icon', 'wpbits-addons-for-elementor' ),
						'icon' => 'eicon-star',
					],
					'text' => [
						'title' => esc_html__( 'Text', 'wpbits-addons-for-elementor' ),
						'icon' => 'eicon-heading',
					],
				],
				'default' => 'icon',
				'toggle' => true,
			]
		);


        $repeater->add_control(
			'title_icon',
			[
				'label' => esc_html__( 'Icon', 'wpbits-addons-for-elementor' ),
				'condition' => ['icon_txt_switcher' => 'icon'],
				'type' => \Elementor\Controls_Manager::ICONS
			]
		);

		$repeater->add_control(
			'title_icon_txt',
			[
				'label' => esc_html__( 'Text', 'wpbits-addons-for-elementor' ),
				'condition' => ['icon_txt_switcher' => 'text'],
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => '1'
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
			'text', [
				'label' => esc_html__( 'Content', 'wpbits-addons-for-elementor' ),
				'type' => \Elementor\Controls_Manager::WYSIWYG,
				'default' => '',
				'show_label' => false,
			]
		);
        
        $repeater->add_control(
			'status',
			[
				'label' => esc_html__( 'Opened by default', 'wpbits-addons-for-elementor' ),
				'type' => \Elementor\Controls_Manager::CHOOSE,
				'options' => [
					'is-open' => [
						'title' => esc_html__( 'On', 'wpbits-addons-for-elementor' ),
						'icon' => 'fas fa-check',
					],
					'is-default' => [
						'title' => esc_html__( 'Off', 'wpbits-addons-for-elementor' ),
						'icon' => 'fas fa-times',
					],
				],
				'default' => 'is-default',
				'toggle' => false,
			]
		);
        
        $repeater->add_control(
			'self_block',
			[
				'label' => esc_html__( 'Block close event on click', 'wpbits-addons-for-elementor' ),
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
        
        $this->add_control(
			'list',
			[
				'label' => esc_html__( 'Accordion Items', 'wpbits-addons-for-elementor' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
                'show_label' => false,
				'default' => [
					[
                        'title_icon' => '',
						'title' => esc_html__( 'Title #1', 'wpbits-addons-for-elementor' ),
						'text' => esc_html__( 'Item content...', 'wpbits-addons-for-elementor' ),
                        'status' => 'is-default',
                        'self_block' => 'false',
					],
					[
                        'title_icon' => '',
						'title' => esc_html__( 'Title #2', 'wpbits-addons-for-elementor' ),
						'text' => esc_html__( 'Item content...', 'wpbits-addons-for-elementor' ),
                        'status' => 'is-default',
                        'self_block' => 'false',
					],
				],
				'title_field' => '{{{ title }}}',
			]
		);

		$this->end_controls_section();
        
        $this->start_controls_section(
			'content_settings',
			[
				'label' => esc_html__( 'Settings', 'wpbits-addons-for-elementor' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		); 
        
        $this->add_control(
			'html_tag',
			[
				'label' => esc_html__( 'Title HTML Tag', 'wpbits-addons-for-elementor' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'h1' => 'H1',
					'h2' => 'H2',
					'h3' => 'H3',
					'h4' => 'H4',
					'h5' => 'H5',
					'h6' => 'H6',
					'div' => 'div',
					'p' => 'p',
				],
				'default' => 'h5',
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
        
        $this->add_control(
			'open_single',
			[
				'label' => esc_html__( 'Open Single', 'wpbits-addons-for-elementor' ),
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
                'description' => esc_html__( 'Open just one accordion at once.', 'wpbits-addons-for-elementor' ),
				'toggle' => false,
			]
		);
        
        $this->add_control(
			'self_close',
			[
				'label' => esc_html__( 'Self Close', 'wpbits-addons-for-elementor' ),
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
                'description' => esc_html__( 'Close accordion on click outside.', 'wpbits-addons-for-elementor' ),
				'toggle' => false,
			]
		);
        
        $this->add_control(
			'scroll',
			[
				'label' => esc_html__( 'Auto Scroll', 'wpbits-addons-for-elementor' ),
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
                'description' => esc_html__( 'Scroll to accordion on open.', 'wpbits-addons-for-elementor' ),
				'toggle' => false,
			]
		);
        
        $this->add_control(
			'scroll_offset',
			[
				'label' => esc_html__( 'Scroll Offset', 'wpbits-addons-for-elementor' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'min' => 0,
				'max' => 2000,
				'step' => 10,
				'default' => 0
			]
		);
        
        $this->add_control(
			'scroll_speed',
			[
				'label' => esc_html__( 'Scroll Speed', 'wpbits-addons-for-elementor' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'min' => 0,
				'max' => 10000,
				'step' => 10,
				'default' => 400
			]
		);
        
        $this->add_control(
			'open_speed',
			[
				'label' => esc_html__( 'Open Speed', 'wpbits-addons-for-elementor' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'min' => 0,
				'max' => 2000,
				'step' => 10,
				'default' => 200
			]
		);
        
        $this->add_control(
			'close_speed',
			[
				'label' => esc_html__( 'Close Speed', 'wpbits-addons-for-elementor' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'min' => 0,
				'max' => 2000,
				'step' => 10,
				'default' => 200
			]
		);
        
        $this->end_controls_section();  

		$this->start_controls_section(
			'section_accordion_style',
			[
				'label' => esc_html__( 'Accordion', 'wpbits-addons-for-elementor' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
        
        $this->start_controls_tabs( 'tabs_accordion_style' );
        
        $this->start_controls_tab(
			'tab_accordion_normal',
			[
				'label' => esc_html__( 'Normal', 'wpbits-addons-for-elementor' ),
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'accordion_border',
				'label' => esc_html__( 'Border', 'wpbits-addons-for-elementor' ),
				'selector' => '{{WRAPPER}} .wpbaccordion'
			]
		);
        
        $this->add_control(
			'accordion_border_radius',
			[
				'label' => esc_html__( 'Border Radius', 'wpbits-addons-for-elementor' ),
				'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'rem' ],
				'selectors' => [
					'{{WRAPPER}} .wpb-accordions .wpbaccordion' => 'border-top-left-radius: {{TOP}}{{UNIT}};border-top-right-radius: {{RIGHT}}{{UNIT}};border-bottom-right-radius: {{BOTTOM}}{{UNIT}};border-bottom-left-radius: {{LEFT}}{{UNIT}};'
				]
			]
		);
        
        $this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'accordion_shadow',
				'label' => esc_html__( 'Box Shadow', 'wpbits-addons-for-elementor' ),
				'selector' => '{{WRAPPER}} .wpb-accordions .wpbaccordion'
			]
		);
        
        $this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name' => 'accordion_background',
				'label' => esc_html__( 'Background', 'wpbits-addons-for-elementor' ),
				'types' => [ 'classic', 'gradient' ],
				'selector' => '{{WRAPPER}} .wpb-accordions .wpbaccordion',
			]
		);
        
        $this->end_controls_tab();

		$this->start_controls_tab(
			'tab_accordion_hover',
			[
				'label' => esc_html__( 'Hover', 'wpbits-addons-for-elementor' ),
			]
		);
        
        $this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'accordion_hover_border',
				'label' => esc_html__( 'Border', 'wpbits-addons-for-elementor' ),
				'selector' => '{{WRAPPER}} .wpb-accordions .wpbaccordion:hover,{{WRAPPER}} .wpb-accordions .wpbaccordion.is-open'
			]
		);
        
        $this->add_control(
			'accordion_hover_border_radius',
			[
				'label' => esc_html__( 'Border Radius', 'wpbits-addons-for-elementor' ),
				'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'rem' ],
				'selectors' => [
					'{{WRAPPER}} .wpb-accordions .wpbaccordion:hover' => 'border-top-left-radius: {{TOP}}{{UNIT}};border-top-right-radius: {{RIGHT}}{{UNIT}};border-bottom-right-radius: {{BOTTOM}}{{UNIT}};border-bottom-left-radius: {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .wpb-accordions .wpbaccordion.is-open' => 'border-top-left-radius: {{TOP}}{{UNIT}};border-top-right-radius: {{RIGHT}}{{UNIT}};border-bottom-right-radius: {{BOTTOM}}{{UNIT}};border-bottom-left-radius: {{LEFT}}{{UNIT}};'
				]
			]
		);
        
        $this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'accordion_hover_shadow',
				'label' => esc_html__( 'Box Shadow', 'wpbits-addons-for-elementor' ),
				'selector' => '{{WRAPPER}} .wpb-accordions .wpbaccordion:hover,{{WRAPPER}} .wpb-accordions .wpbaccordion.is-open'
			]
		);
        
        $this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name' => 'accordion_hover_background',
				'label' => esc_html__( 'Background', 'wpbits-addons-for-elementor' ),
				'types' => [ 'classic', 'gradient' ],
				'selector' => '{{WRAPPER}} .wpb-accordions .wpbaccordion:hover,{{WRAPPER}} .wpb-accordions .wpbaccordion.is-open',
			]
		);
        
        $this->end_controls_tab();
        $this->end_controls_tabs();  
        
        $this->add_control(
			'hr_accordion_1',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		);
        
        $this->add_responsive_control(
			'accordion_margin',
			[
				'label' => esc_html__( 'Margin', 'wpbits-addons-for-elementor' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'rem' ],
				'selectors' => [
                    '{{WRAPPER}} .wpb-accordions .wpbaccordion' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
				],
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
				'selector' => '{{WRAPPER}} .wpb-accordions .wpbaccordion__head,{{WRAPPER}} .wpbaccordion__head button',
			]
		);
        
        $this->add_responsive_control(
			'arrow_size',
			[
				'label' => esc_html__( 'Arrow Size', 'wpbits-addons-for-elementor' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'min' => 2,
				'max' => 100,
				'step' => 1,
				'default' => 4,
                'selectors' => [
					'{{WRAPPER}} .wpb-accordions .wpbaccordion__head button::after' => 'padding: {{VALUE}}px;'
				],
			]
		);
        
        $this->add_responsive_control(
			'arrow_thickness',
			[
				'label' => esc_html__( 'Arrow Thickness', 'wpbits-addons-for-elementor' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'min' => 2,
				'max' => 100,
				'step' => 1,
				'default' => 4,
                'selectors' => [
					'{{WRAPPER}} .wpb-accordions .wpbaccordion__head button::after' => 'border-width: 0 {{VALUE}}px {{VALUE}}px 0;'
				],
			]
		);
        
        $this->add_control(
			'hr_accordion_2',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		);
        
        $this->start_controls_tabs( 'tabs_title_style' );
        
        $this->start_controls_tab(
			'tab_title_normal',
			[
				'label' => esc_html__( 'Normal', 'wpbits-addons-for-elementor' ),
			]
		);
        
        $this->add_control(
			'title_color',
			[
				'label' => esc_html__( 'Color', 'wpbits-addons-for-elementor' ),
				'type' => Controls_Manager::COLOR,
                'default' => '#000000',
				'selectors' => [
					'{{WRAPPER}} .wpb-accordions .wpbaccordion__head,{{WRAPPER}} .wpb-accordions .wpbaccordion__head button' => 'color: {{VALUE}};'
				]
			]
		);

		$this->add_control(
			'title_bg_color',
			[
				'label' => esc_html__( 'Background Color', 'wpbits-addons-for-elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wpb-accordions .wpbaccordion__head,{{WRAPPER}} .wpb-accordions .wpbaccordion__head button' => 'background-color: {{VALUE}};'
				]
			]
		);
        
        $this->add_control(
			'arrow_color',
			[
				'label' => esc_html__( 'Arrow Color', 'wpbits-addons-for-elementor' ),
				'type' => Controls_Manager::COLOR, 
                'default' => '#000000',
				'selectors' => [
					'{{WRAPPER}} .wpb-accordions .wpbaccordion__head button:after' => 'border-color: {{VALUE}};'
				]
			]
		);
        
        $this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'accordion_title_border',
				'label' => esc_html__( 'Border', 'wpbits-addons-for-elementor' ),
				'selector' => '{{WRAPPER}} .wpb-accordions .wpbaccordion__head'
			]
		);
        
        $this->end_controls_tab();

		$this->start_controls_tab(
			'tab_title_hover',
			[
				'label' => esc_html__( 'Hover', 'wpbits-addons-for-elementor' ),
			]
		);
        
        $this->add_control(
			'title_hover_color',
			[
				'label' => esc_html__( 'Color', 'wpbits-addons-for-elementor' ),
				'type' => Controls_Manager::COLOR, 
                'default' => '#000000',
				'selectors' => [
					'{{WRAPPER}} .wpb-accordions .wpbaccordion__head:hover,{{WRAPPER}} .wpb-accordions .wpbaccordion__head button:hover,{{WRAPPER}} .wpb-accordions .wpbaccordion.is-open .wpbaccordion__head,{{WRAPPER}} .wpb-accordions .wpbaccordion.is-open .wpbaccordion__head button' => 'color: {{VALUE}};'
				]
			]
		);

		$this->add_control(
			'title_hover_bg_color',
			[
				'label' => esc_html__( 'Background Color', 'wpbits-addons-for-elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wpb-accordions .wpbaccordion__head:hover,{{WRAPPER}} .wpb-accordions .wpbaccordion__head button:hover,{{WRAPPER}} .wpb-accordions .wpbaccordion.is-open .wpbaccordion__head,{{WRAPPER}} .wpb-accordions .wpbaccordion.is-open .wpbaccordion__head button' => 'background-color: {{VALUE}};'
				]
			]
		);
        
        $this->add_control(
			'arrow_hover_color',
			[
				'label' => esc_html__( 'Arrow Color', 'wpbits-addons-for-elementor' ),
				'type' => Controls_Manager::COLOR, 
                'default' => '#000000',
				'selectors' => [
                    '{{WRAPPER}} .wpb-accordions .wpbaccordion__head  button:hover:after,{{WRAPPER}} .wpb-accordions .wpbaccordion.is-open .wpbaccordion__head  button:after' => 'border-color: {{VALUE}};'
				]
			]
		);
        
        $this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'accordion_title_hover_border',
				'label' => esc_html__( 'Border', 'wpbits-addons-for-elementor' ),
				'selector' => '{{WRAPPER}} .wpb-accordions .wpbaccordion.is-open .wpbaccordion__head'
			]
		);
        
        $this->end_controls_tab();
        $this->end_controls_tabs();    
        
        $this->add_control(
			'hr_accordion_3',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		);
        
        $this->add_responsive_control(
			'title_padding',
			[
				'label' => esc_html__( 'Padding', 'wpbits-addons-for-elementor' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'rem' ],
				'selectors' => [
                    '{{WRAPPER}} .wpb-accordions .wpbaccordion__head > button' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .wpb-accordions .wpbaccordion__head::after' => 'right: {{RIGHT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_icon_style',
			[
				'label' => esc_html__( 'Prefix', 'wpbits-addons-for-elementor' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_responsive_control(
			'icon_size',
			[
				'label' => esc_html__( 'Size', 'wpbits-addons-for-elementor' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'min' => 2,
				'max' => 100,
				'step' => 1,
                'selectors' => [
					'{{WRAPPER}} .wpb-accordions .wpbaccordion__head i,{{WRAPPER}} .wpb-accordions .wpbaccordion__head button i,{{WRAPPER}} .wpb-accordions .wpbaccordion__head .wpbaccordion-prefix,{{WRAPPER}} .wpb-accordions .wpbaccordion__head button .wpbaccordion-prefix' => 'font-size: {{VALUE}}px;',					
					'{{WRAPPER}} .wpb-accordions .wpbaccordion__head button svg' => 'height: {{VALUE}}px;'					
				],
			]
		);

		$this->add_responsive_control(
			'icon_width',
			[
				'label' => esc_html__( 'Container Width', 'wpbits-addons-for-elementor' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'min' => 2,
				'max' => 100,
				'step' => 1,
                'selectors' => [
					'{{WRAPPER}} .wpb-accordions .wpbaccordion__head i,{{WRAPPER}} .wpb-accordions .wpbaccordion__head button i,{{WRAPPER}} .wpb-accordions .wpbaccordion__head .wpbaccordion-prefix,{{WRAPPER}} .wpb-accordions .wpbaccordion__head button .wpbaccordion-prefix' => 'width: {{VALUE}}px;min-width: {{VALUE}}px;',
					'{{WRAPPER}} .wpb-accordions .wpbaccordion__head button svg' => 'width: {{VALUE}}px;'
				],
			]
		);

		$this->add_responsive_control(
			'icon_height',
			[
				'label' => esc_html__( 'Container Height', 'wpbits-addons-for-elementor' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'min' => 2,
				'max' => 100,
				'step' => 1,
                'selectors' => [
					'{{WRAPPER}} .wpb-accordions .wpbaccordion__head i,{{WRAPPER}} .wpb-accordions .wpbaccordion__head button i,{{WRAPPER}} .wpb-accordions .wpbaccordion__head .wpbaccordion-prefix,{{WRAPPER}} .wpb-accordions .wpbaccordion__head button .wpbaccordion-prefix' => 'height: {{VALUE}}px;line-height: {{VALUE}}px;',
					'{{WRAPPER}} .wpb-accordions .wpbaccordion__head button svg' => 'height: {{VALUE}}px;'
				],
			]
		);

		$this->add_control(
			'hr_icon_1',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		);

		$this->start_controls_tabs( 'tabs_icon_style' );
        
        $this->start_controls_tab(
			'tab_icon_normal',
			[
				'label' => esc_html__( 'Normal', 'wpbits-addons-for-elementor' ),
			]
		);

		$this->add_control(
			'icon_color',
			[
				'label' => esc_html__( 'Color', 'wpbits-addons-for-elementor' ),
				'type' => Controls_Manager::COLOR, 
                'default' => '#000000',
				'selectors' => [
					'{{WRAPPER}} .wpb-accordions .wpbaccordion__head i,{{WRAPPER}} .wpb-accordions .wpbaccordion__head button i,{{WRAPPER}} .wpb-accordions .wpbaccordion__head .wpbaccordion-prefix,{{WRAPPER}} .wpb-accordions .wpbaccordion__head button .wpbaccordion-prefix' => 'color: {{VALUE}};',
					'{{WRAPPER}} .wpb-accordions .wpbaccordion__head button svg' => 'fill: {{VALUE}};'
				]
			]
		);

		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name' => 'icon_bg',
				'label' => esc_html__( 'Background', 'wpbits-addons-for-elementor' ),
				'types' => [ 'classic', 'gradient' ],
				'selector' => '
				{{WRAPPER}} .wpb-accordions .wpbaccordion__head i,
				{{WRAPPER}} .wpb-accordions .wpbaccordion__head button i,
				{{WRAPPER}} .wpb-accordions .wpbaccordion__head .wpbaccordion-prefix,
				{{WRAPPER}} .wpb-accordions .wpbaccordion__head button .wpbaccordion-prefix,
				{{WRAPPER}} .wpb-accordions .wpbaccordion__head button svg
				',
			]
		);  
        
        $this->end_controls_tab();

		$this->start_controls_tab(
			'tab_icon_hover',
			[
				'label' => esc_html__( 'Hover', 'wpbits-addons-for-elementor' ),
			]
		);

		$this->add_control(
			'icon_hover_color',
			[
				'label' => esc_html__( 'Icon Color', 'wpbits-addons-for-elementor' ),
				'type' => Controls_Manager::COLOR, 
                'default' => '#000000',
				'selectors' => [
					'{{WRAPPER}} .wpb-accordions .wpbaccordion__head:hover i,{{WRAPPER}} .wpb-accordions .wpbaccordion__head button:hover i,{{WRAPPER}} .wpb-accordions .wpbaccordion.is-open .wpbaccordion__head i,{{WRAPPER}} .wpb-accordions .wpbaccordion.is-open .wpbaccordion__head button i' => 'color: {{VALUE}};',
					'{{WRAPPER}} .wpb-accordions .wpbaccordion__head:hover .wpbaccordion-prefix,{{WRAPPER}} .wpb-accordions .wpbaccordion__head button:hover .wpbaccordion-prefix,{{WRAPPER}} .wpb-accordions .wpbaccordion.is-open .wpbaccordion__head .wpbaccordion-prefix,{{WRAPPER}} .wpb-accordions .wpbaccordion.is-open .wpbaccordion__head button .wpbaccordion-prefix' => 'color: {{VALUE}};',
					'{{WRAPPER}} .wpb-accordions .wpbaccordion__head:hover button svg' => 'fill: {{VALUE}};'
				]
			]
		);

		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name' => 'icon_bg_hover',
				'label' => esc_html__( 'Background', 'wpbits-addons-for-elementor' ),
				'types' => [ 'classic', 'gradient' ],
				'selector' => 
				'
				{{WRAPPER}} .wpb-accordions .wpbaccordion__head:hover svg,
				{{WRAPPER}} .wpb-accordions .wpbaccordion__head:hover i,
				{{WRAPPER}} .wpb-accordions .wpbaccordion__head button:hover svg,
				{{WRAPPER}} .wpb-accordions .wpbaccordion__head button:hover i,
				{{WRAPPER}} .wpb-accordions .wpbaccordion.is-open .wpbaccordion__head svg,
				{{WRAPPER}} .wpb-accordions .wpbaccordion.is-open .wpbaccordion__head i,
				{{WRAPPER}} .wpb-accordions .wpbaccordion.is-open .wpbaccordion__head button svg,
				{{WRAPPER}} .wpb-accordions .wpbaccordion.is-open .wpbaccordion__head button i
				',
			]
		);

        $this->end_controls_tab();
        $this->end_controls_tabs();

		$this->add_control(
			'hr_icon_2',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		);

		$this->add_control(
			'icon_border_radius',
			[
				'label' => esc_html__( 'Border Radius', 'wpbits-addons-for-elementor' ),
				'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'rem' ],
				'selectors' => [
					'{{WRAPPER}} .wpb-accordions .wpbaccordion__head i,{{WRAPPER}} .wpb-accordions .wpbaccordion__head button i,{{WRAPPER}} .wpb-accordions .wpbaccordion__head .wpbaccordion-prefix,{{WRAPPER}} .wpb-accordions .wpbaccordion__head button .wpbaccordion-prefix' => 'border-top-left-radius: {{TOP}}{{UNIT}};border-top-right-radius: {{RIGHT}}{{UNIT}};border-bottom-right-radius: {{BOTTOM}}{{UNIT}};border-bottom-left-radius: {{LEFT}}{{UNIT}};',
				]
			]
		);

		$this->add_responsive_control(
			'icon_padding',
			[
				'label' => esc_html__( 'Margin', 'wpbits-addons-for-elementor' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'rem' ],
				'selectors' => [
                    '{{WRAPPER}} .wpb-accordions .wpbaccordion__head i,{{WRAPPER}} .wpb-accordions .wpbaccordion__head svg,{{WRAPPER}} .wpb-accordions .wpbaccordion__head .wpbaccordion-prefix' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
				],
			]
		);

		$this->add_responsive_control(
			'icon_padding_',
			[
				'label' => esc_html__( 'Padding', 'wpbits-addons-for-elementor' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'rem' ],
				'selectors' => [
                    '{{WRAPPER}} .wpb-accordions .wpbaccordion__head i,{{WRAPPER}} .wpb-accordions .wpbaccordion__head svg,{{WRAPPER}} .wpb-accordions .wpbaccordion__head .wpbaccordion-prefix' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
				],
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
				'selector' => '{{WRAPPER}} .wpb-accordions .wpbaccordion__body,{{WRAPPER}} .wpbaccordion__body p',
			]
		);
        
        $this->add_control(
			'content_color',
			[
				'label' => esc_html__( 'Color', 'wpbits-addons-for-elementor' ),
				'type' => Controls_Manager::COLOR, 
                'default' => '#000000',
				'selectors' => [
					'{{WRAPPER}} .wpb-accordions .wpbaccordion__body,{{WRAPPER}} .wpbaccordion__body p' => 'color: {{VALUE}};'
				]
			]
		);

		$this->add_control(
			'content_bg_color',
			[
				'label' => esc_html__( 'Background Color', 'wpbits-addons-for-elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wpb-accordions .wpbaccordion__body,{{WRAPPER}} .wpbaccordion__body p' => 'background-color: {{VALUE}};'
				]
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'content_border',
				'label' => esc_html__( 'Border', 'wpbits-addons-for-elementor' ),
				'selector' => '{{WRAPPER}} .wpb-accordions .wpbaccordion__body'
			]
		);
        
        $this->add_control(
			'hr_accordion_4',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		);
        
        $this->add_responsive_control(
			'content_padding',
			[
				'label' => esc_html__( 'Padding', 'wpbits-addons-for-elementor' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'rem' ],
				'selectors' => [
                    '{{WRAPPER}} .wpb-accordions .wpbaccordion__body' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
				],
			]
		);
        
        $this->end_controls_section();
	}
    
    protected function render() {
		$settings = $this->get_settings_for_display();
		$rand = '-' . rand();
        if ( $settings['list'] ) { ?>
            <div class="wpb-accordions <?php echo Plugin::instance()->experiments->is_feature_active( 'e_font_icon_svg' ) ? 'wbp-svg-icons' : '';?>" data-selfclose="<?php echo esc_attr($settings['self_close']); ?>" data-opensingle="<?php echo esc_attr($settings['open_single']); ?>" data-openspeed="<?php echo esc_attr($settings['open_speed']); ?>" data-closespeed="<?php echo esc_attr($settings['close_speed']); ?>" data-autoscroll="<?php echo esc_attr($settings['scroll']); ?>" data-scrollspeed="<?php echo esc_attr($settings['scroll_speed']); ?>" data-scrolloffset="<?php echo esc_attr($settings['scroll_offset']); ?>">
            <?php foreach ( $settings['list'] as $item ) { ?>   
                <div id="wpb-<?php echo esc_attr($item['_id']) . $rand; ?>" <?php if ($settings['hash']) { ?>data-hash="#wpb-<?php echo esc_attr($item['_id']) . $rand; ?>"<?php } ?> class="wpbaccordion <?php echo esc_attr($item['status']); ?>" data-wpbaccordion-options='{"selfBlock": <?php echo esc_attr($item['self_block']); ?>}'>                					
					<<?php Utils::print_validated_html_tag($settings['html_tag'])?> <?php echo 'class="wpbaccordion__head"'?>>
						<?php \Elementor\Icons_Manager::render_icon( $item['title_icon'], [ 'aria-hidden' => 'true' ] ); ?>
						<?php if ($item['title_icon_txt']) { echo '<span class="wpbaccordion-prefix">' . esc_html($item['title_icon_txt']) . '</span>'; } ?>
						<?php echo esc_html($item['title']); ?>
					</<?php Utils::print_validated_html_tag($settings['html_tag'])?>>
                    <div class="wpbaccordion__body">
                        <?php $this->print_text_editor($item['text']); ?>
                    </div>
                </div>
            <?php } ?>    
            </div>
            <?php
		}
	}
}
Plugin::instance()->widgets_manager->register_widget_type( new Widget_WPBITS_AFE_Accordion() );