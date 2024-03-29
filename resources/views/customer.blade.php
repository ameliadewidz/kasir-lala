<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>KasiRPL - Customer</title>
    <link href="{{ asset('css/customer.css') }}" rel="stylesheet" type="text/css" >
</head>
<body>
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
                    <h1>Customer</h1>
                </div>
    
                <div class="admin-name">
                    <?php echo "<h1> Welcome, ". Auth::user()->name ."!</h1>"; // untuk menampilkan nama pengguna yang login dari tabel 'user' field 'name'
                ?>
                </div>
            </div>

            {{-- product --}}
            <div class="card--container">
                <h3 class="main--title">Customer</h3>
                <div class="card--wrapper">
                    <a href="{{ url('addcust') }}" class="button">Add Customer</a>
                    <div class="table-container">
                        <!-- mengecek pesan sukses (jika berhasil) lalu tampilkan -->
                        @if(Session::has('success'))
                        <div class="alert alert-success">
                            {{ Session::get('success') }}
                        </div>
                    @endif
                        <table>
                            <thead>
                                <tr>
                                    <th>Customer ID</th>
                                    <th>Name</th>
                                    <th>Address</th>
                                    <th>Phone Number</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $row)
                                <tr>
                                    <td>{{ $row->pelangganID }}</td>
                                    <td>{{ $row->namaPelanggan }}</td>
                                    <td>{{ $row->alamat }}</td>
                                    <td>{{ $row->nomorTelp }}</td>
                                    <td>
                                        <div class="button-container">
                                            
                                        </div>
                                        <a href="/viewcust/{{ $row->pelangganID }}" class="button-edit">Edit</a>
                                        <a href="/deletecust/{{ $row->pelangganID }}" class="button-delete">Delete</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                    </table>
            </div>
        </div>
    </div>
</body>
</html>
