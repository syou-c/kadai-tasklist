@extends('layouts.app')

@section('content')

    <h1>一覧</h1>

    @if (count($Task) > 0)
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>メッセージ</th>
                    <th>ステータス</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($Task as $Task)
                <tr>
                    {{-- メッセージ詳細ページへのリンク --}}
                    <td>{!! link_to_route('Task.show', $Task->id, ['Task' => $Task->id]) !!}</td>
                    <td>{{ $Task->status }}</td>
                    <td>{{ $Task->content }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @endif
@endsection