<div class="row">
    <div class="col-md-12">
        <h4 class="text-success">Telephone:{{$branch->telephone}}</h4>
        <div class="accordion" id="accordionExample">
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingOne">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        <h4 class="text-primary" >Outgoing Calls</h4>
                    </button>
                </h2>
                <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne"
                     data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <table class="table table-striped table-bordered table-hover  order-column" id="">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Date</th>
                                <th>Source</th>
                                <th>Destination</th>
                                <th>Call Type</th>
                                <th>Status</th>
                                <th>Duration (Sec)</th>
                                <th>Listen</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php $count=1 @endphp
                            @foreach ($outcome as $e)
                                <tr>
                                    <td>{{ $count++ }}</td>
                                    <td>{{ $e->date }}</td>
                                    <td>{{ $e->from }}</td>
                                    <td>{{ $e->to }}</td>
                                    <td>{{ $e->call_type }}</td>
                                    <td>{{ $e->disposition }}</td>
                                    <td>{{ $e->duration }}</td>
                                    <td>
                                        @if ($e->record_file_name)
                                            <a href="/records/{{ $e->record_file_name }}" target="_blank"
                                               class="listen">Listen</a>
                                        @endif

                                    </td>
                                </tr>
                                @php $count++ @endphp
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingTwo">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        <h4 class="text-primary">Incoming Calls</h4>
                    </button>
                </h2>
                <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                     data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <table class="table table-striped table-bordered table-hover  order-column" id="">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Date</th>
                                <th>Source</th>
                                <th>Destination</th>
                                <th>Call Type</th>
                                <th>Status</th>
                                <th>Duration (Sec)</th>
                                <th>Listen</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php $count=1 @endphp
                            @foreach ($outcome as $e)
                                <tr>
                                    <td>{{ $count++ }}</td>
                                    <td>{{ $e->date }}</td>
                                    <td>{{ $e->from }}</td>
                                    <td>{{ $e->to }}</td>
                                    <td>{{ $e->call_type }}</td>
                                    <td>{{ $e->disposition }}</td>
                                    <td>{{ $e->duration }}</td>
                                    <td>
                                        @if ($e->record_file_name)
                                            <a href="/records/{{ $e->record_file_name }}" target="_blank"
                                               class="listen">Listen</a>
                                        @endif

                                    </td>
                                </tr>
                                @php $count++ @endphp
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="heading3">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapse3" aria-expanded="false" aria-controls="collapse3">
                        <h4 class="text-primary">SMS Messages</h4>
                    </button>
                </h2>
                <div id="collapse3" class="accordion-collapse collapse" aria-labelledby="heading3"
                     data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <table class="table table-striped table-bordered table-hover  order-column" id="">
                            <thead>
                            <tr>
                                <th>Date</th>
                                <th>Sender</th>
                                <th>Module</th>
                                <th>Text</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php $count=1 @endphp
                            @foreach ($sms as $s)

                                <tr>
                                    <td>
                                        <small>{{ date('Y-m-d h:i:s', strtotime($s->created_at)) }}</small>
                                    </td>
                                    <td>
                                        <span>{{ $s->gateway }}</span>
                                    </td>
                                    <td>
                                        <span><a
                                                href="/{{ $s->module }}/edit/{{ $s->module_id }}">{{ $s->module }}</a></span>
                                    </td>
                                    <td>

                                        <span class="text-danger text-right ">{{ $s->message }}</span>

                                    </td>


                                </tr>
                                @php $count++ @endphp
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>


    </div>
</div>


