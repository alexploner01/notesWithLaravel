$(document).ready(function(){
    $('.search-box input[type="text"]').on("keyup input", function(){
        /* Get input value on change */
        var inputVal = $(this).val();
        var resultDropdown = $(this).siblings(".result");
        if(inputVal.length){
            $.get(window.location.href.replace("#", "") + "get/matching/songs/" + inputVal).done( function(data){
                // Display the returned data in browser
                resultDropdown.html(data);
            });
        } else{
            resultDropdown.empty();
        }
    });

    // Set search input value on click of result item
    $(document).on("click", ".result p", function(){
        $(this).parents(".search-box").find('input[type="text"]').val($(this).text());

        /* var songName = $(this).text();

        if(songName.length) {
          var instrument = $('#dropdownMenuButton').html();
          alert(instrument);
          if (instrument === "Instrument") {
            instrument = "Tamperle";
          }
          $.get("getSongPDF.php", {song: songName, instrument: instrument}).done (function(data) {
            alert("files/" + data);
            PDFObject.embed("files/" + data, "#pdfViewer");
          })
        } */

        $(this).parent(".result").empty();
    });



});
