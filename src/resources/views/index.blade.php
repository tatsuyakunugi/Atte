@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection

@section('content')
<div class="timestamp__content">
    <div class="timestamp__heading">
        <p class="timestamp__heading--text">
            {{ $user->name }}さんお疲れ様です！
        </p>
    </div>
    <div class="stamp__panel">
        <div class="stamp__panel--inner">
            <!--勤務開始判定-->
            @if($startedWork)
            <form class="stamp__button" action="/punchin" method="post">
                @csrf
                <button class="stamp__button-submit" type="submit" disabled>勤務開始</button>
            </form>
            @elseif($endedWork)
            <form class="stamp__button" action="/punchin" method="post">
                @csrf
                <button class="stamp__button-submit" type="submit" disabled>勤務開始</button>
            </form>
            @else
            <form class="stamp__button" action="/punchin" method="post">
                @csrf
                <button class="stamp__button-submit" type="submit">勤務開始</button>
            </form>
            @endif
            <!--勤務終了判定-->
            @if($startedWork && $startedRest)
            <form class="stamp__button" action="/punchout" method="post">
                @csrf
                <button class="stamp__button-submit" type="submit" disabled>勤務終了</button>
            </form>
            @elseif($startedWork)
            <form class="stamp__button" action="/punchout" method="post">
                @csrf
                <button class="stamp__button-submit" type="submit">勤務終了</button>
            </form>
            @else
            <form class="stamp__button" action="/punchout" method="post">
                @csrf
                <button class="stamp__button-submit" type="submit" disabled>勤務終了</button>
            </form>
            @endif
        </div>
    </div>
    <div class="rest__panel">
        <div class="rest__panel--inner">
            <!--休憩開始判定-->
            @if($startedWork && $startedRest)
            <form class="rest__button" action="/restin" method="post">
                @csrf
                <button class="rest__button-submit" type="submit" disabled>休憩開始</button>
            </form>
            @elseif($startedWork)
            <form class="rest__button" action="/restin" method="post">
                @csrf
                <button class="rest__button-submit" type="submit">休憩開始</button>
            </form>
            @else
            <form class="rest__button" action="/restin" method="post">
                @csrf
                <button class="rest__button-submit" type="submit" disabled>休憩開始</button>
            </form>
            @endif
            <!--休憩終了判定-->
            @if($startedWork && $startedRest)
            <form class="rest__button" action="/restout" method="post">
                @csrf
                <button class="rest__button-submit" type="submit">休憩終了</button>
            </form>
            @else
            <form class="rest__button" action="/restout" method="post">
                @csrf
                <button class="rest__button-submit" type="submit" disabled>休憩終了</button>
            </form>
            @endif
        </div>
    </div>
</div>
@endsection