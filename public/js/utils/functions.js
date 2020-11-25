/**
 * Ce fichier contient des fonctions utiles dans le projet
 * @author Don de Dieu Bolenge 
 */

/**
 * Permet de mettre le super loader
 * @param {Element} elementContainer L'élément container du loader
 * @param {String} color La couleur
 */
function makeSuperLoader(elementContainer, text = null) {
    $(elementContainer).addClass('position-relative');
    $(elementContainer).children('.super-loader').remove();

    let content = `<div class="super-loader">
                        <div class="lds-roller"><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div></div>

                        ${text ? '<p>' + text + '</p>' : ''}
                    </div>`

    $(elementContainer).prepend(content);
}

/**
 * Stop le super loader
 * @param {Element} elementContainer L'élément container du loader
 */
function stopSuperLoader(elementContainer) {
    $(elementContainer).children('.super-loader').remove();
}

/**
 * Renvoi l'url de la page
 * @return {String}
 */
function getUrl() {
    return window.location.pathname;
}

/**
 * Permet de lancer des fonctions et des instructions par rapport aux urls
 * @param {String} url L'url courant
 * @param {Function} callback La fonction callback à appeler
 */
function router(url, callback) {
    if (getUrl() === url) {
        callback();
    }
}

/**
 * Router par regex
 * @param {String} url L'url
 * @param {Function} callback
 * @returns {void}
 */
function routerRegex (url, callback) {
    let regex = new RegExp("^"+url, "i");

    if (regex.test(getUrl())) {
        callback();
    }
}

/**
 * Permet de lancer une alerte
 * @param {Element} parentTOPrint 
 * @param {String} message Le message à afficher
 * @param {String} type Le type de message
 */
function alertBootstrap(parentTOPrint, message, type = 'info') {
    let content = `<div class="alert alert-${type}">
        ${message}
    </div>`;

    $(parentTOPrint).children('.alert').remove();
    $(parentTOPrint).prepend(content);
}

/**
 * Permet de faire une redirection vers un autre url
 * @param {String} url L'url de la redirection
 */
function redirect(url) {
    window.location.pathname = url;
}