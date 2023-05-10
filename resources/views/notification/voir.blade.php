<x-admin-layout>
    <div class="x_panel text-center">
        <div class="x_title">
            <h1>Vue Notification</h1>
        </div>
        <div class="x_content">
                <input type="hidden" name="id" value="{{ $notification->id }}">
                <div>
                    <input type="text" name="" value="{{ $notification->NotifTime() }}"  class="form-control text-center">
                 </div>
                 <br>
                 <div>
                    <textarea type="text" type="text" class="form-control  text-center" name="message" disabled>
                        {{ $notification->message }}</textarea>
                 </div>
        </div>
    </div>
</x-admin-layout>