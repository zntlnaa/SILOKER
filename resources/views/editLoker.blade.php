
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
    <link href="{{asset('style/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('style/css/bootstrap.css')}}" rel="stylesheet">


    <!-- Custom CSS -->
    <link href="{{asset('style/css/sb-admin.css')}}" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="{{asset('style/css/plugins/morris.css')}}" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="{{asset('style/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">

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
    <img style="margin-left: 10px;" src="{{asset('style/image/nav.png')}}" width="70" height="30" alt="">
    
</a>

            </div>

           
            <ul class="nav navbar-right top-nav">   
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <i class="fa fa-user"></i> Petugas <b class="caret"></b>
                  </a>
                  <ul class="dropdown-menu">
                    <li>
                      <a href="#">
                        <i class="fa fa-fw fa-power-off"></i> Log Out </a>
                    </li>
                  </ul>
                </li>
              </ul>
            <!-- /.navbar-collapse -->
            
            <div class="collapse navbar-collapse navbar-ex1-collapse ">
                <ul class="nav navbar-nav side-nav">
                    <li>
                        <a class="nav-link custom-nav-link" href="{{ route('dashboard') }}" ><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
                    </li>
                    <li class="active">
                        <a class="nav-link custom-nav-link" href="{{ route('dataLoker') }}"><i class="fa fa-fw fa-columns"></i> Data Loker</a>
                        <ul class="sub-menu">
                    </ul>


                    </li>

                </ul>
            </div>
            
            
        </nav>




        
        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                    <h1 class="page-header">Edit Loker</h1>
                    <ol class="breadcrumb">
                        <li style="display: flex; align-items: center;">
                            <span><a href="/dataLoker" class="btn" style="padding: 0; margin: 0; border: none; background: none; color: black" >Data Loker</a></span>
                            <span>/ </span>
                            <span><a href="#" class="btn" style="padding: 0; margin: 0; border: none; background: none; text-decoration: underline;" >Edit Loker</a></span>
                        </li>
                    </ol>
                    </div>
                </div>
                <div>
                    <div class="form-container1">
                        <form action="/dataLoker/edit-loker/update-loker/{{ $data->idloker }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="nama" class="form-label">Nama Loker</label>
                                <input name="nama" class="form-control" id="nama" value="{{ $data->nama }}" aria-describedby="nama">
                            </div>
                            <div class="mb-3">
                                <label for="tipe" class="form-label">Tipe</label>
                                <input name="tipe" class="form-control" id="tipe" value="{{ $data->tipe }}" aria-describedby="tipe">
                            </div>
                            <div class="mb-3">
                                <label for="usia_min" class="form-label">Usia Minimal</label>
                                <input name="usia_min" class="form-control" id="usia_min" value="{{ $data->usia_min }}" aria-describedby="usia_min">
                            </div>
                            <div class="mb-3">
                                <label for="usia_max" class="form-label">Usia Maksimal</label>
                                <input name="usia_max" class="form-control" id="usia_max" value="{{ $data->usia_max }}" aria-describedby="usia_max">
                            </div>
                            <div class="mb-3">
                                <label for="gaji_min" class="form-label">Gaji Minimal</label>
                                <input name="gaji_min" class="form-control" id="gaji_min" value="{{ $data->gaji_min }}" aria-describedby="gaji_min">
                            </div>
                            <div class="mb-3">
                                <label for="gaji_max" class="form-label">Gaji Maksimal</label>
                                <input name="gaji_max" class="form-control" id="gaji_max" value="{{ $data->gaji_max }}" aria-describedby="gaji_max">
                            </div>
                            <div class="mb-3">
                                <label for="nama_cp" class="form-label">Nama CP</label>
                                <input name="nama_cp" class="form-control" id="nama_cp" value="{{ $data->nama_cp }}" aria-describedby="nama_cp">
                            </div>
                            <div class="mb-3">
                                <label for="email_cp" class="form-label">Email CP</label>
                                <input name="email_cp" class="form-control" id="email_cp" value="{{ $data->email_cp }}" aria-describedby="email_cp">
                            </div>
                            <div class="mb-3">
                                <label for="no_telp_cp" class="form-label">No Telp CP</label>
                                <input name="no_telp_cp" class="form-control" id="no_telp_cp" value="{{ $data->no_telp_cp }}" aria-describedby="no_telp_cp">
                            </div>
                            <div class="mb-3">
                                <label for="tgl_update" class="form-label">Tanggal Update</label>
                                <input name="tgl_update" class="form-control" id="tgl_update" type="date" value="{{ $data->tgl_update }}" aria-describedby="tgl_update">
                            </div>
                            <div class="mb-3">
                                <label for="tgl_aktif" class="form-label">Tanggal Aktif</label>
                                <input name="tgl_aktif" class="form-control" id="tgl_aktif" type="date" value="{{ $data->tgl_aktif }}" aria-describedby="tgl_aktif">
                            </div>
                            <div class="mb-3">
                                <label for="tgl_tutup" class="form-label">Tanggal Tutup</label>
                                <input name="tgl_tutup" class="form-control" id="tgl_tutup" type="date" value="{{ $data->tgl_tutup }}" aria-describedby="tgl_tutup">
                            </div>
                            <div class="mb-3">
                                <label for="status" class="form-label">Status:</label>
                                <select name="status" id="status" class="form-select  form-control" required>
                                    <option value="Aktif" @if ($data->status == 'Aktif') selected @endif>Aktif</option>
                                    <option value="Proses Seleksi" @if ($data->status == 'Proses Seleksi') selected @endif>Proses Seleksi</option>
                                    <option value="Tutup" @if ($data->status == 'Tutup') selected @endif>Tutup</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary" style="margin-left: 500px; ">Save</button>
                            <a href="/dataLoker" class="btn btn-danger">Cancel</a>
                        </form>
                    </div>
                </div>
            </div>
            <!-- /.container-fluid -->
<br>
            <div>
                <footer class="text-white text-center text-lg-start bg-primary">
                <div class="text-center p-3" style="background-color: #001c40;">
                  © 2023 Siloker [Prjocet Mini PBP ]
                  <p class="text-white"></p>
                </div>
             
              </footer>
            
              
                </div>         
        </div>
        <!-- /#page-wrapper -->
    </div>

    <!-- jQuery -->
    <script src="{{asset('style/js/jquery.js')}}"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="{{asset('style/js/bootstrap.min.js')}}"></script>

    <!-- Morris Charts JavaScript -->
    <script src="{{asset('style/js/plugins/morris/raphael.min.js')}}"></script>
    <script src="{{asset('style/js/plugins/morris/morris.min.js')}}"></script>
    <script src="{{asset('style/js/plugins/morris/morris-data.js')}}"></script>

</body>

</html>
