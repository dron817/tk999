@extends('layouts.general')

@section('title', 'Главная')
@section('custom-css')
    <link href="{{ asset('/assets/css/select2.min.css') }}" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="{{ asset('/assets/css/datepicker.min.css') }}"/>
@endsection
@section('custom-js-before')
    <script src="{{ asset('assets/js/datepicker.min.js') }}"></script>
    <script src="{{ asset('assets/js/i18n/datepicker.en.js') }}"></script>
@endsection
@section('custom-js-after')
    <script>
        $(document).ready(function() {
            $('.search_from').select2();
        });
        $(document).ready(function() {
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
                                    <select class="search_from" name="search_from">
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
                                    <select class="search_to" name="search_to">
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

    <section id="popular-section">
        <div class="container">
            <h2 class="section-heading">Расписание</h2>
            <div class="row">
                *TODO
            </div>
        </div>
    </section>
    <section>
        <div class="container">
            <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
                <p class="col-md-4 mb-0 text-muted">© 2014-2021  ИП Аднакулов Г.В.</p>
                <a href="/"
                   class="col-md-4 d-flex align-items-center justify-content-center mb-3 mb-md-0 me-md-auto link-dark text-decoration-none navbar-brand">
                    TK999
                </a>

                <ul class="nav col-md-4 justify-content-end">
                    <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">Пассажирские перевозки</a></li>
                </ul>
                <p class="col-md-4 mb-0 text-muted"> ОГРН 304860630800061 Лицензия АСС-86-154006 от 25.11.2014г.</p>
            </footer>
        </div>
    </section>
@endsection
