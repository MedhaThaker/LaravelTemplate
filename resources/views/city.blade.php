@extends('admin.layout.layout')
@section("content")

<!-- About us View Starts -->
<style>
    table tbody tr td:nth-child(1),
    table tbody tr td:nth-child(5),
    table tbody tr td:nth-child(6) {
        text-align: center;
    }

    .content-wrapper {
        min-height: 0px !important;
    }
</style>

<div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
        <div class="row no-margin">
            <div class="col-md-4 no-pad">
                <section class="content-header">
                    <h1>{{!empty($city) ? 'Edit' : 'Add';}} City
                    </h1>
                </section>

                <div class="box box-primary">
                    <div class="box-body left-box-body">
                        <div class="row">
                            <form method="post" id="city_form" action="{{route('city.store')}}" enctype="multipart/form-data">
                                @csrf
                                <div class="col-md-12 form-group ">
                                    <label>State<span style="color: red;">*</span></label>
                                    <input type="hidden" name="txtpkey" id="txtpkey" value="{{!empty($city->txtpkey) ? $city->txtpkey : '';}}">
                                    <select class="form-control" name="state_id" id="state_id" onChange="getDistricts(this.value)">
                                        <option value="">Select State</option>
                                        @if (!empty($states))
                                        @foreach ($states as $state_data)
                                        @if(!empty($city->state_id))
                                        <option value="{{$state_data->id}}" {{$state_data->id == $city->state_id ? 'selected' : '' }}>{{$state_data->state_name}}</option>
                                        @else
                                        <option value="{{$state_data->id}}">{{$state_data->state_name}}</option>
                                        @endif
                                        @endforeach
                                        @endif
                                    </select>
                                </div>
                                <div class="col-md-12 form-group ">
                                    <label>District<span style="color: red;">*</span></label>
                                    <select class="form-control" name="district_id" id="district_id" onChange="getCities(this.value)">
                                        <option value="">Select District</option>
                                        @if (!empty($districts))
                                        @foreach ($districts as $district_data)
                                        @if(!empty($city->district_id))
                                        <option value="{{$district_data->id}}" {{$district_data->id == $city->district_id ? 'selected' : '' }}>{{$district_data->district_name}}</option>
                                        @else
                                        <option value="{{$district_data->id}}">{{$district_data->state_name}}</option>
                                        @endif
                                        @endforeach
                                        @endif
                                    </select>
                                </div>
                                <div class="col-md-12 form-group">
                                    <label>City Name<span style="color: red;">*</span></label>
                                    <input type="text" name="city_name" id="city_name" autocomplete="off" class="form-control" value="{{!empty($city->city_name) ? $city->city_name : '';}}">
                                </div>


                                <div class="col-md-12 form-group">
                                    <button type="submit" id="submit_btn" class="btn btn-success" data-id="submit"><i class="fa fa-check-circle"></i> {{!empty($city) ? 'Edit' : 'Add';}}</button>
                                    <a href="{{url('admin/city')}}">
                                        <button type="button" class="btn btn-danger"><i class="fa fa-times-circle"></i> Cancel</button>
                                    </a>
                                </div>
                                <div class="clearfix"></div>
                            </form>
                        </div>
                    </div>
                    <!-- End box-body -->
                </div>
                <!-- End box -->
            </div>
            <div class="col-md-8 no-pad-right">
                <section class="content-header">
                    <h1>City List </h1>
                </section>
                <div class="box box-primary">
                    <div class="box-body">
                        <div class="row no-margin">
                            <div class="col-sm-12">
                                <div id="example_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer">
                                    <div class="row">
                                        <div class="col-sm-12 no-padd">
                                            <table id="example" class="table table-bordered dataTable no-footer" role="grid" aria-describedby="example_info" style="width: 709px;">
                                                <thead>
                                                    <tr role="row">
                                                        <th width="10%" class="">Sr No.</th>
                                                        <th width="20%" class="">State Name</th>
                                                        <th width="20%" class="">District Name</th>
                                                        <th width="28%" class="">City Name</th>
                                                        <th width="10%" class="text-center">Status</th>
                                                        <th width="12%" class="text-center">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End box -->
            </div>
        </div>
        <!-- /.row -->
    </section>
</div>

@endsection
@section('script')
<script src="{{ URL::asset('admin_panel/controller_js/cn_city.js')}}"></script>

<script type="text/javascript">
    $(".s_meun").removeClass("active");

    $(".master_active").addClass("active");
    $(".master_city_active").addClass("active");

    $('.clear_btn').on('click', function() {
        location.reload();
    });
</script>

@endsection