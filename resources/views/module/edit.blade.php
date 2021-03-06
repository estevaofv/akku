@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <form method="post" action="/module/{{$module->id}}">
                <div class="col-md-8">
                    {{csrf_field()}}
                    {{ method_field('PUT') }}
                    <div class="panel panel-default">
                        <div class="panel-heading">Modules info</div>
                        <div class="panel-body">
                            <fieldset>
                                <legend>Module Name</legend>
                                <div class="form-group">
                                    <label for="module_name">Module Name</label>
                                    <input type="text" name="module_name" class="form-control"
                                           id="module_name"
                                           value="{{$module->name}}"
                                           placeholder="module name">
                                </div>
                            </fieldset>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Switches info
                            <button type="button" class="btn btn-primmary pull-right" id="setTemp">Set Temp 40</button>
                            <div class="clearfix"></div>
                        </div>
                        <div class="panel-body">
                            <fieldset>
                                @foreach($things as $thing)
                                    <div class="col-md-12">
                                        <div class="form-group col-md-6">
                                            <label for="{{$thing->key}}">{{$thing->key}}</label>
                                            <input type="text" name="{{$thing->key}}" class="form-control"
                                                   id="{{$thing->key}}"
                                                   value="{{$thing->name}}"
                                                   placeholder="module name">

                                        </div>
                                        <div class="form-group col-md-6">
                                            <label class="switch enabled" style="margin-top: 24px">
                                                <input type="checkbox" name="INT{{$thing->key}}"
                                                       id="{{$thing->key}}"
                                                       value="{{$thing->name}}"
                                                       placeholder="module name"
                                                       data-id="{{$thing->id}}"
                                                         {{
                                                        ($thing->latestValue->value == 0) ? "" : "checked=checked" }}
                                                       >
                                                <div class="slider round"></div>
                                            </label>
                                        </div>
                                    </div>

                                @endforeach

                            </fieldset>
                        </div>
                    </div>
                    <p class="text-center">
                        <button class="btn btn-primary">
                            Submit
                        </button>
                    </p>
                </div>
                <div class="col-md-4">
                    {{csrf_field()}}
                    {{ method_field('PUT') }}
                    <div class="panel panel-default">
                        <div class="panel-heading">Users</div>
                        <div class="panel-body">
                            @foreach($users as $user)
                                <div class="form-group">
                                    <label class="col-md-10" for="users">{{$user->name}} ({{$user->email}})</label>
                                    <div class="col-md-2">
                                        <input type="checkbox"
                                               @if(in_array($user->id,$moduleusers))
                                               checked
                                               @endif
                                               name="users[]"
                                               id="users"
                                               value="{{$user->id}}">
                                    </div>

                                    <div class="clearfix"></div>

                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    @include('ws')
@endsection
