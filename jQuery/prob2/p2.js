$.fn.extend({
    invalid: function (eroare) {
        this.css({'border': '1.5px solid red'});
        if (this.length > 0) {
            $('#msg').append(eroare + '<br>').css({'color': 'red'});
            return false;
        }
        return true;
    },
    nueok: function (expresie) {
        return this.not(function () {
            return expresie.test(this.value);
        })
    }
});

function validate() {
    $('input').css({'border': '1px solid black'});
    $('#msg').empty();
    $('#nume').nueok(/[A-Z][a-zA-Z]*/).invalid("Nume invalid");
    $('#dataN').nueok(/.+/).invalid('Data trebuie completata');
    $('#email').nueok(/[a-zA-z0-9.]*@[a-zA-z0-9]*.[a-zA-z0-9.]*/).invalid('Email invalid');
    if ($('#varsta').nueok(/\d+/).invalid('Varsta trebuie completata')) {
        var age = Math.floor((new Date().getTime() - new Date($('#dataN').val()).getTime()) / (1000 * 60 * 60 * 24 * 365));
        $('#varsta').nueok(new RegExp(age.toString())).invalid("Varsta si data de nastere nu corespund");
    }
}