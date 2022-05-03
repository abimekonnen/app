<!DOCTYPE html>

<html>
<head>
    <link href="{{ url('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ url('css/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ url('css/style.css') }}" rel="stylesheet">
    <title>APP</title>

</head>

<body >
    <!-- <nav class="navbar navbar-light bg-dark ">
      <label class="" style="margin-left: 25%;">App</label>
    </nav> -->
    <header>
        
    </header>

    <main >
        <section id="side" class="bg-secondary text-white" style="height: 100vmin; width: 12%;">
            <div class="list-group  bg-secondary" style="padding-top: 20%">
                <a style="" href="atm" class="list-group-item  bg-secondary text-white  sideLink">Register</a>
           </div>
        </section>
        <section id="content" class=" text-white"  style="width: 88%; margin-left: 12%;background-color: rgba(216, 216, 216, 0.39)">
                <div id="registerForm" style="padding-top: 2%; padding-left: 5%; padding-right: 5%; padding-bottom: 5%;">
                  {{-- {{ route(AtmControler.store) } --}}
                    @if (session()->has('success'))
                      <div class="alert alert-success">
                        {{ session()->get('success') }}
                      </div> 
                    @endif
                    @if (session()->has('error'))
                      <div class="alert alert-danger">
                        {{ session()->get('error') }}
                      </div> 
                    @endif
                    @include('partial.error')
                    <form class="row g-3"action="atm" method="POST" enctype="multipart/form-data" >
                      @csrf
                        <div class="col-md-3">
                            <label for="inputState" class="form-label text-primary">ATM</label>
                            <select id="name" name="name" class="form-select">
                              @foreach ($atms as  $atm)
                                <option >{{ $atm->name }}</option>
                              @endforeach
                            </select>
                        </div>
                        <div class="col-md-3">
                          <label for="inputState" class="form-label text-primary">Problem</label>
                          <select id="problem" name="problem" class="form-select">
                            <option selected>Aptra</option>
                            <option>Dispenser</option>
                            <option>Dispenser belt</option>
                            <option>Card Reader</option>
                            <option>1st Casset</option>
                            <option>2nd Casset</option>
                            <option>3rd Casset</option>
                            <option>Medisa Indicater</option>
                            <option>Power Problem</option>
                            <option>Pc Core</option>
                            <option>Screen</option>
                            <option>Shutter</option>
                          </select>
                        </div>
                        <div class="col-md-2">
                          <label for="inputState" class="form-label text-primary">Ticket</label>
                          <input type="text" class="form-control" id="ticket" name="ticket" placeholder="Ticket ID">
                        </div>
                        {{-- <div class="col-md-2">
                            <label for="inputState" class="form-label text-primary">Status</label>
                            <select id="status" name="status" class="form-select">
                                <option selected>Not Solved</option>
                                <option>Solved</option>
                            </select>
                        </div> --}}
                        <div class="col-md-2" style="padding-top: 2%;">
                          <label for="inputState" class="form-label text-primary"></label>
                          <button type="submit" class="btn btn-success">Save</button>
                        </div>
                      </form>
                </div>

                <div id="Registered" style="padding-top: 0%; padding-left: 5%; padding-right: 5;">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                          <button class=" nav-link {{ $oneActive }}" id="one-tab" data-bs-toggle="tab" data-bs-target="#one" type="button" role="tab" aria-controls="one" aria-selected="{{ $one }}">
                            {{ date('d-m-y');}}
                          </button>
                        </li>
                        <li class="nav-item" role="presentation">
                          <button class="nav-link" id="two-tab" data-bs-toggle="tab" data-bs-target="#two" type="button" role="tab" aria-controls="two" aria-selected="false">
                            {{ date('d-m-y',strtotime("-1 days"));}}
                          </button>
                        </li>
                        <li class="nav-item" role="presentation">
                          <button class="nav-link" id="three-tab" data-bs-toggle="tab" data-bs-target="#three" type="button" role="tab" aria-controls="three" aria-selected="false">
                            {{ date('d-m-y',strtotime("-2 days"));}}
                          </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="four-tab" data-bs-toggle="tab" data-bs-target="#four" type="button" role="tab" aria-controls="four" aria-selected="false">
                              {{ date('d-m-y',strtotime("-3 days"));}}
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                          <button class="nav-link" id="five-tab" data-bs-toggle="tab" data-bs-target="#five" type="button" role="tab" aria-controls="five" aria-selected="false">
                            {{ date('d-m-y',strtotime("-4 days"));}}
                          </button>
                      </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link {{ $searchActive }}" id="selectDate-tab" data-bs-toggle="tab" data-bs-target="#selectDate" type="button" role="tab" aria-controls="selectDate" aria-selected="{{ $search }}">Search</button>
                        </li>
                    </ul>
                    <div class="tab-content text-success" id="myTabContent">
                        <div class="tab-pane fade show {{ $oneActive }} " id="one" role="tabpanel" aria-labelledby="one-tab" style="padding-top: 2%; padding-bottom: 1%;">

                              <table class="table">
                                  <thead>
                                    <tr>
                                      <th scope="col"  style="width: 5%;">No</th>
                                      <th scope="col" style="width: 20%;">ATM</th>
                                      <th scope="col" style="width: 20%;">Problem</th>
                                      <th scope="col" style="width: 20%;">Status</th>
                                      <th scope="col" style="width: 15%;">Ticket ID</th>
                                      <th scope="col" style="width: 20%;">Update Status</th>
                                    </tr>
                                  </thead>
                              </table>
                              <div class="overflow-auto "  style="height: 55vmin; margin-bottom: 2%">
                                  <table class="table">
                                  <tbody >
                                    
                                  @foreach ($incidents as $index => $incident)
                                      @if ($incident->created_at->format('d-m-y') === date('d-m-y'))
                                        <form class="" name="updateDelete" action="atm/{{ $incident->id }}" method="POST" enctype="multipart/form-data" >
                                            @csrf 
                                            @method('PUT')
                                          <tr>
                                             <th  style="width: 5%;">{{ 1 + $index   }}</th>
                                              {{-- @foreach ($atms as $atm )
                                                @if ($atm->id === $incident->atm_id)
                                                  <td style="width: 20%;">{{ $atm->name }}</td>
                                                @endif
                                              @endforeach --}}
                                              <td style="width: 20%;">{{ $incident->name }}</td>
                                              <td style="width: 20%;">{{ $incident->problem }}</td>
                                              <td style="width: 20%; padding-right: 5%">
                                                <select id="status" name="status" class="form-select">
                                                  @if( $incident->status == "not solved"){
                                                    <option selected>Not Solved</option>
                                                    <option>Solved</option>
                                                  }
                                                  @endif
                                                  @if( $incident->status == "solved"){
                                                    <option selected>Solved </option>
                                                    <option>Not Solved</option>
                                                  } 
                                                  @endif
                                                </select>
                                              </td>
                                              <td scope="col" style="width: 15%;">
                                                <input type="text" class="form-control" id="ticket" readonly name="ticket" value="{{ $incident->ticket }}">
                                              </td>
                                              <td style="width: 20%;">
                                                <button type="submit" class="btn-sm btn-outline-success">Update</button>
                                                <button id="deleteButton" type="button" class="btn-sm btn-outline-danger" 
                                                onclick="handleDelete({{ $incident->id}},'{{ $incident->name }}','{{ $incident->problem }}')">delete</button>   
                                              </td>
                                          </tr>
                                        </form>                                      
                                      @endif  
                                    @endforeach 
                                    </tbody>
                                  </table>
                              </div>   
                        </div>
                        <div class="tab-pane fade" id="two" role="tabpanel" aria-labelledby="two-tab" style="padding-top: 2%;" >
                          <table class="table">
                            <thead>
                              <tr>
                                <th scope="col"  style="width: 5%;">No</th>
                                <th scope="col" style="width: 20%;">ATM</th>
                                <th scope="col" style="width: 20%;">Problem</th>
                                <th scope="col" style="width: 20%;">Status</th>
                                <th scope="col" style="width: 15%;">Ticket ID</th>
                                <th scope="col" style="width: 20%;">Update Status</th>
                              </tr>
                            </thead>
                        </table>
                        <div class="overflow-auto "  style="height: 55vmin; margin-bottom: 2%">
                            <table class="table">
                            <tbody >
                            @foreach ($incidents as $index => $incident)
                                @if ($incident->created_at->format('d-m-y') === date('d-m-y',strtotime("-1 days")))
                                  <form class="" name="updateDelete" action="atm/{{ $incident->id }}" method="POST" enctype="multipart/form-data" >
                                      @csrf 
                                      @method('PUT')
                                    <tr>
                                       <th  style="width: 5%;">{{ 1 + $index   }}</th>
                                        <td style="width: 20%;">{{ $incident->name }}</td>
                                        <td style="width: 20%;">{{ $incident->problem }}</td>
                                        <td style="width: 20%; padding-right: 5%">
                                          <select id="status" name="status" class="form-select">
                                            @if( $incident->status == "not solved"){
                                              <option selected>Not Solved</option>
                                              <option>Solved</option>
                                            }
                                            @endif
                                            @if( $incident->status == "solved"){
                                              <option selected>Solved </option>
                                              <option>Not Solved</option>
                                            } 
                                            @endif
                                          </select>
                                        </td>
                                        <td scope="col" style="width: 15%;">
                                          <input type="text" class="form-control" id="ticket" readonly name="ticket" value="{{ $incident->ticket }}">
                                        </td>
                                        <td style="width: 20%;">
                                          <button type="submit" class="btn-sm btn-outline-success">Update</button>
                                          <button id="deleteButton" type="button" class="btn-sm btn-outline-danger" 
                                          onclick="handleDelete({{ $incident->id}},'{{ $incident->name }}','{{ $incident->problem }}')">delete</button>   
                                        </td>
                                    </tr>
                                  </form>                                      
                                @endif  
                              @endforeach 
                              </tbody>
                            </table>
                          </div>   
                        </div>
                        <div class="tab-pane fade" id="three" role="tabpanel" aria-labelledby="three-tab" style="padding-top: 2%;">
                          <table class="table">
                            <thead>
                              <tr>
                                <th scope="col"  style="width: 5%;">No</th>
                                <th scope="col" style="width: 20%;">ATM</th>
                                <th scope="col" style="width: 20%;">Problem</th>
                                <th scope="col" style="width: 20%;">Status</th>
                                <th scope="col" style="width: 15%;">Ticket ID</th>
                                <th scope="col" style="width: 20%;">Update Status</th>
                              </tr>
                            </thead>
                        </table>
                        <div class="overflow-auto "  style="height: 55vmin; margin-bottom: 2%">
                            <table class="table">
                            <tbody >
                            @foreach ($incidents as $index => $incident)
                                @if ($incident->created_at->format('d-m-y') === date('d-m-y',strtotime("-2 days")))
                                  <form class="" name="updateDelete" action="atm/{{ $incident->id }}" method="POST" enctype="multipart/form-data" >
                                      @csrf 
                                      @method('PUT')
                                    <tr>
                                       <th  style="width: 5%;">{{ 1 + $index }}</th>
                                        <td style="width: 20%;">{{ $incident->name }}</td>
                                        <td style="width: 20%;">{{ $incident->problem }}</td>
                                        <td style="width: 20%; padding-right: 5%">
                                          <select id="status" name="status" class="form-select">
                                            @if( $incident->status == "not solved"){
                                              <option selected>Not Solved</option>
                                              <option>Solved</option>
                                            }
                                            @endif
                                            @if( $incident->status == "solved"){
                                              <option selected>Solved </option>
                                              <option>Not Solved</option>
                                            } 
                                            @endif
                                          </select>
                                        </td>
                                        <td scope="col" style="width: 15%;">
                                          <input type="text" class="form-control" id="ticket" name="ticket" readonly value="{{ $incident->ticket }}">
                                        </td>
                                        <td style="width: 20%;">
                                          <button type="submit" class="btn-sm btn-outline-success">Update</button>
                                          <button id="deleteButton" type="button" class="btn-sm btn-outline-danger" 
                                          onclick="handleDelete({{ $incident->id}},'{{ $incident->name }}','{{ $incident->problem }}')">delete</button>   
                                        </td>
                                    </tr>
                                  </form>                                      
                                @endif  
                              @endforeach 
                              </tbody>
                            </table>
                                    </div>  
                        </div>
                        <div class="tab-pane fade" id="four" role="tabpanel" aria-labelledby="four-tab" style="padding-top: 2%;">
                          <table class="table">
                            <thead>
                              <tr>
                                <th scope="col"  style="width: 5%;">No</th>
                                <th scope="col" style="width: 20%;">ATM</th>
                                <th scope="col" style="width: 20%;">Problem</th>
                                <th scope="col" style="width: 20%;">Status</th>
                                <th scope="col" style="width: 15%;">Ticket ID</th>
                                <th scope="col" style="width: 20%;">Update Status</th>
                              </tr>
                            </thead>
                          </table>
                          <div class="overflow-auto "  style="height: 55vmin; margin-bottom: 2%">
                            <table class="table">
                            <tbody >
                            @foreach ($incidents as $index => $incident)
                                @if ($incident->created_at->format('d-m-y') === date('d-m-y',strtotime("-3 days")))
                                  <form class="" name="updateDelete" action="atm/{{ $incident->id }}" method="POST" enctype="multipart/form-data" >
                                      @csrf 
                                      @method('PUT')
                                    <tr>
                                       <th  style="width: 5%;">{{ 1 + $index   }}</th>
                                        <td style="width: 20%;">{{ $incident->name }}</td>
                                        <td style="width: 20%;">{{ $incident->problem }}</td>
                                        <td style="width: 20%; padding-right: 5%">
                                          <select id="status" name="status" class="form-select">
                                            @if( $incident->status == "not solved"){
                                              <option selected>Not Solved</option>
                                              <option>Solved</option>
                                            }
                                            @endif
                                            @if( $incident->status == "solved"){
                                              <option selected>Solved </option>
                                              <option>Not Solved</option>
                                            } 
                                            @endif
                                          </select>
                                        </td>
                                        <td scope="col" style="width: 15%;">
                                          <input type="text" class="form-control" id="ticket" name="ticket" readonly value="{{ $incident->ticket }}">
                                        </td>
                                        <td style="width: 20%;">
                                          <button type="submit" class="btn-sm btn-outline-success">Update</button>
                                          <button id="deleteButton" type="button" class="btn-sm btn-outline-danger" 
                                          onclick="handleDelete({{ $incident->id}},'{{ $incident->name }}','{{ $incident->problem }}')">delete</button>   
                                        </td>
                                    </tr>
                                  </form>                                      
                                @endif  
                              @endforeach 
                              </tbody>
                            </table>
                          </div>  
                        </div>
                        <div class="tab-pane fade" id="five" role="tabpanel" aria-labelledby="five-tab" style="padding-top: 2%;">
                          <table class="table">
                            <thead>
                              <tr>
                                <th scope="col"  style="width: 5%;">No</th>
                                <th scope="col" style="width: 20%;">ATM</th>
                                <th scope="col" style="width: 20%;">Problem</th>
                                <th scope="col" style="width: 20%;">Status</th>
                                <th scope="col" style="width: 15%;">Ticket ID</th>
                                <th scope="col" style="width: 20%;">Update Status</th>
                              </tr>
                            </thead>
                          </table>
                          <div class="overflow-auto "  style="height: 55vmin; margin-bottom: 2%">
                            <table class="table">
                            <tbody >
                            @foreach ($incidents as $index => $incident)
                                @if ($incident->created_at->format('d-m-y') === date('d-m-y',strtotime("-4 days")))
                                  <form class="" name="updateDelete" action="atm/{{ $incident->id }}" method="POST" enctype="multipart/form-data" >
                                      @csrf 
                                      @method('PUT')
                                    <tr>
                                       <th  style="width: 5%;">{{ 1 + $index   }}</th>
                                        <td style="width: 20%;">{{ $incident->name }}</td>
                                        <td style="width: 20%;">{{ $incident->problem }}</td>
                                        <td style="width: 20%; padding-right: 5%">
                                          <select id="status" name="status" class="form-select">
                                            @if( $incident->status == "not solved"){
                                              <option selected>Not Solved</option>
                                              <option>Solved</option>
                                            }
                                            @endif
                                            @if( $incident->status == "solved"){
                                              <option selected>Solved </option>
                                              <option>Not Solved</option>
                                            } 
                                            @endif
                                          </select>
                                        </td>
                                        <td scope="col" style="width: 15%;">
                                          <input type="text" class="form-control" id="ticket" name="ticket" readonly value="{{ $incident->ticket }}">
                                        </td>
                                        <td style="width: 20%;">
                                          <button type="submit" class="btn-sm btn-outline-success">Update</button>
                                          <button id="deleteButton" type="button" class="btn-sm btn-outline-danger" 
                                          onclick="handleDelete({{ $incident->id}},'{{ $incident->name }}','{{ $incident->problem }}')">delete</button>   
                                        </td>
                                    </tr>
                                  </form>                                      
                                @endif  
                              @endforeach 
                              </tbody>
                            </table>
                          </div>  
                        </div>
                        <div class="tab-pane fade show {{ $searchActive }}" id="selectDate" role="tabpanel" aria-labelledby="selectDate-tab" style="padding-top: 2%;">
                          {{-- <a class="btn btn-success" href="export">export</a> --}}
                            <form class="input-group" action="atm" method="GET" style="margin-bottom: 2%">
                             <div class="row">
                              <div class="col-md-6" style="" >
                                <input type="text" class="form-control" id="query" name="query" style="padding-bottom: 2%;" placeholder="Search by name" >                                
                              </div >
                              <div class="col-md-5" style="" >
                                <input type="date" class="form-control" id="date" name="date" style="padding-bottom: 2%;" >
                              </div>
                              <div  class="col-md-1" style="">
                                 <button type="submit" class="btn-sm btn-success">Search</button>
                              </div>
                             </div>
                            </form>
                            <table class="table" style="padding-top: 5%">
                                <thead>
                                  <tr>
                                    <th scope="col"  style="width: 5%;">No</th>
                                    <th scope="col" style="width: 20%;">ATM</th>
                                    <th scope="col" style="width: 15%;">Problem</th>
                                    <th scope="col" style="width: 15%;">Status</th>
                                    <th scope="col" style="width: 15%;">Register Date</th>
                                    <th scope="col" style="width: 10%;">Ticket ID</th>
                                    <th scope="col" style="width: 20%;">Update Status</th>
                                  </tr>
                                </thead>
                            </table>
                                    <div class="overflow-auto "  style="height: 54vmin; margin-bottom: 2%" >
                                        <table class="table" >
                                        <tbody >
                                          @foreach ($incidents as  $index => $incident)
                                           <form class="" name="updateDelete" action="atm/{{ $incident->id }}" method="POST" enctype="multipart/form-data" >
                                            @csrf 
                                            @method('PUT')
                                            <tr>
                                              <th  style="width: 5%;">{{ 1 + $index  }}</th>
                                              <td style="width: 20%;">{{ $incident->name }}</td>
                                              <td style="width: 15%;">{{ $incident->problem }}</td>
                                              <td style="width: 14%; padding-right: 5%">
                                                <select id="status" name="status" class="form-select">
                                                  @if( $incident->status == "not solved"){
                                                    <option selected>Not Solved</option>
                                                    <option>Solved</option>
                                                  }
                                                  @endif
                                                  @if( $incident->status == "solved"){
                                                    <option selected>Solved </option>
                                                    <option>Not Solved</option>
                                                  } 
                                                  @endif
                                                </select>
                                              </td>
                                              <td style="width: 15%;">{{ $incident->created_at->format('d-m-y') }}</td>
                                              <td scope="col" style="width: 10%;">
                                                <input type="text" class="form-control" id="ticket" name="ticket" readonly value="{{ $incident->ticket }}">
                                              </td>
                                              <td style="width: 20%;">
                                                <button type="submit"  id="updateButton" class="btn-sm btn-outline-success">Update</button>
                                                <button id="deleteButton" type="button" class="btn-sm btn-outline-danger" 
                                                onclick="handleDelete({{ $incident->id}},'{{ $incident->name }}','{{ $incident->problem }}')">delete</button>   
                                              </td>
                                            </tr>
                                           </form>
                                          @endforeach
                                          </tbody>
                                        </table>
                                    </div>   
                        </div>
                    </div>
                </div>
        </section>

        <!-- Modal Delete -->
        <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Delete</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div id="deleteMessage" class="modal-body text-primary">
                Are You Sure Want to Delete
              </div>
              <form action="" method="POST" id="deleteIncidentForm">
                @csrf 
                @method('DELETE')
                <div class="modal-footer">
                  <button type="button" class="btn btn-outline-success" data-bs-dismiss="modal">No Go back</button>
                  <button type="submit  " class="btn btn-outline-danger">Yes Delete</button>
                </div>
              </form>
            </div>
          </div>
       </div> 

      <!-- Modal Update -->
       <div class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="updateModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Update</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div id="updateMessage" class="modal-body text-primary">
              Are You Sure Want to Update
            </div>
            <form action="" method="POST" id="updateIncidentForm">
              @csrf 
              @method('PUT')
              <input type="text" class="form-control" id="ticketUpdate" name="ticket" value="">
              <input type="text" class="form-control" id="statusUpdate" name="status" value="">
              <div class="modal-footer">
                <button type="button" class="btn btn-outline-success" data-bs-dismiss="modal">No Go back</button>
                <button type="submit  " class="btn btn-outline-danger">Yes Update</button>
              </div>
            </form>
          </div>
        </div>
       </div> 
    </main>
    <footer>
        <script src="{{ url('js/bootstrap.min.js') }}"></script>
        {{-- <script src="{{ url('js/bootstrap.js"') }}"></script> --}}
        <script src="{{ url('js/jquery.js') }}"></script>

        <script>

          var sidebar = document.getElementById("side");
          var maincotaint = document.getElementById("content");
          window.onload = function() {
            h = window.innerHeight;
            sidebar.style.height = h.toString() + "px";
            maincotaint.style.marginTop = "-"+h.toString() + "px";
            maincotaint.style.height = h.toString() + "px";
          }
            window.addEventListener("resize", function(event) {
              h = window.innerHeight;
              sidebar.style.height = h.toString() + "px";
              maincotaint.style.marginTop = "-"+h.toString() + "px";
              maincotaint.style.height = h.toString() + "px";
            })
          function handleDelete(id,name,problem){
            var form = document.getElementById('deleteIncidentForm');
            var message = document.getElementById('deleteMessage');
            message.innerText = '  ' + name + ' Problem  ' + problem;
            form.action ='atm/' + id;
            console.log(form);
            $('#deleteModal').modal('show');
            // $(function () {
            //   $("#deleteButton").click(function () {
            //       $("#deleteModal").modal("show");
            //   });
            // });
          }  
          function handleUpdate(id,ticket,status){
            var form = document.getElementById('updateIncidentForm');
            var message = document.getElementById('updateMessage');
            var ticketUpdate = document.getElementById('ticketUpdate');
            var statusUpdate = document.getElementById('statusUpdate');
            // var idUpdate = document.getElementById('idUpdate');
            message.innerText = '  ' + name ;
            ticketUpdate.value = ticket;
            statusUpdate.value = status;
            // idUpdate.value = id;
            form.action ='atm/' + id;
            console.log(form);
            console.log(ticketUpdate.value);
            $('#updateModal').modal('show');
          }
        </script>
    </footer>
</body>

</html>