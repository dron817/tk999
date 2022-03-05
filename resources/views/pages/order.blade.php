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
                    <p><u>Рейс: Урай - Ханты-Мансийск | 16.03.2022 14:05</u></p>
                    <p>Ваши билеты для скачивания:</p>
                    @foreach($tickets as $ticket)
                        <p><b>{{ $ticket->fio }}</b> - Место: {{ $ticket->place }} - <a href="/print?ticket_id={{ $ticket->id }}">Скачать</a></p>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
@endsection
