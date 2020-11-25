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