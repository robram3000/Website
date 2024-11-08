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
                <p>Enter the OTP sent to your registered email to reset your password.</p>
            </div>
        </div>
        <form action="{{ route('OneTime.Password', ['randomnumber' => $randomNumber]) }}" method="post">
            @csrf
            <div>
                <input 
                type="text"
                name ="Firstno"
                 maxlength="1"
                >
                <input 
                type="text"
                name ="Secondno"
                 maxlength="1"
                >
                <input 
                type="text"
                name ="Thirdno"
                 maxlength="1"
                >
                <input 
                type="text"
                name ="Fourthno"
                 maxlength="1"
                >
                <input type="text"
                type="text"
                name = "Fifthno"
                maxlength="1"
                   
                >
            </div>
            <div>
                <button type="submit">Submit</button>
            </div>
        </form>
    </div>
</main>

@include('User.Layout.Footer')