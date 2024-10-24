<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    {{-- title and icons  --}}
    <title>Register Account</title>
    <link rel="icons" href="">


    {{-- Control flow for identify the  --}}

</head>
<body>
      <main>
        <form action="" method="POST" class="Form-container">
            {{-- pangalan ng user na mag reregister --}}
            <div class="Container-content">
                <div class="Container-labelandtextbox">
                    <label for="">Firstname</label>
                    <input 
                            type="text" 
                            name="Firstname"
                            placeholder="Firstname" 
                            required>
                </div>
                <div class="Container-labelandtextbox">
                    <label for="">Middlename</label>
                    <input 
                            type="text" 
                            name="Middlename" 
                            placeholder="Middlename" 
                            required>
                </div>
                <div class="Container-labelandtextbox">
                    <label for="">Lastname</label>
                    <input 
                            type="text" 
                            name = "Lastname" 
                            placeholder="Lastname" 
                            required>
                </div>
                <div class="Container-labelandtextbox">
                    <label for="">Suffix</label>
                    <input 
                            type="text" 
                            name = "Suffix" 
                            placeholder="Suffix eg(Sr, Jr)" >
                </div class="Container-labelandtextbox">
            </div>
             {{-- Sensor Data that secure in database --}}    
            <div>
           
                <div class="Container-labelandtextbox">
                    <label for="">Age</label>
                    <input 
                            type="text" 
                            name = "Age"
                            placeholder="Age" 
                            required>
                </div >
                <div class="Container-labelandtextbox">
                    <label for="">Birthday</label>
                    <input 
                            type="date"
                            name ="date" 
                            required>
                </div>
                <div class="Container-labelandtextbox">
                    <label for="">Address</label>
                    <input 
                            type="text" 
                            name = "Address"
                            placeholder="Address" 
                            required>
                </div>
                <div class="Container-labelandtextbox">
                    <label for="">Phonenumber</label>
                    <input 
                            type="text" 
                            name="Phonenumber"
                            placeholder="Suffix eg(Sr, Jr)">
                </div>
            </div>
            <div class="Container-Button">
                <Button type= "Submit">Submit</Button>
            </div>
        </form>         
      </main>
    
</body>
</html>