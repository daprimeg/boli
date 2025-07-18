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
 <div class="container-fluid flex-grow-1 container-p-y">
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

            <div class="card ">
               <div class="card-header border-bottom">
                  <h5 class="card-title">Create Auction</h5>
               </div>
               <div class="card-body ">

                  <form class="pt-3" method="POST" action="{{ url('/admin/auctions') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="row">
                           <div class="col-md-4">
                                 <div class="form-group mb-3">
                                    <label class="form-label" for="auction_type">Auction Type</label>
                                    <select name="auction_type" id="auction_type" class="form-control" required>
                                       <option value="">-- Select Auction Type --</option>
                                       <option value="Online Auction" {{ old('auction_type') == 'Online Auction' ? 'selected' : '' }}>Online Auction</option>
                                       <option value="Time Auction" {{ old('auction_type') == 'Time Auction' ? 'selected' : '' }}>Time Auction</option>
                                    </select>
                                 </div>
                           </div>
                           <div class="col-md-4">
                              <div class="form-group">
                                 <label class="form-label" >Name <span class="text-danger" >*</span></label>
                                 <input type="text" name="name" value="{{ old('name') }}" class="form-control" required>
                              </div>
                           </div>       
                           <div class="col-md-4">
                              <div class="form-group mb-3">
                                 <label class="form-label" for="platform_id">Auction Platform</label>
                                 <select name="platform_id" id="platform_id" class="form-control" required>
                                    <option value="">-- Select Platform --</option>
                                    @foreach($platforms as $platform)
                                       <option value="{{ $platform->id }}" {{ old('platform_id') == $platform->id ? 'selected' : '' }}>
                                          {{ $platform->name }}
                                       </option>
                                    @endforeach
                                 </select>
                              </div>
                           </div>
                            <div class="col-md-4">
                              <div class="form-group ">
                                 <label class="form-label" for="platform_id">Status</label>
                                 <select name="status" class="form-select form-select-sm status-dropdown" >
                                 <option value=""> --Status--</option>
                                 <option value="Planned" {{ $auction->status == 'Planned' ? 'selected' : '' }}>Planned</option>
                                 <option value="In Progress" {{ $auction->status =='In Progress' ? 'selected' : '' }}>InProgress</option>
                                 <option value="update" {{ $auction->status =='update' ? 'selected' : '' }}>Update</option>
                                 <option value="cancel" {{ $auction->status =='cancel' ? 'selected' : '' }}>Cancel</option>
                              </select>
                              </div>
                           </div>
                           <div class="col-md-4">
                              <div class="form-group">
                                 <label class="form-label">Date</label>
                                 <input type="datetime-local" name="auction_date" value="{{ old('auction_date') }}" class="form-control" required>
                              </div>
                           </div>
                           <div class="col-md-4 end_date">
                              <div class="form-group">
                                 <label class="form-label">End Date</label>
                                 <input type="datetime-local" name="end_date" value="{{ old('end_date') }}" class="form-control" />
                              </div>
                           </div>
                           <div class="col-md-4">
                                 <div class="form-group mb-3">
                                    <label class="form-label" for="csv_path">Upload CSV</label>
                                    <input type="file" name="csv_path" class="form-control" accept=".csv">
                                 </div>
                           </div>
                        </div>
                        <div class="text-center" > 
                           <button type="submit" class="btn btn-primary">Create</button>
                        </div>
                     </form>
               </div>
            </div>
            {{-- Card --}}

         </div>
   </div>
</div>


@endsection
@section('js')
      <script>
         document.addEventListener("DOMContentLoaded", function () {

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