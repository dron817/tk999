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
                            <h3 class="card-title">Добавление билета</h3>
                        </div>
                        <div class="card-body">
                            <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                <div class="row">
                                    <div class="col-sm-12 col-md-4">
                                        <div class="dt-buttons btn-group flex-wrap">
                                            <button id="back" class="btn btn-secondary buttons-copy buttons-html5" tabindex="0"
                                                    aria-controls="example1" type="button">
                                                <span>Назад</span></button>
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
                                        <div class="form-group">
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
                                                        },
                                                        position: 'bottom center'
                                                    });

                                                });
                                            </script>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <select id="trip_id" class="form-control" name="trip_id">
                                                @foreach( $trips as $trip )
                                                    <option value="{{ $trip->id }}">{{ $trip->from }} - {{ $trip->to }} ({{ $trip->from_time }})</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="card card-secondary">
                                            <div class="card-header">
                                                <h3 class="card-title">Данные пассажира</h3>
                                            </div>
                                            <form>
                                                <div class="card-body">
                                                    <div class="form-group">
                                                        <label for="fio">Фамилия Имя Отчество</label>
                                                        <input type="text" class="form-control" id="fio">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="tariff">Тариф</label>
                                                        <select name="tariff" id="tariff" class="form-control">
                                                            <option value="0">Взрослый</option>
                                                            <option value="1">Детский</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="place">Место</label>
                                                        <input type="text" class="form-control" id="place">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="phone">Телефон</label>
                                                        <input type="text" class="form-control" id="phone">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="doc">Номер документа</label>
                                                        <input type="text" class="form-control" id="doc">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="address">Адрес сбора</label>
                                                        <input type="text" class="form-control" id="address">
                                                    </div>
                                                </div>
                                                @csrf
                                                <div class="card-footer">
                                                    <button id="send" type="submit" class="btn btn-success">Бронировать</button>
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

                                                        data['trip_id'] = $('#trip_id').val();
                                                        data['date'] = $('#date').val();
                                                        data['count'] = 1;

                                                        $.ajax({
                                                            dataType: "json",
                                                            type: "POST",
                                                            url: "/order",
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
                                            </form>
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
