@extends('test.header')

@section('title', 'Заголовок страницы')

@section('head')
    <div>тут меню</div>
@stop

@section('sidebar')
    <div>
        постыыыыы
    </div>
    <p>Этот элемент будет добавлен к главному сайдбару.</p>
@stop

@section('content')
    <p>Это - содержимое страницы.</p>
    {!! Form::open(array('url' => '/test')) !!}
    //
    {!! Form::close() !!}
@stop

@section('footer')
    <p>Это - footer.</p>
@stop

