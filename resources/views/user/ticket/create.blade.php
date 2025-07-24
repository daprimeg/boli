@extends('admin.partial.app')

@push('title') Ticket @endpush

@section('css')
    {{-- <link rel="stylesheet" href="{{ asset('public/assets/vendor/libs/quill/typography.css') }}" />
    <link rel="stylesheet" href="{{ asset('public/assets/vendor/libs/highlight/highlight.css') }}" />
    <link rel="stylesheet" href="{{ asset('public/assets/vendor/libs/quill/katex.css') }}" />
    <link rel="stylesheet" href="{{ asset('public/assets/vendor/libs/quill/editor.css') }}" /> --}}

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
            <div class="col-md-12">

                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="card">
                      <div class="card-header border-bottom">
                        <div class="row">
                            <div class="col-md-6">
                                <h5 class="card-title">Create Ticket</h5>
                            </div>
                            <div class="col-md-6 text-end">
                                 <a href="{{URL::to('/tickets')}}" class="btn btn-primary">Back To List</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                 
                        <form class="pt-4" action="{{ route('ticket.store') }}" method="POST" enctype="multipart/form-data"  id="ticketForm" >
                            @csrf
                            <div class="row gy-4 gx-6 mb-6">
                                <div class="col-md-4">
                                    <label for="issuetopic" class="form-label">Select Issue Topic</label>
                                    <select id="issuetopic" name="issue_topic" class="form-select" required>
                                        <option value="">Select</option>
                                        <option value="Data Error / Incorrect Auction Info">Data Error / Incorrect Auction Info</option>
                                        <option value="Can't Find a Vehicle">Can't Find a Vehicle</option>
                                        <option value="Billing or Membership">Billing or Membership</option>
                                        <option value="Login / Account Access">Login / Account Access</option>
                                        <option value="Feature Request / Feedback">Feature Request / Feedback</option>
                                        <option value="Technical Bug / Other">Technical Bug / Other</option>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label id="detailsLabel" for="detailsInput" class="form-label">More Details</label>
                                    <input id="detailsInput" name="issue_type" class="form-control" type="text" placeholder="Enter details" disabled />
                                </div>
                                <div class="col-md-4">
                                    <label for="priority" class="form-label">Priority</label>
                                    <select id="priority" name="priority" class="form-select" required>
                                        <option value="">Select Priority</option>
                                        <option value="Low">Low</option>
                                        <option value="Medium">Medium</option>
                                        <option value="High">High</option>
                                    </select>
                                </div>

                                <div class="col-md-12">
                                    <h5>Description</h5>
                                    <textarea class="form-control" name="details" id="description" rows="3"></textarea>
                                </div>
                                <div class="mb-4">
                                    <label for="formFileMultiple" class="form-label">Upload Issue</label>
                                    <input class="form-control" type="file" name="attachment" id="formFileMultiple">
                                </div>
                                <div class="mt-2">
                                    <button type="submit" class="btn btn-primary me-3">Submit Ticket</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
 
@endsection
@section('js')

 <script src="{{ asset('public/assets/ckeditor/build/ckeditor.js') }}"></script>
 <script>
        ClassicEditor
            .create(document.querySelector('#description'))
            .then(editor => {
                editor.plugins.get('FileRepository').createUploadAdapter = (loader) => {
                    return new MyUploadAdapter(loader);
                };
            })
            .catch(error => {
                console.error(error);
            });

        class MyUploadAdapter {
            constructor(loader) {
                this.loader = loader;
            }

            upload() {
                return this.loader.file
                    .then(file => {
                        return new Promise((resolve, reject) => {
                            const data = new FormData();
                            data.append('upload', file);
                            data.append('_token', '{{ csrf_token() }}');

                            fetch("{{ url('//upload-image') }}", {
                                method: 'POST',
                                body: data
                            })
                            .then(response => response.json())
                            .then(result => {
                                if (result.url) {
                                    resolve({
                                        default: result.url
                                    });
                                } else {
                                    reject(result.error || 'Upload failed.');
                                }
                            })
                            .catch(() => {
                                reject('Upload failed.');
                            });
                        });
                    });
            }

            abort() {
        
            }
        }

    </script>
    
        {{-- <script src="{{ asset('public/assets/vendor/libs/quill/katex.js') }}"></script>
        <script src="{{ asset('public/assets/vendor/libs/highlight/highlight.js') }}"></script>
        <script src="{{ asset('public/assets/vendor/libs/quill/quill.js') }}"></script> --}}
        <script>
            const issueType = document.getElementById('issuetopic');
            const detailsLabel = document.getElementById('detailsLabel');
            const detailsInput = document.getElementById('detailsInput');
            
            issueType.addEventListener('change', function () {
                const value = this.value;
                detailsInput.style.display = 'block';
                detailsInput.disabled = false;
                
                switch (value) {
                    case 'Data Error / Incorrect Auction Info':
                        detailsLabel.textContent = 'Vehicle Link or ID';
                        break;
                    case "Can't Find a Vehicle":
                        detailsLabel.textContent = 'Vehicle Make/Model';
                        break;
                    case 'Billing or Membership':
                        detailsLabel.textContent = 'Billing Date / Invoice ID';
                        break;
                    case 'Login / Account Access':
                        detailsLabel.textContent = 'Subject';
                        break;
                    case 'Feature Request / Feedback':
                        detailsLabel.textContent = 'Add The Feature Name';
                        break;
                    case 'Technical Bug / Other':
                        detailsLabel.textContent = 'Page URL or Feature Name';
                        break;
                    default:
                        detailsLabel.textContent = 'More Details';
                        detailsInput.disabled = true;
                        break;
                }
            });
            
            
        </script>

@endsection