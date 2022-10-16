// ----------------------------- wybór państwa w polu select ----------------------------- //
function showCreateRowClick() {
    $('#showCreateRow').click(function(){
        $(this).hide();
        $('table#clubs').animate({width: '1000px'}, 500);
        showCreateRow();
        return false;
    });
}

function showCreateRow() {
    $.ajax({
        method: "GET",
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
        url: "http://localhost/pilka/public/klub/create",
        data: { version: "forIndex" },
        success: function(result) { $('table#clubs').append(result); },
        error: function() {
            var error = '<tr><td colspan="6"><p class="error">Błąd tworzenia wiersza z formularzem dodawania klubu.</p></td></tr>';
            $('table#clubs tr.create').after(error);
        },
    });
}

function addClick() {     // ustawienie instrukcji po kliknięciu anulowania lub potwierdzenia dodawania klubu
    $('table#clubs').delegate('#cancelAdd', 'click', function() {
        $('#createRow').remove();
        $('#showCreateRow').show();
        return false;
    });

    $('table#clubs').delegate('#add', 'click', function() {
        add();
        $('#createRow').remove();
        $('#showCreateRow').show();
        return false;
    });
}

function add() {   // zapisanie klubu w bazie danych
    var name = $('#createRow input[name="name"]').val();
    var city = $('#createRow input[name="city"]').val();
    var year_of_establishment = $('#createRow input[name="year_of_establishment"]').val();
    var country_id = $('#createRow select[name="country_id"]').val();

    $.ajax({
        method: "POST",
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
        url: "http://localhost/pilka/public/klub",
        data: { name: name, city: city, year_of_establishment: year_of_establishment, country_id: country_id },
        success: function(result) {
            $('table#clubs tr.create').before('<tr data-club_id="'+result+'"><td colspan="7">nowy klub: '+result+'</td></tr>');
            refreshRow(result);
        },
        error: function() {
            var error = '<tr><td colspan="6"><p class="error">Błąd dodawania klubu.</p></td></tr>';
            $('table#clubs tr.create').after(error);
        },
    });
}

function editClick() {     // kliknięcie przycisku modyfikowania klubu
    $('table#clubs button.edit').click(function() {
        var id = $(this).data('club_id');
        $.ajax({
            type: "GET",
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            url: "http://localhost/pilka/public/klub/"+id+"/edit",
            data: { id: id, version: "forIndex" },
            success: function(result) {
                $('tr[data-club_id='+id+']').before(result).hide();
                //updateClick();
            },
            error: function() {
                var error = '<tr><td colspan="6"><p class="error">Błąd tworzenia wiersza z formularzem dla modyfikowania klubu.</p></td></tr>';
                $('tr[data-club_id='+id+']').before(error);
            },
        });
    });
}


function refreshRow(id) {  // odświeżenie wiersza tabeli klubem
    $.ajax({
        method: "POST",
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
        url: "http://localhost/pilka/public/club/refreshRow",
        data: { id: id, version:"forIndex" },
        success: function(result) {
            $("tr[data-club_id='"+id+"']").replaceWith(result);
            editClick();
            destroyClick();
        },
        error: function() {
            var error = '<td colspan="6"><p class="error">Błąd odświeżania wiersza z klubem.</p></td>';
            $("tr[data-club_id='"+id+"']").html(error);
        },
    });
}



// ----------------------------------- ZAŁADOWANIE DOKUMENTU ------------------------------------ //
$(document).ready(function() {
    showCreateRowClick();
    addClick();
    editClick();
});