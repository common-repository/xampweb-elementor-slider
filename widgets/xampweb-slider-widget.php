<?php
/**
 * Elementor xampslider Widget.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
class Xampweb_Slider_Widget extends \Elementor\Widget_Base {

	/**
	 * Get widget name.
	 *
	 * Retrieve xampslider widget name.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'xampslider';
	}

	/**
	 * Get widget title.
	 *
	 * Retrieve xampslider widget title.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return __( 'Xampweb Slider', 'xampweb-slider' );
	}

	/**
	 * Get widget icon.
	 *
	 * Retrieve Xampweb Slider widget icon.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return ' eicon-slider-push';
	}

	/**
	 * Get widget categories.
	 *
	 * Retrieve the list of categories the xampslider widget belongs to.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return array Widget categories.
	 */
	public function get_categories() {
		return [ 'xampweb-extras' ];
	}

	/**
	 * Register about widget controls.
	 *
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function _register_controls() {

		

		$this->start_controls_section(
			'mainslider_list',
			[
				'label' => __( 'Feature List', 'xampweb-slider' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

        

		$repeater = new \Elementor\Repeater();


		$repeater->add_control(
			'mainslider_list_heading', [
				'label' => esc_html__( 'Slider Heading', 'xampweb-slider' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Heading' , 'xampweb-slider' ),
				'label_block' => true,
			]
		);


		$repeater->add_control(
			'mainslider_list_text', [
				'label' => esc_html__( 'Slider Text', 'xampweb-slider' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Slider Text' , 'xampweb-slider' ),
				'label_block' => true,
			]
		);


		$repeater->add_control(
			'mainslider_list_button_text', [
				'label' => esc_html__( 'Button Text', 'xampweb-slider' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Button Text' , 'xampweb-slider' ),
				'label_block' => true,
			]
		);


		$repeater->add_control(
			'mainslider_list_button_url', [
				'label' => esc_html__( 'Button URL', 'xampweb-slider' ),
				'type' => \Elementor\Controls_Manager::URL,
				'placeholder' => esc_html__( 'https://your-link.com', 'xampweb-slider' ),
				'label_block' => true,
			]
		);


		$repeater->add_control(
			'main_slider_image',
			[
				'label' => esc_html__( 'Choose Image', 'xampweb-slider' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);

	

		$this->add_control(
			'xampwebmainslider_list',
			[
				'label' => esc_html__( 'Slider List', 'xampweb-slider' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'mainslider_list_heading' => esc_html__( 'Unlimited access courses', 'xampweb-slider' ),
					],
					[
						'mainslider_list_heading' => esc_html__( 'Unlimited access courses 2', 'xampweb-slider' ),
					],
				],
				'title_field' => '{{{ mainslider_list_heading }}}',
			]
		);
        
        
        $this->end_controls_section();

		
        
        // Slider Details

		$this->start_controls_section(
			'slider_details_section',
			[
				'label' => __( 'Slider Details', 'xampweb-slider' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);
        
        // Slider Speed 

        $this->add_control(
			'slider_speed',
			[
				'label' => __( 'Auto Play Delay', 'xampweb-slider' ),
                'type' => \Elementor\Controls_Manager::NUMBER,
				'min' => 500,
				'max' => 10000,
				'step' => 500,
				'default' => 1000,
			]
        );
        
        // Slider Pause 

        $this->add_control(
			'slider_pause',
			[
				'label' => esc_html__( 'Slider Hover Pause', 'xampweb-slider' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'true',
				'options' => [
					'true' => esc_html__( 'Yes', 'xampweb-slider' ),
					'false'  => esc_html__( 'No', 'xampweb-slider' ),
				],
			]
        );
        
        // Slider Pause 

        $this->add_control(
			'slider_autoplay',
			[
				'label' => esc_html__( 'Slider Autoplay', 'xampweb-slider' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'true',
				'options' => [
					'true' => esc_html__( 'Yes', 'xampweb-slider' ),
					'false'  => esc_html__( 'No', 'xampweb-slider' ),
				],
			]
        );
        
       
        
        $this->end_controls_section();


		// Background Style Tab

		$this->start_controls_section(
			'background_style_section',
			[
				'label' => __( 'Background & Bar Style Section', 'xampweb-slider' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		// Date Background Style

		$this->add_control(
			'slider_bg_color',
			[
				'label' => esc_html__( 'Slider Background Overlay Color', 'xampweb-slider' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .sliderbgoverlay' => 'background-color: {{VALUE}}',
				],
			]
		);

		// Border Style

		$this->add_control(
			'slider_top_border_color',
			[
				'label' => esc_html__( 'Slider Top Border Color', 'xampweb-slider' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .xampslider-caption:before' => 'background-color: {{VALUE}}',
				],
			]
		);

		// Border Style

		$this->add_control(
			'slider_left_border_color',
			[
				'label' => esc_html__( 'Slider Left Border Color', 'xampweb-slider' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .xampslider-caption' => 'border-color: {{VALUE}}',
				],
			]
		);


		// Border Style

		$this->add_control(
			'slider_bottom_border_color',
			[
				'label' => esc_html__( 'Slider Bottom Border Color', 'xampweb-slider' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .xampslider-caption:after' => 'background-color: {{VALUE}}',
				],
			]
		);

		// bar Style

		$this->add_control(
			'slider_bar_color',
			[
				'label' => esc_html__( 'Slider Bar Color', 'xampweb-slider' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .xt_bar_inner' => 'background-color: {{VALUE}}',
				],
			]
		);

		// Circle Style

		$this->add_control(
			'slider_circleone_color',
			[
				'label' => esc_html__( 'Slider Circle 1 Color', 'xampweb-slider' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .xt_bar_inner:before' => 'border-color: {{VALUE}}',
				],
			]
		);

		// Circle Style

		$this->add_control(
			'slider_circletwo_color',
			[
				'label' => esc_html__( 'Slider Circle 2 Color', 'xampweb-slider' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .xt_bar_inner:after' => 'border-color: {{VALUE}}',
				],
			]
		);
        
       
        
        $this->end_controls_section();


		// Heading Details Style Tab

		$this->start_controls_section(
			'heading_style_section',
			[
				'label' => __( 'Heading Style Section', 'xampweb-slider' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		// Heading Name Style

		$this->add_control(
			'heading_color',
			[
				'label' => esc_html__( 'Heading Color', 'xampweb-slider' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .xampslider-caption div' => 'color: {{VALUE}}',
				],
			]
		);

		

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'label' => esc_html__( 'Heading Typography', 'xampweb-slider' ),
				'name' => 'heading_typography',
				'selector' => '{{WRAPPER}} .xampslider-caption div',
			]
		);
		
        
        $this->end_controls_section();



		// Caption Details Style Tab

		$this->start_controls_section(
			'caption_style_section',
			[
				'label' => __( 'Caption Style Section', 'xampweb-slider' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		// Caption Name Style

		$this->add_control(
			'caption_color',
			[
				'label' => esc_html__( 'Caption Color', 'xampweb-slider' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .xampslider-caption p' => 'color: {{VALUE}}',
				],
			]
		);

		

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'label' => esc_html__( 'Caption Typography', 'xampweb-slider' ),
				'name' => 'caption_typography',
				'selector' => '{{WRAPPER}} .xampslider-caption p',
			]
		);
		
        
        $this->end_controls_section();



		// Button Details Style Tab

		$this->start_controls_section(
			'button_style_section',
			[
				'label' => __( 'Button Style Section', 'xampweb-slider' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		// Button Name Style

		$this->add_control(
			'button_bg_color',
			[
				'label' => esc_html__( 'Button Background Color', 'xampweb-slider' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} a.xampsliderbtn' => 'background-color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'button_bg_hover_color',
			[
				'label' => esc_html__( 'Button Background Hover Color', 'xampweb-slider' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} a.xampsliderbtn:after' => 'background-color: {{VALUE}}',
				],
			]
		);


		$this->add_control(
			'button_border_hover_color',
			[
				'label' => esc_html__( 'Button Border Color', 'xampweb-slider' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} a.xampsliderbtn:before' => 'border-color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'button_text_color',
			[
				'label' => esc_html__( 'Button Text Color', 'xampweb-slider' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} a.xampsliderbtn' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'button_text_hover_color',
			[
				'label' => esc_html__( 'Button Text Hover Color', 'xampweb-slider' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} a.xampsliderbtn:hover' => 'color: {{VALUE}}',
				],
			]
		);

		

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'label' => esc_html__( 'Button Typography', 'xampweb-slider' ),
				'name' => 'button_typography',
				'selector' => '{{WRAPPER}} a.xampsliderbtn',
			]
		);
		
        
        $this->end_controls_section();

		
	}

	/**
	 * Render about widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function render() {

        $settings = $this->get_settings_for_display();
        $slider_speed = $settings['slider_speed'];
        $slider_pause = $settings['slider_pause'];
        $slider_autoplay = $settings['slider_autoplay'];
    ?>
   
       
		<script>
			jQuery(document).ready(function($){
				jQuery(".owl-xamp-slider").owlCarousel({
					items:1,
					loop:true,
					margin:0,
					autoplay:<?php echo esc_html( $slider_autoplay );?>,
					autoplayTimeout:<?php echo esc_html( $slider_speed );?>,
					autoplayHoverPause:<?php echo esc_html( $slider_pause );?>
				});
			});
		</script>
		
		<div id="owl-example" class="owl-xamp-slider owl-carousel">
			<?php
				if ( $settings['xampwebmainslider_list'] ) {
					foreach (  $settings['xampwebmainslider_list'] as $item ) {
            ?>
        			
						<div class="owl-slide" style="background-image: url(<?php echo esc_html( $item['main_slider_image']['url'] ); ?>)">
							<div class="sliderbgoverlay" style=" height:100%">
								<div class="xampslider-caption">
									<div><?php echo esc_html( $item['mainslider_list_heading'] ); ?></div>
									<div class="xt_bar_inner xt_bar_innerc"></div>
									<p><?php echo esc_html( $item['mainslider_list_text'] ); ?></p>
									<a href="<?php echo esc_html( $item['mainslider_list_button_url']['url'] ); ?>" class="xampsliderbtn"><?php echo esc_html( $item['mainslider_list_button_text'] ); ?></a>
								</div>
							</div>
						</div>
            <?php
                    }
                }
            ?>
		</div>

    
<?php
	}

}