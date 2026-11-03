@if (session('success'))<div class="pn_alert ok">{{ session('success') }}</div>@endif
@if (session('error'))<div class="pn_alert err">{{ session('error') }}</div>@endif
@if ($errors->any())
    <div class="pn_alert err">@foreach ($errors->all() as $error)<div>{{ $error }}</div>@endforeach</div>
@endif
