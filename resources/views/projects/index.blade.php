@extends('layouts.app')

@section('title', __('mgs.dashboard'))

@section('content')

    <!-- ======= banner Section ======= -->
    <section class="d-flex align-items-center">

        <div class="container mt-5">
            <div class="row mt-5">

                <h2 data-aos="fade-up" class="text-center text-dark">{{__('mgs.project_list')}}</h2>

                <div class="col-lg-12 hero-img mt-5">
                    <div class="card">
                        <div class="card-body">

                            <x-alert_message />

                            <div class="float-end p-2">
                                <a type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#project-create-modal">Create Project</a>
                            </div>
                          <table class="table">
                                <thead>
                                    <tr>
                                    <th scope="col">Sl</th>
                                    <th scope="col">Project Title</th>
                                    <th scope="col">Start Date</th>
                                    <th scope="col">End Date</th>
                                    <th scope="col">Tasks</th>
                                    <th scope="col">Task Manage</th>
                                    <th scope="col">Details</th>
                                    <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody class="mt-2">
                                    @forelse ($projects as $key => $project)
                                        <tr>
                                            <th scope="row">{{ $key + 1 }}</th>
                                            <td>{{ $project->title }}</td>
                                            <td>{{ date('d M Y', strtotime($project->start_date)) }}</td>
                                            <td>{{ date('d M Y', strtotime($project->end_date)) }}</td>
                                            <td>
                                                <a href="{{ url('tasks', $project->id) }}" class="btn btn-info">Tasks</a>
                                            </td>
                                            <td>
                                                <a href="{{ url('taskProgress', $project->id) }}" class="btn btn-info">Task Manage</a>
                                            </td>
                                            <td>
                                                <a href="{{route('projects.show', $project->id)}}" class="btn btn-info">Details</a>
                                            </td>
                                            <td>
                                                 
                                                <form action="{{route('projects.destroy', $project->id)}}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <a href="#" data-id={{ $project->id }} title="{{$project->title}}" start-date="{{$project->start_date}}" end-date="{{$project->end_date}}" desc="{{$project->description}}" class="btn btn-info edit">Edit</a> 
                                                    <button onclick="return confirm('Are you sure you want to delete {{$project->title}}?')" type="submit" class="btn btn-danger">Delete</button>
                                                </form>

                                            </td>
                                        </tr>
                                    @empty
                                        <p>No Projects</p>
                                    @endforelse
                                
                                </tbody>
                            </table>
                            {{ $projects->links() }}
                        </div>
                      </div>
                </div>
            </div>
        </div>

    </section>
    <!-- End banner -->

    {{-- create project modal  --}}
    <div class="modal fade" id="project-create-modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="project-create-modalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="project-create-modalLabel">Create Project</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="post" action="{{ route('projects.store') }}">
                    @csrf
                    <div class="modal-body">
                    
                        <div class="mb-3">
                            <label for="project-title" class="col-form-label">Project Title:</label>
                            <input name="title" required type="text" class="form-control" id="project-title" placeholder="Project Title">
                        </div>
                        <div class="mb-3">
                            <label for="start-date" class="col-form-label">Start Date:</label>
                            <input name="start_date" required type="date" class="form-control" id="start-date">
                        </div>
                        <div class="mb-3">
                            <label for="end-date" class="col-form-label">End Date:</label>
                            <input name="end_date" required type="date" class="form-control" id="end-date">
                        </div>
                        <div class="mb-3">
                            <label for="project-description" class="col-form-label">Description:</label>
                            <textarea name="description" class="form-control" id="project-description" placeholder="Description"></textarea>
                        </div>
                        
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{-- edit project modal  --}}
    <div class="modal fade" id="project-edit-modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="project-edit-modal-Label" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="project-edit-modal-Label">Create Project</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="post" action="{{ route('projects.update', 'id') }}">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <input type="hidden" id="edit-id" name="id">
                        <div class="mb-3">
                            <label for="project-edit-title" class="col-form-label">Project Title:</label>
                            <input name="title" required type="text" class="form-control" id="project-edit-title" placeholder="Project Title">
                        </div>
                        <div class="mb-3">
                            <label for="start-edit-date" class="col-form-label">Start Date:</label>
                            <input name="start_date" required type="date" class="form-control" id="start-edit-date">
                        </div>
                        <div class="mb-3">
                            <label for="end-edit-date" class="col-form-label">End Date:</label>
                            <input name="end_date" required type="date" class="form-control" id="end-edit-date">
                        </div>
                        <div class="mb-3">
                            <label for="project-edit-description" class="col-form-label">Description:</label>
                            <textarea name="description" class="form-control" id="project-edit-description" placeholder="Description"></textarea>
                        </div>
                        
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@push('js')   
    <script>
        $(document).ready(function(){
            $(document).on('click', '.edit', function(e){
                e.preventDefault();
                let id = $(this).attr('data-id')
                let title = $(this).attr('title')
                let start_date = $(this).attr('start-date')
                let end_date = $(this).attr('end-date')
                let desc = $(this).attr('desc')

                $("#edit-id").val(id)
                $("#project-edit-title").val(title)
                $("#start-edit-date").val(start_date)
                $("#end-edit-date").val(end_date)
                $("#project-edit-description").val(desc)

                $("#project-edit-modal").modal('show')
            })
        })
    </script>
@endpush

    
@endsection