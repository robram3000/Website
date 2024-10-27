<!DOCTYPE html>
<html lang="en">
<body>
    @include('User.Layout.Navigator')
    

    <div class="First-content">
        <img src="{{ URL('images/LandingPage-bg.png') }}" alt="">
        <section class="Content-body">
            <div class="Content-First-section">
                <div>
                    <h1>{{ $mainTitle }}</h1>
                </div>
                <div>
                    <h5>{{ $mainSubtitle }}</h5>
                </div>
                <div>
                    <a class="Getstarted" href="">Get Started</a>
                    <a class="Joinnow" href="">Join now</a>
                </div>
            </div>
        </section>
    </div>
    

    @foreach($contentSections as $section)
        <div class="Content-Third-section">
            <div class="Container-sec">   
                <div class="header">
                    <h1>{{ $section['header'] }}</h1>
                </div>
                <div class="paragraph">
                    <p>{{ $section['paragraph'] }}</p>
                </div>
            </div>
        </div>
    @endforeach

    <br><br>

    <section class="Othersub-Section">
        <div class="container-other-sec">
            <div class="header">
                <h1>{{ $finalCallTitle }}</h1>
            </div>
            <div class="paragraph">
                <p>{{ $finalCallParagraph }}</p> 
            </div>
            <div class="Button-container">
                <div class="button-second"> 
                    <a href="">Join now</a>
                    <h3>{{ $freeToStart }}</h3>
                </div>
            </div>
        </div>
    </section>
    
    @include('User.Layout.Footer')
</body>
</html>
