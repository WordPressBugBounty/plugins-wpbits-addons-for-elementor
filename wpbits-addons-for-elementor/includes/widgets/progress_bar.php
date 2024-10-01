<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; 

class Widget_WPBITS_AFE_Progress_Bar extends Widget_Base {

	public function get_name() {
		return 'wpb-progress_bar';
	}

	public function get_title() {
		return "[WPBits] " . esc_html__( 'Progress Bar', 'wpbits-addons-for-elementor' );
	}

	public function get_categories() {
		return [ 'wpbits-elementor-addons' ];
	}

    public function get_script_depends() {
		return [ 'wpb-progress_bar' ];
	}

	public function get_icon() {
		return 'eicon-skill-bar';
	}
    
	protected function register_controls() {

		// section start
  		$this->start_controls_section(
  			'progress_bar_content',
  			[
  				'label' => esc_html__( 'Progress Bar', 'wpbits-addons-for-elementor' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT
  			]
  		);
        
        $this->add_control(
			'title', [
				'label' => esc_html__( 'Title', 'wpbits-addons-for-elementor' ),
				'type' => \Elementor\Controls_Manager::TEXT,
                'label_block' => true,
                'default' => esc_html__( 'WordPress', 'wpbits-addons-for-elementor' ),
                'dynamic' => [
					'active' => true,
				],
			]
		);
        
        $this->add_control(
			'percent',
			[
				'label' => esc_html__( 'Percent', 'wpbits-addons-for-elementor' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ '%'],
                'range' => [
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
                'default' => [
					'unit' => '%',
					'size' => 60,
				],
                'dynamic' => [
					'active' => true,
				],
			]
		);

		$this->add_control(
			'percent_select',
			[
				'label' => esc_html__( 'Display Percent', 'wpbits-addons-for-elementor' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'in',
				'options' => [
					''  => esc_html__( 'No', 'wpbits-addons-for-elementor' ),
					'in'  => esc_html__( 'Display in the bar', 'wpbits-addons-for-elementor' ),
                    'out'  => esc_html__( 'Display out of the bar', 'wpbits-addons-for-elementor' )
				],
			]
		);
        
        $this->add_control(
			'stripes',
			[
				'label' => esc_html__( 'Animated Stripes', 'wpbits-addons-for-elementor' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Yes', 'wpbits-addons-for-elementor' ),
				'label_off' => esc_html__( 'No', 'wpbits-addons-for-elementor' ),
				'return_value' => 'yes',
				'default' => '',
			]
		);
        
        $this->add_control(
			'progress_bar_content_hr_1',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
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
			'section_progress_bar_style',
			[
				'label' => esc_html__( 'Progress Bar', 'wpbits-addons-for-elementor' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'progress_bar_overflow',
			[
				'label' => esc_html__( 'Overflow', 'wpbits-addons-for-elementor' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Hidden', 'wpbits-addons-for-elementor' ),
				'label_off' => esc_html__( 'Auto', 'wpbits-addons-for-elementor' ),
				'return_value' => 'yes',
				'default' => '',
			]
		);
        
        $this->add_control(
			'progress_bar_bg_color',
			[
				'label' => esc_html__( 'Background Color', 'wpbits-addons-for-elementor' ),
				'type' => Controls_Manager::COLOR,
                'default' => 'rgba(0,0,0,0.1)',
                'selectors' => [
					'{{WRAPPER}} .wpb-progress-bar-wrapper' => 'background-color: {{VALUE}};'
				]
			]
		);
        
        $this->add_control(
			'progress_bar_hr_1',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		); 
        
        $this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'progress_bar_border',
				'label' => esc_html__( 'Border', 'wpbits-addons-for-elementor' ),
				'selector' => '{{WRAPPER}} .wpb-progress-bar-wrapper'
			]
		);
        
        $this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'progress_bar_border_shadow',
				'label' => esc_html__( 'Box Shadow', 'wpbits-addons-for-elementor' ),
				'selector' => '{{WRAPPER}} .wpb-progress-bar-wrapper'
			]
		);
        
        $this->add_control(
			'progress_bar_border_radius',
			[
				'label' => esc_html__( 'Border Radius', 'wpbits-addons-for-elementor' ),
				'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'rem' ],
				'selectors' => [
					'{{WRAPPER}} .wpb-progress-bar-wrapper' => 'border-top-left-radius: {{TOP}}{{UNIT}};border-top-right-radius: {{RIGHT}}{{UNIT}};border-bottom-right-radius: {{BOTTOM}}{{UNIT}};border-bottom-left-radius: {{LEFT}}{{UNIT}};'
				]
			]
		);
        
        $this->add_control(
			'progress_bar_hr_2',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		); 
        
        $this->add_responsive_control(
			'progress_bar_padding',
			[
				'label' => esc_html__( 'Padding', 'wpbits-addons-for-elementor' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'rem' ],
				'selectors' => [
                    '{{WRAPPER}} .wpb-progress-bar-wrapper' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
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
			'bar_bg_color',
			[
				'label' => esc_html__( 'Background Color', 'wpbits-addons-for-elementor' ),
				'type' => Controls_Manager::COLOR,
                'default' => '#3498db',
                'selectors' => [
					'{{WRAPPER}} .wpb-progress-bar-overlay' => 'background-color: {{VALUE}};'
				]
			]
		);
        
        $this->add_control(
			'bar_height',
			[
				'label' => esc_html__( 'Height', 'wpbits-addons-for-elementor' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px'],
                'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
					],
				],
                'selectors' => [
					'{{WRAPPER}} .wpb-progress-bar' => 'height: {{SIZE}}{{UNIT}};'
				]
			]
		);

		$this->add_responsive_control(
			'bar_valign',
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
				'selectors' => [
					'{{WRAPPER}} .wpb-progress-bar' => 'align-items: {{VALUE}};',
				],
                'toggle' => false
			]
		);
        
        $this->add_control(
			'bar_hr_1',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		); 
        
        $this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'bar_border',
				'label' => esc_html__( 'Border', 'wpbits-addons-for-elementor' ),
				'selector' => '{{WRAPPER}} .wpb-progress-bar-overlay'
			]
		);
        
        $this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'bar_border_shadow',
				'label' => esc_html__( 'Box Shadow', 'wpbits-addons-for-elementor' ),
				'selector' => '{{WRAPPER}} .wpb-progress-bar-overlay'
			]
		);
        
