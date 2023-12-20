<!-- task Laravel: Beginning -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Laravel_HW_1_and_2</title>
    <style>
        body{
            font-family: Arial, Helvetica, sans-serif;
            background-color: #f8f8f8;
        }
        .header {
            color: #333;
            padding: 10px;
            text-align: center; 
        }
        ul {
            list-style-type: none;
            
            display: flex; 
            flex-direction: row;
            justify-content: center;
        }

        .navbar a {
            color: #333; 
            text-decoration: none; 
            margin: 0 10px; 
        }

        .navbar a:hover {
            color: #f8b400; 
        }

        .main-content {
            padding: 30px; 
            padding-left: 100px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); 

        }
    
        .footer {
            color: #333; 
            padding: 10px; 
            text-align: center; 
        }
        form{
            margin: 20px;
        }
        .form-group{
            padding-bottom: 16px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        td {
            padding: 10px;
            text-align: center;
        }

        th {
            background-color: #b5b5b5;
            font-weight: bold;
            padding: 10px;
        }
</style>
</head>
<body>
    <header class="header">
        @include('partials.header')
    </header>

    <main class="main-content">
        @yield('content')
    </main>

    <footer  class="footer">
        @include('partials.footer')
    </footer>
</body>
</html>

