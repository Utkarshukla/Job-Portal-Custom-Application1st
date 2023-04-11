<x-components.header title="signup" />

<br>
<form class="align-middle" method="POST" action="{{ url('/sign-up') }}">
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
    <div class="input-group">
        <span class="input-group-text">First and last name</span>
        <input type="text" aria-label="First name" class="form-control" name="fname"required>
        <input type="text" aria-label="Last name" class="form-control" name="lname">
        <div>
            <span class="text-danger">
                @error('fname')
                    {{ $message }}
                @enderror
            </span>
            <span class="text-danger">
                @error('lname')
                    {{ $message }}
                @enderror
            </span>
        </div>
    </div>


    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Email address</label>
        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email"
            required>
        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>

        <span class="text-danger">
            @error('email')
                {{ $message }}
            @enderror
        </span>
    </div>



    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Phone</label>
        <input type="phone" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="phone"
            required>
        <div id="emailHelp" class="form-text">We'll never share your phone with anyone else.</div>
        <span class="text-danger">
            @error('phone')
                {{ $message }}
            @enderror
        </span>
    </div>



    <div class="row g-3 align-items-center">
        <div class="col-auto">
            <label for="inputPassword6" class="col-form-label">Password</label>
        </div>
        <div class="col-auto">
            <input type="password" id="inputPassword6" class="form-control" name="password"
                aria-describedby="passwordHelpInline" required>
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
    <br>


    <hr>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>

<x-components.footer />
