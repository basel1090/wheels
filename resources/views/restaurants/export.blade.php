<table>
    <thead>
    <tr>
        <td>#</td>
        <th class="all">{{__('SN')}}</th>
        <th class="all">{{__('Restaurant ID')}}</th>
        <th class="all">{{__('Restaurant Wheels ID')}}</th>
        <th class="all">{{__('Name')}}</th>
        <th class="all">{{__('Type')}}</th>
        <th class="all">{{__('Telephone')}}</th>
        <th class="all">{{__('City')}}</th>
        <th class="all">{{__('Join Date')}}</th>
        <th class="all">{{__('Has Now')}}</th>
        <th class="all">{{__('Has Bot')}}</th>
        <th class="all">{{__('Has B2B')}}</th>
        <th class="all">{{__('Has POS')}}</th>
        <th class="all">{{__('Has Marketing')}}</th>
        <th class="all">{{__('Menu Items')}}</th>
        <th class="all">{{__('Employees')}}</th>
        <th class="all">{{__('Branches')}}</th>

        <th class="all">{{__('Commission Cash %')}}</th>
        <th class="all">{{__('Commission Visa $')}}</th>
        <th class="all">{{__('Sales Visa $')}}</th>
        <th class="all">{{__('Sales Commission $')}}</th>
        <th class="all">{{__('Paid to Restaurant')}}</th>
        <th class="all">{{__('Net For Payemnt')}}</th>


    </tr>
    </thead>
    <tbody>
    @foreach ($restaurants as $restaurant)
        <tr>
            <td>{{ ++$loop->index }}</td>
           <td>{{$restaurant->id}}</td>
           <td>{{$restaurant->restaurant_id}}</td>
           <td>{{$restaurant->id_wheel}}</td>
           <td>{{$restaurant->name}}</td>
           <td>{{$restaurant->type->name}}</td>
           <td>{{$restaurant->telephone}}</td>
           <td>{{$restaurant->city->name}}</td>
           <td>{{$restaurant->join_date}}</td>
           <td>{{$restaurant->has_wheels_now}}</td>
           <td>{{$restaurant->has_wheels_bot}}</td>
           <td>{{$restaurant->has_wheels_b2b}}</td>
           <td>{{$restaurant->has_pos}}</td>
           <td>{{$restaurant->has_marketing}}</td>
           <td>{{$restaurant->items()->count()}}</td>
           <td>{{$restaurant->employees()->count()}}</td>
           <td>{{$restaurant->branches()->count()}}</td>

           <td>{{$restaurant->commission_cash}}%</td>
           <td>{{$restaurant->commission_visa}}$</td>
           <td>{{$restaurant->total_sales_cash}}$</td>
           <td>{{$restaurant->total_sales_visa }}$</td>
           <td>{{$restaurant->paid}}</td>
           <td>{{$restaurant->net_paid}}</td>
        </tr>
    @endforeach
    </tbody>
</table>
