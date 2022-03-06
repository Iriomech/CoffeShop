@extends( 'layouts.app' )

@section( 'content' )
<div class="container py-5">
    <!-- For demo purpose -->
    <div class="row mb-4">
        <div class="col-lg-8 mx-auto text-center">
            <h1 class="display-6">Save a Credit card</h1>
        </div>
    </div> <!-- End -->
    <div class="row">
        <div class="col-lg-6 mx-auto">
            <div class="card ">
                <div class="card-header">
                    <div class="bg-white shadow-sm pt-4 pl-2 pr-2 pb-2">
                        <!-- Credit card form tabs -->
                        <ul role="tablist" class="nav bg-light nav-pills rounded nav-fill mb-3">
                            <li class="nav-item px-52"> <a data-toggle="pill" href="#credit-card" class="nav-link active "> <i class="fas fa-credit-card mr-2"></i> Credit Card </a> </li>
                        </ul>
                    </div> <!-- End -->
                    <!-- Credit card form content -->
                    <div class="tab-content">
                        <!-- credit card info-->
                        <div id="credit-card" class="tab-pane fade show active pt-3">
                            <form action="{{ route('paymentMethods.store') }}" method="POST">
                                @csrf
                                <div class="form-group"> <label for="cardNumber">
                                        <h6>Card number</h6>
                                    </label>
                                    <div class="input-group mb-1"> <input type="text" name="number" placeholder="Valid card number" class="form-control " value="{{ old('number') }}" required>
                                        <div class="input-group-append"> <span class="input-group-text text-muted pb-3"> <i class="fab fa-cc-visa mx-1 mt-2"></i> <i class="fab fa-cc-mastercard mx-1 mt-2"></i> <i class="fab fa-cc-amex mx-1 mt-2"></i> </span> </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-8">
                                        <div class="form-group"> <label><span class="hidden-xs">
                                                    <h6>Expiration Date</h6>
                                                </span></label>
                                            <div class="input-group"> <input type="number" placeholder="MM" name="exp_month" value="{{ old('exp_month') }}" class="form-control" required> <input type="number" placeholder="YY" name="exp_year" class="form-control" value="{{ old('exp_year') }}" required> </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group mb-4"> <label data-toggle="tooltip" title="Three digit CV code on the back of your card">
                                                <h6>CVC <i class="fa fa-question-circle d-inline"></i></h6>
                                            </label> <input type="text" required class="form-control" value="{{ old('cvc') }}" name="cvc" > </div>
                                    </div>
                                </div>
                                <div class="card-footer"> <button type="submit" class="subscribe btn btn-primary bg-[#0d6efd] btn-block shadow-sm"> Save Credit Card </button>
                            </form>
                        </div>
                    </div> <!-- End -->
                </div>
            </div>
        </div>
    </div>
    @endsection