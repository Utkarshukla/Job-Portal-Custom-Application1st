<x-components.header title="Application" />
<br>
<div class="row">
    <div class="col-xs-10 col-sm-7">
        <h1><b>Position:</b><small>{{$apply['position']}}</small></h1>
        <h4> <b> Company Name:</b>  <small>{{$apply['company']}}</small></h4>
        <h4> <b> Description:</b>  <small>{{$apply['description']}}</small></h4>
        <h5> <b> Requried Experience:</b>  <small>{{$apply['experience']}}</small></h5>
        <h6> <b> Skills Needed:</b>  <small>{{$apply['skills']}}</small></h6>
        <h6> <b> Posted BY:</b>  <small>{{$apply['fname']}} &nbsp;{{$apply['lname']}}</small></h6>
        
    </div>
    <div class="col-xs-10 col-sm-3">

        <form method="POST" enctype="multipart/form-data" >  
            {{-- action="{{ url('/apply-form') }}" --}}
            @csrf
            <br>
            <input type="hidden" name="jobid" value={{$apply['jobid']}}>
            <input type="hidden" name="uid" value={{$apply['id']}}>
            <div class="form-group">
                <label for="exampleFormControlTextarea1">Describe Your Self:</label>
                <textarea class="form-control" name="adescription" id="exampleFormControlTextarea1" rows="3"></textarea>
            </div>
            <br>
            <span class="input-group-text">Attach your updated Resume:</span>
            <div class="input-group mb-3">
                <div class="custom-file">
                    <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                    <input type="file" name="resume" class="custom-file-input" id="inputGroupFile01">
                </div>
            </div>
            <button type="submit" value="Submit">Submit</button>
        </form>
    </div>
</div>


<x-components.footer />
