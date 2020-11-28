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
    let content = `<div class="alert alert-${type} alert-with-icon alert-dismissible fade show" data-notify="container">
        <button type="button" aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">
        <i class="nc-icon nc-simple-remove"></i>
        </button>
        <span data-notify="icon" class="nc-icon ${getIconAlert(type)}"></span>
        <span data-notify="message">${message}</span>
    </div>`;

    $(parentTOPrint).children('.alert').remove();
    $(parentTOPrint).prepend(content);

    // setTimeout(() => {
    //     $(parentTOPrint).children('.alert').remove();
    // }, 17000);
}

/**
 * Permet de faire une redirection vers un autre url
 * @param {String} url L'url de la redirection
 */
function redirect(url) {
    window.location.pathname = url;
}

/**
 * Renvoi l'icon de l'alert
 * @param {String} type Le type de notification
 */
function getIconAlert(type) {
    let icons = {
        success: "nc-check-2",
        danger: "nc-alert-circle-i",
        warning: "nc-alert-circle-i",
        info: "nc-alert-circle-i",
    }

    return icons[type];
}

/**
 * Permet de faire l'upload d'un média
 * @param {Element} element L'élément du fichier à uploader
 * @param {Function} callback 
 */
function uploadMedia(element, callback) {
    let form = document.createElement('form');
    let file = $(element).clone();

    $(file).attr('name', 'media');

    $(form).append(file);

    let formData = new FormData($(form)[0]);

    $.ajax({
        url: '/api/medias/create',
        type: 'POST',
        data: formData,
        dataType: 'json',
        success: function (res) {
            callback(res);
        },
        error: function (err) {
            if (err) {
                // callback(null, err);
                callback({
                    state: false,
                    message: "Une erreur est survenue lors de l'upload",
                    result: null
                });
            }
        },
        mimeType: 'multipart/form-data',
        cache: false,
        contentType: false,
        processData: false
    });
}

function loaderUploadFile(formGroup) {
    $(formGroup).children('.loader-upload-file').remove();
    $(formGroup).addClass('position-relative');
    $(formGroup).prepend(`<i class="fa fa-spinner fa-pulse loader-upload-file text-warning"></i>`);
}

function stopLoaderUploadFile(formGroup) {
    $(formGroup).children('.form-control').addClass('border-success');
    $(formGroup).children('.loader-upload-file').remove();
    $(formGroup).prepend(`<i class="fa fa-check text-success loader-upload-file"></i>`);
}