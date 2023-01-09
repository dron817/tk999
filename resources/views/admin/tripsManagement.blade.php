@extends('adminlte::page')

@section('title', 'Панель диспетчера')

@section('content_header')
    <h1>Редактирование маршрутов</h1>
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
                                        <button id="add_ticket" class="btn btn-outline-primary buttons-copy buttons-html5"
                                                tabindex="0"
                                                aria-controls="example1" type="button">
                                            <span>< Назад в панель</span></button>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach( $trips as $trip)
                    <div class="col-4">
                        <div class="card">
                            <div class="card-header">
                                {{ $trip->id }}. {{ $trip->from }} - {{ $trip->to }} ({{$trip->from_time}})
                            </div>
                            <div class="card-body">
                                <label>График выездов</label><br>
                                <script>
                                    function EditTrip(trip_id) {
                                        let days = '';
                                        let dempfer_time = $('#dt' + trip_id).val();
                                        let off_days = $('#off_d' + trip_id).val();
                                        let price = $('#price' + trip_id).val();
                                        for (let i = 1; i <= 7; i++){
                                            if ($('#cb' + trip_id + '_' + i).is(':checked')) days=days+'_'+i;
                                        }
                                        let url = '{{ route('admin.letEditTrip') }}' + '?trip_id=' + trip_id + '&days=' + days + '&dempfer_time=' + dempfer_time+ '&price=' + price+ '&off_days=' + off_days;
                                        location.href = url;
                                    }
                                </script>
                                <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                    @php
                                        for ($i = 1; $i <= 7; $i++){
                                            echo '<label class="btn btn-outline-primary">
                                            <input type="checkbox" id="cb'.$trip->id.'_'.$i.'" ';
                                                if (str_contains($trip->days_of_week, $i))
                                                        echo 'checked';
                                                echo ' >';
                                                switch ($i){
                                                    case '1': echo 'ПН'; break;
                                                    case '2': echo 'ВТ'; break;
                                                    case '3': echo 'СР'; break;
                                                    case '4': echo 'ЧТ'; break;
                                                    case '5': echo 'ПТ'; break;
                                                    case '6': echo 'СБ'; break;
                                                    case '7': echo 'ВС'; break;
                                                }
                                                echo '</label>';
                                        }
                                    @endphp
                                </div>
                                <br>
                                <br>
                                <label>Цена</label>
                                <input class="form-control" id="price{{$trip->id}}" type="text" placeholder="" value="{{ $trip->price }}">
                                <br>
                                <label>Закрыть покупку за (минут)</label>
                                <input class="form-control" id="dt{{$trip->id}}" type="text" placeholder="" value="{{ $trip->dempfer_time }}">
                                <br>
                                <label>Исключить поездки по датам:</label>
                                <input class="form-control" id="off_d{{$trip->id}}" type="text" placeholder="" value="{{ $trip->off_days }}">
                                <sub>Через запятую, без пробелов. Пример: 23.02,08.03</sub>
                            </div>
                            <div class="card-footer">
                                <button id="trip{{ $trip->id }}" type="button" class="btn btn-outline-primary">
                                    <i class="fa fa-save" aria-hidden="true"></i> Сохранить
                                </button>
                                <script>
                                    $("#trip{{ $trip->id }}").click(function () {
                                        EditTrip({{ $trip->id }});
                                    });
                                </script>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@stop
