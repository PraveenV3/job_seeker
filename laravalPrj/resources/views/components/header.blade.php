
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <style>
        /* public/css/app.css */
body {
    margin: 0;
    font-family: Arial, sans-serif;
}

.header {
    background-color: #333;
    color: #fff;
    padding: 10px 0;
}

.header .container {
    display: flex;
    justify-content: space-between;
    align-items: center;
    max-width: 1200px;
    
    margin: 0 auto;
    padding: 0 20px;
}

.header .logo a {
    color: #fff;
    font-size: 24px;
    text-decoration: none;
}

.header .nav ul {
    list-style: none;
    margin: 0;
    padding: 0;
    display: flex;
}

.header .nav ul li {
    margin-left: 20px;
}

.header .nav ul li a {
    color: #fff;
    text-decoration: none;
    padding: 10px;
}

.header .nav ul li a:hover {
    background-color: #575757;
    border-radius: 5px;
}

.header form {
    display: inline;
}

.header button {
    background: none;
    border: none;
    color: #fff;
    cursor: pointer;
}

.header button:hover {
    background-color: #575757;
    border-radius: 5px;
}

    </style>
</head>
<body>
    <header class="header">
        <div class="container">
            <div class="logo">
                <a href="{{ url('/') }}">CarSale</a>
            </div>
            <nav class="nav">
                <ul>
                    <li><a href="{{ url('/') }}">Home</a></li>
                    <li><a href="{{ url('/cars') }}">Cars</a></li>
                    <li><a href="{{ url('/about') }}">About</a></li>
                    <li><a href="{{ url('/contact') }}">Contact</a></li>
                    @auth
                        <li><a href="{{ url('/dashboard') }}">Dashboard</a></li>
                        <li>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit">Logout</button>
                            </form>
                        </li>
                    @else
                        <li><a href="{{ route('login') }}">Login</a></li>
                        <li><a href="{{ route('register') }}">Register</a></li>
                    @endauth
                </ul>
            </nav>
        </div>
    </header>

</body>
</html>
