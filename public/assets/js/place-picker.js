let places = [];

function SendForm() {
    let adult = Number($('#adult').val());
    let kids = Number($('#kids').val());
    let count = adult + kids;

    if (count < 1) {
        return false;
    }
    if ($('#address_1').val() === '') {
        return false;
    }
    if ($('#phone_1').val() === '') {
        return false;
    }

    let data = {}

    for (let i = 1; i <= count; i++) {
        data[i] = {};
        data[i]['fio'] = $('#fio_' + i).val();
        data[i]['place'] = places[i - 1];
        if (i <= adult) {
            data[i]['tariff'] = "0";
            data[i]['phone'] = $('#phone_' + i).val();
        } else {
            data[i]['tariff'] = "1";
            data[i]['phone'] = "0";
        }

        if (!$('#withOutDoc_' + i).is(':checked'))
            data[i]['doc'] = $('#doc_' + i).val();
        else data[i]['doc'] = 0;

        data[i]['address'] = $('#address_' + i).val();
    }
    if ($('#cash').is(':checked'))
        data['payment'] = 'cash'
    if ($('#card').is(':checked'))
        data['payment'] = 'card'

    data['trip_id'] = $('#trip_id').val();
    data['date'] = $('#date').val();
    data['count'] = count;
    data['author'] = 'web';

    let done = $('#price');
    $.ajax({
        dataType: "json",
        type: "POST",
        url: "/order",
        data: {
            data: data,
            "_token": $('input[name="_token"]').val()
        }
    }).done(function (msg) {
        function viewResult(){
            location.href='/order_show?order_id='+msg['redirect'];
        }
        setTimeout(viewResult, 5000);
    })
}

$("#send").click(function () {
    SendForm();
});

function booking() {
    let adult = Number($('#adult').val());
    let kids = Number($('#kids').val());
    let count = adult + kids;

    if (count < 1) {
        return false;
    }

    let data = {}

    for (let i = 1; i <= count; i++) {
        data[i] = {};
        data[i]['fio'] = '-';
        data[i]['place'] = places[i - 1];
        if (i <= adult) {
            data[i]['tariff'] = "0";
            data[i]['phone'] = "0";
        } else {
            data[i]['tariff'] = "1";
            data[i]['phone'] = "0";
        }
        data[i]['doc'] = 0;
        data[i]['address'] = "-";
    }
        data['payment'] = 'booking'

    data['trip_id'] = $('#trip_id').val();
    data['date'] = $('#date').val();
    data['count'] = count;
    data['author'] = $('#author').val();
    data['sendSMS'] = "0";

    $.ajax({
        dataType: "json",
        type: "POST",
        url: "/order",
        data: {
            data: data,
            "_token": $('input[name="_token"]').val()
        }
    }).done(function (msg) {
        location.href=$('#admin_link').val();
    })
}

$("#send").click(function () {
    SendForm();
});

$("#booking").click(function () {
    booking();
});


// обработка нажатий на места в автобусе
function pickPlace(id) {
    let adult = $('#adult').val();
    let kids = $('#kids').val();

    if ($('#' + id).is(':checked')) {
        places.push(id);
        adult++;
    } else {
        places.splice(places.indexOf(id), 1);
        if (kids > 0)
            if (adult <= 1)
                kids--;
            else
                adult--;
        else
            adult--;
    }

    for (let i = 2; i <= 20; i++) {
        $('#pd_' + i).hide();
    }
    let passengers = Number(adult) + Number(kids)
    if (passengers > 1) {
        $('#together-outer').show();
        for (let i = 2; i <= passengers; i++) {
            $('#pd_' + i).show();
        }
    } else {
        $('#together-outer').hide();
    }
    KidsForms(adult, kids);
    $("#adult").val(adult);
    $("#kids").val(kids);

    let cost = $('#count').val();
    let inner = cost*adult + cost*kids*0.5 + ' р.';
    $("#price").html(inner);
}

// Слушаем нажатия на места
for (let i = 1; i <= 16; i++) {
    $("#withOutDoc_" + i).click(function () {
        if ($('#withOutDoc_' + i).is(':checked')) {
            $('#doc_' + i).prop('disabled', true);
            $("#doc_" + i).val('');
        } else {
            $("#doc_" + i).prop('disabled', false);
        }
    })
}


