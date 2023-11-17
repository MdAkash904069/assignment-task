@extends('layouts.app')

@section('title', __('mgs.dashboard'))

@section('content')

    <!-- ======= banner Section ======= -->
    <section id="hero" class="hero d-flex align-items-center">

        <div class="container">
            <div class="row">
            <div class="col-lg-6 d-flex flex-column justify-content-center">
                <h1 data-aos="fade-up">{{ __('mgs.project_management_system') }}</h1>
                <div data-aos="fade-up">
                <div class="text-center text-lg-start">
                    <a href="/projects" class="btn-get-started scrollto d-inline-flex align-items-center justify-content-center align-self-center">
                    <span>{{__('mgs.projects')}}</span>
                    <i class="bi bi-arrow-right"></i>
                    </a>
                </div>
                </div>
            </div>
            <div class="col-lg-6 hero-img" data-aos="zoom-out">
                <img src="{{ asset('assets/img/hero-img.png') }}" class="img-fluid" alt="">
            </div>
            </div>
        </div>

    </section>
    <!-- End banner -->
    
@endsection