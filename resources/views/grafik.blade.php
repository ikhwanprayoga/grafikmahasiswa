<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">

            <div class="content">
                @foreach ($fakultass as $key => $valFak)
                <div id="{!! str_replace(' ', '_', $valFak) !!}"></div>
                @endforeach

                <table class="table table-light">
                    <tbody>
                        <tr>
                            <th>No</th>
                            <th>Fakultas</th>
                            <th>Nama</th>
                            <th>No Hp</th>
                            <th>Lokasi</th>
                        </tr>
                        @foreach ($mahasiswaSakits as $mhsSakit)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $mhsSakit->FAKULTAS }}</td>
                            <td>{{ $mhsSakit->Nama_lengkap }}</td>
                            <td>{{ $mhsSakit->No_HP }}</td>
                            <td>{{ $mhsSakit->Lokasi_Sekarang }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </body>

    @foreach ($data as $keys => $data)
    <script>

            // Load the Visualization API and the corechart package.
            google.charts.load('current', {'packages':['corechart']});

            // Set a callback to run when the Google Visualization API is loaded.
            google.charts.setOnLoadCallback(drawChart);

            // Callback that creates and populates a data table,
            // instantiates the pie chart, passes in the data and
            // draws it.
            function drawChart() {

                // Create the data table.
                var data = new google.visualization.DataTable();
                data.addColumn('string', 'Topping');
                data.addColumn('number', 'Slices');
                data.addRows([
                    ['Rule 1', parseInt("{{ $data['rule1'] }}")],
                    ['Rule 2', parseInt("{{ $data['rule2'] }}")],
                    ['Rule 3', parseInt("{{ $data['rule3'] }}")],
                ]);

                // Set chart options
                var options = {'title':"Fakultas {{ $data['fakultas'] }}",
                                'width':800,
                                'height':600};

                // Instantiate and draw our chart, passing in some options.
                var chart = new google.visualization.PieChart(document.getElementById("{!! str_replace(' ', '_', $data['fakultas']) !!}"));
                chart.draw(data, options);
            }
        </script>
    @endforeach

</html>
