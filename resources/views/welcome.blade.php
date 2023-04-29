<x-components.header title="DashBoard" />
<style>
    body{
        margin: 0.4px;
    }
</style>

    <br>
    <h1>
        
    </h1>
    <div id="job">

        @foreach ($jobs as $job)
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Postion: {{ $job->position }}</h5>
                </div>
                <div class="card-body">

                    <h6 class="card-title">Company: {{ $job->company }}</h6>
                    <h6>Exp :{{ $job->experience }}</h6>
                    <h6>skills :{{ $job->skills }}</h6>
                    <p class="card-text">{{ substr($job->description, 0, 50) }}....</p>
                    <h6>Location :{{ $job->location }}</h6>
                    <h6>Salry:{{ $job->salary }}</h6>
                    <p class="card-text"><small class="text-muted">Last updated {{ $job->created_at }}</small></p>
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Know More
                    </button>
                    <br><br><span>
                        
                            @if ( session('name')==null)
                            <a href="/login" class="btn btn-primary"> Login For Apply</a>
                            @elseif ( session('role')==1)
                            <a  class="btn btn-danger"> You are Hiring can't apply</a>
                            @else
                            <a href="/apply/{{$job->slug}}" class="btn btn-success"> Apply Now</a>
                            @endif
                        
                           </span>
                   

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Postion: {{ $job->position }}</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <h6>Exp :{{ $job->experience }}</h6>
                                    <h6>skills :{{ $job->skills }}</h6>
                                    <p class="card-text">{{ $job->description }}</p>
                                    <h6>Location :{{ $job->location }}</h6>
                                    <h6>Salry:{{ $job->salary }}</h6>
                                    <p class="card-text"><small class="text-muted">Last updated {{ $job->created_at }}</small></p>


                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Close</button>
                                    {{-- <button type="button" class="btn btn-primary">Save changes</button> --}}
                                </div>
                            </div>
                        </div>
                    </div>


                </div>

            </div> <br>
        @endforeach

    </div>
    <br>
    {{ $jobs->links() }}
    <x-components.footer />
