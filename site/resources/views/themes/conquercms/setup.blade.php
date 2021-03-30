@extends('layouts.app_setup')
@section('title', 'Setup')
@section('content')
    <div class="container py-5 py-md-6" id="content-container">
        <div class="row">
            <div class="col-12">
                <h1 class="setup-title">ConquerCMS - The best friendly CMS for Conquer Online Private Servers.</h1>
                <form action="/setup" method="POST">
                    {{ csrf_field() }}
                    <h4>Conquer database configuration</h4>
                    <hr/>
                    <div class="form-group">
                        <label for="cqDatabaseHost">Database Host</label>
                        <input type="text" class="form-control" id="cqDatabaseHost" name="cqDatabaseHost" value="{{ getenv("CONQUER_DB_HOST") }}">
                    </div>
                    <div class="form-group">
                        <label for="cqDatabasePort">Database Port</label>
                        <input type="number" class="form-control" id="cqDatabasePort" name="cqDatabasePort" value="{{ getenv("CONQUER_DB_PORT") }}">
                    </div>
                    <div class="form-group">
                        <label for="cqDatabaseName">Database Name</label>
                        <input type="text" class="form-control" id="cqDatabaseName" name="cqDatabaseName" value="{{ getenv("CONQUER_DB_DATABASE") }}">
                    </div>
                    <div class="form-group">
                        <label for="cmsDatabaseName">Panel Database Name</label>
                        <input type="text" class="form-control" id="cmsDatabaseName" name="cmsDatabaseName" value="{{ getenv("DB_DATABASE") }}">
                    </div>
                    <div class="form-group">
                        <label for="cqDatabaseUsername">Database Username</label>
                        <input type="text" class="form-control" id="cqDatabaseUsername" name="cqDatabaseUsername" value="{{ getenv("CONQUER_DB_USERNAME") }}">
                    </div>
                    <div class="form-group">
                        <label for="cqDatabaseUsername">Database Password</label>
                        <input type="password" class="form-control" id="cqDatabasePassword" name="cqDatabasePassword" value="{{ getenv("CONQUER_DB_PASSWORD") }}">
                    </div>
                    <div class="text-right">
                        <button type="submit" class="btn btn-action">Configure</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
