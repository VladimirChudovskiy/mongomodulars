<ul class="nav nav-tabs user-edit-tabs">
    <li role="presentation">
        <a href="{{ route('users.edit', $user->_id) }}">Edit</a>
    </li>
    <li role="presentation">
        <a href="{{ route('partner.show', $user->_id) }}">Partner</a>
    </li>
    @if($user->isPartner())
        <li role="presentation">
            <a href="{{ route('contacts.index', $user->_id) }}">Contacts</a>
        </li>
        <li role="presentation">
            <a href="{{ route('services.index', $user->_id) }}">Services</a>
        </li>
        <li role="presentation">
            <a href="{{ route('ecbs.index', $user->_id) }}">ECBs</a>
        </li>
    @endif
</ul>