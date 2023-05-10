<x-admin-layout>
    <div class="x_panel text-center">
        <div class="x_title">
            <h1>Ajout Coupon</h1>
        </div>
        @if(Session::has('coupon_creer'))
            <span>{{Session::get('coupon_creer')}}</span>
        @endif
        <div class="x_content">
            <form action="{{ route('creer.coupon')}}" method="post" class="">
                @csrf
                <input type="number" style="margin: auto;
                float: none;" class="form-control col-md-4 text-center" placeholder="remise " name="remise" required>
                <br><br>
                <input type="date" style="margin: auto;
                float: none;" class="form-control col-md-4 text-center" name="validite" required>
                <br><br>
                <input type="text" style="margin: auto;
                float: none;" class="form-control col-md-4 text-center" placeholder="code du coupon" name="code" required>
                <br><br>
                <button class="btn btn-primary" type="submit" data-toggle="tooltip" data-original-title="Ajouter un coupon">Enregistrer</button>
            </form>
        </div>
    </div>
    
</x-admin-layout>