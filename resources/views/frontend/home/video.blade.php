<section id="events" class="events section">
    <div class="container section-title" data-aos="fade-up">
        <h2>Galeri Video</h2>
    </div>
    <div class="container" data-aos="fade-up" data-aos-delay="100">
        <div class="justify-center row g-4 justify-items-center">
            @forelse ($videos as $item)
            <div class="col-lg-4 col-md-6" data-aos="zoom-in" data-aos-delay="200">
                <div class="event-item">
                    <div class="event-image">
                        <a href="https://www.youtube.com/watch?v={{$item->video}}" class="glightbox">
                            <img src="{{ $item->imageThumbUrl ? $item->imageThumbUrl : '/uploads/images/logo/' . $global_option->logo }}" alt="{{$item->title}}" class="img-fluid">
                        </a>
                    </div>
                    <div class="event-details">
                        <h3>{{$item->title}}</h3>
                        <p>{!!$item->content!!}</p>
                    </div>
                </div>
            </div>
            @empty
            <h3>Data belum tersedia</h3>
            @endforelse


        </div>

        <div class="events-navigation" data-aos="fade-up" data-aos-delay="500">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <div class="filter-tabs">
                        <button class="filter-tab active" data-filter="all">Semua Video</button>
                    </div>
                </div>
            </div>
        </div>

    </div>

</section>
