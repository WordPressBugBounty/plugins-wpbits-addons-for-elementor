<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; 

class Widget_WPBITS_AFE_Counter extends Widget_Base {

	public function get_name() {
		return 'wpb-counter';
	}

	public function get_title() {
		return "[WPBits] " . esc_html__( 'Counter', 'wpbits-addons-for-elementor' );
	}

	public function get_categories() {
		return [ 'wpbits-elementor-addons' ];
	}
    
    public function get_script_depends() {
		return [ 'wpb-counter' ];
	}

	public function get_icon() {
		return 'eicon-counter';
	}
    
	protected function register_controls() {

		// section start
  		$this->start_controls_section(
  			'countdown_content',
  			[
  				'label' => esc_html__( 'Counter', 'wpbits-addons-for-elementor' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT
  			]
  		); 
        
        $this->add_control(
			'icon',
			[
				'label' => esc_html__( 'Icon', 'wpbits-addons-for-elementor' ),
				'type' => \Elementor\Controls_Manager::ICONS
			]
		);
        
        $this->add_control(
			'starting_number',
			[
				'label' => esc_html__( 'Starting Number', 'wpbits-addons-for-elementor' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'step' => 1,
				'default' => '',
                'dynamic' => [
					'active' => true,
				],
			]
		);
        
        $this->add_control(
			'ending_number',
			[
				'label' => esc_html__( 'Ending Number', 'wpbits-addons-for-elementor' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'step' => 1,
				'default' => 100,
                'dynamic' => [
					'active' => true,
				],
			]
		);
        
        $this->add_control(
			'prefix', [
				'label' => esc_html__( 'Number Prefix', 'wpbits-addons-for-elementor' ),
				'type' => \Elementor\Controls_Manager::TEXT,
                'placeholder' => '1',
                'dynamic' => [
					'active' => true,
				],
			]
		);
        
        $this->add_control(
			'suffix', [
				'label' => esc_html__( 'Number Suffix', 'wpbits-addons-for-elementor' ),
				'type' => \Elementor\Controls_Manager::TEXT,
                'placeholder' => esc_html__( 'Plus', 'wpbits-addons-for-elementor' ),
                'dynamic' => [
					'active' => true,
				],
			]
		);
        
        $this->add_control(
			'title', [
				'label' => esc_html__( 'Title', 'wpbits-addons-for-elementor' ),
				'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( 'Cool Number', 'wpbits-addons-for-elementor' ),
                'label_block' => true
			]
		);
        
        $this->end_controls_section();
        
        // section start
  		$this->start_controls_section(
  			'settings_content',
  			[
  				'label' => esc_html__( 'Settings', 'wpbits-addons-for-elementor' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT
  			]
  		); 
        
        $this->add_control(
			'content_layout',
			[
				'label' => esc_html__( 'Layout', 'wpbits-addons-for-elementor' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'v-layout',
				'options' => [
					'h-layout'  => esc_html__( 'Horizontal', 'wpbits-addons-for-elementor' ),
					'h-layout-reverse' => esc_html__( 'Horizontal Reverse', 'wpbits-addons-for-elementor' ),
					'h-layout-alt'  => esc_html__( 'Horizontal Alt', 'wpbits-addons-for-elementor' ),
					'h-layout-reverse-alt' => esc_html__( 'Horizontal Reverse Alt', 'wpbits-addons-for-elementor' ),
                    'v-layout'  => esc_html__( 'Vertical', 'wpbits-addons-for-elementor' ),
					'v-layout-reverse' => esc_html__( 'Vertical Reverse', 'wpbits-addons-for-elementor' ),
				],
			]
		);
        
        $this->add_responsive_control(
			'horizontal_h_align',
			[
				'label' => esc_html__( 'Horizontal Align', 'wpbits-addons-for-elementor' ),
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
				'default' => 'center',
                'conditions'   => [
                    'relation' => 'or',
                    'terms' => [
                        [
                            'name'  => 'content_layout',
                            'value' => 'h-layout',
                        ],
                        [
                            'name'  => 'content_layout',
                            'value' => 'h-layout-reverse',
						],
						[
                            'name'  => 'content_layout',
                            'value' => 'h-layout-alt',
                        ],
                        [
                            'name'  => 'content_layout',
                            'value' => 'h-layout-reverse-alt',
                        ]
                    ]
                ],
				'selectors' => [
					'{{WRAPPER}} .wpb-counter.h-layout' => 'justify-content: {{VALUE}};',
					'{{WRAPPER}} .wpb-counter.h-layout-reverse' => 'justify-content: {{VALUE}};',
					'{{WRAPPER}} .wpb-counter.h-layout-alt' => 'justify-content: {{VALUE}};',
                    '{{WRAPPER}} .wpb-counter.h-layout-reverse-alt' => 'justify-content: {{VALUE}};',
				],
                'toggle' => false
			]
		);
        
        $this->add_responsive_control(
			'horizontal_v_align',
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
				'default' => 'center',
                'conditions'   => [
                    'relation' => 'or',
                    'terms' => [
                        [
                            'name'  => 'content_layout',
                            'value' => 'h-layout',
                        ],
                        [
                            'name'  => 'content_layout',
                            'value' => 'h-layout-reverse',
                        ],
						[
                            'name'  => 'content_layout',
                            'value' => 'h-layout-alt',
                        ],
                        [
                            'name'  => 'content_layout',
                            'value' => 'h-layout-reverse-alt',
                        ]
                    ]
                ],
				'selectors' => [
					'{{WRAPPER}} .wpb-counter.h-layout' => 'align-items: {{VALUE}};',
					'{{WRAPPER}} .wpb-counter.h-layout-reverse' => 'align-items: {{VALUE}};',
					'{{WRAPPER}} .wpb-counter.h-layout-alt' => 'align-items: {{VALUE}};',
                    '{{WRAPPER}} .wpb-counter.h-layout-reverse-alt' => 'align-items: {{VALUE}};',
				],
                'toggle' => false
			]
		);

		$this->add_responsive_control(
			'horizontal_text_align',
			[
				'label' => esc_html__( 'Text Align', 'wpbits-addons-for-elementor' ),
				'type' => Controls_Manager::CHOOSE,
				'options' => [
					'left' => [
						'title' => esc_html__( 'Left', 'wpbits-addons-for-elementor' ),
						'icon' => 'eicon-text-align-left',
					],
					'center' => [
						'title' => esc_html__( 'Center', 'wpbits-addons-for-elementor' ),
						'icon' => 'eicon-text-align-center',
					],
					'right' => [
						'title' => esc_html__( 'Right', 'wpbits-addons-for-elementor' ),
						'icon' => 'eicon-text-align-right',
					],
				],
				'default' => '',
				'conditions'   => [
                    'relation' => 'or',
                    'terms' => [
						[
                            'name'  => 'content_layout',
                            'value' => 'h-layout-alt',
                        ],
                        [
                            'name'  => 'content_layout',
                            'value' => 'h-layout-reverse-alt',
                        ]
                    ]
                ],
				'selectors' => [
					'{{WRAPPER}} .wpb-counter-h-alt' => 'text-align: {{VALUE}};',
				],
			]
		);
        
        $this->add_responsive_control(
			'vertical_h_align',
			[
				'label' => esc_html__( 'Horizontal Align', 'wpbits-addons-for-elementor' ),
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
				'default' => 'center',
                'conditions'   => [
                    'relation' => 'or',
                    'terms' => [
                        [
                            'name'  => 'content_layout',
                            'value' => 'v-layout',
                        ],
                        [
                            'name'  => 'content_layout',
                            'value' => 'v-layout-reverse',
                        ]
                    ]
                ],
				'selectors' => [
					'{{WRAPPER}} .wpb-counter.v-layout' => 'align-items: {{VALUE}};',
                    '{{WRAPPER}} .wpb-counter.v-layout-reverse' => 'align-items: {{VALUE}};',
				],
                'toggle' => false
			]
		);

        $this->add_control(
			'anim_duration',
			[
				'label' => esc_html__( 'Animation Duration (ms)', 'wpbits-addons-for-elementor' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'min' => 0,
				'max' => 10000,
				'step' => 100,
				'default' => 1000
			]
		);
        
        $this->add_control(
			'scroll_anim_switcher',
			[
				'label' => esc_html__( 'Scroll Based Animation', 'wpbits-addons-for-elementor' ),
                'description' => esc_html__( 'Activate animation when the counter scrolls into view.', 'wpbits-addons-for-elementor' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Yes', 'wpbits-addons-for-elementor' ),
				'label_off' => esc_html__( 'No', 'wpbits-addons-for-elementor' ),
				'return_value' => 'yes',
				'default' => '',
			]
		);
        
        $this->add_control(
			'seperator_switcher',
			[
				'label' => esc_html__( 'Thousand Separator', 'wpbits-addons-for-elementor' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Yes', 'wpbits-addons-for-elementor' ),
				'label_off' => esc_html__( 'No', 'wpbits-addons-for-elementor' ),
				'return_value' => 'yes',
				'default' => '',
			]
		);
  
		$this->add_control(
			'separator_line',
			[
				'label' => esc_html__( 'Separator Line', 'wpbits-addons-for-elementor' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Yes', 'wpbits-addons-for-elementor' ),
				'label_off' => esc_html__( 'No', 'wpbits-addons-for-elementor' ),
				'return_value' => 'yes',
				'default' => '',
			]
		);


        $this->end_controls_section();
        
        // section start
		$this->start_controls_section(
			'section_counter_style',
			[
				'label' => esc_html__( 'Counter', 'wpbits-addons-for-elementor' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
        
        $this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name' => 'counter_bg',
				'label' => esc_html__( 'Background', 'wpbits-addons-for-elementor' ),
				'types' => [ 'classic', 'gradient' ],
				'selector' => '{{WRAPPER}} .wpb-counter',
			]
		);
        
        $this->add_control(
			'counter_hr_1',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		); 
        
        $this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'counter_border',
				'label' => esc_html__( 'Border', 'wpbits-addons-for-elementor' ),
				'selector' => '{{WRAPPER}} .wpb-counter'
			]
		);
        
        $this->add_responsive_control(
			'counter_border_radius',
			[
				'label' => esc_html__( 'Border Radius', 'wpbits-addons-for-elementor' ),
				'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'rem' ],
				'selectors' => [
					'{{WRAPPER}} .wpb-counter' => 'border-top-left-radius: {{TOP}}{{UNIT}};border-top-right-radius: {{RIGHT}}{{UNIT}};border-bottom-right-radius: {{BOTTOM}}{{UNIT}};border-bottom-left-radius: {{LEFT}}{{UNIT}};'
				]
			]
		);
        
        $this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'counter_box_shadow',
				'label' => esc_html__( 'Box Shadow', 'wpbits-addons-for-elementor' ),
				'selector' => '{{WRAPPER}} .wpb-counter'
			]
		);
        
        $this->add_control(
			'counter_hr_2',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		); 
        
        $this->add_responsive_control(
			'counter_width',
			[
				'label' => esc_html__( 'Maximum Width', 'wpbits-addons-for-elementor' ),
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
					'{{WRAPPER}} .wpb-counter' => 'max-width: {{SIZE}}{{UNIT}};'
				],
			]
		);
        
        $this->add_responsive_control(
			'counter_padding',
			[
				'label' => esc_html__( 'Padding', 'wpbits-addons-for-elementor' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'rem' ],
				'selectors' => [
                    '{{WRAPPER}} .wpb-counter' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
				],
			]
		);
        
        $this->end_controls_section();
        
        // section start
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
				'selectors' => [
					'{{WRAPPER}} .wpb-counter-icon i' => 'color: {{VALUE}}',
					'{{WRAPPER}} .wpb-counter-icon svg' => 'fill: {{VALUE}}',
				],
			]
		);
        
        $this->add_control(
			'icon_bg_color',
			[
				'label' => esc_html__( 'Background Color', 'wpbits-addons-for-elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wpb-counter-icon' => 'background-color: {{VALUE}}'
				],
			]
		);
        
        $this->add_responsive_control(
			'icon_size',
			[
				'label' => esc_html__( 'Size', 'wpbits-addons-for-elementor' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px','rem' ],
                'selectors' => [
                    '{{WRAPPER}} .wpb-counter-icon i' => 'font-size: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .wpb-counter-icon svg' => 'width: {{SIZE}}{{UNIT}};height: {{SIZE}}{{UNIT}};',
				],
			]
		);
        
        $this->add_control(
			'icon_hr_1',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		); 
        
        $this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'icon_border',
				'label' => esc_html__( 'Border', 'wpbits-addons-for-elementor' ),
				'selector' => '{{WRAPPER}} .wpb-counter-icon'
			]
		);
        
        $this->add_responsive_control(
			'icon_border_radius',
			[
				'label' => esc_html__( 'Border Radius', 'wpbits-addons-for-elementor' ),
				'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'rem' ],
				'selectors' => [
					'{{WRAPPER}} .wpb-counter-icon' => 'border-top-left-radius: {{TOP}}{{UNIT}};border-top-right-radius: {{RIGHT}}{{UNIT}};border-bottom-right-radius: {{BOTTOM}}{{UNIT}};border-bottom-left-radius: {{LEFT}}{{UNIT}};'
				]
			]
		);
        
        $this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'icon_border_shadow',
				'label' => esc_html__( 'Box Shadow', 'wpbits-addons-for-elementor' ),
				'selector' => '{{WRAPPER}} .wpb-counter-icon'
			]
		);
        
