@extends('layouts.general')

@section('title', 'Пассажирские перевозки')
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
    @include('tpl.modal-beta')
    @include('tpl.search')

    <section id="popular-section">
        <div class="container">
            <h2 class="section-heading">Популярные направления</h2>
            <div class="row">
                <div class="col-12 col-sm-6 col-lg-3">
                    <a id="UA" href="{{ route('tickets') }}?from=Урай&to=Устье-Аха">
                        <span class="from">Урай -</span>
                        <span class="to">Устье-Аха</span>
                        <span class="price">от 500 р.</span>
                    </a>
                </div>
                <div class="col-12 col-sm-6 col-lg-3">
                    <a id="HM" href="{{ route('tickets') }}?from=Урай&to=Ханты-Мансийск">
                        <span class="from">Урай -</span>
                        <span class="to">Ханты-Мансийск</span>
                        <span class="price">от 1400 р.</span>
                    </a>
                </div>
                <div class="col-12 col-sm-6 col-lg-3">
                    <a id="UA" href="{{ route('tickets') }}?from=Устье-Аха&to=Урай">
                        <span class="from">Устье-Аха -</span>
                        <span class="to">Урай</span>
                        <span class="price">от 500 р.</span>
                    </a>
                </div>
                <div class="col-12 col-sm-6 col-lg-3">
                    <a id="HM" href="{{ route('tickets') }}?from=Ханты-Мансийск&to=Урай">
                        <span class="from">Ханты-Мансийск -</span>
                        <span class="to">Урай</span>
                        <span class="price">от 1400 р.</span>
                    </a>
                </div>
            </div>
        </div>
    </section>
    <section id="links-section">
        <div class="container">
            <h2 class="section-heading">Полезные ссылки</h2>
            <div class="row">
                <div class="col-12 col-sm-6 col-lg-3">
                    <a id="rzd" href="https://www.rzd.ru/">
                        <span class="first-text">Билеты на поезд</span>
                        <span class="second-text">Купить на сайте РЖД</span>
                    </a>
                </div>
                <div class="col-12 col-sm-6 col-lg-3">
                    <a id="svrpk" href="https://svrpk.ru/">
                        <span class="first-text">Билеты на электричку</span>
                        <span class="second-text">Купить на сайте СВРПК</span>
                    </a>
                </div>
                <div class="col-12 col-sm-6 col-lg-3">
                    <a id="biletDO" href="https://bilet.do/">
                        <span class="first-text">Автобус в направлении Сургут</span>
                        <span class="second-text">Купить на сайте Bilet.do</span>
                    </a>
                </div>
                <div class="col-12 col-sm-6 col-lg-3">
                    <a id="ya" href="https://rasp.yandex.ru/bus/tyumen--tavda">
                        <span class="first-text">Направление Тавда - Тюмень </span>
                        <span class="second-text">на Яндекс.Расписании</span>
                    </a>
                </div>
            </div>
            </div>
        </div>
    </section>

    <section id="schedule-section">
        <div class="container">
            <h2 class="section-heading">Расписание</h2>
            <div class="row">
                @foreach($trips as $trip)
                    @if($trip->days_of_week<>'')
                        <div class="col-12 schedule">
                            <span class="route">
                                <a href="#">
                                    <span class="fa fa-bus icon" style="color:rgba(1, 87, 155, 1)"></span>
                                    {{ $trip->from }} - {{ $trip->to }}
                                </a>
                                <p class="text-muted">{{ $trip->string_days }}</p>
                                <p>  <a data-bs-toggle="collapse" href="#route-{{ $trip->id }}" role="button" aria-expanded="false" aria-controls="collapseExample">Маршрут</a></p>
                            </span>
                            <div class="times">
                            <span class="from">
                                <p class="time">{{ $trip->from_time }}</p>
                                <p class="place text-muted">{{ $trip->from_desc }}</p>
                            </span>
                            <span class="duration">
                                <p class="text-muted">{{ $trip->duration }}</p>
                            </span>
                            <span class="to">
                                <p class="time">~{{ $trip->to_time }}</p>
                                <p class="place text-muted">{{ $trip->to_desc }}</p>
                            </span>
                            </div>
                            <div class="choose">
                                <span class="price">
                                    <p>от {{ $trip->price }} р.</p>
                                </span>
                                <span class="buy">
                                    <button onclick="location.href='{{ route('tickets') }}?from={{ $trip->from }}&to={{ $trip->to }}';">Выбрать дату</button>
                                </span>
                            </div>
                        </div>
                        <div class="collapse" id="route-{{ $trip->id }}">
                            <div class="card card-body">
{{--                                @include('tpl.trip_track', $trip)--}}
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </section>
@endsection
