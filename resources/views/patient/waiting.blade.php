@extends('layouts.patient')

@section('content')
        <section class="pb-50 pt-15px"> 
            <a class="patient-exit-text d-flex ml-40px" href="{{ route('patient.getstarted') }}" ><i class="material-icons-outlined mt-15px">arrow_back</i>&nbsp;EXIT WAITING ROOM</a>
            <div class="container max-width-962px">
                <div class="patient-box pt-50 mt-25px">
                        <h1 class="patient-careplan-blue-h1 text-center">Dr. Wang will be with you shortly.</h1>
                        <p class="custom-16-font-bold text-center mb-0">Your queue time is 1:45 PM.</p>
                        <p class="custom-16-font text-center">Once your practitioner is ready you will be able join the meeting.</p>
                        <div class="mt-30px mb-25 text-center">
                                    <a href="{{ route('patient.waiting') }}"><button class="btn patient-disabled-btn patient-btn-text width-137px height-36px">JOIN MEETING</button></a>
                        </div>
                </div>     
                
                <div class="patient-box mt-25px">
                        <p class="patient-bold-blue-p mb-0px">While you wait</p>
                        <h3 class="waiting-light-blue-h3 mt-minus-25px">Let us know how you've been feeling.</p>
                        <div class="patient-divider"></div>
                        <p class="sub-title-p mt-30px">How is your pain today?</p>

                        <div class="row mt-30px mb-30px">
                                        <div class="col-md-12 d-flex justiy-content-space-between">
                                            <p class="custom-p">Minimum</p>
                                      
                                            <div class="d-grid">
                                                <input type="radio" id="male" name="qeeue" value="1" checked>
                                                <label for="male" class="custom-p mt-10">1</label>
                                                
                                            </div>
                                            <div class="d-grid">
                                                <input type="radio" id="female" name="qeeue" value="2">
                                                <label for="female" class="custom-p mt-10">2</label>
                                                
                                            </div>
                                            <div class="d-grid">
                                                <input type="radio" id="female" name="qeeue" value="3">
                                                <label for="female" class="custom-p mt-10">3</label>
                                                
                                            </div>
                                            <div class="d-grid">
                                                <input type="radio" id="female" name="qeeue" value="4">
                                                <label for="female" class="custom-p mt-10">4</label>
                                                
                                            </div>
                                            <div class="d-grid">
                                                <input type="radio" id="female" name="qeeue" value="5">
                                                <label for="female" class="custom-p mt-10">5</label>
                                            
                                            </div>

                                            <div class="d-grid">
                                                <input type="radio" id="female" name="qeeue" value="6">
                                                <label for="female" class="custom-p mt-10">6</label>
                                            
                                            </div>

                                            <div class="d-grid">
                                                <input type="radio" id="female" name="qeeue" value="7">
                                                <label for="female" class="custom-p mt-10">7</label>
                                                
                                            </div>

                                            <div class="d-grid">
                                                <input type="radio" id="female" name="qeeue" value="8">
                                                <label for="female" class="custom-p mt-10">8</label>
                                                
                                            </div>

                                            <div class="d-grid">
                                                <input type="radio" id="female" name="qeeue" value="9">
                                                <label for="female" class="custom-p mt-10">9</label>
                                                
                                            </div>

                                            <div class="d-grid">
                                                <input type="radio" id="female" name="qeeue" value="10">
                                                <label for="female" class="custom-p mt-10">10</label>
                                            
                                            </div>
                               
                                            <p class="custom-p">Extreme</p>
                                        </div>
                        </div>

                        <div class="patient-divider"></div>
                        <p class="sub-title-p mt-30px">Overall how is your pain since you last visit?</p>

                        <div class="row mt-30px mb-30px">
                                        <div class="col-md-12 d-flex justiy-content-space-between">
                                            <p class="custom-p">Minimum</p>
                                      
                                            <div class="d-grid">
                                                <input type="radio" id="male" name="after" value="1" checked>
                                                <label for="male" class="custom-p mt-10">1</label>
                                                
                                            </div>
                                            <div class="d-grid">
                                                <input type="radio" id="female" name="after" value="2">
                                                <label for="female" class="custom-p mt-10">2</label>
                                                
                                            </div>
                                            <div class="d-grid">
                                                <input type="radio" id="female" name="after" value="3">
                                                <label for="female" class="custom-p mt-10">3</label>
                                                
                                            </div>
                                            <div class="d-grid">
                                                <input type="radio" id="female" name="after" value="4">
                                                <label for="female" class="custom-p mt-10">4</label>
                                                
                                            </div>
                                            <div class="d-grid">
                                                <input type="radio" id="female" name="after" value="5">
                                                <label for="female" class="custom-p mt-10">5</label>
                                            
                                            </div>

                                            <div class="d-grid">
                                                <input type="radio" id="female" name="after" value="6">
                                                <label for="female" class="custom-p mt-10">6</label>
                                            
                                            </div>

                                            <div class="d-grid">
                                                <input type="radio" id="female" name="after" value="7">
                                                <label for="female" class="custom-p mt-10">7</label>
                                                
                                            </div>

                                            <div class="d-grid">
                                                <input type="radio" id="female" name="after" value="8">
                                                <label for="female" class="custom-p mt-10">8</label>
                                                
                                            </div>

                                            <div class="d-grid">
                                                <input type="radio" id="female" name="after" value="9">
                                                <label for="female" class="custom-p mt-10">9</label>
                                                
                                            </div>

                                            <div class="d-grid">
                                                <input type="radio" id="female" name="after" value="10">
                                                <label for="female" class="custom-p mt-10">10</label>
                                            
                                            </div>
                               
                                            <p class="custom-p">Extreme</p>
                                        </div>
                        </div>

                        <div class="patient-divider"></div>
                        <p class="sub-title-p mt-30px">How better or worse is you pain since your last visit?</p>

                        <div class="row mt-10 mb-30px">
                                        <div class="col-md-12">
                                            <div class="d-flex align-center">
                                                <input type="radio" id="male" name="lastafter" value="1" checked>
                                                <label for="male" class="custom-16-font mt-10 ml-15px">Much better</label>
                                            </div>  
                                            <div class="d-flex align-center">
                                                <input type="radio" id="female" name="lastafter" value="2">
                                                <label for="female" class="custom-16-font mt-10 ml-15px">Better</label>
                                            </div>
                                            <div class="d-flex align-center">
                                                <input type="radio" id="female" name="lastafter" value="3">
                                                <label for="female" class="custom-16-font mt-10 ml-15px">About the same</label>
                                            </div>
                                            <div class="d-flex align-center">
                                                <input type="radio" id="female" name="lastafter" value="4">
                                                <label for="female" class="custom-16-font mt-10 ml-15px">Worse</label>
                                            </div>
                                            <div class="d-flex align-center">
                                                <input type="radio" id="female" name="lastafter" value="5">
                                                <label for="female" class="custom-16-font mt-10 ml-15px">Much worse</label>
                                            </div>

                                        </div>
                        </div>

                        <div class="patient-divider"></div>

                        <div class="mb-10 mt-15px">
                                    <a href="#"><button class="btn blue-btn patient-btn-text width-150px height-36px">Submit</button></a>
                        </div>
                </div>    
            </div>
        </section>
@endsection

@section('javascript')
@endsection
