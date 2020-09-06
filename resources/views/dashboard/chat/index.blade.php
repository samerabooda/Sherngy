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
                @lang('admin.chat')
                {{--                <small>Preview</small>--}}
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> @lang('admin.home')</a></li>
                <li><a href="#">@lang('admin.chat')</a></li>
{{--                <li class="active">@lang('admin.addTOChat')</li>--}}
            </ol>
        </section>

        <section class="content">

            <div class="row">
                <div class="col-md-12">

                    <div class="box box-primary">
                        <div class="box-header">
                            @if(auth()->user()->hasPermission('chat_create'))
                                <a href="{{route('chat.create')}}" class="btn btn-primary btn-sm pull-right"><i class="fa fa-plus"></i>@lang('admin.addedcreate')</a>
                            @else
                                <button class="btn btn-primary btn-sm disabled">@lang('admin.addedcreate')</button>
                            @endif
                            {{--                                    <h3 class="box-title">Input masks</h3>--}}
                        </div>

                        <div class="box-body">

                            <table id="chat" class="table table-striped table-bordered" style="width:100%">
                            </table>

                        </div>
                    </div>


                </div>
                <!-- /.col (left) -->

                <!-- /.col (right) -->
            </div>
            <!-- /.row -->




        </section><!-- end of content -->

    </div><!-- end of content wrapper -->


@endsection
@push('footer')
    <script>
        $(document).ready(function() {
            var table = $('#chat').DataTable({
                responsive: true,
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ route('chat.index') }}",
                    type: 'GET',
                },
                // select: true,
                columns: [
                    {data: 'id', name: 'id' ,title:'id'},
                    {data: 'header', name: 'header',title: "@lang('admin.mainTitle')" },
                    {data: 'action', name: 'action',title:'action' ,searchable: 'false'},
                    // {data: 'add_lang', name: 'add_lang',title:'add_lang' ,searchable: 'false'}
                ]
            });


            {{--$('body').on('submit','#addform',function (e) {--}}
            {{--    e.preventDefault();--}}
            {{--    // alert('asdasd');--}}
            {{--    $.ajax({--}}
            {{--        url: '{{ route('categories.store') }}',--}}
            {{--        method: "post",--}}
            {{--        data: new FormData(this),--}}
            {{--        dataType: 'json',--}}

            {{--        cache       : false,--}}
            {{--        contentType : false,--}}
            {{--        processData : false,--}}

            {{--        success: function (response) {--}}
            {{--            if(response.status == 'failed'){--}}
            {{--                $.each(response.error, function( index, value ) {--}}
            {{--                    for (var i=0 ; i<=value.length ; i++){--}}
            {{--                        $('#error').show();--}}
            {{--                        $('#error').append(value[i]);--}}
            {{--                    }--}}
            {{--                });--}}
            {{--            }else{--}}
            {{--                $('#error').hide();--}}
            {{--                if(response.status == 'success'){--}}
            {{--                    new Noty({--}}
            {{--                        type: 'success',--}}
            {{--                        layout: 'topRight',--}}
            {{--                        text: "@lang('admin.successfuly_added')",--}}
            {{--                        timeout: 2000,--}}
            {{--                        killer: true--}}
            {{--                    }).show();--}}
            {{--                }--}}
            {{--                table.ajax.reload();--}}
            {{--                $("#addform")[0].reset();--}}
            {{--            }--}}
            {{--            // window.location.reload();--}}
            {{--        },--}}

            {{--    });--}}
            {{--});--}}



            $('body').on('submit','#delform',function (e) {
                e.preventDefault();
                var url = $(this).attr('action');
                // alert(url);

                $.ajax({
                    url: url,
                    method: "delete",
                    data: {
                        _token: '{{ csrf_token() }}',
                    },
                    success: function (response) {

                        if (response.status == 'success'){
                            new Noty({
                                type: 'success',
                                layout: 'topRight',
                                text: "تم الحذف بنجاح",
                                timeout: 2000,
                                killer: true
                            }).show();
                            table.ajax.reload();
                        }
                        // console.log(response);
                        // window.location.reload();
                    }
                });
            });



        });


    </script>


@endpush
