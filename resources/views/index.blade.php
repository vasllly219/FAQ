@extends('layouts.master')

@section('title', 'FAQ')

@section('sidebar', 'FAQ')

@section('content')
<section class="cd-faq">
    @if (count($categories) == 0)
    <h1>Категории не обнаружены... (</h1>
    @endif
    <ul class="cd-faq-categories">
        @foreach ($categories as $category => $faqs)
        <li><a href="#{{ $category }}">{{ $category }}</a></li>
        @endforeach
    </ul> <!-- cd-faq-categories -->

    <div class="cd-faq-items">
        @foreach ($categories as $category => $faqs)
        <ul id="{{ $category }}" class="cd-faq-group">
            <li class="cd-faq-title"><h2>{{ $category }}</h2></li>
            @foreach ($faqs as $faq)
            @if ($faq['public'] === 1)
            <li>
                <a class="cd-faq-trigger" href="#0">{{ $faq['question'] }}</a>
                <div class="cd-faq-content">
                    <p>{{ $faq['answer'] }}</p>
                </div> <!-- cd-faq-content -->
            </li>
            @endif
            @endforeach
        </ul> <!-- cd-faq-group -->
        @endforeach
    </div> <!-- cd-faq-items -->
    <a href="#0" class="cd-close-panel">Close</a>
</section> <!-- cd-faq -->
@stop
