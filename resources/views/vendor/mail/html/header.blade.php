@props(['url'])
<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
@if (trim($slot) === 'Laravel')
<img src={{ asset('storage/image/ticket.jpg') }} class="logo" alt="Ticket Logo">
@else
{{ $slot }}
@endif
</a>
</td>
</tr>
