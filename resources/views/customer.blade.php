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
                    <h1>Customer</h1>
                </div>
    
                <div class="admin-name">
                    <?php echo "<h1> Welcome, ". Auth::user()->name ."!</h1>"; // untuk menampilkan nama pengguna yang login dari tabel 'user' field 'name'
                ?>
                </div>
            </div>
    
            {{-- customer --}}
            <div class="card--container">
                <h3 class="main--title">Customer Data</h3>
                <div class="card--wrapper">
                    <div class="container">
                        <div class="box form-box">
                            <form action="" method="POST">
                                <div class="field input">
                                    <label for="id">Customer ID</label>
                                    <input type="text" name="id" id="id">
                                </div>
                            
                                <div class="field input">
                                    <label for="id">Customer Name</label>
                                    <input type="name" name="name" id="name">
                                </div>
                            
                                <div class="field input">
                                    <label for="id">Phone Number</label>
                                    <input type="phone" name="phone" id="phone">
                                </div>
                            
                                <div class="field input">
                                    <label for="id">Address</label>
                                    <textarea name="address" id="address">

                                    </textarea>
                                </div>
                                
                                <div class="field">
                                        <button type="submit" name="submit" id="submit">Add Data</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            {{-- product --}}
            <div class="card--container">
                <h3 class="main--title">Customer</h3>
                <div class="card--wrapper">
                    <div class="table-container">
                        <table>
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Phone Number</th>
                                    <th>Address</th>
                                    <th>Action</th>
                                </tr>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Lala Amelia</td>
                                    <td>+62 812 345 678</td>
                                    <td>Jl. Blablabla No. 7</td>
                                    <td>
                                        <button>Edit</button>
                                        <button>Delete</button>
                                    </td>
                                </tr>
                            </tbody>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
        </div>
</body>
</html>