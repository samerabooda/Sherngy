@extends('dashboard.layouts.master')
@push('css')
    <style>
        .bootstrap-tagsinput{
            width: 100%;
        }
    </style>

    @endpush
@section('content')


    <div class="content-wrapper">

        <section class="content-header">
            <h1>
                @lang('admin.addTOChat')
{{--                <small>Preview</small>--}}
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> @lang('admin.home')</a></li>
                <li><a href="#">@lang('admin.chat')</a></li>
                <li class="active">@lang('admin.addTOChat')</li>
            </ol>
        </section>

        <section class="content">

                    <div class="row">
                        <div class="col-md-12">

                            <div class="box box-primary">
                                <div class="box-header">
{{--                                    <h3 class="box-title">Input masks</h3>--}}
                                </div>

                                <form action="{{route('chat.store')}}" method="post" data-parsley-validate>
                                    @csrf
                                    @method('post')
                                <div class="box-body">
                                    <!-- Date dd/mm/yyyy -->
                                    <div class="form-group">
                                        <label>@lang('admin.mainTitle')</label>

                                        <div class="form-group">
                                            <input type="text" class="form-control" name="header" required>
                                        </div>
                                    </div>

                                        <div class="form-group">
                                            <label>@lang('admin.answers')</label>

                                            <textarea class="form-control ckeditor" name="answer" required></textarea>
                                        </div>
                                        <!-- /.input group -->

                                        <div class="form-group">
                                            <label>@lang('admin.place')</label>
                                            <select name="parent_id" id="" class="form-control" required>
                                                <option value="0">@lang('admin.ChoosemainTitle')</option>
                                                @foreach($header as $head)
                                                    <option value="{{$head->id}}">{{$head->header}}</option>
                                                    @endforeach
                                            </select>
                                        </div>


                                    <div class="form-group">
                                        <p>@lang('admin.RelatedKeywords')</p>
                                        <input type="text" class="form-control" name="headerTranslations" data-role="tagsinput" style="width: 900px">
                                    </div>
                                    <!-- /.form group -->
                                    <div class="form-group">
                                        <input type="submit" class="btn btn-info" value="@lang('admin.save')">
                                    </div>
                                </div>
                                <!-- /.box-body -->


                                </form>
                            </div>
                            <!-- /.box -->


                            <!-- /.box -->

                        </div>
                        <!-- /.col (left) -->

                        <!-- /.col (right) -->
                    </div>
                    <!-- /.row -->




        </section><!-- end of content -->

    </div><!-- end of content wrapper -->


@endsection
