<section id="latest-blog" class="py-5">
    <div class="container">
        <x-head-section text="Kabar Terbaru Seleksi Kampus" />
        <div class="position-relative">
            <div class="swiper-container slider-number-pagination-three-slide positin-static swiper-pagination--bottom-container">
                <div class="swiper-wrapper">
                    @foreach($blogs as $blog)
                    <div class="swiper-slide h-auto px-3">
                        <div class="card h-full border-0 shadow">
                            <img src="{{ asset('blog/'.$blog->featured_image) }}" class="card-img-top" alt="{{ $blog->title }}">
                            <div class="card-body position-relative pt-5">
                                <time class="card-widget-date text-center" 
                                datetime="{{ $blog->created_at }}">
                                    {{ $blog->created_at->format('d') }} <br>
                                    {{ $blog->created_at->format('M') }}
                                </time>
                                <h5 class="card-title font-weight-bold">
                                    <a href="{{ url('article/'.$blog->id) }}"
                                    class="text-black">
                                        {{ Str::words($blog->title, 3) }}
                                    </a>
                                </h5>
                                <p class="card-text">
                                    {{ Str::words($blog->short_description, 10) }}
                                </p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <x-swiper-pagination class="bottom-0"/>
            </div>
        </div>
    </div>
</section>