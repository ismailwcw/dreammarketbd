<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>403 | Access Denied</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <style>
        :root{
            --primary:#4070f4;
            --bg:#f0faff;
            --dark:#333;
            --white:#fff;
        }

        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
            font-family:"Poppins", sans-serif;
        }

        body{
            min-height:100vh;
            display:flex;
            align-items:center;
            justify-content:center;
            background:var(--bg);
        }

        .error-card{
            background:var(--white);
            padding:50px 40px;
            border-radius:16px;
            max-width:420px;
            width:90%;
            text-align:center;
            box-shadow:0 10px 25px rgba(0,0,0,0.1);
        }

        .error-code{
            font-size:96px;
            font-weight:700;
            color:var(--primary);
        }

        .error-title{
            font-size:22px;
            margin:10px 0;
            color:var(--dark);
        }

        .error-text{
            font-size:15px;
            color:#666;
            margin-bottom:30px;
            line-height:1.6;
        }

        .btn{
            display:inline-block;
            padding:12px 28px;
            background:var(--primary);
            color:#fff;
            text-decoration:none;
            border-radius:8px;
            font-weight:500;
            transition:0.3s;
        }

        .btn:hover{
            opacity:0.9;
            transform:translateY(-1px);
        }
    </style>
</head>
<body>

    <div class="error-card">
        <div class="error-code">403</div>
        <div class="error-title">Access Denied</div>
        <p class="error-text">
            You don’t have permission to access this page.<br>
            Please login with an authorized account.
        </p>

        <a href="/login" class="btn">Go to Login</a>
    </div>

</body>
</html>
