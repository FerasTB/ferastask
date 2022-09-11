@extends('layouts.app', ['class' => 'off-canvas-sidebar block', 'activePage' => 'user-management', 'title' => __('Material Dashboard')])

@section('content')
    <form class="content" action="/user/{{ $user->id }}" method="POST">
        @method('PUT')
        @csrf
        <div class="form-group">
            <label for="exampleInputPassword1">name</label>
            <input type="text" class="form-control" id="exampleInputPassword1" value="{{ $user->name }}" name="name">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Email address</label>
            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                value="{{ $user->email }}" name="email">
            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password">
        </div>
        <div class="form-group">
            <label for="exampleFormControlSelect1">Example select</label>
            <select class="form-control selectpicker" data-style="btn btn-link" id="exampleFormControlSelect1"
                name="role">
                @foreach ($userRole as $key => $value)
                    <option value="{{ $value }}"> {{ $key }}</option>
                @endforeach

            </select>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