        $this->add_control(
			'icon_hr_2',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		); 
        
        $this->add_responsive_control(
			'icon_width',
			[
				'label' => esc_html__( 'Width', 'wpbits-addons-for-elementor' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'min' => 0,
				'max' => 1000,
				'step' => 5,
                'selectors' => [
					'{{WRAPPER}} .wpb-counter-icon' => 'width: {{VALUE}}px;',
					'{{WRAPPER}} .wpb-counter-icon svg' => 'width: {{VALUE}}px;'
				],
			]
		);
        
        $this->add_responsive_control(
			'icon_height',
			[
				'label' => esc_html__( 'Height', 'wpbits-addons-for-elementor' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'min' => 0,
				'max' => 1000,
				'step' => 5,
                'selectors' => [
					'{{WRAPPER}} .wpb-counter-icon' => 'height: {{VALUE}}px;',
					'{{WRAPPER}} .wpb-counter-icon i' => 'line-height: {{VALUE}}px;',
					'{{WRAPPER}} .wpb-counter-icon svg' => 'height: {{VALUE}}px;'
				],
			]
		);
        
        $this->add_responsive_control(
			'icon_padding',
			[
				'label' => esc_html__( 'Padding', 'wpbits-addons-for-elementor' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'rem' ],
				'selectors' => [
                    '{{WRAPPER}} .wpb-counter-icon' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
				],
			]
		);
        
        $this->add_responsive_control(
			'icon_margin',
			[
				'label' => esc_html__( 'Margin', 'wpbits-addons-for-elementor' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'rem' ],
				'selectors' => [
                    '{{WRAPPER}} .wpb-counter-icon' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
				],
			]
		);
        
        $this->end_controls_section();
        
        // section start
		$this->start_controls_section(
			'section_number_style',
			[
				'label' => esc_html__( 'Number', 'wpbits-addons-for-elementor' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
        
        $this->add_control(
			'number_color',
			[
				'label' => esc_html__( 'Color', 'wpbits-addons-for-elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wpb-counter-number' => 'color: {{VALUE}};'
				]
			]
		);
        
        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'number_typography',
				'scheme' => Core\Schemes\Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .wpb-counter-number'
			]
		);
        
        $this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'number_text_shadow',
				'label' => esc_html__( 'Text Shadow', 'wpbits-addons-for-elementor' ),
				'selector' => '{{WRAPPER}} .wpb-counter-number',
			]
		);
        
        $this->add_control(
			'number_hr_1',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		);
        
        $this->add_responsive_control(
			'number_padding',
			[
				'label' => esc_html__( 'Padding', 'wpbits-addons-for-elementor' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'rem' ],
				'selectors' => [
                    '{{WRAPPER}} .wpb-counter-number' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
				],
			]
		);
   
        $this->end_controls_section();
        
        // section start
		$this->start_controls_section(
			'section_title_style',
			[
				'label' => esc_html__( 'Title', 'wpbits-addons-for-elementor' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
        
        $this->add_control(
			'title_color',
			[
				'label' => esc_html__( 'Color', 'wpbits-addons-for-elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wpb-counter-title' => 'color: {{VALUE}};'
				]
			]
		);
        
        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'title_typography',
				'scheme' => Core\Schemes\Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .wpb-counter-title'
			]
		);
        
        $this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'title_text_shadow',
				'label' => esc_html__( 'Text Shadow', 'wpbits-addons-for-elementor' ),
				'selector' => '{{WRAPPER}} .wpb-counter-title',
			]
		);
        
