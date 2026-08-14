<footer class="bg-dark text-white pt-5 pb-3 mt-auto border-top border-secondary border-opacity-25">
    <div class="container">
        <div class="row g-4 mb-4">

            <div class="col-12 col-md-4">
                <h3 class="fw-bold text-success mb-3">Meshur.com</h3>
                <p class="text-secondary small mb-3 style-description">
                    Aşgabat şäheriniň iň meşhur kofehanalary we restoranlary bir ýerde. Sebitdäki iň tiz eltip bermek
                    hyzmaty!
                </p>
                <div class="d-flex align-items-center gap-2 text-secondary small mb-2">
                    <i class="bi bi-geo-alt text-success fs-5"></i>
                    <span>Aşgabat şäheri, Türkmenistan</span>
                </div>
                <div class="d-flex align-items-center gap-2 text-secondary small">
                    <i class="bi bi-telephone text-success fs-5"></i>
                    <span>+993 (12) 00-00-00</span>
                </div>
            </div>

            <div class="col-6 col-md-2">
                <h6 class="fw-bold mb-3 text-uppercase text-light fs-6">Sahypalar</h6>
                <ul class="list-unstyled mb-0 d-flex flex-column gap-2 small">
                    <li><a href="{{ route('client.categories.index') }}"
                            class="footer-link text-secondary text-decoration-none">Kategoriýalar</a></li>
                    <li><a href="{{ route('client.cafeterias.index') }}"
                            class="footer-link text-secondary text-decoration-none">Kofehanalar</a></li>
                    <li><a href="{{ route('client.drinks.search') }}"
                            class="footer-link text-secondary text-decoration-none">Gözleg</a></li>
                </ul>
            </div>

            <div class="col-6 col-md-3">
                <h6 class="fw-bold mb-3 text-uppercase text-light fs-6">Kömek we Hyzmat</h6>
                <ul class="list-unstyled mb-0 d-flex flex-column gap-2 small">
                    <li><a href="#" class="footer-link text-secondary text-decoration-none">Biz barada</a></li>
                    <li><a href="#" class="footer-link text-secondary text-decoration-none">Eltip bermek hyzmaty</a>
                    </li>
                    <li><a href="#" class="footer-link text-secondary text-decoration-none">Gizlinlik syýasaty</a></li>
                    <li><a href="#" class="footer-link text-secondary text-decoration-none">Habarlaşmak</a></li>
                </ul>
            </div>

            <div class="col-12 col-md-3">
                <h6 class="fw-bold mb-3 text-uppercase text-light fs-6">Biz sosial torda</h6>
                <p class="text-secondary small mb-3">Täzeliklerden we arzanlaşyklardan habardar boluň:</p>
                <div class="d-flex gap-2">
                    <a href="#"
                        class="btn btn-outline-secondary btn-sm rounded-circle d-flex align-items-center justify-content-center text-white border-secondary social-icon"
                        style="width: 40px; height: 40px;">
                        <i class="bi bi-instagram fs-5"></i>
                    </a>
                    <a href="#"
                        class="btn btn-outline-secondary btn-sm rounded-circle d-flex align-items-center justify-content-center text-white border-secondary social-icon"
                        style="width: 40px; height: 40px;">
                        <i class="bi bi-telegram fs-5"></i>
                    </a>
                    <a href="#"
                        class="btn btn-outline-secondary btn-sm rounded-circle d-flex align-items-center justify-content-center text-white border-secondary social-icon"
                        style="width: 40px; height: 40px;">
                        <i class="bi bi-tiktok fs-5"></i>
                    </a>
                </div>
            </div>

        </div>

        <hr class="border-secondary opacity-25 my-4">

        <div class="d-flex flex-column flex-sm-row justify-content-between align-items-center small text-secondary">
            <div class="mb-2 mb-sm-0">
                © {{ date('Y') }} <strong class="text-white">Meshur.com</strong>. Ähli hukuklar goragly.
            </div>
            <div>
                Damja platformasy
            </div>
        </div>
    </div>
</footer>

<style>
    .footer-link {
        transition: color 0.2s ease, padding-left 0.2s ease;
    }

    .footer-link:hover {
        color: #28a745 !important;
        padding-left: 5px;
    }

    .social-icon {
        transition: background-color 0.2s ease, border-color 0.2s ease, transform 0.2s ease;
    }

    .social-icon:hover {
        background-color: #28a745 !important;
        border-color: #28a745 !important;
        transform: translateY(-3px);
    }

    .style-description {
        line-height: 1.6;
    }
</style>