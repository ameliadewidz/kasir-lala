<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>KasiRPL - Product</title>
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
                    <a href="{{ url('/product') }}">
                        <span>Product</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <span>Stock</span>
                    </a>
                </li>
                <li>
                    <a href="{{ url('/customer') }}">
                        <span>Customer</span>
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
                    <a href="{{ url('/product') }}">
                        <span>Product</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <span>Stock</span>
                    </a>
                </li>
                <li>
                    <a href='#'>
                    <span>Transaction</span>
                    </a>
                </li>
                @endif

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
                <h1>Product</h1>
            </div>

            <div class="admin-name">
                <?php echo "<h1> Welcome, ". Auth::user()->name ."!</h1>"; // untuk menampilkan nama pengguna yang login dari tabel 'user' field 'name'
            ?>
            </div>
        </div>

        {{-- product --}}
        <div class="card--container">
            <h3 class="main--title">Product Data</h3>
            <div class="card--wrapper">
                <div class="container">
                    <div class="box form-box">
                        <form action="" method="POST">
                            <div class="field input">
                                <label for="id">Product ID</label>
                                <input type="text" name="id" id="id">
                            </div>
                        
                            <div class="field input">
                                <label for="id">Product Name</label>
                                <input type="product" name="product" id="product">
                            </div>
                        
                            <div class="field input">
                                <label for="id">Price</label>
                                <input type="price" name="price" id="price">
                            </div>
                        
                            <div class="field input">
                                <label for="id">Stock</label>
                                <input type="stock" name="stock" id="sotck">
                            </div>
                            
                            <div class="field">
                                    <button type="submit" name="submit" id="submit">Add Data</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>





