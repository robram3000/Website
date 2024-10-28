@include('User.Layout.Navigator')

    <main class="registration-main">    
        <form action="" method="POST" class="registration-form">
            <h2 class="form-title">Register Account</h2>
            <h4 class="form-subtitle">Details /</h4>
            
            <div class="inline-container">
                <div class="label-input-group">
                    <label for="firstname">Firstname</label>
                    <input type="text" name="Firstname" id="firstname" placeholder="Firstname" required>
                </div>
                <div class="label-input-group">
                    <label for="lastname">Lastname</label>
                    <input type="text" name="Lastname" id="lastname" placeholder="Lastname" required>
                </div>
            </div>

            <div class="inline-container">
                <div class="label-input-group">
                    <label for="age">Age</label>
                    <input type="text" name="Age" id="age" placeholder="Age" required>
                </div>
                <div class="label-input-group">
                    <label for="birthday">Birthday</label>
                    <input type="date" name="Birthday" id="birthday" required>
                </div>
            </div>

            <div class="full-width-container">
                <div class="label-input-group">
                    <label for="address">Address</label>
                    <input type="text" name="Address" id="address" placeholder="Address" required>
                </div>
                <div class="label-input-group">
                    <label for="phonenumber">Phonenumber</label>
                    <input type="text" name="Phonenumber" id="phonenumber" placeholder="Phonenumber">
                </div>
            </div>

            <div class="button-container">
                <button type="submit" class="submit-button">Next</button>
            </div>
        </form>         
    </main>

    @include('User.Layout.Footer')