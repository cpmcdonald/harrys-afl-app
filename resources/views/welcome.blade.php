<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>

        <style>
            .content {
                max-width: 500px;
                margin: auto;
            }

            .banner {
                max-width: 100%;
                height: 100px;
                background-color: #c40217;
                text-align: center;
                color: #fff;
            }
            .banner-logo {

                text-align: center;

                width: 80%;

                height: 65px;
                background-position: 50%;
                background-position-x: 50%;
                background-position-y: center;

            }

            .timer {

                text-align: center;
                font-family: 'Bitter', serif;



            }

            .footer-bar {
                background: #1d4073;
                position: fixed;
                left: 0;
                right: 0;
                bottom: 0;
                height: 70px;
                z-index: 1030;
                border-top: 1px solid #dadada;
            }

            .img-size {
                margin-top: 40px;
                height: 400px;
            }

            .scores {
                font-size: 6vw;
                font-weight: bold;
                font-family: Titillium Upright,Trebuchet MS,Lucida Sans Unicode,Lucida Grande,Lucida Sans,Arial,sans-serif;
            }


        </style>
    </head>

    <body >




    <div class="banner">
        <div class="banner-logo"><img src="http://www.afl.com.au/static-resources/responsive/components/common/logos/sponsor-logos/images/sponsor-maccas-matchcentre.svg?v=c29053621f"></div>
        <button type="button" class="close" aria-label="Close" onclick="incrementValueReset()"><span aria-hidden="true">&times;</span></button>
    </div>
    <div class="container-fluid">


       <div class="row">
            <div class="col-lg-3">
                <img class="img-size" style="margin: auto" src="https://upload.wikimedia.org/wikipedia/en/thumb/4/49/Adelaide_Crows_logo_2010.svg/1280px-Adelaide_Crows_logo_2010.svg.png" />
            </div>
           <div class="col-lg-1" style="margin-top: 75px; margin-left: 50px">
               <h2 class="scores" id="teamOneScore">0</h2>
           </div>
           <div class="col-lg-2 timer" style="margin-top: 120px;">
               <h1><time>00:00</time></h1>
               <h4 id="winner">No score</h4>
           </div>
           <div class="col-lg-1" style="margin-top: 75px; margin-left: 50px">
               <h2 class="scores" id="teamTwoScore">0</h2>
           </div>
            <div class="col-lg-3">
                <img class="img-size center-block" src="https://upload.wikimedia.org/wikipedia/en/thumb/6/62/Hawthorn-football-club-brand.svg/1115px-Hawthorn-football-club-brand.svg.png" >
            </div>
       </div>

        <div class="row">
            <div class="col-lg-4">
                <div class="center-block">
                    <button type="button" class="btn btn-lg btn-success" onclick="incrementValue(1, 1)">Goal</button>
                    <button type="button" class="btn btn-lg btn-success" onclick="incrementValue(1, 0)">Point</button>
                </div>
            </div>
            <div class="col-lg-4"></div>
            <div class="col-lg-4">
                <div class="center-block">
                    <button type="button" class="btn btn-lg btn-success" onclick="incrementValue(2, 1)">Goal</button>
                    <button type="button" class="btn btn-lg btn-success" onclick="incrementValue(2, 0)">Point</button>
                </div>
            </div>
        </div>





        <div class="footer-bar">
            <div class="row">
                <div class="col-md-5">  </div>
                <div class="col-md-2">
                    <button type="button" style="margin: auto; margin-top: 10px" class="btn btn-lg btn-default">New Game</button>
                </div>
                <div class="col-md-5">  </div>

            </div>
        </div>

        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Start a New Game</h4>
                    </div>
                    <div class="modal-body">
                        vs
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                        <button type="button" class="btn btn-primary">Throw Down!</button>
                    </div>
                </div>
            </div>
        </div>

        {{--@section('scripts')--}}
        {{--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>--}}
        {{--<script src="js/bootstrap.min.js"></script>--}}
            <script>
                function incrementValue(team, type) {
                    var score = (type > 0) ? 6 : 1;
                    var teamName = (team == 1) ? "teamOneScore" : "teamTwoScore";
                    var value = parseInt(document.getElementById(teamName).textContent, 10);
                    value = isNaN(value) ? 0 : value;
                    value = value + score;
                    document.getElementById(teamName).textContent = value;
                    winner();
                }

                function winner() {

                    var teamOneScore = parseInt(document.getElementById('teamOneScore').textContent, 10);
                    var teamTwoScore = parseInt(document.getElementById('teamTwoScore').textContent, 10);
                    var win = document.getElementById('winner');

                    if (teamOneScore > teamTwoScore) {

                        var result = teamOneScore - teamTwoScore;
                        win.textContent = "Crows by " + result;
                    } else {
                        var result = teamTwoScore - teamOneScore;
                        win.textContent = "Hawks by " + result;
                    }
                }


                function reset() {
                    document.getElementById('teamOneScore').textContent = 0;
                    document.getElementById('teamTwoScore').textContent = 0;
                }

                var h1 = document.getElementsByTagName('h1')[0],
                    seconds = 0, minutes = 0, quarters = 1, length = 2, displayMins = 0,
                    t;

                function add() {
                    seconds++;
                    if (seconds >= 60) {
                        seconds = 0;
                        minutes++;
                    }


                    if (minutes > length) {
                        quarters = 2;
                        displayMins = minutes - length
                    }

                    if (minutes > length * 2) {
                        quarters = 3;
                        displayMins = minutes - (length * 2)
                    }

                    if (minutes > length * 3) {
                        quarters = 4;
                        displayMins = minutes - (length * 3)
                    }

                    if (minutes > length * 4) {
                        h1.textContent = "Full Time"
                    } else {
                        h1.textContent = "Q" + quarters + " " + (displayMins ? (displayMins > 9 ? displayMins : "0" + displayMins) : "00") + ":" + (seconds > 9 ? seconds : "0" + seconds);

                    }

                    timer();
                }
                function timer() {
                    t = setTimeout(add, 1000);
                }
                timer();

            </script>
        {{--@stop--}}
    </div>




    </body>
</html>
