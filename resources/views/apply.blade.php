<x-components.header title="Application" />
<br>
<div class="row">
    <div class="col-xs-10 col-sm-7">
        @foreach ($apply as $a)
            {{-- <h1>{{ $a->jobid }}</h1> --}}
            <h2> <b>Position:</b>  <small>{{ $a->position }}</small></h2>
            {{-- <h3>{{ $a->slug }}</h3> --}}
            <h4> <b> Company Name:</b>  <small>{{ $a->company }}</small></h4>
            <h4> <b> Descripton:</b>  <small>{{ $a->description }}</small></h4>
            <h5> <b> Requried Experience:</b>  <small>{{ $a->experience }}</small></h5>
            <h6> <b> Skills Needed:</b>  <small>{{ $a->skills }}</small></h6>
            <h6> <b> Posted BY:</b>  <small>{{ $a->id }}</small></h6>
        @endforeach
    </div>
    <div class="col-xs-10 col-sm-3">

        <form>
            <br>
            <div class="form-group">
                <label for="exampleFormControlTextarea1">Describe Your Self:</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
            </div>
            <br>
            <span class="input-group-text">Attach your updated Resume:</span>
            <div class="input-group mb-3">
                <div class="custom-file">
                    <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                    <input type="file" class="custom-file-input" id="inputGroupFile01">
                </div>
            </div>
            <button type="button" class="btn btn-primary">Primary</button>
        </form>
    </div>
</div>


<x-components.footer />
