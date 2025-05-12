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
                    <li >
                        <a class="nav-link custom-nav-link" href="{{ route('dashboard') }}" ><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
                    </li>
                    <li class="active" >
                        <a class="nav-link custom-nav-link" href="{{ route('dataLoker') }}"><i class="fa fa-fw fa-columns"></i> Data Loker</a>
                        <ul class="sub-menu">
                    </ul>


                    </li>

                </ul>
            </div>
            
            
        </nav>




        
        <div id="page-wrapper">

            <div class="container-fluid">


                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Detail Lowongan Kerja</h1>
                        <ol class="breadcrumb">
                            <li style="display: flex; align-items: center;">
                                <span><a href="/dataLoker" class="btn" style="padding: 0; margin: 0; border: none; background: none; color: black" >Data Loker</a></span>
                                <span>/ </span>
                                <span><a href="#" class="btn" style="padding: 0; margin: 0; border: none; background: none; text-decoration: underline;" >Detail Lowongan Kerja</a></span>
                            </li>
                        </ol>
                    </div>
                </div>
                <div>

                <div class="card1">
                        @csrf
                        <table class="table detail-loker">
                            <tbody>
                                <tr>
                                    <th>Nama Loker</th>
                                    <td>
                                        {{ $data->nama }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>Tipe</th>
                                    <td>
                                        {{ $data->tipe }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>Usia Minimal</th>
                                    <td>
                                       {{ $data->usia_min }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>Usia Maksimal</th>
                                    <td>
                                       {{ $data->usia_max }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>Gaji Minimal</th>
                                    <td>
                                        {{ $data->gaji_min }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>Gaji Maksimal</th>
                                    <td>
                                        {{ $data->gaji_max }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>Nama CP</th>
                                    <td>
                                        {{ $data->nama_cp }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>Email CP</th>
                                    <td>
                                       {{ $data->email_cp }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>Nomor Telp CP</th>
                                    <td>
                                       {{ $data->no_telp_cp }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>Tanggal Update</th>
                                    <td>
                                        {{ $data->tgl_update }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>Tanggal Aktif</th>
                                    <td>
                                        {{ $data->tgl_aktif }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>Tanggal Tutup</th>
                                    <td>
                                      {{ $data->tgl_tutup }}
                                    </td>
                                </tr>
                               <!--  <tr>
                                    <th>Status</th>
                                    <td>
                                        {{ $data->status }}
                                    </td>
                                </tr> -->
                                <!-- Tambahkan baris untuk setiap input yang Anda miliki -->
                            </tbody>
                        </table>
                        
                        
                    </form>
                    <div class="card">
                        <i class="fa fa-user fa-4x" style="margin: auto"></i>
                        <h1 style="margin: auto" >{{$hitungLoker}}</h1>
                        <h5 style="margin: auto">Pelamar</h5>
                        <a href="{{ route('pencaker-apply', ['idloker' => $data->idloker]) }}" class="btn"> Lihat Daftar Pencaker</a>
                    </div>
                    <div class="card">
                        <i class="fa fa-calendar fa-4x" style="margin: auto"></i>
                        <h5 style="margin: auto">Status Loker</h5>
                        <h3 style="margin: auto" >{{ $data->status}}</h3>
                        
                      
                       
                    </div>
                    
                    
                    
                </div>
                <br>
                </div>
            
               
        </div>
        <!-- /#page-wrapper -->
    </div>
    <div>
        <footer class="text-white text-center text-lg-start bg-primary">
        <div class="text-center p-3" style="background-color: #001c40;">
          © 2023 Siloker [Prjocet Mini PBP ]
          <p class="text-white"></p>
        </div>
     
      </footer>
    
      
        </div>
</div>




    
 
    <!-- jQuery -->
    <script src="{{asset('style/js/jquery.js')}}"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="{{asset('style/js/bootstrap.min.js')}}"></script>

    <!-- Morris Charts JavaScript -->
    <script src="{{asset('style/js/plugins/morris/raphael.min.js')}}"></script>
    <script src="{{asset('style/js/plugins/morris/morris.min.js')}}"></script>
    <script src="{{asset('style/js/plugins/morris/morris-data.js')}}"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    
</body>

</html>
