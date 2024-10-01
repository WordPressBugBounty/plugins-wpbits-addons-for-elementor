<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit;

class Widget_WPBITS_AFE_Hotspot extends Widget_Base {

	public function get_name() {
		return 'wpb-hotspot';
	}

	public function get_title() {
		return "[WPBits] " . esc_html__( 'Hotspot', 'wpbits-addons-for-elementor' );
	}

	public function get_categories() {
		return [ 'wpbits-elementor-addons' ];
	}
    
    public function get_icon() {
		return 'eicon-image-hotspot';
	}

	protected function register_controls() {
		$this->start_controls_section(
			'content_section',
			[
				'label' => esc_html__( 'Spots', 'wpbits-addons-for-elementor' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);
        
        $this->add_control(
			'image',
			[
				'label' => esc_html__( 'Image', 'wpbits-addons-for-elementor' ),
				'type' => \Elementor\Controls_Manager::MEDIA
			]
        );
        
		$this->add_group_control(
			Group_Control_Image_Size::get_type(),
			[
				'name' => 'image', // Usage: `{name}_size` and `{name}_custom_dimension`, in this case `image_size` and `image_custom_dimension`.
				'default' => 'medium',
				'separator' => 'none'
			]
        ); 
        
        
        $repeater = new \Elementor\Repeater();

 
        $repeater->add_control(
			'title', [
				'label' => esc_html__( 'Title', 'wpbits-addons-for-elementor' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => '',
				'label_block' => true,
			]
		);
        
        $repeater->add_control(
			'content', [
				'label' => esc_html__( 'Content', 'wpbits-addons-for-elementor' ),
				'type' => \Elementor\Controls_Manager::WYSIWYG,
				'default' => '',
				'label_block' => true,
			]
		);
		
		$repeater->add_responsive_control(
			'posX', [
				'label' => esc_html__( 'Position X', 'wpbits-addons-for-elementor' ),
                'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ '%', 'px' ],
				'range' => [
					'%' => [
						'min' => 0,
						'max' => 100,
					],
                    'px' => [
						'min' => 0,
						'max' => 2000,
					]
                ],                
                'default' => [
					'unit' => '%',
					'size' => 50,
				],                
                'label_block' => true, 
                'step' => 1, 
				'selectors' => [
					'{{WRAPPER}} {{CURRENT_ITEM}}' => '--spot-x: {{SIZE}}{{UNIT}};'
				]                          
			]
		);

		$repeater->add_responsive_control(
			'posY', [
				'label' => esc_html__( 'Position X', 'wpbits-addons-for-elementor' ),
                'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ '%', 'px' ],
				'range' => [
					'%' => [
						'min' => 0,
						'max' => 100,
					],
                    'px' => [
						'min' => 0,
						'max' => 2000,
					]
                ],                
                'default' => [
					'unit' => '%',
					'size' => 50,
				],                
                'label_block' => true, 
                'step' => 1, 
				'selectors' => [
					'{{WRAPPER}} {{CURRENT_ITEM}}' => '--spot-y: {{SIZE}}{{UNIT}};'
				]                          
			]
		);

        $repeater->add_control(
			'custom_color',
			[
				'label' => esc_html__( 'Custom Spot Color', 'wpbits-addons-for-elementor' ),
				'type' => Controls_Manager::COLOR, 
				'selectors' => [
					'{{WRAPPER}} {{CURRENT_ITEM}}' => '--spot-line-color: {{VALUE}};'
				]
			]
		);        
        
        $this->add_control(
            'spots',
            [
                'label' => esc_html__( 'Spots', 'wpbits-addons-for-elementor' ),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'show_label' => false,
                'default' => [
                    // [
                    //     'image' => '',
                    //     'title' => esc_html__( 'Title #1', 'wpbits-addons-for-elementor' ),
                    //     'desc' => '<p>'.esc_html__( 'Description...', 'wpbits-addons-for-elementor' ).'</p>',
                    //     'date' => esc_html__( '27.11.2020', 'wpbits-addons-for-elementor' ),
                    // ],
                    // [
                    //     'image' => '',
                    //     'title' => esc_html__( 'Title #2', 'wpbits-addons-for-elementor' ),
                    //     'desc' => '<p>'.esc_html__( 'Description...', 'wpbits-addons-for-elementor' ).'</p>',
                    //     'date' => esc_html__( '27.11.2020', 'wpbits-addons-for-elementor' ),
                    // ],
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
  

        $this->end_controls_section();
        
        // section start
		$this->start_controls_section(
			'indicator',
			[
				'label' => esc_html__( 'Content', 'wpbits-addons-for-elementor' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
        
        $this->add_responsive_control(
			'align',
			[
				'label' => esc_html__( 'Content Align', 'wpbits-addons-for-elementor' ),
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
				'default' => 'center',
				'selectors' => [
					'{{WRAPPER}} .spot-content' => 'text-align: {{VALUE}};',
				],
                'toggle' => false
			]
        );
                
        $this->add_responsive_control(
			'padding',
			[
				'label' => esc_html__( 'Padding', 'wpbits-addons-for-elementor' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'rem' ],
				'selectors' => [
                    '{{WRAPPER}} .spot-content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ],
                'separator' => 'before',
			]
        );
                
        $this->add_control(
			'content_width',
			[
				'label' => esc_html__( 'Content Width', 'wpbits-addons-for-elementor' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'min' => 1,
				'max' => 1000,
				'step' => 1,
				'default' => 200,
				'selectors' => [
					'{{WRAPPER}} .wpbits-afe-hotspots' => '--spot-content-width: {{VALUE}}px;'
				]				
			]
		);	
 
        $this->add_control(
			'indicator_color',
			[
				'label' => esc_html__( 'Content Background Color', 'wpbits-addons-for-elementor' ),
				'type' => Controls_Manager::COLOR, 
				'selectors' => [
					'{{WRAPPER}} .wpbits-afe-hotspots' => '--spot-content-bg-color: {{VALUE}};'
                ],
                'separator' => 'before',
			]
        );

        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
                'label' => esc_html__( 'Content Typography', 'wpbits-addons-for-elementor' ),
				'name' => 'typography',
				'scheme' => Core\Schemes\Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .spot-content',
			]
		);        

        $this->add_control(
			'content_color',
			[
				'label' => esc_html__( 'Content Font Color', 'wpbits-addons-for-elementor' ),
				'type' => Controls_Manager::COLOR, 
				'selectors' => [
					'{{WRAPPER}} .wpbits-afe-hotspots' => '--spot-content-color: {{VALUE}};'
                ],
                'separator' => 'after',
			]
        );

        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
                'label' => esc_html__( 'Heading Typography', 'wpbits-addons-for-elementor' ),
				'name' => 'heading_typography',
				'scheme' => Core\Schemes\Typography::TYPOGRAPHY_1,
                'selector' => '{{WRAPPER}} .wpbits-afe-hotspot-heading',                
			]
        );  

        $this->add_control(
			'heding_color',
			[
				'label' => esc_html__( 'Heading Font Color', 'wpbits-addons-for-elementor' ),
				'type' => Controls_Manager::COLOR, 
				'selectors' => [
					'{{WRAPPER}} .wpbits-afe-hotspots' => '--spot-heading-color: {{VALUE}};'
				]
			]
        );        
                
     
		$this->end_controls_section();

		$this->start_controls_section(
			'line',
			[
				'label' => esc_html__( 'Spot', 'wpbits-addons-for-elementor' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

        $this->add_control(
			'line_color',
			[
				'label' => esc_html__( 'Global Spot Line Color', 'wpbits-addons-for-elementor' ),
				'type' => Controls_Manager::COLOR, 
				'selectors' => [
					'{{WRAPPER}} .wpbits-afe-hotspots' => '--spot-line-color: {{VALUE}};'
				]
			]
		);
        
        $this->add_control(
			'spot_line_width',
			[
				'label' => esc_html__( 'Spot Line Width', 'wpbits-addons-for-elementor' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'min' => 1,
				'max' => 100,
				'step' => 1,
				'default' => 2,
				'selectors' => [
					'{{WRAPPER}} .wpbits-afe-hotspots' => '--spot-line-width: {{VALUE}}px;'
                ],
                'separator' => 'after',				
			]
        );	
        
        $this->add_control(
			'spot_color',
			[
				'label' => esc_html__( 'Spot Background Color', 'wpbits-addons-for-elementor' ),
				'type' => Controls_Manager::COLOR, 
				'selectors' => [
					'{{WRAPPER}} .wpbits-afe-hotspots' => '--spot-bg-color: {{VALUE}};'
				]
			]
        );
                
        $this->add_control(
			'spot_width',
			[
				'label' => esc_html__( 'Spot Width', 'wpbits-addons-for-elementor' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'min' => 1,
				'max' => 400,
				'step' => 1,
				'default' => 24,
				'selectors' => [
					'{{WRAPPER}} .wpbits-afe-hotspots' => '--spot-width: {{VALUE}}px;'
				]				
			]
		);		

        $this->add_control(
			'spot_height',
			[
				'label' => esc_html__( 'Spot Height', 'wpbits-addons-for-elementor' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'min' => 1,
				'max' => 400,
				'step' => 1,
				'default' => 24,
				'selectors' => [
					'{{WRAPPER}} .wpbits-afe-hotspots' => '--spot-height: {{VALUE}}px;'
				]				
			]
		);		
                 
        $this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'spot_border',
				'label' => esc_html__( 'Border', 'wpbits-addons-for-elementor' ),
                'selector' => '{{WRAPPER}} .spot:before',
                'separator' => 'before',
			]
		);
        
        $this->add_responsive_control(
			'image_border_radius',
			[
				'label' => esc_html__( 'Border Radius', 'wpbits-addons-for-elementor' ),
				'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'rem' ],
				'selectors' => [
					'{{WRAPPER}} .spot:before' => 'border-top-left-radius: {{TOP}}{{UNIT}};border-top-right-radius: {{RIGHT}}{{UNIT}};border-bottom-right-radius: {{BOTTOM}}{{UNIT}};border-bottom-left-radius: {{LEFT}}{{UNIT}};'
				]
			]
        );
                
        $this->end_controls_section();
		    
	}
    
    protected function render() {
		$settings = $this->get_settings_for_display();
        
		?>

				<div class="wpbits-afe-hotspots">
					
						<?php 
                        if ( $settings['spots'] ) {
                            foreach ( $settings['spots'] as $item ){
                            
                                printf('
                                    <div class="spot %3$s">
                                        <div class="spot-content-wrapper">
                                            <div class="spot-content">
                                                %1$s
                                                %2$s
                                            </div>
                                        </div>
                                    </div> 			
                                ',								
                                    ! empty( $item["title"] ) ? sprintf('<%1$s class="wpbits-afe-hotspot-heading">%2$s</%1$s>',Utils::validate_html_tag($settings["html_tag"]),esc_html($item["title"])) : "",
                                    ! empty( $item["content"] ) ? sprintf('<div class="wpbits-afe-hotspot-content">%1$s</div>',$this->parse_text_editor($item["content"])) : "",
                                    'elementor-repeater-item-'.$item["_id"]
                                );

                            }
                        }
                        
                        printf('<figure class="wpbits-afe-hotspot-image">%1$s</figure>', Group_Control_Image_Size::get_attachment_image_html( $settings ) );
						?> 
					

				</div>
        <?php
	}
}
Plugin::instance()->widgets_manager->register_widget_type( new Widget_WPBITS_AFE_Hotspot() );