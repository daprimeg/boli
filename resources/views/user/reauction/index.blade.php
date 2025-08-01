@extends('admin.partial.app')
@push('title') Reauction @endpush
@section('css')
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">

<style>
   .dataTables_length{
      display:none!important;
   }

   .table{
    width: 100%!important;
   }

   .dataTables_info{
      /* display: inline!important; */
   }

   .datatables-products th {
      text-align: center;
   }
   .datatables-products td {
      text-align: center;
   }

   .table-responsive {
      overflow-x: auto!important;
      -webkit-overflow-scrolling: touch!important;
   }

 
        .custom-btn {
            background-color: #1e3a8a;
            color: #fff;
            border: none;
            padding: 5px 15px;
            font-size: 14px;
            border-radius: 3px;
        }
        .custom-btn:hover {
            background-color: #1e40af;
        }
        .custom-btn::after {
            display: inline-block;
            margin-left: 5px;
            vertical-align: middle;
            content: "▼";
            font-size: 10px;
        }
        .dropdown-menu {
            background-color: #1e3a8a;
            border: none;
            border-radius: 3px;
        }
        .dropdown-item {
            color: #fff;
            padding: 5px 15px;
        }
        .dropdown-item:hover {
            background-color: #2a2a40;
        }

</style>

{{-- Top bar Css --}}
<style>
        .stats-card {
            background: #570303;
            padding: 10px;
            text-align: center;
            box-shadow: 0 4px 15px rgba(220, 53, 69, 0.3);
        }

        .stats-number {
            font-size: 2.5rem;
            font-weight: bold;
            margin: 0;
        }

        .stats-label {
            font-size: 0.9rem;
            opacity: 0.9;
            margin: 0;
        }

        .platform-info {
           
            border-radius: 8px;
            padding: 15px;
            backdrop-filter: blur(10px);
        }


        .platform-details {
            font-size: 0.75rem;
            opacity: 0.8;
            line-height: 1.4;
        }



        .badge-box {
                display: inline-block;
                padding: 4px 10px;
                margin-left: 6px;
                font-size: 14px;
                color: #fff;
                background-color: rgba(255, 255, 255, 0.1);
                border: 1px solid rgba(255, 255, 255, 0.2);
                border-radius: 6px;
            }

            .platform-badges {
                display: flex;
                flex-wrap: wrap;
                gap: 10px;
                overflow: hidden;
                height: 20px;
            }

            .platform-badge {
                padding: 1px 16px;
                border-radius: 8px;
                color: white;
                border: 1px solid #570303;
                transition: all 0.3s ease;
                border-radius: 4px;
                font-size: 10px;
                font-weight: 600;
              
            }
                .platform-badge.active {
                border: 2px solid #570303;
                color: white;
                background-color: #570303;
                box-shadow: 0 0 10px rgba(220, 53, 69, 0.4);
            }

            .platform-badges:hover {
                min-width: auto;
                height: auto;
                overflow: inherit;
                }

                .platefrom_mar{
                    margin-top: 9px;
                }
                @media only screen and (max-width: 576px) {
                  
                    .inner-tag{
                        flex-direction: column;
                        gap: 2px;
                        margin-top: 5px;
                    }
                    .platefrom_mar{
                        margin-top: 0px;
                    }
                 
                }

    </style>
@endsection
@section('content')
  @include('user.reauction.topfilters')

