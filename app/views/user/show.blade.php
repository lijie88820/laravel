@extends('layouts.user')

@section('main')

<h1>Show User</h1>

<p>{{ link_to_route('user.index', 'Return to all users') }}</p>

<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <th>Title</th>
						<th>Body</th>
        </tr>
    </thead>

    <tbody>
        <tr>
            <td>{{ $user->title }}</td>
						<td>{{ $user->body }}</td>
            <td>{{ link_to_route('user.edit', 'Edit', array($user->id), array('class' => 'btn btn-info')) }}</td>
            <td>
								{{ Form::open(array('method' => 'DELETE', 'route' => array('user.destroy', $user->id))) }}
										{{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                {{ Form::close() }}
            </td>
        </tr>
    </tbody>
</table>

@stop