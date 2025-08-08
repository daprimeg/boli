@extends('admin.partial.app')
@push('title')
    Reauction
@endpush
@section('css')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">


    <style>
        .dataTables_length {
            display: none !important;
        }

        .table {
            width: 100% !important;
        }

        .dataTables_info {
            /* display: inline!important; */
        }

        .datatables-products th {
            text-align: center;
        }

        .datatables-products td {
            text-align: center;
        }

        .table-responsive {
            overflow-x: auto !important;
            -webkit-overflow-scrolling: touch !important;
        }


        .custom-btn {
            background-color: var(--bs-primary);
            color: #fff;
            border: none;
            padding: 5px 15px;
         border-radius: var(--btn-border-radis);

            font-size: var(--font-p1);
            border-radius: var(--btn-border-radis);
        }

        .custom-btn:hover {
            background-color: #0080ffd4;
        }

        .custom-btn::after {
            display: inline-block;
            margin-left: 5px;
            vertical-align: middle;
            content: "▼";
            font-size: var(--font-p1);
        }

        .dropdown-menu {
            background-color: #1e3a8a;
            border: none;
            border-radius: var(--btn-border-radis);
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
            margin-bottom: 10px
          
        }

        .stats-number {

            margin: 0;
        }

        .stats-label {
            /* font-size: 0.9rem; */
            opacity: 0.9;
            margin: 0;
        }

        .platform-info {

            border-radius: var(--btn-border-radis);
            padding: 15px;
            backdrop-filter: blur(10px);
        }


        .platform-details {
            font-size: var(--font-p2);
            opacity: 0.8;
            line-height: 1.4;
        }



        .badge-box {
            display: inline-block;
            padding: 4px 10px;
            margin-left: 6px;
            font-size: var(--font-p2);;
            color: #fff;
            background-color: rgba(253, 5, 5, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: var(--btn-border-radis);
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
            border-radius: var(--btn-border-radis);
            color: white;
            border: 1px solid #570303;
            transition: all 0.3s ease;
            border-radius: var(--btn-border-radis);
            font-size: var(--font-p3)
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

        .platefrom_mar {
            margin-top: 9px;
        }


        .costome-table-chagefont .costome-table-childchagefont th {
            font-size: var(--font-p1);
            color: var(--bs-heading-color)
        }

        .costome-table-childchagefont tr td{
            font-size: var(--font-p1);
            color: var(--bs-heading-color)
        }
        .costome-table-childchagefont tr td .PreviousBtnRec{
            border-radius: var( --btn-border-radis)
        }
         
        
        @media only screen and (max-width: 576px) {

            .inner-tag {
                flex-direction: column;
                gap: 2px;
                margin-top: 5px;
            }

            .platefrom_mar {
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

                @if (session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                <div class="card">


                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-6">
                                <h4 class="card-title ">Reauction Details</h4>
                            </div>

                        </div>

                        <div class="row pt-5">
                            <div class="col-md-8">
                                <select style="max-width:200px;padding:5px;" name="length" class="">
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
                                                <input type="checkbox" id="inprogress_check">
                                                <label for="inprogress_check">Inprogress</label>
                                            </div>

                                        </div>

                                        <div class="col-md-4 text-center">
                                            <input type="text" name="search" class="form-control"
                                                placeholder="Search by Reg" />
                                        </div>

                                        <div class="col-md-4 text-end mt-1">
                                            <div class="row custom-dropdown">
                                                <div class="col-md-12">
                                                    <div class="dropdown">
                                                        <button class="custom-btn dropdown-toggle" type="button"
                                                            id="dropdownMenuButton" data-bs-toggle="dropdown"
                                                            aria-expanded="false">
                                                            Select Interest
                                                        </button>
                                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton"
                                                            id="interestDropdown">
                                                            <li>
                                                                <a class="dropdown-item" data-id="">
                                                                    Select Interest
                                                                </a>
                                                            </li>
                                                            @forelse($interests as $interest)
                                                                <li>
                                                                    <a class="dropdown-item" href="#"
                                                                        data-id="{{ $interest->id }}">
                                                                        {{ $interest->title }}
                                                                    </a>
                                                                </li>
                                                            @empty
                                                                <li><span class="dropdown-item text-muted">No interests
                                                                        found</span></li>
                                                            @endforelse
                                                        </ul>
                                                    </div>

                                                    <input type="hidden" id="selected_interest_id" value="">

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="pt-5 table-responsive text-nowrap">
                            <table id="blogTable" class="table table-bordered">
                                <thead class="costome-table-chagefont">
                                    <tr class="costome-table-childchagefont">
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
                                <tbody class="table-border-bottom-0 costome-table-childchagefont"></tbody>
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
        $(document).ready(function() {
            let table = $('#blogTable').DataTable({
                processing: true,
                ordering: false,
                serverSide: true,
                ajax: {
                    url: "{{ url('/reauction') }}",
                    data: function(d) {
                        d.inprogress_check = $('#inprogress_check').is(':checked') ? 1 : 0;
                        d.interest_id = $('#selected_interest_id').val();
                    }
                }


            });

            table.on('draw.dt', function() {
                var info = table.page.info();
                $('.pageinfo').html(
                    `Showing ${info.start + 1} to ${info.end} of ${info.recordsDisplay} entries`);
            });

            $("input[name='search']").on('keyup change', function() {
                table.search(this.value).draw();
            });

            $("select[name='length']").on('change', function() {
                const length = $(this).val();
                table.page.len(length).draw();
            }).trigger('change');
            $('#inprogress_check').on('change', function() {
                table.ajax.reload();
            });
            $('#interestDropdown').on('click', '.dropdown-item', function(e) {
                e.preventDefault();
                const selectedId = $(this).data('id');
                $('#selected_interest_id').val(selectedId);
                $('#dropdownMenuButton').text($(this).text());
                table.ajax.reload();
            });




        });




        $(document).on('click', '.PreviousBtnRec', function() {
            let reg = $(this).data('ref');
            if (!reg) return;

            $.ajax({
                url: '{{ route('reauctioninfo') }}',
                method: 'POST',
                data: {
                    reg: reg,
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    if (response.length === 0) {
                        $('#vehicleModalTableBody').html(
                        '<tr><td colspan="6">No data found.</td></tr>');
                        return;
                    }



                    $('.vehicleName').html(
                        response[0].name + ' - ' + response[0].variant + ' - ' +
                        '<small class="text-danger" style="font-size: 80%;">' + reg + '</small>'
                    );


                    $('#vehicleModalTableBody').empty();
                    response.forEach(function(item) {
                        let row = `
                    <tr>
                        <td style = " font-size: var(--font-p2);color: var(--bs-heading-color);">${item.platform}</td>
                        <td style = " font-size: var(--font-p2); color: var(--bs-heading-color);">${item.center}</td>
                        <td style = " font-size: var(--font-p2);
                    color: var(--bs-heading-color);">${item.last_bid}</td>
                        <td style = " font-size: var(--font-p2);
                    color: var(--bs-heading-color);">${item.status}</td>
                        <td style = " font-size: var(--font-p2);
                    color: var(--bs-heading-color);">${item.difference}</td>
                        <td style = " font-size: var(--font-p2);
                    color: var(--bs-heading-color);">${item.time}</td>
                    </tr>
                `;
                        $('#vehicleModalTableBody').append(row);
                    });

                    $('#vehicleModal').modal('show');
                },
                error: function() {
                    $('#vehicleModalTableBody').html(
                        '<tr><td colspan="6">Failed to load data.</td></tr>');
                    $('#vehicleModal').modal('show');
                }
            });
        });



        const scrollContainer = document.getElementById('scrollableRow');
        const scrollAmount = 250; // pixels

        document.getElementById('scrollLeft').addEventListener('click', () => {
            scrollContainer.scrollBy({
                left: -scrollAmount,
                behavior: 'smooth'
            });
        });

        document.getElementById('scrollRight').addEventListener('click', () => {
            scrollContainer.scrollBy({
                left: scrollAmount,
                behavior: 'smooth'
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            $.ajax({
                url: '{{ route('reauction-interest') }}',
                method: 'GET',
                dataType: 'json',
                success: function(interests) {
                    let html = '';

                    interests.forEach(function(interest, index) {
                        html += `
                        <div class="col-auto" style="width: 22%;">
                            <div class="card h-100" style="border-bottom: 4px solid var(--bs-primary)!important;">
                                <div class="card-body pb-1 text-start">
                                    <div class="d-flex align-items-start mb-2">
                                       <div class="dot-box"
                                 style="width: 40px;height: 40px; background-color: #003164; border-radius: 8px;display: flex;align-items: center;justify-content: center;margin-right: 10px; ">
                                 <div class="dot"
                                     style=" width: 30px;  height: 30px; background-color: #0d6efd;  border-radius: 50%;">
                                 </div>
                              </div>
                                        <h4 class="mb-0 ms-2">
                                            <span class="auction-count" data-primary="${interest.primary_count}" data-secondary="${interest.secondary_count}">
                                                ${interest.primary_count}
                                            </span>
                                        </h4>
                                    </div>
                                    <p class=" text-start">
                                        <p class="total_auctions">${interest.title}</p>
                                    </p>
                                    <p  class="mb-0 text-start">
                                        <label  class="d-flex align-items-center cursor-pointer mb-2">
                                            <input type="checkbox" class="secondary-toggle me-2">
                                            <small style="font-size:var(--font-p2)">Include Secondary</small>
                                        </label>
                                    </p>
                                </div>
                            </div>
                        </div>
                    `;

                    });

                    $('#scrollableRow').html(html);
                },
                error: function(xhr, status, error) {
                    console.error('AJAX Error:', error);
                    $('#scrollableRow').html('<p class="text-danger">Failed to load interests.</p>');
                }
            });

            $(document).on('change', '.secondary-toggle', function() {
                const $card = $(this).closest('.card-body');
                const $count = $card.find('.auction-count');
                const primary = $count.data('primary');
                const secondary = $count.data('secondary');

                if ($(this).is(':checked')) {
                    $count.text(secondary);
                } else {
                    $count.text(primary);
                }
            });
        });
    </script>
@endsection
