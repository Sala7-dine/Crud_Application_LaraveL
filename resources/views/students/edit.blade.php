@extends ('students.layout')
@section ('content')
<div class="card" style="margin:20px;">
  <div class="card-header">Edit Student</div>
  <div class="card-body">
    <form action="{{ url( '/student/'.$students->id ) }}" method="post" enctype="multipart/form-data">
      {!! csrf_field() !!}
      @method("PATCH")
      <input type="hidden" name="id" id="id" value="{{$students->id}}" id="id"/>
      <label>Name</label></br>
      <input type="text" name="name" id="name" value="{{$students->name}}" class="form-control"
      value={{ isset($students->name) ? $students->name : old('name') }}
      />
      @error("name")
      <span class="text-danger">*{{$message}}</span></br>
      @enderror
      </br>
      <label>Email</label></br>
      <input type="text" name="mail" id="mail" class="form-control" 
      value={{ isset($students->mail) ? $students->mail : old('mail') }}
      />
      @error("mail")
      <span class="text-danger">*{{$message}}</span></br>
      @enderror
      </br>
      <label>Phone</label></br>
      <input type="text" name="phone" id="phone" class="form-control" 
      value={{ isset($students->phone) ? $students->phone : old('phone') }}
      />
      @error("phone")
      <span class="text-danger">*{{$message}}</span></br>
      @enderror
      </br>
      <label>Section</label></br>
      <input type="text" name="section" id="section" class="form-control" 
      value={{ isset($students->section) ? $students->section : old('section') }}
      />
      @error("section")
      <span class="text-danger">*{{$message}}</span></br>
      @enderror
      </br>

      <label>Image</label></br>
      <img src="{{ asset('storage/'.$students->image)}}" alt="Image de profile" style="max-width: 100px">
      <input type="file" name="image" id="image" class="form-control" 
      value={{ isset($students->image) ? $students->image : old('image') }}
      />
      @error("image")
      <span class="text-danger">*{{$message}}</span></br>
      @enderror
      </br>
      <input type="submit" value="Update" class="btn btn-success" >
      <a href="{{url('/student/')}}" class="btn btn-primary">Back</a>
    </form>
  </div>
</div>

@stop