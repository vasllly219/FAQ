@extends('layouts.master_admin')

@section('title', 'Меняем пароль')

@section('content')
</br>
<h1 align="center">Меняем пароль администратора - {{ $admin->name }}</h1>
</br>
 <form action="/admin/admins/{{ $admin->id }}" role="form" method="post" align="center">
    <input type="hidden" name="_method" value="PATCH">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <p>Пароль*</p>
    <p><input type="text" name="password" value="" maxlength=50 required size=50></p>
    </br>
    <p><input type="submit" value="Изменить"></p>
</form>
@stop
