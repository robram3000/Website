<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register Account</title>
    <link rel="icon" href="">
    @vite(['resources/scss/RegisterForm.scss'])
</head>
<body>
    <div class="overlay"></div> <!-- Overlay image container -->
    <main>    
        <form action="" method="POST" class="Form-container">
            <h2>Register Account</h2>
            <h4>Details /</h4>
            <div class="Container-content-inline">
                <div class="Container-labelandtextbox-inline">
                    <label for="">Firstname</label>
                    <input type="text" name="Firstname" placeholder="Firstname" required>
                </div>
                <div class="Container-labelandtextbox-inline">
                    <label for="">Lastname</label>
                    <input type="text" name="Lastname" placeholder="Lastname" required>
                </div>
            </div>

            <div class="Container-content-inline">
                <div class="Container-labelandtextbox-inline">
                    <label for="">Age</label>
                    <input type="text" name="Age" placeholder="Age" required>
                </div>
                <div class="Container-labelandtextbox-inline">
                    <label for="">Birthday</label>
                    <input type="date" name="Birthday" required>
                </div>
            </div>

            <div class="Container-content">
                <div class="Container-labelandtextbox">
                    <label for="">Address</label>
                    <input type="text" name="Address" placeholder="Address" required>
                </div>
                <div class="Container-labelandtextbox">
                    <label for="">Phonenumber</label>
                    <input type="text" name="Phonenumber" placeholder="Phonenumber">
                </div>
            </div>

            <div class="Container-Button">
                <button type="submit">Next</button>
            </div>
        </form>         
    </main>
</body>
</html>
