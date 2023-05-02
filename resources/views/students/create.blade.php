@extends("students.layout")
@section("content")
<div class="card" style="margin:20px">
  <div class="card-header">Create New Students</div>
  <div div class="card-body">
    <form action="{{ url('student') }}" method="post" enctype="multipart/form-data">
      @csrf
       
      <label>Name</label></br>
      <input type="text" name="name" id="name" value="{{old('name')}}" class="form-control">
      @error("name")
      <span class="text-danger">*{{$message}}</span></br>
      @enderror
      </br>
      
      <label>Email</label></br>
      <input type="email" name="mail" id="mail" value="{{old('mail')}}" class="form-control" >
      @error("mail")
      <span class="text-danger">*{{$message}}</span></br>
      @enderror
      </br>

      <label>Phone</label></br>
      <input type="text" name="phone" id="phone" value="{{old('phone')}}" class="form-control" >
      @error("phone")
      <span class="text-danger">*{{$message}}</span></br>
      @enderror
      </br>

      <label>section</label></br>
      <input type="text" name="section" id="section" value="{{old('section')}}" class="form-control">
      @error("section")
      <span class="text-danger">*{{$message}}</span></br>
      @enderror
      </br>

      <label>image</label></br>
      <input type="file" name="image" id="image" value="{{old('image')}}" class="form-control" >
      @error("image")
      <span class="text-danger">*{{$message}}</span></br>
      @enderror
      </br>
      
      <input type="submit" value="Save" class="btn btn-success">
      <a href="{{url('/student/')}}" class="btn btn-primary">Back</a>
    </form>
  </div>  
</div>
@stop