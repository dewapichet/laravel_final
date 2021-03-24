@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Edit') }}</div>

                <form action="{{url("/m_user/$users->id")}}" method="post">
                    {{ csrf_field() }}
                    @method('PUT')
                    <div class="card-body">
                        <label>Username: </label>
                        <input class='form-control mb-2' name='username' type="text" value="{{$users->username}}" readonly />
    
                        <label>Firstname: </label>
                        <input class='form-control mb-2' name='first_name' type="text" value="{{$users->first_name}}" readonly />
    
                        <label>Lastname: </label>
                        <input class='form-control mb-2' name='last_name' type="text" value="{{$users->last_name}}" readonly />
    
                        <label>Email: </label>
                        <input class='form-control mb-2' name='email' type="text" value="{{$users->username}}" readonly />
    
                        <label>Age: </label>
                        <input class='form-control mb-2' name='age' type="text" value="{{$users->age}}" readonly />
    
                        <label>Tel: </label>
                        <input class='form-control mb-2' name='tel' type="text" value="{{$users->tel}}" readonly />
    
                        <label>Passport id: </label>
                        <input class='form-control mb-2' name='passport_id' type="text" value="{{$users->passport_id}}" readonly />
    
                        <label>Province: </label>
                        <input class='form-control mb-2' name='province' type="text" value="{{$users->province}}" readonly />
    
                        <label>Status: </label>
                        <select class='form-control mb-2' name="user_role">
                            @if ($users->user_role === 'wait')
                                <option value="wait">Wait</option>    
                                <option value="mechanic">Accept</option>                            
                            @else
                                <option value="mechanic">Accept</option>     
                                <option value="wait">Wait</option>        
                            @endif
                        </select>
    
                        <div align='right'>
                            <button class="btn btn-primary">Save</button>
                        </div>
    
                        <label>Passport image: </label>
                        <img src="/storage/{{$users->passport_image}}" width="100%" height="400" style="object-fit: contain;">
    
                        <label class='mt-4'>Passport certificate image: </label>
                        <img src="/storage/{{$users->passport_certificate_image}}" width="100%" height="400" style="object-fit: contain;">
    
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
