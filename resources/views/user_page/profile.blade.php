<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from adminlte.io/themes/v3/pages/examples/profile.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 12 Sep 2023 03:25:15 GMT -->
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Tiket Konser</title>

<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&amp;display=fallback">
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('admin/plugins/fontawesome-free/css/all.min.css') }}">

    <link rel="stylesheet" href="{{ asset('admin/dist/css/adminlte.min2167.css?v=3.2.0') }}">
<script nonce="7a456668-47e8-44f2-a4dc-924356d400f4">(function(w,d){!function(bg,bh,bi,bj){bg[bi]=bg[bi]||{};bg[bi].executed=[];bg.zaraz={deferred:[],listeners:[]};bg.zaraz.q=[];bg.zaraz._f=function(bk){return async function(){var bl=Array.prototype.slice.call(arguments);bg.zaraz.q.push({m:bk,a:bl})}};for(const bm of["track","set","debug"])bg.zaraz[bm]=bg.zaraz._f(bm);bg.zaraz.init=()=>{var bn=bh.getElementsByTagName(bj)[0],bo=bh.createElement(bj),bp=bh.getElementsByTagName("title")[0];bp&&(bg[bi].t=bh.getElementsByTagName("title")[0].text);bg[bi].x=Math.random();bg[bi].w=bg.screen.width;bg[bi].h=bg.screen.height;bg[bi].j=bg.innerHeight;bg[bi].e=bg.innerWidth;bg[bi].l=bg.location.href;bg[bi].r=bh.referrer;bg[bi].k=bg.screen.colorDepth;bg[bi].n=bh.characterSet;bg[bi].o=(new Date).getTimezoneOffset();if(bg.dataLayer)for(const bt of Object.entries(Object.entries(dataLayer).reduce(((bu,bv)=>({...bu[1],...bv[1]})),{})))zaraz.set(bt[0],bt[1],{scope:"page"});bg[bi].q=[];for(;bg.zaraz.q.length;){const bw=bg.zaraz.q.shift();bg[bi].q.push(bw)}bo.defer=!0;for(const bx of[localStorage,sessionStorage])Object.keys(bx||{}).filter((bz=>bz.startsWith("_zaraz_"))).forEach((by=>{try{bg[bi]["z_"+by.slice(7)]=JSON.parse(bx.getItem(by))}catch{bg[bi]["z_"+by.slice(7)]=bx.getItem(by)}}));bo.referrerPolicy="origin";bo.src="../../../../cdn-cgi/zaraz/sd0d9.js?z="+btoa(encodeURIComponent(JSON.stringify(bg[bi])));bn.parentNode.insertBefore(bo,bn)};["complete","interactive"].includes(bh.readyState)?zaraz.init():bg.addEventListener("DOMContentLoaded",zaraz.init)}(w,d,"zarazData","script");})(window,document);</script></head>
<body class="hold-transition sidebar-mini">



    <nav class="navbar navbar-expand-lg navbar-light bg-light"> <!-- Ganti kelas "bg-body-tertiary" dengan "navbar-light bg-light" -->
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span> <!-- Tambahkan ikon Hamburger Menu -->
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Profil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">History</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
      
    <div class="col-lg-12">
        <div class="row" style="">
            <div class="col-lg-4">
                
                <div class="card" style="height: 550px; width: 485px">
                    <div class="card-title text-center mt-3">
                        <h1>Profile</h1>
                    </div>
                    <div class="card-body text-center">
                        <div style="border-radius: 5px;">
                            <img src="{{ asset('img/profil.jpeg')}}" alt="profil" style="max-width: 100%; height: auto;">
                        </div>
                        
                        <div class="text-center mt-3">
                            <h4 class="fw-bold">Manula</h4>
                        </div>
                        <div class="py-3">
                            <button type="button" class="btn btn-outline-dark" style="width: 165px; font-size: 16px;">Upload New
                                Avatar</button>
                        </div>
                        <button type="button" class="btn btn-outline-dark" style="width: 165px; font-size: 16px;">Ubah Kata Sandi</button>
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="card" style="border: none; margin-right-4">
                    <div class="card-header p-2">
                        <div class="d-flex justify-content-between align-items-center">
                            <h3 class="mr-3">Basic Info</h3>
                            <div>
                                <button class="btn btn-dark ml-2">Batal</button>
                                <button class="btn btn-dark">Simpan</button>
                            </div>
                        </div>
                    </div>
                    <div class="card-body" style="height: 490px; border-right: 1px solid #ccc; border-left: 1px solid #ccc;">
                        <div class="">
                            <!-- Isi tab "settings" di sini -->
                            <div class="" id="settings">
                                <form class="form-horizontal">
                                    <!-- Isi form "settings" di sini -->
                                    <div class="form-group row">
                                        <label for="inputName" class="col-sm-2 col-form-label">Name</label>
                                        <div class="col-sm-10">
                                            <input type="text" style="height: 30px" class="form-control" id="inputName" placeholder="Name">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                                        <div class="col-sm-10">
                                            <input type="email" style="height: 30px" class="form-control" id="inputEmail" placeholder="Email">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputName2" class="col-sm-2 col-form-label">No Telp</label>
                                        <div class="col-sm-10">
                                            <input type="tel" style="height: 30px" class="form-control" id="no_telp" placeholder="No Telp">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputExperience" class="col-sm-2 col-form-label">Alamat</label>
                                        <div class="col-sm-10">
                                            <textarea class="form-control" id="inputExperience" placeholder="jawa timur, jln.panglima sudirman"></textarea>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>                
        </div>        
</div>

</div>

</div>
</section>

<aside class="control-sidebar control-sidebar-dark">

</aside>

</div>


<script src="{{ asset('admin/plugins/jquery/jquery.min.js') }}"></script>

<script src="{{ asset('admin/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

<script src="{{ asset('admin/dist/js/adminlte.min2167.js?v=3.2.0')}}"></script>

<script src="{{ asset('/dist/js/demo.js')}}"></script>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

<!-- Mirrored from adminlte.io/themes/v3/pages/examples/profile.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 12 Sep 2023 03:25:15 GMT -->
</html>
