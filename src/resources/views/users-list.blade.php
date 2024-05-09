@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/users-list.css') }}">
<link rel="stylesheet" href="{{ asset('css/app.css') }}">
@endsection

@section('content')
<div class="users-list__content">
    <div class="users-list__table">
        <div class="users-list__table--title">
            <p class="users-list">
                ユーザー一覧
            </p>
        </div>
        <table class="users-list__table--inner">
            <tr class="users-list__table--row">
                <th class="users-list__table--header">名前</th>
                <th class="users-list__table--header">メールアドレス</th>
                <th class="users-list__table--header"></th>
            </tr>
            @foreach($users as $user)
            <form class="users-list__form" action="/show" method="get">
                @csrf
                <tr class="users-list__table--row">
                    <td class="users-list__table--item">
                        {{ $user->name }}
                    </td>
                    <td class="users-list__table--item">
                        {{ $user->email }}
                    </td>
                    <td class="users-list__table--item">
                        <input type="hidden" name="id" value="{{ $user->id }}">
                        <button class="users-list__button" name="id" value="{{ $user->id }}">個人ページへ</button>
                    </td>
                </tr>
            </form>
            @endforeach
        </table>
        <div class="pagination">
            {{ $users->links() }}
        </div>
    </div>
</div>
@endsection