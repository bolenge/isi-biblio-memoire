/**
 * Gestion de catégories
 * @author Don de Dieu Bolenge <https://github.com/bolenge>
 */

/**
 * Récuperation nombre de catégories
 * @param {Function} callback 
 */
export function getCountCategoriesActives(callback) {
    $.ajax({
        type: "GET",
        url: "/api/categories/count/actives",
        dataType: "json",
        success: function (response) {
            if (response) {
                if (response.state) {
                    callback(response.result)
                } else {
                    callback(0);
                }
            } else {
                callback(0);
            }
        },
        error: function () {
            callback(0);
        }
    });
}