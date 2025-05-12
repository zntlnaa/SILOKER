
@php $idloker = request()->segment(3);@endphp


<!DOCTYPE html>
<html lang="en">


<head>
    <title>SILOKER</title>
    <link rel="icon" href="{{ asset('style/image/logo.png') }}">


    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">


    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
    <!-- Bootstrap Core CSS -->
    <link href="{{ asset('style/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('style/css/bootstrap.css') }}" rel="stylesheet">


    <!-- Custom CSS -->
    <link href="{{ asset('style/css/sb-admin.css') }}" rel="stylesheet">


    <!-- Morris Charts CSS -->
    <link href="{{ asset('style/css/plugins/morris.css') }}" rel="stylesheet">


    <!-- Custom Fonts -->
    <link href="{{ asset('style/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">


</head>


<body>




<div id="wrapper">


    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" style="display: flex; align-items: center;">
                <img style="margin-left: 10px;" src="{{ asset('style/image/nav.png') }}" width="70" height="30" alt="">
            </a>
        </div>


        <ul class="nav navbar-right top-nav">
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <i class="fa fa-user "></i> Petugas <b class="caret"></b>
                </a>
                <ul class="dropdown-menu">
                    <li>
                        <a href="#">
                            <i class="fa fa-fw fa-power-off"></i> Log Out
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
        <!-- /.navbar-collapse -->


        <div class="collapse navbar-collapse navbar-ex1-collapse ">
            <ul class="nav navbar-nav side-nav">
                <li>
                    <a class="nav-link custom-nav-link" href="{{ route('dashboard') }}"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
                </li>
                <li class="active">
                    <a class="nav-link custom-nav-link" href="{{ route('dataLoker') }}"><i class="fa fa-fw fa-columns"></i> Data Loker</a>
                </li>
            </ul>
        </div>
    </nav>


    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">List Pencaker {{ $namaLoker }}</h1>
                    <ol class="breadcrumb">
                        <li style="display: flex; align-items: center;">
                            <span><a href="/dataLoker" class="btn" style="padding: 0; margin: 0; border: none; background: none; color: black">Data Loker</a></span>
                            <span>/ </span>
                            <span><a href="{{ route('detail-loker', ['idloker' => $idloker]) }}"
                                     class="btn" style="padding: 0; margin: 0; border: none; background: none; color: black">Detail Lowongan Kerja</a></span>
                            <span>/ </span>
                            <span><a href="#" class="btn"
                                     style="padding: 0; margin: 0; border: none; background: none; text-decoration: underline;">List Pencaker Loker</a></span>
                        </li>
                    </ol>
                </div>
            </div>
            @if ($message = Session::get('success'))
                <div class="alert alert-success" role="alert">
                    {{ $message }}
                </div>
            @endif
            <div class="row">
                <div class="col-lg-2">
                    <div class=" button-column">
                        <i class="fa fa-list fa-2x"></i>
                        <a  href="{{ route('pencaker-apply', ['idloker' => $idloker]) }}">List Pencaker</a>
                    </div>
                    <div class=" button-column">
                        <i class="fa fa-dashboard fa-2x"></i>
                        <a
                           href="{{ route('seleksi-administrasi', ['idloker' => $idloker]) }}">Seleksi Administrasi</a>
                    </div>
                    <div class=" button-column">
                        <i class="fa fa-user fa-2x"></i>
                        <a  class="active" 
                           href="{{ route('seleksi-wawancara', ['idloker' => $idloker]) }}">Seleksi Wawancara</a>
                    </div>
                </div>
                <div class="col-lg-10">
                <table class="table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>ID Apply</th>
                            <th>Nama Pencaker</th>
                            <th>ID Loker</th>
                            <th>Nilai</th>
                            <th>Seleksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $index => $row)
                            <tr>
                                <td>{{ $index + $data->firstItem() }}</td>
                                <td>{{ $row->id_apply }}</td>
                                <td>{{ $row->nama }}</td>
                                <td>{{ $row->idloker }}</td>
                                <td>{{ $row->nilai }}</td>
                                <td class="action-buttons">
                                    <form action="{{ route('lulusSeleksiWawancara', ['idloker' => $row->idloker, 'idapply' => $row->id_apply]) }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="id_apply" value="{{ $row->id_apply }}">
                                        <input type="hidden" name="nilai" value="1">
                                        <button type="submit" class="btn btn-success btn-sm">Lulus</button>
                                    </form>

                                    <form action="{{ route('tidakLulusSeleksiWawancara', ['idloker' => $row->idloker, 'idapply' => $row->id_apply]) }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="id_apply" value="{{ $row->id_apply }}">
                                        <input type="hidden" name="nilai" value="0">
                                        <button type="submit" class="btn btn-danger btn-sm">Tidak Lulus</button>
                                    </form>

                                    <form method="POST" action="{{ route('batal-lulus-administrasi', ['idloker' => $idloker]) }}">
                                        @csrf
                                        <input type="hidden" name="id_apply" value="{{ $row->id_apply }}">
                                        <input type="hidden" name="idtahapan" value="2">
                                        <button type="submit" class="btn btn-warning btn-sm">Batal Lulus Administrasi</button>
                                    </form>
                                    

                                </td>
                            </tr>
                            
                            
                           
                            
                        @endforeach
                    </tbody>
                </table>
                <form method="POST" action="{{ route('updateStatus', ['idloker' => $idloker]
                    )}}">
                        @csrf
                        @method('PUT')
                        <button type="submit">Selesai</button>
                    </form>

                {{$data->links()}}
            </div>
            </div>
        </div>
    
    </div>


    <div>
        <footer class="text-white text-center text-lg-start bg-primary">
            <div class="text-center p-3" style="background-color: #001c40;">
                © 2023 Siloker [Project Mini PBP]
                <p class="text-white"></p>
            </div>
        </footer>
    </div>
</div>


<!-- jQuery -->
<script src="{{ asset('style/js/jquery.js') }}"></script>


<!-- Bootstrap Core JavaScript -->
<script src="{{ asset('style/js/bootstrap.min.js') }}"></script>


<!-- Morris Charts JavaScript -->
<script src="{{ asset('style/js/plugins/morris/raphael.min.js') }}"></script>
<script src="{{ asset('style/js/plugins/morris/morris.min.js') }}"></script>
<script src="{{ asset('style/js/plugins/morris/morris-data.js') }}"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {
        $('tr[data-href]').on("click", function() {
            window.location = $(this).data("href");
        }).hover(function() {
            $(this).css("cursor", "pointer");
        });
    });
</script>
</body>


</html>



