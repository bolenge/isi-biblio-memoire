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