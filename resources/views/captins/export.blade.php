<table>
    <thead>
    <tr>
        <th class="all">{{__('SN')}}</th>
        <th class="all">{{__('ID')}}</th>
        <th class="all">{{__('ID Wheel')}}</th>
        <th class="all">{{__('Name')}}</th>
        <th class="all">{{__('Mobile')}}</th>
        <th class="all">{{__('Assign City')}}</th>
        <th class="all">{{__('Join Date')}}</th>
        <th class="all">{{__('Vehicle Type')}}</th>
        <th class="all">{{__('Has Insurance')}}</th>
        <th class="all">{{__('insurance End Date')}}</th>
        <th class="all">{{__('Commission %')}}</th>
        <th class="all">{{__('Active')}}</th>
        <th class="all">{{__('Shift')}}</th>
        <th class="all">{{__('Orders')}}</th>
        <th class="all">{{__('Commission from cash')}}</th>
        <th class="all">{{__('Commission from visa')}}</th>
        <th class="all">{{__('Paid to Captain')}}</th>
        <th class="all">{{__('Net for payment')}}</th>
        <th class="all">{{__('Actions')}}</th>

    </tr>
    </thead>
    <tbody>
    @foreach ($captins as $captin)
        <tr>
            <td>{{ ++$loop->index }}</td>
            <th class="all">{{$captin->id}}</th>
            <th class="all">{{$captin->id_weel}}</th>
            <th class="all">{{$captin->name}}</th>
            <th class="all">{{$captin->mobile1}}</th>
            <th class="all">{{$captin->city->name}}</th>
            <th class="all">{{$captin->join_date}}</th>
            <th class="all">{{$captin->vehicle->name}}</th>
            <th class="all">{{$captin->has_insurance}}</th>
            <th class="all">{{$captin->policy_expire}}</th>
            <th class="all">{{$captin->total_commission}}</th>
            <th class="all">{{$captin->active}}</th>
            <th class="all">{{$captin->shifts->name}}</th>
            <th class="all">{{$captin->total_orders}}</th>
            <th class="all">{{$captin->total_commission_cash}}</th>
            <th class="all">{{$captin->total_commission_visa}}</th>
            <th class="all">{{$captin->paid}}</th>
            <th class="all">{{$captin->net_paid}}</th>
        </tr>
    @endforeach
    </tbody>
</table>
