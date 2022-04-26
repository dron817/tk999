@extends('adminlte::page')

@section('title', 'Панель диспетчера')

@section('content_header')
    <h1>Панель диспетчера</h1>
@stop

@section('content')
    <script src="{{ asset('assets/js/jquery-3.6.0.min.js') }}"></script>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="row card-header">
                            <div class="col-3">
                                <div class="dt-buttons btn-group flex-wrap">
                                    <a href="{{ route('admin.home') }}">
                                        <button id="add_ticket" class="btn btn-primary buttons-copy buttons-html5"
                                                tabindex="0"
                                                aria-controls="example1" type="button">
                                            <span>< Назад в панель</span></button>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="card-header">
                            <h3 class="card-title">Редактирование маршрутов</h3>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-12">
                                    <table id="example1"
                                           class="table table-bordered table-striped dataTable dtr-inline"
                                           role="grid" aria-describedby="example1_info">
                                        <thead>
                                            <tr role="row">
                                                <th>№</th>
                                                <th>Откуда</th>
                                                <th>Куда</th>
                                                <th>Отправление</th>
                                                <th>ПН</th>
                                                <th>ВТ</th>
                                                <th>СР</th>
                                                <th>ЧТ</th>
                                                <th>ПТ</th>
                                                <th>СБ</th>
                                                <th>ВС</th>
                                                <th>Сохранить</th>
                                            </tr>
                                        </thead>
                                        <tbody id="trip_editor">
                                        <script>
                                            function EditTrip(trip_id) {
                                                let days = '';
                                                for (let i = 1; i <= 7; i++){
                                                    if ($('#cb' + trip_id + '_' + i).is(':checked')) days=days+'_'+i;
                                                }
                                                let url = '{{ route('admin.letEditTrip') }}' + '?trip_id=' + trip_id + '&days=' + days;
                                                location.href = url;
                                            }
                                        </script>
                                        <style>
                                            #trip_editor input{
                                                transform: scale(2);
                                            }
                                        </style>
                                            @foreach( $trips as $trip)
                                                <tr>
                                                    <th>{{ $trip->id }}</th>
                                                    <th>{{ $trip->from }}</th>
                                                    <th>{{ $trip->to }}</th>
                                                    <th>{{ $trip->from_time }}</th>
                                                    @php
                                                        for ($i = 1; $i <= 7; $i++){
                                                            echo '<th><input type="checkbox" id="cb'.$trip->id.'_'.$i.'" ';
                                                                if (str_contains($trip->days_of_week, $i))
                                                                        echo 'checked';
                                                                echo ' ></th>';
                                                        }
                                                    @endphp
                                                    <th>
                                                        <button id="trip{{ $trip->id }}" type="button" class="btn btn-primary">
                                                            <i class="fa fa-save" aria-hidden="true"></i>
                                                        </button>
                                                    </th>
                                                    <script>
                                                        $("#trip{{ $trip->id }}").click(function () {
                                                            EditTrip({{ $trip->id }});
                                                        });
                                                    </script>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                        <thead>
                                        <tr role="row">
                                            <th>№</th>
                                            <th>Откуда</th>
                                            <th>Куда</th>
                                            <th>Отправление</th>
                                            <th>ПН</th>
                                            <th>ВТ</th>
                                            <th>СР</th>
                                            <th>ЧТ</th>
                                            <th>ПТ</th>
                                            <th>СБ</th>
                                            <th>ВС</th>
                                            <th>Сохранить</th>
                                        </tr>
                                        </thead>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>

        </div>

    </section>

@stop
