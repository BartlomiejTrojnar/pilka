// ------------------------ (C) mgr inż. Bartłomiej Trojnar; 16.10.2022 ------------------------ //

// ----------------------------- wybór państwa w polu select ----------------------------- //
function countryChanged() {
    $('select[name="country_id"]').bind('change', function(){
        $.ajax({
            type: "GET",
            url: "http://localhost/pilka/public/panstwo/"+ $(this).val() +"/change",
            data: { country_id: $(this).val() },
            success: function(result) { window.location.reload(); },
            error: function(result) { window.location.reload(); },
        });
        return false;
    });
}

function showCreateRowClick() {
    $('#showCreateRow').click(function(){
        $(this).hide(1000);
        $('table#referees').animate({width: '1250px'}, 500);
        showCreateRow();
    });
}

function showCreateRow() {
    $.ajax({
        method: "GET",
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
        url: "http://localhost/pilka/public/sedzia/create",
        data: { version: "forIndex" },
        success: function(result) { $('table#referees').append(result); },
        error: function() {
            var error = '<tr><td colspan="10" class="error" hidden>Błąd tworzenia wiersza z formularzem dodawania sędziego.</td></tr>';
            $('table#referees tr.create').after(error);
            $('td.error').show(1200);
        },
    });
}

function addClick() {     // ustawienie instrukcji po kliknięciu anulowania lub potwierdzenia dodawania klasy
    $('table#referees').delegate('#cancelAdd', 'click', function() {
        $('#createRow').fadeOut(1000);
        $('#showCreateRow').fadeIn(1000);
    });

    $('table#referees').delegate('#add', 'click', function() {
        $('#createRow').fadeOut(1000);
        $('#showCreateRow').fadeIn(1000);
        add();
    });
}

function add() {   // zapisanie klasy w bazie danych
    alert('dokończyć funkcję add w skrypcie referee/index.js');
    return;
    // var year_of_beginning = $('#createRow input[name="year_of_beginning"]').val();
    // var year_of_graduation = $('#createRow input[name="year_of_graduation"]').val();
    // var symbol = $('#createRow input[name="symbol"]').val();
    // var school_id = $('#createRow select[name="school_id"]').val();
    // var lp = $('#countGrades').val()-1+2;
/*
    $.ajax({
        method: "POST",
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
        url: "http://localhost/school/klasa",
        data: { year_of_beginning: year_of_beginning, year_of_graduation: year_of_graduation, symbol: symbol, school_id: school_id },
        success: function(id) {
            refreshRow(id, lp, "add");
            $('#countGrades').val(lp);
        },
        error: function() {
            var error = '<tr><td colspan="4" class="error">Błąd dodawania klasy.</td></tr>';
            $('table#grades tr.create').after(error);
        },
    });
*/
}


// ----------------------------------- ZAŁADOWANIE DOKUMENTU ------------------------------------ //
$(document).ready(function() {
//    countryChanged();
    showCreateRowClick();
    addClick();
});