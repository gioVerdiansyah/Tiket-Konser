@extends('layouts.admin', ['title' => ''])
@section('content')
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        {{-- Link Icon --}}
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
        {{-- Custom CSS --}}
        <link rel="stylesheet"
            href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700;800&display=swap">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
        <style>
            * {
                box-sizing: border-box;
                padding: 0;
                margin: 0;
                font-family: 'Open Sans', sans-serif;
            }

            body {
                line-height: 1.5;
            }

            .card-wrapper {
                max-width: 1100px;
                margin: 0 auto;
            }

            img {
                width: 100%;
                display: block;
            }

            .img-display {
                overflow: hidden;
            }

            .img-showcase {
                display: flex;
                width: 100%;
                transition: all 0.5s ease;
            }

            .img-showcase img {
                min-width: 100%;
            }

            .img-select {
                display: flex;
            }

            .img-item {
                margin: 0.3rem;
            }

            .img-item:nth-child(1),
            .img-item:nth-child(2),
            .img-item:nth-child(3) {
                margin-right: 0;
            }

            .img-item:hover {
                opacity: 0.8;
            }

            .product-content {
                padding-right: 1rem;
                padding-left: 2rem;
                margin-top: 1.3rem;
            }

            .product-title {
                font-size: 3rem;
                text-transform: capitalize;
                font-weight: 700;
                position: relative;
                color: #12263a;
                margin: 1rem 0;
            }

            {{--  .product-title::after{
    content: "";
    position: absolute;
    left: 0;
    bottom: 0;
    height: 4px;
    width: 80px;
    background: #12263a;
}  --}} .product-link {
                text-decoration: none;
                text-transform: uppercase;
                font-weight: 400;
                font-size: 0.9rem;
                display: inline-block;
                margin-bottom: 0.5rem;
                background: #256eff;
                color: #fff;
                padding: 0 0.3rem;
                transition: all 0.5s ease;
            }

            .product-link:hover {
                opacity: 0.9;
            }

            .product-rating {
                color: #ffc107;
            }

            .product-rating span {
                font-weight: 600;
                color: #252525;
            }

            .product-price {
                margin: 1rem 0;
                font-size: 1rem;
                font-weight: 700;
            }

            .product-price span {
                font-weight: 400;
            }

            .last-price span {
                color: #f64749;
                text-decoration: line-through;
            }

            .new-price span {
                color: #00040c;
            }

            .product-detail h2 {
                text-transform: capitalize;
                color: #12263a;
                padding-bottom: 0.6rem;
            }

            .product-detail p {
                font-size: 0.9rem;
                padding: 0.3rem;
                opacity: 0.8;
            }

            .product-detail ul {
                margin: 1rem 0;
                padding-left: 0px;
                font-size: 0.9rem;
            }

            .product-detail ul li {
                margin: 0;
                list-style: none;
                background-size: 18px;
                padding-left: 0.3rem;
                margin: 0.4rem 0;
                font-weight: 600;
                opacity: 0.9;
            }

            .product-detail ul li span {
                font-weight: 400;
            }

            .purchase-info {
                margin: 1.5rem 0;
            }

            .purchase-info input,
            .purchase-info .btn {
                border: 1.5px solid #ddd;
                border-radius: 25px;
                text-align: center;
                padding: 0.45rem 0.8rem;
                outline: 0;
                margin-right: 0.2rem;
                margin-bottom: 1rem;
            }

            .purchase-info input {
                width: 60px;
            }

            .purchase-info .btn {
                cursor: pointer;
                color: #fff;
            }

            .purchase-info .btn:first-of-type {
                background: #000000;
            }

            .purchase-info .btn:last-of-type {
                background: #f64749;
            }

            .purchase-info .btn:hover {
                opacity: 0.9;
            }

            .social-links {
                display: flex;
                align-items: center;
            }

            .social-links a {
                display: flex;
                align-items: center;
                justify-content: center;
                width: 32px;
                height: 32px;
                color: #000;
                border: 1px solid #000;
                margin: 0 0.2rem;
                border-radius: 50%;
                text-decoration: none;
                font-size: 0.8rem;
                transition: all 0.5s ease;
            }

            .social-links a:hover {
                background: #000;
                border-color: transparent;
                color: #fff;
            }

            @media screen and (min-width: 992px) {
                .card {
                    display: grid;
                    grid-template-columns: repeat(2, 1fr);
                    grid-gap: 1.5rem;
                }

                .card-wrapper {
                    height: 800px;
                    display: flex;
                    justify-content: center;
                    align-items: center;
                }

                .product-imgs {
                    display: flex;
                    flex-direction: column;
                    justify-content: flex;
                    padding: 50px;
                }

                .product-content {
                    padding-top: 0;
                }
            }

            .rounded-image {
                border-radius: 2%;
            }

            .text-container {
                height: 5em;
                /* Sesuaikan ketinggian sesuai kebutuhan */
                overflow: hidden;
                text-align: justify;
            }

            .container {
                display: flex;
                flex-direction: column;
            }
        </style>
    </head>

    <body>


        <div class="container">
            <div class="card-wrapper">
                <div class="full">
                    <!-- card left -->
                    <div class="product-content">
                        <div class="product-imgs display flex-row">
                            <div class="img-display flex-row">
                                <div class="img-showcase">
                                    <img src="{{ asset('images/card.jpg') }}" style="height: 200px; width: 300px;"
                                        class="rounded-image">
                                </div>
                            </div>
                            <div class="kontainer">
                                <div class="product-price">
                                    <h3 class="fw-bold">Bobo</h3>
                                    <h5 class="fw-bold">Rp 800.000</h5>
                                </div>
                                <div class="container">
                                    <ul class="list-unstyled" id="flex-container">
                                        <li><span>Stok:</span> 12</li>
                                        <li><span>Kategori:</span> Rock</li>
                                        <li>
                                            <span>Alamat:Jalan Kota Malang</span>
                                        </li>
                                </div>
                            </div>
                        </div>
                        <!-- Memuat jQuery dan script Bootstrap -->
                        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> {{-- Anchor Detail Konser dan Ulasan End --}}
                        <div class="product-detail">
                            <h2 class="fw-bold">Detail Konser</h2>
                            <p class="left-align">Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                                Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an
                                unknown printer took a galley of type and scrambled it to make a type specimen book.
                                It has survived not only five centuries, but also the leap into electronic typesetting,
                                remaining essentially unchanged.
                                It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum
                                passages, and more recently with desktop publishing software like Aldus PageMaker including
                                versions of Lorem Ipsum.
                            </p>
                            <a class="fw-bold text-dark text-decoration-none" data-bs-toggle="modal"
                                data-bs-target="#denahKonserAdminModal"><i class="bi bi-map"></i> Denah Konser</a>
                            <!-- Modal Denah Konser -->
                            <div class="modal fade" id="denahKonserAdminModal" tabindex="-1"
                                aria-labelledby="denahKonserAdminModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title fw-semibold" id="denahKonserAdminModalLabel">Denah Konser
                                            </h4>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body text-center">
                                            <img src="{{ asset('storage/image/konser/denah_konser/') }}" alt="Denah Konser"
                                                class="img-fluid"width="%">
                                        </div>
                                        <div class="purchase-info">
                                            <button type="button" class="btn">Hapus</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>

    </html>
@endsection
