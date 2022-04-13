@extends('adminlte::page')

@section('title', 'Изменение билета')

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
                            <h3 class="card-title">Изменение билета</h3>
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
                                                let trip_id = $('#trip_id').val();
                                                location.href='{{ route('admin.home') }}?trip_id='+trip_id+'&date='+date;
                                            }
                                            $('#back').click(function() {
                                                back();
                                            });
                                        </script>
                                    </div>
                                    <div class="col-sm-2">
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                            </div>
                                            <input type="text" class="form-control" id="date" value="{{ $ticket->date }}" placeholder="Дата" autocomplete="off">
                                            <script>
                                                $(function () {
                                                    $('#date').datepicker({
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
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-bus"></i></span>
                                            </div>
                                            <select id="trip_id" class="form-control" name="trip_id">
                                                @foreach( $trips as $trip )
                                                    <option value="{{ $trip->id }}" @if ($trip->id == $ticket->trip_id) selected @endif>{{ $trip->from }} - {{ $trip->to }} ({{ $trip->from_time }})</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                @if( Auth::user()->name == 'TK999' || Auth::user()->name == $ticket->author)
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
                                                        <input type="text" class="form-control" id="fio" value="{{ $ticket->fio }}">
                                                    </div>
                                                    <label for="place">Место</label>
                                                    <div class="input-group mb-3">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"><i class="fas fa-chair"></i></span>
                                                        </div>
                                                        <select name="place" id="place" class="form-control">
                                                            @foreach ($free_places as $free_place)
                                                                <option @if ($free_place == $ticket->place) selected @endif value="{{ $free_place }}">{{ $free_place }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <label for="phone">Телефон</label>
                                                    <div class="input-group mb-3">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                                        </div>
                                                        <input type="text" class="form-control" id="phone" value="{{ $ticket->phone }}">
                                                    </div>
                                                    <script>
                                                        $('#phone').mask('79999999999');
                                                    </script>
                                                    <label for="doc">Номер документа</label>
                                                    <div class="input-group mb-3">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"><i class="fas fa-id-card"></i></span>
                                                        </div>
                                                        <input type="text" class="form-control" id="doc" value="{{ $ticket->doc }}">
                                                    </div>
                                                    <label for="address">Адрес сбора</label>
                                                    <div class="input-group mb-3">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"><i class="fas fa-map-marker"></i></span>
                                                        </div>
                                                        <input type="text" class="form-control" id="address" value="{{ $ticket->address }}">
                                                    </div>
                                                </div>
                                                <input type="hidden" id="ticket_id" value="{{ $ticket->id }}">
                                                @csrf
                                                <div class="card-footer">
                                                    <button id="send" class="btn btn-warning">Изменить</button>
                                                </div>
                                                <script>
                                                    function SendForm() {
                                                        let data = {}

                                                        data['fio'] = $('#fio').val();
                                                        data['place'] = $('#place').val();
                                                        data['phone'] = $('#phone').val();
                                                        data['doc'] = $('#doc').val();
                                                        data['address'] = $('#address').val();

                                                        data['ticket_id'] = $('#ticket_id').val();
                                                        data['trip_id'] = $('#trip_id').val();
                                                        data['date'] = $('#date').val();

                                                        $.ajax({
                                                            dataType: "json",
                                                            type: "POST",
                                                            url: "letEdit",
                                                            data: {
                                                                data: data,
                                                                "_token": $('input[name="_token"]').val()
                                                            }
                                                        }).done(function (msg) {
                                                            console.log(msg['msg']);
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
                                @else
                                    <b>Нет доступа к данному билету</b>
                                @endif
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
