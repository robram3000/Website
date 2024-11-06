@include('User.Layout.Navigator')

<main>
    <form method="POST" action="/PasswordData{{ $randomnumber }}" class="registration-form">
        @csrf

        <div>
            <label for="">Email</label>
            <input 
                type="text"
                placeholder="Email"
                required
                name="Email"   
                >
        </div>
        <div>
            <label for="password">Password</label>
            <input 
                type="password"
                placeholder="Password"
                required
                name="Password"
            >
        </div>  
        <div>
            <label for="confirm_password">Confirm Password</label>
            <input 
                type="password"
                placeholder="Confirm Password"
                required
                name="ConfirmPassword"
            >
        </div>
        <button type="submit">
            Submit
        </button>
    </form>
</main>

@include('User.Layout.Footer')