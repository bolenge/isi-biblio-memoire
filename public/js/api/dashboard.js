/**
 * Dynamisation dashboard
 * @author Don de Dieu Bolenge <https://github.com/bolenge>
 */

import { getCategoriesActives, getCountCategoriesActives } from "./categories.js";

/**
 * Init dashboard
 */
export function initDashboard() {
    // $('#count-category').html('<i class="fa fa-spinner fa-pulse"></i>');
    getCountCategoriesActives(function (count) {
        $('#count-category').html(count);
    })
}

/**
 * Chargement de catégories sur la navbar
 */
export function loadCategoriesOnNavbar() {
    getCategoriesActives(function (response) {
        if (response) {
            if (response.state) {
                if (response.result.length > 0) {
                    $('#menu-list-categories').html('');

                    response.result.forEach((category, index, tab) => {
                        index++;

                        $('#menu-list-categories').append(`<a class="dropdown-item" href="/categories/${category.id}">${category.intituled}</a>`);
                    })
                } else {
                    $('#menu-list-categories').append(`<a class="dropdown-item" href="#">Aucune catégorie trouvée</a>`);
                }
            } else {
                $('#menu-list-categories').append(`<a class="dropdown-item" href="#">Aucune catégorie trouvée</a>`);
            }
        } else {
            $('#menu-list-categories').append(`<a class="dropdown-item" href="#">Aucune catégorie trouvée</a>`);
        }
    })
}