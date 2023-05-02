@extends('students.layout')
@section("content")
  
    <div class="card m-auto mt-5" style="width:300px">
      <div class="card-body m-auto">
      <img src="{{ asset('storage/'.$students->image)}}" alt="Image de profile" style="max-width: 200px">
      <h4 class="card-title">Name : {{ $students->name }}</h4>
      <p class="card-text">Email : {{ $students->mail }}</p>
      <p class="card-text">Phone : {{ $students->phone }}</p>
      <p class="card-text">Section : {{ $students->section }}</p>
      <a href="{{url('/student/')}}" class="btn btn-primary">Back</a>
      </div>
    </div>
  
@stop