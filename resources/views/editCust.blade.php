<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>KasiRPL - Edit Customer</title>
    <link href="{{ asset('css/addData.css') }}" rel="stylesheet" type="text/css" >
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
                    <h1>Update Customer</h1>
                </div>
    
                <div class="admin-name">
                    <?php echo "<h1> Welcome, ". Auth::user()->name ."!</h1>"; // untuk menampilkan nama pengguna yang login dari tabel 'user' field 'name'
                ?>
                </div>
            </div>
    
            {{-- customer --}}
            <div class="card--container">
                <h3 class="main--title">Customer</h3>
                <div class="card--wrapper">
                    <div class="container">
                        <div class="box form-box">
                            <form action="/updatecust/{{ $data->pelangganID }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="field input">
                                    <label for="pelangganID">Customer ID</label>
                                    <input type="text" name="pelangganID" id="pelangganID" value="{{ $data->pelangganID }}">
                                </div>
                            
                                <div class="field input">
                                    <label for="namaProduk">Name</label>
                                    <input type="text" name="namaPelanggan" id="namaPelanggan" value="{{ $data->namaPelanggan }}">
                                </div>
                            
                                <div class="field input">
                                    <label for="alamat">Address</label>
                                    <textarea name="alamat" rows="5" cols="33">{{ $data->alamat }}</textarea>
                                </div>
                            
                                <div class="field input">
                                    <label for="nomorTelp">Phone Number</label>
                                    <input type="text" name="nomorTelp" id="nomorTelp" value="{{ $data->nomorTelp }}">
                                </div>
                                
                                <div class="field">
                                        <button>Update Data</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>