@extends('layouts.patient')

@section('content')
        <section class="pt-50 pb-50"> 
            <div class="container">
                <h1 class="custom-h1">Welcome back Howard!</h1>
                <div class="patient-box pt-10px mt-25px">
                    <div class="row">
                        <div class="col-md-7">
                            <p class="patient-bold-blue-p mb-0 d-flex"><i class="material-icons-outlined mt-15px">trending_up</i>&nbsp;&nbsp;This Week's progress</p>
                            <p class="custom-16-font mb-0"><b>You're on a roll!</b> You've logged 4 Self Directed sessions this week.</p>
                            <p class="custom-16-font mb-0">Keep up the good work, consistency is key to recovery.</p>
                        </div>
                   
                        <div class="col-md-5 m-auto">
                            <p>Stars , Coming soon</p>
                        </div>
                    </div>
                </div>

                <div class="row mt-35px">
                    <div class="col-md-6">
                            <div class="patient-box pt-10px">
                                <p class="patient-bold-blue-p mb-0px d-flex"><i class="material-icons-outlined mt-15px">supervised_user_circle</i>&nbsp;&nbsp;Appointments</p>
                                <h1 class="custom-h3-normal mt-minus-10">Attend a telehealth appointment.</h1>

                                <div class="form-group d-grid mb-12px">
                                    <label class="patient-small-label" for="practitioner">Practitioner</label>
                                    <select class="patient-select-box" name="practitioner" id="practitioner">
                                        <option value="0">Select Practitioner</option>
                                        <option value="1">Dr. Wang</option>
                                    </select>
                                </div>

                                <div class="form-group d-grid">
                                    <label class="patient-small-label" for="practitioner">Queue Time</label>
                                    <select  class="patient-select-box" name="practitioner" id="practitioner">
                                        <option value="0">Select Queue Time</option>
                                        <option value="1">15:00</option>
                                    </select>
                                </div>

                                <div class="mt-30px mb-10">
                                    <a href="{{ route('patient.waiting') }}"><button class="btn patient-disabled-btn patient-btn-text width-246px height-36px"> Enter Waiting Room</button></a>
                                </div>
                            </div>
                    </div>
                    <div class="col-md-6">
                            <div class="patient-box pt-10px">
                                <p class="patient-bold-blue-p mb-0px d-flex"><i class="material-icons-outlined mt-15px">account_circle</i>&nbsp;&nbsp;Self Directed Session</p>
                                <h1 class="custom-h3-normal mt-minus-10">You have homework exercises.</h1>

                                <div class="form-group d-grid mb-12px mt-20px">
                                    <p class="custom-16-font">
                                        Dr. Wang prescribed <b>three exercises</b> <br> for You
                                        to perform at home. 
                                    </p>
                                </div>

                                <div class="form-group d-grid mt-28px">
                                    <p class="custom-16-font mb-0">
                                        Frequency: <b>Daily</b>
                                    </p>
                                    <p class="custom-16-font">
                                        Estimated Time: <b>30 minutes</b>
                                    </p>
                                </div>

                                <div class="mt-30px mb-10">
                                    <a href="{{ route('patient.careplan') }}"><button class="btn blue-btn patient-btn-text width-150px height-36px">Let's do it</button></a>
                                </div>
                            </div>
                    </div>
                </div>

                <div class="row mt-35px">
                    <div class="col-md-12">
                        <div class="patient-box pt-10px">
                            <p class="patient-bold-blue-p mb-0px d-flex"><i class="material-icons-outlined mt-15px">assignment</i>&nbsp;&nbsp;Your Care plan</p>
                            <div class="row">
                                    <div class="col-md-4">
                                        <h1 class="custom-h3-normal">Overview</h1>
                                    </div>
                                    <div class="col-md-8">
                                        <h1 class="custom-h3-normal">Practitioner's Notes</h1>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="patient-gray-box">
                                                <p class="custom-h2 mb-10">Back Strengthening</p>
                                                <p class="sub-title-p mb-0px">Created: 10/02/20</p>
                                                <p class="sub-title-p mb-0px">Length: 6 weeks</p>
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="patient-gray-box">
                                                <p class="sub-title-p">
                                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi in commodo tellus. Nam velit diam, eleifend non est a, convallis elementum libero. Nam finibus lacus a metus hendrerit sollicitudin.
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    
                            </div>

                            <h1 class="custom-h3-normal mt-25px">Current Treatment</h1>
                            <div>
                                <button class="btn blue-btn patient-btn-text width-303px height-36px">
                                    Start Self Directed Session
                                </button>
                            </div>

                            <div class="row mt-25px">
                                    <div class="col-md-4">
                                        <div class="patient-card-box">
                                            <iframe width="100%" height="196" src="https://www.youtube.com/embed/vuGnzLxRvZM" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                            <p class="patient-card-box-title mt-15px mb-5px">Upper Back Stretches</p>
                                            <ul class="pl-18px">
                                                <li class="exercise-li-muted-font">4x week, for 20 minutes</li>
                                                <li class="exercise-li-muted-font">Continue for 3 weeks</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="patient-card-box">
                                            <iframe width="100%" height="196" src="https://www.youtube.com/embed/6BhPhO4ZXNA" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                            <p class="patient-card-box-title mt-15px mb-5px">SI Joint Extension</p>
                                            <ul class="pl-18px" >
                                                <li class="exercise-li-muted-font">4x week, for 20 minutes</li>
                                                <li class="exercise-li-muted-font">Continue for 3 weeks</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="patient-card-box">
                                            <iframe width="100%" height="196" src="https://www.youtube.com/embed/jwoTJNgh8BY" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                            <p class="patient-card-box-title mt-15px mb-5px">Lumbar Stenosis Stretches</p>
                                            <ul class="pl-18px">
                                                <li class="exercise-li-muted-font">4x week, for 20 minutes</li>
                                                <li class="exercise-li-muted-font">Continue for 3 weeks</li>
                                            </ul>
                                        </div>
                                    </div>
                            </div>

                            <a href="#" class="patient-link-text mt-10">View Previous Care Plans</a>
                        </div>
                    </div>
                </div>

                <div class="row mt-35px">
                    <div class="col-md-12">
                        <div class="patient-box pt-10px">
                            <p class="patient-bold-blue-p d-flex"><span class="material-icons-outlined mt-15px">history</span>&nbsp;&nbsp;History</p>

                            <div class="row">
                                <div class="col-md-3">
                                    <div class="history-card">
                                        <p class="history-brandon-font">Total Sessions completed</p>
                                        <h3 class="history-brandon-big-font mb-0">14</h3>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="history-card">
                                        <p class="history-brandon-font">Weekly Session Completed</p>
                                        <h3 class="history-brandon-big-font mb-0">3</h3>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="history-card">
                                        <p class="history-brandon-font">Average Session Length</p>
                                        <h3 class="history-brandon-big-font mb-0">23 min</h3>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="history-card pl-0 pr-0">
                                        <p class="history-brandon-font">Consecutive session streak</p>
                                        <h3 class="history-brandon-big-font mb-0">3 days</h3>
                                    </div>
                                </div>
                            </div>

                            <p class="patient-bold-blue-p mt-15px">Your Sessions Over Time</p>
                            <div>
                                <img src="{{ asset('admin_assets/dist/img/patternedchart.png') }}" alt="chart">
                            </div>

                            <p class="patient-bold-blue-p">Your Pain Over Time</p>

                            <p class="exercise-blue-small-font mb-35px">09/28/2020 - 10/04/2020 &nbsp;<i class="fas fa-angle-down"></i></p>
                            <canvas id="myChart" height="200" width="900"></canvas>
                        </div>
                    </div>
                </div>
                
            </div>
        </section>
