@if (isset($items))
<button class="btn btn-outline-primary">{{ __('Update') }}</button>
<a href="{{ route('cart.clear') }}" class="btn btn-danger">{{ __('Clear All') }}</a>
@else
<div class="alert alert-info">
    {{ __('Cart is empty.') }}
</div>
@endif
