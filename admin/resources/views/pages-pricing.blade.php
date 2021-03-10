@extends('layouts.master')

@section('title') Pricing @endsection

@section('content')

     @component('common-components.breadcrumb')
         @slot('title') Pricing  @endslot
         @slot('li_1') Pages  @endslot
     @endcomponent

<div class="row justify-content-center">
    <div class="col-lg-6">
        <div class="text-center mb-5">
            <h4>Choose your Pricing plan</h4>
            <p class="text-muted">To achieve this, it would be necessary to have uniform grammar, pronunciation and more common words If several languages coalesce</p>
        </div>
    </div>
</div>

<div class="row">

     @component('common-components.price-section')
         @slot('title') Starter  @endslot
         @slot('desc') Neque quis est  @endslot
         @slot('icon') bx bx-walk h1 text-primary  @endslot
         @slot('price') 19  @endslot
     @endcomponent

     @component('common-components.price-section')
         @slot('title') Professional  @endslot
         @slot('desc') Quis autem iure  @endslot
         @slot('icon') bx bx-run h1 text-primary  @endslot
         @slot('price') 29  @endslot
     @endcomponent

     @component('common-components.price-section')
         @slot('title') Enterprise @endslot
         @slot('desc') Sed ut neque unde  @endslot
         @slot('icon') bx bx-cycling h1 text-primary  @endslot
         @slot('price') 39  @endslot
     @endcomponent

     @component('common-components.price-section')
         @slot('title') Unlimited @endslot
         @slot('desc') Itaque earum hic  @endslot
         @slot('icon') bx bx-car h1 text-primary  @endslot
         @slot('price') 49  @endslot
     @endcomponent
    
</div>
<!-- end row -->
@endsection