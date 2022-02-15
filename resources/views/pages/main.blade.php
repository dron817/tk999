@extends('layouts.general')

@section('title', 'Главная')
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
                                <button class="search-go">Найти</button>
                            </div>
                        </div>
                        <div class="col-md-3 col-xs-12 sm-hide">
                            <button class="search-go">Найти</button>
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

    <section id="popular-section">
        <div class="container">
            <h2 class="section-heading">Популярные направления</h2>
            <div class="row">
                <div class="col-12 col-sm-6 col-lg-3">
                    <a id="HM" href="#">
                        <span class="from">Урай -</span>
                        <span class="to">Ханты-Мансийск</span>
                        <span class="price">от 1400 р.</span>
                    </a>
                </div>
                <div class="col-12 col-sm-6 col-lg-3">
                    <a id="UG" href="#">
                        <span class="from">Урай -</span>
                        <span class="to">Югорск</span>
                        <span class="price">от 1000 р.</span>
                    </a>
                </div>
                <div class="col-12 col-sm-6 col-lg-3">
                    <a id="UA" href="#">
                        <span class="from">Урай -</span>
                        <span class="to">Устье-Аха</span>
                        <span class="price">от 500 р.</span>
                    </a>
                </div>
                <div class="col-12 col-sm-6 col-lg-3">
                    <a id="SV" href="#">
                        <span class="from">Урай -</span>
                        <span class="to">Советский</span>
                        <span class="price">от 1000 р.</span>
                    </a>
                </div>
                <div class="col-12 col-sm-6 col-lg-3">
                    <a id="NY" href="#">
                        <span class="from">Урай -</span>
                        <span class="to">Нягань</span>
                        <span class="price">от 1000 р.</span>
                    </a>
                </div>
                <div class="col-12 col-sm-6 col-lg-3">
                    <a id="TA" href="#">
                        <span class="from">Урай -</span>
                        <span class="to">Талинка</span>
                        <span class="price">от 1000 р.</span>
                    </a>
                </div>
                <div class="col-12 col-sm-6 col-lg-3">
                    <a id="HM" href="#">
                        <span class="from">Ханты-Мансийск -</span>
                        <span class="to">Урай</span>
                        <span class="price">от 1400 р.</span>
                    </a>
                </div>
                <div class="col-12 col-sm-6 col-lg-3">
                    <a id="UG" href="#">
                        <span class="from">Югорск -</span>
                        <span class="to">Урай</span>
                        <span class="price">от 1000 р.</span>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <section id="ticket-section">
        <div class="container">
            <h2 class="section-heading">Расписание</h2>
            <div class="row">
                <div class="col-12 ticket">
                    <span class="route">
                        <a href="#">
                            <span class="fa fa-bus icon" style="color:rgba(1, 87, 155, 1)"></span>Урай - Ханты-Мансийск
                        </a>
                        <p class="text-muted">ежедневно</p>
                        <p>  <a data-bs-toggle="collapse" href="#route-1" role="button" aria-expanded="false" aria-controls="collapseExample">Маршрут</a></p>
                    </span>
                    <div class="times">
                    <span class="from">
                            <p class="time">0:05</p>
                            <p class="place text-muted">Урай, сбор по адресам</p>
                    </span>
                        <span class="duration">
                            <p class="text-muted">5 ч 25 мин</p>
                    </span>
                        <span class="to">
                        <p class="time">~5:30</p>
                        <p class="place text-muted">Ханты-Мансийск, автовокзал</p>
                    </span>
                    </div>
                    <div class="choose">
                        <span class="price">
                            <p>от 1400 р.</p>
                        </span>
                        <span class="buy">
                            <button>Выбрать дату</button>
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
                        <p>  <a data-bs-toggle="collapse" href="#route-2" role="button" aria-expanded="false" aria-controls="collapseExample">Маршрут</a></p>
                    </span>
                    <div class="times">
                    <span class="from">
                            <p class="time">6:00</p>
                            <p class="place text-muted">Урай, сбор по адресам</p>
                    </span>
                        <span class="duration">
                            <p class="text-muted">5 ч 30 мин</p>
                    </span>
                        <span class="to">
                        <p class="time">~11:30</p>
                        <p class="place text-muted">Ханты-Мансийск, автовокзал</p>
                    </span>
                    </div>
                    <div class="choose">
                        <span class="price">
                            <p>от 1400 р.</p>
                        </span>
                        <span class="buy">
                            <button>Выбрать дату</button>
                        </span>
                    </div>
                </div><div class="collapse" id="route-2">
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
                            <span class="fa fa-bus icon" style="color:rgba(1, 87, 155, 1)"></span>Урай - Советский - Нягань
                        </a>
                        <p class="text-muted">ежедневно</p>
                        <p>  <a data-bs-toggle="collapse" href="#route-3" role="button" aria-expanded="false" aria-controls="collapseExample">Маршрут</a></p>
                    </span>
                    <div class="times">
                    <span class="from">
                            <p class="time">5:00</p>
                            <p class="place text-muted">Урай, сбор по адресам</p>
                    </span>
                        <span class="duration">
                            <p class="text-muted">3 ч 10 мин</p>
                    </span>
                        <span class="to">
                        <p class="time">~8:10</p>
                        <p class="place text-muted">Советский, ж/д вокзал</p>
                    </span>
                    </div>
                    <div class="choose">
                        <span class="price">
                            <p>от 1000 р.</p>
                        </span>
                        <span class="buy">
                            <button>Выбрать дату</button>
                        </span>
                    </div>
                </div><div class="collapse" id="route-3">
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
                            <span class="fa fa-bus icon" style="color:rgba(1, 87, 155, 1)"></span>Урай — Советский — Югорск
                        </a>
                        <p class="text-muted">ежедневно</p>
                        <p>  <a data-bs-toggle="collapse" href="#route-4" role="button" aria-expanded="false" aria-controls="collapseExample">Маршрут</a></p>
                    </span>
                    <div class="times">
                    <span class="from">
                            <p class="time">13:50</p>
                            <p class="place text-muted">Урай, сбор по адресам</p>
                    </span>
                        <span class="duration">
                            <p class="text-muted">3 ч 30 мин</p>
                    </span>
                        <span class="to">
                        <p class="time">~17:20</p>
                        <p class="place text-muted">Советский, ж/д вокзал</p>
                    </span>
                    </div>
                    <div class="choose">
                        <span class="price">
                            <p>от 1000 р.</p>
                        </span>
                        <span class="buy">
                            <button>Выбрать дату</button>
                        </span>
                    </div>
                </div><div class="collapse" id="route-4">
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


    <section id="footer-section">
        <div class="container">
            <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
                <p class="col-md-4 mb-0 text-muted">© 2014-2021 ИП Аднакулов Г.В.</p>
                <a href="/"
                   class="col-md-4 d-flex align-items-center justify-content-center mb-3 mb-md-0 me-md-auto link-dark text-decoration-none navbar-brand">
                    TK999
                </a>
                <ul class="nav col-md-4 justify-content-end">
                    <li class="nav-item"><a href="https://vk.com/zorgo" class="nav-link px-2  text-muted">Разработка: ZORGO</a></li>
                </ul>
                <p class="col-md-12 mb-0 text-muted"> Пассажирские перевозки.</p>
                <p class="col-md-12 mb-0 text-muted"> ОГРН 304860630800061 Лицензия АСС-86-154006 от 25.11.2014г.</p>
            </footer>
        </div>
    </section>
@endsection
