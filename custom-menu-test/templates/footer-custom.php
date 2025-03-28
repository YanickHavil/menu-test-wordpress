<?php
/**
 * Footer personnalisé pour la page de test
 */
?>

<?php
if (!defined('ABSPATH')) {
    exit;
}
?>

<footer class="custom-footer">
    <div class="container-fluid footer">
        <div class="row">
            <div class="col-md-1">
            </div>
            <div class="col-md-12 container-fluid">
                <div class ="row">
                    <div class = "logo_footer col-md-2 d-flex">
                        <img src="<?php echo plugin_dir_url(__FILE__) . 'logo_footer.png'; ?>" alt="Logo footer" width ="76" height="30">
                    </div>
                    <div class = "copyright col-md-7 d-flex">
                        © 2025 Repubic GROUP Trademarks and brands are the property of their respective owners. 
                    </div>
                    <div class = "footer_information col-md-3 d-flex">
                        <ul class="menu_footer">
                        <li>
                            PRIVACY POLICY
                        </li>
                        <li>
                            LEGAL INFORMATION
                        </li>
                        </ul>
                    </div>
                
                </div>
            </div>
            <div class="col-md-1">
            </div>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