<div class="container-fluid container-p-y">
      <div class="row g-6"> 
            <div class="col-md-12">

                 @if(session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                  @endif

                        <div class="card">
                    
                            
                        <div class="card-header">
                            <div class="row">
                                <div class="col-md-6">
                                    <h5 class="card-title ">Reauction Details</h5>
                            </div>
                                
                        </div>
               
                        <div class="row pt-5">
                            <div class="col-md-8">
                                <select style="max-width:200px;padding:5px;"  name="length" class="">
                                    <option value="10">10</option>
                                    <option value="100">100</option>
                                    <option value="200">200</option>
                                    <option value="500">500</option>
                                </select>
                                <span style="padding-left: 5px" class="pl-2 pageinfo">0</span>
                        </div>


                        <div class="col-md-4 text-end">
                              <div class="container-fluid">
                                    <div class="row custom-nav">
                                        <div class="col-md-4 mt-2">
                                            <div class="nav-item">
                                                <input type="checkbox" name="" id="">
                                                <label>Inprogress</label>
                                            </div>
                                        </div>
                                        <div class="col-md-4 text-center">
                                            <input type="text" class="form-control" placeholder="Search by Reg" />
                                        </div>
                                      <div class="col-md-4 text-end mt-1">
                                            <div class="row custom-dropdown">
                                                <div class="col-md-12">
                                                    <div class="dropdown">
                                                        <button class="custom-btn dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                                            Select Interest
                                                        </button>
                                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                            <li><a class="dropdown-item" href="#">Option 1</a></li>
                                                            <li><a class="dropdown-item" href="#">Option 2</a></li>
                                                            <li><a class="dropdown-item" href="#">Option 3</a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="pt-5 table-responsive text-nowrap">
                            <table id="blogTable" class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Vehicle</th>
                                        <th>Reg</th>
                                        <th>Previous</th>
                                        <th>Platform</th>
                                        <th>Center</th>
                                        <th>Last Bid</th>
                                        <th>Status</th>
                                        <th>Difference</th>
                                        <th>Time</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody class="table-border-bottom-0"></tbody>
                            </table>
                        </div>


                        @include('user.reauction.previouspopup')
                    </div>  
                </div>
        </div>
    </div>
</div>
@endsection

@section('js')
    <script>
$(document).ready(function () {
             let table = $('#blogTable').DataTable({
                    processing: true,
                    ordering:false,
                    serverSide: true,
                    ajax: "{{ url('/reauction') }}",
                });

                table.on('draw.dt', function () {
                    var info = table.page.info();
                    $('.pageinfo').html(`Showing ${info.start + 1} to ${info.end} of ${info.recordsDisplay} entries`);
                });

                $("input[name='search']").on('keyup change', function () {
                    table.search(this.value).draw();
                });

                $("select[name='length']").on('change', function () {
                    const length = $(this).val();
                    table.page.len(length).draw();
                }).trigger('change');
 
});
  

               

$(document).on('click', '.PreviousBtnRec', function () {
    let reg = $(this).data('ref'); 
    if (!reg) return;

    $.ajax({
        url: '{{ route('reauctioninfo') }}',
        method: 'POST',
        data: {
            reg: reg,
            _token: '{{ csrf_token() }}'
        },
        success: function (response) {
            if (response.length === 0) {
                $('#vehicleModalTableBody').html('<tr><td colspan="6">No data found.</td></tr>');
                return;
            }

          
            $('.vehicleName').text(response[0].name + ' - ' + response[0].variant);
            $('.redNumber').text(response[0].reg).css('color', 'red');

       
            $('#vehicleModalTableBody').empty();
            response.forEach(function(item) {
                let row = `
                    <tr>
                        <td>${item.platform}</td>
                        <td>${item.center}</td>
                        <td>${item.last_bid}</td>
                        <td>${item.status}</td>
                        <td>${item.difference}</td>
                        <td>${item.time}</td>
                    </tr>
                `;
                $('#vehicleModalTableBody').append(row);
            });

            $('#vehicleModal').modal('show');
        },
        error: function () {
            $('#vehicleModalTableBody').html('<tr><td colspan="6">Failed to load data.</td></tr>');
            $('#vehicleModal').modal('show');
        }
    });
});



    const scrollContainer = document.getElementById('scrollableRow');
    const scrollAmount = 250; // pixels

    document.getElementById('scrollLeft').addEventListener('click', () => {
        scrollContainer.scrollBy({ left: -scrollAmount, behavior: 'smooth' });
    });

    document.getElementById('scrollRight').addEventListener('click', () => {
        scrollContainer.scrollBy({ left: scrollAmount, behavior: 'smooth' });
    });



    </script>
@endsection