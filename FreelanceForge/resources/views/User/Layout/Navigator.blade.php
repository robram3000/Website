@include('User.Layout.Head')
<nav class="navigation">
    <div class="navigation-logo">
        <h4>FreelanceForge</h4>
    </div>
    <div class="navigation-control-page"> 
        <ul>
            <li><a href="{{ url('/') }}">Home</a></li>
            <li><a href="">Job offer</a></li>
            <li><a href="">Contact us</a></li>
            <li><a href="{{ url('/login')}}">Login</a></li>
        </ul> 
    </div>
</nav>
