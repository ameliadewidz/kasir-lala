<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>KasiRPL</title>
    <link href="{{ asset('css/dashboard.css') }}" rel="stylesheet" type="text/css" >

</head>
<body>
    {{-- sidebar --}}
    <div class="sidebar">
        <div class="logo">
            <ul class="menu">
                @if(Auth::user()->role == 'admin')
                <li>
                    <a href="{{ url('dashboard/admin') }}">
                        <span>Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="{{ url('product') }}">
                        <span>Product</span>
                    </a>
                </li>
                <li>
                    <a href="{{ url('user') }}">
                        <span>User</span>
                    </a>
                </li>
                @endif

                @if(Auth::user()->role == 'petugas')
                <li>
                    <a href="{{ url('dashboard/petugas') }}">
                        <span>Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="{{ url('product') }}">
                        <span>Product</span>
                    </a>
                </li>
                <li>
                    <a href='{{ url('transaction') }}'>
                    <span>Transaction</span>
                    </a>
                </li>
                <li>
                    <a href="{{ url('customer') }}">
                        <span>Customer</span>
                    </a>
                </li>
                <li>
                    <a href="{{ url('detail') }}">
                        <span>Detail Transaction</span>
                    </a>
                </li>
                @endif
                {{-- end dashboard petugas --}}

                <li>
                    <a href='logout'> {{-- memanggil function logout --}}
                        <span>Logout</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>

    {{-- main body --}}
    <div class="main--content">
        <div class="header--wrapper">
            <div class="header--title">
                <span>KasiRPL</span>
                <h1>Dashboard</h1>
            </div>

            <div class="admin-name">
                <?php echo "<h1> Welcome, ". Auth::user()->name ."!</h1>"; // untuk menampilkan nama pengguna yang login dari tabel 'user' field 'name'
            ?>
            </div>
        </div>
    </div>
</body>
</html>

<?php
    use Illuminate\Support\Facades\Auth;
?>