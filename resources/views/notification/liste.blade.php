<x-admin-layout>
    <div class="x_panel text-center">
        <div class="x_title">
            <h1>Liste des notifications</h1>
        </div>
        @if(Session::has('notification_delete'))
            <span>{{Session::get('notification_delete')}}</span>
        @endif
        <div class="table-responsive">
            <table class="table table-striped jambo_table">
                <thead>
                    <tr class="headings">
                        <th>ID#</th>
                        <th>Message</th>
                        <th>Heure</th>
                        <th>Lu</th>
                        <th>Action</th>
                    </tr>
                </thead>
                @foreach($notifications as $notification)
                <tbody>
                    <tr>
                        <td>{{ $notification->id }}</td>
                        <td>{{ $notification->message }}</td>
                        <td>{{$notification->NotifTime()}}</td>
                        <td>{{ $notification->lu }}</td>
                        <td>
                            <a href="{{route('voir.notification',$notification->id)}}"><i class="fa fa-eye"></i> Voir</a>
                            <a href="{{route('supprimer.notification',$notification->id)}}"><i class="fa fa-trash"></i> Suprrimer</a>
                        </td>
                    </tr>
                </tbody>
                @endforeach
            </table>
        </div>
    </div>
</x-admin-layout>