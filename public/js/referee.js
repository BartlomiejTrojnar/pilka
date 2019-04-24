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

// ----------------------------------- ZAŁADOWANIE DOKUMENTU ------------------------------------ //
$(document).ready(function() {
    countryChanged();
});