 <?php
/**
 * Plugin Name: Custom Menu Test
 * Plugin URI: https://example.com
 * Description: Plugin pour tester un menu personnalisé WordPress avec header et footer dédiés
 * Version: 1.2
 * Author: Havil
 * Author URI: https://havil.studio
 */

// Inclure le fichier API
require_once plugin_dir_path(__FILE__) . 'includes/api.php';

if (!defined('ABSPATH')) {
    exit; // Sécurité : Empêche l'accès direct
}

// Fonction pour forcer l'utilisation du bon template pour la page "menu-test"
function custom_menu_test_template($template) {
    if (is_page('menu-test')) {
        return plugin_dir_path(__FILE__) . 'templates/page-menu-test.php';
    }
    return $template;
}
add_filter('template_include', 'custom_menu_test_template');

// Ajouter les styles CSS du menu
function cmt_enqueue_assets() {

    // Bootstrap
    wp_enqueue_style('bootstrap-css', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css');
    wp_enqueue_script('bootstrap-js', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js', array('jquery'), null, true);

    // CSS du plugin
    wp_enqueue_style('cmt-style', plugins_url('assets/css/styles.css', __FILE__));

    // JS du plugin
    wp_enqueue_script('cmt-lang-switcher', plugins_url('assets/js/language-switcher.js', __FILE__), array('jquery'), null, true);
    wp_enqueue_script('menu-dynamic', plugin_dir_url(__FILE__) . 'assets/js/menu-dynamic.js', array('jquery'), null, true);


    wp_localize_script('menu-dynamic', 'imageData', [
        'imageProduction' => plugin_dir_url(__FILE__) . 'assets/images/IMG_Production.png',
        'imageBrands' => plugin_dir_url(__FILE__) . 'assets/images/IMG_Brands.png',
        'imageDistribution' => plugin_dir_url(__FILE__) . 'assets/images/IMG_Distribution.png'

    ]);
}
add_action('wp_enqueue_scripts', 'cmt_enqueue_assets');

// On enregistre le menu dans le thème actuel.
function custom_register_menu() {
    register_nav_menu('custom-menu', 'Menu Test');
}
add_action('after_setup_theme', 'custom_register_menu');

// Création automatique du menu et ajout des liens lors de l'activation du plugin
function custom_create_menu() {
    $menu_name = 'Menu Test';
    $menu_exists = wp_get_nav_menu_object($menu_name);

    if (!$menu_exists) {
        $menu_id = wp_create_nav_menu($menu_name);
        
        // Liste des liens
        $menu_items = [
            'ABOUT THE GROUP' => '#',
            'DISTRIBUTION NETWORK' => '#',
            'OUR BRANDS' => '#',
            'PRODUCTION SITES' => '#',
            'OUR COMMITMENTS' => '#',
            'CONTACT US' => '#'
        ];

        // Stocker l'ID de chaque élément créé pour gérer les sous-menus
        $menu_item_ids = [];
        
        foreach ($menu_items as $title => $url) {
            $menu_item_ids[$title] = wp_update_nav_menu_item($menu_id, 0, [
                'menu-item-title' => $title,
                'menu-item-url' => $url,
                'menu-item-status' => 'publish'
            ]);
        }

        // Ajout du sous-menu pour "ABOUT THE GROUP"
        if (isset($menu_item_ids['ABOUT THE GROUP'])) {
            $submenu_items = [
                'General Information' => [
                    'url' => '#',
                    'description' => 'Turpis commodo tristique purus non varius cursus dictum id. Amet neque habitant enim diam nam.'
                ],
                'History of the Group' => [
                    'url' => '#',
                    'description' => 'Turpis commodo tristique purus non varius cursus dictum id. Amet neque habitant enim diam nam.'
                ]
            ];

            foreach ($submenu_items as $title => $data) {
                wp_update_nav_menu_item($menu_id, 0, [
                    'menu-item-title' => $title,
                    'menu-item-url' => $data['url'],
                    'menu-item-status' => 'publish',
                    'menu-item-parent-id' => $menu_item_ids['ABOUT THE GROUP'],
                    'menu-item-description' => $data['description'] // Ajout de la description
                ]);
            }
        }

        // Associer le menu au bon emplacement
        $locations = get_theme_mod('nav_menu_locations');
        $locations['custom-menu'] = $menu_id;
        set_theme_mod('nav_menu_locations', $locations);
    }
}
register_activation_hook(__FILE__, 'custom_create_menu');
