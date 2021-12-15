<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Juara TV - Gantangan Sultan</title>
    <!-- Main CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/vendor/bootstrap.min.css')}}">
    <!-- CUSTOM Style CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/custom.css')}}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Calistoga&display=swap" rel="stylesheet">
    <style>
        *{
            font-family: 'Calistoga';
        }
    </style>
</head>
<body class="m-0">
    <div class="spinner-bg"></div>
    <div class="spinner">
        <div class="double-bounce1"></div>
        <div class="double-bounce2"></div>
    </div>
    <div class="gradient"></div>
    <div class="hero"></div>
    <div class="content p-4" style="z-index: 999; position:relative">
        <div class="header mb-5 d-flex justify-content-between" >
            <div class="item0"></div>
            <div class="item1" style="margin-left: 15%">
                <img src="{{ asset('assets/images/logo/KONCER.svg') }}" alt="koncer" srcset="">
            </div>
            <div class="item2">
                <img src="{{ asset('assets/images/logo/gantangan.png') }}" alt="" srcset="">
            </div>
        </div>
        <div class="winner-wrap">

        </div>
        {{-- @for ($i = 0; $i < 3; $i++)
        <div class="row" style="margin-bottom: 30px">
            <div class="col-md-6 d-flex align-items-center justify-content-center">
                <div class="winner-title">
                    Juara 1
                </div>
                <div class="winner">
                    <img src="{{asset('assets/images/gallery/juara.png')}}" alt="" srcset="">
                    <div class="number">12</div>
                </div>
            </div>
            <div class="col-md-6 d-flex align-items-center justify-content-center">
                <div class="winner-title">
                    Juara 4
                </div>
                <div class="winner">
                    <img src="{{asset('assets/images/gallery/juara.png')}}" alt="" srcset="">
                    <div class="number">42</div>
                </div>
            </div>
        </div>
        @endfor --}}
    </div>
    <script src="{{ asset('assets/js/vendor/jquery-3.3.1.min.js')}}"></script>
    <script>
    var segment_str = window.location.pathname;
    var segment_array = segment_str.split( '/' );
    var last_segment = segment_array.pop();

    const id_criteria_content = atob(last_segment);

    dataWinner = () => {
        let data;

        let base_url = window.location.origin;
        let enpoint = base_url+'/api/v1/contest/get-web-detail-participants-jury-winner';

        $.ajax({
            type: "POST",
            url: enpoint,
            data : {
                'id_criteria_contents' : id_criteria_content,
            },
            async: false,
            dataType : 'json',
            success: function (response) {
                data = response.data;
            }
        });
        return data;
    }

    loadingFalse = () =>{
        $('html, body').removeAttr('style');
        $(".spinner").css("display","none");
        $(".spinner-bg").css("display","none");
    }

    loadingTrue = () =>{
        $('html, body').css({ 'overflow': 'hidden', 'height': '100%', 'cursor' : 'wait' })
        $(".spinner").css("display","block");
        $(".spinner-bg").css("display","block");
    }
    </script>
    <script>
        var winnerList = dataWinner();
        var row = 1;
        var domWinner ='';

        for (let index = 0; index < 3; index++) {

            let domRow = `
            <div class="row" style="margin-bottom: 30px">
                <div class="col-md-6 d-flex align-items-center justify-content-center">
                    <div class="winner-title">
                        Juara ${index+1}
                    </div>
                    <div class="winner">
                        <img src="{{asset('assets/images/gallery/juara.png')}}" alt="" srcset="">
                        <div class="${winnerList[index]?.contestant_number.lenght < 1 ? 'number' : 'number2'}">${winnerList[index]?.contestant_number ? winnerList[index].contestant_number : '-'}</div>
                    </div>
                </div>
                <div class="col-md-6 d-flex align-items-center justify-content-center">
                    <div class="winner-title">
                        Juara ${index+4}
                    </div>
                    <div class="winner">
                        <img src="{{asset('assets/images/gallery/juara.png')}}" alt="" srcset="">
                        <div class="${winnerList[index+3]?.contestant_number.lenght < 1 ? 'number' : 'number2'}">${winnerList[index+3]?.contestant_number ? winnerList[index+3].contestant_number : '-'}</div>
                    </div>
                </div>
            </div>
            `;

            domWinner += domRow;
        }

        $(document).ready(function () {
            $('.winner-wrap').html(domWinner);
            loadingFalse();
        });
    </script>
</body>
</html>
