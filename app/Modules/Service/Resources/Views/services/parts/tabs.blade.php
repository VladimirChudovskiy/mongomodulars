<ul class="nav nav-tabs user-edit-tabs">
    <li role="presentation">
        <a href="{{ route('services.show', $service->_id) }}">Show</a>
    </li>
    <li role="presentation">
        <a href="{{ route('services.qr', $service->_id) }}">QR</a>
    </li>
    <li role="presentation">
        <a href="{{ route('services.ports', $service->_id) }}">Ports</a>
    </li>
    <li role="presentation">
        <a href="{{ route('commands.index', $service->_id) }}">Commands</a>
    </li>
</ul>