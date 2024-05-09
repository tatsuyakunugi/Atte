@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/attendance.css') }}">
<link rel="stylesheet" href="{{ asset('css/app.css') }}">
@endsection

@section('content')
<div class="attendance__content">
    <div class="attendance-table">
        <div class="attendance-table__heading">
            <form class="previous" action="/attendance" method="get">
                @csrf
                <button class="previous__button" name="date" id="previous" value="{{ $yesterday->format('Y-m-d')}}"><</button>
            </form>
            <div class="attendance-table__date">
                {{ $today->format('Y-m-d') }}
            </div>
            <form class="next" action="/attendance" method="get">
                @csrf
                <button class="next__button" name="date" id="next" value="{{ $tomorrow->format('Y-m-d')}}">></button>
            </form>
        </div>
        <table class="attendance-table__inner">
            <tr class="attendance-table__row">
                <th class="attendance-table__header">名前</th>
                <th class="attendance-table__header">勤務開始</th>
                <th class="attendance-table__header">勤務終了</th>
                <th class="attendance-table__header">休憩時間</th>
                <th class="attendance-table__header">勤務時間</th>
            </tr>
            @foreach($items as $item)
            <tr class="attendance-table__row">
                <td class="attendance-table__item">{{ $item->name }}</td>
                <td class="attendance-table__item">{{ $item->startTime }}</td>
                <td class="attendance-table__item">{{ $item->endTime }}</td>
                <td class="attendance-table__item">{{ $item->totalRestTime }}</td>
                <td class="attendance-table__item">{{ $item->workTime }}</td>
            </tr>
            @endforeach
        </table>
        <div class="pagination">
            {{ $items->appends(request()->query())->links() }}
        </div>
    </div>
</div>
@endsection
