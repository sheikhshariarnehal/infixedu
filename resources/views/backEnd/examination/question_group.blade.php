@extends('backEnd.master')
@section('title')
@lang('exam.question_group')
@endsection
@section('mainContent')
<section class="sms-breadcrumb mb-20">
    <div class="container-fluid">
        <div class="row justify-content-between">
            <h1>@lang('exam.question_group')</h1>
            <div class="bc-pages">
                <a href="{{route('dashboard')}}">@lang('common.dashboard')</a>
                <a href="#">@lang('exam.examinations')</a>
                <a href="#">@lang('exam.question_group')</a>
            </div>
        </div>
    </div>
</section>
<section class="admin-visitor-area up_st_admin_visitor">
    <div class="container-fluid p-0">
        @if(isset($group))
        @if(userPermission('question-group-store'))

        <div class="row">
            <div class="offset-lg-10 col-lg-2 text-right col-md-12 mb-20">
                <a href="{{route('question-group')}}" class="primary-btn small fix-gr-bg">
                    <span class="ti-plus pr-2"></span>
                    @lang('common.add')
                </a>
            </div>
        </div>
        @endif
        @endif
        <div class="row">
            
            <div class="col-lg-4">
                <div class="row">
                    <div class="col-lg-12">
                        @if(isset($group))
                        {{ Form::open(['class' => 'form-horizontal', 'files' => true, 'route' => array('question-group-update',@$group->id), 'method' => 'PUT', 'enctype' => 'multipart/form-data']) }}
                        @else
                        @if(userPermission('question-group-store'))

                        {{ Form::open(['class' => 'form-horizontal', 'files' => true, 'route' => 'question-group-store',
                        'method' => 'POST', 'enctype' => 'multipart/form-data']) }}
                        @endif
                        @endif
                        <div class="white-box">
                            <div class="main-title">
                                <h3 class="mb-15">@if(isset($group))
                                        @lang('exam.edit_question_group')
                                    @else
                                        @lang('exam.add_question_group')
                                    @endif
                                   
                                </h3>
                            </div>
                            <div class="add-visitor">
                                
                                <div class="row">
                                    <div class="col-lg-12">
                                       
                                        <div class="primary_input">
                                            <label class="primary_input_label" for="">@lang('exam.title') <span class="text-danger"> *</span></label>
                                            <input class="primary_input_field "
                                                type="text" name="title" autocomplete="off" value="{{isset($group)? $group->title:''}}">
                                            <input type="hidden" name="id" value="{{isset($group)? $group->id: ''}}">
                                            
                                            
                                            @if ($errors->has('title'))
                                            <span class="text-danger" >
                                                {{ $errors->first('title') }}
                                            </span>
                                            @endif
                                        </div>
                                        
                                    </div>
                                </div>
                				@php 
                                  $tooltip = "";
                                  if(userPermission('question-group-store') || userPermission('question-group-edit')){
                                        $tooltip = "";
                                    }else{
                                        $tooltip = "You have no permission to add";
                                    }
                                @endphp
                                <div class="row mt-40">
                                    <div class="col-lg-12 text-center">
                                        <button class="primary-btn fix-gr-bg submit" data-toggle="tooltip" title="{{$tooltip}}">
                                            <span class="ti-check"></span>
                                            @if(isset($group))
                                                @lang('exam.update_group')
                                            @else
                                                @lang('exam.save_group')
                                            @endif
                                          
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{ Form::close() }}
                    </div>
                </div>
            </div>

            
            <div class="col-lg-8">
                <div class="white-box">
                    <div class="row">
                        <div class="col-lg-4 no-gutters">
                            <div class="main-title">
                                <h3 class="mb-15">@lang('exam.question_group_list')</h3>
                            </div>
                        </div>
                    </div>
    
                    <div class="row">
                        <div class="col-lg-12">
                            <x-table>
                            <table id="table_id" class="table" cellspacing="0" width="100%">
    
                                <thead>
                                   
                                    <tr>
                                        <th>@lang('exam.title')</th>
                                        <th>@lang('common.action')</th>
                                    </tr>
                                </thead>
    
                                <tbody>
                                    @foreach($groups as $group)
                                    <tr>
                                        <td>{{$group->title}}</td>
                                        <td>
                                            <x-drop-down>
                                                   @if(userPermission('question-group-edit'))
    
                                                   <a class="dropdown-item" href="{{route('question-group-edit', [$group->id
                                                        ])}}">@lang('common.edit')</a>
                                                   @endif
                                                   @if(userPermission('question-group-delete'))
    
                                                   <a class="dropdown-item" data-toggle="modal" data-target="#deleteQuestionGroupModal{{$group->id}}"
                                                        href="#">@lang('common.delete')</a>
                                               @endif
                                            </x-drop-down>
                                        </td>
                                    </tr>
                                    <div class="modal fade admin-query" id="deleteQuestionGroupModal{{$group->id}}" >
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title">@lang('exam.delete_question_group')</h4>
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                </div>
    
                                                <div class="modal-body">
                                                    <div class="text-center">
                                                        <h4>@lang('common.are_you_sure_to_delete')</h4>
                                                    </div>
    
                                                    <div class="mt-40 d-flex justify-content-between">
                                                        <button type="button" class="primary-btn tr-bg" data-dismiss="modal">@lang('common.cancel')</button>
                                                         {{ Form::open(['route' => array('question-group-delete',$group->id), 'method' => 'DELETE', 'enctype' => 'multipart/form-data']) }}
                                                        <button class="primary-btn fix-gr-bg" type="submit">@lang('common.delete')</button>
                                                         {{ Form::close() }}
                                                    </div>
                                                </div>
    
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </tbody>
                            </table>
                            </x-table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@include('backEnd.partials.data_table_js')
