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
                <div class="row mt-4">
                    <div class="col-md-6 chart-list">
                        <div id="piechart_3d" style="width:100%; height: 500px;"></div>
                    </div>
                    <div class="col-md-6">
                        <div id="userBar" style="width:100%; height: 500px;"></div>
                    </div>
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
        google.charts.setOnLoadCallback(drawUsersChart);
        function drawChart() {

            var categories = [
                @foreach ($data as $item)
                    ['{{ $item->name }}', {{ $item->number }}],
                @endforeach
            ];
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

        function drawUsersChart() {
            var users = [
                @foreach ($users as $user)
                    ['{{ $user->name }}', {{ $user->number }}],
                @endforeach
            ];
            var data = google.visualization.arrayToDataTable([
                ['Employee', 'Number',],
                ...users
            ]);

            var options = {
                title: 'Employees Report',
                chartArea: {
                    width: '50%'
                },
                hAxis: {
                    title: 'Employee Management',
                    minValue: 0
                },
                vAxis: {
                    title: 'Role'
                }
            };

            var chart = new google.visualization.BarChart(document.getElementById('userBar'));
            chart.draw(data, options);
        }
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.9.1/chart.min.js"
        integrity="sha512-ElRFoEQdI5Ht6kZvyzXhYG9NqjtkmlkfYk0wr6wHxU9JEHakS7UJZNeml5ALk+8IKlU6jDgMabC3vkumRokgJA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
@endsection
