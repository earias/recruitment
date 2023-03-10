@extends('users.layout')
 
@section('content')
    <div class="row">
        <div ><a href="/">BACK To Log screen</a></div>
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Contact Management Web Application</h2>
            </div>
            @if (Route::has('login'))
                    @auth
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('users.create') }}"> Create New user</a>
            </div>
            @endauth
               
            @endif
        </div>
    </div>
   
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
   
    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Contact</th>
            <th>Email</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($users as $user)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->contact }}</td>
            <td>{{ $user->email }}</td>
            <td>
                @if (Route::has('login'))
                    @auth
                    <form action="{{ route('users.destroy',$user->id) }}" method="POST">
   
                        <a class="btn btn-info" href="{{ route('users.show',$user->id) }}">Show</a>
        
                        <a class="btn btn-primary" href="{{ route('users.edit',$user->id) }}">Edit</a>
       
                        @csrf
                        @method('DELETE')
          
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                  
                    @endauth
               
            @endif
             
            </td>
        </tr>
        @endforeach
    </table>
  
    {!! $users->links() !!}
      
@endsection