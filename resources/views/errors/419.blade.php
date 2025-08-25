@extends('layouts.appf')
@section('title',__('Expired'))
@section('content')
<section id="error-404" class="error-404 section">

      <div class="container text-center" data-aos="fade-up" data-aos-delay="100">
          <h1 class="mb-4 error-code" data-aos="fade-up" data-aos-delay="300">419</h1>
          <h2 class="mb-3 error-title" data-aos="fade-up" data-aos-delay="400">Oops! Session Expired</h2>
          <div class="error-action" data-aos="fade-up" >
            <a href="/" class="btn btn-primary">Back to Home</a>
          </div>
        </div>

      </div>

    </section>
@endsection
