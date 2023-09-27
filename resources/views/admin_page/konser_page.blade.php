@extends('layouts.admin', ['title'=>'Konser'])
@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Bootstrap Table with Search Column Feature</title>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<style>
body {
    color: #566787;
    background: #f7f5f2;
    font-family: 'Roboto', sans-serif;
}
.table-responsive {
    margin: 30px 0;
    box-shadow: 0 .15rem 1.75rem 0 rgba(58,59,69,.15)!important;
}
.table-wrapper {
  	min-width: 1000px;
    background: #fff;
    padding: 20px 25px;
    border-radius: 4px;
    box-shadow: 0 .15rem 1.75rem 0 rgba(58,59,69,.15)!important;
}
.table-title {
    color: #4e73df!important;
    background:;
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
    position:inherit;
    right: 0;
}
.search-box .input-group-addon, .search-box input {
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
table.table tr th, table.table tr td {
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
    background-color: chartreuse;
    font-size: 25px;
    border-radius: 5px;
}
table.table td z {
    width: 40px;
    height: 30px;
    background-color:rgb(35, 75, 255);
    font-size: 25px;
    border-radius: 5px;
}
.material-icons{
    size: 10px;
}


</style>
<script>
$(document).ready(function(){
	// Activate tooltips
	$('[data-toggle="tooltip"]').tooltip();

	// Filter table rows based on searched term
    $("#search").on("keyup", function() {
        var term = $(this).val().toLowerCase();
        $("table tbody tr").each(function(){
            $row = $(this);
            var name = $row.find("td").text().toLowerCase();
            console.log(name);
            if(name.search(term) < 0){
                $row.hide();
            } else{
                $row.show();
            }
        });
    });
});
</script>
</head>
<body>
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
                        <tr>
                            <td style="vertical-align:middle;">Guns And Roses</td>
                            <td><img src="img/denny.jpg" style="width: 130px; height:135px; border-radius:10px;" ></td>
                            <td style="vertical-align:middle;">Dr.Asep</td>
                            <td style="vertical-align:middle;">Jln.Sentosa</td>
                            <td style="vertical-align:middle;">Lapangan Rampal</td>
                            <td style="padding-left: 6px; vertical-align:middle;">
                                <a href="#" class="delete" title="detail" data-toggle="tooltip">
                                    <z class="material-icons"><center style="margin-top:2px;">remove_red_eye</center></z>
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td style="vertical-align:middle;">Guns And Roses</td>
                            <td><img src="img/denny.jpg" style="width: 130px; height:135px; border-radius:10px;" ></td>
                            <td style="vertical-align:middle;">Peso</td>
                            <td style="vertical-align:middle;">Jln.Sentosa</td>
                            <td style="vertical-align:middle;">Lapangan Rampal</td>
                            <td style="padding-left: 6px; vertical-align:middle;">
                                <a href="#" class="delete" title="detail" data-toggle="tooltip">
                                    <z class="material-icons"><center style="margin-top:2px;">remove_red_eye</center></z>
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td style="vertical-align:middle;">Guns And Roses</td>
                            <td><img src="img/denny.jpg" style="width: 130px; height:135px; border-radius:10px;" ></td>
                            <td style="vertical-align:middle;">Dr.Asep</td>
                            <td style="vertical-align:middle;">Jln.Sentosa</td>
                            <td style="vertical-align:middle;">Lapangan Rampal</td>
                            <td style="padding-left: 6px; vertical-align:middle;">
                                <a href="#" class="delete" title="detail" data-toggle="tooltip">
                                    <z class="material-icons"><center style="margin-top:2px;">remove_red_eye</center></z>
                                </a>
                            </td>
                        </tr>



                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>
@endsection
