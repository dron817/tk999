@extends('layouts.general')

@section('title', 'Купить билет')
@section('custom-css')
    <link href="{{ asset('/assets/css/select2.min.css') }}" rel="stylesheet"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('/assets/css/datepicker.min.css') }}"/>
@endsection
@section('custom-js-before')
    <script src="{{ asset('assets/js/datepicker.min.js') }}"></script>
    <script src="{{ asset('assets/js/i18n/datepicker.en.js') }}"></script>
@endsection
@section('custom-js-after')
    <script>
        $(document).ready(function () {
            $('.search_from').select2();
        });
        $(document).ready(function () {
            $('.search_to').select2();
        });
    </script>
    <script src="{{ asset('/assets/js/select2.min.js') }}"></script>
@endsection
@section('content')

    <section id="ticket-section">
        <div class="container">
            <h2 class="section-heading"><p>Расписание автобусов</p> <p>{{ $from }} - {{ $to }}</p></h2>
            <div class="calendar">
                <div class="row">
                    <div class="col-4 text-start"><a class="{{ $before_disabled }}" href="{{ route('tickets') }}?from={{ $from }}&to={{ $to }}&date={{ $before_date }}">< {{ $before_date_text }}</a></div>
                    <!-- <div id="change_date" class="col-4 text-center">16 февраля 2021 среда</div>-->
                    <label for="change_date" class="col-4 text-center">
                        <span class="long"><img class="calendar-img" src="{{ asset('/assets/img/calendar.png') }}" alt="">{{ $from_date_long }}</span>
                        <span class="short">{{ $from_date }}</span>
                        <input type="text" id="change_date" value="" placeholder="Дата" autocomplete="off">
                    </label>
                    <div class="col-4 text-end"><a href="{{ route('tickets') }}?from={{ $from }}&to={{ $to }}&date={{ $after_date }}"> {{ $after_date_text }} ></a></div>
                </div>
            </div>
            <script>
                $(function () {
                    $('#change_date').datepicker({
                        minDate: new Date(),
                        language: 'ru',
                        isMobile: true,
                        autoClose: true,
                        clearButton: true,
                        dateFormat: 'dd.mm.yyyy',
                        onSelect(formattedDate, date, inst) {
                            inst.hide();
                            location.href='{{ route('tickets') }}?from={{ $from }}&to={{ $to }}&date='+formattedDate;
                        },
                        position: 'bottom center'
                    });
                });
            </script>
            <div class="row">
                @php
                    //убираем уехавшие рейсы
                    $tickets_actual = []; //массив для них
                    $now = date('U'); //получаем текущее время в секундах
                    if ($from_date_clear == date('d.m.Y')){ //только если выбран сегодняшний день
                        foreach ($tickets as $ticket){
                            $from_time_seconds = strtotime($ticket->from_time); //получаем время отправления в секундах (из-за формата работает только сегодняшним днём)
                            if ($now < $from_time_seconds){ //если секунд в билете больше, чем уже прошло
                                $tickets_actual[] = $ticket; //то добавляем его в обновленный массив
                            }
                        }
                    }
                    else $tickets_actual = $tickets; //елси дата не сегодняшняя, то просто выводим все билеты
                @endphp

                @forelse($tickets_actual as $ticket)
                    <div class="col-12 ticket">
                    <span class="route">
                        <a href="#">
                            <span class="fa fa-bus icon" style="color:rgba(1, 87, 155, 1)"></span>
                            {{ $ticket->from }} - {{ $ticket->to }}
                        </a>
                        <p class="text-muted">ежедневно</p>
                        <p>  <a data-bs-toggle="collapse" href="#route-{{ $ticket->id }}" role="button" aria-expanded="false"
                                aria-controls="collapseExample">Маршрут</a></p>
                    </span>
                        <div class="times">
                    <span class="from">
                            <p class="time">{{ $ticket->from_time }} <sub>{{ $from_date }}</sub></p>
                            <p class="place text-muted">{{ $ticket->from_desc }}</p>
                    </span>
                            <span class="duration">
                            <p class="text-muted">{{ $ticket->duration }}</p>
                    </span>
                            <span class="to">
                        <p class="time">~{{ $ticket->to_time }}
                            <sub>
                                @php
                                    if($ticket->change_date==1) echo $to_date; else echo $from_date;
                                @endphp
                            </sub></p>
                        <p class="place text-muted">{{ $ticket->to_desc }}</p>
                    </span>
                        </div>
                        <div class="choose">
                        <span class="price">
                            <p><sub>{{ $ticket->places }} мест</sub>{{ $ticket->price }} р.</p>
                        </span>
                            <span class="buy">
                            <button onclick="location.href='/places?from={{ $from }}&to={{ $to }}&date={{ $from_date_clear }}&trip_id={{ $ticket->id }}';">Выбрать рейс</button>
                        </span>
                        </div>
                    </div>
                    <div class="collapse" id="route-{{ $ticket->id }}">
                        <div class="card card-body">
                            <table>
                                <tr>
                                    <th>Станция</th>
                                    <th>Приб.</th>
                                    <th>Стоянка</th>
                                    <th>Отпр.</th>
                                </tr>
                                <tr>
                                    <td>Урай, по адресам</td>
                                    <td>-</td>
                                    <td>-</td>
                                    <td>0:05</td>
                                </tr>
                                <tr>
                                    <td>Окружная клиническая больница</td>
                                    <td>5:04</td>
                                    <td>1 мин</td>
                                    <td>5:05</td>
                                </tr>
                                <tr>
                                    <td>Cтудгордок</td>
                                    <td>5:09</td>
                                    <td>1 мин</td>
                                    <td>5:10</td>
                                </tr>
                                <tr>
                                    <td>Ханты-Мансийск, аэропорт</td>
                                    <td>5:14</td>
                                    <td>1 мин</td>
                                    <td>5:15</td>
                                </tr>
                                <tr>
                                    <td>Ханты-Мансийск, авто-речной вокзал</td>
                                    <td>5:29</td>
                                    <td>1 мин</td>
                                    <td>5:30</td>
                                </tr>
                                <tr>
                                    <td>Ханты-Мансийск, Трансагентство</td>
                                    <td>5:45</td>
                                    <td>-</td>
                                    <td>-</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                @empty
                    <div class="row">
                        <div class="col-12 message">
                            <p>На выбранную дату не найдено рейсов, либо рейсы уехали</p>
                        </div>
                    </div>
                @endforelse
            </div>
        </div>
    </section>
@endsection
