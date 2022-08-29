@extends('adminlte::page')

@section('title', 'Добавление билета')

@section('content_header')
    <h1>Панель диспетчера</h1>
@stop

@section('content')
    <script src="{{ asset('assets/js/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.maskedinput.min.js') }}"></script>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Добавление билета</h3>
                        </div>
                        <div class="card-body">
                            <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                <div class="row">
                                    <div class="col-sm-12 col-md-4">
                                        <div class="dt-buttons btn-group flex-wrap">
                                            <button id="back" class="btn btn-primary buttons-copy buttons-html5" tabindex="0"
                                                    aria-controls="example1" type="button">
                                                <span>< Назад в панель</span></button>
                                        </div>
                                        <script>
                                            function back() {
                                                let date = $('#date').val();
                                                location.href='{{ route('admin.home') }}?date='+date;
                                            }
                                            $('#back').click(function() {
                                                back();
                                            });
                                        </script>
                                        {{--                                        <div class="dt-buttons btn-group flex-wrap">--}}
                                        {{--                                            <button class="btn btn-secondary buttons-copy buttons-html5" tabindex="0"--}}
                                        {{--                                                    aria-controls="example1" type="button">--}}
                                        {{--                                                <span>Версия для печати</span></button>--}}
                                        {{--                                        </div>--}}
                                    </div>
                                    <div class="col-sm-2">
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                            </div>
                                            <input type="text" class="form-control" id="date" value="{{ $date }}" placeholder="Дата" autocomplete="off">
                                            <script>
                                                $(function () {
                                                    $('#date').datepicker({
                                                        minDate: new Date(),
                                                        language: 'ru',
                                                        isMobile: true,
                                                        autoClose: true,
                                                        clearButton: true,
                                                        onSelect(formattedDate, date, inst) {
                                                            inst.hide();
                                                            let date_pick = $('#date').val();
                                                            let trip_id = $('#trip_id').val();
                                                            location.href='{{ route('admin.add') }}?trip_id='+trip_id+'&date='+date_pick;
                                                        },
                                                        position: 'bottom center'
                                                    });

                                                });
                                            </script>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-bus"></i></span>
                                            </div>
                                            <select id="trip_id" class="form-control" name="trip_id">
                                                @foreach( $trips as $trip )
                                                    <option value="{{ $trip->id }}" @if ($trip->id == $trip_id) selected @endif>{{ $trip->from }} - {{ $trip->to }} ({{ $trip->from_time }})</option>
                                                @endforeach
                                            </select>
                                            <script>
                                                $('#trip_id').on('change', function (e) {
                                                    let date = $('#date').val();
                                                    let trip_id = $('#trip_id').val();
                                                    location.href='{{ route('admin.add') }}?trip_id='+trip_id+'&date='+date;
                                                });
                                            </script>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="card card-secondary">
                                            <div class="card-header">
                                                <h3 class="card-title">Данные пассажира</h3>
                                            </div>
                                                <div class="card-body">
                                                    <label for="fio">Фамилия Имя Отчество</label>
                                                    <div class="input-group mb-3">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                                                        </div>
                                                        <input type="text" class="form-control" id="fio">
                                                    </div>
                                                    <label for="tariff">Тариф</label>
                                                    <div class="input-group mb-3">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"><i class="fas fa-users"></i></span>
                                                        </div>
                                                        <select name="tariff" id="tariff" class="form-control">
                                                            <option value="0">Взрослый</option>
                                                            <option value="1">Детский</option>
                                                        </select>
                                                    </div>
                                                    <label for="price">Цена</label>
                                                    <div class="input-group mb-3">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"><i class="fas fa-coins"></i></span>
                                                        </div>
                                                        <input type="text" class="form-control" id="price">
                                                    </div>
                                                    <label for="place">Место</label>
                                                    <div class="input-group mb-3">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"><i class="fas fa-chair"></i></span>
                                                        </div>
                                                        <select name="place" id="place" class="form-control">
                                                            @foreach ($free_places as $free_place)
                                                                <option value="{{ $free_place }}">{{ $free_place }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <label for="phone">Телефон</label>
                                                    <div class="input-group mb-3">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                                        </div>
                                                        <input type="text" class="form-control" id="phone">
                                                    </div>
                                                    <script>
                                                        $('#phone').mask('79999999999');
                                                    </script>
                                                    <label for="doc">Номер документа</label>
                                                    <div class="input-group mb-3">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"><i class="fas fa-id-card"></i></span>
                                                        </div>
                                                        <input type="text" class="form-control" id="doc">
                                                    </div>
                                                    <label for="address">Адрес сбора</label>
                                                    <div class="input-group mb-3">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"><i class="fas fa-map-marker"></i></span>
                                                        </div>
                                                        @switch($trip_id)
                                                            @case(1)
                                                            <select id="address" class="form-control">
                                                                <option disabled selected>Выберите остановку</option>
                                                                <option>01.Сибирь (05:15)</option>
                                                                <option>02.Гимназия (05:17)</option>
                                                                <option>03.Церковь (05:19)</option>
                                                                <option>04.ГК Нефтяник 1 (05:21)</option>
                                                                <option>05.Аэропорт (05:23)</option>
                                                                <option>06.Звёзды Югры (05:25)</option>
                                                                <option>07.Трансагенство - пристань (05:27)</option>
                                                                <option>08.Почта (05:29)</option>
                                                                <option>09.ТЦ Юбилейный (05:31)</option>
                                                                <option>10.Соц.Защита (05:33)</option>
                                                                <option>11.Горбольница (05:35)</option>
                                                                <option>12.ТПП Урайнефтегаз (05:35)</option>
                                                                <option>13.Молодежная (05:39)</option>
                                                                <option>14.Музей (05:41)</option>
                                                                <option>15.Дом Ребенка (05:43)</option>
                                                                <option>16.Архив (05:45)</option>
                                                                <option>17.Типография (05:47)</option>
                                                                <option>18.Гармония (05:49)</option>
                                                                <option>19.Электросети (05:51)</option>
                                                            </select>
                                                            @break
                                                            @case(2)
                                                            <select id="address" class="form-control">
                                                                <option disabled selected>Выберите остановку</option>
                                                                <option>01.Сибирь (14:45)</option>
                                                                <option>02.Гимназия (14:47)</option>
                                                                <option>03.Церковь (14:49)</option>
                                                                <option>04.ГК Нефтяник 1 (14:51)</option>
                                                                <option>05.Аэропорт (14:53)</option>
                                                                <option>06.Звёзды Югры (14:55)</option>
                                                                <option>07.Трансагенство - пристань (14:57)</option>
                                                                <option>08.Почта (14:59)</option>
                                                                <option>09.ТЦ Юбилейный (15:01)</option>
                                                                <option>10.Соц.Защита (15:03)</option>
                                                                <option>11.Горбольница (15:05)</option>
                                                                <option>12.ТПП Урайнефтегаз (15:07)</option>
                                                                <option>13.Молодежная (15:09)</option>
                                                                <option>14.Музей (15:11)</option>
                                                                <option>15.Дом Ребенка (15:13)</option>
                                                                <option>16.Архив (15:15)</option>
                                                                <option>17.Типография (15:17)</option>
                                                                <option>18.Гармония (15:19)</option>
                                                                <option>19.Электросети (15:21)</option>
                                                            </select>
                                                            @break
                                                            @case(3)
                                                            <select id="address" class="form-control">
                                                                <option selected>Ж/Д Вокзал</option>
                                                            </select>
                                                            @break
                                                            @case(4)
                                                            <select id="address" class="form-control">
                                                                <option selected>Ж/Д Вокзал</option>
                                                            </select>
                                                            @break
                                                            @case(8)
                                                            <select id="address" class="form-control">
                                                                <option disabled selected>Выберите остановку</option>
                                                                <option>Трансагенство</option>
                                                                <option>Окружная клиническая больница</option>
                                                                <option>Речпорт(автовокзал)</option>
                                                            </select>
                                                            @break
                                                            @case(10)
                                                            <select id="address" class="form-control">
                                                                <option disabled selected>Выберите остановку</option>
                                                                <option>Трансагенство</option>
                                                                <option>Окружная клиническая больница</option>
                                                                <option>Речпорт(автовокзал)</option>
                                                            </select>
                                                            @break
                                                            @default
                                                            <input id="address" type="text" class="form-control">
                                                        @endswitch
                                                    </div>
                                                    <label for="comment">Комментарий</label>
                                                    <div class="input-group mb-3">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"><i class="fas fa-pen"></i></span>
                                                        </div>
                                                        <input type="text" class="form-control" id="comment">
                                                    </div>
                                                    <label for="email">E-mail</label>
                                                    <div class="input-group mb-3">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                                        </div>
                                                        <input type="email" class="form-control" id="email">
                                                    </div>
                                                </div>
                                                @csrf
                                                <div class="card-footer">
                                                    <button id="send" class="btn btn-success">Бронировать</button>
                                                </div>
                                                <script>
                                                    function SendForm() {
                                                        let data = {}

                                                        data[1] = {};
                                                        data[1]['fio'] = $('#fio').val();
                                                        data[1]['place'] = $('#place').val();
                                                        data[1]['tariff'] = $('#tariff').val();;
                                                        data[1]['phone'] = $('#phone').val();
                                                        data[1]['doc'] = $('#doc').val();
                                                        data[1]['address'] = $('#address').val();
                                                        data['payment'] = 'cash'

                                                        data['sendSMS'] = 'cash'

                                                        data['trip_id'] = $('#trip_id').val();
                                                        data['date'] = $('#date').val();
                                                        data['count'] = 1;
                                                        data['price'] = $('#price').val();;
                                                        data['author'] = "{{ Auth::user()->name }}";

                                                        data['comment'] = $('#comment').val();
                                                        data['email'] = $('#email').val();

                                                        $.ajax({
                                                            dataType: "json",
                                                            type: "POST",
                                                            url: "booking",
                                                            data: {
                                                                data: data,
                                                                "_token": $('input[name="_token"]').val()
                                                            }
                                                        }).done(function (msg) {
                                                            let date = $('#date').val();
                                                            let trip_id = $('#trip_id').val();
                                                            location.href='{{ route('admin.home') }}?trip_id='+trip_id+'&date='+date;
                                                        })
                                                    }

                                                    $("#send").click(function () {
                                                        SendForm();
                                                    });
                                                </script>
                                        </div>
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
