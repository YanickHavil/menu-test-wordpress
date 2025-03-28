<?php

// On configure l'API REST
function custom_menu_test_register_rest_endpoint() {
    register_rest_route('custom-menu-test/v1', '/section/', array(
        'methods' => 'GET',
        'callback' => 'custom_menu_test_handle_section_request',
        'permission_callback' => '__return_true', // Ou une vérification de permission spécifique
    ));
}
add_action('rest_api_init', 'custom_menu_test_register_rest_endpoint');



// Fonction pour gérer la requête de l'API
function custom_menu_test_handle_section_request(WP_REST_Request $request) {
    // Récupérer la section depuis la requête
    $section = $request->get_param('section');

    // Traiter la section et renvoyer le contenu approprié
    if ($section === 'about-the-group') {
        // Récupérer les éléments de menu
        $menu_items = wp_get_nav_menu_items('Menu Test');
        $submenu_items = [];

        foreach ($menu_items as $item) {
            if ($item->menu_item_parent == 0) {
                continue;
            }
            $submenu_items[] = $item;
        }

        return new WP_REST_Response($submenu_items, 200);
    }
    /*
     * On peut imaginer ici de pouvoir récuperer les posts en fonction des sous-section à l'évènement au clic.
     * En ajoutant un else if($section === 'distribution-network' ou encore submenu === 'RYO - MYO') etc...
     */
    return new WP_REST_Response('Section not found', 404);
}
