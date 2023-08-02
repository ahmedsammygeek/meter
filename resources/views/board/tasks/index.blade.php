@extends('board.layouts.master')

@section('page_content')
@livewire('board.workers.list-all-worker-tasks' , ['worker' => $worker] )
@endsection