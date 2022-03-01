<section id="search-section">
        <div class="container">
            <div id="search-box">
                <div class="search-inner">
                    <span class="title">Купить билет <span class="xs-hide"> на автобус</span></span>
                    <div class="search-form row">
                        <div class="col-lg-9 col-xs-12 row">
                            <div class="col-xl-5 col-lg-5 col-sm-6 col-xs-12">
                                <label for="search_from">Пункт отправления</label>
                                <div class="select-outer">
                                    <select id="search_from" class="search_from" name="search_from">
                                        <option value="Урай">Урай</option>
                                        <option value="Устье-Аха">Устье-Аха</option>
                                        <option value="Ханты-Мансийск">Ханты-Мансийск</option>
                                        <option value="Нефтеюганск">Нефтеюганск</option>
                                        <option value="Сургут">Сургут</option>
                                        <option value="Югорск">Югорск</option>
                                        <option value="Советский">Советский</option>
                                        <option value="Нягань">Нягань</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-xl-5 col-lg-5 col-sm-6 col-xs-12">
                                <label for="search_to">Пункт назначения</label>
                                <div class="select-outer">
                                    <select id="search_to" class="search_to" name="search_to">
                                        <option value="Урай">Урай</option>
                                        <option selected value="Устье-Аха">Устье-Аха</option>
                                        <option value="Ханты-Мансийск">Ханты-Мансийск</option>
                                        <option value="Нефтеюганск">Нефтеюганск</option>
                                        <option value="Сургут">Сургут</option>
                                        <option value="Югорск">Югорск</option>
                                        <option value="Советский">Советский</option>
                                        <option value="Нягань">Нягань</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-xl-2 col-lg-2 col-sm-6 col-xs-12">
                                <label for="search_date">Дата выезда</label>
                                <input type="text" id="search_date" value="" placeholder="Дата" autocomplete="off">
                            </div>
                            <div class="col-xl-2 col-lg-2 col-sm-6 col-xs-12 lg-hide">
                                <button id="search_submit_b" class="search-go">Найти</button>
                            </div>
                        </div>
                        <div class="col-md-3 col-xs-12 sm-hide">
                            <button id="search_submit_l" class="search-go">Найти</button>
                        </div>
                        <script>
                            function goSearch() {
                                let from = $('#search_from').val();
                                let to = $('#search_to').val();
                                let date = $('#search_date').val();
                                location.href='/tickets?from='+from+'&to='+to+'&date='+date;
                            }
                            let btn_l = $('#search_submit_l');
                            let btn_b = $('#search_submit_b');
                            $('#search_submit_l').click(function() {
                                goSearch();
                            });
                            $('#search_submit_b').click(function() {
                                goSearch();
                            });

                            $(function () {
                                $('#search_date').datepicker({
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
            </div>
        </div>
    </section>
