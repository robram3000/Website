@include('User.Layout.Navigator')
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
                            <p>Don’t have an account? <a href="{{url('/Role')}}">Sign up</a></p>        
                    </div>
                </div>
        </form>
</main>
