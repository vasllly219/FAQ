@extends('layouts.master')

@section('title', 'FAQ - Задаем вопрос')

@section('sidebar', 'FAQ - Задаем вопрос')

@section('content')
</br>
 <form action="/" role="form" method="post" align="center">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    </br>
    <p>Категория*</p>
    <select type="text" name="category" required>
        @foreach ($categories as $category)
        <option>{{ $category->category }}</option>
        @endforeach
    </select>
    </br>
    </br>
    <p>Вопрос*</p>
    <p><input type="text" name="question" value="" maxlength=50 required size=50></p>
    </br>
    <p>Ваше имя*</p>
    <p><input type="text" name="name" value="" maxlength=50 required size=50></p>
    </br>
    <p>Email*</p>
    <p><input type="text" name="email" value="" maxlength=50 required size=50></p>
    </br>
    <p><input type="submit" value="Добавить"></p>
</form>
@stop
