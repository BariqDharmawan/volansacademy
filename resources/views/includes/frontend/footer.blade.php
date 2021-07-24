@include('includes.frontend.auth-popup')
<!-- footer -->
<footer class="footer bg-green-dark py-5" id="kontak">
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <a href="#" class="d-block mb-4">
                    <img style="width:200px" 
                    src="{{ url('frontend/img/logo.png')}}" alt="">
                </a>
                <p class="text-white m-0">
                    Volans Education adalah Bimbingan Belajar spesialis masuk Perguruan Tinggi Negeri yang fokus
                    untuk mempersiapkan kompetensi Siswa SMA/SMK untuk menghadapi Seleksi Penerimaan Mahasiswa
                    Baru dari berbagai Kampus Favorit di Indonesia. Selain itu, terdapat program-program
                    bimbingan belajar khusus untuk para Mahasiswa dan Alumni sesuai dengan tujuan akademik
                    masing-masing.
                </p>
            </div>
            <div class="col-lg-8">
                <div class="row mx-0">
                    <div class="col-lg-4">
                        <h3 class="text-white mb-3">Program</h3>
                        <ul>
                            <li>
                                <a href="{{ route('courses') }}" class="link text-white">
                                    Try Out Online Nasional
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('courses') }}" class="link text-white">
                                    Kedokteran Master Class
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('courses') }}" class="link text-white">
                                    UTBK Master Class
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('courses') }}" class="link text-white">
                                    STAN Master Class
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('courses') }}" class="link text-white">
                                    Mandiri Master Class
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('courses') }}" class="link text-white">
                                    Online Master Class
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('courses') }}" class="link text-white">
                                    University Master Class
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('courses') }}" class="link text-white">
                                    TOEFL Master Class
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('courses') }}" class="link text-white">
                                    Privat Master Class
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-lg-4">
                        <h3 class="text-white mb-3">Resources</h3>
                        <ul>
                            <li>
                                <a href="#" class="link text-white">Download</a>
                            </li>
                            <li>
                                <a href="#" class="link text-white">Promo</a>
                            </li>
                            <li>
                                <a href="#" class="link text-white">Privacy Policy</a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-lg-4">
                        <div class="mb-4">
                            <h3 class="text-white mb-3">Address</h3>
                            <a class="link text-white">
                                <address class="font-style-normal">
                                    Perum. City Home Regency, Blok F. No. 50 Jl. Keputih Tegal Timur, Sukolilo - Surabaya
                                </address>
                            </a>
                        </div>
                        <div>
                            <h3 class="text-white mb-3">Hubungi Kami</h3>
                            <ul>
                                <li>
                                    <a href="https://www.instagram.com/volanseducation" class="link text-white">
                                        <i class="fa fa-instagram"></i>
                                        <span>volans.education</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="https://wa.me/6289699505992"
                                    class="link text-white">
                                        <i class="fa fa-whatsapp"></i>
                                        <span>089699505992</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- footer -->
