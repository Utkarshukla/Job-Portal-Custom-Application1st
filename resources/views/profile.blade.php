<x-components.header title="login" />
<br>
@if (Session::has('success'))
    <div class="alert alert-success">
        {{ Session::get('success') }}
    </div>
@endif

<div class="d-flex align-items-start">
    <div class="nav flex-column nav-pills me-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
        <button class="nav-link" id="v-pills-profile-tab" data-bs-toggle="pill" data-bs-target="#v-pills-profile"
            type="button" role="tab" aria-controls="v-pills-profile" aria-selected="false">Profile</button>
        <button class="nav-link" id="v-pills-messages-tab" data-bs-toggle="pill" data-bs-target="#v-pills-messages"
            type="button" role="tab" aria-controls="v-pills-messages" aria-selected="false">Post</button>
        <button class="nav-link" id="v-pills-settings-tab" data-bs-toggle="pill" data-bs-target="#v-pills-settings"
            type="button" role="tab" aria-controls="v-pills-settings" aria-selected="false">Settings</button>
    </div>
    <div class="tab-content" id="v-pills-tabContent">
        <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab"
            tabindex="0">
            {{-- <img src="https://avatars.githubusercontent.com/u/87989573?v=4" class="rounded mx-auto d-block"
                alt="..." style="height:2in;width:2in"> --}}

            <br>
            <h1>ID:{{ session('loginId') }}</h1>
            <h1>Name:{{ session('name') }}</h1>
            <h1>Email:{{ session('email') }}</h1>
            <h1>Phone:{{ session('phone') }}</h1>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Edit
            </button>

            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Update Profile</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <form action="{{ url('/updates') }}" method="POST">
                            @csrf
                            <div class="modal-body">
                                <h6>Name:{{ session('name') }}</h6>


                                {{-- Update form --}}

                                <input type="hidden" class="form-control" id="floatingInput"
                                    value={{ session('loginId') }} name="id">
                                <input type="hidden" class="form-control" id="floatingInput"
                                    value={{ session('name') }} name="fname">

                                <h6>E-mail:</h6>
                                <div class="form-floating mb-3">
                                    <input type="email" class="form-control" id="floatingInput"
                                        value={{ session('email') }} name="email">

                                </div>

                                <h6>phone:</h6>
                                <div class="form-floating mb-3">
                                    <input type="phone" class="form-control" id="floatingInput"
                                        value={{ session('phone') }} name="phone">

                                </div>

                                <h6>Password<small>(Enter Current or New Passowrd)</small></h6>
                                <div class="form-floating mb-3">
                                    <input type="password" class="form-control" id="floatingInput" name="password">

                                </div>

                                <p class="card-text"><small class="text-muted">Last
                                        Updated:{{ session('updates') }} </small></p>


                            </div>

                            <div class="modal-footer">
                                {{-- <button type="submit"  class="btn btn-secondary" data-bs-dismiss="modal">Close</button> --}}
                                <button type="submit" class="btn btn-primary">Save changes</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab"
            tabindex="0">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">*</th>
                        
                        <th>Name: </th>
                      
                        <th>Email</th>
                        <th>Position</th>
                        <th>Description</th>
                        <th>Action</th>
                    </tr>

                </thead>
                @php
                    $i = 1;
                    
                @endphp

                <tbody>
                    @foreach ($data as $d)
                    <td>-></td>
                        <td>{{ $d->fname }} {{ $d->lname }}</td>
                        <td><a href="">{{ $d->email }}</a></td>
                        <td>{{$d->position}}</td>
                        <td>{{$d->description}}</td>

                        <td><button class="btn btn-danger"><a href="{{ url('/reject') }}">Reject</a></button>
                            <pre></pre><button type="submit"
                                class="btn btn-success"><a href="{{ url('/select') }}">select</a></button>
                        </td>
                       
                </tbody>
                <br>
                @endforeach
            </table>

        </div>
        <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab"
            tabindex="0">


        </div>
    </div>
</div>

<x-components.footer />