// Детские билеты +
function kidsPlus() {
    let adult = $('#adult').val();
    if (adult <= 1) return;
    let kids = $('#kids').val();
    adult--;
    kids++;
    KidsForms(adult, kids);
    $("#adult").val(adult);
    $("#kids").val(kids);

    let cost = $('#count').val();
    let inner = cost*adult + cost*kids*0.5 + ' р.';
    $("#price").html(inner);
}

// Детские билеты -
function kidsMinus() {
    let adult = $('#adult').val();
    let kids = $('#kids').val();

    if (kids <= 0) return;
    adult++;
    kids--;
    KidsForms(adult, kids);
    $("#adult").val(adult);
    $("#kids").val(kids);

    let cost = $('#count').val();
    let inner = cost*adult + cost*kids*0.5 + ' р.';
    $("#price").html(inner);
}

// Формы билетов в детские
function KidsForms(adult, kids) {
    let pas = Number(adult) + Number(kids);
    for (let i = 0; i < 16; i++) {
        $('#phone-outer_' + i).show();
        $('#tarif_' + i).text('взрослый');
    }
    for (let i = pas; i > Number(adult); i--) {
        $('#phone-outer_' + i).hide();
        $('#tarif_' + i).text('детский');
    }
}


// Выбор способа оплаты
let HiderF = 0;

function choseCard() {
    $("#card").prop("checked", true);
    $("#cash-outer").hide();
    $("#payments").css("height", "70px");
    $("#hider").html("&#8744;");
    HiderF = 0;
}

function choseCash() {
    $("#cash").prop("checked", true);
    $("#card-outer").hide();
    $("#payments").css("height", "70px");
    $("#hider").html("&#8744;");
    HiderF = 0;
}

function clickHider() {
    if (HiderF === 0) {
        $("#card-outer").show();
        $("#cash-outer").show();
        $("#payments").css("height", "140px");
        $("#hider").html("&#8743;");
        HiderF = 1;
    } else {
        $("#payments").css("height", "70px");
        $("#hider").html("&#8744;");
        HiderF = 0;
    }
}


// включение единого адреса
function together() {
    for (let i = 2; i <= 16; i++) {
        if ($('#together').is(':checked')) {
            $('#address_' + i).prop('disabled', true);
            $("#address_" + i).val($("#address_1").val());
        } else {
            $("#address_" + i).prop('disabled', false);
        }
    }
}


// Перенос единого адреса на других пассажиров
$('#address_1').change(function () {
    if ($('#together').is(':checked')) {
        for (let i = 2; i <= 16; i++) {
            $("#address_" + i).val($("#address_1").val());
        }
    }
});


// Липкий aside
(function () {
    if ($(window).width() > 991) {
        let a = document.querySelector('#aside'), b = null, P = 57;
        window.addEventListener('scroll', Ascroll, false);
        document.body.addEventListener('scroll', Ascroll, false);

        function Ascroll() {
            if (b == null) {
                let Sa = getComputedStyle(a, ''), s = '';
                for (let i = 0; i < Sa.length; i++) {
                    if (Sa[i].indexOf('overflow') === 0 || Sa[i].indexOf('padding') === 0 || Sa[i].indexOf('border') === 0 || Sa[i].indexOf('outline') === 0 || Sa[i].indexOf('box-shadow') === 0 || Sa[i].indexOf('background') === 0) {
                        s += Sa[i] + ': ' + Sa.getPropertyValue(Sa[i]) + '; '
                    }
                }
                b = document.createElement('div');
                b.style.cssText = s + ' box-sizing: border-box; width: ' + a.offsetWidth + 'px;';
                a.insertBefore(b, a.firstChild);
                let l = a.childNodes.length;
                for (let i = 1; i < l; i++) {
                    b.appendChild(a.childNodes[1]);
                }
                a.style.height = b.getBoundingClientRect().height + 'px';
                a.style.padding = '0';
                a.style.border = '0';
            }
            let Ra = a.getBoundingClientRect(),
                R = Math.round(Ra.top + b.getBoundingClientRect().height - document.querySelector('#passengers-outer').getBoundingClientRect().bottom);  // селектор блока, при достижении нижнего края которого нужно открепить прилипающий элемент
            if ((Ra.top - P) <= 0) {
                if ((Ra.top - P) <= R) {
                    b.className = 'stop';
                    b.style.top = -R + 'px';
                } else {
                    b.className = 'sticky';
                    b.style.top = P + 'px';
                }
            } else {
                b.className = '';
                b.style.top = '';
            }
            window.addEventListener('resize', function () {
                a.children[0].style.width = getComputedStyle(a, '').width
            }, false);
        }
    }
})()
