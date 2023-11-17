@extends('layouts.app')

@section('title', $task->title.' - '.$project->title)

@section('content')

    <!-- ======= banner Section ======= -->
    <section class="d-flex align-items-center">

        <div class="container mt-5">
            <div class="row mt-5">

                <h2 class="text-center text-dark">{{$project->title}}</h2>
                <h3 class="text-center text-dark">Task : {{ $task->title }}</h3>

                <div class="col-lg-12 mt-5">
                    <div class="card">
                        <div class="card-body">

                            <x-alert_message />

                            <div class="float-end p-2">
                                <a type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Create Dependency</a>
                            </div>
                          <table class="table">
                                <thead>
                                    <tr>
                                    <th scope="col">Sl</th>
                                    <th scope="col">Task Title</th>
                                    <th scope="col">Start Date</th>
                                    <th scope="col">End Date</th>
                                    <th scope="col">Note</th>
                                    <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody class="mt-2">
                                    @forelse ($task->task_dependencies as $key => $task)
                                        <tr>
                                            <th scope="row">{{ $key + 1 }}</th>
                                            <td>{{ $task->title }}</td>
                                            <td>{{ date('d M Y', strtotime($task->start_date)) }}</td>
                                            <td>{{ date('d M Y', strtotime($task->end_date)) }}</td>
                                            <td>
                                                {{ $task->note }}
                                            </td>
                                            <td>
                                                 
                                                <form action="{{route('taskDependency.destroy', $task->id)}}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <a href="#" data-id={{ $task->id }} title="{{$task->title}}" start-date="{{$task->start_date}}" end-date="{{$task->end_date}}" note="{{$task->note}}" class="btn btn-info edit">Edit</a> 
                                                    <button onclick="return confirm('Are you sure you want to delete {{$task->title}}?')" type="submit" class="btn btn-danger">Delete</button>
                                                </form>

                                            </td>
                                        </tr>
                                    @empty
                                        </tr>
                                            <td>No Task Dependencies</td> 
                                        </tr>
                                    @endforelse
                                
                                </tbody>
                            </table>
                        </div>
                      </div>
                </div>
            </div>
        </div>

    </section>
    <!-- End banner -->

    {{-- create task modal  --}}
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Create Task Dependency</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="post" action="{{ route("taskDependency.store") }}">
                    @csrf
                    <div class="modal-body">

                        <input type="hidden" value="{{$project->id}}" name="project_id">
                        <input type="hidden" value="{{$task_id}}" name="task_id">
                    
                        <div class="mb-3">
                            <label for="task-title" class="col-form-label">Task Dependency Title:</label>
                            <input name="title" required type="text" class="form-control" id="task-title" placeholder="Task Dependency Title">
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
                            <label for="task-note" class="col-form-label">Note:</label>
                            <textarea name="note" class="form-control" id="task-note" placeholder="note"></textarea>
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
    {{-- edit task modal  --}}
    <div class="modal fade" id="task-edit-modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Update Task Dependency</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="post" action="{{ route('taskDependency.update', 'id') }}">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">

                        <input type="hidden" value="{{$project->id}}" name="project_id">
                        <input type="hidden" value="{{$task_id}}" name="task_id">

                        <input type="hidden" id="edit-id" name="id">

                        <div class="mb-3">
                            <label for="task-edit-title" class="col-form-label">Task Dependency Title:</label>
                            <input name="title" required type="text" class="form-control" id="task-edit-title" placeholder="Task Dependency Title">
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
                            <label for="task-edit-note" class="col-form-label">Note:</label>
                            <textarea name="note" class="form-control" id="task-edit-note" placeholder="Note"></textarea>
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
                let note = $(this).attr('note')

                $("#edit-id").val(id)
                $("#task-edit-title").val(title)
                $("#start-edit-date").val(start_date)
                $("#end-edit-date").val(end_date)
                $("#task-edit-note").val(note)

                $("#task-edit-modal").modal('show')
            })
        })
    </script>
@endpush

    
@endsection