<x-admin-layout>
    <div class="col-md-12 col-sm-12">
        <div class="x_panel text-center">
            <div class="x_title">
                <h1>Liste des coupons</h1>
            </div>
            @if(Session::has('coupon_delete'))
                <span>{{Session::get('coupon_delete')}}</span>
            @endif
            <div class="table-responsive">
                <table class="table table-striped jambo_table">
                    <thead>
                        <tr class="headings">
                            <th class="column-title">ID#</th>
                            <th class="column-title">Remise</th>
                            <th class="column-title">Validite</th>
                            <th class="column-title">Code</th>
                            <th class="column-title">Action</th>
                        </tr>
                    </thead>
                    @foreach($coupons as $coupon)
                    <tbody>
                        <tr>
                            <td>{{$coupon->id}}</td>
                            <td>{{$coupon->remise}}%</td>
                            <td>{{$coupon->validite}}</td>
                            <td>{{$coupon->code}}</td>
                            <td>
                                <a href="{{ route('supprimer.coupon', $coupon->id) }}"><i class="fa fa-trash"></i> Suprrimer</a>
                            </td>
                        </tr>
                    </tbody>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
    
        
</x-admin-layout>
<li><a><i class="fa fa-folder"></i> Catégorie <span class="fa fa-chevron-down"></span></a>

