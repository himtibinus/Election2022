<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
@if (trim($slot) === 'HIMTI Election')
<img src="{{ asset('assets/logo-himti-biru.png') }}" class="logo" alt="HIMTI">
@else
{{ $slot }}
@endif
</a>
</td>
</tr>
