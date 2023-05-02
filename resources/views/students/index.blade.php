@extends("students.layout")
@section("content")
  <div calass="container">
    <div class="row " style="margin:20px">
      <div class="col-12">
        <div class="card">
          <div class="card-header text-center">
            <h2>CRUD APLLICATION LARAVEL</h2>
          </div>
          <div class="card-body">
              <a href="{{url('/student/create/')}}" class="btn btn-success btn-sm" title="Add New Student">
                Add New
              </a>
              <br/>
              <br/>
              <div class="table-responsive">
                <table class="table">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>name</th>
                      <th>email</th>
                      <th>phone</th>
                      <th>section</th>
                      <th>operation</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      @foreach($students as $item)
                      <td>{{$loop->iteration}}</td>
                      <td>{{$item->name}}</td>
                      <td>{{$item->mail}}</td>
                      <td>{{$item->phone}}</td>
                      <td>{{$item->section}}</td>
                      <td>
                        <a href="{{url('/student/'.$item->id)}}" title="view student" class="btn btn-primary btn-sm">view</a>
                        <a href="{{url('/student/'.$item->id.'/edit')}}" title="edit student" class="btn btn-success btn-sm">edit</a>
                        <form method="post" action="{{url('/student'.'/'.$item->id)}}" accept-charset="UTF-8" >
                          {{ method_field("DELETE") }}
                          {{ csrf_field() }}
                          <button type="submit" class="btn btn-danger btn-sm" title="Delete Student">delete</button>
                        </form>
                      </td>
                    </tr>
                    @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection