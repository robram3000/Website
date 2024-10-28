@include('User.Layout.Navigator')
<main class="login-container">
    <form action="" method="POST" class="login-form">
        <div class="login-form-logo">
            <img src="" alt="Logo">
        </div>
        <div class="login-form-inputs">
            <div class="login-form-input-group">
                <label for="email">Email</label>
                <input 
                    type="email" 
                    id="email"
                    placeholder="Email"
                    name="Email"
                    required>
            </div>
            <div class="login-form-input-group">
                <label for="password">Password</label>
                <input 
                    type="password" 
                    id="password"
                    placeholder="Password"
                    name="Password"
                    required>
            </div>
            <div class="login-form-actions">
                <button type="submit" class="login-button">Login</button>
                <p class="signup-prompt">Don’t have an account? <a href="{{url('/Role')}}">Sign up</a></p>
            </div>
        </div>
    </form>
</main>
