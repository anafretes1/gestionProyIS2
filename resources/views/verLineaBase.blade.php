@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h1><b> Linea Base:  </b>{{ $lineasbases->nombre }}</h1>
                    </div>
                    <div class="card-header">
                        <h3 style="text-align: center">Tareas asignadas</h3>
                    </div>
                    <table class="table">
                        <thead class="thead-dark" >
                            <tr>
                                <th scope="col">#Id</th>
                                <th scope="col">Descripción</th>
                                <th scope="col">Versión</th>
                                <th scope="col">Estado</th>
                                <th scope="col">Fecha Inicio</th>
                                <th scope="col">Fecha Fin</th>
                            </tr>
                        </thead>
                        @foreach($tareasLineasBases as $item)
                            <tr>
                                <th scope="row">{{$item->id }}</th>
                                <td>{{$item->descripcion_tarea }}</td>
                                <td>{{$item->version_tarea }}</td>
                                <td>{{$item->estado_tarea }}</td>
                                <td>{{$item->fecha_inicio }}</td>
                                <td>{{$item->fecha_fin }}</td>
                            </tr>
                        @endforeach
                    </table>
                    <div class="card-header">
                        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
                        <script type="text/javascript">
                        google.charts.load("current", {packages:["timeline"]});
                        google.charts.setOnLoadCallback(drawChart);
                        function drawChart() {
                            var container = document.getElementById('example2.1');
                            var chart = new google.visualization.Timeline(container);
                            var dataTable = new google.visualization.DataTable();

                            dataTable.addColumn({ type: 'string', id: 'Term' });
                            dataTable.addColumn({ type: 'string', id: 'Name' });
                            dataTable.addColumn({ type: 'date', id: 'Start' });
                            dataTable.addColumn({ type: 'date', id: 'End' });
                            
                            @foreach($tareasLineasBases as $item)
                                dataTable.addRows([
                                [ '{{ $item->id }}', '{{ $item->descripcion_tarea }}', new Date('{{ $item->fecha_inicio }}'), new Date('{{ $item->fecha_fin }}') ]]);
                            @endforeach
                            chart.draw(dataTable);
                        }
                        </script>

                        <div id="example2.1" style="height: 200px;"></div>
                    </div>
                </div>
                <a href="{{ url('configuracion/lineasbases') }}" class="btn btn-dark">ATRAS</a>
            </div>
        </div>
    </div>
@endsection
 