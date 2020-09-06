@extends('dashboard.layouts.master')

@section('content')

    <div class="content-wrapper">

        <section class="content-header">

            <h1>@lang('admin.dashboard')</h1>

            <ol class="breadcrumb">
                <li class="active"><i class="fa fa-dashboard"></i> @lang('admin.dashboard')</li>
            </ol>
        </section>

        <section class="content">

            <div class="row">

                {{-- categories--}}
{{--                <div class="col-lg-3 col-xs-6">--}}
{{--                    <div class="small-box bg-aqua">--}}
{{--                        <div class="inner">--}}
{{--                            <h3>2</h3>--}}

{{--                            <p>@lang('admin.categories')</p>--}}
{{--                        </div>--}}
{{--                        <div class="icon">--}}
{{--                            <i class="fa fa-users"></i>--}}
{{--                        </div>--}}
{{--                        <a href="" class="small-box-footer">@lang('admin.read') <i class="fa fa-arrow-circle-right"></i></a>--}}
{{--                    </div>--}}
{{--                </div>--}}

{{--                <div class="col-lg-3 col-xs-6">--}}
{{--                    <div class="small-box bg-green">--}}
{{--                        <div class="inner">--}}
{{--                            <h3>3</h3>--}}

{{--                            <p>@lang('admin.products')</p>--}}
{{--                        </div>--}}
{{--                        <div class="icon">--}}
{{--                            <i class="ion ion-stats-bars"></i>--}}
{{--                        </div>--}}
{{--                        <a href="#" class="small-box-footer">@lang('admin.read') <i class="fa fa-arrow-circle-right"></i></a>--}}
{{--                    </div>--}}
{{--                </div>--}}

{{--                <div class="col-lg-3 col-xs-6">--}}
{{--                    <div class="small-box bg-red">--}}
{{--                        <div class="inner">--}}
{{--                            <h3>3</h3>--}}

{{--                            <p>@lang('admin.clients')</p>--}}
{{--                        </div>--}}
{{--                        <div class="icon">--}}
{{--                            <i class="fa fa-user"></i>--}}
{{--                        </div>--}}
{{--                        <a href="#" class="small-box-footer">@lang('admin.read') <i class="fa fa-arrow-circle-right"></i></a>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                --}}
{{--                <div class="col-lg-3 col-xs-6">--}}
{{--                    <div class="small-box bg-yellow">--}}
{{--                        <div class="inner">--}}
{{--                            <h3>1</h3>--}}

{{--                            <p>@lang('admin.users')</p>--}}
{{--                        </div>--}}
{{--                        <div class="icon">--}}
{{--                            <i class="fa fa-users"></i>--}}
{{--                        </div>--}}
{{--                        <a href="#" class="small-box-footer">@lang('admin.read') <i class="fa fa-arrow-circle-right"></i></a>--}}
{{--                    </div>--}}
{{--                </div>--}}

            </div><!-- end of row -->
            <div class="box box-solid">

                <div class="box-header">
                    <h3 class="box-title">Sales Graph</h3>
                </div>
                <div class="box-body border-radius-none">
                    <div class="chart" id="line-chart" style="height: 250px;"></div>
                </div>
                <!-- /.box-body -->
            </div>

        </section><!-- end of content -->

    </div><!-- end of content wrapper -->


@endsection

@push('footer')
{{--    <script>--}}

{{--        //line chart--}}
{{--        var line = new Morris.Line({--}}
{{--            element: 'line-chart',--}}
{{--            resize: true,--}}
{{--            data: [--}}
{{--                    @foreach ($sales_data as $data)--}}
{{--                {--}}
{{--                    ym: "{{ $data->year }}-{{ $data->month }}", sum: "{{ $data->sum }}"--}}
{{--                },--}}
{{--                @endforeach--}}
{{--            ],--}}
{{--            xkey: 'ym',--}}
{{--            ykeys: ['sum'],--}}
{{--            labels: ['@lang('admin.total')'],--}}
{{--            lineWidth: 2,--}}
{{--            hideHover: 'auto',--}}
{{--            gridStrokeWidth: 0.4,--}}
{{--            pointSize: 4,--}}
{{--            gridTextFamily: 'Open Sans',--}}
{{--            gridTextSize: 10--}}
{{--        });--}}
{{--    </script>--}}
@endpush
