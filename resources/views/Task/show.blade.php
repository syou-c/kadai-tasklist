@extends('layouts.app')

@section('content')

    <h1>id = {{ $Task->id }} のメッセージ詳細ページ</h1>

    <table class="table table-bordered">
        <tr>
            <th>id</th>
            <td>{{ $Task->id }}</td>
        </tr>
        <tr>
            <th>タイトル</th>
            <td>{{ $Task->status }}</td>
        </tr>
        <tr>
            <th>メッセージ</th>
            <td>{{ $Task->content }}</td>
        </tr>
    </table>
    {{-- メッセージ編集ページへのリンク --}}
    {!! link_to_route('Task.edit', 'このメッセージを編集', ['Task' => $Task->id], ['class' => 'btn btn-light']) !!}
    
    {{-- メッセージ削除フォーム --}}
    {!! Form::model($Task, ['route' => ['Task.destroy', $Task->id], 'method' => 'delete']) !!}
        {!! Form::submit('削除', ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}


@endsection