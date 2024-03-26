<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">    <style>
        /* CSS untuk header umum */
        /* CSS untuk header umum */
header {
    background-color: #007bff; /* Warna biru Bootstrap */
    color: #fff;
    padding: 20px 0;
    text-align: center;
    font-size: 36px;
    font-family: 'Poppins', sans-serif;
    text-transform: uppercase;
}

/* CSS untuk footer umum */
footer {
    background-color: #007bff; /* Warna biru Bootstrap */
    color: #fff;
    padding: 10px 0;
    text-align: center;
    position: fixed;
    bottom: 0;
    width: 100%;
    font-family: 'Poppins', sans-serif;
}

.container{
    text-align: center;
    font-size: 25px;
    font-family: 'Poppins', sans-serif;
}
/* CSS untuk tombol */
.btn {
    background-color: #007bff; /* Warna biru Bootstrap */
    color: #fff;
    padding: 15px 30px;
    border: none;
    border-radius: 5px;
    text-decoration: none;
    display: inline-block;
    margin-top: 20px;
    cursor: pointer;
    font-family: 'Montserrat', sans-serif;
    text-transform: uppercase;
    letter-spacing: 1px;
    transition: background-color 0.3s;
}

.btn:hover {
    background-color: #0056b3; /* Warna biru tua saat hover */
}

    </style>
</head>
<body>
    <header>
        Welcome to Our Amazing Application
    </header>

    <div class="container">
        <p>Application for managing users, contacts, and addresses.</p>
        <a href="{{ route('register') }}" class="btn">Join Now</a>
        <a href="{{ route('login') }}" class="btn">Login Here</a>
    </div>

    <footer>
        &copy; 2024 Our Amazing Application. All rights reserved.
    </footer>
</body>
</html>
