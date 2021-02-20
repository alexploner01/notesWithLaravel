
$.ajaxSetup({

    headers: {

        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

    }

});


/** 
 * sets the name of the button "Stromont", to the instruments selected.
 * */

$('.instrumentsCheckboxes').click(function () {
    var currentText = $("#dropdownAddMenuButton").html();
    var instrument = $(this).val();
    if ($(this).prop("checked") == true) {

        if (currentText === "Stromont") {
            $("#dropdownAddMenuButton").html(instrument);
        } else {
            $("#dropdownAddMenuButton").html(currentText + ", " + instrument);
        }

    } else if ($(this).prop("checked") == false) {
        if (currentText !== "Stromont") {

            var newText = currentText.replace(", " + instrument, "");
            newText = newText.replace(instrument + ", ", "");
            newText = newText.replace(instrument + "", "");
            $("#dropdownAddMenuButton").html(newText);

            if (newText === "") {
                $("#dropdownAddMenuButton").html("Stromont");
            }
        }
    }
});

/**
 * Setting all checkboxes to false and set the dropdownAddMenuButton to "Stromont"
 * */
$('#modalAddSongForm').on('hidden.bs.modal', function () {

    $('.instrumentsCheckboxes').each(function () {
        $(this).prop("checked", false);
    });

    $("#dropdownAddMenuButton").html("Stromont");

});

$("#uploadButton").click(function () {
    var songName = $("#nameOfSongToAdd").val();
    //var fileToUpload = $("#fileToUpload").val();

    var filedata = document.getElementById("fileToUpload").files[0];

    var selectedInstruments = new Array();
    $('.instrumentsCheckboxes:checkbox:checked').each(function () {
        var instrument = (this.checked ? $(this).val() : "");
        selectedInstruments.push(instrument);
    });

    var partitur = $("#partitur").val();

    if (filedata != null && songName != null && partitur != null && !(selectedInstruments === undefined || selectedInstruments.length == 0)) {

        var data = new FormData();
        data.append('file', filedata);
        data.append('songName', songName);
        data.append('instruments', JSON.stringify(selectedInstruments));
        data.append('partitur', partitur);

        jQuery.ajax({
            url: "{{ route('ajaxRequest.post') }}",
            data: data,
            cache: false,
            contentType: false,
            processData: false,
            method: 'POST',
            type: 'POST', // For jQuery < 1.9
            success: function (data) {
                alert(data.status);
                if (data.status == "success") {
                    document.getElementById("nameOfSongToAdd").value = "";
                    document.getElementById("partitur").value = "";
                    var instruments = document.getElementsByClassName("instrumentsCheckboxes");

                    for (i = 0; i < instruments.length; i++) {
                        instruments[i].checked = false;
                    }

                    //document.getElementById("fileToUpload").files[0] = null;
                    var fileToUpload = document.getElementById("fileToUpload");
                    fileToUpload.reset();
                    $('#modalAddSongForm').modal('hide');
                }
            }
        });

        $('#modalAddSongForm').modal('hide');

    } else {
        alert("Al n'é nia gnü de ete düc i dac!");
    }



});
