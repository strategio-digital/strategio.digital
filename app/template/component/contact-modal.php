<div id="contact-modal" class="modal fade" role="dialog" aria-labelledby="contactModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="overflow-hidden position-absolute w-100 h-100">
            <img src="/temp/static/img/strategio-shark-right.svg" alt="Stavíme ziskové weby a marketing" style="height: 100%; max-width: 100%; padding: 3rem; position: absolute; right: 0; top: 0; pointer-events: none">
        </div>

        <div class="modal-content position-absolute border-0 d-none d-md-block">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close" role="button">
                <i class="fas fa-times fa-3x"></i><br>
                <span class="small">zavřít okno</span>
            </button>
        </div>

        <div class="d-flex align-items-center contact-modal">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8 col-xl-7">
                        <div class="modal-content py-4 py-md-5 px-4 px-md-5 shadow-lg">
                            <div class="h1 mb-0 font-weight-bold">
                                Domluvte si konzultaci
                            </div>

                            <div class="d-xl-flex mb-4 mb-md-5">
                                <div class="contact-person">
                                    <img src="/temp/static/image/about-us/zapletal.png" alt="Jiří Zapletal">
                                    <div class="ml-3">
                                        <a href="mailto:{$person['email']}" target="_blank">{$person['email']}</a><br>
                                        <a href="tel:{$person['phone']|trim:' '}" target="_blank">{$person['phone']}</a>
                                    </div>
                                </div>
                            </div>
                            <div class="p-4 p-md-5 text-success bg-white">
                                <div class="h5 mb-0 font-weight-bold">
                                    Nebo se Vám máme ozvat?
                                </div>

                                <div class="alert alert-success mt-4" role="alert" style="display: none">
                                    <h4 class="alert-heading font-weight-bold">Děkujeme za kontaktování</h4>
                                    <p class="mb-0">Ozveme se Vám na uvedený telefon nebo e-mail.</p>
                                </div>

                                <form n:name="form">
                                    <div class="form-group my-4">
                                        <input n:name="contact" class="form-control" placeholder="Zadejte Váš telefon / e-mail">
                                    </div>

                                    <button n:name="save" class="btn btn-lg btn-primary">
                                        Domluvit si konzultaci
                                    </button>
                                </form>
                            </div>

                            <div class="mt-4 mt-md-5">
                                <button type="button" class="border-0 p-0 text-white bg-transparent" data-dismiss="modal" aria-label="Close" role="button">
                                    <i class="fas fa-arrow-left mr-2"></i>
                                    <span class="font-weight-bold">Zpět</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>