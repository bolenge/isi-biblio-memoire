/**
 * Dynamisation dashboard
 * @author Don de Dieu Bolenge <https://github.com/bolenge>
 */

import { getCountCategoriesActives } from "./categories.js";

/**
 * Init dashboard
 */
export function initDashboard() {
    // $('#count-category').html('<i class="fa fa-spinner fa-pulse"></i>');
    getCountCategoriesActives(function (count) {
        $('#count-category').html(count);
    })


}