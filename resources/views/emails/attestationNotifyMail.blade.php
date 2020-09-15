<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <title>Mail from telehealth.patientconnect.io</title>

</head>

<body>  
    
<div class="d-flex m-auto" style="max-width: 450px; padding-top:50px; padding-bottom: 50px;">


    <!-- Multi Step Modal -->
    <form class="multi-step" id="reviewmodal">
        <div class="dialog">
            <div class="content h-100">
                <div class="body step-1" data-step="1">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Assessment</h5>
                                    <p class="card-text" style="color:black;">This form will be used to collect information about your Telehealth Video Session. This is an opportunity to provide feedback regarding your experience with the session, as well as confirming that you have completed
                                        the exercises and the video recording as outlined in your individual care plan.
                                    </p>
                                    <a href="#" style="color: red;">* Required</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Email address <span style="color: red;">*</span></h5>

                                    <input id="email" type="email" name="email" value="{{ $details['email'] }}"  style="outline: none; border: none; border-bottom: 1px solid gray;" readonly>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Name <span style="color: red;">*</span></h5>

                                    <input id="name" type="text" name="name" value="{{ $details['name'] }}" style="outline: none; border: none; border-bottom: 1px solid gray;" readonly>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="body step-2" data-step="2">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Assessment</h5>
                                    <a href="#" style="color: red;">* Required</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Video Telehealth Session</h5>

                                    <p style="color:black;">This form will collect information about your Video Telehealth Session, Please complete each question and type your name at the bottom to confirm completion.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Were you able to complete all of the exercises in your individualized care plan? <span style="color:red">*</span>
                                    </h5>
                                    @if ( $details['completable'] == 1 ) 
                                    <input type="radio" id="male" name="completable" value="1" checked readonly>
                                    <label for="male" style="color:black;">Yes</label><br>
                                    <input type="radio" id="female" value="0" name="completable" readonly>
                                    <label for="female" style="color:black;">No</label><br>
                                    <input type="radio" id="female" name="completable" value="2" readonly>
                                    <label for="female" style="color:black;">Other</label> &nbsp;
                                    <input class="w-80" id="other" type="text" name="completable_other" style="display:none; outline: none; border: none; border-bottom: 1px solid gray;">
                                    <p style="color:red; display: none;" id="other-validator">This field is required</p>
                                    @elseif ( $details['completable'] == 0 )
                                    <input type="radio" id="male" name="completable" value="1" readonly>
                                    <label for="male" style="color:black;">Yes</label><br>
                                    <input type="radio" id="female" value="0" name="completable" checked readonly>
                                    <label for="female" style="color:black;">No</label><br>
                                    <input type="radio" id="female" name="completable" value="2" readonly>
                                    <label for="female" style="color:black;">Other</label> &nbsp;
                                    <input class="w-80" id="other" type="text" name="completable_other" style="display:none; outline: none; border: none; border-bottom: 1px solid gray;">
                                    <p style="color:red; display: none;" id="other-validator">This field is required</p>
                                    @else
                                    <input type="radio" id="male" name="completable" value="1" readonly>
                                    <label for="male" style="color:black;">Yes</label><br>
                                    <input type="radio" id="female" value="0" name="completable" readonly>
                                    <label for="female" style="color:black;">No</label><br>
                                    <input type="radio" id="female" name="completable" value="2" checked readonly>
                                    <label for="female" style="color:black;">Other</label> &nbsp;
                                        @if ( isset($details['completable_other']) && $details['completable_other'] != '' )
                                        <input class="w-80" id="other" type="text" name="completable_other" value="{{ $details['completable_other'] }}" style="outline: none; border: none; border-bottom: 1px solid gray;" readonly>
                                        @endif
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">If you checked "No" or "Other" above, please discribe any difficulty you had with each exercise in the space below:
                                    </h5>

                                    <input class="w-100" id="difficult_answer" type="text" name="difficult_answer" value="{{ $details['difficult_answer'] }}" style="outline: none; border: none; border-bottom: 1px solid gray;" readonly>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">On a scale of 1 to 5, with 5 being "very difficult", how would you rate &lt;Exercise 1&gt;? <span style="color: red;">*</span>
                                    </h5>

                                    <div class="col-md-12 d-flex">
                                        <div class="col-md-3 left-end">
                                            <p style="color:black;">Very Easy</p>
                                        </div>

                                        <div class="col-md-1 d-grid">
                                            <label for="male" style="color:black;">1</label>
                                            <input type="radio" id="male" name="qeeue" value="1" <?php if ($details['qeeue'] == 1 ) echo 'checked';  ?> readonly>
                                        </div>
                                        <div class="col-md-1 d-grid">
                                            <label for="female" style="color:black;">2</label>
                                            <input type="radio" id="female" name="qeeue" value="2" <?php if ($details['qeeue'] == 2 ) echo 'checked';  ?> readonly>
                                        </div>
                                        <div class="col-md-1 d-grid">
                                            <label for="female" style="color:black;">3</label>
                                            <input type="radio" id="female" name="qeeue" value="3" <?php if ($details['qeeue'] == 3 ) echo 'checked';  ?> readonly>
                                        </div>
                                        <div class="col-md-1 d-grid">
                                            <label for="female" style="color:black;">4</label>
                                            <input type="radio" id="female" name="qeeue" value="4" <?php if ($details['qeeue'] == 4 ) echo 'checked';  ?> readonly>
                                        </div>
                                        <div class="col-md-1 d-grid">
                                            <label for="female" style="color:black;">5</label>
                                            <input type="radio" id="female" name="qeeue" value="5" <?php if ($details['qeeue'] == 5 ) echo 'checked';  ?> readonly>
                                        </div>


                                        <div class="col-md-4 right-end">
                                            <p style="color:black;">Very Difficult</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">On a scale of 1 to 5, with 5 being "very difficult", how would you rate &lt;Exercise 2&gt;? <span style="color: red;">*</span>
                                    </h5>

                                    <div class="col-md-12 d-flex">
                                        <div class="col-md-3 left-end">
                                            <p style="color:black;">Very Easy</p>
                                        </div>
                                        <div class="col-md-1 d-grid">
                                            <label for="male" style="color:black;">1</label>
                                            <input type="radio" id="male" name="qeeueb" value="1" <?php if ($details['qeeueb'] == 1 ) echo 'checked';  ?> readonly>
                                        </div>
                                        <div class="col-md-1 d-grid">
                                            <label for="female" style="color:black;">2</label>
                                            <input type="radio" id="female" name="qeeueb" value="2" <?php if ($details['qeeueb'] == 2 ) echo 'checked';  ?> readonly>
                                        </div>
                                        <div class="col-md-1 d-grid">
                                            <label for="female" style="color:black;">3</label>
                                            <input type="radio" id="female" name="qeeueb" value="3" <?php if ($details['qeeueb'] == 3 ) echo 'checked';  ?> readonly>
                                        </div>
                                        <div class="col-md-1 d-grid">
                                            <label for="female" style="color:black;">4</label>
                                            <input type="radio" id="female" name="qeeueb" value="4" <?php if ($details['qeeueb'] == 4 ) echo 'checked';  ?> readonly>
                                        </div>
                                        <div class="col-md-1 d-grid">
                                            <label for="female" style="color:black;">5</label>
                                            <input type="radio" id="female" name="qeeueb" value="5" <?php if ($details['qeeueb'] == 5 ) echo 'checked';  ?> readonly>
                                        </div>


                                        <div class="col-md-4 right-end">
                                            <p style="color:black;">Very Difficult</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">On a scale of 1 to 5, with 5 being "very difficult", how would you rate &lt;Exercise 3&gt;? <span style="color: red;">*</span>
                                    </h5>

                                    <div class="col-md-12 d-flex">
                                        <div class="col-md-3 left-end">
                                            <p style="color:black;">Very Easy</p>
                                        </div>
                                        <div class="col-md-1 d-grid">
                                            <label for="male" style="color:black;">1</label>
                                            <input type="radio" id="male" name="qeeuec" value="1" <?php if ($details['qeeuec'] == 1 ) echo 'checked';  ?> readonly>
                                        </div>
                                        <div class="col-md-1 d-grid">
                                            <label for="female" style="color:black;">2</label>
                                            <input type="radio" id="female" name="qeeuec" value="2" <?php if ($details['qeeuec'] == 2 ) echo 'checked';  ?> readonly>
                                        </div>
                                        <div class="col-md-1 d-grid">
                                            <label for="female" style="color:black;">3</label>
                                            <input type="radio" id="female" name="qeeuec" value="3" <?php if ($details['qeeuec'] == 3 ) echo 'checked';  ?> readonly>
                                        </div>
                                        <div class="col-md-1 d-grid">
                                            <label for="female" style="color:black;">4</label>
                                            <input type="radio" id="female" name="qeeuec" value="4" <?php if ($details['qeeuec'] == 4 ) echo 'checked';  ?> readonly>
                                        </div>
                                        <div class="col-md-1 d-grid">
                                            <label for="female" style="color:black;">5</label>
                                            <input type="radio" id="female" name="qeeuec" value="5" <?php if ($details['qeeuec'] == 5 ) echo 'checked';  ?> readonly>
                                        </div>


                                        <div class="col-md-4 right-end">
                                            <p style="color:black;">Very Difficult</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Please type your full name below as acknowledgement that you have completed the exercises in your individual care plan
                                        <span style="color: red;">*</span></h5>

                                    <input class="w-80" id="exerciseAnswer" type="text" name="exerciser" value="{{ $details['exerciser'] }}" style="outline: none; border: none; border-bottom: 1px solid gray;" readonly>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div style="margin: 20px;">
                    <p style="color:black;">A copy of your responses will be emailed to the address you provided.</p>
                </div>

     
                <div style="margin: 20px;">
                    <p>Review us on Yelp, Google, etc.</p>
                </div>
            </div>
        </div>
    </form>
    <!-- Mutli Step Modal End -->
</div>


</body>

</html>