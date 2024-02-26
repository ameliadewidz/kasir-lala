<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>KasiRPL - Add Transaction</title>
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
                    <h1>Add Transaction</h1>
                </div>
    
                <div class="admin-name">
                    <?php echo "<h1> Welcome, ". Auth::user()->name ."!</h1>"; // untuk menampilkan nama pengguna yang login dari tabel 'user' field 'name'
                ?>
                </div>
            </div>
    
            {{-- customer --}}
            <div class="card--container">
                <h3 class="main--title">Add Transaction</h3>
                <div class="card--wrapper">
                    <div class="container">
                        <div class="box form-box">
                            <form action="{{ route('inserttransaction') }}" method="POST" enctype="multipart/form-data"> {{-- style="display: inline-block; width: 48%; margin-right: 10px;" --}}
                                @csrf
                                <div class="field input">
                                    <label for="penjualanID">Transaction ID</label>
                                    <input type="text" name="penjualanID" id="penjualanID" value="{{ old('penjualanID') }}">
                                </div>

                                <div class="field input">
                                    <label for="pelangganID">Customer Name</label>
                                    <select name="pelangganID" id="pelangganID">
                                        @if($data)
                                            @foreach($data as $row)
                                                <option value="{{ $row->pelangganID }}">{{ $row->namaPelanggan }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                            
                                <div class="field input">
                                    <label for="tglPenjualan">Date</label>
                                    <input type="date" name="tglPenjualan" id="tglPenjualan" value="{{ old('tglPenjualan') }}">
                                </div>
                            
                                <div class="field input">
                                    <label for="totalHarga">Total Price</label>
                                    <input type="text" name="totalHarga" id="totalHarga" value="{{ old('totalHarga') }}">
                                </div>

                                <div class="field">
                                    <button>Add Data</button>
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