         $this->add_control(
			'bar_border_radius',
			[
				'label' => esc_html__( 'Border Radius', 'wpbits-addons-for-elementor' ),
				'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'rem' ],
				'selectors' => [
					'{{WRAPPER}} .wpb-progress-bar-overlay' => 'border-top-left-radius: {{TOP}}{{UNIT}};border-top-right-radius: {{RIGHT}}{{UNIT}};border-bottom-right-radius: {{BOTTOM}}{{UNIT}};border-bottom-left-radius: {{LEFT}}{{UNIT}};'
				]
			]
		);
        
        $this->add_control(
			'bar_hr_2',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		); 
        
        $this->add_responsive_control(
			'bar_padding',
			[
				'label' => esc_html__( 'Padding', 'wpbits-addons-for-elementor' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'rem' ],
				'selectors' => [
                    '{{WRAPPER}} .wpb-progress-bar' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
				],
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
			'text_heading_3',
			[
				'label' => esc_html__( 'Title', 'wpbits-addons-for-elementor' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'none',
			]
		);
        
        $this->add_control(
			'title_color',
			[
				'label' => esc_html__( 'Color', 'wpbits-addons-for-elementor' ),
				'type' => Controls_Manager::COLOR,
                'selectors' => [
					'{{WRAPPER}} .wpb-progress-bar-title' => 'color: {{VALUE}};'
				]
			]
		);
        
        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'title_typography',
				'scheme' => Core\Schemes\Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .wpb-progress-bar-title'
			]
		);
        
