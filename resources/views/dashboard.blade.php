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
                <h1>Dashboard</h1>
            </div>

            <div class="admin-name">
                <?php echo "<h1> Welcome, ". Auth::user()->name ."!</h1>"; // untuk menampilkan nama pengguna yang login dari tabel 'user' field 'name'
            ?>
            </div>
        </div>

        {{-- product --}}
        <div class="card--container">
            <h3 class="main--title">Product</h3>
            <div class="card--wrapper">
                <div class="table-container">
                    <table>
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Price</th>
                                <th>Stock</th>
                                <th>Action</th>
                            </tr>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>My Melody Blocks</td>
                                    <td>50.000</td>
                                    <td>1</td>
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

{{-- <style>
    @import url("https://fonts.googleapis.com/css?family=Poppins:wght@400;600$display=swap");

    * {
        margin: 0;
        padding: 0;
        border: none;
        outline: none;
        box-sizing: border-box;
        font-family: "Poppins", sans-serif;
    }

    body {
        display: flex;
    }

    .sidebar {
        position: sticky;
        top: 0;
        left: 0;
        bottom: 0;
        width: 240px;
        height: 100vh;
        padding: 0 1.7rem;
        color: #fff;
        overflow: hidden;
        transition: all 0.5s linear;
        background: rgba(113, 99, 186, 255);
    }
    /* .sidebar:hover {
        width: 240px;
        transition: 0.5s;
    } */

    .logo {
        height: 80px;
        padding: 16px;
    }

    .menu {
        height: 88%;
        position: relative;
        list-style: none;
        padding: 0;
    }
    .menu li {
        padding: 1rem;
        margin: 8px 0;
        border-radius: 8px;
        transition: all 0.5s ease-in-out;
    }
    .menu li:hover {
        background: #e0e0e058;
    }
    .menu a {
        color: #fff;
        font-size: 14px;
        text-decoration: none;
        display: flex;
        align-items: center;
        gap: 1.5rem;
    }
    .menu a span {
        overflow: hidden;
    }
    .menu a i {
        font-size: 1.2rem;
    }

    .logout {
        position: absolute;
        bottom: 0;
        left: 0;
        width: 100%;
    }

    /* main body */
    .main--content {
        position: relative;
        background: #ebe9e9;
        width: 100%;
        padding: 1rem;
    }

    .admin-name {
        font-size: 0.5rem;
    }

    .header--wrapper {
        display: flex;
        justify-content: space-between;
        align-items: center;
        flex-wrap: wrap;
        background: #fff;
        border-radius: 10px;
        padding: 10px 2rem;
        margin-bottom: 1 rem;
    }
    
    .header--title {
        color: rgba(113, 99, 186, 255);
    }

    /* product data */
    .card--container {
        background: #fff;
        margin-top: 1rem;
        border-radius: 10px;
        padding: 2rem;
    }

    .card--wrapper {
        display: flex;
        flex-wrap : wrap;
        gap: 1rem;
    }

    .main--title {
        color: rgba(113, 99, 186, 255);
        padding-bottom: 10px;
        font-size: 15px;

    }

    .table-container {
        width: 100%;
    }

    table {
        width: 100%;
        border-collapse: collapse;
    }

    thead {
        background: rgba(113, 99, 186, 255);
        color: #fff;
    }

    th {
        padding: 15px;
        text-align: left;
    }

    tbody {
        background: #f2f2f2;
    }

    td {
        padding: 15px;
        font-size: 14px;
        color: #333;
    }

    tr:nth-child(even) {
        background: #fff;

    }

    tfoot {
        background: rgba(113, 99, 186, 255);
        font-weight: bold;
        color: #fff;
    }
    tfoot td {
        padding: 15px;
    }

    .table-container button {
        color: #333;
        background: none;
        cursor: pointer;
        font-weight: bold;
    }
</style> --}}

<?php
    use Illuminate\Support\Facades\Auth;
?>