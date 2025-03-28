<?php
/**
 * Template Name: Menu Test Page
 * Description: Page affichant le header et le footer personnalisés du plugin.
 * Permet d'avoir une page de test pour faciliter l'implémentation et les tests.
 */


require(plugin_dir_path(__FILE__) . 'header-custom.php');
?>

<div class="container-fluid contentbackground">
    <div class="row">
        <div class="col-md-1">
        </div>
        <div class="col-md-10">
            <div class="row w-100">
                <div class="menu-content d-flex">
                    <h1>Bienvenue sur la page de test du menu</h1>
                </div>
            </div>
        </div>

        <div class="col-md-1">
        </div>
    </div>
</div>

<?php
require(plugin_dir_path(__FILE__) . 'footer-custom.php');
?>