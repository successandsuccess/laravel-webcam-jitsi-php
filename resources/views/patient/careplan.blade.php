@extends('layouts.patient')

@section('css')
<style>
.progressbar {
    counter-reset: step;
}
.progressbar li {
    list-style-type: none;
    float: left;
    width: 33.33%;
    position: relative;
    text-align: center;
    z-index: 22222;
}

.progressbar li:before {
    content: counter(step);
    counter-increment: step;
    width:30px;
    height: 30px;
    line-height: 30px;
    border: 1px solid #3746B0;
    display: block;
    text-align: center;
    margin: 0 auto 10px auto;
    border-radius: 50%;
    background-color: white;
    z-index: 22222;
}
.progressbar li:after{
    content: '';
    position: absolute;
    width: 100%;
    height: 1px;
    background-color: #3746B0;
    top:15px;
    left: -50%;
    /* z-index: -1; */
}

.progressbar li:first-child:after{
    content: none;
}

</style>
@endsection

@section('content')
        <section class="pt-50 pb-50"> 
            <div class="container">
                <h1 class="patient-careplan-blue-h1 text-center">Lacey's Care Plan</h1>
                <div class="row">
                    <div class="col-md-12">
                        <!-- Progress Tracker v2 -->
                        <ol class="progressbar">
                            <li class="active">
                               CHECK IN
                            </li>
                            <li>
                               EXERCISES
                            </li>
                            <li>
                               REVIEW
                            </li>
                        </ol>
                    </div>
                </div>
                <div class="patient-box pt-10px mt-25px">
                    <div class="row">
                        
                    </div>
                </div>            
            </div>
        </section>
@endsection

@section('javascript')
@endsection
