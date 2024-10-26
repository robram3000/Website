<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=\, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    @vite(['resources/scss/Loginform.scss'])
</head>
<body>
    <main>
        <form action="" method="POST">
                <div class="container-Loginform-labelandtextbox">
                        <img src="" alt="">
                </div>
                <div class="container-Loginform">
                    <div class="container-Loginform-labelandtextbox" >
                        <label for="">Email</label>
                        <input 
                                type="text" 
                                placeholder="Email"
                                name="Email"
                                required>
                    </div>
                    <div class="container-Loginform-labelandtextbox">
                        <label for="">Password</label>
                        <input 
                                type="text" 
                                placeholder="Password"
                                name="Password"
                                required>
                    </div>
                    <div class="container-Loginform-button">
                            <button type="submit">Login</button>      
                            <p>Don’t have an account? <a href="">Sign up</a></p>        
                    </div>
                </div>
        </form>
    </main>
</body>
</html>