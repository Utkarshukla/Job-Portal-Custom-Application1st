<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <title>{{ $tit }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    <style>
        .footer-dark {
            padding: 50px 0;
            color: #f0f9ff;
            background-color: #282d32;
        }

        .footer-dark h3 {
            margin-top: 0;
            margin-bottom: 12px;
            font-weight: bold;
            font-size: 16px;
        }

        .footer-dark ul {
            padding: 0;
            list-style: none;
            line-height: 1.6;
            font-size: 14px;
            margin-bottom: 0;
        }

        .footer-dark ul a {
            color: inherit;
            text-decoration: none;
            opacity: 0.6;
        }

        .footer-dark ul a:hover {
            opacity: 0.8;
        }

        @media (max-width:767px) {
            .footer-dark .item:not(.social) {
                text-align: center;
                padding-bottom: 20px;
            }
        }

        .footer-dark .item.text {
            margin-bottom: 36px;
        }

        @media (max-width:767px) {
            .footer-dark .item.text {
                margin-bottom: 0;
            }
        }

        .footer-dark .item.text p {
            opacity: 0.6;
            margin-bottom: 0;
        }

        .footer-dark .item.social {
            text-align: center;
        }

        @media (max-width:991px) {
            .footer-dark .item.social {
                text-align: center;
                margin-top: 20px;
            }
        }

        .footer-dark .item.social>a {
            font-size: 20px;
            width: 36px;
            height: 36px;
            line-height: 36px;
            display: inline-block;
            text-align: center;
            border-radius: 50%;
            box-shadow: 0 0 0 1px rgba(255, 255, 255, 0.4);
            margin: 0 8px;
            color: #fff;
            opacity: 0.75;
        }

        .footer-dark .item.social>a:hover {
            opacity: 0.9;
        }

        .footer-dark .copyright {
            text-align: center;
            padding-top: 24px;
            opacity: 0.3;
            font-size: 13px;
            margin-bottom: 0;
        }
    </style>

</head>

<body>

    <nav class="navbar navbar-expand-lg bg-body-tertiary bg-dark" data-bs-theme="dark">


        <div class="container-fluid">
            <a class="navbar-brand" href={{ asset('/') }}>CorpoRate_Adda</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>


            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                    {{-- <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href={{ asset('/') }}>Jobs</a>
                    </li> --}}

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            Sign-In
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href={{ asset('/login') }}>Login</a></li>
                            <li><a class="dropdown-item" href={{ asset('/signup') }}>Sign-up</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href={{asset('/signup-google')}}>Login with Google</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href={{ asset('/profile') }}><span>
                                @if (session('name'))
                                    {{ session('name') }}
                                @endif
                            </span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href={{ asset('/post') }}> <span>
                            @if (session('role')==1)
                                Add_Post
                            @endif
                        </span>
                        </a>
                    </li>
                    <li class="nav-item"><span>
                        @if (session('name'))
                        <a class="nav-link active" aria-current="page" href={{ asset('/logout') }}>Logout</a>
                        @endif
                        </span>
                    </li>
                </ul>
                <form class="d-flex" role="search" type="get" action="{{ url('/search') }}">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search"
                        name="search" value="{{ old('search') }}">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            </div>
        </div>
    </nav>
