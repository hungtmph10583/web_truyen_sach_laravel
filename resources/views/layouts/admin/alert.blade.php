@if(session('success') || session('danger'))
<div class="m-form__content">
    <div class="row">
        <div class="col-12">
            <div class="m-alert m-alert--icon alert @if(session('success')) alert-success @else alert-danger @endif" role="alert" id="m_form_1_msg">
                <div class="m-alert__icon">
                    @if(session('success'))
                        <i class="la la-check-circle"></i>
                    @else
                        <i class="la la-question-circle"></i>
                    @endif
                </div>
                <div class="m-alert__text">
                    <strong>
                        @if(session('success'))
                            Success.
                        @else
                            Error!
                        @endif
                    </strong> {{ session()->get('success') }}{{ session()->get('danger') }}.
                </div>
            </div>
        </div>
    </div>
</div>
@endif