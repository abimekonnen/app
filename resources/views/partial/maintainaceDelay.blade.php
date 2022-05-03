<div class="tab-pane fade" id="maitainaceDelay" role="tabpanel" aria-labelledby="maitainaceDelay-tab" style="padding-top: 2%;">
    <table class="table">
      <thead>
        <tr>
          <th scope="col"  style="width: 5%;">No</th>
          <th scope="col" style="width: 20%;">ATM</th>
          <th scope="col" style="width: 20%;">Problem</th>
          <th scope="col" style="width: 20%;">Registered Date</th>
          <th scope="col" style="width: 20%;">Delay Time</th>
          <th scope="col" style="width: 15%;">Ticket ID</th>
          
        </tr>
      </thead>
    </table>
    <div class="overflow-auto "  style="height: 55vmin; margin-bottom: 2%">
      <table class="table">
      <tbody >
      @foreach ($incidents as $index => $incident)
          @if ($incident->status == "not solved" &&  $incident->updated_at->format('d-m-y') > $incident->created_at->format('d-m-y'))

              <tr>
                 <th  style="width: 5%;">{{ 1 + $index   }}</th>
                  <td style="width: 20%;">{{ $incident->name }}</td>
                  <td style="width: 20%;">{{ $incident->problem }}</td>
                  <td style="width: 20%; padding-right: 5%">{{ $incident->created_at->format('d-m-y')}}</td>
                  <td style="width: 20%;">
                    Delay Time {{ $incident->status }}
                  </td>
                  <td scope="col" style="width: 15%;">
                    <input type="text" class="form-control" id="ticket" name="ticket" readonly value="{{ $incident->ticket }}">
                  </td>
              </tr>
                                     
          @endif  
        @endforeach 
        </tbody>
      </table>
    </div>  
  </div>