        $this->add_control(
			'title_hr_1',
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
                    '{{WRAPPER}} .wpb-counter-title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
				],
			]
		);
   
		$this->end_controls_section();
		

         // section start
		 $this->start_controls_section(
			'seperator_style_section',
			[
				'label' => esc_html__( 'Separator', 'wpbits-addons-for-elementor' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => ['separator_line' => 'yes']
			]
		);

		$this->add_control(
			'seperator_color',
			[
				'label' => esc_html__( 'Border Color', 'wpbits-addons-for-elementor' ),
				'type' => Controls_Manager::COLOR, 
				'selectors' => [
					'{{WRAPPER}} .wpb-counter-separator' => '--s-border-color: {{VALUE}};'
				]
			]
		);

		$this->add_responsive_control(
			'seperator_width',
			[
				'label' => esc_html__( 'Width', 'wpbits-addons-for-elementor' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px','%' ],
				'range' => [
                    'px' => [
						'min' => 1,
						'max' => 10,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 100,
				],
				'selectors' => [
					'{{WRAPPER}} .wpb-counter-separator' => '--s-width: {{SIZE}}{{UNIT}};'
				],
			]
		);

		$this->add_responsive_control(
			'seperator_height',
			[
				'label' => esc_html__( 'Height', 'wpbits-addons-for-elementor' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px'],
				'range' => [
                    'px' => [
						'min' => 1,
						'max' => 10,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 1,
				],
				'selectors' => [
					'{{WRAPPER}} .wpb-counter-separator' => '--s-border-width: {{SIZE}}{{UNIT}};'
				],
			]
		);

        $this->add_responsive_control(
			'seperator_spacing',
			[
				'label' => esc_html__( 'Margin', 'wpbits-addons-for-elementor' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'rem' ],
				'selectors' => [
                    '{{WRAPPER}} .wpb-counter-separator' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
				],
			]
		);
		
		
		$this->end_controls_section();
		
		
		
	}

	/**
	 * Render 
	 */
	protected function render( ) {
		$settings = $this->get_settings_for_display();
        $starting_number = 0;
        $ending_number = 100;
        if ($settings['starting_number']) {
           $starting_number = $settings['starting_number']; 
        }
        if ($settings['ending_number']) {
           $ending_number = $settings['ending_number']; 
        }
        ?>
        <div id="wpb-counter-<?php echo esc_attr($this->get_id()); ?>" class="wpb-counter <?php echo esc_attr($settings['content_layout']); ?>">
            
			<?php if ($settings['icon']['value']) : ?>
            	<div class="wpb-counter-icon"><?php \Elementor\Icons_Manager::render_icon( $settings['icon'], [ 'aria-hidden' => 'true' ] ); ?></div>
			<?php endif; ?>
			
			<?php if (($settings['content_layout'] == 'h-layout-alt') || ($settings['content_layout'] == 'h-layout-reverse-alt')) : ?>
				<div class="wpb-counter-h-alt">
			<?php endif; ?>	
            
			<div class="wpb-counter-number" data-endingnumber="<?php echo esc_attr($ending_number); ?>" data-animduration="<?php echo esc_attr($settings['anim_duration']); ?>" <?php if ($settings['scroll_anim_switcher']) { ?>data-scrollanim<?php } ?> <?php if ($settings['seperator_switcher']) { ?>data-seperator<?php } ?>>
                <?php echo esc_html($settings['prefix']); ?><span><?php echo esc_html($starting_number); ?></span><?php echo esc_html($settings['suffix']); ?>
            </div>
            
			<?php if ( isset( $settings['separator_line'] ) && $settings['separator_line'] == "yes" ) : ?>
            	<div class="wpb-counter-separator"></div>
			<?php endif; ?>

			<?php if ($settings['title']) : ?>
            	<div class="wpb-counter-title"><?php echo esc_html($settings['title']); ?></div>
			<?php endif; ?>
			
			<?php if (($settings['content_layout'] == 'h-layout-alt') || ($settings['content_layout'] == 'h-layout-reverse-alt')) : ?>
				</div>
			<?php endif; ?>

        </div>
	<?php
    } 

}
Plugin::instance()->widgets_manager->register_widget_type( new Widget_WPBITS_AFE_Counter() );