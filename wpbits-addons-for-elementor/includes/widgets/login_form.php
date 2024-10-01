<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit;

class Widget_WPBITS_AFE_Login_Form extends Widget_Base {

	public function get_name() {
		return 'wpb-login_form';
	}

	public function get_title() {
		return "[WPBits] " . esc_html__( 'Login Form', 'wpbits-addons-for-elementor' );
	}

	public function get_categories() {
		return [ 'wpbits-elementor-addons' ];
	}

    public function get_icon() {
		return 'eicon-lock-user';
	}
    
	protected function register_controls() {
        // section start
		$this->start_controls_section(
			'form_labels',
			[
				'label' => esc_html__( 'Login Form', 'wpbits-addons-for-elementor' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'logo',
			[
				'label' => esc_html__( 'Logo', 'wpbits-addons-for-elementor' ),
                'type' => \Elementor\Controls_Manager::MEDIA
			]
		);

		$this->add_control(
			'hr_title_1',
			[
				'type' => Controls_Manager::DIVIDER,
			]
		);

		$this->add_control(
			'title', [
				'label' => esc_html__( 'Title', 'wpbits-addons-for-elementor' ),
				'type' => \Elementor\Controls_Manager::TEXT
			]
		);

		$this->add_control(
			'title_html_tag',
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
					'span' => 'span',
					'p' => 'p',
				],
				'default' => 'h2',
			]
		);

		$this->add_control(
			'subtitle', [
				'label' => esc_html__( 'Sub Title', 'wpbits-addons-for-elementor' ),
				'type' => \Elementor\Controls_Manager::TEXT
			]
		);

		$this->add_control(
			'subtitle_html_tag',
			[
				'label' => esc_html__( 'Sub Title HTML Tag', 'wpbits-addons-for-elementor' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'h1' => 'H1',
					'h2' => 'H2',
					'h3' => 'H3',
					'h4' => 'H4',
					'h5' => 'H5',
					'h6' => 'H6',
					'div' => 'div',
					'span' => 'span',
					'p' => 'p',
				],
				'default' => 'p',
			]
		);

		$this->add_control(
			'hr_title_2',
			[
				'type' => Controls_Manager::DIVIDER,
			]
		);
        
        $this->add_control(
			'label_username', [
				'label' => esc_html__( 'Username', 'wpbits-addons-for-elementor' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Username or Email Address', 'wpbits-addons-for-elementor' )
			]
		);
        
        $this->add_control(
			'label_password', [
				'label' => esc_html__( 'Password', 'wpbits-addons-for-elementor' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Password', 'wpbits-addons-for-elementor' )
			]
		);
        
        $this->add_control(
			'label_remember', [
				'label' => esc_html__( 'Remember Me', 'wpbits-addons-for-elementor' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Remember Me', 'wpbits-addons-for-elementor' )
			]
		);
        
        $this->add_control(
			'label_register', [
				'label' => esc_html__( 'Register', 'wpbits-addons-for-elementor' ),
				'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( 'Register', 'wpbits-addons-for-elementor' )
			]
		);
        
        $this->add_control(
			'links_seperator', [
				'label' => esc_html__( 'Link Separator', 'wpbits-addons-for-elementor' ),
				'type' => \Elementor\Controls_Manager::TEXT
			]
		);
        
        $this->add_control(
			'label_lost_password', [
				'label' => esc_html__( 'Lost Password', 'wpbits-addons-for-elementor' ),
				'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( 'Lost Password', 'wpbits-addons-for-elementor' )
			]
		);
        
        $this->add_control(
			'label_log_in', [
				'label' => esc_html__( 'Button Text', 'wpbits-addons-for-elementor' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Log In', 'wpbits-addons-for-elementor' )
			]
		);
        
        $this->end_controls_section();
        
        // section start
		$this->start_controls_section(
			'form_additional_options',
			[
				'label' => esc_html__( 'Additional Options', 'wpbits-addons-for-elementor' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);
        
        $this->add_control(
			'redirect_link_switcher',
			[
				'label' => esc_html__( 'Redirect After Login', 'wpbits-addons-for-elementor' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'On', 'wpbits-addons-for-elementor' ),
				'label_off' => esc_html__( 'Off', 'wpbits-addons-for-elementor' ),
				'return_value' => 'yes',
				'default' => '',
			]
		);
        
        $this->add_control(
			'redirect_link',
			[
                'label' => esc_html__( 'Redirect After Login', 'wpbits-addons-for-elementor' ),
                'description' => esc_html__( 'Note: Because of security reasons, you can ONLY use your current domain here.', 'wpbits-addons-for-elementor' ),
				'type' => \Elementor\Controls_Manager::URL,
                'condition' => ['redirect_link_switcher' => 'yes'],
				'placeholder' => esc_html__( 'https://your-link.com', 'wpbits-addons-for-elementor' ),
				'show_external' => false,
                'show_label' => false
			]
		);
        
        $this->add_control(
			'redirect_logout_link_switcher',
			[
				'label' => esc_html__( 'Redirect After Login', 'wpbits-addons-for-elementor' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'On', 'wpbits-addons-for-elementor' ),
				'label_off' => esc_html__( 'Off', 'wpbits-addons-for-elementor' ),
				'return_value' => 'yes',
				'default' => '',
			]
		);
        
        $this->add_control(
			'redirect_logout_link',
			[
                'label' => esc_html__( 'Redirect After Logout', 'wpbits-addons-for-elementor' ),
                'description' => esc_html__( 'Note: Because of security reasons, you can ONLY use your current domain here.', 'wpbits-addons-for-elementor' ),
				'type' => \Elementor\Controls_Manager::URL,
                'condition' => ['redirect_logout_link_switcher' => 'yes'],
				'placeholder' => esc_html__( 'https://your-link.com', 'wpbits-addons-for-elementor' ),
				'show_external' => false,
                'show_label' => false
			]
		);
        
        $this->add_control(
			'lost_password_switcher',
			[
				'label' => esc_html__( 'Lost Password', 'wpbits-addons-for-elementor' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Show', 'wpbits-addons-for-elementor' ),
				'label_off' => esc_html__( 'Hide', 'wpbits-addons-for-elementor' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);
        
        $this->add_control(
			'register_switcher',
			[
				'label' => esc_html__( 'Register', 'wpbits-addons-for-elementor' ),
                'description' => esc_html__( 'You must enable "membership" from WordPress settings.', 'wpbits-addons-for-elementor' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Show', 'wpbits-addons-for-elementor' ),
				'label_off' => esc_html__( 'Hide', 'wpbits-addons-for-elementor' ),
				'return_value' => 'yes',
				'default' => '',
			]
		);
        
        $this->add_control(
			'remember_switcher',
			[
				'label' => esc_html__( 'Remember Me', 'wpbits-addons-for-elementor' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Show', 'wpbits-addons-for-elementor' ),
				'label_off' => esc_html__( 'Hide', 'wpbits-addons-for-elementor' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);
        
        $this->add_control(
			'loggedin_msg_switcher',
			[
				'label' => esc_html__( 'Logged in Message', 'wpbits-addons-for-elementor' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Yes', 'wpbits-addons-for-elementor' ),
				'label_off' => esc_html__( 'No', 'wpbits-addons-for-elementor' ),
				'return_value' => 'yes',
				'default' => '',
			]
		);
        
        $this->add_control(
			'loggedin_msg', [
				'label' => esc_html__( 'Logged in Message', 'wpbits-addons-for-elementor' ),
				'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( 'You are logged in as ', 'wpbits-addons-for-elementor' ),
                'condition' => ['loggedin_msg_switcher' => 'yes'],
                'show_label' => false,
                'label_block' => true
			]
		);
        
        $this->add_control(
			'test_mode',
			[
				'label' => esc_html__( 'Test Mode', 'wpbits-addons-for-elementor' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'On', 'wpbits-addons-for-elementor' ),
				'label_off' => esc_html__( 'Off', 'wpbits-addons-for-elementor' ),
				'return_value' => 'yes',
				'default' => '',
			]
		);
       
		$this->end_controls_section();
        
        // section start
		$this->start_controls_section(
			'section_form_container_style',
			[
				'label' => esc_html__( 'Form Container', 'wpbits-addons-for-elementor' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
        
        $this->add_responsive_control(
			'form_width',
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
                'default' => [
					'unit' => '%',
					'size' => 100,
				],
				'selectors' => [
					'{{WRAPPER}} .wpb-login-form-inner' => 'max-width: {{SIZE}}{{UNIT}};'
				],
			]
		);
        
        $this->add_responsive_control(
			'form_align',
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
					'{{WRAPPER}} .wpb-login-form-wrapper' => 'align-items: {{VALUE}};',
				],
                'toggle' => false
			]
		);
        
        $this->add_responsive_control(
			'rows_gap',
			[
				'label' => esc_html__( 'Rows Gap', 'wpbits-addons-for-elementor' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px'],
				'range' => [
                    'px' => [
						'min' => 0,
						'max' => 100,
					],
				],
                'default' => [
					'unit' => 'px',
					'size' => 20,
				],
				'selectors' => [
					'{{WRAPPER}} .wpb-login-form-inner p' => 'margin-bottom: {{SIZE}}{{UNIT}};'
				],
			]
		);
        
        $this->add_control(
			'form_hr_1',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		);
        
        $this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name' => 'form_bg',
				'label' => esc_html__( 'Background', 'wpbits-addons-for-elementor' ),
				'types' => [ 'classic', 'gradient' ],
				'selector' => '{{WRAPPER}} .wpb-login-form-inner',
			]
		);
        
        $this->add_control(
			'form_hr_2',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		); 
        
        $this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'form_border',
				'label' => esc_html__( 'Border', 'wpbits-addons-for-elementor' ),
				'selector' => '{{WRAPPER}} .wpb-login-form-inner'
			]
		);
        
        $this->add_responsive_control(
			'form_border_radius',
			[
				'label' => esc_html__( 'Border Radius', 'wpbits-addons-for-elementor' ),
				'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'rem' ],
				'selectors' => [
					'{{WRAPPER}} .wpb-login-form-inner' => 'border-top-left-radius: {{TOP}}{{UNIT}};border-top-right-radius: {{RIGHT}}{{UNIT}};border-bottom-right-radius: {{BOTTOM}}{{UNIT}};border-bottom-left-radius: {{LEFT}}{{UNIT}};'
				]
			]
		);
        
        $this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'form_shadow',
				'label' => esc_html__( 'Box Shadow', 'wpbits-addons-for-elementor' ),
				'selector' => '{{WRAPPER}} .wpb-login-form-inner'
			]
		);
        
        $this->add_control(
			'form_hr_3',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		); 
        
        $this->add_responsive_control(
			'form_padding',
			[
				'label' => esc_html__( 'Padding', 'wpbits-addons-for-elementor' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'rem' ],
				'selectors' => [
                    '{{WRAPPER}} .wpb-login-form-inner' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
				],
			]
		);
        
        $this->add_responsive_control(
			'form_margin',
			[
				'label' => esc_html__( 'Margin', 'wpbits-addons-for-elementor' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'rem' ],
				'selectors' => [
                    '{{WRAPPER}} .wpb-login-form-wrapper' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
				],
			]
		);

		$this->end_controls_section();
        
        // section start
		$this->start_controls_section(
			'section_logo_style',
			[
				'label' => esc_html__( 'Logo', 'wpbits-addons-for-elementor' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_responsive_control(
			'logo_width',
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
                'default' => [
					'unit' => '%',
					'size' => 100,
				],
				'selectors' => [
					'{{WRAPPER}} .wpb-login-form-logo' => 'max-width: {{SIZE}}{{UNIT}};'
				],
			]
		);

		$this->add_responsive_control(
			'logo_h_align',
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
					'{{WRAPPER}} .wpb-login-form-logo-container' => 'align-items: {{VALUE}};',
				],
                'toggle' => false
			]
		);

		$this->add_control(
			'logo_hr_1',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		); 

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'logo_border',
				'label' => esc_html__( 'Border', 'wpbits-addons-for-elementor' ),
				'selector' => '{{WRAPPER}} .wpb-login-form-logo'
			]
		);

		$this->add_responsive_control(
			'logo_border_radius',
			[
				'label' => esc_html__( 'Border Radius', 'wpbits-addons-for-elementor' ),
				'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'rem' ],
				'selectors' => [
					'{{WRAPPER}} .wpb-login-form-logo' => 'border-top-left-radius: {{TOP}}{{UNIT}};border-top-right-radius: {{RIGHT}}{{UNIT}};border-bottom-right-radius: {{BOTTOM}}{{UNIT}};border-bottom-left-radius: {{LEFT}}{{UNIT}};'
				]
			]
		);

		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'logo_border_shadow',
				'label' => esc_html__( 'Box Shadow', 'wpbits-addons-for-elementor' ),
				'selector' => '{{WRAPPER}} .wpb-login-form-logo'
			]
		);

		$this->add_control(
			'logo_hr_2',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		); 

		$this->add_responsive_control(
			'logo_margin',
			[
				'label' => esc_html__( 'Margin', 'wpbits-addons-for-elementor' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'rem' ],
				'selectors' => [
                    '{{WRAPPER}} .wpb-login-form-logo-container' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
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
				'label' => esc_html__( 'Text Color', 'wpbits-addons-for-elementor' ),
				'type' => Controls_Manager::COLOR, 
				'selectors' => [
					'{{WRAPPER}} .wpbits-login-form-title' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'title_typography',
				'scheme' => Core\Schemes\Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .wpbits-login-form-title',
			]
		);

		$this->add_responsive_control(
			'title_align',
			[
				'label' => esc_html__( 'Text Align', 'wpbits-addons-for-elementor' ),
				'type' => Controls_Manager::CHOOSE,
				'options' => [
					'flex-start' => [
						'title' => esc_html__( 'Start', 'wpbits-addons-for-elementor' ),
						'icon' => 'eicon-text-align-left',
					],
					'center' => [
						'title' => esc_html__( 'Center', 'wpbits-addons-for-elementor' ),
						'icon' => 'eicon-text-align-center',
					],
					'flex-end' => [
						'title' => esc_html__( 'End', 'wpbits-addons-for-elementor' ),
						'icon' => 'eicon-text-align-right',
					],
				],
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .wpbits-login-form-title' => 'text-align: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'hr_title',
			[
				'type' => Controls_Manager::DIVIDER,
			]
		);

		$this->add_responsive_control(
			'title_margin',
			[
				'label' => esc_html__( 'Margin', 'wpbits-addons-for-elementor' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'rem' ],
				'selectors' => [
                    '{{WRAPPER}} .wpbits-login-form-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
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
                    '{{WRAPPER}} .wpbits-login-form-title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
				],
			]
		);

		$this->end_controls_section();

		// section start
		$this->start_controls_section(
			'section_subtitle_style',
			[
				'label' => esc_html__( 'Sub Title', 'wpbits-addons-for-elementor' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'subtitle_color',
			[
				'label' => esc_html__( 'Text Color', 'wpbits-addons-for-elementor' ),
				'type' => Controls_Manager::COLOR, 
				'selectors' => [
					'{{WRAPPER}} .wpbits-login-form-subtitle' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'subtitle_typography',
				'scheme' => Core\Schemes\Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .wpbits-login-form-subtitle',
			]
		);

		$this->add_responsive_control(
			'subtitle_align',
			[
				'label' => esc_html__( 'Text Align', 'wpbits-addons-for-elementor' ),
				'type' => Controls_Manager::CHOOSE,
				'options' => [
					'flex-start' => [
						'title' => esc_html__( 'Start', 'wpbits-addons-for-elementor' ),
						'icon' => 'eicon-text-align-left',
					],
					'center' => [
						'title' => esc_html__( 'Center', 'wpbits-addons-for-elementor' ),
						'icon' => 'eicon-text-align-center',
					],
					'flex-end' => [
						'title' => esc_html__( 'End', 'wpbits-addons-for-elementor' ),
						'icon' => 'eicon-text-align-right',
					],
				],
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .wpbits-login-form-subtitle' => 'text-align: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'hr_subtitle',
			[
				'type' => Controls_Manager::DIVIDER,
			]
		);

		$this->add_responsive_control(
			'subtitle_margin',
			[
				'label' => esc_html__( 'Margin', 'wpbits-addons-for-elementor' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'rem' ],
				'selectors' => [
                    '{{WRAPPER}} .wpbits-login-form-subtitle' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
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
                    '{{WRAPPER}} .wpbits-login-form-subtitle' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
				],
			]
		);

		$this->end_controls_section();
        
        // section start
		$this->start_controls_section(
			'section_labels_style',
			[
				'label' => esc_html__( 'Labels', 'wpbits-addons-for-elementor' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
        
        $this->add_control(
			'label_color',
			[
				'label' => esc_html__( 'Color', 'wpbits-addons-for-elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} #wpb_login_form label' => 'color: {{VALUE}};'
				]
			]
		);
        
        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'label_typography',
				'scheme' => Core\Schemes\Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} #wpb_login_form label'
			]
		);
        
        $this->add_responsive_control(
			'label_text_align',
			[
				'label' => esc_html__( 'Text Align', 'wpbits-addons-for-elementor' ),
				'type' => Controls_Manager::CHOOSE,
				'options' => [
					'left' => [
						'title' => esc_html__( 'Start', 'wpbits-addons-for-elementor' ),
						'icon' => 'eicon-text-align-left',
					],
					'center' => [
						'title' => esc_html__( 'Center', 'wpbits-addons-for-elementor' ),
						'icon' => 'eicon-text-align-center',
					],
					'right' => [
						'title' => esc_html__( 'End', 'wpbits-addons-for-elementor' ),
						'icon' => 'eicon-text-align-right',
					],
				],
				'default' => 'left',
				'selectors' => [
					'{{WRAPPER}} #wpb_login_form label' => 'text-align: {{VALUE}};',
				],
                'toggle' => false
			]
		);
        
        $this->add_control(
			'label_hr_1',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		); 
        
        $this->add_responsive_control(
			'label_padding',
			[
				'label' => esc_html__( 'Padding', 'wpbits-addons-for-elementor' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'rem' ],
				'selectors' => [
                    '{{WRAPPER}} #wpb_login_form label' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
				],
			]
		);
        
        $this->add_responsive_control(
			'label_margin',
			[
				'label' => esc_html__( 'Margin', 'wpbits-addons-for-elementor' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'rem' ],
				'selectors' => [
                    '{{WRAPPER}} #wpb_login_form label' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
				],
			]
		);
        
        $this->end_controls_section();
        
        // section start
		$this->start_controls_section(
			'section_input_style',
			[
				'label' => esc_html__( 'Input & Textarea', 'wpbits-addons-for-elementor' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
        
        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'input_typography',
				'scheme' => Core\Schemes\Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} #wpb_login_form input:not(.button),{{WRAPPER}} #wpb_login_form textarea'
			]
		);
        
        $this->add_responsive_control(
			'input_text_align',
			[
				'label' => esc_html__( 'Text Align', 'wpbits-addons-for-elementor' ),
				'type' => Controls_Manager::CHOOSE,
				'options' => [
					'left' => [
						'title' => esc_html__( 'Start', 'wpbits-addons-for-elementor' ),
						'icon' => 'eicon-text-align-left',
					],
					'center' => [
						'title' => esc_html__( 'Center', 'wpbits-addons-for-elementor' ),
						'icon' => 'eicon-text-align-center',
					],
					'right' => [
						'title' => esc_html__( 'End', 'wpbits-addons-for-elementor' ),
						'icon' => 'eicon-text-align-right',
					],
				],
				'default' => 'left',
				'selectors' => [
					'{{WRAPPER}} #wpb_login_form input:not(.button)' => 'text-align: {{VALUE}};',
                    '{{WRAPPER}} #wpb_login_form textarea' => 'text-align: {{VALUE}};',
				],
                'toggle' => false
			]
		);

		$this->add_responsive_control(
			'input_width',
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
					'{{WRAPPER}} input[type="text"]' => 'width: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} input[type="email"]' => 'width: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} input[type="tel"]' => 'width: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} input[type="password"]' => 'width: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} textarea' => 'width: {{SIZE}}{{UNIT}};'
				],
			]
		);
        
        $this->add_control(
			'input_hr_1',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		); 
        
        $this->start_controls_tabs( 'form_input_style' );
        
        $this->start_controls_tab(
			'form_input_normal',
			[
				'label' => esc_html__( 'Normal', 'wpbits-addons-for-elementor' ),
			]
		);
        
        $this->add_control(
			'text_color',
			[
				'label' => esc_html__( 'Text Color', 'wpbits-addons-for-elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} #wpb_login_form input:not(.button)' => 'color: {{VALUE}};',
                    '{{WRAPPER}} #wpb_login_form textarea' => 'color: {{VALUE}};',
				]
			]
		);
        
        $this->add_control(
			'placeholder_color',
			[
				'label' => esc_html__( 'Placeholder Color', 'wpbits-addons-for-elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} #wpb_login_form input:not(.button)::placeholder' => 'color: {{VALUE}};',
                    '{{WRAPPER}} #wpb_login_form textarea::placeholder' => 'color: {{VALUE}};',
				]
			]
		);
        
        $this->add_control(
			'bg_color',
			[
				'label' => esc_html__( 'Background Color', 'wpbits-addons-for-elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} #wpb_login_form input:not(.button)' => 'background-color: {{VALUE}};',
                    '{{WRAPPER}} #wpb_login_form textarea' => 'background-color: {{VALUE}};',
				]
			]
		);
        
        $this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'border',
				'label' => esc_html__( 'Border', 'wpbits-addons-for-elementor' ),
				'selector' => '{{WRAPPER}} #wpb_login_form input:not(.button),{{WRAPPER}} #wpb_login_form textarea'
			]
		);
        
        $this->add_responsive_control(
			'border_radius',
			[
				'label' => esc_html__( 'Border Radius', 'wpbits-addons-for-elementor' ),
				'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'rem' ],
				'selectors' => [
					'{{WRAPPER}} #wpb_login_form input:not(.button)' => 'border-top-left-radius: {{TOP}}{{UNIT}};border-top-right-radius: {{RIGHT}}{{UNIT}};border-bottom-right-radius: {{BOTTOM}}{{UNIT}};border-bottom-left-radius: {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} #wpb_login_form textarea' => 'border-top-left-radius: {{TOP}}{{UNIT}};border-top-right-radius: {{RIGHT}}{{UNIT}};border-bottom-right-radius: {{BOTTOM}}{{UNIT}};border-bottom-left-radius: {{LEFT}}{{UNIT}};',
				]
			]
		);
        
        $this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'border_shadow',
				'label' => esc_html__( 'Box Shadow', 'wpbits-addons-for-elementor' ),
				'selector' => '{{WRAPPER}} #wpb_login_form input:not(.button),{{WRAPPER}} #wpb_login_form textarea'
			]
		);
        
        $this->end_controls_tab();

		$this->start_controls_tab(
			'form_input_hover',
			[
				'label' => esc_html__( 'Focus', 'wpbits-addons-for-elementor' ),
			]
		);
        
        $this->add_control(
			'text_hover_color',
			[
				'label' => esc_html__( 'Text Color', 'wpbits-addons-for-elementor' ),
				'type' => Controls_Manager::COLOR, 
				'selectors' => [
					'{{WRAPPER}} #wpb_login_form input:not(.button):focus' => 'color: {{VALUE}};',
                    '{{WRAPPER}} #wpb_login_form textarea:focus' => 'color: {{VALUE}};',
				]
			]
		);
        
        $this->add_control(
			'bg_hover_color',
			[
				'label' => esc_html__( 'Background Color', 'wpbits-addons-for-elementor' ),
				'type' => Controls_Manager::COLOR, 
				'selectors' => [
					'{{WRAPPER}} #wpb_login_form input:not(.button):focus' => 'background-color: {{VALUE}};',
                    '{{WRAPPER}} #wpb_login_form textarea:focus' => 'background-color: {{VALUE}};',
				]
			]
		);
        
        $this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'hover_border',
				'label' => esc_html__( 'Border', 'wpbits-addons-for-elementor' ),
				'selector' => '{{WRAPPER}} #wpb_login_form input:not(.button):focus,{{WRAPPER}} #wpb_login_form textarea:focus'
			]
		);
        
        $this->add_responsive_control(
			'border_hover_radius',
			[
				'label' => esc_html__( 'Border Radius', 'wpbits-addons-for-elementor' ),
				'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'rem' ],
				'selectors' => [
					'{{WRAPPER}} #wpb_login_form input:not(.wpcf7-submit):focus' => 'border-top-left-radius: {{TOP}}{{UNIT}};border-top-right-radius: {{RIGHT}}{{UNIT}};border-bottom-right-radius: {{BOTTOM}}{{UNIT}};border-bottom-left-radius: {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} #wpb_login_form textarea:focus' => 'border-top-left-radius: {{TOP}}{{UNIT}};border-top-right-radius: {{RIGHT}}{{UNIT}};border-bottom-right-radius: {{BOTTOM}}{{UNIT}};border-bottom-left-radius: {{LEFT}}{{UNIT}};',
				]
			]
		);
        
        $this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'border_hover_shadow',
				'label' => esc_html__( 'Box Shadow', 'wpbits-addons-for-elementor' ),
				'selector' => '{{WRAPPER}} #wpb_login_form input:not(.button):focus,{{WRAPPER}} #wpb_login_form textarea:focus'
			]
		);
        
        $this->end_controls_tab();
        $this->end_controls_tabs();
        
        $this->add_control(
			'input_hr_2',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		); 
        
        $this->add_responsive_control(
			'input_padding',
			[
				'label' => esc_html__( 'Padding', 'wpbits-addons-for-elementor' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'rem' ],
				'selectors' => [
                    '{{WRAPPER}} #wpb_login_form input:not(.button)' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} #wpb_login_form textarea' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
        
        $this->add_responsive_control(
			'input_margin',
			[
				'label' => esc_html__( 'Margin', 'wpbits-addons-for-elementor' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'rem' ],
				'selectors' => [
                    '{{WRAPPER}} #wpb_login_form input:not(.button)' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} #wpb_login_form textarea' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
        
        $this->end_controls_section();
        
        // section start
		$this->start_controls_section(
			'section_btn_style',
			[
				'label' => esc_html__( 'Submit Button', 'wpbits-addons-for-elementor' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
        
        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'btn_typography',
				'scheme' => Core\Schemes\Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} #wp-submit',
			]
		);
        
        $this->add_responsive_control(
			'btn_text_align',
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
				'default' => 'flex-start',
				'selectors' => [
					'{{WRAPPER}} p.login-submit' => 'justify-content: {{VALUE}};',
				],
                'toggle' => false
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
			'btn_text_color',
			[
				'label' => esc_html__( 'Text Color', 'wpbits-addons-for-elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} #wp-submit' => 'color: {{VALUE}};',
				]
			]
		);
        
        $this->add_control(
			'btn_bg_color',
			[
				'label' => esc_html__( 'Background Color', 'wpbits-addons-for-elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} #wp-submit' => 'background-color: {{VALUE}};',
				]
			]
		);
        
        $this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'btn_border',
				'label' => esc_html__( 'Border', 'wpbits-addons-for-elementor' ),
				'selector' => '{{WRAPPER}} #wp-submit'
			]
		);
        
        $this->add_responsive_control(
			'btn_border_radius',
			[
				'label' => esc_html__( 'Border Radius', 'wpbits-addons-for-elementor' ),
				'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'rem' ],
				'selectors' => [
					'{{WRAPPER}} #wp-submit' => 'border-top-left-radius: {{TOP}}{{UNIT}};border-top-right-radius: {{RIGHT}}{{UNIT}};border-bottom-right-radius: {{BOTTOM}}{{UNIT}};border-bottom-left-radius: {{LEFT}}{{UNIT}};'
				]
			]
		);
        
        $this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'btn_border_shadow',
				'label' => esc_html__( 'Box Shadow', 'wpbits-addons-for-elementor' ),
				'selector' => '{{WRAPPER}} #wp-submit'
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
			'btn_text_hover_color',
			[
				'label' => esc_html__( 'Text Color', 'wpbits-addons-for-elementor' ),
				'type' => Controls_Manager::COLOR, 
				'selectors' => [
					'{{WRAPPER}} #wp-submit:hover' => 'color: {{VALUE}};'
				]
			]
		);
        
        $this->add_control(
			'btn_bg_hover_color',
			[
				'label' => esc_html__( 'Background Color', 'wpbits-addons-for-elementor' ),
				'type' => Controls_Manager::COLOR, 
				'selectors' => [
					'{{WRAPPER}} #wp-submit:hover' => 'background-color: {{VALUE}};'
				]
			]
		);
        
        $this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'btn_hover_border',
				'label' => esc_html__( 'Border', 'wpbits-addons-for-elementor' ),
				'selector' => '{{WRAPPER}} #wp-submit:hover'
			]
		);
        
        $this->add_responsive_control(
			'btn_border_hover_radius',
			[
				'label' => esc_html__( 'Border Radius', 'wpbits-addons-for-elementor' ),
				'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'rem' ],
				'selectors' => [
					'{{WRAPPER}} #wp-submit:hover' => 'border-top-left-radius: {{TOP}}{{UNIT}};border-top-right-radius: {{RIGHT}}{{UNIT}};border-bottom-right-radius: {{BOTTOM}}{{UNIT}};border-bottom-left-radius: {{LEFT}}{{UNIT}};'
				]
			]
		);
        
        $this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'btn_border_hover_shadow',
				'label' => esc_html__( 'Box Shadow', 'wpbits-addons-for-elementor' ),
				'selector' => '{{WRAPPER}} #wp-submit:hover'
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
			'btn_padding',
			[
				'label' => esc_html__( 'Padding', 'wpbits-addons-for-elementor' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'rem' ],
				'selectors' => [
                    '{{WRAPPER}} #wp-submit' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
				],
			]
		);
        
        $this->add_responsive_control(
			'btn_margin',
			[
				'label' => esc_html__( 'Margin', 'wpbits-addons-for-elementor' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'rem' ],
				'selectors' => [
                    '{{WRAPPER}}  p.login-submit' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
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
					'{{WRAPPER}} #wp-submit' => 'width: {{SIZE}}{{UNIT}};'
				],
			]
		);
        
        $this->end_controls_section();
        
        // section start
		$this->start_controls_section(
			'section_links_style',
			[
				'label' => esc_html__( 'Links', 'wpbits-addons-for-elementor' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
        
        $this->add_control(
			'link_color',
			[
				'label' => esc_html__( 'Link Color', 'wpbits-addons-for-elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} ul.wpb-login-form-links li a' => 'color: {{VALUE}};',
                    '{{WRAPPER}} ul.wpb-login-form-links li' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .wpb-loggedout-msg a' => 'color: {{VALUE}};',
				]
			]
		);
        
        $this->add_control(
			'link_hover_color',
			[
				'label' => esc_html__( 'Link Hover Color', 'wpbits-addons-for-elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} ul.wpb-login-form-links li a:hover' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .wpb-loggedout-msg a:hover' => 'color: {{VALUE}};',
				]
			]
		);
        
        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'links_typography',
				'scheme' => Core\Schemes\Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} ul.wpb-login-form-links li'
			]
		);
        
        $this->add_responsive_control(
			'links_align',
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
				'default' => 'flex-end',
				'selectors' => [
					'{{WRAPPER}} ul.wpb-login-form-links' => 'justify-content: {{VALUE}};',
				],
                'toggle' => false
			]
		);
        
