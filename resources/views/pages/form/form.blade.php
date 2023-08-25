@extends('layouts.app')
@section('container')
    {{-- @include('pages.penduduk.modal') --}}
    <div class="main_content_iner ">
        <div class="container-fluid p-0">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="white_card card_height_100 mb_30">
                        <div class="white_card_header">
                        </div>
                        <div class="white_card_body">
                            <div class="QA_section">
                                @if (session()->has('success'))
                                    <div class="alert alert-success" role="alert">
                                        {{ session('success') }}
                                        <button type="button" class="btn-close" data-bs-dismiss="alert"
                                            aria-label="Close"></button>
                                    </div>
                                @endif
                                <div class="white_box_tittle list_header">
                                    <h3>Form pendataan</h3>
                                </div>

                                <div class="QA_table visible-scroll always-visible ps-container ps-theme-default ps-active-x ps-active-y mb_3"
                                id="show">
                                    <div id="succes_message"></div>
                                    <div id="saveform_errList"></div>
                                    @yield('form')
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    {{-- @include('pages.penduduk.create') --}}
@endsection

@section('scripts')
<script>

</script>
@include('pages.form.script')
@endsection
