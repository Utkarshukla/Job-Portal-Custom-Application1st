<x-components.header title="login" />


<form class="align-middle" method="POST" action="{{ url('/login') }} ">
    @if (Session::has('success'))
        <div class="alert alert-success">
            {{ Session::get('success') }}
        </div>
    @endif
    @if (Session::has('fail'))
        <div class="alert alert-danger">
            {{ Session::get('fail') }}
        </div>
    @endif

    @csrf

    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Email address</label>
        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email"
            value="{{ old('email') }}">
        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>

        <span class="text-danger">
            @error('email')
                {{ $message }}
            @enderror
        </span>
    </div>

    <div class="row g-3 align-items-center">
        <div class="col-auto">
            <label for="inputPassword6" class="col-form-label">Password</label>
        </div>
        <div class="col-auto">
            <input type="password" id="inputPassword6" class="form-control" aria-describedby="passwordHelpInline"
                name="password">
        </div>
        <div class="col-auto">
            <span id="passwordHelpInline" class="form-text">
                Must be 8-20 characters long.
            </span>
        </div>
        <span class="text-danger">
            @error('password')
                {{ $message }}
            @enderror
        </span>

    </div>
    <hr>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>

<x-components.footer />
