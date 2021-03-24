@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('User manage') }}</div>

                <div class="card-body">
                    <table class='table table-bordered'>
                        <tr align='center'>
                            <th>Name</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>

                        @foreach ($users as $item)
                        <tr align='center'>
                            <td>{{$item->first_name}} {{$item->last_name}}</td>
                            <td>{{$item->user_role}}</td>
                            <td>
                                <a class="btn btn-primary" href="{{url("/m_user/$item->id/edit")}}">View</a>
                            </td>
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
