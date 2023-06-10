<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
        integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous">
    </script>
    <title>Hello, world!</title>
    <style>
        .popover {

            top: 0px !important;
            bottom: 0px !important;

        }

        .popover-title {
            display: none !important;
        }

        .popover {
            max-width: 300px !important;
            max-height: 450px !important;
        }
    </style>
</head>

<body>



    <div class="row row-cols-1 row-cols-md-4 g-4">
        <div class="col">
            <div class="card h-100">
                <img src="https://mdbcdn.b-cdn.net/img/new/standard/city/041.webp" class="card-img-top"
                    alt="Hollywood Sign on The Hill" data-toggle="popover" />
                <div class="card-body">
                    <h5 class="card-title">Japanese N5 Course</h5>
                    <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>
                    <p class="card-text">
                        ₹ 2499
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card h-100">
                <img src="https://mdbcdn.b-cdn.net/img/new/standard/city/042.webp" class="card-img-top"
                    data-toggle="popover" alt="Palm Springs Road" />
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">This is a short card.</p>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card h-100">
                <img src="https://mdbcdn.b-cdn.net/img/new/standard/city/043.webp" class="card-img-top"
                    data-toggle="popover" alt="Los Angeles Skyscrapers" />
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">This is a longer card with supporting text
                        below as a natural</p>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card h-100">
                <img src="https://mdbcdn.b-cdn.net/img/new/standard/city/044.webp" class="card-img-top"
                    data-toggle="popover" alt="Skyscrapers" />
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">
                        This is a longer card with supporting text below as a
                        natural
                    </p>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(function() {
            $('[data-toggle="popover"]').popover({
                trigger: 'hover',
                html: true,
                content: ' <div class="card h-100"> <img src="https://mdbcdn.b-cdn.net/img/new/standard/city/041.webp" class="card-img-top" alt="Hollywood Sign on The Hill" data-toggle="popover" /> <div class="card-body"> <h5 class="card-title">Japanese N5 Course</h5> <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6> <p class="card-text"> ₹ 2499 </div> </div>'
            });
        });
    </script>
</body>

</html>
