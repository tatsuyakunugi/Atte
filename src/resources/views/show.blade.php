@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/show.css') }}">
<link rel="stylesheet" href="{{ asset('css/app.css') }}">
@endsection

@section('content')
<div class="user__content">
    <div class="user-table">
        <div class="user-table__title">
            <h3 class="user-name">
                {{ $user->name }}さんの勤怠記録
            </h3>
        </div>
        <div class="user-table__heading">
            <form class="search-form" action="/show" method="get">
                @csrf
                <select class="select__year" name="year">
                    @for($i=2024; $i <= 2050; $i++)
                    <option>{{ $i }}</option>
                    @endfor
                </select>
                <p>年</p>
                <select class="select__month" name="month">
                    @for($i=1; $i <= 12; $i++)
                    <option>{{ $i }}</option>
                    @endfor
                </select>
                <p>月</p>
                <select class="select__day" name="day">
                    @for($i=1; $i <= 31; $i++)
                    <option>{{ $i }}</option>
                    @endfor
                </select>
                <p>日</p>
                <input type="hidden" name="id" value="{{ $user->id }}">
                <button class="search-form__button" name="id" value="{{ $user->id }}">検索</button>
            </form>
        </div>
        <table class="user-table__inner">
            <tr class="user-table__row">
                <th class="user-table__header">勤務日</th>
                <th class="user-table__header">勤務開始</th>
                <th class="user-table__header">勤務終了</th>
                <th class="user-table__header">休憩時間</th>
                <th class="user-table__header">勤務時間</th>
            </tr>
            @foreach($items as $item)
            <tr class="user-table__row">
                <td class="user-table__item">{{ $item->workDay }}</td>
                <td class="user-table__item">{{ $item->startTime }}</td>
                <td class="user-table__item">{{ $item->endTime }}</td>
                <td class="user-table__item">{{ $item->totalRestTime }}</td>
                <td class="user-table__item">{{ $item->workTime }}</td>
            </tr>
            @endforeach
        </table>
    </div>
</div>
@endsection