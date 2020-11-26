<div class="content">
    <div class="row">
        <div class="col-lg-12">

        </div>
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">La chèvre de ma mère</h4>
                    <p class="card-card-description">
                        Education financière <br>
                        Par : Jean Claude
                    </p>
                </div>
                <div class="card-body p-4">
                    <div class="row swiper-wrapper">
                        <div class="swiper-wrapper">
                            <?php for($i = 1;$i < 9;$i++) : ?>
                            <div class="col-lg-2 shadow rounded position-relative mr-2 swiper-slide">
                                <div style="position: absolute;background-color: rgba(255,255,255, 0.6);width: 100%;left: 0;"
                                    class="text-center h-100">
                                    <h1 style="margin-top: 40%;"><?= $i ?></h1>
                                </div>
                                <div style="font-size: 3px;" class="p-2">
                                    <h3>Premier chapitre du livre</h3>

                                    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Incidunt doloremque a
                                        iste dignissimos facilis numquam quasi alias nobis sunt tempora! Omnis fugiat
                                        nostrum quidem tenetur, aut sapiente possimus culpa magnam!</p>
                                    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Incidunt doloremque a
                                        iste dignissimos facilis numquam quasi alias nobis sunt tempora! Omnis fugiat
                                        nostrum quidem tenetur, aut sapiente possimus culpa magnam!</p>
                                    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Incidunt doloremque a
                                        iste dignissimos facilis numquam quasi alias nobis sunt tempora! Omnis fugiat
                                        nostrum quidem tenetur, aut sapiente possimus culpa magnam!</p>
                                    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Incidunt doloremque a
                                        iste dignissimos facilis numquam quasi alias nobis sunt tempora! Omnis fugiat
                                        nostrum quidem tenetur, aut sapiente possimus culpa magnam!</p>
                                    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Incidunt doloremque a
                                        iste dignissimos facilis numquam quasi alias nobis sunt tempora! Omnis fugiat
                                        nostrum quidem tenetur, aut sapiente possimus culpa magnam!</p>
                                </div>
                            </div>
                            <?php endfor ?>
                        </div>
                        <div class="swiper-button-next"></div>
                        <div class="swiper-button-prev"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>