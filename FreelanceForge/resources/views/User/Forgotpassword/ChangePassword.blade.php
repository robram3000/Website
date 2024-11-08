@include('User.Layout.Navigator')

<main>
    <div>
        <div>
            <div>
                <h1>
                    Forgot Your Password?
                </h1>
            </div>
            <div>
                <p>Create a new password to secure your account.</p>
            </div>
        </div>
        <form action="{{ route('ChangePassword.Verify', ['randomnumber' => $randomNumber]) }}" method="post">
        @csrf
            <div>
                <input 
                type="text"
                name ="Newpassword"
                placeholder="New Password"
                required
                >
                <input 
                type="text"
                placeholder="Confirm Password"
                name ="Confirmpassword"
                required
                >
            </div>
            <div>
                <button type="submit">Submit</button>
            </div>
        </form>
    </div>
</main>

@include('User.Layout.Footer')