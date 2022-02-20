@extends('layouts.general')

@section('title', 'Выбор мест')
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
    <section id="places-section">
        <div class="container">
            <h2 class="section-heading"><p>Выбор мест</p>
                <p>Урай - Ханты-Мансийск</p></h2>
            <div id="place-piker-outer">
                <div id="place-piker">
                    <table>
                        <tr>
                            <td><input type="checkbox" onclick="pickPlace(20)" id="20" value="20"><label
                                    for="20">20</label></td>
                            <td></td>
                            <td><input type="checkbox" onclick="pickPlace(3)" id="3" value="3"><label for="3">3</label>
                            </td>
                            <td><input type="checkbox" onclick="pickPlace(6)" id="6" value="6"><label for="6">6</label>
                            </td>
                            <td><input type="checkbox" onclick="pickPlace(9)" id="9" value="9"><label for="9">9</label>
                            </td>
                            <td><input type="checkbox" onclick="pickPlace(12)" id="12" value="12"><label
                                    for="12">12</label></td>
                            <td><input type="checkbox" onclick="pickPlace(15)" id="15" value="15"><label
                                    for="15">15</label></td>
                        </tr>
                        <tr>
                            <td><input type="checkbox" onclick="pickPlace(19)" id="19" value="19"><label
                                    for="19">19</label></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td><input type="checkbox" onclick="pickPlace(16)" id="16" value="16"><label
                                    for="16">16</label></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td><input type="checkbox" onclick="pickPlace(1)" id="1" value="1"><label for="1">1</label>
                            </td>
                            <td><input type="checkbox" onclick="pickPlace(4)" id="4" value="4"><label for="4">4</label>
                            </td>
                            <td><input type="checkbox" onclick="pickPlace(7)" id="7" value="7"><label for="7">7</label>
                            </td>
                            <td><input type="checkbox" onclick="pickPlace(10)" id="10" value="10"><label
                                    for="10">10</label></td>
                            <td><input type="checkbox" onclick="pickPlace(13)" id="13" value="13"><label
                                    for="13">13</label></td>
                            <td><input type="checkbox" onclick="pickPlace(17)" id="17" value="17"><label
                                    for="17">17</label></td>
                        </tr>
                        <tr>
                            <td><input type="checkbox" id="0" value="0" disabled><label for="0">В</label></td>
                            <td><input type="checkbox" onclick="pickPlace(2)" id="2" value="2"><label for="2">2</label>
                            </td>
                            <td><input type="checkbox" onclick="pickPlace(5)" id="5" value="5"><label for="5">5</label>
                            </td>
                            <td><input type="checkbox" onclick="pickPlace(8)" id="8" value="8"><label for="8">8</label>
                            </td>
                            <td><input type="checkbox" onclick="pickPlace(11)" id="11" value="11"><label
                                    for="11">11</label></td>
                            <td><input type="checkbox" onclick="pickPlace(14)" id="14" value="14"><label
                                    for="14">14</label></td>
                            <td><input type="checkbox" onclick="pickPlace(18)" id="18" value="18"><label
                                    for="18">18</label></td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-lg-3">
                    <h2 class="section-heading"><p>Тарифы</p></h2>
                    <div id="peoples">
                        <div id="adult-outer">
                            <label for="tentacles">Взрослый</label>
                            <input type="number" id="adult" readonly value="0" min="1" max="20">
                        </div>

                        <div id="kids-outer">
                            <label for="tentacles">Детский</label>
                            <input type="number" id="kids" readonly value="0" min="1" max="20">
                            <div id="kids-arrows">
                                <div id="kids-up" onclick="kidsPlus()">&#8743;</div>
                                <div id="kids-down" onclick="kidsMinus()">&#8744;</div>
                            </div>
                        </div>
                    </div>
                    <h2 class="section-heading"><p>Способ оплаты</p></h2>
                    <div id="payments">
                        <div onclick="clickHider()" id="hider">&#8744;</div>
                        <form>
                            <div onclick="choseCard()" id="card-outer"  class="payment">
                                <img src="{{ asset('assets/img/payments/card.png') }}" alt=""> <label for="card">Картой онлайн</label> <input checked name="payment" id="card" type="radio">
                            </div>
                            <div onclick="choseCash()" id="cash-outer" class="payment">
                                <img src="{{ asset('assets/img/payments/cash.png') }}" alt=""> <label for="cash">Наличными водителю</label> <input name="payment" id="cash" type="radio">
                            </div>
                            <script>
                                let HiderF = 0;
                                function choseCard(){
                                    $("#card").prop("checked", true);
                                    $("#cash-outer").hide();
                                    $("#payments").css("height", "70px");
                                    $("#hider").html("&#8744;");
                                    HiderF=0;
                                }
                                function choseCash(){
                                    $("#cash").prop("checked", true);
                                    $("#card-outer").hide();
                                    $("#payments").css("height", "70px");
                                    $("#hider").html("&#8744;");
                                    HiderF=0;
                                }
                                function clickHider(){
                                    if (HiderF === 0){
                                        $("#card-outer").show();
                                        $("#cash-outer").show();
                                        $("#payments").css("height", "140px");
                                        $("#hider").html("&#8743;");
                                        HiderF=1;
                                    }
                                    else{
                                        $("#payments").css("height", "70px");
                                        $("#hider").html("&#8744;");
                                        HiderF=0;
                                    }
                                }
                            </script>
                        </form>
                    </div>
                </div>
                <div class="col-12 col-lg-9">
                    <h2 class="section-heading"><p>Данные пассажиров</p></h2>
                    <div class="person-data-outer row">
                        <b class="col-12">Пассажир №1</b>
                        <div class="data-group col-12 col-lg-3 col-md-6">
                            <label for="fio_1">Фамилия Имя Отчество</label>
                            <input id="fio_1" type="text">
                        </div>
                        <div class="data-group col-12 col-lg-3 col-md-6">
                            <label for="phone_1">Телефон</label>
                            <input id="phone_1" type="text">
                        </div>
                        <div class="data-group col-12 col-lg-3 col-md-6">
                            <label for="doc_1">Паспорт</label>
                            <input id="doc_1" type="text">
                            <label>
                                <input type="checkbox" name="withOutDoc">Не указывать паспорт
                            </label>
                        </div>
                        <div class="data-group col-12 col-lg-3 col-md-6">
                            <label for="address_1">Адрес сбора</label>
                            <input id="address_1" type="text">
                            <label>
                                <input type="checkbox" name="withOutDoc">Одинаковый для всех
                            </label>
                        </div>
                    </div>
                    <div class="person-data-outer row">
                        <b class="col-12">Пассажир №2</b>
                        <div class="data-group col-12 col-lg-3 col-md-6">
                            <label for="fio_1">Фамилия Имя Отчество</label>
                            <input id="fio_1" type="text">
                        </div>
                        <div class="data-group col-12 col-lg-3 col-md-6">
                            <label for="phone_1">Телефон</label>
                            <input id="phone_1" type="text">
                        </div>
                        <div class="data-group col-12 col-lg-3 col-md-6">
                            <label for="doc_1">Паспорт</label>
                            <input id="doc_1" type="text">
                            <label>
                                <input type="checkbox" name="withOutDoc">Не указывать паспорт
                            </label>
                        </div>
                        <div class="data-group col-12 col-lg-3 col-md-6">
                            <label for="address_1">Адрес сбора</label>
                            <input id="address_1" type="text">
                            <label>
                                <input type="checkbox" name="withOutDoc">Одинаковый для всех
                            </label>
                        </div>
                    </div>
                </div>
            </div>
            <script type="text/javascript">
                function pickPlace(id) {
                    let adult = $('#adult').val();
                    let kids = $('#kids').val();;
                    if ($('#' + id).is(':checked')) {
                        adult++;
                    } else {
                        if (kids > 0)
                            if (adult <= 1)
                                kids--;
                            else
                                adult--;
                        else
                            adult--;
                    }
                    $('#adult').val(adult);
                    $('#kids').val(kids);
                }
                function kidsPlus() {
                    let adult = $('#adult').val();
                    if (adult <= 1) return;
                    let kids = $('#kids').val();
                    adult--;
                    kids++;
                    $('#adult').val(adult);
                    $('#kids').val(kids);
                }
                function kidsMinus() {
                    let adult = $('#adult').val();
                    let kids = $('#kids').val();;
                    if (kids <= 0) return;
                    adult++;
                    kids--;
                    $('#adult').val(adult);
                    $('#kids').val(kids);
                }
            </script>
        </div>
    </section>
@endsection
