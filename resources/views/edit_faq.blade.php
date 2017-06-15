@extends('layouts.master_admin')

@section('title', 'Редактируем вопрос')

@section('content')
</br>
<h1 align="center">Редактируем вопрос №{{$faq->id}}</h1>
</br>
<form action="/admin/category/{{ $faq->id }}" role="form" method="post" align="center">
    <input type="hidden" name="_method" value="PUT">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <input type="hidden" name="category_id" value="{{ $faq->category_id }}">
    <p>Вопрос:</p>
    <p><input type="text" name="question" value="{{ $faq->question }}" maxlength=50 required size=50></p>
    </br>
    <p>Ответ:</p>
    <p><input type="text" name="answer" value="{{ $faq->answer }}" maxlength=50 required size=50></p>
    </br>
    <p>Автор:</p>
    <p><input type="text" name="user" value="{{ $faq->user }}" maxlength=50 required size=50></p>
    </br>
    <p>Email:</p>
    <p><input type="text" name="email" value="{{ $faq->email }}" maxlength=50 required size=50></p>
    </br>
    <p><input type="submit" value="Изменить"></p>
</form>
@stop
