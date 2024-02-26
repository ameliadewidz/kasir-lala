<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>KasiRPL - Detail Transaction</title>
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
                    <h1>Detail Transaction</h1>
                </div>
    
                <div class="admin-name">
                    <?php echo "<h1> Welcome, ". Auth::user()->name ."!</h1>"; // untuk menampilkan nama pengguna yang login dari tabel 'user' field 'name'
                ?>
                </div>
            </div>

            {{-- product --}}
            <div class="card--container">
                <h3 class="main--title">Detail Transaction</h3>
                <div class="card--wrapper">
                    <a href="{{ url('add-detailtransaction') }}" class="button">Add Transaction</a>
                    
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
                                <th>Detail ID</th>
                                <th>Transaction ID</th>
                                <th>Product ID</th>
                                <th>Product Name</th>
                                <th>Price</th>
                                {{-- <th>Cust. ID</th>
                                <th>Cust. Name</th> --}}
                                <th>Qty</th>
                                <th>Sub Total</th>
                                {{-- <th>Total</th>
                                <th>Date</th> --}}
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $row)
                                <tr>
                                    <td>{{ $row->detailID }}</td> {{-- transaction id --}}
                                    <td>{{ $row->penjualanID }}</td> {{-- detail id --}}
                                    <td>{{ $row->produkID }}</td> {{-- product id --}}
                                    <td>{{ $row->produk->namaProduk }}</td>
                                    <td>{{ $row->produk->harga }}</td>
                                    {{-- <td>{{ $row->pelanggan ? $row->pelanggan->pelangganID : 'N/A' }}</td> 
                                    <td>{{ $row->pelanggan ? $row->pelanggan->namaPelanggan : 'N/A' }}</td>  --}}
                                    <td>{{ $row->jumlahProduk }}</td> {{-- qty --}}
                                    <td>{{ $row->subTotal }}</td> {{-- sub total --}}
                                    {{-- <td>{{ $row->penjualan ? $row->penjualan->totalHarga : 'N/A' }}</td>
                                    <td>{{ $row->penjualan ? $row->penjualan->tglPenjualan : 'N/A' }}</td> --}}
                                    <td>
                                        <a href="/view-detail/{{ $row->detailID }}" class="button-edit">Edit</a>
                                        <a href="/deletedetail/{{ $row->detailID }}" class="button-delete">Delete</a>
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
