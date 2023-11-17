@extends('layouts.app')

@section('title', 'Projects')

@section('content')

    <!-- ======= banner Section ======= -->
    <section class="d-flex align-items-center">

        <div class="container mt-5">
            <div class="row mt-5">

                <h2 data-aos="fade-up" class="text-center text-dark">Projects List</h2>

                <div class="col-lg-12 hero-img mt-5">
                    <div class="card">
                        <div class="card-body">

                            <div class="float-end p-2">
                                <a type="button" class="btn btn-primary" href="{{ route('projects.index') }}">Back Project</a>
                            </div>
                            <div class="p-5">
                                <p>{{ $project->description }}</p>
                            </div>
                        </div>
                      </div>
                </div>
            </div>
        </div>

    </section>
    <!-- End banner -->
    
@endsection