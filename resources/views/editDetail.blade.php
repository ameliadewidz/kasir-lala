<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>KasiRPL - Add Detail Transaction</title>
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
                    <h1>Add Detail Transaction</h1>
                </div>
    
                <div class="admin-name">
                    <?php echo "<h1> Welcome, ". Auth::user()->name ."!</h1>"; // untuk menampilkan nama pengguna yang login dari tabel 'user' field 'name'
                ?>
                </div>
            </div>
    
            {{-- customer --}}
            <div class="card--container">
                <h3 class="main--title">Add Detail Transaction</h3>
                <div class="card--wrapper">
                    <div class="container">
                        <div class="box form-box">
                            <form method="GET">
                                <div class="field input">
                                    <label for="produkID">Product Code</label>
                                    <select name="produkID" id="produkID">
                                        @foreach($produkData as $row)
                                        <option value="{{ $row->produkID }}" 
                                            @if($row->produkID == $data->produkID) selected @endif>
                                            {{ $row->namaProduk }}
                                        </option>
                                        @endforeach
                                    </select>

                                    <div class="button-select">
                                        <button type="submit">Select</button>
                                    </div>
                                </div>
                            </form>

                            <form action="/updatedetail/{{ $data->detailID }}" method="POST" enctype="multipart/form-data">
                                @csrf

                                <input type="hidden" name="produkID" value="{{ isset($p_detail) ? $p_detail->produkID : '' }}">
                                
                                <div class="field input">
                                    <label for="namaProduk">Product Name</label>
                                        <input type="text" name="namaProduk" id="namaProduk" value="{{ isset ($p_detail) ? $p_detail->namaProduk : ''}}" disabled>
                                </div>

                                <div class="field input">
                                    <label for="harga">Price</label>          
                                        <input type="number" name="harga" id="harga" value="{{ isset ($p_detail) ? $p_detail->harga : ''}}" disabled>
                                </div>

                                <div class="field input">
                                    <label for="detailID">Detail Transaction ID</label>
                                    <input type="text" name="detailID" id="detailID" value="{{ $data->detailID }}">
                                </div>

                                <div class="field input">
                                    <label for="penjualanID">Transaction ID</label>
                                    <select name="penjualanID" id="penjualanID">
                                        @foreach($penjualanData as $row)
                                        <option value="{{ $row->penjualanID }}" 
                                            @if($row->penjualanID == $data->penjualanID) selected @endif>
                                            {{ $row->penjualanID }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                            
                                <div class="field input">
                                    <label for="jumlahProduk">Qty</label>
                                    <a href="?produkID={{ request('produkID') }}&act=min&qty={{ $qty }}">-</a>
                                    <input type="number" name="jumlahProduk" id="jumlahProduk" value="{{ $qty }}">
                                    <a href="?produkID={{ request('produkID') }}&act=plus&qty={{ $qty }}">+</a>
                                </div>

                                <div class="field input">
                                    <label for="subTotal">Sub Total</label>
                                    <input type="hidden" name="subTotal" value="{{ $data->subTotal }}">
                                    <h5 style="font-size: 16px; color: #ff6961">Rp. {{ $subtotal }} </h5>
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
    </body>
</html>