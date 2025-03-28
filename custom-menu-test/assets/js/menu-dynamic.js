document.addEventListener("DOMContentLoaded", function () {
    const menuLinks = document.querySelectorAll(".menu-item-dynamic");
    const contentContainer = document.querySelector(".menu-content");

    menuLinks.forEach(link => {
        link.addEventListener("click", function (e) {
            e.preventDefault();

            menuLinks.forEach(item => item.classList.remove("active"));

            this.classList.add("active");

            let section = this.getAttribute("data-section");

            // Appel à l'API REST
            fetch(`/wp-json/custom-menu-test/v1/section/?section=${section}`)
                .then(response => response.json())
                .then(data => {
                    if (data) {
                        if (section === "about-the-group") {
                        // Remplir le conteneur de contenu avec les données récupérées
                        contentContainer.innerHTML = generateSubMenuHTML(data);
                        setupSubmenuEvents();
                        }
                        else if(section === "distribution-network") {
                            contentContainer.innerHTML = generateDistributionHTML();
                            setupDistributionEvents(); // Gérer les sous-sections RYO/MYO et OPTICS
                        }
                        else if(section === "our-brands") {
                            contentContainer.innerHTML = generateOurBrandsHTML();
                            setupBrandsEvents(); // Gérer les sous-sections RYO/MYO et OPTICS
                        }
                        else if(section === "production-sites") {
                            contentContainer.innerHTML = generateProductionSitesHTML();
                            setupProductionEvents();
                        }
                    } else {
                        contentContainer.innerHTML = 'Aucune donnée disponible.';
                    }
                })
                .catch(error => console.error("Erreur de chargement du contenu :", error));
        });
    });

    // Fonction pour générer le HTML du sous-menu à partir des données récupérées
    function generateSubMenuHTML(submenuItems) {
        let html = '<ul class="submenu-list d-flex w-100">';
        submenuItems.forEach(item => {
            html += `<li class="submenu-list-element  col-md-4">
                        <a class="nav-link submenu-link" href="#">${item.title}</a>
                        <p class="submenu-description">${item.description}</p>
                    </li>`;
        });
        html += '</ul>';
        return html;
    }

    // Fonction pour générer la structure du menu "DISTRIBUTION NETWORK"
    function generateDistributionHTML() {
        return `
            <div id="distribution-menu" class="container">
                <div class="row">
                    <div class="col-md-3">
                        <div class="sub-section active" data-section="ryo">
                            RYO - MYO <span class="arrow">›</span>
                        </div>
                        <hr class="separator" style="border-color: #C5E3EF; height: 1px;">
                        <div class="sub-section" data-section="optics">
                            OPTICS <span class="arrow">›</span>
                        </div>
                    </div>
                    <div class="col-md-9 justify-content-center d-flex">
                        <div id="distribution-content">
                            <!-- Contenu dynamique ici -->
                            <!-- On le remplace par une image mais en cas réel on prendrais des posts -->

                        </div>
                    </div>
                </div>
            </div>
        `;
    }

    // Fonction pour générer la structure du menu "OUR BRANDS"
    function generateOurBrandsHTML() {
        return `
            <div id="brands-menu" class="container">
                <div class="row">
                    <div class="col-md-3">
                        <div class="sub-section active" data-section="ryo">
                            RYO - MYO <span class="arrow">›</span>
                        </div>
                        <hr class="separator" style="border-color: #C5E3EF; height: 1px;">
                        <div class="sub-section" data-section="optics">
                            OPTICS <span class="arrow">›</span>
                        </div>
                        <hr class="separator" style="border-color: #C5E3EF; height: 1px;">
                        <div class="sub-section" data-section="vape">
                            VAPE <span class="arrow">›</span>
                        </div>
                    </div>
                    <div class="col-md-9 justify-content-center d-flex">
                        <div id="brands-content">
                            <!-- Contenu dynamique ici -->
                            <!-- On le remplace par une image mais en cas réel on prendrais des posts -->
                        </div>
                    </div>
                </div>
            </div>
        `;
    }

    // Fonction pour générer la structure du menu "PRODUCTION SITES"
    function generateProductionSitesHTML() {
        return `
            <div id="production-menu" class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div id="production-content">
                            <!-- Contenu dynamique ici -->
                            <!-- On le remplace par une image mais en cas réel on prendrais des posts -->
                            <img src="${imageData.imageProduction}" alt="Production Site">
                        </div>
                    </div>
                </div>
            </div>
        `;
    }

    
    // Fonction pour gérer les événements sur RYO/MYO et OPTICS
    function setupDistributionEvents() {
        const subSections = document.querySelectorAll(".sub-section");
        const contentContainer = document.getElementById("distribution-content");
        contentContainer.classList.remove('transitionY');

        subSections.forEach(section => {
            section.addEventListener("click", function () {
                subSections.forEach(s => s.classList.remove("active"));
                this.classList.add("active");

                let selectedSection = this.getAttribute("data-section");

                // Simuler du contenu dynamique
                contentContainer.innerHTML = `<img src="${imageData.imageDistribution}" alt="Brands Site">`;
            });
        });

        // Définir la section "RYO - MYO" comme active par défaut
        document.querySelector(".sub-section.active").click();
        // Permet d'ajouter une transition sympa
        setTimeout(() => {
            contentContainer.classList.add("transitionY");
        }, 50); 
    }

    // Fonction pour gérer les événements sur RYO/MYO et OPTICS
    function setupBrandsEvents() {
        const subSections = document.querySelectorAll(".sub-section");
        const contentContainer = document.getElementById("brands-content");
        contentContainer.classList.remove('transitionY');

        subSections.forEach(section => {
            section.addEventListener("click", function () {
                subSections.forEach(s => s.classList.remove("active"));
                this.classList.add("active");

                let selectedSection = this.getAttribute("data-section");

                // Simuler du contenu dynamique
                contentContainer.innerHTML = `<img src="${imageData.imageBrands}" alt="Brands Site">`;

            });
        });

        // Définir la section "RYO - MYO" comme active par défaut
        document.querySelector(".sub-section.active").click();
        // Permet d'ajouter une transition sympa
        setTimeout(() => {
            contentContainer.classList.add("transitionY");
        }, 50); 
    }

});
// Permet d'ajouter une transition sympa
    function setupProductionEvents() {
        const contentContainer = document.getElementById("production-content");
        contentContainer.classList.remove('transitionY');

        
        setTimeout(() => {
            contentContainer.classList.add("transitionY");
        }, 50); 
    }
// Permet d'ajouter une transition sympa
    function setupSubmenuEvents() {
        const submenu = document.querySelector(".submenu-list"); 


        submenu.classList.remove('transitionY');


        setTimeout(() => {
            submenu.classList.add("transitionY");
        }, 50);
    }

