<div>
    <footer id="kontak">
    <div class="container">
        {{-- footer information--}}
        <div class="row g-5">
            <div class="col-md-6">
                <h5 class="fw-bold mb-4 text-uppercase">sentru komunitaria aprendizajen visaun no asaun lautem oan rasik</h5>
                <p class="text-secondary small">Sentru Komunitaria Aprendizajen SKA VALOR fasilita jovem Lautem oan sira aprende literasaun digital no  linguajen rai liur ho gratuita.</p>

                {{-- another link --}}
                <nav class="nav flex-column">
                    <a class="nav-link text-white" href="{{route('organograma')}}">Organograma</a>
                    <a class="nav-link" href="#">Link</a>
                    <a class="nav-link" href="#">Link</a>
                    <a class="nav-link disabled" aria-disabled="true">Disabled</a>
                </nav>
            </div>

            {{-- contact information --}}
            <div class="col-md-3">
                <h5 class="fw-bold mb-4">Enderesu & Kontaktu</h5>
                <p class="small mb-1"><i class="bi bi-geo-alt me-2"></i> Rua: Vila Antiga, Lospalos</p>
                <p class="small mb-1"><i class="bi bi-whatsapp me-2"></i> +62 812-3456-7890</p>
                <p class="small"><i class="bi bi-envelope me-2"></i><a href="mailto:leonardoximenes050201@gmail.com" class="text-white">skavalor@gmail.com</a></p>
            </div>

            {{-- social media information --}}
            <div class="col-md-3">
                <h5 class="fw-bold mb-4">Follow us</h5>
                <div class="d-flex gap-3">
                    <a href="#" class="footer-link fs-4"><i class="bi bi-instagram"></i></a>
                    <a href="#" class="footer-link fs-4"><i class="bi bi-facebook"></i></a>
                    <a href="#" class="footer-link fs-4"><i class="bi bi-tiktok"></i></a>
                    <a href="mailto:leonardoximenes050201@gmail.com?subject=Support%20Request&body=Halo%20admin,%20saya%20butuh%20bantuan" class="footer-link fs-4"><i class="bi bi-envelope"></i></a>
                </div>
            </div>

            
        </div>

        <hr class="mt-5 border-secondary">
        <p class="text-center small py-3 opacity-50">&copy; {{date('Y')}} Sentru Visaun no Asaun Lautem Oan Rasik | Lori Lautem no Timor Leste ba Mundu.</p>
    </div>
</footer>
</div>