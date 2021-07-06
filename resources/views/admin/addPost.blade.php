@extends('layouts.front')

@section('title')
    Add Post
@endsection

@section('css')
@endsection

@section('content')
    <div class="row">
        <div class="col-md-8 m-auto">
            <h3>Yeni Makale Ekleme</h3>
            <form action="" method="POST">
                @csrf
                <div class="form-group mt-5">
                    <label for="title">Makale Başlık</label>
                    <input type="text" class="form-control" name="title" id="title" placeholder="Başlık"/>
                </div>
                <div class="form-group mt-5">
                    <label for="text_content">Makale İçeriği</label>
                    <textarea type="text" class="form-control" name="text_content" rows="10" id="text_content"
                              placeholder="Makale İçeriği"></textarea>
                </div>
                <div class="form-group">
                    <label for="status">
                        <input type="checkbox" name="status" id="status"/> Status
                    </label>
                </div>
                <div class="form-group mt-3">
                    <button class="btn btn-success btn-block" type="submit"> Add Post</button>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('js')
@endsection
