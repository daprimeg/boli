@extends('admin.partial.app')
@push('title') Auctions @endpush 
@section('css')

<style>
   .form-label{
         padding-top: 18px;
         padding-bottom: 6px;
         font-size: 15px;
   }
</style>

@endsection
@section('content')

<div class="container-xxl flex-grow-1 container-p-y">
     <div class="row g-6"> 
         <div class="col-md-12">

            @if($errors->any())
               <div class="alert alert-danger">
                  <ul class="mb-0">
                     @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                     @endforeach
                  </ul>
               </div>
            @endif

            <div class="card">
                  <div class="card-header border-bottom">
                     <h5 class="card-title">Edit Auction</h5>
                  </div>
                  <div class="card-body">
                     <form class="pt-3" method="POST" action="{{ url('/admin/auctions/'.$auction->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="row">

                           <div class="col-md-4">
                              <div class="form-group">
                                 <label class="form-label" for="auction_type">Auction Type</label>
                                 <select name="auction_type" id="auction_type" class="form-control" required>
                                    <option value="">-- Select Auction Type --</option>
                                    <option value="Online Auction" 
                                          {{ old('auction_type', $auction->auction_type) == 'Online Auction' ? 'selected' : '' }}>
                                          Online Auction
                                    </option>
                                    <option value="Time Auction" 
                                          {{ old('auction_type', $auction->auction_type) == 'Time Auction' ? 'selected' : '' }}>
                                          Time Auction
                                    </option>
                                 </select>
                              </div>
                           </div>

                           <div class="col-md-4">
                              <div class="form-group">
                                 <label class="form-label" >Name</label>
                                 <input type="text" name="name" value="{{ old('name', $auction->name) }}" class="form-control" required>
                              </div>
                           </div>

                           <div class="col-md-4">
                              <div class="form-group ">
                                 <label class="form-label" for="platform_id">Platform</label>
                                 <select name="platform_id" id="platform_id" class="form-control" required>
                                    <option value="">-- Select Platform --</option>
                                    @foreach($platforms as $platform)
                                       <option value="{{ $platform->id }}" {{ old('platform_id', $auction->platform_id) == $platform->id ? 'selected' : '' }}>
                                          {{ $platform->name }}</option>
                                    @endforeach
                                 </select>
                              </div>
                           </div>
                           <div class="col-md-4">
                              <div class="form-group ">
                                 <label class="form-label" for="platform_id">Status</label>
                                 <select name="status" class="form-control status-dropdown" >
                                 <option value=""> --Select Status-- </option>
                                 <option value="Planned" {{ $auction->status == 'Planned' ? 'selected' : '' }}>Planned</option>
                                 <option value="In Progress" {{ $auction->status =='In Progress' ? 'selected' : '' }}>InProgress</option>
                                 <option value="Update" {{ $auction->status =='Update' ? 'selected' : '' }}>Update</option>
                                 <option value="Cancel" {{ $auction->status =='Cancel' ? 'selected' : '' }}>Cancel</option>
                                 {{-- <option value="updated" {{ $auction->status == 'updated' ? 'selected' : '' }}>Updated</option>
                                 <option value="cancel" {{ $auction->status == 'cancel' ? 'selected' : '' }}>Cancel</option> --}}
                              </select>
                              </div>
                           </div>

                           <div class="col-md-4">
                              <div class="form-group">
                                 <label class="form-label">Date</label>
                                 <input type="datetime-local" name="auction_date" value="{{ old('auction_date', $auction->auction_date) }}" class="form-control" required>
                              </div>
                           </div>

                           <div class="col-md-4 end_date">
                              <div class="form-group">
                                 <label class="form-label">End Date</label>
                                 <input type="datetime-local" name="end_date" value="{{ old('end_date', $auction->end_date) }}" class="form-control" />
                              </div>
                           </div>

                           <div class="col-md-4">
                              <div class="">
                                 <label class="form-label" for="csv_path">Auction CSV File (optional)</label>
                                 <input type="file" name="csv_path" id="csv_path" class="form-control">
                                 @if($auction->csv_path)
                                    <small class="d-block mt-1">
                                       Current File:
                                       <a href="{{URL::to('/admin/auctions/viewCsv/'.$auction->id)}}" target="_blank">View CSV</a>
                                    </small>
                                 @endif
                              </div>
                           </div>

                        </div>
                        <div class="text-center pt-4" > 
                           <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                     </form>
                  </div>
            </div>
      </div>
   </div>
</div>

@endsection
@section('js')
      <script>
            document.addEventListener("DOMContentLoaded", function () {
               
               const platformSelect = document.getElementById('platform_id');
               $('select[name=auction_type]').change(function (e) { 
               
                  if($(this).val() == "Online Auction"){
                        $('.end_date input').val('').prop('required', false);
                        $('.end_date').hide();
                  }else{
                     $('.end_date').show();
                     $('.end_date input').show().prop('required', true);
                  }
                  
               }).trigger('change');
               

            });
      </script>
@endsection





