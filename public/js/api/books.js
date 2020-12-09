/**
 * Gestion de books
 * @author Don de Dieu Bolenge <https://github.com/bolenge>
 */

export function initBooks() {
    $('.file-to-upload').on('change', function (e) { 
        let $this = this;
        let parent = $(this).parent('.form-group');
        let id = $(this).attr('data-id');

        loaderUploadFile(parent);

        uploadMedia(this, function (response) {
            stopLoaderUploadFile(parent);

            if (response) {
                if (response.state) {
                    $('#'+id).val(response.result.path);
                } else {
                    swal({
                        title: "Alert !",
                        text: response.message,
                        icon: "warning",
                        button: true
                    })
                }
            } else {
                swal({
                    title: "Alert !",
                    text: "Une erreur est survenue, réessayez ou actualisez la page ",
                    icon: "warning",
                    button: true
                })
            }
        })
    })

    createBook();
}

/**
 * Publication d'un livre par un user
 */
export function createBook() {
    $('#form-create-book').on('submit', function (e) {
        e.preventDefault();
        const $this = this;
        
        $.ajax({
            url: '/api/books/create',
            type: "POST",
            data: $(this).serialize(),
            dataType: 'json',
            beforeSend: () => {
                makeSuperLoader($('#card-create-book'))
            },
            complete: () => {
                stopSuperLoader($('#card-create-book'))
            },
            success: (response) => {
                console.log(response);
                if (response) {
                    if (response.state) {
                        $this.reset();

                        alertBootstrap($('#col-create-book'), response.message, 'success');

                        setInterval(function () { 
                            redirect('/my-books');
                        }, 3000)
                    } else {
                        alertBootstrap($('#col-create-book'), response.message, 'danger');
                    }
                } else {
                    alertBootstrap($('#col-create-book'), "Une erreur est survenue, réessayez", 'danger');
                }
            },
            error: (err) => {
                console.log(err)
            }
        })
    })
}

/**
 * Recherche des books
 */
export function searchBooksForUser() {
    $('#input-search').on('focus', function (e) {
        $('#block-search').addClass('call-block-search');
        $('#block-search').removeClass('close-call-block-search');
    })

    $('#btn-close-search').on('click', function (e) {
        $('#block-search').removeClass('call-block-search');
        $('#block-search').addClass('close-call-block-search');
    })

    $('#input-search').on('keyup', function (e) {
        let value = this.value;

        value = value.trim();

        if (value.length > 0) {

            $.ajax({
                type: "POST",
                url: "/api/books/search",
                beforeSend: () => {
                    makeSuperLoader($('#content-search'))
                },
                data: {
                    query: value
                },
                dataType: "json",
                success: function (response) {
                    if (response) {
                        if (response.state) {
                            if (response.result.length > 0) {
                                $('#search-title').html('Résultat de la recherche :');
                                $('#content-search').html('');
                                
                                response.result.forEach((book, index, tab) => {
                                    $('#content-search').append(`<div class="col-xl-3 col-lg-4 col-md-4">
                                        <div class="card">
                                            <div class="card-body text-center p-2 pb-0">
                                                <a href="/books/${book.id}">
                                                    <img src="/${book.cover ? book.cover : "public/img/books/default-book-cover.png"}" alt="Image de ${book.title}" class="img-book" />
                                                </a>

                                                <div class="description pt-3">
                                                    <h6 class="title-book">${book.title.substr(0, 35)}</h6>
                                                    <p class="pb-0 mb-0">${book.other.substr(0, 35)}</p>
                                                </div>
                                            </div>
                                            <div class="card-footer p-2">
                                                <div class="legend text-center">
                                                    <i class="fa fa-star text-warning"></i>
                                                    <i class="fa fa-star text-warning"></i>
                                                    <i class="fa fa-star text-warning"></i>
                                                    <i class="fa fa-star-half-o text-warning"></i>
                                                    <i class="fa fa-star-o text-warning"></i>
                                                </div>
                                                <hr>
                                                <div class="stats text-center">
                                                    <a href="/books/${book.id}"><i class="fa fa-book"></i> eBook</a>${book.fileAudio ? ' | <a href="/'+book.fileAudio+'"><i class="fa fa-play-circle"></i> Audio</a>' : ''}
                                                </div>
                                            </div>
                                        </div>
                                    </div>`)
                                })
                            } else {
                                $('#search-title').html('Aucun résultat trouvé !');
                            }
                        } else {
                            $('#search-title').html('Aucun résultat trouvé !');
                        }
                    } else {
                        $('#search-title').html('Aucun résultat trouvé !');
                    }
                },
                error: (err) => {
                    console.log(err);
                    $('#search-title').html('Aucun résultat trouvé !');
                }
            });
        }
    })
}