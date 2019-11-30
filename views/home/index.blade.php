<!DOCTYPE html>
<html>
<head>
	<title>Home page</title>
</head>
<body>
	<h1>Welcome Home! {{session('name')}}</h1>
	<h1>Welcome Home! {{session('user'.'$username')}}</h1>
	<a href="{{route('student.add')}}">Add user</a> | 
	<a href="{{route('student.index')}}">UserList</a> | 
	<a href="/logout">logout</a>
	<table>
	<tr>
			<td>ID</td>
			@foreach($users as $s)
			<td>{{$s->userId}}</td>
		</tr>
		<tr>
			<td>USERNAME</td>
			<td>{{$s->username}}</td>
		</tr>
		<tr>
			<td>PASSWORD</td>
			<td>{{$s->password}}</td>
		</tr>
		<tr>
			<td>Type</td>
			<td>{{$s->type}}</td> @endforeach
		</tr>
	</table>
	
</body>
</html>