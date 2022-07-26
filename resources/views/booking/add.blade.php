@extends('layouts.app')

@section('title', 'Add Booking')




@section('content')

    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Add Booking</h1>
            <a href="{{route('booking.index')}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                    class="fas fa-arrow-left fa-sm text-white-50"></i> Back</a>
        </div>

        {{-- Alert Messages --}}
        @include('common.alert')
    
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Add New Booking</h6>
            </div>
            <form method="POST" action="{{route('booking.store')}}">
                @csrf
                <div class="card-body">
                    <div class="form-group row">

                        {{-- First Name --}}
                        <div class="col-sm-6">
                            <label>Thông tin dịch vụ</label>
                            <div class="mb-3 mt-3 ml-3 mb-sm-0">
                                <span style="color:red;">*</span>Loại Dịch vụ</label>
                                <select id="dichvu" class="form-control" name="dichvu">
                                    <option value="" selected="">Chọn Dịch vụ</option>																			
                                </select>
                            </div>
                            <div class="mb-3  mt-3 ml-3 mb-sm-0">
                                <span style="color:red;">*</span>Dịch vụ đi kèm 1</label>
                                <select id="dichvu1" class="form-control" name="dichvu1">
                                    <option value="" selected="">Chọn Dịch vụ</option>																			
                                </select>
                            </div>
                            <div class="mb-3 mt-3 ml-3 mb-sm-0">
                                <span style="color:red;">*</span>Dịch vụ đi kèm 2</label>
                                <select id="dichvu2" class="form-control" name="dichvu2">
                                    <option value="" selected="">Chọn Dịch vụ</option>																			
                                </select>
                            </div>
                            <div class="mb-3 mt-3 ml-3 mb-sm-0">
                                <span style="color:red;">*</span>Dịch vụ đi kèm 3</label>
                                <select id="dichvu3" class="form-control" name="dichvu3">
                                    <option value="" selected="">Chọn Dịch vụ</option>																			
                                </select>
                            </div>
                            <div class="mb-3 mt-3 ml-3 mb-sm-0">
                                <span style="color:red;">*</span>Dịch vụ đi kèm 4</label>
                                <select id="dichvu4" class="form-control" name="dichvu4">
                                    <option value="" selected="">Chọn Dịch vụ</option>																			
                                </select>
                            </div>
                            <div class="mb-3 mt-3 ml-3 mb-sm-0">
                                <span style="color:red;">*</span>Dịch vụ đi kèm 5</label>
                                <select id="dichvu5" class="form-control" name="dichvu5">
                                    <option value="" selected="">Chọn Dịch vụ</option>																			
                                </select>
                            </div>

                            <div class="container">
                                <div class="row">
                                  <div class="col">
                                    <label>Giờ bắt đầu</label>
                                    <input id="StartTime" type="time" name="StartTime" step="2">
                                  </div>
                                  <div class="col">
                                    <label>Giờ kết thúc</label>
                                    <input id="EndTime" type="time" name="EndTime" step="2">
                                  </div>
                                </div>
                            </div>
                            
                            <div class="mb-3 mt-3 ml-3 mb-sm-0">
                                <span style="color:red;">*</span>Ngày</label>
                                <input type="text" name="RangeDate" style="width:100%;height: calc(1.5em + 0.75rem + 2px);border: 1px solid #d1d3e2;
                                border-radius: 0.35rem;border: 1px solid #d1d3e2;"/>
                            </div>

                            <div class="mb-3 mt-3 ml-3 mb-sm-0">
                                <div class="select-size">
                                    <input type="radio" name="BookedDate2" id="thu2" style="display: none"/>
                                    <input type="radio" name="BookedDate3" id="thu3" style="display: none" />
                                    <input type="radio" name="BookedDate4" id="thu4"  style="display: none"/>
                                    <input type="radio" name="BookedDate5" id="thu5"  style="display: none"/>
                                    <input type="radio" name="BookedDate6" id="thu6"  style="display: none"/>
            
                                    <label for="thu2" style="border-radius:50%;
                                    display: inline-block;
                                    width: 50px;
                                    height: 50px;
                                    text-align: center;
                                    border: 1px solid #ddd;
                                    line-height: 50px;
                                    cursor: pointer;">T2</label>
                                    <label for="thu3" style="border-radius:50%;
                                    display: inline-block;
                                    width: 50px;
                                    height: 50px;
                                    text-align: center;
                                    border: 1px solid #ddd;
                                    line-height: 50px;
                                    cursor: pointer;">T3</label>
                                    <label for="thu4" style="border-radius:50%;
                                    display: inline-block;
                                    width: 50px;
                                    height: 50px;
                                    text-align: center;
                                    border: 1px solid #ddd;
                                    line-height: 50px;
                                    cursor: pointer;">T4</label>
                                    <label for="thu5" style="border-radius:50%;
                                    display: inline-block;
                                    width: 50px;
                                    height: 50px;
                                    text-align: center;
                                    border: 1px solid #ddd;
                                    line-height: 50px;
                                    cursor: pointer;">T5</label>
                                    <label for="thu6" style="border-radius:50%;
                                    display: inline-block;
                                    width: 50px;
                                    height: 50px;
                                    text-align: center;
                                    border: 1px solid #ddd;
                                    line-height: 50px;
                                    cursor: pointer;">T6</label>
                                </div>
                            </div>
                            
                            <div class="mb-3 mt-3 ml-3 mb-sm-0">
                                <span style="color:red;">*</span>Tổng Cộng</label>
                                <input 
                                    type="text" 
                                    class="form-control form-control-user" 
                                    id="Total"
                                    placeholder="Thành Tiền" 
                                    name="Total" >
                            </div>

                            <label class="mt-3">Thông tin khách hàng </label>
                            <div class="mb-3 mt-3 ml-3 mb-sm-0">
                                <span style="color:red;">*</span>Số Điện Thoại</label>
                                <input 
                                    type="text" 
                                    class="form-control form-control-user " 
                                    id="Phone"
                                    placeholder="Thành Tiền" 
                                    name="Phone" 
                                    >

            
                            </div>

                            <div class="mb-3 mt-3 ml-3 mb-sm-0">
                                <span style="color:red;">*</span>Họ và Tên</label>
                                <input 
                                    type="text" 
                                    class="form-control form-control-user " 
                                    id="HoTen"
                                    placeholder="Thành Tiền" 
                                    name="HoTen" 
                                    >

                            </div>

                            <div class="mb-3 mt-3 ml-3 mb-sm-0">
                                <span style="color:red;">*</span>Địa chỉ đặt</label>
                                <div class="container">
                                    <div class="row">
                                      <div class="col mb-3">
                                        
                                            <input 
                                            type="text" 
                                            class="form-control form-control-user" 
                                            id="Address"
                                            placeholder="Tên Đường"
                                            name="Address" >
                                      </div>
                                      <div class="col mb-3">
                                        
                                        <select id="phuong" class="form-control" name="phuong">
                                            <option value="phường 25" selected="">phường 25</option>																			
                                        </select>
        
                                      </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            
                                            <select id="quan" class="form-control" name="quan">
                                                <option value="Quận Bình Thạnh" selected="">Quận Bình Thạnh</option>																			
                                            </select>
            
                                        </div>
                                        <div class="col">
                                             
                                            <select id="thanhpho" class="form-control" name="thanhpho">
                                                <option value="Thành Phố Hồ Chí Minh" selected="">Thành Phố Hồ Chí Minh</option>																			
                                            </select>
            
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                        


                        <div class="col-sm-6">
                            <label>Ghi chú cho Maid </label>
                            <div class="mb-3 mt-2 mb-sm-0">
                                <input 
                                    style="height:130px"
                                    type="text" 
                                    class="form-control form-control-user " 
                                    id="Note" 
                                    name="Note" 
                                    >
                            </div>

                            <label class="mt-3">Chọn hình thức thanh toán</label>
                            <div class="mb-3 mb-sm-0">
                                <span style="color:red;">*</span>Loại Dịch vụ</label>
                                <select id="dichvu" class="form-control" name="dichvu">
                                    <option value="" selected="">Chọn Dịch vụ</option>																			
                                </select>
                            </div>

                            <label class="mt-3">Cài giờ hẹn</label>
                            <div class="container">
                                <div class="row">
                                  <div class="col">
                                    <label>Giờ hẹn thanh toán</label>
                                  </div>
                                  <div class="col">
                                </div>
                                <div class="col">
                                </div>
                                </div>
                            </div>
                            <div class="container">
                                <div class="row">
                                  <div class="col">
                                    <label>Giờ hẹn huỷ</label>
                                  </div>
                                  <div class="col">
                                </div>
                                <div class="col">
                                </div>
                                </div>
                            </div>
                        </div>

                        {{-- Status --}}
                        {{-- <div class="col-sm-6 mb-3 mt-3 mb-sm-0">
                            <span style="color:red;">*</span>Status</label>
                            <select class="form-control form-control-user @error('status') is-invalid @enderror" name="status">
                                <option selected disabled>Select Status</option>
                                <option value="1" selected>Active</option>
                                <option value="0">Inactive</option>
                            </select>
                            @error('status')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div> --}}

                    </div>
                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-success btn-user float-right mb-3">Save</button>
                    <a class="btn btn-primary float-right mr-3 mb-3" href="{{ route('booking.index') }}">Cancel</a>
                </div>
            </form>
        </div>

    </div>

@stop
<style>
    #thu2:checked ~ label[for="thu2"],
    #thu3:checked ~ label[for="thu3"],
    #thu4:checked ~ label[for="thu4"],
    #thu5:checked ~ label[for="thu5"],
    #thu6:checked ~ label[for="thu6"] {
    background: #999;
    color: #fff;
    }
</style>
@push('scripts')
    <script src="{{asset('moment/moment.min.js')}}"></script>
    <script src="{{asset('daterangepicker/daterangepicker.js')}}"></script>
    <script>
    $(document).ready(function(){
        $(function() {
            $('input[name="RangeDate"]').daterangepicker({
                opens: 'left'
            }, function(start, end, label) {
                console.log("A new date selection was made: " + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));
            });
        });
    });
    </script>
@endpush


