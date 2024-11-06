@include('User.Layout.Navigator')

<main>
    <form method="POST" action="{{ route('PasswordStore.Data', ['randomnumber' => $randomnumber]) }}" class="registration-form">
        @csrf

        <div>
            <label for="email">Email</label>
            <input 
                type="text"
                placeholder="Email"
                required
                name="email"
                class="{{ $errors->has('email') ? 'input-error' : '' }}"
                value="{{ old('email') }}"
            >
            @if($errors->has('email'))
                <span class="error-message">{{ $errors->first('email') }}</span>
            @endif
        </div>

        <div>
            <label for="password">Password</label>
            <input 
                type="password"
                placeholder="Password"
                required
                name="Password"
                class="{{ $errors->has('Password') ? 'input-error' : '' }}"
            >
            @if($errors->has('Password'))
                <span class="error-message">{{ $errors->first('Password') }}</span>
            @endif
        </div>  

        <div>
            <label for="confirm_password">Confirm Password</label>
            <input 
                type="password"
                placeholder="Confirm Password"
                required
                name="ConfirmPassword"
                class="{{ $errors->has('ConfirmPassword') ? 'input-error' : '' }}"
            >
            @if($errors->has('ConfirmPassword'))
                <span class="error-message">{{ $errors->first('ConfirmPassword') }}</span>
            @endif
        </div>

        <button type="submit">Submit</button>
    </form>
</main>

@include('User.Layout.Footer')
