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
    var first_name      = $('#createRow input[name="first_name"]').val();
    var last_name       = $('#createRow input[name="last_name"]').val();
    var country_id      = $('#createRow select[name="country_id"]').val();
    var district        = $('#createRow input[name="district"]').val();
    var date_of_birth   = $('#createRow input[name="date_of_birth"]').val();
    var active          = $('#createRow input[name="active"]').val();
    if(active=='on')    active = 1;     else active = 0;
    var lp = $('#countReferees').val()-1+2;

    $.ajax({
        method: "POST",
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
        url: "http://localhost/pilka/public/sedzia",
        data: { first_name: first_name, last_name: last_name, country_id: country_id, district: district, date_of_birth: date_of_birth, active: active },
        success: function(id) {
            addRow(id, lp);
            $('#countReferees').html(lp);
        },
        error: function() {
            var error = '<tr><td colspan="10" class="error">Błąd dodawania sędziego.</td></tr>';
            $('table#referees tr.create').after(error);
        },
    });
}

function addRow(id, lp=0) {  // utworzenie wiersza z sędzią o podanym identyfikatorze
    alert(id);
    alert(lp);
    $.ajax({
        method: "POST",
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
        url: "http://localhost/pilka/public/sedzia/refreshRow",
        data: { id: id, lp: lp },
        success: function(result) {
            $('tr.create').before(result);
            $('#showCreateRow').show();
        },
        error: function() {
            var error = '<tr><td class="error" colspan="10">Błąd odświeżania wiersza sędziego.</td></tr>';
            $('tr.create').before(error);
        },
    });
}

function editClick() {     // kliknięcie przycisku modyfikowania sędziego
    $('table#referees').delegate('button.edit', 'click', function() {
        var id = $(this).data('referee_id');
        var lp = $(this).parent().parent().children(":first").html();
        $.ajax({
            type: "GET",
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            url: "http://localhost/pilka/public/sedzia/"+id+"/edit",
            data: { id: id, lp: lp },
            success: function(result) {
                $('tr[data-referee_id='+id+']').before(result).hide();
                updateClick();
            },
            error: function() {
                var error = '<tr><td colspan="10" class="error">Błąd tworzenia wiersza z formularzem modyfikowania sędziego.</td></tr>';
                $('tr[data-referee_id='+id+']').after(error).hide();
            },
        });
    });
}

function updateClick() {     // ustawienie instrukcji po kliknięciu anulowania lub potwierdzenia modyfikowania klasy
    $('.cancelUpdate').click(function() {
        alert('Dokończyć funkcję updateClick - skrypt referee/index.js');
        // var id = $(this).data('grade_id');
        // $('.editRow[data-grade_id='+id+']').remove();
        // $('tr[data-grade_id='+id+']').show();
    });

    $('.update').click(function(){
        alert('Dokończyć funkcję updateClick - skrypt referee/index.js');
        // var id = $(this).data('grade_id');
        // update(id);
    });
}

function update(id) {   // zapisanie klasy w bazie danych
    var year_of_beginning   = $('tr[data-grade_id='+id+'] input[name="year_of_beginning"]').val();
    var year_of_graduation  = $('tr[data-grade_id='+id+'] input[name="year_of_graduation"]').val();
    var symbol              = $('tr[data-grade_id='+id+'] input[name="symbol"]').val();
    var school_id           = $('tr[data-grade_id='+id+'] select[name="school_id"]').val();
    var lp                  = $('tr[data-grade_id='+id+'] input[name="lp"]').val();

    $.ajax({
        method: "PUT",
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
        url: "http://localhost/school/klasa/"+id,
        data: { id: id, year_of_beginning: year_of_beginning, year_of_graduation: year_of_graduation, symbol: symbol, school_id: school_id },
        success: function() { refreshRow(id, lp, "forIndex"); },
        error: function() {
            var error = '<tr><td colspan="4" class="error">Błąd modyfikowania klasy.</td></tr>';
            $('tr[data-grade_id='+id+'].editRow').after(error).hide();
        },
    });
}

function destroyClick() {  // usunięcie klasy (z bazy danych)
    $('table#grades').delegate('button.destroy', 'click', function() {
        var id = $(this).data('grade_id');
        $.ajax({
            type: "DELETE",
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            url: "http://localhost/school/klasa/" + id,
            success: function() { $('tr[data-grade_id='+id+']').remove(); },
            error: function() {
                var error = '<tr><td colspan="4" class="error">Błąd usuwania klasy.</td></tr>';
                $('tr[data-grade_id='+id+']').after(error).hide();
            }
        });
        return false;
    });
}


// ----------------------------------- ZAŁADOWANIE DOKUMENTU ------------------------------------ //
$(document).ready(function() {
//    countryChanged();
    showCreateRowClick();
    addClick();
    editClick();
//    destroyClick();
});