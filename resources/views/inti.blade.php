<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Agenda Digital</title>
    <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
    <link rel="icon" href="{{asset('assets/img/icon.ico')}}" type="image/x-icon" />

    <!-- Fonts and icons -->
    <script src="{{asset('assets/js/plugin/webfont/webfont.min.js')}}"></script>
    <script>
        WebFont.load({
            google: {
                "families": ["Lato:300,400,700,900"]
            },
            custom: {
                "families": ["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands", "simple-line-icons"],
                urls: [<?php asset('assets/css/fonts.min.css') ?>]
            },
            active: function() {
                sessionStorage.fonts = true;
            }
        });
    </script>

    <!-- CSS Files -->
    <style>
        .card {
            margin-top: 1em;
        }

        /* IMG displaying */
        .person-card {
            margin-top: 5em;
            padding-top: 5em;
        }

        .person-card .card-title {
            text-align: center;
        }

        .person-card .person-img {
            width: 10em;
            position: absolute;
            top: -5em;
            left: 50%;
            margin-left: -5em;
            border-radius: 100%;
            overflow: hidden;
            background-color: white;

        }

        #banner {
            background-image: linear-gradient(120deg, #91C4FF 0%, #F0F7FF 87%);
            position: relative;
            width: 100%;
            height: 950px;
        }

        #cloud-scroll {
            background: url(http://9a2e1a2047765d2a004e-e6d2db425d8d4f2619e5cee56a48bcef.r55.cf2.rackcdn.com/clouds.png) repeat-x;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-size: cover;
            position: absolute;
            -webkit-animation: 900000s backgroundScroll infinite linear;
            -moz-animation: 900000s backgroundScroll infinite linear;
            -o-animation: 900000s backgroundScroll infinite linear;
            -ms-animation: 900000s backgroundScroll infinite linear;
            animation: 900000s backgroundScroll infinite linear;
        }

        @-webkit-keyframes backgroundScroll {
            from {
                background-position: 0 0;
            }

            to {
                background-position: -99999999px 0;
            }
        }

        @keyframes backgroundScroll {
            from {
                background-position: 0 0;
            }

            to {
                background-position: -99999999px 0;
            }
        }
    </style>
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/atlantis.min.css')}}">
</head>

<body>
    <div id="banner">
        <div id="cloud-scroll">
            <div class="container" style="margin-top: 1em;">


                <!-- Sign up card -->
                <div class="card person-card">
                    <div class="card-body">
                        <!-- Sex image -->
                        <img class="person-img" src="{{asset('assets/img/agenda.jpg')}}">
                        <div class="row">
                            <div class="col-md-3">
                                <h2 class="tanggal"></h2>
                            </div>
                            <div class="col-md-6 text-center">
                                <h2>AGENDA DIGITAL</h2>
                            </div>
                            <div class="col-md-3">
                                <h2 id="jam" class="text-right"></h2>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="row">
                    <div class="col-md-6" style="padding:0.5em;">
                        <div class="card">
                            <div class="card-header">
                                News
                            </div>
                            <div class="card-body">
                                <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
                                    <ol class="carousel-indicators">
                                        @foreach($news as $data)
                                        <li data-target="#carouselExampleCaptions" data-slide-to="{{$loop->iteration}}"></li>
                                        @endforeach
                                    </ol>
                                    <div class="carousel-inner">
                                        <?php $i = 0; ?>
                                        @foreach($news as $new)
                                        <div class="carousel-item {{$active = $i==0 ? 'active': ''  }}">
                                            <img src="{{asset('storage/'.$new->picture)}}" class="d-block w-100" alt="..." width="400px" height="400px">
                                            <div class="carousel-caption d-none d-md-block">
                                                <a href="/show/{{$new->id}}" style="color:white;">{{$new->news}}</a>
                                            </div>
                                        </div>
                                        <?php $i++; ?>
                                        @endforeach
                                    </div>
                                    <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                    <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Next</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6" style="padding:0.5em;">
                        <div class="card">
                            <div class="card-header">
                                Agenda Hari Ini
                            </div>
                            <div class="card-body">
                                @if (count($agendas) == 0)
                                <div class="alert alert-info mt-3">
                                    Tidak ada agenda
                                </div>
                                @else
                                <table class="table table-hover">
                                    <tbody>
                                        @foreach($agendas as $agenda)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{$agenda->agenda}}</td>
                                            <td>{{$agenda->time}}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                @endif

                                <form method="post" action="/detail">
                                    <button type="button" class="btn btn-primary mt-3 float-lg-right" data-toggle="modal" data-target="#exampleModal">
                                        Agenda Lain
                                    </button>
                                </form>


                            </div>
                        </div>
                    </div>
                </div>
                <nav class="navbar navbar-dark bg-primary">
                    <div class="container">
                        <span class="navbar-text">
                            <marquee behavior="" direction="">
                                <h1>SELAMAT DATANG DI AGENDA DIGITAL, AGENDA YANG PASTI SANGAT MEMBANTU ANDA MANGATUR WAKTU DAN JADWAL</h1>
                            </marquee>

                        </span>
                    </div>
                </nav>

            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Cari</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" action="/detail">
                        @csrf
                        <div class="form-group">
                            <label for="date">Date</label>
                            <input type="date" class="form-control" id="tanggal" name="tanggal" required>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary" name="submit">Save</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
    <script type='text/javascript'>
        var months = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
        var myDays = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jum&#39;at', 'Sabtu'];
        var date = new Date();
        var day = date.getDate();
        var month = date.getMonth();
        var thisDay = date.getDay(),
            thisDay = myDays[thisDay];
        var yy = date.getYear();
        var year = (yy < 1000) ? yy + 1900 : yy;
        const tanggal = thisDay + ', ' + day + ' ' + months[month] + ' ' + year;
        const kata = document.querySelector('.tanggal');
        kata.innerHTML = tanggal;

        window.setTimeout("waktu()", 1000);

        function waktu() {
            var tanggal = new Date();
            setTimeout("waktu()", 1000);
            document.getElementById("jam").innerHTML = tanggal.getHours() + ":" + tanggal.getMinutes() + ":" + tanggal.getSeconds();
        }
    </script>
    <!--   Core JS Files   -->
    <script src="{{asset('assets/js/core/jquery.3.2.1.min.js')}}"></script>
    <script src="{{asset('assets/js/core/popper.min.js')}}"></script>
    <script src="{{asset('assets/js/core/bootstrap.min.js')}}"></script>

    <!-- jQuery UI -->
    <script src="{{asset('assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js')}}"></script>
    <script src="{{asset('assets/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js')}}"></script>

    <!-- jQuery Scrollbar -->
    <script src="{{asset('assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js')}}"></script>


    <!-- Bootstrap Notify -->
    <script src="{{asset('assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js')}}"></script>

    <!-- jQuery Vector Maps -->
    <script src="{{asset('assets/js/plugin/jqvmap/jquery.vmap.min.js')}}"></script>
    <script src="{{asset('assets/js/plugin/jqvmap/maps/jquery.vmap.world.js')}}"></script>

    <!-- Sweet Alert -->
    <script src="{{asset('assets/js/plugin/sweetalert/sweetalert.min.js')}}"></script>

    <!-- Atlantis JS -->
    <script src="{{asset('assets/js/atlantis.min.js')}}"></script>

</body>

</html>
