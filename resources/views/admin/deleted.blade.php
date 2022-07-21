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
                            <h3 class="card-title">Перечень последних удалённых билетов</h3>
                        </div>
                        <div class="card-body">
                            <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                <div class="row">
                                    <div class="col-sm-12 col-md-4">
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
                                                    style="">Маршрут
                                                </th>
                                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                                    colspan="1"
                                                    aria-label="Platform(s): activate to sort column ascending"
                                                    style="">Дата
                                                </th>
                                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                                    colspan="1"
                                                    aria-label="Platform(s): activate to sort column ascending"
                                                    style="">Тариф
                                                </th>
                                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                                    colspan="1"
                                                    aria-label="Engine version: activate to sort column ascending"
                                                    style="">Телефон
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
                                                    Ред.
                                                </th>
                                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                                    colspan="1"
                                                    aria-label="CSS grade: activate to sort column ascending" style="">
                                                    Билет
                                                </th>
                                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                                    colspan="1"
                                                    aria-label="CSS grade: activate to sort column ascending" style="">
                                                    Удалить
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
                                                        <td style=""> {{ $ticket->way  }}</td>
                                                        <td style=""> {{ $ticket->date  }}</td>
                                                        <td style="">@if($ticket->tariff == 0) Взрослый @else
                                                                Детский @endif</td>
                                                        <td style="">@if($ticket->phone == 0) Не
                                                            указан @else {{ $ticket->phone }} @endif</td>
                                                        <td style="">{{ $ticket->address }} <b>{{ $ticket->comment }}</b></td>

                                                        <td style="">
                                                            @if($ticket->author == 'web')
                                                                <button style="width: 76px;" type="button" class="btn btn-info"
                                                                        data-toggle="modal"
                                                                        data-target="#modal-info{{ $ticket->id }}">
                                                                    WEB
                                                                    @if($ticket->payed == 'succeeded')
                                                                        <i class="fa fa-check" aria-hidden="true"></i>
                                                                    @elseif($ticket->payed == 'pending')
                                                                        <i class="fa fa-clock" aria-hidden="true"></i>
                                                                    @else
                                                                        <i class="fa fa-ban" aria-hidden="true"></i>
                                                                    @endif
                                                                </button>
                                                                <div class="modal fade" id="modal-info{{ $ticket->id }}"
                                                                     style="display: none;" aria-hidden="true">
                                                                    <div class="modal-dialog">
                                                                        <div class="modal-content bg-info">
                                                                            <div class="modal-header">
                                                                                <h4 class="modal-title">Информация о билете</h4>
                                                                                <button type="button" class="close"
                                                                                        data-dismiss="modal"
                                                                                        aria-label="Close">
                                                                                    <span aria-hidden="true">×</span>
                                                                                </button>
                                                                            </div>
                                                                            <div class="modal-body">
                                                                                <p>Номер заказа:</p><p><b>{{ $ticket->order_id }}</b></p>
                                                                                <p>Идентификатор билета:</p><p><b>{{ $ticket->id }}</b></p>
                                                                                <p>Время заказа:</p><p><b>{{ $ticket->created_at }}</b></p>
                                                                                <p>Идентификатор платежа:</p><p><b>{{ $ticket->payment_id }}</b></p>
                                                                            </div>
                                                                            <div
                                                                                class="modal-footer justify-content-between">
                                                                                <button type="button"
                                                                                        class="btn btn-outline-light"
                                                                                        data-dismiss="modal">Закрыть
                                                                                </button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                            @else
                                                                {{ $ticket->author }}
                                                            @endif
                                                        </td>

                                                        <td style=""><a href="{{ route('admin.edit') }}?ticket_id={{ $ticket->id }}">
                                                                <button type="button" class="btn btn-warning">
                                                                    <i class="fa fa-edit" aria-hidden="true"></i>
                                                                </button>
                                                            </a>
                                                        </td>
                                                        <td style=""><a href="/print?ticket_id={{ $ticket->id }}">
                                                                <button type="button" class="btn btn-primary">
                                                                    <i class="fa fa-download" aria-hidden="true"></i>
                                                                </button>
                                                            </a>
                                                        </td>
                                                        <td style="">
                                                            <button type="button" class="btn btn-danger"
                                                                    data-toggle="modal"
                                                                    data-target="#modal-danger{{ $ticket->id }}">
                                                                <i class="fa fa-trash" aria-hidden="true"></i>
                                                            </button>
                                                            <div class="modal fade" id="modal-danger{{ $ticket->id }}"
                                                                 style="display: none;" aria-hidden="true">
                                                                <div class="modal-dialog">
                                                                    <div class="modal-content bg-danger">
                                                                        <div class="modal-header">
                                                                            <h4 class="modal-title">Удаление билета</h4>
                                                                            <button type="button" class="close"
                                                                                    data-dismiss="modal"
                                                                                    aria-label="Close">
                                                                                <span aria-hidden="true">×</span>
                                                                            </button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <p>Вы уверены, что хотите удалить билет?</p>
                                                                            <p>Это действие невозможно отменить</p>
                                                                        </div>
                                                                        <div
                                                                            class="modal-footer justify-content-between">
                                                                            <button type="button"
                                                                                    class="btn btn-outline-light"
                                                                                    data-dismiss="modal">Отменить
                                                                            </button>
                                                                            <a href="{{ route('admin.delete') }}?ticket_id={{ $ticket->id }}&trip_num={{ request()->get('trip_num') }}&trip_id={{ request()->get('trip_id') }}&date={{ request()->get('date') }}">
                                                                                <button type="button"
                                                                                        class="btn btn-outline-light">
                                                                                    Удалить
                                                                                </button>
                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @else
                                                    <tr class="odd even">
                                                        <td class="dtr-control sorting_1"
                                                            tabindex="0">{{ $ticket->place }}</td>
                                                        <td>Забронировано</td>
                                                        <td style=""> -</td>
                                                        <td style=""> -</td>
                                                        <td style=""> -</td>
                                                        <td style="">{{ $ticket->author }}</td>
                                                        <td style=""> -</td>
                                                        <td style=""> -</td>
                                                    </tr>
                                                @endif
                                            @empty
                                                <tr class="odd even">
                                                    <td colspan="8"><b>Отсутствуют билеты на указанный рейс</b></td>
                                                </tr>
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