        $this->add_control(
			'links_hr_1',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		); 
        
        $this->add_responsive_control(
			'links_padding',
			[
				'label' => esc_html__( 'Padding', 'wpbits-addons-for-elementor' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'rem' ],
				'selectors' => [
                    '{{WRAPPER}} ul.wpb-login-form-links li' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
				],
			]
		);
        
        $this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'links_border',
				'label' => esc_html__( 'Border', 'wpbits-addons-for-elementor' ),
				'selector' => '{{WRAPPER}} ul.wpb-login-form-links'
			]
		);
        
        $this->add_responsive_control(
			'links_margin',
			[
				'label' => esc_html__( 'Margin', 'wpbits-addons-for-elementor' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'rem' ],
				'selectors' => [
                    '{{WRAPPER}} ul.wpb-login-form-links' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
				],
			]
		);
        
        $this->end_controls_section();
        
        // section start
		$this->start_controls_section(
			'section_logged_in_msg_style',
			[
				'label' => esc_html__( 'Logged in Message', 'wpbits-addons-for-elementor' ),
				'tab' => Controls_Manager::TAB_STYLE,
                'condition' => ['loggedin_msg_switcher' => 'yes'],
			]
		);
        
        $this->add_control(
			'logged_in_msg_color',
			[
				'label' => esc_html__( 'Color', 'wpbits-addons-for-elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wpb-loggedout-msg' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .wpb-loggedout-msg a' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .wpb-loggedout-msg a:hover' => 'color: {{VALUE}};'
				]
			]
		);
        
        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'logged_in_msg_typography',
				'scheme' => Core\Schemes\Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .wpb-loggedout-msg'
			]
		);
        
        $this->add_responsive_control(
			'logged_in_msg_text_align',
			[
				'label' => esc_html__( 'Text Align', 'wpbits-addons-for-elementor' ),
				'type' => Controls_Manager::CHOOSE,
				'options' => [
					'left' => [
						'title' => esc_html__( 'Start', 'wpbits-addons-for-elementor' ),
						'icon' => 'eicon-text-align-left',
					],
					'center' => [
						'title' => esc_html__( 'Center', 'wpbits-addons-for-elementor' ),
						'icon' => 'eicon-text-align-center',
					],
					'right' => [
						'title' => esc_html__( 'End', 'wpbits-addons-for-elementor' ),
						'icon' => 'eicon-text-align-right',
					],
				],
				'default' => 'left',
				'selectors' => [
					'{{WRAPPER}} .wpb-loggedout-msg' => 'text-align: {{VALUE}};',
				],
                'toggle' => false
			]
		);

		$this->add_responsive_control(
			'logged_in_msg_padding',
			[
				'label' => esc_html__( 'Padding', 'wpbits-addons-for-elementor' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'rem' ],
				'selectors' => [
                    '{{WRAPPER}} .wpb-loggedout-msg' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
				],
			]
		);
        
        $this->end_controls_section();
	}
    
    protected function render() {
		$settings = $this->get_settings_for_display();
		$logo_url = wp_get_attachment_image_url( $settings['logo']['id'], 'full' );  
        $redirect_link = '';
        $remember = false;
        if ($settings['remember_switcher']) {
            $remember = true;
        }
        if ($settings['redirect_link'] && $settings['redirect_link']['url']) {
            $redirect_link = $settings['redirect_link']['url'];
        } else {
            $redirect_link = ( is_ssl() ? 'https://' : 'http://' ) . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
        }
        $login_form_args = array(
            'echo'           => true,
            'redirect'       => $redirect_link,
            'form_id'        => 'wpb_login_form',
            'label_username' => $settings['label_username'],
            'label_password' => $settings['label_password'],
            'label_remember' => $settings['label_remember'],
            'label_log_in'   => $settings['label_log_in'],
            'remember'       => $remember,
            'value_username' => '',
            // Set 'value_remember' to true to default the "Remember me" checkbox to checked.
            'value_remember' => false,
        ); ?>
        <?php if ((!is_user_logged_in()) || ( \Elementor\Plugin::$instance->editor->is_edit_mode() ) || ($settings['test_mode'])) { ?>
        <div class="wpb-login-form-wrapper">
            <div class="wpb-login-form-inner">
				<?php if ($logo_url) { ?>
				<div class="wpb-login-form-logo-container">
					<img class="wpb-login-form-logo" src="<?php echo esc_url($logo_url); ?>" alt="<?php echo esc_attr($settings['title']); ?>" />
				</div>
				<?php } ?>	
				<?php if ($settings['title']) {
                    echo '<' . Utils::validate_html_tag($settings['title_html_tag']) . ' class="wpbits-login-form-title">';
                    echo esc_html($settings['title']);
                    echo '</' . Utils::validate_html_tag($settings['title_html_tag']) . '>';
				} ?>
				<?php if ($settings['subtitle']) {
                    echo '<' . Utils::validate_html_tag($settings['subtitle_html_tag']) . ' class="wpbits-login-form-subtitle">';
                    echo esc_html($settings['subtitle']);
                    echo '</' . Utils::validate_html_tag($settings['subtitle_html_tag']) . '>';
                } ?>
                <?php wp_login_form($login_form_args); ?>
                <ul class="wpb-login-form-links">
                    <?php if ((get_option( 'users_can_register' ) == '1') && ($settings['register_switcher'])) { ?>    
                    <li>
                        <a href="<?php echo esc_url(wp_registration_url()); ?>"><?php echo esc_html($settings['label_register']); ?></a>
                    </li>
                    <?php } ?> 
                    <?php if ($settings['links_seperator']) { ?>
                    <li>
                        <?php echo esc_html($settings['links_seperator']); ?>
                    </li>
                    <?php } ?>
                    <?php if ($settings['lost_password_switcher']) { ?>
                    <li>
                        <a href="<?php echo esc_url(wp_lostpassword_url()); ?>"><?php echo esc_html($settings['label_lost_password']); ?></a>
                    </li>
                    <?php } ?>
                </ul>
            </div>
        </div>
        <?php 
        } elseif ($settings['loggedin_msg_switcher']) { 
            $current_user = wp_get_current_user();
            $redirect_logout = get_permalink();
            if ($settings['redirect_logout_link_switcher']) {
                $redirect_logout = esc_url($settings['redirect_logout_link']);
            }
        ?>    
        <div class="wpb-loggedout-msg"><?php echo $this->parse_text_editor($settings['loggedin_msg']) . esc_html( $current_user->user_login ); ?> <a href="<?php echo wp_logout_url($redirect_logout); ?>"><?php esc_html_e( '(Logout)', 'wpbits-addons-for-elementor' ); ?></a></div>
        <?php } ?>
	<?php }
}
Plugin::instance()->widgets_manager->register_widget_type( new Widget_WPBITS_AFE_Login_Form() );