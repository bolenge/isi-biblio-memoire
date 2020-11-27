/**
 * Gestion de catégories
 * @author Don de Dieu Bolenge <https://github.com/bolenge>
 */

/**
 * Récuperation nombre de catégories actives
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

/**
 * Récuperation de catégories actives
 * @param {Function} callback 
 */
export function getCategoriesActives(callback) {
    $.ajax({
        type: "GET",
        url: "/api/categories/all/actives",
        dataType: "json",
        success: function (response) {
            callback(response);
        },
        error: function (err) {
            callback({
                state: false,
                message: "Une erreur est survenue lors de la récupération de catégories",
                result: null
            });
        }
    });
}