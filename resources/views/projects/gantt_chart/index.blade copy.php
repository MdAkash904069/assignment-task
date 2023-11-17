@extends('layouts.app')

@section('title', "Gantt Chart")

@section('content')

    <!-- ======= banner Section ======= -->
    <section class="d-flex align-items-center">

        <div class="container mt-5">
            <div class="row mt-5">

                <h2 data-aos="fade-up" class="text-center text-dark">Gantt Chart</h2>

                <div class="col-lg-12 hero-img mt-5">
                    <div class="card p-5">
                        <canvas id="myChart"></canvas>
                    </div>     
                </div>
            </div>
        </div>

    </section>
    <!-- End banner -->

@push('js')
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/chart.js/dist/chart.umd.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/chartjs-adapter-date-fns/3.0.0/chartjs-adapter-date-fns.min.js"></script>

<script>
    // setup 
    const data = {
    //   labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
      datasets: [{
        label: 'Monthly Schedule',
        data: [
            @foreach ($projects as $project)
                {x: ["{{$project->start_date}}", "{{$project->end_date}}"], y: "{{$project->title}}"},
            @endforeach
        ],
        backgroundColor: [
          'rgba(255, 26, 104, 0.2)',
          'rgba(54, 162, 235, 0.2)',
          'rgba(255, 206, 86, 0.2)',
          'rgba(75, 192, 192, 0.2)',
          'rgba(153, 102, 255, 0.2)',
          'rgba(255, 159, 64, 0.2)',
          'rgba(0, 0, 0, 0.2)'
        ],
        borderColor: [
          'rgba(255, 26, 104, 1)',
          'rgba(54, 162, 235, 1)',
          'rgba(255, 206, 86, 1)',
          'rgba(75, 192, 192, 1)',
          'rgba(153, 102, 255, 1)',
          'rgba(255, 159, 64, 1)',
          'rgba(0, 0, 0, 1)'
        ],
        borderWidth: 1,
        borderSkipped: false,
      }]
    };

    // config 
    const config = {
      type: 'bar',
      data,
      options: {
        indexAxis: 'y',
        scales: {
          x: {
            // type: 'time',
            time: {
                unit:'day'
            },
            min:'2023-01-01',
            max: '2030-01-01'
          }
        }
      }
    };

    // render init block
    const myChart = new Chart(
      document.getElementById('myChart'),
      config
    );

    // Instantly assign Chart.js version
    const chartVersion = document.getElementById('chartVersion');
    chartVersion.innerText = Chart.version;
</script>
    
@endpush

<style>
    * {
      margin: 0;
      padding: 0;
      font-family: sans-serif;
    }
    .chartMenu {
      width: 100vw;
      height: 40px;
      background: #1A1A1A;
      color: rgba(54, 162, 235, 1);
    }
    .chartMenu p {
      padding: 10px;
      font-size: 20px;
    }
    .chartCard {
      width: 100vw;
      height: calc(100vh - 40px);
      background: rgba(54, 162, 235, 0.2);
      display: flex;
      align-items: center;
      justify-content: center;
    }
    .chartBox {
      width: 700px;
      padding: 20px;
      border-radius: 20px;
      border: solid 3px rgba(54, 162, 235, 1);
      background: white;
    }
  </style>

    
@endsection