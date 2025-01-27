@if($errors->any())
<div class="flex p-4 mb-4 text-sm rounded-md bg-gray-800 text-red-400" role="alert">
    <i class="fas fa-exclamation-triangle me-3"></i>
    <div>
        <span class="font-medium">
            @lang('The following errors occurred:')
        </span>
        <ul class="mt-1.5 list-disc list-inside">
            @foreach($errors->default->messages() as $error)
            <li>{{ $error[0] }}</li>
            @endforeach
        </ul>
    </div>
</div>
@endif