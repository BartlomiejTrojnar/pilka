// ------------------------ (C) mgr inż. Bartłomiej Trojnar; 28.12.2022 ------------------------ //
// ----------------------------------- zarządzanie stadionami ---------------------------------- //
function showCreateRowClick() {
    $('#showCreateRow').click(function(){
        $(this).hide(1000);
        $('table#stadiums').animate({width: '1250px'}, 500);
        showCreateRow();
    });
}

function showCreateRow() {
    $.ajax({
        method: "GET",
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
        url: "http://localhost/pilka/public/stadion/create",
        success: function(result) { $('table#stadiums tr.create').before(result); },
        error: function() {
            var error = '<tr><td colspan="7" class="error" hidden>Błąd tworzenia wiersza z formularzem dodawania stadionu.</td></tr>';
            $('table#stadiums tr.create').after(error);
            $('td.error').show(1200);
        },
    });
}

function addClick() {     // ustawienie instrukcji po kliknięciu anulowania lub potwierdzenia dodawania stadionu
    $('table#stadiums').delegate('#cancelAdd', 'click', function() {
        $.when( $('#createRow').fadeOut(1000) ).then(function() {
            $('#createRow').remove();
            $('#showCreateRow').fadeIn(1000);
        });
    });

    $('table#stadiums').delegate('#add', 'click', function() {
        $.when( $('#createRow').fadeOut(1000) ).then(function() {
            $('#showCreateRow').fadeIn(1000);
            add();
        });
    });
}

function add() {   // zapisanie klasy w bazie danych
    var city        = $('#createRow input[name="city"]').val();
    var name        = $('#createRow input[name="name"]').val();
    var capacity    = $('#createRow input[name="capacity"]').val();
    var lp = parseInt( $('#countStadiums').val() ) + 1;

    $.ajax({
        method: "POST",
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
        url: "http://localhost/pilka/public/stadion",
        data: { city: city, name: name, capacity: capacity },
        success: function(id) {
            refreshRow(id, lp);
            $('#countStadiums').html(lp);
        },
        error: function() {
            var error = '<tr><td colspan="7" class="error" hidden>Błąd dodawania stadionu.</td></tr>';
            $('table#stadiums tr.create').before(error);
            $('td.error').show(1200);
        },
    });
}

function refreshRow(id, lp, add="true") {  // odświeżenie wiersza ze stadionem o podanym identyfikatorze
    $.ajax({
        method: "POST",
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
        url: "http://localhost/pilka/public/stadion/refreshRow",
        data: { id: id, lp: lp },
        success: function(result) {
            if(add) {
                $('tr.create').before(result);
                $('tr[data-stadium_id="'+id+'"]').fadeIn(1500);
                $('#showCreateRow').show();
            }
            else {
                $.when( $('tr[data-stadium_id="'+id+'"]').fadeOut(575) ).then(function() {
                    $('tr[data-stadium_id="'+id+'"]').replaceWith(result);
                    $('tr[data-stadium_id="'+id+'"]').hide().fadeIn(1500);    
                });
            }
        },
        error: function() {
            var error = '<tr data-stadium_id="'+id+'"><td class="error" colspan="7">Błąd odświeżania wiersza ze stadionem.</td></tr>';
            if(add) $('tr.create').before(error);
            else $('tr[data-stadium_id="'+id+'"]').replaceWith(error);
            $('td.error').hide().fadeIn(1250);
        },
    });
}

function editClick() {     // kliknięcie przycisku modyfikowania stadionu
    $('table#stadiums').delegate('button.edit', 'click', function() {
        var id = $(this).data('stadium_id');
        var lp = $(this).parent().parent().children(":first").html();
        $.ajax({
            type: "GET",
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            url: "http://localhost/pilka/public/stadion/"+id+"/edit",
            data: { id: id, lp: lp },
            success: function(result) {
                $.when( $('tr[data-stadium_id='+id+']').fadeOut(500) ).then(function() {
                    $('tr[data-stadium_id='+id+']').replaceWith(result);
                    $('tr[data-stadium_id='+id+'].editRow').fadeIn(1500);
                    updateClick();
                });
            },
            error: function() {
                var error = '<tr><td colspan="7" class="error" hidden>Błąd tworzenia wiersza z formularzem modyfikowania stadionu.</td></tr>';
                $('tr[data-stadium_id='+id+']').before(error);
                $('td.error').fadeIn(1250);
            },
        });
    });
}

function updateClick() {     // ustawienie instrukcji po kliknięciu anulowania lub potwierdzenia modyfikowania stadionu
    $('.cancelUpdate').click(function() {
        var id = $(this).data('stadium_id');
        $.when( $('.editRow[data-stadium_id='+id+']').fadeOut(500) ).then( function() {
            var lp = $('tr[data-stadium_id='+id+'] input[name="lp"]').val();
            refreshRow(id, lp, false);
        });
    });

    $('.update').click(function(){
        var id = $(this).data('stadium_id');
        $.when( $('.editRow[data-stadium_id='+id+']').fadeOut(750) ).then( function() {
            update(id);
        });
    });
}

function update(id) {   // zapisanie zmian w bazie danych
    var city    = $('tr[data-stadium_id='+id+'] input[name="city"]').val();
    var name    = $('tr[data-stadium_id='+id+'] input[name="name"]').val();
    var capacity= $('tr[data-stadium_id='+id+'] input[name="capacity"]').val();
    var lp      = $('tr[data-stadium_id='+id+'] input[name="lp"]').val();

    $.ajax({
        method: "PUT",
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
        url: "http://localhost/pilka/public/stadion/"+id,
        data: { id: id, city: city, name: name, capacity: capacity },
        success: function() {  refreshRow(id, lp, false); },
        error: function() {
            var error = '<tr data-stadium_id="'+id+'"><td colspan="7" class="error">Błąd modyfikowania stadionu.</td></tr>';
            $('tr[data-stadium_id='+id+']').replaceWith(error);
            $('td.error').hide().fadeIn(1250);
        },
    });
}

function destroyClick() {  // usunięcie stadionu (z bazy danych)
    $('table#stadiums').delegate('button.destroy', 'click', function() {
        var id = $(this).data('stadium_id');
        $.ajax({
            type: "DELETE",
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            url: "http://localhost/pilka/public/stadion/" + id,
            success: function() {
                $.when( $('tr[data-stadium_id='+id+']').fadeOut(750) ).then( function() {
                    $('tr[data-stadium_id='+id+']').remove();
                 });
            },
            error: function() {
                var error = '<tr data-stadium_id="'+id+'"><td colspan="7" class="error">Błąd usuwania stadionu.</td></tr>';
                $('tr[data-stadium_id='+id+']').replaceWith(error);
                $('td.error').hide().fadeIn(1250);
            }
        });
        return false;
    });
}


// ----------------------------------- ZAŁADOWANIE DOKUMENTU ------------------------------------ //
$(document).ready(function() {
    showCreateRowClick();
    addClick();
    editClick();
    destroyClick();
});