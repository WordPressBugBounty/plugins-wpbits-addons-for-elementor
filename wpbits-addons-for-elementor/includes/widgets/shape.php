<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; 

class Widget_WPBITS_AFE_Shape extends Widget_Base {

	public function get_name() {
		return 'wpb-shape';
	}

	public function get_title() {
		return "[WPBits] " . esc_html__( 'Shape', 'wpbits-addons-for-elementor' );
	}

	public function get_categories() {
		return [ 'wpbits-elementor-addons' ];
	}

	public function get_icon() {
		return 'eicon-circle-o';
	}
	
	protected function register_controls() {

		// section start
  		$this->start_controls_section(
  			'section_shape',
  			[
  				'label' => esc_html__( 'Shape', 'wpbits-addons-for-elementor' )
  			]
  		);   

		$this->add_control(
			'shape_value_1',
			[
				'label' => esc_html__( 'Point 1', 'wpbits-addons-for-elementor' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ '%' ],
				'range' => [
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
                'default' => [
					'unit' => '%',
					'size' => 30,
				],
			]
		);
        
        $this->add_control(
			'shape_value_2',
			[
				'label' => esc_html__( 'Point 2', 'wpbits-addons-for-elementor' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ '%' ],
				'range' => [
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
                'default' => [
					'unit' => '%',
					'size' => 70,
				],
			]
		);
        
        $this->add_control(
			'shape_value_3',
			[
				'label' => esc_html__( 'Point 3', 'wpbits-addons-for-elementor' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ '%' ],
				'range' => [
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
                'default' => [
					'unit' => '%',
					'size' => 70,
				],
			]
		);
        
        $this->add_control(
			'shape_value_4',
			[
				'label' => esc_html__( 'Point 4', 'wpbits-addons-for-elementor' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ '%' ],
				'range' => [
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
                'default' => [
					'unit' => '%',
					'size' => 30,
				],
			]
		);
        
        $this->add_control(
			'shape_value_5',
			[
				'label' => esc_html__( 'Point 5', 'wpbits-addons-for-elementor' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ '%' ],
				'range' => [
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
                'default' => [
					'unit' => '%',
					'size' => 30,
				],
			]
		);
        
        $this->add_control(
			'shape_value_6',
			[
				'label' => esc_html__( 'Point 6', 'wpbits-addons-for-elementor' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ '%' ],
				'range' => [
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
                'default' => [
					'unit' => '%',
					'size' => 30,
				],
			]
		);
        
        $this->add_control(
			'shape_value_7',
			[
				'label' => esc_html__( 'Point 7', 'wpbits-addons-for-elementor' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ '%' ],
				'range' => [
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
                'default' => [
					'unit' => '%',
					'size' => 70,
				],
			]
		);
        
        $this->add_control(
			'shape_value_8',
			[
				'label' => esc_html__( 'Point 8', 'wpbits-addons-for-elementor' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ '%' ],
				'range' => [
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
                'default' => [
					'unit' => '%',
					'size' => 70,
				],
			]
		);
        
        $this->add_responsive_control(
			'rotate',
			[
				'label' => esc_html__( 'Rotate', 'wpbits-addons-for-elementor' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'deg' ],
				'range' => [
					'%' => [
						'min' => 0,
						'max' => 360,
					],
				],
                'default' => [
					'unit' => 'deg',
					'size' => 0,
				],
                'selectors' => [
					'{{WRAPPER}} .wpb-custom-shape' => 'transform:rotate({{SIZE}}{{UNIT}});'
				],
			]
		);

		$this->end_controls_section();
        
        $this->start_controls_section(
  			'section_shape_icon',
  			[
  				'label' => esc_html__( 'Icon', 'wpbits-addons-for-elementor' )
  			]
  		);
        
        $this->add_control(
			'icon',
			[
				'label' => esc_html__( 'Icon', 'wpbits-addons-for-elementor' ),
				'type' => \Elementor\Controls_Manager::ICONS,
				'default' => [
					'value' => 'fas long-arrow-alt-down',
					'library' => 'solid',
				],
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
			]
		);
        
        $this->add_control(
			'shape_animation',
			[
				'label' => esc_html__( 'Hover Animation', 'wpbits-addons-for-elementor' ),
				'type' => \Elementor\Controls_Manager::HOVER_ANIMATION
			]
		);
        
        $this->end_controls_section();
        
        // section start
		$this->start_controls_section(
			'section_shape_style',
			[
				'label' => esc_html__( 'Shape', 'wpbits-addons-for-elementor' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
        
        $this->add_responsive_control(
			'shape_width',
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
						'max' => 2000,
					],
				],
                'default' => [
					'unit' => 'px',
					'size' => 300,
				],
				'selectors' => [
					'{{WRAPPER}} .wpb-custom-shape' => 'width: {{SIZE}}{{UNIT}};'
				],
			]
		);
        
        $this->add_responsive_control(
			'shape_height',
			[
				'label' => esc_html__( 'Height', 'wpbits-addons-for-elementor' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%', 'rem' ],
				'range' => [
					'%' => [
						'min' => 0,
						'max' => 100,
					],
                    'px' => [
						'min' => 0,
						'max' => 2000,
					],
				],
                'default' => [
					'unit' => 'px',
					'size' => 300,
				],
				'selectors' => [
					'{{WRAPPER}} .wpb-custom-shape' => 'height: {{SIZE}}{{UNIT}};'
				],
			]
		);
        
        $this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name' => 'background',
				'label' => esc_html__( 'Background', 'wpbits-addons-for-elementor' ),
				'types' => [ 'classic', 'gradient' ],
				'selector' => '{{WRAPPER}} .wpb-custom-shape',
			]
		);
        
        $this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'border',
				'label' => esc_html__( 'Border', 'wpbits-addons-for-elementor' ),
				'selector' => '{{WRAPPER}} .wpb-custom-shape'
			]
		);
        
        $this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'box_shadow',
				'label' => esc_html__( 'Box Shadow', 'wpbits-addons-for-elementor' ),
				'selector' => '{{WRAPPER}} .wpb-custom-shape'
			]
		);
        
        $this->add_responsive_control(
			'shave_align',
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
				'selectors' => [
					'{{WRAPPER}} .wpb-custom-shape-wrapper' => 'align-items: {{VALUE}};',
				],
                'toggle' => false
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
				'label' => esc_html__( 'Icon Color', 'wpbits-addons-for-elementor' ),
				'type' => Controls_Manager::COLOR, 
                'default' => '#000000',
				'selectors' => [
					'{{WRAPPER}} .wpb-custom-shape i' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .wpb-custom-shape-link i' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .wpb-custom-shape svg' => 'fill: {{VALUE}};',
                    '{{WRAPPER}} .wpb-custom-shape-link svg' => 'fill: {{VALUE}};',
				]
			]
		);
        
        $this->add_responsive_control(
			'icon_size',
			[
				'label' => esc_html__( 'Icon Size', 'wpbits-addons-for-elementor' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', 'rem' ],
				'range' => [
					'rem' => [
						'min' => 0,
						'max' => 50,
					],
                    'px' => [
						'min' => 0,
						'max' => 500,
					],
				],
                'default' => [
					'unit' => 'px',
					'size' => 20,
				],
				'selectors' => [
					'{{WRAPPER}} .wpb-custom-shape i' => 'font-size: {{SIZE}}{{UNIT}};'
				],
			]
		);

		$this->add_responsive_control(
			'icon_width',
			[
				'label' => esc_html__( 'SVG Width', 'wpbits-addons-for-elementor' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'min' => 0,
				'max' => 1000,
				'step' => 5,
                'selectors' => [
					'{{WRAPPER}} .wpb-custom-shape svg' => 'width: {{VALUE}}px;'
				],
			]
		);
        
        $this->add_responsive_control(
			'icon_height',
			[
				'label' => esc_html__( 'SVG Height', 'wpbits-addons-for-elementor' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'min' => 0,
				'max' => 1000,
				'step' => 5,
                'selectors' => [
					'{{WRAPPER}} .wpb-custom-shape svg' => 'height: {{VALUE}}px;'
				],
			]
		);

		$this->add_responsive_control(
			'icon_rotate',
			[
				'label' => esc_html__( 'Rotate', 'wpbits-addons-for-elementor' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'deg' ],
				'range' => [
					'%' => [
						'min' => 0,
						'max' => 360,
					],
				],
                'default' => [
					'unit' => 'deg',
					'size' => 0,
				],
                'selectors' => [
					'{{WRAPPER}} .wpb-custom-shape i' => 'transform:rotate({{SIZE}}{{UNIT}});',
					'{{WRAPPER}} .wpb-custom-shape svg' => 'transform:rotate({{SIZE}}{{UNIT}});'
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
        $target = $settings['website_link']['is_external'] ? ' target="_blank"' : '';
        $nofollow = $settings['website_link']['nofollow'] ? ' rel="nofollow"' : '';
        ?>
		<div class="wpb-custom-shape-wrapper elementor-animation-<?php echo esc_attr($settings['shape_animation']); ?>">
        <div class="wpb-custom-shape" style="border-radius:<?php echo esc_attr($settings['shape_value_1']['size']); ?>% <?php echo esc_attr($settings['shape_value_2']['size']); ?>% <?php echo esc_attr($settings['shape_value_3']['size']); ?>% <?php echo esc_attr($settings['shape_value_4']['size']); ?>% / <?php echo esc_attr($settings['shape_value_5']['size']); ?>% <?php echo esc_attr($settings['shape_value_6']['size']); ?>% <?php echo esc_attr($settings['shape_value_7']['size']); ?>% <?php echo esc_attr($settings['shape_value_8']['size']); ?>% "><?php \Elementor\Icons_Manager::render_icon( $settings['icon'], [ 'aria-hidden' => 'true' ] ); ?>
		<?php if ($settings['website_link']['url']) { echo '<a class="wpb-custom-shape-link" href="' . $settings['website_link']['url'] . '"' . $target . $nofollow . '></a>'; } ?>
		</div>
        </div>
        <?php

	} 

	/**
	 * Content Template 
	 */
	protected function _content_template() {	
        ?>
        <# var iconHTML = elementor.helpers.renderIcon( view, settings.icon, { 'aria-hidden': true }, 'i' , 'object' ); #>
        <div class="wpb-custom-shape-wrapper elementor-animation-{{ settings.shape_animation }}">   
        <div class="wpb-custom-shape" style="border-radius:{{ settings.shape_value_1.size }}% {{ settings.shape_value_2.size }}% {{ settings.shape_value_3.size }}% {{ settings.shape_value_4.size }}% / {{ settings.shape_value_5.size }}% {{ settings.shape_value_6.size }}% {{ settings.shape_value_7.size }}% {{ settings.shape_value_8.size }}% ">{{{ iconHTML.value }}}<a href="#" class="wpb-custom-shape-link"></a></div>
		</div>    
	<?php }
}


Plugin::instance()->widgets_manager->register_widget_type( new Widget_WPBITS_AFE_Shape() );