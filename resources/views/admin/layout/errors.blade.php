
@if ($errors->any())
<div class="alert alert-danger">
    @foreach ($errors->all() as $error)
        <p>{{ $error }}</p>
    @endforeach
</div>
@endif


@if (session('success'))

<script>
    new Noty({
        type: 'success',
        layout: 'topRight',
        text: "{{ session('success') }}",
        timeout: 3000,
        killer: true
    }).show();
</script>

@endif

