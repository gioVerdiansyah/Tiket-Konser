@extends('layouts.admin', ['title' => 'List Konser'])
@section('content')
    <style>
        body {
            color: #566787;
            background: #f7f5f2;
            font-family: 'Roboto', sans-serif;
        }

        .pagination li.page-item {
            border-radius: 10px;
            /* Ganti nilai sesuai dengan radius yang Anda inginkan */
        }

        .pagination li.page-item.active {}

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
            min-width: 260px;
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

        .table td {
            max-width: 200px;
            /* Batasi lebar maksimum sel */
            white-space: nowrap;
            /* Hindari pemutaran teks */
            overflow: hidden;
            /* Sembunyikan teks yang berlebihan */
            text-overflow: ellipsis;
            /* Tambahkan elipsis (...) jika teks terlalu panjang */
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
                        <div class="col-sm-6 d-flex flex-col" style="justify-content: space-between;">
                            <div class="input-group" style="margin-right: 10px;">
                                <select class="form-select" id="filterOption">
                                    <option value="semua">Semua Konser</option>
                                    <option value="belum_kadaluarsa">Belum Kadaluarsa</option>
                                    <option value="kadaluarsa">Kadaluarsa</option>
                                </select>

                            </div>
                            <div class="search-box">
                                <div class="input-group">
                                    <input type="text" id="search" class="form-control" placeholder="Cari disini">
                                    <span class="input-group-addon" style="padding: 3px"><i class="bi bi-search"></i></span>
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
                        @foreach ($konsers as $i => $konser)
                            <tr
                                @if (!$konser->deleted_at) data-status="belum_kadaluarsa" @else data-status="kadaluarsa" @endif>
                                <td style="vertical-align:middle;@if ($konser->deleted_at) color:orange; @endif"
                                    @if ($konser->deleted_at) title="Konser telah kadaluarsa" @endif>
                                    {{ $konser->nama_konser }}</td>
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
                                        @if (!$konser->deleted_at)
                                            <form action="{{ route('konser_page.destroy', $konser->id) }}"
                                                id="delete-form{{ ++$i }}" method="POST"
                                                onsubmit="
                                                     event.preventDefault();
                                                     alasan({{ $i }})
                                                    ">
                                                @method('DELETE')
                                                @csrf
                                                <button type="submit" class="btn py-0 px-1 btn-danger"><i
                                                        class="bi bi-trash-fill"></i></button>
                                            </form>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
        <nav aria-label="Page navigation example" class="mt-3">
            <ul class="pagination justify-content-center">
                @if ($konsers->onFirstPage())
                    <li class="page-item disabled">
                        <span class="page-link">Previous</span>
                    </li>
                @else
                    <li class="page-item">
                        <a class="page-link" href="{{ $konsers->previousPageUrl() }}" rel="prev">Previous</a>
                    </li>
                @endif

                @for ($i = 1; $i <= $konsers->lastPage(); $i++)
                    <li class="page-item {{ $konsers->currentPage() == $i ? 'active' : '' }}">
                        <a class="page-link" href="{{ $konsers->url($i) }}">{{ $i }}</a>
                    </li>
                @endfor

                @if ($konsers->hasMorePages())
                    <li class="page-item">
                        <a class="page-link" href="{{ $konsers->nextPageUrl() }}" rel="next">Next</a>
                    </li>
                @else
                    <li class="page-item disabled">
                        <span class="page-link">Next</span>
                    </li>
                @endif
            </ul>
        </nav>
    </div>
    </body>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const filterOption = document.getElementById('filterOption');
            const tableRows = document.querySelectorAll('tbody tr');

            function updateTableRows() {
                const selectedOption = filterOption.value;

                tableRows.forEach(row => {
                    const rowStatus = row.getAttribute('data-status');

                    if (selectedOption === 'semua' || rowStatus === selectedOption) {
                        row.style.display = '';
                    } else {
                        row.style.display = 'none';
                    }
                });
            }
            updateTableRows();
            filterOption.addEventListener('change', updateTableRows);
        });
    </script>

    <script>
        function alasan(id) {
            const deleteForm = document.getElementById('delete-form' + id);
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

                    const deleteForm = document.getElementById('delete-form' + id);
                    deleteForm.appendChild(reasonInput);

                    deleteForm.submit();
                }
            });
        }
    </script>

    </html>
@endsection
