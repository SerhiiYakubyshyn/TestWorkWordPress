<?php
// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

// BEGIN ENQUEUE PARENT ACTION
// AUTO GENERATED - Do not modify or remove comment markers above or below:

if ( !function_exists( 'chld_thm_cfg_locale_css' ) ):
    function chld_thm_cfg_locale_css( $uri ){
        if ( empty( $uri ) && is_rtl() && file_exists( get_template_directory() . '/rtl.css' ) )
            $uri = get_template_directory_uri() . '/rtl.css';
        return $uri;
    }
endif;
add_filter( 'locale_stylesheet_uri', 'chld_thm_cfg_locale_css' );
         
if ( !function_exists( 'child_theme_configurator_css' ) ):
    function child_theme_configurator_css() {
        wp_enqueue_style( 'chld_thm_cfg_child', trailingslashit( get_stylesheet_directory_uri() ) . 'style.css', array( 'twenty-twenty-one-style','twenty-twenty-one-style','twenty-twenty-one-print-style' ) );
    }
endif;
add_action( 'wp_enqueue_scripts', 'child_theme_configurator_css', 10 );

// END ENQUEUE PARENT ACTION

function getChildPath(){
	$pathChild = "http://testtaskwordpress.great-site.net/wp-content/themes/twentytwentyone-child/assets";
	return $pathChild;
}

add_action('wp_enqueue_scripts', 'style_theme');
add_action('wp_footer', 'scripts_theme');

function style_theme(){
	wp_enqueue_style('style', get_stylesheet_uri());
	wp_enqueue_style('styleRegistration', getChildPath() . '/css/styleRegistration.css');
	wp_enqueue_style('bootstrap', 'https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css');
	wp_enqueue_style('font_family_Inter', getChildPath() . '/fonts/inter/stylesheet.css');
}

function scripts_theme(){
	wp_enqueue_script('javaScript', getChildPath() . '/js/registration.js');
}

add_action('wp_enqueue_scripts', 'add_jquery');
function add_jquery(){
	wp_deregister_script('jquery-core');
	wp_deregister_script('jquery');
	wp_register_script('jquery-core', 'https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js',false,null,true);
	wp_register_script('jquery', false, array('jquery-core'),null,true);
	wp_enqueue_script('jquery');
}

/////////////////////////////////////////////////

add_shortcode( 'r_test', 'shortcode_vis' );

function shortcode_vis($atts, $content) {	
	global $post;
	?>

<div class="conteiner row-12">

        <ul id="breadcrumbs" class="row">
          <li id="homeLi" class="col-sm-auto"><a href="" class="first"><img class="img-home" src="<?php echo getChildPath();?>/image/home.png" alt="home"></a></li>
          <li id="contactInfoLi" class="col-sm-auto"><a href="" >Contact Info </a></li>
          <li id="quantityLi" class="col-sm-auto"><a href="" >Quantity </a></li>
          <li id="priceLi" class="col-sm-auto"><a href="" >Price </a></li>
          <li id="doneLi" class="col-sm-auto"><a href="" class="current">Done </a></li>
        </ul>
        <div class="registerMenu row-12">

          <form class="formRegistration" id="ajax_form">
            <div class="listMenu">
              <div class="ContactInfo row-12" id="ContactInfo">
                <h1 class="h1Bigest">Contact Info</h1>

                  <div class="row marginRow">
                    <div class="col-sm-3 alingRight">Name</div>
                    <input class="col-sm-5 inputStyle" id="name" name="name" type="text">
                  </div>
                  <div class="row marginRow">
                    <div class="col-sm-3 alingRight">Email <sup><small>required </small></sup></div>
                    <input class="col-sm-5 inputStyle" id="email" name="email" type="email">
                  </div>
                  <div class="row marginRow">
                    <div class="col-sm-3 alingRight">Phone</div>
                    <input class="col-sm-5 inputStyle" id="phone" name="phone" type="phone">
                  </div>
              </div>

              <div class="Quantity row-12" id="Quantity">
                <h1 class="h1Bigest">Quantity</h1>
                  <div class="row">
                    <div class="col-sm-3 alingRight">Quantity <sup><small>required </small></sup></div>
                    <input class="col-sm-5 inputStyle" id="quantity" name="quantity" type="number" min="1" max="1000" size="4" onkeyup="this.value = this.value.replace(/\D/, '');">
                  </div>
              </div>

              <div class="Price row" id="Price">
                <h1 class="h1Bigest">Price</h1>
				<input id="priceText" name="priceText" type="text" readonly>
              </div>

              <div class="Done row" id="Done">
                <h1 class="h1Bigest">Done</h1>
                <p id ="doneIsSend" class="feedbackSend">&#9989; You email was send successfully</p>
                <p id ="doneDontSend" class="feedbackSend"><span class="red">&#9888;</span> We cannot send you email right now. Use alternative way to contact us</p>
              </div>
            </div>

            <div class="buttunconteiner row align-items-end">
              <button class="col-sm-auto" type="button" id="continue" name="continue">Continue</button>
              <button class="col-sm-auto" type="button" id="back" name="back">&#8592; Back</button>
              <button class="col-sm-auto" type="button" id="send" name="send">Send to Email</button>
              <button class="col-sm-auto" type="button" id="start" name="start">Start again &#8594;</button>
            </div>
          </form>

        </div>
    </div>

	<?php
	return '<p id="myTitleText" class="title">' . get_the_title($post) . '</p>' . '<p id="descriptionText" class="caption">' . $content . '</p>';
}

////////////////////////////////////////////////


