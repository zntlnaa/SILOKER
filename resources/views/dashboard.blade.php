
@php
 
@endphp
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
                    <li class="active">
                        <a class="nav-link custom-nav-link" href="{{ route('dashboard') }}" ><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
                    </li>
                    <li >
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
                    <h1 class="page-header">Dashboard</h1>
                    </div>
                </div>
                <!-- /.row -->

                
                <!-- /.row -->

            <div class="card1">
                <div class="card">
                    <i class="fa fa-building fa-4x" style="margin: auto"></i>
                    <h1 style="margin: auto" >{{$jumlahPerusahaan}}</h1>
                    <h5 style="margin: auto">Perusahaan</h5>
                </div>
                <div class="card">
                    <i class="fa fa-tasks fa-4x" style="margin: auto"></i>
                    <h1 style="margin: auto" >{{$totalLoker}}</h1>
                    <h5 style="margin: auto">Total Loker</h5>
                </div>
                
                <div class="card">
                    <i class="fa fa-user fa-4x" style="margin: auto"></i>
                    <h1 style="margin: auto" >{{$totalPelamar}}</h1>
                    <h5 style="margin: auto">Total Pelamar</h5>
                </div>
            </div>
<br>

                        
                   
                    <br><br>
                </div>
                <!-- /.row -->
                <br><br><br><br><br><br><br><br>
            </div>
            <!-- /.container-fluid -->

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
