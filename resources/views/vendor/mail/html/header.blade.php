@props(['url'])
<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
@if (trim($slot) === 'Laravel')
<span style="font-size: 24px; font-weight: bold; color: #3d4852;">HOTELBOOKING</span>
@else
{!! $slot !!}
@endif
</a>
</td>
</tr>
