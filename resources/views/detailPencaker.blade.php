
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
                    <h1 class="page-header">Detail Pencaker</h1>
                    </div>
                </div>
                <div>
                    <div>
                        @csrf
                        <table class="table detail-loker">
                            <tr>
                                <th>No KTP</th>
                                <td>{{ $data->noktp }}</td>
                            </tr>
                            <tr>
                                <th>Nama</th>
                                <td>{{ $data->nama }}</td>
                            </tr>
                            <tr>
                                <th>Jenis Kelamin</th>
                                <td>{{ $data->jenis_kelamin }}</td>
                            </tr>
                            <tr>
                                <th>Tempat Lahir</th>
                                <td>{{ $data->tempat_lahir }}</td>
                            </tr>
                            <tr>
                                <th>Tanggal Lahir</th>
                                <td>{{ $data->tanggal_lahir }}</td>
                            </tr>
                            <tr>
                                <th>Alamat</th>
                                <td>{{ $data->alamat }}</td>
                            </tr>
                            <tr>
                                <th>Kota</th>
                                <td>{{ $data->kota }}</td>
                            </tr>
                            <tr>
                                <th>Email</th>
                                <td>{{ $data->email }}</td>
                            </tr>
                            <tr>
                                <th>Nomor Telepon</th>
                                <td>{{ $data->no_telp }}</td>
                            </tr>
                            <tr>
                                <th>Foto</th>
                                <td>
                                    <img src="data:image/jpeg;base64,{{ base64_encode($data->foto) }}" alt="Foto Pencari Kerja" width="150" height="150">
                                </td>
                            </tr>
                            <tr>
                                <th>Tanggal Daftar</th>
                                <td>{{ $data->tgl_daftar }}</td>
                            </tr>
                            <tr>
                                <th>File KTP</th>
                                <td>
                                    <img src="data:image/jpeg;base64,{{ base64_encode($data->file_ktp) }}" alt="File KTP Pencari Kerja" width="150" height="150">
                                </td>
                            </tr>
                        </table>
                        
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
