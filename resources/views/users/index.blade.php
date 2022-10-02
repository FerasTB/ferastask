@extends('layouts.app', ['class' => 'off-canvas-sidebar block', 'activePage' => 'user-management', 'title' => __('Material Dashboard')])

@section('content')
    <table class="table content">

        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Role</th>
                <th class="text-right">Actions</th>
                <th><a href="user/create"><button type="button" class="btn btn-info">Add User</button></a></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>
                        {{ $user->name }}
                    </td>
                    <td>
                        {{ $user->email }}
                    </td>
                    <td>
                        {{ App\Enums\userRole::getKey((int) $user->role) }}
                    </td>
                    <td class="td-actions text-right">
                        <button type="button" rel="tooltip" class="btn btn-success">
                            <a href="user/{{ $user->id }}/edit">
                                <i class="material-icons">edit</i>
                            </a>
                        </button>
                        <button type="button" class="btn btn-danger" data-toggle="modal"
                            data-target=".bd-example-modal-sm{{ $user->id }}">Delete</button>
                        <div class="modal fade bd-example-modal-sm{{ $user->id }}" tabindex="-1" role="dialog"
                            aria-labelledby="mySmallModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-sm">
                                <div class="modal-content">
                                    <h1 class="m-2">Are You Sure ?</h1>
                                    <p class="m-2">the user {{ $user->name }} will be destroied</p>
                                    <form action="user/{{ $user->id }}  " method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" rel="tooltip" class="mr-2 btn btn-danger">
                                            I am sure , Delete {{ $user->name }}
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
