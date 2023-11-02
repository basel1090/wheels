<div class="d-flex flex-row">
    <span class="svg-icon svg-icon-2 svg-icon-primary">
        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path opacity="0.3"
                  d="M8 8C8 7.4 8.4 7 9 7H16V3C16 2.4 15.6 2 15 2H3C2.4 2 2 2.4 2 3V13C2 13.6 2.4 14 3 14H5V16.1C5 16.8 5.79999 17.1 6.29999 16.6L8 14.9V8Z"
                  fill="currentColor" />
            <path
                d="M22 8V18C22 18.6 21.6 19 21 19H19V21.1C19 21.8 18.2 22.1 17.7 21.6L15 18.9H9C8.4 18.9 8 18.5 8 17.9V7.90002C8 7.30002 8.4 6.90002 9 6.90002H21C21.6 7.00002 22 7.4 22 8ZM19 11C19 10.4 18.6 10 18 10H12C11.4 10 11 10.4 11 11C11 11.6 11.4 12 12 12H18C18.6 12 19 11.6 19 11ZM17 15C17 14.4 16.6 14 16 14H12C11.4 14 11 14.4 11 15C11 15.6 11.4 16 12 16H16C16.6 16 17 15.6 17 15Z"
                fill="currentColor" />
        </svg>
    </span>
    <h4 class="ms-3 text-primary">SMS Messages</h4>
</div>
<table class="table table-bordered">
    <thead>
    <tr>
        <th>
            ID
        </th>
        <th>
            SMS TYPE
        </th>
        <th>
            TO #
        </th>
        <th>
            TEXT
        </th>
        <th>
            Created at
        </th>
        <th>
            Actions
        </th>
    </tr>
    </thead>
    <tbody>
    @isset($SmsMessages)
    @if (  count($SmsMessages) == 0)
        <tr>
            <td colspan="6" class="fw-bold text-center text-muted">
                No data to display
            </td>
        </tr>
    @endif
    @foreach ($SmsMessages as $sms)
        <tr>
            <td>
                {{ $sms->id }}
            </td>
            <td>
                {{ $sms->type->name }}
            </td>
            <td>
                {{ $sms->to }}
            </td>
            <td>
                {{ $sms->text }}
            </td>
            <td>
                {{ $sms->created_at->format('d/m/Y h:i:s A') }}
            </td>
            <td>

            </td>
        </tr>
    @endforeach
    @endisset
    </tbody>
</table>
