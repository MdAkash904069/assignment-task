@extends('layouts.app')

@section('title', $project->title.' - Progress')

@section('content')

    <!-- ======= banner Section ======= -->
    <section class="d-flex align-items-center">

        <div class="container-fluid mt-5">
            <div class="row mt-5">

                <h2 class="text-center text-dark">{{ $project->title }}</h2>

                <div class="col-lg-12 mt-2">
                    <div class="card">
                        <div class="card-body">

                            <div class="board">

                                <div class="lanes">
                                    {{-- pending task  --}}
                                    <div class="swim-lane" id="pending">
                                        <h3 class="heading">Pending</h3>
                                        @foreach ($project->pending_tasks as $task)  
                                            <p class="task task-item-{{ $task->id }}" id="{{ $task->id }}" draggable="true">{{ $task->title }} <span class="colage" task="{{ $task->id }}"><b>+</b></span> 
                                                <div class="tasks task-{{ $task->id }}" style="display: none">
                                                    <ul>
                                                        @forelse ($task->task_dependencies as $task)
                                                            <li>{{$task->title}}</li>
                                                        @empty
                                                        <li>No Data</li>
                                                        @endforelse
                                                    </ul>
                                                </div>
                                            </p>
                                        @endforeach
                                    </div>
                                    {{-- doning task  --}}
                                    <div class="swim-lane" id="doing">
                                        <h3 class="heading">Doing</h3>
                                        @foreach ($project->doing_tasks as $task)  
                                            <p class="task task-item-{{ $task->id }}" id="{{ $task->id }}" draggable="true">{{ $task->title }} <span class="colage" task="{{ $task->id }}"><b>+</b></span> 
                                                <div class="tasks task-{{ $task->id }}" style="display: none">
                                                    <ul>
                                                        @forelse ($task->task_dependencies as $task)
                                                            <li>{{$task->title}}</li>
                                                        @empty
                                                        <li>No Data</li>
                                                        @endforelse
                                                    </ul>
                                                </div>
                                            </p>
                                        @endforeach

                                    </div>
                                    {{-- complete task --}}
                                    <div class="swim-lane" id="done">
                                        <h3 class="heading">Done</h3>

                                        @foreach ($project->done_tasks as $task)  
                                            <p class="task task-item-{{ $task->id }}" id="{{ $task->id }}" draggable="true">{{ $task->title }} <span class="colage" task="{{ $task->id }}"><b>+</b></span> 
                                                <div class="tasks task-{{ $task->id }}" style="display: none">
                                                    <ul>
                                                        @forelse ($task->task_dependencies as $task)
                                                            <li>{{$task->title}}</li>
                                                        @empty
                                                        <li>No Data</li>
                                                        @endforelse
                                                    </ul>
                                                </div>
                                            </p>
                                        @endforeach

                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
    <!-- End banner -->


@push('js')   
<link rel="stylesheet" href="{{asset('drop_drag/styles.css')}}" />
<script src="{{asset('drop_drag/drag.js')}}" defer></script>
<script>
    $(".colage").click(function(){
        $(".tasks").hide();
        console.log(".task-item-"+$(this).attr('task'));
        $((".task-"+$(this).attr('task'))).show();
    })
</script>
@endpush
<style>
p {
    margin-bottom: 6px !important;
}
</style>
    
@endsection