@endsection

@section('javascript')
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js" integrity="sha512-s+xg36jbIujB2S2VKfpGmlC3T5V2TF3lY48DX7u2r9XzGzgPsa6wTpOQA7J9iffvdeBN0q9tKzRxVxw1JviZPg==" crossorigin="anonymous"></script>
<script>
var ctx = document.getElementById('myChart');
var myChart = new Chart(ctx, {
    type: 'line',
    data: {
        labels: ['','Mon','Tue','Wed','Thur','Fri','Sat','Sun',''],
        datasets: [{ 
            data: [2,2,2,2,1,2,1,1,1],
            label: "Pateint Record After Session ",
            borderColor: "#4681ec", // blue
            backgroundColor: "rgb(70, 129, 236, 0.6)",
            fill: 'start'
        }, { 
            data: [4,4,3,3,2,2,2,2,2],
            label: "Patient Record Before Session",
            borderColor: "#ff9e58", // dark yellow
            backgroundColor: "rgb(255, 158, 88, 0.6)",
            fill: 'start'
        }
        ]
    },
    options: {
        responsive: true,
        maintainAspectRatio: true,
        bezierCurve: false,
        elements: {
            line: {
                tension: 0
            }
        },
        scales: {
            xAxes: [{
                gridLines: {
                    display: false
                }
            }],
            yAxes: [{
                stacked: false,
				display: true,
				scaleLabel: {
					show: true
				},
				gridLines:{
                    // color:"#ecedef",
                    display: false,
				},
				ticks: {
                    min: 0,
                    max: 5,
					beginAtZero:true,
					stepSize: 1,
					fontColor:"#8f9092",
					callback:function(value) { 
					    var x = ["", "No Pain", "Mild", "Moderate", "Intense", "Unspeakable"];
							return x[value];
					}
				}
			}]
        },
        legend: {
            display: true,
            position: 'right'
        }
       
    }
});
</script>
@endsection
