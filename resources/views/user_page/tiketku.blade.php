<!DOCTYPE html>
<html lang="en">

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Laravel 7 PDF Example</title>
        <link rel="stylesheet" href="{{ asset('css/tiketku.css') }}">
    </head>
    @php
        $orderku = \App\Models\Order::with(['konser' => function($query){
            $query->withTrashed();
        }, 'konser.tiket', 'konser.user', 'transactionHistory'])
            ->where('user_id', Auth::user()->id)
            ->where('payment_status', '!=', 1)
            ->get();
    @endphp

    <body>
        @foreach ($orderku as $i => $orders)
            <div id="ticket{{ $i }}"
                style="width:100vw;height: 100vh;padding-top:50px;background-color: rgb(217, 217, 217);
            font-family: 'Yanone Kaffeesatz',
                sans-serif; font-weight: 600;">
                <div class="ticket"
                    style="width: 400px;
            height: 775px;
            background-color: white;
            margin: 25px auto;
            position: relative;">
                    <style>
                        img {
                            max-width: 100%;
                            height: auto;
                        }

                        .ticket {
                            width: 400px;
                            height: 775px;
                            background-color: white;
                            margin: 25px auto;
                            position: relative;
                        }

                        .holes-top {
                            height: 50px;
                            width: 50px;
                            background-color: rgb(217, 217, 217);
                            border-radius: 50%;
                            position: absolute;
                            left: 50%;
                            margin-left: -25px;
                            top: -25px;
                        }

                        .holes-top:before,
                        .holes-top:after {
                            content: "";
                            height: 50px;
                            width: 50px;
                            background-color: rgb(217, 217, 217);
                            position: absolute;
                            border-radius: 50%;
                        }

                        .holes-top:before {
                            left: -200px;
                        }

                        .holes-top:after {
                            left: 200px;
                        }

                        .holes-lower {
                            position: relative;
                            margin: 25px;
                            border: 1px dashed #aaa;
                            background-color: white;
                        }

                        .holes-lower:before,
                        .holes-lower:after {
                            content: "";
                            height: 50px;
                            width: 50px;
                            background-color: rgb(217, 217, 217);
                            position: absolute;
                            border-radius: 50%;
                        }

                        .holes-lower:before {
                            top: -25px;
                            left: -50px;
                        }

                        .holes-lower:after {
                            top: -25px;
                            left: 350px;
                        }

                        .title {
                            padding: 50px 25px 10px;
                        }

                        .cinema {
                            color: #aaa;
                            font-size: 12px;
                            margin: 0;
                        }

                        .movie-title {
                            font-size: 30px;
                            margin: 0;
                        }

                        .info {
                            padding: 15px 25px;
                        }

                        table {
                            width: 100%;
                            font-size: 18px;
                            margin-bottom: 15px;
                        }

                        table th {
                            text-align: left;
                        }

                        table th:nth-of-type(1) {
                            width: 38%;
                        }

                        table th:nth-of-type(2) {
                            width: 40%;
                        }

                        table th:nth-of-type(3) {
                            width: 15%;
                        }

                        table td {
                            width: 33%;
                            font-size: 20px;
                        }

                        .bigger {
                            font-size: 25px;
                        }

                        .serial {
                            background-color: white;
                            padding: 50px;
                        }

                        .serial table {
                            border-collapse: collapse;
                            margin: 0 auto;
                        }

                        .serial td {
                            width: 3px;
                            height: 50px;
                        }

                        .numbers td {
                            font-size: 16px;
                            text-align: center;
                        }

                        .m-0 {
                            margin: 0 !important;
                            font-weight: 300;
                            font-size: 14px;
                        }
                    </style>
                    <div class="holes-top"></div>
                    <div class="title">
                        <p class="cinema">{{ $orders->kategori_tiket }}</p>
                        <p class="movie-title">{{ $orders->konser->nama_konser }}</p>
                    </div>
                    <div class="poster">
                        <img src="{{ asset('storage/image/konser/banner/' . $orders->konser->banner) }}"
                            alt="Photo konser" />
                    </div>
                    <div class="info">
                        <table>
                            <tr>
                                <th>NAME</th>
                                <th>CT</th>
                                <th>QTY</th>
                            </tr>
                            <tr>
                                <td class="bigger">{{ explode(' ', $orders->konser->user->name)[0] }}</td>
                                <td class="bigger">{{ $orders->kategori_tiket }}</td>
                                <td class="bigger">{{ $orders->jumlah }}</td>
                            </tr>
                        </table>
                        <table>
                            <tr>
                                <th>PRICE</th>
                                <th>DATE</th>
                                <th>TIME</th>
                            </tr>
                            <tr>
                                <td>@currency($orders->total_price)</td>
                                <td>
                                    @php
                                        $tanggalArray = explode(' to ', $orders->konser->tanggal_konser);
                                        $tanggalPertama = $tanggalArray[0];
                                        echo $tanggalPertama;
                                    @endphp
                                </td>
                                <td>{{ $orders->konser->waktu_mulai }}</td>
                            </tr>
                        </table>
                    </div>
                    <div class="holes-lower"></div>
                    <div class="serial">
                        <table class="barcode">
                            <tr></tr>
                        </table>
                        <table class="numbers">
                            <tr>
                                @foreach (str_split($orders->number) as $digit)
                                    <td>{{ $digit }}</td>
                                @endforeach
                            </tr>
                        </table>
                    </div>
                </div>
                <script>
                    function hexToBinary(hex) {
                        let binary = "";
                        for (let i = 0; i < hex.length; i++) {
                            const digit = parseInt(hex[i], 16).toString(2).padStart(4, '0');
                            binary += digit;
                        }
                        return binary;
                    }
                    let code = hexToBinary("{{ $orders->number }}");

                    let table = document.querySelector('.barcode tr');
                    for (var i = 0; i < code.length; i++) {
                        if (code[i] == 1) {
                            table.innerHTML += '<td bgcolor="black"></td>';
                        } else {
                            table.innerHTML += '<td bgcolor="white"></td>';
                        }
                    }
                </script>
            </div>
        @endforeach
    </body>

</html>
