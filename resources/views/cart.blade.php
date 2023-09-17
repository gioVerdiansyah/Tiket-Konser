<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ticket</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        /* Menambahkan gaya CSS untuk meletakkan Order Summary di sisi kanan */
        #order-summary {
            position: sticky;
            top: 20px;
            /* Sesuaikan dengan jarak dari atas yang Anda inginkan */
            float: right;
            margin-left: 20px;
        }

        /* Menambahkan gaya CSS untuk tampilan card tiket konser */
        .ticket-card {
            border: 1px solid #ccc;
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 20px;
        }
    </style>
</head>

<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-8">
                <h1 class="mb-4">Pesanan Anda</h1>
                <div id="cart">
                    <div class="ticket-card">
                        <h2 class="card-title">Tame Impala Concert</h2>
                        <p class="card-text">Kota: Jakarta</p>
                        <p class="card-text">Kategori: VIP</p>
                        <p class="card-text">Rp. 800.000</p>
                        <button class="btn btn-danger" onclick="removeTicket(1)">Hapus</button>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <!-- Order Summary di sisi kanan -->
                <div id="order-summary" class="mt-4">
                    <div class="ticket-card">
                        <h5>order summary</h5>
                        <table class="table table-borderless">
                            <tbody>
                                <tr>
                                    <th>Subtotal</th>
                                    <td id="subtotal">Rp. 1.600.000</td>
                                </tr>
                                <tr>
                                    <th>Biaya Admin</th>
                                    <td id="admin-fee">Rp. 5.000</td>
                                </tr>
                                <tr>
                                    <th>Total</th>
                                    <td id="total">Rp. 1.605.000</td>


</body>
</html>
