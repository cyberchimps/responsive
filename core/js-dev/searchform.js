/**
 * File searchform.js.
 *
 * Handles display of header search element's form.
 * 
 */

( function() {

    document.addEventListener("DOMContentLoaded", function () {

        const containers    = document.getElementsByClassName("responsive-header-search");
        const search_link   = document.getElementById("res-search-link");
        const search_style  = document.getElementById("full-screen-res-search-link");
        const search_close  = document.getElementById("search-close");
        const searchSubmits = document.querySelectorAll('.search-submit');

        if (search_link && containers.length > 0) {
            let sibling;
        
            search_link.addEventListener("click", function () {
                sibling = this.parentNode.querySelector(".search-type-responsive-slide");
                if (sibling) {    
                    Array.from(containers).forEach((container) => {
                        let search_form = container.querySelector("#searchform");
                        if (search_form) {
                            sibling.classList.add("search-active");
                            setTimeout(() => {
                                search_form.querySelector("input[type='search']").focus();
                            }, 50);
                        }
                    });
                }
            });
        
            // Hide search form if clicking outside
            document.addEventListener("click", function (event) {
                Array.from(containers).forEach(function (container) {
                    var search_form = container.querySelector("#searchform");
                    if (search_form && sibling && !container.contains(event.target)) {
                        sibling.classList.remove('search-active');
                    }
                });
            });
        }       

        searchSubmits.forEach(searchSubmit => {
            searchSubmit.addEventListener('click', function(event) {
                if (this.classList.contains('responsive-header-slide-search')) {
                    event.preventDefault();
                    const searchForm = this.closest('.search-type-responsive-slide').querySelector('.search-form'); // Replace '.parent-selector' with the appropriate parent selector

                    if (searchForm) {
                        const searchField = searchForm.querySelector('.search-field');
                        const searchTerm = searchField ? searchField.value.trim() : '';
        
                        if (searchTerm) {
                            searchForm.submit();
                        } else {
                            searchForm.parentElement.classList.remove('search-active');
                        }
                    }
                }
            });
        });
    
        if (search_style && containers.length > 0) {
            var search_style_form = document.getElementById("full-screen-search-wrapper");
            if (search_style_form) {
                search_style.onclick = function () {
                    search_style_form.style.display = "block";
                    search_style_form.style.position = "fixed";
                    Array.from(containers).forEach(function (container) {
                        var search_form = container.getElementsByTagName("form")[0];
                        if (search_form) {
                            search_form.style.display = "block";
                            search_form.querySelector("input[type='search']").focus();
                        }
                    });
                };
            }
        }
    
        if (search_close) {
            search_close.onclick = function () {
                var search_style_form = document.getElementById("full-screen-search-wrapper");
                if (search_style_form) {
                    search_style_form.style.display = "none";
                }
            };
        }
    });
    

} )();