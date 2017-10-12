<ul class="nav nav-tabs translations-edit-tabs">
    <li role="presentation">
        <a href="{{ route('translates.index') }}">All</a>
    </li>
    @foreach($locales as $item)
        <li role="presentation">
            <a href="{{ route('translates.show', $item->_id) }}">{{ $item->t('name') }}</a>
        </li>
    @endforeach
</ul>