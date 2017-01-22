@extends('layouts.frontend')

@section('content')
    <nav>
        <div class="nav-wrapper">
            <a href="{{url('')}}" class="brand-logo">AgeBuild</a>

            <a href="#" data-activates="mobile-menu" class="button-collapse"><i class="material-icons">menu</i></a>

            <ul id="nav-mobile" class="right hide-on-med-and-down">
                @foreach($menu as $item)
                    <li><a href="{{$item->link}}">{{$item->name}}</a></li>
                @endforeach
            </ul>

            <ul class="side-nav" id="mobile-menu">
                @foreach($menu as $item)
                    <li><a href="{{$item->link}}">{{$item->name}}</a></li>
                @endforeach
            </ul>
        </div>
    </nav>

    <div class="section no-pad-bot">
        <div class="container">
            <br>
            <br>
            <h1 class="header center red-text">Age Build</h1>
            <div class="row center">
                <h5 class="header col s12 light">A Warhammer Age of Sigmar army builder</h5>
            </div>
            <div class="row center">
                <a href="{{ url('/admin') }}" class="btn-large waves-effect waves-light ">Get Started</a>
            </div>
            <br>
            <br>
        </div>
    </div>

    <div class="container">
        <div class="section" id="about">
            <h5>About</h5>
        </div>

        <div class="section" id="features">
            <h5>Features</h5>
        </div>

        <div class="section" id="contact">
            <h5>Get in touch
                <small>leave your suggestions</small>
            </h5>
            <div class="row">
                <form class="col s12">
                    <div class="row">
                        <div class="input-field col s6">
                            <input id="name" name="name" type="text" class="validate">
                            <label for="name">Name</label>
                        </div>
                        <div class="input-field col s6">
                            <input id="email" name="email" type="text" class="validate">
                            <label for="email">Email</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <textarea id="message" name="message" class="materialize-textarea"></textarea>
                            <label for="message">Message</label>
                        </div>
                    </div>
                    <div class="row center">
                        <a href="{{ url('/admin') }}" class="btn-large waves-effect waves-light ">Submit</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(".button-collapse").sideNav();
        //        $('.carousel.carousel-slider').carousel({full_width: true});
    </script>
@endsection