<x-mail::message>
# Request for callback | {{ str_replace("-", " ", $formData['currentPage'])}}

**Name:** {{ $formData['name'] }}
**Email:** {{ $formData['email'] }}
**Phone:** {{ $formData['phone'] }}

**Contact Preference:**
{{json_encode($formData['contactPreference'])}}

**Contact Date:** {{ $formData['contactDate'] }}

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
