<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit;

class Widget_WPBITS_AFE_Icon_Box extends Widget_Base {

	public function get_name() {
		return 'wpb-icon-box';
	}

	public function get_title() {
		return "[WPBits] " . esc_html__( 'Icon Box', 'wpbits-addons-for-elementor' );
	}

	public function get_categories() {
		return [ 'wpbits-elementor-addons' ];
	}
    
    public function get_icon() {
		return 'eicon-icon-box';
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
			'title', [
				'label' => esc_html__( 'Title', 'wpbits-addons-for-elementor' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Title', 'wpbits-addons-for-elementor' ),
				'label_block' => true,
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
				'default' => 'h4',
			]
		);

        $this->add_control(
			'desc', [
				'label' => esc_html__( 'Description', 'wpbits-addons-for-elementor' ),
				'type' => \Elementor\Controls_Manager::WYSIWYG,
				'default' => '',
				'label_block' => true,
			]
		);


        $this->add_control(
			'icon_hr_1',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		);
        
        $this->add_control(
			'icon',
			[
				'label' => esc_html__( 'Icon', 'wpbits-addons-for-elementor' ),
				'type' => \Elementor\Controls_Manager::ICONS,
                'show_label' => false
			]
		);
        
		$this->add_responsive_control(
			'icon_position',
			[
				'label' => esc_html__( 'Icon Position', 'wpbits-addons-for-elementor' ),
				'type' => Controls_Manager::CHOOSE,
				'options' => [
					'column' => [
						'title' => esc_html__( 'Top', 'wpbits-addons-for-elementor' ),
						'icon' => 'eicon-v-align-top',
					],
					'column-reverse' => [
						'title' => esc_html__( 'Bottom', 'wpbits-addons-for-elementor' ),
						'icon' => 'eicon-v-align-bottom',
					],					
					'row' => [
						'title' => esc_html__( 'Left', 'wpbits-addons-for-elementor' ),
						'icon' => 'eicon-h-align-left',
					],
					'row-reverse' => [
						'title' => esc_html__( 'Right', 'wpbits-addons-for-elementor' ),
						'icon' => 'eicon-h-align-right',
					],
				],
				'default' => 'column',  
				'selectors' => [
					'{{WRAPPER}} .wpb-icon-box' => 'flex-direction: {{VALUE}}; align-items: center;',
				],                
                'toggle' => false
			]
		);

        $this->add_control(
			'box_heading_1',
			[
				'label' => esc_html__( 'Link to', 'wpbits-addons-for-elementor' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
        
        $this->add_control(
			'link',
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
        
                
        $this->end_controls_section();


		// section start
		$this->start_controls_section(
			'title_style_section',
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
				'selector' => '{{WRAPPER}} .wpb-icon-box-title'
			]
		);
        
        $this->add_control(
			'title_color',
			[
				'label' => esc_html__( 'Color', 'wpbits-addons-for-elementor' ),
				'type' => Controls_Manager::COLOR,
                'selectors' => [
					'{{WRAPPER}} .wpb-icon-box-title' => 'color: {{VALUE}};'
				]
			]
		);

        $this->add_responsive_control(
			'title_align',
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
					'{{WRAPPER}} .wpb-icon-box-title' => 'text-align: {{VALUE}};'
				],
				'toggle' => true,
			]
		);

        $this->add_responsive_control(
			'title_padding',
			[
				'label' => esc_html__( 'Padding', 'wpbits-addons-for-elementor' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'rem' ],
				'selectors' => [
					'{{WRAPPER}} .wpb-icon-box-title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'{{WRAPPER}} .wpb-icon-box-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

        $this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'title_border',
				'label' => esc_html__( 'Border', 'wpbits-addons-for-elementor' ),
				'selector' => '{{WRAPPER}} .wpb-icon-box-title'
			]
		);

        $this->add_control(
			'title_border_radius',
			[
				'label' => esc_html__( 'Border Radius', 'wpbits-addons-for-elementor' ),
				'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'rem' ],
				'selectors' => [
					'{{WRAPPER}} .wpb-icon-box-title' => 'border-top-left-radius: {{TOP}}{{UNIT}};border-top-right-radius: {{RIGHT}}{{UNIT}};border-bottom-right-radius: {{BOTTOM}}{{UNIT}};border-bottom-left-radius: {{LEFT}}{{UNIT}};'
				]
			]
		);
        
        
        $this->end_controls_section();


        /**
         * Text Style
         */
		$this->start_controls_section(
			'text_style_section',
			[
				'label' => esc_html__( 'Text', 'wpbits-addons-for-elementor' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'text_typography',
				'scheme' => Core\Schemes\Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .wpb-icon-box-text'
			]
		);
        
        $this->add_control(
			'text_color',
			[
				'label' => esc_html__( 'Color', 'wpbits-addons-for-elementor' ),
				'type' => Controls_Manager::COLOR,
                'selectors' => [
					'{{WRAPPER}} .wpb-icon-box-text' => 'color: {{VALUE}};'
				]
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
					'{{WRAPPER}} .wpb-icon-box-text' => 'text-align: {{VALUE}};'
				],
				'toggle' => true,
			]
		);

        $this->add_responsive_control(
			'text_padding',
			[
				'label' => esc_html__( 'Padding', 'wpbits-addons-for-elementor' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'rem' ],
				'selectors' => [
					'{{WRAPPER}} .wpb-icon-box-text' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

        $this->add_responsive_control(
			'text_margin',
			[
				'label' => esc_html__( 'Margin', 'wpbits-addons-for-elementor' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'rem' ],
				'selectors' => [
					'{{WRAPPER}} .wpb-icon-box-text' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

        $this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'text_border',
				'label' => esc_html__( 'Border', 'wpbits-addons-for-elementor' ),
				'selector' => '{{WRAPPER}} .wpb-icon-box-text'
			]
		);

        $this->add_control(
			'text_border_radius',
			[
				'label' => esc_html__( 'Border Radius', 'wpbits-addons-for-elementor' ),
				'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'rem' ],
				'selectors' => [
					'{{WRAPPER}} .wpb-icon-box-text' => 'border-top-left-radius: {{TOP}}{{UNIT}};border-top-right-radius: {{RIGHT}}{{UNIT}};border-bottom-right-radius: {{BOTTOM}}{{UNIT}};border-bottom-left-radius: {{LEFT}}{{UNIT}};'
				]
			]
		);
        
        
        $this->end_controls_section();

        /**
         * Icon Style
         */
		$this->start_controls_section(
			'icon_style_section',
			[
				'label' => esc_html__( 'Icon', 'wpbits-addons-for-elementor' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

        $this->add_responsive_control(
            'icon_size',
            [
                'label' => esc_html__( 'Size', 'wpbits-addons-for-elementor' ),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => [ 'px', 'rem', 'vh' ],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 1000,
                    ],
                    'em' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                    'rem' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .wpb-icon-box-icon > *' => ! Plugin::instance()->experiments->is_feature_active( 'e_font_icon_svg' ) ? 'font-size: {{SIZE}}{{UNIT}};' : 'line-height: 0;',
					'{{WRAPPER}} .wpb-icon-box-icon svg' => Plugin::instance()->experiments->is_feature_active( 'e_font_icon_svg' ) ? 'height:{{SIZE}}{{UNIT}};' : '',
                ],
            ]
        );        

        $this->add_responsive_control(
			'icon_align',
			[
				'label' => esc_html__( 'Alignment', 'wpbits-addons-for-elementor' ),
				'type' => \Elementor\Controls_Manager::CHOOSE,
				'options' => [
					'flex-start' => [
						'title' => esc_html__( 'Left', 'wpbits-addons-for-elementor' ),
						'icon' => 'fa fa-align-left',
					],
					'center' => [
						'title' => esc_html__( 'Center', 'wpbits-addons-for-elementor' ),
						'icon' => 'fa fa-align-center',
					],
					'flex-end' => [
						'title' => esc_html__( 'Right', 'wpbits-addons-for-elementor' ),
						'icon' => 'fa fa-align-right',
					]
				],
				'selectors' => [
					'{{WRAPPER}} .wpb-icon-box-icon' => 'align-self: {{VALUE}};'
				],
				'toggle' => true,
			]
		);

        $this->add_responsive_control(
            'icon_min_width',
            [
                'label' => esc_html__( 'Minimum Width', 'wpbits-addons-for-elementor' ),
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
                    '{{WRAPPER}} .wpb-icon-box-icon > *' => ! Plugin::instance()->experiments->is_feature_active( 'e_font_icon_svg' ) ? 'min-width: {{SIZE}}{{UNIT}};' : '',
					'{{WRAPPER}} .wpb-icon-box-icon svg' => Plugin::instance()->experiments->is_feature_active( 'e_font_icon_svg' ) ? 'min-width: {{SIZE}}{{UNIT}};' : '',
                ],
            ]
        );

        $this->add_responsive_control(
            'icon_min_height',
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
                    '{{WRAPPER}} .wpb-icon-box-icon > *' => ! Plugin::instance()->experiments->is_feature_active( 'e_font_icon_svg' ) ? 'min-height: {{SIZE}}{{UNIT}};line-height: {{SIZE}}{{UNIT}};' : '',
					'{{WRAPPER}} .wpb-icon-box-icon svg' => Plugin::instance()->experiments->is_feature_active( 'e_font_icon_svg' ) ? 'min-height: {{SIZE}}{{UNIT}};' : '',
                ],
            ]
        ); 

		$this->add_responsive_control(
			'icon_max_width',
            [
                'label' => esc_html__( 'Maximum Width', 'wpbits-addons-for-elementor' ),
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
                    '{{WRAPPER}} .wpb-icon-box-icon > *' => ! Plugin::instance()->experiments->is_feature_active( 'e_font_icon_svg' ) ? 'max-width: {{SIZE}}{{UNIT}};' : '',
					'{{WRAPPER}} .wpb-icon-box-icon svg' => Plugin::instance()->experiments->is_feature_active( 'e_font_icon_svg' ) ? 'max-width: {{SIZE}}{{UNIT}};' : '',
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
                    '{{WRAPPER}} .wpb-icon-box-icon > *' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    '{{WRAPPER}} .wpb-icon-box-icon > *' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );


        $this->start_controls_tabs( 'tabs_icon_style' );
        
        $this->start_controls_tab(
			'tabs_icon_style_idle',
			[
				'label' => esc_html__( 'Normal', 'wpbits-addons-for-elementor' ),
			]
		);


                $this->add_control(
                    'icon_color',
                    [
                        'label' => esc_html__( 'Color', 'wpbits-addons-for-elementor' ),
                        'type' => Controls_Manager::COLOR,
                        'selectors' => [
                            '{{WRAPPER}} .wpb-icon-box-icon i' => 'color: {{VALUE}};',
                            '{{WRAPPER}} .wpb-icon-box-icon path' => 'fill: {{VALUE}};'
                        ],
                        'separator' => 'after'
                    ]
                );

                $this->add_control(
                    'icon_bg_color',
                    [
                        'label' => esc_html__( 'Background Color', 'wpbits-addons-for-elementor' ),
                        'type' => Controls_Manager::COLOR,
                        'selectors' => [
                            '{{WRAPPER}} .wpb-icon-box-icon > *' => 'background-color: {{VALUE}};'
                        ],
                        'separator' => 'after'
                    ]
                );                


                $this->add_group_control(
                    Group_Control_Border::get_type(),
                    [
                        'name' => 'icon_border',
                        'label' => esc_html__( 'Border', 'wpbits-addons-for-elementor' ),
                        'selector' => '{{WRAPPER}} .wpb-icon-box-icon > *'
                    ]
                );

                $this->add_control(
                    'icon_border_radius',
                    [
                        'label' => esc_html__( 'Border Radius', 'wpbits-addons-for-elementor' ),
                        'type' => Controls_Manager::DIMENSIONS,
                        'size_units' => [ 'px', '%', 'rem' ],
                        'selectors' => [
                            '{{WRAPPER}} .wpb-icon-box-icon > *' => 'border-top-left-radius: {{TOP}}{{UNIT}};border-top-right-radius: {{RIGHT}}{{UNIT}};border-bottom-right-radius: {{BOTTOM}}{{UNIT}};border-bottom-left-radius: {{LEFT}}{{UNIT}};'
                        ]
                    ]
                );
                
        $this->end_controls_tab();

		$this->start_controls_tab(
			'tabs_icon_style_hover',
			[
				'label' => esc_html__( 'Hover', 'wpbits-addons-for-elementor' ),
			]
		);
        
                $this->add_control(
                    'icon_hover_color',
                    [
                        'label' => esc_html__( 'Color', 'wpbits-addons-for-elementor' ),
                        'type' => Controls_Manager::COLOR,
                        'selectors' => [
                            '{{WRAPPER}}:hover .wpb-icon-box-icon i' => 'color: {{VALUE}};',
                            '{{WRAPPER}}:hover .wpb-icon-box-icon path' => 'fill: {{VALUE}};'
                        ],
                        'separator' => 'after'
                    ]
                );

                $this->add_control(
                    'icon_hover_bg_color',
                    [
                        'label' => esc_html__( 'Background Color', 'wpbits-addons-for-elementor' ),
                        'type' => Controls_Manager::COLOR,
                        'selectors' => [
                            '{{WRAPPER}}:hover .wpb-icon-box-icon > *' => 'background-color: {{VALUE}};'
                        ],
                        'separator' => 'after'
                    ]
                );                


                $this->add_group_control(
                    Group_Control_Border::get_type(),
                    [
                        'name' => 'icon_hover_border',
                        'label' => esc_html__( 'Border', 'wpbits-addons-for-elementor' ),
                        'selector' => '{{WRAPPER}}:hover .wpb-icon-box-icon > *'
                    ]
                );

                $this->add_control(
                    'icon_hover_border_radius',
                    [
                        'label' => esc_html__( 'Border Radius', 'wpbits-addons-for-elementor' ),
                        'type' => Controls_Manager::DIMENSIONS,
                        'size_units' => [ 'px', '%', 'rem' ],
                        'selectors' => [
                            '{{WRAPPER}}:hover .wpb-icon-box-icon > *' => 'border-top-left-radius: {{TOP}}{{UNIT}};border-top-right-radius: {{RIGHT}}{{UNIT}};border-bottom-right-radius: {{BOTTOM}}{{UNIT}};border-bottom-left-radius: {{LEFT}}{{UNIT}};'
                        ]
                    ]
                );
        
        $this->end_controls_section();        
				
	}
    
    protected function render() {
		$settings      = $this->get_settings_for_display();
		$target        = $settings['link']['is_external'] ? ' target="_blank"' : '';
		$nofollow      = $settings['link']['nofollow'] ? ' rel="nofollow"' : '';

 
		
        ?>
      
            <div class="wpb-icon-box">

                <div class="wpb-icon-box-icon">     

                    <?php if( isset( $settings['link']['url'] ) ) : ?>
                        <a href="<?php echo esc_url($settings['link']['url']); ?>" <?php echo $target . $nofollow; ?>>
                    <?php endif; ?>
                        <?php \Elementor\Icons_Manager::render_icon( $settings['icon'], [ 'aria-hidden' => 'true' ] );  ?>
                    <?php if( isset( $settings['link']['url'] ) ) : ?>
                        </a>
                    <?php endif; ?>      

                </div>

                <div class="wpb-icon-box-content">                

                    <?php if( isset( $settings['link']['url'] ) ) : ?>
                        <a href="<?php echo esc_url($settings['link']['url']); ?>" <?php echo $target . $nofollow; ?>>
                    <?php endif; ?>
                        <?php
                            if( ! empty( $settings["title"] ) ){
                                printf('<%1$s class="wpb-icon-box-title">%2$s</%1$s>', Utils::validate_html_tag($settings["html_tag"]), esc_html($settings["title"]) );
                            }
                        ?>
                    <?php if( isset( $settings['link']['url'] ) ) : ?>
                        </a>
                    <?php endif; ?>      

                    <?php
                        if( ! empty( $settings["desc"] ) ){
                            printf('%2$s%1$s%3$s', $this->parse_text_editor($settings["desc"]), '<div class="wpb-icon-box-text">', '</div>' );
                        }                        
                    ?>

                </div>

            </div> 
<?php
	}
}
Plugin::instance()->widgets_manager->register_widget_type( new Widget_WPBITS_AFE_Icon_Box() );