    <?php

    use Illuminate\Support\Facades\Route;
    use App\Http\Controllers\PagesController;
    use App\Http\Controllers\PostsController;



    Route::get('/', [PagesController::class, 'Base'])->name('home');

    // Role
    Route::get('/Role/{randomnumber}', [PagesController::class, 'role'])->name('role');

    // Register
    Route::get('/register/{randomnumber}', [PagesController::class, 'registerForm'])->name('register.form');




    Route::post('/Roletypedata/{randomnumber}', [PostsController::class, 'RoletypeData'])->name('Roletype.Data');



    Route::post('/RegisterData/{randomnumber}', [PostsController::class, 'registerStoreData'])->name('registerStore.Data');

    Route::get('/Password/{randomnumber}', [PagesController::class, 'PasswordForm'])->name('Password.Form');

    Route::post('/PasswordData', [PostsController::class, 'PasswordStoreData_EmailStoreData'])->name('PasswordStore.Data');


    Route::get('/login', [PagesController::class, 'loginForm'])->name('login');

    // Footer
    Route::get('/GetInTouch', [PagesController::class, 'getInTouch'])->name('GetInTouch');
    Route::get('/AboutUs', [PagesController::class, 'Aboutus'])->name('AboutUs');
    Route::get('/TermsAndCondition', [PagesController::class, 'Termsandcondition'])->name('termandcondition');
    Route::get('/ContactUs', [PagesController::class, 'ContactUs'])->name('ContactUs');
    Route::get('/FAQS', [PagesController::class, 'FAQS'])->name('FAQS');





    //forgot routing
 // These are the correct route definitions
Route::get('/Sending-Email/{randomnumber}', [PagesController::class, 'SendEmail'])->name('Send.Email');
Route::post('/Email-Data', [PostsController::class, 'EmailSendingOtp'])->name('Emailsending.Otp');
Route::get('/Otp-Verfication', [PostsController::class, 'OtpVerification'])->name('Otp.Verification');


    Route::get('/TermsAndCondition', [PagesController::class, 'Termsandcondition'])->name('termandcondition');
   