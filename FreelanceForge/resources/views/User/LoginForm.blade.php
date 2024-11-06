@include('User.Layout.Navigator')

<main class="login-container">
    <div class="login-image-box">
        <div class="image-content">
            <img src="{{ URL('images/Bg-Login.png') }}" alt="Overlay Image">
        </div>
    </div>
   
    <form action="" method="POST" class="login-form">
        <div class="login-form-logo">
            {{-- <img src="{{ URL('images/FreelanceFrogeicons.png') }}" alt="Logo"> --}}
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
                <hr class="divider">
                <p class="forgot-password"><a href="{{ url('/Sending-Email/' . $randomnumber) }}">Forgot Password?</a></p>
                <p class="signup-prompt">Don’t have an account? <a href="{{ url('/Role/' . $randomnumber) }}">Sign up</a></p>


            </div>
        </div>
    </form>
</main>


@include('User.Layout.Footer')
