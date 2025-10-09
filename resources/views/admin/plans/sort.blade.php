@extends('admin.partial.app')
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
<div class="container-fluid container-p-y">
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

            <h5 class="mb-3">Sort Plans</h5>
            <ul id="sortable-plans" class="list-group">
                @foreach($plans as $plan)
                    <li class="list-group-item d-flex justify-content-between align-items-center" data-id="{{ $plan->id }}">
                        <span>{{ $plan->plan_name }}</span>
                        <i class="fas fa-arrows-alt handle" style="cursor:grab;"></i>
                    </li>
                @endforeach
            </ul>

            <button id="saveOrder" class="btn btn-success mt-3">Save Order</button>

        </div>
    </div>
</div>



@endsection
@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Sortable/1.15.0/Sortable.min.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    const el = document.getElementById('sortable-plans');
    
    const sortable = Sortable.create(el, {
        handle: '.handle',
        animation: 150
    });

    document.getElementById('saveOrder').addEventListener('click', function() {
        let order = [];
        $('#sortable-plans li').each(function(index, li) {
            order.push({
                id: $(li).data('id'),
                position: index + 1
            });
        });

        $.ajax({
            url: "{{ route('admin.plans.updateOrder') }}",
            method: 'POST',
            data: {
                _token: "{{ csrf_token() }}",
                order: order
            },
            success: function(res) {
                alert('Order updated successfully!');
            },
            error: function(err) {
                alert('Something went wrong!');
            }
        });
    });
});
</script>

@endsection



