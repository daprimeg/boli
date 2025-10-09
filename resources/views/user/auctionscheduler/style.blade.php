    <style>
        .form-label {
            padding-top: 18px;
            padding-bottom: 6px;
            font-size: 15px;
        }

        .auction-tabs a {
            border: 1px solid #1b2737;
        }



        .auction-tabs .active {
            background: #0080ff;
        }

        .auction-tabs .active:hover {
            color: var(--bs-heading-color) !important;
        }

        .auction-tabs .active:focus {
            color: var(--bs-heading-color) !important;
        }

        .dataTables_length {
            display: none !important;
        }


        .select2-container--default .select2-selection--single {
            background: #1d2632 !important;
        }

        .select2-container--default .select2-selection--single .select2-selection__rendered {
            line-height: 33px !important;
        }


        .centers {
            /* min-width: 400px; */
            display: flex;
            flex-wrap: wrap;
            overflow: hidden;
            height: 30px;
        }

        .centers:hover {
            min-width: auto;
            height: auto;
            overflow: inherit
        }


        .centers span {
            display: block;
            padding: 2px;
            color: var(--bs-heading-color);
            margin: 1px 2px;
        }

        .dataTables_wrapper .dataTables_paginate .paginate_button.disabled {
            background: var(--bs-primary) !important;
            border: none !important;
            opacity: 1 !important;
            color: var(--bs-heading-color) !important;
            font-size: var(--font-p1) !important;


        }

        .costome-slect .select2-selection__rendered {
            background: #0f1c2c !important;
        }

        .costome-slect .select2-selection__rendered {
            background: #0f1c2c !important;
        }

        .tb-data-fonts tr td {
            font-size: var(--font-p1) !important;
            color: var(--bs-body-color) !important;


        }

        .tb-data-fonts .badge {
            font-size: var(--font-p2) !important;
            /* color:  var(--bs-body-color) !important; */
            color: black;
        }

        .bg-danger-red {
            background: red !important;
        }

        .centers span {
            color: var(--bs-body-color) !important;
        }

        .autionshadular {
            position: relative;
            width: 100%;
            background-image: url("{{ url('/public/theme/assets/Dots.png') }}");
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            overflow-x: hidden;
        }


        .tabs-container {
      
            border-radius: 8px;
            padding: 4px;
        }

        .custom-tab {
            background-color: #475569;
            color: white;
            border: none;
            border-radius: 6px;
            padding: 12px 16px;
            margin: 0 2px;
            transition: all 0.2s ease;
            min-width: 120px;
            font-weight: 500;
        }

        .custom-tab:hover {
            background-color: #64748b;
            color: white;
        }



        .tab-content-area {
            border-radius: 8px;
            margin-top: 24px;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
        }

        .tab-numbers {
            font-size: 12px;
            margin-top: 4px;
        }


        .table-dark-custom {
            background-color: #1a1f2e;
            border-color: #2d3748;
            margin-bottom: 0px;
        }

        .table-dark-custom th,
        .table-dark-custom td {
            border-color: #2d3748;
            padding: 1rem;
            vertical-align: middle;
        }

        .table-dark-custom th {
            background-color: #1a1f2e;
            font-weight: 500;
            font-size: 1rem;
        }

        .platform-text {
            color: #3b82f6;
            font-weight: 500;
        }

        .status-badge {
            padding: 0.375rem 0.75rem;
            border-radius: 0.375rem;
            font-size: 0.875rem;
            font-weight: 500;
            border: none;
        }

        .status-in-progress {
            background-color: #dc2626;
            color: white;
            font-size: 10px;
        }

        .status-planned {
            background-color: #2563eb;
            color: white;
        }

        .status-cancel {
            background-color: #f59e0b;
            color: white;
        }

        .action-link {
            color: #9ca3af;
            text-decoration: none;
        }

        .action-link:hover {
            color: #ffffff;
        }

        .menucoustome-scrolbar {
            scrollbar-width: thin;
            scrollbar-color: #007bff rgba(255, 255, 255, 0.137);
        }
    </style>