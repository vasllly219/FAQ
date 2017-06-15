@extends('layouts.master_admin')

@section('title', 'Добавление администратора')

@section('content')
</br>
 <form action="/admin/admins" role="form" method="post" align="center">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    </br>
    <p>Имя*</p>
    <p><input type="text" name="name" value="" maxlength=50 required size=50></p>
    </br>
    <p>Email*</p>
    <p><input type="text" name="email" value="" maxlength=50 required size=50></p>
    </br>
    <p>Пароль*</p>
    <p><input type="text" name="password" value="" maxlength=50 required size=50></p>
    </br>
    <p><input type="submit" value="Добавить"></p>
</form>
@stop
