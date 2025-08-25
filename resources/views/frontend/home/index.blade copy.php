@extends('layouts.appf')

@section('content')

@include('frontend.home.hero')
@include('frontend.home.greeting')
@include('frontend.home.recent-news')
{{-- @include('frontend.home.abouts') --}}
{{-- @include('frontend.home.featured-programs') --}}
{{-- @include('frontend.home.students-life-block') --}}
{{-- @include('frontend.home.testimonials') --}}
@include('frontend.home.video')
@include('frontend.home.foto')
{{-- @include('frontend.home.events') --}}

@endsection
