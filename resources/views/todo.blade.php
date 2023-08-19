{{-- @extends('app')
@section('content')
     --}}
<div class="MYtoast  fixed-top d-none d-flex m-4" id="MYtoast">
        <div class="ms-auto">
            <div class="toast align-items-center text-bg-primary border-0 fade show" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="d-flex">
                    <div class="toast-body" id="toastMsg">
                        This is text
                    </div>
                    <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
            </div>
        </div>
    </div>
    <div class="container">

        <h1 class="text-bg-dark text-center mt-5 p-3 rounded-5">To ddo </h1>

        <div class="row">
            <div class="col-lg-12 justify-items-center align-items-center">
                <center>
                    <form id="contactForm" action="/">
                        <input class="form-control w-100 mt-5  rounded-5" id="task" name="task" type="text" placeholder="Add To Do">
                        <button type="submit" id="submit" class="btn btn-dark my-3 mb-5 w-25  rounded-5"><i class="bi bi-plus-circle me-2"></i>Add</button>
                    </form>
                </center>
            </div>
            <div class="col-lg-12">

            </div>
        </div>

        <div class="all-todo">
            <!-- @yield('allTodo') -->
            <ul class="list-group gap-5" id="allTask">


            </ul>
            <ul class="list-group gap-5" id="allNewTask">


            </ul>

        </div>

    </div>
    {{-- @endsection --}}
