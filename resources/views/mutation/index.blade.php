<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Expense Tracker | Mutations</title>
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <link rel="stylesheet" href="assets/vendors/simple-datatables/style.css">
    <link rel="stylesheet" href="assets/vendors/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" href="assets/css/app.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="shortcut icon" href="assets/images/favicon.svg" type="image/x-icon">
</head>

<body>
    @include('partials.sidebar')
    </div>
    @include('partials.navbar')
    <div class="main-content container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Mutation</h3>
                    <p class="text-subtitle text-muted">a list of transactions that you have done so far</a>.</p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class='breadcrumb-header'>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Mutations</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <section class="section">
            <div class="card">
                <div class="card-header">
                    <div class="button1" style="margin-left:85%;">
                        <button style="border-radius: 4px " type="button" class="btn btn-primary addmutations"
                            data-bs-toggle="modal" data-bs-target="#exampleModal">
                            Add mutation
                        </button>
                    </div>
                    {{-- <div class="button2" style="margin-left:70%;    ">
                    <button style="border-radius: 4px" type="button" class="btn btn-primary" >
                      Add mutation
                    </button>
                </div> --}}
                </div>
                <div class="card-body">
                    <table class='table table-striped' id="table1">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Categories</th>
                                <th>Descriptions</th>
                                <th>Amount</th>
                                <th>Date</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            @foreach ($data as $mutation)
                                <tr>
                                    <td>{{ $i }}</td>
                                    <td>{{ $mutation->name }}</td>
                                    <td>{{ $mutation->description }}</td>
                                    <td>Rp.{{ number_format($mutation->amount, 2, ',', '.') }}</td>
                                    <td>{{ date('d-m-Y', strtotime($mutation->date)) }}</td>
                                    @if ($mutation->status === 'Debit')
                                        <td style=" color:rgb(0, 179, 24)">Debit</td>
                                    @else
                                        <td style=" color:red">Credit</td>
                                    @endif
                                    <td>
                                        <button class="btn btn-outline-success updatemutation" data-bs-toggle="modal"
                                            data-bs-target="#exampleModal" data-id="{{ $mutation->id }}"
                                            style="button"><i class="fa-solid fa-pencil"></i></button>
                                        <button class="btn btn-outline-danger" style="button"
                                            onclick="deleted({{ $mutation->id }})" data-id=""><i
                                                class="fa-solid fa-trash"></i></button>
                                    </td>
                                </tr>
                                <?php $i++; ?>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </section>
    </div>
    {{-- footer --}}
    {{-- akhir footer --}}
    </div>
    </div>
    {{-- modal --}}
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add mutation</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form class="mutationsupdatecreat" action="{{ route('store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="categori" class="mb-2">Categori</label>
                            <input type="hidden" class="user_id" name="user_id" id="user_id" value="{{ Auth::user()->id }}"
                                id="user_id">
                            <select class="form-select" aria-label="Default select example categori_id"
                                name="categori_id" id="categori_id">
                                @foreach ($categories as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Amount</label>
                            <input type="number" class="form-control amount" id="exampleFormControlInput1"
                                id="amount" name="amount">
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Date</label>
                            <input type="date" class="form-control date" id="exampleFormControlInput1"
                                name="date" id="date">
                        </div>
                        <div class="mb-3">
                            <label for="categori" class="mb-2">Status</label>
                            <select class="form-select categori status" aria-label="Default select example"
                                name="status" id="status">
                                <option value="Debit">Debit</option>
                                <option value="Credit">Credit</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">Description</label>
                            <textarea class="form-control description" id="exampleFormControlTextarea1" rows="3" name="description"></textarea>
                        </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @include('sweetalert::alert', ['cdn' => 'https://cdn.jsdelivr.net/npm/sweetalert2@9'])
    <script src="assets/js/feather-icons/feather.min.js"></script>
    <script src="assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="assets/js/app.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="assets/vendors/simple-datatables/simple-datatables.js"></script>
    <script src="assets/js/vendors.js"></script>
    <script src="assets/js/template/jquery.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="assets/js/main.js"></script>
    <script src="assets/js/pages/mutations.js"></script>
</body>

</html>
