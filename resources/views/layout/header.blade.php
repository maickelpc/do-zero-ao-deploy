<!-- header-start -->
<header>
    <div class="header-area ">
        <div id="sticky-header" class="main-header-area">
            <div class="container-fluid">
                <div class="header_bottom_border">
                    <div class="row align-items-center">
                        <div class="col-xl-2 col-lg-2">
                            <div class="logo">
                                <a href="index.html">
                                    <img src="/travelo/img/logo.png" alt="">
                                </a>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-4">
                            <div class="main-menu  d-none d-lg-block">
                                <nav>
                                    <ul id="navigation">
                                        <li><a class="active" href="index.html">home</a></li>
                                        <li><a href="about.html">About</a></li>
                                        <li><a class="" href="travel_destination.html">Destination</a></l/li>
                                        {{-- <li><a href="#">pages <i class="ti-angle-down"></i></a>
                                            <ul class="submenu">
                                                    <li><a href="destination_details.html">Destinations details</a></li>
                                                    <li><a href="elements.html">elements</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="#">blog <i class="ti-angle-down"></i></a>
                                            <ul class="submenu">
                                                <li><a href="blog.html">blog</a></li>
                                                <li><a href="single-blog.html">single-blog</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="contact.html">Contact</a></li> --}}
                                    </ul>
                                </nav>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 d-none d-lg-block">
                            <div class="main-menu  d-none d-lg-block">
                                <nav>
                                    <ul id="navigatio" class="text-right" >
                                        @guest
                                            <li><a style="text-transform: none !important" class="active" href="{{ route('registrar') }}">Registrar-se</a></li>
                                            <li><a class="active" href="{{ route('login') }}">Login</a></li>
                                        @else
                                        
                                        @if(Auth::user()->data_confirmacao == null)

                                        @if(session('success'))
                                            <li>
                                                {!! session('success') !!}
                                            </li>                                            
                                        @endif
                                            <li>
                                                <a style="cursor: pointer" class="active" data-toggle="modal" data-target="#modal_confirmar_email" >Email não foi confirmado, Clique para Confirmar</a>
                                            </li>                                            
                                        @endif

                                        <li><a href="#"> {{ Auth::user()->nome }} <i class="ti-angle-down"></i></a>
                                            <ul class="submenu">
                                                <li>
                                                    <a href="{{ route('logout') }}" >Sair</a>
                                                </li>
                                            </ul>
                                        </li>

                                        @endguest
                                        
                                        
                                    </ul>
                                </nav>
                            </div>
                            {{-- <div class="social_wrap d-flex align-items-center justify-content-end">
                                <div class="number">
                                    <p> <i class="fa fa-phone"></i> 10(256)-928 256</p>
                                </div>
                                {{-- <div class="social_links d-none d-xl-block">
                                    <ul>
                                        <li><a href="#"> <i class="fa fa-instagram"></i> </a></li>
                                        <li><a href="#"> <i class="fa fa-linkedin"></i> </a></li>
                                        <li><a href="#"> <i class="fa fa-facebook"></i> </a></li>
                                        <li><a href="#"> <i class="fa fa-google-plus"></i> </a></li>
                                    </ul>
                                </div> --}}
                            </div> 
                        </div>
                        {{-- <div class="seach_icon">
                            <a data-toggle="modal" data-target="#modal_confirmar_emailCenter" href="#">
                                <i class="fa fa-search"></i>
                            </a>
                        </div> --}}
                        <div class="col-12">
                            <div class="mobile_menu d-block d-lg-none"></div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</header>
<!-- header-end -->

<!-- Modal confirmação -->
<div class="modal fade" id="modal_confirmar_email" tabindex="-1" role="dialog" aria-labelledby="modal_confirmar_emailLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
    <form method="POST" action="{{ route('confirmar-email-post') }}" class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="modal_confirmar_emailLabel">Confirmar endereço de email</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <div class="modal-body">


           
                @csrf

                <div class="form-group row">
                    <label for="codigo" class="col-md-4 col-form-label text-md-right">Codigo de Confirmação:</label>
                    <div class="col-md-6">
                        <input id="codigo" type="text" class="form-control " name="codigo" required autofocus>

                        {{-- @error('codigo')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror --}}
                    </div>
                    </div>
     
        </div>
        <div class="modal-footer">
        <a href="{{route('reenviar-email-confirmacao')}}" class="btn btn-secondary">Reenviar Email</a>
        <button type="submit" class="btn btn-primary">Informar Código</button>
        </div>
    </form>
    </div>
</div>