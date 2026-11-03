@props(['icon', 'label', 'value', 'note' => ''])
<div class="pn_card pn_stat">
    <div class="pn_ico"><i class="fa-solid {{ $icon }}"></i></div>
    <small>{{ $label }}</small><b>{{ $value }}</b>
    <span style="color:var(--body-color);font-weight:400">{{ $note }}</span>
</div>
