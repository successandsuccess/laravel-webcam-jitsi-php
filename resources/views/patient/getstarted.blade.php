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
                   
                        <div class="col-md-5 mt-25px text-center">
                            <img src="{{ asset('admin_assets/dist/img/stars.png') }}" alt="stars">
                        </div>
                    </div>
                </div>

                <div class="row mt-35px">
                    <div class="col-md-6">
                            <div class="patient-box pt-10px">
                                <p class="patient-bold-blue-p mb-0px d-flex"><i class="material-icons-outlined mt-15px">supervised_user_circle</i>&nbsp;&nbsp;Appointments</p>
                                <h1 class="custom-h3-normal mt-minus-10">Attend a telehealth appointment.</h1>

                                <div class="form-group d-grid mb-12px">
                                    <label class="patient-small-label" for="provider">Provider</label>
                                    <select class="patient-select-box" onchange="providerHandleChange()" name="provider" id="provider">
                                        <option value="0">Select Provider</option>
                                        <option value="1">Dr. Wang</option>
                                        <option value="2">Dr. Smith</option>
                                        <option value="2">Dr. John</option>
                                    </select>
                                </div>

                                <div class="form-group d-grid">
                                    <label class="patient-small-label" for="queuetime">Queue Time</label>
                                    <select  class="patient-select-box" onchange="queuetimeHandleChange()"  name="queuetime" id="queuetime">
                                        <option value="0">Select Queue Time</option>
                                        <option value="1">15:00</option>
                                        <option value="2">15:30</option>
                                        <option value="3">16:00</option>
                                    </select>
                                </div>

                                <div class="mt-30px mb-10">
                                    <button id="enterwaitingbtn" onclick="handleEnterWaitingRoom()" class="waiting btn patient-btn-text width-246px height-36px patient-disabled-btn"> Enter Waiting Room</button>
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
                                        <h1 class="custom-h3-normal">Provider's Notes</h1>
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
                                                When abdominal muscles are not performing, the muscles of the lower back have to work harder to stabilize your body.  The lumbar spine continues into the hips. When the hip flexors become tight, mobility in the lower back can become constricted. The piriformis muscle is located in the buttocks, but is often responsible for causing shooting pain through the legs and lower back.
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    
                            </div>

                            <h1 class="custom-h3-normal mt-25px">Current Treatment</h1>
                            <div>
                                <a href="{{ route('patient.careplan') }}">
                                    <button class="btn blue-btn patient-btn-text width-303px height-36px">
                                        Start Self Directed Session
                                    </button>
                                </a>
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

                            <!-- <div>
                                <img src="{{ asset('admin_assets/dist/img/patternedchart.png') }}" alt="chart">
                            </div> -->
                            <div class="text-left mt-minus-40px">
                                <div id = "container"></div>
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
            label: "Patient Record After Session ",
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

let provider = document.getElementById('provider');
let queuetime = document.getElementById('queuetime');

function providerHandleChange() {
    console.log(provider.value,queuetime.value )
    if (provider.value != 0 && queuetime.value != 0) {
        document.getElementById('enterwaitingbtn').classList.remove('patient-disabled-btn');
        document.getElementById('enterwaitingbtn').classList.add('blue-btn');
    }

    if (provider.value == 0 && queuetime.value == 0) {
        document.getElementById('enterwaitingbtn').classList.remove('blue-btn');
        document.getElementById('enterwaitingbtn').classList.add('patient-disabled-btn');
    }
}

function queuetimeHandleChange() {
    console.log(provider.value,queuetime.value )
    if (provider.value != 0 && queuetime.value != 0) {
        document.getElementById('enterwaitingbtn').classList.remove('patient-disabled-btn');
        document.getElementById('enterwaitingbtn').classList.add('blue-btn');
    }

    if (provider.value == 0 && queuetime.value == 0) {
        document.getElementById('enterwaitingbtn').classList.remove('blue-btn');
        document.getElementById('enterwaitingbtn').classList.add('patient-disabled-btn');
    }
}

function handleEnterWaitingRoom() {
    let classList = document.getElementsByClassName("waiting btn patient-btn-text width-246px height-36px patient-disabled-btn");
    let classLength = classList.length;

    if (classLength != 0) {
        window.alert('Please select Provider and Queue Time');
    }
    else {
        window.location = '/patient/waiting';
    }
}
</script>

<script type = "text/javascript" src = "https://www.gstatic.com/charts/loader.js"></script>
<script type = "text/javascript">
    google.charts.load('current', {packages: ['corechart','calendar']});     
