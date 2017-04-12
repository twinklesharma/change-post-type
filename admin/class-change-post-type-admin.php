<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       twinklesharma29
 * @since      1.0.0
 *
 * @package    Change_Post_Type
 * @subpackage Change_Post_Type/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Change_Post_Type
 * @subpackage Change_Post_Type/admin
 * @author     Twinkle Sharma <twinkle.sharma@daffodilsw.com>
 */
class Change_Post_Type_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Change_Post_Type_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Change_Post_Type_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/change-post-type-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Change_Post_Type_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Change_Post_Type_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/change-post-type-admin.js', array( 'jquery' ), $this->version, false );

	}
        
        public function so_custom_meta_box($post){
            add_meta_box('so_meta_box', 'Custom Meta Box', array($this,'custom_element_grid_class_meta_box'), 'post', 'normal' , 'high');
        }
        
        public function so_save_metabox(){ 
            global $post;
            global $wpdb;
            if(isset($_POST["custom_element_grid_class"])){
              $meta_element_class = $_POST['custom_element_grid_class'];
              update_post_meta($post->ID, 'custom_element_grid_class_meta_box', $meta_element_class);
              $my_post['post_type'] = $meta_element_class;
              $query = "UPDATE $wpdb->posts SET post_type = '".$meta_element_class."' WHERE ID = ".$post->ID ;
              $res = $wpdb->query( $query);
            }
        }    
            
        public function custom_element_grid_class_meta_box($post) {
            $meta_element_class = get_post_meta($post->ID, 'custom_element_grid_class_meta_box', true); //true ensures you get just one value instead of an array
            ?>   
            <label>Choose the custom type post :  </label>

            <select name="custom_element_grid_class" id="custom_element_grid_class">
                <?php 
                $args=array(
                             'public'   => true,
                             '_builtin' => false
                             ); 
                        $output = 'names';
                        $operator = 'and';
                        $post_types=get_post_types($args,$output,$operator); 
                foreach ( $post_types as $mypost  ) : ?>
        <option value="<?php echo $mypost; ?>" <?php selected( $meta_element_class, $mypost ); ?>><?php echo $mypost; ?></option>
<!--        <?php //set_post_type( 180, $mypost ); ?>   compares $meta_element_class-->
        <?php endforeach; ?>

            </select>
            <?php
        }
}
