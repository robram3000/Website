<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
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
    

    public function registerForm()
    {
        $title = "Freelance Forge - Register Account";
        return view('User.CreateAccount.RegisterForm', compact('title'));
    }

    public function loginForm()
    {
        $title = "Freelance Forge - Login";
        return view('User.LoginForm', compact('title'));
    }
    public function role()
    {
        $title = "Choose Your Role";
        return view('User.CreateAccount.RoleType', compact('title'));
    }
    public function getInTouch() {
        $title = "Get In Touch";
        return view('User.GetInTouch', compact('title'));
    }
}