@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="jumbotron jumbotron-fluid">
                <div class="fluid-container">
                    <h1 class="display-4 text-center">Fajar's Blog</h1>
                    <p class="lead mb-5 text-center">CRUD Application Laravel With Vue JS | Created By Fajar Hamdani.</p>
                    
                    <router-view></router-view>                        
                </div>
            </div>
        </div>
    </div>
@endsection

