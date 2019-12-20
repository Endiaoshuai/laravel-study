@extends('layouts.default')
<!-- 使用 '@ section' 和 '@ stop' 代码来填充父视图的 content 区块 -->
@section('content')
    <div class="jumbotron">
        <h1>Hello Laravel</h1>
        <p class="lead">
            你现在所看到的是 <a href="">Laravel 入门教程</a> 的实例主页。
        </p>
        <p>
            <a  class="btn btn-lg btn-success" href="{{ route('signup') }}" role="button">现在注册</a>
        </p>
    </div>
@stop