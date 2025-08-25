@extends('layouts.appf')
@section('title',__('Error 500'))
@section('content')
<section id="error-404" class="pt-2 error-404 section">

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="text-center">
          <div class="mb-2 error-icon" data-aos="zoom-in" data-aos-delay="200">
            <i class="bi bi-exclamation-circle"></i>
          </div>

          <h2 class="mb-4 error-code" data-aos="fade-up" data-aos-delay="300">404</h2>

          <h3 class="mb-3 error-title" data-aos="fade-up" data-aos-delay="400">Oops! Page Not Found</h3>

          <p class="mb-4 error-text" data-aos="fade-up" data-aos-delay="500">
            Silahkan hubungi pengelola Website
          </p>

          <div class="mb-4 search-box" data-aos="fade-up" data-aos-delay="600">
            <form action="#" class="search-form">
              <div class="input-group">
                <input type="text" class="form-control" placeholder="Search for pages..." aria-label="Search">
                <button class="btn search-btn" type="submit">
                  <i class="bi bi-search"></i>
                </button>
              </div>
            </form>
          </div>

          <div class="error-action" data-aos="fade-up" data-aos-delay="700">
            <a href="/" class="btn btn-primary">Back to Home</a>
          </div>
        </div>

      </div>

    </section>
@endsection
