<?php
/**
 * Header personnalisé pour la page de test
 * On ajoute boostrap car j'utilise souvent cette librairie css/js pour faciliter le responsive
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <title><?php bloginfo( 'name' ); ?> - <?php bloginfo( 'description' ); ?></title>
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<header class="custom-header">
    <div class="container-fluid">
        <div class="row">
            <did class="backgroundlang col-md-12 d-flex justify-content-end">
                <div class="dropdown">
                    <div class="language-selector dropdown-toggle" id="languageDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                        <img id="current-flag" src="https://flagcdn.com/w40/gb.png" alt="English">
                        <span id="current-language">English</span>
                        <i class="bi bi-caret-down-fill"></i>
                    </div>
                    <ul class="dropdown-menu">
                        <li>
                            <a class="dropdown-item language-option" href="#" data-lang="en" data-flag="https://flagcdn.com/w40/gb.png">
                                <img src="https://flagcdn.com/w40/gb.png" alt="English"> English
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item language-option" href="#" data-lang="fr" data-flag="https://flagcdn.com/w40/fr.png">
                                <img src="https://flagcdn.com/w40/fr.png" alt="Français"> Français
                            </a>
                        </li>
                    </ul>
                </div>
            </did>
            <div class="logo-container bg-white col-md-2 d-flex justify-content-center align-items-center">
                <a href="<?php echo home_url(); ?>"><img src="<?php echo plugin_dir_url(__FILE__) . 'logo.png'; ?>" alt="Logo"></a>
            </div>
            <div class="col-md-2 bg-white">
            </div>
            <nav class="menu col-md-7 bg-white navbar navbar-expand-lg justify-content-end">
                <?php
                $menu_items = wp_get_nav_menu_items('Menu Test');
                if ($menu_items) {
                    echo '<ul class="custom-menu-links navbar-nav">';
                    foreach ($menu_items as $item) {
                        if($item->menu_item_parent == 0){
                            if ($item->title === 'CONTACT US') {
                                echo '<li class="nav-item contact-button">';
                                echo '<a class="btn btn-primary contact-link" href="#">' . esc_html($item->title) . '</a>';
                                echo '</li>';
                            }
                            else if ($item->title === 'ABOUT THE GROUP') {
                                // Affiche l'élément "ABOUT THE GROUP" sans afficher le sous-menu dans le header
                                echo '<li class="nav-item">';
                                echo '<a class="nav-link menu-item-dynamic" href="#" data-section="' . sanitize_title($item->title) . '">' . esc_html($item->title) . '</a>';
                                echo '</li>';
                            } else {
                                echo '<li class="nav-item">';
                                echo '<a class="nav-link menu-item-dynamic" href="#" data-section="' . sanitize_title($item->title) . '">' . esc_html($item->title) . '</a>';
                                echo '</li>';
                            }
                        }
                    }
                    echo '</ul>';
                }
                ?>
            </nav>
        </div>
    </div>
</header>