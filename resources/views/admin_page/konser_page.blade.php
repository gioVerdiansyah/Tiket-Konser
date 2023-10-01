@extends('layouts.admin', ['title' => 'List Konser'])
@section('content')
    <style>
        body {
            color: #566787;
            background: #f7f5f2;
            font-family: 'Roboto', sans-serif;
        }

        .table-responsive {
            margin: 30px 0;
            box-shadow: 0 .15rem 1.75rem 0 rgba(58, 59, 69, .15) !important;
        }

        .table-wrapper {
            min-width: 1000px;
            background: #fff;
            padding: 20px 25px;
            border-radius: 4px;
            box-shadow: 0 .15rem 1.75rem 0 rgba(58, 59, 69, .15) !important;
        }

        .table-title {
            color: #4e73df !important;
            background: ;
            padding: 16px 25px;
            margin: -20px -25px 0px;
            border-radius: 3px 3px 0 0;
        }

        .table-title h2 {
            margin: 5px 0 0;
            font-size: 24px;
        }

        .search-box {
            position: relative;
            float: right;
        }

        .search-box .input-group {
            min-width: 300px;
            position: inherit;
            right: 0;
        }

        .search-box .input-group-addon,
        .search-box input {
            border-color: #ddd;
            border-radius: 0;
        }

        .search-box input {
            height: 34px;
            padding-right: 35px;
            background: #f4fcfd;
            border: none;
            border-radius: 10px !important;
        }

        .search-box input:focus {
            background: #fff;
        }

        .search-box input::placeholder {
            font-style: italic;
        }

        .search-box .input-group-addon {
            min-width: 35px;
            border: none;
            background: transparent;
            position: absolute;
            right: 0;
            z-index: 9;
            padding: 6px 0;
        }

        .search-box i {
            color: #a0a5b1;
            font-size: 19px;
            position: relative;
            top: 2px;
        }

        table.table {
            table-layout: fixed;
            margin-top: 0px;
        }

        table.table tr th,
        table.table tr td {
            border-color: #e9e9e9;
        }

        table.table th i {
            font-size: 13px;
            margin: 0 5px;
            cursor: pointer;
        }

        table.table th:first-child {
            width: 90px;
        }

        table.table th:last-child {
            width: 120px;
        }

        table.table td a {
            color: #a0a5b1;
            display: inline-block;
            margin: 0 5px;
        }

        table.table td a.view {
            color: #03A9F4;
        }

        table.table td a.edit {
            color: #ffffff;
        }

        table.table td a.delete {
            color: #ffffff;
        }

        table.table td i {
            font-size: 25px;
            border-radius: 5px;
        }

        table.table td z {
            width: 40px;
            height: 30px;
            background-color: rgb(35, 75, 255);
            font-size: 25px;
            border-radius: 5px;
        }

        .material-icons {
            size: 10px;
        }
    </style>
    <script>
        $(document).ready(function() {
            // Activate tooltips
            $('[data-toggle="tooltip"]').tooltip();

            // Filter table rows based on searched term
            $("#search").on("keyup", function() {
                var term = $(this).val().toLowerCase();
                $("table tbody tr").each(function() {
                    $row = $(this);
                    var name = $row.find("td").text().toLowerCase();
                    console.log(name);
                    if (name.search(term) < 0) {
                        $row.hide();
                    } else {
                        $row.show();
                    }
                });
            });
        });
    </script>
    <div class="container-lg">
        <div class="table-responsive">
            <div class="table-wrapper">
                <div class="table-title">
                    <div class="row">
                        <div class="col-sm-6">
                            <h2>Daftar <b>Konser</b></h2>
                        </div>
                        <div class="col-sm-6">
                            <div class="search-box">
                                <div class="input-group">
                                    <input type="text" id="search" class="form-control" placeholder="Cari disini">
                                    <span class="input-group-addon"><i class="material-icons">&#xE8B6;</i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th style="width: 16%">Nama Konser</th>
                            <th style="width: 18%;">Banner</th>
                            <th style="width: 18%;">Penyelenggara</th>
                            <th style="width: 20%">Alamat</th>
                            <th style="width: 18%">Tempat</th>
                            <th style="width: 15%">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($konsers as $konser)
                            <tr>
                                <td style="vertical-align:middle;">{{ $konser->nama_konser }}</td>
                                <td><img src="{{ asset('storage/image/konser/banner/' . $konser->banner) }}"
                                        style="width: 130px; height:135px; border-radius:10px;"></td>
                                <td style="vertical-align:middle;">{{ $konser->nama_penyelenggara }}</td>
                                <td style="vertical-align:middle;">{{ $konser->alamat }}</td>
                                <td style="vertical-align:middle;">{{ $konser->tempat }}</td>
                                <td style="padding-left: 6px; vertical-align:middle;">
                                    <div class="d-flex">
                                        <a href="{{ route('konser_page.detail', $konser->id) }}"
                                            class="delete p-0 rounded btn-primary" title="detail" data-toggle="tooltip">
                                            <i class="bi bi-eye-fill m-1"></i>
                                        </a>
                                        <form action="{{ route('konser_page.destroy') }}" id="delete-form" method="POST"
                                            onsubmit="
                                                     event.preventDefault();
                                                     alasan()
                                                    ">
                                            @method('DELETE')
                                            @csrf
                                            <input type="hidden" name="konser_id" value="{{ $konser->id }}">
                                            <button type="submit" class="btn py-0 px-1 btn-danger"><i
                                                    class="bi bi-trash-fill"></i></button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    </body>
    <script>
        const deleteForm = document.getElementById('delete-form');

        function alasan() {
            Swal.fire({
                title: 'Konfirmasi Hapus Konser',
                input: 'text',
                inputLabel: 'Alasan Penghapusan',
                inputPlaceholder: 'Masukkan alasan penghapusan...',
                showCancelButton: true,
                confirmButtonText: 'Hapus',
                cancelButtonText: 'Batal',
                preConfirm: (reason) => {
                    if (!reason) {
                        Swal.showValidationMessage('Alasan penghapusan wajib diisi');
                    }
                },
            }).then((result) => {
                if (result.isConfirmed) {
                    const reasonInput = document.createElement('input');
                    reasonInput.setAttribute('type', 'hidden');
                    reasonInput.setAttribute('name', 'alasan_hapus');
                    reasonInput.value = result.value;

                    deleteForm.appendChild(reasonInput);

                    deleteForm.submit();
                }
            });
        }
    </script>

    </html>
@endsection
