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
                <p>Enter your email address and we will send you the recovery link.</p>
            </div>
        </div>

        <!-- Display success or error message -->
        @if (session('status'))
            <div style="color: green; font-size: 14px;">
                {{ session('status') }}
            </div>
        @endif

        @if (session('error'))
            <div style="color: red; font-size: 14px;">
                {{ session('error') }}
            </div>
        @endif
       
        <form action=" {{ route('Emailsending.Otp', ['randomnumber' => $randomnumber]) }}" method="POST">
            @csrf <!-- CSRF Token -->

            <div>
                <input 
                    type="text"
                    placeholder="Enter your email"
                    name="email"
                    required
                    value="{{ old('email') }}" 
                >

                <!-- Display error message if the email field has errors -->
                @error('email')
                    <div style="color: red; font-size: 14px;">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div>
                <button type="submit">Submit</button>
            </div>
        </form>

    </div>
</main>
@include('User.Layout.Footer')