        $this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'title_text_shadow',
				'label' => esc_html__( 'Text Shadow', 'wpbits-addons-for-elementor' ),
				'selector' => '{{WRAPPER}} .wpb-progress-bar-title',
			]
		);
        
        $this->add_control(
			'text_heading',
			[
				'label' => esc_html__( 'Percent', 'wpbits-addons-for-elementor' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
        
        $this->add_control(
			'percent_color',
			[
				'label' => esc_html__( 'Color', 'wpbits-addons-for-elementor' ),
				'type' => Controls_Manager::COLOR,
                'selectors' => [
					'{{WRAPPER}} .wpb-progress-bar-percent' => 'color: {{VALUE}};',
					'{{WRAPPER}} .wpb-progress-bar-percent-out' => 'color: {{VALUE}};'
				]
			]
		);

		$this->add_control(
			'percent_bg_color',
			[
				'label' => esc_html__( 'Background Color', 'wpbits-addons-for-elementor' ),
				'type' => Controls_Manager::COLOR,
                'selectors' => [
					'{{WRAPPER}} .wpb-progress-bar-percent' => 'background-color: {{VALUE}};',
					'{{WRAPPER}} .wpb-progress-bar-percent:after' => 'border-top-color: {{VALUE}};',
					'{{WRAPPER}} .wpb-progress-bar-percent-out' => 'background-color: {{VALUE}};',
					'{{WRAPPER}} .wpb-progress-bar-percent-out:after' => 'border-top-color: {{VALUE}};'
				]
			]
		);
        
        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'percent_typography',
				'scheme' => Core\Schemes\Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .wpb-progress-bar-percent,{{WRAPPER}} .wpb-progress-bar-percent-out'
			]
		);
        
        $this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'percent_text_shadow',
				'label' => esc_html__( 'Text Shadow', 'wpbits-addons-for-elementor' ),
				'selector' => '{{WRAPPER}} .wpb-progress-bar-percent,{{WRAPPER}} .wpb-progress-bar-percent-out',
			]
		);

		$this->add_responsive_control(
			'percent_horizontal_align',
			[
				'label' => esc_html__( 'Horizontal Align', 'wpbits-addons-for-elementor' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'min' => -100,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .wpb-progress-bar-percent' => ' transform:translateX({{SIZE}}%);',
					'{{WRAPPER}} .wpb-progress-bar-percent-out' => ' transform:translateX({{SIZE}}%);'
				],
			]
		);

		$this->add_control(
			'percent_border_radius',
			[
				'label' => esc_html__( 'Border Radius', 'wpbits-addons-for-elementor' ),
				'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'rem' ],
				'selectors' => [
					'{{WRAPPER}} .wpb-progress-bar-percent' => 'border-top-left-radius: {{TOP}}{{UNIT}};border-top-right-radius: {{RIGHT}}{{UNIT}};border-bottom-right-radius: {{BOTTOM}}{{UNIT}};border-bottom-left-radius: {{LEFT}}{{UNIT}};',
					'{{WRAPPER}} .wpb-progress-bar-percent-out' => 'border-top-left-radius: {{TOP}}{{UNIT}};border-top-right-radius: {{RIGHT}}{{UNIT}};border-bottom-right-radius: {{BOTTOM}}{{UNIT}};border-bottom-left-radius: {{LEFT}}{{UNIT}};'
				]
			]
		);
        
        $this->add_responsive_control(
			'percent_padding',
			[
				'label' => esc_html__( 'Padding', 'wpbits-addons-for-elementor' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'rem' ],
				'selectors' => [
					'{{WRAPPER}} .wpb-progress-bar-percent' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					'{{WRAPPER}} .wpb-progress-bar-percent-out' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
				],
			]
		);

		$this->add_responsive_control(
			'percent_margin',
			[
				'label' => esc_html__( 'Margin', 'wpbits-addons-for-elementor' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'rem' ],
				'selectors' => [
					'{{WRAPPER}} .wpb-progress-bar-percent' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					'{{WRAPPER}} .wpb-progress-bar-percent-out' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
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
        ?>
		<div id="wpb-progress-bar-<?php echo esc_attr($this->get_id()); ?>" class="wpb-progress-bar-wrapper" <?php if ($settings['progress_bar_overflow']) { ?>style="overflow:hidden;"<?php } ?>>
			<div class="wpb-progress-bar-overlay"></div>
            <div class="wpb-progress-bar <?php if ($settings['stripes']) { echo 'stripes'; } ?>" style="width:<?php echo esc_attr($settings['percent']['size']); ?>%;" data-prct="<?php echo esc_attr($settings['percent']['size']); ?>%" data-animduration="<?php echo esc_attr($settings['anim_duration']); ?>" <?php if ($settings['scroll_anim_switcher']) { ?>data-scrollanim<?php } ?>>
                <div class="wpb-progress-bar-title"><?php echo esc_html($settings['title']); ?></div>
                <?php if ($settings['percent_select'] == 'in') { ?>
                <div class="wpb-progress-bar-percent"><?php echo esc_html($settings['percent']['size']); ?>%</div>
                <?php } ?>
			</div>
			<?php if ($settings['percent_select'] == 'out') { ?>
                <div class="wpb-progress-bar-percent-out"><?php echo esc_html($settings['percent']['size']); ?>%</div>
            <?php } ?>
        </div>
	<?php
    } 

}
Plugin::instance()->widgets_manager->register_widget_type( new Widget_WPBITS_AFE_Progress_Bar() );