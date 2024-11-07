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
                <p>Enter your email address and we will send you the recovery link?</p>
            </div>
        </div>
        <form action="{{ route('Emailsending.Otp', ['randomnumber' => $randomnumber]) }}" method="POST">
            @csrf <!-- This adds the CSRF token -->
            <div>
                <input 
                    type="text"
                    placeholder="Enter your email"
                    name="Email"
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
