<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; 

class Widget_WPBITS_AFE_Piechart extends Widget_Base {

	public function get_name() {
		return 'wpb-piechart';
	}

	public function get_title() {
		return "[WPBits] " . esc_html__( 'Pie Chart', 'wpbits-addons-for-elementor' );
	}

	public function get_categories() {
		return [ 'wpbits-elementor-addons' ];
	}

    public function get_script_depends() {
		return [ 'wpb-piechart' ];
	}

	public function get_icon() {
		return 'eicon-counter-circle';
	}
    
	protected function register_controls() {

		// section start
  		$this->start_controls_section(
  			'piechart_content',
  			[
  				'label' => esc_html__( 'Pie Chart', 'wpbits-addons-for-elementor' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT
  			]
  		);
        
        $this->add_control(
			'percent',
			[
				'label' => esc_html__( 'Percent', 'wpbits-addons-for-elementor' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'min' => 0,
				'max' => 1,
				'step' => 0.01,
				'default' => 0.6,
			]
		);
        
        $this->add_control(
			'percent_switcher',
			[
				'label' => esc_html__( 'Display Percent Sign', 'wpbits-addons-for-elementor' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Yes', 'wpbits-addons-for-elementor' ),
				'label_off' => esc_html__( 'No', 'wpbits-addons-for-elementor' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);
        
        $this->add_control(
			'piechart_content_hr_1',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		);
        
        $this->add_control(
			'title', [
				'label' => esc_html__( 'Title', 'wpbits-addons-for-elementor' ),
				'type' => \Elementor\Controls_Manager::TEXT,
                'label_block' => true,
                'dynamic' => [
					'active' => true,
				],
			]
		);
        
        $this->add_control(
			'title_v_align',
			[
				'label' => esc_html__( 'Title Position', 'wpbits-addons-for-elementor' ),
				'type' => Controls_Manager::CHOOSE,
				'options' => [
					'column-reverse' => [
						'title' => esc_html__( 'Top', 'wpbits-addons-for-elementor' ),
						'icon' => 'eicon-v-align-top',
					],
					'column' => [
						'title' => esc_html__( 'Bottom', 'wpbits-addons-for-elementor' ),
						'icon' => 'eicon-v-align-bottom',
					],
				],
				'default' => 'column',
				'selectors' => [
					'{{WRAPPER}} .wpb-piechart-text' => 'flex-direction: {{VALUE}};',
				],
                'toggle' => false
			]
		);
        
        $this->add_control(
			'piechart_content_hr_2',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		);
        
        $this->add_responsive_control(
			'piechart_width',
			[
				'label' => esc_html__( 'Chart Size (px)', 'wpbits-addons-for-elementor' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range' => [
                    'px' => [
						'min' => 0,
						'max' => 500,
					],
				],
                'default' => [
					'unit' => 'px',
					'size' => 300,
				],
				'selectors' => [
                    '{{WRAPPER}} .wpb-piechart' => 'max-width: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .wpb-piechart canvas' => 'max-height: {{SIZE}}{{UNIT}}; max-width: {{SIZE}}{{UNIT}};'
				],
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
                'description' => esc_html__( 'Activate animation when the pie chart scrolls into view.', 'wpbits-addons-for-elementor' ),
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
			'section_piechart_style',
			[
				'label' => esc_html__( 'Pie Chart', 'wpbits-addons-for-elementor' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
        
        $this->add_control(
			'piechart_bg_color',
			[
				'label' => esc_html__( 'Background Color', 'wpbits-addons-for-elementor' ),
				'type' => Controls_Manager::COLOR,
                'selectors' => [
					'{{WRAPPER}} .wpb-piechart' => 'background-color: {{VALUE}};'
				]
			]
		);
        
        $this->add_control(
			'piechart_hr_1',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		); 
        
        $this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'piechart_border',
				'label' => esc_html__( 'Border', 'wpbits-addons-for-elementor' ),
				'selector' => '{{WRAPPER}} .wpb-piechart'
			]
		);
        
        $this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'piechart_border_shadow',
				'label' => esc_html__( 'Box Shadow', 'wpbits-addons-for-elementor' ),
				'selector' => '{{WRAPPER}} .wpb-piechart'
			]
		);
        
        $this->add_control(
			'piechart_hr_2',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		); 

		$this->add_responsive_control(
			'piechart_h_align',
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
					'{{WRAPPER}} .wpb-piechart-wrapper' => 'justify-content: {{VALUE}};',
				],
                'toggle' => false
			]
		);
        
        $this->add_responsive_control(
			'piechart_pad',
			[
				'label' => esc_html__( 'Padding (px)', 'wpbits-addons-for-elementor' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'min' => 0,
				'max' => 500,
				'step' => 1,
                'default' => 0,
                'selectors' => [
					'{{WRAPPER}} .wpb-piechart' => 'padding: {{VALUE}}px;',
				],
			]
		);
    
        $this->end_controls_section();
        
        // section start
		$this->start_controls_section(
			'section_bar_style',
			[
				'label' => esc_html__( 'Bar', 'wpbits-addons-for-elementor' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
        
        $this->add_control(
			'thickness',
			[
				'label' => esc_html__( 'Thickness Ratio', 'wpbits-addons-for-elementor' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ '%'],
                'range' => [
					'%' => [
						'min' => 2,
						'max' => 100,
					],
				],
                'default' => [
					'unit' => '%',
					'size' => 15,
				]
			]
		);
        
        $this->add_control(
			'bar_color',
			[
				'label' => esc_html__( 'Color', 'wpbits-addons-for-elementor' ),
				'type' => Controls_Manager::COLOR,
                'default' => '#2ecc71'
			]
		);
        
        $this->add_control(
			'empty_bar_color',
			[
				'label' => esc_html__( 'Background Color', 'wpbits-addons-for-elementor' ),
				'type' => Controls_Manager::COLOR,
                'default' => 'rgba(0,0,0,0.1)'
			]
		);
        
        $this->end_controls_section();
        
        // section start
		$this->start_controls_section(
			'section_text_style',
			[
				'label' => esc_html__( 'Text', 'wpbits-addons-for-elementor' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
        
        $this->add_control(
			'text_heading',
			[
				'label' => esc_html__( 'Percent', 'wpbits-addons-for-elementor' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'none',
			]
		);
        
        $this->add_control(
			'percent_color',
			[
				'label' => esc_html__( 'Color', 'wpbits-addons-for-elementor' ),
				'type' => Controls_Manager::COLOR,
                'selectors' => [
					'{{WRAPPER}} .wpb-piechart-percent' => 'color: {{VALUE}};'
				]
			]
		);
        
        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'percent_typography',
				'selector' => '{{WRAPPER}} .wpb-piechart-percent'
			]
		);
        
        $this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'percent_text_shadow',
				'label' => esc_html__( 'Text Shadow', 'wpbits-addons-for-elementor' ),
				'selector' => '{{WRAPPER}} .wpb-piechart-percent',
			]
		);
        
        $this->add_control(
			'text_heading_2',
			[
				'label' => esc_html__( 'Percent Sign', 'wpbits-addons-for-elementor' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
        
        $this->add_control(
			'percent_sign_color',
			[
				'label' => esc_html__( 'Color', 'wpbits-addons-for-elementor' ),
				'type' => Controls_Manager::COLOR,
                'selectors' => [
					'{{WRAPPER}} .wpb-piechart-percent span' => 'color: {{VALUE}};'
				]
			]
		);
        
        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'percent_sign_typography',
				'selector' => '{{WRAPPER}} .wpb-piechart-percent span'
			]
		);
        
        $this->add_control(
			'percent_sign_valign',
			[
				'label' => esc_html__( 'Vertical Align', 'wpbits-addons-for-elementor' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'super',
				'options' => [
					'top' => esc_html__( 'Top', 'wpbits-addons-for-elementor' ),
                    'text-top' => esc_html__( 'Text Top', 'wpbits-addons-for-elementor' ),
                    'middle'  => esc_html__( 'Middle', 'wpbits-addons-for-elementor' ),
					'bottom' => esc_html__( 'Bottom', 'wpbits-addons-for-elementor' ),
                    'text-bottom' => esc_html__( 'Text Bottom', 'wpbits-addons-for-elementor' ),
                    'super'  => esc_html__( 'Super', 'wpbits-addons-for-elementor' ),
                    'sub'  => esc_html__( 'Sub', 'wpbits-addons-for-elementor' ),
                    'baseline'  => esc_html__( 'Baseline', 'wpbits-addons-for-elementor' ),
				],
                'selectors' => [
					'{{WRAPPER}} .wpb-piechart-percent span' => 'vertical-align: {{VALUE}};'
				]
			]
		);
        
        $this->add_control(
			'text_heading_3',
			[
				'label' => esc_html__( 'Title', 'wpbits-addons-for-elementor' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
        
        $this->add_control(
			'title_color',
			[
				'label' => esc_html__( 'Color', 'wpbits-addons-for-elementor' ),
				'type' => Controls_Manager::COLOR,
                'selectors' => [
					'{{WRAPPER}} .wpb-piechart-title' => 'color: {{VALUE}};'
				]
			]
		);
        
        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'title_typography',
				'selector' => '{{WRAPPER}} .wpb-piechart-title'
			]
		);
        
        $this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'title_text_shadow',
				'label' => esc_html__( 'Text Shadow', 'wpbits-addons-for-elementor' ),
				'selector' => '{{WRAPPER}} .wpb-piechart-title',
			]
		);
    
        $this->end_controls_section();
  
	}

	/**
	 * Render 
	 */
	protected function render( ) {
		$settings = $this->get_settings_for_display();
        ?>
        <div id="wpb-piechart-<?php echo esc_attr($this->get_id()); ?>" class="wpb-piechart-wrapper">
            <div class="wpb-piechart" data-value="<?php echo esc_attr($settings['percent']); ?>" data-size="<?php echo esc_attr($settings['piechart_width']['size']); ?>" data-pad="<?php echo esc_attr($settings['piechart_pad']); ?>" data-thickness="<?php echo esc_attr($settings['thickness']['size']); ?>" data-fillcolor="<?php echo esc_attr($settings['bar_color']); ?>" data-emptyfill="<?php echo esc_attr($settings['empty_bar_color']); ?>" data-animduration="<?php echo esc_attr($settings['anim_duration']); ?>" <?php if ($settings['percent_switcher']) { ?>data-dpercent<?php } ?> <?php if ($settings['scroll_anim_switcher']) { ?>data-scrollanim<?php } ?>>
                <div class="wpb-piechart-text">
                    <div class="wpb-piechart-percent">0<span>%</span></div>
                    <div class="wpb-piechart-title"><?php echo esc_html($settings['title']); ?></div>
                </div>
				<canvas class="wpb-placeholder-piechart" width="<?php echo esc_attr($settings['piechart_width']['size']) * 2; ?>" height="<?php echo esc_attr($settings['piechart_width']['size']) * 2; ?>" style="height:<?php echo esc_attr($settings['piechart_width']['size']); ?>px;width:<?php echo esc_attr($settings['piechart_width']['size']); ?>px;"></canvas>
            </div>
		</div>
	<?php
    } 

}
Plugin::instance()->widgets_manager->register_widget_type( new Widget_WPBITS_AFE_Piechart() );