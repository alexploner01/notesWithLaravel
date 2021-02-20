<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta content="width=device-width, initial-scale=1.0" name="viewport">

        <title>Notes</title>
        <meta content="" name="descriptison">
        <meta content="" name="keywords">

        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Montserrat:300,400,500,600,700" rel="stylesheet">

        <!-- Vendor CSS Files -->
        <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
        <link href="{{ asset('vendor/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
        <link href="{{ asset('vendor/ionicons/css/ionicons.min.css') }}" rel="stylesheet">
        <link href="{{ asset('vendor/owl.carousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
        <link href="{{ asset('vendor/aos/aos.css') }}" rel="stylesheet">

        <!-- Template Main CSS File -->
        <link href="{{ asset('css/styleNavBar.css') }}" rel="stylesheet">

    </head>

    <body>


        <!-- ======= Header ======= -->
        <header id="header" class="header-transparent">
            <div class="container d-flex align-items-center">

                <!-- <h1 class="logo mr-auto"><a href="index.html">Rapid</a></h1>
                <!-- Uncomment below if you prefer to use an image logo -->
                <a href="/" class="logo mr-auto"><img src="{{ asset('img/logo-website-1024x216.jpg') }}" alt="" class="img-fluid"></a>

                <nav class="main-nav d-none d-lg-block">
                    <ul>
                        <li class="active"><a href="/">Home</a></li>
                        <li class="drop-down"><a id="selctedInstrumentName" href="#">{{ $selected_instrument }}</a>
                            <ul>

                                @foreach($instruments as $instrument)
                                <li><a href="#">{{ $instrument->name }} ({{ $instrument->partitur }})</a></li>
                                @endforeach

                            </ul>
                        </li>
                    </ul>
                </nav><!-- .main-nav-->

            </div>
        </header><!-- End Header -->


        <!-- start PdfViewer -->
        <div style="height: 100vh;" id="pdfViewer"></div>
        <!-- end PdfViewer -->



    </body>    

    <!-- Vendor JS Files -->
    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('vendor/jquery.easing/jquery.easing.min.js') }}"></script>
    <script src="{{ asset('vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('vendor/counterup/counterup.min.js') }}"></script>
    <script src="{{ asset('vendor/owl.carousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('vendor/aos/aos.js') }}"></script>

    <!-- Template Main JS File -->
    <script src="{{ asset('js/main.js') }}"></script>

    <!-- Pdf-Viewer -->
    <script src="{{ asset('vendor/PDFObject/pdfobject.min.js') }}"></script>

    <!-- load PDF -->
    <script>
        var nameOfPdf = "{{ $name_of_pdf }}";
        var fullPath = "{{ asset('files/') }}";
        var options = {
            fallbackLink: "<p>Desciaria le <a href='" + fullPath + "/" + nameOfPdf + "'>pdf</a></p>"
        };
        PDFObject.embed(fullPath + "/" + nameOfPdf, "#pdfViewer", options);
    </script>

    <script>
        var songName = "{{ $songName }}";
        $(document).on("click", "li ul li a", function () {
        var instrument = $(this).text();
        var regex = /song(.*)/g;
        $("#selctedInstrumentName").text(instrument);

        instrument = $(this).text().split(" ")[0];
        $.get(window.location.href.replace(regex, "") + "get/pdfname/" + songName + "/" + instrument).done(// getting Instruments of song and displaying them in model.
                function (data) {

                PDFObject.embed(fullPath + "/" + data, "#pdfViewer");
                }
        );
        });
    </script>

</html>
