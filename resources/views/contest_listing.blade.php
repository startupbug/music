@extends('layouts.public_index')
@section('content')
@if(count($contests) == 0)
  <p>No contest have been started yet !!</p>
@else
<div class="container">
  @foreach($contests as $contest)
  <div class="row contest_padding">
    <div class="col-md-4">
      <div class="contest_image">
        @if($contest->contest_image == null)
          <img src="{{asset('public/assets/images/newcontest.jpg')}}" alt="" class="img-responsive">
        @elseif($contest->contest_image != null)
          <img src="{{asset('public/storage/contest_images/'.$contest->contest_image)}}" alt="" class="img-responsive">
        @endif
      </div>
    </div>
    <div class="col-md-8">
      <p class="contest_header">{{$contest->name}}</p>
      <p class="contest_date">From, {{$contest->start_date}} Pm To,{{$contest->start_date}} Pm</p>
      <p class="contest_head">Contest Type:
        @if($contest->contest_type == 1) 
          Daily 
        @elseif($contest->contest_type == 2) 
          Weekly
        @elseif($contest->contest_type == 3)
          Monthly
        @endif    
      </p>
      <p class="contest_head">Description</p>
      <p class="contest_description">{{$contest->description}}</p>
      <form action="{{route('musician_contest',['id'=>$contest->id])}}" method="get">
          <button class="btn btn-info btn-lg footer contest_button" type="submit">Participate in Contest</button>
      </form>
    </div>
  </div>
  @endforeach
</div>
@endif
@endsection
