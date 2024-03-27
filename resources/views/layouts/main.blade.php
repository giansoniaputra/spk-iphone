<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>{{ $title }} | SPK IPHONE</title>

    <!-- Custom fonts for this template -->
    <link href="/assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="/assets/css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="/assets/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/assets/sweetalert2.min.css">
    <!-- Theme style -->
    <script src="/assets/jquery-3.7.1.min.js"></script>
    <script src="/assets/sweetalert2.all.min.js"></script>
    <style>
        .spinner {
            width: 56px;
            height: 56px;
            display: grid;
            border: 4.5px solid #0000;
            border-radius: 50%;
            border-color: #ffff #0000;
            animation: spinner-e04l1k 1s infinite linear;
        }

        .spinner::before,
        .spinner::after {
            content: "";
            grid-area: 1/1;
            margin: 2.2px;
            border: inherit;
            border-radius: 50%;
        }

        .spinner::before {
            border-color: #474bff #0000;
            animation: inherit;
            animation-duration: 0.5s;
            animation-direction: reverse;
        }

        .spinner::after {
            margin: 8.9px;
        }

        @keyframes spinner-e04l1k {
            100% {
                transform: rotate(1turn);
            }
        }

        .card-spinner {
            position: fixed;
            top: 50vh;
            left: 50%;
            transform: translate(-50%, -50%);
            z-index: 100000;
            padding: 75px 150px;
            background-color: rgba(0, 0, 0, 0.3);
        }

        .modal-header {
            background-color: #1A2942;
            color: white;
        }

        .btn-close {
            background-color: white;
            border-radius: 50%;
        }

        .modal-body {
            background-color: white;
        }

        .modal-body input,
        .modal-body select,
        .modal-body textarea {
            border: 1px solid #1A2942 !important;
        }

    </style>
    <script>
        const loader = `
            <div class="card d-flex justify-conten-center align-items-center card-spinner">
                <div class="spinner" style="position:relative;z-index: 101;"></div>
            </div>`;

    </script>

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        @include('layouts.sidebar')
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>
                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        @if(auth()->check())
                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{ auth()->user()->name }}</span>
                                <img class="img-profile rounded-circle" src="/assets/img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <div class="dropdown-divider"></div>
                                <button class="dropdown-item logout" href="/logout">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </button>
                            </div>
                        </li>
                        @endif

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div id="spinner"></div>
                <div class="container-fluid">
                    <h2 class="mb-2">{{ $title }}</h2>
                    @yield('container')

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2020</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="/assets/vendor/jquery/jquery.min.js"></script>
    <script src="/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="/assets/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="/assets/js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="/assets/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="/assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>
    <script>
        let logout = document.querySelector('.logout')
        logout.addEventListener('click', function() {
            let unique = $(this).attr("data-unique");
            let token = $(this).attr("data-token");
            Swal.fire({
                title: "Apakah Kamu Yakin?"
                , text: "Anda akan keluar!"
                , icon: "warning"
                , showCancelButton: true
                , confirmButtonColor: "#3085d6"
                , cancelButtonColor: "#d33"
                , confirmButtonText: "Yes, Keluar!"
            , }).then((result) => {
                if (result.isConfirmed) {
                    document.location.href = '/logout';
                }
            });
        })

    </script>

</body>

</html>
