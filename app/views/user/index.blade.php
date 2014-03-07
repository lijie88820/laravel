@extends('layouts.user')

@section('main')

<h1>All Users</h1>

<p>{{ link_to_route('user.create', 'Add new user') }}</p>

@if ($users->count())
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>User ID</th>
								<th>Networks</th>
								<th>Host Names</th>
								<th></th>
								<th></th>
            </tr>
        </thead>

        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->uid }}</td>
										<td>
												<table>
													@foreach ($user->networks as $network)
														<tr>
															<td>{{ $network['nid'] }}</td>
															<td>{{ $network['n_name'] }}</td>
															<td>{{ $network['n_ip'] }}</td>
															<td>{{ $network['n_status'] }}</td>
														</tr>
													@endforeach
												</table>
										</td>
										<td>
											<table>
												@foreach ($user->hostnames as $hostname)
													<tr>
														<td>{{ $hostname['hostname'] }}</td>
														<td>{{ $hostname['block'] }}</td>
													</tr>
												@endforeach
											</table>
										</td>
                    <td>{{ link_to_route('user.edit', 'Edit', array($user->id), array('class' => 'btn btn-info')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('user.destroy', $user->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@else
    There are no users
@endif

@stop