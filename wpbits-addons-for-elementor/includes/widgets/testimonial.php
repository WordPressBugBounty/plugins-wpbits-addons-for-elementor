<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit;

class Widget_WPBITS_AFE_Testimonial extends Widget_Base {

	public function get_name() {
		return 'wpb-testimonial';
	}

	public function get_title() {
		return "[WPBits] " . esc_html__( 'Testimonial', 'wpbits-addons-for-elementor' );
	}
    
    public function get_categories() {
		return [ 'wpbits-elementor-addons' ];
	}
    
    public function get_icon() {
		return 'eicon-testimonial';
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
		$this->start_controls_section(
			'settings_section',
			[
				'label' => esc_html__( 'Testimonials', 'wpbits-addons-for-elementor' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);
        
        $this->add_control(
			'title',
			[
				'label' => esc_html__( 'Name', 'wpbits-addons-for-elementor' ),
				'type' => \Elementor\Controls_Manager::TEXT,
                'label_block' => true,
                'default' => esc_html__( 'John Doe', 'wpbits-addons-for-elementor' )
			]
		);
        
        $this->add_control(
			'subtitle',
			[
				'label' => esc_html__( 'Info', 'wpbits-addons-for-elementor' ),
				'type' => \Elementor\Controls_Manager::TEXT,
                'label_block' => true,
                'default' => esc_html__( 'Web Designer', 'wpbits-addons-for-elementor' )
			]
		);
        
        $this->add_control(
			'image',
			[
				'label' => esc_html__( 'Thumbnail', 'wpbits-addons-for-elementor' ),
                'type' => \Elementor\Controls_Manager::MEDIA
			]
		);
        
        $this->add_control(
			'content', [
				'label' => esc_html__( 'Content', 'wpbits-addons-for-elementor' ),
				'type' => \Elementor\Controls_Manager::WYSIWYG,
                'label_block' => true,
                'default' => esc_html__( 'Enim ad commodo do est proident excepteur nulla enim pariatur. Proident et laborum reprehenderit voluptate velit Lorem culpa ullamco.', 'wpbits-addons-for-elementor' )
			]
		);
        
        $this->end_controls_section();
        
        $this->start_controls_section(
			'section_item',
			[
				'label' => esc_html__( 'Testimonial', 'wpbits-addons-for-elementor' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
        );
        
        $this->add_control(
			'item_direction',
			[
				'label' => esc_html__( 'Flex Direction', 'wpbits-addons-for-elementor' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'column',
				'options' => [
                    'column'  => esc_html__( 'Column', 'wpbits-addons-for-elementor' ),
                    'column-reverse'  => esc_html__( 'Column Reverse', 'wpbits-addons-for-elementor' ),
					'row'  => esc_html__( 'Row', 'wpbits-addons-for-elementor' ),
                    'row-reverse'  => esc_html__( 'Row Reverse', 'wpbits-addons-for-elementor' )
                ],
                'selectors' => [
					'{{WRAPPER}} .wpb-testimonials-item' => 'flex-direction: {{VALUE}};'
				],
			]
        );
        
        $this->add_responsive_control(
			'item_width',
			[
				'label' => esc_html__( 'Max Width (px)', 'wpbits-addons-for-elementor' ),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => [ 'px' ],
				'range' => [
                    'px' => [
						'min' => 100,
						'max' => 1000,
					],
				],
                'selectors' => [
					'{{WRAPPER}} .wpb-testimonials-item' => 'max-width: {{SIZE}}{{UNIT}};'
				],
			]
        );
        
        $this->add_control(
			'item_hr_1',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		);
        
        $this->add_control(
			'item_bg_color',
			[
				'label' => esc_html__( 'Background Color', 'wpbits-addons-for-elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wpb-testimonials-item' => 'background-color: {{VALUE}};'
				],
			]
		);
        
        $this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'item_border',
				'label' => esc_html__( 'Border', 'wpbits-addons-for-elementor' ),
				'selector' => '{{WRAPPER}} .wpb-testimonials-item',
			]
		);
        
        $this->add_responsive_control(
			'item_radius',
			[
				'label' => esc_html__( 'Border Radius', 'wpbits-addons-for-elementor' ),
				'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'rem' ],
				'selectors' => [
					'{{WRAPPER}} .wpb-testimonials-item' => 'border-top-left-radius: {{TOP}}{{UNIT}};border-top-right-radius: {{RIGHT}}{{UNIT}};border-bottom-right-radius: {{BOTTOM}}{{UNIT}};border-bottom-left-radius: {{LEFT}}{{UNIT}};'
				],
			]
		);
        
        $this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'item_shadow',
				'label' => esc_html__( 'Shadow', 'wpbits-addons-for-elementor' ),
				'selector' => '{{WRAPPER}} .wpb-testimonials-item',
			]
        );
        
        $this->add_control(
			'item_hr_2',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		);
        
        $this->add_responsive_control(
			'item_margin',
			[
				'label' => esc_html__( 'Item Margin', 'wpbits-addons-for-elementor' ),
				'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'rem' ],
				'selectors' => [
					'{{WRAPPER}} .wpb-testimonials-item' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
				],
			]
		);
        
        $this->add_responsive_control(
			'item_padding',
			[
				'label' => esc_html__( 'Item Padding', 'wpbits-addons-for-elementor' ),
				'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'rem' ],
				'selectors' => [
					'{{WRAPPER}} .wpb-testimonials-item' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
				],
			]
        );
        
        $this->end_controls_section();

        $this->start_controls_section(
			'section_info',
			[
				'label' => esc_html__( 'Author Info', 'wpbits-addons-for-elementor' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
        
        $this->add_control(
			'info_direction',
			[
				'label' => esc_html__( 'Flex Direction', 'wpbits-addons-for-elementor' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'row',
				'options' => [
                    'column'  => esc_html__( 'Column', 'wpbits-addons-for-elementor' ),
                    'column-reverse'  => esc_html__( 'Column Reverse', 'wpbits-addons-for-elementor' ),
					'row'  => esc_html__( 'Row', 'wpbits-addons-for-elementor' ),
                    'row-reverse'  => esc_html__( 'Row Reverse', 'wpbits-addons-for-elementor' )
                ],
                'selectors' => [
					'{{WRAPPER}} .wpb-testimonials-person' => 'flex-direction: {{VALUE}};'
				],
			]
        );

        $this->add_responsive_control(
			'info_min_width',
			[
				'label' => esc_html__( 'Min Width (px)', 'wpbits-addons-for-elementor' ),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => [ 'px' ],
				'range' => [
                    'px' => [
						'min' => 100,
						'max' => 500,
					],
				],
                'default' => [
					'unit' => 'px',
					'size' => 150,
                ],
                'conditions' => [
                    'relation' => 'or',
                    'terms' => [
                        [
                            'name' => 'item_direction',
                            'operator' => '==',
                            'value' => 'row'
                        ],
                        [
                            'name' => 'item_direction',
                            'operator' => '==',
                            'value' => 'row-reverse'
                        ]
                    ]
                ],
                'selectors' => [
					'{{WRAPPER}} .wpb-testimonials-person' => 'min-width: {{SIZE}}{{UNIT}};'
				],
			]
		);

        $this->add_responsive_control(
			'info_horizontal_align_column',
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
                'conditions' => [
                    'relation' => 'or',
                    'terms' => [
                        [
                            'name' => 'info_direction',
                            'operator' => '==',
                            'value' => 'column'
                        ],
                        [
                            'name' => 'info_direction',
                            'operator' => '==',
                            'value' => 'column-reverse'
                        ]
                    ]
                ],
				'default' => 'center',
				'selectors' => [
					'{{WRAPPER}} .wpb-testimonials-person' => 'align-items: {{VALUE}};',
				],
                'toggle' => false
			]
        );
        
        $this->add_responsive_control(
			'info_vertical_align_column',
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
                'conditions' => [
                    'relation' => 'and',
                    'terms' => [
                        [
                            'relation' => 'or',
                            'terms' => [
                                [
                                    'name' => 'info_direction',
                                    'operator' => '==',
                                    'value' => 'column'
                                ],
                                [
                                    'name' => 'info_direction',
                                    'operator' => '==',
                                    'value' => 'column-reverse'
                                ]
                            ]
                        ],
                        [
                            'relation' => 'or',
                            'terms' => [
                                [
                                    'name' => 'item_direction',
                                    'operator' => '==',
                                    'value' => 'row'
                                ],
                                [
                                    'name' => 'item_direction',
                                    'operator' => '==',
                                    'value' => 'row-reverse'
                                ]
                            ]
                        ]
                    ]
                ],
				'default' => 'center',
				'selectors' => [
					'{{WRAPPER}} .wpb-testimonials-person' => 'justify-content: {{VALUE}};',
				],
                'toggle' => false
			]
		);
        
        $this->add_responsive_control(
			'info_horizontal_align_row',
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
                'conditions' => [
                    'relation' => 'or',
                    'terms' => [
                        [
                            'name' => 'info_direction',
                            'operator' => '==',
                            'value' => 'row'
                        ],
                        [
                            'name' => 'info_direction',
                            'operator' => '==',
                            'value' => 'row-reverse'
                        ]
                    ]
                ],
				'default' => 'flex-start',
				'selectors' => [
					'{{WRAPPER}} .wpb-testimonials-person' => 'justify-content: {{VALUE}};',
				],
                'toggle' => false
			]
        );
        
        $this->add_responsive_control(
			'info_vertical_align_row',
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
                'conditions' => [
                    'relation' => 'or',
                    'terms' => [
                        [
                            'name' => 'info_direction',
                            'operator' => '==',
                            'value' => 'row'
                        ],
                        [
                            'name' => 'info_direction',
                            'operator' => '==',
                            'value' => 'row-reverse'
                        ]
                    ]
                ],
				'default' => 'center',
				'selectors' => [
					'{{WRAPPER}} .wpb-testimonials-person' => 'align-items: {{VALUE}};',
				],
                'toggle' => false
			]
		);
        
        $this->add_responsive_control(
			'info_text_align',
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
					],
                ],
                'default' => 'left',
                'selectors' => [
					'{{WRAPPER}} .wpb-testimonials-person' => 'text-align: {{VALUE}};',
				],
				'toggle' => false,
			]
        );
        
        $this->add_control(
			'info_hr_1',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		);
        
        $this->add_responsive_control(
			'info_margin',
			[
				'label' => esc_html__( 'Margin', 'wpbits-addons-for-elementor' ),
				'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'rem' ],
				'selectors' => [
					'{{WRAPPER}} .wpb-testimonials-person' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
				],
			]
		);
        
        $this->add_responsive_control(
			'info_padding',
			[
				'label' => esc_html__( 'Padding', 'wpbits-addons-for-elementor' ),
				'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'rem' ],
				'selectors' => [
					'{{WRAPPER}} .wpb-testimonials-person' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
				],
			]
		);
        
        $this->end_controls_section();
        
        $this->start_controls_section(
			'section_content',
			[
				'label' => esc_html__( 'Content', 'wpbits-addons-for-elementor' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
        
        $this->add_control(
			'content_font_color',
			[
				'label' => esc_html__( 'Font Color', 'wpbits-addons-for-elementor' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .wpb-testimonials-content' => 'color: {{VALUE}};'
				],
			]
		);
        
        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'content_font_typography',
				'label' => esc_html__( 'Typography', 'wpbits-addons-for-elementor' ),
				'scheme' => Core\Schemes\Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .wpb-testimonials-content,{{WRAPPER}} .wpb-testimonials-content p',
			]
		);
        
        $this->add_control(
			'content_heading_color',
			[
				'label' => esc_html__( 'Heading Color', 'wpbits-addons-for-elementor' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .wpb-testimonials-content h1' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .wpb-testimonials-content h2' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .wpb-testimonials-content h3' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .wpb-testimonials-content h4' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .wpb-testimonials-content h5' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .wpb-testimonials-content h6' => 'color: {{VALUE}};'
				],
			]
		);
        
        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'content_heading_typography',
				'label' => esc_html__( 'Heading Typography', 'wpbits-addons-for-elementor' ),
				'scheme' => Core\Schemes\Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .wpb-testimonials-content h1,{{WRAPPER}} .wpb-testimonials-content h2,{{WRAPPER}} .wpb-testimonials-content h3,{{WRAPPER}} .wpb-testimonials-content h4,{{WRAPPER}} .wpb-testimonials-content h5,{{WRAPPER}} .wpb-testimonials-content h6',
			]
		);
        
        $this->add_responsive_control(
			'content_text_align',
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
					],
				],
				'default' => 'left',
				'selectors' => [
					'{{WRAPPER}} .wpb-testimonials-content' => 'text-align: {{VALUE}};',
					'{{WRAPPER}} .wpb-testimonials-content p' => 'text-align: {{VALUE}};'
				],
				'toggle' => false,
			]
		);
        
        $this->add_control(
			'content_hr_1',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		);
        
        $this->add_control(
			'content_bg_color',
			[
				'label' => esc_html__( 'Background Color', 'wpbits-addons-for-elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wpb-testimonials-content' => 'background-color: {{VALUE}};'
				],
			]
		);
        
        $this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'content_border',
				'label' => esc_html__( 'Border', 'wpbits-addons-for-elementor' ),
				'selector' => '{{WRAPPER}} .wpb-testimonials-content',
			]
		);
        
        $this->add_responsive_control(
			'content_radius',
			[
				'label' => esc_html__( 'Border Radius', 'wpbits-addons-for-elementor' ),
				'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'rem' ],
				'selectors' => [
					'{{WRAPPER}} .wpb-testimonials-content' => 'border-top-left-radius: {{TOP}}{{UNIT}};border-top-right-radius: {{RIGHT}}{{UNIT}};border-bottom-right-radius: {{BOTTOM}}{{UNIT}};border-bottom-left-radius: {{LEFT}}{{UNIT}};'
				],
			]
		);
        
        $this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'content_shadow',
				'label' => esc_html__( 'Shadow', 'wpbits-addons-for-elementor' ),
				'selector' => '{{WRAPPER}} .wpb-testimonials-content',
			]
        );
        
        $this->add_control(
			'content_hr_2',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		);
        
        $this->add_responsive_control(
			'content_margin',
			[
				'label' => esc_html__( 'Margin', 'wpbits-addons-for-elementor' ),
				'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'rem' ],
				'selectors' => [
					'{{WRAPPER}} .wpb-testimonials-content' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
				],
			]
		);
        
        $this->add_responsive_control(
			'content_padding',
			[
				'label' => esc_html__( 'Padding', 'wpbits-addons-for-elementor' ),
				'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'rem' ],
				'selectors' => [
					'{{WRAPPER}} .wpb-testimonials-content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
				],
			]
        );
        
        $this->end_controls_section();
        
        $this->start_controls_section(
			'section_arrow',
			[
				'label' => esc_html__( 'Content Arrow', 'wpbits-addons-for-elementor' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

        $this->add_control(
			'content_arrow',
			[
				'label' => esc_html__( 'Arrow', 'wpbits-addons-for-elementor' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'no-arrow',
				'options' => [
                    'no-arrow'  => esc_html__( 'None', 'wpbits-addons-for-elementor' ),
                    'top-arrow'  => esc_html__( 'Top', 'wpbits-addons-for-elementor' ),
                    'bottom-arrow'  => esc_html__( 'Bottom', 'wpbits-addons-for-elementor' ),
                    'left-arrow'  => esc_html__( 'Left', 'wpbits-addons-for-elementor' ),
                    'right-arrow'  => esc_html__( 'Right', 'wpbits-addons-for-elementor' ),
				],
			]
        );
        
        $this->add_responsive_control(
			'content_arrow_top',
			[
				'label' => esc_html__( 'Top Spacing', 'wpbits-addons-for-elementor' ),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => [ 'px', '%' ],
				'range' => [
                    'px' => [
						'min' => 0,
						'max' => 500,
                    ],
                    '%' => [
						'min' => 0,
						'max' => 100,
					],
				],
                'conditions' => [
                    'relation' => 'or',
                    'terms' => [
                        [
                            'name' => 'content_arrow',
                            'operator' => '==',
                            'value' => 'left-arrow'
                        ],
                        [
                            'name' => 'content_arrow',
                            'operator' => '==',
                            'value' => 'right-arrow'
                        ]
                    ]
                ],
                'selectors' => [
                    '{{WRAPPER}} .wpb-testimonials-content.left-arrow:after' => 'top: {{SIZE}}{{UNIT}};transform:translateY(0) translateX(-100%);',
                    '{{WRAPPER}} .wpb-testimonials-content.right-arrow:after' => 'top: {{SIZE}}{{UNIT}};transform:translateY(0) translateX(100%);'
				],
			]
        );
        
        $this->add_responsive_control(
			'content_arrow_left',
			[
				'label' => esc_html__( 'Left Spacing', 'wpbits-addons-for-elementor' ),
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
                'conditions' => [
                    'relation' => 'or',
                    'terms' => [
                        [
                            'name' => 'content_arrow',
                            'operator' => '==',
                            'value' => 'top-arrow'
                        ],
                        [
                            'name' => 'content_arrow',
                            'operator' => '==',
                            'value' => 'bottom-arrow'
                        ]
                    ]
                ],
                'selectors' => [
                    '{{WRAPPER}} .wpb-testimonials-content.top-arrow:after' => 'left: {{SIZE}}{{UNIT}};transform:none;',
                    '{{WRAPPER}} .wpb-testimonials-content.bottom-arrow:after' => 'left: {{SIZE}}{{UNIT}};transform:none;'
				],
			]
		);

        $this->add_control(
			'arrow_color',
			[
				'label' => esc_html__( 'Arrow Color', 'wpbits-addons-for-elementor' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#000000',
				'selectors' => [
					'{{WRAPPER}} .wpb-testimonials-content:after' => 'border-color: {{VALUE}};'
				],
			]
		);
        
        $this->add_responsive_control(
			'arrow_size',
			[
				'label' => esc_html__( 'Arrow Size (px)', 'wpbits-addons-for-elementor' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'min' => 0,
				'max' => 200,
				'step' => 1,
				'default' => 15,
                'selectors' => [
					'{{WRAPPER}} .wpb-testimonials-content:after' => 'border-width: {{VALUE}}px;'
				],
			]
		);
        
        $this->end_controls_section();
        
        $this->start_controls_section(
			'section_title',
			[
				'label' => esc_html__( 'Name', 'wpbits-addons-for-elementor' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
        
        $this->add_control(
			'title_color',
			[
				'label' => esc_html__( 'Color', 'wpbits-addons-for-elementor' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#111111',
				'selectors' => [
					'{{WRAPPER}} .wpb-testimonials-title' => 'color: {{VALUE}};'
				],
			]
		);
        
        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'title_typography',
				'label' => esc_html__( 'Typography', 'wpbits-addons-for-elementor' ),
				'scheme' => Core\Schemes\Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .wpb-testimonials-title',
			]
		);
        
        $this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'title_shadow',
				'label' => esc_html__( 'Text Shadow', 'wpbits-addons-for-elementor' ),
				'selector' => '{{WRAPPER}} .wpb-testimonials-title',
			]
        );

        $this->add_control(
			'title_hr_1',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		);
        
        $this->add_responsive_control(
			'title_margin',
			[
				'label' => esc_html__( 'Margin', 'wpbits-addons-for-elementor' ),
				'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'rem' ],
				'selectors' => [
					'{{WRAPPER}} .wpb-testimonials-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
				],
			]
		);
        
        $this->add_responsive_control(
			'title_padding',
			[
				'label' => esc_html__( 'Padding', 'wpbits-addons-for-elementor' ),
				'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'rem' ],
				'selectors' => [
					'{{WRAPPER}} .wpb-testimonials-title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
				],
			]
		);
        
        $this->end_controls_section();
        
        $this->start_controls_section(
			'section_subtitle',
			[
				'label' => esc_html__( 'Info', 'wpbits-addons-for-elementor' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
        
        $this->add_control(
			'subtitle_color',
			[
				'label' => esc_html__( 'Color', 'wpbits-addons-for-elementor' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#111111',
				'selectors' => [
					'{{WRAPPER}} .wpb-testimonials-subtitle' => 'color: {{VALUE}};'
				],
			]
		);
        
        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'subtitle_typography',
				'label' => esc_html__( 'Typography', 'wpbits-addons-for-elementor' ),
				'scheme' => Core\Schemes\Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .wpb-testimonials-subtitle',
			]
		);
        
        $this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'subtitle_shadow',
				'label' => esc_html__( 'Text Shadow', 'wpbits-addons-for-elementor' ),
				'selector' => '{{WRAPPER}} .wpb-testimonials-subtitle',
			]
        );

        $this->add_control(
			'subtitle_hr_1',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		);
        
        $this->add_responsive_control(
			'subtitle_margin',
			[
				'label' => esc_html__( 'Margin', 'wpbits-addons-for-elementor' ),
				'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'rem' ],
				'selectors' => [
					'{{WRAPPER}} .wpb-testimonials-subtitle' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
				],
			]
		);
        
        $this->add_responsive_control(
			'subtitle_padding',
			[
				'label' => esc_html__( 'Padding', 'wpbits-addons-for-elementor' ),
				'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'rem' ],
				'selectors' => [
					'{{WRAPPER}} .wpb-testimonials-subtitle' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
				],
			]
		);
        
        $this->end_controls_section();
        
        $this->start_controls_section(
			'section_thumbnail',
			[
				'label' => esc_html__( 'Thumbnail', 'wpbits-addons-for-elementor' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
        
        $this->add_control(
			'img_size',
			[
				'label' => esc_html__( 'Thumbnail Size', 'wpbits-addons-for-elementor' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'thumbnail',
				'options' => $this->get_widget_image_sizes(),
			]
		);
        
        $this->add_responsive_control(
			'thumb_width',
			[
				'label' => esc_html__( 'Max Width (px)', 'wpbits-addons-for-elementor' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'min' => 0,
				'max' => 500,
				'step' => 1,
				'default' => 70,
                'selectors' => [
					'{{WRAPPER}} .wpb-testimonials-thumb' => 'width: {{VALUE}}px;'
				],
			]
        );
        
        $this->add_control(
			'thumb_hr_1',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		);
        
        $this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'thumb_border',
				'label' => esc_html__( 'Border', 'wpbits-addons-for-elementor' ),
				'selector' => '{{WRAPPER}} .wpb-testimonials-thumb img',
			]
		);
        
        $this->add_responsive_control(
			'thumb_radius',
			[
				'label' => esc_html__( 'Border Radius', 'wpbits-addons-for-elementor' ),
				'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'rem' ],
				'selectors' => [
					'{{WRAPPER}} .wpb-testimonials-thumb img' => 'border-top-left-radius: {{TOP}}{{UNIT}};border-top-right-radius: {{RIGHT}}{{UNIT}};border-bottom-right-radius: {{BOTTOM}}{{UNIT}};border-bottom-left-radius: {{LEFT}}{{UNIT}};'
				],
			]
		);
        
        $this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'thumb_shadow',
				'label' => esc_html__( 'Shadow', 'wpbits-addons-for-elementor' ),
				'selector' => '{{WRAPPER}} .wpb-testimonials-thumb img',
			]
        );

        $this->add_control(
			'thumb_hr_2',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		);
        
        $this->add_responsive_control(
			'thumb_margin',
			[
				'label' => esc_html__( 'Margin', 'wpbits-addons-for-elementor' ),
				'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'rem' ],
				'selectors' => [
					'{{WRAPPER}} .wpb-testimonials-thumb' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
				],
			]
		);
        
        $this->end_controls_section();

	}
    
    protected function render() {
		$settings = $this->get_settings_for_display();
        ?>
        <?php 
        $img_url = wp_get_attachment_image_url( $settings['image']['id'], $settings['img_size'] );  
        ?>
        <div class="wpb-testimonials-item">
            <div class="wpb-testimonials-content <?php echo sanitize_html_class($settings['content_arrow']); ?>">
                <?php echo $this->parse_text_editor($settings['content']); ?>
            </div>
            <div class="wpb-testimonials-person">
                <?php if ($img_url) { ?>
                <div class="wpb-testimonials-thumb"><img src="<?php echo esc_url($img_url); ?>" alt="<?php echo esc_attr($settings['title']); ?>" /></div>
                <?php } ?>
                <div class="wpb-testimonials-info">
                    <?php if ($settings['title']) { ?>
                    <span class="wpb-testimonials-title"><?php echo esc_html($settings['title']); ?></span>
                    <?php } ?>
                    <?php if ($settings['subtitle']) { ?>
                    <span class="wpb-testimonials-subtitle"><?php echo esc_html($settings['subtitle']); ?></span>
                    <?php } ?>
                </div>
            </div>
        </div>
<?php }
}
Plugin::instance()->widgets_manager->register_widget_type( new Widget_WPBITS_AFE_Testimonial() );
?>