<?php
if (isset($_GET['section'])) {
    $section = $_GET['section'];

    if ($section === 'about-the-group') {

        var_dump( wp_get_nav_menu_items('Menu Test'));
        $submenu_items = [];
        // Recherche des éléments de sous-menu pour "ABOUT THE GROUP" en utilisant l'ID
        foreach ($menu_items as $item) {
            if ($item->menu_item_parent->title == "ABOUT THE GROUP") {
                $submenu_items[] = $item;
            }
        }
        
        echo'coucou';
        if ($submenu_items) {
            echo '<ul class="d-flex flex-row">';
            foreach ($menu_items as $item) {
                echo '<li class="col-md-4">';
                echo '<a class="nav-link menu-item-dynamic" href="#" data-section="' . sanitize_title($item->title) . '">' . esc_html($item->title) . '</a>';
                echo '<p class="submenu-description>'. esc_html($item->description) . '</p>';
                echo '</li>';
            }
            echo '</ul>';
        }
        echo '</div>';
        
    } elseif ($section === 'distribution-network') {
        echo '<h2>Distribution Network</h2>';
        echo '<p>Information about our distribution network.</p>';
    } else {
        echo '<h2>Bienvenue</h2>';
        echo '<p>Ceci est un test avec un menu personnalisé et un footer spécifique.</p>';
    }
}
?>
