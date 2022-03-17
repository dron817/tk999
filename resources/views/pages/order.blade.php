@extends('layouts.general')

@section('title', 'Купить билет')
@section('custom-css')
@endsection
@section('custom-js-before')
@endsection
@section('custom-js-after')
@endsection
@section('content')
    @include('tpl.search')
    <section id="order-section">
        <div class="container">
            <div class="row">
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
            </div>
        </div>
    </section>
@endsection
