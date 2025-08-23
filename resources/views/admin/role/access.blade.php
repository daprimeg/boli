@extends('admin.partial.app')
@push('title') Access Role @endpush
@section('css')
<style>

   .form-label{
         padding-top: 18px;
         padding-bottom: 6px;
         font-size: 15px;
   }

   .ck-editor__editable {
        min-height: 300px !important;
    }
</style>


<style>
    /* Accordion Parent Header */
    .accordion-button {
        font-weight: 600;
        font-size: 16px;
   
        transition: all 0.3s ease;
    }
    .accordion-button:not(.collapsed) {
      
        color: white;
        box-shadow: none;
    }
    .accordion-button:focus {
        box-shadow: none;
    }

    /* Accordion Container */
    .accordion-item {
        border-radius: 8px;
        overflow: hidden;
        border: 1px solid #dee2e6;
        margin-bottom: 10px;
        box-shadow: 0px 2px 5px rgba(0,0,0,0.05);
    }

    /* Accordion Body */
    .accordion-body {
        padding: 15px 20px;
      
    }

    /* Checkbox styling */
    .form-check {
        margin-bottom: 8px;
        padding-left: 1.8rem;
    }


    /* Save Button */
    .btn-primary {
        padding: 8px 25px;
        border-radius: 25px;
        font-weight: 500;
    }
    .fake-disabled {
    pointer-events: auto; /* still clickable */
    opacity: 0.5;
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

                <div class="card">
                    <div class="card-header border-bottom">
                        <div class="row">
                            <div class="col-md-6">
                                <h5 class="card-title">Access Role</h5>
                            </div>
                        
                    </div>
                    <div class="card-body">

@php
    // Helper to check permission
    function hasPermission($savedPermissions, $menuId, $childId, $perm) {
        return !empty($savedPermissions[strtolower($menuId)][strtolower($childId)]) &&
               in_array($perm, $savedPermissions[strtolower($menuId)][strtolower($childId)]);
    }
@endphp

            <form id="accessForm">
                @csrf
                <input type="hidden" name="role_id" value="{{ $role->id }}">

                <div class="accordion" id="menuAccordion">
                    @foreach($menus as $index => $menu)
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="heading{{ $index }}">
                                <button class="accordion-button collapsed" type="button" 
                                    data-bs-toggle="collapse" data-bs-target="#collapse{{ $index }}" 
                                    aria-expanded="false" aria-controls="collapse{{ $index }}">
                                    {{ $menu['name'] }}
                                </button>
                            </h2>
                            <div id="collapse{{ $index }}" class="accordion-collapse collapse">
                                <div class="accordion-body">
                                    @if(!empty($menu['children']))
                                        <table class="table table-bordered table-sm align-middle">
                                            <thead>
                                                <tr>
                                                    <th>Menu</th>
                                                    <th class="text-center">View</th>
                                                    <th class="text-center">Add</th>
                                                    <th class="text-center">Edit</th>
                                                    <th class="text-center">Delete</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($menu['children'] as $child)
                                                    <tr>
                                                        <td class="menu-row-click" style="cursor: pointer;">
                                                            {{ $child['name'] }}
                                                        </td>
                                                        @foreach(['view', 'add', 'edit', 'delete'] as $perm)
                                                            <td class="text-center">
                                                                <input type="checkbox" 
                                                                    name="permissions[{{ strtolower($menu['id']) }}][{{ strtolower($child['id']) }}][]" 
                                                                    value="{{ $perm }}"
                                                                    @if(hasPermission($savedPermissions, $menu['id'], $child['id'], $perm)) checked @endif>
                                                            </td>
                                                        @endforeach
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="text-center pt-3">
                    <button type="submit" class="btn btn-primary">Save Access</button>
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

$(document).ready(function () {


    $('tbody tr').each(function () {
        toggleRowPermissions($(this));
    });


    $(document).on('change', 'input[value="view"]', function () {
        toggleRowPermissions($(this).closest('tr'));
    });

    $(document).on('click', 'input[value="add"], input[value="edit"], input[value="delete"]', function (e) {
        let row = $(this).closest('tr');
        let viewCheckbox = row.find('input[value="view"]');
 

        if (!viewCheckbox.is(':checked')) {
            e.preventDefault();
   
            toastr.error('You need to enable "View" before selecting other permissions.', 'Permission Required');
            return false;
        }
    });


    $(document).on('click', '.menu-row-click', function () {
        let row = $(this).closest('tr');
        let checkboxes = row.find('input[type="checkbox"]');

        let enabledCheckboxes = checkboxes.filter(':not(:disabled)');
        let allChecked = enabledCheckboxes.length && enabledCheckboxes.filter(':checked').length === enabledCheckboxes.length;

        enabledCheckboxes.prop('checked', !allChecked);
        toggleRowPermissions(row);
    });

 
function toggleRowPermissions(row) {
    let viewChecked = row.find('input[value="view"]').is(':checked');
    let actionCheckboxes = row.find('input[value="add"], input[value="edit"], input[value="delete"]');

    // Remove real disable, only visually indicate
    if (!viewChecked) {
        actionCheckboxes.addClass('fake-disabled').prop('checked', false);
    } else {
        actionCheckboxes.removeClass('fake-disabled');
    }
}

});



    $('#accessForm').on('submit', function (e) {
        e.preventDefault();

        $.ajax({
            url: "{{ url('/admin/role/access/store') }}",
            type: "POST",
            data: $(this).serialize(),
            success: function (response) {
                 toastr.success('Access permissions saved successfully!');
            },
            error: function (xhr) {
                 console.error(xhr.responseText);
            }
        });
    });
</script>
    @endsection
