@extends('layouts.general')

@section('title', 'Выбор мест')
@section('custom-css')
@endsection
@section('custom-js-before')
@endsection
@section('custom-js-after')
    <script src="{{ asset('/assets/js/place-picker.js') }}"></script>
@endsection
@section('content')
    <section id="places-section">
        <div class="container">
            <h2 class="section-heading"><p>Выбор мест</p>
                <p>Урай - Ханты-Мансийск</p>
                <p>18 февраля</p></h2>
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
                <div id="aside" class="col-12 col-lg-3">
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
                            <div onclick="choseCard()" id="card-outer" class="payment">
                                <img src="{{ asset('assets/img/payments/card.png') }}" alt=""> <label for="card">Картой
                                    онлайн</label> <input checked name="payment" id="card" type="radio">
                            </div>
                            <div onclick="choseCash()" id="cash-outer" class="payment">
                                <img src="{{ asset('assets/img/payments/cash.png') }}" alt=""> <label for="cash">Наличными
                                    водителю</label> <input name="payment" id="cash" type="radio">
                            </div>
                        </form>
                    </div>
                </div>
                <div id="passengers-outer" class="col-12 col-lg-9">
                    <h2 class="section-heading"><p>Данные пассажиров</p></h2>
                    <div class="person-data-outer row" id="pd_1">
                        <b class="col-12">Пассажир №1 -
                            Тариф: <span id="tarif_1">взрослый</span></b>
                        <div class="data-group col-12 col-lg-3 col-md-6">
                            <label for="fio_1">Фамилия Имя Отчество</label>
                            <input id="fio_1" type="text">
                        </div>
                        <div class="data-group col-12 col-lg-3 col-md-6">
                            <label for="phone_1">Телефон</label>
                            <input id="phone_1" type="text">
                        </div>
                        <div class="data-group col-12 col-lg-3 col-md-6">
                            <label for="doc_1">Номер документа</label>
                            <input id="doc_1" type="text">
                            <div class="checkbox-group">
                                <div class="checkbox">
                                    <input type="checkbox" id="withOutDoc_1" class="checkbox-input"/>
                                    <label for="withOutDoc_1" class="checkbox-label"></label><span>Не указывать</span>
                                </div>
                            </div>
                        </div>
                        <div class="data-group col-12 col-lg-3 col-md-6">
                            <label for="address_1">Адрес сбора</label>
                            <input id="address_1" type="text">
                            <div class="checkbox-group" id="together-outer" style="display: none;">
                                <div class="checkbox">
                                    <input type="checkbox" id="together" class="checkbox-input" onclick="together()"/>
                                    <label for="together"
                                           class="checkbox-label"></label><span>Одинаковый для всех</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="person-data-outer row" id="pd_2" style="display: none;"><b class="col-12">Пассажир №2 -
                            Тариф: <span id="tarif_2">взрослый</span></b>
                        <div class="data-group col-12 col-lg-3 col-md-6"><label for="fio_2">Фамилия Имя Отчество</label><input
                                type="text" id="fio_2"></div>
                        <div class="data-group col-12 col-lg-3 col-md-6" id="phone-outer_2"><label
                                for="phone_2">Телефон</label><input type="text" id="phone_2"></div>
                        <div class="data-group col-12 col-lg-3 col-md-6"><label for="doc_2">Номер
                                документа</label><input type="text" id="doc_2">
                            <div class="checkbox-group">
                                <div class="checkbox"><input type="checkbox" class="checkbox-input"
                                                             id="withOutDoc_2"><label for="withOutDoc_2"
                                                                                      class="checkbox-label"></label><span>Не указывать</span>
                                </div>
                            </div>
                        </div>
                        <div class="data-group col-12 col-lg-3 col-md-6"><label for="address_2">Адрес
                                сбора</label><input type="text" id="address_2"></div>
                    </div>
                    <div class="person-data-outer row" id="pd_3" style="display: none;"><b class="col-12">Пассажир №3 -
                            Тариф: <span id="tarif_3">взрослый</span></b>
                        <div class="data-group col-12 col-lg-3 col-md-6"><label for="fio_3">Фамилия Имя Отчество</label><input
                                type="text" id="fio_3"></div>
                        <div class="data-group col-12 col-lg-3 col-md-6" id="phone-outer_3"><label
                                for="phone_3">Телефон</label><input type="text" id="phone_3"></div>
                        <div class="data-group col-12 col-lg-3 col-md-6"><label for="doc_3">Номер
                                документа</label><input type="text" id="doc_3">
                            <div class="checkbox-group">
                                <div class="checkbox"><input type="checkbox" class="checkbox-input"
                                                             id="withOutDoc_3"><label for="withOutDoc_3"
                                                                                      class="checkbox-label"></label><span>Не указывать</span>
                                </div>
                            </div>
                        </div>
                        <div class="data-group col-12 col-lg-3 col-md-6"><label for="address_2">Адрес
                                сбора</label><input type="text" id="address_3"></div>
                    </div>
                    <div class="person-data-outer row" id="pd_4" style="display: none;"><b class="col-12">Пассажир №4 -
                            Тариф: <span id="tarif_4">взрослый</span></b>
                        <div class="data-group col-12 col-lg-3 col-md-6"><label for="fio_4">Фамилия Имя Отчество</label><input
                                type="text" id="fio_4"></div>
                        <div class="data-group col-12 col-lg-3 col-md-6" id="phone-outer_4"><label
                                for="phone_4">Телефон</label><input type="text" id="phone_4"></div>
                        <div class="data-group col-12 col-lg-3 col-md-6"><label for="doc_4">Номер
                                документа</label><input type="text" id="doc_4">
                            <div class="checkbox-group">
                                <div class="checkbox"><input type="checkbox" class="checkbox-input"
                                                             id="withOutDoc_4"><label for="withOutDoc_4"
                                                                                      class="checkbox-label"></label><span>Не указывать</span>
                                </div>
                            </div>
                        </div>
                        <div class="data-group col-12 col-lg-3 col-md-6"><label for="address_2">Адрес
                                сбора</label><input type="text" id="address_4"></div>
                    </div>
                    <div class="person-data-outer row" id="pd_5" style="display: none;"><b class="col-12">Пассажир №5 -
                            Тариф: <span id="tarif_5">взрослый</span></b>
                        <div class="data-group col-12 col-lg-3 col-md-6"><label for="fio_5">Фамилия Имя Отчество</label><input
                                type="text" id="fio_5"></div>
                        <div class="data-group col-12 col-lg-3 col-md-6" id="phone-outer_5"><label
                                for="phone_5">Телефон</label><input type="text" id="phone_5"></div>
                        <div class="data-group col-12 col-lg-3 col-md-6"><label for="doc_5">Номер
                                документа</label><input type="text" id="doc_5">
                            <div class="checkbox-group">
                                <div class="checkbox"><input type="checkbox" class="checkbox-input"
                                                             id="withOutDoc_5"><label for="withOutDoc_5"
                                                                                      class="checkbox-label"></label><span>Не указывать</span>
                                </div>
                            </div>
                        </div>
                        <div class="data-group col-12 col-lg-3 col-md-6"><label for="address_2">Адрес
                                сбора</label><input type="text" id="address_5"></div>
                    </div>
                    <div class="person-data-outer row" id="pd_6" style="display: none;"><b class="col-12">Пассажир №6 -
                            Тариф: <span id="tarif_6">взрослый</span></b>
                        <div class="data-group col-12 col-lg-3 col-md-6"><label for="fio_6">Фамилия Имя Отчество</label><input
                                type="text" id="fio_6"></div>
                        <div class="data-group col-12 col-lg-3 col-md-6" id="phone-outer_6"><label
                                for="phone_6">Телефон</label><input type="text" id="phone_6"></div>
                        <div class="data-group col-12 col-lg-3 col-md-6"><label for="doc_6">Номер
                                документа</label><input type="text" id="doc_6">
                            <div class="checkbox-group">
                                <div class="checkbox"><input type="checkbox" class="checkbox-input"
                                                             id="withOutDoc_6"><label for="withOutDoc_6"
                                                                                      class="checkbox-label"></label><span>Не указывать</span>
                                </div>
                            </div>
                        </div>
                        <div class="data-group col-12 col-lg-3 col-md-6"><label for="address_2">Адрес
                                сбора</label><input type="text" id="address_6"></div>
                    </div>
                    <div class="person-data-outer row" id="pd_7" style="display: none;"><b class="col-12">Пассажир №7 -
                            Тариф: <span id="tarif_7">взрослый</span></b>
                        <div class="data-group col-12 col-lg-3 col-md-6"><label for="fio_7">Фамилия Имя Отчество</label><input
                                type="text" id="fio_7"></div>
                        <div class="data-group col-12 col-lg-3 col-md-6" id="phone-outer_7"><label
                                for="phone_7">Телефон</label><input type="text" id="phone_7"></div>
                        <div class="data-group col-12 col-lg-3 col-md-6"><label for="doc_7">Номер
                                документа</label><input type="text" id="doc_7">
                            <div class="checkbox-group">
                                <div class="checkbox"><input type="checkbox" class="checkbox-input"
                                                             id="withOutDoc_7"><label for="withOutDoc_7"
                                                                                      class="checkbox-label"></label><span>Не указывать</span>
                                </div>
                            </div>
                        </div>
                        <div class="data-group col-12 col-lg-3 col-md-6"><label for="address_2">Адрес
                                сбора</label><input type="text" id="address_7"></div>
                    </div>
                    <div class="person-data-outer row" id="pd_8" style="display: none;"><b class="col-12">Пассажир №8 -
                            Тариф: <span id="tarif_8">взрослый</span></b>
                        <div class="data-group col-12 col-lg-3 col-md-6"><label for="fio_8">Фамилия Имя Отчество</label><input
                                type="text" id="fio_8"></div>
                        <div class="data-group col-12 col-lg-3 col-md-6" id="phone-outer_8"><label
                                for="phone_8">Телефон</label><input type="text" id="phone_8"></div>
                        <div class="data-group col-12 col-lg-3 col-md-6"><label for="doc_8">Номер
                                документа</label><input type="text" id="doc_8">
                            <div class="checkbox-group">
                                <div class="checkbox"><input type="checkbox" class="checkbox-input"
                                                             id="withOutDoc_8"><label for="withOutDoc_8"
                                                                                      class="checkbox-label"></label><span>Не указывать</span>
                                </div>
                            </div>
                        </div>
                        <div class="data-group col-12 col-lg-3 col-md-6"><label for="address_2">Адрес
                                сбора</label><input type="text" id="address_8"></div>
                    </div>
                    <div class="person-data-outer row" id="pd_9" style="display: none;"><b class="col-12">Пассажир №9 -
                            Тариф: <span id="tarif_9">взрослый</span></b>
                        <div class="data-group col-12 col-lg-3 col-md-6"><label for="fio_9">Фамилия Имя Отчество</label><input
                                type="text" id="fio_9"></div>
                        <div class="data-group col-12 col-lg-3 col-md-6" id="phone-outer_9"><label
                                for="phone_9">Телефон</label><input type="text" id="phone_9"></div>
                        <div class="data-group col-12 col-lg-3 col-md-6"><label for="doc_9">Номер
                                документа</label><input type="text" id="doc_9">
                            <div class="checkbox-group">
                                <div class="checkbox"><input type="checkbox" class="checkbox-input"
                                                             id="withOutDoc_9"><label for="withOutDoc_9"
                                                                                      class="checkbox-label"></label><span>Не указывать</span>
                                </div>
                            </div>
                        </div>
                        <div class="data-group col-12 col-lg-3 col-md-6"><label for="address_2">Адрес
                                сбора</label><input type="text" id="address_9"></div>
                    </div>
                    <div class="person-data-outer row" id="pd_10" style="display: none;"><b class="col-12">Пассажир №10
                            - Тариф: <span id="tarif_10">взрослый</span></b>
                        <div class="data-group col-12 col-lg-3 col-md-6"><label for="fio_10">Фамилия Имя
                                Отчество</label><input type="text" id="fio_10"></div>
                        <div class="data-group col-12 col-lg-3 col-md-6" id="phone-outer_10"><label for="phone_10">Телефон</label><input
                                type="text" id="phone_10"></div>
                        <div class="data-group col-12 col-lg-3 col-md-6"><label for="doc_10">Номер
                                документа</label><input type="text" id="doc_10">
                            <div class="checkbox-group">
                                <div class="checkbox"><input type="checkbox" class="checkbox-input"
                                                             id="withOutDoc_10"><label for="withOutDoc_10"
                                                                                       class="checkbox-label"></label><span>Не указывать</span>
                                </div>
                            </div>
                        </div>
                        <div class="data-group col-12 col-lg-3 col-md-6"><label for="address_2">Адрес
                                сбора</label><input type="text" id="address_10"></div>
                    </div>
                    <div class="person-data-outer row" id="pd_11" style="display: none;"><b class="col-12">Пассажир №11
                            - Тариф: <span id="tarif_11">взрослый</span></b>
                        <div class="data-group col-12 col-lg-3 col-md-6"><label for="fio_11">Фамилия Имя
                                Отчество</label><input type="text" id="fio_11"></div>
                        <div class="data-group col-12 col-lg-3 col-md-6" id="phone-outer_11"><label for="phone_11">Телефон</label><input
                                type="text" id="phone_11"></div>
                        <div class="data-group col-12 col-lg-3 col-md-6"><label for="doc_11">Номер
                                документа</label><input type="text" id="doc_11">
                            <div class="checkbox-group">
                                <div class="checkbox"><input type="checkbox" class="checkbox-input"
                                                             id="withOutDoc_11"><label for="withOutDoc_11"
                                                                                       class="checkbox-label"></label><span>Не указывать</span>
                                </div>
                            </div>
                        </div>
                        <div class="data-group col-12 col-lg-3 col-md-6"><label for="address_2">Адрес
                                сбора</label><input type="text" id="address_11"></div>
                    </div>
                    <div class="person-data-outer row" id="pd_12" style="display: none;"><b class="col-12">Пассажир №12
                            - Тариф: <span id="tarif_12">взрослый</span></b>
                        <div class="data-group col-12 col-lg-3 col-md-6"><label for="fio_12">Фамилия Имя
                                Отчество</label><input type="text" id="fio_12"></div>
                        <div class="data-group col-12 col-lg-3 col-md-6" id="phone-outer_12"><label for="phone_12">Телефон</label><input
                                type="text" id="phone_12"></div>
                        <div class="data-group col-12 col-lg-3 col-md-6"><label for="doc_12">Номер
                                документа</label><input type="text" id="doc_12">
                            <div class="checkbox-group">
                                <div class="checkbox"><input type="checkbox" class="checkbox-input"
                                                             id="withOutDoc_12"><label for="withOutDoc_12"
                                                                                       class="checkbox-label"></label><span>Не указывать</span>
                                </div>
                            </div>
                        </div>
                        <div class="data-group col-12 col-lg-3 col-md-6"><label for="address_2">Адрес
                                сбора</label><input type="text" id="address_12"></div>
                    </div>
                    <div class="person-data-outer row" id="pd_13" style="display: none;"><b class="col-12">Пассажир №13
                            - Тариф: <span id="tarif_13">взрослый</span></b>
                        <div class="data-group col-12 col-lg-3 col-md-6"><label for="fio_13">Фамилия Имя
                                Отчество</label><input type="text" id="fio_13"></div>
                        <div class="data-group col-12 col-lg-3 col-md-6" id="phone-outer_13"><label for="phone_13">Телефон</label><input
                                type="text" id="phone_13"></div>
                        <div class="data-group col-12 col-lg-3 col-md-6"><label for="doc_13">Номер
                                документа</label><input type="text" id="doc_13">
                            <div class="checkbox-group">
                                <div class="checkbox"><input type="checkbox" class="checkbox-input"
                                                             id="withOutDoc_13"><label for="withOutDoc_13"
                                                                                       class="checkbox-label"></label><span>Не указывать</span>
                                </div>
                            </div>
                        </div>
                        <div class="data-group col-12 col-lg-3 col-md-6"><label for="address_2">Адрес
                                сбора</label><input type="text" id="address_13"></div>
                    </div>
                    <div class="person-data-outer row" id="pd_14" style="display: none;"><b class="col-12">Пассажир №14
                            - Тариф: <span id="tarif_14">взрослый</span></b>
                        <div class="data-group col-12 col-lg-3 col-md-6"><label for="fio_14">Фамилия Имя
                                Отчество</label><input type="text" id="fio_14"></div>
                        <div class="data-group col-12 col-lg-3 col-md-6" id="phone-outer_14"><label for="phone_14">Телефон</label><input
                                type="text" id="phone_14"></div>
                        <div class="data-group col-12 col-lg-3 col-md-6"><label for="doc_14">Номер
                                документа</label><input type="text" id="doc_14">
                            <div class="checkbox-group">
                                <div class="checkbox"><input type="checkbox" class="checkbox-input"
                                                             id="withOutDoc_14"><label for="withOutDoc_14"
                                                                                       class="checkbox-label"></label><span>Не указывать</span>
                                </div>
                            </div>
                        </div>
                        <div class="data-group col-12 col-lg-3 col-md-6"><label for="address_2">Адрес
                                сбора</label><input type="text" id="address_14"></div>
                    </div>
                    <div class="person-data-outer row" id="pd_15" style="display: none;"><b class="col-12">Пассажир №15
                            - Тариф: <span id="tarif_15">взрослый</span></b>
                        <div class="data-group col-12 col-lg-3 col-md-6"><label for="fio_15">Фамилия Имя
                                Отчество</label><input type="text" id="fio_15"></div>
                        <div class="data-group col-12 col-lg-3 col-md-6" id="phone-outer_15"><label for="phone_15">Телефон</label><input
                                type="text" id="phone_15"></div>
                        <div class="data-group col-12 col-lg-3 col-md-6"><label for="doc_15">Номер
                                документа</label><input type="text" id="doc_15">
                            <div class="checkbox-group">
                                <div class="checkbox"><input type="checkbox" class="checkbox-input"
                                                             id="withOutDoc_15"><label for="withOutDoc_15"
                                                                                       class="checkbox-label"></label><span>Не указывать</span>
                                </div>
                            </div>
                        </div>
                        <div class="data-group col-12 col-lg-3 col-md-6"><label for="address_2">Адрес
                                сбора</label><input type="text" id="address_15"></div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="sum-outer">
                        <p>Общая стоимость: <span id="price">3 800 р.</span></p>
                        <button>Забронировать</button>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
