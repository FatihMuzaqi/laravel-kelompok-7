
<style>
        body {
            background-image: url({{asset('tegal.jpg')}});
            background-repeat: no-repeat;
            background-size: cover;
            font-family: 'Arial', sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            font-weight: bold;
            color: #fff;
            
        }
        .container {
            background: rgba(0, 0, 0, .7);
            padding: 2rem;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            width: 100%;
            border: 1px solid white;
            
        }

        h1 {
            margin-bottom: 1.5rem;
            font-weight: 700;
            color: #fff;
            text-align: center;
        }
        .form-control {
            background: rgba(255, 255, 255, 0.2);
            border: none;
            color: #fff;
        }
        .form-control:focus {
            box-shadow: none;
            border-color: #6a11cb;
            background: rgba(255, 255, 255, 0.3);
        }
        .btn-primary {
            background: blue;
            border: none;
            color: #fff;
        }
        .btn-primary:hover {
            background: skyblue;
            color: black;
        }
        a {
            color: skyblue;
            text-decoration: none;
        }
        a:hover {
            color: #2575fc;
        }

        .div1 input {
            width: 400px;
            height: 40px;
            border: 1px solid white;
            border-radius: 50px;
        }

        .div2 input {
            width: 400px;
            height: 40px;
            border: 1px solid white;
            border-radius: 50px;
        }

        .div3 input {
            width: 400px;
            height: 40px;
            border: 1px solid white;
            border-radius: 50px;
        }

        .div4 input{
            width: 400px;
            height: 40px;
            border: 1px solid white;
            border-radius: 50px;
        }

        button {
            width: 400px;
            height: 40px;
            border-radius: 20px;
        }

        .container img {
            width: 100px;
            height: 100px;
            display: flex;
            margin: 10px auto;
        }

        .div5 p {
            text-align: center;
        }
</style>

<body>
        <div class="container">
            @include('komponen/pesan')
            @yield('konten')
            <h1 class="text-center"><b>REGISTER</b></h1>
                <form action="/sesi/create" method="POST">
                    @csrf
                    <div class="div1">
                        <br><br>
                        <label for="name" class="form-label">Name</label>
                        <input type="text" value="{{Session::get('name')}}" name="name" class="form-control">
                    </div>
                    <div class="div2">
                        <br><br>
                        <label for="email" class="form-label">Email</label>
                        <input type="email" value="{{Session::get('email')}}" name="email" class="form-control">
                    </div>
                    <div class="div3">
                        <br><br>
                        <label for="password" class="form-label">Password</label>
                        <input type="password" name="password" class="form-control">
                    </div>
                    <div class="div4">
                        <br><br>
                        <label for="password-confirm">Konfirmasi Password</label>
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                    </div>
                    <br>
                    <div class="div5">
                        <button name="submit" type="submit" class="btn btn-primary">Register</button>
                        <P class="text-center">Login di sini <a href="/sesi"><b>LOGIN</b></a></P>
                    </div>
                </form>
        </div>
</body>     