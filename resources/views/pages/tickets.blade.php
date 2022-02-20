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
    <section id="search-section">
        <div class="container">
            <div id="search-box">
                <div class="search-inner">
                    <span class="title">Купить билет <span class="xs-hide"> на автобус</span></span>
                    <div class="search-form row">
                        <div class="col-lg-9 col-xs-12 row">
                            <div class="col-xl-5 col-lg-5 col-sm-6 col-xs-12">
                                <label for="search_from">Пункт отправления</label>
                                <div class="select-outer">
                                    <select id="search_from" class="search_from" name="search_from">
                                        <option value="U">Урай</option>
                                        <option value="HM">Ханты-Мансийск</option>
                                        <option value="UA">Устье-Аха</option>
                                        <option value="N">Нягань</option>
                                        <option value="UG">Югорск</option>
                                        <option value="T">Талинка</option>
                                        <option value="S">Советский</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-xl-5 col-lg-5 col-sm-6 col-xs-12">
                                <label for="search_to">Пункт назначения</label>
                                <div class="select-outer">
                                    <select id="search_to" class="search_to" name="search_to">
                                        <option value="HM">Ханты-Мансийск</option>
                                        <option value="U">Урай</option>
                                        <option value="UA">Устье-Аха</option>
                                        <option value="N">Нягань</option>
                                        <option value="UG">Югорск</option>
                                        <option value="T">Талинка</option>
                                        <option value="S">Советский</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-xl-2 col-lg-2 col-sm-6 col-xs-12">
                                <label for="search_date">Дата выезда</label>
                                <input type="text" id="search_date" value="" placeholder="Дата" autocomplete="off">
                            </div>
                            <div class="col-xl-2 col-lg-2 col-sm-6 col-xs-12 lg-hide">
                                <button class="search-go" onclick="javascript:location.href='http://yoursite.com';">
                                    Найти
                                </button>
                            </div>
                        </div>
                        <div class="col-md-3 col-xs-12 sm-hide">
                            <button class="search-go" onclick="javascript:location.href='/tickets';">Найти</button>
                        </div>
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
            </div>
        </div>
    </section>

    <section id="ticket-section">
        <div class="container">
            <h2 class="section-heading"><p>Расписание автобусов</p> <p>Урай - Ханты-Мансийск</p></h2>
            <div class="calendar">
                <div class="row">
                    <div class="col-4 text-start"><a href="#">< 15 февраля</a></div>
                    <!-- <div id="change_date" class="col-4 text-center">16 февраля 2021 среда</div>-->
                    <label for="change_date" class="col-4 text-center">
                        <span class="long">16 февраля 2021 среда</span>
                        <span class="short">16 февраля</span>
                        <input type="text" id="change_date" value="" placeholder="Дата" autocomplete="off">
                    </label>
                    <div class="col-4 text-end"><a href="#">17 февраля ></a></div>
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
                        onSelect(formattedDate, date, inst) {
                            inst.hide();
                        },
                        position: 'bottom center'
                    });
                });
            </script>
            <div class="row">
                <div class="col-12 ticket">
                    <span class="route">
                        <a href="#">
                            <span class="fa fa-bus icon" style="color:rgba(1, 87, 155, 1)"></span>Урай - Ханты-Мансийск
                        </a>
                        <p class="text-muted">ежедневно</p>
                        <p>  <a data-bs-toggle="collapse" href="#route-1" role="button" aria-expanded="false"
                                aria-controls="collapseExample">Маршрут</a></p>
                    </span>
                    <div class="times">
                    <span class="from">
                            <p class="time">0:05 <sub>18 фев</sub></p>
                            <p class="place text-muted">Урай, сбор по адресам</p>
                    </span>
                        <span class="duration">
                            <p class="text-muted">5 ч 25 мин</p>
                    </span>
                        <span class="to">
                        <p class="time">~5:30 <sub>18 фев</sub></p>
                        <p class="place text-muted">Ханты-Мансийск, автовокзал</p>
                    </span>
                    </div>
                    <div class="choose">
                        <span class="price">
                            <p><sub>12 мест</sub>1400 р.</p>
                        </span>
                        <span class="buy">
                            <button onclick="location.href='/places';">Выбрать место</button>
                        </span>
                    </div>
                </div>
                <div class="collapse" id="route-1">
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
                <div class="col-12 ticket">
                    <span class="route">
                        <a href="#">
                            <span class="fa fa-bus icon" style="color:rgba(1, 87, 155, 1)"></span>Урай - Ханты-Мансийск
                        </a>
                        <p class="text-muted">ежедневно</p>
                        <p>  <a data-bs-toggle="collapse" href="#route-2" role="button" aria-expanded="false"
                                aria-controls="collapseExample">Маршрут</a></p>
                    </span>
                    <div class="times">
                    <span class="from">
                            <p class="time">6:00 <sub>18 фев</sub></p>
                            <p class="place text-muted">Урай, сбор по адресам</p>
                    </span>
                        <span class="duration">
                            <p class="text-muted">5 ч 30 мин</p>
                    </span>
                        <span class="to">
                        <p class="time">~11:30 <sub>18 фев</sub></p>
                        <p class="place text-muted">Ханты-Мансийск, автовокзал</p>
                    </span>
                    </div>
                    <div class="choose">
                        <span class="price">
                            <p><sub>12 мест</sub>1400 р.</p>
                        </span>
                        <span class="buy">
                            <button  onclick="location.href='/places';">Выбрать место</button>
                        </span>
                    </div>
                </div>
                <div class="collapse" id="route-2">
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
            </div>
        </div>
    </section>
@endsection
