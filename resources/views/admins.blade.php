@extends('layouts.master_admin')

@section('title', 'Администраторы')

@section('content')
</br>
<form action="/admin/admins/create" role="form" method="post" align="center">
   <input type="hidden" name="_method" value="GET">
   <input type="hidden" name="_token" value="{{ csrf_token() }}">
   <p><input type="submit" value="Добавить администратора"></p>
</form>
</br>
<table>
<tr>
        <th>id</th>
        <th>Имя</th>
        <th>Email</th>
        <th></th>
        <th></th>
</tr>
@foreach ($admins as $admin)
<tr>
    <td>{{ $admin->id }}</td>
    <td>{{ $admin->name }}</td>
    <td>{{ $admin->email }}</td>
    <td>
        <form action="/admin/admins/{{ $admin->id }}/edit" role="form" method="post" align="center">
           <input type="hidden" name="_method" value="GET">
           <input type="hidden" name="_token" value="{{ csrf_token() }}">
           <p><input type="submit" value="Сменить пароль"></p>
        </form>
    </td>
    <td>
        <form action="/admin/admins/{{ $admin->id }}" role="form" method="post" align="center">
           <input type="hidden" name="_method" value="DELETE">
           <input type="hidden" name="_token" value="{{ csrf_token() }}">
           <p><input type="submit" value="Удалить администратора"></p>
       </form>
    </td>
</tr>
@endforeach
</table>

@stop