</script>
<script language = "JavaScript">
         function drawChart() {
            // Define the chart to be drawn.
            var data = new google.visualization.DataTable();
            data.addColumn({ type: 'date', id: 'Date' });
            data.addColumn({ type: 'number', id: 'Students' });
            data.addRows([
               [ new Date(2020, 3, 13), 50 ],
               [ new Date(2020, 3, 14), 50 ],
               [ new Date(2020, 3, 15), 49 ],
               [ new Date(2020, 3, 16), 48 ],
               [ new Date(2020, 3, 17), 50 ],
               [ new Date(2020, 3, 19), 50 ],
               [ new Date(2020, 3, 20), 50 ],
               [ new Date(2020, 3, 22), 50 ],
               [ new Date(2020, 3, 23), 50 ],
               [ new Date(2020, 3, 24), 50 ],
               [ new Date(2020, 3, 25), 50 ],
               [ new Date(2020, 3, 26), 50 ],
               [ new Date(2020, 3, 27), 50 ],
               [ new Date(2020, 3, 28), 48 ],
               [ new Date(2020, 3, 29), 48 ],
            
               [ new Date(2020, 4, 1), 50 ],
               [ new Date(2020, 4, 2), 50 ],
               [ new Date(2020, 4, 3), 49 ],
               [ new Date(2020, 4, 4), 48 ],
               [ new Date(2020, 4, 5), 50 ], 
               [ new Date(2020, 4, 6), 50 ],
               [ new Date(2020, 4, 8), 50 ],
               [ new Date(2020, 4, 9), 49 ],
               [ new Date(2020, 4, 10), 48 ],
               [ new Date(2020, 4, 11), 50 ], 
               [ new Date(2020, 4, 12), 50 ],
               [ new Date(2020, 4, 13), 50 ],
               [ new Date(2020, 4, 14), 49 ],
               [ new Date(2020, 4, 15), 48 ],
               [ new Date(2020, 4, 16), 50 ], 
               [ new Date(2020, 4, 17), 50 ], 
               [ new Date(2020, 4, 18), 50 ],
               [ new Date(2020, 4, 19), 50 ],
               [ new Date(2020, 4, 20), 49 ],
               [ new Date(2020, 4, 21), 48 ],
               [ new Date(2020, 4, 22), 50 ],
               [ new Date(2020, 4, 23), 50 ], 
               [ new Date(2020, 4, 24), 50 ],
               [ new Date(2020, 4, 25), 50 ],
               [ new Date(2020, 4, 27), 49 ],
               [ new Date(2020, 4, 28), 48 ],
               [ new Date(2020, 4, 29), 50 ],
            
               [ new Date(2020, 5, 4), 40 ],
               [ new Date(2020, 5, 5), 50 ],
               [ new Date(2020, 5, 10), 48 ],
               [ new Date(2020, 5, 11), 50 ],
               [ new Date(2020, 5, 12), 42 ],
               [ new Date(2020, 5, 13), 45 ],
               [ new Date(2020, 5, 14), 46 ],
               [ new Date(2020, 5, 16), 45 ],
               [ new Date(2020, 5, 17), 40 ],
               [ new Date(2020, 5, 18), 50 ],
               [ new Date(2020, 5, 19), 48 ],
               [ new Date(2020, 5, 20), 50 ],
               [ new Date(2020, 5, 21), 42 ],
               [ new Date(2020, 5, 22), 45 ],
               [ new Date(2020, 5, 23), 46 ],
               [ new Date(2020, 5, 24), 45 ],
               [ new Date(2020, 5, 25), 40 ],
               [ new Date(2020, 5, 26), 50 ],
               [ new Date(2020, 5, 27), 48 ],
               [ new Date(2020, 5, 28), 50 ],
               [ new Date(2020, 5, 29), 42 ],
               [ new Date(2020, 5, 30), 45 ],
          
            ]);

            
            // Set chart options
            var options = {
               'title':'',
               'width':650,
               'height':200,
               calendar: {
               
                  yearLabel: {
                     fontName: 'Times-Roman',
                     fontSize: 32,
                    //  color: '#1A8763',
                     color: 'gray',
                     bold: true,
                     italic: true
                  },
               
                  monthOutlineColor: {
                     stroke: '#981b48',
                     strokeOpacity: 0.8,
                     strokeWidth: 2
                  },
               
                  unusedMonthOutlineColor: {
                     stroke: '#bc5679',
                     strokeOpacity: 0.8,
                     strokeWidth: 1
                  }		 
               }
            };

            // Instantiate and draw the chart.
            var chart = new google.visualization.Calendar(document.getElementById('container'));
            chart.draw(data, options);
         }
         google.charts.setOnLoadCallback(drawChart);
      </script>
@endsection
