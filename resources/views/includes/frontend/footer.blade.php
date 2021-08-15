@include('includes.frontend.auth-popup')

<footer class="footer bg-green-dark py-5" id="kontak">
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <a href="#" class="d-block mb-4">
                    <img height="100px"
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
                            <x-nav-link class="text-white" link="{{ route('courses') }}">
                                Try Out Online Nasional
                            </x-nav-link>
                            <x-nav-link class="text-white" link="{{ route('courses') }}">
                                Kedokteran Master Class
                            </x-nav-link>
                            <x-nav-link class="text-white" link="{{ route('courses') }}">
                                UTBK Master Class
                            </x-nav-link>
                            <x-nav-link class="text-white" link="{{ route('courses') }}">
                                STAN Master Class
                            </x-nav-link>
                            <x-nav-link class="text-white" link="{{ route('courses') }}">
                                Mandiri Master Class
                            </x-nav-link>
                            <x-nav-link class="text-white" link="{{ route('courses') }}">
                                Online Master Class
                            </x-nav-link>
                            <x-nav-link class="text-white" link="{{ route('courses') }}">
                                University Master Class
                            </x-nav-link>
                            <x-nav-link class="text-white" link="{{ route('courses') }}">
                                TOEFL Master Class
                            </x-nav-link>
                            <x-nav-link class="text-white" link="{{ route('courses') }}">
                                Privat Master Class
                            </x-nav-link>
                        </ul>
                    </div>
                    <div class="col-lg-4">
                        <h3 class="text-white mb-3">Resources</h3>
                        <ul>
                            <x-nav-link class="text-white" link="#">
                                Download
                            </x-nav-link>
                            <x-nav-link class="text-white" link="#">
                                Promo
                            </x-nav-link>
                            <x-nav-link class="text-white" link="#">
                                Privacy Policy
                            </x-nav-link>
                        </ul>
                    </div>
                    <div class="col-lg-4">
                        <div class="mb-4">
                            <h3 class="text-white mb-3">Address</h3>
                            <a class="link text-white">
                                <address class="font-style-normal">
                                    {{ $address->value }}
                                </address>
                            </a>
                        </div>
                        <div>
                            <h3 class="text-white mb-3">Hubungi Kami</h3>
                            <ul>
                                @foreach ($contacts as $contact)
                                <li>
                                    <a href="{{ $contact->link }}" class="link text-white">
                                        <i class="fa fa-instagram"></i>
                                        <span>{{ $contact->value }}</span>
                                    </a>
                                </li>
                                @endforeach
                                <li>
                                    <a href="javascript:void(0);"
                                    class="link text-white" data-toggle="modal"
                                    data-target="#login-popup">
                                        <i class="flaticon-user"></i>
                                        Login admin
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