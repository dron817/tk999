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
                    <a id="UG" href="{{ route('tickets') }}?from=Урай&to=Югорск">
                        <span class="from">Урай -</span>
                        <span class="to">Югорск</span>
                        <span class="price">от 1000 р.</span>
                    </a>
                </div>
                <div class="col-12 col-sm-6 col-lg-3">
                    <a id="SV" href="{{ route('tickets') }}?from=Урай&to=Советский">
                        <span class="from">Урай -</span>
                        <span class="to">Советский</span>
                        <span class="price">от 1000 р.</span>
                    </a>
                </div>
                <div class="col-12 col-sm-6 col-lg-3">
                    <a id="NY" href="{{ route('tickets') }}?from=Урай&to=Нягань">
                        <span class="from">Урай -</span>
                        <span class="to">Нягань</span>
                        <span class="price">от 1000 р.</span>
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
                <div class="col-12 col-sm-6 col-lg-3">
                    <a id="UG" href="{{ route('tickets') }}?from=Югорск&to=Урай">
                        <span class="from">Югорск -</span>
                        <span class="to">Урай</span>
                        <span class="price">от 1000 р.</span>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <section id="schedule-section">
        <div class="container">
            <h2 class="section-heading">Расписание</h2>
            <div class="row">
                @foreach($tickets as $ticket)
                    @if($ticket->days_of_week<>'')
                        <div class="col-12 schedule">
                            <span class="route">
                                <a href="#">
                                    <span class="fa fa-bus icon" style="color:rgba(1, 87, 155, 1)"></span>
                                    {{ $ticket->from }} - {{ $ticket->to }}
                                </a>
                                <p class="text-muted">ежедневно</p>
                                <p>  <a data-bs-toggle="collapse" href="#route-{{ $ticket->id }}" role="button" aria-expanded="false" aria-controls="collapseExample">Маршрут</a></p>
                            </span>
                            <div class="times">
                            <span class="from">
                                    <p class="time">{{ $ticket->from_time }}</p>
                                    <p class="place text-muted">{{ $ticket->from_desc }}</p>
                            </span>
                                <span class="duration">
                                    <p class="text-muted">{{ $ticket->duration }}</p>
                            </span>
                                <span class="to">
                                <p class="time">~{{ $ticket->to_time }}</p>
                                <p class="place text-muted">{{ $ticket->to_desc }}</p>
                            </span>
                            </div>
                            <div class="choose">
                                <span class="price">
                                    <p>от {{ $ticket->price }} р.</p>
                                </span>
                                <span class="buy">
                                    <button onclick="location.href='{{ route('tickets') }}?from={{ $ticket->from }}&to={{ $ticket->to }}';">Выбрать дату</button>
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
                    @endif
                @endforeach
            </div>
        </div>
    </section>
@endsection
