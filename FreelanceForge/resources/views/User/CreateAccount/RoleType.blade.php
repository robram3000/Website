@include('User.Layout.Navigator')

<main class="registration-container">
    <header class="registration-header">
        <h2>Join as a Client or Freelancer</h2>
    </header>
    <form method="PT" action="" class="registration-form">
        <div class="user-option client-option" onclick="selectOption('Client')">
            <input type="radio" name="userType" value="Client" id="clientOption" />
            <label for="clientOption">
                <h4>I’m a client, hiring for a project</h4>
            </label>
        </div>

        <div class="user-option freelancer-option" onclick="selectOption('Freelancer')">
            <input type="radio" name="userType" value="Freelancer" id="freelancerOption" />
            <label for="freelancerOption">
                <h4>I’m a freelancer, looking for work</h4>
            </label>
        </div>

        <button id="createAccountBtn" class="create-account-button" disabled>Create Account</button>
    </form>
    <br><br>

    <div class="login-link">
        <p>Already have an account? <a href="/login">Log in</a></p>
    </div>
</main>

@include('User.Layout.Footer')

