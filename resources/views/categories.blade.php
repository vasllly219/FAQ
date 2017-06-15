@extends('layouts.master_admin')

@section('title', 'Категории')

@section('content')
</br>
<form action="/admin/categories/create" role="form" method="post" align="center">
   <input type="hidden" name="_method" value="GET">
   <input type="hidden" name="_token" value="{{ csrf_token() }}">
   <p><input type="submit" value="Добавить категорию"></p>
</form>
</br>
<table>
<tr>
    <th>Категория</th>
    <th>Кол-во вопросов</th>
    <th>Опубликовано</th>
    <th>Без ответа</th>
    <th></th>
</tr>
@foreach ($categories as $category)
<tr>
    <td><a href="/admin/category/{{ $category['id'] }}">{{ $category['category'] }}</a></td>
    <td>{{ $category['count'] }}</td>
    <td>{{ $category['published'] }}</td>
    <td>{{ $category['unanswer'] }}</td>
    <td>
        <form action="/admin/categories/{{ $category['id'] }}" role="form" method="post">
           <input type="hidden" name="_method" value="DELETE">
           <input type="hidden" name="_token" value="{{ csrf_token() }}">
           <p><input type="submit" value="Удалить категорию"></p>
       </form>
    </td>
</tr>
@endforeach
</table>
@stop
