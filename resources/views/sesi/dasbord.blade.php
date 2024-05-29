<style>
    body {
            background-image: url('tegal.jpg');
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
            color: blue;
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

        .div3 {
            text-align: center;
        }

        button {
            width: 400px;
            height: 40px;
            border-radius: 20px;
        }

        img {
            width: 100px;
            height: 100px;
            display: flex;
            margin: 10px auto;
        }

    
</style>
<body>
        <div class="container">
            @include('komponen/pesan')
            @yield('konten')
            <h1 class="text-center"><b>LOGIN</b></h1>
            <img src="logo_stmik.webp" alt="">
                <form action="/sesi/login" method="POST">
                    @csrf
                    <div class="div1">
                        <label for="email" class="form-label">Email</label>
                        <br><br>
                        <input type="email" value="{{Session::get('email')}}" name="email" class="form-control">
                    </div>
                    <div class="div2">
                        <br><br>
                        <label for="password" class="form-label">Password</label>
                        <br><br>
                        <input type="password" name="password" class="form-control">
                    </div>
                    <div class="div3">
                        <br><br>
                        <button name="submit" type="submit" class="btn btn-primary">Login</button>
                        <P class="text-center">Register di sini di sini <a href="/sesi/register"><b>REGISTER</b></a></P>
                    </div>
                </form>
        </div>
    </body>
