<section id="events" class="events section">

    <div class="container section-title" data-aos="fade-up">
        <h2>Udpate</h2>
        <p>Update berita dan artikel menarik</p>
    </div>

    <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row gy-4">
            @forelse ($posts as $item)
            <div class="col-lg-3 col-md-4" data-aos="zoom-in" data-aos-delay="200">
                <a href="{{route('post.detail', $item->slug)}}">
                <div class="event-item">
                    <div class="event-image">
                            <img src="{{ $item->imageThumbUrl ? $item->imageThumbUrl : '/uploads/images/logo/' . $global_option->logo }}" alt="{{$item->title}}" class="img-fluid">
                    </div>
                    <div class="event-details">
                        <div class="event-category">
                            <span class="badge academic">{{$item->postcategory->title}}</span>
                            {{-- <span class="event-time">2:00 PM</span> --}}
                        </div>
                        <h3>{{$item->title}}</h3>
                        {!! Str::limit($item->content, 80) !!}</p>
                        <div class="event-info">
                            <div class="info-row">
                                <i class="bi bi-person-circle"></i>
                                <span>
                                    @if ($item->author->displayname)
                                    {{ $item->author->displayname }}
                                    @else
                                    {{ $item->author->name }}
                                    @endif
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                </a>
            </div>
            @empty
            Update belum tersedia
            @endforelse
        </div>
    </div>
</section>
