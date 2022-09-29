@extends('layouts.general')

@section('title', 'Выбор мест')
@section('custom-css')
    <link rel="stylesheet" type="text/css" href="{{ asset('/assets/css/progress-button/component.css') }}"/>
@endsection
@section('custom-js-before')
    <script src="{{ asset('/assets/js/progress-button/modernizr.custom.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.maskedinput.min.js') }}"></script>
@endsection
@section('custom-js-after')
    <meta http-equiv="Cache-Control" content="max-age=0, must-revalidate">
    <meta http-equiv="expires" content="0">
    <script src="{{ asset('/assets/js/progress-button/classie.js') }}"></script>
    <script src="{{ asset('/assets/js/progress-button/progressButton.js') }}"></script>
    <script src="{{ asset('/assets/js/place-picker.js') }}?v8"></script>
    <script>
        [].slice.call( document.querySelectorAll( 'button.progress-button' ) ).forEach( function( bttn ) {
            new ProgressButton( bttn, {
                callback : function( instance ) {
                    let progress = 0,
                        interval = setInterval( function() {
                            progress = Math.min( progress + Math.random() * 0.1, 1 );
                            instance._setProgress( progress );

                            if( progress === 1 ) {
                                instance._stop(1);
                                clearInterval( interval );
                            }
                        }, 200 );
                }
            } );
        } );
    </script>
@endsection
@section('content')
    <section id="places-section">
        <div class="container">
            <h2 class="section-heading"><p>Выбор мест |</p>
                <p>{{ $from }} - {{ $to }} |</p>
                <p>{{ $date }}</p></h2>
            <div id="place-piker-outer">
                @if ($tong==1)
                    @include('tpl.places.tong_bus')
                @else
                    @if ($trip_id >= 5 and $trip_id <= 8)
                        @include('tpl.places.without19and20_bus')
                    @elseif ($trip_id >= 9 and $trip_id <= 10)
                        @include('tpl.places.without20_bus')
                    @else
                        @include('tpl.places.normal_bus')
                    @endif
                @endif
            </div>
            @if(Auth::check())

                @moder
                    <div class="row justify-content-md-center">
                        <div class="col-12 col-lg-12">
                            <div id="adult-outer">
                                <input type="hidden" id="author" value="{{ auth()->user()->name }}">
                                <input type="hidden" id="admin_link" value="{{ route('admin.home') }}?trip_id={{ app('request')->input('trip_id') }}&date={{ app('request')->input('date') }}">
                                <button class="btn btn-success" id="booking">Бронировать без оплаты</button>
                            </div>
                        </div>
                    </div>
                @endmoder

            @endif


            <!-- {{ $dtz = date_default_timezone_set('Asia/Yekaterinburg') }} -->
            @if(date('U', strtotime($trip_data->from_time.$clear_date)) > time()+$trip_data->dempfer_time*60)
                @include('tpl.buy_ticket_form')
            @else
                @include('tpl.cant_buy_ticket')
            @endif
        </div>
    </section>
@endsection
