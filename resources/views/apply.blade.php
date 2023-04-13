<x-components.header title="Application"/>
<br>
@foreach ($apply as $a)
    <h1>{{$a-> jobid}}</h1>
    <h2>{{$a-> position}}</h2>
    <h3>{{$a-> slug }}</h3>
    <h4>{{$a-> company }}</h4>
    <h5>{{$a->experience }}</h5>
    <h6>{{$a-> skills}}</h6>
    <h6>{{$a-> id}}</h6>
    
@endforeach

<x-components.footer />