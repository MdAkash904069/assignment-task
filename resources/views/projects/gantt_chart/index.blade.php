@extends('layouts.app')

@section('title', "Gantt Chart")

@section('content')

    <!-- ======= banner Section ======= -->
    <section class="d-flex align-items-center">

        <div class="container mt-5">
            <div class="row mt-5">

                <h2 data-aos="fade-up" class="text-center text-dark">Gantt Chart</h2>

                <div id="gantt_here" style='width:100%; height:500px;'></div>

            </div>
        </div>

    </section>
    <!-- End banner -->

@push('js')
<script src="https://cdn.dhtmlx.com/gantt/edge/dhtmlxgantt.js"></script>
<link href="https://cdn.dhtmlx.com/gantt/edge/dhtmlxgantt.css" rel="stylesheet">
<script>
    gantt.config.xml_date = "%Y-%m-%d %H:%i:%s";
    gantt.init("gantt_here");

    gantt.load("/gantt-chart-data", "json"); // Fetch data from your Laravel route

    gantt.config.columns = [
        {name: "title", label: "Project name", tree: true },
        {name: "start_date", label: "Start time" },
        {name: "end_date", label: "End time" },
        {name: "duration", label: "Duration" }
    ];

    gantt.config.scale_unit = "day";
    gantt.config.date_scale = "%Y-%m-%d";

    gantt.render();

    // gantt.init("gantt_here");
    // gantt.config.columns = [
    //     {name: "title", label: "Project name", tree: true },
    //     {name: "start_date", label: "Start time" },
    //     {name: "end_date", label: "End time" },
    //     {name: "duration", label: "Duration" }
    // ];
    // gantt.config.scale_unit = "day";
    // gantt.config.date_scale = "%Y-%m-%d";
    // gantt.parse({
    //     data: {!! json_encode($projects) !!} // Pass fetched tasks data
    // });

</script>
@endpush

@endsection