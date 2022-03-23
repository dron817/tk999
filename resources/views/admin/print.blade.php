@extends('adminlte::page')

@section('title', 'Dashboard')

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
                        <div class="card-header">
                            <h3 class="card-title">Перечень билетов на рейс ТК999</h3>
                        </div>
                        <div class="card-body">
                            <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <b>Дата рейса:</b> {{ $date }}
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <b>Рейс:</b> {{ $trip }}
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <table id="example1"
                                               class="table table-bordered table-striped dataTable dtr-inline"
                                               role="grid" aria-describedby="example1_info">
                                            <thead>
                                            <tr role="row">
                                                <th class="sorting sorting_asc" tabindex="0" aria-controls="example1"
                                                    rowspan="1" colspan="1" aria-sort="ascending"
                                                    aria-label="Rendering engine: activate to sort column descending">
                                                    Место
                                                </th>
                                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                                    colspan="1" aria-label="Browser: activate to sort column ascending">
                                                    ФИО
                                                </th>
                                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                                    colspan="1"
                                                    aria-label="Platform(s): activate to sort column ascending"
                                                    style="">Тариф
                                                </th>
                                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                                    colspan="1"
                                                    aria-label="Engine version: activate to sort column ascending"
                                                    style="">Документ
                                                </th>
                                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                                    colspan="1"
                                                    aria-label="CSS grade: activate to sort column ascending" style="">
                                                    Адрес сбора
                                                </th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @forelse ($tickets as $ticket)
                                                <tr class="odd even">
                                                    <td class="dtr-control sorting_1"
                                                        tabindex="0">{{ $ticket->place }}</td>
                                                    <td>{{ $ticket->fio }}</td>
                                                    <td style="">@if($ticket->tariff == 0) Взрослый @else Детский @endif</td>
                                                    <td style="">@if($ticket->doc == 0) Не указан @else {{ $ticket->doc }} @endif</td>
                                                    <td style="">{{ $ticket->address }}</td>
                                                </tr>
                                            @empty
                                                <tr class="odd even"><td colspan="5"><b>Отсутствуют билеты на указанный рейс</b></td></tr>
                                            @endforelse
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>

            </div>

        </div>

    </section>

@stop

@section('css')
@stop

@section('js')
@stop
