<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8" />

        <title>Notes</title>

        <meta name="csrf-token" content="{{ Session::token() }}"> 

        <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport" />

        <!-- Canonical SEO -->
        <link rel="canonical" href="https://www.creative-tim.com/product/fresh-bootstrap-table"/>

        <!--  Social tags    -->
        <meta name="keywords" content="creative tim, html table, html css table, web table, freebie, free bootstrap table, bootstrap, css3 table, bootstrap table, fresh bootstrap table, frontend, modern table, responsive bootstrap table, responsive bootstrap table">

        <meta name="description" content="Probably the most beautiful and complex bootstrap table you've ever seen on the internet, this bootstrap table is one of the essential plugins you will need.">

        <!-- Schema.org markup for Google+ -->
        <meta itemprop="name" content="Fresh Bootstrap Table by Creative Tim">
        <meta itemprop="description" content="Probably the most beautiful and complex bootstrap table you've ever seen on the internet, this bootstrap table is one of the essential plugins you will need.">

        <meta itemprop="image" content="http://s3.amazonaws.com/creativetim_bucket/products/31/original/opt_fbt_thumbnail.jpg">
        <!-- Twitter Card data -->

        <meta name="twitter:card" content="product">
        <meta name="twitter:site" content="@creativetim">
        <meta name="twitter:title" content="Fresh Bootstrap Table by Creative Tim">

        <meta name="twitter:description" content="Probably the most beautiful and complex bootstrap table you've ever seen on the internet, this bootstrap table is one of the essential plugins you will need.">
        <meta name="twitter:creator" content="@creativetim">
        <meta name="twitter:image" content="http://s3.amazonaws.com/creativetim_bucket/products/31/original/opt_fbt_thumbnail.jpg">
        <meta name="twitter:data1" content="Fresh Bootstrap Table by Creative Tim">
        <meta name="twitter:label1" content="Product Type">
        <meta name="twitter:data2" content="Free">
        <meta name="twitter:label2" content="Price">

        <!-- Open Graph data -->
        <meta property="og:title" content="Fresh Bootstrap Table by Creative Tim" />
        <meta property="og:type" content="article" />
        <meta property="og:url" content="https://wenzhixin.github.io/fresh-bootstrap-table/compact-table.html" />
        <meta property="og:image" content="http://s3.amazonaws.com/creativetim_bucket/products/31/original/opt_fbt_thumbnail.jpg"/>
        <meta property="og:description" content="Probably the most beautiful and complex bootstrap table you've ever seen on the internet, this bootstrap table is one of the essential plugins you will need." />
        <meta property="og:site_name" content="Creative Tim" />


        <!-- Vendor CSS Files -->
        <link href="{{ asset('vendor/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
        <link href="{{ asset('vendor/ionicons/css/ionicons.min.css') }}" rel="stylesheet">
        <link href="{{ asset('vendor/owl.carousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
        <link href="{{ asset('vendor/aos/aos.css') }}" rel="stylesheet">

        <!-- Template Main CSS File -->
        <link href="{{ asset('css/styleNavBar.css') }}" rel="stylesheet">


        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.4.1/css/bootstrap.min.css">
        <link href="css/fresh-bootstrap-table.css" rel="stylesheet" />
        <link href="css/demo.css" rel="stylesheet" />
        <link href="css/modal.css" rel="stylesheet" />

        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
        <link href="http://fonts.googleapis.com/css?family=Roboto:400,700,300" rel="stylesheet" type="text/css">

        <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <script src="https://unpkg.com/bootstrap-table/dist/bootstrap-table.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>


        <!-- Scripts for table   -->
        <script src="js/demo/gsdk-switch.js"></script>
        <script src="js/demo/jquery.sharrre.js"></script>
        <script src="js/demo/demo.js"></script>

        <!-- Live search -->
        <script type="text/javascript" src="{{ asset('js/searchResults.js') }}"></script>
        <link href="{{ asset('css/liveSearch.css') }}" rel="stylesheet">

    </head>
    <body style="background-image: none">

        <!-- ======= Header ======= -->
        <header id="header" class="header-transparent">
            <div class="container d-flex align-items-center">

                <a href="index.html" class="logo mr-auto"><img src="{{ asset('img/logo-website-1024x216.jpg') }}" alt="" class="img-fluid"></a>

            </div>
        </header>


        <!-- Table that displays all songs -->
        <div class="wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-md-offset-0">
                        <div class="description">
                            <h2>Chir en toch</h2>
                        </div>

                        <div class="fresh-table toolbar-color-azure">
                            <div class="bs-bars pull-left">
                                <div class="toolbar">
                                    <button id="alertBtn" class="btn btn-default">+</button>
                                </div>
                            </div>
                            <table id="fresh-table" class="table">
                                <thead>
                                <th data-field="id" data-sortable="true">ID</th>
                                <th data-field="name" data-sortable="true" data-events="operateEvents" >Name</th>
                                <th data-field="actions" data-formatter="operateFormatter" data-events="operateEvents">Actions</th>
                                </thead>
                                <tbody>
                                    @foreach ($songs as $song)
                                    <tr>
                                        <td>{{ $song->l_id }}</td>
                                        <td>
                                            <a rel="tooltip" class="table-action select" href="#" title="{{ $song->name }}">
                                                <i>{{ $song->name }}</i>
                                            </a>
                                        </td>
                                        <td></td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>        
        <!-- end Table that displays all songs -->


        <!-- settings user can set for table -->
        <!-- 
        <div class="fixed-plugin" style="top: 300px">
            <div class="dropdown">
                <a href="#" data-toggle="dropdown">
                    <i class="fa fa-cog fa-2x"> </i>
                </a>
                <ul class="dropdown-menu">
                    <li class="header-title">Adjustments</li>
                    <li class="adjustments-line">
                        <a href="javascript:void(0)" class="switch-trigger">
                            <p>Full Background</p>
                            <div class="switch"
                                 data-on-label="ON"
                                 data-off-label="OFF">
                                <input type="checkbox" checked data-target="section-header" data-type="parallax"/>
                            </div>
                            <div class="clearfix"></div>
                        </a>
                    </li>
                    <li class="adjustments-line">
                        <a href="javascript:void(0)" class="switch-trigger">
                            <p>Colors</p>
                            <div class="pull-right">
                                <span class="badge filter badge-blue" data-color="blue"></span>
                                <span class="badge filter badge-azure" data-color="azure"></span>
                                <span class="badge filter badge-green" data-color="green"></span>
                                <span class="badge filter badge-orange active" data-color="orange"></span>
                                <span class="badge filter badge-red" data-color="red"></span>
                            </div>
                            <div class="clearfix"></div>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <!-- end settings user can set for table -->



        <!-- modal form for adding a new Song -->
        <div class="modal fade" id="modalAddSongForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header text-center">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <h4 class="modal-title w-100 font-weight-bold">Met ete na nota nea!</h4>
                    </div>

                    <div class="modal-body mx-3">
                        <div class="md-form mb-5">
                            <i class="fas fa-archive prefix grey-text"></i>
                            <label data-error="wrong" data-success="right">Ennom dal toch</label>
                            <div class="search-box mr-sm-2">
                                <input type="text" id="nameOfSongToAdd" class="form-control validate" placeholder="ennom...">
                                <div class="result"></div>
                            </div>
                        </div>

                        <br>
                        <div class="md-form mb-5">
                            <i class="fas fa-bookmark prefix grey-text"></i>
                            <label data-error="wrong" data-success="right">Partitur</label>
                            <input type="text" id="partitur" class="form-control validate" placeholder="percussion 1...">
                        </div>

                        <br>
                        <div class="md-form mb-5">
                            <div class="dropdown">
                                <i class="fas fa-beer prefix grey-text"></i>
                                <label data-error="wrong" data-success="right" for="defaultForm-email">Stromont</label><br>
                                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownAddMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Stromont</button>
                                <u1 class="dropdown-menu" id="addSongDropdown" aria-labelledby="dropdownMenuButton">
                                    @foreach ($instruments as $instrument)
                                    <li><a class="dropdown-item" ><input type="checkbox" class="instrumentsCheckboxes" value="{{ $instrument->name }}"/> {{ $instrument->name }}</a></li>
                                    @endforeach
                                </u1>
                            </div>
                        </div>

                        <br>
                        <!-- <form id="data" action="uploadFile.php" method="post" enctype="multipart/form-data"> -->
                        <div class="md-form mb-5">

                            <i class="fas fa-file prefix grey-text"></i>
                            <label data-error="wrong" data-success="right" for="defaultForm-email">Chir fora la nota</label><br>
                            <input type="file" class="btn btn-lg btn-secondary" style="width: 100%" name="fileToUpload" id="fileToUpload">

                            <br>
                            <!-- <button class="btn btn-primary" style="width: 100%;">Hochladen</button> -->
                            <div class="modal-footer d-flex justify-content-center ml-auto">
                                <button class="btn btn-default btn-primary" id="uploadButton">ciarié sö</button>
                            </div>
                        </div>
                        <!-- </form> -->

                    </div>
                </div>
            </div>
        </div>
        <!-- end modal form for adding a new Song -->


        <!-- start select instrument modal -->
        <section id="instrumentsModalSection">
            <div class="modal mx-auto" id="selectInstrumentModal" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <h5 class="modal-title" id="modalSongTitle">Modal title</h5>
                        </div>
                        <div class="modal-body">
                            <div class="row" id="gridOfInstruments">

                                <!-- <div class="col-md-6 col-lg-4 wow bounceInUp aos-init aos-animate" data-aos="zoom-in" data-aos-delay="100">
                                    <div class="box">
                                        <img class="icon" src="img/instruments-icons/concert-drum.png" alt="Card image" width="100px">              
                                        <h4 class="title"><a href="">Lorem Ipsum</a></h4>
                                    </div>
                                </div> -->

                            </div>
                        </div>                     

                        <div class="modal-footer">
                            <!-- <button type="button" class="btn btn-primary">Für mich öffnen</button> -->
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="customCheck1">
                                <label class="custom-control-label" for="customCheck1">Für alle freigeben</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- end select instrument modal -->


    </body>

    <!-- Vendor JS Files -->
    <script src="{{ asset('vendor/jquery.easing/jquery.easing.min.js') }}"></script>
    <script src="{{ asset('vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('vendor/counterup/counterup.min.js') }}"></script>
    <script src="{{ asset('vendor/owl.carousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('vendor/aos/aos.js') }}"></script>

    <!-- Template Main JS File -->
    <script src="{{ asset('js/main.js') }}"></script>

    <script type="text/javascript">
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

                                newInstrument = "<a href=\"" + window.location.href.replace("#", "") + "song/" + songName + "?i=" + instruments[i].name + "\"> <div class=\"col-md-6 col-lg-4 wow aos-init aos-animate\" data-aos=\"zoom-in\" data-aos-delay=\"100\"> <div class=\"box\"> <img class=\"icon\" src=\"img/instruments-icons/" + instruments[i].name + ".png\" width=\"100px\"> <h4 class=\"title\">" + instruments[i].name + "</a></h4></div></div> </a>";


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
                //showRefresh: true,
                showToggle: true,
                showColumns: true,
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
    </script>

    <script>

        $.ajaxSetup({

            headers: {

                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

            }

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
                            
                            for (i=0; i < instruments.length; i++) {
                                instruments[i].checked = false;
                            }
                         
                            document.getElementById("fileToUpload").files[0] = null;
                                                     
                            $('#modalAddSongForm').modal('hide');
                        }
                    }
                });

                $('#modalAddSongForm').modal('hide');

            } else {
                alert("Al n'é nia gnü de ete düc i dac!");
            }



        });

    </script>

</html>
