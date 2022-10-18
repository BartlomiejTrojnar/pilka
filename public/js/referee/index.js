// ------------------------ (C) mgr inż. Bartłomiej Trojnar; 18.10.2022 ------------------------ //

// ----------------------------- wybór państwa w polu select ----------------------------- //
function countryChanged() {
    $('select[name="country_id"]').bind('change', function(){
        $.ajax({
            type: "GET",
            url: "http://localhost/pilka/public/panstwo/"+ $(this).val() +"/change",
            data: { country_id: $(this).val() },
            success: function() { window.location.reload(); },
            error: function() { window.location.reload(); },
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
        success: function(result) { $('table#referees tr.create').before(result); },
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
    var active          = $('#createRow input[name="active"]').prop('checked');
    var lp = $('#countReferees').val()-1+2;

    $.ajax({
        method: "POST",
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
        url: "http://localhost/pilka/public/sedzia",
        data: { first_name: first_name, last_name: last_name, country_id: country_id, district: district, date_of_birth: date_of_birth, active: active },
        success: function(id) {
            refreshRow(id, lp);
            $('#countReferees').html(lp);
        },
        error: function() {
            var error = '<tr><td colspan="10" class="error">Błąd dodawania sędziego.</td></tr>';
            $('table#referees tr.create').after(error);
        },
    });
}

function refreshRow(id, lp=0, version="add") {  // utworzenie wiersza z sędzią o podanym identyfikatorze
    $.ajax({
        method: "POST",
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
        url: "http://localhost/pilka/public/sedzia/refreshRow",
        data: { id: id, lp: lp },
        success: function(result) {
            if(version=="add") {
                $('tr.create').before(result);
                $('tr[data-referee_id="'+id+'"]').fadeIn(1500);
                $('#showCreateRow').show();
            }
            else {
                $('tr[data-referee_id="'+id+'"]').replaceWith(result);
                $('tr[data-referee_id="'+id+'"]').fadeIn(1500);
            }
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
                $.when( $('tr[data-referee_id='+id+']').fadeOut(500) ).then(function() {
                    $('tr[data-referee_id='+id+']').replaceWith(result);
                    $('tr[data-referee_id='+id+'].editRow').fadeIn(1500);
                    updateClick();
                });
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
        var id = $(this).data('referee_id');
        $.when( $('.editRow[data-referee_id='+id+']').fadeOut(500) ).then( function() {
            var lp = $('tr[data-referee_id='+id+'] input[name="lp"]').val();
            refreshRow(id, lp, "edit");
        });
    });

    $('.update').click(function(){
        var id = $(this).data('referee_id');
        $.when( $('.editRow[data-referee_id='+id+']').fadeOut(500) ).then( function() {
            update(id);
        });
    });
}

function update(id) {   // zapisanie klasy w bazie danych
    var first_name      = $('tr[data-referee_id='+id+'] input[name="first_name"]').val();
    var last_name       = $('tr[data-referee_id='+id+'] input[name="last_name"]').val();
    var country_id      = $('tr[data-referee_id='+id+'] select[name="country_id"]').val();
    var district        = $('tr[data-referee_id='+id+'] input[name="district"]').val();
    var date_of_birth   = $('tr[data-referee_id='+id+'] input[name="date_of_birth"]').val();
    var active          = $('tr[data-referee_id='+id+'] input[name="active"]').prop('checked');
    var lp              = $('tr[data-referee_id='+id+'] input[name="lp"]').val();

    $.ajax({
        method: "PUT",
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
        url: "http://localhost/pilka/public/sedzia/"+id,
        data: { id: id, first_name: first_name, last_name: last_name, country_id: country_id, district: district, date_of_birth: date_of_birth, active: active },
        success: function(result) {  refreshRow(id, lp, "edit"); },
        error: function() {
            var error = '<tr><td colspan="10" class="error">Błąd modyfikowania sędziego.</td></tr>';
            $('tr[data-referee_id='+id+'].editRow').replaceWith(error);
        },
    });
}

function destroyClick() {  // usunięcie klasy (z bazy danych)
    $('table#referees').delegate('button.destroy', 'click', function() {
        var id = $(this).data('referee_id');
        $.ajax({
            type: "DELETE",
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            url: "http://localhost/pilka/public/sedzia/" + id,
            success: function() {
                $.when( $('tr[data-referee_id='+id+']').animate({height: "0px"}, 500).fadeOut(500) ).then( function() {
                    $('tr[data-referee_id='+id+']').remove();
                 });
            },
            error: function() {
                var error = '<tr><td colspan="10" class="error" hidden style="height: 5px; padding: 0;">Błąd usuwania sędziego.</td></tr>';
                $.when( $('tr[data-referee_id='+id+']').fadeOut(500) ).then( function() {
                   $('tr[data-referee_id='+id+']').after(error).remove();
                   $('td.error').fadeIn(250).animate({padding: "20px"}, 1000);
                });
            }
        });
        return false;
    });
}


// ----------------------------------- ZAŁADOWANIE DOKUMENTU ------------------------------------ //
$(document).ready(function() {
    countryChanged();
    showCreateRowClick();
    addClick();
    editClick();
    destroyClick();
});