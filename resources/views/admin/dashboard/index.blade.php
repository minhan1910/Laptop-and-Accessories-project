@extends('layouts.admin')

@section('title')
    Trang chủ
@endsection

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        @include('partials.content-header', [
            'name' => 'Report and statistics of ',
            'key' => 'Master G store',
        ])
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-">
                        <div id="piechart_3d" style="width: 900px; height: 500px;"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load("current", {
            packages: ["corechart"]
        });
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            // var dataCategory = {!! $data !!};
            var categories = [
                @foreach ($data as $item)
                    ['{{ $item->name }}', {{ $item->number }}],
                @endforeach
            ];
            console.log(categories);
            var data = google.visualization.arrayToDataTable([
                ['Categories', 'categories_count'],
                ...categories
            ]);
            var options = {
                title: 'Report Statistics Products up to Categories in store',
                is3D: true,
            };

            var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
            chart.draw(data, options);
        }
    </script>
@endsection
