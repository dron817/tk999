@extends('layouts.general')

@section('title', 'Купить билет')
@section('custom-css')
    <link rel="stylesheet" type="text/css" href="{{ asset('/assets/css/datepicker.min.css') }}"/>
@endsection
@section('custom-js-before')
    <script src="{{ asset('assets/js/datepicker.min.js') }}"></script>
    <script src="{{ asset('assets/js/i18n/datepicker.en.js') }}"></script>
@endsection
@section('custom-js-after')
@endsection
@section('content')
    @include('tpl.search')
    <section id="order-section">
        <div class="container">
            <div class="row">
                @if ($payed == 'succeeded')
                    <div class="col-12 order">
                        <h1>Ваш заказ успешно оформлен</h1>
                        <p><b>Рейс:</b> {{ $trip->from }} - {{ $trip->to }} | {{ $tickets{0}->date }} {{ $trip->from_time }}</p>
                    </div>
                    @foreach($tickets as $ticket)
                        <div class="col-12 order-ticket">
                            <span class="route">

                                    <p><span class="fa fa-user icon" style="color:rgba(1, 87, 155, 1)"></span>  {{ $ticket->fio }}</p>
                                    <p>{{ $ticket->address }}</p>
                                    <i>@if($ticket->doc<>0) Документ: {{ $ticket->doc }} @else без документа @endif</i>
                            </span>
                            <div class="choose">
                                <span class="price">
                                    <p>Место: {{ $ticket->place }}</p>
                                </span>
                                <span class="buy">
                                        <a href="/print?ticket_id={{ $ticket->id }}">Скачать</a>
                                </span>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="col-12 order">
                        <h1>Ваши билеты не оплачены</h1>
                        <p><a href="">Обновить</a></p>
                        <p><a href="{{ $payment_url }}">Перейти к оплате</a></p>
                        <p><b>Если это ошибка, свяжитесь с диспетчером<a href="tel:79088962999">8 (908) 89-62-999</a></b></p>
                    </div>
                @endif
            </div>
        </div>
    </section>
@endsection
