<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ticket</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-8">
                <h1 class="mb-4">Pesanan Anda</h1>
                <div id="cart">
                    <div class="card mb-3">
                        <div class="card-body">
                            <h2 class="card-title">Tame Impala Concert</h2>
                            <p class="card-text">Kota: Jakarta</p>
                            <p class="card-text">Kategori: VVIP</p>
                            <p class="card-text">Rp. 800.000</p>
                            <button class="btn btn-danger" onclick="removeTicket(1)">Hapus</button>
                        </div>
                    </div>

                    <!-- Contoh tiket kedua -->
                    <div class="card mb-3">
                        <div class="card-body">
                            <h2 class="card-title">Tame Impala Concert</h2>
                            <p class="card-text">Kota: Jakarta</p>
                            <p class="card-text">Kategori: VVIP</p>
                            <p class="card-text">Rp. 800.000</p>
                            <button class="btn btn-danger" onclick="removeTicket(2)">Hapus</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div id="order-summary" class="mt-4">
                    <h3>Ringkasan Pesanan</h3>
                    <table class="table table-bordered">
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
                            </tr>
                        </tbody>
                    </table>
                    <button class="btn btn-dark">Menuju ke pembayaran</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        function removeTicket(ticketId) {
        }
    </script>
</body>
</html>
