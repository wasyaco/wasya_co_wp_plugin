<?
/**
 * Plugin Name:       Wasya Co Wp Plugin
 *
 *                    Good for 2023-01-07:
 * Version:           0.1.6
 * Requires at least: 5.2
 * Requires PHP:      7.2
 **/

if (!defined('ABSPATH')) {
  exit;
}

function wco_init() {
  if (!function_exists('get_plugin_data')) {
    require_once(ABSPATH . 'wp-admin/includes/plugin.php');
  }
  $plugin_data = get_plugin_data(__FILE__);

  wp_register_style('wasya_co_wp_plugin_style', plugins_url('style.css', __FILE__), false, $plugin_data['Version'], 'all');
  wp_enqueue_style('wasya_co_wp_plugin_style');

  wp_enqueue_script('wasya_co_wp_plugin_js',
    plugins_url('scripts.js', __FILE__),
    array('jquery'),
    wp_get_theme()->get( 'Version' ),
    true // in footer
  );
}
add_action( 'wp_enqueue_scripts', 'wco_init' );



function register_card_widget($widgets_manager) {
  require_once(__DIR__ . '/widgets/card_widget.php');
  $widgets_manager->register(new \CardWidget());
}
add_action('elementor/widgets/register', 'register_card_widget');


/*
 * Card3d
 * This will not be used - I should register it as an elementor widget, instead.
 * _vp_ 2023-01-07
 */
function card3d_uiux_20230107_shortcode() {
?>
  <div class="Card3d-20230107" id="Card3d_uiux_20230107" >
    <div class="cover">
      <h1>UI/UX</h1>
      <span class="price">&gt;&gt;&gt;</span>
      <div class="card-back">
        <!-- <a href="/w/services/uiux">Read More</a> -->
        <p>Modern software tools are expected to be highly usable, to the degree of not requiring documentation. The user interface should be self-explanatory, and the user experience intuitive.</p>
      </div>
    </div>
  </div>
<?
}
add_shortcode('card3d_uiux_20230107', 'card3d_uiux_20230107_shortcode');





function under_construction_20230107_shortcode() {

  //   <div class="wco-logo-column">
  //   <img width="259" height="66" src="https://d15g8hc4183yn4.cloudfront.net/wp-content/uploads/2022/09/29185755/259x66-WasyaCo-Logo-YellowShadow.png" class="attachment-full size-full" alt="" loading="lazy" style="width:100%;height:25.48%;max-width:259px">
  //   <div class="wco-divider">
  //     <span class="wco-divider-separator">
  //     <div class="wco-icon">
  //       <i aria-hidden="true" class="fas fa-leaf"></i>
  //     </div>
  //     </span>
  //   </div>
  //   <div>
  //     Est. 2013
  //   </div>
  // </div>

?>
<section class="UnderConstruction20230107">

  <div class="W0_20230107">
    <!-- <p>Wasya Co is a software development consultancy
      for small and medium Enterprises. We offer innovative technical solutions
      to complex and domain-specific business needs.</p> -->
    <div class="the-dude"></div>
  </div>

  <div class="the-floor"></div>
</section>
<?
}
add_shortcode('under_construction_20230107', 'under_construction_20230107_shortcode');

/*
 * Card3d marketing
 * _vp_ 2023-01-07
**/
function card3d_marketing_20230107_shortcode($raw_attrs) {
  $attrs = shortcode_atts( array(
    'title' => 'Some Title',
    'icon' => 'lightbulb',
    'body' => '<p>Hello, <b>world</b>!</p>',
    'imgurl' => 'https://d15g8hc4183yn4.cloudfront.net/wp-content/uploads/2023/01/07182225/300x230_marketing.jpeg',
  ), $raw_attrs );
?>

<div class="Card3d-Marketing-20230107">
  <div class="grid">
    <div class="text-component">
      <h1><?= $attrs['title']; ?></h1>
      <div class="W2">
        <span></span>
        <i aria-hidden="true" class="far fa-<?= $attrs['icon']; ?>"></i>
        <span></span>
      </div>
      <?= $attrs['body']; ?>
    </div>

    <div class="td-figure" >
      <img style="width: 300px" src="<?= $attrs['imgurl']; ?>" alt="" />
    </div>
  </div>
</div>

<?
}
add_shortcode('card3d_marketing_20230107', 'card3d_marketing_20230107_shortcode');


