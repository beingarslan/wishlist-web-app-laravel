@extends('guest/layouts/app')

@section('page-styles')
<link rel="stylesheet" href="{{asset('front-end/css/index_styles.css')}}">
<link rel="stylesheet" href="{{asset('front-end/css/faq_styles.css')}}">
@endsection

@section('content')
<!-- header -->
<header class="header bg-white section text-contrast">
    <div class="container">
        <div class="text-center section-heading pt-5">
            <h1 class="bold">FREQUENTLY ASKED QUESTIONS</h1>

        </div>
        <div class="container py-4 question">
            <div class="accordion w-100" id="basicAccordion">
                <div class="accordion-item border-0">
                    <h2 class="accordion-header" id="headingOne">
                        <button class="btn collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#basicAccordionCollapseOne" aria-expanded="false"
                            aria-controls="collapseOne">
                            <i class="fa fa-minus me-2"></i> How does wishlist works?
                        </button>

                    </h2>
                    <hr>
                    <div id="basicAccordionCollapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne"
                        data-mdb-parent="#basicAccordion">
                        <div class="accordion-body">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed accumsan lobortis nisi quis
                                porttitor. Cras facilisis odio id lacinia venenatis. Aenean mattis metus eu mi tempus,
                                ut congue leo auctor. </p>
                        </div>
                    </div>
                </div>
                <div class="accordion-item border-0">
                    <h2 class="accordion-header" id="headingTwo">
                        <button class="btn collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#basicAccordionCollapseTwo" aria-expanded="false"
                            aria-controls="collapseTwo">
                            <i class="fa fa-minus me-2"></i> Is my shipping address secure?
                        </button>
                    </h2>
                    <hr>
                    <div id="basicAccordionCollapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                        data-mdb-parent="#basicAccordion">
                        <div class="accordion-body">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed accumsan lobortis nisi quis
                                porttitor. Cras facilisis odio id lacinia venenatis. Aenean mattis metus eu mi tempus,
                                ut congue leo auctor. </p>
                        </div>
                    </div>
                </div>
                <div class="accordion-item border-0">
                    <h2 class="accordion-header" id="headingThree">
                        <button class="btn collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#basicAccordionCollapseThree" aria-expanded="false"
                            aria-controls="collapseThree">
                            <i class="fa fa-minus me-2"></i> How can i make my shipping address private?
                        </button>
                    </h2>
                    <hr>
                    <div id="basicAccordionCollapseThree" class="accordion-collapse collapse"
                        aria-labelledby="headingThree" data-mdb-parent="#basicAccordion">
                        <div class="accordion-body">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed accumsan lobortis nisi quis
                                porttitor. Cras facilisis odio id lacinia venenatis. Aenean mattis metus eu mi tempus,
                                ut congue leo auctor. </p>
                        </div>
                    </div>
                </div>
                <div class="accordion-item border-0">
                    <h2 class="accordion-header" id="headingFour">
                        <button class="btn collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#basicAccordionCollapseFour" aria-expanded="false"
                            aria-controls="collapseFour">
                            <i class="fa fa-minus me-2"></i> Can other people see my wishlist items?
                        </button>
                    </h2>
                    <hr>
                    <div id="basicAccordionCollapseFour" class="accordion-collapse collapse"
                        aria-labelledby="headingFour" data-mdb-parent="#basicAccordion">
                        <div class="accordion-body">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed accumsan lobortis nisi quis
                                porttitor. Cras facilisis odio id lacinia venenatis. Aenean mattis metus eu mi tempus,
                                ut congue leo auctor. </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="accordion-item border-0">
                <h2 class="accordion-header" id="headingFive">
                    <button class="btn collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#basicAccordionCollapseFive" aria-expanded="false" aria-controls="collapseFive">
                        <i class="fa fa-minus me-2"></i> How to change my profile photo?
                    </button>
                </h2>
                <div id="basicAccordionCollapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive"
                    data-mdb-parent="#basicAccordion">
                    <div class="accordion-body">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed accumsan lobortis nisi quis
                            porttitor. Cras facilisis odio id lacinia venenatis. Aenean mattis metus eu mi tempus, ut
                            congue leo auctor. </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- end header -->

<!-- section contact -->
<section class="section section-contact">
    <div class="container">
        <div class="text-center section-heading pt-5">
            <h1 class="bold">GET IN TOUCH</h1>

        </div>
        <div>
            <form>
                <div class="form-group my-3">
                    <label class="bold my-1">Name</label>
                    <input type="text" class="form-control" placeholder="Enter your name">
                </div>
                <div class="form-group my-3">
                    <label class="bold my-1">Email</label>
                    <input type="email" class="form-control" placeholder="Enter your email">
                </div>
                <div class="form-group my-3">
                    <label class="bold my-1">Subject</label>
                    <input type="text" class="form-control" placeholder="Enter subject">
                </div>
                <div class="form-group my-3">
                    <label class="bold my-1">Query</label>
                    <textarea class="form-control bg-transparent" rows="10">Tell us about the issue you are facing</textarea>
                </div>
                <button class="btn" type="submit">Send</button>
            </form>
        </div>
    </div>
</section>
<!-- section contact end -->
@endsection