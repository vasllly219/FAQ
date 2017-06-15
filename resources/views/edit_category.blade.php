@extends('layouts.master_admin')

@section('title', 'Меняем категорию')

@section('content')
</br>
<h1 align="center">Меняем категорию вопроса №{{$faq->id}}</h1>
</br>
<form action="/admin/category/{{ $faq->id }}" role="form" method="post" align="center">
    <input type="hidden" name="_method" value="PUT">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <p>Категория</p>
    <select type="text" name="category" required>
        @foreach ($categories as $category)
        <option>{{ $category->category }}</option>
        @endforeach
    </select>
    </br>
    <p><input type="submit" value="Изменить"></p>
</form>
@stop
