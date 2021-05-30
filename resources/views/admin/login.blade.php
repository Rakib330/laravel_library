<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Login</title>
        <style>
            *{
                padding: 0;
                margin: 0;
                list-style-type: none;
                text-decoration: none;
                box-sizing: border-box;
            }
            body{
                display: flex;
                justify-content: center;
                align-items: center;
                background: #e8e8e8;
                height: 100vh;
                width: 100vw;
            }
            .login-card{
                width:30%;
                box-shadow: 2px 2px 2px #999,5px 5px 15px #999, 1px 1px 50px #999;
                background: #F5F5F5;
                border-radius: 15px;
                display: flex;
                flex-direction: column;
                align-items: center;
                padding-bottom: 20px;
            }
            .login-card h1{
                padding: 20px;
                color:#006633;
                font-family: sans-serif;
            }
            .login-card p{
                padding: 5px;
                color:#CC3333;
                font-family: sans-serif;
            }
            .inputs{
                margin: 10px;
            }
            .inputs input{
                width: 100%;
                height: 50px;
                background: #fff;
                font-size: 30px;
                color:#006633;
                border: none;
                border-radius: 15px;
            }
            .inputs input[type=submit]:hover{
                background: #006633;
                color:#fff;
                cursor: pointer;
                
            } 
            @media only screen and (max-width:800px){
                .login-card h1{
                    font-size: 20px;
                }
                .login-card{
                    width:80%;
                }
            }
        </style>
    </head>
    <body>
        <div class="login-card">
            <h1>Admin Login</h1>
            <p><?php echo session()->get('loginmsg');
session()->put('loginmsg', ''); ?></p>
            <form method="POST" action="{{URL::to('login-admin')}}">
                @csrf
                <div class="inputs"><input type="email" name="adminemail" placeholder="Email"></div> 
                <div class="inputs"><input type="password" name="adminpass" placeholder="Password"></div> 
                <div class="inputs"><input type="submit" value="Login"></div> 
            </form>
        </div>
    </body>
</html>