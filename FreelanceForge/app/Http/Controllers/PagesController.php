<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController
{
    /*
        generateRandomString
        - Generates a random string of a specified length. 
        - The string includes numbers, lowercase and uppercase letters, and special characters.
        
        Parameters:
        - $length (default: 70): The length of the random string to generate.

        Returns:
        - A randomly generated string.
    */
    public function generateRandomString($length = 70)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ!@#$%^&*()_+-=[]{}|;:,.<>?';
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[random_int(0, strlen($characters) - 1)];
        }
        return $randomString;
    }

    /*
        Base
        - Returns the view for the homepage or main landing page of the FreelanceForge platform.
        - Defines the title, content sections, final call to action, and other elements for the base page.

        Returns:
        - A view containing the homepage content, such as "Why Choose FreelanceForge", "Build Your Brand", etc.
    */
    public function Base() {
        $title = "Freelance Forge";   
        $contentSections = [
            [
                'header' => 'Welcome to FreelanceForge!',
                'paragraph' => 'At FreelanceForge, we provide the platform and tools you need to shape your freelance career. Whether you\'re just starting out or looking to grow your client base, our platform connects you with projects that match your skills and passions. It\'s time to take control of your career, build your portfolio, and network with like-minded professionals.'
            ],
            [
                'header' => 'Why Choose FreelanceForge',
                'paragraph' => 'Tailored Opportunities: No more searching through irrelevant job posts. FreelanceForge matches you with projects suited to your skills and expertise.'
            ],
            [
                'header' => 'Build Your Brand',
                'paragraph' => 'Showcase your portfolio and personal brand in a professional way. Let potential clients see what you’re capable of and how you can bring their projects to life.'
            ],
            [
                'header' => 'Collaborative Community',
                'paragraph' => 'Join a network of fellow freelancers. Learn, share, and grow with others in a supportive environment where collaboration leads to new opportunities.'
            ],
            [
                'header' => 'Payments',
                'paragraph' => 'Get paid on time, every time. FreelanceForge ensures secure transactions so you can focus on delivering your best work.'
            ],
        ];
        $finalCallTitle = 'Ready to Forge Your Future?';
        $finalCallParagraph = 'Start building your freelance career today. Whether you\'re a seasoned freelancer or just starting out, FreelanceForge is the platform that helps you succeed.';
        $freeToStart = 'It’s free to get started!';
        $mainTitle = 'Forge Your Freelance Career with Us';
        $mainSubtitle = 'Join a dynamic community of freelancers where your skills meet opportunities, and your talent turns into success.';
        return view('User.Base', compact('title', 'contentSections', 'finalCallTitle', 'finalCallParagraph', 'freeToStart' , 'mainTitle','mainSubtitle'));
    }

    /*
        loginForm
        - Returns the view for the login form page.
        - Generates a random string (used for security or session purposes) and passes it to the view.
        
        Returns:
        - A view for the login page with the generated random string.
    */
    public function loginForm()
    {
        $randomnumber = $this->generateRandomString();
        $title = "Freelance Forge - Login";
        return view('User.LoginForm', compact('title', "randomnumber"));
    }

    /*
        role
        - Returns the view for selecting a user role (Client or Freelancer).
        - Passes the available roles and a random number to the view.
        
        Parameters:
        - $randomnumber: A randomly generated string for security purposes.

        Returns:
        - A view for selecting a user role.
    */
    public function role($randomnumber)
    {
        $title = "Choose Your Role";
        $roles = ['Client', 'Freelancer'];
        return view('User.CreateAccount.RoleType', compact('title', 'roles', 'randomnumber'));
    }

    /*
        registerForm
        - Returns the view for the user registration form.
        - Passes a random number (for security or session validation) to the view.
        
        Parameters:
        - $randomnumber: A randomly generated string for security purposes.

        Returns:
        - A view for the user registration form.
    */
    public function registerForm($randomnumber)
    {
        $title = "Freelance Forge - Register Account";
        return view('User.CreateAccount.RegisterForm', compact('title', 'randomnumber'));
    }

    /*
        PasswordForm
        - Returns the view for creating a password during the registration process.
        - Passes a random number to the view.
        
        Parameters:
        - $randomnumber: A randomly generated string for security purposes.

        Returns:
        - A view for creating a password.
    */
    public function PasswordForm($randomnumber)
    {
        $title = "Freelance Forge - Create a Password";
        return view('User.CreateAccount.Password' , compact('title', "randomnumber")); 
    }

    /*
        getInTouch
        - Returns the view for the "Get In Touch" page, where users can contact support or ask questions.
        
        Returns:
        - A view for the "Get In Touch" page.
    */
    public function getInTouch() {
        $title = "Get In Touch";
        return view('User.GetInTouch', compact('title'));
    }

    /*
        SendEmail
        - Returns the view for sending an email during the password reset process.
        - Generates a random string for security or session purposes.
        
        Returns:
        - A view for sending an email with the generated random number.
    */
    public function SendEmail() {
        $randomnumber = $this->generateRandomString();
        $title = "Freelance Forge - Send Email";
        return view('User.Forgotpassword.SendingEmail', compact('title', 'randomnumber'));
    }

    /*
        OtpVerification
        - Returns the view for OTP verification during the password reset process.
        - Passes the randomly generated number to the view for session or validation purposes.
        
        Parameters:
        - $randomNumber: A randomly generated string used for session validation or security.

        Returns:
        - A view for OTP verification.
    */
    public function OtpVerification($randomNumber) {
        $title = "Freelance Forge - Enter Otp";
        return view('User.Forgotpassword.OnlytimePassword', compact('title', 'randomNumber'));
    }

    /**
     * 
     * 
     * 
     * 
     * 
     * 
     */
    public function ChangePassword($randomNumber)
    {
        $title = "Freelance Forge - Enter new password";
        return view('User.Forgotpassword.ChangePassword', compact('title', 'randomNumber'));
    }
}
