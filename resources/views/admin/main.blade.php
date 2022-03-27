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
                        <div class="card-header">
                            <h3 class="card-title">Перечень билетов на рейс</h3>
                        </div>
                        <div class="card-body">
                            <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                <div class="row">
                                    <div class="col-sm-12 col-md-4">
                                        <div class="dt-buttons btn-group flex-wrap">
                                            <button id="add_ticket" class="btn btn-primary buttons-copy buttons-html5" tabindex="0"
                                                    aria-controls="example1" type="button">
                                                <span>Добавить билет</span></button>
                                        </div>
                                        <script>
                                            function add_ticket() {
                                                let date = $('#search_date').val();
                                                let trip_num = $('#trip_num').val();
                                                location.href='{{ route('admin.add') }}?trip_num='+trip_num+'&date='+date;
                                            }
                                            $('#add_ticket').click(function() {
                                                add_ticket();
                                            });
                                        </script>
                                        <div class="dt-buttons btn-group flex-wrap">
                                            <button id="print" class="btn btn-secondary buttons-copy buttons-html5" tabindex="0"
                                                    aria-controls="example1" type="button">
                                                <span>Версия для печати</span></button>
                                        </div>
                                        <script>
                                            function getPrint() {
                                                let date = $('#search_date').val();
                                                let trip_num = $('#trip_num').val();
                                                location.href='{{ route('admin.print') }}?trip_num='+trip_num+'&date='+date;
                                            }
                                            $('#print').click(function() {
                                                getPrint();
                                            });
                                        </script>
                                    </div>
                                    <div class="col-sm-2">
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                            </div>
                                            <input type="text" class="form-control" id="search_date" value="{{ $date }}" placeholder="Дата" autocomplete="off">
                                            <script>
                                                $(function () {
                                                    $('#search_date').datepicker({
                                                        minDate: new Date(),
                                                        language: 'ru',
                                                        isMobile: true,
                                                        autoClose: true,
                                                        clearButton: true,
                                                        onSelect(formattedDate, date, inst) {
                                                            inst.hide();
                                                        },
                                                        position: 'bottom center'
                                                    });

                                                });
                                            </script>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-bus"></i></span>
                                            </div>
                                            <select id="trip_num" class="form-control" name="trip_num">
                                                <option value="1" @if( $trip_num==1) selected @endif>1. Урай - Устье-Аха (5:00)</option>
                                                <option value="2" @if( $trip_num==2) selected @endif>2. Урай - Устье-Аха (14:30)</option>
                                                <option value="3" @if( $trip_num==3) selected @endif>3. Устье-Аха - Урай (11:50)</option>
                                                <option value="4" @if( $trip_num==4) selected @endif>4. Устье-Аха - Урай (23:00)</option>
                                                <option value="5" @if( $trip_num==5) selected @endif>5. Урай - Ханты-Мансийск (00:05)</option>
                                                <option value="6" @if( $trip_num==6) selected @endif>6. Ханты-Мансийск - Урай (12:00)</option>
                                                <option value="7" @if( $trip_num==7) selected @endif>7. Урай - Ханты-Мансийск (06:00)</option>
                                                <option value="8" @if( $trip_num==8) selected @endif>8. Ханты-Мансийск - Урай (16:00)</option>
                                                <option value="9" @if( $trip_num==9) selected @endif>9. Югорск - Урай (08:00)</option>
                                                <option value="10" @if( $trip_num==10) selected @endif>10. Урай - Югорск (17:05)</option>
                                                <option value="11" @if( $trip_num==11) selected @endif>11. Урай - Нягань (05:00)</option>
                                                <option value="12" @if( $trip_num==12) selected @endif>12. Нягань - Урай (14:00)</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-2">
                                        <div class="form-group">
                                            <button id="show_trip" type="button" class="btn btn-block btn-success">Показать</button>
                                        </div>
                                        <script>
                                            function show_trip() {
                                                let date = $('#search_date').val();
                                                let trip_num = $('#trip_num').val();
                                                location.href='{{ route('admin.home') }}?trip_num='+trip_num+'&date='+date;
                                            }
                                            $('#show_trip').click(function() {
                                                show_trip();
                                            });
                                        </script>
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
                                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                                    colspan="1"
                                                    aria-label="CSS grade: activate to sort column ascending" style="">
                                                    Заказчик
                                                </th>
                                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                                    colspan="1"
                                                    aria-label="CSS grade: activate to sort column ascending" style="">
                                                    Билет
                                                </th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @forelse ($tickets as $ticket)
                                                @if( Auth::user()->name == 'TK999' || Auth::user()->name == $ticket->author)
                                                <tr class="odd even">
                                                    <td class="dtr-control sorting_1"
                                                        tabindex="0">{{ $ticket->place }}</td>
                                                    <td>{{ $ticket->fio }}</td>
                                                    <td style="">@if($ticket->tariff == 0) Взрослый @else Детский @endif</td>
                                                    <td style="">@if($ticket->doc == 0) Не указан @else {{ $ticket->doc }} @endif</td>
                                                    <td style="">{{ $ticket->address }}</td>
                                                    <td style="">{{ $ticket->author }}</td>
                                                    <td style=""><a href="/print?ticket_id={{ $ticket->id }}">Скачать</a></td>
                                                </tr>
                                                @else
                                                    <tr class="odd even">
                                                    <td class="dtr-control sorting_1"
                                                        tabindex="0">{{ $ticket->place }}</td>
                                                    <td>Забронировано</td>
                                                    <td style=""> - </td>
                                                    <td style=""> - </td>
                                                    <td style=""> - </td>
                                                    <td style="">{{ $ticket->author }}</td>
                                                    <td style=""> - </td>
                                                </tr>
                                                @endif
                                            @empty
                                                <tr class="odd even"><td colspan="6"><b>Отсутствуют билеты на указанный рейс</b></td></tr>
                                            @endforelse
                                            </tbody>
                                        </table>
                                        Свободных мест: <b>{{ $free_places }}</b>
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
    <link rel="stylesheet" type="text/css" href="{{ asset('/assets/css/datepicker.min.css') }}"/>
@stop

@section('js')
    <script src="{{ asset('assets/js/datepicker.min.js') }}"></script>
    <script src="{{ asset('assets/js/i18n/datepicker.en.js') }}"></script>
@stop
