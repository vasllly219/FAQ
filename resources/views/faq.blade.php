@extends('layouts.master_admin')

@section('title', 'Вопросы')

@section('content')
</br>
</br>
<table>
<tr>
    <th>Вопрос</th>
    <th>Ответ</th>
    <th>Пользователь</th>
    <th>Email</th>
    <th>Дата создания</th>
    <th>Опубликован?</th>
    <th></th>
</tr>
@foreach ($faqs as $faq)
<tr>
    <td>{{ $faq['question'] }}</td>
    <td>
        @if ($faq['answer'])
        {{ $faq['answer'] }}
        @else
        <form action="/admin/category/{{ $faq['id'] }}" role="form" method="post">
            <input type="hidden" name="_method" value="PUT">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <p><input type="text" name="answer" value="" maxlength=255 required size=50></p>
            <p>Публиковать?<input type="checkbox" name="public" value="1"></p>
            <p><input type="submit" value="Ответить"></p>
       </form>
        @endif
    </td>
    <td>{{ $faq['user'] }}</td>
    <td>{{ $faq['email'] }}</td>
    <td>{{ $faq['created_at'] }}</td>
    <td>
        <form action="/admin/category/{{ $faq['id'] }}" role="form" method="post">
           <input type="hidden" name="_method" value="PUT">
           <input type="hidden" name="_token" value="{{ csrf_token() }}">
        @if ($faq['public'] == 1)
           <input type="hidden" name="public" value="0">
           Опубликован
           <p><input type="submit" value="Скрыть"></p>
        @else
            <input type="hidden" name="public" value="1">
            <p><input type="submit" value="Опубликовать!"></p>
        @endif
       </form>
    </td>
    <td>
        <form action="/admin/category/{{ $faq['id'] }}" role="form" method="post">
           <input type="hidden" name="_method" value="DELETE">
           <input type="hidden" name="_token" value="{{ csrf_token() }}">
           <p><input type="submit" value="Удалить вопрос"></p>
       </form>
       <form action="/admin/category/{{ $faq['id'] }}/edit_category" role="form" method="post">
          <input type="hidden" name="_method" value="GET">
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
          <p><input type="submit" value="Сменить категорию"></p>
      </form>
      <form action="/admin/category/{{ $faq['id'] }}/edit" role="form" method="post">
         <input type="hidden" name="_method" value="GET">
         <input type="hidden" name="_token" value="{{ csrf_token() }}">
         <p><input type="submit" value="Редактировать вопрос"></p>
     </form>
    </td>
</tr>
@endforeach
</table>
@stop
