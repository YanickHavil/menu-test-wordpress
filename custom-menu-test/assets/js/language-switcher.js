jQuery(document).ready(function ($) {
    $(".language-option").click(function (e) {
        e.preventDefault();
        let selectedLang = $(this).data("lang");
        let selectedFlag = $(this).data("flag");
        let selectedText = $(this).text().trim();

        $("#current-flag").attr("src", selectedFlag);
        $("#current-language").text(selectedText);
    });
});