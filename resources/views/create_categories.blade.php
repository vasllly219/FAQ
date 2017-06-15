@extends('layouts.master_admin')

@section('title', 'Добавление категории')

@section('content')
</br>
 <form action="/admin/categories" role="form" method="post" align="center">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    </br>
    <p>Имя новой категории*</p>
    </br>
    <p><input type="text" name="category" value="" maxlength=50 required size=50></p>
    </br>
    <p><input type="submit" value="Добавить"></p>
</form>
@stop
