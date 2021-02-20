var $table = $('#fresh-table')
var $alertBtn = $('#alertBtn')

window.operateEvents = {
    'click .edit': function (e, value, row, index) {
        alert('You click edit icon, row: ' + JSON.stringify(row));
        console.log(value, row, index);
    },

    'click .select': function (e, value, row, index) {
        //alert('You click edit icon, row: ' + (value.replace(/<[^>]*>/g, "")).trim());
        //console.log(value, row, index);
        var songName = (value.replace(/<[^>]*>/g, "")).trim();
        $('#modalSongTitle').text(songName);
        $('#gridOfInstruments').html("");

        $.get(window.location.href.replace("#", "") + "get/instruments/" + songName).done(// getting Instruments of song and displaying them in model.
                function (data) {

                    var instruments = JSON.parse(data);

                    for (i = 0; i < instruments.length; i++) {

                        newInstrument = "<a href=\"" + window.location.href.replace("#", "") + "song/" + songName + "?i=" + instruments[i].name + "\"> <div class=\"col-md-6 col-lg-4 wow aos-init aos-animate\" data-aos=\"zoom-in\" data-aos-delay=\"100\"> <div class=\"box\"> <img class=\"icon\" src=\"img/instruments-icons/" + instruments[i].name + ".png\" width=\"100px\"> <h4 class=\"title\">" + instruments[i].name + "</a></h4><h10>" + instruments[i].partitur + "</h10></div></div> </a>";


                        $('#gridOfInstruments').append(newInstrument);
                    }

                }
        );

        $('#selectInstrumentModal').modal('show');
    }
}

function operateFormatter(value, row, index) {
    return [
        '<a rel="tooltip" title="Edit" class="table-action edit" href="javascript:void(0)" title="Edit">',
        '<i class="fa fa-edit"></i>',
        '</a>'
    ].join('');
}

$(function () {
    $table.bootstrapTable({
        classes: 'table table-hover table-striped',
        toolbar: '.toolbar',
        search: true,
        showRefresh: false,
        showToggle: false,
        showColumns: false,
        pagination: true,
        striped: true,
        sortable: true,
        pageSize: 8,
        pageList: [8, 10, 25, 50, 100],
        formatShowingRows: function (pageFrom, pageTo, totalRows) {
            return ''
        },
        formatRecordsPerPage: function (pageNumber) {
            return pageNumber + ' rows visible'
        }
    })

    $alertBtn.click(function () {
        //alert('You pressed on Alert')

        $('#modalAddSongForm').modal('show');
    })
})