<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>KasiRPL - Sign Up</title>
    <link href="{{ asset('css/style.css') }}" rel="stylesheet" type="text/css" >
    
</head>
<body>
    <div class="wrapper">
        <h1>Sign Up</h1>

        <form action="{{ route('save') }}" method="post">

            @if($errors->any()) 
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $item)
                            <li>{{ $item }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @csrf
            <input type="text" placeholder="Name" id="inputEmail" name="name" value="{{ old('name') }}">
            <input type="text" placeholder="Email" id="inputEmail" name="email" value="{{ old('email') }}">
            <input type="password" placeholder="Password" id="inputPassword" name="password" value="{{ old('password') }}">
            <select name="role" id="role" value="{{ old('role') }}">
                <option value="pelanggan">Pelanggan</option>
                <option value="petugas">Petugas</option>
            </select>
            <button type="submit">Sign Up</button>
        </form>

        <div class="login">
            Already have an account
            <a href="{{ url('/') }}">Sign in here</a>
        </div>
    </div>
</body>
</html>
{{-- <style>
    @import url("https://fonts.googleapis.com/css?family=Poppins:wght@400;600$display=swap");

   * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: "Poppins", sans-serif;
    }

    body {
        background: #dfe9f5;
    }

    .wrapper {
        width: 330px;
        padding: 2rem 1rem;
        margin: 50px auto;
        background-color: #fff;
        border-radius: 10px;
        text-align: center;
        box-shadow: 0 20px 35px rgba(0, 0, 0, 0.1);
    }

    h1 {
        font-size: 2rem;
        color: #07001f;
        margin-bottom: 1.2rem;
    }

    form input {
        width: 92%;
        outline: none;
        padding: 12px 20px;
        border: 1px solid #fff;
        margin-bottom: 10px;
        border-radius: 20px;
        background: #e4e4e4;
    }

    button {
        font-size: 1rem;
        margin-top: 1rem;
        padding: 10px 0;
        border-radius: 20px;
        outline: none;
        border: none;
        width: 90%;
        background: rgb(17, 107, 143);
        color: #fff;
        cursor: pointer;
    }
    button:hover {
        background: rgba(17, 107, 143, 0.877);
    }

    input:focus {
        border: 1px solid rgb(192, 192, 192);
    }

    .login {
        font-size: 0.8rem;
        margin-top: 1.4rem;
        color: #636363;
    }
    .login a {
        color: rgb(17, 107, 143);
        text-decoration: none;
    }
</style> --}}